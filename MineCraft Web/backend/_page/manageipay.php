
<?php
include_once ('../_system/ipay/config.php');
require_once('../_system/_database.php');
         $sql = "EXPLAIN SELECT * FROM `ipay_ss`;";
		$sql_ipay_ss = 'SELECT * FROM ipay_ss WHERE id = 1';
		$query_ipay_ss = $connect->query($sql_ipay_ss);
		$ipay_ss = $query_ipay_ss->fetch_assoc();

		if(isset($_POST['ipay_submit']))
		{
			$sql_edit_ipay_ss = 'UPDATE ipay_ss SET password = "'.$_POST['api']['password'].'", username = "'.$_POST['api']['username'].'", account_name = "'.$_POST['api']['bank']['account_name'].'", account  = "'.$_POST['api']['bank']['account'].'", bank = "'.$_POST['api']['bank']['bank'].'", key = "'.$_POST['api']['key'].'" WHERE id = 1';
			$query_edit_ipay_ss = $connect->query($sql_edit_ipay_ss);
			if($query_edit_ipay_ss)
			{
				$msg = 'แก้ไขการตั้งค่า ipay เรียบร้อยแล้ว';
				$alert = 'success';
				$msg_alert = 'สำเร็จ!';
				//* ประกาศ
				echo '<div class="alert alert-info"><i class="fa fa-spinner fa-spin fa-lg"></i> <strong>แก้ไขการตั้งค่า ipay เรียบร้อยแล้ว</strong></div>';

				//* REFRESH
				echo "<meta http-equiv='refresh' content='5 ;'>";
			}
			else
			{
				$msg = 'แก้ไขการตั้งค่า ipay สําเร็จ';
				$alert = 'error';
				$msg_alert = 'สำเร็จ!';
				//* ประกาศ
				echo '<div class="alert alert-info"><i class="fa fa-spinner fa-spin fa-lg"></i> <strong>แก้ไขการตั้งค่า ipay ไม่สำเร็จ</strong></div>';

				//* REFRESH
				echo "<meta http-equiv='refresh' content='5 ;'>";
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
		
		$now_month = "-".date("m")."-";
		$sql_list_topup_wallet = 'SELECT * FROM activities WHERE action = "TOPUP b" AND date LIKE "%'.$now_month.'%"';
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




<div class="row">
				<div class="col-md-12 mb-2">
					<span class="is-divider" data-content="ตั้งค่า Wallet Account" style="margin: 1.5rem 0;"></span>
				</div>
			</div>
			<h4 class="mb-3 text-center">
				จัดการระบบเติมเงิน <small>#Wallet Account</small>
			</h4>
			<form name="ipay_ss_settings" method="POST">
				<div class="row">
					<div class="col-md-6 mb-3">
			            <label for="wallet_email">API Username ที่ใช้ login เว็บ ipayverify</label>
			            <input type="text" class="form-control" id="wallet_email" name="wallet_email" required="" value="<?php echo $ipay_ss['username']; ?>">
			        </div>
			        <div class="col-md-6 mb-3">
			            <label for="wallet_password">API Password ที่ใช้ login เว็บ ipayverify</label>
			            <input type="password" class="form-control" id="wallet_password" name="wallet_password" required="" value="<?php echo $ipay_ss['password']; ?>">
			        </div>
			        <div class="col-md-6 mb-3">
			            <label for="wallet_name">ชื่อบัญชี ธนาคาร</label>
			            <input type="text" class="form-control" id="wallet_name" name="wallet_name" required="" value="<?php echo $ipay_ss['account_name']; ?>">
			        </div>
			        <div class="col-md-4 mb-3">
			            <label for="wallet_message">เลขบัญชี</label>
			            <input type="text" class="form-control" id="wallet_message" name="wallet_message" required="" value="<?php echo $ipay_ss['bank']['account']; ?>">
			        </div>
			        <div class="col-md-2 mb-3">
			            <label for="wallet_mutiple">เลือกฌนาคาร</label>
			            <input type="tel" class="form-control" id="wallet_mutiple" name="wallet_mutiple" required="" value="<?php echo $ipay_ss['bank']; ?>">
			        </div>
			        <div class="col-md-12 mb-3">
			            <label for="wallet_reference">Api Key ดูได้ที่หน้า ตัวอย่าง api</label>
			            <input type="text" class="form-control" id="wallet_reference" name="wallet_reference" required="" value="<?php echo $ipay_ss['key']; ?>">
			        </div>
			        <div class="col-md-12 mb-3">
			        	<button name="ipay_submit" type="submit" class="btn btn-primary btn-block">
			        		แก้ไขการตั้งค่าเติมเงิน
			        	</button>
			        </div>
			    </div>
			</form>
