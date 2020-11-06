<?php
/*
Plugin Name: Drex Plugin
Plugin URI: http://webredox.net
Description: Declares a plugin that will create Page Settins, VC addons & Custom Post Type
Version: 1.4
Author: webRedox
Author URI: http://webredox.net
License: GPLv2
*/

include plugin_dir_path( __FILE__ ).'metaboxes.php';
include plugin_dir_path( __FILE__ ).'meta-box-group.php';
include plugin_dir_path( __FILE__ ).'meta-box-show-hide.php';
include plugin_dir_path( __FILE__ ).'page-links-to.php';
function drex_register_metabox_list() {
require plugin_dir_path( __FILE__ ).'/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'http://drex.webredox.net/pluginupdate/details.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'drex-plugin'
);
}
add_action('init', 'drex_register_metabox_list');

global $drex_options;

if( ! function_exists( 'portfolio_post_types' ) ) {
    function portfolio_post_types() {

        register_post_type(
            'portfolio',
            array(
                'labels' => array(
                    'name'          => __( 'Portfolios', 'portfolio' ),
                    'singular_name' => __( 'Portfolio', 'portfolio' ),
                    'add_new'       => __( 'Add New', 'portfolio' ),
                    'add_new_item'  => __( 'Add New Portfolio', 'portfolio' ),
                    'edit'          => __( 'Edit', 'portfolio' ),
                    'edit_item'     => __( 'Edit Portfolio', 'portfolio' ),
                    'new_item'      => __( 'New Portfolio', 'portfolio' ),
                    'view'          => __( 'View Portfolio', 'portfolio' ),
                    'view_item'     => __( 'View Portfolio', 'portfolio' ),
                    'search_items'  => __( 'Search Portfolio', 'portfolio' ),
                    'not_found'     => __( 'No Portfolio item found', 'portfolio' ),
                    'not_found_in_trash' => __( 'No portfolio item found in Trash', 'portfolio' ),
                    'parent'        => __( 'Parent Portfolio', 'portfolio' ),
                ),
                
                'description'       => __( 'Create a Portfolio.', 'portfolio' ),
                'public'            => true,
                'show_ui'           => true,
                'show_in_menu'          => true,
                'publicly_queryable'    => true,
				'capability_type' => 'post',
                'exclude_from_search'   => true,
                'menu_position'         => 6,
                'hierarchical'      => false,
                'query_var'         => true,
				'menu_icon' => 'dashicons-portfolio',
                'supports'  => array (
                    'title', //Text input field to create a post title.
                    'editor',
                    'thumbnail',
                    
                )
            )
        );
register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true, 'label' => 'Portfolio Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
        
        

    }
}

add_action( 'init', 'portfolio_post_types' ); // register post type

register_taxonomy_for_object_type('category', 'custom-type');

/* ==========================================
   Add featured image column to admin panel post list page
========================================== */
add_filter('manage_posts_columns', 'add_img_column');
add_filter('manage_posts_custom_column', 'manage_img_column', 10, 2);

function add_img_column($columns) {
	$columns['img'] = 'Thumbnail';
	return $columns;
}

function manage_img_column($column_name, $post_id) {
	if( $column_name == 'img' ) {
		echo get_the_post_thumbnail( $post_id, array( 80, 60) ); return true; // 80, 60 is for image size.
	}
}

// Change columns order
add_filter('manage_posts_columns', 'column_order');
function column_order($columns) {
  $n_columns = array();
  $move = 'img'; // what to move
  $before = 'title'; // move before this
  foreach($columns as $key => $value) {
    if ($key==$before){
      $n_columns[$move] = $move;
    }
      $n_columns[$key] = $value;
  }
  return $n_columns;
}

// Set columns width
function set_column_width() { ?>
	<style type="text/css">
		/*	Class ".column-img" is for image column */
		.edit-php .fixed .column-img { 
			width: 100px;
		}
	</style>
<?php }
add_action( 'admin_enqueue_scripts', 'set_column_width' );

