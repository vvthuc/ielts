<?php
class Wg_List_Branch_Home extends WP_Widget
{
    /**
     * Thiết lập widget: đặt tên, base ID
     */
    function __construct()
    {
        parent::__construct(
            'Wg_List_Branch_Home',
            'Trang chủ - Hệ thống chi nhánh',
            array(
                'description' => 'Hệ thống chi nhánh'
            )
        );
    }
    function form($instance)
    {
        $default = array(
            'litle_title' => '',
            'title' => '',
            'content' => '',
            'image' => '',
            'link' => ''
        );
        $instance = wp_parse_args((array) $instance, $default);
        $litle_title = esc_attr($instance['litle_title']);
        $title = esc_attr($instance['title']);
        $image = esc_attr($instance['image']);
        $link = esc_attr($instance['link']);
        $imageurl = "";
        if (((int)$image) > 0) {
            $arr = wp_get_attachment_image_src($image, 'full');
            if (count($arr) > 0) {
                $imageurl = $arr[0];
            }
        }
        $content = $instance['content'];
        $rand    = rand(0, 99999999999);
        $ed_id   = $this->get_field_id('wp_editor_' . $rand);
        $ed_name = $this->get_field_name('content');
        $content   = $content;
        $editor_id = $ed_id;
        $settings = array('media_buttons' => true, 'textarea_rows' => 4, 'textarea_name' => $ed_name, 'teeny' => true);
        echo "<p>Hình Ảnh (348 x 500):</p>";
        echo "<div class='h_cover_image'><img src='" . $imageurl . "'/>";
        echo "<input type='hidden' name = '" . $this->get_field_name('image') . "' value='" . $image . "'/>";
        echo "<button type='button' class='h_upload_image_button button'>Chọn ảnh</button>";
        echo "<button type='button' class='h_remove_image_button button'>Xóa ảnh</button>";
        echo "</div>";
        echo "<p>Tiêu đề nhỏ:</p>";
        echo "<input style='width:100%' name = '" . $this->get_field_name('litle_title') . "' value = '" . $litle_title . "'/>";
        echo "<p>Tiêu đề:</p>";
        echo "<input style='width:100%' name = '" . $this->get_field_name('title') . "' value = '" . $title . "'/>";
        echo "<p>Mô tả:</p>";
        echo wp_editor($content, $editor_id, $settings);
        echo "<p>Link bài viết:</p>";
        echo "<input style='width:100%' name = '" . $this->get_field_name('link') . "' value = '" . $link . "'/>";
    }
    function update($new_instance, $old_instance)
    {
        parent::update($new_instance, $old_instance);
        $instance = $old_instance;
        $instance['image'] = $new_instance['image'];
        $instance['litle_title'] = $new_instance['litle_title'];
        $instance['title'] = $new_instance['title'];
        $instance['content'] = $new_instance['content'];
        $instance['link'] = $new_instance['link'];
        return $instance;
    }
    function widget($args, $instance)
    {
        extract($args);
        $litle_title = $instance['litle_title'];
        $title = $instance['title'];
        $content = $instance['content'];
        $image = $instance['image'];
        $link = $instance['link'];
        $imageurl = get_template_directory_uri() . "/admin/no-image.svg";
        if (((int)$image) > 0) {
            $arr = wp_get_attachment_image_src($image, 'full');
            if (count($arr) > 0) {
                $imageurl = $arr[0];
            }
        }
?>
        <section class="section-all__pages section-list-branch" style="background-repeat: no-repeat;background: url(<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/images/square-left.png)  no-repeat bottom -155px left -55px,url(<?php echo get_stylesheet_directory_uri(); ?>/theme/frontend/images/square-right.png)  no-repeat top -155px right -55px;background-size: contain;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center wow fadeInLeft">
                        <div class="module-branch__content">
                            <p class="subtitle-all left-hidden text-uppercase fz-12 mb-2">
                                <span class="text"><?php echo $litle_title ?? ''; ?></span>
                            </p>
                            <p class="title-big__all text-center text-lg-start f-bold cl-title fz-26 mb-3"><?php echo $title ?? ''; ?></p>
                            <div class="short_content mb-3 mb-lg-4">
                                <?php echo wpautop($content ?? ''); ?>
                            </div>
                            <a href="<?php echo $link ?? ''; ?>" title="Xem chi tiết" class="btn btn-orange__all btn-hover mb-4"><?php pll_e('Xem chi tiết'); ?></a>
                            <?php $list_branch = rwmb_meta('list-branch-item', array('object_type' => 'setting'), 'my_options'); ?>
                            <?php if (isset($list_branch) && count($list_branch) > 0) : ?>
                                <div class="module-statis row">
                                    <?php $i = 1; ?>
                                    <?php foreach ($list_branch as $item) : ?>
                                        <div class="col-12 col-sm-6 mb-3">
                                            <div class="statis-item d-flex">
                                                <?php $imgs = _cget('icon_branch', $item, []); ?>

                                                <?php if (count($imgs) > 0) : ?>

                                                    <?php foreach ($imgs as $k => $itemImg) : ?>

                                                        <span class="icon">

                                                            <img src="<?php echo wp_get_attachment_image_url($itemImg, 'full'); ?>" alt="<?php echo _cget('name', $item); ?>">

                                                        </span>

                                                    <?php endforeach; ?>

                                                <?php endif; ?>
                                                <div class="statis-content">
                                                    <p class="number f-bold fz-30 mb-1">
                                                        <span class="count" tech5s-number="<?php echo _cget('number', $item); ?>"> <?php echo _cget('number', $item); ?></span>
                                                    </p>
                                                    <p class="text f-bold"><?php echo wpautop(nl2br(_cget('content', $item))); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInRight d-none d-lg-block">
                        <div class="image text-center">
                            <img src="<?php echo $imageurl ?? ''; ?>" alt="<?php echo $title ?? ''; ?>" title="<?php echo $title ?? ''; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
        echo $after_widget;
    }
}
