	<?php get_header(); ?>
	<?php get_sidebar(); ?>
    <div id="my-content">
      	<div class="posts">
      		<div class="container-fluid">
      			<?php $i = 0; if (have_posts()) : while (have_posts()) : the_post();
      				if($i % 3 == 0) { ?>
	      			<div class="row">
	      			<?php } ?>
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
		      		<?php $i++; if($i % 3 == 0) { ?>
	      				</div>
	      			<?php } 
      				endwhile; endif; ?>	  
      		</div>
      	</div>
    </div>
	<?php get_footer(); ?>
	<?php wp_footer(); ?>
</body>
</html>
