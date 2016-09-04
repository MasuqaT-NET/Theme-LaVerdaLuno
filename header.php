<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<?php get_template_part('title'); ?>
		
		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon-16x16.png" sizes="16x16">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon.ico">
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/library/images/manifest.json">
		<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/safari-pinned-tab.svg" color="#81D813">
		<meta name="apple-mobile-web-app-title" content="La Verda Luno">
		<meta name="application-name" content="La Verda Luno">
		<meta name="theme-color" content="#AEF05A">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/library/images/browserconfig.xml" />

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<div id="container">

			<div class="site-top">
				<div class="wrap cf">
					<nav class="site-menu" role="navigation">
						<div class="menu-toggle"><i class="fa fa-bars"></i></div>
						<div class="menu-text"></div>
						<?php wp_nav_menu(array(
								'container' => 'div',                             // remove nav container
								'container_class' => 'menu-bar cf',                 // class of container (should you choose to use it)
								'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
								'menu_class' => 'nav top-nav cf',               // adding custom nav class
								'theme_location' => 'main-nav',                 // where it's located in the theme
								'before' => '',                                 // before the menu
								'after' => '',                                  // after the menu
								'link_before' => '',                            // before each link
								'link_after' => '',                             // after each link
								'depth' => 0,                                   // limit the depth of the nav
								'fallback_cb' => ''                             // fallback function (if there is one)
						)); ?>
					</nav>
					<div class="site-search">
						<div class="search-toggle"><i class="fa fa-search"></i></div>
						<div class="search-expand">
							<div class="search-expand-inner">
								<?php get_search_form(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

				<div id="inner-header" class="wrap cf">

					<?php // to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> ?>
					<p id="logo" class="h1" itemscope itemtype="http://schema.org/Organization"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></p>

					<?php // if you'd like to use the site description you can un-comment it below ?>
					<div class="site-description"><?php bloginfo('description'); ?></div>
				</div>

			</header>
