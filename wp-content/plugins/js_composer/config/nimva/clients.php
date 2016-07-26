<?php
/*
Clients Element
*/
	global $clients;

	$clients = array();

	$clients_entries = get_posts( 'post_type=clients&orderby=title&numberposts=-1&order=ASC' );

	if ( $clients_entries != null && !empty( $clients_entries ) ) {
	    foreach ( $clients_entries as $key => $entry ) {
	        $clients[$entry->ID] = $entry->post_title;
	    }
	}

	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
	    'name' => __('Clients', 'Nimva'),
	    'base' => 'clients',
	    'class' => '',
	    'weight' => 16,
	    'icon' => 'icon-wpb-clients',
	    'category' => __('Content', 'Nimva'),
		'description' => __('Add clients to your site.', 'Nimva'),
		'icon' => get_template_directory_uri() . '/images/vc/clients.png',
	    'params' => array(
			
			array(
	            'type' => 'textfield',
	            'heading' => __( 'Heading Title', 'Nimva' ),
	            'param_name' => 'title',
	            'value' => '',
	            'description' => __( 'Provide a title for your clients section', 'Nimva' ),
				'admin_label' => true
	        ),

	        array(
				'type' => 'range',
				'heading' => __( 'Count', 'Nimva' ),
				'param_name' => 'count',
				'description' => __('How many Clients you would like to show? (-1 means unlimited)', 'Nimva'),
				'value' => '10',
				'min' => '-1',
				'max' => '50',
				'step' => '1',
				'unit' => 'clients',
				'admin_label' => true			
			),
	        array(
	            'type' => 'multiselect',
	            'heading' => __( 'Select specific Clients', 'Nimva' ),
	            'param_name' => 'clients',
	            'value' => $clients,	             
	            'description' => ''
	        ),	
			
			vc_map_add_css_animation(),
				
	        array(
	            'type' => 'textfield',
	            'heading' => __('Extra class name', 'Nimva'),
	            'param_name' => 'el_class',
	            'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'Nimva')
	        ),
				//'js_view' => 'VcTextSeparatorView',		    					
	    ),
	);
	

