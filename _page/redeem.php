<div class="container">
	<div class="row mt-5">
	<div class="col-lg-12 ml-auto">
	<div class="card border-0 shadow mb-3">
<div class="card card-transparent">
						 <div class="col-lg-13">
                            <div class="card-header bg-Info text-white">เติม Code-Key</div>
							                        <div class="card-body">							 
	<?php
		if(!isset($_SESSION['uid']) || !isset($_SESSION['username']))
		{
                    include_once '_page/alertLogin.php';
		}
		else
		{
			?>
		
<form method="post" action="">
            <input type="hidden" name="submit" value="redeem">

<div class="input-group mb-3">
<span class="input-group-text lp-title-input"><i class="fa fa-barcode"></i></span>
<input name="redeem_code" class="form-control lp-input" placeholder="กรอกโค้ด...."></input>
<button type="submit" class="btn btn-dark btn-block w-100 rounded my-2"><i class="fa fa-check"></i>&nbsp;เเลกใช้งานรหัส</button>
</div>


</form>
			<?php
		}
	?>
</div>
</div></div>
</div>
	</div>
	</div>
</div>
