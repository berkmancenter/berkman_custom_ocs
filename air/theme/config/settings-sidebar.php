<?php



/*---------------------------------------------------------------------------*/

/* Theme Settings :: Sidebar

/*---------------------------------------------------------------------------*/



/* Sections

/*---------------------------------------------------------------------------*/



$sections = array(

	array(

		'id'	=> 'sidebar-mobile',

		'title'	=> 'Mobile Sidebar',

	)

);





/* Fields

/*---------------------------------------------------------------------------*/



/* Mobile Sidebar

/*-------------------------------------------------------*/



// Disable Mobile Sidebar

$fields[] = array(

	'id'		=> 'sidebar-mobile-disable',

	'label'		=> 'Disable',

	'section'	=> 'sidebar-mobile',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'sidebar-mobile-disable' => 'Hide sidebar content on mobile layouts'

	)

);