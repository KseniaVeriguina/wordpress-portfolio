$(function(){

	if ( $(window).width() > 940) {     

	  	// Sticky nav actions
		$(window).scroll(function(event) {
			var scroll = $(window).scrollTop();
			var headerHeight = $('header').height();
			// console.log(scroll, headerHeight);
			//original argument scroll >= headerHeight
			if (headerHeight - scroll < 81) {
				$('.header_top').addClass('fixed animated slideInDown');
				$('.header_top').removeClass('slideOutUp');
			}
			if (headerHeight - scroll > 82) {
				$('.header_top').removeClass('slideInDown');
				$('.header_top').addClass('slideOutUp');
			}
			if (scroll < 10) {
				$('.header_top').removeClass('fixed animated');
			}
		});

		$("a").smoothScroll({
			offset:-80,
		    speed:1500
		});
	}

	else {
		// Hamburger menu actions
		$('.toggle-label').on('click', function() {
			$('.header_top').toggleClass('show');
		});
		$('.main-nav li').on('click', function() {
			$('.header_top').toggleClass('show');
		});

		$("a").smoothScroll({
		    speed:1500
		});
	}
});


