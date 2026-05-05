<?php

require_once("config.php");

?>
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
          <a class="nav-link text-secondary" aria-current="page" href="#"><i class="fa-duotone fa-house"></i>
            <strong>HOME</strong> | หน้าหลัก</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-secondary" aria-current="page" href="#"><i class="fa-duotone fa-store"></i>
              <strong>STORE</strong> | ร้านค้า</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link text-secondary" aria-current="page" href="#"><i class="fa-duotone fa-coins"></i>
            <strong>TOPUP</strong> | เติมพอยท์</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-secondary" aria-current="page" href="#"><i class="fa-duotone fa-rectangle-barcode"></i>
            <strong>CODE</strong> | กรอกโค้ด</a>
        </li>
      </ul>
    </div>
  </div>
  </nav>

  <!-- ตัว page หลัก -->

  <div class="row mt-5">
    <!-- ปรับ col-lg-8 เป็น col-lg-12 ถ้าอยากให้รูปภาพใหญ่ แล้วไม่อยาให้ members แบ่งฝังกับ row
    แล้วก็ปรับ div ข้างขนจาก mt-5 เป็น mt-3 เพราะมันเว้นกว้างไป -->
    <div class="col-12 col-md-8 col-lg-8">
      <div class="card rounded-5">
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
      <br>
      <div class="col-12">
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
                  <br>
                  <br>
                  <span class="text-secondary"><i class="fa-duotone fa-desktop"></i><strong> IP</strong> | ไอพีเซิร์ฟเวอร์:
                    <span class="badge text-bg-success" style="font-weight: 500;">mc-villacraft.net</span></span>
                  <br>
                  <span class="text-secondary"><i class="fa-duotone fa-gamepad-modern"></i><strong> VERSION</strong> |
                    เวอร์ชั่น: <span class="badge text-bg-success" style="font-weight: 500;">1.18.2 ถึง 1.20.1+</span></span>
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
  <div class="col-12 col-md-6 col-lg-4 mb-md-2">
    <div class="row">
      <div class="col-12">
        <div class="card rounded-2">
          <div class="card-body">
            <button class="button btn btn-success rounded-2 mb-2"><i class="fa-duotone fa-users"></i> Members | ระบบสมาชิก</button>
            <div class="collapse1" id="collapseExample">
            <img class="w-100 rounded-2" src="pic/login.png" align="center" alt="">
            <hr>
            <span class="tab-button w-100 p-4 gap-2 me-1 py-2 text-secondary" align="start"><i class="fa-duotone fa-user-plus me-1"></i>
              <strong>REGISTER</strong> | สมัครสมาชิก</span>
            <span class="tab-button w-100 p-4 gap-2 me-1 py-2 mt-2 text-secondary" align="start"><i class="fa-duotone fa-user-unlock me-1"></i></i>
              <strong>LOGIN</strong> | เข้าสู่ระบบ</span>
            </div>
          </div>
      </div>
    </div>
  </div>
    <div class="row mt-4">
      <div class="col-12">
        <div class="card rounded-2">
          <div class="card-body">
            <button class="button btn btn-success rounded-2 mt-2 mb-2"><i class="fa-duotone fa-users"></i> Status | ระบบปฎิบัติการ</button>
            <img class="w-100 rounded-2" src="pic/login.png" align="center" alt="">
            <hr>
              <div class="d-flex justify-content-between ms-1">
                <div>
                <span class="text-secondary" align="start"><i class="fa-duotone fa-desktop"></i>
                  <strong>IP</strong> | ไอพีเซิร์ฟเวอร์: <h5><span class="badge text-bg-success" style="font-weight: 500;"><?php echo $setting['ip_server']; ?></span></h5></span>
                </div>
                <div class="text-center">
                <span class="text-secondary" align="end"><i class="fa-duotone fa-gamepad-modern"></i>
                  <strong>VERSION</strong> | เวอร์ชั่น: <h5><span class="badge text-bg-success" style="font-weight: 500;"><?php echo $setting['version_server']; ?></span></h5></span>
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
                  <strong>STATUS</strong> | สถานะ: <h5><span id="sta"></span></h5></span>
  
                </div>
                <div class="text-center">
                <span class="text-secondary" align="end"><i class="fa-duotone fa-users"></i>
                  <strong>PLAYERS</strong> | ผู้เล่นออนไลน์: <h5 style="font-weight: 500;"><span id="bar"></h5></span>
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
              <button class="button btn btn-success rounded-2 mb-2"><i class="fa-duotone fa-bars"></i> Menus | ระบบเมนูต่างๆ</button>
              <img class="w-100 rounded-2" src="pic/login.png" align="center" alt="">
              <hr>
              <span class="tab-button w-100 p-4 gap-2 me-1 py-2 text-secondary" align="start"><i class="fa-duotone fa-house me-1"></i>
                <strong>HOME</strong> | หน้าหลัก</span>
              <span class="tab-button w-100 p-4 gap-2 me-1 py-2 mt-2 text-secondary" align="start"><i class="fa-duotone fa-store me-1"></i>
                <strong>STORE</strong> | ร้านค้า</span>
              <span class="tab-button w-100 p-4 gap-2 me-1 py-2 mt-2 text-secondary" align="start"><i class="fa-duotone fa-box-open me-1"></i>
                <strong>MYSTERY BOX</strong> | กล่องสุ่มไอเท็ม</span>
              <span class="tab-button w-100 p-4 gap-2 me-1 py-2 mt-2 text-secondary" align="start"><i class="fa-duotone fa-user-tag me-1"></i>
                <strong>RANK</strong> | ยศ</span>
              <span class="tab-button w-100 p-4 gap-2 me-1 py-2 mt-2 text-secondary" align="start"><i class="fa-duotone fa-coins me-1"></i>
                <strong>TOPUP</strong> | เติมพอยท์</span>
              <span class="tab-button w-100 p-4 gap-2 me-1 py-2 mt-2 text-secondary" align="start"><i class="fa-duotone fa-clock-rotate-left me-1"></i>
                <strong>CODE</strong> | กรอกโค้ด</span>
              <span class="tab-button w-100 p-4 gap-2 me-1 py-2 mt-2 text-secondary" align="start"><i class="fa-duotone fa-coins me-1"></i>
                <strong>HISTORY</strong> | ประวัติ</span>
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
<div class="card border-1 shadow mb-4">                         
			<div class="card-body">	
                <div class="row">
          <div class="col-lg-12 mt-0">
		  <div class="card-img">
			<div id="demo" class="carousel slide" data-ride="carousel">
			  <ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				        <li data-target="#demo" data-slide-to="1" class=""></li>
                <li data-target="#demo" data-slide-to="2" class=""></li>
                <li data-target="#demo" data-slide-to="3" class=""></li>
			  </ul>
			  <div class="carousel-inner">
				<div class="carousel-item active">
				  <img src="https://media.discordapp.net/attachments/781783602504794135/1121810793441275944/villacraft_banner_beta.png" class="rounded">
				</div>
        </div>
        </div>
			</div>
