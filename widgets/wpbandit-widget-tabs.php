<?php

/**

	WPBandit Tabs Widget



	The contents of this file are subject to the terms of the GNU General

	Public License Version 2.0. You may not use this file except in

	compliance with the license. Any of the license terms and conditions

	can be waived if you get permission from the copyright holder.



	Copyright (c) 2012 WPBandit

	Jermaine Marée



		@package WPB_Widget_Tabs

		@version 1.1

**/



class WPB_Widget_Tabs extends WP_Widget {



	public

		$id = 'wpb-tabs',

		$name = 'WPB Tabs',

		$class = 'widget_wpb_tabs';



	private

		$domain = 'newsroom',

		$vars;



	/**

		Class constructor

			@public

	**/

	public function __construct() {

		parent::__construct($this->id,$this->name,

			// Widget Options

			array(

				'classname'		=> $this->class,

				'description'	=> __('List posts, comments, and/or tags with or without tabs.',$this->domain)

			)

		);

	}



	/**

		Form

			@public

	**/

 	public function form($instance) {

		// Defaults

		$defaults = array(

			'title' 			=> __('Tabs',$this->domain),

			'order-recent'		=> '0',

			'order-popular'		=> '1',

			'order-comments'	=> '2',

			'order-tags'		=> '3',

			'recent-enable'		=> '0',

			'recent-cat-id'		=> '0',

			'recent-thumb'		=> '0',

			'recent-num'		=> '4',

			'popular-enable'	=> '0',

			'popular-cat-id'	=> '0',

			'popular-time'		=> '0',

			'popular-thumb'		=> '0',

			'popular-num'		=> '4',

			'comments-enable'	=> '0',

			'comments-avatar'	=> '0',

			'comments-num'		=> '4',

			'tags-enable'		=> '0'

		);



		// Parse $instance and merge with $defaults

		$val = wp_parse_args((array)$instance, $defaults);



		// Title field

		$form = AirForm::widget_text($this->_field_atts('title'), $val['title'], 'Title:');



		// Divider

		$form .= '<hr style="border:none;border-bottom: 2px solid #ddd;">';



		// Recent Posts

		$form .= sprintf('<h4 style="margin-bottom:0.665em">%s</h4>',__('Recent Posts',$this->domain));

		$form .= AirForm::widget_checkbox($this->_field_atts('recent-enable'), $val['recent-enable'],

			__('Enable recent posts',$this->domain), '<p>', '<br/>');

		$form .= AirForm::widget_checkbox($this->_field_atts('recent-thumb'), $val['recent-thumb'],

			__('Enable thumbnails',$this->domain), '');

		$form .= AirForm::widget_category_dropdown($this->_field_atts('recent-cat-id'), $val['recent-cat-id'],

			__('Category:',$this->domain));

		$form .= AirForm::widget_select($this->_field_atts('recent-num',array('class'=>'')), $val['recent-num'],

			air_range(0,10), __('Number of posts: ',$this->domain));



		// Divider

		$form .= '<hr style="border:none;border-bottom: 2px solid #ddd;">';



		// Most Popular

		$form .= sprintf('<h4 style="margin-bottom:0.665em">%s</h4>',__('Most Popular',$this->domain));

		$form .= AirForm::widget_checkbox($this->_field_atts('popular-enable'), $val['popular-enable'],

			__('Enable most popular',$this->domain), '<p>', '<br/>');

		$form .= AirForm::widget_checkbox($this->_field_atts('popular-thumb'), $val['popular-thumb'],

			__('Enable thumbnails',$this->domain), '');

		$form .= AirForm::widget_category_dropdown($this->_field_atts('popular-cat-id'), $val['popular-cat-id'],

			__('Category:',$this->domain));

		$form .= AirForm::widget_select($this->_field_atts('popular-time'), $val['popular-time'],

			array(

				'0'		=> __('All Time',$this->domain),

				'month'	=> __('This Month', $this->domain),

				'week'	=> __('This Week', $this->domain),

				'day'	=> __('Past 24 hours',$this->domain)

			), __('Posts with most comments from:',$this->domain));

		$form .= AirForm::widget_select($this->_field_atts('popular-num',array('class'=>'')), $val['popular-num'],

			air_range(0,11), __('Number of posts: ',$this->domain));



		// Divider

		$form .= '<hr style="border:none;border-bottom: 2px solid #ddd;">';



		// Recent Comments

		$form .= sprintf('<h4 style="margin-bottom:0.665em">%s</h4>',__('Recent Comments',$this->domain));

		$form .= AirForm::widget_checkbox($this->_field_atts('comments-enable'), $val['comments-enable'],

			__('Enable recent comments',$this->domain), '<p>', '<br/>');

		$form .= AirForm::widget_checkbox($this->_field_atts('comments-avatar'), $val['comments-avatar'],

			__('Enable avatars',$this->domain), '');

		$form .= AirForm::widget_select($this->_field_atts('comments-num',array('class'=>'')), $val['comments-num'],

			air_range(0,11), __('Number of posts: ',$this->domain));



		// Divider

		$form .= '<hr style="border:none;border-bottom: 2px solid #ddd;">';



		// Tags

		$form .= sprintf('<h4 style="margin-bottom:0.665em">%s</h4>',__('Tags',$this->domain));

		$form .= AirForm::widget_checkbox($this->_field_atts('tags-enable'), $val['tags-enable'],

			__('Enable tags',$this->domain));



		// Divider

		$form .= '<hr style="border:none;border-bottom: 2px solid #ddd;">';



		// Tab Order

		$form .= sprintf('<h4 style="margin-bottom:0.665em">%s</h4>',__('Tab Order',$this->domain));

		

		$form .= '<table>';

		

		$form .= sprintf('<tr><td style="width:125px;">%s</td>',__('Recent Posts',$this->domain));

		$form .= sprintf('<td>%s</td></tr>',

			AirForm::text($this->_field_atts('order-recent',array('size'=>2)),

			$val['order-recent']));

		

		$form .= sprintf('<tr><td>%s</td>',__('Most Popular',$this->domain));

		$form .= sprintf('<td>%s</td></tr>',

			AirForm::text($this->_field_atts('order-popular',array('size'=>2)),

			$val['order-popular']));

		

		$form .= sprintf('<tr><td>%s</td>',__('Comments',$this->domain));

		$form .= sprintf('<td>%s</td></tr>',

			AirForm::text($this->_field_atts('order-comments',array('size'=>2)),

			$val['order-comments']));



		$form .= sprintf('<tr><td>%s</td>',__('Tags',$this->domain));

		$form .= sprintf('<td>%s</td></tr>',

			AirForm::text($this->_field_atts('order-tags',array('size'=>2)),

			$val['order-tags']));



		$form .= '</table>';



		// Print form

		echo $form;

	}



