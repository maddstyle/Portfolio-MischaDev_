<?php

if( !function_exists ('drex_enqueue_scripts') ) :
	function drex_enqueue_scripts() {
	$drex_options = get_option('drex');
	
	wp_enqueue_script('drex-plugins', get_template_directory_uri() . '/includes/js/plugins.js', array('jquery'), '1.0',true);
	wp_register_script('wave', get_template_directory_uri() . '/includes/js/wave.js', array('jquery'), '1.0',true);
	wp_enqueue_script('drex-scripts', get_template_directory_uri() . '/includes/js/drex.js', array('jquery'), '1.0',true);
	
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
	}
}
	add_action('wp_enqueue_scripts', 'drex_enqueue_scripts');
endif;