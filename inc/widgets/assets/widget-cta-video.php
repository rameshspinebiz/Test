<?php

/**
 * Testimonial post/page widget
 *
 * @package WP_Store
 */
add_action('widgets_init', 'wp_store_register_cta_video_widget');

function wp_store_register_cta_video_widget() {
    register_widget('wp_store_cta_video');
}

class wp_store_cta_video extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'wp_store_cta_video', esc_html__('WP Store : Call to Action with Video','wp-store'), array(
                'description' => esc_html__('A widget that shows Call to Action with Video', 'wp-store')
                )
            );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            'cta_video_title' => array(
                'wp_store_widgets_name' => 'cta_video_title',
                'wp_store_widgets_title' => esc_html__('Title', 'wp-store'),
                'wp_store_widgets_field_type' => 'title',
                ),
            'cta_video_phone' => array(
                'wp_store_widgets_name' => 'cta_video_desc',
                'wp_store_widgets_title' => esc_html__('Description', 'wp-store'),
                'wp_store_widgets_field_type' => 'textarea',
                'wp_store_widgets_row' => '4'
                ),
            'cta_video_bkg' => array(
                'wp_store_widgets_name' => 'cta_video_bkg',
                'wp_store_widgets_title' => esc_html__('Upload Background Image', 'wp-store'),
                'wp_store_widgets_field_type' => 'upload',
                ),
            'cta_video_iframe' => array(
                'wp_store_widgets_name' => 'cta_video_iframe',
                'wp_store_widgets_title' => esc_html__('Video Iframe Url only without tags', 'wp-store'),
                'wp_store_widgets_field_type' => 'iframe_textarea',
                'wp_store_widgets_row' => '4'
                )
            
            );

return $fields;
}

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        extract($args);
        if($instance){
            $allow_tag = array(
                'iframe'=>array(
                    'height'=>array(),
                    'width'=>array(),
                    'src'=>array(),
                    'frameborder'=>array()));
            $cta_video_title = $instance['cta_video_title'];
            $cta_video_desc = $instance['cta_video_desc'];
            $cta_video_iframe = wp_kses($instance['cta_video_iframe'], $allow_tag);
            $cta_video_bkg = $instance['cta_video_bkg'];
            

            echo wp_kses_post( $before_widget ); ?>
            <div class="cta-video clearfix">
                <a href='<?php echo esc_url($cta_video_iframe); ?>' class="various iframe">
                    <figure class="video-bkg-img">
                        <?php if (!empty($cta_video_bkg)): ?>
                            <img src = "<?php echo esc_url($cta_video_bkg); ?>" alt="<?php echo esc_attr($cta_video_title);?>" />                            
                        <?php endif; ?>                        
                        <i class="fa fa-play"></i>
                    </figure>
                    <div class="store-wrapper clear">
                        <h1 class="cta-title main-title"><?php echo esc_html($cta_video_title);?></h1>
                        <div class="cta-desc"><?php echo esc_textarea($cta_video_desc);  ?></div>
                    </div>
                </a>
            </div>
            <?php 
            echo wp_kses_post( $after_widget );
        }
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param	array	$new_instance	Values just sent to be saved.
     * @param	array	$old_instance	Previously saved values from database.
     *
     * @uses	wp_store_widgets_updated_field_value()		defined in widget-fields.php
     *
     * @return	array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            extract($widget_field);

            // Use helper function to get updated field values
            $instance[$wp_store_widgets_name] = wp_store_widgets_updated_field_value($widget_field, $new_instance[$wp_store_widgets_name]);
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param	array $instance Previously saved values from database.
     *
     * @uses	wp_store_widgets_show_widget_field()		defined in widget-fields.php
     */
    public function form($instance) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
            extract($widget_field);
            $wp_store_widgets_field_value = !empty($instance[$wp_store_widgets_name]) ? esc_attr($instance[$wp_store_widgets_name]) : '';
            wp_store_widgets_show_widget_field($this, $widget_field, $wp_store_widgets_field_value);
        }
    }

}
