<?php



/*---------------------------------------------------------------------------*/

/* Meta Settings :: Related Posts Module

/*---------------------------------------------------------------------------*/



// Get taxonomy

$taxonomy = air_related_posts::get_option('taxonomy');



/* Sections

/*---------------------------------------------------------------------------*/



$sections = array(

	array(

		'id'		=> 'air-related-posts-module',

		'title'		=> 'Related Posts'

	)

);





/* Fields

/*---------------------------------------------------------------------------*/



/* Taxonomies

/*-------------------------------------------------------*/



// Categories

if ( 'cat' === $taxonomy ) {

	// Custom related category

	$fields[] = array(

		'id'		=> 'air-related-cat',

		'label'		=> 'Related Category',

		'section'	=> 'air-related-posts-module',

		'type'		=> 'category-dropdown'

	);

}



// Tags

if ( 'tag' === $taxonomy ) {

	// Custom related tags

	$fields[] = array(

		'id'		=> 'air-related-tag',

		'label'		=> 'Related Tags',

		'section'	=> 'air-related-posts-module',

		'type'		=> 'text'

	);

}

