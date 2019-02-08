<?php
//Payment Partners logo
	$wp_customize->add_panel(
		'wp_store_paymentlogo_setting',
		array(
			'priority' => '90',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __('Payment Logo Setting', 'wp-store' ),
			'description' => __( 'Add image of Payment Partner Logo. These images are diplayed on Footer.', 'wp-store' ),
			)
		);

	$wp_customize->add_section(
		'wp_store_paymentlogo_setting_image',
		array(
			'title' => __('Payment Logo Images', 'wp-store'),
			'priority' => '2',
			'panel' => 'wp_store_paymentlogo_setting',
			)
		);

		$wp_customize->add_setting(
			'wp_store_paymentlogo_setting_image_one',
			array(
				'default' => '',
				'sanitize_callback' => 'esc_url_raw'
				)
			);

		$wp_customize->add_control( 
			new WP_Customize_Image_Control(
				$wp_customize,
				'wp_store_paymentlogo_setting_image_one',
				array(
					'type'          =>      'image',
					'label'         =>      __('Upload Payment Logo 1 Image', 'wp-store'),
					'section'       =>      'wp_store_paymentlogo_setting_image',
					)
				)
			);

		$wp_customize->add_setting(
			'wp_store_paymentlogo_setting_image_two',
			array(
				'default' => '',
				'sanitize_callback' => 'esc_url_raw'
				)
			);

		$wp_customize->add_control( 
			new WP_Customize_Image_Control(
				$wp_customize,
				'wp_store_paymentlogo_setting_image_two',
				array(
					'type' => 'image',
					'label' => __('Upload Payment Logo 2 Image', 'wp-store'),
					'section' => 'wp_store_paymentlogo_setting_image',
					)
				)
			);

		$wp_customize->add_setting(
			'wp_store_paymentlogo_setting_image_three',
			array(
				'default' => '',
				'sanitize_callback' => 'esc_url_raw'
				)
			);

		$wp_customize->add_control( 
			new WP_Customize_Image_Control(
				$wp_customize,
				'wp_store_paymentlogo_setting_image_three',
				array(
					'type' => 'image',
					'label' => __('Upload Payment Logo 3 Image', 'wp-store'),
					'section' => 'wp_store_paymentlogo_setting_image',
					)
				)
			);

		$wp_customize->add_setting(
			'wp_store_paymentlogo_setting_image_four',
			array(
				'default' => '',
				'sanitize_callback' => 'esc_url_raw'
				)
			);

		$wp_customize->add_control( 
			new WP_Customize_Image_Control(
				$wp_customize,
				'wp_store_paymentlogo_setting_image_four',
				array(
					'type' => 'image',
					'label' => __('Upload Payment Logo 4 Image', 'wp-store'),
					'section' => 'wp_store_paymentlogo_setting_image',
					)
				)
			);

	//SSL adn other Seal images
	$wp_customize->add_section(
		'wp_store_paymentlogo_setting_other_image',
		array(
			'title' => __('Other Logo Images', 'wp-store'),
			'priority' => '2',
			'panel' => 'wp_store_paymentlogo_setting',
			)
		);

		$wp_customize->add_setting(
			'wp_store_paymentlogo_setting_other_image_one',
			array(
				'default' => '',
				'sanitize_callback' => 'esc_url_raw'
				)
			);

		$wp_customize->add_control( 
			new WP_Customize_Image_Control(
				$wp_customize,
				'wp_store_paymentlogo_setting_other_image_one',
				array(
					'type' => 'image',
					'label' => __('Upload SSL Seal Image', 'wp-store'),
					'section' => 'wp_store_paymentlogo_setting_other_image',
					)
				)
			); 

		$wp_customize->add_setting(
			'wp_store_paymentlogo_setting_other_image_two',
			array(
				'default' => '',
				'sanitize_callback' => 'esc_url_raw'
				)
			);

		$wp_customize->add_control( 
			new WP_Customize_Image_Control(
			$wp_customize,
				'wp_store_paymentlogo_setting_other_image_two',
				array(
					'type' => 'image',
					'label' => __('Upload Other Seal 1 Image', 'wp-store'),
					'section' => 'wp_store_paymentlogo_setting_other_image',
					
					)
				)
			);

		$wp_customize->add_setting(
			'wp_store_paymentlogo_setting_other_image_three',
			array(
				'default' => '',
				'sanitize_callback' => 'esc_url_raw'
				)
			);

		$wp_customize->add_control( 
			new WP_Customize_Image_Control(
			$wp_customize,
				'wp_store_paymentlogo_setting_other_image_three',
				array(
					'type' => 'image',
					'label' => __('Upload Other Seal 2 Image', 'wp-store'),
					'section' => 'wp_store_paymentlogo_setting_other_image',
					)
				)
			);
