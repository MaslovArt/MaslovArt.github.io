<?php get_header('simple'); ?>
	<?php get_sidebar(); ?>
		<div class="headline">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="home"><i class="fa fa-home"></i></a>
			<div class="headline-info">
				<h2><?php single_cat_title('Вы просматриваете категорию: '); ?></h2>
			</div>
		</div>
	</div>
    <div id="my-content">
      	<div class="posts">
      		<div class="container-fluid">
      			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	      			<div class="row">
						<div class="col-md-12 col-sm-12">
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
	      			</div>
	      		<?php endwhile; endif; ?>	  
      		</div>
      	</div>
    </div>
	<?php get_footer(); ?>
	<?php wp_footer(); ?>
</body>
</html>
