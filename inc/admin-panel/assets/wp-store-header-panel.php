<?php
//Add New Panel for topheader Setups
	$wp_customize->add_panel(
		'wp_store_header_setting',
		array(
			'priority' => '20',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Header Settings', 'wp-store' ),
			'description' => __( 'Setup header of the site.', 'wp-store' ),
			)
		);

		$wp_customize->add_section(
			'wp_store_header_setting_ticker',
			array(
				'title'           =>      __('Ticker Setting', 'wp-store'),
				'priority'        =>      '2',
				'panel' => 'wp_store_header_setting'
				)
			);

			$wp_customize->add_setting(
				'wp_store_header_setting_ticker_option',
				array(
					'default' =>  '0',
					'sanitize_callback'     =>  'wp_store_sanitize_checkbox'
					)
				);

			$wp_customize->add_control(
				new Wp_store_WP_Customize_Switch_Control(
					$wp_customize,
					'wp_store_header_setting_ticker_option',
					array(
						'section'       =>      'wp_store_header_setting_ticker',
						'label'         =>      __('Enable Ticker in Header', 'wp-store'),
						'type'          =>      'switch',
						)
					)
				);

			//ticker title
			$wp_customize->add_setting(
				'wp_store_header_setting_ticker_title',
				array(
					'default'       =>      __('Latest','wp-store'),
					'sanitize_callback'     =>  'wp_store_sanitize_text',
					'transport'		=>	'postMessage',
					)
				);

			$wp_customize->add_control(
				'wp_store_header_setting_ticker_title',
				array(
					'section'       =>      'wp_store_header_setting_ticker',
					'label'         =>      __('Ticker Title', 'wp-store'),
					'type'          =>      'text'
					)
				);

			//select category for ticker
			$wp_customize->add_setting(
				'wp_store_header_setting_ticker_category',
				array(
					'default' => '0',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'wp_store_sanitize_integer'
					)
				);

			$wp_customize->add_control( 
				'wp_store_header_setting_ticker_category', 
				array(
					'type'	=> 'select',
					'label' => __('Select a category to show in ticker','wp-store'),
					'description' => __('Note: Parent Category are only listed in dropdown.','wp-store'),
					'section' => 'wp_store_header_setting_ticker',
					'choices'	=>	wp_store_parent_category_lists(),
					)
				);
	

	// Header Search option
		$wp_customize->add_section(
			'wp_store_header_setting_search',
			array(
				'title' => __('Header Search Setting','wp-store'),
				'priority' => '25',
				'panel' => 'wp_store_header_setting'
				)
			);
			$wp_customize->add_setting(
				'wp_store_header_setting_search_option',
				array(
					'default' => '0',
					'sanitize_callback' => 'wp_store_sanitize_checkbox'
					)
				);
			$wp_customize->add_control(
				new Wp_store_WP_Customize_Switch_Control(
					$wp_customize,
					'wp_store_header_setting_search_option',
					array(
						'type' => 'switch',
						'label' => __('Check to Show Search in Header','wp-store'),
						'section' => 'wp_store_header_setting_search'
						)
					)
				);

			//Search Box Placeholder
	   	    $wp_customize->add_setting(
		    	'wp_store_header_setting_search_placeholder', 
		    	array(
					'default' => __('Search...','wp-store'),
		        	'sanitize_callback' => 'wp_store_sanitize_text',
		        	'transport' => 'postMessage',
					)
		    	);
		    
		    $wp_customize->add_control(
		    	'wp_store_header_setting_search_placeholder',
		    	array(
		    		'label' 	=>	__('Enter Search Placeholder','wp-store'),
			        'type' => 'text',
			        'section' => 'wp_store_header_setting_search',
			        'setting' => 'wp_store_header_settings_search_placeholder',
			    	)
		    	);
		    
    $wp_customize->add_section(
    	'wp_store_header_setting_callto',
    	array(
			'title' => __('Call-To','wp-store'),
			'priority' => '10',
			'panel' => 'wp_store_header_setting'
			)
    	);
		$wp_customize->add_setting(
			'wp_store_header_setting_callto_text',
			array(
				'default' => '',
				'sanitize_callback' => 'wp_store_sanitize_text',
				)
			);
		$wp_customize->add_control(
			'wp_store_header_setting_callto_text',
			array(
				'type' => 'textarea',
				'label' => __('Call To Content','wp-store'),
				'description' => __('Enter text or HTML for call to action','wp-store'),
				'section' => 'wp_store_header_setting_callto'
				)
			);

	    //logo Alignment
	   	$wp_customize->add_section(
	   		'wp_store_header_settings_logo', 
	   		array(
		       	'priority' => 50,
		       	'title' => __('Logo Alignment', 'wp-store'),
		       	'panel' => 'wp_store_header_setting'
				)
	   		);

		    $wp_customize->add_setting(
		    	'wp_store_header_settings_logo_alignment', 
		    	array(
				    'default' => 'left',
				    'capability' => 'edit_theme_options',
				    'sanitize_callback' => 'wp_store_sanitize_radio_alignment_logo',
		   			)
		    	);

		   	$wp_customize->add_control(
			   	'wp_store_header_settings_logo_alignment', 
			   	array(
			      	'type' => 'radio',
			      	'label' => __('Choose the layout that you want', 'wp-store'),
			      	'section' => 'wp_store_header_settings_logo',
			      	'setting' => 'wp_store_header_settings_logo_alignment',
			      	'choices' => array(
				        'left'=>__('Left', 'wp-store'),
				        'center'=>__('Center', 'wp-store'),
				        'right'=>__('Right', 'wp-store')
			      		)
			   		)
			   	);
