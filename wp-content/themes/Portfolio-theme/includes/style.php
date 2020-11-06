<?php
global $drex_options;
$drex_options = get_option('drex');
function drex_style() {

wp_enqueue_style('drex-main', get_template_directory_uri() . '/style.css');
wp_enqueue_style('drex-plugins', get_template_directory_uri() . '/includes/css/plugins.css');
wp_enqueue_style('drex-style', get_template_directory_uri() . '/includes/css/style.css');
wp_enqueue_style('drex-your-style', get_template_directory_uri() . '/includes/css/your-style.css');
wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/includes/vendor/owl-carousel/css/owl.carousel.min.css');
wp_enqueue_style('lightgallery', get_template_directory_uri() . '/includes/vendor/lightgallery/css/lightgallery.min.css');
wp_enqueue_style('owl-theme-default', get_template_directory_uri() . '/includes/vendor/owl-carousel/css/owl.theme.default.min.css');
wp_register_style('drex-blog', get_template_directory_uri() . '/includes/css/blog.css');
wp_register_style('drex-blog-comment', get_template_directory_uri() . '/includes/css/comment.css');
wp_register_style('drex-blog-comment-sidebar', get_template_directory_uri() . '/includes/css/comment-sidebar.css');
wp_enqueue_style('font-awesome', get_template_directory_uri() . '/includes/fonts/font-awesome-4.5.0/css/font-awesome.min.css');




}
add_action('wp_enqueue_scripts', 'drex_style');

function drex_fonts_url() {
    $drex_font_url = '';
    
    if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'drex' ) ) {
        $drex_font_url = add_query_arg( 'family','Raleway:100,200,300,400,500,600,700,800,900%7COswald:300,400,700' , "//fonts.googleapis.com/css" );
    }
    return $drex_font_url;
}

function drex_scripts() {
    wp_enqueue_style( 'drex_fonts', drex_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'drex_scripts' );

function drex_enqueue_custom_admin_style() {
wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/includes/css/admin-style.css', false, '1.0.0' );
wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'drex_enqueue_custom_admin_style' );