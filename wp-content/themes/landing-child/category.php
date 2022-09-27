<?php
get_header();
hook_css('<link rel="stylesheet" href="' . get_template_directory_uri() . '/theme/frontend/css/solution.css" />');
?>
<?php
$term = get_queried_object();
$termId = $term->term_id;
?>
<div class="banner-pages" style="background-image: url('<?php mb_image('banner_news'); ?>');">
    <div class="container">
        <h1 class="title-big__all f-bold fz-26 text-uppercase cl-white mb-2 mb-lg-3 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;"><?php echo $term->name; ?></h1>
        <ul class="breadcrumb wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        </ul>
    </div>
</div>
<section class="section-all__pages section-cruitmtent__categories">
    <div class="container">
        <div class="module-category__content">
            <div class="row gx-2 gx-sm-3">
                <?php
                global $post;
                $i = 1;
                if (have_posts()) :
                ?>
                    <?php
                    $i = 1;
                    while (have_posts()) : the_post();
                    ?>
                        <div class="col-6 col-lg-3 mb-2 mb-sm-3 mb-md-4 wow fadeInUp" data-wow-delay="<?= $i * .25 ?>s">
                            <div class="item-product">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="img img__ d-block c-img mb-2">
                                    <?php the_thumb($post, 'medium'); ?>
                                </a>
                                <h2>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="title f-bold cl-title fz-18 clamp-2 mb-2"><?php the_title(); ?></a>
                                </h2>
                                <p class="desc clamp-3"> <?php echo get_custom_excerpt(20); ?></p>
                            </div>
                        </div>
                    <?php
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                    <?php cpagination(); ?>
            </div>
        <?php else : ?>
            <p class="no-result text-center py-lg-3 py-2"><?php echo pll_e("No matches were found"); ?></p>
        <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>