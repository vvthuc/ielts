<?php

if (!defined('ABSPATH')) {

    exit; // Exit if accessed directly

}

get_header();

?>

<?php
$type = isset($_GET['post_type']) ? $_GET['post_type'] : (isset($_GET['type']) ? $_GET['type'] : '');

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>

<section class="main-page-search section-all">

    <div class="container">

        <div class="ls_tabs">
            <a href="<?php echo get_home_url(); ?>?s=<?php echo get_search_query(); ?>&type=post" class="d-inline-block smooth name <?php echo $type == 'post' ? 'active' : '' ?>" title="<?php pll_e('News'); ?>"><?php pll_e('News'); ?></a>
            <a href="<?php echo get_home_url(); ?>?s=<?php echo get_search_query(); ?>&type=service" class="d-inline-block smooth name <?php echo $type == 'service' ? 'active' : '' ?>" title="<?php pll_e('Service'); ?>"><?php pll_e('Service'); ?></a>
            <a href="<?php echo get_home_url(); ?>?s=<?php echo get_search_query(); ?>&type=product" class="d-inline-block smooth name <?php echo $type == 'product' ? 'active' : '' ?>" title="<?php pll_e('Product'); ?>"><?php pll_e('Product'); ?></a>
        </div>
        <div class="content">

        </div>
        <?php if ($type == 'product') : ?>
            <div class="box-content__all box-search__tag mb-50">
                <h2 class="title_all title mb-4"><?php pll_e('Product search results with keyword'); ?>: <span class="title_search">"<?php echo get_search_query(); ?>"</span></h2>
                <div class="row gx-2 gx-sm-4">
                    <?php
                    $post_old2 = $post;
                    global $post;
                    $args1 = array(
                        'post_type' => 'product',
                        'meta_query' => array(
                            array(
                                'key' => 'act',
                                'value' => '1',
                                'compare' => '='
                            )
                        ),
                        's' => get_search_query(),
                        'paged' => $paged,
                        'posts_per_page' => 10,
                        'exact' => false,
                        'sentence' => true
                    );
                    $query_product = new WP_Query($args1);
                    if ($query_product->have_posts()) :
                        $key = 0;
                        while ($query_product->have_posts()) : $query_product->the_post();
                    ?>
                            <div class="col-6 col-md-4 col-lg-3 mb-mobile-8 mb-3 mb-lg-4 wow fadeInUp" data-wow-delay="<?= $key * 0.25 ?>s">

                                <!-- <php wc_get_template_part('content', 'product'); ?> -->
                                <div class="item-product">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="img img__ d-block c-img mb-2">
                                        <?php the_thumb($post, 'medium'); ?>
                                    </a>
                                    <h3>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="title f-bold cl-title fz-18 clamp-2 mb-2"><?php the_title(); ?></a>
                                    </h3>
                                    <p class="desc clamp-3"><?php echo get_custom_excerpt(20); ?></p>
                                </div>
                            </div>
                        <?php
                            $key++;
                        endwhile;
                        wp_reset_postdata();
                        cpagination($query_product->max_num_pages);
                    else :
                        ?>
                        <p class="no_results"><?php pll_e('No matches were found'); ?></p>
                    <?php endif; ?>
                </div>
                <?php $post = $post_old2; ?>
            </div>
        <?php endif; ?>
        <?php if ($type == 'service') : ?>
            <div class="box-content__all box-search__tag mb-50">
                <h2 class="title_all title mb-4"><?php pll_e('Service search results with keyword'); ?>: <span class="title_search">"<?php echo get_search_query(); ?>"</span></h2>
                <div class="row gx-2 gx-sm-4 overscroll_">
                    <?php
                    $post_old1 = $post;
                    global $post;
                    $args1 = array(
                        'post_type' => 'service',
                        'meta_query' => array(
                            array(
                                'key' => 'act',
                                'value' => '1',
                                'compare' => '='
                            )
                        ),
                        's' => get_search_query(),
                        'posts_per_page' => 10,
                        'paged' => $paged,
                        'exact' => false,
                        'sentence' => true
                    );
                    $query_service = new WP_Query($args1);
                    if ($query_service->have_posts()) :
                        $i = 0;
                        while ($query_service->have_posts()) : $query_service->the_post();
                    ?>
                            <div class="col-6 mb-2 mb-sm-4 wow fadeInUp" data-wow-delay="<?= $i * 0.25 ?>s">

                                <?php get_template_part('templates/post/item'); ?>

                            </div>
                        <?php
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                        cpagination($query_service->max_num_pages);
                    else :
                        ?>
                        <p class="no_results"><?php pll_e('No matches were found'); ?></p>
                    <?php endif; ?>
                </div>
                <?php $post = $post_old1; ?>
            </div>
        <?php endif; ?>
        <?php if ($type == 'post') : ?>
            <div class="box-content__all box-search__tag mb-50">
                <h2 class="title_all title mb-4"><?php pll_e('News search results with keyword'); ?>: <span class="title_search">"<?php echo get_search_query(); ?>"</span></h2>
                <div class="row gx-2 gx-sm-4">
                    <?php
                    $post_old3 = $post;
                    global $post;
                    $args3 = array(
                        'post_type' => 'post',
                        'meta_query' => array(
                            array(
                                'key' => 'act',
                                'value' => '1',
                                'compare' => '='
                            )
                        ),
                        's' => get_search_query(),
                        'posts_per_page' => 10,
                        'paged' => $paged,
                        'exact' => false,
                        'sentence' => true
                    );
                    $query_post = new WP_Query($args3);
                    if ($query_post->have_posts()) :
                        $i = 0;
                        while ($query_post->have_posts()) : $query_post->the_post();
                    ?>
                            <div class="col-6 mb-2 mb-sm-4 wow fadeInUp" data-wow-delay="<?= $i * 0.25 ?>s">

                                <?php get_template_part('templates/post/item'); ?>

                            </div>
                        <?php
                            $i++;
                        endwhile;
                        cpagination($query_post->max_num_pages);
                        wp_reset_postdata();
                    else :
                        ?>
                        <p class="no_results"><?php pll_e('No matches were found'); ?></p>
                    <?php
                    endif;
                    ?>
                    <?php $post = $post_old3; ?>
                </div>
                <?php  ?>
            </div>
        <?php endif; ?>

    </div>

</section>

<?php get_footer(); ?>