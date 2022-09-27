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
					<?php foreach ($slides as $item) : ?>
						<div class="swiper-slide">
							<?php
							$imgs = _cget('img', $item, []);
							foreach ($imgs as $k2 => $img) :
							?>
								<a href="<?php echo _cget('link', $item); ?>" title="" class="img">
									<picture>
										<source media="(min-width:767px)" data-srcset="<?php echo wp_get_attachment_image_url($img, 'full') ?>" srcset="<?php echo wp_get_attachment_image_url($img, 'full') ?>">
										<source media="(min-width:375px)" data-srcset="<?php echo wp_get_attachment_image_url($img, 'large') ?>" srcset="<?php echo wp_get_attachment_image_url($img, 'large') ?>">
										<source media="(min-width:575px)" data-srcset="<?php echo wp_get_attachment_image_url($img, 'medium_large') ?>" srcset="<?php echo wp_get_attachment_image_url($img, 'medium_large') ?>">
										<source media="(min-width:0px)" data-srcset="<?php echo wp_get_attachment_image_url($img, 'medium') ?>" srcset="<?php echo wp_get_attachment_image_url($img, 'medium') ?>">
										<img srcset="<?php echo wp_get_attachment_image_url($img, 'medium_large') ?>"  alt="<?php echo _cget('name', $item); ?>">
									</picture>
								</a>
							<?php
							endforeach;
							?>
							<div class="container d-flex align-items-center">
								<div class="banner-index__content">
									<h2 class="title-big__all f-bold cl-white fz-30 mb-3 text-uppercase">
										<?php echo wpautop(nl2br(_cget('name', $item))); ?>
									</h2>
									<div class="desc mb-3 mb-lg-4 cl-white d-none d-sm-block">
										<?php echo wpautop(nl2br(_cget('content', $item))); ?>
									</div>
									<?php if (_cget('link', $item) != '') : ?>
										<a href="<?php echo _cget('link', $item); ?>" title="<?php echo _cget('name_button', $item); ?>" class="btn btn-orange__all btn-hover"><?php echo _cget('name_button', $item); ?></a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
<?php
		echo $after_widget;
	}
}
