$(function(){
	
	$("a").smoothScroll({
	            offset:-50,
	            speed:1500
	        });

	$(window).scroll(function(event) {
		// if( $(this).scrollTop() > hdr ) {
		//    mn.addClass(mns);
		//  } else {
		//    mn.removeClass(mns);
		var scroll = $(window).scrollTop();
		var headerHeight = $('header').height();
		console.log(scroll, headerHeight);
		if (scroll >= headerHeight) {
			$('.menu-menu-1-container').addClass('blue animated slideInDown');
		}
		else {
			$('.menu-menu-1-container').removeClass('blue animated slideInDown');
		}
	});

});


