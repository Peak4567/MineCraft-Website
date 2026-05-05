<?php



if(isset($_POST['btn_add_loot'])) {

	$name = $connect->real_escape_string($_POST['loot_name']);
	$desc_ = $connect->real_escape_string($_POST['loot_desc']);
	$img = $connect->real_escape_string($_POST['loot_img']);
	$cmd = $connect->real_escape_string($_POST['loot_cmd']);
	$rate = $connect->real_escape_string($_POST['loot_rate']);
	$tier = $connect->real_escape_string($_POST['loot_tier']);
	$sv_id = $connect->real_escape_string($_POST['loot_sv']);

	$loot_add = $connect->query("INSERT INTO `loot` (`id`, `name`, `desc_`, `cmd`, `img`, `rate`, `tier`, `sv_id`) VALUES (NULL, '$name', '$desc_','$cmd', '$img', '$rate', '$tier', '$sv_id');");

	header('refresh: 1;');
}


if(isset($_GET['delete'])) {
	$id = $connect->real_escape_string($_GET['delete']);
	$delete = $connect->query("DELETE FROM `loot` WHERE `id` = $id");
	if($delete) {
		header("Location: ?page=backend&menu=loot");
	}
}



?>
<div class="row">
	<div class="col-md-12 mb-2">
		<span class="is-divider" data-content="ตั้งค่า Wallet Account" style="margin: 1.5rem 0;"></span>
	</div>
</div>
<h4 class="mb-3 text-center">
	ระบบสุ่มไอเทม <small>#Loot Box System</small>
</h4>


<form method="post">
	<div class="form-group">
		<label for="exampleFormControlInput1">ชื่อไอเทม</label>
		<input type="text" class="form-control" name="loot_name" placeholder="ชื่อไอเทม" required>
	</div>
	<div class="form-group">
		<label for="exampleFormControlInput1">อธิบาย</label>
		<input type="text" class="form-control" name="loot_desc" placeholder="คำอธิบายเกี่ยวกับไอเทม แนะนำอักษรไม่เกิน 23 ตัว หากเกินใช้ <br /> ขึ้นบรรทัดใหม่ได้" required>
	</div>
	<div class="form-group">
		<label for="exampleFormControlInput1">ลิงค์รูปภาพ</label>
		<input type="url" class="form-control" name="loot_img" placeholder="ลิงค์รูปภาพ คำแนะนำให้ใช้รุปภาพขนาด 350x350" required>
	</div>
	<div class="form-group">
		<label for="exampleFormControlInput1">คำสั่ง</label>
		<input type="text" class="form-control" name="loot_cmd" placeholder="คำสั่ง เช่น give {}" required>
	</div>
	<div class="form-group">
		<label for="exampleFormControlSelect1">เลือกเซิฟเวอร์</label>
		<select class="form-control" name="loot_sv" required>
			<?php
			
			$sv_list = $connect->query("SELECT * FROM `bungeecord`");
				
			while($sv = $sv_list->fetch_assoc()) {
			?>
				<option value="<?php echo $sv['id']; ?>"><?php echo $sv['name_server']; ?></option>
			<?php 
			}
			?>
		</select>
	</div>
	<br/>
	<div class="form-group">
		<label for="exampleFormControlInput1">เรตไอเทม ( Rate )</label>
		<input type="number" min=1 max=100 class="form-control" name="loot_rate" placeholder="โอกาศที่จะได้ 1-100" required>
	</div>
	<div class="form-group">
		<label for="exampleFormControlSelect1">ระดับของไอเทม ( Tier )</label>
		<select class="form-control" name="loot_tier">
			<option style="color:black; background: #1eff00;" selected value="Common">Common</option>
			<option style="color:black; background: #a335ee;" value="Rare">Rare</option>
			<option style="color:black; background: #ff8000;" value="Legendary">Legendary</option>
		</select>
	</div>

	<div class="col">
		<button type="submit" name="btn_add_loot" class="btn btn-primary btn-block">เพิ่มไอเทม</button>
	</div>

</form>


<div class="container">
	<div class="row">
		<div class="col-12">
			<table class="table table-image">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">IMG</th>
						<th scope="col">NAME</th>
						<th scope="col">DESC</th>
						<th scope="col">RATE</th>
						<th scope="col">TIER</th>
						<th scope="col">Command</th>
						<th scope="col">SERVER_ID</th>
						<th scope="col">ACTION</th>
					</tr>
				</thead>
				<tbody>
					<?php 

					$item = $connect->query("SELECT * FROM loot");
					
					while($row = $item->fetch_assoc()) {
					?>
					<tr>
						<th scope="row"><?php echo $row['id']; ?></th>
						<td class="w-25">
							<img src="<?php echo $row['img']; ?>" width="50" height="50" alt="Sheep">
						</td>
						<td><?php echo $row['desc_']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['rate']; ?></td>
						<td><?php echo $row['tier']; ?></td>
						<td><?php echo $row['cmd']; ?></td>
						<td><?php echo $row['sv_id']; ?></td>
						<td><a class="btn btn-primary" href="?page=backend&menu=loot&delete=<?php echo $row['id']; ?>">Delete</a></td>
					</tr>
					<?php } ?> 
				</tbody>
			</table>
		</div>
	</div>
</div>