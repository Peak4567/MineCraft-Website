function getSuccess($desc = "à¸ªà¸³à¹€à¸£à¹‡à¸ˆ", $title = "Success !") {
	swal({
		title: $title,
		type: 'success',
		html: $desc,
		confirmButtonColor: '#ff5656',
	});
}

function getError($desc = "à¹€à¸à¸´à¸”à¸‚à¹‰à¸­à¸œà¸´à¸”à¸žà¸¥à¸²à¸”", $title = "Error !") {
	swal({
		title: $title,
		type: 'error',
		html: $desc,
		confirmButtonColor: '#ff5656',
	});
}

function SharePoint(){
	FB.init({
		appId : '350627288897249',
		status  : true,
	    version : 'v2.9'
	});
	FB.ui({
	  	method: 'share',
	  	href: 'https://www.facebook.com/PBDekthai/posts/2189110787978106'
	}, function(response){
		if(response == ""){
			$.ajax({
				type: "POST",
				url: "system/action.php",
				data: "action=sharepoint",
				success: function(result_) {
					var result = JSON.parse(result_);
					switch(result.status){
						case "success":
							getSuccess(result.desc, result.title);
							break;
						case "error":
							getError(result.desc, result.title);
							break;
						default:
							getError();
					}
					if(result.reload == "true"){
						setTimeout(function(){ location.reload(); }, 1500);
					}
				}
			});
		}else {
			getError("à¸à¸²à¸£à¹à¸Šà¸£à¹Œà¸£à¸±à¸šà¸žà¹‰à¸­à¸¢à¸¥à¹‰à¸¡à¹€à¸«à¸¥à¸§!");
		}
	});
}

function ShareItem(){
	FB.init({
		appId : '350627288897249',
		status  : true,
	    version : 'v2.9'
	});
	FB.ui({
	  	method: 'share',
	  	href: 'https://www.facebook.com/PBDekthai/posts/2181172038771981'
	}, function(response){
		if(response == ""){
			$.ajax({
				type: "POST",
				url: "system/action.php",
				data: "action=shareitem",
				success: function(result_) {
					var result = JSON.parse(result_);
					switch(result.status){
						case "success":
							getSuccess(result.desc, result.title);
							break;
						case "error":
							getError(result.desc, result.title);
							break;
						default:
							getError();
					}
					if(result.reload == "true"){
						setTimeout(function(){ location.reload(); }, 1500);
					}
				}
			});
		}else {
			getError("à¸à¸²à¸£à¹à¸Šà¸£à¹Œà¸£à¸±à¸šà¹„à¸­à¹€à¸—à¹‡à¸¡à¸¥à¹‰à¸¡à¹€à¸«à¸¥à¸§!");
		}
	});
}
function clickLogout() {
	$.ajax({
		type: "POST",
		url: "system/action.php",
		data: "action=logout",
		success: function(result_) {
			var result = JSON.parse(result_);
			switch(result.status){
				case "success":
					getSuccess(result.desc, result.title);
					break;
				case "error":
					getError(result.desc, result.title);
					break;
				default:
					getError();
			}
			if(result.reload == "true"){
				setTimeout(function(){ location.reload(); }, 1500);
			}
		}
	});
}

function pccafe($item) {
	$.ajax({
		type: "POST",
		url: "system/action.php",
		data: "action=buycafe&cafeid=" + $item,
		success: function(result_) {
			var result = JSON.parse(result_);
			switch(result.status){
				case "success":
					getSuccess(result.desc, result.title);					
					break;
				case "error":
					getError(result.desc, result.title);
					break;
				default:
					getError();
			}
			if(result.reload == "true"){
				setTimeout(function(){ location.reload(); }, 1500);
			}
		}
	});
}

function clickLogin() {
	$.ajax({
		type: "POST",
		url: "system/action.php",
		data: $("#login-form").serialize(),
		success: function(result_) {
			var result = JSON.parse(result_);
			switch(result.status){
				case "success":
					getSuccess(result.desc, result.title);
					break;
				case "error":
					getError(result.desc, result.title);
					break;
				default:
					getError();
			}
			if(result.reload == "true"){
				setTimeout(function(){ location.reload(); }, 1500);
			}
		}
	});
}

function clickBan() {
	$.ajax({
		type: "POST",
		url: "system/action.php",
		data: $("#ban-form").serialize(),
		success: function(result_) {
			var result = JSON.parse(result_);
			switch(result.status){
				case "success":
					getSuccess(result.desc, result.title);
					break;
				case "error":
					getError(result.desc, result.title);
					break;
				default:
					getError();
			}
			if(result.reload == "true"){
				setTimeout(function(){ location.reload(); }, 1500);
			}
		}
	});
}

function clickBanHwid() {
	$.ajax({
		type: "POST",
		url: "system/action.php",
		data: $("#banhwid-form").serialize(),
		success: function(result_) {
			var result = JSON.parse(result_);
			switch(result.status){
				case "success":
					getSuccess(result.desc, result.title);
					break;
				case "error":
					getError(result.desc, result.title);
					break;
				default:
					getError();
			}
			if(result.reload == "true"){
				setTimeout(function(){ location.reload(); }, 1500);
			}
		}
	});
}

