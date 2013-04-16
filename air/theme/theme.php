<?php



// Load common theme actions, functions, and filters

require ( AIR_THEME .'/theme-common.php');



// Custom TinyMCE button

require ( AIR_THEME . '/theme-tinymce.php');



/*---------------------------------------------------------------------------*/

/* Theme :: Setup + Actions

/*---------------------------------------------------------------------------*/



// Add admin actions

add_action( 'air_validate_theme_options', 'wpbandit_advanced_css', 10, 2 );

add_action( 'after_switch_theme', 'wpbandit_upgrade' );



// Add theme actions

add_action( 'after_setup_theme', 'wpbandit_setup_theme' );

add_action( 'widgets_init', 'wpbandit_widgets_init' );

add_action( 'wp_enqueue_scripts', 'wpbandit_styles' );

add_action( 'wp_enqueue_scripts', 'wpbandit_fancybox1_stylesheet');

add_action( 'wp_enqueue_scripts', 'wpbandit_scripts' );

add_action( 'pre_get_posts', 'wpbandit_pre_get_posts' );



// Add custom wpbandit actions

add_action( 'wpb_portfolio_javascript', 'wpb_portfolio_javascript', 10, 3);





/*---------------------------------------------------------------------------*/

/* Theme :: Functions

/*---------------------------------------------------------------------------*/



/**

	Upgrade theme

**/

function wpbandit_upgrade() {

	// Define page templates

	$templates = array(

		'template-menu-left.php' => 'page-templates/child-menu-left.php',

		'template-menu-right.php' => 'page-templates/child-menu-right.php',

		'template-full.php' => 'page-templates/full-width.php',

		'template-sidebar-left.php' => 'page-templates/sidebar-left.php',

		'template-sidebar-right.php' => 'page-templates/sidebar-right.php',

		'template-sitemap.php' => 'page-templates/sitemap.php'

	);

	

	// Get all pages (id only)

	$pages = get_all_page_ids();

	

	// Loop through pages

	foreach ($pages as $page_id) {

		// Get page template

		$template = get_post_meta($page_id,'_wp_page_template',true);

		// Check if template needs to be renamed

		if (array_key_exists($template,$templates)) {

			// Update page template

			update_post_meta($page_id,'_wp_page_template',$templates[$template]);

		}

	}

}



/**

	Setup theme

**/

function wpbandit_setup_theme() {

	// Set default options, if necessary

	Air::set_default_options();



	// Create wpbandit_images table

	wpbandit_create_images_table();



	// Load theme shortcodes

	require ( AIR_THEME . '/theme-shortcodes.php' );

}



/**

	Widgets init

	- register additional sidebars and widget areas

**/

