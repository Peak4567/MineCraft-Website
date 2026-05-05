function DetailRandom($id, $Name, $Item, $Price) {
	swal({
		showConfirmButton: false,
		html: '<form method="post" id="onlyform">' +
		'ชื่อกล่อง ' + $Name +  '"<br>' +
		'<hr class="bord">' +
		'ไอเทมที่มีในกล่อง' +
		$Name+
		'<p>ราคาการสุ่ม : '+ $Price +' Coin</p>' +
		'<a class="float-left btn btn-danger" onclick="swal.close()"><i class="fa fa-times"></i> ยกเลิก</a>' +
		'<button type="submit" name="button" class="float-right btn btn-success" value="' + $id + '"><i class="fa fa-check"></i> สุ่ม</button>' +
		'<input name="item_id" type="hidden" id="item_id" value="' + $id + '">'+
		'</form>',
	});
}