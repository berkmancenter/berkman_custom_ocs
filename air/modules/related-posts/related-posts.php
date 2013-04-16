<?php



/**

	Related Posts Module :: Air Framework



	The contents of this file are subject to the terms of the GNU General

	Public License Version 2.0. You may not use this file except in

	compliance with the license. Any of the license terms and conditions

	can be waived if you get permission from the copyright holder.



	Copyright (c) 2012 WPBandit

	Jermaine Marée



		@package air_related_posts

		@version 1.0

**/



// air_login

class air_related_posts {



	protected static

		// Option name

		$option_name = 'air-related-posts',

		// Options

		$options,

		// Path

		$path;



	/**

		Initialize module

			@public

	**/

	static function init() {

		// Get options

		self::$options = get_option(self::$option_name);

		

		// Set default options, if necessary

		if ( self::$options == FALSE ) {

			update_option(self::$option_name,'');

		}



		// Set Path

		self::$path = AIR_MODULES . '/related-posts';

		

		// Admin init

		add_action('admin_init',__CLASS__.'::admin_init');



		// Enable related posts

		if ( self::get_option('related-posts-enable') ) {

			// Add meta fields

			self::metadata();

		}

	}



	/**

		Get module option

			@public

	**/

	static function get_option($key,$default=FALSE) {

		if ( isset(self::$options[$key]) && self::$options[$key] )

			return self::$options[$key];

		else

			return $default;

	}



	/**

		Admin init

			@public

	**/

	static function admin_init() {

		// Register settings

		register_setting(self::$option_name.'-settings', self::$option_name,

			'AirValidate::init_module');

	}



	/**

		Add metadata

			@private

	**/

	private static function metadata() {

		// $pagenow variable

		global $pagenow;

		// Pages to apply custom fields

		$pages = array('post.php','post-new.php');

		// Check page

		if( !in_array($pagenow,$pages) )

			return;

		// Set files

		$files = array('related-posts-meta.php');

		// Initialize meta library

		AirMeta::init($files, self::$path);

	}



	/**

		Get related posts

			@public

	**/

	static function get_posts() {

		// Reset $post global

		wp_reset_postdata();

		// $post global

		global $post;



		// Define shared post arguments

		$args = array(

			'no_found_rows'				=> TRUE,

			'update_post_meta_cache'	=> FALSE,

			'update_post_term_cache'	=> FALSE,

			'ignore_sticky_posts'		=> 1,

			'orderby'					=> 'rand',

			'post__not_in'				=> array($post->ID),

			'posts_per_page'			=> 4

		);



		// Related by categories

		if ( 'cat' == self::$options['taxonomy'] ) {

			// Get related category meta

			$cats = get_post_meta($post->ID, 'air-related-cat', TRUE);



			// Set category query $args

			if ( !$cats ) {

				// Get post categories

				$cats = wp_get_post_categories($post->ID, array('fields'=>'ids'));

				// Append query $args

				$args['category__in'] = $cats;

			} else {

				// Append query $args

				$args['cat'] = $cats;

			}

		}



		// Related by tags

		if ( 'tag' == self::$options['taxonomy'] ) {

			// Get related tag meta

			$tags = get_post_meta($post->ID, 'air-related-tag', TRUE);



			// Set tag query $args

			if ( !$tags ) {

				// Get post tags

				$tags = wp_get_post_tags($post->ID, array('fields'=>'ids'));

				// Append query $args

				$args['tag__in'] = $tags;

			} else {

				// Append query $args

				$args['tag_slug__in'] = explode(',', $tags);

			}



			// If no tags, break query

			if ( !$tags ) { $break = TRUE; }

		}



		// Query posts

		$query = !isset($break)?new WP_Query($args):new WP_Query;



		// Return posts

		return $query;

	}



}



// Initialize module

air_related_posts::init();

