	<?php get_header(); ?>
	<?php get_sidebar(); ?>
		<div class="lcontent lccontent">
		<?php $i = 0; if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part( 'part', 'article' ); ?>
		<?php endwhile; endif; ?>  
		<?php get_template_part( 'part', 'pagination' ); ?>
		</div>
	<?php get_footer(); ?>
	<?php wp_footer(); ?>
</body>
</html>
