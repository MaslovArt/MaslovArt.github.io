$(function() {

	$('.owl_1').owlCarousel({
    items:1,
    loop:false,
    nav:true,
    margin:30,
    navText:['<div class="navbut"><i class="fa fa-angle-left"></i></div>','<div class="navbut"><i class="fa fa-angle-right"></i></div>'],
	});
	var carousel = $('.owl_2').owlCarousel({
    loop:false,
    margin:30,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    },
    navText:['<div class="navbut"><i class="fa fa-angle-left"></i></div>','<div class="navbut"><i class="fa fa-angle-right"></i></div>'],
	});
	carousel.on('translated.owl.carousel', function(event) {
    
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

});
