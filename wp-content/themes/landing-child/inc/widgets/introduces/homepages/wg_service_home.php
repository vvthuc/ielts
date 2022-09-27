<?php

class Wg_Service_Home extends WP_Widget
{

    /**

     * Thiết lập widget: đặt tên, base ID

     */

    function __construct()
    {

        parent::__construct(

            'Wg_Service_Home',

            'Trang chủ - Dịch vụ',

            array(

                'description' => 'Dịch vụ'

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
        global $post;
        $the_query = new WP_Query(
            array(
                'post_type' => 'service',
                'post_status' => 'publish',
                'posts_per_page' => 6,
                'orderby'   => 'meta_value_num',
                'meta_key'  => 'ord',
                'order'     => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'act',
                        'value' => 1
                    ),
                    array(
                        'key' => 'home',
                        'value' => 1
                    )
                )
            )
        );
        if ($the_query->have_posts()) :

?>
            <section class="section-all section-service__index">
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
                    <p class="subtitle-all text-center text-uppercase fz-12 mb-2 text-white">
                        <span class="text"><?php echo $litle_title ?? ''; ?></span>
                    </p>
                    <div class="title-big__all text-center f-bold cl-white mb-4 fz-26"> <?php echo wpautop($title ?? ''); ?></div>
                    <div class="row row-sm-scroll">
                        <?php
                        $i = 1;
                        while ($the_query->have_posts()) : $the_query->the_post();
                        ?>
                            <div class="col-7 col-sm-5 col-md-4 wow fadeInUp" data-wow-delay="<?= $i * 0.1 ?>" s>
                                <?php get_template_part('templates/service/item'); ?>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata()
                        ?>
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
