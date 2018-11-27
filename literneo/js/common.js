$(function() {

  if ("ontouchstart" in document.documentElement) {
  	$('body').addClass('user-touch-device');
  } else {
  	$('body').addClass('user-no-touch-device');
  }

	var menuBtn = $('#menubtn');
	var menuWrap = $('#mainmenu');

	menuWrap.click(function(event) {
		menuWrap.removeClass('active');
	});
	menuBtn.click(function(event) {
		menuWrap.addClass('active');
	});

	$('.totop').click(function() {
		$('html, body').stop().animate({scrollTop: 0}, 'slow', 'swing');
	});

 $('.collapse').collapsiblePanel();

$(".popup-gallery").each(function() {
	$(this).magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-fade',
		//removalDelay: 300,
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: '',
		}
	});
});
$(".popup-gallery").each(function() {
	let len = $(this).find('.bgimg-cover').length;
	if(len > 1) {
		let wPers = 100 / len;
		var newHtml = '<div class="lpopupthumbs">';
		for(var i = 0; i < len; i++)
			newHtml += '<div style="width:'+ (wPers - 1) + '%"></div>';
		newHtml += '</div>';
		$(this).append(newHtml);
	}
});

$(".animated-slUp").each(function() {
	let block = $(this);
	block.waypoint(function() {
    block.addClass('slideInUp');
	}, { offset: '120%'});
});

	$('a.smoothlink, a.page-numbers').click(function (e) {
		e.preventDefault();
		$('.page').css("opacity", "0");
		var goTo = this.getAttribute("href");
		setTimeout(function() {
			window.location.href = goTo;
		},500);
	});

	var i = 1;
	var direction = true;
	var wasFirst = false;
	function changePageColorMask() {
    $('.page').removeClass('color-mask' + i);
		  if(direction) {
		  	i++;
		  }
		  else {
		  	i--;
		  }
		  if(i==1) 
		  	direction = true;
			if(i==2) 
				direction = false;
		  $('.page').addClass('color-mask' + i);
	}
	var owl = $('.owl-carousel').owlCarousel({
        items:1,
        loop:true,
        margin:0,
        animateOut: 'fadeOut',
        autoplay:false,
        checkVisible: false,
        dots:true,
        slideTransition: 'cubic-bezier(0.77, 0, 0.175, 1)',
        onChange: owlCallback,
    });
	function owlCallback(event) {
		if(wasFirst)
			changePageColorMask();
		else wasFirst = true;
	}
	if(owl.length > 0) {
		setInterval(function() {
			 owl.trigger('next.owl.carousel');
			}, 5000);
	}

	window.addEventListener( "pageshow", function ( event ) {
		$('.page').css("opacity", "1");
	});

});

$(window).on('load', function() {
	$('body').addClass('loaded');
})
