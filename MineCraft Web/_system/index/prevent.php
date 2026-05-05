<!-- Mouse over Zoom Product -->
<script language="javascript">
	function zoomHover(imgname){
		 $j('#icon_zoom_'+imgname).show();
	}
	function zoomHover_out(imgname){		 $j('#icon_zoom_'+imgname).hide();	
}
</script>

<script type="text/javascript">

$(document).bind("contextmenu", function (event) {
  event.preventDefault(); // ห้ามคลิกขวา
});
$(document).bind("selectstart", function (event) {
  event.preventDefault(); // ห้ามลากคลุม
});

</script>
