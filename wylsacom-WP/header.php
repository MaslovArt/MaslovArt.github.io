<!DOCTYPE html>
<html lang="ru">

<head>

	<meta charset="utf-8">

	<title><?php bloginfo('name'); wp_title(); ?></title>
	<meta name="description" content="">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<meta property="og:image" content="path/to/image.jpg">
	<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">

	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#000">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#000">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#000">

	<style>body { opacity: 0; overflow-x: hidden; } html { background-color: #fff; }</style>
	
	<?php wp_head(); ?>
</head>

<body>

	<div id="my-page">
		<div id="my-header">
		  	<div class="hamburger hamburger--arrow-r" type="button">
					<span class="hamburger-box"><span class="hamburger-inner"></span></span>
			</div>

				<div class="post-latest bgimage" style="background-image: url(<?php bloginfo('template_url') ?>/img/h2.jpg);">
					<div class="post-info">
						<p class="post-date">20.07.2017</p>
						<h2 class="post-title"><a href="post.html">Привет, Джедаи! В Москву прилетел R2D2 из LEGO</a></h2>
					</div>
					<div class="gradient-1"></div>
				</div>

		</div>