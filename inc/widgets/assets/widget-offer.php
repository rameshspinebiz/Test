<?php
/**
* Widget Product 1
* 
* 
* @package WP_Store
*/
if(wp_store_woocommerce_available()):
	add_action('widgets_init', 'wp_store_register_offer_widget');

function wp_store_register_offer_widget(){
	register_widget('wp_store_offer');
}

class Wp_store_offer extends WP_Widget {
/**
* Register Widget with Wordpress
* 
*/
public function __construct() {
	parent::__construct(
		'wp_store_offer', esc_html__('WP Store: WC Offer','wp-store'), array(
			'description' => esc_html__('Select products for offer of the day/month', 'wp-store')
			)
		);
}

/**
* Helper function that holds widget fields
* Array is used in update and form functions
*/
private function widget_fields() {

	$_pf = new WC_Product_Factory();  
	$woocommerce_products = array('-- Select Product --');
	$woocommerce_sale_products = wc_get_product_ids_on_sale();
	$woocommerce_sale_products = array_reverse($woocommerce_sale_products);
	$count=1;
	foreach ($woocommerce_sale_products as $key => $value) {
		$p = $_pf->get_product($value);
		if($p!=null){
			$pname = $p->get_title();
			$woocommerce_products[$value] = $pname;
			$count++;
			if($count>50){
				break;
			}
		}
	}
	
	$fields = array(
		'offer_product' => array(
			'wp_store_widgets_name' => 'offer_product',
			'wp_store_widgets_title' => esc_html__('Select Product', 'wp-store'),
			'wp_store_widgets_field_type' => 'select',
			'wp_store_widgets_field_options' => $woocommerce_products
			),

		'offer_btn_text' => array(
			'wp_store_widgets_name' => 'offer_btn_text',
			'wp_store_widgets_title' => esc_html__('Readmore button text', 'wp-store'),
			'wp_store_widgets_field_type' => 'text',

			),
		);
	return $fields;
}

public function widget($args, $instance){
	extract($args);
	if(!empty($instance)):

		if(isset($instance['offer_btn_text'])){
			$offer_btn_text      =   $instance['offer_btn_text'];
		}else{
			$offer_btn_text = esc_html__("Shop Now",'wp-store');
		}

		$offer_product       =   $instance['offer_product'];

		?>
		<?php echo wp_kses_post( $before_widget ); ?>
		<div class="offer-wrap clear">
			<?php
				// assuming the list of product IDs is are stored in an array called IDs;
			$_pf = new WC_Product_Factory();
			$product = $_pf->get_product($offer_product);
			?>
			<div class="offer-img item-img">
				<a href="<?php echo esc_url(get_permalink($offer_product)); ?>" title="<?php echo esc_attr(get_the_title($offer_product)); ?>">  
					<?php
					$size_img = "full";
								echo wp_kses_post( $product->get_image($size_img) ); // accepts 2 arguments ( size, attr )
								?>
							</a>
						</div>
						<div class="offer-percent">							
							<?php
							$price = get_post_meta( $offer_product, '_regular_price', true);
							$sale = get_post_meta( $offer_product, '_sale_price', true);
							$percent = number_format((($price-$sale)/$price)*100);
							echo "<span>" . esc_html($percent) . esc_html("%",'wp-store')."</span>".esc_html__(' Off','wp-store');
							?>

						</div>
						<div class="offer-content-wrap">
							<h2 class="product-title"><?php echo esc_html( $product->get_title() ); ?></h2>
							<p class="price-desc">
								<?php
								if($product->get_short_description() !=''){
									echo wp_kses_post( $product->get_short_description() );
								}
								else{
									echo wp_kses_post( $product->get_description() );
								}
								?>
							</p>
							<div class="bttn offer-btn">
								<a href="<?php echo esc_url(get_permalink($offer_product)); ?>" title="<?php echo esc_attr(get_the_title($offer_product)); ?>">  
									<?php echo esc_html($offer_btn_text);?>
								</a>
							</div>
						</div>
						<?php				

						wp_reset_query(); 
						?>
					</div>
					<?php echo wp_kses_post( $after_widget );
					endif;
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
endif;