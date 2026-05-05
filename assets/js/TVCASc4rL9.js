function Position(pos, item) {

    var winningPosition = pos;

    window.scrollTo(0, 800);
    
    var track = document.querySelector('.loot-track');

    setTimeout(function() {

        track.style.marginLeft = winningPosition.toString() + "px";

    }, 200)
    // console.log(winningPosition);
    track.addEventListener('webkitTransitionEnd', function(event) {
        Swal.fire({
            imageUrl: item.img,
            imageWidth: 350,
            imageHeight: 350,
            title: item.tier  +' ( '+ item.name + ' )',
            text: 'ขอแสดงความยินดีด้วย คุณได้รับ '+ item.name +' x1 ',
            confirmButtonText: 'สุ่มอีกครั้ง',
            showCancelButton: true,
            cancelButtonText: "ออก",
        })
		.then((value) => {
           if(value.dismiss) {
                window.location.href = "?page=gacha"
           } else {
                window.location.href = window.location.href
           }
		});
    }, false );


}