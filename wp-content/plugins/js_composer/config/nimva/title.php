<?php
/*
Title Element
*/
global $awesome_icons_list;

	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name' => __('Title', 'Nimva'),
		  'base' => 'ctitle',
		  'class' => '',
		  'controls' => 'full',
		  'weight' =>30,
		  'icon' => 'icon-wpb-title',
		  'category' => 'Nimva',
		  'description' => __('Add a cool title to your section', 'Nimva'),
		  'icon' => get_template_directory_uri() . '/images/vc/title.png', // Simply pass url to your icon here,
		  //'admin_enqueue_js' => array(plugins_url('vc_extend_admin.js', __FILE__)),
		//  'admin_enqueue_css' => array(plugins_url('vc_extend_admin.css', __FILE__)),
		  'params' => array(
		    array(
		      'type' => 'textfield',
		      'holder' => 'div',
		      'class' => '',
		      'heading' => __('Title', 'Nimva'),
		      'param_name' => 'title',
		      'value' => __('Your title here', 'Nimva'),
		      'description' => __('Add a title to a section.', 'Nimva')
		    ),
			array(
		      'type' => 'colorpicker',
		      'holder' => 'div',
		      'class' => '',
		      'heading' => __('Title color', 'Nimva'),
		      'param_name' => 'color',
		      'value' => '', //Default Red color
		      'description' => __('Choose title color. Leave blank if you want to use the default color set in Theme Options.', 'Nimva')
		    ),
			array(
		    	'type' => 'range',
		        'heading' => __( 'Title Font Size', 'Nimva' ),
		        'param_name' => 'font_size',
		        'value' => '11',
		        'min' => '10',
		        'max' => '30',
		        'step' => '1',
		        'unit' => 'px',
		        'description' => __( 'Select the font size for the Title. ', 'Nimva' )
		    ),
			array(
		      'type' => 'colorpicker',
		      'holder' => 'div',
		      'class' => '',
		      'heading' => __('Title small border bottom color', 'Nimva'),
		      'param_name' => 'title_border',
		      'value' => '', //Default Red color
		      'description' => __('Choose the color of the bottom border. Leave blank if you want to use the default color set in Theme Options', 'Nimva')
		    ),
			array(
		      'type' => 'colorpicker',
		      'holder' => 'div',
		      'class' => '',
		      'heading' => __('Title big border bottom color', 'Nimva'),
		      'param_name' => 'title_border_big',
		      'value' => '', //Default Red color
		      'description' => __('Choose the color of the big bottom border. Leave blank if you want to use the default color set in Theme Options', 'Nimva')
		    ),
			array(
		      'type' => 'switch',
			  'param_name' => 'big_border_en',
			  'value' => 'true',
		      'heading' => __('Show Title Big Border?', 'Nimva'),
		      'description' => __('Enable or disable the title big border.')
		    ),
			
			array(
		      'type' => 'switch',
			  'param_name' => 'uppercase',
			  'value' => 'true',
		      'heading' => __('Title Uppercase', 'Nimva'),
		      'description' => __('Enable or disable title uppercase.')
		    ),
			
			array(
		      'type' => 'dropdown',
		      'heading' => __('Title Position', 'Nimva'),
		      'param_name' => 'position',
		      'value' => array(__('Left', 'Nimva') => 'left', __('Center', 'Nimva') => 'center', __('Right', 'Nimva') => 'right' ),
		      'description' => __('Select the positioning of the Title element.', 'Nimva')
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
	

