<?php get_header(); ?>
<?php get_sidebar(); ?>
	<div class="lcontent lccontent">
		<div class="lsection">
			<div class="infowrapper">
				<?php $wasClosed = false;?>
				<?php $i = 0; if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php if ( $i++ == 0 ) { $wasClosed = false; ?><div class="lcol2"> <?php }?>
						<?php get_template_part( 'part', 'project' ); ?>
					<?php if ( $i == 2 ) { $i = 0; $wasClosed = true; ?></div> <?php }?>
				<?php endwhile; endif; ?>  
				<?php if ( !$wasClosed ) { ?></div><?php }?>
			</div>
		</div>
		<?php get_template_part( 'part', 'pagination' ); ?>
	</div>
<?php get_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>
