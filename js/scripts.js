$(function(){
	
	$("a").smoothScroll({
	            offset:-32,
	            speed:1500
	        });

	// $(window).scroll(function(event) {
	// 	var scroll = $(window).scrollTop();
	// 	var headerHeight = $('header').height();
	// 	// console.log(scroll, headerHeight);
	// 	if (scroll >= headerHeight) {
	// 		$('.header_top').addClass('fixed animated slideInDown');
	// 		$('.header_top').removeClass('slideOutUp');
	// 	}
	// 	if (scroll < headerHeight) {
	// 		$('.header_top').removeClass('slideInDown');
	// 		$('.header_top').addClass('slideOutUp');
	// 	}
	// 	if (scroll < 10) {
	// 		$('.header_top').removeClass('fixed animated');
	// 	}
	// });
});


