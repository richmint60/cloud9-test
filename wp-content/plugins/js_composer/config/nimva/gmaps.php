<?php
/*
Google Maps Element
*/

	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name' => __('Google Maps', 'Nimva'),
		'base' => 'vc_gmaps',
		'icon' => 'icon-wpb-map-pin',
		'category' => 'Nimva',
		'weight' => 18,
		'description' => __('Map block', 'Nimva'),
		'icon' => get_template_directory_uri() . '/images/vc/gmap.png',
		'params' => array(

		array(
			'type' => 'textfield',
			'heading' => __('Google Map Popup Title', 'Nimva'),
			'param_name' => 'title',
			'description' => __('Example: We Are RockyThemes.', 'Nimva')
		),
		array(
			'type' => 'textarea_safe',
			'heading' => __('Google Map Popup Short Message', 'Nimva'),
			'param_name' => 'message',
			'description' => __('Enter a short message to show in the Popup Marker. Leave blank if you don\'t have any.', 'Nimva')
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Address', 'Nimva' ),
			'param_name' => 'address',
			'description' => __( 'Enter here your map address. Example: New York Ave, Brooklyn, New York', 'Nimva' ),
		),		


		array(
			'type' => 'range',
			'heading' => __( 'Map Height', 'Nimva' ),
			'param_name' => 'size',
			'description' => __('Enter map height in pixels', 'Nimva'),
			'value' => '250',
			'min' => '50',
			'max' => '600',
			'step' => '10',
			'unit' => 'pixels'		
		),

		array(
			'type' => 'dropdown',
			'heading' => __('Map type', 'Nimva'),
			'param_name' => 'type',
			'value' => array(__('Roadmap', 'Nimva') => 'ROADMAP', __('Satellite', 'Nimva') => 'SATELLITE', __('Hybrid', 'Nimva') => 'HYBRID', __('Terrain', 'Nimva') => 'TERRAIN'),
			'description' => __('Select map type.', 'Nimva')
		),

		array(
			'type' => 'dropdown',
			'heading' => __('Map Zoom', 'Nimva'),
			'param_name' => 'zoom',
			'value' => array(__('14 - Default', 'Nimva') => 14, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 15, 16, 17, 18, 19, 20)
		),
		array(
			'type' => 'textfield',
			'heading' => __('Google Map Email Address', 'Nimva'),
			'param_name' => 'email',
			'description' => __('Enter your email address if you want to display it on the google map.', 'Nimva')
		),

		array(
			'type' => 'textfield',
			'heading' => __('Google Map Phone Number', 'Nimva'),
			'param_name' => 'phone',
			'description' => __('Enter your phone number if you want to display it on the google map.', 'Nimva')
		),

		array(
			'type' => 'switch',
			'heading' => __('Show Popup on page load', 'Nimva'),
			'param_name' => 'popup',
			'value' => 'true',
		),

		array(
			'type' => 'switch',
			'heading' => __('Map Scrollwheel', 'Nimva'),
			'param_name' => 'scrollwheel',
			'value' => 'true',
		),

		array(
			'type' => 'switch',
			'heading' => __('Map Pan Controls', 'Nimva'),
			'param_name' => 'pan',
			'value' => 'true',
		),

		array(
			'type' => 'switch',
			'heading' => __('Map Zoom Controls', 'Nimva'),
			'param_name' => 'zoom_control',
			'value' => 'true',
		),

		array(
			'type' => 'switch',
			'heading' => __('Map Type Controls', 'Nimva'),
			'param_name' => 'type_control',
			'value' => 'true',
		),	

		array(
			'type' => 'switch',
			'heading' => __('Map Street View Controls', 'Nimva'),
			'param_name' => 'streetview',
			'value' => 'true',
		),


		vc_map_add_css_animation(),

		array(
			'type' => 'textfield',
			'heading' => __('Extra class name', 'Nimva'),
			'param_name' => 'el_class',
			'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'Nimva')
			)
		),				
		//'js_view' => 'VcTextSeparatorView',		    					
	);
	

