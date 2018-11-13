$(function() {

	$("html").easeScroll({
      frameRate: 60,
      animationTime: 1000,
      stepSize: 80,
      pulseAlgorithm: 1,
      pulseScale: 8,
      pulseNormalize: 1,
      accelerationDelta: 20,
      accelerationMax: 1,
      keyboardSupport: true,
      arrowScroll: 50,
      touchpadSupport: true,
      fixedBackground: true
    });

    $(document).ready(function() {
        $('body').addClass('loaded');
        $('.sectwrap-1').addClass('slideFadeOut');
        $('.h1').addClass('slideFadeOut');
        $('.img-plate').addClass('slideOut');
    });

    $('.animation-1').waypoint(function() {
        $('.animation-1').addClass('slideOut');
        $('.img-grace').addClass('slideOut');
    }, { offset: '90%'});
    $('.animation-2').waypoint(function() {
        $('.animation-2').addClass('slideOut');
        $('.img-leave').addClass('slideOut');
    }, { offset: '90%'});
    $('.animation-3').waypoint(function() {
        $('.animation-3').addClass('slideOut');
        $('.img-fruit').addClass('slideOut');
    }, { offset: '90%'});

});
