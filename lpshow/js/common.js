$(function() {
	var MsgModal = $('#MsgModal');
	var VideoModal = $('#VideoModal');
	var vid = document.getElementById("video"); 

	var btn2 = $("#videoPlay");
	$('.neonbtn').each(function(i) {
		var txt = $(this).html();
		$(this).click(function() {
			$('#MsgModal h3').html(txt);
			MsgModal.addClass('active');
		});
	});

	var span1 = $(".close1");
	var span2 = $(".close2");
	span1.click(function() {
		MsgModal.removeClass('active');
	});
	btn2.click(function() {
		VideoModal.addClass('active');
	});
	span2.click(function() {
		VideoModal.removeClass('active');
		vid.pause();
	});

	$(document).click(function(e) {
		if(e.target.id == 'MsgModal') {
			MsgModal.removeClass('active');
		}
		if(e.target.id == 'VideoModal') {
			VideoModal.removeClass('active');
			vid.pause();
		}
	})

	$("form").submit(function () {
		var formID = $(this).attr('id');
		var formNm = $('#' + formID);
		$.ajax({
		type: "POST",
		url: 'mail2.php',
		data: formNm.serialize(),
		success: function (data) {
		$(formNm).html(data);
		},
		error: function (jqXHR, text, error) {
		$(formNm).html(error);
		}
		});
		return false;
	});
});
