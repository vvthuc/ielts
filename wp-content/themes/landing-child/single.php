<?php get_header(); ?>
<div class="banner-pages" style="background-image: url(<?php mb_image('banner_news'); ?>);">
    <div class="container">
        <h2 class="title-big__all f-bold fz-26 text-uppercase cl-white mb-2 mb-lg-3 wow fadeInUp">
            <?php mb_option('banner_tin_tuc_title'); ?>
        </h2>
        <div class="breadcrumb wow fadeInUp">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        </div>
    </div>
</div>
<section class="section-all__pages section-new__detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 wow fadeInLeft">
                <h1 class="title-big__all f-bold cl-title mb-3 fz-26"><?php the_title(); ?></h1>
                <p class="time-new__all mb-4">
                    <span class="time-item fz-12 cl-88"><img class="me-2" src="<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/images/calendar.png" alt=""><?php echo get_the_date('d/m/Y', $post); ?></span>
                </p>
                <div class="s-content justify mb-4t mb-4">
                    <?php the_content(); ?>
                </div>
                <div class="box__comment d-flex align-items-center justify-content-between">
                    <div class="ratting">
                        <?php echo kk_star_ratings(); ?>
                    </div>
                    <div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="" data-layout="button" data-action="like" data-size="small" data-share="true"></div>
                </div>
                <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="3"></div>
            </div>
            <div class="col-lg-3 wow fadeInRight mt-3 mt-lg-0">
                <?php get_template_part('templates/post/sidebar'); ?>
            </div>
        </div>
    </div>
</section>
<?php
$orig_post = $post;
global $post;
$categories = get_the_category();
$category_ids = array();
if ($categories) :
    foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;
    $args = array(
        'category__in' => $category_ids,
        'post__not_in' => array($post->ID),
        'posts_per_page' => 4,
        'ignore_sticky_posts ' => 1
    );
    $my_query = new wp_query($args);
    if ($my_query->have_posts()) :
?>
        <section class="section-all">
            <div class="container">
                <p class="title-big__all f-bold cl-title fz-26 mb-3"><?php pll_e('Related Posts'); ?></p>
                <div class="row gx-2 gx-sm-3 gx-md-4">
                    <?php
                    $i = 0;
                    while ($my_query->have_posts()) : $my_query->the_post();
                    ?>
                        <div class="col-6 col-lg-3 mb-2 mb-sm-3 mb-md-4 wow fadeInUp" data-wow-delay="<?= $i * 0.05 ?>s">
                            <?php get_template_part('templates/post/item_home'); ?>
                        </div>
                    <?php
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>
<?php
    endif;
endif;
?>
<?php get_footer(); ?>