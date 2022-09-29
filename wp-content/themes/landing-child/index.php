<?php get_header(); ?>
<?php $banners = rwmb_meta('banner-item', array('object_type' => 'setting'), 'my_options'); ?>
<?php if (!empty($banners)) : ?>
	<section class="banner relative z-1">
		<div class="swiper">
			<div class="swiper-wrapper">
				<?php foreach ($banners as $k => $banner) : ?>
					<div class="swiper-slide">
						<div class="item-banner relative z-1">
							<?php $imgsDesktop = _cget('banner_img_desktop', $banner, []); ?>
							<?php $imgsMobile = _cget('banner_img_mobile', $banner, []); ?>
							<?php if (!empty($imgsDesktop)) : ?>
								<?php foreach ($imgsDesktop as $k2 => $img) : ?>
									<img src="<?php echo wp_get_attachment_image_url($img, 'full') ?>" alt="<?php echo _cget('name_banner', $banner); ?>" class="md:block hidden w-full" />
								<?php endforeach; ?>
							<?php endif; ?>
							<?php if (!empty($imgsMobile)) : ?>
								<?php foreach ($imgsMobile as $k2 => $img) : ?>
									<img src="<?php echo wp_get_attachment_image_url($img, 'full') ?>" alt="<?php echo _cget('name_banner', $banner); ?>" class="md:hidden block w-full" />
								<?php endforeach; ?>
							<?php endif; ?>
							<div class="md:text-left text-center mx-auto px-3 container top-[50%] left-[50%] md:-translate-y-[50%] -translate-y-[80%] -translate-x-[50%] absolute z-1">
								<div class="box-banner flex max-w-[40.125rem] mr-auto">
									<div class="box-top">
										<p class="roboc title-top font-bold uppercase lg:text-[2.5rem] md:text-[1.5rem] text-[1.35rem] text-white lg:mb-[2.1875rem] md:mb-[1.25rem] mb-[1rem] leading-snug">
											<?php echo _cget('name_banner', $banner); ?>
										</p>
										<div class="short text-base text-white">
											<?php echo _cget('desc_banner', $banner); ?>
										</div>
										<a href="<?php echo _cget('banner_link', $banner); ?>" title="Xem ngay" class="btn inline-block lg:text-xl md:text-base text-sm xl:mt-[7.3125rem] lg:mt-[5.3125rem] mt-[2.3125rem] bg-yellow p-3 rounded rounded-[0.625rem] px-24">Xem ngay</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="swiper-pagi"></div>
	</section>
