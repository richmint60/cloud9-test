<?php
/*
Employee Element
*/
	global $employees;

	$emp_entries = get_posts( 'post_type=employees&orderby=title&numberposts=-1&order=ASC' );

	if ( $emp_entries != null && !empty( $emp_entries ) ) {
	    foreach ( $emp_entries as $key => $entry ) {
	        $employees[$entry->ID] = $entry->post_title;
	    }
	}

	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
	    'name' => __('Employee', 'Nimva'),
	    'base' => 'employee',
	    'class' => '',
	    'weight' => 13,
	    'icon' => 'icon-wpb-employee',
	    'category' => 'Nimva',
		'description' => __('Add Employees profiles', 'Nimva'),
		'icon' => get_template_directory_uri() . '/images/vc/employee.png',
	    'params' => array(
			
			array(
				'type' => 'range',
				'heading' => __( 'Columns', 'Nimva' ),
				'param_name' => 'columns',
				'description' => __('How many columns to use to display employees?', 'Nimva'),
				'value' => '4',
				'min' => '1',
				'max' => '4',
				'step' => '1',
				'unit' => 'columns',
				'admin_label' => true			
			),

	        array(
				'type' => 'range',
				'heading' => __( 'Employees Count', 'Nimva' ),
				'param_name' => 'count',
				'description' => __('How many Employees would you like to show? (-1 means unlimited)', 'Nimva'),
				'value' => '10',
				'min' => '-1',
				'max' => '50',
				'step' => '1',
				'unit' => 'employees',
				'admin_label' => true			
			),
	        array(
	            'type' => 'multiselect',
	            'heading' => __( 'Select specific Employees', 'Nimva' ),
	            'param_name' => 'employees',	            
	            'value' => $employees,
	            'description' => ''
	        ),	
			array(
			  'type' => 'switch',
			  'param_name' => 'bio',
			  'value' => 'true',
			  'heading' => __('Show/hide employees \'About\' description.', 'Nimva'),
			),	
			array(
			  'type' => 'switch',
			  'param_name' => 'profiles',
			  'value' => 'true',
			  'heading' => __('Show/hide employees social networking profiles.', 'Nimva'),
			),
			
			array(
			  'type' => 'colorpicker',
			  'heading' => __('Social Newtorks color', 'Nimva'),
			  'param_name' => 'color',
			  'description' => __('Select a custom color for the social network profiles. ', 'Nimva'),		  
			),		
			
			vc_map_add_css_animation(),
				
	        array(
	            'type' => 'textfield',
	            'heading' => __('Extra class name', 'Nimva'),
	            'param_name' => 'el_class',
	            'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'Nimva')
	        ),
	    ),
	);
	