	/**

		Update

			@public

	**/

	public function update($new,$old) {

		// Get existing options

		$valid = $old;



		// Define options + order

		$options = 'title|recent-enable|recent-cat-id|recent-thumb|recent-num'.

			'|popular-enable|popular-cat-id|popular-time|popular-thumb|popular-num'.

			'|comments-enable|comments-avatar|comments-num|tags-enable';

		$order = 'order-recent|order-popular|order-comments|order-tags';



		// Validate options

		foreach ( explode('|',$options) as $option )

			$valid[$option] = esc_attr($new[$option]);	



		// Validate order

		foreach ( explode('|', $order) as $option ) {

			if ( $new[$option] && is_numeric($new[$option]) ) {

				$valid[$option] = esc_attr($new[$option]);

			} else {

				$valid[$option] = '0';

			}



		}	



		// Return validated options

		return $valid;

	}



	/**

		Widget

			@public

	**/

	public function widget($args,$opts) {

		// Get widget id

		$widget_class = explode('-', $args['widget_id']);

		$wid = $widget_class[count($widget_class) - 1];



		// Set content, tabs counter

		$content = $tmp = '';

		$tabs = array();

		$count = 0;



		// Set tab order

		$order = array(

			'recent'	=> $opts['order-recent'],

			'popular'	=> $opts['order-popular'],

			'comments'	=> $opts['order-comments'],

			'tags'		=> $opts['order-tags']

		);



		// Sort order based on values

		asort($order);



		// Loop through tabs based on order

		foreach ( $order as $key => $value ) {

			// Tab enabled ?

			if ( $opts[$key.'-enable'] ) {

				$tmp .= call_user_func_array(array($this,'_'.$key),

					array($opts,$wid));

				$tabs[] = $key;

				$count++;

			}

		}



		// Create tabs

		if ( $tabs && ($count > 1) )

			$content .= $this->_create_tabs($tabs,$count,$wid);



		// Add tabs content

		$content .= $tmp;



		// Set widget title

		$title = $opts['title'];



		// Build widget

		$widget = $this->_build_widget($args,$title,$content,$count);



		// Print widget

		echo $widget;

	}



