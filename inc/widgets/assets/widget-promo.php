<?php

/**
 * Testimonial post/page widget
 *
 * @package WP_Store
 */
add_action('widgets_init', 'wp_store_register_promo_widget');

function wp_store_register_promo_widget() {
    register_widget('wp_store_promo');
}

class Wp_store_promo extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'wp_store_promo', esc_html__('WP Store : Promotional Banner Widget','wp-store'), array(
                'description' => esc_html__('A widget that Gives Promo of the object', 'wp-store')
                )
            );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            'promo_title' => array(
                'wp_store_widgets_name' => 'promo_title',
                'wp_store_widgets_title' => esc_html__('Title', 'wp-store'),
                'wp_store_widgets_field_type' => 'text',
                ),
            
            'promo_image' => array(
                'wp_store_widgets_name' => 'promo_image',
                'wp_store_widgets_title' => esc_html__('Upload Image', 'wp-store'),
                'wp_store_widgets_field_type' => 'upload',
                ),
            
            'promo_desc' => array(
                'wp_store_widgets_name' => 'promo_desc',
                'wp_store_widgets_title' => esc_html__('Enter Promo Desc', 'wp-store'),
                'wp_store_widgets_field_type' => 'textarea',   
                'wp_store_widgets_row' =>'4',
                ),
            
            'promo_link' => array(
                'wp_store_widgets_name' => 'promo_link',
                'wp_store_widgets_title' => esc_html__('Enter Promo Link', 'wp-store' ),
                'wp_store_widgets_field_type' => 'url'
                ),

            'promo_btn_text' => array(
                'wp_store_widgets_name' => 'promo_btn_text',
                'wp_store_widgets_title' => esc_html__('Enter Promo Button Text', 'wp-store' ),
                'wp_store_widgets_field_type' => 'text'
                ),
            
            
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
        if($instance == null){
            $instance['promo_title'] = '';
            $instance['promo_image']='';
            $instance['promo_btn_text']='';
            $instance['promo_desc']='';
            $instance['promo_link']='';

        }
            $promo_title = $instance['promo_title'];
            $promo = $instance['promo_image'];           
            $promo_btn_text = $instance['promo_btn_text'];
            $promo_desc = $instance['promo_desc'];
            $promo_link = $instance['promo_link'];
        
        
        echo wp_kses_post( $before_widget ); ?>
        <div class="promo-widget-wrap clearfix" style = "background-image:url(<?php echo esc_url($promo);?>);">
            <a href="<?php echo esc_url($promo_link);?> ">
                <div class="caption">
                    <?php
                    if (!empty($promo_title)){ 
                        echo wp_kses_post( $before_title ) . esc_html($promo_title) . wp_kses_post( $after_title ); ?>
                    <?php 
                    } 
                    if (!empty($promo_desc)){ ?>
                    <div class="desc"><?php echo wp_kses_post($promo_desc); ?></div>
                    <?php }
                    if (!empty($promo_btn_text)){ ?>
                    <div class="promo-btn"><?php echo esc_html($promo_btn_text); ?></div>
                    <?php } ?> 
                </div>
            </a>
        </div>        
        <?php 
        echo wp_kses_post( $after_widget );
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