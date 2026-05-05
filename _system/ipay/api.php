<?php
$post_data = json_decode(file_get_contents('php://input'), true);
if($_GET["page"]=="topup" and ($_GET["action"]=="gen" or $_GET["action"]=="verify")) {
	header("Content-type: application/json; charset=utf-8");
	ini_set("memory_limit","1024M");
	include "config.php";
	if($_SESSION['uid'] =="" || $_SESSION['username'] == "") {
		$data["status"]["code"]=9000;
		$data["status"]["description"]="กรุณาล็อกอินเข้าสู่ระบบใหม่อีกครั้ง";
		echo json_encode($data);
		exit();
	}
	$data = array();
	if($_GET["action"] === "gen"){
		$post_data = json_decode(file_get_contents('php://input'), true);
		$strAmout = addslashes(trim($post_data["amount"]));
		if($strAmout >= 1){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $_CONFIG['api']['endpoint'].'/promptpay/generator',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS =>'{"account_id":"'.$_CONFIG['api']['bank']['account'].'","amount":"'.$strAmout.'"}',
			  CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'x-api-key: '.$_CONFIG['api']['key'],
				'Authorization: Basic '.base64_encode($_CONFIG['api']['username'].':'.$_CONFIG['api']['password'])
			  ),
			));
			$res = json_decode(curl_exec($curl),true);
			curl_close($curl);
			if($res["status"]["code"] === 1000){
				$data =$res;
			}else{
				$data["status"]["code"]=1100;
				$data["status"]["description"]="กรุณาลองใหม่อีกครั้ง";
				$data["log"]=$res;
			}
		}else{
			$data["status"]["code"]=1100;
			$data["status"]["description"]="กรุณาระบุยอดเงินขั้นต่ำ 1 บาท";
		}
	}elseif($_GET["action"] === "verify"){
		$uid = addslashes($_SESSION["uid"]);
		$username = addslashes($_SESSION["username"]);
		if(isset($_FILES["slip"])) {
			$filepath = $_FILES['slip']['tmp_name'];
			$fileSize = @filesize($filepath);
			$fileinfo = @finfo_open(FILEINFO_MIME_TYPE);
			$filetype = @finfo_file($fileinfo, $filepath);
			if ($fileSize === 0) {
				$data["status"]["code"]=1001;
				$data["status"]["description"]="กรุณาเลือกรูปภาพสลิป";
			}else{
				if($fileSize <= 3145728){ // 3 MB (1 byte * 1024 * 1024 * 3 (for 3 MB))
					$allowedTypes = [
					   'image/png' => 'png',
					   'image/jpeg' => 'jpg'
					];
					if(in_array($filetype, array_keys($allowedTypes))){
						$filename = basename(str_replace(".","",microtime(true).date("YmdHis").rand(1,1000)));
						$extension = $allowedTypes[$filetype];
						$targetDirectory = __DIR__ . "/uploads";
						$newFilepath = $targetDirectory . "/" . $filename . "." . $extension;
						if(copy($filepath, $newFilepath)) {
							require __DIR__ . "/vendor/autoload.php";
							$qrcode = @new Zxing\QrReader($newFilepath);
							$text = $qrcode->text();
							if($text != "" or $text != null){
								$curl = curl_init();
								curl_setopt_array($curl, array(
								  CURLOPT_URL => $_CONFIG['api']['endpoint'].'/slipverify',
								  CURLOPT_RETURNTRANSFER => true,
								  CURLOPT_ENCODING => '',
								  CURLOPT_MAXREDIRS => 10,
								  CURLOPT_TIMEOUT => 0,
								  CURLOPT_FOLLOWLOCATION => true,
								  CURLOPT_SSL_VERIFYPEER => false,
								  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
								  CURLOPT_CUSTOMREQUEST => 'POST',
								  CURLOPT_POSTFIELDS =>'{"text":"'.$text.'","ref":"'.$username.'","focus_no":"'.$_CONFIG['api']['bank']['account'].'","focus_bank":"'.$_CONFIG['api']['bank']['bank'].'"}',
								  CURLOPT_HTTPHEADER => array(
									'Content-Type: application/json',
									'x-api-key: '.$_CONFIG['api']['key'],
									'Authorization: Basic '.base64_encode($_CONFIG['api']['username'].':'.$_CONFIG['api']['password'])
								  ),
								));
								$res = json_decode(curl_exec($curl),true);
								curl_close($curl);
								if($res["status"]["code"] === 1000){
									if($res["data"]["request_one"] === 1){
										$data["status"]["code"]=1000;
										$data["status"]["description"]="สำเร็จ";
										$data["data"]["amount"]=$res["data"]["amount"];
										$data["data"]["ref"]=$res["data"]["ref"];

										$strRef = addslashes(trim($username));
										$strRef = (strlen($strRef)>9?substr($strRef,0, 9):$strRef).date('ymd').rand(10000,99999);
										$strConfirmId = mb_strtoupper($strRef);
										$time_date = date("Y-m-d H:i");

										$add_money = $connect->query("UPDATE `authme` SET `points` = `points` + ".$res["data"]["amount"].",`topup` = `topup` + ".$res["data"]["amount"]." WHERE `authme`.`id` = $uid");
										$add_action = $connect->query("INSERT INTO `activities` (`id`, `uid`, `username`, `action`, `date`, `topup_amount`, `transaction`) VALUES (NULL, '$uid ', '$username', 'TOPUP Slip', '$time_date', '".$res["data"]["amount"]."', '$time_date')");

									}else{
										$data["status"]["code"]=1100;
										$data["status"]["description"]="ขออภัยครับ สลิปนี้ถูกใช้งานไปเเล้ว.";
									}
								}else{
									$data["status"]["code"]=1100;
									$data["status"]["description"]=$res["status"]["description"];
								}
							}else{
								$data["status"]["code"]=1100;
								$data["status"]["description"]="ขออภัยครับ ไม่สามารถอ่านค่าได้ กรุณาติดต่อเเอดมิน";
							}
						}else{
							$data["status"]["code"]=1100;
							$data["status"]["description"]="อัพโหลดไฟล์ไม่สำเร็จ";
						}
						@unlink($newFilepath);
					}else{
						$data["status"]["code"]=1100;
						$data["status"]["description"]="รองรับไฟล์รูปประเภท .png , .jpg , .jpeg เท่านั้น";
					}
				}else{
					$data["status"]["code"]=1100;
					$data["status"]["description"]="ขนาดไฟล์ใหญ่เกิน 3MB";
				}
			}
		}else{
			$data["status"]["code"]=1100;
			$data["status"]["description"]="กรุณาเลือกรูปภาพสลิป";
		}
	}else{
		$data["status"]["code"]=9100;
		$data["status"]["description"]="ไม่ได้รับอนุญาต";
	}
	echo json_encode($data);
	mysqli_close($conn);
	exit();
}
?>