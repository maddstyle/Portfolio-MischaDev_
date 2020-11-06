<?php
/*** Removing shortcodes ***/
vc_remove_element("vc_widget_sidebar");
vc_remove_element("vc_gallery");
vc_remove_element("vc_wp_search");
vc_remove_element("vc_wp_meta");
vc_remove_element("vc_wp_recentcomments");
vc_remove_element("vc_wp_calendar");
vc_remove_element("vc_wp_pages");
vc_remove_element("vc_wp_tagcloud");
vc_remove_element("vc_wp_custommenu");
vc_remove_element("vc_wp_text");
vc_remove_element("vc_wp_posts");
vc_remove_element("vc_wp_links");
vc_remove_element("vc_wp_categories");
vc_remove_element("vc_wp_archives");
vc_remove_element("vc_wp_rss");
vc_remove_element("vc_teaser_grid");
vc_remove_element("vc_button");
vc_remove_element("vc_button2");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_cta_button2");
vc_remove_element("vc_message");
vc_remove_element("vc_tour");
vc_remove_element("vc_progress_bar");
vc_remove_element("vc_pie");
vc_remove_element("vc_posts_slider");
vc_remove_element("vc_toggle");
vc_remove_element("vc_images_carousel");
vc_remove_element("vc_posts_grid");
vc_remove_element("vc_carousel");

/*** Remove unused parameters ***/
if (function_exists('vc_remove_param')) {
	vc_remove_param('vc_single_image', 'css_animation');
	
	vc_remove_param('vc_row', 'bg_image');
	vc_remove_param('vc_row', 'bg_color');
	vc_remove_param('vc_row', 'font_color');
	vc_remove_param('vc_row', 'margin_bottom');
	vc_remove_param('vc_row', 'bg_image_repeat');
	vc_remove_param('vc_tabs', 'interval');
	vc_remove_param('vc_separator', 'style');
	vc_remove_param('vc_separator', 'color');
	vc_remove_param('vc_separator', 'accent_color');
	vc_remove_param('vc_separator', 'el_width');
	vc_remove_param('vc_text_separator', 'style');
	vc_remove_param('vc_text_separator', 'color');
	vc_remove_param('vc_text_separator', 'accent_color');
	vc_remove_param('vc_text_separator', 'el_width');
}



/***************** drex Shortcodes *********************/

// title
vc_map( array(
		"name" => "Drex Title",
		"base" => "drex_title",
		"category" => 'bY Drex',
		"icon" => "icon-wpb-layer-shape-text",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"value" => "",
				"description" => "e.x: About",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Sub Title",
				"param_name" => "subtitle",
				"value" => "",
				"description" => "e.x: Inspiring Generations",
				
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Section Number",
				"param_name" => "sec_no",
				"value" => "",
				"description" => "Optaional. e.x: 01.",
				
			),
			
		)
) );

// Divider
vc_map( array(
		"name" => "Drex Divider",
		"base" => "drex_divider",
		"category" => 'bY Drex',
		"icon" => "icon-wpb-ui-empty_space",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			
			
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Divider Type",
				"param_name" => "divider_type",
				"value" => array(
					"Large" => "st1",
					"Medium" => "st2",
					"Samll Device Only " => "st3",
					
				),
				"description" => "",
			),
			
		)
) );


// Blockquote
vc_map( array(
		"name" => "Drex Blockquote",
		"base" => "drex_blockquote",
		"category" => 'bY Drex',
		"icon" => "drex-icon",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			
			
			
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "content",
				"param_name" => "content",
				"value" => "",
				"description" => "",
				
			),
			
		)
) );

// text
vc_map( array(
		"name" => "Drex Text Block",
		"base" => "drex_text",
		"category" => 'bY Drex',
		"icon" => "icon-wpb-layer-shape-text",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			
			
			
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "content",
				"param_name" => "content",
				"value" => "",
				"description" => "",
				
			),
			
		)
) );

