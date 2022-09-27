<?php
class Wg_News_Home extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'Wg_News_Home',
            'Trang chủ - Block tin tức',
            array(
                'description' => 'Block tin tức'
            )
        );
    }
    function form($instance)
    {
        $default = array(
            'title_news' => '',
            'title_event' => '',
            'title_recruitment' => '',
        );
        $instance = wp_parse_args((array) $instance, $default);
        $titleNews = esc_attr($instance['title_news']);
        $titleEvent = esc_attr($instance['title_event']);
        $titleRecruitment = esc_attr($instance['title_recruitment']);
        echo "<p>Tiêu đề tin tức:</p>";
        echo "<input style='width:100%' name = '" . $this->get_field_name('title_news') . "' value = '" . $titleNews . "'/>";
        echo "<p>Tiêu đề sự kiện:</p>";
        echo "<input style='width:100%' name = '" . $this->get_field_name('title_event') . "' value = '" . $titleEvent . "'/>";
        echo "<p>Tiêu đề tuyển dụng:</p>";
        echo "<input style='width:100%' name = '" . $this->get_field_name('title_recruitment') . "' value = '" . $titleRecruitment . "'/>";
    }
    function update($new_instance, $old_instance)
    {
        parent::update($new_instance, $old_instance);
        $instance = $old_instance;
        $instance['title_news'] = $new_instance['title_news'];
        $instance['title_event'] = $new_instance['title_event'];
        $instance['title_recruitment'] = $new_instance['title_recruitment'];
        return $instance;
    }
    function widget($args, $instance)
    {
        extract($args);
        $titleNews = $instance['title_news'];
        $titleEvent = $instance['title_event'];
        $titleRecruitment = $instance['title_recruitment'];
?>
        <section class="section-all section-new__index" style="background-color: #e6e6e647;background-repeat: no-repeat;background: url(<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/images/left-news.png)  no-repeat bottom -155px left -55px,url(<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/images/right-news.png)  no-repeat top right -55px;background-size: contain;">
            <div class="container">

                <div class="row">
                    <?php
                    global $post;
                    $the_query = new WP_Query(
                        array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'posts_per_page' => 3,
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
                        <div class="col-lg-4 mb-3 mb-lg-0">
                            <p class="subtitle-all f-bold left-hidden no-specing text-uppercase fz-20 mb-3">
                                <span class="text"><?php echo $titleNews ?? ''; ?></span>
                            </p>
                            <div class="module-new__index row row-sm-scroll gx-2 gx-sm-4">
                                <?php
                                $i = 1;
                                while ($the_query->have_posts()) : $the_query->the_post();
                                ?>
                                    <div class="col-7 col-sm-5 col-md-6 col-lg-12 mb-3 wow fadeInUp" data-wow-delay="<?= $i * 0.05 ?>s">
                                        <?php get_template_part('templates/post/item'); ?>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    <?php
                    endif;
                    ?>
                    <?php
                    global $post;
                    $the_query = new WP_Query(
                        array(
                            'post_type' => 'event',
                            'post_status' => 'publish',
                            'posts_per_page' => 3,
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
                        <div class="col-lg-4 mb-3 mb-lg-0">
                            <p class="subtitle-all f-bold left-hidden no-specing text-uppercase fz-20 mb-3">
                                <span class="text"><?php echo $titleEvent ?? ''; ?></span>
                            </p>
                            <div class="module-new__index row gx-2 gx-sm-4">
                                <?php
                                $i = 1;
                                while ($the_query->have_posts()) : $the_query->the_post();
                                ?>
                                    <div class="col-6 col-lg-12 mb-3 wow fadeInUp" data-wow-delay="<?= $i * 0.05 ?>s">
                                        <?php get_template_part('templates/post/item'); ?>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    <?php
                    endif;
                    ?>
                    <?php
                    global $post;
                    $the_query = new WP_Query(
                        array(
                            'post_type' => 'recruitment',
                            'post_status' => 'publish',
                            'posts_per_page' => 3,
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
                        <div class="col-lg-4 mb-3 mb-lg-0">
                            <p class="subtitle-all f-bold left-hidden no-specing text-uppercase fz-20 mb-3">
                                <span class="text"><?php echo $titleRecruitment ?? ''; ?></span>
                            </p>
                            <div class="module-new__index row gx-2 gx-sm-4">
                                <?php
                                $i = 1;
                                while ($the_query->have_posts()) : $the_query->the_post();
                                ?>
                                    <div class="col-6 col-lg-12 mb-3 wow fadeInUp" data-wow-delay="<?= $i * 0.05 ?>s">
                                        <?php get_template_part('templates/post/item'); ?>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </section>
<?php
        echo $after_widget;
    }
}
