<?php



/*---------------------------------------------------------------------------*/

/* Theme Settings :: Footer

/*---------------------------------------------------------------------------*/



/* Sections

/*---------------------------------------------------------------------------*/



$sections = array(

	array(

		'id'	=> 'footer-widgets',

		'title'	=> 'Footer Widgets'

	),

	array(

		'id'	=> 'footer-logo',

		'title'	=> 'Footer Logo',

	),

	array(

		'id'	=> 'footer-text',

		'title'	=> 'Footer Copyright',

	)

);





/* Fields

/*---------------------------------------------------------------------------*/



/* Footer Widgets

/*-------------------------------------------------------*/



// Footer Widgets

$fields[] = array(

	'id'		=> 'footer-widgets',

	'label'		=> 'Enable',

	'section'	=> 'footer-widgets',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'footer-widgets' => 'Enable footer widgets',

		'footer-widget-ads' => 'Enable full-width footer ads widget area'

	)

);



/* Footer Logo

/*-------------------------------------------------------*/



// Custom Logo URL

$fields[] = array(

	'id'		=> 'footer-logo',

	'label'		=> 'Logo URL',

	'section'	=> 'footer-logo',

	'type'		=> 'image'

);



/* Footer Text

/*-------------------------------------------------------*/



// Footer text

$fields[] = array(

	'id'		=> 'footer-text',

	'label'		=> 'Text',

	'section'	=> 'footer-text',

	'type'		=> 'textarea',

	'rows'		=> '2',

	'cols'		=> '10'

);