</span>
          </div>
        </div>
      </div>
    </div>
    <div class="card border-1 shadow mb-4">                         
       <!--<div class="card-header bg-warning  btn-line-b black_line" style="color:#FFF"><b><i class="fas fa-server" aria-hidden="true"></i> รายละเอียดเซิร์ฟเวอร์ </b></div>-->
			<div class="card-body">	
                <div class="row">
          <div class="col-lg-12 mt-0">
		  <div class="card">
			<div id="demo" class="carousel">
			</div>
		  </div>
    </div>
          <div class="col-lg-3">
            <img src="https://media.tenor.com/hqWkeIAq2O4AAAAC/minecraft-piglin.gif" width="70%" alt="post-img">
          </div>
          <div class="col-lg-9">
            <span class="post-h1"><h4 style="font-family:Kanit;">📃 รายละเอียดเซิร์ฟเวอร์ 📃</h4></span>
            <hr>
            <span class="post-h4">
            <i class="fa fa-desktop"></i> ไอพีเซิร์ฟเวอร์ :  <br>
            <i class="fa fa-plug"></i> เวอร์ชั่นตัวเกม : <br>
            <i class="fab fa-discord"></i> ดิสคอร์ด : <a href="">Coming Soon...</a> <br> <!--แก้ไขลิงค์ที่ config.php-->
            <i class="fa fa-facebook-official"></i> FANPAGE : <a href="">Coming Soon...</a><br>
             </span>
            <hr>
            <span class="post-h4">
            <span class="post-h1"><h4 style="font-family:Kanit;">🌅 Villacraft SHOP 🌅</h4></span>
            <p style="font-family:Kanit; font-size:15px">อัตตราการเติมเงิน | EXCHANGE RATE</p>
            <hr>
            <button type="button" class="btn btn-primary btn-sm">1 บาท</button> = <button type="button" class="btn btn-success btn-sm">1 พอยท์</button><br>
            <br>
            <button type="button" class="btn btn-success btn-sm">พอยท์</button>&nbsp;พ้อยท์ไว้ใช้สำหรับซื้อสินค้าที่หน้าเว็บเท่านั้น</br>
            <a href="https://discord.gg/mtCR9SCSZG" style="color:orange; font-size:15px">พบปัญหาการเติมเงินกดที่นี่เลย!</a>
            <hr>
            <br>
          </div>
        </div>
      </div>
    </div>

