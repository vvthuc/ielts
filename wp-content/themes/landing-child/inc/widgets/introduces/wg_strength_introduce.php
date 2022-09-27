<?php

class Wg_Strength_Introduce extends WP_Widget
{

    // <!-- Phần thể mạnh -->

    function __construct()
    {

        parent::__construct(

            'Wg_Strength_Introduce',

            'Giới thiệu - Thế mạnh',

            array(

                'description' => 'Thế mạnh'

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

        <?php

        $list_value_Strength = get_mb_option('list_strength_begin');

        if (is_array($list_value_Strength) && count($list_value_Strength) > 0) :

        ?>


            <!-- html -->


            <section class="section-all section-strength py-lg-80 section-bg position-relative overflow-hidden">
                <ul class="bg-bubbles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>

                </ul>
                <div class="container">
                    <p class="subtitle-all text-center text-uppercase fz-12 mb-2 text-white wow fadeInUp" data-wow-delay="0.25s">
                        <span class="text"><?php echo $title ?? ''; ?></span>
                    </p>
                    <div class="title-big__all f-bold cl-white fz-26 text-center mb-4 mb-lg-5 wow fadeInUp" data-wow-delay="0.35s"><?php echo wpautop($content ?? ''); ?></div>
                    <div class="row gx-2 gx-sm-4">

                        <?php $i = 1; ?>

                        <?php foreach ($list_value_Strength as $item) : ?>

                            <div class="col-6 col-md-3 mb-4 md-md-0 wow fadeInUp" data-wow-delay="<?php echo $i * 0.25 ?>s">
                                <div class="item-strength text-center">
                                    <span class="icon d-block mb-2 mb-lg-3">
                                        <?php $imgs = _cget('img_strength', $item, []); ?>
                                        <?php if (count($imgs) > 0) : ?>
                                            <?php foreach ($imgs as $k => $itemImg) : ?>
                                                <img src="<?php echo wp_get_attachment_image_url($itemImg, 'full'); ?>" alt="<?php echo _cget('name', $item); ?>">
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </span>
                                    <p class="title-big__all f-bold cl-white fz-24 text-uppercase mb-1"><?php echo _cget('title', $item); ?></p>
                                    <p class="desc cl-white"><?php echo _cget('text', $item); ?></p>
                                </div>
                            </div>
                            <?php $i++; ?>

                        <?php endforeach; ?>

                    </div>
                </div>
            </section>


        <?php

        endif;

        ?>

<?php

        echo $after_widget;
    }
}
