<?php get_header(); ?>
<?php get_sidebar(); ?>
	<div class="lcontent lccontent">
		<div class="lsection lpost-content">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</div>
		<?php edit_post_link('Редактировать', '<div class="lsection">', '</div>'); ?>
	</div>
<?php get_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>