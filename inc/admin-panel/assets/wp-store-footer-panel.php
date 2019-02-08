<?php
$wp_customize->add_panel(
	'wp_store_footer_setting',
	array(
		'priority' => '60',
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Footer Settings', 'wp-store' ),
		'description' => __( 'Setup footer of the site.', 'wp-store' ),
		)
	);

		$wp_customize->add_section(
			'wp_store_footer_setting_footer_menu',
			array(
				'title'           =>      __('Footer Menu', 'wp-store'),
				'priority'        =>      '2',
				'panel' => 'wp_store_footer_setting'
				)
			);
			
		$wp_customize->add_section(
			'wp_store_footer_setting_footer_copyright',
			array(
				'title'           =>      __('Footer Copyright', 'wp-store'),
				'priority'        =>      '2',
				'panel' => 'wp_store_footer_setting'
				)
			);

			$wp_customize->add_setting(
				'wp_store_footer_setting_footer_copyright_text',array(
					'default' => '',
					'transport' => 'postMessage',
					'sanitize_callback' => 'wp_store_sanitize_text',
					)
				);

			$wp_customize->add_control(
				'wp_store_footer_setting_footer_copyright_text',
				array(
					'type' => 'textarea',
					'label' => __('Footer Copyright Area Text', 'wp-store'),
					'description' => __('Enter text or Html to show in the footer.', 'wp-store'),
					'section' => 'wp_store_footer_setting_footer_copyright',
					)
				);