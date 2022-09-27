<?php

class Wg_Mission_Vision_Value_Introduce extends WP_Widget
{

    // <!-- Phần tầm nhìn xứ mệnh giấ trị cốt lõi -->

    function __construct()
    {

        parent::__construct(

            'Wg_Mission_Introduce',

            'Giới thiệu - Tầm nhìn xứ mệnh',

            array(

                'description' => 'Tầm nhìn xứ mệnh'

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

        $list_value_Certification = get_mb_option('list_value_mission_begin');

        if (is_array($list_value_Certification) && count($list_value_Certification) > 0) :

        ?>


            <!-- html -->


            <section class="section-all section-core-value " style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/images/bg-core.jpg) no-repeat center left;background-size:cover;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-3 mb-lg-0">
                            <div class="core-value-content">
                                <p class="subtitle-all left-hidden text-uppercase fz-12 mb-2">
                                    <span class="text"><?php echo $title ?? ''; ?></span>
                                </p>
                                <div class="title-big__all f-bold cl-title fz-26 mb-4">
                                    <?php echo wpautop($content ?? ''); ?>
                                </div>

                                <?php $i = 1; ?>

                                <?php foreach ($list_value_Certification as $item) : ?>

                                    <div class="item-faq wow fadeInUp" data-wow-delay="0.01s" style="visibility: visible; animation-delay: 0.01s; animation-name: fadeInUp;">
                                        <p class="show-faq__content title-core-value f-bold cl-title fz-20">
                                            <?php $imgs = _cget('icon_value_mission', $item, []); ?>
                                            <?php if (count($imgs) > 0) : ?>
                                                <?php foreach ($imgs as $k => $itemImg) : ?>
                                                    <span class="icon">
                                                        <img src="<?php echo wp_get_attachment_image_url($itemImg, 'full'); ?>" alt="<?php echo _cget('name', $item); ?>">
                                                    </span>
                                                <?php endforeach; ?>
                                            <?php endif; ?>

                                            <?php echo _cget('title_mission', $item); ?>
                                        </p>
                                        <div class="s-content faq-content core-value-content mt-2" style="box-sizing: border-box; display: none;">
                                            <?php echo _cget('content', $item); ?>
                                        </div>
                                    </div>

                                    <?php $i++; ?>

                                <?php endforeach; ?>


                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">
                            <!-- <div class="video-core-value">
                                    <video src="<?php echo get_template_directory_uri(); ?>/about-page.mp4" preload="auto" width="100%" autoplay="true" loop playsinline muted></video>
                                </div> -->
                            <div class="image text-center">
                                <img src="<?php echo $imageurl ?? ''; ?>" alt="<?php echo $title ?? ''; ?>" title="<?php echo $title ?? ''; ?>">
                            </div>
                        </div>
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
