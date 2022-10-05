<?php
function get_post_view($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0';
    }
    return $count.
    '';
}
function set_post_view($postID) {
    $count_key = 'post_views_count';
    $count = (int) get_post_meta($postID, $count_key, true);
    if (strlen($count) < 1) {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, (string) $count);
    }
}
function posts_column_views($defaults) {
    $defaults['post_views'] = __('Lượt xem');
    return $defaults;
}
function posts_custom_column_views($column_name, $id) {
    if ($column_name === 'post_views') {
        echo get_post_view(get_the_ID());
    }
}
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views', 5, 2);