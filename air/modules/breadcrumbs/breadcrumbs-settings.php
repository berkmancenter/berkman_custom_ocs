<?php



// Set option name

AirSettings::set_option_name('air-breadcrumbs');



/*-------------------------------------------------------------------------- */

/* Module Settings :: Breadcrumbs

/*-------------------------------------------------------------------------- */



/* Sections

/*---------------------------------------------------------------------------*/



$sections = array(

	array(

		'id'	=> 'breadcrumbs',

		'title'	=> 'Breadcrumbs'

	),

	array(

		'id'	=> 'breadcrumbs-labels',

		'title'	=> 'Labels'

	),

	array(

		'id'	=> 'breadcrumbs-disable',

		'title'	=> 'Disable'

	),

	array(

		'id'	=> '',

		'title'	=> ''

	),

);





/* Fields

/*---------------------------------------------------------------------------*/



// Enable Breadcrumbs

$fields[] = array(

	'id'		=> 'breadcrumbs-enable',

	'label'		=> 'Enable',

	'section'	=> 'breadcrumbs',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'breadcrumbs-enable' => 'Enable breadcrumbs'

	)

);



# Static front page

if ( 'page' === get_option('show_on_front') ):

	// Disable Breadcrumbs on front page

	$fields[] = array(

		'id'		=> 'disable-page-front',

		'label'		=> 'Front Page',

		'section'	=> 'breadcrumbs-disable',

		'type'		=> 'checkbox',

		'choices'	=> array(

			'disable-page-front' => 'Disable breadcrumbs on front page'

		)

	);



	// Breadcrumbs front label

	$fields[] = array(

		'id'			=> 'label-front',

		'label'			=> 'Front Page',

		'section'		=> 'breadcrumbs-labels',

		'type'			=> 'text',

		'placeholder'	=> get_bloginfo('name')

	);



	// Disable Breadcrumbs on blog

	$fields[] = array(

		'id'		=> 'disable-page-home',

		'label'		=> 'Blog',

		'section'	=> 'breadcrumbs-disable',

		'type'		=> 'checkbox',

		'choices'	=> array(

			'disable-page-home' => 'Disable breadcrumbs on blog'

		)

	);



	# Get posts page title

	$page_id = get_option('page_for_posts');

	$home_label = get_the_title($page_id);



	// Breadcrumbs blog label

	$fields[] = array(

		'id'			=> 'label-home',

		'label'			=> 'Blog',

		'section'		=> 'breadcrumbs-labels',

		'type'			=> 'text',

		'placeholder'	=> $home_label

	);

endif; // end static homepage



# Non-static front page

if ( 'posts' === get_option('show_on_front') ):

	// Disable Breadcrumbs on home page

	$fields[] = array(

		'id'		=> 'disable-page-home',

		'label'		=> 'Home Page',

		'section'	=> 'breadcrumbs-disable',

		'type'		=> 'checkbox',

		'choices'	=> array(

			'disable-page-home' => 'Disable breadcrumbs on home page'

		)

	);



	// Breadcrumbs home label

	$fields[] = array(

		'id'			=> 'label-home',

		'label'			=> 'Home Page',

		'section'		=> 'breadcrumbs-labels',

		'type'			=> 'text',

		'placeholder'	=> get_bloginfo('name')

	);

endif; // end non-static homepage



// 404 label

$fields[] = array(

	'id'			=> 'label-404',

	'label'			=> '404',

	'section'		=> 'breadcrumbs-labels',

	'type'			=> 'text',

	'placeholder'	=> 'Error 404'

);



// Search results label

$fields[] = array(

	'id'			=> 'label-search',

	'label'			=> 'Search',

	'section'		=> 'breadcrumbs-labels',

	'type'			=> 'text',

	'placeholder'	=> 'Search Results'

);



// Breadcrumbs separator

$fields[] = array(

	'id'			=> 'label-separator-archive',

	'label'			=> 'Archives Label Separator',

	'section'		=> 'breadcrumbs-labels',

	'type'			=> 'text',

	'class'			=> 'small-text aligncenter',

	'placeholder'	=> ':'

);



// Author label prefix

$fields[] = array(

	'id'			=> 'label-prefix-author',

	'label'			=> 'Author',

	'section'		=> 'breadcrumbs-labels',

	'type'			=> 'text',

	'placeholder'	=> 'Author'

);



// Category label prefix

$fields[] = array(

	'id'			=> 'label-prefix-category',

	'label'			=> 'Category Prefix',

	'section'		=> 'breadcrumbs-labels',

	'type'			=> 'text',

	'placeholder'	=> 'Category'

);



// Tag label prefix

$fields[] = array(

	'id'			=> 'label-prefix-tag',

	'label'			=> 'Tag Prefix',

	'section'		=> 'breadcrumbs-labels',

	'type'			=> 'text',

	'placeholder'	=> 'Tagged'

);



// Disable Breadcrumbs on archive pages

$fields[] = array(

	'id'		=> 'disable-page-archives',

	'label'		=> 'Archives',

	'section'	=> 'breadcrumbs-disable',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'disable-page-archives' => 'Disable breadcrumbs on archive pages'

	)

);



// Disable archives label prefix

$fields[] = array(

	'id'		=> 'disable-prefix-archives',

	'label'		=> 'Archives Prefix',

	'section'	=> 'breadcrumbs-disable',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'disable-prefix-archives' => 'Disable prefix on archive pages'

	)

);



// Disable post titles

$fields[] = array(

	'id'		=> 'disable-post-title',

	'label'		=> 'Post Title',

	'section'	=> 'breadcrumbs-disable',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'disable-post-title' => 'Disable post title'

	)

);

