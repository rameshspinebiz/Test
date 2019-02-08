<?php
/**
 * WP Store Theme Customizer Custom
 *
 * @package WP Store
 */

/**
 * Add new options the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wp_store_custom_customize_register( $wp_customize ) {
	//Adding the General Setup Panel
	$wp_customize->add_panel(
		'wp_store_basic_setting',
		array(
			'priority' => '10',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __('Default and Basic Settings','wp-store'),
			'description' => __('Manage Default and Basic Setups for the site','wp-store')
			)
		);

		//Add Default Sections to General Panel
		$wp_customize->get_section('title_tagline')->panel = 'wp_store_basic_setting'; //priority 20
		$wp_customize->get_section('colors')->panel = 'wp_store_basic_setting'; //priority 40
		$wp_customize->get_section('header_image')->panel = 'wp_store_basic_setting'; //priority 60
		$wp_customize->get_section('background_image')->panel = 'wp_store_basic_setting'; //priority 80
		$wp_customize->get_section('static_front_page')->panel = 'wp_store_basic_setting'; //priority 120

		//Webpage Layout
		$wp_customize->add_section(
			'wp_store_basic_setting_webpage_layout',
			array(
				'title'            =>       __('Web Layout Setting', 'wp-store'),
				'priority'         =>      '140',
				'panel'            =>      'wp_store_basic_setting',
				)
			);

			$wp_customize->add_setting(
				'wp_store_basic_setting_webpage_layout',
				array(
					'default'       =>  'fullwidth',
					'sanitize_callback' => 'wp_store_sanitize_radio_webpagelayout'
					)
				);

			$wp_customize->add_control(
				'wp_store_basic_setting_webpage_layout',
				array(
					'type' => 'radio',
					'label' => __('Website Layout', 'wp-store'),
					'description' => __('Choose weblayout for your Site. This setting will be applied for your Whole site.', 'wp-store'),
					'section' => 'wp_store_basic_setting_webpage_layout',
					'choices' => array(
						'fullwidth' => __('Full Width', 'wp-store'),
						'boxed' => __('Boxed Layout', 'wp-store'),
						)
					)
				);

		//Responsive Setting
		$wp_customize->add_section(
			'wp_store_basic_setting_responsive',
			array(
				'title' => __('Responsive Mode', 'wp-store'),
				'priority' => '160',
				'panel' => 'wp_store_basic_setting'
				)
			);

			$wp_customize->add_setting(
				'wp_store_basic_setting_responsive_option',
				array(
					'default' => 1,
					'sanitize_callback' => 'wp_store_sanitize_integer'
					)
				);

			$wp_customize->add_control(
				new Wp_store_WP_Customize_Switch_Control(
					$wp_customize,
					'wp_store_basic_setting_responsive_option',
					array(
						'section'       =>      'wp_store_basic_setting_responsive',
						'label'         =>      __('Enable Responsive Design', 'wp-store'),
						'description'   =>      __('Check to enable responsive design.', 'wp-store'),
						'type'          =>      'switch',
						'output'        =>      array('Yes', 'No')
						)
					)
				);

		/********************* Adding Customizer **********************/
		require get_template_directory(). '/inc/admin-panel/wp-store-sanitize.php';

		/********************* Adding Customizer **********************/
		require get_template_directory(). '/inc/admin-panel/assets/wp-store-header-panel.php'; 		//priority 20
		require get_template_directory(). '/inc/admin-panel/assets/wp-store-homepage-panel.php'; 	//priority 30
		require get_template_directory(). '/inc/admin-panel/assets/wp-store-woocommerce-panel.php';	//priority 40
		require get_template_directory(). '/inc/admin-panel/assets/wp-store-inner-panel.php';		//priority 50
		require get_template_directory(). '/inc/admin-panel/assets/wp-store-footer-panel.php';		//priority 60
		require get_template_directory(). '/inc/admin-panel/assets/wp-store-social-section.php';	//priority 70
		require get_template_directory(). '/inc/admin-panel/assets/wp-store-partnerlogo-panel.php';	//priority 90
}
add_action( 'customize_register', 'wp_store_custom_customize_register' );
