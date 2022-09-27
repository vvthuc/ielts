<?php
add_filter('rwmb_meta_boxes', 'tech5s_post_meta_boxes');
function tech5s_post_meta_boxes($meta_boxes)
{
    $meta_boxes[] = array(
        'title'      => 'Cấu hình tin tức',
        'post_types' => 'post',
        'fields'         => array(
            array(
                'name' => 'Kích hoạt',
                'id' => 'act',
                'type' => 'checkbox',
                'std' => 0
            ),
            array(
                'name' => 'Tin nổi bật',
                'id' => 'home',
                'type' => 'checkbox',
                'std' => 0
            ),
            array(
                'name' => 'Sắp xếp',
                'id' => 'ord',
                'type' => 'text',
                'size' => 50,
                'std' => 0
            ),
        )
    );
    return $meta_boxes;
}
add_filter('rwmb_meta_boxes', 'tech5s_category_meta_boxes');
function tech5s_category_meta_boxes($meta_boxes)
{
    $meta_boxes[] = array(
        'title'      => 'Cấu hình danh mục tin',
        'taxonomies' => 'category',
        'fields'         => array(
            array(
                'name' => 'Kích hoạt',
                'id' => 'act',
                'type' => 'checkbox',
                'std' => 0
            ),
            array(
                'name' => 'Danh mục nổi bật',
                'id' => 'home',
                'type' => 'checkbox',
                'std' => 0
            ),
            array(
                'name' => 'Sắp xếp',
                'id' => 'ord',
                'type' => 'text',
                'size' => 50,
                'std' => 0
            )
        )
    );
    return $meta_boxes;
}
