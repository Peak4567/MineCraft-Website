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
        <style data-href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;200;300;400;500;600;700;800;900&display=swap">
            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 100;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_9XJnvUD7dzB2CA9ob.woff) format('woff')
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 200;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Cr_s4bQ.woff) format('woff')
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 300;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Cy_g4bQ.woff) format('woff')
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W__XJnvUD7dzB26ZA.woff) format('woff')
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 500;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Ck_k4bQ.woff) format('woff')
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 600;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Cv_44bQ.woff) format('woff')
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2C2_84bQ.woff) format('woff')
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 800;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Cx_w4bQ.woff) format('woff')
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 900;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2C4_04bQ.woff) format('woff')
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 100;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_9XJnvUD7dzB2CA-oLTkYBeZ0lTiM.woff2) format('woff2');
                unicode-range: U+0E01-0E5B,U+200C-200D,U+25CC
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 100;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_9XJnvUD7dzB2CA-oQTkYBeZ0lTiM.woff2) format('woff2');
                unicode-range: U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+1EA0-1EF9,U+20AB
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 100;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_9XJnvUD7dzB2CA-oRTkYBeZ0lTiM.woff2) format('woff2');
                unicode-range: U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 100;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_9XJnvUD7dzB2CA-ofTkYBeZ0l.woff2) format('woff2');
                unicode-range: U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 200;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Cr_sIfWMuUZctdhow.woff2) format('woff2');
                unicode-range: U+0E01-0E5B,U+200C-200D,U+25CC
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 200;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Cr_sIZmMuUZctdhow.woff2) format('woff2');
                unicode-range: U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+1EA0-1EF9,U+20AB
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 200;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Cr_sIZ2MuUZctdhow.woff2) format('woff2');
                unicode-range: U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 200;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Cr_sIaWMuUZctdg.woff2) format('woff2');
                unicode-range: U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 300;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Cy_gIfWMuUZctdhow.woff2) format('woff2');
                unicode-range: U+0E01-0E5B,U+200C-200D,U+25CC
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 300;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Cy_gIZmMuUZctdhow.woff2) format('woff2');
                unicode-range: U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+1EA0-1EF9,U+20AB
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 300;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Cy_gIZ2MuUZctdhow.woff2) format('woff2');
                unicode-range: U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 300;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Cy_gIaWMuUZctdg.woff2) format('woff2');
                unicode-range: U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W__XJnvUD7dzB2KdNodREEje60k.woff2) format('woff2');
                unicode-range: U+0E01-0E5B,U+200C-200D,U+25CC
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W__XJnvUD7dzB2Kb9odREEje60k.woff2) format('woff2');
                unicode-range: U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+1EA0-1EF9,U+20AB
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W__XJnvUD7dzB2KbtodREEje60k.woff2) format('woff2');
                unicode-range: U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W__XJnvUD7dzB2KYNodREEjew.woff2) format('woff2');
                unicode-range: U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 500;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Ck_kIfWMuUZctdhow.woff2) format('woff2');
                unicode-range: U+0E01-0E5B,U+200C-200D,U+25CC
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 500;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Ck_kIZmMuUZctdhow.woff2) format('woff2');
                unicode-range: U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+1EA0-1EF9,U+20AB
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 500;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Ck_kIZ2MuUZctdhow.woff2) format('woff2');
                unicode-range: U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 500;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Ck_kIaWMuUZctdg.woff2) format('woff2');
                unicode-range: U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 600;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Cv_4IfWMuUZctdhow.woff2) format('woff2');
                unicode-range: U+0E01-0E5B,U+200C-200D,U+25CC
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 600;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Cv_4IZmMuUZctdhow.woff2) format('woff2');
                unicode-range: U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+1EA0-1EF9,U+20AB
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 600;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Cv_4IZ2MuUZctdhow.woff2) format('woff2');
                unicode-range: U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 600;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Cv_4IaWMuUZctdg.woff2) format('woff2');
                unicode-range: U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2C2_8IfWMuUZctdhow.woff2) format('woff2');
                unicode-range: U+0E01-0E5B,U+200C-200D,U+25CC
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2C2_8IZmMuUZctdhow.woff2) format('woff2');
                unicode-range: U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+1EA0-1EF9,U+20AB
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2C2_8IZ2MuUZctdhow.woff2) format('woff2');
                unicode-range: U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2C2_8IaWMuUZctdg.woff2) format('woff2');
                unicode-range: U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 800;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Cx_wIfWMuUZctdhow.woff2) format('woff2');
                unicode-range: U+0E01-0E5B,U+200C-200D,U+25CC
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 800;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Cx_wIZmMuUZctdhow.woff2) format('woff2');
                unicode-range: U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+1EA0-1EF9,U+20AB
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 800;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Cx_wIZ2MuUZctdhow.woff2) format('woff2');
                unicode-range: U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 800;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2Cx_wIaWMuUZctdg.woff2) format('woff2');
                unicode-range: U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 900;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2C4_0IfWMuUZctdhow.woff2) format('woff2');
                unicode-range: U+0E01-0E5B,U+200C-200D,U+25CC
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 900;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2C4_0IZmMuUZctdhow.woff2) format('woff2');
                unicode-range: U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+1EA0-1EF9,U+20AB
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 900;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2C4_0IZ2MuUZctdhow.woff2) format('woff2');
                unicode-range: U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF
            }

            @font-face {
                font-family: 'Prompt';
                font-style: normal;
                font-weight: 900;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/prompt/v10/-W_8XJnvUD7dzB2C4_0IaWMuUZctdg.woff2) format('woff2');
                unicode-range: U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD
            }
        </style>
    </head>
    <body>
        <div id="__next">
            <div data-overlay-container="true">
                <style>
                    #nprogress {
                        pointer-events: none;
                    }

                    #nprogress .bar {
                        background: #f887a4;
                        position: fixed;
                        z-index: 9999;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 2px;
                    }

                    #nprogress .peg {
                        display: block;
                        position: absolute;
                        right: 0px;
                        width: 100px;
                        height: 100%;
                        box-shadow: 0 0 10px #f887a4, 0 0 5px #f887a4;
                        opacity: 1;
                        -webkit-transform: rotate(3deg) translate(0px, -4px);
                        -ms-transform: rotate(3deg) translate(0px, -4px);
                        transform: rotate(3deg) translate(0px, -4px);
                    }

                    #nprogress .spinner {
                        display: block;
                        position: fixed;
                        z-index: 1031;
                        top: 15px;
                        right: 15px;
                    }

                    #nprogress .spinner-icon {
                        width: 18px;
                        height: 18px;
                        box-sizing: border-box;
                        border: solid 2px transparent;
                        border-top-color: #f887a4;
                        border-left-color: #f887a4;
                        border-radius: 50%;
                        -webkit-animation: nprogresss-spinner 400ms linear infinite;
                        animation: nprogress-spinner 400ms linear infinite;
                    }

                    .nprogress-custom-parent {
                        overflow: hidden;
                        position: relative;
                    }

                    .nprogress-custom-parent #nprogress .spinner, .nprogress-custom-parent #nprogress .bar {
                        position: absolute;
                    }

                    @-webkit-keyframes nprogress-spinner {
                        0% {
                            -webkit-transform: rotate(0deg);
                        }

                        100% {
                            -webkit-transform: rotate(360deg);
                        }
                    }

                    @keyframes nprogress-spinner {
                        0% {
                            transform: rotate(0deg);
                        }

                        100% {
                            transform: rotate(360deg);
                        }
                    }
                </style>