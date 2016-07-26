<?php
$output = $color = $size = $icon = $target = $href = $el_class = $title = $position = '';
extract(shortcode_atts(array(
	'style' => 'minimal',
    'color' => 'red',
    'size' => 'small',
    'align' => '',
    'target' => '_self',
    'href' => '',
    'el_class' => '',
	'css_animation' => '',
    'title' => 'Text on the Button',
    'icon_type' => 'old_fontawesome',
    'icon_fontawesome' => 'fa fa-adjust',
    'icon_openiconic' => 'vc-oi vc-oi-dial',
    'icon_typicons' => 'typcn typcn-adjust-brightness',
    'icon_linecons' => 'vc_li vc_li-heart',
    'icon_entypo' => 'entypo-icon entypo-icon-note',
	'icon' => '',
    'position' => '',
	'button_inverse' => 'false'
), $atts));
$a_class = '';

$css_animation = ($css_animation != '') ? 'wpb_animate_when_almost_visible wpb_'.$css_animation : '';

if ( $el_class != '' ) {
    $tmp_class = explode(" ", strtolower($el_class));
    $tmp_class = str_replace(".", "", $tmp_class);
    if ( in_array("prettyphoto", $tmp_class) ) {
        wp_enqueue_script( 'prettyphoto' );
        wp_enqueue_style( 'prettyphoto' );
        $a_class .= ' prettyphoto';
        $el_class = str_ireplace("prettyphoto", "", $el_class);
    }
}

$align = !empty($align) ? ('style="text-align: ' . $align . ';"') : '';

$el_class = $this->getExtraClass($el_class);

//$icon = !empty($icon) ? ( '<i class="fa '.$icon.'"></i>' ) : '';

if($icon_type == 'old_fontawesome'){
	$icon = !empty($icon) ? ( '<i class="fa '.$icon.'"></i>' ) : '';
}

else {
	
	if( function_exists('vc_icon_element_fonts_enqueue') ){
		vc_icon_element_fonts_enqueue( $icon_type );
	}	

	$icon_output = ( !empty(${"icon_" . $icon_type}) ) ? ${"icon_" . $icon_type} : '';

	if( !empty( $icon_output ) ) {			
		$icon = '<i class="'.$icon_output.'"></i>';
	}

}

$inverse = ($button_inverse == 'true') ? (' inverse ' ) : '';

if(!empty($align)):
	$output = '<div class="' . $el_class . ' ' . $css_animation .'" '.$align.'>';
endif;
		if( $style == 'minimal' ) :
			$output .= '<a href="'.$href.'" class="simple-button ' . $color . ' ' . $size . $inverse . ' ' . $el_class . '" target="'.$target.'">'. $icon . '<span>' . do_shortcode($title). '</span></a>';
		else:
			$output .= '<a href="'.$href.'" class="simple-button-3d ' . $color . ' ' . $size . $inverse . ' ' . $el_class . '" target="'.$target.'">'. $icon . '<span>' . do_shortcode($title). '</span></a>';
		endif;
if(!empty($align)):		
	$output .= '</div>';	
endif;	

echo $output . $this->endBlockComment('button') . "\n";