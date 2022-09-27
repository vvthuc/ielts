<?php
class Wg_Slide_Home extends WP_Widget
{
	function __construct()
	{
		parent::__construct(
			'Wg_Slide_Home',
			'Trang chủ - Slide trang chủ',
			array(
				'description' => 'Slide trang chủ'
			)
		);
	}
	/**
	 * Tạo form option cho widget
	 */
	/**
	 * save widget form
	 */
	function widget($args, $instance)
	{
		extract($args);
?>
		<?php $slides = rwmb_meta('slide-item', array('object_type' => 'setting'), 'my_options'); ?>
		<?php if (!empty($slides) && count($slides) > 0) : ?>
			<div class="swiper-container slide-banner__index">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<video id="video-banner" src="<?= get_stylesheet_directory_uri() ?>/theme/frontend/images/mp4_3.mp4" preload="auto" width="100%" autoplay="true" loop playsinline muted></video>
						<div class="container d-flex align-items-center">
							<?php foreach ($slides as $item) : ?>
								<div class="banner-index__content">
									<h2 class="title-big__all f-bold cl-white fz-40 mb-3 text-uppercase wow fadeInLeft">
										<?php echo _cget('name', $item); ?>
									</h2>
									<p class="desc mb-3 mb-lg-4 cl-white fz-20 d-none d-sm-block wow fadeInRight" data-wow-delay="0.5s"><?php echo _cget('content', $item); ?></p>
									<a href="<?php echo _cget('link', $item); ?>" title="Khám phá" data-wow-delay="0.75s" class="btn fz-18 btn-orange__all btn-hover wow fadeInUp"><?php pll_e('Khám phá'); ?></a>
								</div>
							<?php
							endforeach;
							?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
<?php
		echo $after_widget;
	}
}
