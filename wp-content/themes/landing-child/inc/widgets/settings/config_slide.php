<?php 
add_filter('rwmb_meta_boxes', 'tech5s_options_meta_boxes_config');
function tech5s_options_meta_boxes_config($meta_boxes) 
{
    $meta_boxes[] = array(
        'id' => 'Slide',
        'title' => 'Slide Ảnh ',
        'settings_pages' => 'tech5s-slider',
        'tab' => 'Slide-banner',
        'fields' => array(
            array(
                'name' => 'Slide Ảnh',
                'id' => 'slide-item',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => 'Ảnh',
                        'id' => 'img',
                        'type' => 'image_advanced',
                        'max_file_uploads' => 1,
                        'class' => 'hc-normal',
                        'image_size' => ''
                    ),
                    array(
                        'name' => 'Tiêu đề_vi',
                        'id' => 'name_vi',
                        'type' => 'textarea',
                        'size' => 200
                    ),
                    array(
                        'name' => 'Tiêu đề_en',
                        'id' => 'name_en',
                        'type' => 'textarea',
                        'size' => 200
                    ),
                    array(
                        'name' => 'Mô tả_vi',
                        'id' => 'content_vi',
                        'type' => 'textarea',
                        'size' => 200
                    ),
                    array(
                        'name' => 'Mô tả_en',
                        'id' => 'content_en',
                        'type' => 'textarea',
                        'size' => 200
                    ),
                    array(
                        'name' => 'Link_vi',
                        'id' => 'link_vi',
                        'type' => 'text',
                        'size' => 100
                    ),
                    array(
                        'name' => 'Link_en',
                        'id' => 'link_en',
                        'type' => 'text',
                        'size' => 100
                    ),
                )
            )
        )
    );
    $meta_boxes[] = array(
        'id' => 'achievement',
        'title' => 'Thành tựu',
        'settings_pages' => 'tech5s-slider',
        'tab' => 'achievement-setting',
        'fields' => array(
            array(
                'name' => 'Các thành tựu',
                'id' => 'achievement-item',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array (
                    array(
                        'name' => 'Ảnh',
                        'id' => 'img',
                        'type' => 'image_advanced',
                        'max_file_uploads' => 1,
                        'class' => 'hc-normal',
                        'image_size' => ''
                    ),
                    array(
                        'name' => 'con số đạt được',
                        'id' => 'number',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'nội dung thành tựu_vi',
                        'id' => 'achievement_name_vi',
                        'type' => 'wysiwyg',

                        'options' => array(
        
                            'media_buttons' => true,
        
                            'textarea_rows' => 5,
        
                            'teeny' => false,
        
                        ),
                    ),
                    array(
                        'name' => 'nội dung thành tựu_en',
                        'id' => 'achievement_name_en',
                        'type' => 'wysiwyg',

                        'options' => array(
        
                            'media_buttons' => true,
        
                            'textarea_rows' => 5,
        
                            'teeny' => false,
        
                        ),
                    ),
                ),
            ),
        )
    );
    return $meta_boxes;
}
?>