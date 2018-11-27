<div class="larticlewrap">
	<div class="lsection">
		<div class="larticleimg hidden-md">
			<div class="bgimg-cover" style="background-image: url(<?php the_post_thumbnail_url(); ?>);"></div>
		</div>
		<div class="larticle">
			<span class="ladate"><?php the_time('j.m.Y'); ?></span>
			<h2 class="latitle"><?php the_title(); ?></h2>
			<p class="latext"><?php echo get_post_meta($post->ID, 'posttext', true); ?></p>
			<a href="<?php the_permalink(); ?>" class="lamore smoothlink">читать</a>
		</div>
	</div>
</div>