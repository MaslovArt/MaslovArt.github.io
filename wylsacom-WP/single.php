<?php get_header('simple'); ?>
</div>
<?php get_sidebar(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post-latest bgimage" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
			<div class="post-info">
				<p class="post-date"><?php the_time('j M Y'); ?></p>
				<h2 class="post-title"><?php the_title(); ?></h2>
			</div>
			<div class="gradient-1"></div>
		</div>
		<div class="posts">
	  		<div class="container">
	  			<div class="row">
	  				<div class="col-md-8 col-md-offset-2 articleBody">
	  						<?php the_content(); ?>	
	<?php endwhile; endif; ?>
							<div class="post_tags_catswrap">	
		      			<div class="post_tags">
		  						<?php the_tags('<span>Метки: </span>', ' '); ?>
		  					</div>
		  					<div class="post_cats">
		  					<span>Рубрики: </span>
		  					<?$all_categories = get_categories('hide_empty=0');
									$category_link_array = array();
									foreach( $all_categories as $single_cat ){
										$category_link_array[] = '<a href="' . get_category_link($single_cat->term_id) . '">' . $single_cat->name . '</a>';
									}
									echo implode(' ', $category_link_array);?>
								</div>
							</div>
	  				</div>
	  			</div> 
	  			<div class="row">
	  				<div class="col-md-8 col-md-offset-2">
	  					<?php comments_template(); ?>
	  				</div>
	  			</div> 
	  		</div>
		</div>
	<div class="container-fluid">
	      	<div class="posts">	
	      		<div class="row">
					 <?php
					$args = array( 'posts_per_page' => 3, 'orderby' => 'rand' );
					$rand_posts = get_posts( $args );
					foreach ( $rand_posts as $post ) : 
					  setup_postdata( $post ); ?>
					    <div class="col-md-4 col-sm-4">
							<a href="<?php the_permalink(); ?>">
								<div class="post bgimage" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
									<div class="post-comments">
										<i class="fa fa-comment-o"></i><span><?php comments_number('0', '1', '%'); ?></span>
									</div>
									<div class="post-info">
										<p class="post-date"><?php the_time('j M Y'); ?></p>
										<h2 class="post-title"><?php the_title(); ?></h2>
									</div>
									<div class="gradient-2"></div>
									<div class="mask"></div>
								</div>
							</a>
	      				</div>
					<?php endforeach; 
					wp_reset_postdata(); ?>
				</div>
	    	</div>

	    	<div class="footer-nav">
	    		<div class="row">
	    			<?php 
	    				if( get_adjacent_post(false, '', true) ) { 
							previous_post_link('<div class="col-md-6 nav-left"><span>%link</span></div>');
						}
						else { 
							$first = new WP_Query('posts_per_page=1&order=DESC');
							$first->the_post();

							echo '<div class="col-md-6 nav-left"><a class="post-prev" href="' . get_permalink() . '"><span>Последняя запись</span></a></div>';

							wp_reset_postdata();
						}; 
	    				if( get_adjacent_post(false, '', false) ) { 
							next_post_link('<div class="col-md-6 nav-right"><span>%link</span></div>');
						}
						else { 
							$last = new WP_Query('posts_per_page=1&order=ASC');
							$last->the_post();

							echo '<div class="col-md-6 nav-right"><a class="post-next" href="' . get_permalink() . '"><span>Первая запись</span></a></div>';

							wp_reset_postdata();
						}; 
	    			 ?>
	    		</div>
	    	</div>
	    </div>
	</div>
<?php wp_footer(); ?>
</body>
</html>