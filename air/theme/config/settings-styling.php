<?php



/*---------------------------------------------------------------------------*/

/* Theme Settings :: 

/*---------------------------------------------------------------------------*/



/* Sections

/*---------------------------------------------------------------------------*/



$sections = array(

	array(

		'id'	=> 'styling-advanced',

		'title'	=> 'Advanced Styling'

	),

	array(

		'id'	=> 'styling-color',

		'title'	=> 'Theme Color',

	),

	array(

		'id'	=> 'styling-misc',

		'title'	=> 'Miscellaneous',

	),

	array(

		'id'	=> 'styling-body',

		'title'	=> 'Body'

	)

);





/* Fields

/*---------------------------------------------------------------------------*/



/* Advanced Styling

/*-------------------------------------------------------*/



// Enable advanced styling

$fields[] = array(

	'id'		=> 'advanced-css',

	'label'		=> 'Enable to use',

	'section'	=> 'styling-advanced',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'advanced-css' => '<strong>Enable styling options</strong> <small>(style-advanced.css)</small>'

	)

);



/* Theme Color

/*-------------------------------------------------------*/



// Color 1

$fields[] = array(

	'id'			=> 'styling-color-1',

	'label'			=> 'Color',

	'section'		=> 'styling-color',

	'type'			=> 'colorpicker',

	'placeholder'	=> 'ed1a3b'

);



// Color 2

$fields[] = array(

	'id'			=> 'styling-color-2',

	'label'			=> 'Color Secondary',

	'section'		=> 'styling-color',

	'type'			=> 'colorpicker',

	'placeholder'	=> '83ad02'

);



// Color 3

$fields[] = array(

	'id'			=> 'styling-color-3',

	'label'			=> 'Widget Title',

	'section'		=> 'styling-color',

	'type'			=> 'colorpicker',

	'placeholder'	=> '111111'

);



// Color 3

$fields[] = array(

	'id'			=> 'styling-widget-title-dark',

	'label'			=> 'Widget Title Text/Icon',

	'section'		=> 'styling-color',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'styling-widget-title-dark' => 'Use dark icons and dark text color'

	)

);



/* Misc

/*-------------------------------------------------------*/



// Misc Arial

$fields[] = array(

	'id'		=> 'styling-misc-arial',

	'label'		=> 'Replace League Gothic',

	'section'	=> 'styling-misc',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'styling-misc-arial' => 'Use <strong>Arial</strong> instead (better character support)'

	)

);



// Misc Glass Effect

$fields[] = array(

	'id'		=> 'styling-misc-glass-effect',

	'label'		=> 'Glass Effect',

	'section'	=> 'styling-misc',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'styling-misc-glass-effect' => 'Enable on post thumbnails'

	)

);



// Misc Newsflash

$fields[] = array(

	'id'		=> 'styling-misc-newsflash',

	'label'		=> 'Newsflash Mobile',

	'section'	=> 'styling-misc',

	'type'		=> 'checkbox',

	'choices'	=> array(

		'styling-misc-newsflash' => 'Hide newsflash on mobile layouts'

	)

);





/* Body

/*-------------------------------------------------------*/



// Body BG Color

$fields[] = array(

	'id'			=> 'styling-body-bg-color',

	'label'			=> 'Background Color',

	'section'		=> 'styling-body',

	'type'			=> 'colorpicker',

	'placeholder'	=> ''

);



// Body BG Image

$fields[] = array(

	'id'		=> 'styling-body-bg-image',

	'label'		=> 'Background Image',

	'section'	=> 'styling-body',

	'type'		=> 'image'

);



// Body BG Image Repeat

$fields[] = array(

	'id'		=> 'styling-body-bg-image-repeat',

	'label'		=> 'Background Image Repeat',

	'section'	=> 'styling-body',

	'type'		=> 'select',

	'choices'	=> array(

		'repeat'	=> 'repeat',

		'no-repeat' => 'no-repeat',

		'repeat-x'	=> 'repeat-x',

		'repeat-y'	=> 'repeat-y'

	)

);

