<?php
	//social Settings section
	   	$wp_customize->add_section(
		   	'wp_store_social_setting_section', 
		   	array(
		       	'priority' => 70,
				'capability' => 'edit_theme_options',
		       	'title' => __('Social Settings', 'wp-store'),		       	
				)
			);
		    
		    //socail setting in header
		    $wp_customize->add_setting(
		    	'wp_store_social_setting_section_option_header',
		    	 array(
			      	'default' => '0',
			      	'capability' => 'edit_theme_options',
			      	'sanitize_callback' => 'wp_store_sanitize_integer',
				   	)
			   	);

		   	$wp_customize->add_control(
		   		new Wp_store_WP_Customize_Switch_Control(
		   			$wp_customize,
				   	'wp_store_social_setting_section_option_header', 
				   	array(
				      	'type' => 'switch',
				      	'label' => __('Enable Disable Social Icons in Header', 'wp-store'),
				      	'section' => 'wp_store_social_setting_section',
				      	'setting' => 'wp_store_social_setting_section_option_header',		
				      	)		      	
				   	)
			   	);
		    
		    $wp_customize->add_setting(
		    	'wp_store_social_setting_section_option_footer', 
		    	array(
		      		'default' => '0',
		      		'capability' => 'edit_theme_options',
		      		'sanitize_callback' => 'wp_store_sanitize_integer',
		   			)
		    	);

		   	$wp_customize->add_control(
		   		new Wp_store_WP_Customize_Switch_Control(
		   			$wp_customize,
			   		'wp_store_social_setting_section_option_footer', 
			   		array(
				      	'type' => 'switch',
				      	'label' => __('Enable Disable Social Icons in Footer', 'wp-store'),
				      	'section' => 'wp_store_social_setting_section',
				      	'setting' => 'wp_store_social_setting_section_option_footer',				      	
		     	 		)
		   			)
		   		);	
		   
		   //social facebook link
		   	$wp_customize->add_setting(
			   	'wp_store_social_facebook', 
			   	array(
					'default' => '#',
			        'sanitize_callback' => 'esc_url_raw',
					)
			   	);
		    
		    $wp_customize->add_control(
		    	'wp_store_social_facebook',
		    	array(
			        'type' => 'text',
			        'label' => __('Facebook','wp-store'),
			        'section' => 'wp_store_social_setting_section',
			        'setting' => 'wp_store_social_facebook'
			    	)
		    	);
		    
		    //social twitter link
		   	$wp_customize->add_setting(
		   		'wp_store_social_twitter', 
		   		array(
					'default' => '#',
			        'sanitize_callback' => 'esc_url_raw',
					)
		   		);
		    
		    $wp_customize->add_control(
		    	'wp_store_social_twitter',
		    	array(
			        'type' => 'text',
			        'label' => __('Twitter','wp-store'),
			        'section' => 'wp_store_social_setting_section',
			        'setting' => 'wp_store_social_twitter'
		    		)
		    	);
		    
		    //social googleplus link
		   	$wp_customize->add_setting(
			   	'wp_store_social_googleplus', 
			   	array(
					'default' => '#',
			        'sanitize_callback' => 'esc_url_raw',
					)
			   	);
		    
		    $wp_customize->add_control(
		    	'wp_store_social_googleplus',
		    	array(
			        'type' => 'text',
			        'label' => __('Google Plus','wp-store'),
			        'section' => 'wp_store_social_setting_section',
			        'setting' => 'wp_store_social_googleplus'
			    	)
		    	);
		    
		     //social youtube link
		   	$wp_customize->add_setting(
		   		'wp_store_social_youtube', 
		   		array(
					'default' => '#',
			        'sanitize_callback' => 'esc_url_raw',
					)
		   		);
		    
		    $wp_customize->add_control(
		    	'wp_store_social_youtube',
		    	array(
			        'type' => 'text',
			        'label' => __('YouTube','wp-store'),
			        'section' => 'wp_store_social_setting_section',
			        'setting' => 'wp_store_social_youtube'
			    	)
		    	);
		    
		     //social pinterest link
		   	$wp_customize->add_setting(
			   	'wp_store_social_pinterest', 
			   	array(
					'default' => '#',
			        'sanitize_callback' => 'esc_url_raw',
					)
			   	);
		    
		    $wp_customize->add_control(
		    	'wp_store_social_pinterest',
		    	array(
			        'type' => 'text',
			        'label' => __('Pinterest','wp-store'),
			        'section' => 'wp_store_social_setting_section',
			        'setting' => 'wp_store_social_pinterest'
			    	)
		    	);
		    
		    //social linkedin link
		   	$wp_customize->add_setting(
		   		'wp_store_social_linkedin', 
		   		array(
					'default' => '',
			        'sanitize_callback' => 'esc_url_raw',
					)
		   		);
		    
		    $wp_customize->add_control(
		    	'wp_store_social_linkedin',
		    	array(
			        'type' => 'text',
			        'label' => __('Linkedin','wp-store'),
			        'section' => 'wp_store_social_setting_section',
			        'setting' => 'wp_store_social_linkedin'
		    		)
		    	);
		    
		    
		    //social vimeo link
		   	$wp_customize->add_setting(
		   		'wp_store_social_vimeo', 
		   		array(
					'default' => '',
			        'sanitize_callback' => 'esc_url_raw',
					)
		   		);
		    
		    $wp_customize->add_control(
		    	'wp_store_social_vimeo',
		    	array(
			        'type' => 'text',
			        'label' => __('Vimeo','wp-store'),
			        'section' => 'wp_store_social_setting_section',
			        'setting' => 'wp_store_social_vimeo'
		    		)
		    	);
		    
		    //social instagram link
		   	$wp_customize->add_setting(
		   		'wp_store_social_instagram', 
		   		array(
					'default' => '',
			        'sanitize_callback' => 'esc_url_raw',
					)
		   		);
		    
		    $wp_customize->add_control(
		    	'wp_store_social_instagram',
		    	array(
			        'type' => 'text',
			        'label' => __('Instagram','wp-store'),
			        'section' => 'wp_store_social_setting_section',
			        'setting' => 'wp_store_social_instagram'
			    	)
		    	);

		    //social skype link
		   	$wp_customize->add_setting(
		   		'wp_store_social_skype', 
		   		array(
					'default' => '',
			        'sanitize_callback' => 'esc_url_raw',
					)
		   		);
		    
		    $wp_customize->add_control(
		    	'wp_store_social_skype',
		    	array(
			        'type' => 'text',
			        'label' => __('Skype','wp-store'),
			        'section' => 'wp_store_social_setting_section',
			        'setting' => 'wp_store_social_skype'
			    	)
		    	);