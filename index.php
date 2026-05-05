
<?php
//Another example to create a random password 
function anorandpass($count) {
	
	$m_rand = mt_rand(); //generate a random integer 
	$u_id = uniqid("MNO!@#$%^&*=+XYZ", TRUE);//create a unique identifier with some extra prefix and extra entropy 
	
	$combine = $m_rand . $u_id;// Combine the variables to form a string 
	
	$new = str_shuffle($combine);//shuffle our string 
			
	return substr($new, 5, $count);//return the password 
}
?>
<?php
if(!file_exists("_system/license.key"))
{
	header("location: install/install.php");
}
    require_once("config.php");
	require_once("_system/_config.php");
	require_once("_system/_database.php");
	require_once("_system/func_wallet/_time2reset_mtopup.php");

	if(isset($_SESSION['uid']) || isset($_SESSION['username']))
	{
		$sql_player = 'SELECT * FROM authme WHERE id = "'.$_SESSION['uid'].'"';
		$query_player = $connect->query($sql_player);

		if($query_player->num_rows <= 0)
		{
			session_destroy();

				//* REFRESH
			echo "<meta http-equiv='refresh' content='0 ;'>";
		}
		else
		{
			$player = $query_player->fetch_assoc();
		}
	}

	if($time2reset_mtopup <= time())
	{
		file_put_contents('_system/func_wallet/_time2reset_mtopup.php','<?php $time2reset_mtopup = '.strtotime('first day of next month midnight').'; ?>');
		$connect->query("UPDATE authme SET topup_m = 0, topup_w = 0");

		//* REFRESH
		echo "<meta http-equiv='refresh' content='0 ;'>";
	}
                $sql_setting = 'SELECT * FROM setting';
		$query_setting = $connect->query($sql_setting);
                $setting = $query_setting->fetch_assoc();
                $sql_download = 'SELECT * FROM download';
		$query_download = $connect->query($sql_download);
                $download = $query_download->fetch_assoc();
?>
<?php 
	require_once("_system/ipay/api.php");

	$setting_ = $connect->query("SELECT * FROM setting");
	$setting = $setting_->fetch_assoc();

?>
<!--================== Fire prevent ==================-->
<?php 
include('_system/index/prevent.php'); 
?>
<!--===============================================-->
    <head>
            <meta charset="utf-8">
			<meta name="author">
            <title><?php echo $setting['name_server']; ?></title>
			<link rel="stylesheet" href="style.css">
		 	<link href="font-awesome-pro-v6-6.2.0/css/all.min.css" rel="stylesheet" type="text/css">
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css">
            <!-- <link rel="stylesheet" href="assets/css/sweetalert2.min.css" >
            <link rel="stylesheet" href="assets/css/mary.css">
            <link rel="stylesheet" href="assets/css/wheel.css">
            <link rel="stylesheet" href="assets/css/lt.css"> -->
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.5.1/dist/css/foundation.min.css" integrity="sha256-1mcRjtAxlSjp6XJBgrBeeCORfBp/ppyX4tsvpQVCcpA= sha384-b5S5X654rX3Wo6z5/hnQ4GBmKuIJKMPwrJXn52ypjztlnDK2w9+9hSMBz/asy9Gw sha512-M1VveR2JGzpgWHb0elGqPTltHK3xbvu3Brgjfg4cg5ZNtyyApxw/45yHYsZ/rCVbfoO5MSZxB241wWq642jLtA==" crossorigin="anonymous">
			<link href="<?php echo $setting['bg'];?>" rel="apple-touch-icon">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css">
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
			<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
			<!--===============================================================================================-->
				<link rel="stylesheet" href="_system/css/ipay.css">
				<link rel="stylesheet" href="assets/css/ipay.css">
				<link rel="stylesheet" href="https://openapi-sandbox.kasikornbank.com/v2/oauth/token">
				<script src="assets/js/Winwheel.js"></script>
				<script src="assets/js/sweetalert.min.js"></script>
				<script src="https://cdn.jsdelivr.net/gh/leonardosnt/mc-player-counter@1.1.1/dist/mc-player-counter.min.js"></script>
			<!--===============================================================================================-->
            <link rel="icon" href="<?php echo $setting['icon']; ?>">
            <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<meta name="description" content="">
            <meta>
    </head>