function clickRegister() {
	$.ajax({
		type: "POST",
		url: "system/action.php",
		data: $("#register-form").serialize(),
		success: function(result_) {
			var result = JSON.parse(result_);
			switch(result.status){
				case "success":
					getSuccess(result.desc, result.title);
					break;
				case "error":
					getError(result.desc, result.title);
					break;
				default:
					getError();
			}
			if(result.reload == "true"){
				setTimeout(function(){ location.replace('index.php?page=home'); }, 1500);
			}
		}
	});
}

function clickPassword() {
	$.ajax({
		type: "POST",
		url: "system/action.php",
		data: $("#password-form").serialize(),
		success: function(result_) {
			var result = JSON.parse(result_);
			switch(result.status){
				case "success":
					getSuccess(result.desc, result.title);
					break;
				case "error":
					getError(result.desc, result.title);
					break;
				default:
					getError();
			}
			if(result.reload == "true"){
				setTimeout(function(){ location.replace('index.php?page=home'); }, 1500);
			}
		}
	});
}

function clickTopup() {
	$.ajax({
		type: "POST",
		url: "system/action.php",
		data: $("#topup-form").serialize(),
		success: function(result_) {
			var result = JSON.parse(result_);
			switch(result.status){
				case "success":
					getSuccess(result.desc, result.title);
					break;
				case "error":
					getError(result.desc, result.title);
					break;
				default:
					getError();
			}
			if(result.reload == "true"){
				setTimeout(function(){ location.reload(); }, 10000);
			}
		}
	});
}

function buyitempoint($item) {
	$.ajax({
		type: "POST",
		url: "system/action.php",
		data: "action=buyitempoint&itemid=" + $item,
		success: function(result_) {
			var result = JSON.parse(result_);
			switch(result.status){
				case "success":
					getSuccess(result.desc, result.title);
					$("#playerpoint").text(result.point);
					break;
				case "error":
					getError(result.desc, result.title);
					break;
				default:
					getError();
			}
			if(result.reload == "true"){
				setTimeout(function(){ location.reload(); }, 1500);
			}
		}
	});
}

function buyesport($item) {
	$.ajax({
		type: "POST",
		url: "system/action.php",
		data: "action=buyesport&esportid=" + $item,
		success: function(result_) {
			var result = JSON.parse(result_);
			switch(result.status){
				case "success":
					getSuccess(result.desc, result.title);
					$("#userbonus").text(result.point);
					
					break;
				case "error":
					getError(result.desc, result.title);
					break;
				default:
					getError();
			}
			if(result.reload == "true"){
				setTimeout(function(){ location.reload(); }, 1500);
			}
		}
	});
}

function buyitemshare($item) {
	$.ajax({
		type: "POST",
		url: "system/action.php",
		data: "action=buyitemshare&itemid=" + $item,
		success: function(result_) {
			var result = JSON.parse(result_);
			switch(result.status){
				case "success":
					getSuccess(result.desc, result.title);
					$("#playerpoint_share").text(result.point);
					break;
				case "error":
					getError(result.desc, result.title);
					break;
				default:
					getError();
			}
			if(result.reload == "true"){
				setTimeout(function(){ location.reload(); }, 1500);
			}
		}
	});
}

function clickRedeem() {
	$.ajax({
		type: "POST",
		url: "system/action.php",
		data: $("#itemcode-form").serialize(),
		success: function(result_) {
			var result = JSON.parse(result_);
			switch(result.status){
				case "success":
					getSuccess(result.desc, result.title);
					break;
				case "error":
					getError(result.desc, result.title);
					break;
				default:
					getError();
			}
			if(result.reload == "true"){
				setTimeout(function(){ location.reload(); }, 1500);
			}
		}
	});
}