<?php endif; ?>
<?php $steps = rwmb_meta('steps-item', array('object_type' => 'setting'), 'my_options'); ?>
<?php if (!empty($steps)) : ?>
	<section class="section-start-build mb-3">
		<div class="banner container mb-3 wow fadeIn">
			<img src="<?php echo mb_image("start_img_desktop"); ?>" class="w-full" alt="Bạn không biết bắt đầu như thế nào ?" />
		</div>
		<div class="container mx-auto px-3">
			<div class="flex flex-wrap gap-[0.2688rem]">
				<div class="col lg:flex-[0_0_59%] flex-[0_0_100%] flex lg:gap-3 gap-2 flex-wrap">
					<?php $imgFull = ""; ?>
					<?php foreach ($steps as $k => $step) : ?>
						<?php $imgsIconFull = _cget('step_img_desktop', $step, []); ?>
						<?php if (!empty($imgsIconFull)) : ?>
							<?php foreach ($imgsIconFull as $k2 => $img) : ?>
								<?php $imgFull = wp_get_attachment_image_url($img, 'full'); ?>
							<?php endforeach; ?>
						<?php endif; ?>

						<div data-wow-duration="1.5s" data-wow-delay="<?php echo $k * 0.125; ?>s" class="wow flipInY item item-toogle md:p-[1.25rem] md:flex-[0_0_48.50%] flex-[0_0_100%] p-[0.75rem] md:bg-[#FDF2B2] bg-blue hover:bg-[#FDD501]" data-img="<?php echo $imgFull ?? ""; ?>" data-content="<?php echo _cget('step_full_desc', $step); ?>" data-content="<?php echo $imgFull ?? ''; ?>">
							<?php $imgsIcon = _cget('step_icon_desktop', $step, []); ?>
							<?php if (!empty($imgsIcon)) : ?>
								<?php foreach ($imgsIcon as $k2 => $img) : ?>
									<img src="<?php echo wp_get_attachment_image_url($img, 'full') ?>" alt="<?php echo _cget('name_step', $step); ?>" class="w-[[6.25rem] h-[[6.25rem] block mx-auto md:mb-[0.9375rem] mb-[0.625rem]" />
								<?php endforeach; ?>
							<?php endif; ?>
							<div class="short xl:text-[1.5rem] text-[1.25rem] md:text-blue text-white md:min-h-[7.25rem]">
								<?php echo _cget('step_short_desc', $step); ?>
							</div>
						</div>
						<div class="w-full content <?php echo $k == 0 ? 'md:hidden block' : 'hidden' ?> item-large pt-[2rem] px-[1.225rem] pb-[1rem] bg-yellow lg:h-full" ata-wow-duration="1s" data-wow-delay="0.5s">
							<div class="short xl:text-[1.5rem] text-[1.25rem] lg:mb-5 mb-3">
								<?php echo _cget('step_full_desc', $step); ?>
							</div>
							<?php $imgsIcon = _cget('step_img_desktop', $step, []); ?>
							<?php if (!empty($imgsIcon)) : ?>
								<?php foreach ($imgsIcon as $k2 => $img) : ?>
									<img src="<?php echo wp_get_attachment_image_url($img, 'full') ?>" alt="<?php echo _cget('name_step', $step); ?>" class="img-full object-contain md:w-[32.5rem] md:h-[32.5rem] block mx-auto" />
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="col lg:flex-[0_0_39%] flex-[0_0_100%] lg:block hidden">
					<div class="item-large pt-[2rem] px-[1.225rem] pb-[1rem] bg-yellow h-full" ata-wow-duration="1s" data-wow-delay="0.5s">
						<div class="short xl:text-[1.5rem] text-[1.25rem] lg:mb-5 mb-3">
							<?php echo _cget('step_full_desc', $steps[0]); ?>
						</div>
						<?php $imgsIcon = _cget('step_img_desktop', $steps[0], []); ?>
						<?php if (!empty($imgsIcon)) : ?>
							<?php foreach ($imgsIcon as $k2 => $img) : ?>
								<img src="<?php echo wp_get_attachment_image_url($img, 'full') ?>" alt="<?php echo _cget('name_step', $steps[0]); ?>" class="img-full object-contain md:w-[32.5rem] md:h-[32.5rem] block mx-auto" />
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php $whys = rwmb_meta('whys-item', array('object_type' => 'setting'), 'my_options'); ?>
<?php if (!empty($whys)) : ?>
	<section class="section-why bg-[#f2f2e8] pb-[3.75rem]">
		<div class="banner container wow fadeIn">
			<img src="<?php echo mb_image("why_img_desktop"); ?>" class="w-full" alt="Tại sao chọn chúng tôi" />
		</div>
		<div class="container mx-auto px-3">
			<div class="flex flex-wrap lg:gap-3 gap-2 lg:mb-6 mb-4 navv">
				<?php foreach ($whys as $k => $why) : ?>
					<div data-wow-duration="1.5s" data-wow-delay="<?php echo $k * 0.25; ?>s" class="item-toogle col md:flex-[0_0_24%] flex-[0_0_100%] wow fadeInUp nav-item" data-state="<?php echo $k == 0 ? 'true' : 'false' ?>" id="step-tab-<?php echo $k; ?>" data-target="#step-<?php echo $k; ?>">
						<div class="roboc h-full item-step text-center font-bold p-[0.5rem] bg-blue hover:bg-yellow text-yellow hover:text-blue text-yellow relative z-5 transition-all">
							<span class="number block lg:text-[5.275rem] md:text-[3.75rem] text-[2.5rem] mb-1 roboc"><?php echo _cget('name_why', $why); ?></span>
							<p class="block md:text-[1.25rem] text-[1.05rem]">
								<?php echo _cget('why_short_desc', $why); ?>
							</p>
						</div>
					</div>
					<div class="<?php echo $k == 0 ? 'md:hidden flex' : 'hidden' ?> content bg-yellow flex flex-wrap relative z-1 item-tab lg:p-[3.4375rem] md:p-[2.4375rem] p-[1.4375rem] justify-between">
						<div class="col lg:flex-[0_0_60%] flex-[0_0_100%]">
							<div class="image">
								<?php $imgsFull = _cget('why_img_desktop', $why, []); ?>
								<?php if (!empty($imgsFull)) : ?>
									<?php foreach ($imgsFull as $k2 => $img) : ?>
										<img src="<?php echo wp_get_attachment_image_url($img, 'full') ?>" alt="<?php echo _cget('name_why', $why); ?>" class="block mx-auto md:max-w-[41.875rem] md:max-h-[41.875rem]" />
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
						</div>
						<?php $benefits = _cget('whys-item-detail', $why) ?>
						<?php if ($benefits != "") : ?>
							<div class="col lg:flex-[0_0_37.5%] flex-[0_0_100%] flex flex-wrap items-center justify-center md:mt-0 mt-3">
								<?php foreach ($benefits as $k1 => $benefit) : ?>
									<div class="lg:block flex items-center item_why mb-3">
										<?php $imgsIcon = _cget('why_icon_desktop', $benefit, []); ?>
										<?php if (!empty($imgsIcon)) : ?>
											<?php foreach ($imgsIcon as $k2 => $img) : ?>
												<img src="<?php echo wp_get_attachment_image_url($img, 'full') ?>" alt="<?php echo _cget('name_why', $why); ?>" class="w-[6.25rem] h-[6.25rem] block mx-auto" />
											<?php endforeach; ?>
										<?php endif; ?>
										<p class="lg:text-[1.125rem] text-base md:mt-3 mt-0 lg:pl-0 pl-3">
											<?php echo _cget('why_detail_short_desc', $benefit); ?>
										</p>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="tabs bg-[#FAD52C] panel md:block hidden">
				<?php foreach ($whys as $k => $why) : ?>
					<div data-state="<?php echo $k == 0 ? 'true' : 'false' ?>" id="step-<?php echo $k; ?>" class="tab-panel flex flex-wrap relative z-1 item-tab lg:p-[3.4375rem] md:p-[2.4375rem] p-[1.4375rem] justify-between <?php echo $k == 0 ? 'flex' : 'hidden' ?>">
						<div class="col lg:flex-[0_0_60%] flex-[0_0_100%]">
							<div class="image">
								<?php $imgsFull = _cget('why_img_desktop', $why, []); ?>
								<?php if (!empty($imgsFull)) : ?>
									<?php foreach ($imgsFull as $k2 => $img) : ?>
										<img src="<?php echo wp_get_attachment_image_url($img, 'full') ?>" alt="<?php echo _cget('name_why', $why); ?>" class="block mx-auto md:max-w-[41.875rem] md:max-h-[41.875rem]" />
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
						</div>
						<?php $benefits = _cget('whys-item-detail', $why) ?>
						<?php if ($benefits != "") : ?>
							<div class="col lg:flex-[0_0_37.5%] flex-[0_0_100%] flex flex-wrap items-center justify-center md:mt-0 mt-3">
								<?php foreach ($benefits as $k1 => $benefit) : ?>
									<div class="lg:block flex items-center item_why mb-3">
										<?php $imgsIcon = _cget('why_icon_desktop', $benefit, []); ?>
										<?php if (!empty($imgsIcon)) : ?>
											<?php foreach ($imgsIcon as $k2 => $img) : ?>
												<img src="<?php echo wp_get_attachment_image_url($img, 'full') ?>" alt="<?php echo _cget('name_why', $why); ?>" class="w-[6.25rem] h-[6.25rem] block mx-auto" />
											<?php endforeach; ?>
										<?php endif; ?>
										<p class="lg:text-[1.125rem] text-base md:mt-3 mt-0 lg:pl-0 pl-3">
											<?php echo _cget('why_detail_short_desc', $benefit); ?>
										</p>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php $teachers = rwmb_meta('teachers-item', array('object_type' => 'setting'), 'my_options'); ?>
