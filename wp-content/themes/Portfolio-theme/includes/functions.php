<?php
function drex_removeDemoModeLink() { 
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}


// Add class to <li> 

function add_menu_parent_class($items)
{

    $parents=array();
    foreach($items as $item){

        if($item->menu_item_parent && $item->menu_item_parent>0){
            $parents[]=$item->menu_item_parent;
        }
    }
    foreach($items as $item){
        if(in_array($item->ID,$parents)){
            $item->classes[]='current';
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects','add_menu_parent_class');

class drex_main_Walker extends Walker_Nav_Menu {
    var $number = 1;
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $icon_class = $classes[0];
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
		
        $output .= $indent . '<li' . $id . $value . $class_names .'>';
        // add span with number here
        if ( $depth == 0 ) { // remove if statement if depth check is not required
            $output .= sprintf( '', $this->number++ );
        }
        $atts = array();        
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        $item_output = $args->before;
		     
        $item_output .= '<a'. $attributes .' class="page-scroll menu-state">';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
		//$item_output .= '<i class="arrow ion-chevron-down "></i>';
        $item_output .= $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $object, $depth = 0, $args = Array() , $current_object_id = 0) {
           
           global $wp_query;

           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $object->classes ) ? array() : (array) $object->classes;
           $icon_class = $classes[0];
       $classes = array_slice($classes,1);

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           

           $attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
           $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
           $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
            
           

           if($object->object == 'page')
           {
                $varpost = get_post($object->object_id);                
                $separatepages = get_post_meta($object->object_id, "rnr_open_page", true);
                $disable_menu = get_post_meta($object->object_id, "rnr_disable_section_from_menu", true);
        $current_page_id = get_option('page_on_front');

                if ( ( $disable_menu != true ) && ( $varpost->ID != $current_page_id ) ) {

                  $output .= $indent . '<li id="menu-item-'. $object->ID . '" '.$class_names.'>';

                  if ( $separatepages == true )
                    $attributes .= ! empty( $object->url ) ? ' href="'   . esc_attr( $object->url ) .'" ' : '';
                  else{
                    if (is_front_page()) 
                      $attributes .= ' href="#' . $varpost->post_name . '"  class="page-scroll menu-state "'; 
                    else 
                      $attributes .= ' href="'. home_url().'/#'. $varpost->post_name .'" class="page-scroll menu-state " ';
                  } 

                $object_output = $args->before;
                $object_output .= '<a '. $attributes .'>';
				$object_output .= $args->link_before . '' . apply_filters( 'the_title', $object->title, $object->ID ) . '';
                $object_output .= $args->link_after;
                $object_output .= '</a>';
				//$object_output .= '<i class="arrow ion-chevron-down "></i>';
                $object_output .= $args->after;    

                 $output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );                              
                }
                                         
           }
          
           
      }
}



add_action( 'after_setup_theme', 'drex_setup' );

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once (get_template_directory().'/framework/class-tgm-plugin-activation.php');

/**
 * Register the required plugins for this theme.
 */
function drex_register_required_plugins() {
$drex_plugins = array(
// This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => esc_attr__( 'Redux Framework', 'drex' ),
            'slug'      => 'redux-framework',
            'required'  => true,
			'force_activation'   => false,
            'force_deactivation' => false,
        ),
		
		array(
            'name'      => esc_html__( 'WPBakery Page Builder', 'drex' ),
            'slug'      => 'js_composer',
			'source'    => 'http://webredox.net/plugins/js_composer.zip',
            'required'  => true,
        ),	
		
		
		array(
            'name'      => esc_html__( 'Drex Plugin', 'drex' ),
            'slug'      => 'drex-plugin',
			'source'    => 'http://webredox.net/plugins/drex-plugin.zip',
			'required'  => true,
        ),
		
		array(
            'name'      => esc_html__( 'Contact Form 7', 'drex' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),
		
		array(
            'name'      => esc_html__( 'Meta Box', 'drex' ),
            'slug'      => 'meta-box',
            'required'  => true,
        ),
		
		array(
            'name'      => esc_html__( 'MailChimp for WordPress', 'dive' ),
            'slug'      => 'mailchimp-for-wp',
            'required'  => false,
        ),
		
		array(
            'name'      => esc_html__( 'WP-PostViews', 'dive' ),
            'slug'      => 'wp-postviews',
            'required'  => false,
        ),
		
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     */
    $drex_config = array(
        'default_path' => '',                      
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',                      
        'is_automatic' => false,                   
        'message'      => '',                      
        
    );
tgmpa( $drex_plugins, $drex_config );

if ( is_admin() ) {

	function drex_remove_revolution_slider_meta_boxes() {
		remove_meta_box( 'mymetabox_revslider_0', 'page', 'normal' );
		remove_meta_box( 'mymetabox_revslider_0', 'post', 'normal' );
		remove_meta_box( 'mymetabox_revslider_0', 'gallery', 'normal' );
		remove_meta_box( 'slugdiv', 'gallery', 'normal' );
	}

	add_action( 'do_meta_boxes', 'drex_remove_revolution_slider_meta_boxes' );
	
}

}
