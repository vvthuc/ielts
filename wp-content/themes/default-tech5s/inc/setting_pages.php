<?php
add_filter('mb_settings_pages', 'tech_settings_pages');
function tech_settings_pages($settings_pages)
{
    $settings_pages[] = array(
        'id' => 'my-options',
        'menu_title' => 'Cấu hình',
        'option_name' => 'my_options',
        'icon_url' => 'dashicons-images-alt',
        'tabs' => array(
            'base-setting' => 'Cấu hình chung',
        ),
        'submenu_title' => 'Cấu hình chung',
    );
    $settings_pages[] = array(
        'id' => 'tech-home',
        'option_name' => 'my_options',
        'menu_title' => 'Trang chủ',
        'parent' => 'my-options',
        'tabs' => array(
            'banners-setting' => 'Slide',
            'branchs-setting' => 'Chi nhánh',
            'partners-setting' => 'Đối tác',
            'starts-setting' => 'Khởi động',
            'whys-setting' => 'Tại sao chọn chúng tôi',
            'teachers-setting' => 'Giảng viên',
            'videos-setting' => 'Videos',
            'sale-setting' => 'Thông tin khuyến mãi',
            'questions-setting' => 'Câu hỏi thường gặp',
            'form-setting' => 'Form thông tin',
            'feels-setting' => 'Cảm nhận học viên',
        ),
    );
    return $settings_pages;
}
add_filter('rwmb_meta_boxes', 'tech_options_meta_boxes_general');
function tech_options_meta_boxes_general($meta_boxes)
{
    $meta_boxes[] = array(
        'id' => 'general',
        'title' => 'Thông tin cấu hình chung',
        'settings_pages' => 'my-options',
        'tab' => 'base-setting',
        'fields' => array(
            array(
                'name' => 'Favicon',
                'id' => 'favicon',
                'type' => "image_advanced",
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => '',
            ),
            array(
                'name' => 'Logo',
                'id' => 'logo',
                'type' => "image_advanced",
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => '',
            ),
            array(
                'name' => 'Logo Footer',
                'id' => 'logo_footer',
                'type' => "image_advanced",
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => '',
            ),
            array(
                'name' => 'GoogleTag',
                'id' => 'google_tag',
                'type' => 'textarea',
                'size' => 100,
                'sanitize_callback' => 'none',
            ),
            array(
                'name' => 'Hotline',
                'id' => 'hotline',
                'type' => 'text',
            ),
            array(
                'name' => 'Chèn script header',
                'id' => 'insert_script_header',
                'type' => 'textarea',
                'size' => 100,
                'sanitize_callback' => 'none',
            ),
            array(
                'name' => 'Chèn script sau body',
                'id' => 'insert_script_before_body',
                'type' => 'textarea',
                'size' => 100,
                'sanitize_callback' => 'none',
            ),
            array(
                'name' => 'Chèn script footer',
                'id' => 'insert_script_footer',
                'type' => 'textarea',
                'size' => 100,
                'sanitize_callback' => 'none',
            ),
            array(
                'name' => 'Copyright',
                'id' => 'copy_right',
                'type' => 'textarea',
                'size' => 500
            ),
        ),
    );

    $meta_boxes[] = array(
        'id' => 'banners-home',
        'title' => 'Banners',
        'settings_pages' => 'tech-home',
        'tab' => 'banners-setting',
        'fields' => array(
            array(
                'name' => 'Banners',
                'id' => 'banner-item',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => 'Tên banner',
                        'id' => 'name_banner',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Mô tả banner',
                        'id' => 'desc_banner',
                        'type' => 'textarea',
                    ),
                    array(
                        'name' => 'Hình ảnh banner (Desktop)',
                        'id' => 'banner_img_desktop',
                        'type' => 'image_advanced',
                        'max_file_uploads' => 1,
                        'class' => 'hc-normal',
                        'image_size' => '',
                    ),
                    array(
                        'name' => 'Hình ảnh banner (Mobile)',
                        'id' => 'banner_img_mobile',
                        'type' => 'image_advanced',
                        'max_file_uploads' => 1,
                        'class' => 'hc-normal',
                        'image_size' => '',
                    ),
                    array(
                        'name' => 'Link',
                        'id' => 'banner_link',
                        'type' => 'text',
                        'size' => 100,
                    ),
                ),
            ),
        ),
    );
    $meta_boxes[] = array(
        'id' => 'branchs-all',
        'title' => 'Banners',
        'settings_pages' => 'tech-home',
        'tab' => 'branchs-setting',
        'fields' => array(
            array(
                'name' => 'Chi nhánh',
                'id' => 'branchs-item',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => 'Tên chi nhánh',
                        'id' => 'name_branch',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Mô tả chi nhánh',
                        'id'      => 'des_branch',
                        'type'    => 'wysiwyg',
                        'raw'     => false,
                        'options' => [
                            'textarea_rows' => 4,
                            'teeny'         => true,
                        ],
                    ),
                ),
            ),
        ),
    );
    $meta_boxes[] = array(
        'id' => 'partner-all',
        'title' => 'Banners',
        'settings_pages' => 'tech-home',
        'tab' => 'partners-setting',
        'fields' => array(
            array(
                'name' => 'Tiêu đề đối tác',
                'id' => 'title_partner',
                'type' => 'text',
            ),
            array(
                'name' => 'Đối tác',
                'id' => 'partners-item',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => 'Tên đối tác',
                        'id' => 'name_partner',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Hình ảnh đối tác',
                        'id' => 'partner_img_desktop',
                        'type' => 'image_advanced',
                        'max_file_uploads' => 1,
                        'class' => 'hc-normal',
                        'image_size' => '',
                    ),
                    array(
                        'name' => 'Link',
                        'id' => 'partner_link',
                        'type' => 'text',
                        'size' => 100,
                    ),
                ),
            ),
        ),
    );
    $meta_boxes[] = array(
        'id' => 'starts-all',
        'title' => 'Banners',
        'settings_pages' => 'tech-home',
        'tab' => 'starts-setting',
        'fields' => array(
            array(
                'name' => 'Banner khởi động',
                'id' => 'start_img_desktop',
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => '',
            ),
            array(
                'name' => 'Các bước khởi động',
                'id' => 'steps-item',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => 'Bước khởi động',
                        'id' => 'name_step',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Hình ảnh Icon',
                        'id' => 'step_icon_desktop',
                        'type' => 'image_advanced',
                        'max_file_uploads' => 1,
                        'class' => 'hc-normal',
                        'image_size' => '',
                    ),
                    array(
                        'name' => 'Hình ảnh chính',
                        'id' => 'step_img_desktop',
                        'type' => 'image_advanced',
                        'max_file_uploads' => 1,
                        'class' => 'hc-normal',
                        'image_size' => '',
                    ),
                    array(
                        'name' => 'Mô tả ngắn',
                        'id' => 'step_short_desc',
                        'type' => 'textarea',
                        'size' => 100,
                    ),
                    array(
                        'name' => 'Mô tả đầy đủ',
                        'id' => 'step_full_desc',
                        'type' => 'textarea',
                        'size' => 100,
                    ),
                ),
            ),
        ),
    );

    $meta_boxes[] = array(
        'id' => 'teachers-all',
        'title' => 'Banners',
        'settings_pages' => 'tech-home',
        'tab' => 'teachers-setting',
        'fields' => array(
            array(
                'name' => 'Tiêu đề 1',
                'id' => 'title_teacher_1',
                'type' => 'text',
            ),
            array(
                'name' => 'Tiêu đề 2',
                'id' => 'title_teacher_2',
                'type' => 'text',
            ),
            array(
                'name' => 'Mô tả',
                'id' => 'desc_teacher',
                'type' => 'textarea',
            ),
            array(
                'name' => 'Đội ngũ giảng viên',
                'id' => 'teachers-item',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => 'Tên giảng viên',
                        'id' => 'name_teacher',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Chức vụ',
                        'id' => 'pos_teacher',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Hình ảnh',
                        'id' => 'teacher_icon_desktop',
                        'type' => 'image_advanced',
                        'max_file_uploads' => 1,
                        'class' => 'hc-normal',
                        'image_size' => '',
                    ),
                    array(
                        'name' => 'Thông tin giảng viên',
                        'id'      => 'desc_teacher',
                        'type'    => 'wysiwyg',
                        'raw'     => false,
                        'options' => [
                            'textarea_rows' => 4,
                            'teeny'         => true,
                        ],
                    ),
                ),
            ),
        ),
    );

    $meta_boxes[] = array(
        'id' => 'sale-all',
        'title' => 'Thông tin khuyến mãi',
        'settings_pages' => 'tech-home',
        'tab' => 'sale-setting',
        'fields' => array(
            array(
                'name' => 'Ảnh nền',
                'id' => 'bg_sale_img_desktop',
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => '',
            ),
            array(
                'name' => 'Tiêu đề ưu đãi 1',
                'id'      => 'title_sale_1',
                'type'    => 'text',
            ),
            array(
                'name' => 'Tiêu đề ưu đãi 2',
                'id'      => 'title_sale_2',
                'type'    => 'text',
            ),
            array(
                'name' => 'Mô tả ưu đãi',
                'id'      => 'desc_sale',
                'type'    => 'textarea',
            ),
            array(
                'name' => 'Học phí',
                'id'      => 'price_sale',
                'type'    => 'text',
            ),
        ),
    );
    $meta_boxes[] = array(
        'id' => 'videos-all',
        'title' => 'Video',
        'settings_pages' => 'tech-home',
        'tab' => 'videos-setting',
        'fields' => array(
            array(
                'name' => 'Ảnh',
                'id' => 'banner_video',
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => '',
            ),
            array(
                'name' => 'Danh sách video',
                'id' => 'videos-item',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => 'Tên video',
                        'id' => 'name_video',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Video',
                        'id' => 'link_video',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Ảnh',
                        'id' => 'img_video',
                        'type' => 'image_advanced',
                        'max_file_uploads' => 1,
                        'class' => 'hc-normal',
                        'image_size' => '',
                    ),
                ),
            ),
        ),
    );
    $meta_boxes[] = array(
        'id' => 'feels-all',
        'title' => 'Video',
        'settings_pages' => 'tech-home',
        'tab' => 'feels-setting',
        'fields' => array(
            array(
                'name' => 'Cảm nhận học viên',
                'id' => 'feels-item',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => 'Tên học viên',
                        'id' => 'name_student',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Cảm nhận',
                        'id' => 'short_student',
                        'type' => 'textarea',
                    ),
                    array(
                        'name' => 'Điểm số',
                        'id' => 'point_student',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Ảnh',
                        'id' => 'img_student',
                        'type' => 'image_advanced',
                        'max_file_uploads' => 1,
                        'class' => 'hc-normal',
                        'image_size' => '',
                    ),
                ),
            ),
        ),
    );
    $meta_boxes[] = array(
        'id' => 'questions-all',
        'title' => 'Câu hỏi thường gặp',
        'settings_pages' => 'tech-home',
        'tab' => 'questions-setting',
        'fields' => array(
            array(
                'name' => 'Tiêu đề câu hỏi thường gặp',
                'id' => 'title_faq',
                'type' => 'text',
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => '',
            ),
            array(
                'name' => 'Danh sách câu hỏi',
                'id' => 'faqs-item',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => 'Tên câu hỏi',
                        'id' => 'name_question',
                        'type' => 'text',
                        'max_file_uploads' => 1,
                        'class' => 'hc-normal',
                        'image_size' => '',
                    ),
                    array(
                        'name' => 'Nội dung câu hỏi',
                        'id'      => 'des_question',
                        'type'    => 'wysiwyg',
                        'raw'     => false,
                        'options' => [
                            'textarea_rows' => 4,
                            'teeny'         => true,
                        ],
                    ),
                ),
            ),
        ),
    );
    $meta_boxes[] = array(
        'id' => 'form-all',
        'title' => 'Banners',
        'settings_pages' => 'tech-home',
        'tab' => 'form-setting',
        'fields' => array(
            array(
                'name' => 'Ảnh nền',
                'id' => 'bg_form_img_desktop',
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => '',
            ),
            array(
                'name' => 'Ảnh',
                'id' => 'form_img_desktop',
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => '',
            ),
            array(
                'name' => 'Tiêu đề ưu đãi liên hệ',
                'id'      => 'title_contact',
                'type'    => 'text',
            ),
            array(
                'name' => 'Nội dung ưu đãi liên hệ',
                'id'      => 'des_contact',
                'type'    => 'wysiwyg',
                'raw'     => false,
                'options' => [
                    'textarea_rows' => 4,
                    'teeny'         => true,
                ],
            ),
            array(
                'name' => 'Ưu đãi liên hệ',
                'id' => 'forms-item',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => 'Ưu đãi',
                        'id' => 'name_coupon',
                        'type' => 'text',
                    ),
                ),
            ),
        ),
    );
    $meta_boxes[] = array(
        'id' => 'whys-all',
        'title' => 'Tại sao chọn chúng tôi',
        'settings_pages' => 'tech-home',
        'tab' => 'whys-setting',
        'fields' => array(
            array(
                'name' => 'Banner tại sao chọn chúng tôi',
                'id' => 'why_img_desktop',
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => '',
            ),
            array(
                'name' => 'Tại sao chọn chúng tôi',
                'id' => 'whys-item',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => 'Số',
                        'id' => 'name_why',
                        'type' => 'text',
                        'max_file_uploads' => 1,
                        'class' => 'hc-normal',
                        'image_size' => '',
                    ),
                    array(
                        'name' => 'Mô tả ngắn',
                        'id' => 'why_short_desc',
                        'type' => 'textarea',
                        'size' => 100,
                    ),
                    array(
                        'name' => 'Hình ảnh chính',
                        'id' => 'why_img_desktop',
                        'type' => 'image_advanced',
                        'max_file_uploads' => 1,
                        'class' => 'hc-normal',
                        'image_size' => '',
                    ),
                    array(
                        'name' => 'Hình ảnh video',
                        'id' => 'why_video_desktop',
                        'type' => 'image_advanced',
                        'max_file_uploads' => 1,
                        'class' => 'hc-normal',
                        'image_size' => '',
                    ),
                    array(
                        'name' => 'Video',
                        'id' => 'why_detail_video',
                        'type' => 'text',
                        'size' => 100,
                    ),
                    array(
                        'name' => 'Nội dung',
                        'id' => 'whys-item-detail',
                        'type' => 'group',
                        'clone' => true,
                        'sort_clone' => true,
                        'fields' => array(
                            array(
                                'name' => 'Mô tả',
                                'id' => 'why_detail_short_desc',
                                'type' => 'textarea',
                                'size' => 100,
                            ),
                            array(
                                'name' => 'Icon',
                                'id' => 'why_icon_desktop',
                                'type' => 'image_advanced',
                                'max_file_uploads' => 1,
                                'class' => 'hc-normal',
                                'image_size' => '',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    );
    return $meta_boxes;
}
