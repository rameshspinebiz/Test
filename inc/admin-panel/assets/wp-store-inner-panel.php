<?php
//Adding the Inner Pages Panel

$wp_customize->add_panel(
	'wp_store_innerpage_setting',
	array(
		'priority' => '50',
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __('Innerpage Settings','wp-store'),
		'description' => __('Setup the Inner page settings.','wp-store')
		)
	);

	// Blog Page Setting
	$wp_customize->add_section(
	    'wp_store_innerpage_setting_blog_page',
	    array(
	        'title'         =>  __('Blog Page Setting','wp-store'),
	        'capability'	=> 	'edit_theme_options',
	        'priority'      =>  10,            
	        'panel' 		=> 	'wp_store_innerpage_setting',
	        )
	    );

		$wp_customize->add_setting(
			'wp_store_innerpage_setting_blog_page_slider',
			array(
				'default' =>  '0',
				'sanitize_callback'     =>  'wp_store_sanitize_checkbox'
				)
			);

		$wp_customize->add_control(
			new Wp_store_WP_Customize_Switch_Control(
				$wp_customize,
				'wp_store_innerpage_setting_blog_page_slider',
				array(
					'section'       =>      'wp_store_innerpage_setting_blog_page',
					'label'         =>      __('Enable Home Slider', 'wp-store'),
					'description'         =>      __('Show Home Slider on Blog Page.', 'wp-store'),
					'type'          =>      'switch',
					'output'        =>      array('Yes', 'No')
					)
				)
			);

		$wp_customize->add_setting(
			'wp_store_innerpage_setting_blog_page_cta',
			array(
				'default' =>  '0',
				'sanitize_callback'     =>  'wp_store_sanitize_checkbox'
				)
			);

		$wp_customize->add_control(
			new Wp_store_WP_Customize_Switch_Control(
				$wp_customize,
				'wp_store_innerpage_setting_blog_page_cta',array(
					'section'       =>      'wp_store_innerpage_setting_blog_page',
					'label'         =>      __('Enable widget before footer', 'wp-store'),
					'description'         =>      __('Show widgets of Widget Area Two before footer on Blog Page.', 'wp-store'),
					'type'          =>      'switch',
					'output'        =>      array('Yes', 'No')
					)
				)
			);

		$wp_customize->add_setting(
			'wp_store_innerpage_setting_blog_page_layout',
			array(
				'default'=>'right-sidebar',
				'sanitize_callback' => 'wp_store_sanitize_radio_sidebar'				
				)
			);

		$wp_customize->add_control(
			'wp_store_innerpage_setting_blog_page_layout',
			array(
				'type' => 'radio',
				'label' => __('Page Layout', 'wp-store'),
				'description' => __('Choose layout for Blog page', 'wp-store'),
				'section' => 'wp_store_innerpage_setting_blog_page',
				'choices' => array(
                  	'left-sidebar' =>  __('Left Sidebar','wp-store'),
                  	'right-sidebar' =>  __('Right Sidebar','wp-store'),
                  	'both-sidebar' =>  __('Both Sidebar','wp-store'),
                  	'no-sidebar' =>  __('No Sidebar','wp-store'),
                  	)
				)
			);

	    $wp_customize->add_setting(
	        'wp_store_innerpage_setting_blog_post_layout',
	        array(
	            'default'           =>  'large-image',
	            'sanitize_callback' =>  'wp_store_sanitize_blog_layout',
	            )
	        );

	    $wp_customize->add_control(
	        'wp_store_innerpage_setting_blog_post_layout',
	        array(
	            'priority'      =>  10,  
	            'type'          =>  'radio',
	            'label' 		=> 	__('Post Layout','wp-store'),
	            'description'   =>  __('Choose Blog Post Layout','wp-store'),
	            'section'       =>  'wp_store_innerpage_setting_blog_page',
	            'choices'        =>  array(
                  	'large-image' => __('Blog with Large Image', 'wp-store'),
                  	'medium-image' => __('Blog with Medium Image', 'wp-store'),
                  	'alternate-image' => __('Blog with Alternate Medium Image', 'wp-store'),
                  	)
	            )                   
	        );

	    $wp_customize->add_setting(
	        'wp_store_innerpage_setting_blog_page_readmore',
	        array(
	            'default'           =>  __('Read More','wp-store'),
	            'sanitize_callback' =>  'wp_store_sanitize_text',
	            )
	        );

	    $wp_customize->add_control(
	        'wp_store_innerpage_setting_blog_page_readmore',
	        array(
	            'priority'      =>  20,
	            'label'         =>  __('Read more text','wp-store'),
	            'section'       =>  'wp_store_innerpage_setting_blog_page',
	            'setting'       =>  'wp_store_innerpage_setting_blog_page_readmore',
	            'type'          =>  'text',  
	            )                                     
	        );
		
	//Single Page
	$wp_customize->add_section(
		'wp_store_innerpage_setting_single_page',
		array(
			'title' => __('Single Page Settings', 'wp-store'),
			'priority' => '20',
			'panel' => 'wp_store_innerpage_setting',
			'capability'=> 'edit_theme_options',
			)
		);

		$wp_customize->add_setting(
			'wp_store_innerpage_setting_single_page_slider',
			array(
				'default' =>  '0',
				'sanitize_callback'     =>  'wp_store_sanitize_checkbox'
				)
			);

		$wp_customize->add_control(
			new Wp_store_WP_Customize_Switch_Control(
				$wp_customize,
				'wp_store_innerpage_setting_single_page_slider',array(
					'section'       =>      'wp_store_innerpage_setting_single_page',
					'label'         =>      __('Enable Home Slider', 'wp-store'),
					'description'         =>      __('Show Home Slider on Single Page.', 'wp-store'),
					'type'          =>      'switch',
					'output'        =>      array('Yes', 'No')
					)
				)
			);

		$wp_customize->add_setting(
			'wp_store_innerpage_setting_single_page_cta',
				array(
					'default' =>  '0',
					'sanitize_callback'     =>  'wp_store_sanitize_checkbox'
					)
				);

		$wp_customize->add_control(
			new Wp_store_WP_Customize_Switch_Control(
				$wp_customize,
				'wp_store_innerpage_setting_single_page_cta',
				array(
					'section'       =>      'wp_store_innerpage_setting_single_page',
					'label'         =>      __('Enable widget before footer', 'wp-store'),
					'description'         =>      __('Show widgets of Widget Area Two before footer on Single Page.', 'wp-store'),
					'type'          =>      'switch',
					'output'        =>      array('Yes', 'No')
					)
				)
			);

		$wp_customize->add_setting(
			'wp_store_innerpage_setting_single_page_layout',
			array(
				'default'=>'right-sidebar',
				'sanitize_callback' => 'wp_store_sanitize_radio_sidebar'				
				)
			);

		$wp_customize->add_control(
			'wp_store_innerpage_setting_single_page_layout',
			array(
				'type' => 'radio',
				'label' => __('Single Page Layout', 'wp-store'),
				'description' => __('Choose layout for single page landing webpage', 'wp-store'),
				'section' => 'wp_store_innerpage_setting_single_page',
				'choices' => array(
                  	'left-sidebar' =>  __('Left Sidebar','wp-store'),
                  	'right-sidebar' =>  __('Right Sidebar','wp-store'),
                  	'both-sidebar' =>  __('Both Sidebar','wp-store'),
                  	'no-sidebar' =>  __('No Sidebar','wp-store'),
                  	)
				)
			);

		//Single Post
	$wp_customize->add_section(
		'wp_store_innerpage_setting_single_post',
		array(
			'title' => __('Single Post Settings', 'wp-store'),
			'priority' => '30',
			'panel' => 'wp_store_innerpage_setting'
			)
		);

		$wp_customize->add_setting(
			'wp_store_innerpage_setting_single_post_slider',
			array(
				'default' =>  '0',
				'sanitize_callback'     =>  'wp_store_sanitize_checkbox'
				)
			);

		$wp_customize->add_control(
			new Wp_store_WP_Customize_Switch_Control(
				$wp_customize,
				'wp_store_innerpage_setting_single_post_slider',array(
					'section'       =>      'wp_store_innerpage_setting_single_post',
					'label'         =>      __('Enable Home Slider', 'wp-store'),
					'description'         =>      __('Show Home Slider on Single Post.', 'wp-store'),
					'type'          =>      'switch',
					'output'        =>      array('Yes', 'No')
					)
				)
			);

		$wp_customize->add_setting(
			'wp_store_innerpage_setting_single_post_cta',
			array(
				'default' =>  '0',
				'sanitize_callback'     =>  'wp_store_sanitize_checkbox'
				)
			);

		$wp_customize->add_control(
			new Wp_store_WP_Customize_Switch_Control(
				$wp_customize,
				'wp_store_innerpage_setting_single_post_cta',array(
					'section'       =>      'wp_store_innerpage_setting_single_post',
					'label'         =>      __('Enable widget before footer', 'wp-store'),
					'description'         =>      __('Show widgets of Widget Area Two before footer on Single Post.', 'wp-store'),
					'type'          =>      'switch',
					'output'        =>      array('Yes', 'No')
					)
				)
			);

		//single post page
		$wp_customize->add_setting(
			'wp_store_innerpage_setting_single_post_layout',
			array(
				'default' => 'right-sidebar',
				'sanitize_callback' => 'wp_store_sanitize_radio_sidebar'
				)
			);

		$wp_customize->add_control( 
			'wp_store_innerpage_setting_single_post_layout',
			array(
				'type' => 'radio',
				'label' => __('Single Post Layout', 'wp-store'),
				'description' => __('Choose layout for single post landing webpage', 'wp-store'),
				'section' => 'wp_store_innerpage_setting_single_post',
				'choices' => array(
                  	'left-sidebar' =>  __('Left Sidebar','wp-store'),
                  	'right-sidebar' =>  __('Right Sidebar','wp-store'),
                  	'both-sidebar' =>  __('Both Sidebar','wp-store'),
                  	'no-sidebar' =>  __('No Sidebar','wp-store'),
                  	)
				)				
			);

	//Archive Pages
	$wp_customize->add_section(
		'wp_store_innerpage_setting_archive',
		array(
			'title' => __('Archive Pages Settings', 'wp-store'),
			'priority' => '40',
			'panel' => 'wp_store_innerpage_setting'
			)
		);

		$wp_customize->add_setting(
			'wp_store_innerpage_setting_archive_slider',
			array(
				'default' =>  '0',
				'sanitize_callback'     =>  'wp_store_sanitize_checkbox'
				)
			);

		$wp_customize->add_control(
			new Wp_store_WP_Customize_Switch_Control(
				$wp_customize,
				'wp_store_innerpage_setting_archive_slider',array(
					'section'       =>      'wp_store_innerpage_setting_archive',
					'label'         =>      __('Enable Home Slider', 'wp-store'),
					'description'         =>      __('Show Home Slider on Archive Page.', 'wp-store'),
					'type'          =>      'switch',
					'output'        =>      array('Yes', 'No')
					)
				)
			);

		$wp_customize->add_setting(
			'wp_store_innerpage_setting_archive_cta',
			array(
				'default' =>  '0',
				'sanitize_callback'     =>  'wp_store_sanitize_checkbox'
				)
			);

		$wp_customize->add_control(
			new Wp_store_WP_Customize_Switch_Control(
				$wp_customize,
				'wp_store_innerpage_setting_archive_cta',array(
					'section'       =>      'wp_store_innerpage_setting_archive',
					'label'         =>      __('Enable widget before footer', 'wp-store'),
					'description'         =>      __('Show widgets of Widget Area Two before footer on Archive Page.', 'wp-store'),
					'type'          =>      'switch',
					'output'        =>      array('Yes', 'No')
					)
				)
			);


		//archive pages layout
		$wp_customize->add_setting(
			'wp_store_innerpage_setting_archive_layout',
			array(
				'default' => 'right-sidebar',
				'sanitize_callback' => 'wp_store_sanitize_radio_sidebar'
				)
			);
		
		$wp_customize->add_control(
			'wp_store_innerpage_setting_archive_layout',array(
				'type' => 'radio',
				'label' => __('Archive Page Layout', 'wp-store'),
				'description' => __('Choose layout for archive pages landing webpage', 'wp-store'),
				'section' => 'wp_store_innerpage_setting_archive',
				'choices' => array(
	              	'left-sidebar' =>  __('Left Sidebar','wp-store'),
	              	'right-sidebar' =>  __('Right Sidebar','wp-store'),
	              	'both-sidebar' =>  __('Both Sidebar','wp-store'),
	              	'no-sidebar' =>  __('No Sidebar','wp-store'),
	              	)

				)
		 	);

	    $wp_customize->add_setting(
	        'wp_store_innerpage_setting_archive_post_layout',
	        array(
	            'default'           =>  'large-image',
	            'sanitize_callback' =>  'wp_store_sanitize_archive_layout',
	            )
	        );

	    $wp_customize->add_control(
	        'wp_store_innerpage_setting_archive_post_layout',
	        array(
	            'priority'      =>  10,  
	            'type'          =>  'radio',
	            'label' 		=> 	__('Post Layout','wp-store'),
	            'description'   =>  __('Choose Archive Post Layout','wp-store'),
	            'section'       =>  'wp_store_innerpage_setting_archive',
	            'choices'        =>  array(
	                'large-image' => __('Archive with Large Image', 'wp-store'),
                  	'medium-image' => __('Archive with Medium Image', 'wp-store'),
                  	'alternate-image' => __('Archive with Alternate Medium Image', 'wp-store'),
	                )
	            )                   
	        );

	    $wp_customize->add_setting(
	        'wp_store_innerpage_setting_archive_readmore',
	        array(
	            'default'           =>  __('Read More','wp-store'),
	            'sanitize_callback' =>  'wp_store_sanitize_text',
	            )
	        );

	    $wp_customize->add_control(
	        'wp_store_innerpage_setting_archive_readmore',
	        array(
	            'label'         =>  __('Read more text','wp-store'),
	            'section'       =>  'wp_store_innerpage_setting_archive',
	            'setting'       =>  'wp_store_innerpage_setting_archive_readmore',
	            'type'          =>  'text',  
	            )                                     
	        );