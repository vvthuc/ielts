<?php

require_once('config_main.php');

require_once('config_slide.php');

require_once('introduces/config.php');

require_once('config_recruitment.php');

add_filter('mb_settings_pages', 'tech5s_settings_pages');

function tech5s_settings_pages($settings_pages) 

{

    $settings_pages[] = array(

        'id' => 'my-options',

        'menu_title' => 'Cấu hình chung',

        'option_name' => 'my_options',

        'icon_url' => 'dashicons-images-alt',

        'tabs' => array(

            'base-setting' => 'Cấu hình chung',

            'banner-setting' => 'Banner & Ảnh nền',

            'list-branch-setting' => 'Hệ thống chi nhánh',

            'social-setting' => 'Mạng xã hội',

            'list-news-title-setting' => 'Thông tin danh mục tin tức',

            'list-title-setting' => 'Tiêu đề các trang',

            'list-content-setting' => 'Nội dung giải pháp',

        ),

        'submenu_title' => 'Cấu hình'

    );

    

    $settings_pages[] = array(

        'id' => 'tech5s-slider',

        'option_name' => 'my_options',

        'menu_title' => 'Slider',

        'parent' => 'my-options',

        'tabs' => array(

            'Slide-banner' => 'Silder trang trủ',

            'achievement-setting' => 'Thành tựu',

        ),

        'submenu_title' => 'Slider'

    );



    $settings_pages[] = array(

        'id' => 'tech5s-introduce',

        'option_name' => 'my_options',

        'menu_title' => 'Giới thiệu',

        'parent' => 'my-options',

        'tabs' => array(

            'history-begin-setting' => 'Lịch sử hình thành',

            'introduce-certificate' => 'Giải thưởng',

            'introduce-mission' => 'Tầm nhìn xứ mệnh',

            'introduce-strength' => 'Thế mạnh',



        ),

        'submenu_title' => 'Giới thiệu'

    );



    $settings_pages[] = array(

        'id' => 'tech5s-recruitment',

        'option_name' => 'my_options',

        'menu_title' => 'Tuyển dụng',

        'parent' => 'my-options',

        'tabs' => array(

            'the-treatment' => 'Các đãi ngộ',

            'companys-face' => 'Hình ảnh công ty',

            'policy-company' => 'Chính sách công ty',

            'title-page' => 'Tiêu đề trang',

        ),

        'submenu_title' => 'Tuyển dụng'

    );

    

    return $settings_pages;

}

