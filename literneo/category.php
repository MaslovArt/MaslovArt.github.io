<?php get_header(); ?>
<?php get_sidebar(); ?>
<div class="lcontent lccontent">
	<div class="lsection">
		<ul role="tablist" class="skltbs-tab-group">
			<?php
				$current_category = get_queried_object();
				$categories = get_categories( array(
		    'orderby' => 'name',
		    'parent'  => 0,
		    'hide_empty'   => 0,
		    'exclude'      => '1, ' . get_cat_ID( "Проект" ) . ", " . get_cat_ID( "Пост" ),
			) ); ?>
	    <?php foreach ( $categories as $cat ) { ?>
	    	<li id="cat-<?php echo $cat->term_id; ?>" class="skltbs-tab-item"><a class="smoothlink skltbs-tab ajax defhref <?php if ($cat->term_id == $current_category->term_id) echo 'illuminated' ?>" href="<?php echo get_category_link( $cat->term_id ); ?>"><?php echo $cat->name; ?></a></li>
	    <?php } ?>
		</ul>
		<h2><?php single_cat_title('Раздел: '); ?></h2>
		<div id="category-post-content">
			<div class="container-a4">
	      <ul class="caption-style-4">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php get_template_part( 'part', 'catblock' ); ?>
				  <?php endwhile; endif; ?>	  
				</ul>
			</div>
		</div>
	</div>
	<?php get_template_part( 'part', 'pagination' ); ?>
</div>
<?php get_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>