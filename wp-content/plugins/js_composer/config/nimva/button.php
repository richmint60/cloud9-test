<?php
/*
Quote Box
*/
global $awesome_icons_list, $button_style, $button_colors, $size_arr, $target_arr, $alignment2;

	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
			  'name' => __('Button', 'Nimva'),
			  'base' => 'vc_button',
			  'icon' => 'icon-wpb-ui-button',
			  'category' => 'Nimva',
			  'weight' => 28,
			  'description' => __('Nimva theme button', 'Nimva'),
			  'params' => array(
			  	array(
			      'type' => 'dropdown',
			      'heading' => __('Style', 'Nimva'),
			      'param_name' => 'style',
			      'value' => $button_style
			    ),
			    array(
			      'type' => 'textfield',
			      'heading' => __('Text on the button', 'Nimva'),
			      'holder' => 'button',
			      'class' => 'wpb_button',
			      'param_name' => 'title',
			      'value' => __('Text on the button', 'Nimva'),
			      'description' => __('Text on the button.', 'Nimva')
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
				        'heading' => __( 'Title Icon', 'Nimva' ),
				        'param_name' => 'icon',
						//'holder' => 'div',
				       // 'width' => 200,
				        'value' => $awesome_icons_list,
				        //'encoding' => 'false',
				        'dependency' => array(
							'element' => 'icon_type',
							'value' => 'old_fontawesome',
						),
				        'description' => __( 'Optionally you can insert an icon for the title.', 'Nimva' )
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
			      'heading' => __('Button Color', 'Nimva'),
			      'param_name' => 'color',
			      'value' => $button_colors,
			      'description' => __('Button color.', 'Nimva')
			    ),
				array(
			      'type' => 'switch',
				  'param_name' => 'button_inverse',
				  'value' => 'false',
			      'heading' => __('Inverse button colors?', 'Nimva'),      
				  'dependency' => Array('element' => 'style', 'value' => array('minimal'))
			    ),

			    array(
			      'type' => 'dropdown',
			      'heading' => __('Size', 'Nimva'),
			      'param_name' => 'size',
			      'value' => $size_arr,
			      'description' => __('Button size.', 'Nimva')
			    ),
				
				array(
			      'type' => 'dropdown',
			      'heading' => __('Align', 'Nimva'),
			      'param_name' => 'align',
			      'value' => $alignment2,
			      'description' => __('Button alignment.', 'Nimva')
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
	

