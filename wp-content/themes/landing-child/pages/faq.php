<?php /*Template Name: Trang câu hỏi thường gặp*/ ?>
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
<?php
global $post;
$the_query = new WP_Query(
    array(
        'post_type' => 'faq',
        'post_status' => 'publish',
        'posts_per_page' => 10,
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
if ($the_query->have_posts()) :
?>
    <section class="section-all__pages">
        <div class="container module-faqs">
            <?php
            $i = 1;
            while ($the_query->have_posts()) : $the_query->the_post();
            ?>
                <div class="item-faq wow fadeInUp" data-wow-delay="<?= $i * 0.01 ?>s">
                    <p class="show-faq__content title f-bold cl-title fz-20 px-3 py-2 mb-2">
                        <span class="icon"></span>
                        <span><?php the_title(); ?></span>
                    </p>
                    <div>
                        <div class="s-content faq-content py-3 px-4">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            <?php
                $i++;
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </section>
<?php
endif;
?>
<?php get_footer(); ?>