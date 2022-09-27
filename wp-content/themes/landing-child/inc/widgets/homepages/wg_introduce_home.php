<?php
class Wg_Introduce_Home extends WP_Widget
{
    /**
     * Thiết lập widget: đặt tên, base ID
     */
    function __construct()
    {
        parent::__construct(
            'Wg_Introduce_Home',
            'Trang chủ - Block About Us',
            array(
                'description' => 'Block About Us'
            )
        );
    }
    function form($instance)
    {
        $default = array(
            'litle_title' => '',
            'title' => '',
            'content' => '',
            'image' => '',
            'link' => ''
        );
        $instance = wp_parse_args((array) $instance, $default);
        $litle_title = esc_attr($instance['litle_title']);
        $title = esc_attr($instance['title']);
        $image = esc_attr($instance['image']);
        $link = esc_attr($instance['link']);
        $imageurl = "";
        if (((int)$image) > 0) {
            $arr = wp_get_attachment_image_src($image, 'full');
            if (count($arr) > 0) {
                $imageurl = $arr[0];
            }
        }
        $content = $instance['content'];
        $rand    = rand(0, 99999999999);
        $ed_id   = $this->get_field_id('wp_editor_' . $rand);
        $ed_name = $this->get_field_name('content');
        $content   = $content;
        $editor_id = $ed_id;
        $settings = array('media_buttons' => true, 'textarea_rows' => 4, 'textarea_name' => $ed_name, 'teeny' => true);
        echo "<p>Hình Ảnh (561 x 378):</p>";
        echo "<div class='h_cover_image'><img src='" . $imageurl . "'/>";
        echo "<input type='hidden' name = '" . $this->get_field_name('image') . "' value='" . $image . "'/>";
        echo "<button type='button' class='h_upload_image_button button'>Chọn ảnh</button>";
        echo "<button type='button' class='h_remove_image_button button'>Xóa ảnh</button>";
        echo "</div>";
        echo "<p>Tiêu đề nhỏ:</p>";
        echo "<input style='width:100%' name = '" . $this->get_field_name('litle_title') . "' value = '" . $litle_title . "'/>";
        echo "<p>Tiêu đề:</p>";
        echo "<input style='width:100%' name = '" . $this->get_field_name('title') . "' value = '" . $title . "'/>";
        echo "<p>Mô tả:</p>";
        echo wp_editor($content, $editor_id, $settings);
        echo "<p>Link bài viết:</p>";
        echo "<input style='width:100%' name = '" . $this->get_field_name('link') . "' value = '" . $link . "'/>";
    }
    function update($new_instance, $old_instance)
    {
        parent::update($new_instance, $old_instance);
        $instance = $old_instance;
        $instance['image'] = $new_instance['image'];
        $instance['litle_title'] = $new_instance['litle_title'];
        $instance['title'] = $new_instance['title'];
        $instance['content'] = $new_instance['content'];
        $instance['link'] = $new_instance['link'];
        return $instance;
    }
    function widget($args, $instance)
    {
        extract($args);
        $litle_title = $instance['litle_title'];
        $title = $instance['title'];
        $content = $instance['content'];
        $image = $instance['image'];
        $link = $instance['link'];
        $imageurl = get_template_directory_uri() . "/admin/no-image.svg";
        if (((int)$image) > 0) {
            $arr = wp_get_attachment_image_src($image, 'full');
            if (count($arr) > 0) {
                $imageurl = $arr[0];
            }
        }
?>
        <section class="section-all bg-red__shadow" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/images/cham-bi.jpg) no-repeat right bottom;background-size:contain;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 wow fadeInLeft mb-5 mb-lg-0">
                        <div class="box-main-about position-relative">
                            <img src="<?php echo $imageurl ?? ''; ?>" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center wow fadeInRight">
                        <div class="intro-index__content">
                            <p class="subtitle-all left-hidden text-uppercase fz-12 mb-2">
                                <span class="text"><?php echo $litle_title ?? ''; ?></span>
                            </p>
                            <p class="title-big__all f-bold cl-title mb-3 fz-26"><?php echo $title ?? ''; ?></p>
                            <div class="short_content mb-3 mb-lg-4">
                                <?php echo wpautop($content ?? ''); ?>
                            </div>
                            <a href="<?php echo $link ?? ''; ?>" title="Xem chi tiết" class="btn btn-orange__all btn-hover"><?php pll_e('Xem chi tiết'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
        echo $after_widget;
    }
}
