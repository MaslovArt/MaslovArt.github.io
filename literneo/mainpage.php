<?php
/*
Template Name: Главная страница
Template Post Type: page
*/
?>
	<?php get_header(); ?>
	<?php get_sidebar(); ?>
		<div class="lcontent">
			<div class="lsection fullscreen custsect">
				<div class="sliderwrap flex-center">
					<div class="slidercontainer">
						<div class="owl-carousel owl-theme">
							<a href="#"><div class="bgimg-cover" style="background-image: url(http://localhost/wyTheme/wp-content/uploads/2018/06/img1.png);"></div></a>
							<a href="#"><div class="bgimg-cover" style="background-image: url(http://localhost/wyTheme/wp-content/uploads/2018/06/lesimg1.png);"></div></a>
							<a href="#"><div class="bgimg-cover" style="background-image: url(http://localhost/wyTheme/wp-content/uploads/2018/06/lesimgdef.png);"></div></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="lcol lcol-left">
			<a class="lcolref smoothlink" href="#">
				<div class="ctitle">
					<span class="col-title">Контакты</span>
					<div class="undline"></div>
				</div>
			</a>
		</div>
		<div class="lcol lcol-right">
			<a class="lcolref smoothlink" href="#">
				<div class="ctitle">
					<span class="col-title" >Обучение</span>
					<div class="undline"></div>
				</div>
			</a>
		</div>
	<?php wp_footer(); ?>
</body>
</html>
