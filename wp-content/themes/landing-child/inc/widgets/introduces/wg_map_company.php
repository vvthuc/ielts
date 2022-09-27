<?php

class Wg_Map_Company extends WP_Widget
{

    // <!-- Phần thể mạnh -->

    function __construct()
    {

        parent::__construct(

            'Wg_Map_Company',

            'Giới thiệu - Sơ đồ tổ chức',

            array(

                'description' => 'Sơ đồ tổ chức'

            )

        );
    }

    function form($instance)
    {

        $default = array(

            'title' => '',

            'content' => '',

            'image' => ''

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

        echo "<p>Hình Ảnh (1200 x 600):</p>";

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



        <section class="section-all section-map-company py-lg-80 section-bg position-relative overflow-hidden">
            <div class="container">
                <p class="subtitle-all text-center text-uppercase fz-12 mb-2 wow fadeInUp" data-wow-delay="0.25s">
                    <span class="text"><?php echo $title ?? ''; ?></span>
                </p>
                <div class="title-big__all f-bold cl-white fz-26 text-center mb-4 mb-lg-5 wow fadeInUp" data-wow-delay="0.35s"><?php echo wpautop($content ?? ''); ?></div>
                <div class="img">
                    <img src="<?php echo $imageurl ?? ''; ?>" alt="" class="img-fluid">
                </div>
            </div>
        </section>



<?php

        echo $after_widget;
    }
}
