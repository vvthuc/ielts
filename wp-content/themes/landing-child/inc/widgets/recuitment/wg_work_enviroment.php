<?php

class Wg_Work_Enviroment extends WP_Widget
{

    /**

     * Thiết lập widget: đặt tên, base ID

     */

    function __construct()
    {

        parent::__construct(

            'Wg_Work_Enviroment',

            'Tuyển dụng - Block Môi tường làm việc',

            array(

                'description' => 'Block Môi tường làm việc'

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

        );

        $instance = wp_parse_args((array) $instance, $default);

        $litle_title = esc_attr($instance['litle_title']);

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

        echo "<p>Tiêu đề nhỏ:</p>";

        echo "<input style='width:100%' name = '" . $this->get_field_name('litle_title') . "' value = '" . $litle_title . "'/>";

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

        $instance['litle_title'] = $new_instance['litle_title'];

        $instance['title'] = $new_instance['title'];

        $instance['content'] = $new_instance['content'];

        return $instance;
    }

    function widget($args, $instance)
    {

        extract($args);

        $litle_title = $instance['litle_title'];

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
        <section class="py-4 work-environment">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center wow fadeInLeft" data-wow-delay="0.5s">
                        <div class="module-work__environment">
                            <p class="subtitle-all left-hidden text-uppercase fz-12 mb-2">
                                <span class="text"><?php echo $litle_title ?? ''; ?></span>
                            </p>
                            <div class="title-big__all f-bold cl-title fz-26 mb-3"><?php echo wpautop($title ?? ''); ?></div>
                            <div class="s-content">
                                <?php echo wpautop($content ?? ''); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-3 mt-lg-0 wow fadeInRight" data-wow-delay="0.6s">
                        <div class="image text-center">
                            <img src="<?php echo $imageurl ?? ''; ?>" alt="<?php echo $title ?? ''; ?>" title="<?php echo $title ?? ''; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php

        echo $after_widget;
    }
}
