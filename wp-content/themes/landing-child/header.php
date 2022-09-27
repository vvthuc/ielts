<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" initial-scale="1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="tem_url" content="<?php echo get_stylesheet_directory_uri(); ?>">
	<meta name="site_url" content="<?php echo site_url(); ?>">
	<meta name="ajax_url" content="<?php echo admin_url('admin-ajax.php'); ?>">
	<link rel="icon" href="<?php echo mb_image('favicon'); ?>" type="image/x-icon" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/css/animation.css" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/css/swiper-bundle.min.css" />
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/css/add.css" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/css/font-awesome.min.css" />
	<script>
		tailwind.config = {
			theme: {
				extend: {
					fontFamily: {
						Roboto: ["Roboto"],
					},
					colors: {
						yellow: "#FFD602",
						blue: "#00508f",
					},
					screens: {
						sm: "576px",
						md: "768px",
						lg: "1024px",
						xl: "1300px",
						"2xl": "1330px",
					},
					container: {
						center: true,
					},
				},
			},
		};
	</script>
	<?php wp_head(); ?>
	<?php mb_option('script_header'); ?>
	<script>
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		var template_directory_uri = '<?php echo get_template_directory_uri() ?>/';
	</script>
</head>

<body class="leading-snug">
	<header class="sticky top-0 left-0 right-0 z-10 bg-[#fff] lg:py-0 md:py-5 py-3">
		<div class="container mx-auto px-3 max-w-[87.5rem] flex items-center">
			<a href="<?php echo site_url(); ?>" title="<?php echo bloginfo(); ?>" class="inline-block logo w-[4.25rem] h-[2.375rem] mr-auto">
				<img src="<?php echo mb_image("logo"); ?>" alt="<?php echo bloginfo(); ?>" class="img-full" />
			</a>
			<button class="btn-menu md:hidden inline-flex items-center justify-center border border-[1px] border-[#ebebeb] p-3 rounded rounded-[0.3125rem] bg-yellow">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</button>
			<div class="box-menu md:inline-flex block items-center ml-auto">
				<div class="menu">
					<?php if (has_nav_menu('primary-menu')) : ?>
						<?php wp_nav_menu(array('theme_location' => 'primary-menu', 'menu_class' => '', 'container' => '',)); ?>
					<?php endif; ?>
				</div>
				<button class="btn inline-flex items-center justify-center"></button>
			</div>
		</div>
	</header>