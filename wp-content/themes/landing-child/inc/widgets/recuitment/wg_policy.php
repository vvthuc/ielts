<?php

class Wg_Policy extends WP_Widget
{

    /**

     * Thiết lập widget: đặt tên, base ID

     */

    function __construct()
    {

        parent::__construct(

            'Wg_Policy',

            'Tuyển dụng - Block Chính sách',

            array(

                'description' => 'Block Chính sách'

            )

        );
    }

    function form($instance)
    {

        $default = array(

            'litle_title' => '',

            'title' => '',

        );

        $instance = wp_parse_args((array) $instance, $default);

        $litle_title = esc_attr($instance['litle_title']);

        $title = esc_attr($instance['title']);



        echo "<p>Tiêu đề nhỏ:</p>";

        echo "<input style='width:100%' name = '" . $this->get_field_name('litle_title') . "' value = '" . $litle_title . "'/>";

        echo "<p>Tiêu đề:</p>";

        echo "<input style='width:100%' name = '" . $this->get_field_name('title') . "' value = '" . $title . "'/>";
    }

    function update($new_instance, $old_instance)
    {

        parent::update($new_instance, $old_instance);

        $instance = $old_instance;

        $instance['litle_title'] = $new_instance['litle_title'];

        $instance['title'] = $new_instance['title'];

        return $instance;
    }

    function widget($args, $instance)
    {

        extract($args);

        $litle_title = $instance['litle_title'];

        $title = $instance['title'];


?>
        <?php

        $listHistoryIntroduce = get_mb_option('policy-company');

        if (is_array($listHistoryIntroduce) && count($listHistoryIntroduce) > 0) :

        ?>
            <section class="section-all bg-gray section-policy wow fadeInUp">
                <div class="container">
                    <div class="box-slide__all position-relative">
                        <div class="swiper-container slide-policy">
                            <div class="swiper-wrapper">
                                <?php $i = 1; ?>

                                <?php foreach ($listHistoryIntroduce as $item) : ?>
                                    <div class="swiper-slide">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="subtitle-all left-hidden text-uppercase fz-12 mb-2">
                                                    <span class="text"><?php echo $litle_title ?? ''; ?></span>
                                                </p>
                                                <div class="title-big__all f-bold cl-title fz-26 mb-3 mb-lg-4"><?php echo wpautop($title ?? ''); ?></div>

                                                <p class="title-policy f-bold cl-title fz-18 mb-3"><?php echo _cget('title', $item); ?></p>
                                                <div class="s-content">
                                                    <?php echo wpautop(_cget('content', $item)); ?>
                                                </div>

                                            </div>
                                            <div class="col-md-6 d-none d-md-block">
                                            <?php $imgs = _cget('policy_img',$item,[]); ?>
                                                <?php if (count($imgs) > 0) : ?>
                                                    <?php foreach ($imgs as $k => $itemImg) : ?>
                                                        <div class="image text-center">
                                                            <img src="<?php echo wp_get_attachment_image_url($itemImg, 'full'); ?>" title="<?php echo _cget('name', $item); ?>" alt="<?php echo _cget('name', $item); ?>">
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>

                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="button-slide__all button-all-prev policy__prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                        <div class="button-slide__all button-all-right policy__right"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
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