add_filter('widget_title', 'do_shortcode');
add_shortcode('span', 'wpse_shortcode_span');
function wpse_shortcode_span( $attr, $content ){ return '<span>'. $content . '</span>'; }
add_shortcode('br', 'wpse_shortcode_br');
function wpse_shortcode_br( $attr ){ return '<br>'; }

function drex_social_media_icons( $drex_contactmethods ) {
    // Add social media
    
    $drex_contactmethods['twitter'] = 'Twitter';
    $drex_contactmethods['facebook'] = 'Facebook';
    $drex_contactmethods['instagram'] = 'Instagram';
    $drex_contactmethods['tumblr'] = 'Tumblr';
    $drex_contactmethods['pinterest'] = 'Pinterest';
    $drex_contactmethods['youtube'] = 'Youtube';

    return $drex_contactmethods;
}
add_filter('user_contactmethods','drex_social_media_icons',10,1);

/**
*
*
*
 * Allow shortcodes in widgets
 * @since v1.0
 */
add_filter('widget_text', 'do_shortcode');

if( !function_exists('symple_fix_shortcodes') ) {
	function symple_fix_shortcodes($content){   
		$array = array (
			'<p>['		=> '[', 
			']</p>'		=> ']', 
			']<br />'	=> ']'
		);
		$content = strtr($content, $array);
		return $content;
	}
	add_filter('the_content', 'symple_fix_shortcodes');
}


//  title
if(! function_exists('drex_title_shortcode')){
	function drex_title_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'image'=>'',
			'title'=>'',
			'subtitle'=>'',
			'sec_no'=>'',
			
			
			), $atts) );
		
		
		$html='';
		$dot="'";
		
		

		$html .= '<h1 class="home-page-title-all">'.$title.'</h1>';
		if($subtitle != '') {
		$html .= '<div class="inner-divider-half"></div>';
		$html .= '<h2 class="section-heading section-heading-all drex-sec-sub-title section-heading-light">
                  <span>'.$sec_no.'</span> '.$subtitle.'
                  </h2>';
				  }
		
				
		return $html;
	}
	add_shortcode('drex_title', 'drex_title_shortcode');
}

//  divider
if(! function_exists('drex_divider_shortcode')){
	function drex_divider_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'divider_type'=>'',
			
			
			), $atts) );
		
		
		$html='';
		$dot="'";
		
		
		if($divider_type == "st2"){
		$html .= '<div class="inner-divider-last"></div>';
		}
		else if($divider_type == "st3"){
		$html .= '<div class="inner-divider-mobile"></div>';
		}
		else {
		$html .= '<div class="inner-divider"></div>';
		}
		
		
				
		return $html;
	}
	add_shortcode('drex_divider', 'drex_divider_shortcode');
}

//  blockquote
if(! function_exists('drex_blockquote_shortcode')){
	function drex_blockquote_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'divider_type'=>'',
			
			
			), $atts) );
		
		
		$html='';
		$dot="'";
		
		$html .= '<div class="about-block">
                            <!-- section TXT start -->
                            <div class="section-intro">
                                <p>
                                    '.do_shortcode($content).'
                                </p>
                            </div><!-- section TXT end -->
                            <!-- divider start -->
                            <div class="inner-divider-half"></div><!-- divider end -->
                            <!-- section quote start -->
                            <div class="intro-quote-wrapper">
                                <div class="intro-quote">
                                    <span class="ion-quote"></span>
                                </div>
                            </div><!-- section quote end -->
                        </div>';
		
		
				
		return $html;
	}
	add_shortcode('drex_blockquote', 'drex_blockquote_shortcode');
}

//  textbox
if(! function_exists('drex_text_shortcode')){
	function drex_text_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'divider_type'=>'',
			
			
			), $atts) );
		
		
		$html='';
		$dot="'";
		
		$html .= '<div class="about-block about-block-correction drex-text-block">
                            <!-- divider start -->
                            <!-- divider end -->
                            <!-- section TXT start -->
                            '.do_shortcode($content).'
                        </div>';
		return $html;
	}
	add_shortcode('drex_text', 'drex_text_shortcode');
}

