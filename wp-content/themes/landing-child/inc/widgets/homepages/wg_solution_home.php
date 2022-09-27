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
            'Trang chủ - Block dịch vụ',
            array(
                'description' => 'Block dịch vụ'
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
                'post_type' => 'service',
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
        $i = 1;
        if ($the_query->have_posts()) :
        ?>
            <section class="section-all solution-index py-lg-80">
                <div class="square">
                    <svg viewBox="0 0 1432 1694" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="238.5" y="353.5" width="985" height="985" stroke="#BD3430" stroke-width="15" />
                        <path d="M917.5 7.5H1223.5V313.5H917.5V7.5Z" fill="#BD3430" stroke="#BD3430" stroke-width="15" />
                        <rect x="238.5" y="1380.5" width="306" height="306" fill="#BD3430" stroke="#BD3430" stroke-width="15" />
                        <rect x="1262.5" y="353.5" width="162" height="162" fill="#BD3430" stroke="#BD3430" stroke-width="15" />
                        <rect x="7.5" y="1150.5" width="188" height="188" fill="#BD3430" stroke="#BD3430" stroke-width="15" />
                    </svg>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 d-flex align-items-center wow fadeInLeft mb-3 mb-lg-0">
                            <div class="solution-index__content">
                                <p class="subtitle-all left-hidden text-uppercase fz-12 mb-2">
                                    <span class="text"><?php echo $litle_title ?? ''; ?></span>
                                </p>
                                <p class="title-big__all f-bold cl-title mb-3 fz-26 text-center text-lg-start"><?php echo $title ?? ''; ?></p>
                                <div class="short_content mb-3 mb-lg-4">
                                    <?php echo wpautop($content ?? ''); ?>
                                </div>
                                <a href="<?php echo $link ?? ''; ?>" title="Xem chi tiết" class="btn btn-orange__all btn-hover"><?php pll_e('Xem chi tiết'); ?></a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row row-solution__index gx-2 gx-sm-4">
                                <?php
                                $i = 1;
                                while ($the_query->have_posts()) : $the_query->the_post();
                                ?>
                                    <div class="col-6 mb-2 mb-sm-4 wow flipInY" data-wow-delay="<?php echo $i * 0.25; ?>s">
                                        <?php get_template_part('templates/solution/item_home'); ?>
                                    </div>
                                <?php
                                    $i++;
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
