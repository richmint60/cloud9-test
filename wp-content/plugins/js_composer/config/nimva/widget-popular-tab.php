<?php
//global $colors_arr;
return array(
	'weight' => -30,
	'name' => __('Popular / Recent Posts Tabs (Custom)', 'Nimva'),
	'base' => 'vc_wp_rec_pop_tabs',
	'icon' => 'icon-wpb-wp',
	'category' => __('WordPress Widgets', 'Nimva'),
	'class' => 'wpb_vc_wp_widget',
	'params' => array(
		array(
		  'type' => 'textfield',
		  'heading' => __('Widget title', 'Nimva'),
		  'param_name' => 'title',
		  'description' => __('What text to use as a widget title. Leave blank to use default widget title.', 'Nimva')
		),

		array(
		  'type' => 'dropdown',
		  'heading' => __('Show popular posts', 'Nimva'),
		  'param_name' => 'show_popular_posts',
		  'admin_label' => true,
		  'value' => array( __('Yes', 'Nimva') => 'true', __('No', 'Nimva') => 'false' )
		),

		array(
		  'type' => 'dropdown',
		  'heading' => __('Popular posts count', 'Nimva'),
		  'param_name' => 'posts',
		  'description' => __('Select how many popular posts to show in tabs.', 'Nimva'),
		  'value' => array(1,2,3,4,5,6,7,8,9,10,11,12),
		  'admin_label' => true,
		  'dependency' => Array('element' => 'show_popular_posts', 'value' => array('true'))
		),

		array(
		  'type' => 'dropdown',
		  'heading' => __('Show recent posts', 'Nimva'),
		  'param_name' => 'show_recent_posts',
		  'admin_label' => true,
		  'value' => array( __('Yes', 'Nimva') => 'true', __('No', 'Nimva') => 'false' )
		),

		array(
		  'type' => 'dropdown',
		  'heading' => __('Recent posts count', 'Nimva'),
		  'param_name' => 'tags',
		  'description' => __('Select how many recent posts to show in tabs.', 'Nimva'),
		  'value' => array(1,2,3,4,5,6,7,8,9,10,11,12),
		  'admin_label' => true,
		  'dependency' => Array('element' => 'show_recent_posts', 'value' => array('true'))
		),

		array(
		  'type' => 'dropdown',
		  'heading' => __('Show comments', 'Nimva'),
		  'param_name' => 'show_comments',
		  'admin_label' => true,
		  'value' => array( __('Yes', 'Nimva') => 'true', __('No', 'Nimva') => 'false' )
		),

		array(
		  'type' => 'dropdown',
		  'heading' => __('Comments count', 'Nimva'),
		  'param_name' => 'comments',
		  'description' => __('Select how many comments to show in tabs.', 'Nimva'),
		  'value' => array(1,2,3,4,5,6,7,8,9,10,11,12),
		  'admin_label' => true,
		  'dependency' => Array('element' => 'show_comments', 'value' => array('true'))
		),
		/*
		array(
		  'type' => 'dropdown',
		  'heading' => __('Tabs Color', 'Nimva'),
		  'param_name' => 'color',
		  'admin_label' => true,
		  'description' => __('Select the color of the tabs.', 'Nimva'),
		  'value' => $colors_arr
		),
	*/
		array(
		  'type' => 'textfield',
		  'heading' => __('Extra class name', 'Nimva'),
		  'param_name' => 'el_class',
		  'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'Nimva')
		)
	)
);