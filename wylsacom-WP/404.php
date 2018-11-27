	<?php get_header('404'); ?>
	<?php get_sidebar(); ?>
	<div id="my-content" class="p404">
		<span>404</span>
		<p>Oops! The page you requested was not found!</p>
		<div class="nav404">
			<p>You can go to <a href="<?php echo esc_url( home_url( '/' ) ); ?>">home</a> page or search here</p>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>