<?php
/*
Separator Element
*/

	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
			  'name'		=> __('Separator', 'Nimva'),
			  'base'		=> 'vc_separator',
			  'icon'		=> 'icon-wpb-ui-separator',
			  'category'  => 'Nimva',
			  'weight' => 26,
			  'description' => __('Add a horizontal separator', 'Nimva'),
			  'icon' => get_template_directory_uri() . '/images/vc/separator.png',
			  'params' => array(
			  	array(
			      'type' => 'dropdown',
			      'heading' => __('Style', 'Nimva'),
			      'param_name' => 'style',
			      'value' => array( __('Dotted', 'Nimva') => 'dotted', 
				  					__('Double Dotted', 'Nimva') => 'double_dotted', 
									__('Solid', 'Nimva') => 'solid', 
									__('Double Solid', 'Nimva') => 'double_solid',
									__('Dashed', 'Nimva') => 'dashed',
									__('Double Dashed', 'Nimva') => 'double_dashed',
									__('Shadow', 'Nimva') => 'shadow_line',
									__('Blank Divider', 'Nimva') => 'blank_divider'
							), 
									
			      'description' => __('Select the style of the separator.', 'Nimva')
			    ),
				array(
			      'type' => 'colorpicker',
			      'class' => '',
			      'heading' => __('Divider color', 'Nimva'),
			      'param_name' => 'divider_color',
			      'value' => '', //Default White color
			      'description' => __('Choose a color for the divider.', 'Nimva')
			    ),
				array(
			    	'type' => 'range',
			        'heading' => __( 'Padding Top', 'Nimva' ),
			        'param_name' => 'paddingtop',
			        'value' => '20',
			        'min' => '0',
			        'max' => '200',
			        'step' => '1',
			        'unit' => 'px',
			        'description' => __( 'Select a value for the top margin. ', 'Nimva' )
			    ),
				array(
			    	'type' => 'range',
			        'heading' => __( 'Padding Bottom', 'Nimva' ),
			        'param_name' => 'paddingbottom',
			        'value' => '20',
			        'min' => '0',
			        'max' => '200',
			        'step' => '1',
			        'unit' => 'px',
			        'description' => __( 'Select a value for the bottom padding. ', 'Nimva' )
			    ), 				 			

			    array(
			      'type' => 'textfield',
			      'heading' => __('Extra class name', 'Nimva'),
			      'param_name' => 'el_class',
			      'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'Nimva')
			    )
		),
				//'js_view' => 'VcTextSeparatorView',		    					
	);
	

