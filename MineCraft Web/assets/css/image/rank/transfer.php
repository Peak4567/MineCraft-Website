<?php
if (!isset($config)){exit;}
error_reporting(~E_NOTICE);
$result = pg_query("select * from accounts where login='$_SESSION[login_true]'") or die ("Err Can not to result");
$dbarr =pg_fetch_array($result);

$cPlayer = $connec->prepare('SELECT player_id FROM accounts');
$cPlayer->execute();
$countPlayer = $cPlayer->rowCount();

$cPlayer1 = $connec->prepare('SELECT player_id FROM accounts');
$cPlayer1->execute();
$countPlayer1 = $cPlayer1->rowCount();

$cPlayerOnline = $connec->prepare('SELECT player_id FROM accounts WHERE online = true');
$cPlayerOnline->execute();
$countPlayerOnline = $cPlayerOnline->rowCount();

function GenerateRandomString($length = 8) 
{
	return substr(str_shuffle(str_repeat($x='0123456789', ceil($length/strlen($x)) )),3,$length);
}
$Random = GenerateRandomString(8);

?>

    <head>

<meta charset="UTF-8">
</head>
<?php
if(isset($_POST["button"]))	
{	
if ($_POST["button"] == "เเก้ไอดีค้าง")
{
	pg_query("UPDATE accounts SET online = false WHERE login = '".$_SESSION['login_true']."'");
?>
<script type="text/javascript">
swal(
  'Success!',
  'เเก้ไขไอดีค้างสำเร็จ!',
  'success'
)
</script>
<?php
echo "<meta http-equiv='refresh' content='1 ;url=./?page=transfer'>";
}}
?>
<?php
if(isset($_POST["button2"]))	
{	
if ($_POST["button2"] == "แก้ไขไอดีบัค")
{
	
		pg_query("UPDATE accounts SET player_id='".$Random."' WHERE login = '".$_SESSION['login_true']."'");
		pg_query("UPDATE friends SET owner_id='".$Random."' WHERE owner_id ='".$dbarr['player_id']."'");
		pg_query("UPDATE friends SET friend_id='".$Random."' WHERE friend_id ='".$dbarr['player_id']."'");
		pg_query("UPDATE player_bonus SET player_id='".$Random."' WHERE player_id ='".$dbarr['player_id']."'");
		pg_query("UPDATE player_configs SET owner_id='".$Random."' WHERE owner_id ='".$dbarr['player_id']."'");
		pg_query("UPDATE player_events SET player_id='".$Random."' WHERE player_id ='".$dbarr['player_id']."'");
		pg_query("UPDATE player_items SET owner_id='".$Random."' WHERE owner_id ='".$dbarr['player_id']."'");
		pg_query("UPDATE player_messages SET owner_id='".$Random."' WHERE owner_id ='".$dbarr['player_id']."'");
		pg_query("UPDATE player_missions SET owner_id='".$Random."' WHERE owner_id ='".$dbarr['player_id']."'");
		pg_query("UPDATE player_titles SET owner_id='".$Random."' WHERE owner_id ='".$dbarr['player_id']."'");
		pg_query("UPDATE nick_history SET player_id='".$Random."' WHERE player_id ='".$dbarr['player_id']."'");
		pg_query("UPDATE clan_data SET owner_id='".$Random."' WHERE owner_id ='".$dbarr['player_id']."'");
		pg_query("UPDATE clan_invites SET player_id='".$Random."' WHERE player_id ='".$dbarr['player_id']."'");
		pg_query("UPDATE webshop_log SET player_id='".$Random."' WHERE player_id ='".$dbarr['player_id']."'");
		pg_query("UPDATE web_promotion_log SET player_id='".$Random."' WHERE player_id ='".$dbarr['player_id']."'");
		pg_query("UPDATE history_topup SET player_id='".$Random."' WHERE player_id ='".$dbarr['player_id']."'");
?>
<script type="text/javascript">
swal(
  'Success!',
  'เแก้ไขไอดีบัคสำเร็จ!',
  'success'
)
</script>
<?php
echo "<meta http-equiv='refresh' content='1 ;url=./?page=transfer'>";
}}
?>
<?php
if(isset($_POST["cointocash"]))	
{	
if ($_POST["cointocash"] == "coin")
{
	if ($dbarr['coin'] < $config['coin_transfer_cash']){
		?>
<script type="text/javascript">
swal(
  'ERROR',
  'Coin ไม่เพียงพอ',
  'error'
)
</script>
<?php
echo "<meta http-equiv='refresh' content='1 ;url=./?page=transfer'>";
	}else{
		pg_query("UPDATE accounts SET coin = coin - '".$config['coin_transfer_cash']."' WHERE player_id = '".$dbarr['player_id']."'");
	    pg_query("UPDATE accounts SET money = money + '".$config['coin_transfer_cash_reward']."' WHERE player_id = '".$dbarr['player_id']."'");
	?>
<script type="text/javascript">
swal(
  'SUCCESS',
  'แลกเปลี่ยนสำเร็จ',
  'success'
)
</script>
<?php
echo "<meta http-equiv='refresh' content='1 ;url=./?page=transfer'>";
	}
}
}
?>

