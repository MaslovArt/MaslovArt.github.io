<div class="askwrap">
	<div class="ui-widget collapse">
		<div class="ui-widget-header"> 
			<span class="underlined">Задать вопрос</span>
		</div>
		<div id="expander-demo" class="ui-widget-content" style="display: none;">
			<form id="form" class="askform" action="post">
				<input type="hidden" name="formData" value="Заявка с сайта Literneo">
				<input type="text" name="name" placeholder="Имя">
				<input type="email" name="email" placeholder="E-mail">
				<textarea name="message" placeholder="Задать вопрос"></textarea>
				<input type="submit" value="Отправить">
			</form>
		</div>
	</div>
	<script>
		$("form").submit(function () {
			var formID = $(this).attr('id');
			var formNm = $('#' + formID);
			$.ajax({
			type: "POST",
			url: '../wp-content/themes/literneo/sendemail.php',
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
	</script>
</div>