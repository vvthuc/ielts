<?php
class Wg_List_Branch_Map extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'Wg_List_Branch_Map',
            'Mạng lưới chi nhánh - List google map hệ thống chi nhánh',
            array(
                'description' => 'List google map hệ thống chi nhánh'
            )
        );
    }
    function form($instance)
    {
    }
    function widget($args, $instance)
    {
        extract($args);
?>
        <div class="container my-xl-5 my-lg-4 my-3" id="section__map">
            <div class="row mb-lg-4 mb-3">
                <div class="col-md-4 mb-md-0">
                    <select name="domain" class="form-control">
                        <option value=""><?php pll_e('Choose place'); ?></option>
                        <option value="1"><?php pll_e('Northern'); ?></option>
                        <option value="2"><?php pll_e('Central'); ?></option>
                        <option value="3"><?php pll_e('South'); ?></option>
                    </select>
                </div>
                <div class="col-md-4 mb-md-0">
                    <select name="type" class="form-control">
                        <option value=""><?php pll_e('Choose ...'); ?></option>
                        <option value="1"><?php pll_e('Headquarters'); ?></option>
                        <!-- <option value="3">Đại lý</option> -->
                        <!-- <option value="2"><?php pll_e('Branch'); ?></option> -->
                    </select>
                </div>
                <div class="col-md-4 mb-md-0">
                    <input type="name" class="form-control" placeholder="<?php pll_e('Enter branch name ...'); ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 brand-left">
                    <div class="branch_maps">
                        <div class="ajax_map_pro_main">
                            <div id="map" class="c-img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 brand-right">
                    <div id="divbranch">
                        <div class="block block__branchs">
                            <p class="title"><?php pll_e('Headquarters'); ?></p>
                            <?php
                            global $post;
                            $the_query = new WP_Query(
                                array(
                                    'post_type' => 'branchs',
                                    'orderby' => 'date',
                                    'order'   => 'DESC',
                                    'meta_query' => array(
                                        array(
                                            'key' => 'act',
                                            'value' => 1
                                        ),
                                        array(
                                            'key' => 'type',
                                            'value' => 1
                                        )
                                    )
                                )
                            );
                            if ($the_query->have_posts()) :
                            ?>
                                <?php
                                $i = 1;
                                while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                    <div class="item_branch" data-domain="<?php echo rwmb_get_value('domain', $post->ID); ?>" data-type="<?php echo rwmb_get_value('type', $post->ID); ?>" data-id="<?php echo $i; ?>" data-map="<?php echo rwmb_get_value("map", $post->ID); ?>">
                                        <div class="name">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <?php echo rwmb_get_value('name', $post->ID); ?>
                                        </div>
                                        <div class="address">
                                            <i class="fa fa-location-arrow" aria-hidden="true"></i>

                                            <?php echo rwmb_get_value('address', $post->ID); ?>
                                        </div>
                                    </div>
                                <?php
                                    $i++;
                                endwhile;
                                wp_reset_postdata()
                                ?>
                            <?php
                            endif;
                            ?>
                        </div>
                       <!--  <div class="block block__roomtrade">
                            <p class="title"><?php pll_e('Branch'); ?></p>
                            <?php
                            global $post;
                            $the_query2 = new WP_Query(
                                array(
                                    'post_type' => 'branchs',
                                    'orderby' => 'date',
                                    'order'   => 'DESC',
                                    'meta_query' => array(
                                        array(
                                            'key' => 'act',
                                            'value' => 1
                                        ),
                                        array(
                                            'key' => 'type',
                                            'value' => 2
                                        )
                                    )
                                )
                            );
                            if ($the_query2->have_posts()) :
                            ?>
                                <?php
                                $i = 1;
                                while ($the_query2->have_posts()) : $the_query2->the_post(); ?>
                                    <div class="item_branch" data-domain="<?php echo rwmb_get_value('domain', $post->ID); ?>" data-type="<?php echo rwmb_get_value('type', $post->ID); ?>" data-id="<?php echo $i; ?>" data-map="<?php echo rwmb_get_value("map", $post->ID); ?>">
                                        <div class="name">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <?php echo rwmb_get_value('name', $post->ID); ?>
                                        </div>
                                        <div class="address">
                                            <i class="fa fa-location-arrow" aria-hidden="true"></i>

                                            <?php echo rwmb_get_value('address', $post->ID); ?>
                                        </div>
                                    </div>
                                <?php
                                    $i++;
                                endwhile;
                                wp_reset_postdata()
                                ?>
                            <?php
                            endif;
                            ?>
                        </div> -->
                        <!-- <div class="block block__authorized_dealer">
                            <p class="title">Đại lý</p>
                            <?php
                            global $post;
                            $the_query3 = new WP_Query(
                                array(
                                    'post_type' => 'branchs',
                                    'orderby' => 'date',
                                    'order'   => 'DESC',
                                    'meta_query' => array(
                                        array(
                                            'key' => 'act',
                                            'value' => 1
                                        ),
                                        array(
                                            'key' => 'type',
                                            'value' => 3
                                        )
                                    )
                                )
                            );
                            if ($the_query3->have_posts()) :
                            ?>
                                <?php
                                $i = 1;
                                while ($the_query3->have_posts()) : $the_query3->the_post(); ?>
                                    <div class="item_branch" data-domain="<?php echo rwmb_get_value('domain', $post->ID); ?>" data-type="<?php echo rwmb_get_value('type', $post->ID); ?>" data-id="<?php echo $i; ?>" data-map="<?php echo rwmb_get_value("map", $post->ID); ?>">
                                        <div class="name">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <?php echo rwmb_get_value('name', $post->ID); ?>
                                        </div>
                                        <div class="address">
                                            <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                            <?php echo rwmb_get_value('address', $post->ID); ?>
                                        </div>
                                    </div>
                                <?php
                                    $i++;
                                endwhile;
                                wp_reset_postdata()
                                ?>
                            <?php
                            endif;
                            ?>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
<?php
        echo $after_widget;
    }
}
