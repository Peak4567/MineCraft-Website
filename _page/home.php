<?php

require_once("config.php");

?>
<div class="container ">

  <!-- ตัว page หลัก -->
  <div class="row mt-5">
    
    <!-- ปรับ col-lg-8 เป็น col-lg-12 ถ้าอยากให้รูปภาพใหญ่ แล้วไม่อยาให้ members แบ่งฝังกับ row
    แล้วก็ปรับ div ข้างขนจาก mt-5 เป็น mt-3 เพราะมันเว้นกว้างไป -->
    <div class="col-12 col-md-12 col-md-8 col-lg-8">
      <div class="card rounded-5 d-none d-sm-block d-sm-none d-md-block d-md-none d-lg-block 	d-lg-none d-xl-block">
        <div id="carouselExampleIndicators" class="carousel slide">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
              aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="pic/bannerblack.png" class="d-block w-100 rounded-5" alt="...">
            </div>
            <div class="carousel-item">
              <img src="pic/bannerwhite.png" class="d-block w-100 rounded-5" alt="...">
            </div>
            <div class="carousel-item">
              <img src="pic/bannerblack.png" class="d-block w-100 rounded-5" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="fa-duotone fa-arrow-left fa-2xl" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <i class="fa-duotone fa-arrow-right fa-2xl" aria-hidden="true"></i>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div class="col-12 col-md-12 mt-2">
        <div class="card card-nb mb-4 rounded-2">
          <div class="card-body">
            <h4><span class="text-secondary"><i class="fa-duotone fa-arrow-right-to-bracket"></i> | ยินดีต้อนรับสู่เซิร์ฟเวอร์
                <button class="btn btn-success"><img src="pic/villacraftlogo.png" width="24px" height="24px">
                  VILLACRAFT</button></span></h4>
            <hr>
            <div class="row">
              <div class="col-lg-3">
                <img src="pic/villacraftlogo.png" class="w-100 rounded" alt="post-img">
              </div>
              <div class="col-lg-9">
                <span class="post-h4">
                  <span class="mt-2 text-secondary"><i class="fa-duotone fa-desktop"></i><strong> IP</strong> | ไอพีเซิร์ฟเวอร์:
                    <span class="text-success" style="font-weight: 500;">MC-VILLACRAFT.NET</span></span>
                  <br>
                  <span class="text-secondary"><i class="fa-duotone fa-gamepad-modern"></i><strong> VERSION</strong> |
                    เวอร์ชั่น: <span class="text-success"  style="font-weight: 500;">1.18.2 ถึง 1.20.1+</span></span>
                  <br>
                  <br>
                  <span class="text-secondary">ช่องทางการติดต่อ: <a href="<?php echo $config['link_discord']; ?>"
                      class="btn btn-dark"
                      style="font-weight: 500; --bs-btn-padding-y: .04rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><i
                        class="fa-brands fa-discord"></i> DISCORD</a></span>
                  <span class="text-secondary"><a href="<?php echo $setting['page_facebook'] ?>" class="btn btn-primary"
                      style="font-weight: 500; --bs-btn-padding-y: .04rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><i
                        class="fa-brands fa-facebook"></i> FANPAGE</a></span></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- ตัว register / login หลัก-->
  <div class="col-12 col-md-12 col-lg-4 mb-md-2">
    <div class="row">      <div class="col-12">
        <div class="card rounded-2">
          <div class="card-body">

            <!-- <button class="button btn btn-success rounded-2 mb-2"><i class="fa-duotone fa-users"></i> Members | ระบบสมาชิก</button> -->
            <div class="collapse1" id="collapseExample">
            <img class="w-100 rounded-2" src="pic/villalogin.png" align="center" alt="">
            <hr>
            <?php if($_SESSION['username']){ ?>
            <text style="font-size: 16px;"> 
            <center><img src="https://mc-heads.net/avatar/<?php echo $_SESSION['username']; ?>/100"><br></center>
            <hr>
            <div class="input-group mb-3">
              <span class="input-group-text bg-dark text-white"><i class="fa fa-user fs-4"></i></span>
              <input class="form-control py-1" value="<?php echo $_SESSION['username']; ?>" disabled></input>
            </div>
                <div class="input-group mb-3" style="margin-top: -10px;">
            <span class="input-group-text lp-title-input bg-dark btn-line-b text-white"><i class="fas fa-donate fs-4"></i></span>
            <input class="form-control lp-input" value="<?php echo number_format($player['points']); ?> พ้อยท์" disabled/></input>
            </div>
            <div class="input-group mb-3" style="margin-top: -10px;">
            <span class="input-group-text lp-title-input bg-dark btn-line-b text-white"><i class="fa fa-credit-card fs-4"></i></span>
            <input class="form-control lp-input" value="<?php echo number_format($player['topup']); ?> บาท" disabled/></input>
            </div>
            <div class="d-flex flex-column">
            <a href="?page=user" class="btn btn-secondary btn-block btn-sm py-2">
            <i class="fas fa-user mr-1"></i> ข้อมูลผู้ใช้งาน</a>
            <a href="?page=logout" class="mt-1 btn btn-danger btn-block btn-sm py-2">
            <i class="fas fa-sign-out-alt mr-1"></i> ออกจากระบบ</a>
            </div>

            <?php }else{ ?>
              
            <span class="tab-button w-100 p-4 gap-2 me-1 py-2 text-secondary" align="start"  data-bs-toggle="modal" data-bs-target="#LoginModal">
              <i class="fa-duotone fa-user-unlock me-1"></i></i>
              <strong>LOGIN</strong> | เข้าสู่ระบบ</span>
            <!-- <span class="tab-button w-100 p-4 gap-2 me-1 py-2 text-secondary" align="start"><i class="fa-duotone fa-user-plus me-1"></i>
              <strong>REGISTER</strong> | สมัครสมาชิก</span>  -->
            </div>
          </div>
      </div>
        <!-- Modal -->
        <div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="LoginModalLabel" style="font-family:mitr;">เข้าสู่ระบบ</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form method="post" action="">
                  <input type="hidden" name="login_submit">
                  <div class="form-group">
                  <input type="text"  name="username" class="form-control rounded-3" placeholder="ชื่อตัวละคร : Username ">
                  </div>
                  <div class="form-group">
                  <input type="password"  name="password" class="form-control rounded-3" placeholder="รหัสผ่าน :  Password ">
                  </div>
              </div>
                <center class="mb-4">
                  <button type="submit" class="btn btn-block btn-outline-info rounded-3 py-2 px-4"><i class="fa fa-sign-in fa-fw"></i> เข้าสู่ระบบ</button>
                </center>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <?php } ?>
    </div>
  </div>
    <div class="row mt-4">
      <div class="col-12">
        <div class="card rounded-2">
          <div class="card-body">
            <!-- <button class="button btn btn-success rounded-2 mt-2 mb-2"><i class="fa-duotone fa-users"></i> Status | ระบบปฎิบัติการ</button> -->
            <img class="w-100 rounded-2" src="pic/status.png" align="center" alt="">
            <hr>
              <div class="d-flex justify-content-between ms-1">
                <div>
                <span class="text-secondary" align="start"><i class="fa-duotone fa-desktop"></i>
                  <strong>IP</strong> | ไอพีเซิร์ฟเวอร์: <h5><span class="text-success fs-6" style="font-weight: 500;"><?php echo $setting['ip_server']; ?></span></h5></span>
                </div>
                <div class="text-center">
                <span class="text-secondary" align="end"><i class="fa-duotone fa-gamepad-modern"></i>
                  <strong>VERSION</strong> | เวอร์ชั่น: <h5><span class="text-success fs-6" style="font-weight: 500;"><?php echo $setting['version_server']; ?></span></h5></span>
                </div>
              </div>
              <div class="d-flex justify-content-between ms-1">
                <div>
                <span class="text-secondary" align="start"><i class="fa-duotone fa-signal-bars"></i>
  
                  <!-- สถานเซิร์ฟเวอร์ : Online ( สีเขียวเข้ม success ส่วนสีเขียวอ่อนปกติเพิ่มที่ css ได้ )
                  <strong>Status</strong> | สถานเซิร์ฟเวอร์: <h5><span class="badge text-bg-success" style="font-weight: 500;">เซิร์ฟเวอร์ : ออนไลน์</span></h5></span>
                  ------------------------->
  
                  <!-- สถานเซิร์ฟเวอร์ : Offline ( สีแดง danger )
                  <strong>Status</strong> | สถานเซิร์ฟเวอร์: <h5><span class="badge text-bg-danger" style="font-weight: 500;">เซิร์ฟเวอร์ : ออฟไลน์</span></h5></span>
                  ------------------------->
  
                  <!-- สถานเซิร์ฟเวอร์ : Unknown ไม่ระบุ ( สีเทา secondary ) --->
                  <strong>STATUS</strong> | สถานะ: <h5><span class="text-success fs-6" id="sta"></span></h5></span>
  
                </div>
                <div class="text-center">
                <span class="text-secondary" align="end"><i class="fa-duotone fa-users"></i>
                  <strong>PLAYERS</strong> | ผู้เล่นออนไลน์: <h5 style="font-weight: 500;"><span class="text-success fs-6" id="bar"></h5></span>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
      <div class="row mt-4">
        <div class="col-12">
          <div class="card rounded-2">
            <div class="card-body">
              <!-- <button class="button btn btn-success rounded-2 mb-2"><i class="fa-duotone fa-bars"></i> Menus | ระบบเมนูต่างๆ</button> -->
              <img class="w-100 rounded-2" src="pic/menu.png" align="center" alt="">
              <hr>
              <a href="?page=home"><span class="tab-button w-100 p-4 gap-2 me-1 py-2 text-secondary" align="start"><i class="fa-duotone fa-house me-1"></i>
                <strong>HOME</strong> | หน้าหลัก</span>
              </a>
              <a href="?page=shop">
              <span class="tab-button w-100 p-4 gap-2 me-1 py-2 mt-2 text-secondary" align="start"><i class="fa-duotone fa-store me-1"></i>
                <strong>STORE</strong> | ร้านค้า</span>
              </a>
              <a href="?page=random">
              <span class="tab-button w-100 p-4 gap-2 me-1 py-2 mt-2 text-secondary" align="start"><i class="fa-duotone fa-box-open me-1"></i>
                <strong>MYSTERY BOX</strong> | กล่องสุ่มไอเท็ม</span>
              </a> 
              <a href="?page=home">
              <span class="tab-button w-100 p-4 gap-2 me-1 py-2 mt-2 text-secondary" align="start"><i class="fa-duotone fa-user-tag me-1"></i>
                <strong>RANK</strong> | ยศ</span>
              </a> 
              <a href="?page=topupwallet">
              <span class="tab-button w-100 p-4 gap-2 me-1 py-2 mt-2 text-secondary" align="start"><i class="fa-duotone fa-coins me-1"></i>
                <strong>TOPUP</strong> | เติมพอยท์</span>
              </a>
              <a href="?page=redeem">
              <span class="tab-button w-100 p-4 gap-2 me-1 py-2 mt-2 text-secondary" align="start"><i class="fa-duotone fa-clock-rotate-left me-1"></i>
                <strong>CODE</strong> | กรอกโค้ด</span>
              </a>
              <a href="?page=log">
              <span class="tab-button w-100 p-4 gap-2 me-1 py-2 mt-2 text-secondary" align="start"><i class="fa-duotone fa-coins me-1"></i>
                <strong>HISTORY</strong> | ประวัติ</span>
              </a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<!-- div ตัวนี้ใช้ปิด class container -->
</div>
