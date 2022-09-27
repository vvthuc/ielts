<?php
add_filter('rwmb_meta_boxes', 'tech5s_options_meta_box_recruitment');
function tech5s_options_meta_box_recruitment($meta_boxes)
{
    $meta_boxes[] = array(
        'id' => 'title-page',
        'title' => 'Chính sách',
        'settings_pages' => 'tech5s-recruitment',
        'tab' => 'title-page',
        'fields' => array(
            array(
                'name' => 'Chính sách công ty',
                'id' => 'title-page',
                'type' => 'group',
                'fields' => array(
                    array(
                        'name' => 'Tiêu đề nhỏ (vi)',
                        'id' => 'litle_title_vi',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Tiêu đề nhỏ (en)',
                        'id' => 'litle_title_en',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Tiêu đề (vi)',
                        'id' => 'title_vi',
                        'type' => 'text',
                        'options' => array(
                            'media_buttons' => true,
                            'textarea_rows' => 5,
                            'teeny' => false,
                        ),
                    ),
                    array(
                        'name' => 'Tiêu đề (en)',
                        'id' => 'title_en',
                        'type' => 'text',
                        'options' => array(
                            'media_buttons' => true,
                            'textarea_rows' => 5,
                            'teeny' => false,
                        ),
                    ),
                )
            )
        )
    );

    $meta_boxes[] = array(
        'id' => 'companys-face',
        'title' => 'Hình ảnh công ty',
        'settings_pages' => 'tech5s-recruitment',
        'tab' => 'companys-face',
        'fields' => array(
            array(
                'name' => 'Danh sách ảnh công ty',
                'id' => 'companys-face',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => 'Ảnh công ty',
                        'id' => 'list_companys_face',
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
        'id' => 'the-treatment',
        'title' => 'Đãi ngộ',
        'settings_pages' => 'tech5s-recruitment',
        'tab' => 'the-treatment',
        'fields' => array(
            array(
                'name' => 'List Đãi ngộ',
                'id' => 'the-treatment',
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
                        'name' => 'Tiêu đề 2 (en)',
                        'id' => 'title_en',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Nội dung (vi)',
                        'id' => 'content_vi',
                        'type' => 'wysiwyg',
                        'options' => array(
                            'media_buttons' => true,
                            'textarea_rows' => 5,
                            'teeny' => false,
                        ),
                    ),
                    array(
                        'name' => 'Nội dung (en)',
                        'id' => 'content_en',
                        'type' => 'wysiwyg',
                        'options' => array(
                            'media_buttons' => true,
                            'textarea_rows' => 5,
                            'teeny' => false,
                        ),
                    ),
                    array(
                        'name' => 'Ảnh',
                        'id' => 'treatment_img',
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
        'id' => 'policy-company',
        'title' => 'Chính sách',
        'settings_pages' => 'tech5s-recruitment',
        'tab' => 'policy-company',
        'fields' => array(
            array(
                'name' => 'List Chính sách',
                'id' => 'policy-company',
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
                        'name' => 'Tiêu đề 2 (en)',
                        'id' => 'title_en',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Nội dung (vi)',
                        'id' => 'content_vi',
                        'type' => 'wysiwyg',
                        'options' => array(
                            'media_buttons' => true,
                            'textarea_rows' => 5,
                            'teeny' => false,
                        ),
                    ),
                    array(
                        'name' => 'Nội dung (en)',
                        'id' => 'content_en',
                        'type' => 'wysiwyg',
                        'options' => array(
                            'media_buttons' => true,
                            'textarea_rows' => 5,
                            'teeny' => false,
                        ),
                    ),
                    array(
                        'name' => 'Ảnh (561 x 344)',
                        'id' => 'policy_img',
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
