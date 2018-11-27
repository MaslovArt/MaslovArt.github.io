<?php get_header(); ?>
<?php get_sidebar(); ?>
	<div class="lcontent lccontent">
		<div class="lsection">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
		<?php edit_post_link('Редактировать', '<div class="lsection">', '</div>'); ?>
	</div>
<?php get_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>