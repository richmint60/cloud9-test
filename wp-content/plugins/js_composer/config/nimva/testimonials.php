<?php
/*
Testimonials Element
*/
	global $testimonials;

	$testimonials = array();

	$testimonials_entries = get_posts( 'post_type=testimonials&orderby=title&numberposts=-1&order=ASC' );

	if ( $testimonials_entries != null && !empty( $testimonials_entries ) ) {
	    foreach ( $testimonials_entries as $key => $entry ) {
	        $testimonials[$entry->ID] = $entry->post_title;
	    }
	}

	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
	    'name' => __('Testimonials', 'Nimva'),
	    'base' => 'testimonials',
	    'class' => '',
	    'weight' => 15,
	    'icon' => 'icon-wpb-testimonials',
	    'category' => 'Nimva',
		'description' => __('Add testimonials to your site', 'Nimva'),
		'icon' => get_template_directory_uri() . '/images/vc/testimonials.png',
	    'params' => array(
			
			array(
	            'type' => 'textfield',
	            'heading' => __( 'Testimonials Section Title', 'Nimva' ),
	            'param_name' => 'title',
	            'value' => '',
	            'description' => __( 'Provide a title for your testimonial section', 'Nimva' ),
				'admin_label' => true
	        ),

	        array(
				'type' => 'range',
				'heading' => __( 'Count', 'Nimva' ),
				'param_name' => 'count',
				'description' => __('How many testimonials you would like to show? (-1 means unlimited)', 'Nimva'),
				'value' => '10',
				'min' => '-1',
				'max' => '50',
				'step' => '1',
				'unit' => 'testimonials',
				'admin_label' => true			
			),
			array(
				'type' => 'dropdown',
				'heading' => __('Show Author Image', 'Nimva'),
				'param_name' => 'show_image',
				'value' => array(__('Yes', 'Nimva') => 'yes', __('No', 'Nimva') => 'no'),
				'description' => __( 'Select to show the author image or not - needs to first set a Featured Image for each of your Testimonial element', 'Nimva' )			
			),
	        array(
	            'type' => 'multiselect',
	            'heading' => __( 'Select specific Testimonials', 'Nimva' ),
	            'param_name' => 'testimonials',	            
	            'value' => $testimonials,
	            'description' => ''
	        ),	
			
			array(
				'type' => 'dropdown',
				'heading' => __('Testimonials Display', 'Nimva'),
				'param_name' => 'display',
				'value' => array(__('Slideshow', 'Nimva') => 'slideshow', __('Columns', 'Nimva') => 'columns'),
				'description' => __( 'Select how you want the testimonials to be displayed.', 'Nimva' )
			),
			
			array(
				'type' => 'dropdown',
				'heading' => __('Navigation position', 'Nimva'),
				'param_name' => 'navigation',
				'value' => array(__('Top Right', 'Nimva') => 'topr', __('Centered', 'Nimva') => 'center'),
				'description' => __( 'Select the alignment of the navigation keys.', 'Nimva' ),
				'dependency' => Array('element' => 'display', 'value' => array('slideshow'))
			),
			
			
			array(
			  'type' => 'range',
			  'heading' => __('Columns Count', 'Nimva'),
			  'param_name' => 'columns_count',
			  'description' => __('How many columns to use?', 'Nimva'),
			  'value' => '3',
			  'min' => '1',
			  'max' => '4',
			  'step' => '1',
			  'unit' => 'columns',		  
			  'dependency' => Array('element' => 'display', 'value' => array('columns')),
			),
			
			array(
				'type' => 'dropdown',
				'heading' => __('Text align', 'Nimva'),
				'param_name' => 'align',
				'value' => array(__('Left', 'Nimva') => 'left', __('Right', 'Nimva') => 'right', __('Center', 'Nimva') => 'center'),
				'description' => __( 'Select the alignment of the text.', 'Nimva' )
			),
			
			array(
			  'type' => 'colorpicker',
			  'heading' => __('Text color', 'Nimva'),
			  'param_name' => 'color',
			  'value' => '',
			  'description' => __('Select the color of the text. Leave blank to use the color defined in Theme Options -> Shortcodes -> Testimonial', 'Nimva')
			),
			
			array(
			  'type' => 'colorpicker',
			  'heading' => __('Background color', 'Nimva'),
			  'param_name' => 'background_color',
			  'value' => '',
			  'description' => __('Select the color of the background. Leave blank to use the color defined in Theme Options -> Shortcodes -> Testimonial', 'Nimva')
			),
			
			array(
			  'type' => 'colorpicker',
			  'heading' => __('Border color', 'Nimva'),
			  'param_name' => 'border_color',
			  'value' => '',
			  'description' => __('Select the color of the border of the testimonial box. Leave blank to use the color defined in Theme Options -> Shortcodes -> Testimonial', 'Nimva')
			),
			
			vc_map_add_css_animation(),
				
	        array(
	            'type' => 'textfield',
	            'heading' => __('Extra class name', 'Nimva'),
	            'param_name' => 'el_class',
	            'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'Nimva')
	        ),
	    ),
	);
	

