<?php
/*
Pricing Table Element
*/
	global $pricings;

	$pricings_entries = get_posts( 'post_type=pricing&orderby=title&numberposts=-1&order=ASC' );

	if ( $pricings_entries != null && !empty( $pricings_entries ) ) {
	    foreach ( $pricings_entries as $key => $entry ) {
	        $pricings[$entry->ID] = $entry->post_title;
	    }
	}

	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
	    'name' => __('Pricing Table', 'Nimva'),
	    'base' => 'pricing_table',
	    'class' => '',
	    'weight' => 14,
	    'icon' => 'icon-wpb-pricing-table',
	    'category' => 'Nimva',
		'description' => __('Add clients to your site.', 'Nimva'),
		'icon' => get_template_directory_uri() . '/images/vc/pricing-table.png',
	    'params' => array(		

	        array(
				'type' => 'range',
				'heading' => __( 'Pricing Table Columns', 'Nimva' ),
				'param_name' => 'columns',
				'description' => __('Select how many columns to use for this pricing table.', 'Nimva'),
				'value' => '4',
				'min' => '3',
				'max' => '5',
				'step' => '1',
				'unit' => 'columns',
				'read' => 'readonly',
				'admin_label' => true			
			),
	        array(
				'type' => 'switch',
				'heading' => __('Spaced Columns', 'Nimva'),
				'param_name' => 'spaced_columns',
				'value' => 'false',
				'description' => __( 'Add spacing between the pricing table columns', 'Nimva' )
			),	
			array(
	            'type' => 'multiselect',
	            'heading' => __( 'Select specific columns to create a Pricing Table', 'Nimva' ),
	            'param_name' => 'specific_columns',	            
	            'value' => $pricings,
	            'description' => ''
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
	

