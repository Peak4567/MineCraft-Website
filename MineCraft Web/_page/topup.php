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
		$add_action = $connect->query("INSERT INTO `activities` (`id`, `uid`, `username`, `action`, `date`, `topup_amount`, `transaction`) VALUES (NULL, '$id ', '$user', 'TOPUP TrueMoney', '$time_date', '$redeemed_amount_baht', '$time_date')");
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

		$sql_insert_log = 'INSERT INTO activities (uid,username,action,date,topup_amount,transaction) VALUES("'.$_SESSION['uid'].'","'.$_SESSION['username'].'","เติมเงิน","'.$time_date.'","'.$redeemed_amount_baht.'","'.rand(00,99999999999999).'")';
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
								<div class="col-md-8 mb-1">
									<div class="alert alert-info text-center">
										<i class="fa fa-exclamation-triangle text-dark"></i>
										เช็คลิงค์เติมเงินของคุณให้ดีก่อนเติมเงิน<i class="fa fa-exclamation-triangle text-dark"></i><br>
										อัตตราการเติมเงิน x1
									</div>
								</div>
							</div>
					<div class="col-md-12">
						<h5 class="text-center"> <img src="img/wallet.png" alt="Wallet" style="width:30%"></h5>
						<form name="topup_wallet" method="POST">
							<div class="container" align="center">
								<div class="input-group col-md-5 mb-2">
									<input name="wallet_link" type="text" class="form-control" placeholder="ลิงค์ซองของขวัญ" required="">
								</div>
								<div class="input-group col-md-6 mb-2">
									<button name="btn_wallet" type="submit" class="btn btn-success btn-block">
										เติมเงิน
									</button>
								</div>
							</div>
						</form>
						<span class="is-divider" data-content="หรือเติมเงินด้วย TrueMoney" style="margin: 1.5rem 0;"></span>
						<div class="col-md-12 col-12 text-center text-dark">
							<h6>เติมเงิน 10 บาทขึ้นไป</h6>
<h5 class="text-center"> <img src="img/tww.png" alt="Wallet" style="width:90%"></h5>
							</div>
			              
 </div>

				<?php  } ?>
				
</div>
</div>
</div>
<section style="flex:50%; color:#fff;">
<div class="card border-1 shadow mb-4">                         
       <div style="background-color: #ff5722; padding:16px;" class="card-header  btn-line-b black_line"><b style="color:#FFF"><i class="fa fa-bank" aria-hidden="true"></i>  TOP เติมเงิน 1-20</b></div>
		
			<div class="card-body">	
                <div class="row">

<?php
$sql_list = 'SELECT * FROM authme ORDER BY topup DESC LIMIT 20';
$query_list = $connect->query($sql_list);

$sql_last = 'SELECT * FROM activities WHERE (action = "TOPUP Truewallet" || action = "TOPUP payment") ORDER BY id DESC';
$query_last = $connect->query($sql_last);
?>
<table class="table table-striped ranking_tb" border="0" style="font-size:13px;">

  <tbody>
    <?php
    if($query_list->num_rows > 0)
    {
      while($list_topup = $query_list->fetch_assoc())
      {
        ?>
        <tr>
    <img src="https://mc-heads.net/head/<?php echo $list_topup['username']; ?>/100"class="mr-4 mt-3"  width="10%">  
        </tr>
        <?php
      }
    }
    else
    {
      ?>
      <tr>
        <td>
          <img src="https://mc-heads.net/avatar/Google/100" class="mr-3" width="28">ไม่มีอันดับคนเติมเงิน
        </td>
        <td>
          <?php echo number_format("0.00",2); ?><h3>💰</h3>
        </td>
      </tr>
      <?php
    }
    ?>
  </tbody>
</table>

							</div>
						</form>
					</div>
				</div>
</section>