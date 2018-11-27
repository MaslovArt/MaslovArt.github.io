<?php get_header('simple'); ?>
<?php get_sidebar(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="headline">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="home"><i class="fa fa-home"></i></a>
			<div class="headline-info">
				<h2><?php the_title(); ?></h2>
			</div>
		</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 articleBody">
					<?php the_content(); ?>
				</div>
			</div>
	<?php endwhile; ?>
	<div class="row">
		<div class="col-md-8 col-md-offset-2 articleBody">
			<?php edit_post_link(); ?>
		</div>		
	</div>	
</div>

<?php wp_footer(); ?>
</body>
</html>