function DetailItem($id, $day_c, $day_share, $point, $point_share, $item_name, $item_images, $item_count) {
	swal({
		showConfirmButton: false,
		html: '<form method="post" id="onlyform">' +
		'<img class="bord" src="' + $item_images + '" style="width:100px;"><br>' +
		'à¸Šà¸·à¹ˆà¸­à¹„à¸­à¹€à¸—à¸¡ : '+ $item_name +'<br>' +
		'<hr class="bord">' + 
		'<p class="text-center">à¸£à¸²à¸¢à¸¥à¸°à¹€à¸­à¸µà¸¢à¸” (à¸žà¹‰à¸­à¸¢)</p>' + 
		'<p><i class="fa fa-clock-o"></i> à¹€à¸§à¸¥à¸²à¸›à¸·à¸™à¸—à¸µà¹ˆà¹„à¸”à¹‰à¸£à¸±à¸š : ' + $day_c + ' à¸§à¸±à¸™</p>' +
		'<p><i class="fa fa-clock-o"></i> à¸£à¸²à¸„à¸² : ' + $point + ' à¸žà¹‰à¸­à¸¢</p>' +
		'<hr class="bord">' + 
				'<p class="text-center">à¸£à¸²à¸¢à¸¥à¸°à¹€à¸­à¸µà¸¢à¸” (à¸žà¹‰à¸­à¸¢à¹€à¹€à¸Šà¸£à¹Œ)</p>' + 
		'<p><i class="fa fa-clock-o"></i> à¹€à¸§à¸¥à¸²à¸›à¸·à¸™à¸—à¸µà¹ˆà¹„à¸”à¹‰à¸£à¸±à¸š : ' + $day_share + ' à¸§à¸±à¸™</p>' +
		'<p><i class="fa fa-clock-o"></i> à¸£à¸²à¸„à¸² : ' + $point_share + ' à¸žà¹‰à¸­à¸¢à¹€à¹€à¸Šà¸£à¹Œ</p>' +
		'<hr class="bord">' + 
		'<p><i class="fa fa-shopping-cart"></i> à¸‹à¸·à¹‰à¸­à¸—à¸±à¹‰à¸‡à¸«à¸¡à¸” : ' + $item_count + ' à¸„à¸£à¸±à¹‰à¸‡</p>' +
		'<a class="float-left btn btn-danger fd-danger" onclick="swal.close()"><i class="fa fa-times"></i> à¸¢à¸à¹€à¸¥à¸´à¸</a>' +
		'<input name="item_id" type="hidden" id="item_id" value="' + $id + '">'+
		'<a class="float-right btn btn-success fd-success" style="margin-left: 10px;" onclick="buyitempoint(' + $id + ')"><i class="fa fa-check"></i> à¸‹à¸·à¹‰à¸­à¸”à¹‰à¸§à¸¢à¸žà¹‰à¸­à¸¢ : ' + $point +' </a>' +
		'<a class="float-right btn btn-primary fd-primary" onclick="buyitemshare(' + $id + ')"><i class="fa fa-check"></i> à¸‹à¸·à¹‰à¸­à¸”à¹‰à¸§à¸¢à¸žà¹‰à¸­à¸¢à¹€à¹€à¸Šà¸£à¹Œ : ' + $point_share +' </a>' +
	'</form>',
	});
}

function promotion($id) {
	$.ajax({
		type: "POST",
		url: "system/action.php",
		data: "action=promotion&promo=" + $id,
		success: function(result_) {
			var result = JSON.parse(result_);
			switch(result.status){
				case "success":
					getSuccess(result.desc, result.title);
					break;
				case "error":
					getError(result.desc, result.title);
					break;
				default:
					getError();
			}
			if(result.reload == "true"){
				setTimeout(function(){ location.reload(); }, 1500);
			}
		}
	});
}

function clickNickname() {
	$.ajax({
		type: "POST",
		url: "system/action.php",
		data: $("#nickname-form").serialize(),
		success: function(result_) {
			var result = JSON.parse(result_);
			switch(result.status){
				case "success":
					getSuccess(result.desc, result.title);
					$("#playerpoint").text(result.point);
					break;
				case "error":
					getError(result.desc, result.title);
					break;
				default:
					getError();
			}
			if(result.reload == "true"){
				setTimeout(function(){ location.reload(); }, 1500);
			}
		}
	});
}

function clickColorName() {
	$.ajax({
		type: "POST",
		url: "system/action.php",
		data: $("#colorname-form").serialize(),
		success: function(result_) {
			var result = JSON.parse(result_);
			switch(result.status){
				case "success":
					getSuccess(result.desc, result.title);
					$("#playerpoint").text(result.point);
					break;
				case "error":
					getError(result.desc, result.title);
					break;
				default:
					getError();
			}
			if(result.reload == "true"){
				setTimeout(function(){ location.reload(); }, 1500);
			}
		}
	});
}

function clickTransfer() {
	var $btn = $("#transfer_btn");
	$btn.attr('disabled', true);
	$.ajax({
		type: "POST",
		url: "system/action.php",
		data: $("#transfer-form").serialize(),
		success: function(result) {
			switch(result.status){
				case "success":
					getSuccess(result.desc, result.title);
					setTimeout(function(){ location.replace('index.php'); }, 1500);
					break;
				case "error":
					getError(result.desc, result.title);
					setTimeout(function(){ location.replace('index.php?page=transfer'); }, 1500);
					break;
				default:
					getError();
			}
			if(result.reload == "true"){
				setTimeout(function(){ location.reload(); }, 1500);
			}
		}
	});
}

function clickMoveid() {
	$.ajax({
		type: "POST",
		url: "system/action.php",
		data: $("#moveid-form").serialize(),
		success: function(result) {
			switch(result.status){
				case "success":
					getSuccess(result.desc, result.title);
					$("#playerpoint").text(result.point);
					break;
				case "error":
					getError(result.desc, result.title);
					break;
				default:
					getError();
			}
			if(result.reload == "true"){
				setTimeout(function(){ location.reload(); }, 1500);
			}
		}
	});
}