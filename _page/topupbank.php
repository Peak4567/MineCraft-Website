<?php 

include_once ('_system/api/tw.php');
include_once ('_system/ipay/config.php');
require_once('_system/_database.php');

$phone_number_ = $connect->query("SELECT * FROM wallet_account")->fetch_assoc();
// if($data['status']['code'] == "SUCCESS") {
// }

if(isset($_POST['wallet_link'])) {
	$wallet_account = $connect->query("SELECT * FROM wallet_account")->fetch_assoc();
	// echo ($_POST["wallet_link"]);
	// https://gift.truemoney.com/campaign/?v=jmAXkKvy6ek7aK4gcb
	$tw = new trueWallet($phone_number_['phone'], $_POST['wallet_link']);
	$tw_data = $tw->toPup();


	$data = json_decode($tw_data, true);
	

	if($data['status']['message'] == 'success') {
		$id = $_SESSION['uid'];
		$user = $_SESSION['username'];
		$redeemed_amount_baht = $data['data']['voucher']['redeemed_amount_baht']*$wallet_account['mutiple'];
		
		$time_date = date("Y-m-d H:i");

		$add_money = $connect->query("UPDATE `authme` SET `points` = `points` + $redeemed_amount_baht,`topup` = `topup` + $redeemed_amount_baht WHERE `authme`.`id` = $id");
		$add_action = $connect->query("INSERT INTO `activities` (`id`, `uid`, `username`, `action`, `date`, `topup_amount`, `transaction`) VALUES (NULL, '$id ', '$user', 'TOPUP Truewallet', '$time_date', '$redeemed_amount_baht', '$time_date')");
		if($add_action) {}
		if($add_money) {
			echo('<script>
			swal("ทำรายการสำเร็จ", "คุณได้เติมเงิน '.$data['data']['voucher']['redeemed_amount_baht'].' บาท", "success", {
				button: "Reload",
			})
			.then((value) => {
				window.location.href = window.location.href;
			});
			</script>  ');
		}

		$sql_insert_log = 'INSERT INTO activities (uid,username,action,date,topup_amount,transaction) VALUES("'.$_SESSION['uid'].'","'.$_SESSION['username'].'","TOPUP","'.$time_date.'","'.$redeemed_amount_baht.'","'.rand(00,99999999999999).'")';
		$connect->query($sql_insert_log);
	} else {
		echo('<script>
		swal("เติมเงินไม่สําเร็จ ", "'.$data.'", "error", {
			button: "Reload",
		})
		.then((value) => {
			window.location.href = window.location.href;
		});
		</script>  ');
	}
}

?> 
 <div class="col-lg-12 ml-auto">
  <div class="card mt-4">
  <div class="card-body">
      <i class="fas fa-hand-point-right"></i>  เติมเงินผ่านธนาคาร</span><hr>
	<?php
		if(!isset($_SESSION['uid']) || !isset($_SESSION['username']))
		{
                    include_once '_page/alertLogin.php';
		}
		else
		{
			?>
      <div class="row">
	
		<div class="col-lg-3">		
<div class="card border-0 shadow mb-3">
    <div class="card-header bg-success" style="color: white;"><h5 class="md-5" style="font-family:Kanit;"><i class="fas fa-landmark"></i>   ธนาคารกสิกรไทย</h5></div>
	   <div class="card-body">
					<div class="container">
						<a href="" data-toggle="modal" data-target="#sliptopup" data-backdrop="static"><img src="image/bank/kbank.png" class="card-img-top" style="width: 100%;display:block" alt="Slip Topup"></a>
					</div>
				</div>
			</div>
		</div>
      </div>
    </div>
  </div>
</div> 
<div class="modal fade" tabindex="-1" id="sliptopup" >
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" style="font-family:Kanit;">ระบบเติมเงินผ่านธนาคาร</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row mt-2" id="slip-select-amount">
					<div class="col-md-12">
						<label for="basic-url" class="form-label">เลือกยอดเงินที่ต้องการเติม</label>
						<select class="form-select form-select-lg" name="select-amount" id="select-amount">
							<option selected>เลือกยอดเงินที่ต้องการเติม</option>
<?php
    foreach($_CONFIG['scb']['amount'] as $cash_amout) {
        if($cash_amout > 0) {
            echo '<option value="'.$cash_amout.'">โอน '.$cash_amout.' บาท</option>';
        }
    }
?>
						</select>
					</div>
				</div>
				<div class="row mt-2" id="slip-bank-info" style="display:none">
					<form id="frmslip" name="frmslip" enctype="multipart/form-data">
						<div class="card-body">
							<div class="col-12"><h3 class="text-center" style="font-family:Kanit; ">หลักจากที่ท่านโอนเงินเสร็จเเล้วกรุณาอัพโหลดสลิปเพื่อตรวจสอบ</h3></div>
							<div id="promptpay_qr" class="col-sm-12 col-md-12 col-lg-12 col-centered text-center">
								<img class="img-fluid col-centered mb-3" id="qr-preview" style="margin-top:15px;display:block">
							</div>
							<div id="bank_info" class="row mb-3" style="max-width:500px;margin:0 auto;display:none;">
								<div class="col-3">
									<img src="image/bank/<?=$_CONFIG['api']['bank']['bank'];?>.png" class="img-responsive" style="width:100%; height:auto;">
								</div>
								<div class="col-9 text-left">
									<p style="margin:0;"><strong>ชื่อบัญชี</strong> : <?=$_CONFIG['api']['bank']['account_name'];?></p>
									<p style="margin:0;"><strong>เลขบัญชี</strong> : <?=substr($_CONFIG['api']['bank']['account'],0,3)?>-<?=substr($_CONFIG['api']['bank']['account'],3,1)?>-<?=substr($_CONFIG['api']['bank']['account'],4,5)?>-<?=substr($_CONFIG['api']['bank']['account'],9)?></p>
									<p style="margin:0;"><strong>ธนาคาร</strong> : <?=$_CONFIG["bank"][$_CONFIG['api']['bank']['bank']];?></p>
								</div>
							</div>
							<div class="form-group">
								<label for="file" class="sr-only">File</label>
								<div class="input-group">
									<input type="text" name="filename" class="form-control" placeholder="กรุณาเลือกไฟล์รูปภาพสลิป รองรับ .png , .jpg , .jpeg เท่านั้น" readonly>
									<span class="input-group-btn">
										<div class="btn btn-default  custom-file-uploader">
											<input type="file" id="slip" name="slip" onchange="this.form.filename.value = this.files.length ? this.files[0].name : ''" accept="image/png, image/jpeg"/>
											เลือกไฟล์
										</div>
									</span>
								</div>
							</div>
							<div class="form-group">
								<button type="button" class="btn btn-primary btn-block slipverify">ตรวจสอบสลิป</button>
							</div>
							<div class="form-group p-3 mb-2 bg-danger" style="font-size:12px; color: #fff; text-align: left; border-radius: 10px;">
								<li>โปรดอ่าน ทำการโอนเงินผ่านแอปธนาคาร ที่มี Qr Code บนสลิป เท่านั้น โอนแล้วให้เก็บสลิปไว้เพื่อใช้ยืนยันกับระบบ หากโอนผ่านช่องทางอื่นที่ไม่มี Qr Code หรือไม่ได้เก็บสลิป ระบบจะตรวจสอบไม่ได้ให้ติดต่อแอดมินเท่านั้น</li>
								<li>หากระบบไม่สามารถอ่าน Qr Code ได้ กรุณาลองทำการครอปรูปภาพให้เหลือแต่ Qr Code ขออภัยในความไม่สะดวก</li>
							</div>
							<div class="col-sm-7 col-md-6 col-lg-5 col-centered text-center">
								<img class="img-fluid col-centered" id="preview" style="margin-top:15px;display:block">
							</div>
						</div>
					</form>
				</div>
			</div>


				<?php  } ?>
</div>
</div>
</div>