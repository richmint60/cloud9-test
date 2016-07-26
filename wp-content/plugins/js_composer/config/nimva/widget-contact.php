<?php
return array(
	'name' => __('Contact us (Custom)', 'Nimva'),
	'weight' => -30,
	'base' => 'vc_wp_contact_us',
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
		  'type' => 'textarea',
		  'heading' => __('Intro Text', 'Nimva'),
		  'param_name' => 'intro',
		  'admin_label' => true,
		  'description' => __('Enter some intro text.', 'Nimva')
		),
		array(
		  'type' => 'textfield',
		  'heading' => __('Address', 'Nimva'),
		  'param_name' => 'address',
		  'admin_label' => true,
		  'description' => __('Enter your contact address.', 'Nimva')
		),
		array(
		  'type' => 'textfield',
		  'heading' => __('Phone', 'Nimva'),
		  'param_name' => 'phone',
		  'admin_label' => true,
		  'description' => __('Enter your contact phone.', 'Nimva')
		),

		array(
		  'type' => 'textfield',
		  'heading' => __('Email', 'Nimva'),
		  'param_name' => 'email',
		  'admin_label' => true,
		  'description' => __('Enter your contact email.', 'Nimva')
		),
		array(
		  'type' => 'textfield',
		  'heading' => __('Extra class name', 'Nimva'),
		  'param_name' => 'el_class',
		  'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'Nimva')
		)
	)
);