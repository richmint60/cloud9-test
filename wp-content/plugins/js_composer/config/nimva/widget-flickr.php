<?php
return array(
	'name' => __('Flickr Widget (Custom)', 'Nimva'),
	'base' => 'vc_wp_flickr_widget',
	'icon' => 'icon-wpb-wp',
	'weight' => -30,
	'category' => __('WordPress Widgets', 'Nimva'),
	'class' => 'wpb_vc_wp_widget',
	'params' => array(
		array(
		  'type' => 'textfield',
		  'heading' => __('Widget title', 'Nimva'),
		  'param_name' => 'title',
		  'description' => __('What text use as a widget title. Leave blank to use default widget title.', 'Nimva')
		),
		array(
		  'type' => 'textfield',
		  'heading' => __('Screen name', 'Nimva'),
		  'param_name' => 'screen_name',
		  'admin_label' => true,
		  'description' => __('Inser the user name from flickr.', 'Nimva')
		),
		array(
		  'type' => 'dropdown',
		  'heading' => __('Picture count', 'Nimva'),
		  'param_name' => 'number',
		  'admin_label' => true,
		  'description' => __('Select how many pictures to show.', 'Nimva'),
		  'value' => array(1,2,3,4,5,6,7,8,9,10,11,12)
		),
		array(
		  'type' => 'textfield',
		  'heading' => __('Extra class name', 'Nimva'),
		  'param_name' => 'el_class',
		  'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'Nimva')
		)
	),
);