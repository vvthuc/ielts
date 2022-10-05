<?php

function mb_image($id, $size = -1, $option_name = 'my_options', $limit = 1, $returnArray = false)
{
    echo get_mb_image($id, $size, $option_name, $limit, $returnArray);
}

function get_mb_image($id, $size, $option_name = 'my_options', $limit = 1, $returnArray = false)
{
    if (function_exists('pll_current_language')) {
        $lang = pll_current_language();
        $valueIsLang = rwmb_meta($id . '_' . $lang, array('limit' => $limit, 'object_type' => 'setting'), $option_name);
        if (isset($valueIsLang) && !empty($valueIsLang)) {
            $valueIsLang = @$valueIsLang ? $valueIsLang : [];
            if ($returnArray) return $valueIsLang;
            if (count($valueIsLang) > 0 && is_array($valueIsLang)) {
                return $valueIsLang[0]["full_url"];
            }
        }
        $valueNoLang = rwmb_meta($id, array('object_type' => 'setting'), $option_name);
        if (isset($valueNoLang) && !empty($valueNoLang)) {
            $valueNoLang = @$valueNoLang ? $valueNoLang : [];
            if ($returnArray) return $valueNoLang;
            foreach ($valueNoLang as $item) {
                if ($size != -1 && count($item['sizes']) > 0) {
                    return $item['sizes'][$size] ?? '';
                }
                return $item["full_url"] ?? '';
            }
        }
    }
    $item = rwmb_meta($id, array('limit' => $limit, 'object_type' => 'setting'), $option_name);
    $item = @$item ? $item : [];
    if ($returnArray) return $item;
    if (count($item) > 0 && is_array($item)) {
        return $item[0]["full_url"];
    }
    return get_template_directory_uri() . '/theme/frontend/images/no-image.svg';
}

function get_custom_excerpt($limit = 50)
{
    global $post;
    return empty($post->post_excerpt) ? wlimitExcerpt($post->post_content, $limit) : wlimitExcerpt($post->post_excerpt, $limit);
}

function wlimitExcerpt($str, $n = 50)
{
    return wp_trim_words(strip_tags($str), $n);
}

function mb_option($id, $option_name = 'my_options', $wpautop = false, $def = "")
{
    if ($wpautop) {
        echo wpautop(get_mb_option($id, $def, $option_name));
    } else {
        echo get_mb_option($id, $def, $option_name);
    }
}

function get_mb_option($id, $def = "", $option_name = 'my_options')
{
    if (function_exists('pll_current_language')) {
        $lang = pll_current_language();
        $valueIsLang = rwmb_meta($id . '_' . $lang, array('object_type' => 'setting'), $option_name);
        if (isset($valueIsLang) && !empty($valueIsLang)) {
            return $valueIsLang;
        }
        $valueNoLang = rwmb_meta($id, array('object_type' => 'setting'), $option_name);
        if (isset($valueNoLang) && !empty($valueNoLang)) {
            return $valueNoLang;
        }
    }
    $value = rwmb_meta($id, array('object_type' => 'setting'), $option_name);
    if (isset($value) && !empty($value)) {
        return $value;
    }
    return $def;
}

function _emptyKey($key, $arr)
{
    $c = _cget($key, $arr);
    return empty($c);
}

function _cget($key, $arr, $def = "")
{
    if (function_exists('pll_current_language')) {
        $lang = pll_current_language();
        $key_ = $key . "_" . $lang;
        if (array_key_exists($key_, $arr)) return $arr[$key_];
    }
    if (array_key_exists($key, $arr)) return $arr[$key];
    return $def;
}

function getDefaultImage($class = "", $urlOnly = false)
{
    if ($urlOnly) return get_template_directory_uri() . '/theme/frontend/images/no-image.svg';
    return '<img src="' . get_template_directory_uri() . '/theme/frontend/images/no-image.svg" class="' . $class . '" alt="No image" title="No image">';
}

function the_thumb($thumb, $size = 'small', $class = "", $urlOnly = false)
{
    if (has_post_thumbnail($thumb)) {
        if ($urlOnly) {
            return get_the_post_thumbnail_url($thumb, $size);
        }
        echo get_the_post_thumbnail($thumb, $size, ["class" => 'img-responsive img-fluid smooth ' . $class]);
    } else {
        if ($urlOnly) {
            return getDefaultImage($class, true);
        }
        echo getDefaultImage($class);
    }
}

function getNameMenu($slug)
{
    $loc = get_nav_menu_locations();
    $id = array_key_exists($slug, $loc) ? $loc[$slug] : 0;
    if ($id > 0) {
        return wp_get_nav_menu_object($id)->name;
    }
    return "";
}

function parseYoutubeId($url)
{
    preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
    if (count($matches) > 1) {
        return $matches[1];
    }
    return "";
}
add_filter('rwmb_meta', 'filter_no_image', 100, 4);

