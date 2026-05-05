<?php if(!$_SESSION['username']){ ?>
<div class="card card-transparent">
						 <div class="col-lg-13">
                            <div class="card-header bg-dark text-white">เข้าสู่ระบบ LOGIN</div>
							</div>
							                        <div class="card-body">
							<div class="container" align="center"><br>
							<img class="animation" style="width: 20%;" src="https://media.tenor.com/9Ez46wr-voMAAAAC/lock.gif">
                            <div class="container" align="center">
                                <div class="col-md-6 mb-2"><br>
                                    <form method="post" action="">
                                  <input type="hidden" name="login_submit">
                                <div class="form-group">
                                    <input type="text"  name="username" class="form-control" placeholder="Username : ชื่อตัวละคร ">
                                </div>
                                <div class="form-group">
                                    <input type="password"  name="password" class="form-control" placeholder="Password : รหัสผ่าน ">
                                </div>
                                        <button type="submit" class="btn btn-block btn-outline-info mb-3"><i class="fa fa-sign-in fa-fw"></i> เข้าสู่ระบบ</button>
                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
<?php }else{ 
     include_once __DIR__.'/home.php';
} ?>
