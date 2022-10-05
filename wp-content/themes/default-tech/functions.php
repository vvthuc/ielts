<?php
define('CPATH', get_template_directory() . '/inc');
require_once(CPATH . '/admin.php');
require_once(CPATH . '/common.php');
require_once(CPATH . '/pagination.php');
require_once(CPATH . '/setting_pages.php');
require_once(CPATH . '/custom_posttype.php');
function admin_menu()
{
}
add_action('admin_menu', 'admin_menu', 9999);
function hook_css($link_css)
{
    echo $link_css;
}
add_action('wp_head', 'hook_css');
function hook_js($script)
{
    echo $script;
}
add_action('wp_footer', 'hook_js');
function wpb_remove_schedule_delete()
{
    remove_action('wp_scheduled_delete', 'wp_scheduled_delete');
}
add_action('init', 'wpb_remove_schedule_delete');
function phi_theme_support()
{
    remove_theme_support('widgets-block-editor');
}
add_action('after_setup_theme', 'phi_theme_support');
