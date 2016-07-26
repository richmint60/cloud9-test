<?php
/*
Posts Grid Element
*/
	global $posts, $categories;

	$posts_entries = get_posts( 'post_type=post&orderby=title&numberposts=-1&order=ASC' );
	foreach ( $posts_entries as $key => $entry ) {
	    $posts[$entry->ID] = $entry->post_title;
	}

	$cats_entries = get_categories( 'orderby=name&hide_empty=0' );
	foreach ( $cats_entries as $key => $entry ) {
	    $categories[$entry->term_id] = $entry->name;
	}

	// Note that all keys=values in mapped shortcode can be used with javascript variable vc.map, and php shortcode settings variable.
	return array(
			  'name' => __('Posts Grid', 'Nimva'),
			    'base' => 'recent_posts',
			    'icon' => 'icon-wpb-application-icon-large',
			    'weight' => 24,
			    'category' => 'Nimva',
			    'description' => __('Posts in grid view', 'Nimva'),
			    'icon' => get_template_directory_uri() . '/images/vc/posts-grid.png',
			    'params' => array(
			    array(
			        'type' => 'textfield',
			        'heading' => __('Box Title', 'Nimva'),
			  	  	'admin_label' => true,
			        'param_name' => 'box_title',
			        'description' => __('Enter a title for the entire recent posts section.', 'Nimva')
			      ),
			  	array(
			      	'type' => 'range',
			        'heading' => __( 'Posts count', 'Nimva' ),
			        'param_name' => 'items',
			        'value' => '6',
			        'min' => '-1',
			  		'read' => 'readonly',
			  		'admin_label' => true,
			          'max' => '50',
			          'step' => '1',
			          'unit' => 'px',
			          'description' => __( 'Select the number of posts you want to be displayed.', 'Nimva' )
			      ),
			  	
			  	array(
			        'type' => 'dropdown',
			        'heading' => __('Style', 'Nimva'),
			        'param_name' => 'style',
			  	  	'admin_label' => true,
			        'value' => array(__('Style 1', 'Nimva') => 'style1', __('Style 2', 'Nimva') => 'style2'),
			        'description' => __('Select the way the posts will be displayed.', 'Nimva')
			      ),
			  	
			  	array(
			      	'type' => 'range',
			        'heading' => __( 'Posts columns', 'Nimva' ),
			        'param_name' => 'columns',
			        'value' => '3',
			  		'read' => 'readonly',
			  		'admin_label' => true,
			        'min' => '3',
			        'max' => '5',
			        'step' => '1',
			        'unit' => 'px',
			  		'dependency' => Array('element' => 'style', 'value' => 'style1'),
			        'description' => __( 'Select the number of posts you want to be displayed.', 'Nimva' )
			      ),
			  	
			  	array(
			        'type' => 'switch',
			        'heading' => __('Show Post Title', 'Nimva'),
			        'param_name' => 'posts_title',
			  	  	'admin_label' => true,
			        'value' => 'true',
			        'description' => __('Show/hide post title.', 'Nimva')
			      ),

			  	array(
			        'type' => 'switch',
			        'heading' => __('Show Thumbnail', 'Nimva'),
			        'param_name' => 'thumbnail',
			  	  	'admin_label' => true,
			        'value' => 'true',
			        'description' => __('Show/hide post thumbnail.', 'Nimva')
			      ),
			  	
			  	array(
			        'type' => 'switch',
			        'heading' => __('Show Date', 'Nimva'),
			        'param_name' => 'show_date',
			  	  	'admin_label' => true,
			        'value' => 'true',
			        'description' => __('Show/hide post date.', 'Nimva')
			      ),

			  	array(
			        'type' => 'switch',
			        'heading' => __('Show Excerpt', 'Nimva'),
			        'param_name' => 'show_excerpt',
			  	  	'admin_label' => true,
			        'value' => 'true',
			        'description' => __('Show/hide post excerpt.', 'Nimva')
			      ),
			  	
			  	array(
			        'type' => 'switch',
			        'heading' => __('Show Continue Reading Link', 'Nimva'),
			        'param_name' => 'continue_reading',
			  	  	'admin_label' => true,
			        'value' => 'true',
			        'description' => __('Show/hide \'continue reading\' link to the actual post page.', 'Nimva')
			      ),
			  	array(
			  		'type' => 'multiselect',
			  		'heading' => __( 'Select specific Posts', 'Nimva' ),
			  		'param_name' => 'posts',
			  		'value' => $posts,			  				  					
			  	),
				/*
			  	array(
			      	'type' => 'multiselect',
			          'heading' => __( 'Select specific Posts', 'Nimva' ),
			          'param_name' => 'posts',
			          'options' => $posts,
			          'value' => '',
			  	),
			  	*/
			  	array(
			  		'type' => 'multiselect',
			  		'heading' => __( 'Select specific Categories', 'Nimva' ),
			  		'param_name' => 'category_id',
			  		'value' => $categories,			  				  					
			  	),			  	
			  	
			  	array(
			        'type' => 'dropdown',
			        'heading' => __('Order Posts by date', 'Nimva'),
			        'param_name' => 'posts_order',
			  	  'admin_label' => true,
			        'value' => array( __('Descending', 'Nimva') => 'DESC', __('Ascending', 'Nimva') => 'ASC'),
			        'description' => __('Select the way the posts will be ordered - ascending or descending.', 'Nimva')
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
	