<style>
 .footer{
    background: url("<?php echo $setting['bg'];?>");
    background-position: bottom;
    background-repeat: no-repeat;
    background-size: cover;
    height: 80%;
    width: 100%;
    padding-top: 75px;
    padding-bottom: 30px;
}

body{
	background:white;
}
</style>
<script type="text/javascript">
    func();
    var seconds = 5 /*SECONDS, UPDATE INTERVAL*/;
    setInterval(function(){
        func();
    }, seconds * 1000);
    function func(){ 
    //เปลียน IP ตรงนี้ (ตัวอย่าง)
        var ip = "<?php echo $setting['ip_server']; ?>";
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "https://eu.mc-api.net/v3/server/info/" + ip, true);
        xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                        data = JSON.parse(xhr.responseText);
                        if (data.status) {
                                document.getElementById("sta").innerHTML="<span id='sta'>ออนไลน์</span>";
                                document.getElementById("bar").innerHTML=(data.players.online/2)-0.5 + " / " + data.players.max/2;
                                document.getElementById("bar").style.width = Math.round(100*(data.players.online/data.players.max)) + "%";
                        } else {
                                document.getElementById("bar").innerHTML="0/0";
                                 document.getElementById("sta").innerHTML="<span id='sta' <span style='font-size: 15px; background-color:#dd3544;' class='badge'>ออฟไลน์</span>";
                        }
                }
        }
        xhr.send();
    };
	var staff = document.getElementsByClassName( "UUID" );
	var staffimg = document.getElementsByClassName( "UUIDimg" );
	var stafflength = staff.length - 1;
	var uuids = [];
	var run = 0;

	function UUIDtoName( run )
	{
		uuid = staff[run].title;
		staff[run].title = "staff";
		$.when($.getJSON('https://api.mojang.com/users/profiles/minecraft/' + uuid)).done(function (data) {
			staff[run].innerHTML = data.name;
			staffimg[run].src = "https://minotar.net/body/" + data.name + "/100.png";
			if( run == stafflength )
			{
				return;
			}
			else
			{
				UUIDtoName( run + 1 )
			}
		});
	}
	UUIDtoName( 0 );
</script>
<body>

<div class="container">
<section class="mt-4 villa-bg-top">
    <div class="container" align="center">
    <img src="pic/villacraftlogo.png" class="img-top villa-img-logo">
    </div>
</section>
<!-- ตัว navbar หลัก -->
	<nav class="navbar navbar-expand-lg bg-body-tertiary border py-2 mt-3 rounded-2">
		<div class="container-fluid">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
			<ul class="navbar-nav mb-2 mb-lg-0">
				<li class="nav-item">
				<a class="nav-link text-secondary" aria-current="page" href="?page=home"><i class="fa-duotone fa-house"></i>
					<strong>HOME</strong> | หน้าหลัก</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-secondary" aria-current="page" href="?page=shop"><i class="fa-duotone fa-store"></i>
					<strong>STORE</strong> | ร้านค้า</a>
				</li> 
				<li class="nav-item">
				<a class="nav-link text-secondary" aria-current="page" href="?page=topup"><i class="fa-duotone fa-coins"></i>
					<strong>TOPUP</strong> | เติมพอยท์</a>
				</li>
				<li class="nav-item">
				<a class="nav-link text-secondary" aria-current="page" href="?page=redeem"><i class="fa-duotone fa-rectangle-barcode"></i>
					<strong>CODE</strong> | กรอกโค้ด</a>
				</li>
			</ul>
			</div>
		</div>
	</nav>
</div>
<!-- <section class="home-head-image" 
        style="background: url(&quot;<?php echo $setting['bg'];?>&quot;) 50% center / cover;">
		     <div class="container" align="center">
   <img src="<?php echo $setting['icon']; ?>" style="width:200px; height:200px;" alt="logo-nav" class="home-head-sn"></div>
	</section> -->
<!-- ======= nav menu ======= -->
<!-- <div class="card border-0 shadow mb-3">
<nav class="navbar navbar-expand-sm navbar-light py-3 border" style="background-color: rgba(255, 255, 255, 0.5);">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="true" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
				</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<ul class="navbar-nav mx-auto ">
			<li class="nav-item px-1">
				<a class="nav-link leftnv" href="?page=home"><img src="image/menu/home.png" style="width:20px;height:20px;"> หน้าหลัก</a>
			</li>
			
 			<li class="nav-item px-1">
				<a class="nav-link leftnv" href="?page=shop"><img src="image/menu/891462.png" style="width:20px;height:20px;"> ร้านค้า</a>
			</li>

