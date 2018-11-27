$(function() {

	var menuBtn = $('.hamburger');
	menuBtn.hover(function() {
		menuBtn.addClass('is-active');
	}, function() {
		menuBtn.removeClass('is-active');
	});

	var sm = $('.slide-menu');
	var smw = sm.width();
	menuBtn.on('click' ,function(event) {
		event.preventDefault();
		sm.animate({
				left: '0px',
				opacity: 1
		}, 250);
	});
	$(".close-menu").on('click', function(event) {
		event.preventDefault();
		sm.animate({
			left: -smw,
			opacity: 0
		}, 250);
	});

	$(window).scroll(function() {
		if($(this).scrollTop() > $(this).height()) {
			$('.top').addClass('active');
		} else {
			$('.top').removeClass('active');
		}
	});
	$('.top').click(function() {
		$('html, body').stop().animate({scrollTop: 0}, 'slow', 'swing');
	});




});
