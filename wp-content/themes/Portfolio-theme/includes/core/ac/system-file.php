<?php 
require get_template_directory() . '/includes/core/ab/system-file.php';
if (class_exists('WPBakeryVisualComposerAbstract')) {
	add_action('init', 'requireVcExtend',2);
	}
add_action( 'tgmpa_register', 'drex_register_required_plugins' );
?>