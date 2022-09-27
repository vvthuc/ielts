<?php /*Template Name: Trang giới thiệu*/ ?>

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





<?php if (is_active_sidebar('wg_page_introduce')) : ?>

    <?php dynamic_sidebar('wg_page_introduce'); ?>

<?php endif; ?>



<?php get_footer(); ?>