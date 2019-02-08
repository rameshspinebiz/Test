<?php
//Woocommerce custom options
$wp_customize->add_panel(
	'wp_store_woocommerce_setting',
	array(
		'priority' => '50',
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __('Woocommerce Settings', 'wp-store' ),
		'description' => __( 'This allows to set wocommerce settings', 'wp-store' ),
		)
	);

	$wp_customize->add_section(
		'wp_store_woocommerce_setting_page',
		array(
			'title' => __('Woocommerce Shop Page', 'wp-store'),
			'priority' => '40',
			'capability' => 'edit_theme_options',
			'panel' => 'wp_store_woocommerce_setting',
			)
		);

		$wp_customize->add_setting(
			'wp_store_woocommerce_setting_page_slider',
			array(
				'default' =>  '0',
				'sanitize_callback'     =>  'wp_store_sanitize_checkbox'
				)
			);

		$wp_customize->add_control(
			new Wp_store_WP_Customize_Switch_Control(
				$wp_customize,
				'wp_store_woocommerce_setting_page_slider',array(
					'section'       =>      'wp_store_woocommerce_setting_page',
					'label'         =>      __('Enable Home Slider', 'wp-store'),
					'description'         =>      __('Show Home Slider on WooCommerce Shop Page.', 'wp-store'),
					'type'          =>      'switch',
					'output'        =>      array('Yes', 'No')
					)
				)
			);

		$wp_customize->add_setting(
			'wp_store_woocommerce_setting_page_cta',
			array(
				'default' =>  '0',
				'sanitize_callback'     =>  'wp_store_sanitize_checkbox'
				)
			);

		$wp_customize->add_control(
			new Wp_store_WP_Customize_Switch_Control(
				$wp_customize,
				'wp_store_woocommerce_setting_page_cta',array(
					'section'       =>      'wp_store_woocommerce_setting_page',
					'label'         =>      __('Enable widget before footer', 'wp-store'),
					'description'         =>      __('Show widgets of Widget Area Two before footer on WooCommerce Shop Page.', 'wp-store'),
					'type'          =>      'switch',
					'output'        =>      array('Yes', 'No')
					)
				)
			);

	$wp_customize->add_section(
		'wp_store_woocommerce_setting_product',
		array(
			'title' => __('Woocommerce Products Settings', 'wp-store'),
			'priority' => '40',
			'capability' => 'edit_theme_options',
			'panel' => 'wp_store_woocommerce_setting',
			)
		);

		$wp_customize->add_setting(
			'wp_store_woocommerce_setting_product_image',
			array(
				'default' => '',
				'sanitize_callback' => 'esc_url_raw'
				)
			);

		$wp_customize->add_control( 
			new WP_Customize_Image_Control(
				$wp_customize,
				'wp_store_woocommerce_setting_product_image',array(
					'type' => 'image',
					'label'         =>      __('Upload Custom Placeholder', 'wp-store'),
					'description' 	=> 		__('Choose image to add fallback image of products in Shop.','wp-store'),
					'section'       =>      'wp_store_woocommerce_setting_product',
					)
				)
			); 

		$wp_customize->add_setting(
			'wp_store_woocommerce_setting_product_rows',
			array(
				'default' => '3',
				'sanitize_callback' => 'wp_store_sanitize_radio_row'
				)
			);

		$wp_customize->add_control(
			'wp_store_woocommerce_setting_product_rows',
			array(
				'type' => 'radio',
				'label' => __('Products In a Row', 'wp-store'),
				'description' => __('(Note: The no. of products you select are applied to list the products in archive-product page. i.e This setting is applied in Shop page and also in Search results.)', 'wp-store'),
				'section' => 'wp_store_woocommerce_setting_product',
				'choices' => array(        
			            '2' => __('Two', 'wp-store'),
			            '3' => __('Three', 'wp-store'),
			            '4' => __('Four', 'wp-store'),
			            '5' => __('Five', 'wp-store'),
			      	)
				)
			);

		$wp_customize->add_setting(
			'wp_store_woocommerce_setting_product_total',
			array(
				'default' => '12',
				'sanitize_callback' => 'wp_store_sanitize_integer',
				)
			);

		$wp_customize->add_control(
			'wp_store_woocommerce_setting_product_total',
			array(
				'type' => 'number',
				'label' => __('Number of Products', 'wp-store'),
				'description' => __('Enter number of products to be shown in shop.', 'wp-store'),
				'section' => 'wp_store_woocommerce_setting_product',
				)
			);

		