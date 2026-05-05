<div class="container">
	<div class="row mt-5">
	<div class="col-lg-12 ml-auto">
	<div class="card border-0 shadow mb-4">
	<div class="card-header bg-success text-white">ประวัติเติมเงิน History</div>
                        <div class="card-body">
                            <br>
                            			<table class="table table-default table-striped table-condenseds">
				<thead>
					<tr>
						<th style="background-color: #FFF; font-family:Kanit;" class="text-dark">รหัสรายการ</th>
						<th style="background-color: #FFF; font-family:Kanit;" class="text-center text-dark">ชื่อตัวละคร</th>
						<th style="background-color: #FFF; font-family:Kanit;" class="text-center text-dark">รายละเอียด</th>
						<th style="background-color: #FFF; font-family:Kanit;" class="text-center text-dark">เวลา</th>
						<th style="background-color: #FFF; font-family:Kanit;" class="text-center text-dark">จำนวนเงิน (บาท)</th>
						<th style="background-color: #FFF; font-family:Kanit;" class="text-center text-dark">อ้างอิง</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql_list_topup = 'SELECT * FROM activities WHERE username = "'.$_SESSION['username'].'" order by id desc';
						$query_list_topup = $connect->query($sql_list_topup);
						$i = 0;
						if($query_list_topup->num_rows != 0)
						{
							while($list_topup = $query_list_topup->fetch_assoc())
							{
								$i++;
								echo '
									<tr>
										<td style="font-family:Kanit;" class="text-left">'.$list_topup['id'].'</td>
										<td style="font-family:Kanit;" class="text-center">'.$list_topup['username'].'</td>
										<td style="font-family:Kanit;"class="text-center">'.$list_topup['action'].'</td>
										<td style="font-family:Kanit;" class="text-center">'.$list_topup['date'].'</td>
										<td style="font-family:Kanit;" class="text-center">'.  number_format($list_topup['topup_amount']).'</td>
										<td style="font-family:Kanit;" class="text-center">'.$list_topup['transaction'].'</td>
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
	</div>

	</div>
</div>