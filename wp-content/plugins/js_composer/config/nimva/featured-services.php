<?php
/*
Featured Services Element
*/
	global $awesome_icons_list, $target_arr;

	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
			  'name' => __('Featured Services', 'Nimva'),
			  'base' => 'vc_service_box',
			  'icon' => 'icon-wpb-service-box',
			  'category' => 'Nimva',
			  'weight' => 22,
			  'description' => __('Add a featured services box', 'Nimva'),
			  'icon' => get_template_directory_uri() . '/images/vc/featured-services.png',
			  'params' => array(
			  
			  	array(
			      'type' => 'attach_image',
			      'heading' => __('Image Icon', 'Nimva'),
			      'param_name' => 'icon',
			      'value' => '',
			      'description' => __('Select/upload an image icon from media library. Leave blank if you want to use an Icon bellow.', 'Nimva')
			    ),

			    array(
					'type' => 'dropdown',
					'heading' => __( 'Icon library', 'js_composer' ),
					'value' => array(
						__( 'Old Font Awesome', 'js_composer' ) => 'old_fontawesome',
						__( 'New Font Awesome', 'js_composer' ) => 'fontawesome',
						__( 'Open Iconic', 'js_composer' ) => 'openiconic',
						__( 'Typicons', 'js_composer' ) => 'typicons',
						__( 'Entypo', 'js_composer' ) => 'entypo',
						__( 'Linecons', 'js_composer' ) => 'linecons',
					),
					'admin_label' => true,
					'param_name' => 'icon_type',
					'description' => __( 'Select icon library.', 'js_composer' ),
				),	
				array(
			    	'type' => 'awesome_icons',
			        'heading' => __( 'Text Icon', 'Nimva' ),
			        'param_name' => 'text_icon',		
			        'width' => 200,
			        'value' => $awesome_icons_list,			        
					'dependency' => array(
						'element' => 'icon_type',
						'value' => 'old_fontawesome',
					),
			        'description' => __( 'Add a font icon to your Featured Services box.', 'Nimva' )
			    ),		
				
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'js_composer' ),
					'param_name' => 'icon_fontawesome',
					'value' => 'fa fa-adjust', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => true,
						// default true, display an "EMPTY" icon?
						'iconsPerPage' => 4000,
						// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
					),
					'dependency' => array(
						'element' => 'icon_type',
						'value' => 'fontawesome',
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'js_composer' ),
					'param_name' => 'icon_openiconic',
					'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => true, // default true, display an "EMPTY" icon?
						'type' => 'openiconic',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'icon_type',
						'value' => 'openiconic',
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'js_composer' ),
					'param_name' => 'icon_typicons',
					'value' => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => true, // default true, display an "EMPTY" icon?
						'type' => 'typicons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'icon_type',
						'value' => 'typicons',
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'js_composer' ),
					'param_name' => 'icon_entypo',
					'value' => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => true, // default true, display an "EMPTY" icon?
						'type' => 'entypo',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'icon_type',
						'value' => 'entypo',
					),
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'js_composer' ),
					'param_name' => 'icon_linecons',
					'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => true, // default true, display an "EMPTY" icon?
						'type' => 'linecons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'icon_type',
						'value' => 'linecons',
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
				),
				
				
				array(
					  'type' => 'colorpicker',
					  'heading' => __('Icon color', 'Nimva'),
					  'param_name' => 'icon_color',
					  'value' => '',
					  'description' => __('Select the color of the icon', 'Nimva')
					),
			    	
			    array(
			      'type' => 'textfield',
			      'heading' => __('Heading Title', 'Nimva'),
			      'param_name' => 'title',
				  'holder' => 'h2',
			      'value' => __('Design', 'Nimva'),
			      'description' => __('Text on the button.', 'Nimva')
			    ),
				
				array(
					  'type' => 'colorpicker',
					  'heading' => __('Title color', 'Nimva'),
					  'param_name' => 'title_color',
					  'value' => '',
					  'description' => __('Select the color of the title - if a link is set this option will be ignored.', 'Nimva')
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
				/*
				array(
						'type' => 'switch',
						'heading' => __('Make entire box linkable', 'Nimva'),
						'param_name' => 'full_link',
						'value' => 'false',
						'description' => __( 'Make the entire Featured Service box linkable.', 'Nimva' )
				),
				*/
				array(
			      'type' => 'textarea_html',
			      'holder' => 'div',
			      'heading' => __('Description Text', 'Nimva'),
			      'param_name' => 'content',
			      'value' => __('<p>I am text block. Click edit button to change this text.</p>', 'Nimva')
			    ),
				
				array(
					  'type' => 'colorpicker',
					  'heading' => __('Text color', 'Nimva'),
					  'param_name' => 'text_color',
					  'value' => '',
					  'description' => __('Select the color of the description text.', 'Nimva')
					),
					
				array(
					  'type' => 'colorpicker',
					  'heading' => __('Background color', 'Nimva'),
					  'param_name' => 'bg_color',
					  'value' => '',
					  'description' => __('Select the color of the background.', 'Nimva')
					),	
					
				array(
						'type' => 'range',
						'heading' => __( 'Background Opacity', 'Nimva' ),
						'param_name' => 'bg_opacity',
						'description' => __('Select the background opacity of the featured serives box - 0 will make the box background transparent.', 'Nimva'),
						'value' => '100',
						'min' => '0',
						'max' => '100',
						'step' => '5',
						'unit' => 'pixels'			
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
	

