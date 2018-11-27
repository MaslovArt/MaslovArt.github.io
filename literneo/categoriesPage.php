<?php
/*
Template Name: Страница категории
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<div class="lcontent lccontent">
	<div class="lsection">
		<ul role="tablist" class="skltbs-tab-group">
			<?php
				$categories = get_categories( array(
		    'orderby' => 'name',
		    'parent'  => 0,
		    'hide_empty'   => 0,
				'exclude'      => '1, ' . get_cat_ID( "Проект" ) . ", " . get_cat_ID( "Пост" ),
			) ); ?>
	    <?php foreach ( $categories as $cat ) { ?>
	    	<li id="cat-<?php echo $cat->term_id; ?>" class="skltbs-tab-item"><a class="skltbs-tab ajax defhref" href="<?php echo get_category_link( $cat->term_id ); ?>"><?php echo $cat->name; ?></a></li>
	    <?php } ?>
		</ul>
		<div id="category-post-content">
			<div class="container-a4">
        <ul class="caption-style-4">
					<?php $args = array( 'posts_per_page' => 9,
															 'orderby' => 'date',
															 'category' => "" . "-" . get_cat_ID( "Проект" ) . ", " . "-" . get_cat_ID( "Пост" ) . "" 
														);
					$last_posts = get_posts( $args );
					foreach ( $last_posts as $post ) { 
					  setup_postdata( $post ); ?>
						<?php get_template_part( 'part', 'catblock' ); ?>
					<?php }; 
					wp_reset_postdata(); ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>