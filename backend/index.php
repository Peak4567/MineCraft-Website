
<?php
if(!file_exists("../_system/license.key"))
{
	header("location: install/install.php");
}

	require_once("../_system/_config.php");
        require_once("../_system/func_wallet/_loginTW.php");
        require_once("../_system/_database.php");
	require_once("../_system/func_wallet/_time2reset_mtopup.php");
	require_once("../_system/ipay/config.php");
                 $sql_setting = 'SELECT * FROM setting';
		$query_setting = $connect->query($sql_setting);
                $setting = $query_setting->fetch_assoc();
                $sql_download = 'SELECT * FROM download';
		$query_download = $connect->query($sql_download);
                $download = $query_download->fetch_assoc();
                $redeem_row = $connect->query("SELECT * FROM redeem")->num_rows;
                $now_month = "-".date("m")."-";
                $sql_list_topup_wallet = 'SELECT * FROM activities WHERE action = "TOPUP Truewallet" AND date LIKE "%'.$now_month.'%"';
		$query_list_topup_wallet = $connect->query($sql_list_topup_wallet);
                $sql_list_topup_tmn = 'SELECT * FROM activities WHERE action = "TOPUP TrueMoney" AND date LIKE "%'.$now_month.'%"';
		$query_list_topup_tmn = $connect->query($sql_list_topup_tmn);
                $amount_wallet = 0;
                while($topup_wallet = $query_list_topup_wallet->fetch_assoc())
		{
			$amount_wallet += $topup_wallet['topup_amount'];
		}
                $amount_tmn = 0;
		while($topup_tmn = $query_list_topup_tmn->fetch_assoc())
		{
			$amount_tmn += $topup_tmn['topup_amount'];
		}
?>
<!DOCTYPE html>
<html lang="th">
    <head>
            <meta charset="utf-8">
			<meta name="author" content="">
            <title><?php echo $setting['name_server'];?></title>
            <link href="../assets/css/kanit.css" rel="stylesheet">
			<link href="<?=$uri;?>/assets/css/bootstrap.min.css?t=<?=time();?>" rel="stylesheet">
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-6jHF7Z3XI3fF4XZixAuSu0gGKrXwoX/w3uFPxC56OtjChio7wtTGJWRW53Nhx6Ev" crossorigin="anonymous">
            <link rel="stylesheet" href="../assets/fa/css/font-awesome.css">
            <link rel="stylesheet" href="../assets/css/mary.css">
			<link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
            <link rel="stylesheet" href="../assets/css/lt.css">
			<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
            <script src="../assets/js/sweetalert2.all.min.js"></script>
			<link rel="icon" href="../image/icon/admin.png">
            <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <!-- MDB -->
            <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
            rel="stylesheet"
            />
            <meta>
    </head>
