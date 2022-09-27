<?php
add_filter('rwmb_meta_boxes', 'tech5s_options_meta_box_introduce');
function tech5s_options_meta_box_introduce($meta_boxes)
{
    $meta_boxes[] = array(
        'id' => 'list_history_begin',
        'title' => 'Lịch sử hình thành',
        'settings_pages' => 'tech5s-introduce',
        'tab' => 'history-begin-setting',
        'fields' => array(
            array(
                'name' => 'List lịch sử hình thành',
                'id' => 'list_value_history_begin',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => 'Thời gian',
                        'id' => 'year',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Icon (48 x 48)',
                        'id' => 'icon',
                        'type' => "image_advanced",
                        'max_file_uploads' => 1,
                        'class' => 'hc-normal',
                        'image_size' => ''
                    ),
                    array(
                        'name' => 'Mô tả (vi)',
                        'id' => 'content_vi',
                        'type' => 'wysiwyg',
                        'raw'     => false
                    ),
                    array(
                        'name' => 'Mô tả (en)',
                        'id' => 'content_en',
                        'type' => 'wysiwyg',
                        'raw'     => false
                    )
                )
            )
        )
    );

    $meta_boxes[] = array(
        'id' => 'list_certification',
        'title' => 'Chứng nhận giải thưởng',
        'settings_pages' => 'tech5s-introduce',
        'tab' => 'introduce-certificate',
        'fields' => array(
            array(
                'name' => 'List ảnh giải thưởng',
                'id' => 'list_value_Certification_begin',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => 'Ảnh giải thưởng (vi)',
                        'id' => 'img_certificate_vi',
                        'type' => "image_advanced",
                        'max_file_uploads' => 1,
                        'class' => 'hc-normal',
                        'image_size' => ''
                    ),
                    array(
                        'name' => 'Ảnh giải thưởng (en)',
                        'id' => 'img_certificate_en',
                        'type' => "image_advanced",
                        'max_file_uploads' => 1,
                        'class' => 'hc-normal',
                        'image_size' => ''
                    )
                )
            )
        )
    );

    $meta_boxes[] = array(
        'id' => 'list_mission',
        'title' => 'Tầm nhìn xứ mệnh',
        'settings_pages' => 'tech5s-introduce',
        'tab' => 'introduce-mission',
        'fields' => array(
            array(
                'name' => 'List tầm nhìn, sứ mệnh, giá trị',
                'id' => 'list_value_mission_begin',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => 'Icon tầm nhìn, sứ mệnh (24 x 24)',
                        'id' => 'icon_value_mission',
                        'type' => "image_advanced",
                        'max_file_uploads' => 1,
                        'class' => 'hc-normal',
                        'image_size' => ''
                    ),
                    array(
                        'name' => 'Tiêu đề (vi)',
                        'id' => 'title_mission_vi',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Mô tả (vi)',
                        'id' => 'content_vi',
                        'type' => 'wysiwyg',
                        'raw'     => false
                    ),
                    array(
                        'name' => 'Tiêu đề (en)',
                        'id' => 'title_mission_en',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Mô tả (en)',
                        'id' => 'content_en',
                        'type' => 'wysiwyg',
                        'raw'     => false
                    ),
                )
            )
        )
    );

    $meta_boxes[] = array(
        'id' => 'list_strength',
        'title' => 'Thế mạnh',
        'settings_pages' => 'tech5s-introduce',
        'tab' => 'introduce-strength',
        'fields' => array(
            array(
                'name' => 'List thế mạnh',
                'id' => 'list_strength_begin',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => 'Tiêu đề 1 (vi)',
                        'id' => 'title_vi',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Tiêu đề 2 (vi)',
                        'id' => 'text_vi',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Tiêu đề 1 (en)',
                        'id' => 'title_en',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Tiêu đề 2 (en)',
                        'id' => 'text_en',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Ảnh',
                        'id' => 'img_strength',
                        'type' => "image_advanced",
                        'max_file_uploads' => 1,
                        'class' => 'hc-normal',
                        'image_size' => ''
                    )
                )
            )
        )
    );
    
    return $meta_boxes;
}
