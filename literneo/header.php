<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<!-- <base href="/"> -->

	<title><?php if ( is_front_page() ) bloginfo('name'); wp_title(); ?></title>
	<meta name="description" content="">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="og:image" content="path/to/image.jpg">
	<link rel="icon" href="img/favicon/favicon.ico">
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon-180x180.png">
	<meta name="theme-color" content="#fff">
	<style>
	body{background-color: #fff;}.item-1,.preloadwrap{z-index:99999;top:0;left:0}.preloadwrap{position:fixed;width:100%;height:100%;overflow:hidden}.item,.preloader{position:absolute}.preloader{width:200px;height:200px;top:0;bottom:0;left:0;right:0;margin:auto}.item{width:100px;height:100px}.item-1{background-color:#CAD9E3;animation:item-1_move 1.8s cubic-bezier(.6,.01,.4,1) infinite}.item-2{background-color: #E5E5E5;top:0;right:0;z-index:9;animation:item-2_move 1.8s cubic-bezier(.6,.01,.4,1) infinite}.item-3{background-color:#EBC6AC;bottom:0;right:0;z-index:10;animation:item-3_move 1.8s cubic-bezier(.6,.01,.4,1) infinite}.item-4{background-color:#F6DBD3;bottom:0;left:0;z-index:9;animation:item-4_move 1.8s cubic-bezier(.6,.01,.4,1) infinite}@keyframes item-1_move{0%,100%{transform:translate(0,0)}25%{transform:translate(0,100px)}50%{transform:translate(100px,100px)}75%{transform:translate(100px,0)}}@keyframes item-2_move{0%,100%{transform:translate(0,0)}25%{transform:translate(-100px,0)}50%{transform:translate(-100px,100px)}75%{transform:translate(0,100px)}}@keyframes item-3_move{0%,100%{transform:translate(0,0)}25%{transform:translate(0,-100px)}50%{transform:translate(-100px,-100px)}75%{transform:translate(-100px,0)}}@keyframes item-4_move{0%,100%{transform:translate(0,0)}25%{transform:translate(100px,0)}50%{transform:translate(100px,-100px)}75%{transform:translate(0,-100px)}}.page{opacity: 0; transition: opacity 0.5s ease;}.loaded .page{opacity: 1;}.loaded .preloadwrap{visibility: hidden; opacity: 0;}
	</style>
	<?php wp_head(); ?>
</head>
<body>
	<div class="preloadwrap">
		<div class="preloader">
		  <div class="item item-1"></div>
		  <div class="item item-2"></div>
		  <div class="item item-3"></div>
		  <div class="item item-4"></div>
		</div>
	</div>
	<div class="page <?php if ( is_front_page() ) echo 'color-mask1' ?>">
		<div class="lheader <?php if ( !is_front_page() ) echo 'fillbg' ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logowrap smoothlink">
				<?php
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); 
					echo '<img src="'. esc_url( $logo[0] ) .'">'; 
				?>
				<h1 class="sitename"><?php bloginfo('name'); ?></h1>
			</a>
			<button id="menubtn" class="btn smallrec">Меню</button>
			<div class="projbtnwrap hidden-sm">
				<a href="#" id="projectbtn smoothlink" class="btn bigrec">Проекты</a>
			</div>
		</div>