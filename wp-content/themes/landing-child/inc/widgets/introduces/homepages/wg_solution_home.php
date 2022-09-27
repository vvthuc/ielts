<?php
class Wg_Solution_Home extends WP_Widget
{
    /**
     * Thiết lập widget: đặt tên, base ID
     */
    function __construct()
    {
        parent::__construct(
            'Wg_Solution_Home',
            'Trang chủ - Block giải pháp',
            array(
                'description' => 'Block giải pháp'
            )
        );
    }
    function form($instance)
    {
        $default = array(
            'litle_title' => '',
            'title' => '',
            'content' => '',
            'link' => ''
        );
        $instance = wp_parse_args((array) $instance, $default);
        $litle_title = esc_attr($instance['litle_title']);
        $title = esc_attr($instance['title']);
        $link = esc_attr($instance['link']);
        $content = $instance['content'];
        $rand    = rand(0, 99999999999);
        $ed_id   = $this->get_field_id('wp_editor_' . $rand);
        $ed_name = $this->get_field_name('content');
        $content   = $content;
        $editor_id = $ed_id;
        $settings = array('media_buttons' => true, 'textarea_rows' => 4, 'textarea_name' => $ed_name, 'teeny' => true);
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
        $link = $instance['link'];
?>
        <?php
        global $post;
        $the_query = new WP_Query(
            array(
                'post_type' => 'solution',
                'post_status' => 'publish',
                'posts_per_page' => 4,
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
            <section class="section-all solution-index py-lg-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 d-flex align-items-center wow fadeInLeft mb-3 mb-lg-0">
                            <div class="solution-index__content">
                                <p class="subtitle-all left-hidden text-uppercase fz-12 mb-2">
                                    <span class="text"><?php echo $litle_title ?? ''; ?></span>
                                </p>
                                <p class="title-big__all f-bold cl-title mb-3 fz-26"><?php echo $title ?? ''; ?></p>
                                <div class="short_content mb-3 mb-lg-4">
                                    <?php echo wpautop($content ?? ''); ?>
                                </div>
                                <a href="<?php echo $link ?? ''; ?>" title="Xem chi tiết" class="btn btn-orange__all btn-hover">Xem chi tiết</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row row-solution__index gx-2 gx-sm-4">
                                <?php
                                $i = 1;
                                while ($the_query->have_posts()) : $the_query->the_post();
                                ?>
                                    <div class="col-6 mb-2 mb-sm-4 wow fadeInUp" data-wow-delay="<?= $i * 0.1 ?>s">
                                        <?php get_template_part('templates/solution/item_home'); ?>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata()
                                ?>
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
