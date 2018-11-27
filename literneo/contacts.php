<?php
/*
Template Name: Контакты
*/
?>

	<?php get_header(); ?>
	<?php get_sidebar(); ?>
		<div class="lcontent lccontent">
			<div class="bordwrap">
				<div class="lsection">
					<div class="contactswrap">
						<div class="imgwrap">
							<img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/img/lesimgdef.png" alt="">
						</div>
						<div class="contacts flex-center">
							<span>Если возникли вопросы, пишите</span>
							<a class="underlined" target="_blank" href="mailto:<?php echo get_option('admin_email'); ?>"><?php echo get_option('admin_email'); ?></a>
							<ul class="socnets">
								<li><a class="defhref" href="#">vk</a></li>
								<li><a class="defhref" href="#">instagram</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php get_template_part( 'part', 'askmail' ); ?>
		</div>
	<?php get_footer(); ?>
	<?php wp_footer(); ?>
</body>
</html>