<?php
if(isset($_POST["cashtocoin"]))	
{	
if ($_POST["cashtocoin"] == "cash")
{
	if ($dbarr['money'] < $config['cash_transfer_coin']){
		?>
<script type="text/javascript">
swal(
  'ERROR',
  'Cash ไม่เพียงพอ',
  'error'
)
</script>
<?php
echo "<meta http-equiv='refresh' content='1 ;url=./?page=transfer'>";
	}else{
		pg_query("UPDATE accounts SET coin = coin + '".$config['cash_transfer_coin_reward']."' WHERE player_id = '".$dbarr['player_id']."'");
	    pg_query("UPDATE accounts SET money = money - '".$config['cash_transfer_coin']."' WHERE player_id = '".$dbarr['player_id']."'");
	?>
<script type="text/javascript">
swal(
  'SUCCESS',
  'แลกเปลี่ยนสำเร็จ',
  'success'
)
</script>
<?php
echo "<meta http-equiv='refresh' content='1 ;url=./?page=transfer'>";
	}
}
}
?>
<body>

				<div class="col-lg-8 order-md-1">
					<div class="card mb-3">
	<div class="card-header" id="header">
			<i class="fa fa-fw fa-money"></i>&nbsp;แลกเงิน
	</div>
	<div class="card-body" style="padding: 0px; border-top:4px solid #306aff;position: relative;">
		<div class="container my-3">
			<center><h3><?php echo $config['coin_transfer_cash']; ?> Coin แลกได้ <?php echo $config['coin_transfer_cash_reward']; ?> Cash</h3> </center>
			
		<form method="post" id="onlyform">
<button type="submit" name="cointocash" class="btn btn-primary btn-block" value="coin"><i class="fa fa-flash"></i>  แลก</button>
</form>
		</div><br>
		<div class="container my-3">
			<center><h3><?php echo $config['cash_transfer_coin']; ?> Cash แลกได้ <?php echo $config['cash_transfer_coin_reward']; ?> Coin</h3> </center>
			
		<form method="post" id="onlyform">
<button type="submit" name="cashtocoin" class="btn btn-primary btn-block" value="cash"><i class="fa fa-flash"></i>  แลก</button>
</form>
		</div>
	</div>
</div>

	</div>			  			<?php
			if (!isset($_SESSION['login_true'])) { ?>
				<div class="col-lg-4 order-md-2">
					<div class="card mb-3">
	<div class="card-header" id="header">
		<i class="fa fa-fw fa-sign-in-alt"></i>&nbsp;เข้าสู่ระบบ	</div>
				<div class="card-body" style="padding: 0px; border-top:4px solid #306aff;position: relative;">
					<div class="container">
						<div class="container my-3">
							<div class="card-content">
								<div class="row">
									<div class="col-2">
										<img src="images/login.svg" alt="" style="width: 37px; height: 37px;">
									</div>
									<div class="col">
										<b style="color: red;">Login</b>
										<div>Manage account</div>
									</div>
								  </div><br>
								<div class="alert alert-warning" style='border-radius: 0px;background-color: rgba(244, 98, 66, 0.8);color: white;'>
<i class="fas fa-exclamation-triangle"></i> กรุณากรอกชื่อไอดีเป็นตัวเล็กทั้งหมด!</div>
<form class="form-horizontal" method="post">

								<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="ชื่อผู้ใช้งาน" name="user_login" id="user_login">
  <div class="input-group-append">
    <span class="input-group-text"><i class="fas fa-user"></i></span>
  </div>
</div>
								
							<div class="input-group mb-3">
  <input type="password" class="form-control" placeholder="รหัสผ่าน" id="pwd_login" name="pwd_login">
  <div class="input-group-append">
    <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
  </div>
</div>

							
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" name="button" class="btn btn-block btn-danger" value="เข้าสู่ระบบ"><i class="fas fa-unlock-alt"></i>&nbsp;เข้าสู่ระบบ</button>
					<table style="width: 100%;">
						<tr>
							<td>
								<a style="margin-top: 3px;width: 100%;" href="?page=register" class="btn btn-primary"><i class="fa fa-fw fa-book"></i>&nbsp;สมัครสมาชิก</a>	
							</td>
						</tr>
					</table>
			  	</div>
		</form>
		</div>
				<?php	
		} else {
		?>
<?php include("pageedit/userlogin.php"); ?></div>
					 <?php }?>	</div>

			</div>
		</div>