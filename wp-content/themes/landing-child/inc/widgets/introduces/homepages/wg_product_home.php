<?php
class Wg_Product_Home extends WP_Widget
{
    /**
     * Thiết lập widget: đặt tên, base ID
     */
    function __construct()
    {
        parent::__construct(
            'Wg_Product_Home',
            'Trang chủ - Sản phẩm',
            array(
                'description' => 'Sản phẩm'
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
        $productCategories = get_terms(
            array(
                'taxonomy' => 'product-category',
                'hide_empty' => false,
                'orderby'   => 'meta_value_num',
                'meta_key'  => 'ord',
                'order'     => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'home',
                        'value' => 1
                    ),
                    array(
                        'key' => 'act',
                        'value' => 1
                    )
                )
            )
        );
        ?>
        <?php if (is_array($productCategories) && count($productCategories) > 0) : ?>
            <section class="section-all">
                <div class="container">
                    <p class="subtitle-all text-center text-uppercase fz-12 mb-2">
                        <span class="text"><?php echo $litle_title ?? ''; ?></span>
                    </p>
                    <div class="title-big__all text-center f-bold cl-title mb-4 fz-26"><?php echo wpautop($title ?? ''); ?></div>
                    <ul class="nav nav-pills tab-product__index mb-4" id="pills-tab" role="tablist">
                        <?php
                        foreach ($productCategories as $k => $itemCate) :
                        ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo $k == 0 ? 'active' : ''; ?> " id="product-tab-<?php echo $itemCate->term_id; ?>" data-bs-toggle="pill" data-bs-target="#product-<?php echo $itemCate->term_id; ?>" type="button" role="tab" aria-controls="product-1" aria-selected="true"><?php echo $itemCate->name; ?></button>
                            </li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <?php
                        foreach ($productCategories as $k => $itemCate) :
                        ?>
                            <div class="tab-pane fade <?php echo $k == 0 ? 'show active' : 'fade'; ?>" id="product-<?php echo $itemCate->term_id; ?>" role="tabpanel" aria-labelledby="product-tab-<?php echo $itemCate->term_id; ?>">
                                <?php
                                global $wpdb;

                                global $post;
                                $the_query = new WP_Query(
                                    array(
                                        'post_type' => 'product',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 6,
                                        'orderby'   => 'meta_value_num',
                                        'meta_key'  => 'ord',
                                        'order'     => 'ASC',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'product-category',
                                                'field' => 'term_id',
                                                'terms' => $itemCate->term_id   
                                            )
                                        ),
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
                                    <div class="box-slide__all position-relative">
                                        <div class="swiper-container slide-product__related slide-product__index">
                                            <div class="swiper-wrapper">
                                                <?php
                                                $i = 1;
                                                while ($the_query->have_posts()) : $the_query->the_post();
                                                ?>
                                                    <div class="swiper-slide wow fadeInUp" data-wow-delay="<?= $i * .05 ?>s">
                                                        <?php get_template_part('templates/product/item'); ?>
                                                    </div>
                                                <?php
                                                    $i++;
                                                endwhile;
                                                wp_reset_postdata();
                                                ?>

                                            </div>
                                        </div>
                                        <div class="button-slide__all button-all-prev product-related__prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                                        <div class="button-slide__all button-all-right product-related__right"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                                    </div>
                                <?php endif; ?>
                            </div>
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
