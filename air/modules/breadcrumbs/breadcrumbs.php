<?php



/**

	Breadcrumbs Module :: Air Framework



	The contents of this file are subject to the terms of the GNU General

	Public License Version 2.0. You may not use this file except in

	compliance with the license. Any of the license terms and conditions

	can be waived if you get permission from the copyright holder.



	Copyright (c) 2012 WPBandit

	Jermaine Marée



		@package air_breadcrumbs

		@version 1.0

**/



// air_breadcrumbs

class air_breadcrumbs extends Air {



	//@{ Module variables

	protected static

		// Option Name

		$option_name = 'air-breadcrumbs',

		// Option

		$options;

	//@}



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

		

		// Admin init

		add_action('admin_init',__CLASS__.'::admin_init');

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

		Display breadcrumbs

			@public

	**/

	static function display() {

		// Global post variable

		global $post;



		// Static front page ?

		$static = ('page' === get_option('show_on_front'))?TRUE:FALSE;



		// Set before and after tags

		$before = '<span><i>';

		$after = '</i></span>';



		// Archive label separator

		$sep = self::get_option('label-separator-archive', ': ');



		// Start breadcrumb

		$output  = '<ul id="breadcrumbs" class="fix">';

		$output .= '<li class="first"><a class="home" href="'.home_url().'">Home</a></li>';



		// Front Page

		if ( is_front_page() && $static ) {

			// Get breadcrumbs front text option

			$front_text = self::get_option('label-front', get_bloginfo('name'));

			// Front label

			$output .= '<li>'.$before.$front_text.$after.'</li>';

		} elseif ( is_front_page() ) {

			// Get breadcrumbs home text option

			$front_text = self::get_option('label-home', get_bloginfo('name'));

			// Home label

			$output .= '<li>'.$before.$front_text.$after.'</li>';

		}



		// Home Page (blog when static front page is set)

		if ( is_home() && $static ) {

			// Get page id

			$page_id = get_option('page_for_posts');

			// Set breadcrumbs home text

			$home_text = self::get_option('label-home', get_the_title($page_id));

			// Home label

			$output .= '<li>'.$before.$home_text.$after.'</li>';

		} elseif ( ( (is_category() || is_tag()) || (is_single() && ('post' == get_post_type())) ) && $static ) {

			// Get page id

			$page_id = get_option('page_for_posts');

			// Set breadcrumbs blog text

			$home_text = self::get_option('label-home', get_the_title($page_id));

			// Blog label

			$output .= '<li><a href="'.get_permalink($page_id).'">'.$home_text.'</a></li>';

		}



		// 404

		if ( is_404() ) {

			// Set 404 label

			$label = self::get_option('label-404', 'Error 404');

			// Crumb

			$output .= '<li>'.$before .$label.$after.'</li>';

		}



		// Author

		if ( is_author() ) {

			// Get author data

			global $author;

			$userdata = get_userdata($author);

			

			// Set author prefix

			if ( !self::get_option('disable-prefix-archives') ) {

				$label = self::get_option('label-prefix-author', 'Author');

			} else {

				$label = $sep = '';

			}

			// Crumb

			$output .= '<li>'.$before.$label.$sep.$userdata->display_name.$after.'</li>';

		}



		// Category

		if ( is_category() ) {

			// Get category object

			global $wp_query;

			$cat_obj = $wp_query->get_queried_object();

			$cat = $cat_obj->term_id;

			$cat = get_category($cat);



			// Get category parents if they exist

			if ( $cat->parent != 0 ) {

				$parent_cat = get_category($cat->parent);

				$output .= '<li>'.get_category_parents($parent_cat, TRUE, '</li><li>');

			}



			// Set category prefix

			if ( !self::get_option('disable-prefix-archives') ) {

				$label = self::get_option('label-prefix-category', 'Category');

			} else {

				$label = $sep = '';

			}

			

			// Crumb

			$output .= '<li>'.$before.$label.$sep.' '.single_cat_title('',FALSE).$after.'</li>';

		}



		// Day

		if ( is_day() ) {

			// Get year and month

			$output .= '<li><a href="'.get_year_link(get_the_time('Y')).'">'.get_the_time('Y').'</a></li>';

			$output .= '<li><a href="'.get_month_link(get_the_time('Y'),get_the_time('m')).'">'.

				get_the_time('F').'</a></li>';



			// Crumb

			$output .= '<li>'.$before.$label.$sep.get_the_time('d').$after.'</li>';

		}



		// Month

		if ( is_month() ) {

			// Get year

			$output .= '<li><a href="'.get_year_link(get_the_time('Y')).'">'.get_the_time('Y').'</a></li>';



			// Crumb

			$output .= '<li>'.$before.get_the_time('F').$after.'</li>';

 		}



 		// Page (no parent)

 		if ( is_page() && !$post->post_parent && !is_front_page() ) {

 			$output .= '<li>'.$before.get_the_title().$after.'</li>';

 		}



 		// Page (with parents)

 		if ( is_page() && $post->post_parent && !is_front_page() ) {

 			$parent_id  = $post->post_parent;



 			// Loop through pages

 			$pages = array();

			while ( $parent_id ) {

				$page = get_page($parent_id);

				$pages[] = '<li><a href="'.get_permalink($page->ID).'">'.get_the_title($page->ID).'</a></li>';

				$parent_id  = $page->post_parent;

			}



			// Reverse $pages array

			$pages = array_reverse($pages);



			// Add crumbs to output

			foreach ( $pages as $page ) { $output .= $page; }



			// Page title

			$output .= '<li>'.$before.get_the_title().$after.'</li>';

		}



		// Single

		if ( is_single() && !is_attachment() ) {

			// Are post titles disable ?

			$disable_post_title = self::get_option('disable-post-title');

			$class = $disable_post_title?' class="last"':'';

			

			// Post

			if ( 'post' == get_post_type() ) {

				// Get first post category

				$cat = get_the_category();

				$cat_id = $cat[0]->term_id;



				// Category has parents ?

				if ( $cat[0]->category_parent > 0 ) {

					$output .= '<li'.$class.'>'.get_category_parents($cat_id, TRUE, '</li><li>');

				} else {

					$cat_link = get_category_link($cat[0]->term_id);

					$output .= '<li'.$class.'><a href="'.esc_url($cat_link).

						'">'.$cat[0]->name.'</a></li>';

				}



				// Are post titles enabled ?

				if ( !$disable_post_title ) {

					$output .= '<li>'.$before.get_the_title().$after.'</li>';

				}

			}



			// Custom post type

			if ( 'post' != get_post_type() ) {

				$post_type = get_post_type_object(get_post_type());

				$slug = $post_type->rewrite;

				$taxonomies = $post_type->taxonomies;



				// Loop through taxonomies

				foreach ( $taxonomies as $tax ) {

					$taxonomy = get_taxonomy($tax);

					// Hierarchical ?

					if ( $taxonomy->hierarchical ) {

						$taxonomy = $tax;

						break;

					} else {

						$taxonomy = NULL;

					}

				}



				// Are taxonomies set ?

				if ( isset($taxonomy) ) {

					// Get terms

					$terms = get_the_terms(get_the_ID(), $taxonomy);



					// Do terms exist ?

					if ( $terms ) {

						// Get first term

						$term = current($terms);



						// Ancestors

						$ancestors = get_ancestors($term->term_id, $term->taxonomy);



						// Are there ancestors ?

						if ( $ancestors ) {

							// Reverse array

							$ancestors = array_reverse($ancestors);



							// Loop through ancestors

							foreach ( $ancestors as $id) {

								$ancestor = get_term($id, $term->taxonomy);

								$output .= '<li><span class="nolink">'.$ancestor->name.'</span></li>';

							}

						}



						// Output term category

						$output .= '<li'.$class.'><span class="nolink">'.$term->name.'</span></li>';

					}

				}

				

				// Are post titles enabled ?

				if ( !$disable_post_title ) {

					// Post title

					$output .= '<li>'.$before.get_the_title().$after.'</li>';

				}

			}

		}



 		// Search

		if ( is_search() ) {

			// Search label

			$label = self::get_option('label-search', 'Search');

			// Crumb

			$output .=  '<li>'.$before.$label.$after.'</li>';

		}



		// Tagged

		if ( is_tag() ) {

			// Tag label prefix

			if ( !self::get_option('disable-prefix-archives') ) {

				$label = self::get_option('label-prefix-tag', 'Tagged');

			} else {

				$label = $sep = '';

			}

			// Crumb

			$output .= '<li>'.$before.$label.$sep.' '.single_tag_title('',FALSE).$after.'</li>';

		}

		

		// Year

		if ( is_year() ) {

			$output .= '<li>'.$before.get_the_time('Y').$after.'</li>';

		}



		// Custom post type archive

		if ( is_post_type_archive() ) {

			$output .= '<li>'.$before.post_type_archive_title('',FALSE).$after.'</li>';

		}



		// Custom taxonomy archive

		if ( is_tax() ) {

			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

			$output .= '<li>'.$before.$term->name.$after.'</li>';

		}



		// End breadcrumb

		$output .= '</ul>';



		// Return breadcrumb

		return $output;

	}



}



// Initialize module

air_breadcrumbs::init();