<?php if (!empty($teachers)) : ?>
	<section class="container px-3 mx-auto section-teacher xl:mt-[3.125rem] lg:mt-[2.25rem] mt-[1.5rem] pb-[2.5rem]">
		<p class="title roboc lg:text-[4rem] md:text-[2.5rem] text-[1.5rem] font-bold text-center uppercase text-blue wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
			<?php echo mb_option("title_teacher_1"); ?>
		</p>
		<div class="short_title roboc lg:text-[4rem] md:text-[2.5rem] text-[1.5rem] font-bold text-center uppercase text-[#FDD501] mb-3 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.75s">
			<?php echo mb_option("title_teacher_2"); ?>
		</div>
		<div class="desc text-base text-[#7A838A] max-w-[53.125rem] mx-auto lg:mb-[1.875rem] mb-[0.9375rem] wow fadeInUp">
			<?php echo mb_option("desc_teacher"); ?>
		</div>
		<div class="lg:flex flex-wrap gap-2 items-center">
			<div class="col left lg:flex-[0_0_39%] flex-[0_0_100%] lg:max-w-[39%] lg:block hidden">
				<div class="swiper-teacher-main swiper">
					<div class="swiper-wrapper">
						<?php foreach ($teachers as $k => $teacher) : ?>
							<div class="swiper-slide">
								<div data-wow-duration="1s" data-wow-delay="<?php echo $k * 0.25 ?>s" class="lg:min-h-[25rem] lg:flex flex-wrap items-center item-teacher text-[#FDD501] bg-yellow px-[1.25rem] py-[2rem] wow fadeInUp">
									<p class="md:text-[1.725rem] text-[1.25rem] text-blue font-black uppercase lg:mb-2 mb-1 roboc">
										<?php echo _cget('name_teacher', $teacher); ?>
									</p>
									<p class="md:text-[1.125rem] text-[1rem] text-[#252525] font-black uppercase lg:mb-3 mb-2 italic">
										<?php echo _cget('pos_teacher', $teacher); ?>
									</p>
									<div class="s-content text-[#3F4C55] md:text-[1.125rem] text-base">
										<?php echo _cget('desc_teacher', $teacher); ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="col right lg:flex-[0_0_59%] flex-[0_0_100%] lg:max-w-[59%]">
				<div class="swiper-teacher-thumb swiper">
					<div class="swiper-wrapper">
						<?php foreach ($teachers as $k => $teacher) : ?>
							<div class="swiper-slide mb-2 wow fadeInDown" data-wow-duration="0.75s" data-wow-delay="<?php echo $k * 0.15 ?>s">
								<div class="teacher lg:mr-2">
									<?php $imgs = _cget('teacher_icon_desktop', $teacher, []); ?>
									<?php if (!empty($imgs)) : ?>
										<span class="block overflow-hidden md:mb-0 mb-4">
											<?php foreach ($imgs as $k2 => $img) : ?>
												<img src="<?php echo wp_get_attachment_image_url($img, 'full') ?>" alt="<?php echo _cget('name_teacher', $teacher); ?>" class="w-full transition-all cursor-pointer" />
											<?php endforeach; ?>
										</span>
									<?php endif; ?>
									<div class="md:hidden box">
										<p class="roboc font-bold text-[1.35rem] uppercase text-blue mb-2">
											<?php echo _cget('name_teacher', $teacher); ?>
										</p>
										<div class="s-content text-[#3F4C55] md:text-[1.125rem] text-base">
											<?php echo _cget('desc_teacher', $teacher); ?>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="swiper-pagi static"></div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<section class="section-video bg-[#FFFDF1] lg:py-[2.5rem] py-[1.75rem] relative z-10">
	<div class="banner container mb-3 wow fadeIn">
		<img src="<?php echo mb_image("banner_video"); ?>" class="w-full" alt="Video" />
	</div>
	<?php $feels = rwmb_meta('feels-item', array('object_type' => 'setting'), 'my_options'); ?>
	<?php if (!empty($feels)) : ?>
		<div class="feels container px-3 mx-auto relative z-10 xl:mb-[2.5rem] lg:mb-[1.875rem] mb-5">
			<div class="swiper swiper-feels">
				<div class="swiper-wrapper">
					<?php foreach ($feels as $k => $feel) : ?>
						<div class="swiper-slide">
							<div class="item-feel">
								<div class="box bg-white hover:bg-yellow transition-all p-4 mb-3 relative z-1">
									<i class="fa fa-quote-left text-[1.5rem] absolute top-3 left-3 z-[1] text-justify" aria-hidden="true"></i>
									<?php echo _cget('short_student', $feel); ?>
									<i class="fa fa-quote-right text-[1.5rem] absolute bottom-3 right-3 z-[1]" aria-hidden="true"></i>
								</div>
								<div class="img mx-auto rounded rounded-[50%] overflow-hidden md:mb-3 mb-2 w-[12.5rem] h-[12.5rem]">
									<?php $imgs = _cget('img_student', $feel, []); ?>
									<?php if (!empty($imgs)) : ?>
										<?php foreach ($imgs as $k2 => $img) : ?>
											<img src="<?php echo wp_get_attachment_image_url($img, 'full') ?>" alt="<?php echo _cget('name_student', $feel); ?>" class="w-full h-full object-cover" />
										<?php endforeach; ?>
									<?php endif; ?>
								</div>
								<div class="text-center">
									<p class="name lg:text-[1.125rem] text-base font-bold mb-1 roboc"><?php echo _cget('name_student', $feel); ?></p>
									<span class="pos md:text-base text-sm"><?php echo _cget('point_student', $feel); ?></span>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="swiper-control w-[3rem] bg-[#fff] hover:bg-yellow transition-all rounded-[50%]  h-[3rem] flex items-center justify-center absolute top-[50%] -translate-y-[50%] swiper-prev z-[5] left-0">
				<i class="fa fa-angle-left" aria-hidden="true"></i>
			</div>
			<div class="swiper-pagi static blue mt-3"></div>
			<div class="swiper-control w-[3rem] bg-[#fff] hover:bg-yellow transition-all rounded-[50%]  h-[3rem] flex items-center justify-center absolute top-[50%] -translate-y-[50%] swiper-next z-[5] right-0">
				<i class="fa fa-angle-right" aria-hidden="true"></i>
			</div>
		</div>
	<?php endif; ?>
	<?php $videos = rwmb_meta('videos-item', array('object_type' => 'setting'), 'my_options'); ?>
	<?php if (!empty($videos)) : ?>
		<div class="videos">
			<div class="container mx-auto px-3 relative z-1">
				<div class="swiper swiper-video">
					<div class="swiper-wrapper">
						<?php foreach ($videos as $k => $video) : ?>
							<div class="swiper-slide mb-4">
								<div class="item-video lg:mr-4 wow fadeInDown relative z-1" data-wow-duration="1s" data-wow-delay="<?php echo $k * 0.25 ?>s">
									<a href="<?php echo _cget('link_video', $video); ?>" title="<?php echo _cget('name_video', $video); ?>" class="block play-video relative" data-href="<?php echo _cget('link_video', $video); ?>">
										<?php $imgs = _cget('img_video', $video, []); ?>
										<?php if (!empty($imgs)) : ?>
											<?php foreach ($imgs as $k2 => $img) : ?>
												<img src="<?php echo wp_get_attachment_image_url($img, 'full') ?>" alt="<?php echo _cget('name_video', $video); ?>" class="w-full" />
											<?php endforeach; ?>
										<?php endif; ?>
										<svg xmlns="http://www.w3.org/2000/svg" fill="#fff" viewBox="0 0 24 24" width="24px" height="24px" fill-rule="evenodd">
											<path fill-rule="evenodd" d="M 11 2 L 11 11 L 2 11 L 2 13 L 11 13 L 11 22 L 13 22 L 13 13 L 22 13 L 22 11 L 13 11 L 13 2 Z" />
										</svg>
									</a>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="swiper-control w-[3rem] bg-[#fff] hover:bg-yellow transition-all rounded-[50%]  h-[3rem] flex items-center justify-center absolute top-[50%] -translate-y-[50%] swiper-prev z-[5] left-0">
					<i class="fa fa-angle-left" aria-hidden="true"></i>
				</div>
				<div class="swiper-pagi static blue"></div>
				<div class="swiper-control w-[3rem] bg-[#fff] hover:bg-yellow transition-all rounded-[50%]  h-[3rem] flex items-center justify-center absolute top-[50%] -translate-y-[50%] swiper-next z-[5] right-0">
					<i class="fa fa-angle-right" aria-hidden="true"></i>
				</div>
			</div>
		</div>
	<?php endif; ?>