function filter_no_image($meta, $key = "", $opts = [], $option_name = null)
{
    $field = rwmb_get_field_settings($key, $opts, $option_name);
    if (isset($field) && is_array($field) && count($field) > 0 && $field['type'] == 'image_advanced') {
        if (count($meta) == 0) {
            return [["full_url" => get_template_directory_uri() . '/admin/no-image.svg', "url" => get_template_directory_uri() . '/admin/no-image.svg']];
        }
    }
    return $meta;
}

function getImageTerm($key = 'term-img', $termId = 0)
{
    $termId = $termId == 0 ? get_queried_object_id() : $termId;
    $imgs = rwmb_meta($key, array('object_type' => 'term', 'limit' => 1), $termId);
    $img = "";
    if (is_array($imgs) && count($imgs) > 0) {
        $img = $imgs[0]['full_url'];
    }
    if ($img == "") {
        $img = get_template_directory_uri() . '/theme/frontend/images/no-image.svg';
    }
    return $img;
}

function getFieldTerm($key = 'term-img', $termId = 0)
{
    $termId = $termId == 0 ? get_queried_object_id() : $termId;
    return rwmb_meta($key, array('object_type' => 'term', 'limit' => 1), $termId);
}

function getAudioPost($soundId)
{
    if ($soundId > 0) {
        return wp_get_attachment_url($soundId);
    }
    return "";
}

function getImageToArray($array, $size)
{
    $sizes = ['medium_large', 'large', 'medium', 'small'];
    $imgSize = isset($array['sizes']) ? $array['sizes'] : [];
    if (isset($imgSize[$size])) {
        return $imgSize[$size]['url'];
    } else {

        if (isset($array['full_url'])) return $array['full_url'];
        foreach ($sizes as $size) {
            if (isset($imgSize[$size])) {
                return $imgSize[$size]['url'];
            }
        }
    }
    return true;
}

function _isMobile()
{
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

function getSrcIframe($iframe)
{
    if ($iframe == '') return '';
    preg_match('/src="([^"]+)"/', $iframe, $arr_match);
    $src_url = $arr_match[1];
    return $src_url;
}

function sb_get_current_url()
{
    if (is_singular()) {
        return get_permalink();
    } else {
        global $wp;
        $current_url = trailingslashit(home_url($wp->request));
        return $current_url;
    }
}

function getTplPageURL($TEMPLATE_NAME)
{
    $url = null;
    $pages = get_pages(array(
        'post_type' => 'page',
        'meta_key'  => '_wp_page_template',
        'meta_value' => 'pages/' . $TEMPLATE_NAME
    ));
    if (isset($pages[0])) {
        $url = get_page_link($pages[0]->ID);
    }
    return $url;
}

function getPriceAndPercen($price = null, $price_sale = null)
{
    $price_old = $price != null ? $price : rwmb_meta('product_price');
    $price = $price_sale != null ? $price_sale : rwmb_meta('product_price_sale');
    $result = [
        'real_price' => 0,
        'price' => 0,
        'percent' => 0,
    ];
    if ($price > 0 && $price_old > 0) {
        if ($price_old > $price) {
            $percent = ($price_old - $price) / $price_old * 100;
            $result = [
                'real_price' => number_format((float)$price, 0, ',', '.') . 'đ',
                'price' =>  number_format((float)$price_old, 0, ',', '.') . 'đ',
                'percent' => round($percent)
            ];
        } else {
            $result = [
                'real_price' => number_format((float)$price) . 'đ',
                'price' => "",
                'percent ' => ""
            ];
        }
    } elseif ($price > 0 && $price_old == 0) {
        $percent = ($price - $price_old) / $price * 100;
        $result = [
            'real_price' => number_format((float)$price) . 'đ',
            'price' => "",
            'percent' => $percent
        ];
    } elseif ($price_old > 0 && $price == 0) {
        $result = [
            'real_price' =>  number_format((float)$price_old) . 'đ',
            'price' => "",
            'percen' => ""
        ];
    } elseif ($price_old == 0 && $price == 0) {
        $result = [
            'real_price' => "Liên hệ",
            'price' => "",
            'percen' => ""
        ];
    }

    return $result;
}

function isLightHouse()
{
    $agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
    preg_match('/Lighthouse/i', $agent, $outs);
    return count($outs) > 0;
}

function printMenuCate($data, $activeId = 0, $parent = 0, $url = '')
{
    echo '<ul>';
    foreach ($data as $k => $item) {
        $active = $activeId == $item->term_id ? 'active active_nav_pcate' : '';
        if ($item->parent == $parent) {
            $str = '<li><a class="' . $active . '" href="' . site_url($url . '/' . $item->slug) . '" title="' . $item->name . '">' . $item->name . '</a>';
            echo $str;
            printMenuCate($data, $activeId, $item->term_id, $url);
            echo '</li>';
        }
    }
    echo '</ul>';
}
