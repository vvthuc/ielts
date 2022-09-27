<?php
class Wg_Map_Contact extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'Wg_Map_Contact',
            'Liên hệ - Iframe Google Map',
            array(
                'description' => 'Iframe Google Map'
            )
        );
    }
    function form($instance)
    {
        $default = array(
            'iframe' => ''
        );
        $instance = wp_parse_args((array) $instance, $default);
        $iframe = esc_attr($instance['iframe']);
       
        echo "<p>Iframe Map:</p>";
        echo "<textarea style='width:100%' name = '" . $this->get_field_name('iframe') . "'>".$iframe."</textarea>";
    }
    function update($new_instance, $old_instance)
    {
        parent::update($new_instance, $old_instance);
        $instance = $old_instance;
        $instance['iframe'] = $new_instance['iframe'];
        return $instance;
    }
    function widget($args, $instance)
    {
        extract($args);
        $iframe = $instance['iframe'];
?>
<section class="section-all__pages pt-0 map__loaded">
    <div class="container">
        <div id="map" data-map="<?php echo getSrcIframe($iframe); ?>"></div>
    </div>
</section>
<?php
        echo $after_widget;
    }
}