// portfolio
if(! function_exists('drex_portfolio_shortcode')){
	function drex_portfolio_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'postcount'=>'',
			'postoffset'=>'',
			'categoryname'=>'',
			
			
			
			), $atts) );
		
		$dot="'";
		$parim="";
		$html='';
		
		$html .= '<div class="row">';
		$html .= '<div class="legendary-gallery">';
		global $post;
		$paged=(get_query_var('paged'))?get_query_var('paged'):1;
		$loop = new WP_Query( array( 'post_type' => 'portfolio','portfolio_category'=> $categoryname, 'posts_per_page'=> $postcount, 'post_status' => 'publish, future', 'offset' => $postoffset) );
		
 		while ( $loop->have_posts() ) : $loop->the_post();
		$drex_portfolio_category = wp_get_post_terms($post->ID,'portfolio_category');
		$drex_class = ""; 
		$drex_categories = ""; 
		foreach ($drex_portfolio_category as $drex_item) {
		$drex_class.=esc_attr($drex_item->slug . ' ');
		$drex_categories.='<a>';
		$drex_categories.=esc_attr($drex_item->name . '  ');
		$drex_categories.='</a>';
		}
		if (has_post_thumbnail( $post->ID ) ):
		$drex_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );
		$html .= '<figure class="col-sm-12 col-md-6 col-lg-6 hover-effect-img move-down">';
		$html .= '<a data-size="';
		$html .= $drex_image[1];
		$html .= 'x';
		$html .= $drex_image[2];
		$html .= '" href="';
		$html .= $drex_image[0];
		$html .= '"><img alt="'.get_the_title().'" class="img-responsive" src="'.$drex_image[0].'"></a>';
		$html .= '<figcaption>';
		$html .= '<span class="img-caption">';
		$html .= get_the_title();
		$html .= '</span>';
		$html .= '<div class="hover-effect"></div>';
		$html .= '<div class="hover-icons">';
		$html .= '<a class="iw-slide-right ion-ios-plus-empty" href="#"></a>';
		$html .= '<a class="iw-slide-left ion-share" href="'.get_the_permalink().'"></a>';
		$html .= '</div>';
		$html .= '</figcaption>';
		$html .= '</figure>';
		endif;
		endwhile;
		wp_reset_postdata();
		$html .= '</div>';
		$html .= '</div>';
		
		
		
		
		
		
				
		return $html;
	}
	add_shortcode('drex_portfolio', 'drex_portfolio_shortcode');
}

// Blog Shortcode

