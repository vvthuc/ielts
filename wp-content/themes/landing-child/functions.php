<?php
define('CPATHCHILD', get_stylesheet_directory() . '/inc');
require_once(CPATHCHILD . '/admin.php');
require_once(CPATHCHILD . '/common.php');
require_once(CPATHCHILD . '/pagination.php');
require_once(CPATHCHILD . '/setting_pages.php');
require_once(CPATHCHILD . '/custom_posttype.php');
if (!function_exists('theme_setup')) :
    function theme_setup()
    {
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('post-thumbnails');
        add_image_size('small', 150, 0, array('center', 'center'));
        add_image_size('medium', 400, 0, array('center', 'center'));
        add_image_size('large', 600, 0, array('center', 'center'));
        add_image_size('full', 0, 0, true);
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ));
    }
endif;
add_action('after_setup_theme', 'theme_setup');
add_action('wp_enqueue_scripts', 'enqueue_parent_styles');
function enqueue_parent_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('init', function () {
    register_taxonomy('post_tag', []);
    register_taxonomy('category', []);
    register_post_type('post', []);
});

register_nav_menus(array(
    'primary-menu' => __('Menu đầu trang'),
));