<style type="text/css">
body,td,th {
font-family: 'Kanit', sans-serif;
font-size: 15px;
}
body
{
  background: url(../<?php echo $setting['bg'];?>) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
.lp-panel {
color: black;
font-size: 18px;
background: rgba(255,255,255.1);
padding: 20px;
}
.lp-menu {
padding: 11px;
font-size: 17px;
border-bottom: 1px solid white;
text-decoration: none !important;
color: black;
transition-duration: 0.3s;
background: rgba(238,238,238,1)
}
.lp-menu:hover {
border-left: 6.5px solid transparent;
color: black;
background: rgba(223,223,223,1)
}
.lp-title-input {
color: white;
background: rgba(0,0,0,0.5);
border: 0px;
border-radius: 0px;
}
.lp-input {
font-size:16px;
background: rgba(255,255,255,1);
border-radius: 0px;
color: black;
}
.lp-input:disabled {
background: rgba(0,0,0,0.1);
}
.modal-content
 {
 border-radius: 0px;
 border: solid 1px white;
     padding:9px 15px;
     background-color: rgba(255,255,255,1);
 }
 .lp-card {
color: black;
background: rgba(255,255,255.1);
}
</style>
<!--================== Fire prevent ==================-->
<?php 
include('../_system/index/prevent.php'); 
?>
<!--===============================================-->
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <br>
            <div class="sidebar-card d-none d-lg-flex">
                <div class="sidebar-brand-text mx-3">ระบบหลังบ้าน</div>
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../backend/?page=home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>ตั้งค่าเว็บช็อป</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-truck"></i>
                    <span><span style="color:white">จัดการร้านค้า</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">จัดการระบบร้านค้า:</h6>
                        <a class="collapse-item" href="?page=backend&menu=manageproduct&action">แก้ไขสินค้า</a>
                        <a class="collapse-item" href="?page=backend&menu=manageproduct&action=add">เพิ่มสินค้า</a>
						<a class="collapse-item" href="?page=backend&menu=managecategory">หมวดหมู่สินค้า</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-address-card"></i>
                    <span><span style="color:white">จัดการสมาชิก</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">จัดการสมาชิก:</h6>
                        <a class="collapse-item" href="?page=backend&menu=manageuser">แก้ไขข้อมูลผู้เล่น</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages TOPUP Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span><span style="color:white">ระบบเติมเงิน</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">จัดการระบบเติมเงิน:</h6>
                        <a class="collapse-item" href="?page=backend&menu=managetopup">แก้ไข TrueWallet</a>
                        <a class="collapse-item" href="">ATM BANK</a>
						<a class="collapse-item" href="?page=backend&menu=list_topup">รายการเติมเงิน</a>
                    </div>
                </div>
            </li>
<hr class="sidebar-divider">
            <!-- Nav Item - code -->
            <li class="nav-item">
                <a class="nav-link" href="?page=backend&menu=codekey">
                    <i class="fas fa-fw fa-code"></i>
                    <span><span style="color:white"> CodesKey</span></a>
            </li>
            <!-- Nav Item - server -->
            <li class="nav-item">
                <a class="nav-link" href="?page=backend&menu=bungeecord">
                    <i class="fas fa-fw fa-server"></i>
                    <span><span style="color:white"> เซิร์ฟเวอร์</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=backend&menu=settings">
                    <i class="far fa-calendar-alt"></i>
                  <span><span style="color:white">   ตั้งค่าเว็บไซต์</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="/?page=home">
                  <span><span style="color:white">   กลับไปยังหน้า Fontend</span></a>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>		

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <?php if($menu == 'manageuser'){echo'จัดการชื่อผู้ใช้';}elseif($menu == 'manageproduct'){echo'จัดการสินค้า';}elseif($menu == 'discord'){echo'จัดการดิสคอร์ด';}elseif($menu == 'redeem'){echo'จัดการ Code ไอดี';}elseif($menu == 'slide'){echo'จัดการรูปภาพ-วิดีโอ';}elseif($menu == 'list_topup'){echo'รายการเติมเงิน';}elseif($menu == 'loot'){echo'จัดการระบบสุ่มไอเทม';}elseif($menu == 'manageproduct'){echo'จัดการสินค้า';}elseif($menu == 'managecategory'){echo'จัดการหมวดหมู่';}elseif($menu == 'managetopup'){echo'ระบบเติมเงิน';}elseif($menu == 'slide'){echo'จัดการ Video YT';}elseif($menu == 'bungeecord'){echo'จัดการ Server';}elseif($menu == 'manageannounce'){echo'จัดการการประกาศ';}elseif($menu == 'settings'){echo'ตั้งค่า WebShop';}else{echo 'หน้า Backend';} ?> </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> <?php if($menu == 'manageuser'){echo'จัดการชื่อผู้ใช้';}elseif($menu == 'manageproduct'){echo'จัดการสินค้า';}elseif($menu == 'discord'){echo'จัดการดิสคอร์ด';}elseif($menu == 'redeem'){echo'จัดการ Code ไอดี';}elseif($menu == 'slide'){echo'จัดการรูปภาพ-วิดีโอ';}elseif($menu == 'list_topup'){echo'รายการเติมเงิน';}elseif($menu == 'loot'){echo'จัดการระบบสุ่มไอเทม';}elseif($menu == 'manageproduct'){echo'จัดการสินค้า';}elseif($menu == 'managecategory'){echo'จัดการหมวดหมู่';}elseif($menu == 'managetopup'){echo'ระบบเติมเงิน';}elseif($menu == 'slide'){echo'จัดการ Video YT';}elseif($menu == 'bungeecord'){echo'จัดการ Server';}elseif($menu == 'manageannounce'){echo'จัดการการประกาศ';}elseif($menu == 'settings'){echo'ตั้งค่า WebShop';}else{echo 'หน้า Backend';} ?> </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	
        <?php if(!isset($_SESSION['admin']) || $_SESSION['admin'] == NULL || $_SESSION['admin'] == "" || $_SESSION['admin'] != $setting['backend_password'])
			{
        if(isset($_POST['login_submit_backend']))
	{
		$password_backend = $connect->real_escape_string($_POST['password_backend']);
		if($password_backend == $setting['backend_password'])
		{
			$_SESSION['admin'] = $password_backend;

			$msg = 'เข้าสู่ระบบหลังบ้านเรียบร้อยแล้ว !';
			$alert = 'success';
			$msg_alert = 'สำเร็จ!';
		}
		else
		{
			$msg = 'ERROR!';
			$alert = 'error';
			$msg_alert = 'เกิดข้อผิดพลาด!';
		}

		?>
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
        ?>
<div class="container" align="center">
<div class="col-sm-12"><div class="container" align="center">
<span style="font-family: nexa;font-size: 30px;color: #000000; font-family:Kanit;">
<i class="fas fa-dice-d6"></i>&nbsp;Villacraft Webshop | Backend</span><hr class="style-six">
<div class="card">
<div class="card-body">
    <h5><i class="fa fa-cogs"></i> Authenticactor | Please Login To Villacraft System&nbsp;
    </h5><hr>
<form name="login" method="POST">
	<div class="input-group mb-4">
		<div class="input-group-prepend">
			<span class="input-group-text">
				<i class="fa fa-lock"></i>
			</span>
		</div>
		<input name="password_backend" class="form-control" type="password" placeholder="รหัสผ่านเข้าสู่ระบบหลังบ้าน"/>
	</div>
	<hr/>
	<?php
		if(isset($_POST['login_submit_backend']))
		{
			?>
				<button class="btn btn-primary btn-block" type="button" disabled>
				  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
				  Loading...
				</button>
			<?php
		}
		else
		{
			?>
				<input name="login_submit_backend" class="btn btn-primary btn-block" type="submit" value="เข้าสู่ระบบ"/>
			<?php
		}
	?>
</form>
                       
</div>
	</div>
		</div>
			</div>			
         <?php }else{ ?>
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="container">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
                    <!-- Page Heading -->
					<br>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">สรุปยอดทั้งหมด</h1>
                        <a href="?page=backend&menu=update" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> UPDATE</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                ยอดการสั่งซื้อสินค้า</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo number_format($amount_shop + $amount_tmn); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
  </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                ยอดรายได้ยอดเติมเงิน</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo number_format($query_product); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">ยอดสมาชิก
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo number_format($_SESSION['uid']); ?></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo number_format($_SESSION['uid']); ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                เวอร์ชั่นเว็บไซต์</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">V.1.2.0</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-version fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>	

  <body style="color:#000;">
    <div style="width:100%; max-width:100%; margin:auto; margin-top:40px;">
      <div id="container" style="margin-bottom:8px;">	
		<div class="card shadow mb-4">
		  <div class="card-body">	
            <h5><i class="fa fa-cogs"></i>&nbsp;<?php if($menu == 'manageuser'){echo'จัดการชื่อผู้ใช้';}elseif($menu == 'manageproduct'){echo'แก้ไขสินค้า';}elseif($menu == 'discord'){echo'จัดการดิสคอร์ด';}elseif($menu == 'redeem'){echo'จัดการ Code ไอดี';}elseif($menu == 'slide'){echo'จัดการรูปภาพ-วิดีโอ';}elseif($menu == 'list_topup'){echo'รายการเติมเงิน';}elseif($menu == 'loot'){echo'จัดการระบบสุ่มไอเทม';}elseif($menu == 'manageproduct'){echo'จัดการสินค้า';}elseif($menu == 'managecategory'){echo'จัดการหมวดหมู่';}elseif($menu == 'managetopup'){echo'ระบบเติมเงิน';}elseif($menu == 'slide'){echo'จัดการ Video YT';}elseif($menu == 'bungeecord'){echo'จัดการ Server';}elseif($menu == 'manageannounce'){echo'จัดการการประกาศ';}elseif($menu == 'settings'){echo'ตั้งค่า WebShop';}else{echo 'หน้า Backend';} ?> 
              </h5><hr>
          <?php
                                    if(isset($_GET['menu']) && $_GET['menu'] != NULL && $_GET['menu'] != "")
				{
					$menu = $_GET['menu'];
					if($menu == 'manageuser')
					{
						include_once '_page/manageuser.php';
					}
					elseif($menu == 'historytopup')
					{
						include_once '_page/list_topup.php';
					}
					elseif($menu == 'manageproduct')
					{
						include_once '_page/product.php';
					}
					elseif($menu == 'managecategory')
					{
						include_once '_page/managecategory.php';
					}
					elseif($menu == 'managetopup')
					{
						include_once '_page/managetopup.php';
					}
					elseif($menu == 'download')
					{
						include_once '_page/download.php';
					}
					elseif($menu == 'slide')
					{
						include_once '_page/slide.php';
					}	
					elseif($menu == 'discord')
					{
						include_once '_page/discord.php';						
					}
					elseif($menu == 'announce')
					{
						include_once '_page/announce.php';						
					}					
					elseif($menu == 'bungeecord')
					{
						include_once '_page/bungeecord.php';
					}
					elseif($menu == 'manageannounce')
					{
						include_once '_page/manageannounce.php';
					}
                    elseif($menu == 'settings')
					{
						include_once '_page/settings.php';
					}
                    elseif($menu == 'loot')
					{
						include_once '_page/loot.php';
					}
                    elseif($menu == 'codekey')
					{
						include_once '_page/codekey.php';
					}
                    elseif($menu == 'update')
					{
						include_once '_page/update.php';
					}
                    elseif($menu == 'manageipay')
					{
						include_once '_page/manageipay.php';
					}
                    elseif($menu == 'list_topup')
					{
						include_once '_page/list_topup.php';
					}
                    
                    elseif($menu == 'logout')
					{
						include_once '_page/logout.php';
					}
                                        else
                                        
					{
                                            echo "<h5 class='mb-2 text-center'><div class='alert alert-danger'><i class='fa fa-exclamation-triangle'></i> ไม่พบเมนูนี้</div></h5>";
					}
				}
				else
				{
                                    //include_once '_page/manageuser.php';
					echo "<h5 class='mb-2 text-center'><div class='alert alert-primary'><i class='fa fa-exclamation-triangle'></i> โปรดเลือกเมนูเพื่อทําการตั้งค่าระบบ</div></h5><br>";
				}
                                  ?>
</div>
  </div>
      </div>
<?php  } ?>
<script id="dsq-count-scr" src="//startbootstrap.disqus.com/count.js" async type="1bd4d45c54bc5ac897fcf366-text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous" type="1bd4d45c54bc5ac897fcf366-text/javascript"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous" type="1bd4d45c54bc5ac897fcf366-text/javascript"></script>
<script type="1bd4d45c54bc5ac897fcf366-text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
<script type="1bd4d45c54bc5ac897fcf366-text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
<script src="../assets/js/scripts.js" type="1bd4d45c54bc5ac897fcf366-text/javascript"></script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/a2bd7673/cloudflare-static/rocket-loader.min.js" data-cf-settings="1bd4d45c54bc5ac897fcf366-|49" defer=""></script>


  <body style="color:#000;">
    <div style="width:100%; max-width:100%; margin:auto; margin-top:40px;">
        <div id="container" style="margin-bottom:8px;">
<div class="card-body">
  <footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="https://www.facebook.com/poomp5/">Villacraft Community</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
	</div>
		</div>
			</div>
			    </div>
	   <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/chart-area-demo.js"></script>
    <script src="../assets/js/demo/chart-pie-demo.js"></script>
</body>		
</html>
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


				$msg = 'ยินดีต้อนรับคุณ: '.$_SESSION['realname'];
				$alert = 'success';
				$msg_alert = 'สำเร็จ!';
			}
			else
			{
				$msg = 'รหัสผ่านไม่ถูกต้อง';
				$alert = 'error';
				$msg_alert = 'เกิดข้อผิดพลาด!';
			}
		}
		else
		{
			$msg = 'ไม่พบตัวละครนี้';
			$alert = 'error';
			$msg_alert = 'เกิดข้อผิดพลาด!';
		}

		?>
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
        
if(isset($_POST['submit']) == "redeem")
{
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
        $delete_redeem = $connect->query("DELETE FROM redeem WHERE code = '".$code."'");
    }
    else
    {
        $msg = 'ไม่มีโค๊ดที่ท่านเลือก';
			$alert = 'error';
			$msg_alert = 'ผิดพลาด!';
    } ?>
        <script>
				swal("<?php echo $msg_alert; ?>", "<?php echo $msg; ?>", "<?php echo $alert; ?>", {
					button: "Reload",
				})
				.then((value) => {
					window.location.href = window.location.href;
				});
			</script>                
                        <?php
      exit();
}
?>
