<?php
/*
Product Feature Element
*/
	global $awesome_icons_list, $target_arr;

	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
			'name' => __('Product Feature', 'Nimva'),
			'base' => 'product_feature',
			'icon' => 'icon-wpb-product-feature',
			'category' => 'Nimva',
			'weight' => 21,
			'description' => __('Add a product feature.', 'Nimva'),
			'icon' => get_template_directory_uri() . '/images/vc/product-feature.png',
			'wrapper_class' => 'clearfix',
			'params' => array(	
			  	
		  		array(
		              'type' => 'textfield',
		              'heading' => __('Product Feature title', 'Nimva'),
		              'param_name' => 'title',
		  			'holder' => 'h2',
		              'description' => __('Add the name of the Product Feature', 'Nimva')
		          ),
		  		
		  		array(
		  		  'type' => 'colorpicker',
		  		  'heading' => __('Title color', 'Nimva'),
		  		  'param_name' => 'title_color',
		  		  'value' => '',
		  		  'description' => __('Select the color of the title', 'Nimva')
		  		),
		  		
		  		array(
		  			'type' => 'range',
		  			'heading' => __( 'Title font size', 'Nimva' ),
		  			'param_name' => 'title_font_size',
		  			'description' => __('Select the font size for the title', 'Nimva'),
		  			'value' => '20',
		  			'min' => '10',
		  			'max' => '35',
		  			'step' => '1',
		  			'unit' => 'pixels'			
		  		),
		  		
		  		array(
		  			'type' => 'dropdown',
		  			'heading' => __('Font Weight', 'Nimva'),
		  			'param_name' => 'font_weight',
		  			'value' => array(__('Normal', 'Nimva') => 'normal', __('Bold', 'Nimva') => 'bold'),
		  			'description' => __( 'Select the font weight', 'Nimva' )
		  		),
		  		
		  		array(
		              'type' => 'textarea',
		              'heading' => __('Product Feature description', 'Nimva'),
		              'param_name' => 'content',
		  			'holder' => 'div',
		              'description' => __('Add a description for this Product Feature', 'Nimva')
		          ),
		  		
		  		array(
		  		  'type' => 'colorpicker',
		  		  'heading' => __('Description color', 'Nimva'),
		  		  'param_name' => 'description_color',
		  		  'value' => '#777777',
		  		  'description' => __('Select the color of the description', 'Nimva')
		  		),	
		  		
		  		array(
		  			'type' => 'range',
		  			'heading' => __( 'Description font size', 'Nimva' ),
		  			'param_name' => 'description_font_size',
		  			'description' => __('Select the font size for the description', 'Nimva'),
		  			'value' => '12',
		  			'min' => '10',
		  			'max' => '35',
		  			'step' => '1',
		  			'unit' => 'pixels'			
		  		),

		  		array(
		  			'type' => 'dropdown',
		  			'heading' => __('Style', 'Nimva'),
		  			'param_name' => 'style',
		  			'value' => array(__('Style 1', 'Nimva') => '1', __('Style 2', 'Nimva') => '2'),
		  			'description' => __( 'Select the style you want to render for this Product Feature', 'Nimva' )
		  		),
		  		
		  		array(
		  			'type' => 'dropdown',
		  			'heading' => __('Elements Orientation', 'Nimva'),
		  			'param_name' => 'orientation',
		  			'value' => array(__('To Left', 'Nimva') => 'toleft', __('To Right', 'Nimva') => 'toright'),
		  			'description' => __( 'Select the orientation of the elements inside the Product Feature element.', 'Nimva' ),
		  			'dependency' => Array('element' => 'style', 'value' => array('1'))
		  		),
		  		
		  		array(
		  		  'type' => 'attach_image',
		  		  'heading' => __('Image Icon', 'Nimva'),
		  		  'param_name' => 'picture_icon_url',
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
			        'heading' => __( 'Product Feature Icon', 'Nimva' ),
			        'param_name' => 'icon',		
			        'width' => 200,
			        'value' => $awesome_icons_list,			        
					'dependency' => array(
						'element' => 'icon_type',
						'value' => 'old_fontawesome',
					),			        
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
		  		  'type' => 'colorpicker',
		  		  'heading' => __('Icon background color', 'Nimva'),
		  		  'param_name' => 'icon_bg_color',
		  		  'value' => '',
		  		  'description' => __('Select the background color of the icon', 'Nimva')
		  		),
		  		
		  		array(
		  			'type' => 'range',
		  			'heading' => __( 'Icon Size', 'Nimva' ),
		  			'param_name' => 'icon_size',
		  			'description' => __('Select the size of the icon', 'Nimva'),
		  			'value' => '20',
		  			'min' => '10',
		  			'max' => '50',
		  			'step' => '1',
		  			'unit' => 'pixels',			
		  		),
		  		
		         array(
		  		  'type' => 'textfield',
		  		  'heading' => __('URL (Link)', 'Nimva'),
		  		  'param_name' => 'link',
		  		  'description' => __('Add a link to your Product Feature.', 'Nimva')
		  		),
		  		
		  		array(
		  		  'type' => 'dropdown',
		  		  'heading' => __('Target', 'Nimva'),
		  		  'param_name' => 'target',
		  		  'value' => $target_arr,
		  		  'dependency' => Array('element' => 'link', 'not_empty' => true)
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
	

