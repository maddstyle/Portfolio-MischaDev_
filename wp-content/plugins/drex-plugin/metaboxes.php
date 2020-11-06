<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'rnr_';

global $meta_boxes;

$meta_boxes = array();

global $smof_data;


/* ----------------------------------------------------- */
// Page Sections Metaboxes
/* ----------------------------------------------------- */


/* ----------------------------------------------------- */
// Revolution Slider
/* ----------------------------------------------------- */

$revolutionslider = array();
$revolutionslider[0] = 'No Slider';

if(class_exists('RevSlider')){
    $slider = new RevSlider();
	$arrSliders = $slider->getArrSliders();
	foreach($arrSliders as $revSlider) { 
		$revolutionslider[$revSlider->getAlias()] = $revSlider->getTitle();
	}
}

/* Page Section Background Settings */

$grid_array = array('2 Columns','3 Columns','4 Columns');

$pagebg_type_array = array(
	'image' => 'Image',
	'gradient' => 'Gradient',
	'color' => 'Color'
);
/* ----------------------------------------------------- */
/* page Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'home_page_type',
	'title' => 'Default Page Template Function',
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		// SELECT BOX
		array(
			'name'     => __( 'Select', 'carna' ),
			'id'   => $prefix . 'wr_pagetype',
			'desc'  => __( '', 'carna' ),
			'type'     => 'image_select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => __( get_template_directory_uri().'/includes/metaboxes/img/wr-page-default.png', 'carna' ),
				'st2' => __( get_template_directory_uri().'/includes/metaboxes/img/page-one.png', 'carna' ),
				'st3' => __( get_template_directory_uri().'/includes/metaboxes/img/wr-page-full.png', 'carna' ),
				
			
				
			),
			'desc'  => esc_attr__( '', 'carna' ),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'carna' ),
		),
		
		array(
			'name'		=> 'Open as a Separate Page',
			'id'		=> $prefix . 'open_page',
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std'  => 0,
		),
		
	)
);



/* ----------------------------------------------------- */
/* page Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_type',
	'title' => 'One Page Intro Options.',
	'hide'   => array(
	'input_value'   => array(
    'input[name=rnr_wr_pagetype]'  => 'st1',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Intro Style', 'popuga' ),
			'id'   => $prefix . 'wr_one_intro_opt',
			'desc'  => esc_attr__( '', 'popuga' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				
				'st0' => esc_attr__( 'Hidden', 'popuga' ),
				'st1' => esc_attr__( 'Single Image', 'popuga' ),
				'st6' => esc_attr__( 'Slider With Thumbnails', 'popuga' ),
				'st2' => esc_attr__( 'Slider', 'popuga' ),
				'st3' => esc_attr__( 'Youtube Video', 'popuga' ),
				'st4' => esc_attr__( 'Viemo Video', 'popuga' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st0',
			'placeholder' => esc_attr__( 'Select an Option', 'popuga' ),
		),
		
		
	
		
	)
);

/* ----------------------------------------------------- */
/* page Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_sin_image',
	'title' => 'Single Image Option',
	'show'   => array(
	'input_value'   => array(
    '#rnr_wr_one_intro_opt'              => 'st1',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'		=> 'Background Image',
			'id'		=> $prefix . 'drex_sin_image_intro',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1',
			'desc'		=> 'Working Only Intro Style image. ',
		),
		
		
	)
);


/* ----------------------------------------------------- */
/* page Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_slider_thumb_image',
	'title' => 'Slider With Thumbnails Option',
	'show'   => array(
	'input_value'   => array(
    '#rnr_wr_one_intro_opt'              => 'st6',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'		=> 'Slider Images',
			'id'		=> $prefix . 'drex_slider_thumb_image_intro',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1000',
			'desc'		=> 'Working Only Intro Style Slider With Thumbnails. ',
		),
		
		
	)
);


/* ----------------------------------------------------- */
/* page Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_def_slider',
	'title' => 'Slider Option',
	'show'   => array(
	'input_value'   => array(
    '#rnr_wr_one_intro_opt'              => 'st2',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'		=> 'Slider Image',
			'id'		=> $prefix . 'drex_slider_image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '100',
			'desc'		=> 'Working Only Intro Style Slider. <br> Add Image Title and Caption by editing image. ',
		),
		
		
	)
);



/* ----------------------------------------------------- */
/* page Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_youtube_video',
	'title' => 'Youtube Video Option',
	'show'   => array(
	'input_value'   => array(
    '#rnr_wr_one_intro_opt'              => 'st3',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'		=> 'Youtube Video ID',
			'id'		=> $prefix . 'be_youtube_url',
			'clone'		=> false,
			'type' => 'text',
			'desc'		=> 'E.X: 3zXrWmkVjTM <br> Working Only Intro Style Youtube Video. ',
		),
		
		array(
			'name'		=> 'Background Image',
			'id'		=> $prefix . 'drex_you_image_mobile',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1',
			'desc'		=> 'Working Only Mobile Device. ',
		),
		
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Video Sound', 'popuga' ),
			'id'   => $prefix . 'wr_one_intro_vd_sound',
			'desc'  => esc_attr__( '', 'popuga' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Mute', 'popuga' ),
				'st2' => esc_attr__( 'On', 'popuga' ),
				
				
			),
			// Select multiple values, optional. Default is st1.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'popuga' ),
		),
	
	)
);


/* ----------------------------------------------------- */
/* page Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_viemo_video',
	'title' => 'Vimeo Video Option',
	'show'   => array(
	'input_value'   => array(
    '#rnr_wr_one_intro_opt' => 'st4',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'		=> 'Viemo Video URL',
			'id'		=> $prefix . 'drex_vimeo_url',
			'clone'		=> false,
			'type' => 'text',
			'desc'		=> 'E.X: https://player.vimeo.com/video/98929509?autoplay=1&amp;background=1&amp;hd=1&amp;loop=1',
		),
		
		array(
			'name'		=> 'Background Image',
			'id'		=> $prefix . 'drex_vimeo_image_mobile',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1',
			'desc'		=> 'Working Only Mobile Device. ',
		),
		
		
	
	)
);



/* ----------------------------------------------------- */
/* page Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_social_option',
	'title' => 'Extra Option',
	'hide'   => array(
	'input_value'   => array(
    '#rnr_wr_one_intro_opt'              => 'st0',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
	
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Title Options', 'popuga' ),
			'id'   => $prefix . 'wr_intro_title_set_opt',
			'desc'  => esc_attr__( '', 'popuga' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Simple Title', 'popuga' ),
				'st2' => esc_attr__( 'Typed Effect', 'popuga' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'popuga' ),
		),
	
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'drex_intro_title',
			'clone'		=> false,
			'type' => 'text',
			'desc'		=> 'E.x: Drex <br> Working only title option Simple Title.',
		),
		
		array(
			'name'		=> 'Typed Title 1',
			'id'		=> $prefix . 'be_slide_title1',
			'clone'		=> false,
			'type' => 'text',
			'desc'		=> 'Working only title option Typed Title.',
		),
		
		array(
			'name'		=> 'Typed Title 2',
			'id'		=> $prefix . 'be_slide_title2',
			'clone'		=> false,
			'type' => 'text',
			'desc'		=> 'Working only title option Typed Title.',
		),
		
		array(
			'name'		=> 'Typed Title 3',
			'id'		=> $prefix . 'be_slide_title3',
			'clone'		=> false,
			'type' => 'text',
			'desc'		=> 'Working only title option Typed Title.',
		),
		
		array(
			'name'		=> 'Typed Title 4',
			'id'		=> $prefix . 'be_slide_title4',
			'clone'		=> false,
			'type' => 'text',
			'desc'		=> 'Working only title option Typed Title.',
		),
		
		array(
			'name'		=> 'Sub Title',
			'id'		=> $prefix . 'drex_intro_sub_title',
			'clone'		=> false,
			'type' => 'text',
			'desc'		=> 'E.x: Build a remarkable website. Quite fast!
                            ',
		),		
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Subscribe Options', 'popuga' ),
			'id'   => $prefix . 'wr_intro_subscribe_opt',
			'desc'  => esc_attr__( '', 'popuga' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'popuga' ),
				'st2' => esc_attr__( 'Enable', 'popuga' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'popuga' ),
		),
		
		array(
			'name'		=> 'MailChimp Form Shortcode',
			'id'		=> $prefix . 'drex_subs_form_shot',
			'clone'		=> false,
			'type' => 'text',
			'desc'		=> 'E.x: [mc4wp_form id="38"]',
		),
		
		array(
			'name'		=> 'Subscribe Button Title',
			'id'		=> $prefix . 'drex_subs_button_title',
			'clone'		=> false,
			'type' => 'text',
			'desc'		=> 'E.x: Newsletters',
		),
		
		array(
			'name'		=> 'Subscribe Form Title',
			'id'		=> $prefix . 'drex_subs_form_title',
			'clone'		=> false,
			'type' => 'text',
			'desc'		=> 'E.x: Newsletter sign up',
		),
		
		array(
			'name'		=> 'Copy Right Text',
			'id'		=> $prefix . 'drex_home_copy_text',
			'clone'		=> false,
			'type' => 'text',
			'desc'		=> 'E.x: Drex &copy; 2019 All Rights Reserved.<br> Not Working On Intro Style Slider.',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Social Option', 'popuga' ),
			'id'   => $prefix . 'wr_team_so_en',
			'desc'  => esc_attr__( '', 'popuga' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'popuga' ),
				'st2' => esc_attr__( 'Enable', 'popuga' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'popuga' ),
		),
		
		array(
				'id'		=> $prefix . 'po_pu_team_so_gr',
				'name'        => 'Social Options',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Social Options', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name' => 'Social Icon',
						'id'   => 'po_pu_so_i',
						'type' => 'text',
						'desc'		=> 'Use <a href="https://aalmiray.github.io/ikonli/cheat-sheet-ionicons.html" target="_blank">Ionicons</a> Icon Class. <br> E.X: ion-social-facebook',
					),
					
					array(
						'name' => 'Social Profile URL',
						'id'   => 'po_pu_so_u',
						'type' => 'text',
						'desc'		=> 'e.x:https://www.facebook.com/webredox/',
					),
					
					
					
				),
			),
			
		
		
	)
);

//portfolio options

$meta_boxes[] = array(
	'id' => 'rnr_port_temp_opt',
	'title' => 'Portfolio Option',
	'pages' => array( 'portfolio'),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(

		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Details Page Style', 'popuga' ),
			'id'   => $prefix . 'wr_port_det_opt',
			'desc'  => esc_attr__( '', 'popuga' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Carousel', 'popuga' ),
				'st2' => esc_attr__( 'Gallery', 'popuga' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'popuga' ),
		),
	
	)
);

//portfolio gallery options

$meta_boxes[] = array(
	'id' => 'rnr_port_temp_gallery_opt',
	'title' => 'Gallery Option',
	'show'   => array(
	'input_value'   => array(
    '#rnr_wr_port_det_opt' => 'st2',
    ),
	),
	'pages' => array( 'portfolio'),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(

		array(
				'name' => 'Page Title',
				'id'   => 'port_det_gallery_title_opt',
				'type' => 'text',
				'desc'		=> 'e.x:Work',
		),
	
	)
);

//portfolio Gallery

$meta_boxes[] = array(
	'id' => 'rnr_slider_opt',
	'title' => 'Gallery / Carousel Option',
	'pages' => array( 'portfolio'),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(

		array(
			'name'		=> 'Image Gallery',
			'id'		=> $prefix . 'dr_portfolio_gallery',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '100',
			'desc'		=> 'Upload Images.',
		),
	
	)
);


/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function drex_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}

// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'drex_register_meta_boxes' );