<div class="container">
	<div class="row mt-5">
	<?php 

include_once ('_system/api/tw.php');
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
		swal("ไม่สามารถทำรายการได้", "'.$data['status']['code'].'", "error", {
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
<div class="card border-0 shadow mb-3">
            <div class="card-header bg-Dark text-white">เติมเงิน Gift Wallet</div>
				<div class="card-body">
	<?php
		if(!isset($_SESSION['uid']) || !isset($_SESSION['username']))
		{
			include_once '_page/alertLogin.php';
		}
		else
		{
			?>
				<div class="container" align="center">
				<div class="alert alert-info" role="alert">
<h4 class="alert-heading" style="font-family:Kanit;"><img src="https://cdn-icons-png.flaticon.com/512/1253/1253767.png" width="5%">ประกาศข่าวสารการเติมเงินจากเว็บไซต์ Villacraft Survival</h4>
<hr>
<marquee direction="right">&nbsp;ขณะนี้เว็บไซต์ยังไม่มีโปรโมชั่น หากมีเราจะเเจ้งให้ทราบที่นี่! </marquee>
</div>
								<div class="col-md-8 mb-1">
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									เช็คลิงค์เติมเงินของคุณให้ดีก่อนเติมเงิน <i class="fa-solid fa-gift"></i><br>
										อัตตราการเติมเงินปัจจุบัน x1<br>
									1 บาท = 1 พ้อย
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
								</div>
							</div>
					<div class="col-md-12">
						<form name="topup_wallet" method="POST">
							<div class="container" align="center">
								<div class="input-group col-md-5 mb-2">
									<span class="input-group-text lp-title-input"><i class="fa-solid fa-code"></i></span>
									<input name="wallet_link" class="form-control " placeholder="ลิงค์ซองของขวัญ" required="">
									<div class="input-group col-md-6 mb-2">
								</div>
								<button name="btn_wallet" type="submit" class="btn btn-success btn-block w-100 rounded">
										เติมเงิน
									</button>
								</div>
								<button name="btn_howto" type="button" class="btn btn-warning btn-block w-100 rounded" data-bs-toggle="modal" data-bs-target="#HowtoModal">
										วิธีการใช้งาน!?
									</button>


						<!-- Modal -->
						<div class="modal fade" id="HowtoModal" tabindex="-1" aria-labelledby="HowtoModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="HowtoModalLabel" style="font-family:mitr;">วิธีการใช้งาน ซองอั่งเปา!?</h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<img src="../img/angpao.png" alt="">
							</div>
								<center class="mb-4">
								<button type="button" class="btn btn-block btn-outline-danger rounded-3 py-2 px-4" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-sign-in fa-fw"></i> ปิดหน้าต่าง</button>
								</center>
							</div>
						</div>
						</div>
						<!-- Modal -->
							</div>
						</form><hr>
						<span class="is-divider" data-content="หรือเติมเงินด้วย TrueMoney" style="margin: 1.5rem 0;"></span>
						<div class="col-md-12 col-12 text-center text-dark">
						<div class="alert alert-danger text-sm text-center" role="alert">
						<i class="fas fa-exclamation-triangle fs-5"></i> คำเตือน! กรุณาเติมเงินมากกว่า 10 บาท
						</div>
							</div>
						</div>

						
					</div>
			              
 <div class="col-lg-12 ml-auto">
<div class="" >
            
								<div class="input-group col-md-4 mb-2">
									
							</div>
						</form>
					</div>
				<?php  } ?>
</div>
</div>
</div>

	</div>
</div>