<?php
/*
Quote Box
*/
global $awesome_icons_list, $button_style, $button_colors, $size_arr;

	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name' => __('Quote Box', 'Nimva'),
		    'base' => 'qbox',
		    'weight' => 29,
		    'icon' => 'icon-wpb-qbox',
		    'category' => 'Nimva',
			'description' => __('Add Quote Box to your site.', 'Nimva'),
			'icon' => get_template_directory_uri() . '/images/vc/qbox.png',
		    'params' => array(	
				
				array(
				  'type' => 'textfield',
				  'holder' => 'h2',
				  'class' => '',
				  'heading' => __(' Title', 'Creativo'),
				  'param_name' => 'title1',
				  'value' => '',
				  'description' => __('Enter text for the title.', 'Creativo')
				),
				array(
				  'type' => 'textarea',
				  'holder' => 'div',
				  'class' => '',
				  'heading' => __('Description', 'Creativo'),
				  'param_name' => 'title2',
				  'value' => '',
				  'description' => __('Enter a brief description that will appear right below the title.', 'Creativo')
				),
				
				array(
					'type' => 'dropdown',
					'heading' => __('Text align', 'Nimva'),
					'param_name' => 'align',
					'value' => array( __('Center', 'Nimva') => 'center', __('Left', 'Nimva') => 'left', __('Right', 'Nimva') => 'right' ),
				),
						
				array(
					'type' => 'range',
					'heading' => __( 'Title Font Size', 'Nimva' ),
					'param_name' => 'big_size',
					'value' => '26',
					'min' => '0',
					'max' => '50',
					'step' => '1',
					'unit' => 'px',		
				),
				array(
				  'type' => 'colorpicker',
				  'heading' => __('Title color', 'Nimva'),
				  'param_name' => 'big_color',
				  'value' => '#777',
				  'description' => __('Select the color of the big title', 'Nimva')
				),
				array(
					'type' => 'range',
					'heading' => __( 'Description Font Size', 'Nimva' ),
					'param_name' => 'small_size',
					'value' => '15',
					'min' => '0',
					'max' => '50',
					'step' => '1',
					'unit' => 'px',			
				),
				array(
				  'type' => 'colorpicker',
				  'heading' => __('Description Font Color', 'Nimva'),
				  'param_name' => 'small_color',
				  'value' => '#777', 
				  'description' => __('Select the color of the big title', 'Nimva')
				),
				array(
					'type' => 'dropdown',
					'heading' => __('Enable Buttons', 'Nimva'),
					'param_name' => 'en_buttons',
					'value' => array( __('No', 'Nimva') => 'false', __('Yes', 'Nimva') => 'true' ),
				),
				
				array(
				  'type' => 'dropdown',
				  'heading' => __('Button 1 Style', 'Nimva'),
				  'param_name' => 'b1_style',		  
				  'dependency' => Array('element' => 'en_buttons', 'value' => array('true')),
				  'value' => $button_style
				),
				array(
				  'type' => 'textfield',
				  'heading' => __('Text on the button 1', 'Nimva'),
				  //'holder' => 'button',
				  //'class' => 'wpb_button',
				  'param_name' => 'b1_title',
				  'dependency' => Array('element' => 'en_buttons', 'value' => array('true')),
				  'value' => __('Text on the button', 'Nimva'),
				),
				array(
					'type' => 'awesome_icons',
					'heading' => __( 'Button 1 Icon', 'Nimva' ),
					'param_name' => 'b1_icon',
					'width' => 200,
					'dependency' => Array('element' => 'en_buttons', 'value' => array('true')),
					'value' => $awesome_icons_list,
					'encoding' => 'false'
				),
				array(
				  'type' => 'textfield',
				  'heading' => __('Button 1 URL (Link)', 'Nimva'),
				  'param_name' => 'b1_href',
				  'dependency' => Array('element' => 'en_buttons', 'value' => array('true'))
				),

				array(
				  'type' => 'dropdown',
				  'heading' => __('Button 1 Color', 'Nimva'),
				  'param_name' => 'b1_color',
				  'dependency' => Array('element' => 'en_buttons', 'value' => array('true')),
				  'value' => $button_colors
				),
				
				array(
				  'type' => 'switch',
				  'heading' => __('Button 1 Inverse Color', 'Nimva'),
				  'param_name' => 'b1_inverse',
				  'dependency' => Array('element' => 'en_buttons', 'value' => array('true')),
				  'value' => 'false',
				  'description' => __('This option will only work if you select the Minimal style for the button.', 'Nimva')
				),
				
				array(
				  'type' => 'dropdown',
				  'heading' => __('Button 1 Size', 'Nimva'),
				  'param_name' => 'b1_size',
				  'dependency' => Array('element' => 'en_buttons', 'value' => array('true')),
				  'value' => $size_arr,
				),
				
				array(
				  'type' => 'dropdown',
				  'heading' => __('Button 2 Style', 'Nimva'),
				  'param_name' => 'b2_style',
				  'dependency' => Array('element' => 'en_buttons', 'value' => array('true')),
				  'value' => $button_style
				),
				array(
				  'type' => 'textfield',
				  'heading' => __('Text on the button 2', 'Nimva'),
				  //'holder' => 'button',
				  //'class' => 'wpb_button',
				  'param_name' => 'b2_title',
				  'dependency' => Array('element' => 'en_buttons', 'value' => array('true')),
				  'value' => __('Text on the button', 'Nimva'),
				),
				array(
					'type' => 'awesome_icons',
					'heading' => __( 'Button 2 Icon', 'Nimva' ),
					'param_name' => 'b2_icon',
					'width' => 200,
					'dependency' => Array('element' => 'en_buttons', 'value' => array('true')),
					'value' => $awesome_icons_list,
					'encoding' => 'false'
				),
				array(
				  'type' => 'textfield',
				  'heading' => __('Button 2 URL (Link)', 'Nimva'),
				  'param_name' => 'b2_href',
				  'dependency' => Array('element' => 'en_buttons', 'value' => array('true'))
				),
				
				array(
				  'type' => 'dropdown',
				  'heading' => __('Button 2 Color', 'Nimva'),
				  'param_name' => 'b2_color',
				  'dependency' => Array('element' => 'en_buttons', 'value' => array('true')),
				  'value' => $button_colors
				),

				array(
				  'type' => 'switch',
				  'heading' => __('Button 2 Inverse Color?', 'Nimva'),
				  'param_name' => 'b2_inverse',
				  'dependency' => Array('element' => 'en_buttons', 'value' => array('true')),
				  'value' => 'false',
				  'description' => __('This option will only work if you select the Minimal style for the button.', 'Nimva')
				),
				
				array(
				  'type' => 'dropdown',
				  'heading' => __('Button 2 Size', 'Nimva'),
				  'param_name' => 'b2_size',
				  'dependency' => Array('element' => 'en_buttons', 'value' => array('true')),
				  'value' => $size_arr,
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
	

