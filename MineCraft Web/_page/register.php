
<?php if(!$_SESSION['username']){ ?>
<div class="card card-transparent" style="background-color: rgba(255, 255, 255, 0.4);">
            <div class="card-header bg-dark text-white">สมัครสมาชิก Register</div>
				<div class="card-body">
					</div>
						<div class="container" align="center">
							<img class="animation" style="width: 20%;" src="https://media.tenor.com/9Ez46wr-voMAAAAC/lock.gif">
								</div>
                            <hr>
	<?php
		if(isset($_POST['register_submit']))
		{
					$reg_username = strtolower($connect->real_escape_string($_POST['username']));
					$reg_realname = $connect->real_escape_string($_POST['username']);
					$reg_password = $connect->real_escape_string($_POST['password']);
					$reg_con_password = $connect->real_escape_string($_POST['con_password']);
					$reg_email = $connect->real_escape_string($_POST['email']);

					if(empty($_POST['username'])) 
					{
						$msg = 'พบข้อผิดพลาด Username';
						$alert = 'error';
						$msg_alert = 'เกิดข้อผิดพลาด!';
					}
					elseif(strlen($_POST['username']) < 3)
					{
						$msg = 'Username ต้องมี 3 ตัวขึ้นไป';
						$alert = 'error';
						$msg_alert = 'เกิดข้อผิดพลาด!';
					}
					
					elseif(empty($_POST['password'])) 
					{ 
						$msg = 'พบข้อผิดพลาด กรุณาตรวจสอบ Password';
						$alert = 'error';
						$msg_alert = 'เกิดข้อผิดพลาด!';
					}
					elseif(empty($_POST['email'])) 
					{
						$msg = 'กรุณากรอก Email';
						$alert = 'error';
						$msg_alert = 'เกิดข้อผิดพลาด!';
					}
					elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
					{
						$msg = 'กรุณากรอก Email ให้ถูกต้อง';
						$alert = 'error';
						$msg_alert = 'เกิดข้อผิดพลาด!';
					}
					elseif($reg_password != $reg_con_password)
					{
						$msg = 'กรุณากรอกรหัสผ่านให้ตรงกัน';
						$alert = 'error';
						$msg_alert = 'เกิดข้อผิดพลาด!';
					}
					else
					{
						$check_ip = $connect->query("SELECT * FROM authme WHERE ip = '".$_SERVER['REMOTE_ADDR']."'");
						$numrow_ip = $check_ip->num_rows;
						if($numrow_ip > $setting['max_reg'])
						{
							$msg = 'คุณสมัคสมาชิกเกินจํานวน';
							$alert = 'error';
							$msg_alert = 'เกิดข้อผิดพลาด!';
						}
						else
						{
							$check = $connect->query("SELECT * FROM authme WHERE username = '".$reg_username."'");
							$numrow = $check->num_rows;
							if($numrow > 0)
							{
								$msg = 'Username มีคนใช้แล้ว';
								$alert = 'error';
								$msg_alert = 'เกิดข้อผิดพลาด!';
							}
							else
							{
								$insert = $connect->query("INSERT INTO authme (username,realname,password,ip,email) VALUES('".$reg_username."','".$reg_realname."','".hashPassword($reg_password)."','".$_SERVER['REMOTE_ADDR']."','".$reg_email."')");
								if($insert)
								{
									$msg = 'สมัครสมาชิกสําเร็จ';
									$alert = 'success';
									$msg_alert = 'สำเร็จ!';
								}
								else
								{
									$msg = 'พบข้อผิดพลาด';
									$alert = 'error';
									$msg_alert = 'เกิดข้อผิดพลาด!';
								}
							}
						}
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
	<form name="register" method="POST">
		<div class="container" align="center">
			<div class="col-md-5 mb-3">
				<input type="text" class="form-control" name="username" placeholder="Username" style="background-color: rgba(255, 255, 255, 0.4);"></input>
			</div>
			<div class="col-md-5 mb-3">
				<input name="password" class="form-control" type="password" placeholder="Password"  style="background-color: rgba(255, 255, 255, 0.4);"></input>
			</div>
			<div class="col-md-5 mb-3">
				<input name="con_password" class="form-control" type="password" placeholder="Confirm Password"  style="background-color: rgba(255, 255, 255, 0.4);"></input>
			</div>
			<div class="col-md-5 mb-3">
				<input name="email" class="form-control" type="email" placeholder="contact@hmpr.xyz"  style="background-color: rgba(255, 255, 255, 0.4);"></input>
			</div>
		</div>
		<?php
			if(isset($_POST['register_submit']))
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
				<div class="container" align="center"><br>
				<div class="col-md-5 mb-0">
					<input name="register_submit" class="btn btn-block btn-outline-success" type="submit" value="สมัครสมาชิก"/><br>
				<?php
			}
		?>
		</hr>
	</form>
</div>
      </div>
	        </div>
							        <br>
<?php }else{ 
     include_once __DIR__.'_page/login.php';
} ?>