<?php



class Wg_Certification_Introduce extends WP_Widget

{



    // <!-- Phần chứng nhận giải thưởng -->



    function __construct()

    {



        parent::__construct(



            'Wg_Certification_Introduce',



            'Giới thiệu - Phần chứng nhận giải thưởng',



            array(



                'description' => 'Phần chứng nhận giải thưởng'



            )



        );
    }



    function form($instance)

    {



        $default = array(



            'title' => '',



            'content' => '',



            'text' => ''



        );



        $instance = wp_parse_args((array) $instance, $default);



        $title = esc_attr($instance['title']);

        $text = esc_attr($instance['text']);



        $content = $instance['content'];



        $rand    = rand(0, 99999999999);



        $ed_id   = $this->get_field_id('wp_editor_' . $rand);



        $ed_name = $this->get_field_name('content');



        $content   = $content;



        $editor_id = $ed_id;



        $settings = array('media_buttons' => true, 'textarea_rows' => 4, 'textarea_name' => $ed_name, 'teeny' => true);



        echo "<p>Tiêu đề 1:</p>";



        echo "<input style='width:100%' name = '" . $this->get_field_name('title') . "' value = '" . $title . "'/>";



        echo "<p>Tiêu đề 2:</p>";



        echo "<input style='width:100%' name = '" . $this->get_field_name('text') . "' value = '" . $text . "'/>";



        echo "<p>Mô tả:</p>";



        echo wp_editor($content, $editor_id, $settings);
    }



    function update($new_instance, $old_instance)

    {



        parent::update($new_instance, $old_instance);



        $instance = $old_instance;



        $instance['title'] = $new_instance['title'];

        $instance['text'] = $new_instance['text'];



        $instance['content'] = $new_instance['content'];



        return $instance;
    }



    function widget($args, $instance)

    {



        extract($args);



        $title = $instance['title'];



        $content = $instance['content'];



        $text = $instance['text'];







?>



        <?php

        $listValueCertification = get_mb_option('list_value_Certification_begin');

        if (is_array($listValueCertification) && count($listValueCertification) > 0) :

        ?>

            <section class="section-all py-lg-80 section-certifi position-relative" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/images/square-right.png) no-repeat top right;background-size:200px;">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-4 d-flex align-items-center wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">

                            <div class="certificates-content">

                                <p class="subtitle-all left-hidden text-uppercase fz-12 mb-2">

                                    <span class="text"><?php echo $title ?? ''; ?></span>

                                </p>

                                <p class="title-big__all f-bold cl-title fz-26 text-lg-start text-center mb-3"><?php echo $text ?? ''; ?></p>

                                <div class="desc">

                                    <?php echo wpautop($content ?? ''); ?>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-8 wow fadeInRight mt-3 mt-lg-0" style="visibility: visible; animation-name: fadeInRight;">

                            <div class="swiper-container slide-certifi swiper-container-multirow swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events swiper-container-multirow-column">

                                <div class="swiper-wrapper" id="swiper-wrapper-76b1e90408c17665" aria-live="polite" style="width: 1002px; transform: translate3d(-250.333px, 0px, 0px); transition-duration: 0ms;">

                                    <?php $i = 1; ?>

                                    <?php foreach ($listValueCertification as $item) : ?>

                                        <?php $imgs = _cget('img_certificate', $item, []); ?>

                                        <?php if (count($imgs) > 0) : ?>

                                            <div class="swiper-slide swiper-slide-prev" role="group" aria-label="" style="width: 238.333px; margin-right: 12px;">

                                                <?php foreach ($imgs as $k => $itemImg) : ?>

                                                    <a class="img-certifi img__ c-img d-block" href="<?php echo wp_get_attachment_image_url($itemImg, 'full'); ?>" data-fslightbox="certifi">

                                                        <img src="<?php echo wp_get_attachment_image_url($itemImg, 'medium'); ?>" title="<?php echo _cget('name', $item); ?>" alt="<?php echo _cget('name', $item); ?>">

                                                    </a>

                                                <?php endforeach; ?>

                                            </div>

                                        <?php endif; ?>

                                        <?php $i++; ?>

                                    <?php endforeach; ?>

                                </div>



                                <div class="pagination-all pagination-certifi swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 2"></span></div>

                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>

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
