<?php /*Template Name: Trang tin tức*/ ?>
<?php
get_header();
?>
<div class="banner-pages" style="background-image: url('<?php echo get_the_post_thumbnail_url($post, 'full'); ?>');">
    <div class="container">
        <h2 class="title-big__all f-bold fz-26 text-uppercase cl-white mb-2 mb-lg-3 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;"><?php mb_option('banner_tin_tuc_title'); ?></h2>
        <ul class="breadcrumb wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        </ul>
    </div>
</div>
<section class="section-all__pages section-new">
    <div class="container">
        <p class="title-big__all f-bold fz-26 cl-bold mb-3">
            <?php mb_option('tin_title'); ?>
        </p>
        <?php
        global $post;
        $the_query = new WP_Query(
            array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 4,
                'orderby'   => 'date',
                'order'     => 'DESC',
                'meta_query' => array(
                    array(
                        'key' => 'act',
                        'value' => 1
                    )
                )
            )
        );
        if ($the_query->have_posts()) :
            $posts = $the_query->posts;
            $postLefts = array_slice($posts, 0, 1);
            $postRights = array_slice($posts, 1, 3);
        ?>
            <div class="row mb-4 mb-lg-5">
                <div class="col-lg-7 wow fadeInLeft mb-3 mb-lg-0">
                    <?php foreach ($postLefts as $post) : ?>
                        <div class="item-new__main">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="img img__ d-block c-img mb-2 mb-lg-3">
                                <?php the_thumb($post, 'full'); ?>
                            </a>
                            <h3>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="title f-bold cl-title fz-20 clamp-2 mb-2 mb-lg-3"><?php the_title(); ?></a>
                            </h3>
                            <p class="short_content clamp-2">
                                <?php echo get_custom_excerpt(20); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-lg-5">
                    <?php foreach ($postRights as $post) : ?>
                        <div class="item-new__sidebar d-flex wow fadeInUp" data-wow-delay="<?= $i * 0.1 ?>s">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="img img__">
                                <?php the_thumb($post, 'medium'); ?>
                            </a>
                            <div class="new-content">
                                <h3>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="title fz-18 clamp-3 f-bold cl-title mb-2">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <div class="box-text mb-2">
                                    <p class="desc fz-14 clamp-3 "><?php echo get_custom_excerpt(); ?></p>

                                </div>
                                <a href="<?php the_permalink(); ?>" title="Xem thêm" class="read-more fz-14 cl-orange position-relative">Xem thêm</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php
            wp_reset_postdata();
        endif;
        ?>
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        global $post;
        $i = 1;
        $the_query = new WP_Query(
            array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 8,
                'paged' => $paged,
                'orderby'   => 'date',
                'order'     => 'DESC',
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
            <div class="row g-2 gx-sm-4">
                <?php
                while ($the_query->have_posts()) : $the_query->the_post();
                ?>
                    <div class="col-6 mb-2 mb-sm-4 wow fadeInUp" data-wow-delay="<?= $i * 0.01 ?>s">
                        <?php get_template_part('templates/post/item'); ?>
                    </div>
                <?php
                    $i++;
                endwhile;
                ?>
            </div>
        <?php
        endif;
        ?>
    </div>
</section>
<?php
global $post;
$the_query = new WP_Query(
    array(
        'post_type' => 'event',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'orderby'   => 'date',
        'order'     => 'DESC',
        'meta_query' => array(
            array(
                'key' => 'act',
                'value' => 1
            )
        )
    )
);
if ($the_query->have_posts()) :
    $i = 0;
?>
    <section class="section-all bg-gray py-lg-80 wow fadeInUp">
        <div class="container">
            <p class="title-big__all f-bold fz-26 cl-bold mb-4">
                <?php mb_option('tin_su_kien_title'); ?>
            </p>
            <div class="box-slide__all position-relative">
                <div class="swiper-container slide-new__hot">
                    <div class="swiper-wrapper">
                        <?php
                        while ($the_query->have_posts()) : $the_query->the_post();
                        ?>
                            <div class="swiper-slide">
                                <div class="item-new__index wow fadeInUp" data-wow-delay="<?php echo $i * 0.25 ?>s">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="img img__ d-block c-img mb-2 mb-lg-3">
                                        <?php the_thumb($post, 'medium'); ?>
                                    </a>
                                    <h3>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="title f-bold cl-title fz-18 clamp-2 mb-2">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <p class="time-new__all">
                                        <span class="time-item fz-12 cl-88"><img class="me-2" src="<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/images/calendar.png" alt=""><?php echo get_the_date('d/m/Y', $post); ?></span>
                                        <span class="time-item fz-12 cl-88"><img class="me-2" src="<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/images/user.png" alt=""><?php the_author(); ?></span>
                                    </p>
                                </div>
                            </div>
                        <?php
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                    <div class="pagination-all pagination-new-hot"></div>
                </div>
                <div class="button-slide__all button-all-prev new-hot__prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                <div class="button-slide__all button-all-right new-hot__right"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
            </div>

        </div>
    </section>
<?php
endif;
?>
<?php
global $post;
$the_query = new WP_Query(
    array(
        'post_type' => 'recruitment',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'orderby'   => 'date',
        'order'     => 'DESC',
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
    <section class="section-all py-lg-80 wow fadeInUp">
        <div class="container">
            <p class="title-big__all f-bold fz-26 cl-bold mb-3">
                <?php mb_option('tin_tuyen_dung_title'); ?>
            </p>
            <div class="box-slide__all position-relative">
                <div class="swiper-container slide-recruitment">
                    <div class="swiper-wrapper">
                        <?php
                        $i = 1;
                        while ($the_query->have_posts()) : $the_query->the_post();
                        ?>
                            <div class="swiper-slide">
                                <div class="item-recruitment text-center wow fadeInUp" data-wow-delay="<?php echo $i * 0.25 ?>s">
                                    <a href="<?php the_permalink(); ?>" title="" class="img img__ d-block c-img mb-2 mb-lg-3">
                                        <?php the_thumb($post, 'medium'); ?>
                                    </a>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="title f-bold cl-title fz-18 mb-2 d-block"><?php the_title(); ?></a>
                                    <?php
                                    $dateEnd = rwmb_get_value('date_end', $post->ID);
                                    ?>
                                    <p class="text fz-14 mb-2"><?php pll_e('Expiration date'); ?>: <?php echo rwmb_get_value('date_end', $post->ID); ?></p>
                                    <p class="text fz-14 mb-2"><?php pll_e('Quantity'); ?>: <?php echo rwmb_get_value('amount', $post->ID); ?></p>
                                    <p class="info-rec d-flex align-items-center flex-wrap justify-content-center fz-14 mb-3">
                                        <span class="item">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/images/ant-design_field-time-outlined.svg" class="me-2" alt="time">
                                            <?php echo rwmb_get_value('working_time', $post->ID); ?>
                                        </span>
                                        <span class="item">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/images/carbon_location.svg" class="me-2" alt="address">
                                            <?php echo rwmb_get_value('location', $post->ID); ?>
                                        </span>
                                    </p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-orange__all btn-hover text-uppercase"><?php pll_e('Xem chi tiết'); ?></a>
                                </div>
                            </div>
                        <?php
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                    <div class="pagination-all pagination-recruitment"></div>
                </div>
                <div class="button-slide__all button-all-prev recruitment__prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                <div class="button-slide__all button-all-right recruitment__right"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
            </div>
        </div>
    </section>
<?php
endif;
?>
<?php get_footer(); ?>