</section>

<section class="banner relative z-1 py-[1.875rem] bg-blue" style="
                background-image: url(<?php echo mb_image("bg_sale_img_desktop"); ?>);
                background-position: center;
                background-size: cover;
            ">
	<div class="container mx-auto px-3">
		<div class="grid grid-cols-2 mx-auto">
			<div class="lg:col-span-1 col-span-2 lg:mb-0 mb-3 lg:max-w-[31.25rem]">
				<p class="md:text-[1.25rem] text-base text-white mb-1 font-bold roboc md:text-left text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
					<?php echo mb_option("title_sale_1"); ?>
				</p>
				<p class="md:text-[1.25rem] text-base text-yellow mb-2 font-bold roboc md:text-left text-center wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.75s">
					<?php echo mb_option("title_sale_2"); ?>
				</p>
				<div class="desc text-white lg:text-left text-center wow fadeInUp" data-wow-duration="0.75s" data-wow-delay="0.75s">
					<?php echo mb_option("desc_sale"); ?>
				</div>
			</div>
			<div class="lg:col-span-1 col-span-2 max-w-[29.6875rem] mx-auto lg:ml-auto">
				<div class="text-sale md:text-base text-[1.5rem] text-white md:text-right text-center leading-snug relative z-1 wow bounceIn">
					Học phí chỉ từ
					<span data-content="<?php echo mb_option("price_sale"); ?>" class="price wow bounceIn lg:text-[3.275rem] md:text-[1.5rem] text-[3.25rem] font-bold text-[#fad15e] roboc md:inline-block block"><?php echo mb_option("price_sale"); ?></span>
					<span class="wow bounceIn md:text-base text-sm sm:absolute lg:static lg:top-[2rem] lg:right-[1.5rem] top-[1.25rem] right-[-1rem] z-1">đ/tháng</span>
				</div>
				<a href="<?php echo site_url(); ?>/#contact-now" title="NHẬN TƯ VẤN LỘ TRÌNH HỌC" class="border-transparent hover:bg-white hover:border-yellow hover:text-yellow transition-all wow bounceIn block w-fit p-[0.5688rem] px-5 rounded rounded-[1.875rem] text-white bg-[#ffac00] shadow-lg mx-auto mt-4 font-bold roboc">
					NHẬN TƯ VẤN LỘ TRÌNH HỌC
					<i class="fa fa-play-circle ml-1" aria-hidden="true"></i>
				</a>
			</div>
		</div>
	</div>
