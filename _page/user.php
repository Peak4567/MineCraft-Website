	<?php
		if(!isset($_SESSION['uid']) || !isset($_SESSION['username']))
		{
                    include_once '_page/userLogin.php';
		}
		else
		{
			?>
<text style="font-size: 10px;"> 
<center><img src="https://minotar.net/avatar/<?php echo $_SESSION['realname']; ?>/120"><br></center>
<br>
	<br>
<div class="card border-0 shadow mb-3">
    <div class="card-header bg-Secondary" style="color: white;"><i class="fa fa-exchange"></i>&nbsp;ข้อมูลผู้ใช้งาน</div>
	   <div class="card-body">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text lp-title-input">&nbsp;USERNAME</span>
  </div>
    <input type="text" name="username" disabled="" value="<?php echo $_SESSION['realname']; ?>" id="username" class="form-control form-control-lg lp-input"></input>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text lp-title-input">&nbsp;POINTS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
  </div>
    <input type="text" name="username" disabled="" value="<?php echo number_format($player['points']); ?>.00 พ้อยท์" id="username" class="form-control form-control-lg lp-input"></input>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text lp-title-input">&nbsp;TOPUP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
  </div>
    <input type="text" name="username" disabled="" value="<?php echo number_format($player['rp']); ?>.00 พ้อยท์" id="username" class="form-control form-control-lg lp-input"></input>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text lp-title-input">&nbsp;EMAIL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
  </div>
    <input type="text" name="username" disabled="" value="<?php echo $player['email'] ?>" id="username" class="form-control form-control-lg lp-input"></input>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text lp-title-input">&nbsp;IP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
  </div>
    <input type="text" name="username" disabled="" value="<?php echo $player['ip'] ?>" id="username" class="form-control form-control-lg lp-input"></input>
</div>

  </div>
</div>

			<?php
		}
	?>