if(! function_exists('drex_blog_shortcode')){
	function drex_blog_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			'postcount'=>'-1',
			'postoffset'=>'',
			'categoryname'=>'',
			'page_name'=>'',
			'hoverback'=>'',
			'textcolors'=>'',
			'autoplay'=>'false',
			'reademore'=>'Read More',
			
			
			
			), $atts) );

		$html='';
		$html .= '<div class="owl-carousel " id="news-carousel"  data-autoplay="'.$autoplay.'">';
		global $post;
		$paged=(get_query_var('paged'))?get_query_var('paged'):1;
		$loop = new WP_Query( array( 'post_type' => 'post','category_name'=> $categoryname, 'posts_per_page'=> $postcount, 'post_status' => 'publish, future', 'offset' => $postoffset) );
 		while ( $loop->have_posts() ) : $loop->the_post();
		if (has_post_thumbnail( $post->ID ) ):
		$drex_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'drex_blog_image' );
		$portfolio_categorys = wp_get_post_terms($post->ID,'category');
		$drex_class = ""; 
		$drex_cat = "";
		foreach ($portfolio_categorys as $item) {
		$drex_class.=esc_attr($item->slug . ' ');
		$drex_cat.= '<span class="port-cat">/</span>';	
		$drex_cat.='<a ';
		$drex_cat.=' href="'.get_home_url( '/' ).'/category/';
		$drex_cat.=esc_attr($item->slug . ' ');
		$drex_cat.='">';
		$drex_cat.=esc_attr($item->name . '  ');
		$drex_cat.='</a>';
			
		}
		$html .= '<div class="news-item">';
		$html .= '<figure class="news-content">';
		$html .= '<a href="'.get_the_permalink().'"><img alt="'.get_the_title().'" src="'.$drex_image[0].'"></a>';
		$html .= '<figcaption>';
		$html .= '<div class="inner-divider-timeline-news"></div>';
		$html .= '<h3>'.$drex_cat.'</h3>';
		$html .= '<div class="inner-divider-half"></div>';
		$html .= '<h2 class="section-heading section-heading-all section-heading-light section-heading-news"><a href="'.get_the_permalink().'">';
		$html .= get_the_title();
		$html .= '</a></h2>';
		$html .= '<div class="inner-divider-half"></div>';
		$html .= '<h5>';
		$html .= get_the_time( get_option( 'date_format' ) );
		$html .= '</h5>';
		$html .= '<div class="inner-divider-half"></div>';
		$html .= '<div class="section-txt-news">';
		$html .= '<p>';
		$html .= substr(strip_tags($post->post_content), 0, 300);
		$html .= '</p>';
		$html .= '</div>';
		$html .= '<div class="inner-divider-half"></div>';
		$html .= '<div class="the-button-wrapper the-button-wrapper-news">';
		$html .= '<a href="'.get_the_permalink().'">';
		$html .= '<div class="the-button">'.$reademore.'';
		$html .= '</div>';
		$html .= '</a>';
		$html .= '</div>';
		$html .= '</figcaption>';
		$html .= '</figure>';
		$html .= '</div>';
		endif;
		endwhile;
		wp_reset_postdata();
		$html .= '</div>';
		
		
		
		
				
		return $html;
	}
	add_shortcode('drex_blog', 'drex_blog_shortcode');
}

//  contact info
if(! function_exists('drex_contact_info_shortcode')){
	function drex_contact_info_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'iconclass'=>'ion-ios-location-outline',
			'title'=>'',
			'link_type'=>'',
			'url'=>'',
			'info'=>'',
			
			
			), $atts) );
		
		
		$html='';
		$dot="'";
		
		$html .= '<div class="contact-info-wrapper">';
		$html .= '<div class="contact-info-description">';
		$html .= '<i class="'.$iconclass.' contact-info-description-img"></i>';
		$html .= '<div class="inner-divider-half"></div>';
		$html .= '<div class="contact-info-text">';
		$html .= '<p>';
		if($link_type == "st1"){
		$html .= '<a class="link-underline" href="'.$url.'">'.$title.'</a>';
		}
		else if($link_type == "st2"){
		$html .= '<a class="link-underline" href="mailto:'.$url.'">'.$title.'</a>';
		}
		else {
		$html .= ''.$title.'';
		}
		if($info != ""){
		$html .= '<br>'.$info.'';
		}
		$html .= '</p>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		return $html;
	}
	add_shortcode('drex_contact_info', 'drex_contact_info_shortcode');
}

//  copyright
if(! function_exists('drex_copyright_shortcode')){
	function drex_copyright_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'iconclass'=>'ion-ios-location-outline',
			'title'=>'',
			'link_type'=>'',
			'url'=>'',
			'info'=>'',
			
			
			), $atts) );
		
		
		$html='';
		$dot="'";
		
		$html .= '<div class="col-lg-12 text-center">
                            <!-- copyright start -->
                            <div class="copyright">
                                <a class="link-underline link-underline-dark" href="'.home_url( '/' ).'">'.get_bloginfo('name').'</a> &copy; '.$content.'
                            </div><!-- copyright end -->
                        </div>';
		return $html;
	}
	add_shortcode('drex_copyright', 'drex_copyright_shortcode');
}

?>