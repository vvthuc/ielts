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
        <?php if (isset($achievements) && count($achievements) > 0) : ?>
            <section class="section-statis__index bg-red__shadow">
                <div class="container module-statis__index">
                    <div class="row g-2 g-sm-4 row-cols-2 row-cols-md-3 row-cols-lg-5">
                        <?php foreach ($achievements as $k =>  $item) : ?>
                            <div class="col">
                                <?php $imgs = _cget('img', $item, []); ?>
                                <?php if (count($imgs) > 0) : ?>
                                    <?php foreach ($imgs as $k => $itemImg) : ?>
                                        <div class="item-statis__index" style="background-image: url(<?php echo wp_get_attachment_image_url($itemImg, 'full'); ?>);">
                                            <p class="number f-bold">
                                                <span class="count" tech5s-number="<?php echo _cget('number', $item); ?>">
                                                    <?php echo _cget('number', $item); ?>
                                                </span>
                                            </p>
                                            <p class="text f-bold cl-title">
                                                <?php echo _cget('achievement_name', $item); ?>
                                            </p>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
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
