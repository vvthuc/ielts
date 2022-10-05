<?php 


function load_custom_wp_admin_style() {


	wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/admin/admin.css', false, '1.0.0' );


	wp_enqueue_style( 'custom_wp_admin_css' );


	wp_enqueue_script('custom_wp_admin_js', get_template_directory_uri().'/admin/script.js',array('jquery'), '1.0', true );


}


add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );





if (version_compare($GLOBALS['wp_version'], '5.7-beta', '>')) {


	add_filter('use_block_editor_for_post_type', '__return_false', 10);


} else {


	add_filter('gutenberg_can_edit_post_type', '__return_false', 10);


}


