<?php
/*
Message Box Element
*/
	global $awesome_icons_list;
	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
			  'name' => __('Message Box', 'Nimva'),
			  'base' => 'vc_message',
			  'icon' => 'icon-wpb-information-white',
			  'wrapper_class' => 'alert',
			  'category' => 'Nimva',
			  'weight' => 25,
			  'description' => __('Add a notification box', 'Nimva'),
			  'icon' => get_template_directory_uri() . '/images/vc/message-box.png',
			  'params' => array(
			    array(
			      'type' => 'dropdown',
			      'heading' => __('Message box type', 'Nimva'),
			      'param_name' => 'color',
			      'value' => array(__('General', 'Nimva') => 'info', __('Error', 'Nimva') => 'error', __('Success', 'Nimva') => 'success', __('Warning', 'Nimva') => 'warning'),
			      'description' => __('Select message type.', 'Nimva')
			    ),
				array(
			      'type' => 'textfield',
			      'heading' => __('Title', 'Nimva'),
			      'param_name' => 'title',
			      'description' => __('Add a title for your message box.', 'Nimva')
			    ),	
			    array(
			      'type' => 'textarea_html',
			      'holder' => 'div',
			      'class' => 'messagebox_text',
			      'heading' => __('Message text', 'Nimva'),
			      'param_name' => 'content',
			      'value' => __('<p>I am message box. Click edit button to change this text.</p>', 'Nimva')
			    ),
				array(
			      'type' => 'switch',
				  'param_name' => 'dismiss',
				  'value' => 'true',
			      'heading' => __('Allow message to be dismissed', 'Nimva'),
			      'description' => __('Give your visitors the ability to dismiss the message box or not.')
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
			   // $add_css_animation,
			    array(
			      'type' => 'textfield',
			      'heading' => __('Extra class name', 'Nimva'),
			      'param_name' => 'el_class',
			      'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'Nimva')
			    )  
		),
				//'js_view' => 'VcTextSeparatorView',		    					
	);
	

