<?php
return array(
	'name' => __('Twitter Feed (Custom)', 'Nimva'),
	'base' => 'vc_wp_twitter_feed',
	'weight' => -30,
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
		  'type' => 'textfield',
		  'heading' => __('Consumer Key', 'Nimva'),
		  'param_name' => 'consumer_key',
		  'description' => __('Enter your twitter api consumer key.', 'Nimva')
		),
		array(
		  'type' => 'textfield',
		  'heading' => __('Consumer Secret', 'Nimva'),
		  'param_name' => 'consumer_secret',
		  'description' => __('Enter your twitter api consumer secret.', 'Nimva')
		),
		array(
		  'type' => 'textfield',
		  'heading' => __('Access Token', 'Nimva'),
		  'param_name' => 'access_token',
		  'description' => __('Enter your twitter api access token.', 'Nimva')
		),
		array(
		  'type' => 'textfield',
		  'heading' => __('Access Token Secret', 'Nimva'),
		  'param_name' => 'access_token_secret',
		  'description' => __('Enter your twitter api access token secret.', 'Nimva')
		),
		array(
		  'type' => 'textfield',
		  'heading' => __('Twitter ID', 'Nimva'),
		  'param_name' => 'twitter_id',
		  'admin_label' => true,
		  'description' => __('Enter your twitter id.', 'Nimva')
		),
		array(
		  'type' => 'dropdown',
		  'heading' => __('Number of tweets', 'Nimva'),
		  'param_name' => 'count',
		  'description' => __('Select how many tweets to show.', 'Nimva'),
		  'value' => array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15),
		  'admin_label' => true
		),
		array(
		  'type' => 'textfield',
		  'heading' => __('Extra class name', 'Nimva'),
		  'param_name' => 'el_class',
		  'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'Nimva')
		)
	)
);