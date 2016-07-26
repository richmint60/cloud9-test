<?php
/*
Faq Element
*/
global $wpdb;
$tax2 = $wpdb->get_results("SELECT $wpdb->terms.term_id, $wpdb->terms.name, $wpdb->term_taxonomy.taxonomy FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->term_taxonomy.taxonomy = 'faq_category' && $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id ");

$taxon2 = array();
if ($tax2) {
	foreach ( $tax2 as $taxonomy ) {
		$taxon2[$taxonomy->term_id] = $taxonomy->name;
	}
} 
else {
	$taxon2["No faq category found"] = 0;
}  

$faq_entries = get_posts( 'post_type=faq&orderby=title&numberposts=-1&order=ASC' );

if ( $faq_entries != null && !empty( $faq_entries ) ) {
    foreach ( $faq_entries as $key => $entry ) {
        $faq[$entry->ID] = $entry->post_title;
    }
}

	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
		    'name' => __('FAQs', 'Nimva'),
		    'base' => 'faqs',
		    'weight' => 19,
		    'icon' => 'icon-wpb-faq',
		    'category' => 'Nimva',
			'description' => __('Add FAQs to your site.', 'Nimva'),
			'icon' => get_template_directory_uri() . '/images/vc/faqs.png',
		    'params' => array(	
				/*
				array(
		            'type' => 'textfield',
		            'heading' => __('ID', 'Nimva'),
		            'param_name' => 'faq_id',
		            'description' => __('Add a unique ID identifier (name or number) if you are using more than one FAQs section on a page', 'Nimva')
		        ),
				*/
		        array(
					'type' => 'range',
					'heading' => __( 'Count', 'Nimva' ),
					'param_name' => 'count',
					'description' => __('How many FAQs you would like to show? (-1 means unlimited)', 'Nimva'),
					'value' => '10',
					'min' => '-1',
					'max' => '50',
					'step' => '1',
					'unit' => 'clients',
					'admin_label' => true			
				),
				
				array(
				  'type' => 'switch',
				  'param_name' => 'filters',
				  'value' => 'true',
				  'heading' => __('Show/hide filters.', 'Nimva'),
				),
				array(
					'type' => 'multiselect',
					'heading' => __( 'Select Categories', 'Nimva' ),
					'param_name' => 'category',
					'value' => $taxon2,
					'description' => __( 'Only show FAQs items from these categories', 'Nimva' )
				),
				
		        array(
		            'type' => 'multiselect',
		            'heading' => __( 'Select specific FAQs', 'Nimva' ),
		            'param_name' => 'faqs',		            
		            'value' => $faq,		            
		        ),		
				
				vc_map_add_css_animation(),
				
		        array(
		            'type' => 'textfield',
		            'heading' => __('Extra class name', 'Nimva'),
		            'param_name' => 'el_class',
		            'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'Nimva')
		        ),			  
		),
				//'js_view' => 'VcTextSeparatorView',		    					
	);
	