<li class="nav-item dropdown px-1">
				<a class="nav-link leftnv" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"><img src="image/menu/topup.png" style="width:20px;height:20px;"> เติมเงิน</a>
            <div class="dropdown-menu">
                         <a class="dropdown-item" href="?page=topup"><i class="fas fa-wallet"></i>	เติมเงินด้วยซองอั่งเปาทรูมันนี่วอเลท</a>
                         <a class="dropdown-item" href="?page=topupbank"><i class="fas fa-landmark"></i>	เติมเงินผ่านธนาคาร</a>
                         </div>
      </li> 

 			<li class="nav-item px-1">
				<a class="nav-link leftnv" href="?page=redeem"><img src="image/menu/qr.png" style="width:20px;height:20px;"> กรอกรหัสโค้ด</a>
			</li> 
			
				<?php if(!$_SESSION['username']){ ?>
 			<li class="nav-item px-1">
				<a class="nav-link leftnv" href="?page=register"><img src="image/menu/register.png" style="width:20px;height:20px;"> สมัครสมาชิก</a>
			</li> 
 			<li class="nav-item px-1">
				<a class="nav-link leftnv" href="?page=login"><img src="image/menu/login.png" style="width:20px;height:20px;"> เข้าสู่ระบบ</a>
			</li> 
				<?php }else{ ?>
 			<li class="nav-item px-1">
				<a class="nav-link leftnv" href="?page=log"><img src="image/menu/log.png" style="width:20px;height:20px;"> ประวัติ</a>
			</li>
			
<li class="nav-item dropdown px-1">
				<a class="nav-link leftnv" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"><img src="image/menu/member.png" style="width:20px;height:20px;"> โปรไฟล์</a>
            <div class="dropdown-menu">
						<a class="dropdown-item" href="?page=user"><i class="fas fa-address-book"></i>	ข้อมูลส่วนตัว</a>
                         <a class="dropdown-item" href=""><i class="fas fa-user"></i>	<?php echo $_SESSION['realname']; ?></a>
						 <a class="dropdown-item" href="?page=gift"><i class="fa fa-gift"></i> GIFT	(ของขวัญ)</a>
                         <a class="dropdown-item" href=""><i class="fas fa-database"></i>	<?php echo number_format($player['points']); ?> PT (พอยท์)</a>
						 <a class="dropdown-item" href=""><i class="fab fa-centos"></i>	<?php echo number_format($player['topup']); ?> PR	(พอยท์สะสม)</a>
                         </div>
      </li>			
                </ul>
				<?php } ?>
    </div>
 </nav>
 <br><br> -->
 <!-- ======= page ======= -->
 <?php
                    if(!$_GET){$_GET["page"] = 'home';}
                    if(!$_GET["page"])
                    {
                      $_GET["page"] = "home";
                    }
                     if($_GET["page"] == "home"){
                         include_once __DIR__.'/_page/home.php';
                    }elseif($_GET['page'] == "shop"){
                        include_once __DIR__.'/_page/shop.php';
                    }elseif($_GET['page'] == "download"){
                        include_once __DIR__.'/_page/download.php';
                    }elseif($_GET['page'] == "topup"){
                        include_once __DIR__.'/_page/topupwallet.php';
                    }elseif($_GET['page'] == "log"){
                        include_once __DIR__.'/_page/log.php';
                    }elseif($_GET['page'] == "gift"){
                        include_once __DIR__.'/_page/gift.php';						
                    }elseif($_GET['page'] == "confirm"){
                        include_once __DIR__.'/_page/confirm.php';
                    }elseif($_GET['page'] == "login"){
                        include_once __DIR__.'/_page/login.php';
                    }elseif($_GET['page'] == "register"){
                        include_once __DIR__.'/_page/register.php';
                    }elseif($_GET['page'] == "logout"){
                        include_once __DIR__.'/_page/logout.php';
                    }elseif($_GET['page'] == "redeem"){
                        include_once __DIR__.'/_page/redeem.php';
                      }elseif($_GET['page'] == "gacha"){
                        include_once __DIR__.'/_page/chance.php';
                    }elseif($_GET['page'] == "user"){
                        include_once __DIR__.'/_page/user.php';
					}elseif($_GET['page'] == "gift"){
                        include_once __DIR__.'/_page/gift.php';
					}elseif($_GET['page'] == "topupwallet"){
                        include_once __DIR__.'/_page/topupwallet.php';
					}elseif($_GET['page'] == "topupbank"){
                        include_once __DIR__.'/_page/topupbank.php';
                    }elseif($_SESSION['uid'] && $player['status'] == "admin" && $_GET['page'] == "backend"){
                        include_once __DIR__.'/backend/index.php';
                    }else{
                                            echo '<div class="alert alert-danger"><i class="fa fa-warning"></i> 404 ไม่พบหน้าที่ต้องการ</div>';
                                            echo '<meta http-equiv="refresh" content="2;URL=?page=home">';
                                        }
                     ?>

