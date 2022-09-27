<?php

class Wg_Image_Company extends WP_Widget

{

    function __construct()

    {

        parent::__construct(

            'Wg_Image_Company',

            'Tuyển dụng - Hình ảnh công ty',

            array(

                'description' => 'Hình ảnh công ty'

            )

        );
    }
    function form($instance)
    {

        $default = array(

            'litle_title' => '',

            'title' => '',

        );

        $instance = wp_parse_args((array) $instance, $default);

        $litle_title = esc_attr($instance['litle_title']);

        $title = $instance['title'];

        $rand    = rand(0, 99999999999);

        $ed_id   = $this->get_field_id('wp_editor_' . $rand);

        $ed_name = $this->get_field_name('title');

        $title   = $title;

        $editor_id = $ed_id;

        $settings = array('media_buttons' => true, 'textarea_rows' => 4, 'textarea_name' => $ed_name, 'teeny' => true);

        echo "<p>Tiêu đề nhỏ:</p>";

        echo "<input style='width:100%' name = '" . $this->get_field_name('litle_title') . "' value = '" . $litle_title . "'/>";

        echo "<p>Tiêu đề:</p>";

        echo wp_editor($title, $editor_id, $settings);
    }

    function update($new_instance, $old_instance)
    {

        parent::update($new_instance, $old_instance);

        $instance = $old_instance;

        $instance['litle_title'] = $new_instance['litle_title'];

        $instance['title'] = $new_instance['title'];

        return $instance;
    }

    function widget($args, $instance)
    {

        extract($args);

        $litle_title = $instance['litle_title'];

        $title = $instance['title'];

?>
        <?php
        global $post;
        $the_query = new WP_Query(
            array(
                'post_type' => 'gallery',
                'post_status' => 'publish',
                'posts_per_page' => 20,
                'orderby'   => 'date',
                'meta_key'  => 'ord',
                'order'     => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'act',
                        'value' => 1
                    ),
                )
            )
        );
        if ($the_query->have_posts()) :
        ?>
            <section class="section-all section-galery wow fadeInUp">
                <div class="container">
                    <p class="subtitle-all text-center text-uppercase fz-12 mb-2">
                        <span class="text"><?php echo $litle_title ?? ''; ?></span>
                    </p>
                    <div class="title-big__all f-bold text-center cl-title fz-26 mb-3 mbl-lg-4"><?php echo wpautop($title ?? ''); ?></div>
                    <div class="box-slide__all position-relative">
                        <div class="swiper-container slide-galery">
                            <div class="swiper-wrapper">
                                <?php
                                $images = [];
                                $k = 0;
                                while ($the_query->have_posts()) : $the_query->the_post();
                                ?>
                                    <?php
                                    $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'medium');
                                    $images[$k] = $url;
                                    $k++;
                                    ?>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                                $images_chuck = array_chunk($images, 6);
                                ?>
                                <?php foreach ($images_chuck as $k => $items) : ?>
                                    <div class="swiper-slide swiper-slide-prev slide-library" role="group" aria-label="" style="width: 238.333px; margin-right: 12px;">
                                        <div class="row gx-2">
                                            <?php foreach ($items as $k1 => $item1) : ?>
                                                <?php if ($k1 == 0 || $k1 == 3) : ?>
                                                    <div class="col-4">
                                                        <a href="<?php echo $item1; ?>" data-fslightbox="image" class="image-big c-img img__ d-block">
                                                            <img src="<?php echo $item1; ?>" alt="Ảnh" class="img-fluid">
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($k1 == 1) : ?>
                                                    <div class="col-2">
                                                        <div class="image-list">
                                                            <a href="<?php echo $item1; ?>" data-fslightbox="image" class="img-small d-block img__ c-img">
                                                                <img src="<?php echo $item1; ?>" alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        <?php if (isset($items[$k1 + 1])) : ?>
                                                            <div class="image-list">
                                                                <a href="<?php echo $items[$k1 + 1]; ?>" data-fslightbox="image" class="img-small d-block img__ c-img">
                                                                    <img src="<?php echo $items[$k1 + 1]; ?>" alt="" class="img-fluid">
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($k1 == 4) : ?>
                                                    <div class="col-2">
                                                        <div class="image-list">
                                                            <a href="<?php echo $item1; ?>" data-fslightbox="image" class="img-small d-block img__ c-img">
                                                                <img src="<?php echo $item1; ?>" alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        <?php if (isset($items[$k1 + 1])) : ?>
                                                            <div class="image-list">
                                                                <a href="<?php echo $items[$k1 + 1]; ?>" data-fslightbox="image" class="img-small d-block img__ c-img">
                                                                    <img src="<?php echo $items[$k1 + 1]; ?>" alt="" class="img-fluid">
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="button-slide__all button-all-prev galery__prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                        <div class="button-slide__all button-all-right galery__right"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
<?php
        echo $after_widget;
    }
}
