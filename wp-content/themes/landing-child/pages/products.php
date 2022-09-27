<?php /*Template Name: Trang sản phẩm*/ ?>

<?php

get_header();

hook_css('<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/theme/frontend/css/pages.css"/>');

?>

<div class="banner-pages" style="background-image: url('<?php echo get_the_post_thumbnail_url($post, 'full'); ?>');">
    <div class="container">
        <h2 class="title-big__all f-bold fz-26 text-uppercase cl-white mb-2 mb-lg-3 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;"><?php the_title(); ?></h2>
        <div class="breadcrumb wow fadeInUp">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        </div>
    </div>
</div>

<section class="solution_page all_products mb-4 py-lg-4 py-3">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8">
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
                                'key' => 'act',
                                'value' => 1
                            )
                        )
                    )
                );
                ?>
                <?php if (is_array($productCategories) && count($productCategories) > 0) : ?>
                    <?php
                    foreach ($productCategories as $k => $itemCate) :
                    ?>
                        <?php
                        global $post;
                        $the_query = new WP_Query(
                            array(
                                'post_type' => 'product',
                                'post_status' => 'publish',
                                'posts_per_page' => 8,
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
                                )
                            )
                        );
                        if ($the_query->have_posts()) :
                        ?>
                            <h2 class="title-category title-big__all f-bold fz-26 cl-title mb-2 mb-lg-3 wow fadeInUp" data-wow-delay="0.25s"><a href="<?php echo get_term_link($itemCate); ?>" title="<?php echo $itemCate->name; ?>" class="smooth"><?php echo $itemCate->name; ?></a></h2>
                            <div class="row g-2 g-sm-3 mb-4">
                                <?php
                                $i = 1;
                                while ($the_query->have_posts()) : $the_query->the_post();
                                ?>
                                    <div class="col-12 col-sm-6 mb-2 wow fadeInUp" data-wow-delay="<?= $i * .15 ?>s">
                                        <?php get_template_part('templates/product/item_all'); ?>
                                    </div>
                                <?php
                                    $i++;
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php
                $serviceCategories = get_terms(
                    array(
                        'taxonomy' => 'service-category',
                        'hide_empty' => false,
                        'meta_query' => array(
                            array(
                                'key' => 'act',
                                'value' => 1
                            )
                        )
                    )
                );
                ?>
                <?php if (is_array($serviceCategories) && count($serviceCategories) > 0) : ?>
                    <?php
                    foreach ($serviceCategories as $k => $itemCate) :
                    ?>
                        <?php
                        global $post;
                        $the_query1 = new WP_Query(
                            array(
                                'post_type' => 'service',
                                'post_status' => 'publish',
                                'posts_per_page' => 8,
                                'orderby'   => 'meta_value_num',
                                'meta_key'  => 'ord',
                                'order'     => 'ASC',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'service-category',
                                        'field' => 'term_id',
                                        'terms' => $itemCate->term_id
                                    )
                                ),
                                'meta_query' => array(
                                    array(
                                        'key' => 'act',
                                        'value' => 1
                                    ),
                                )
                            )
                        );
                        if ($the_query1->have_posts()) :
                        ?>
                            <h2 class="title-category title-big__all f-bold fz-26 cl-title mb-2 mb-lg-3 wow fadeInUp" data-wow-delay="0.25s">
                                <a href="<?php echo get_term_link($itemCate); ?>" title="<?php echo $itemCate->name; ?>" class="smooth">
                                    <?php echo $itemCate->name; ?>
                                </a>
                            </h2>
                            <div class="row g-2 g-sm-3 mb-4">
                                <?php
                                $i = 1;
                                while ($the_query1->have_posts()) : $the_query1->the_post();
                                ?>
                                    <div class="col-12 col-sm-6 mb-2 wow fadeInUp" data-wow-delay="<?= $i * .15 ?>s">
                                        <?php get_template_part('templates/product/item_all'); ?>
                                    </div>
                                <?php
                                    $i++;
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="col-xl-3 col-lg-4 mb-4">
                <?php $lang = pll_current_language();  ?>
                <?php echo do_shortcode('[cf7form cf7key="form_solution_' . $lang . '" title="Liên hệ nhanh" html_class="form-contact__pages wow fadeInUp"]') ?>

                <div class="dk-form-btns v2 justify-content-center mt-3 wow fadeInUp" data-wow-delay="0.25s">
                    <a class="smooth dk-form-hotline" href="tel:<?php mb_option('phone_number'); ?>" title="" rel="nofollow,noindex">
                        <i class="fa fa-phone"></i>
                        <span>Hotline</span>
                        <strong><?php mb_option('phone_number'); ?></strong>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>