// wr testimonials
class WPBakeryShortCode_WR_VC_Timelines  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Drex Timeline", "drex",
        "base" => "wr_vc_timelines",
        "as_parent" => array('only' => 'wr_vc_timeline'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'bY Drex',
		"icon" => "drex-icon",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => ""
			),	
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Timeline extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Timeline Item", "drex",
        "base" => "wr_vc_timeline",
        "content_element" => true,
		"icon" => "drex-icon",
        "as_child" => array('only' => 'wr_vc_timelines'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
		
		array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Timeline Position",
				"param_name" => "timeline_position",
				"value" => array(
					"Left" => "st1",
					"Right" => "st2",
					
				),
				"description" => "",
			),
				
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Upload Image",
				"param_name" => "image",
				"description" => "350px x 350px"
			),
			
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 1",
				"param_name" => "data_title_1",
				"value" => "",
				"description" => "e.x: April 2019 - Present",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 2",
				"param_name" => "data_title_2",
				"value" => "",
				"description" => "e.x: Chief Photographer <br> For Line Break: Chief [br] Photographer",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 3",
				"param_name" => "data_title_3",
				"value" => "",
				"description" => "e.x: Full-time",
			),
			
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "",
				"description" => "",
			),
		 
        )
) );

// wr services
class WPBakeryShortCode_WR_VC_Services  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Drex Services", "drex",
        "base" => "wr_vc_services",
        "as_parent" => array('only' => 'wr_vc_service'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'bY Drex',
		"icon" => "drex-icon",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => ""
			),	
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"value" => ""
			),	
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Service extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Service Item", "drex",
        "base" => "wr_vc_service",
        "content_element" => true,
		"icon" => "drex-icon",
        "as_child" => array('only' => 'wr_vc_services'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
		
		
				
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Upload Image",
				"param_name" => "image",
				"description" => ""
			),
			
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title",
				"param_name" => "data_title",
				"value" => "",
				"description" => "e.x: Design-Driven Innovation",
			),
			
			
			
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Short Description",
				"param_name" => "content_short",
				"value" => "",
				"description" => "",
			),
			
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "",
				"description" => "",
			),
		 
        )
) );

// portfolio
vc_map( array(
		"name" => "Drex Portfolio",
		"base" => "drex_portfolio",
		"category" => 'bY Drex',
		"icon" => "drex-icon",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => "Use this field if you need.",
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Count', 'drex'),
				"param_name" => "postcount",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'drex'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Offset', 'drex'),
				"param_name" => "postoffset",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'drex'),
			),
				
		)
) );


//blog
vc_map( array(
		"name" => esc_html__('Drex Blog', 'drex'),
		"base" => "drex_blog",
		"category" => 'bY Drex',
		"icon" => "drex-icon",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			
			
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Autoplay",
				"param_name" => "data_auto_play",
				"value" => array(
					"Off" => "false",
					"On" => "true",
						
				),
				"description" => "",
			),
			
			
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => "Use this field if you need.",
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Post Count', 'drex'),
				"param_name" => "postcount",
				"value" => "",
				"description" => esc_html__('Use this field if you need.', 'drex'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Post Offset', 'drex'),
				"param_name" => "postoffset",
				"value" => "",
				"description" => esc_html__('Use this field if you need.', 'drex'),
			),	
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Read More",
				"param_name" => "reademore",
				"value" => "",
				"description" => "Translate Options.",
				
			),
			

			
			
		)
) );

// contact ifo
vc_map( array(
		"name" => "Drex Contact Info",
		"base" => "drex_contact_info",
		"category" => 'bY Drex',
		"icon" => "drex-icon",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Title Type', 'drex'),
				"param_name" => "link_type",
				"value" => array(
					"Default" => "st0",
					"Custom URL" => "st1",
					"Email Address" => "st2",
					
					
				),
				"description" => "",
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title",
				"param_name" => "title",
				"value" => "",
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "URL",
				"param_name" => "url",
				"value" => "",
				"description" => "",
				"dependency" => Array('element' => "link_type", 'value' => array('st1', 'st2'))
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data info",
				"param_name" => "info",
				"value" => "",
				"description" => "e.x: Touchdown Dr 1176",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Class",
				"param_name" => "iconclass",
				"value" => "",
				"description" => "Use <a href='https://aalmiray.github.io/ikonli/cheat-sheet-ionicons.html' target='_blank'>Ionicons</a> Icon Class. <br> E.X: ion-ios-location-outline",
				"dependency" => Array('element' => "icon_type", 'value' => array('st1'))
			),
			
			
			
			
		)
) );

// copyright
vc_map( array(
		"name" => "Drex Copyright Text",
		"base" => "drex_copyright",
		"category" => 'bY Drex',
		"icon" => "drex-icon",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "",
				"description" => "e.x: 2019 All Rights Reserved.",
			),
			
		)
) );

?>