</section>
<?php $faqs = rwmb_meta('faqs-item', array('object_type' => 'setting'), 'my_options'); ?>
<?php if (!empty($faqs)) : ?>
	<section class="section-faq lg:py-[4.375rem] md:py-[3.375rem] py-[2.375rem]">
		<div class="container mx-auto px-3 max-w-[40.3125rem]">
			<p class="title lg:text-[1.5rem] text-[1.25rem] bg-[#FFD602] text-blue text-center p-2 block mb-3 font-bold wow fadeInUp" data-wow-duration="0.55s" data-wow-delay="0.55s">
				<?php echo mb_option("title_faq"); ?>
			</p>
			<div class="ls-faq">
				<?php foreach ($faqs as $k => $faq) : ?>
					<div data-wow-duration="0.75s" data-wow-delay="<?php echo $k * 0.25 ?>" class="item-faq bg-[#FFFBE5] hover:bg-yellow mb-2 wow fadeInUp transition-all cursor-pointer">
						<p class="text-center py-[0.7688rem] px-3">
							<?php echo _cget('name_question', $faq); ?>
						</p>
						<div class="content py-[0.4688rem] px-3 s-content border-t-[#fff] border-t-[1px]" style="display: none;">
							<?php echo _cget('des_question', $faq); ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
