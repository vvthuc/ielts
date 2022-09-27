<?php
add_filter('rwmb_meta_boxes', 'tech5s_options_meta_boxes_config_slide');
function tech5s_options_meta_boxes_config_slide($meta_boxes)
{
    $meta_boxes[] = array(
        'id' => 'general',
        'title' => 'Cấu hình chung',
        'settings_pages' => 'my-options',
        'tab' => 'base-setting',
        'fields' => array(
            array(
                'name' => 'Logo (152 x 40)',
                'id' => 'logo',
                'type' => "image_advanced",
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => ''
            ),
            array(
                'name' => 'Logo_footer (260 x 77)',
                'id' => 'logo_footer',
                'type' => "image_advanced",
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => ''
            ),
            array(
                'name' => 'Favicon',
                'id' => 'favicon',
                'type' => "image_advanced",
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => ''
            ),
            array(
                'name' => 'Thêm script vào header',
                'id' => 'script_header',
                'sanitize_callback' => 'none',
                'type' => 'textarea',
                'size' => 200
            ),
            array(
                'name' => 'Thêm script vào footer',
                'id' => 'script_footer',
                'sanitize_callback' => 'none',
                'type' => 'textarea',
                'size' => 200
            ),
            array(
                'name' => 'Tên công ty_vi',
                'id' => 'company_name_vi',
                'type' => 'text',
                'size' => 100
            ),
            array(
                'name' => 'Tên công ty_en',
                'id' => 'company_name_en',
                'type' => 'text',
                'size' => 100
            ),
            array(
                'name' => 'Hotline',
                'id' => 'phone_number',
                'type' => 'text',
                'size' => 100
            ),
            array(
                'name' => 'Email (vi)',
                'id' => 'email_vi',
                'type' => 'text',
                'size' => 100
            ),
            array(
                'name' => 'Email (en)',
                'id' => 'email_en',
                'type' => 'text',
                'size' => 100
            ),
            array(
                'name' => 'Link website (vi)',
                'id' => 'website_vi',
                'type' => 'text',
                'size' => 100
            ),
            array(
                'name' => 'Link website (en)',
                'id' => 'website_en',
                'type' => 'text',
                'size' => 100
            ),
            array(
                'name' => 'Link tải android',
                'id' => 'android_download',
                'type' => 'text',
            ),
            array(
                'name' => 'Link tải IOS',
                'id' => 'ios_download',
                'type' => 'text',
            ),
            array(
                'name' => 'Link bộ công thương',
                'id' => 'bct_link',
                'type' => 'text',
            ),
            array(
                'name' => 'Địa chỉ_vi',
                'id' => 'address_vi',
                'type' => 'textarea',
                'size' => 200
            ),
            array(
                'name' => 'Địa chỉ_en',
                'id' => 'address_en',
                'type' => 'textarea',
                'size' => 200
            ),
            array(
                'name' => 'Copyright_vi',
                'id' => 'copy_right_vi',
                'type' => 'textarea',
                'size' => 500
            ),
            array(
                'name' => 'Copyright_en',
                'id' => 'copy_right_en',
                'type' => 'textarea',
                'size' => 500
            ),
        )
    );

    $meta_boxes[] = array(
        'id' => 'content_solution',
        'title' => 'Nội dung giải pháp',
        'settings_pages' => 'my-options',
        'tab' => 'list-content-setting',
        'fields' => array(
            array(
                'name' => 'Đặc điểm giải pháp (VI)',
                'id' => 'specs_solution_vi',
                'type' => 'wysiwyg',
                'options' => array(
                    'media_buttons' => true,
                    'textarea_rows' => 5,
                    'teeny' => false,
                ),
            ),
            array(
                'name' => 'Đặc điểm giải pháp (EN)',
                'id' => 'specs_solution_en',
                'type' => 'wysiwyg',
                'options' => array(
                    'media_buttons' => true,
                    'textarea_rows' => 5,
                    'teeny' => false,
                ),
            ),
            array(
                'name' => 'Lợi ích giải pháp (VI)',
                'id' => 'benefit_solution_vi',
                'type' => 'wysiwyg',
                'options' => array(
                    'media_buttons' => true,
                    'textarea_rows' => 5,
                    'teeny' => false,
                ),
            ),
            array(
                'name' => 'Lợi ích giải pháp (EN)',
                'id' => 'benefit_solution_en',
                'type' => 'wysiwyg',
                'options' => array(
                    'media_buttons' => true,
                    'textarea_rows' => 5,
                    'teeny' => false,
                ),
            ),
        )
    );

    $meta_boxes[] = array(
        'id' => 'social',
        'title' => 'Mạng xã hội',
        'settings_pages' => 'my-options',
        'tab' => 'social-setting',
        'fields' => array(
            array(
                'name' => 'Facebook',
                'id' => 'social_facebook',
                'type' => 'text',
                'size' => 100
            ),
            array(
                'name' => 'Linkedin',
                'id' => 'social_linkedin',
                'type' => 'text',
                'size' => 100
            ),
            array(
                'name' => 'Twitter',
                'id' => 'social_twitter',
                'type' => 'text',
                'size' => 100
            ),
            array(
                'name' => 'Youtube',
                'id' => 'social_youtube',
                'type' => 'text',
                'size' => 100
            ),
            array(
                'name' => 'Instagram',
                'id' => 'social_instagram',
                'type' => 'text',
                'size' => 100
            ),
            array(
                'name' => 'Messenger',
                'id' => 'social_mess',
                'type' => 'text',
                'size' => 100
            ),
            array(
                'name' => 'Zalo',
                'id' => 'social_zalo',
                'type' => 'text',
                'size' => 100
            ),
        )
    );

    $meta_boxes[] = array(
        'id' => 'banner',
        'title' => 'Hình ảnh',
        'settings_pages' => 'my-options',
        'tab' => 'banner-setting',
        'fields' => array(
            array(
                'name' => 'Ảnh nền footer',
                'id' => 'image_background_footer',
                'type' => "image_advanced",
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => ''
            ),
            array(
                'name' => 'Tiêu đề banner dịch vụ (vi)',
                'id' => 'banner_giai_phap_title_vi',
                'type' => 'text',
            ),
            array(
                'name' => 'Tiêu đề banner dịch vụ (en)',
                'id' => 'banner_giai_phap_title_en',
                'type' => 'text',
            ),
            array(
                'name' => 'Banner dịch vụ',
                'id' => 'banner_solution',
                'type' => "image_advanced",
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => ''
            ),
            array(
                'name' => 'Tiêu đề banner sản phẩm (vi)',
                'id' => 'banner_san_pham_title_vi',
                'type' => 'text',
            ),
            array(
                'name' => 'Tiêu đề banner sản phẩm (en)',
                'id' => 'banner_san_pham_title_en',
                'type' => 'text',
            ),
            array(
                'name' => 'Banner sản phẩm',
                'id' => 'banner_product',
                'type' => "image_advanced",
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => ''
            ),
            array(
                'name' => 'Banner chi tiết sản phẩm',
                'id' => 'banner_detail_product',
                'type' => "image_advanced",
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => ''
            ),
            array(
                'name' => 'Tiêu đề banner sự kiện (vi)',
                'id' => 'banner_su_kien_title_vi',
                'type' => 'text',
            ),
            array(
                'name' => 'Tiêu đề banner sự kiện (en)',
                'id' => 'banner_su_kien_title_en',
                'type' => 'text',
            ),
            array(
                'name' => 'Banner sự kiện',
                'id' => 'banner_event',
                'type' => "image_advanced",
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => ''
            ),
            array(
                'name' => 'Tiêu đề banner tin tức (vi)',
                'id' => 'banner_tin_tuc_title_vi',
                'type' => 'text',
            ),
            array(
                'name' => 'Tiêu đề banner tin tức (en)',
                'id' => 'banner_tin_tuc_title_en',
                'type' => 'text',
            ),
            array(
                'name' => 'Banner tin tức',
                'id' => 'banner_news',
                'type' => "image_advanced",
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => ''
            ),
            array(
                'name' => 'Tiêu đề banner liên hệ (vi)',
                'id' => 'banner_lien_he_title_vi',
                'type' => 'text',
            ),
            array(
                'name' => 'Tiêu đề banner liên hệ (en)',
                'id' => 'banner_lien_he_title_en',
                'type' => 'text',
            ),
            array(
                'name' => 'Banner liên hệ',
                'id' => 'banner_contact',
                'type' => "image_advanced",
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => ''
            ),
            array(
                'name' => 'Tiêu đề banner tuyển dụng (vi)',
                'id' => 'banner_tuyen_dung_title_vi',
                'type' => 'text',
            ),
            array(
                'name' => 'Tiêu đề tuyển dụng (en)',
                'id' => 'banner_tuyen_dung_title_en',
                'type' => 'text',
            ),
            array(
                'name' => 'Banner Tuyển dụng',
                'id' => 'banner_recruitment',
                'type' => "image_advanced",
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => ''
            ),

            array(
                'name' => 'Tiêu đề banner tag (vi)',
                'id' => 'banner_tag_title_vi',
                'type' => 'text',
            ),
            array(
                'name' => 'Tiêu đề tag (en)',
                'id' => 'banner_tag_title_en',
                'type' => 'text',
            ),
            array(
                'name' => 'Banner tag',
                'id' => 'banner_tag',
                'type' => "image_advanced",
                'max_file_uploads' => 1,
                'class' => 'hc-normal',
                'image_size' => ''
            ),
        )
    );

    $meta_boxes[] = array(
        'id' => 'text',
        'title' => 'Thông tin hệ thống chi nhanh',
        'settings_pages' => 'my-options',
        'tab' => 'list-branch-setting',
        'fields' => array(
            array(
                'name' => 'Thông tin của hệ thống chi nhánh',
                'id' => 'list-branch-item',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => 'Icon (50 x 44)',
                        'id' => 'icon_branch',
                        'type' => "image_advanced",
                        'max_file_uploads' => 1,
                        'class' => 'hc-normal',
                        'image_size' => ''
                    ),
                    array(
                        'name' => 'Con số đạt được',
                        'id' => 'number',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Nội dung (vi)',
                        'id' => 'content_vi',
                        'type' => 'textarea',
                    ),
                    array(
                        'name' => 'Nội dung (en)',
                        'id' => 'content_en',
                        'type' => 'textarea',
                    ),
                )
            )
        )
    );

    $meta_boxes[] = array(
        'id' => 'news_title_page',
        'title' => 'Thông tin danh mục tin tức',
        'settings_pages' => 'my-options',
        'tab' => 'list-news-title-setting',
        'fields' => array(
            array(
                'name' => 'Danh mục tin (vi)',
                'id' => 'tin_title_vi',
                'type' => 'text',
            ),
            array(
                'name' => 'Danh mục tin (en)',
                'id' => 'tin_title_en',
                'type' => 'text',
            ),
            array(
                'name' => 'Danh mục sự kiện (vi)',
                'id' => 'tin_su_kien_title_vi',
                'type' => 'text',
            ),
            array(
                'name' => 'Danh mục sự kiện (en)',
                'id' => 'tin_su_kien_title_en',
                'type' => 'text',
            ),
            array(
                'name' => 'Danh mục tin tuyển dụng (vi)',
                'id' => 'tin_tuyen_dung_title_vi',
                'type' => 'text',
            ),
            array(
                'name' => 'Danh mục tin tuyển dụng (en)',
                'id' => 'tin_tuyen_dung_title_en',
                'type' => 'text',
            ),
        )
    );

    $meta_boxes[] = array(
        'id' => 'title_page',
        'title' => 'Thông tin Tiêu đề các trang',
        'settings_pages' => 'my-options',
        'tab' => 'list-title-setting',
        'fields' => array(
            array(
                'name' => 'Tiêu đề giải pháp (vi)',
                'id' => 'giai_phap_title_vi',
                'type' => 'text',
            ),
            array(
                'name' => 'Tiêu đề giải pháp (en)',
                'id' => 'giai_phap_title_en',
                'type' => 'text',
            ),
            array(
                'name' => 'Mô tả giải pháp (vi)',
                'id' => 'giai_phap_text_vi',
                'type' => 'wysiwyg',
                'options' => array(
                    'media_buttons' => true,
                    'textarea_rows' => 5,
                    'teeny' => false,
                ),
            ),
            array(
                'name' => 'Mô tả giải pháp (en)',
                'id' => 'giai_phap_text_en',
                'type' => 'wysiwyg',
                'options' => array(
                    'media_buttons' => true,
                    'textarea_rows' => 5,
                    'teeny' => false,
                ),
            ),
            array(
                'name' => 'Tiêu đề dịch vụ (vi)',
                'id' => 'dich_vu_title_vi',
                'type' => 'text',
            ),
            array(
                'name' => 'Tiêu đề dịch vụ (en)',
                'id' => 'dich_vu_title_en',
                'type' => 'text',
            ),
            array(
                'name' => 'Mô tả dịch vụ (vi)',
                'id' => 'dich_vu_text_vi',
                'type' => 'wysiwyg',
                'options' => array(
                    'media_buttons' => true,
                    'textarea_rows' => 5,
                    'teeny' => false,
                ),
            ),
            array(
                'name' => 'Mô tả dịch vụ (en)',
                'id' => 'dich_vu_text_en',
                'type' => 'wysiwyg',
                'options' => array(
                    'media_buttons' => true,
                    'textarea_rows' => 5,
                    'teeny' => false,
                ),
            ),
            array(
                'name' => 'Tiêu đề sự kiện (vi)',
                'id' => 'su_kien_title_vi',
                'type' => 'text',
            ),
            array(
                'name' => 'Tiêu đề sự kiện (en)',
                'id' => 'su_kien_title_en',
                'type' => 'text',
            ),
            array(
                'name' => 'Mô tả sự kiện (vi)',
                'id' => 'su_kien_text_vi',
                'type' => 'wysiwyg',
                'options' => array(
                    'media_buttons' => true,
                    'textarea_rows' => 5,
                    'teeny' => false,
                ),
            ),
            array(
                'name' => 'Mô tả sự kiện (en)',
                'id' => 'su_kien_text_en',
                'type' => 'wysiwyg',
                'options' => array(
                    'media_buttons' => true,
                    'textarea_rows' => 5,
                    'teeny' => false,
                ),
            ),
        )
    );
    return $meta_boxes;
}
