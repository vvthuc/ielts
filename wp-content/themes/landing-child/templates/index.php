<?php get_header(); ?>
<?php $banners = rwmb_meta('banner-item', array('object_type' => 'setting'), 'my_options'); ?>
<?php if (!empty($slides)) : ?>

	<section class="banners">
		<div class="container">
			<?php foreach ($banners as $k => $banner) : ?>
				<?php $imgs = _cget('banner_img_desktop', $banner, []); ?>
				<div class="banner banner-<?php echo $i; ?>">
					<?php if (!empty($imgs)) : ?>
						<?php foreach ($imgs as $k2 => $img) : ?>
							<img src="<?php echo wp_get_attachment_image_url($img, 'medium_large') ?>" class="img-fluid desktop" alt=" <?php echo _cget('banner_name', $banner); ?>" />
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
<?php endif; ?>
<?php get_footer(); ?>