<section class="section-form bg-cover bg-postion-center py-[1.5625rem] bg-yellow" id="contact-now" style="background-image: url(<?php echo mb_image("bg_form_img_desktop"); ?>);background-position: center;background-size: cover;">
	<div class="container mx-auto px-3">
		<div class="grid grid-cols-2 lg:gap-4 md:gap-3 gap-2">
			<div class="md:col-span-1 col-span-2 wow fadeInUp">
				<a href="tel:<?php echo mb_option("hotline"); ?>" title="<?php echo mb_option("hotline"); ?>" class="md:text-base text-[1.125rem] w-fit block mx-auto text-blue mb-3 text-center font-bold">Hotline: <?php echo mb_option("hotline"); ?></a>
				<img src="<?php echo mb_image("form_img_desktop"); ?>" alt="Gửi liên hệ" class="w-[15.625rem] h-[15.625rem] mx-auto block object-contain md:mb-4 mb-3" />
				<?php $coupons = rwmb_meta('forms-item', array('object_type' => 'setting'), 'my_options'); ?>
				<?php if (!empty($coupons)) : ?>
					<div class="ls lg:max-w-[30.75rem] mx-auto">
						<?php foreach ($coupons as $k => $coupon) : ?>
							<p class="relative z-1 text-[#586269] pl-[1.6875rem] lg:mb-4 mb-3">
								<svg class="absolute top-0 left-0 w-[1.25rem] h-[1.25rem]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M12 22C6.47967 21.9939 2.00606 17.5203 2 12V11.8C2.10993 6.30453 6.63459 1.92796 12.1307 2.00088C17.6268 2.07381 22.0337 6.56889 21.9978 12.0653C21.9619 17.5618 17.4966 21.9989 12 22ZM7.41 11.59L6 13L10 17L18 9L16.59 7.58L10 14.17L7.41 11.59Z" fill="#2E3A59" />
								</svg>
								<?php echo _cget('name_coupon', $coupon); ?>
							</p>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="md:col-span-1 col-span-2 wow fadeInUp">
				<p class="w-fit block mx-auto text-blue mb-3 text-center font-bold md:text-base text-[1.125rem] uppercase">
					<?php echo mb_option("title_contact"); ?>
				</p>
				<div class="form-action">
					<div class="form border-blue border-[1px] md:p-[0.625rem]">
						<?php echo do_shortcode('[contact-form-7 id="87" title="Liên hệ"]'); ?>
					</div>
					<div class="desc text-base lg:mt-[1.8125rem] md:mt-[1.575rem] mt-[1.25rem]">
						<?php echo mb_option("des_contact"); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $partners = rwmb_meta('partners-item', array('object_type' => 'setting'), 'my_options'); ?>
<?php if (!empty($partners)) : ?>
	<section class="section-partner lg:py-[2.5rem] py-[1.5625rem]">
		<div class="box-partner max-w-[87.5rem] border-l-[1px] border-l-[#ebebeb] border-b-[1px] border-b-[#ebebeb] mx-auto">
			<div class="container mx-auto px-3">
				<div class="grid grid-cols-5 items-center">
					<div class="col-span-2">
						<p class="title text-base font-bold wow fadeInUp">
							<?php echo mb_option("title_partner"); ?>
						</p>
					</div>
					<div class="col-span-3">
						<div class="swiper swiper-partner wow fadeInUp">
							<div class="swiper-wrapper">
								<?php foreach ($partners as $k => $partner) : ?>
									<div class="swiper-slide">
										<?php $imgsDesktop = _cget('partner_img_desktop', $partner, []); ?>
										<?php if (!empty($imgsDesktop)) : ?>
											<?php foreach ($imgsDesktop as $k2 => $img) : ?>
												<img src="<?php echo wp_get_attachment_image_url($img, 'full') ?>" alt="<?php echo _cget('name_partner', $partner); ?>" class="object-contain w-[11.25rem] h-[7.8125rem]" />
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php get_footer(); ?>