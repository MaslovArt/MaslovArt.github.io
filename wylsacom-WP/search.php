<?php get_header('simple'); ?>
	<?php get_sidebar(); ?>
		<div class="headline">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="home"><i class="fa fa-home"></i></a>
			<div class="headline-info">
					<h2><?php printf( __( 'Search Results for: %s', 'twentyfifteen' ), get_search_query() ); ?></h2>
			</div>
		</div>
	</div>
    <div id="my-content">
      	<div class="posts">
      		<div class="container-fluid">
      			<?php if (have_posts()) : ?>
      				<?php while (have_posts()) : the_post(); ?>
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
	      		<?php endwhile;?>	
	      		<?php else : ?>
	      			<div class="row">
						<div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
							<h2 style="color: #000;">Ничего не найдено!</h2>
	      					<p>Рекомендации по поиску записей:</p>
	      					<p>1. Используйте синонимы.</p>
	      					<p>2. Используйте больше ключевых слов.</p>
	      					<form role="search" method="get" id="searchform">
                				<div class="search">
	                    			<i class="fa fa-search" aria-hidden="true"></i>
	                    			<input type="text" value="Search the site" id="searchBox" name="s" onblur="if(this.value == '') { this.value = 'Search the site'; }" onfocus="if(this.value == 'Search the site') { this.value = ''; }" />
                				</div>
            				</form>
      					</div>
      				</div>
	      		<?php endif?>	
      		</div>
      	</div>
    </div>
	<?php get_footer(); ?>
	<?php wp_footer(); ?>
</body>
</html>