<!-- ======= background ======= -->
<footer class="container">
<div class="d-none">
<div class="spinner-border text-dark" role="status">
<span class="visually-hidden">Loading...</span></div></div>
<div class="py-4 border-top d-flex justify-content-between">
<div class="">
<h6 class="text-muted" style="font-family:Kanit;" >ไมน์คราฟต์ เว็บช็อปพัฒนาโดย
<a href="#" class="text-decoration-none">Funnycraft Develop by Villacraft Team </a> Copyright © 2023, All rights reserved.</h6>
</div>
</div>
</div>
</tbody>
</table>
</div>
</html>
	<script  src="https://discordapp.com/api/guilds/1087143622048219301/widget.json"></script>
<!--===============================================================================================-->
	<script  src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script  src="assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script  src="assets/vendor/bootstrap/js/popper.js"></script>
	<script  src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script  src="assets/vendor/select2/select2.min.js"></script>
	<script >
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script  src="assets/vendor/slick/slick.min.js"></script>
	<script  src="assets/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script  src="assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script  src="assets/vendor/sweetalert/sweetalert.min.js"></script>
	<script >
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
    <script src="https://www.google.com/recaptcha/api.js"></script>
	<script  src="assets/vendor/parallax100/parallax100.js"></script>
	<script >
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="assets/js/main.js"></script>
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
 <?php
	if(isset($_POST['login_submit']))
	{
		$msg = '';
		$alert = 'error';
		$msg_alert = 'เกิดข้อผิดพลาด!';

		$username = $connect->real_escape_string($_POST['username']);
		$sql = 'SELECT * FROM authme WHERE username = "'.$username.'"';
		$a = $connect->query($sql);
		$a_num = $a->num_rows;
		if($a_num == 1)
		{
			$password_info = $a->fetch_assoc();
			$sha_info = explode("$",$password_info['password']);
			$salt = $sha_info[2];
			$sha256_password = hash('sha256', $_POST['password']);
			$sha256_password .= $sha_info[2];

			if(strcasecmp(trim($sha_info[3]),hash('sha256', $sha256_password)) == 0){
				$sql_user = 'SELECT * FROM authme WHERE username = "'.$username.'"';
				$query_user = $connect->query($sql_user);
				$fetch_user = $query_user->fetch_assoc();

				//* SET SESSION
				$_SESSION['uid'] = $fetch_user['id'];
				$_SESSION['username'] = $fetch_user['username'];
				$_SESSION['realname'] = $fetch_user['realname'];
				$_SESSION['admin'] = $fetch_user['admin'];


				$msg = 'ยินดีต้อนรับคุณ: '.$_SESSION['realname'];
				$alert = 'success';
				$msg_alert = 'เข้าสู่ระบบสําเร็จ';
			}
			else
			{
				$msg = 'รหัสผ่านไม่ถูกต้อง';
				$alert = 'error';
				$msg_alert = 'ล็อคอินไม่สําเร็จ';
			}
		}
		else
		{
			$msg = 'ไม่พบตัวละครนี้';
			$alert = 'error';
			$msg_alert = 'ไม่มีบัญชีในระบบ';
		}

		?>
			<script>
				swal("<?php echo $msg_alert; ?>", "<?php echo $msg; ?>", "<?php echo $alert; ?>", {
					button: "ปิด",
				})
				.then((value) => {
					window.location.href = window.location.href;
				});
			</script>
		<?php
	}
        
