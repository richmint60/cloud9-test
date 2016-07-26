<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $el_class
 * @var $value
 * @var $units
 * @var $color
 * @var $custom_color
 * @var $label_value
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Vc_Pie
 */
$title = $el_class = $value = $units = $color = $custom_color = $label_value = $css = '';
$atts = $this->convertOldColorsToNew( $atts );
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'vc_pie' );

$colors = array(
	'blue' => '#5472d2',
	'turquoise' => '#00c1cf',
	'pink' => '#fe6c61',
	'violet' => '#8d6dc4',
	'peacoc' => '#4cadc9',
	'chino' => '#cec2ab',
	'mulled-wine' => '#50485b',
	'vista-blue' => '#75d69c',
	'orange' => '#f7be68',
	'sky' => '#5aa1e3',
	'green' => '#6dab3c',
	'juicy-pink' => '#f4524d',
	'sandy-brown' => '#f79468',
	'purple' => '#b97ebb',
	'black' => '#2a2a2a',
	'grey' => '#ebebeb',
	'white' => '#ffffff',
);
/*
if ( 'custom' === $color ) {
	$color = $custom_color;
} else {
	$color = isset( $colors[ $color ] ) ? $colors[ $color ] : '';
}
*/
if ( ! $color ) {
	$color = '#f96e5b';
}

$icon = ( $style == 'icon') ? 'data-pie-icon="fa '.$icon.'"' : '';

$custom_value = ( $style == 'custom_counter') ? 'data-custom-value="'.$custom_value.'"' : '';

$symbol = ( $style == 'custom_counter') ? 'data-symbol="'.$symbol.'"' : '';

$symbol_position = ( $style == 'custom_counter') ? 'data-symbol-pos="'.$symbol_position.'"' : '';

$text = ( $style == 'custom_text') ? 'data-pie-text="'.$custom_text_field.'"' : '';

//$content_color = 'color: ' . $content_color . ';';
//$content_size ='font-size: ' . $content_size . 'px;';

$desc_color = ($desc_color != '#777777') ? 'color: ' . $desc_color . ';' : '' ;
$desc_size = ($desc_size != '29') ? 'font-size: ' . $desc_size . 'px; line-height:1.5;' : '' ;

$class_to_filter = 'vc_pie_chart wpb_content_element';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$output = '<div class= "' . esc_attr( $css_class ) . '" data-color="'.$content_color.'" data-font-size="'.$content_size.'" data-pie-type="'.$style.'" '. $custom_value . ' ' . $symbol . ' ' . $symbol_position . ' ' .$icon.' ' .$text. ' data-bar-width="'.$bar_width.'" data-pie-value="' . esc_attr( $value ) . '" data-pie-label-value="' . esc_attr( $label_value ) . '" data-pie-units="' . esc_attr( $units ) . '" data-pie-color="' . esc_attr( $color ) . '">';
	$output .= '<div class="wpb_wrapper">';
	$output .= '<div class="vc_pie_wrapper">';
	$output .= '<span class="vc_pie_chart_back" style="border: '.$bar_width.'px solid '.$track_color.'"></span>';
	$output .= '<span class="vc_pie_chart_value"></span>';
	$output .= '<canvas width="101" height="101"></canvas>';
	if( !empty($description) ) {
		$output .= '<div class="pie_description" style="' . $desc_color . $desc_size . '">'.$description.'</div>';
	}
	$output .= '</div>';
	

if ( '' !== $title ) {
	$output .= '<h4 class="wpb_heading wpb_pie_chart_heading">' . $title . '</h4>';
}

	$output .= '</div>';
$output .= '</div>';

echo $output;
