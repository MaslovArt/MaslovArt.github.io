$(function() {

	function resizeNav() {
	  $("#nav-fullscreen").css({"height": window.innerHeight});
	  var radius = Math.sqrt(Math.pow(window.innerHeight, 2) + Math.pow(window.innerWidth, 2));
	  var diameter = radius * 2;
	  $("#nav-overlay").width(diameter);
	  $("#nav-overlay").height(diameter);
	  $("#nav-overlay").css({"margin-top": -radius, "margin-left": -radius});
	}
  $("#nav-toggle").click(function() {
      $("#nav-toggle, #nav-overlay, #nav-fullscreen").toggleClass("open");
  });
  $(window).resize(resizeNav);
  resizeNav();

  $('[data-toggle="datepicker"]').datepicker();
	var BookModal = $('#BookModal');
	$('.bookbtn').click(function() {
			BookModal.addClass('active');
			overflow(false);
	});
	$('.close1').click(function() {
		BookModal.removeClass('active');
		overflow(true);
	});	
	var MsgModal = $('#MsgModal');
	$('.combtn').click(function() {
			MsgModal.addClass('active');
			overflow(false);
	});
	$('.close2').click(function() {
		MsgModal.removeClass('active');
		overflow(true);
	});

	$(document).click(function(e) {
		if(e.target.id == 'BookModal') {
			BookModal.removeClass('active');
			overflow(true);
		}		
		if(e.target.id == 'MsgModal') {
			MsgModal.removeClass('active');
			overflow(true);
		}
	});
	function overflow(p) {
		if(p)
			$('body').css('overflow-y', 'auto');
		else
			$('body').css('overflow-y', 'hidden');
	}

	$('.trip-stat').waypoint(function() {
		$('.count').each(function () {
			if($(this).hasClass('activated'))
				return;
			$(this).addClass('activated')
	    $(this).prop('Counter',0).animate({
	        Counter: $(this).text()
	    }, {
	        duration: 1000,
	        easing: 'swing',
	        step: function (now) {
	            $(this).text(Math.ceil(now));
	        }
	    });
		});
	}, { offset: '100%'});
	
	$('.daywrap').each(function(index) {
		var self = $(this);
		$(this).waypoint(function() {
			$('.vec'+index).addClass('drawIn');
			self.addClass('fadeIn');
		}, { offset: '90%'});
	});

});
