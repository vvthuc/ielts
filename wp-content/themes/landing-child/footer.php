<footer class="bg-[#FFD602] lg:py-[2rem] py-[1.5rem] lg:pb-0 pb-0 md:pb-0">
    <div class="container px-3 mx-auto lg:pb-[2rem] pb-[1.5rem]">
        <a href="<?php echo site_url(); ?>" title="<?php echo bloginfo(); ?>" class="block mx-auto w-fit lg:mb-[1.875rem] mb-3">
            <img src="<?php echo mb_image("logo_footer"); ?>" alt="<?php echo bloginfo(); ?>" class="w-[160px] h-[6.25rem] object-contain" />
        </a>
        <?php $branchs = rwmb_meta('branchs-item', array('object_type' => 'setting'), 'my_options'); ?>
        <?php if (!empty($branchs)) : ?>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 lg:gap-10 md:gap-4 gap-2">
                <?php foreach ($branchs as $k => $branch) : ?>
                    <div class="col-span-1">
                        <div class="item-branch">
                            <p class="title font-bold xl:text-[1.5rem] text-[1.25rem] text-blue mb-2">
                                <?php echo _cget('name_branch', $branch); ?>
                            </p>
                            <div class="s-content text-base">
                                <?php echo _cget('des_branch', $branch); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="col-span-1">
                <a href="tel:<?php echo mb_option("hotline"); ?>" title="<?php echo mb_option("hotline"); ?>" class="w-fit block hotline title font-bold xl:text-[1.5rem] text-[1.25rem] text-blue">Hotline <?php echo mb_option("hotline"); ?></a>
                <div class="fanpage"></div>
            </div>
            </div>
    </div>
    <div class="copy-right bg-[#fff] xl:py-[1.25rem] py-[0.9375rem]">
        <div class="container mx-auto px-3">
            <p class="text-base text-center roboc">
                <?php echo mb_option("copy_right") ?>
            </p>
        </div>
    </div>
</footer>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/js/jquery-3.4.1.min.js" defer></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/js/bootstrap.bundle.min.js" defer></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/js/wow.js" defer></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/js/swiper-bundle.min.js" defer></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/js/slide.js" defer></script>
<?php wp_footer() ?>
<?php echo mb_option('script_footer'); ?>
</body>

</html>