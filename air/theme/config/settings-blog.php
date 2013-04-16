<?php



/*---------------------------------------------------------------------------*/

/* Theme Settings :: Blog

/*---------------------------------------------------------------------------*/



/* Sections

/*---------------------------------------------------------------------------*/



$sections = array(

	array(

		'id'	=> 'blog-general',

		'title'	=> 'General'

	),

	array(

		'id'	=> 'blog-headings',

		'title'	=> 'Headings',

	),

	array(

		'id'	=> 'blog-post-content',

		'title'	=> 'Post Content'

	),

	array(

		'id'	=> 'blog-featured-slider',

		'title'	=> 'Home: Featured Slider'

	),

	array(

		'id'	=> 'blog-home-widgets',

		'title'	=> 'Home: Widget Columns'

	),

	array(

		'id'	=> 'blog-post-structure',

		'title'	=> 'Post Structure'

	),

	array(

		'id'	=> 'blog-post-details',

		'title'	=> 'Post Details'

	),

	array(

		'id'	=> 'blog-author-block',

		'title'	=> 'Single: Author Block'

	),

	array(

		'id'	=> 'blog-single-postnav',

		'title'	=> 'Single: Post Navigation'

	),

	array(

		'id'	=> 'blog-newsflash',

		'title'	=> 'Newsflash'

	),

	array(

		'id'	=> 'blog-comments',

		'title'	=> 'Comments'

	)

);





/* Fields

/*---------------------------------------------------------------------------*/



/* General

/*-------------------------------------------------------*/



// Read More

$fields[] = array(

	'id'			=> 'read-more',

	'label'			=> 'Read More Text',

	'section'		=> 'blog-general',

	'type'			=> 'text',

	'default'		=> 'Read more'

);



// Excerpt Read More Link

$fields[] = array(

	'id'		=> 'excerpt-more-link-enable',

	'label'		=> 'Read More Link',

	'section'	=> 'blog-general',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'excerpt-more-link-enable' => 'Enable read more link on excerpts'

	)

);



// Excerpt More

$fields[] = array(

	'id'			=> 'excerpt-more',

	'label'			=> 'Excerpt Ending',

	'section'		=> 'blog-general',

	'type'			=> 'text',

	'class'			=> 'small-text',

	'default'		=> '[...]'

);



// Excerpt Length

$fields[] = array(

	'id'			=> 'excerpt-length',

	'label'			=> 'Excerpt Length <small>(words)</small>',

	'section'		=> 'blog-general',

	'type'			=> 'text',

	'class'			=> 'small-text',

	'default'		=> '30',

);



// Blog Format

$fields[] = array(

	'id'		=> 'blog-format',

	'label'		=> 'Blog Format <small>(not single)</small>',

	'section'	=> 'blog-general',

	'type'		=> 'radio',

	'choices'	=> array(

		'0' => 'Display none',

		'1' => 'Display post formats',

		'2' => 'Display thumbnails'

	),

	'default'	=> '2'

);



/* Headings

/*-------------------------------------------------------*/



// Heading

$fields[] = array(

	'id'			=> 'blog-heading',

	'label'			=> 'Most Recent Posts <small>(top 2)</small>',

	'section'		=> 'blog-headings',

	'type'			=> 'text',

	'placeholder'	=> 'Most Recent'

);



// Subheading

$fields[] = array(

	'id'			=> 'blog-subheading',

	'label'			=> 'Normal List',

	'section'		=> 'blog-headings',

	'type'			=> 'text',

	'placeholder'	=> 'More'

);



/* Home : Featured Slider

/*-------------------------------------------------------*/



// Enable

$fields[] = array(

	'id'		=> 'featured-slider-enable',

	'label'		=> 'Enable',

	'section'	=> 'blog-featured-slider',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'featured-slider-enable' 	=> 'Enable featured posts',

		'featured-slider-include'	=> 'Include featured posts in content area',

		'featured-slider-title'		=> 'Show post titles on top of images',

	),

	'default'	=> array(

		'featured-slider-enable' => '1',

	)

);



// Heading

$fields[] = array(

	'id'			=> 'featured-slider-heading',

	'label'			=> 'Heading <small>(optional)</small>',

	'section'		=> 'blog-featured-slider',

	'type'			=> 'text'

);



// Category

$fields[] = array(

	'id'		=> 'featured-slider-category',

	'label'		=> 'Category <small>(ordered by date)</small>',

	'section'	=> 'blog-featured-slider',

	'type'		=> 'category-dropdown'

);



// Number

$fields[] = array(

	'id'		=> 'featured-slider-number',

	'label'		=> 'Number of Posts <small>(max)</small>',

	'section'	=> 'blog-featured-slider',

	'type'		=> 'select',

	'choices'	=> array_diff(range(0,10),range(0,0)),

	'default'	=> '4'

);



/* Home : Widget Columns

/*-------------------------------------------------------*/



// Widget Columns

$fields[] = array(

	'id'		=> 'home-widget-columns',

	'label'		=> 'Show 2 Columns',

	'section'	=> 'blog-home-widgets',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'home-widgets-top'	 => 'Enable above recent posts (top)',

		'home-widgets-bottom'=> 'Enable below recent posts (bottom)'

	)

);



// Heading

$fields[] = array(

	'id'			=> 'home-widgets-top-title',

	'label'			=> 'Top Heading <small>(optional)</small>',

	'section'		=> 'blog-home-widgets',

	'type'			=> 'text'

);

// Heading

$fields[] = array(

	'id'			=> 'home-widgets-bottom-title',

	'label'			=> 'Bottom Heading <small>(optional)</small>',

	'section'		=> 'blog-home-widgets',

	'type'			=> 'text'

);



/* Post Structure

/*-------------------------------------------------------*/