function wpbandit_widgets_init() {

	// Footer widgets

	if ( Air::get_option('footer-widgets') ) {

		register_sidebar(array(

			'id'			=> 'widget-footer-1',

			'name'			=> 'Footer Column 1',

			'before_widget'	=> '<li id="%1$s" class="widget %2$s">',

			'after_widget'	=> '</li>',

			'before_title'	=> '<h3 class="widget-title fix"><span>',

			'after_title'	=> '</span></h3>',

		));

		register_sidebar(array(

			'id'			=> 'widget-footer-2',

			'name'			=> 'Footer Column 2',

			'before_widget'	=> '<li id="%1$s" class="widget %2$s">',

			'after_widget'	=> '</li>',

			'before_title'	=> '<h3 class="widget-title fix"><span>',

			'after_title'	=> '</span></h3>',

		));

		register_sidebar(array(

			'id'			=> 'widget-footer-3',

			'name'			=> 'Footer Column 3',

			'before_widget'	=> '<li id="%1$s" class="widget %2$s">',

			'after_widget'	=> '</li>',

			'before_title'	=> '<h3 class="widget-title fix"><span>',

			'after_title'	=> '</span></h3>',

		));

	}

	// Header ads

	if ( Air::get_option('header-widget-ads') ) {

		register_sidebar(array(

			'id'			=> 'widget-ads-header',

			'name'			=> 'Ads: Header',

			'before_widget'	=> '<li id="%1$s" class="widget %2$s">',

			'after_widget'	=> '</li>',

			'before_title'	=> '<h3 class="widget-title fix"><span>',

			'after_title'	=> '</span></h3>',

		));

	}

	// Footer ads

	if ( Air::get_option('footer-widget-ads') ) {

		register_sidebar(array(

			'id'			=> 'widget-ads-footer',

			'name'			=> 'Ads: Footer',

			'before_widget'	=> '<li id="%1$s" class="widget %2$s">',

			'after_widget'	=> '</li>',

			'before_title'	=> '<h3 class="widget-title fix"><span>',

			'after_title'	=> '</span></h3>',

		));

	}

	// Home widget columns (above recent posts)

	if ( Air::get_option('home-widgets-top') ) {

		register_sidebar(array(

			'id'			=> 'widget-home-top-1',

			'name'			=> 'Home: Top Column 1',

			'before_widget'	=> '<li id="%1$s" class="widget %2$s">',

			'after_widget'	=> '</li>',

			'before_title'	=> '<h3 class="widget-title fix"><span>',

			'after_title'	=> '</span></h3>',

		));

		register_sidebar(array(

			'id'			=> 'widget-home-top-2',

			'name'			=> 'Home: Top Column 2',

			'before_widget'	=> '<li id="%1$s" class="widget %2$s">',

			'after_widget'	=> '</li>',

			'before_title'	=> '<h3 class="widget-title fix"><span>',

			'after_title'	=> '</span></h3>',

		));

	}

	// Home widget columns (below recent posts)

	if ( Air::get_option('home-widgets-bottom') ) {

		register_sidebar(array(

			'id'			=> 'widget-home-bottom-1',

			'name'			=> 'Home: Bottom Column 1',

			'before_widget'	=> '<li id="%1$s" class="widget %2$s">',

			'after_widget'	=> '</li>',

			'before_title'	=> '<h3 class="widget-title fix"><span>',

			'after_title'	=> '</span></h3>',

		));

		register_sidebar(array(

			'id'			=> 'widget-home-bottom-2',

			'name'			=> 'Home: Bottom Column 2',

			'before_widget'	=> '<li id="%1$s" class="widget %2$s">',

			'after_widget'	=> '</li>',

			'before_title'	=> '<h3 class="widget-title fix"><span>',

			'after_title'	=> '</span></h3>',

		));

	}

}



/**

	Enqueue stylesheets

**/

function wpbandit_styles() {

	// responsive.css

	if ( !wpb_option('disable-responsive') ) {

		wp_enqueue_style('style-responsive');

	}

	// theme style

	if ( Air::get_option('style') )

		wp_enqueue_style('wpbandit-style',

			get_template_directory_uri().'/styles/'.Air::get_option('style'));

	// style-advanced.css

	if ( Air::get_option('advanced-css') )

		wp_enqueue_style('wpbandit-style-advanced',

			get_template_directory_uri().'/style-advanced.css');

	// custom.css

	if ( Air::get_option('custom-css') )

		wp_enqueue_style('wpbandit-custom');

}



/**

	Enqueue fancyBox1 stylesheet

**/

function wpbandit_fancybox1_stylesheet() {

	if ( 'fancybox1' == Air::get_option('js-fancybox') )

		wp_enqueue_style('fancybox1');

}



/**

	Enqueue scripts

**/

function wpbandit_scripts() {



	// comment-reply.js

	if ( is_singular() )

		wp_enqueue_script('comment-reply');



	// jquery.jplayer.min.js

	if ( !wpb_option('js-disable-jplayer') ) {

		wp_enqueue_script('jplayer');

	}



	// jquery.flexslider.min.js

	wp_enqueue_script('flexslider');

	

	// jquery.fancybox-1.3.4.pack.js

	if ( 'fancybox1' == Air::get_option('js-fancybox','fancybox2') ) {

		wp_enqueue_script('fancybox1');

	}

	

	// jquery.fancybox.pack.js

	if ( 'fancybox2' == Air::get_option('js-fancybox','fancybox2') ) {

		wp_enqueue_script('fancybox2');

		wp_enqueue_script('fancybox2-media-helper');

	}

	

	// jquery.mousewheel-3.0.6.pack.js

	wp_enqueue_script('mousewheel');



	// jquery.theme.js

	wp_enqueue_script('theme');



	// Translatable strings

	wp_localize_script('theme', 'objectL10n',

		array(

			'navigate' => __('Navigate to...','newsroom'),

		)

	);

}



