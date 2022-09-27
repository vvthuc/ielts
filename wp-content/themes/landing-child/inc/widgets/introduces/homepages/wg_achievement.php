<?php

class Wg_Achievement extends WP_Widget

{

    function __construct()

    {

        parent::__construct(

            'Wg_Achievement',

            'Trang chủ - Các thành tựu đạt được',



            array(

                'description' => 'Các thành tựu đạt được'

            )

        );
    }

    function widget($args, $instance)
    {

        extract($args);

?>
        <?php $achievements = get_mb_option('achievement-item'); ?>
        <?php if(isset($achievements) && count($achievements) > 0) : ?>
        <section class="section-statis__index">
            <div class="container module-statis__index">
                <div class="row gx-2 gx-sm-4">
                    <?php foreach ($achievements as $k =>  $item) :?>
                    <div class="col-6 col-md-3 mb-2 mb-sm-3 mb-md-0 wow fadeInUp" data-wow-delay="<?php $k * 0.1?>s">
                        <div class="item-statis__index" style="background-image: url(<?php echo get_template_directory_uri(); ?>/theme/frontend/images/statis-index-<?=$k+1?>.png);">
                            <p class="number f-bold">
                                <span class="count" tech5s-number="<?php echo _cget('number', $item); ?>">
                                    <?php echo _cget('number', $item); ?>
                                </span>
                            </p>
                            <p class="text f-bold cl-title">
                                <?php echo _cget('achievement_name', $item); ?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
<?php

        echo $after_widget;
    }
}