	/**

		Filter post date

			@public

	**/

	public function filter_post_date($where) {

		$range = $this->vars['date-range'];



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



	/**

		Get field attributes

			@private

	**/

	private function _field_atts($name,$extra=NULL) {

		$atts = array(

			'id'	=> $this->get_field_id($name),

			'name'	=> $this->get_field_name($name)

		);



		// Merge extra attributes

		if ( $extra ) $atts = array_merge($atts, $extra);



		// Return attributes

		return $atts;

	}



	/**

		Builds widget

			@private

	**/

	private function _build_widget($args,$title,$content='') {

		extract($args);

		$title = apply_filters($this->class.'_title', $title);

		

		// Build widget

		$widget = $before_widget;

		if ( !empty($title) )

			$widget .= $before_title . $title . $after_title;

		$widget .= $content;

		$widget .= $after_widget;



		// Return widget

		return $widget;

	}



	/**

		Create tabs

			@private

	**/

	private function _create_tabs($tabs,$count,$wid) {

		// Define titles

		$titles = array(

			'recent'	=> __('Recent Posts',$this->domain),

			'popular'	=> __('Most Popular',$this->domain),

			'comments'	=> __('Comments',$this->domain),

			'tags'		=> __('Tags',$this->domain)

		);



		// Start tabs output

		$output = sprintf('<ul class="wpb-tabs fix tabs-%s">', $count);



		// Loop through tabs

		foreach ( $tabs as $tab ) {

			$output .= sprintf('<li class="wpb-tab-%1$s"><a href="#wpb-tab-%2$s" title="%3$s"><span>%3$s</span></a></li>',

				$tab, $tab.'-'.$wid, $titles[$tab]);

		}



		// End tabs output

		$output .= '</ul>';



		// Return output

		return $output;

	}



	/**

		Recent posts

			@private

	**/

	private function _recent($opts,$wid) {

		// Arguments

		$args = array(

			'numberposts'	=> $opts['recent-num'],

			'category'		=> $opts['recent-cat-id']

		);



		// Get posts

		$posts = get_posts($args);



		// Check if we have posts

		if ( !$posts ) return '';



		// Start posts list

		$output = sprintf('<ul id="wpb-tab-recent-%s" class="list-recent wpb-tab">', $wid);



		// Loop through posts

		foreach ( $posts as $post ) {

			// Set post id, date, format, link, thumbnail, title

			$id = $post->ID;

			$date = get_the_time(get_option('date_format'), $id);

			$format = 'format-'.get_post_format($id);

			$link = get_permalink($id);

			$title = get_the_title($id);

			$thumb = get_the_post_thumbnail($id, 'size-thumbnail');



			// Set placeholder thumbnail, if none set

			if ( !$thumb && $opts['recent-thumb'] ) {

				$thumb = sprintf('<img src="%s/img/widgets/tabs-thumb.jpg">',

					get_template_directory_uri());

			}



			// Set classes

			$classes = $format;

			if ( $thumb && $opts['recent-thumb'] ) $classes .= ' wpb-thumb-enabled';



			// Build post list item

			$output .= sprintf('<li class="%s fix">', $classes);

			$output .= sprintf('<a title="%1$s" href="%2$s">', $title, $link);



			// Check for post thumbnail

			if ( $thumb && $opts['recent-thumb'] ) {

				$output .= '<span class="wpb-thumb">';

				$output .= $thumb;

				if ( in_array($format, array('format-audio','format-video')) )

					$output .= '<i class="icon-thumb"></i>';

				$output .= '</span>';

			}

				

			$output .= '<span class="wpb-text">';

			$output .= sprintf('<i class="title">%s</i>', $title);

			$output .= sprintf('<i class="meta">%s</i>', $date);

			$output .= '</span></a></li>';

		}



		// End posts list

		$output .= '</ul>';



		// Return output

		return $output;

	}



	/**

		Most popular

			@private

	**/

	private function _popular($opts,$wid) {

		// Temp fix for new popular-cat-id option

		$opts['popular-cat-id'] = isset($opts['popular-cat-id'])?$opts['popular-cat-id']:'0';



		// Arguments

		$args = array(

			'numberposts'		=> $opts['popular-num'],

			'category'			=> $opts['popular-cat-id'],

			'orderby'			=> 'comment_count',

			'suppress_filters'	=> FALSE

		);



		// Set date range

		$this->vars['date-range'] = $opts['popular-time'];



		// Add filter, Get posts, Remove filter

		add_filter('posts_where', array($this,'filter_post_date'));

		$posts = get_posts($args);

		remove_filter('posts_where', array($this,'filter_post_date'));



		// Check if we have posts

		if ( !$posts ) return '';



		// Start posts list

		$output = sprintf('<ul id="wpb-tab-popular-%s" class="list-popular wpb-tab">', $wid);



		// Loop through posts

		foreach ( $posts as $post ) {

			// Set post id, date, format, link, thumbnail, title

			$id = $post->ID;

			$date = get_the_time(get_option('date_format'), $id);

			$format = 'format-'.get_post_format($id);

			$link = get_permalink($id);

			$title = get_the_title($id);

			$thumb = get_the_post_thumbnail($id, 'size-thumbnail');

			$comments_num = get_comments_number($id);



			// Set placeholder thumbnail, if none set

			if ( !$thumb && $opts['popular-thumb'] ) {

				$thumb = sprintf('<img src="%s/img/widgets/tabs-thumb.jpg">',

					get_template_directory_uri());

			}



			// Set classes

			$classes = $format;

			if ( $thumb && $opts['popular-thumb'] ) $classes .= ' wpb-thumb-enabled';



			// Build post list item

			$output .= sprintf('<li class="%s fix">', $classes);

			$output .= sprintf('<a title="%1$s" href="%2$s">', $title, $link);



			// Check for post thumbnail

			if ( $thumb && $opts['popular-thumb'] ) {

				$output .= '<span class="wpb-thumb">';

				$output .= $thumb;

				if ( in_array($format, array('format-audio','format-video')) )

					$output .= '<i class="icon-thumb"></i>';

				$output .= '</span>';

			}

				

			$output .= '<span class="wpb-text">';

			$output .= sprintf('<i class="title">%s</i>', $title);

			$output .= sprintf('<i class="meta">%1$s</i>', $date);

			// $output .= sprintf('<i class="meta">%1$s %2$s</i>', $comments_num, __('comments',$this->domain));

			$output .= '</span></a></li>';

		}



		// End posts list

		$output .= '</ul>';



		// Return output

		return $output;

	}



	/**

		Recent comments

			@private

	**/

	private function _comments($opts,$wid) {

		// Arguments

		$args = array(

			'number'	=> $opts['comments-num'],

			'status'	=> 'approve'

		);



		// Get comments

		$comments = get_comments($args);



		// Check if we have comments

		if ( !$comments ) return '';



		// Start comments list

		$output = sprintf('<ul id="wpb-tab-comments-%s" class="list-comments wpb-tab">', $wid);



		// Loop through comments

		foreach ( $comments as $comment ) {

			// Set avatar, link, title

			$avatar = get_avatar($comment->comment_author_email, 64);

			$link = get_comment_link($comment->comment_ID);

			$title = get_the_title($comment->comment_post_ID);



			// Set classes

			$classes = 'fix';

			if ( $opts['comments-avatar'] ) $classes .= ' wpb-thumb-enabled';



			// Build post list item

			$output .= sprintf('<li class="%s">', $classes);

			$output .= sprintf('<a title="%1$s" href="%2$s">', $title, $link);



			// Check for post thumbnail

			if ( $opts['comments-avatar'] ) {

				$output .= '<span class="wpb-thumb">';

				$output .= $avatar;

				$output .= '</span>';

			}

				

			$output .= '<span class="wpb-text">';

			$output .= sprintf('<i class="meta">%1$s %2$s</i>',

				$comment->comment_author, __('on:',$this->domain));

			$output .= sprintf('<i class="title">%s</i>', $title);

			$output .= '</span></a></li>';

		}



		// End comments list

		$output .= '</ul>';



		// Return output

		return $output;

	}



	/**

		Tags

			@private

	**/

	private function _tags($opts,$wid) {

		// Arguments

		$args = array(

			'separator'	=> ' ',

			'echo'		=> FALSE

		);



		// Start tags list

		$output = sprintf('<ul id="wpb-tab-tags-%s" class="list-tags wpb-tab">', $wid);



		// Output tags

		$output .= '<li>'.wp_tag_cloud($args).'</li>';



		// End tags list

		$output .= '</ul>';



		// Return output

		return $output;

	}



}