/**

	Action to modify WordPress queries

**/

function wpbandit_pre_get_posts($query) {

	// Are we on main query ?

	if ( !$query->is_main_query() ) return;



	// is_home()

	if ( $query->is_home() && wpb_option('featured-slider-enable') ) {

		// Get post ids

		$post_ids = wpb_get_featured_post_ids();

		// Exclude posts

		if ( $post_ids && !wpb_option('featured-slider-include') )

			$query->set('post__not_in', $post_ids);

	}

}



/**

	Write advanced styles to style-advanced.css

**/

function wpbandit_advanced_css($section,$valid) {

	// Are we in styling section ?

	if ( 'styling' != $section ) { return; }

	

	// Advanced stylesheet enabled ?

	if ( '1' != $valid['advanced-css'] ) { return; }



	// Set filename

	$file = get_template_directory().'/style-advanced.css';



	// Cannot write to style-advanced.css

	if ( !is_writable($file) ) {

		// Add error if cannot write to file

		add_settings_error('air-settings-errors','air-updated',

			__('Cannot write to style-advanced.css. Please check permissions'.

			' and try saving settings again.','air'),'error');

		// Do not proceed further

		return;

	}



	// Get options

	$color_1 = $valid['styling-color-1'];

	$color_2 = $valid['styling-color-2'];

	$color_3 = $valid['styling-color-3'];

	

	$body_bg_color = $valid['styling-body-bg-color'];

	$body_bg_image = $valid['styling-body-bg-image'];

	$body_bg_image_repeat = $valid['styling-body-bg-image-repeat'];

	

	$widget_title_dark = $valid['styling-widget-title-dark'];

	$misc_arial = $valid['styling-misc-arial'];

	$misc_glass_effect = $valid['styling-misc-glass-effect'];

	$misc_newsflash = $valid['styling-misc-newsflash'];



	// Build style-advanced.css

	$styles = '/* Note : Do not place custom styles in this stylesheet */'."\n\n";



	// body

	$styles .= 'body { ';

		if ( $body_bg_color ) {	$styles .= 'background-color: #'.$body_bg_color.'; background-image: none; '; }

		if ( $body_bg_image ) {	$styles .= 'background-image: url('.$body_bg_image.'); '; }

		if ( $body_bg_image_repeat) { $styles .= 'background-repeat: '.$body_bg_image_repeat.'; background-position: top center; '; }		

	$styles .= '}'."\n";

	

	// misc arial

	if ( $misc_arial ) {

		$styles .= '

.text h1.alt,.text h2.alt,.text h3.alt,.text h4.alt,.text h5.alt,.text h6.alt,

.heading,

.miniheading,

#logo,

#nav,

#nav-sub,

.newsflash .first h3,

.newsflash .first p,

#page-image-text span.caption,

.entry-category,

.entry-comments,

.entry-browse li a strong,

.widget-title,

.widget_calendar caption,

.widget_calendar thead,

#nav-alt,

#child-menu { font-family: Arial, sans-serif; }



.text h1.alt,.text h2.alt,.text h3.alt,.text h4.alt,.text h5.alt,.text h6.alt { font-weight: bold; text-transform: none; line-height: 1.1em; }

.text h1.alt { font-size: 32px; }

.text h2.alt { font-size: 26px; }

.text h3.alt { font-size: 22px; }

.text h4.alt { font-size: 18px; }

.text h5.alt { font-size: 16px; }

.text h6.alt { font-size: 14px; }

.heading { font-size: 18px; font-weight: bold; text-transform: none;  }

.miniheading { font-size: 14px; font-weight: bold; text-transform: none; }

#logo { font-size: 32px; font-weight: bold; text-transform: none; letter-spacing: -1px; }

#nav { font-weight: bold; font-size: 14px; }

#nav li a { text-transform: none; }

#nav ul li a, #nav li:hover ul li a { font-size: 13px; text-transform: none; }

#nav-sub li a { font-size: 13px; text-transform: none; font-weight: bold; }

#nav-sub ul li a, #nav-sub li:hover ul li a { font-size: 13px; }

.newsflash .first h3 { font-size: 18px; font-weight: bold; text-transform: none; }

.newsflash .first p { font-size: 15px; font-weight: bold; text-transform: none; margin-top: -3px; margin-bottom: 3px; }

#page-image-text span.caption { font-size: 32px; font-weight: bold; text-transform: none; letter-spacing: -1px; }

.entry-category { font-size: 13px; font-weight: bold; text-transform: none; letter-spacing: 0; }

.single .entry-category { font-size: 15px; }

.entry-comments a { font-size: 12px; font-weight: bold; letter-spacing: 0; }

.entry-comments a span { padding: 2px 5px; }

.entry-browse li a strong { font-weight: bold; text-transform: none; letter-spacing: 0; }

.widget-title { font-size: 14px; font-weight: bold; text-transform: none; letter-spacing: 0; }

.widget_calendar caption { font-size: 14px; font-weight: bold; text-transform: none; letter-spacing: 0; }

.widget_calendar thead { font-size: 13px; font-weight: bold!important; }

#nav-alt li a { font-size: 13px; font-weight: bold; text-transform: none; }

#nav-alt ul li a, #nav-alt li:hover ul li a { font-size: 13px; text-transform: none; }

#child-menu li a { font-size: 14px; font-weight: bold; text-transform: none; letter-spacing: 0; }

#child-menu li ul li a  { font-size: 15px; font-weight: bold; text-transform: none; letter-spacing: 0; }

		'."\n";

	}

	

	// misc glass effect

	if ( $misc_glass_effect ) {

		$styles .= '.glass { display: block!important; }'."\n";

	}

	// misc newsflash

	if ( $misc_newsflash ) {

		$styles .= '@media only screen and (max-width: 639px) { #subheader { display: none; } }'."\n";

	}

	

	// widget title text/icons

	if ( $widget_title_dark ) {

		$styles .= '

.sidebar .widget-title span { background-image: url(img/icons-14-dark.png); color: #111; }	

		'."\n";

	}

	

	// theme color 3 (widget title)

	if ( $color_3 ) {

		$rgb = wpb_hex2rgb($color_2);

		$styles .= '

.sidebar .widget-title span,

#child-menu li a { background-color: #'.$color_3.'; }

.sidebar .widget-title { border-bottom-color: #'.$color_3.'; }

		'."\n"; }

	

	// theme color 2

	if ( $color_2 ) {

		$rgb = wpb_hex2rgb($color_2);

		$styles .= '

.entry-comments a span,

.entry-comments a span i.pike,

.entry-comments a:hover span,

.entry-comments a:hover span i.pike,

div.jp-play-bar, div.jp-volume-bar-value { background-color: #'.$color_2.'; }

		'."\n"; }

	

	// theme color 1

	if ( $color_1 ) {

		$rgb = wpb_hex2rgb($color_1);

		$styles .= '

a,

label .required,

.comment-awaiting-moderation,

#nav li a:hover, 

#nav li:hover a, 

#nav li.current_page_item a, 

#nav li.current-menu-ancestor a, 

#nav li.current-menu-item a,

#nav-sub li a:hover, 

#nav-sub li:hover a, 

#nav-sub li.current_page_item a, 

#nav-sub li.current-menu-ancestor a, 

#nav-sub li.current-menu-item a,

#nav-topbar li a:hover, 

#nav-topbar li:hover a, 

#nav-topbar li.current_page_item a, 

#nav-topbar li.current-menu-ancestor a, 

#nav-topbar li.current-menu-item a,

.entry-meta li.entry-author a,

.widget_rss ul li a,

.widget_tag_cloud .tagcloud a:hover,

.widget_calendar a,

#subfooter .widget_calendar a,

#child-menu li li li.current_page_item a,

#child-menu li li li.current-menu-item a,

#child-menu li li li.current_page_item a:hover,

#child-menu li li li.current-menu-item a:hover,

ul.tabs-nav li a.active,

.accordion .title a:hover,

.accordion .title.active a,

.toggle .title:hover,

.toggle .title.active { color: #'.$color_1.'; }



#header-line,

#nav li.current_page_item a, 

#nav li.current-menu-ancestor a, 

#nav li.current-menu-item a,

.entry-tags a:hover,

.widget_calendar caption,

#footer a#to-top,

input[type="submit"],

button[type="submit"],

a.button,

.accordion .title.active .icon,

.toggle .title.active .icon { background-color: #'.$color_1.'; }



.widget_wpb_tabs .wpb-tabs li a.active { background-color: #'.$color_1.'!important; }



.color { color: #'.$color_1.'!important; }

::selection { background-color: #'.$color_1.'; }

::-moz-selection { background-color: #'.$color_1.'; }



ul.tabs-nav li a.active { border-top-color: #'.$color_1.'; }

			'."\n";

		}



	// open file for writing

	$fh = fopen($file, 'w');

	// write styles

	fwrite($fh, $styles);

	// close file

	fclose($fh);



	return TRUE;

}





/*---------------------------------------------------------------------------*/

/* Theme :: Template Functions

/*---------------------------------------------------------------------------*/



/**

	Page Title

**/

function wpb_page_title() {

	global $post;



	$heading = get_post_meta($post->ID,'_heading',TRUE);

	$subheading = get_post_meta($post->ID,'_subheading',TRUE);

	$title = $heading?$heading:the_title();

	if($subheading) {

		$title = $title.' <span>'.$subheading.'</span>';

	}



	return $title;

}



/**

	Blog Heading

**/

function wpb_blog_heading() {

	global $post;



	$heading = Air::get_option('blog-heading');

	$subheading = Air::get_option('blog-subheading');

	$title = $heading;

	if($subheading) {

		$title = $title.' <span>'.$subheading.'</span>';

	}



	return $title;

}



/**

	Page Background Image

**/

function wpb_page_background_image() {

	// Skip meta check on 404, search, and archive pages

	if ( is_404() || is_search() || is_archive() )

		$skip = TRUE;



	// Global $post variable

	global $post;



	// Static front page ?

	$static = (get_option('show_on_front')==='page')?TRUE:FALSE;



	// Check for post/blog image

	if ( !is_home() && !isset($skip) ) {

		$post_image = get_post_meta($post->ID,'_bg-image',TRUE);

		$post_image_settings = get_post_meta($post->ID,'_bg-image-settings',TRUE);

	} elseif( is_home() && $static ) {

		$blog_page_id = get_option('page_for_posts');

		$post_image = get_post_meta($blog_page_id,'_bg-image',TRUE);

		$post_image_settings = get_post_meta($blog_page_id,'_bg-image-settings',TRUE);

	} else {

		$post_image = NULL;

	}



	// Background Image?

	if( !$post_image && Air::get_option('global-bg-image') ) {

		$background = '<img id="background" class="'.Air::get_option('global-bg-image-settings').'" src="'.Air::get_option('global-bg-image').'">';

	} elseif ( $post_image ) {

		$background = '<img id="background" class="'.$post_image_settings.'" src="'.$post_image.'">';

	} else {

		$background = '';

	}

	return $background;

}



/**

	Page Featured Image Caption

**/

function wpb_post_thumbnail_caption() {

	global $post;

	$output = '';



	$thumbnail_id    = get_post_thumbnail_id($post->ID);

	$thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));



	if ($thumbnail_image && isset($thumbnail_image[0])) {

		if($thumbnail_image[0]->post_excerpt) {

			$output .= '<span class="caption">'.$thumbnail_image[0]->post_excerpt.'</span>';

		}

		if($thumbnail_image[0]->post_content) {

			$output .= '<span class="description"><i>'.$thumbnail_image[0]->post_content.'</i></span>';

		}

	}



	return isset($output)?$output:'';

}



/**

	Archive heading

**/

function wpb_archive_heading() {

	// Author archive page

	if ( is_author() ) {

		if(get_query_var('author_name'))

			$author = get_user_by('login',get_query_var('author_name'));

		else

			$author=get_userdata(get_query_var('author'));

		$heading = __('Author:','newsroom').' ';

		$heading .= '<span>'.$author->display_name.'</span>';

	}

	// Category archive page

	if ( is_category() ) {

		$heading = __('Category:','newsroom').' ';

		$heading .= '<span>'.single_cat_title('', false).'</span>';

	}

	// Tag archive page

	if ( is_tag() ) {

		$heading = __('Tagged:','newsroom').' ';

		$heading .= '<span>'.single_tag_title('', false).'</span>';

	}

	// Daily archive

	if ( is_day() ) {

		$heading = __('Daily Archive:','newsroom').' ';

		$heading .= '<span>'.get_the_time('F j, Y').'</span>';

	}

	// Monthly archive

	if ( is_month() ) {

		$heading = __('Monthly Archive:','newsroom').' ';

		$heading .= '<span>'.get_the_time('F Y').'</span>';

	}

	// Yearly archive page

	if ( is_year() ) {

		$heading = __('Yearly Archive:','newsroom').' ';

		$heading .= '<span>'.get_the_time('Y').'</span>';

	}

	return isset($heading)?$heading:'';

}



/**

	Social Media Links

**/

function wpb_social_media_links($attrs = NULL) {

	// Set attributes

	$attrs = isset($attrs)?air_attrs($attrs):'';



	// Get links

	$links = air_social::get_items();



	// Create links

	if ( $links ) {

		// Start output

		$output = '<ul'.$attrs.'>';



		// Loop through links

		foreach($links as $link) {

			$target = ('1'==$link['new-window'])?' target="_blank"':'';

			$output .= '<li><a href="'.$link['url'].'"'.$target.'><span class="icon"><img src="'.

				$link['icon'].'" alt="'.$link['name'].'" /></span><span class="icon-title"><i class="icon-pike"></i>'.$link['name'].'</span></a></li>';

		}

		$output .= '</ul>';



		// Return links

		return $output;

	}

}



/**

	Are breadcrumbs enabled?

**/

function wpb_breadcrumbs_enabled() {

	# Static front page

	$static = ('page'===get_option('show_on_front'))?TRUE:FALSE;

	# Disabled

	if(air_breadcrumbs::get_option('breadcrumbs-enable'))

		$status = TRUE;

	# Disabled on front page

	if(is_front_page() && $static && air_breadcrumbs::get_option('breadcrumbs-disable-front'))

		$status = FALSE;

	# Disabled on home page

	if(is_home() && air_breadcrumbs::get_option('breadcrumbs-disable-home'))

		$status = FALSE;

	# Disabled on archive pages

	if(is_archive() && air_breadcrumbs::get_option('breadcrumbs-disable-archive'))

		$status = FALSE;

	# Disabled

	return isset($status)?$status:FALSE;

}



/**

	Breadcrumbs

**/

function wpb_breadcrumbs() {

	return air_breadcrumbs::display();

}



/**

	Get featured post ids

**/

function wpb_get_featured_post_ids() {

	// Set arguments

	$args = array(

		'category'		=> Air::get_option('featured-slider-category'),

		'numberposts'	=> Air::get_option('featured-slider-number')

	);



	// Get posts

	$posts = get_posts($args);



	// Do we have posts?

	if ( !$posts ) return FALSE;



	// Loop through posts

	foreach ( $posts as $post )

		$ids[] = $post->ID;



	// Return post ids

	return $ids;

}





/*---------------------------------------------------------------------------*/

/* Theme :: Filters

/*---------------------------------------------------------------------------*/



/**

	Body Class

**/

function wpbandit_body_class($classes) {

	if ( Air::get_option('sidebar-mobile-disable') )

		$classes[] = 'mobile-sidebar-disable';

	return $classes;

}

add_filter('body_class','wpbandit_body_class');



/**

	Newsflash : Filter popular posts

**/

function wpbandit_filter_popular_posts($where) {

	$range = wpb_option('newsflash-most-popular');



		// Get blog's local current time

		$time = current_time('timestamp');



		// Get posts greater than certain date

		if ( $range ) {

			// Post date > $range

			$where .= " AND post_date > '" . date('Y-m-d', strtotime('-1 ' . $range, $time)) . "'";

		}



		// Comment count > 0

		$where .= " AND comment_count > " . 0;



		// Return $where

		return $where;

}



