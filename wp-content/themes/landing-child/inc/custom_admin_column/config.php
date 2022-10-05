<?php 

include_once "cspost.php";

function load_custom_admin_column_res() {

  wp_enqueue_style( 'toastr-css', get_template_directory_uri() . '/admin/toastr.min.css', false, '1.0.0' );

  wp_enqueue_script('toastr-js', get_template_directory_uri().'/admin/toastr.min.js',array('jquery'), '1.0', true );

}

add_action( 'admin_enqueue_scripts', 'load_custom_admin_column_res' );