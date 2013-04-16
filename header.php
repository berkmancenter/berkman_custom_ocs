<!DOCTYPE html> 

<!--[if lt IE 7 ]><html class="no-js ie ie6" <?php language_attributes(); ?>> <![endif]-->

<!--[if IE 7 ]><html class="no-js ie ie7" <?php language_attributes(); ?>> <![endif]-->

<!--[if IE 8 ]><html class="no-js ie ie8" <?php language_attributes(); ?>> <![endif]-->

<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>

<meta charset="<?php bloginfo('charset'); ?>">

<meta name="viewport" content="width=device-width">



<title><?php wp_title(''); ?></title>



<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">



<script>document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>



<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

<!--[if lt IE 9]>

	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>

	<script src="<?php echo get_template_directory_uri(); ?>/js/ie/selectivizr.js"></script>

<![endif]-->

<?php wp_head(); ?>

</head>



<body <?php body_class(); ?>>

	

<?php echo wpb_page_background_image(); ?>



<div id="wrap">

	<header id="header">

		<div class="container">

			<?php wp_nav_menu(array('container'=>'nav','container_id'=>'topbar-nav','container_class'=>'fix','theme_location'=>'wpb-nav-topbar','menu_id'=>'nav-topbar','menu_class'=>'fix','fallback_cb'=>FALSE)); ?>

			

			<?php if ( wpb_option('header-widget-ads') ): ?>

			<div class="ads-header fix">

				<div class="container">

					<div class="grid one-full">

						<ul><?php dynamic_sidebar('widget-ads-header'); ?></ul>

					</div>

				</div>

			</div><!--/ads-header-->

			<?php endif; ?>

			

			<div id="header-inner" class="fix">			

				<div class="pad fix">

					<?php echo wpb_site_name(); ?>

					<?php echo wpb_site_desc(); ?>

					<?php if ( !wpb_option('disable-header-search') ): ?>

						<div id="header-search" class="fix"><?php get_search_form(); ?></div>

					<?php endif; ?>

					<?php if ( !wpb_option('disable-header-social') ): ?>			

						<?php echo wpb_social_media_links(array('id'=>'header-social')); ?>

					<?php endif; ?>

				</div>

				<div class="clear"></div>

			</div>

			<?php wp_nav_menu(array('container'=>'nav','container_id'=>'header-nav','container_class'=>'fix','theme_location'=>'wpb-nav-header','menu_id'=>'nav','menu_class'=>'fix','fallback_cb'=>FALSE)); ?>	

			

			<div id="header-line"></div>

			<?php wp_nav_menu(array('container'=>'nav','container_id'=>'subheader-nav','container_class'=>'fix','theme_location'=>'wpb-nav-subheader','menu_id'=>'nav-sub','menu_class'=>'fix','fallback_cb'=>FALSE)); ?>

		</div>

	</header><!--/header-->

	<?php if ( is_home() || is_single() ) get_template_part('_newsflash'); ?>

