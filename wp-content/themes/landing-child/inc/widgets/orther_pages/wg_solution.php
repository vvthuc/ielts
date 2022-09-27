<?php
class Wg_Solution extends WP_Widget
{
    /**
     * Thiết lập widget: đặt tên, base ID
     */
    function __construct()
    {
        parent::__construct(
            'Wg_Solution',
            'Giải pháp - Block Giải pháp',
            array(
                'description' => 'Block Giải pháp'
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
        $title = esc_attr($instance['title']);
        $image = esc_attr($instance['image']);
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
        echo "<p>Hình Ảnh:</p>";
        echo "<div class='h_cover_image'><img src='" . $imageurl . "'/>";
        echo "<input type='hidden' name = '" . $this->get_field_name('image') . "' value='" . $image . "'/>";
        echo "<button type='button' class='h_upload_image_button button'>Chọn ảnh</button>";
        echo "<button type='button' class='h_remove_image_button button'>Xóa ảnh</button>";
        echo "</div>";
        echo "<p>Tiêu đề:</p>";
        echo "<input style='width:100%' name = '" . $this->get_field_name('title') . "' value = '" . $title . "'/>";
        echo "<p>Mô tả:</p>";
        echo wp_editor($content, $editor_id, $settings);
    }
    function update($new_instance, $old_instance)
    {
        parent::update($new_instance, $old_instance);
        $instance = $old_instance;
        $instance['image'] = $new_instance['image'];
        $instance['title'] = $new_instance['title'];
        $instance['content'] = $new_instance['content'];
        return $instance;
    }
    function widget($args, $instance)
    {
        extract($args);
        $title = $instance['title'];
        $content = $instance['content'];
        $image = $instance['image'];
        $imageurl = get_template_directory_uri() . "/admin/no-image.svg";
        if (((int)$image) > 0) {
            $arr = wp_get_attachment_image_src($image, 'full');
            if (count($arr) > 0) {
                $imageurl = $arr[0];
            }
        }
?>
        <section class="solution_page mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-5">
                        <div class="img wow fadeInUp" data-wow-delay="0.25s">
                            <img src="<?php echo $imageurl ?? ''; ?>" class="img-fluid" alt="" title="">
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-7 mb-4">
                        <div class="text wow fadeInUp" data-wow-delay="0.35s">
                            <h3 class="title"><?php echo $title ?? ''; ?></h3>
                            <div class="s-content">
                                <?php echo wpautop($content ?? ''); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 mb-4">
                        <?php $lang = pll_current_language();  ?>
                        <?php echo do_shortcode('[cf7form cf7key="form_solution_' . $lang . '" title="Liên hệ nhanh" html_class="form-contact__pages wow fadeInUp"]') ?>

                        <div class="dk-form-btns v2 justify-content-center mt-3 wow fadeInUp" data-wow-delay="0.25s">
                            <a class="smooth dk-form-hotline" href="tel:<?php mb_option('phone_number'); ?>" title="" rel="nofollow,noindex">
                                <i class="fa fa-phone"></i>
                                <span>Hotline</span>
                                <strong><?php mb_option('phone_number'); ?></strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
        echo $after_widget;
    }
}
