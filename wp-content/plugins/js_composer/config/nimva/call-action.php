<?php
/*
Call to Action Element
*/
global $awesome_icons_list, $button_style, $button_colors, $size_arr, $target_arr;

	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
			  'name' => __('Call to Action Box', 'Nimva'),
			  'base' => 'tagline_box',
			  'icon' => 'icon-wpb-call-to-action',
			  'weight' => 27,
			  'category' => 'Nimva',
			  'description' => __('Catch visitors attention with CTA block', 'Nimva'),
			  'icon' => get_template_directory_uri() . '/images/vc/call-action.png',
			  'params' => array(
			  
				array(
			      'type' => 'dropdown',
			      'heading' => __('Call to Action style', 'Nimva'),
			      'param_name' => 'cta_style',
			      'value' => array(__('Normal', 'Nimva') => 'normal', __('Centered', 'Nimva') => 'center'),
			      'description' => __('Select a style for the Call to Action.', 'Nimva')
			    ),	
				  
			    array(
			      'type' => 'textarea',
			      'admin_label' => true,
			      'heading' => __('Heading Text', 'Nimva'),
			      'param_name' => 'call_text',
			      'value' => '',
			      'description' => __('Enter your Title for the Call to Action.', 'Nimva')
			    ),
				
				array(
					'type' => 'range',
					'heading' => __( 'Heading Text font size', 'Nimva' ),
					'param_name' => 'call_text_size',
					'description' => __('Select the size of the Heading Text in pixels.', 'Nimva'),
					'value' => '19',
					'min' => '10',
					'max' => '50',
					'step' => '1',
					'unit' => 'pixels',
					'read' => 'readonly'					
				),
				
				array(
			      'type' => 'colorpicker',
			      'heading' => __('Heading Text color', 'Nimva'),
			      'param_name' => 'heading_color',
			      'description' => __('Select a custom color for the title. Leave blank to use the color set in the Theme Options -> Shortcodes -> Call to Action', 'Nimva'),
			      //'dependency' => Array('element' => 'bgcolor', 'value' => array('custom'))
			    ),
				array(
			      'type' => 'textarea_html',
			      'admin_label' => true,
			      'heading' => __('Description', 'Nimva'),
			      'param_name' => 'content',
			      'value' => '',
			      'description' => __('Enter your content.', 'Nimva')
			    ),
				
				array(
					'type' => 'range',
					'heading' => __( 'Description Text font size', 'Nimva' ),
					'param_name' => 'desc_text_size',
					'description' => __('Select the size of the Description in pixels.', 'Nimva'),
					'value' => '12',
					'min' => '10',
					'max' => '50',
					'step' => '1',
					'unit' => 'pixels',
					'read' => 'readonly'					
				),
				
				array(
			      'type' => 'colorpicker',
			      'heading' => __('Description color', 'Nimva'),
			      'param_name' => 'description_color',
			      'description' => __('Select a custom color for the description. <br />Leave blank to use the color set in the Theme Options -> Shortcodes -> Call to Action', 'Nimva'),
			    ),
				
				array(
			      'type' => 'colorpicker',
			      'heading' => __('Background color', 'Nimva'),
			      'param_name' => 'bg_color',
			      'description' => __('Select a custom background color for the Call to Action box. <br />Leave blank to use the color set in the Theme Options -> Shortcodes -> Call to Action', 'Nimva'),
			    ),
				
				array(
			      'type' => 'colorpicker',
			      'heading' => __('Border color', 'Nimva'),
			      'param_name' => 'border_color',
			      'description' => __('Select a custom border color for the Call to Action box. <br />Leave blank to use the color set in the Theme Options -> Shortcodes -> Call to Action', 'Nimva'),
			    ),
				
				array(
			      'type' => 'colorpicker',
			      'heading' => __('Inner border color', 'Nimva'),
			      'param_name' => 'inner_border_color',
			      'description' => __('Select a custom color for the inner border of the Call to Action box. <br />Leave blank to use the color set in the Theme Options -> Shortcodes -> Call to Action', 'Nimva'),
			    ),
				
				array(
					'type' => 'switch',
					'heading' => __('Force Transparency', 'Nimva'),
					'param_name' => 'force_transparency',
					'value' => 'false',
					'description' => __( 'Make the background of your Call to Action box fully transparent. Only the text and button will be visible. Useful when using a background image/pattern on the row element.', 'Nimva' )
				),
				
				array(
					'type' => 'switch',
					'heading' => __('Add shadow', 'Nimva'),
					'param_name' => 'cta_shadow',
					'value' => 'false',
					'description' => __( 'Add shadow effect to the Call to Action box', 'Nimva' )
				),
				
			    array(
			      'type' => 'textfield',
			      'heading' => __('Text on the button', 'Nimva'),
			      'param_name' => 'title',
			      'value' => __('Text on the button', 'Nimva'),
			      'description' => __('Text on the button.', 'Nimva')
			    ),
				array(
			      'type' => 'dropdown',
			      'heading' => __('Style', 'Nimva'),
			      'param_name' => 'style',
			      'value' => $button_style
			    ),
			    array(
			      'type' => 'dropdown',
			      'heading' => __('Color', 'Nimva'),
			      'param_name' => 'color',
			      'value' => $button_colors,
			      'description' => __('Button color.', 'Nimva')
			    ),
				
				array(
			      'type' => 'textfield',
			      'heading' => __('URL (Link)', 'Nimva'),
			      'param_name' => 'href',
			      'description' => __('Button link.', 'Nimva')
			    ),
			    array(
			      'type' => 'dropdown',
			      'heading' => __('Target', 'Nimva'),
			      'param_name' => 'target',
			      'value' => $target_arr,
			      'dependency' => Array('element' => 'href', 'not_empty' => true)
			    ),
				
			    array(
			      'type' => 'dropdown',
			      'heading' => __('Size', 'Nimva'),
			      'param_name' => 'size',
			      'value' => $size_arr,
			      'description' => __('Button size.', 'Nimva')
			    ),
				array(
			    	'type' => 'awesome_icons',
			        'heading' => __( 'Icon', 'Nimva' ),
			        'param_name' => 'icon',
			        'width' => 200,
			        'value' => $awesome_icons_list,
			        'encoding' => 'false',
			        'description' => __( 'Optionally you can insert an icon for the title.', 'Nimva' )
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
	

