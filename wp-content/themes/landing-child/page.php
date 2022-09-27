<?php get_header(); ?>
<div class="banner-pages" style="background-image: url('<?php echo get_the_post_thumbnail_url($post, 'full'); ?>');">
    <div class="container">
        <h2 class="title-big__all f-bold fz-26 text-uppercase cl-white mb-2 mb-lg-3 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;"><?php the_title(); ?></h2>
        <div class="breadcrumb wow fadeInUp">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        </div>
    </div>
</div>
<section class="section-all__pages section-new__detail">
    <div class="container s-content">
    	<?php the_content(); ?>
    </div>
</section>
<?php get_footer(); ?>