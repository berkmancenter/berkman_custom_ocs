<?php



// Set option name

AirSettings::set_option_name('air-related-posts');



/*-------------------------------------------------------------------------- */

/* Module Settings :: Login

/*-------------------------------------------------------------------------- */



/* Sections

/*---------------------------------------------------------------------------*/



$sections = array(

	array(

		'id'	=> 'related-posts-general',

		'title'	=> 'Related Posts'

	)

);





/* Fields

/*---------------------------------------------------------------------------*/



/* General

/*-------------------------------------------------------*/



// Enable related posts

$fields[] = array(

	'id'		=> 'enable',

	'label'		=> 'Enable',

	'section'	=> 'related-posts-general',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'enable' => 'Enable related posts'

	)

);



// Title

$fields[] = array(

	'id'			=> 'title',

	'label'			=> 'Title',

	'section'		=> 'related-posts-general',

	'type'			=> 'text',

	'placeholder'	=> 'Related Posts'

);



// Relation

$fields[] = array(

	'id'			=> 'taxonomy',

	'label'			=> 'Relation',

	'section'		=> 'related-posts-general',

	'type'			=> 'radio',

	'choices'		=> array(

		'cat' => 'Categories',

		'tag' => 'Tags'

	)

);



// Hide fields

$fields[] = array(

	'id'		=> 'related-posts-hide',

	'label'		=> 'Hide Post Details',

	'section'	=> 'related-posts-general',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'hide-thumbnail'	=> 'Hide post thumbnail',

		'hide-date'			=> 'Hide post date'

	)

);