<!--<div class="card border-1 shadow mb-4">                     
       <div class="card-header bg-primary" style="color:#FFF"><b><i class="fas fa-coffee" aria-hidden="true"></i> สินค้าล่าสุด</b></div>
			<div class="card-body">				
							<div class="row mb-3">
							<div class="dropdown col-auto show">
							  
								<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                             <?php
                                    $sql_bungeecord = 'SELECT * FROM bungeecord';
                                      $query_bungeecord = $connect->query($sql_bungeecord);
                                      while($server_bungeecord = $query_bungeecord->fetch_assoc())
                                      {
                                        if(isset($_GET['category']))
                                        {
                                          echo '<a href="?page=shop&category='.$_GET['category'].'&server='.$server_bungeecord['id'].'" class="dropdown-item">'.$server_bungeecord['name_server'].'</a>';
                                        }
                                        else
                                        {
                                          echo '<a href="?page=shop&server='.$server_bungeecord['id'].'" class="dropdown-item">'.$server_bungeecord['name_server'].'</a>';
                                        }
                                      }

                                  ?>
								</div>
							</div>	    
							<div class="dropdown col-auto show">
				
							  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
								<?php 
									$sql_cat = $connect->query('SELECT * FROM category');
									while($result__ = $sql_cat->fetch_assoc()) {
										
								
								?>
								<a class="dropdown-item" href="?page=shop&category=<?php echo $result__['id']; ?>&server=<?php echo $_GET['server']?>"><?php echo $result__['name']; ?></a>
								<?php 
									}
								?>
							  </div>
							</div>
								  </div>                                 
                            <div class="row"><br>
                             <?php
                                if(isset($_GET['page']) && $_GET['page'] != 'shop')
                                {
                                  $sql_product = 'SELECT * FROM shop ORDER BY id DESC';
                                }
                                else
                                {
                                  $sql_product = 'SELECT * FROM shop';
                                }

                                if(isset($_GET['server']) && is_numeric($_GET['server']))
                                {
                                  $sql_product .= ' WHERE server_id = "'.$_GET['server'].'"';
                                }

                                if(isset($_GET['category']) && is_numeric($_GET['category']))
                                {
                                  if(isset($_GET['server']) && is_numeric($_GET['server']))
                                  {
                                    $sql_product .= ' AND category = "'.$_GET['category'].'"';
                                  }
                                  else
                                  {
                                    $sql_product .= ' WHERE category = "'.$_GET['category'].'"';
                                  }
                                }

                                if(isset($_GET['page']) && $_GET['page'] != 'shop')
                                {
                                  $sql_product .= ' LIMIT 12';
                                }
                                elseif(!isset($_GET['page']))
                                {
                                  $sql_product .= ' LIMIT 12';
                                }

                                $query_product = $connect->query($sql_product);

                                if($query_product->num_rows <= 0)
                                {
                                  echo "<h5 class='col-md-12 text-center'>เลือกเซิฟเวอร์ที่จะซื้อครับ</h5>";
                                }
                                else
                                {
                                  while($product = $query_product->fetch_assoc())
                                  { ?>
                <div class="col-md-3">
            <div class="item" style="margin-bottom: 10px;">
              <div class="item-image">
              <a class="item-image-price"><?php echo number_format($product['price'], 2); ?> POINT</a>
              <center><img src="<?php echo $product['pic']; ?>"></center>
              <a class="item-image-bottom"><?php echo $product['name']; ?></a>
            </div>
              <div class="item-info">
                <div class="item-text">
				  <a style="font-size: 18px;"><?php echo $product['name']; ?></a><hr>
                  <a href="?page=confirm&id=<?php echo $product['id']; ?>" class="btn btn-primary w-100 mb-1 border-0">กดเพื่อซื้อสินค้า</a>
				  <hr/>
				  <p><?php echo $product['info']; ?></p>
				</div>
              </div>
            </div>
              </div> 
			  
	                                <?php } } ?>
									
                                </div>
                            </div>
                        </div>-->

<!--<div class="card border-1 shadow mb-4">                         
       <div class="card-header bg-danger  btn-line-b black_line" style="color:#FFF"><b><i class="fa fa-YouTube" aria-hidden="true"></i> วิธีการเติมเงิน </b></div>
			<div class="card-body">	
                <div class="row">
                                <iframe iframe height="315" style="width:100%;" src='https://www.youtube.com/embed/<?php echo $setting['youtube_watch']; ?> 'frameborder="0" allowfullscreen=""></iframe>

								<div class="input-group col-md-4 mb-2">
									
								</div>
							</div>
						</form>
					</div>
				</div>-->
<div class="card border-1 shadow mb-4"  style="font-family:Kanit;">                     
       <div class="card-header bg-dark" ">
	   <div class="container" align="center">
	   <img src="<?php echo $setting['icon']; ?>" style="width:200px; height:200px;">
	   <div class="co-ml-4"><hr>
                        <h3 style="color:#FFFF; font-family:Kanit;">เซิร์ฟเวอร์ <?php echo $setting['name_server']; ?></h3>
                        <span class="copyIpSpan">
                            <span class="ndzn-js--playercount"><h4 style="color:#FFFF; font-family:Kanit;"><?php echo $setting['detail_server']; ?></h4></span>
                            
                        </span>
                    </div>					
		         </div>	
		      </div>
			</div>
    