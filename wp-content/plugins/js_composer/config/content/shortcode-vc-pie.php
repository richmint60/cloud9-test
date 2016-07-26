<?php
global $awesome_icons_list;

return array(
	'name' => __( 'Pie Chart', 'js_composer' ),
	'base' => 'vc_pie',
	'class' => '',
	'icon' => 'icon-wpb-vc_pie',
	'category' => __( 'Content', 'js_composer' ),
	'description' => __( 'Animated pie chart', 'js_composer' ),
	'params' => array(
		/*array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'js_composer' ),
			'param_name' => 'title',
			'description' => __( 'Enter text used as widget title (Note: located above content element).', 'js_composer' ),
			'admin_label' => true,
		),*/
		array(
			'type' => 'range',
			'heading' => __( 'Percent', 'Nimva' ),
			'param_name' => 'value',
			'description' => __('Input graph value here. Witihn a range 0-100.', 'Nimva'),
			'value' => '50',
			'min' => '0',
			'max' => '100',
			'step' => '1',
			//'unit' => '%',
			//'read' => 'readonly',
			'admin_label' => true			
		),
		array(
		  'type' => 'colorpicker',
		  'heading' => __('Bar color', 'Nimva'),
		  'param_name' => 'color',
		  'value' => '#f96e5b', //Default White color
		  'description' => __('Select the color of the circular bar', 'Nimva')
		),
		
		array(
		  'type' => 'colorpicker',
		  'heading' => __('Track color', 'Nimva'),
		  'param_name' => 'track_color',
		  'value' => '#dddddd', //Default White color
		  'description' => __('Select the color of the track for the bar', 'Nimva')
		),
		
		array(
			'type' => 'range',
			'heading' => __( 'Bar Width', 'Nimva' ),
			'param_name' => 'bar_width',
			'description' => __('Select the width of the bar line.', 'Nimva'),
			'value' => '5',
			'min' => '1',
			'max' => '20',
			'step' => '1',
			//'unit' => 'px',
			'admin_label' => true			
		),
		
		array(
		  'type' => 'dropdown',
		  'heading' => __('Content inside Pie', 'Nimva'),
		  'param_name' => 'style',
		  'value' => array(__('Percent', 'Nimva') => 'percent', __('Custom Value Counter', 'Nimva') => 'custom_counter', __('Icon', 'Nimva') => 'icon', __('Custom Text', 'Nimva') => 'custom_text'),
		  'description' => __('Choose what will be displayed inside the Pie.', 'Nimva'),
		  'admin_label' => true
		 
		),

		array(
            "type" => "textfield",
            "heading" => __("Custom Value", "Nimva"),
            "param_name" => "custom_value",
			"value" => "",
            "description" => __("Add an integer value to be displayed inside the pie. This value will also be used as a counter.", "Nimva"),
			"dependency" => Array('element' => 'style', 'value' => array('custom_counter'))
        ),
		
		array(
            "type" => "textfield",
            "heading" => __("Custom Symbol", "Nimva"),
            "param_name" => "symbol",
			"value" => "",
            "description" => __("Add a custom symbol to the Custom Counter.", "Nimva"),
			"dependency" => Array('element' => 'style', 'value' => array('custom_counter'))
        ),
		
		array(
		  "type" => "dropdown",
		  "heading" => __("Content Symbol Position", "Nimva"),
		  "param_name" => "symbol_position",
		  "value" => array(__("Before", "Nimva") => "before", __("After", "Nimva") => "after"),
		  "description" => __("Choose the position of the custom symbol.", "Nimva"),
		  "dependency" => Array('element' => 'style', 'value' => array('custom_counter'))		 
		),

		array(
			"type" => "awesome_icons",
			"heading" => __( "Icon", "Nimva" ),
			"param_name" => "icon",
			"width" => 200,
			"value" => $awesome_icons_list,
			"encoding" => "false",
			"dependency" => Array('element' => 'style', 'value' => array('icon'))
		),
		
		array(
            "type" => "textfield",
            "heading" => __("Custom Text", "Nimva"),
            "param_name" => "custom_text_field",
			"value" => "",
            "description" => __("Add a custom text to be displayed inside the pie graph.", "Nimva"),
			"dependency" => Array('element' => 'style', 'value' => array('custom_text'))
        ),
        array(
		  "type" => "colorpicker",
		  "heading" => __("Content inside Pie - color", 'Nimva'),
		  "param_name" => "content_color",
		  "value" => '#777777', //Default White color
		  "description" => __("Select the color of the content that appears inside the circular bar", 'Nimva')
		),
		
		array(
			"type" => "range",
			"heading" => __( "Content inside Pie - font size", "Nimva" ),
			"param_name" => "content_size",
			"description" => __('Select the font size of the content that appears inside the circular bar.', 'Nimva'),
			"value" => "29",
			"min" => "10",
			"max" => "50",
			"step" => "1",
			"unit" => 'px'
		),
		array(
            "type" => "textarea",
            "heading" => __("Short Description", "Nimva"),
            "param_name" => "description",
			"value" => "",
            "description" => __("Add a description bellow the pie chart.", "Nimva"),			
        ),
		
		array(
		  "type" => "colorpicker",
		  "heading" => __("Short description - color", 'Nimva'),
		  "param_name" => "desc_color",
		  "value" => '#777777', //Default White color
		  "description" => __("Select the color of the short description", 'Nimva')
		),
		
		array(
			"type" => "range",
			"heading" => __( "Short description - font size", "Nimva" ),
			"param_name" => "desc_size",
			"description" => __('Select the font size of the short description.', 'Nimva'),
			"value" => "16",
			"min" => "10",
			"max" => "40",
			"step" => "1",
			"unit" => 'px'
		),		
		/*
		array(
			'type' => 'textfield',
			'heading' => __( 'Value', 'js_composer' ),
			'param_name' => 'value',
			'description' => __( 'Enter value for graph (Note: choose range from 0 to 100).', 'js_composer' ),
			'value' => '50',
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Label value', 'js_composer' ),
			'param_name' => 'label_value',
			'description' => __( 'Enter label for pie chart (Note: leaving empty will set value from "Value" field).', 'js_composer' ),
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Units', 'js_composer' ),
			'param_name' => 'units',
			'description' => __( 'Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'js_composer' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Color', 'js_composer' ),
			'param_name' => 'color',
			'value' => getVcShared( 'colors-dashed' ) + array( __( 'Custom', 'js_composer' ) => 'custom' ),
			'description' => __( 'Select pie chart color.', 'js_composer' ),
			'admin_label' => true,
			'param_holder_class' => 'vc_colored-dropdown',
			'std' => 'grey',
		),
		array(
			'type' => 'colorpicker',
			'heading' => __( 'Custom color', 'js_composer' ),
			'param_name' => 'custom_color',
			'description' => __( 'Select custom color.', 'js_composer' ),
			'dependency' => array(
				'element' => 'color',
				'value' => array( 'custom' ),
			),
		),
		*/
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'js_composer' ),
			'param_name' => 'css',
			'group' => __( 'Design Options', 'js_composer' ),
		),
	),
);