if(isset($_POST['submit']) == "redeem")
{
    if($_SESSION['username']){
    $code = $_POST['redeem_code'];

    $redeem_q = $connect->query("SELECT * FROM redeem WHERE code = '".$code."'");
    $redeem = $redeem_q->fetch_assoc();

    if($redeem_q->num_rows != 0)
    {
        $update_q = $connect->query("UPDATE authme set points = points + '".$redeem['cmd']."' WHERE username = '".$_SESSION['username']."'");
        //alert
            $msg = 'คุณได้รับสินค้าแล้ว';
			$alert = 'success';
			$msg_alert = 'สำเร็จ!';
        $delete_redeem = $connect->query("DELETE FROM redeem WHERE id = '".$redeem['id']."'");
    }
    else
    {
        $msg = 'ERORR';
			$alert = 'error';
			$msg_alert = 'ไม่มีโค๊ตไอดีนี้ในระบบ';
    } ?>
        <script>
				swal("<?php echo $msg_alert; ?>", "<?php echo $msg; ?>", "<?php echo $alert; ?>", {
					button: "Reload",
				})
				.then((value) => {
					window.location.href = window.location.href;
				});
			</script>               
    <script>
				swal("<?php echo $msg_alert; ?>", "<?php echo $msg; ?>", "<?php echo $alert; ?>", {
					button: "Reload",
				})
				.then((value) => {
					window.location.href = window.location.href;
				});
			</script> 
                        <?php
}
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
//select-amount
$('#select-amount').change(function (e) {
	var amount = $(this).val();
	if(amount >= 1){
		FunctionPay(amount);
	}else{
		Swal.fire({
			icon: 'error',
			title: 'เลือกยอดเงินที่ต้องการเติม'
		});
	}
});
function FunctionPay(e) {
	$("#promptpay_qr").hide(),$("#slip-bank-info").hide();
	var bank = '<?=$_CONFIG['api']['bank']['bank'];?>';
	if(bank == "promptpay"){
		Swal.fire({
			title: "กรุณารอซักครู่!",
			showCancelButton: !1,
			showLoaderOnConfirm: !1,
			allowOutsideClick: !1,
			allowEscapeKey: !1
		}), Swal.showLoading();
		var obj = {};
		obj.amount = e;
		$.ajax({
			url: '?page=topup&action=gen',
			contentType: "application/json",
			type: 'POST',
			data: JSON.stringify(obj),
			async: false,
			cache: false,
			processData: true,
			beforeSend: function() {
				$(".overlay-loading").css("display", "flex");
			},
			complete: function() {
			},
			success: function (res) {
				if(res.status.code === 1000){
					$("#promptpay_qr").show();
					$('#qr-preview').attr('src',res.data.url);
					$('#qr-preview').css("display", "block");
					$("#frmslip").show();
					$("#slip-bank-info").show();
					$(".overlay-loading").css("display", "none");
					Swal.close();
				}else{
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: res.status.description
					});
					$(".overlay-loading").css("display", "none");
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'เกิดข้อผิดพลาดไม่สามารถเชื่อมต่อระบบได้ในขณะนี้'
				});
				$(".overlay-loading").css("display", "none");
			}
		});
	}else{
		$("#slip-bank-info").show();
		$("#bank_info").show();
		$("#frmslip").show();
		$(".overlay-loading").css("display", "none");
	}
}
$('body').on('change', '#slip', function (){
	$("#preview").attr("src",window.URL.createObjectURL(this.files[0]));
});
$('body').on('click', '.slipverify', function (){
	$('.slipverify').prop('disabled', true);
	$(".overlay-loading").css("display", "flex");
	setTimeout(function() {
		$( "#frmslip" ).submit();
	}, 500);
});
$('body').on('submit', '#frmslip', function (evt){
	evt.preventDefault();
	var formData = new FormData($(this)[0]);
	$.ajax({
		url: '?page=topup&action=verify',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		enctype: 'multipart/form-data',
		processData: false,
		beforeSend: function() {
			$(".overlay-loading").css("display", "flex");
		},
		complete: function() {
			$(".overlay-loading").css("display", "none");
		},
		success: function (res) {
			if(res.status.code === 1000){
				Swal.fire({
					icon: 'success',
					title: 'Success',
					html: 'เติมเงินสำเร็จ'
				}).then(function() {
					location.reload();
				});
				$('.slipverify').prop('disabled', false);
			}else{
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: res.status.description
				});
				$('.slipverify').prop('disabled', false);
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'เกิดข้อผิดพลาดไม่สามารถเชื่อมต่อระบบได้ในขณะนี้'
			});
			$('.slipverify').prop('disabled', false);
		}
	});
});
</script>