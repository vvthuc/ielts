<?php

class Wg_Our_Tearm_Introduce extends WP_Widget
{

    // <!-- Phần thể mạnh -->

    function __construct()
    {

        parent::__construct(

            'Wg_Our_Tearm_Introduce',

            'Giới thiệu - Đội ngũ nhân sự',

            array(

                'description' => 'Đội ngũ nhân sự'

            )

        );
    }

    function form($instance)
    {

        $default = array(

            'title' => '',

            'content' => '',

        );

        $instance = wp_parse_args((array) $instance, $default);

        $title = esc_attr($instance['title']);


        $content = $instance['content'];

        $rand    = rand(0, 99999999999);

        $ed_id   = $this->get_field_id('wp_editor_' . $rand);

        $ed_name = $this->get_field_name('content');

        $content   = $content;

        $editor_id = $ed_id;

        $settings = array('media_buttons' => true, 'textarea_rows' => 4, 'textarea_name' => $ed_name, 'teeny' => true);


        echo "<p>Tiêu đề:</p>";

        echo "<input style='width:100%' name = '" . $this->get_field_name('title') . "' value = '" . $title . "'/>";

        echo "<p>Mô tả:</p>";

        echo wp_editor($content, $editor_id, $settings);
    }

    function update($new_instance, $old_instance)
    {

        parent::update($new_instance, $old_instance);

        $instance = $old_instance;

        $instance['title'] = $new_instance['title'];

        $instance['content'] = $new_instance['content'];

        return $instance;
    }

    function widget($args, $instance)
    {

        extract($args);

        $title = $instance['title'];

        $content = $instance['content'];

?>

        <?php
        global $post;
        $the_query = new WP_Query(
            array(
                'post_type' => 'teams',
                'post_status' => 'publish',
                'posts_per_page' => 6,
                'orderby'   => 'meta_value_num',
                'meta_key'  => 'ord',
                'order'     => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'act',
                        'value' => 1
                    )
                )
            )
        );
        if ($the_query->have_posts()) :
        ?>
            <section class="section-all py-lg-80 section__teams">
                <div class="container">
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
                    <p class="subtitle-all text-center text-uppercase fz-12 mb-2 wow fadeInUp" data-wow-delay="0.25s">
                        <span class="text"><?php echo $title ?? ''; ?></span>
                    </p>
                    <div class="title-big__all f-bold cl-title fz-26 text-center mb-3 mb-lg-4 wow fadeInUp" data-wow-delay="0.25s">
                        <?php echo wpautop($content ?? ''); ?>
                    </div>
                    <div class="swiper-container slide-product__related swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                        <div class="swiper-wrapper" id="swiper-wrapper-128a82cb6a4fb396" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                            <?php
                            $i = 1;
                            while ($the_query->have_posts()) : $the_query->the_post();
                            ?>
                                <div class="swiper-slide wow fadeInUp swiper-slide-active" data-wow-delay="<?php echo $i * 0.15 ?>s" role="group" aria-label="1 / 5" style="width: 254px; visibility: visible; animation-delay: 0.05s; animation-name: fadeInUp; margin-right: 30px;">
                                    <div class="item-person text-center">
                                        <span class="img img__ c-img d-block mb-2 mb-lg-3">
                                            <?php the_thumb($post, 'medium'); ?>
                                        </span>
                                        <p class="name f-bold cl-title fz-18 mb-2"><?php the_title(); ?></p>
                                        <p class="role fz-12 cl-orange"><?php echo rwmb_get_value('info', '', $post->id); ?></p>
                                    </div>
                                </div>
                            <?php
                                $i++;
                            endwhile;
                            wp_reset_postdata()
                            ?>

                        </div>
                        <div class="pagination-all pagination-person swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span></div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
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
