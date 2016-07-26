<?php
return array(
	'name' => __('Social Links (Custom)', 'Nimva'),
	'base' => 'vc_wp_social_links',
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
		  'heading' => __('Facbook Link', 'Nimva'),
		  'param_name' => 'fb_link',
		  'admin_label' => true,
		  'description' => __('Enter your Facebook profile/page link.', 'Nimva')
		),
		array(
		  'type' => 'textfield',
		  'heading' => __('Twitter Link', 'Nimva'),
		  'param_name' => 'twitter_link',
		  'admin_label' => true,
		  'description' => __('Enter your Twitter profile link.', 'Nimva')
		),	
		array(
		  'type' => 'textfield',
		  'heading' => __('Google Link', 'Nimva'),
		  'param_name' => 'google_link',
		  'admin_label' => true,
		  'description' => __('Enter your Google+ profile link.', 'Nimva')
		),
		array(
		  'type' => 'textfield',
		  'heading' => __('Instagram Link', 'Nimva'),
		  'param_name' => 'instagram_link',
		  'admin_label' => true,
		  'description' => __('Enter your Instagram profile link.', 'Nimva')
		),
		array(
		  'type' => 'textfield',
		  'heading' => __('LinkedIn Link', 'Nimva'),
		  'param_name' => 'linkedin_link',
		  'admin_label' => true,
		  'description' => __('Enter your LinkedIn profile link.', 'Nimva')
		),

		array(
		  'type' => 'textfield',
		  'heading' => __('Dribbble Link', 'Nimva'),
		  'param_name' => 'dribbble_link',
		  'admin_label' => true,
		  'description' => __('Enter your Dribbble profile link.', 'Nimva')
		),

		array(
		  'type' => 'textfield',
		  'heading' => __('Pinterest Link', 'Nimva'),
		  'param_name' => 'pinterest_link',
		  'admin_label' => true,
		  'description' => __('Enter your Pinterest profile link.', 'Nimva')
		),

		array(
		  'type' => 'textfield',
		  'heading' => __('Flickr Link', 'Nimva'),
		  'param_name' => 'flickr_link',
		  'admin_label' => true,
		  'description' => __('Enter your Flickr profile link.', 'Nimva')
		),
		array(
		  'type' => 'textfield',
		  'heading' => __('Tumblr Link', 'Nimva'),
		  'param_name' => 'tumblr_link',
		  'admin_label' => true,
		  'description' => __('Enter your Tumblr profile link.', 'Nimva')
		),
		array(
		  'type' => 'textfield',
		  'heading' => __('Behance Link', 'Nimva'),
		  'param_name' => 'behance_link',
		  'admin_label' => true,
		  'description' => __('Enter your Behance profile link.', 'Nimva')
		),

		array(
		  'type' => 'textfield',
		  'heading' => __('Skype Link', 'Nimva'),
		  'param_name' => 'skype_link',
		  'admin_label' => true,
		  'description' => __('Enter your Skype profile link.', 'Nimva')
		),
		array(
		  'type' => 'textfield',
		  'heading' => __('Vimeo Link', 'Nimva'),
		  'param_name' => 'vimeo_link',
		  'admin_label' => true,
		  'description' => __('Enter your Vimeo profile link.', 'Nimva')
		),

		array(
		  'type' => 'textfield',
		  'heading' => __('YouTube Link', 'Nimva'),
		  'param_name' => 'youtube_link',
		  'admin_label' => true,
		  'description' => __('Enter your YouTube profile link.', 'Nimva')
		),

		array(
		  'type' => 'textfield',
		  'heading' => __('Extra class name', 'Nimva'),
		  'param_name' => 'el_class',
		  'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'Nimva')
		)
	)
);