<?php

class Wg_History_Begin_Introduce extends WP_Widget
{

    // <!-- Phần lịch sử hình thành dưới banner -->

    function __construct()
    {

        parent::__construct(

            'Wg_History_Introduce',

            'Giới thiệu - Lịch sử hình thành',

            array(

                'description' => 'Lịch sử hình thành'

            )

        );
    }

    function form($instance)
    {

        $default = array(

            'title' => '',

            'content' => '',

        );

        $instance = wp_parse_args((array) $instance, $default);

        $title = esc_attr($instance['title']);

        $content = $instance['content'];

        $rand    = rand(0, 99999999999);

        $ed_id   = $this->get_field_id('wp_editor_' . $rand);

        $ed_name = $this->get_field_name('content');

        $content   = $content;

        $editor_id = $ed_id;

        $settings = array('media_buttons' => true, 'textarea_rows' => 4, 'textarea_name' => $ed_name, 'teeny' => true);

        echo "<p>Tiêu đề:</p>";

        echo "<input style='width:100%' name = '" . $this->get_field_name('title') . "' value = '" . $title . "'/>";

        echo "<p>Mô tả:</p>";

        echo wp_editor($content, $editor_id, $settings);
    }

    function update($new_instance, $old_instance)
    {

        parent::update($new_instance, $old_instance);

        $instance = $old_instance;

        $instance['title'] = $new_instance['title'];

        $instance['content'] = $new_instance['content'];

        return $instance;
    }

    function widget($args, $instance)
    {

        extract($args);

        $title = $instance['title'];

        $content = $instance['content'];

?>

        <?php

        $listHistoryIntroduce = get_mb_option('list_value_history_begin');

        if (is_array($listHistoryIntroduce) && count($listHistoryIntroduce) > 0) :

        ?>

            <section class="section-all section-roadmap wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="container">
                    <p class="subtitle-all text-center text-uppercase fz-12 mb-2  wow fadeInUp" data-wow-delay="0.25s">
                        <span class="text"><?php echo $title ?? ''; ?></span>
                    </p>
                    <div class="title-big__all f-bold cl-title fz-26 text-center mb-4 mb-lg-5  wow fadeInUp" data-wow-delay="0.35s">
                        <?php echo wpautop($content ?? ''); ?>
                    </div>
                    <div class="box-slide-roadmap position-relative bg-introduce">
                        <div class="swiper-container slide-roadmap swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                            <div class="swiper-wrapper" id="swiper-wrapper-6973168fe10fd29cf" aria-live="polite" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                                <?php $i = 1; ?>

                                <?php foreach ($listHistoryIntroduce as $item) : ?>

                                    <div class="swiper-slide swiper-slide-active" role=" group" aria-label="1 / 5" style="width: 252px; margin-right: 5px;">
                                        <div class="item-roadmap text-center  wow fadeInUp" data-wow-delay="<?php echo $i * 0.15 ?>s">
                                            <p class="box-time">
                                                <span class="time f-bold title-big__all f-bold fz-26"><?php echo _cget('year', $item); ?></span>
                                            </p>
                                            <div class="roadmap-content">
                                                <div class="short_content text-center fz-14">
                                                    <?php echo wpautop(_cget('content', $item)); ?>
                                                </div>
                                                <?php $imgs = _cget('icon', $item, []); ?>
                                                <?php if (count($imgs) > 0) : ?>
                                                    <?php foreach ($imgs as $k => $itemImg) : ?>
                                                        <span class="icon d-block">
                                                            <img src="<?php echo wp_get_attachment_image_url($itemImg, 'small'); ?>" title="<?php echo _cget('name', $item); ?>" alt="<?php echo _cget('name', $item); ?>">
                                                        </span>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <?php $i++; ?>

                                <?php endforeach; ?>
                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                        <div class="btn-slide-roadmap roadmap-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-6973168fe10fd29cf" aria-disabled="true"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                        <div class="btn-slide-roadmap roadmap-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-6973168fe10fd29cf" aria-disabled="false"><i class="fa fa-angle-right" aria-hidden="true"></i></div>

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
