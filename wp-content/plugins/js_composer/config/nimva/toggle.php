<?php
global $awesome_icons_list;
return array(
	'name' => __( 'Toggle', 'js_composer' ),
	'base' => 'vc_toggle',
	'icon' => 'icon-wpb-toggle-small-expand',
	'category' => 'Nimva',
	'weight' => 11,
	'description' => __( 'Add a Toggle element!', 'js_composer' ),
	'icon' => get_template_directory_uri() . '/images/vc/toggle.png',
	'params' => array(
		array(
			'type' => 'textfield',
			'holder' => 'h4',
			'class' => 'vc_toggle_title',
			'heading' => __( 'Toggle title', 'js_composer' ),
			'param_name' => 'title',
			'value' => __( 'Toggle title', 'js_composer' ),
			
			'description' => __( 'Enter title of toggle block.', 'js_composer' ),
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'class' => 'vc_toggle_content',
			'heading' => __( 'Toggle content', 'js_composer' ),
			'param_name' => 'content',
			'value' => __( '<p>Toggle content goes here, click edit button to change this text.</p>', 'js_composer' ),
			'description' => __( 'Toggle block content.', 'js_composer' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Default state', 'js_composer' ),
			'param_name' => 'default_state',
			'value' => array(
				__( 'Closed', 'js_composer' ) => 'false',
				__( 'Open', 'js_composer' ) => 'true',
			),
			'description' => __( 'Select "Open" if you want toggle to be open by default.', 'js_composer' ),
		),
		array(
	    	'type' => 'awesome_icons',
	        'heading' => __( 'Title Icon', 'Nimva' ),
	        'param_name' => 'icon',			
	        'value' => $awesome_icons_list,	        
	    ),
		vc_map_add_css_animation(),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'js_composer' ),
			'param_name' => 'css',
			'group' => __( 'Design Options', 'js_composer' ),
		),
	),
	'js_view' => 'VcToggleView',
);