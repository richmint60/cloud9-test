<?php
/*
Portfolio Element
*/

global $wpdb;
$tax = $wpdb->get_results( "SELECT $wpdb->terms.term_id, $wpdb->terms.name, $wpdb->term_taxonomy.taxonomy FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->term_taxonomy.taxonomy = 'portfolio_category' && $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id ");
  
$taxon = array();
if ($tax) {
	foreach ( $tax as $taxonomy ) {
    	$taxon[$taxonomy->term_id] = $taxonomy->name;
    }
} 
else {
	$taxon["No portfolio category found"] = 0;
}

$portfolio_entries = get_posts( 'post_type=creativo_portfolio&orderby=title&numberposts=-1&order=ASC' );
foreach ( $portfolio_entries as $key => $entry ) {
    $portfolio_posts[$entry->ID] = $entry->post_title;
}

	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		'name' => __('Portfolio', 'Nimva'),
		'base' => 'recent_works',
		'icon' => 'icon-wpb-portfolio',
		'category' =>'Nimva',
		'weight' => 23,
		'description' => __('Add portfolio items', 'Nimva'),
		'icon' => get_template_directory_uri() . '/images/vc/portfolio.png',
		'params' => array(
			   	   array(
			        'type' => 'textfield',
			        'heading' => __('Box Title', 'Nimva'),
			        'param_name' => 'title',
			  	  'admin_label' => true,
			        'description' => __('You should enter a title if you are planning to use the Carousel style.', 'Nimva')
			      ),
			    	array(
			      	'type' => 'range',
			          'heading' => __( 'Items count', 'Nimva' ),
			          'param_name' => 'items',
			          'value' => '6',
			          'min' => '1',
			  		'read' => 'readonly',
			  		'admin_label' => true,
			          'max' => '50',
			          'step' => '1',
			          'unit' => 'px',
			          'description' => __( 'Select the number of portfolio items you want to be displayed.', 'Nimva' )
			      ),
			  	array(
			      	'type' => 'multiselect',
			          'heading' => __( 'Select specific Portfolio items', 'Nimva' ),
			          'param_name' => 'posts',
			          'value' => $portfolio_posts,			          
			      ),
			  	array(
			      	'type' => 'multiselect',
			          'heading' => __( 'Select Categories', 'Nimva' ),
			          'param_name' => 'category',
			          'value' => $taxon,			          
			          'description' => __( 'Only show portfolio items from these categories', 'Nimva' )
			      ),
			  	
			  	array(
			        'type' => 'switch',
			        'heading' => __('Show Portfolio Details', 'Nimva'),
			        'param_name' => 'portfolio_details',	  
			        'value' => 'true',
			        'description' => __('Show/hide portfolio item details - title &amp; category below image.', 'Nimva')
			      ),
			  	
			  	array(
			        'type' => 'dropdown',
			        'heading' => __('Portfolio Display', 'Nimva'),
			        'param_name' => 'portfolio_display',
			  	  'admin_label' => true,
			        'value' => array(__('Carousel', 'Nimva') => 'carousel', __('Normal', 'Nimva') => 'normal'),
			        'description' => __('Select the way the portfolio items will be displayed.', 'Nimva')
			      ),
			  	
			  	array(
			        'type' => 'switch',
			        'heading' => __('Enable Fitlters', 'Nimva'),
			        'param_name' => 'show_filters',
			  	  'dependency' => Array('element' => 'portfolio_display', 'value' => 'normal'),
			  	  'admin_label' => true,
			        'value' => 'true',
			        'description' => __('Show/hide portfolio filters.', 'Nimva')
			      ),
			  	
			  	array(
			        'type' => 'dropdown',
			        'heading' => __('Filters position', 'Nimva'),
			        'param_name' => 'filter_pos',
			  	  'dependency' => Array('element' => 'portfolio_display', 'value' => 'normal'),
			  	  'admin_label' => true,
			        'value' => array(__('Left', 'Nimva') => 'left', __('Center', 'Nimva') => 'center', __('Right', 'Nimva') => 'right'),
			        'description' => __('Select the way the portfolio items will be displayed.', 'Nimva')
			      ),
			  	
			  	array(
			      	'type' => 'range',
			          'heading' => __( 'Columns', 'Nimva' ),
			          'param_name' => 'columns',
			          'value' => '4',
			          'min' => '2',
			  		'read' => 'readonly',
			  		'admin_label' => true,
			  		'dependency' => Array('element' => 'portfolio_display', 'value' => 'normal'),
			          'max' => '4',
			          'step' => '1',
			          'unit' => 'columns',
			          'description' => __( 'Select the number of columns used to display portfolio items.', 'Nimva' )
			      ),
			  	
			  	vc_map_add_css_animation(),
			  	
			  	array(
			        'type' => 'textfield',
			        'heading' => __('Extra class name', 'Nimva'),
			        'param_name' => 'el_class',
			        'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'Nimva')
			      )
		),
				//'js_view' => 'VcTextSeparatorView',		    					
	);
	

