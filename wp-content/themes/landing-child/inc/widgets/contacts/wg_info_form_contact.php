<?php

class Wg_Info_Form_Contact extends WP_Widget

{

	function __construct()

	{

		parent::__construct(

			'Wg_Info_Form_Contact',

			'Liên hệ - Thông tin liên hệ',

			array(

				'description' => 'Thông tin liên hệ'

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

		<section class="section-all__pages section-contact">

    <div class="container">

        <div class="row mb-4 mb-lg-80">

            <div class="col-lg-6 wow fadeInLeft mb-3 mb-lg-0">

                <p class="title-big__all f-bold cl-orange fz-26 text-uppercase mb-3"><?php pll_e('contact'); ?></p>

                <p class="name-company fz-22 f-bold cl-title text-uppercase mb-3"><?php mb_option('company_name'); ?></p>

                <ul class="list-contact__pages">

                    <li class="d-flex">

                        <span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/images/Pin_alt_light.svg" alt="address"></span>

                        <div class="contact-content">

                            <strong class="fz-18 cl-title mb-2 d-block"><?php pll_e('address'); ?>:</strong>

                            <p class="text"><?php mb_option('address'); ?></p>

                        </div>

                    </li>

                    <li class="d-flex">

                        <span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/images/Phone_light.svg" alt="address"></span>

                        <div class="contact-content">

                            <strong class="fz-18 cl-title mb-2 d-block"><?php pll_e('phone'); ?>:</strong>

                            <a href="tel: <?php mb_option('phone_number'); ?>" title="<?php pll_e('phone'); ?>" class="text"> <?php mb_option('phone_number'); ?></a>

                        </div>

                    </li>

                    <li class="d-flex">

                        <span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/images/Message_light.svg" alt="address"></span>

                        <div class="contact-content">

                            <strong class="fz-18 cl-title mb-2 d-block"><?php pll_e('Email'); ?>:</strong>

                            <a href="mailto: <?php mb_option('email'); ?>" title="email" class="text"> <?php mb_option('email'); ?></a>

                        </div>

                    </li>

                    <li class="d-flex">

                        <span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/images/globe.svg" alt="address"></span>

                        <div class="contact-content">

                            <strong class="fz-18 cl-title mb-2 d-block"><?php pll_e('Website'); ?>:</strong>

                            <a href="<?php mb_option('website'); ?>" title="website" class="text"><?php mb_option('website'); ?></a>

                        </div>

                    </li>

                </ul>

            </div>

            <?php $lang = pll_current_language();  ?>

            <div class="col-lg-6 wow fadeInRight">

                <?php echo do_shortcode('[cf7form cf7key="form_quick_contact_'.$lang.'" title="Liên hệ nhanh" html_class="form-contact__pages"]') ?>

            </div>

        </div>

    </div>

</section>

<?php

		echo $after_widget;

	}

}

