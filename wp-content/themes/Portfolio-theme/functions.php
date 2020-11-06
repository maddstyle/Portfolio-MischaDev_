<?php
// Enqueue Style
require get_template_directory() . '/includes/style.php';
// Enqueue JS
require get_template_directory() . '/includes/js.php';
require get_template_directory() . '/includes/AfterSetupTheme.php';
require get_template_directory() . '/includes/functions.php';
require get_template_directory() . '/pagination.php';
require (get_template_directory() . '/includes/color.php');
require (get_template_directory() . '/admin/drex-base.php'); 
//Widget
require get_template_directory() . '/drex-widget/drex-widget.php';
 

if ( ! isset( $content_width ) ) $content_width = 900;	

$drex_options = get_option('drex');

// register nav menu
function drex_register_menus() {
register_nav_menus( array( 
'top-menu' => esc_html__( 'Primary menu','drex' ),
'main-menu' => esc_html__('One Page Menu ','drex'),

)
	);
}

add_action( 'after_setup_theme', 'drex_setup' );
function drex_setup() {
// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );
	// Enqueue editor styles.
	add_editor_style( 'style-editor.css' );
	
	// Add custom editor font sizes.
	add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Small', 'drex' ),
					'shortName' => esc_html__( 'S', 'drex' ),
					'size'      => 11,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'drex' ),
					'shortName' => esc_html__( 'M', 'drex' ),
					'size'      => 12,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'drex' ),
					'shortName' => esc_html__( 'L', 'drex' ),
					'size'      => 36,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'drex' ),
					'shortName' => esc_html__( 'XL', 'drex' ),
					'size'      => 49,
					'slug'      => 'huge',
				),
			)
		);
	
	add_theme_support( 'editor-color-palette', array(
	
        array(
            'name' => esc_html__( 'Monza', 'drex' ),
            'slug' => 'color-monza',
            'color' => '#db0018',
        ),
        array(
            'name' => esc_html__( 'Black', 'drex' ),
            'slug' => 'color-black',
            'color' => '#000',
        ),
		
		array(
            'name' => esc_html__( 'White', 'drex' ),
            'slug' => 'color-white',
            'color' => '#fff',
        ),
        
    ) );
	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	
	add_action( 'after_setup_theme', 'drex_lang_setup' );
	function drex_lang_setup(){
    load_theme_textdomain('drex', get_template_directory() . '/languages');
    }
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-header' );
	add_theme_support( "title-tag" );
	add_post_type_support( 'portgallery', 'post-formats' );
}
// Word Limit 
	function drex_string_limit_words($string, $word_limit)
	{
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
	}
// Add post thumbnail functionality
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 559, 220, true ); // Normal post thumbnails
	add_image_size( 'drex_blog_image', 700, 500, array( 'left', 'top' ) ); // port Thumbnail
	add_image_size( 'drex_portfolio_image', 360, 360, true ); // port Thumbnail
	add_image_size( 'drex_gallery', 600, 394, true ); // port Thumbnail
	

function drex_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}	
add_filter( 'comment_form_fields', 'drex_move_comment_field_to_bottom' );
// How comments are displayed
function drex_sidebar_style_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
?>
    <<?php echo esc_attr($tag); ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?>>
    <?php if ( 'div' != $args['style'] ) : ?>
	<a href="#" class="media-object pull-left bg-image" ><?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, '50' ); ?></a>
	
	<div id="div-comment-<?php comment_ID() ?>" class="media-body comment-body">
    <?php endif; ?>
    
	<h4 class="media-heading"><?php printf(__('%s','drex'), get_comment_author_link()) ?></h4>
	 
       <span class="article-time pull-left"><?php comment_date(get_option( 'date_format')); ?> <?php esc_attr_e('at','drex');?> <?php comment_date(get_option( 'time_format' )); ?></span> <span class="media-reply pull-right"><?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
    <div class="media-text drex-comment-text">
     <?php comment_text() ?>
    </div>	 
      <?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php esc_attr_e('Your comment is awaiting moderation.','drex') ?></em>
    <br />
   <?php endif; ?>    
<?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php
        }
// create sidebar & widget area
if(function_exists('register_sidebar')) {
function drex_theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Blog Sidebar', 'drex' ),
        'id' => 'sidebar-1',
        'description' => esc_html__( 'This area for Blog widgets.', 'drex' ),
        'before_widget' => '<div id="%1$s" class="widget blog-sidebar %2$s">',
		'after_widget'  => '</div></div>', 
		'before_title'  => '<div class="blog-side-heading"><h3>', 
		'after_title'   => '</h3></div><div class="blog-side-text-wrapper">'
    ) );
}
add_action( 'widgets_init', 'drex_theme_slug_widgets_init' );

function drex_theme_slug_widgets__init() {
    register_sidebar( array(
        'name' => esc_html__( 'Page Sidebar', 'drex' ),
        'id' => 'sidebar-2',
        'description' => esc_html__( 'This area for Page widgets.', 'drex' ),
        'before_widget' => '<div id="%1$s" class="widget blog-sidebar %2$s">',
		'after_widget'  => '</div></div>', 
		'before_title'  => '<div class="blog-side-heading"><h3>', 
		'after_title'   => '</h3></div><div class="blog-side-text-wrapper">'
    ) );
}
add_action( 'widgets_init', 'drex_theme_slug_widgets__init' );

}
if(function_exists('vc_set_as_theme')) vc_set_as_theme();
// Initialising Shortcodes
if (class_exists('WPBakeryVisualComposerAbstract')) {
  function requireVcExtend(){
    require_once get_template_directory() . '/extendvc/extend-vc.php';
  }
  
}

function drex_my_search_form( $form ) {
$drex_options = get_option('drex');
if(!empty($drex_options['translet_opt_6'])) {
$drex_search_text = esc_html(drex_AfterSetupTheme::return_thme_option('translet_opt_6',''));
}
else {
$drex_search_text ='Type & Hit Enters...';
}
    $drex_form = '<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url(home_url( '/' )) . '" >
    <div><label class="screen-reader-text" for="s">' . esc_html__( 'Search for:','drex' ) . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'. esc_attr($drex_search_text).'" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'drex' ) .'" />
    </div>
    </form>';
 
    return $drex_form;
}
add_filter( 'get_search_form', 'drex_my_search_form' );
if (is_admin() && isset($_GET['activated'])){
	wp_redirect(admin_url("themes.php?page=drex"));
}