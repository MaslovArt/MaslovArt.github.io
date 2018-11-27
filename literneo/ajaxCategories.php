<?php
/*
Template Name: Страница ajax-категории
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
				) ); ?>
			    <?php foreach ( $categories as $cat ) { ?>
			    	<li id="cat-<?php echo $cat->term_id; ?>" class="skltbs-tab-item"><a class="skltbs-tab ajax defhref" onclick="cat_ajax_get('<?php echo $cat->term_id; ?>');" href="#"><?php echo $cat->name; ?></a></li>
			    <?php } ?>
			</ul>
		<div id="loading-animation" style="display: none;">Loading...</div>
		<div id="category-post-content">
			<div class="container-a4">
        <ul class="caption-style-4">
					<?php $args = array( 'posts_per_page' => 9, 'orderby' => 'date' );
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
	<script>
	function cat_ajax_get(catID) {
	    $("a.ajax").removeClass("current");
	    $("a.ajax").addClass("current"); //adds class current to the category menu item being displayed so you can style it with css
	    $("#loading-animation").show();
	    var ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ); //must echo it ?>';
	    jQuery.ajax({
	        type: 'POST',
	        url: ajaxurl,
	        data: {"action": "load-filter", cat: catID },
	        success: function(response) {
	            $("#category-post-content").html(response);
	            $("#loading-animation").hide();
	            return false;
	        }
	    });
	}
	</script>
</body>
</html>