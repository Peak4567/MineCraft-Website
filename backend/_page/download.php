<?php
                if(isset($_GET['download']))
			{
				$sql_delete = 'DELETE FROM download WHERE id = "'.$_GET['download'].'"';
				$query_delete = $connect->query($sql_delete);

				if($query_delete)
				{
                                        $msg = 'Delete Download : '.$_GET['id'].' เรียบร้อยแล้ว';
                                        $alert = 'success';
                                        $msg_alert = 'สำเร็จ!';
                                        //* REFRESH
                                        echo '<meta http-equiv="refresh" content="1;url=?page=backend&menu=download">';
				}
				else
				{
                                    $msg = 'ไม่สามารถลบ download : '.$_GET['id'].' ได้ในขณะนี้';
                                        $alert = 'error';
                                        $msg_alert = 'ผิดพลาด!';
                                        //* REFRESH
                                        echo '<meta http-equiv="refresh" content="1;url=?page=backend&menu=download">';
				}	?>
                               <script>
                                                            swal("<?php echo $msg_alert; ?>", "<?php echo $msg; ?>", "<?php echo $alert; ?>", {
                                                                    button: "Reload",
                                                            })
                                                            .then((value) => {
                                                                    window.location.href = window.location.href;
                                                            });
                                                    </script>
                               <?php }
		if(isset($_POST['download_submit']))
		{
                        $time_date = date("Y-m-d H:i");
                        $download = $connect->real_escape_string($_POST['download']);
                        $check = $connect->query("SELECT * FROM download WHERE download = '".$download."'");
			$numrow = $check->num_rows;
			if($numrow > 0){
                            $msg = 'download นี้มีการเพิ่มไปแล้ว';
				$alert = 'error';
				$msg_alert = 'เกิดข้อผิดพลาด!';
                        }else{
                        $sql_edit_tmtopup = 'INSERT INTO download (code,cmd,status,date) VALUES ("'.$_POST['code'].'",)';
			$query_edit_tmtopup = $connect->query($sql_edit_tmtopup);
                        if($query_edit_tmtopup)
			{
				$msg = 'เพิ่ม Code เรียบร้อย';
				$alert = 'success';
				$msg_alert = 'สำเร็จ!';
			}
			else
			{
				$msg = 'เพิ่ม Code ไม่สำเร็จ';
				$alert = 'error';
				$msg_alert = 'เกิดข้อผิดพลาด!';
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
                                <div class="row">
				<div class="col-md-6">
				</div>
			</div>
                                <div class="alert alert-danger">หากปล่อยช่องCodeให้ว่าง ระบบจะทำการ สุ่มIDCodeให้เอง</div>
			<form name="redeem_submit" method="POST">
				<div class="row">
					<div class="col-md-6 mb-3">
			            <label for="code">ตั้ง IDCode</label>
                                    <input type="text" class="form-control" id="code" name="code" required="">
			        </div>
			        <div class="col-md-6 mb-3">
			            <label for="cmd">จํานวน Point ที่จะให้</label>
                                    <input type="text" class="form-control" id="cmd" name="cmd" required="">
                                    </div>
							<div class="container" align="center"><br>		
			        <div class="col-md-4 mb-3">
			        	<button name="redeem_submit" type="submit" class="btn btn-primary btn-block">
			        		เพิ่มLink download
			        	</button>
			        </div>
					</div>
			    </div>
			</form><br><br>
                                                 <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-code"></i>  download ทั้งหมดที่มี ( <?php echo $redeem_row; ?> ) Code</h5>
                            <br>
                            			<table class="table table-default table-striped table-condenseds">
				<thead>
					<tr>
						<th style="background-color: #FFF;" class="text-dark">ลําดับ</th>
						<th style="background-color: #FFF;" class="text-center text-dark">Code</th>
						<th style="background-color: #FFF;" class="text-center text-dark">จำนวนเงิน</th>
						<th style="background-color: #FFF;" class="text-center text-dark">เวลา</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql_list_redeem = 'SELECT * FROM redeem ORDER BY id ASC';
						$query_list_redeem = $connect->query($sql_list_redeem);
						$i = 0;
						if($query_list_redeem->num_rows != 0)
						{
							while($list_redeem = $query_list_redeem->fetch_assoc())
							{
								$i++;
								echo '
									<tr>
										<td class="text-left">'.$list_redeem['id'].'</td>
										<td class="text-center"><a href="?page=backend&menu=redeem&code='.$list_redeem['id'].'">'.$list_redeem['code'].'</a></td>
										<td class="text-center">'.$list_redeem['cmd'].'</td>
										<td class="text-center">'.$list_redeem['date'].'</td>
									</tr>
								';
							}
						}
						else
						{
							?>
								<tr>
									<td class="text-center" colspan="6">
										ไม่พบข้อมูล
									</td>
								</tr>
							<?php
						}
					?>
				</tbody>
			</table>
                        </div>
                    </div>