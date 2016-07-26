<?php
global $awesome_icons_list;
return array(
	'name' => __( 'Tab', 'js_composer' ),
	'base' => 'vc_tab',
	'allowed_container_element' => 'vc_row',
	'is_container' => true,
	'content_element' => false,
	//'deprecated' => '4.6',
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Title', 'js_composer' ),
			'param_name' => 'title',
			'description' => __( 'Enter title of tab.', 'js_composer' ),
		),
				
		array(
	    	'type' => 'awesome_icons',
	        'heading' => __( 'Title Icon', 'Nimva' ),
	        'param_name' => 'icon',
			//'holder' => 'div',
	       // 'width' => 200,
	        'value' => $awesome_icons_list,
	        //'encoding' => 'false',		        
	        'description' => __( 'Optionally you can insert an icon for the title.', 'Nimva' )
	    ),
			
		array(
			'type' => 'tab_id',
			'heading' => __( 'Tab ID', 'js_composer' ),
			'param_name' => 'tab_id',
		),
	),
	'js_view' => 'VcTabView',
);