// Structure

$fields[] = array(

	'id'		=> 'post-structure',

	'label'		=> 'Show 2 Large Posts <small>(at top)</small>',

	'section'	=> 'blog-post-structure',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'post-structure-home'	=> 'Enable for blog home',

		'post-structure-archive'=> 'Enable for archives',

	),

	'default'	=> array(

		'post-structure-home' 	=> '1',

		'post-structure-archive'=> '1'

	)

);



/* Post Content

/*-------------------------------------------------------*/



// Home

$fields[] = array(

	'id'		=> 'post-content-home',

	'label'		=> 'Home',

	'section'	=> 'blog-post-content',

	'type'		=> 'radio',

	'choices'	=> array(

		'0' => 'Excerpt',

		'1' => 'Full Post',

	),

	'vertical'	=> FALSE

);



// Archive

$fields[] = array(

	'id'		=> 'post-content-archive',

	'label'		=> 'Archive',

	'section'	=> 'blog-post-content',

	'type'		=> 'radio',

	'choices'	=> array(

		'0' => 'Excerpt',

		'1' => 'Full Post <small>(not recommended)</small>',

	),

	'vertical'	=> FALSE

);



// Search

$fields[] = array(

	'id'		=> 'post-content-search',

	'label'		=> 'Search',

	'section'	=> 'blog-post-content',

	'type'		=> 'radio',

	'choices'	=> array(

		'0' => 'Excerpt',

		'1' => 'Full Post <small>(not recommended)</small>',

	),

	'vertical'	=> FALSE

);



/* Post Details

/*-------------------------------------------------------*/



// Hide Post Details (Home, Archive, Search)

$fields[] = array(

	'id'		=> 'post-hide-fields',

	'label'		=> 'Home, Archive, Search',

	'section'	=> 'blog-post-details',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'post-hide-date'		=> 'Hide post date',

		'post-hide-categories'	=> 'Hide post categories',

		'post-hide-comments'	=> 'Hide post comment count',

	)

);



// Hide Post Details (Single)

$fields[] = array(

	'id'		=> 'post-hide-fields-single',

	'label'		=> 'Single Post',

	'section'	=> 'blog-post-details',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'post-hide-author-single'		=> 'Hide post author',

		'post-hide-date-single'			=> 'Hide post date',

		'post-hide-categories-single'	=> 'Hide post categories',

		'post-hide-tags-single'			=> 'Hide post tags',

		'post-hide-comments-single'		=> 'Hide post comment count',

	)

);



// Hide Detailed Date

$fields[] = array(

	'id'		=> 'post-hide-detailed-date',

	'label'		=> 'Detailed Date',

	'section'	=> 'blog-post-details',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'post-hide-detailed-date'	=> 'Hide detailed date <small>(at XX:XX am/pm)</small>',

	),

	'default'	=> array(

		'post-hide-detailed-date'	=> '1',

	)

);



/* Single : Author Block

/*-------------------------------------------------------*/



// Enable Author Block

$fields[] = array(

	'id'		=> 'post-enable-author-block',

	'label'		=> 'Enable',

	'section'	=> 'blog-author-block',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'post-enable-author-block' => 'Enable author block'

	)

);



/* Single : Postnav

/*-------------------------------------------------------*/



// Enable Author Block

$fields[] = array(

	'id'		=> 'single-postnav',

	'label'		=> 'Select Location',

	'section'	=> 'blog-single-postnav',

	'type'		=> 'radio',

	'choices'	=> array(

		'0'	=> 'Hide',

		'1'	=> 'Display below article',

		'2'	=> 'Display in sidebar'

	),

	'default'	=> '1'

);



/* Newsflash

/*-------------------------------------------------------*/



// Enable

$fields[] = array(

	'id'		=> 'newsflash-enable',

	'label'		=> 'Enable',

	'section'	=> 'blog-newsflash',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'newsflash-enable-home' => 'For blog home',

		'newsflash-enable-single' => 'For blog single'

	),

	'default'	=> array(

		'newsflash-enable-home' => '1'

	)

);



// Show

$fields[] = array(

	'id'		=> 'newsflash-display',

	'label'		=> 'Display the following',

	'section'	=> 'blog-newsflash',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'newsflash-most-discussed'	=> 'Most popular',

		'newsflash-most-recent'		=> 'Most recent posts',

		'newsflash-recent-comments'	=> 'Recent comments'

	),

	'default'	=> array(

		'newsflash-most-discussed'	=> '1',

		'newsflash-most-recent'		=> '1',

		'newsflash-recent-comments'	=> '1'

	)

);



// Most Popular

$fields[] = array(

	'id'		=> 'newsflash-most-popular',

	'label'		=> 'Most Popular',

	'section'	=> 'blog-newsflash',

	'type'		=> 'radio',

	'choices'	=> array(

		'0'		=> 'All time',

		'month'	=> 'This month',

		'week'	=> 'This week',

		'day'	=> 'Past 24 hours',

	),

	'default'	=> '0'

);





/* Comments

/*-------------------------------------------------------*/



// Comments Form Location

$fields[] = array(

	'id'		=> 'comments-form-location',

	'label'		=> 'Comments Form Location',

	'section'	=> 'blog-comments',

	'type'		=> 'radio',

	'choices'	=> array(

		'top'		=> 'Display above comments',

		'bottom'	=> 'Display below comments',

	),

	'default'	=> 'bottom'

);



// Disable Comments

$fields[] = array(

	'id'		=> 'disable-comments',

	'label'		=> 'Disable Comments',

	'section'	=> 'blog-comments',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'comments-pages-disable' => 'Disable comments on pages',

		'comments-posts-disable' => 'Disable comments on posts'

	),

	'default'	=> array(

		'comments-pages-disable' => '1'

	)

);

