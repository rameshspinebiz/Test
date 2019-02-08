<?php

/**
 * Simple Call To Action0 widget
 *
 * @package WP_Store
 */
add_action('widgets_init', 'wp_store_register_cta_simple_widget');

function wp_store_register_cta_simple_widget() {
    register_widget('wp_store_cta_simple');
}

class wp_store_cta_simple extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'wp_store_cta_simple', esc_html__('WP Store :  Call to Action','wp-store'), array(
                'description' => esc_html__('A widget that shows Simple Call to Action', 'wp-store')
                )
            );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            'cta_simple_title' => array(
                'wp_store_widgets_name' => 'cta_simple_title',
                'wp_store_widgets_title' => esc_html('Title', 'wp-store'),
                'wp_store_widgets_field_type' => 'title'
                ),
            'cta_simple_desc' => array(
                'wp_store_widgets_name' => 'cta_simple_desc',
                'wp_store_widgets_title' => esc_html('Description', 'wp-store'),
                'wp_store_widgets_field_type' => 'textarea',
                'wp_store_widgets_row' => '4'
                ),
            'cta_simple_btn_text' => array(
                'wp_store_widgets_name' => 'cta_simple_btn_text',
                'wp_store_widgets_title' => esc_html('Button Text', 'wp-store'),
                'wp_store_widgets_field_type' => 'text',
                ),
            'cta_simple_font_awesome' => array(
                'wp_store_widgets_name' => 'cta_simple_font_awesome',
                'wp_store_widgets_title' => esc_html('Enter Font-Awesome Class to show in button', 'wp-store'),
                'wp_store_widgets_field_type' => 'text',
                ),
            'cta_simple_btn_url' => array(
                'wp_store_widgets_name' => 'cta_simple_btn_url',
                'wp_store_widgets_title' => esc_html('Button Url', 'wp-store'),
                'wp_store_widgets_field_type' => 'text'
                
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
        if($instance!=null){
            $cta_simple_title = $instance['cta_simple_title'];
            $cta_simple_desc = $instance['cta_simple_desc'];
            $cta_simple_btn_text = $instance['cta_simple_btn_text'];
            $cta_simple_btn_url = $instance['cta_simple_btn_url'];
            $cta_simple_font_class = $instance['cta_simple_font_awesome'];
        }
        else
        {
            $cta_simple_title = "";
            $cta_simple_desc = "";
            $cta_simple_btn_text = "";
            $cta_simple_btn_url = "";
            $cta_simple_font_class = "";
        }
        echo $before_widget; ?>
        <div class="cta-banner clearfix">
            
            <div class="banner-text">
                <div class="cta-title_simple main-title"><?php echo esc_html($cta_simple_title);?></div>
                <div class="cta-desc_simple"><?php echo esc_textarea($cta_simple_desc);  ?></div>
            </div>
            <div class="banner-btn">
                <a class="btn" href="<?php echo esc_url($cta_simple_btn_url); ?>"><i class="fa <?php echo esc_attr($cta_simple_font_class); ?>"></i><?php echo esc_html($cta_simple_btn_text); ?></a>
            </div>
            
        </div>
        <?php 
        echo $after_widget;
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
