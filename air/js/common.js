$(function() {

	$("html").easeScroll({
    frameRate: 60,
    animationTime: 1000,
    stepSize: 40,
    pulseAlgorithm: 1,
    pulseScale: 8,
    pulseNormalize: 1,
    accelerationDelta: 10,
    accelerationMax: 1,
    keyboardSupport: true,
    arrowScroll: 50,
    touchpadSupport: true,
    fixedBackground: true
  });

	var modal = new tingle.modal({
	    footer: false,
	    stickyFooter: false,
	    closeMethods: ['overlay', 'button', 'escape'],
	    closeLabel: "Close",
	    cssClass: ['custom-class-1'],
	});
	modal.setContent('<video width="100%" controls>\
										  <source src="movie.mp4" type="video/mp4">\
										  <source src="movie.ogg" type="video/ogg">\
										Your browser does not support the video tag.\
										</video>');

	$('.playBut').click(function(event) {
			modal.open();
	});

	$('#anim1').waypoint(function() {
    $('#anim1').addClass('fadeInUp');
	}, { offset: '100%'});
	$('#anim2').waypoint(function() {
    $('#anim2').addClass('fadeInUp');
	}, { offset: '100%'});
	$('#anim3').waypoint(function() {
    $('#anim3').addClass('fadeInUp');
	}, { offset: '100%'});
	$('#anim4').waypoint(function() {
    $('#anim4').addClass('fadeIn');
	}, { offset: '100%'});
	$('#anim5').waypoint(function() {
    $('#anim5').addClass('fadeInUp');
	}, { offset: '100%'});

});
