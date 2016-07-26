<?php
/*
Social Links Element
*/

	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
	    'name' => __('Social Links', 'Nimva'),
	    'base' => 'social_links',
	    'class' => '',
	    'weight' => 17,
	    'icon' => 'icon-wpb-social-links',
	    'category' => 'Nimva',
		'description' => __('Add social links', 'Nimva'),
		'icon' => get_template_directory_uri() . '/images/vc/social-icons.png',
	    'params' => array(
		
			array(
				'type' => 'dropdown',
				'heading' => __('Position', 'Nimva'),
				'param_name' => 'position',
				'value' => array(__('Left', 'Nimva') => 'left', __('Center', 'Nimva') => 'center', __('Right', 'Nimva') => 'right'),
				'description' => __( 'Select the alignment of the social links.', 'Nimva' )
			),
			/*
			array(
				'type' => 'switch',
				'heading' => __('Transparent Background', 'Nimva'),
				'param_name' => 'transparent',
				'value' => 'false',
				'description' => __( 'Make the background of the Social Icons transparent.', 'Nimva' )
			),	
			*/
			
			array(
			  'type' => 'colorpicker',
			  'heading' => __('Social Links Color', 'Nimva'),
			  'param_name' => 'color',
			  'value' => '',
			  'description' => __('Select the color of the Social Links.', 'Nimva')
			),
			
			array(
	            'type' => 'textfield',
	            'heading' => __( 'Facebook', 'Nimva' ),
	            'param_name' => 'facebook',
	            'value' => '',
	            'description' => __( 'Provide a link for your Facebook profile.', 'Nimva' ),
				'admin_label' => true
	        ),
			
			array(
	            'type' => 'textfield',
	            'heading' => __( 'Twitter', 'Nimva' ),
	            'param_name' => 'twitter',
	            'value' => '',
	            'description' => __( 'Provide a link for your Twitter profile.', 'Nimva' ),
				'admin_label' => true
	        ),
			
			array(
	            'type' => 'textfield',
	            'heading' => __( 'Linkedin', 'Nimva' ),
	            'param_name' => 'linkedin',
	            'value' => '',
	            'description' => __( 'Provide a link for your LinkedIn profile.', 'Nimva' ),
				'admin_label' => true
	        ),
			
			array(
	            'type' => 'textfield',
	            'heading' => __( 'Google+', 'Nimva' ),
	            'param_name' => 'google',
	            'value' => '',
	            'description' => __( 'Provide a link for your Google+ profile.', 'Nimva' ),
				'admin_label' => true
	        ),
			
			array(
	            'type' => 'textfield',
	            'heading' => __( 'Instagram', 'Nimva' ),
	            'param_name' => 'instagram',
	            'value' => '',
	            'description' => __( 'Provide a link for your Instagram profile.', 'Nimva' ),
				'admin_label' => true
	        ),
			
			array(
	            'type' => 'textfield',
	            'heading' => __( 'Pinteres', 'Nimva' ),
	            'param_name' => 'pinterest',
	            'value' => '',
	            'description' => __( 'Provide a link for your Pinterest profile.', 'Nimva' ),
				'admin_label' => true
	        ),
			
			array(
	            'type' => 'textfield',
	            'heading' => __( 'Flickr', 'Nimva' ),
	            'param_name' => 'flickr',
	            'value' => '',
	            'description' => __( 'Provide a link for your Flickr profile.', 'Nimva' ),
				'admin_label' => true
	        ),
			
			array(
	            'type' => 'textfield',
	            'heading' => __( 'Dribbble', 'Nimva' ),
	            'param_name' => 'dribbble',
	            'value' => '',
	            'description' => __( 'Provide a link for your Dribbble profile.', 'Nimva' ),
				'admin_label' => true
	        ),

	        array(
	            'type' => 'textfield',
	            'heading' => __( 'Vimeo', 'Nimva' ),
	            'param_name' => 'vimeo',
	            'value' => '',
	            'description' => __( 'Provide a link for your Vimeo profile.', 'Nimva' ),
				'admin_label' => true
	        ),
			
			array(
	            'type' => 'textfield',
	            'heading' => __( 'Youtube', 'Nimva' ),
	            'param_name' => 'youtube',
	            'value' => '',
	            'description' => __( 'Provide a link for your youtube profile.', 'Nimva' ),
				'admin_label' => true
	        ),
			
			array(
	            'type' => 'textfield',
	            'heading' => __( 'Skype', 'Nimva' ),
	            'param_name' => 'skype',
	            'value' => '',
	            'description' => __( 'Provide a link for your Skype profile.', 'Nimva' ),
				'admin_label' => true
	        ),
			
			array(
	            'type' => 'textfield',
	            'heading' => __( 'Behance', 'Nimva' ),
	            'param_name' => 'behance',
	            'value' => '',
	            'description' => __( 'Provide a link for your Behance profile.', 'Nimva' ),
				'admin_label' => true
	        ),
			
			array(
	            'type' => 'textfield',
	            'heading' => __( 'Tumblr', 'Nimva' ),
	            'param_name' => 'tumblr',
	            'value' => '',
	            'description' => __( 'Provide a link for your Tumblr profile.', 'Nimva' ),
				'admin_label' => true
	        ),
			
			vc_map_add_css_animation(),
			
			array(
	            'type' => 'textfield',
	            'heading' => __('Extra class name', 'Nimva'),
	            'param_name' => 'el_class',
	            'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'Nimva')
	        ),
		    			  
		),
				//'js_view' => 'VcTextSeparatorView',		    					
	);
	

