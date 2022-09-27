<?php

class Wg_Treatment extends WP_Widget
{

    // <!-- Phần lịch sử hình thành dưới banner -->

    function __construct()
    {

        parent::__construct(

            'Wg_Treatment',

            'Tuyển Dụng - Các đãi ngộ của công ty',

            array(

                'description' => 'Các đãi ngộ của công ty'

            )

        );
    }

    function widget($args, $instance)

    {

        extract($args);

?>

        <?php

        $the_treatment = get_mb_option('the-treatment');

        if (is_array($the_treatment) && count($the_treatment) > 0) :

        ?>
            <section class="section-all section-enviroment__detail position-relative overflow-hidden">
                <ul class="bg-bubbles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>

                </ul>
                <div class="container">
                    <div class="row">
                        <?php $i = 1; ?>
                        <?php foreach ($the_treatment as $item) : ?>
                            <div class="col-6 col-lg-3 wow fadeInUp mb-5 mb-lg-0" data-wow-delay="<?= $i * 0.1 ?>s">
                                <div class="item-enviroment text-center cl-white">
                                    <span class="icon d-block mb-3 mb-lg-4">
                                        <?php $imgs = _cget('treatment_img', $item, []); ?>
                                        <?php if (count($imgs) > 0) : ?>
                                            <?php foreach ($imgs as $k => $itemImg) : ?>
                                                <img src="<?php echo wp_get_attachment_image_url($itemImg, 'full'); ?>" alt="<?php echo _cget('name', $item); ?>">
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </span>
                                    <p class="title f-bold fz-18 mb-2"><?php echo _cget('title', $item); ?></p>
                                    <p class="short_content"><?php echo _cget('content', $item); ?></p>
                                </div>
                            </div>
                    <?php $i++; ?>
                <?php endforeach; ?>
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
