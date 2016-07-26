<?php
$output = $address = $size = $zoom = $type = $el_class = '';
extract(shortcode_atts(array( 
	'title' => '', 
	'message' => '', 
	'address' => 'New York Ave, Brooklyn, New York',
    'size' => 250,
    'zoom' => 14,
    'type' => 'ROADMAP',
	'email' => '',
	'phone' => '',
	'popup' => 'true',
	'scrollwheel' => 'true',
	'pan' => 'true',
	'zoom_control' => 'true',
	'type_control' => 'true',
	'streetview' => 'true',
    'el_class' => '',
	'css_animation' => ''
), $atts));

if ( $address == '' ) { return null; }

$el_class = $this->getExtraClass($el_class);
$bubble = ($bubble!='' && $bubble!='0') ? '&amp;iwloc=near' : '';



global $map_counter;
	
$current_link = $_SERVER["REQUEST_URI"];
// add an unique class to each map
if(strpos($current_link, 'vc_editable=true')) {
	$map_counter = rand();
}
else{
	if( ! isset($map_counter) ){
	  $map_counter = 1;
	}
	else{
	  $map_counter ++;
	}
}	

$map_id = 'google_map_element_'.$map_counter;

$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_gmaps_widget wpb_content_element'.$el_class, $this->settings['base']);
$css_class .= $this->getCSSAnimation($css_animation);
$output .= "\n\t".'<div class="'.$css_class.'">';
$output .= "\n\t\t".'<div class="wpb_wrapper">';

$output .= ' <div class="googlemaps gmap" data-id="'.$map_id.'" address="'.$address.'" data-map="'.$type.'" data-zoom="'.$zoom.'" data-title="'.$title.'" data-message="'.$message.'" data-email="'.$email.'" data-phone="'.$phone.'" data-popup="'.$popup.'" data-scrollwheel="'.$scrollwheel.'" data-pan="'.$pan.'" data-zoom_control="'.$zoom_control.'" data-type_control="'.$type_control.'" data-streetview="'.$streetview.'">
                	<div id="'.$map_id.'" class="google_map_render" style="height:'.$size.'px">
                    </div>
                </div>';


$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
$output .= "\n\t".'</div> '.$this->endBlockComment('.wpb_gmaps_widget');

echo $output;