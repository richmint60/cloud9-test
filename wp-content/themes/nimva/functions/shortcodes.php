<?php

//////////////////////////////////////////////////////////////////
// FontAwesome Icons
//////////////////////////////////////////////////////////////////
add_shortcode('fontawesome', 'shortcode_fontawesome');
function shortcode_fontawesome($atts) {
	
	extract(shortcode_atts(array(
			'icon' => 'fa fa-laptop'			
	), $atts));
			
	$html = '';
	$html .= '<i class="'.$icon.'"></i>';

	return $html;
}

//////////////////////////////////////////////////////////////////
// Cool Title
//////////////////////////////////////////////////////////////////
add_shortcode('ctitle', 'shortcode_ctitle');
function shortcode_ctitle($atts) {
	$html = '';
	
	extract(shortcode_atts(array(
			'title' => 'Your title here',
			'icon_type' => 'old_fontawesome',
			'icon_fontawesome' => 'fa fa-adjust',
			'icon_openiconic' => 'vc-oi vc-oi-dial',
			'icon_typicons' => 'typcn typcn-adjust-brightness',
			'icon_linecons' => 'vc_li vc_li-heart',
			'icon_entypo' => 'entypo-icon entypo-icon-note',
			'icon' => '',
			'color' => '',
			'title_border' => '',
			'title_border_big' => '',
			'big_border_en' => 'true',
			'uppercase' => 'true',
			'position' => 'left',
			'font_size' => '11',
			'css_animation' => '',
			'el_class' => ''			
	), $atts));
	
	$css_animation = ($css_animation != '') ? 'wpb_animate_when_almost_visible wpb_'.$css_animation : '';
	
	$icon_class = $icon_size = '';
	
	if($color) : $color = 'color: ' . $color . '; '; endif;
	
	if($title_border) : $title_border = 'border-bottom-color:' . $title_border . '; '; endif;
	
	$uppercase = ($uppercase == 'false') ? 'text-transform: none;' : '';
	
	if ( $font_size != '11' ) { 
		$icon_size = 'font-size: '.(16 + ($font_size-11)) . 'px; line-height: ' . (22+($font_size-12)) . 'px;';
		$font_size = 'font-size: ' . $font_size . 'px; line-height: ' . ($font_size+12) . 'px;'; 
		
	}
	
	$big_border = ($big_border_en == 'false') ? 'border-bottom: none;' : '';
	
	if ( $position == 'right') $icon_pos = 'float:left;' ; else $icon_pos = '';
	
	$position = ( $position == 'center' || $position == 'right' ) ? 'text-align: ' . $position . '; ' : '' ;
	
	// New Icon function

	
	if($icon_type == 'old_fontawesome'){
		if($icon) : $icon_class = '<i class="fa '.$icon.'" style="' . $color . $title_border . $icon_pos . $icon_size . '"></i>'; endif;
	}

	else {
		
		if( function_exists('vc_icon_element_fonts_enqueue') ){
			vc_icon_element_fonts_enqueue( $icon_type );
		}	

		$icon_output = ( !empty(${"icon_" . $icon_type}) ) ? ${"icon_" . $icon_type} : '';

		if( !empty( $icon_output ) ) {			
			$icon_class = '<i class="'.$icon_output.'" style="' . $color . $title_border . $icon_pos . $icon_size . '"></i>';
		}

	}
	
	
	
	if($title_border_big) : $title_border_big = 'border-color: '.$title_border_big.' ;' ; endif;
	
	$extra_style = ( $title_border_big || ($big_border != '') || ($position != '') ) ? 'style="' . $title_border_big . $big_border . $position . '"' : '';

	$html .= '<div class="title-outer ' . $el_class . ' '. $css_animation . '" '. $extra_style .'><h3 style="' . $color . $title_border . $uppercase . $font_size . '">'. $title .'</h3>' . $icon_class . '</div>';
	

	return $html;
}
		
		
//////////////////////////////////////////////////////////////////
// Social Links
//////////////////////////////////////////////////////////////////
add_shortcode('social_links', 'shortcode_social_links');
function shortcode_social_links($atts, $content = null) {
	
	extract(shortcode_atts(array(
			'position' => 'left',
			//'transparent' => 'false',
			'facebook' => '',
			'color' => '',
			'twitter' => '',
			'google' => '',
			'instagram' => '',
			'dribbble' => '',
			'tumblr' => '',
			'vimeo' => '',
			'youtube' => '',
			'linkedin' => '',
			'flickr' => '',
			'skype' => '',
			'pinterest' => '',
			'behance' => '',
			'css_animation' => '',
			'el_class' => ''			
	), $atts));
	
	$css_animation = ($css_animation != '') ? 'wpb_animate_when_almost_visible wpb_'.$css_animation : '';
	
	$position = ($position != 'left') ? 'style="text-align:'.$position.';"' : '' ;
	
	$color = ($color != '') ? 'style="color:'.$color.'"' : '';
	
	//$transparent = ($transparent =='true') ? 'style="background-color: transparent;"' : '';
	
	$html = '';
	
	if($facebook || $twitter || $google || $dribble || $tumblr || $vimeo || $youtube || $linkedin || $flickr || $skype || $pinterest || $behance) {	
		
		$html .= '<ul class="team-skills changed '.$el_class.' ' . $css_animation . '" '.$position.'>';
			if($facebook){
				$html .='<li><a href="'.$facebook.'"  class="ntip" alt="Facebook" original-title="Facebook" '.$color.' target="_blank"><i class="fa fa-facebook"></i></a>';
			}
			if($twitter){
				$html .='<li><a href="'.$twitter.'" class="ntip" alt="Twitter" original-title="Twitter" '.$color.' target="_blank"><i class="fa fa-twitter"></i></a>';
			}
			if($google){
				$html .='<li><a href="'.$google.'" class="ntip" alt="Google+" original-title="Google+" '.$color.' target="_blank"><i class="fa fa-google-plus"></i></a>';
			}
			if($instagram){
				$html .='<li><a href="'.$instagram.'" class="ntip" alt="Instragram" original-title="Instagram" '.$color.' target="_blank"><i class="fa fa-instagram"></i></a>';
			}
			if($linkedin){
				$html .='<li><a href="'.$linkedin.'" class=" ntip" alt="LinkedIn" original-title="LinkedIn" '.$color.' target="_blank"><i class="fa fa-linkedin"></i></a>';
			}
			if($dribbble){
				$html .='<li><a href="'.$dribbble.'" class="dribbble ntip" alt="Dribbble" original-title="Dribble" '.$color.' target="_blank"><i class="fa fa-dribbble"></i></a>';
			}
			if($pinterest){
				$html .='<li><a href="'.$pinterest.'" class="pinterest ntip" alt="Pinterest" original-title="Pinterest" '.$color.' target="_blank"><i class="fa fa-pinterest"></i></a>';			
			}
			if($flickr){
				$html .='<li><a href="'.$flickr.'" class="flickr ntip" alt="Flickr" original-title="Flickr" '.$color.' target="_blank"><i class="fa fa-flickr"></i></a>';			
			}			
			if($tumblr){
				$html .='<li><a href="'.$tumblr.'" class="tumblr ntip" alt="Tumblr" original-title="Tumblr" '.$color.' target="_blank"><i class="fa fa-tumblr"></i></a>';
			}					
			
			if($skype){
				$html .='<li><a href="'.$skype.'" class="skype ntip" alt="Skype" original-title="Skype" '.$color.' target="_blank"><i class="fa fa-skype"></i></a>';			
			}			
			if($behance){
				$html .='<li><a href="'.$behance.'" class="behance ntip" alt="Behance" original-title="Behance" '.$color.' target="_blank"><i class="fa fa-behance"></i></a>';			
			}
			if($vimeo){
				$html .='<li><a href="'.$vimeo.'" class="vimeo ntip" alt="Vimeo" original-title="Vimeo" '.$color.' target="_blank"><i class="fa fa-vimeo-square"></i></a>';
			}
			if($youtube){
				$html .='<li><a href="'.$youtube.'" class="youtube ntip" alt="Youtube" original-title="Youtube" '.$color.' target="_blank"><i class="fa fa-youtube"></i></a>';			
			}
		$html .= '</ul>';

	}

	return $html;
}		
		
//////////////////////////////////////////////////////////////////
// Youtube shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('youtube', 'shortcode_youtube');
	function shortcode_youtube($atts) {
		
		extract(shortcode_atts(array(
			'id' => '',
			'width' => '600',
			'height' => '360',			
		), $atts));				
		
		return '<iframe title="YouTube video player" width="' . $width . '" height="' . $height . '" src="http://www.youtube.com/embed/' . $id . '?rel=0" frameborder="0" allowfullscreen></iframe>';
	}
	
//////////////////////////////////////////////////////////////////
// Vimeo shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('vimeo', 'shortcode_vimeo');
	function shortcode_vimeo($atts) {
		
		extract(shortcode_atts(array(
			'id' => '',
			'width' => '600',
			'height' => '360',			
		), $atts));	
		
		return '<iframe src="http://player.vimeo.com/video/' . $id . '" width="' . $width . '" height="' . $height . '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
	}
	
//////////////////////////////////////////////////////////////////
// Dailymotion shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('dailym', 'shortcode_dailym');
	function shortcode_dailym($atts) {		
		extract(shortcode_atts(array(
			'id' => '',
			'width' => '100%',
			'height' => '166',			
		), $atts));	
		
		return '<iframe frameborder="0" width="' . $width . '" height="' . $height . '" src="http://www.dailymotion.com/embed/video/'.$id.'"></iframe>';				
	}
	
//////////////////////////////////////////////////////////////////
// Minimal Button shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('button_minimal', 'shortcode_button_minimal');
	function shortcode_button_minimal($atts, $content = null) {
		extract(shortcode_atts(array(
			'inverse_colors' => 'yes',
			'size' => 'normal',
			'link' => '',
			'icon' =>  ''
		), $atts));
		
		$add_class = null;
		
		if($inverse_colors == "yes"): $add_class = " inverse"; endif;
		if($size == "large"): $size = "large"; endif;
		if($icon !=""): $add_icon = '<i class="'.$atts['icon'].'"></i>'; endif;	
				
		return '<a href="'.$link.'" class="simple-button'.$add_class.' '.$size.'">'.$add_icon.do_shortcode($content).'</a>';
	}
	

//////////////////////////////////////////////////////////////////
// Colored Button shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('button_colored', 'shortcode_button_colored');
	function shortcode_button_colored($atts, $content = null) {	
		extract(shortcode_atts(array(
			'color' => 'red',			
			'link' => '',
			'icon' =>  ''
		), $atts));
		
		$colored = null;
		
		$colored = $color.'_btn';
		if ( $icon != '' ) : $icon = '<i class="'.$icon.'"></i>'; endif;
			return '<a href="'.$link.'" class="button '.$colored .'"><span>'. $icon . ' ' . do_shortcode($content). '</span></a>';
	}	
	
//////////////////////////////////////////////////////////////////
// Bootstrap buttons shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('button_bootstrap', 'shortcode_button_bootstrap');
	function shortcode_button_bootstrap($atts, $content = null) {	
		
		extract(shortcode_atts(array(
			'style' => 'default',			
			'link' => '',
			'size' =>  'small'
		), $atts));
		
		if( $style ): $style='btn-'. $style; endif;
		if( $size): $size='btn-'. $size; endif;
		return '<button type="button" class="btn '.$style.' '.$size.'">' .do_shortcode($content). '</button>';
	}	

//////////////////////////////////////////////////////////////////
// HR shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('vc_separator', 'shortcode_vc_separator');
	function shortcode_vc_separator($atts) {
		
		extract(shortcode_atts(array(
			'style' => 'dotted',						
			'paddingtop' =>  '20',
			'paddingbottom' =>  '20',
			'divider_color' => '',
			'el_class' => ''
		), $atts));
		
			$divider = (!empty($divider_color)) ? 'style="border-color: '.$divider_color.';"' : '' ;
		
			if($paddingtop || $paddingbottom) :
				$paddingtop = ( $paddingtop != 0 ) ? 'padding-top: ' . $paddingtop . 'px; ' : '';
				$paddingbottom = ( $paddingbottom != 0 ) ? 'padding-bottom: ' . $paddingbottom . 'px; ' : '';
				$extra = 'style="' . $paddingtop . $paddingbottom . '"';
				
			endif;
		
			return '<div class="separator" '.$extra.'><hr class="'.$style.'" ' . $divider . '></div>';
	}	
	
//////////////////////////////////////////////////////////////////
// Dropcap shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('dropcap', 'shortcode_dropcap');
	function shortcode_dropcap( $atts, $content = null ) {  
		extract(shortcode_atts(array(
			'color' => '',						
		), $atts));
		
		$color = ($color) ? 'style="color:'.$color.';"' : '';
		
		return '<span class="dropcap" '.$color.'>' .do_shortcode($content). '</span>';  
		
}

//////////////////////////////////////////////////////////////////
// Highlight shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('highlight', 'shortcode_highlight');
	function shortcode_highlight($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'color' => '',						
		), $atts));
			
		if($color) {
			return '<span class="highlight2" style="background-color:'.$atts['color'].'">' .do_shortcode($content). '</span>';
		} else {
			return '<span class="highlight1">' .do_shortcode($content). '</span>';
		}

	}
	
//////////////////////////////////////////////////////////////////
// Check list shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('checklist', 'shortcode_checklist');
	function shortcode_checklist( $atts, $content = null ) {
		
		extract(shortcode_atts(array(
			'icon' => '',
			'font_size' => ''						
		), $atts));
		
		$size = ($font_size !='') ? 'style="font-size:'.$font_size.'px;line-height:'.($font_size+15).'px;"' : '';
		
		if (function_exists('wpb_js_remove_wpautop')){
			$content = str_replace('<ul>', '<ul class="checklist nobottommargin" '.$size.'>', wpb_js_remove_wpautop(do_shortcode($content),true));
		}
		if($icon){
			
			$content = str_replace('<li>', '<li class="fa '.$atts['icon'].'">', do_shortcode($content));
		}
		else{
			$content = str_replace('<li>', '<li class="default">', do_shortcode($content));
		}
		return $content;
	
}

//////////////////////////////////////////////////////////////////
// Tabs shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('tabs', 'shortcode_tabs');
	function shortcode_tabs( $atts, $content = null ) {
		extract(shortcode_atts(array(
		), $atts));
	
				$out .= '<div class="tab_widget nobottommargin">';
					$out .= '<ul class="tabs">';
						foreach ($atts as $key => $tab) {		
																		
							$out .= '<li><a href="#tab-'.$key.'" data-href="#tab-'.$key.'">' . $tab . '</a></li>';					
							
						}
					$out .= '</ul>';	
					$out .= '<div class="tab_container'.$border.'">';
						$out .= do_shortcode($content);
					$out .= '</div>';						
				$out .= '</div>';					
	return $out;
}

add_shortcode('tab', 'shortcode_tab');
	function shortcode_tab( $atts, $content = null ) {
	extract(shortcode_atts(array(
    ), $atts));

	$out .= '<div id="tab-' . $atts['id'] . '" class="tab_content entry_content clearfix">' . do_shortcode($content) .'</div>';
	
	return $out;
}
	
//////////////////////////////////////////////////////////////////
// Toggle shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('vc_toggle', 'shortcode_vc_toggle');
	function shortcode_vc_toggle( $atts, $content = null ) {
		
		extract(shortcode_atts(array(
			'icon' => '',
			'title' => 'My Toggle Title',
			'default_state' => 'false',
			'css_animation' => '',
			'el_class' => ''						 
		), $atts));
		
		$css_animation = ($css_animation != '') ? 'wpb_animate_when_almost_visible wpb_'.$css_animation : '';
		
		$extra = '';
		
		if($icon): 
			$add = 'faq'; 
			$icon = '<i class="fa '.$icon.'"></i>'; 
		endif;
		
		if($default_state == 'true'): 
			$extra = 'open';
			$extra2 = 'toggleta ';
		endif;
		
		$out .= '<div class="toggle '.$add.' clearfix '.$el_class.' ' . $css_animation . '">';
			$out .= '<div class="togglet '.$extra2 . $extra .'">'.$icon.'<span>'.$title.'</span></div>';
			$out .= '<div class="togglec '.$extra.' clearfix">'.do_shortcode($content).'</div>';
		$out .= '</div>';

   return $out;
}

//////////////////////////////////////////////////////////////////
// Column wrapper shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('col_full', 'shortcode_col_full');
	function shortcode_col_full($atts, $content = null) {		
		return '<div class="col_full">' .do_shortcode($content). '</div>';
	}	
	
//////////////////////////////////////////////////////////////////
// Column one_half shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('one_half', 'shortcode_one_half');
	function shortcode_one_half($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'last' => 'no'			
		), $atts));
			
		if($last == 'yes') {
			return '<div class="col_half col_last">' .do_shortcode($content). '</div>';
		} else {
			return '<div class="col_half">' .do_shortcode($content). '</div>';
		}

	}
	
//////////////////////////////////////////////////////////////////
// Column one_third shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('one_third', 'shortcode_one_third');
	function shortcode_one_third($atts, $content = null) {
		extract(shortcode_atts(array(
			'last' => 'no'			
		), $atts));
			
			if($last == 'yes') {
				return '<div class="col_one_third col_last">' .do_shortcode($content). '</div>';
			} else {
				return '<div class="col_one_third">' .do_shortcode($content). '</div>';
			}

	}
	
//////////////////////////////////////////////////////////////////
// Column two_third shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('two_third', 'shortcode_two_third');
	function shortcode_two_third($atts, $content = null) {
		extract(shortcode_atts(array(
			'last' => 'no'			
		), $atts));
			
			if($last == 'yes') {
				return '<div class="col_two_third col_last">' .do_shortcode($content). '</div>';
			} else {
				return '<div class="col_two_third">' .do_shortcode($content). '</div>';
			}

	}
	
//////////////////////////////////////////////////////////////////
// Column one_fourth shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('one_fourth', 'shortcode_one_fourth');
	function shortcode_one_fourth($atts, $content = null) {
		extract(shortcode_atts(array(
			'last' => 'no'			
		), $atts));
			
			if($last == 'yes') {
				return '<div class="col_one_fourth col_last">' .do_shortcode($content). '</div>';
			} else {
				return '<div class="col_one_fourth">' .do_shortcode($content). '</div>';
			}

	}
	
//////////////////////////////////////////////////////////////////
// Column three_fourth shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('three_fourth', 'shortcode_three_fourth');
	function shortcode_three_fourth($atts, $content = null) {
		extract(shortcode_atts(array(
			'last' => 'no'			
		), $atts));
			
			if($last == 'yes') {
				return '<div class="col_three_fourth col_last">' .do_shortcode($content). '</div>';
			} else {
				return '<div class="col_three_fourth">' .do_shortcode($content). '</div>';
			}

	}
	
//////////////////////////////////////////////////////////////////
// Column one_fifth shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('one_fifth', 'shortcode_one_fifth');
	function shortcode_one_fifth($atts, $content = null) {
		extract(shortcode_atts(array(
			'last' => 'no'			
		), $atts));
			
			if($last == 'yes') {
				return '<div class="col_one_fifth col_last">' .do_shortcode($content). '</div>';
			} else {
				return '<div class="col_one_fifth">' .do_shortcode($content). '</div>';
			}

	}
//////////////////////////////////////////////////////////////////
// Column two_fifth shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('two_fifth', 'shortcode_two_fifth');
	function shortcode_two_fifth($atts, $content = null) {
		extract(shortcode_atts(array(
			'last' => 'no'			
		), $atts));
			
			if($last == 'yes') {
				return '<div class="col_two_fifth col_last">' .do_shortcode($content). '</div>';
			} else {
				return '<div class="col_two_fifth">' .do_shortcode($content). '</div>';
			}

	}
//////////////////////////////////////////////////////////////////
// Column three_fifth shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('three_fifth', 'shortcode_three_fifth');
	function shortcode_three_fifth($atts, $content = null) {
		extract(shortcode_atts(array(
			'last' => 'no'			
		), $atts));
			
			if($last == 'yes') {
				return '<div class="col_three_fifth col_last">' .do_shortcode($content). '</div>';
			} else {
				return '<div class="col_three_fifth">' .do_shortcode($content). '</div>';
			}

	}

//////////////////////////////////////////////////////////////////
// Column four_fifth shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('four_fifth', 'shortcode_four_fifth');
	function shortcode_four_fifth($atts, $content = null) {
		extract(shortcode_atts(array(
			'last' => 'no'			
		), $atts));
			
			if($last == 'yes') {
				return '<div class="col_four_fifth col_last">' .do_shortcode($content). '</div>';
			} else {
				return '<div class="col_four_fifth">' .do_shortcode($content). '</div>';
			}

	}


//////////////////////////////////////////////////////////////////
// Call to Action shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('tagline_box', 'shortcode_tagline_box');
	function shortcode_tagline_box($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'cta_style' => 'normal',
			'call_text' => '',
			'heading_color' => '',
			'call_text_size' => '19',
			'description_color' => '',
			'desc_text_size' => '12',
			'bg_color' => '',
			'border_color' => '',
			'inner_border_color' => '',
			'title' => 'Text on the button',		
			'style' => 'minimal',
			'color' => 'red',	
			'icon' => '',		
			'href' => '',
			'cta_shadow' => 'false',
			'target' => '_blank',
			'size' => 'small',
			'force_transparency' => 'false',
			'css_animation' => '',
			'el_class' => ''
			
		), $atts));
		
		$cta_align = ($cta_style == 'center') ? 'center' : '';
		
		$css_animation = ($css_animation != '') ? 'wpb_animate_when_almost_visible wpb_'.$css_animation : '';
		
		$call_text_size = ($call_text_size != '19') ? 'font-size: ' . $call_text_size . 'px; line-height: ' .($call_text_size+5).'px;'  : '' ;
		
		$desc_text_size = ($desc_text_size != '12') ? 'font-size: ' . $desc_text_size . 'px; line-height: ' .($desc_text_size+5).'px;'  : '' ;
		
		$icon = !empty($icon) ? '<i class="fa '.$icon.'"></i>' : '';
		
		$style = ($style == '3d') ? '-3d' : '';
		
		$heading_color = !empty($heading_color) ? 'color: '.$heading_color.';' : '';
		
		$description_color = !empty($description_color) ? 'color: '.$description_color.'; ' : '';
		
		$custom_style1 = 'style="' . $call_text_size . $heading_color . '"';
		
		$custom_style2 = 'style="' . $desc_text_size . $description_color . '"';
		
		$bg_color = !empty($bg_color) ? 'style="background-color: '.$bg_color . ';"' : '';
		
		$border_color = !empty($border_color) ? 'border-color: '.$border_color . ';' : '';
		
		$inner_border_color = !empty($inner_border_color) ? 'background-color: '.$inner_border_color . ';' : '';
		
		if($force_transparency == 'true'){
			$bg_color = 'style="background-color: transparent;"';
			$border_color = 'border-color: transparent;';
			$inner_border_color = 'background-color: transparent;';
		}
		
		$promo_box = (!empty($bg_color) || !empty($inner_border_color) ) ? 'style="'. $inner_border_color . $border_color . '"' : '';		
		
		$shadow = ($cta_shadow == 'true') ? 'promo-shadow' : '' ;
		
		$str = '';
		$str .= '<div class="promo-box-wrap '.$el_class.' ' . $css_animation . '">';
			$str .='<div class="promo-box '.$shadow.'" '.$promo_box.'>';
				$str .= '<div class="promo ' . $cta_align . '" data-style="' . $cta_style . '" '.$bg_color.'>';
					$str .= '<div class="promo-desc">';
						
						if($call_text){
							$str .= '<h3 '.$custom_style1.'>'.$call_text.'</h3>';
						}	
						if($content) {				
							$str .= '<span '.$custom_style2.'>'.do_shortcode($content).'</span>';
						}
						
					$str .= '</div>';
					
					if($href):
					
						$str .= '<div class="promo-action">';
						
							$str .= '<a href="'.$href.'" class="simple-button' . $style . ' ' . $color . ' ' . $size . '" target="'.$target.'">'.$icon.$title.'</a>';
							
						$str .= '</div>';
						
					endif;
					
				$str .= '</div>';
			$str .= '</div>';
		$str .= '</div>';		
		return $str;
	}
//////////////////////////////////////////////////////////////////
// Pricing table
//////////////////////////////////////////////////////////////////
add_shortcode('pricing_table', 'shortcode_pricing_table');
	function shortcode_pricing_table($atts, $content = null) {
		
		extract(shortcode_atts(array(			
			'columns' => '4',
			'spaced_columns' => 'false',
			'specific_columns' => '',
			'css_animation' => '',
			'el_class' => ''
			
		), $atts));
		
		$css_animation = ($css_animation != '') ? 'wpb_animate_when_almost_visible wpb_'.$css_animation : '';
		
		$str = '';
		
		$query = array(
			'post_type' => 'pricing',
			'showposts' => $columns,
			'orderby' => 'menu_order',
			'order' => 'DESC'
		);
		
		if ( $specific_columns ) {
			$query['post__in'] = explode( ',', $specific_columns );
		}
		
		$loop = new WP_Query( $query );
		
		if($columns==5){
			$columns = 'pricing5';
		}
		elseif($columns==4){
			$columns = 'pricing4';
		}
		else{
			$columns = 'pricing3';
		}
		if($spaced_columns=='true'):
			$spaced_columns	= 'spacing';	
		endif;
		
		
		$str .= '<div class="pricing '. $columns .' pricing-style2 '.$spaced_columns. ' ' . $el_class . ' clearfix">';
		
		while ( $loop->have_posts() ):	$loop->the_post();
			
			$class = '';
			
			if(get_post_meta( get_the_ID(), 'pyre_column_type', true ) == 'best'){
				$class = 'best-price';
			}
			$str .= '<div class="pricing-wrap '. $class . ' ' . $css_animation .'">';
				$str .= '<div class="pricing-inner">';					
						$str .= '<div class="pricing-title"><h4>'.get_the_title().'</h4></div>';					
					
					if(get_post_meta( get_the_ID(), 'pyre_price', true )):
						$str .= '<div class="pricing-price">';
						
							if(get_post_meta( get_the_ID(), 'pyre_currency', true )): 
								$str .= get_post_meta( get_the_ID(), 'pyre_currency', true );
							endif;
						
							$price = explode('.', get_post_meta( get_the_ID(), 'pyre_price', true ));					
							
							$str .= $price[0];
							
							if($price[1]){
								$str .= '<span class="price-sub">'.$price[1].'</span>';
							}
							
							if(get_post_meta( get_the_ID(), 'pyre_time', true )) {
								$str .= '<span class="price-tenure">'.get_post_meta( get_the_ID(), 'pyre_time', true ).'</span>';
							}
							
						$str .= '</div>';
					endif;
					
					$str .= '<div class="pricing-features">';
						$str .= do_shortcode(get_the_content());
						
						//contruct the button
						if(get_post_meta( get_the_ID(), 'pyre_button_text', true )):
							$text = get_post_meta( get_the_ID(), 'pyre_button_text', true );
							$style = get_post_meta( get_the_ID(), 'pyre_button_style', true );
							$color = get_post_meta( get_the_ID(), 'pyre_button_color', true );
							$size = get_post_meta( get_the_ID(), 'pyre_button_size', true );
							$inverse = get_post_meta( get_the_ID(), 'pyre_inverse_color', true );
							$url = get_post_meta( get_the_ID(), 'pyre_button_url', true );
							$str .= '<div class="pricing-action">';
							$str .= do_shortcode('[vc_button style="'.$style.'" title="'.$text.'" target="_self" color="'.$color.'" button_inverse="'.$inverse.'" size="'.$size.' href="'.$url.'"]');
							$str .= '</div>';
						endif;
							
					$str .= '</div>';
					
				$str .= '</div>';
			$str .= '</div>';
		
		endwhile;
		
		wp_reset_query();
		//$str .= do_shortcode($content);
		$str .= '</div>';

		return $str;
	}

//////////////////////////////////////////////////////////////////
// Pricing Column
//////////////////////////////////////////////////////////////////
add_shortcode('pricing_column', 'shortcode_pricing_column');
	function shortcode_pricing_column($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'title' => '',
			'type' => '',
			'price' => '',
			'time' => '',
			'currency' => ''
		), $atts));
		
		if($type == 'best'){
			$class = 'best-price';
		}
		$str = '<div class="pricing-wrap '. $class .'">';
			$str .= '<div class="pricing-inner">';
				if($title):
					$str .= '<div class="pricing-title"><h4>'.$title.'</h4></div>';
				endif;
				
				if($price):
					$str .= '<div class="pricing-price">';
					
						if($currency): 
							$str .= $currency;
						endif;
					
						$price = explode('.', $price);					
						
						$str .= $price[0];
						
						if($price[1]){
							$str .= '<span class="price-sub">'.$price[1].'</span>';
						}
						
						if($time) {
							$str .= '<span class="price-tenure">'.$time.'</span>';
						}
						
					$str .= '</div>';
				endif;
				
				$str .= '<div class="pricing-features">';
					$str .= do_shortcode($content);
				$str .= '</div>';
				
			$str .= '</div>';
		$str .= '</div>';

		return $str;
	}

//////////////////////////////////////////////////////////////////
// Pricing Footer
//////////////////////////////////////////////////////////////////
add_shortcode('button_footer', 'shortcode_button_footer');
	function shortcode_button_footer($atts, $content = null) {
		$str = '';
		$str .= '<div class="pricing-action">';
		$str .= do_shortcode($content);
		$str .= '</div>';

		return $str;
	}


//////////////////////////////////////////////////////////////////
// Slider
//////////////////////////////////////////////////////////////////
add_shortcode('slider', 'shortcode_slider');
	function shortcode_slider($atts, $content = null) {
		$str = '';
		
		if($atts['width']!='100%'){
			
			$extra_class = 'fleft';
			
			if($atts['float']=='right') { $extra_class = 'fright'; }
			
			$extra_style = 'style="margin: 0 15px 12px 0; width: '.$atts['width'].';"';
		}
		
		$str .= '<div class="fslider '.$extra_class.'" '.$extra_style.' data-animate="slide" data-direction-nav="true">';
			$str .= '<div class="flexslider">';
				$str .= '<div class="slider-wrap">';
					$str .= do_shortcode($content);
				$str .= '</div>';	
			$str .= '</div>';
		$str .= '</div>';

		return $str;
	}

//////////////////////////////////////////////////////////////////
// Slide
//////////////////////////////////////////////////////////////////
add_shortcode('slide', 'shortcode_slide');
	function shortcode_slide($atts, $content = null) {
		$str = '';
		if($atts['link']){
			$str .= '<div class="slide">';
				$str .= '<a href="'.$atts['link'].'"><img src="'.$content.'"><div class="portfolio-overlay"></div></a>';
			$str .= '</div>';
		}
		else{
			$str .= '<div class="slide">';
				$str .= '<a href="'.$content.'" rel="prettyPhoto"><img src="'.$content.'"><div class="portfolio-overlay"></div></a>';
			$str .= '</div>';
		}
		return $str;
	}

//////////////////////////////////////////////////////////////////
// Clients Scroll
//////////////////////////////////////////////////////////////////
add_shortcode('clients', 'shortcode_clients');
	function shortcode_clients($atts, $content = null) {
		
		global $data;
		
		extract(shortcode_atts(array(
			'title' => '',
			'count' => '-1',
			'clients' => '',
			'css_animation' => '',
			'el_class' => ''			
		), $atts));
		
		$query = array(
			'post_type' => 'clients',
			'showposts' => $count,
		);
		
		$style_w = '';
		
		$css_animation = ($css_animation != '') ? 'wpb_animate_when_almost_visible wpb_'.$css_animation : '';
		
		if ( $clients ) {
			$query['post__in'] = explode( ',', $clients );
		}
		if ( isset($query['post__in']) && ( sizeof($query['post__in']) < 6) ) {
			$width_new = 960 - (960-160*sizeof($query['post__in']));
			//echo $width_new;
			$style_w = ( $width_new < 960 ) ? 'style="max-width: '.$width_new.'px; margin: 0 auto;"' : '';
		}		
		
		$loop = new WP_Query( $query );
		
		$extra_class = '';
		
		if(empty($title)):				
			$extra_class = 'extra_class';
		endif;	
		
		$str = '';
		$str .= '<div class="' . $el_class . ' ' . $css_animation . '">';
		
		$str .= '<div class="clients_wrapper '.$extra_class.'" data-effect="'.$data['clients_effect'].'" data-pause="'.($data['clients_pause']*1000).'" data-speed="'.$data['clients_speed'].'" data-auto="'.$data['clients_auto'].'" ' . $style_w . ' >';
		
			if(!empty($title)):
				$str .= '<div class="title-outer"><h3>'.$title.'</h3></div>';						
			endif;
		
			$str .= '<div id="clients-scroller" class="our-clients  clearfix" >';
							
				while ( $loop->have_posts() ):	$loop->the_post();
				
					$url = get_post_meta( get_the_ID(), 'pyre_client_url', true );
					$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
					
					if($url):					
						$str .= '<div class="item"><a href="'.$url.'" target="_blank" title="'.get_the_title().'"><img src="'.$image_src_array[0].'" title="'.get_the_title().'" alt="'.get_the_title().'"></a></div>';
					else:
						$str .= '<div class="item">'.$url.'<img src="'.$image_src_array[0].'"></div>';
					endif;	
					
				endwhile;
				wp_reset_query();
			
			$str .= '</div>';
			
			$str .= '<div class="widget-scroll-prev" id="ourclients_prev"><i class="fa fa-chevron-left"></i></div>';
			$str .= '<div class="widget-scroll-next" id="ourclients_next"><i class="fa fa-chevron-right"></i></div>';
			
		$str .= '</div>';
		$str .= '</div>';
		return $str;
	}

//////////////////////////////////////////////////////////////////
// Client Picture
//////////////////////////////////////////////////////////////////
add_shortcode('client', 'shortcode_client');
	function shortcode_client($atts, $content = null) {
		
		$str = '';		
		$str .= '<li><img src="'.$content.'"></li>';

		return $str;
	}	
	
//////////////////////////////////////////////////////////////////
// Testimonials
//////////////////////////////////////////////////////////////////
add_shortcode('testimonials', 'shortcode_testimonials');
	function shortcode_testimonials($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'title' => '',
			'count' => '10',
			'testimonials' => '',
			'show_image' => 'yes',
			'display' => 'slideshow',
			'navigation' => 'top3',
			'columns_count' => '3',
			'align' => 'left',
			'color' => '',
			'background_color' => '',
			'border_color' => '',
			'css_animation' => '',
			'el_class' => ''
		), $atts));
		
		$extra_class = '';
		$position = '';
		
		$css_animation = ($css_animation != '') ? 'wpb_animate_when_almost_visible wpb_'.$css_animation : '';
		
		switch ($columns_count) {
			case 4:
				$columns_count = '3';
			break;
			case 3:
				$columns_count = '4';
			break;
			case 2:
				$columns_count = '6';
			break;
			case 1:
				$columns_count = '12';
			break;
		}
		
		global $data; 
		
		$color = (!empty($color)) ? 'color: ' . $color . ';' : '';
		$background_color = (!empty($background_color)) ? 'background-color: ' . $background_color . ';' : '';	
		$border_color = (!empty($border_color)) ? 'border-color: ' . $border_color . ';' : '';	
		
		$str = '';			
			
			if($title):
				$str .= '<div class="title-outer"><h3>'.$title.'</h3></div>';			
			else:
				$extra_class = ($navigation != 'center') ? 'extra_class' : '';
				$position = ($navigation != 'center') ? 'extra_position' : '';
			endif;	
			
			$query = array(
				'post_type' => 'testimonials',
				'showposts' => $count,
			);
			$clearfix = '';
			
			if($display != 'slideshow'){
				$clearfix = ' clearfix';
			}
			
			if ( $testimonials ) {
				$query['post__in'] = explode( ',', $testimonials );
			}
			
			$loop = new WP_Query( $query );
			
			if($display == 'slideshow'){
				$slide_css = ($navigation == 'center') ? 'slide_css' : '';
				$str .= '<div class="testimonial-scroller '.$slide_css.' ' .$extra_class. ' '.$css_animation.'"  data-effect="'.$data['testimonial_effect'].'" data-pause="'.($data['testimonial_pause']*1000).'" data-speed="'.$data['testimonial_speed'].'" data-auto="'.$data['testimonial_auto'].'" >';			
			}
					 	
						$str .= '<div class="testimonials '.$clearfix.'" >';							
							
							while ( $loop->have_posts() ):	$loop->the_post();
							
							if($display != 'slideshow'){
								$str .= '<div class="vc_col-sm-' . $columns_count . ' wpb_column column_container bottommargin">';
									$str .= '<div class="wpb_wrapper">';
							}	

							if(has_post_thumbnail() && $show_image == 'yes') {
								$testimonial_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail');
								$testimonial_img_output = '<div class="testi-author-img"><img src="'.$testimonial_img[0].'"></div>';
								$display_image = 'display_image';
							}
							else {
								$testimonial_img_output = '';
								$display_image = '';
							}
							
								$str .= '<div class="testimonial-item">';		
					
									$str .= '<div class="testi-content '.$align.'" style="' . $color . $background_color . $border_color . '">';
										
										$str .= '<span class="'.$align.'" style="' . $background_color . $border_color. '"></span>';
										$str .= do_shortcode(get_post_meta( get_the_ID(), 'pyre_author_quote', true ));
									$str .= '</div>';
									
									if(get_post_meta( get_the_ID(), 'pyre_author_url',true)) :
										$str .= '<div class="testi-author '.$align.' ' . $display_image . ' clearfix">' . $testimonial_img_output . '<div class="author_info">' . get_post_meta( get_the_ID(), 'pyre_author_name', true ).'<span><a href="'.get_post_meta( get_the_ID(), 'pyre_author_url', true ).'">'.get_post_meta( get_the_ID(), 'pyre_author_company', true ).'</a></span></div></div>';
									else :			
										$str .= '<div class="testi-author '.$align.' '. $display_image . ' clearfix">'.get_post_meta( get_the_ID(), 'pyre_author_name', true ).'<span>'.get_post_meta( get_the_ID(), 'pyre_author_company', true ).'</span></div>';
									endif;
									
								$str .= '</div>';
							if($display != 'slideshow'){
									$str .= '</div>';
								$str .= '</div>';
							}
							endwhile;	
							
							wp_reset_query();				
							
						$str .= '</div>';
					
			if($display == 'slideshow'){		
					
					$str .= '<div id="widget-testimonial-2-prev" class="widget-scroll-prev '.$position.'"><i class="fa fa-chevron-left"></i></div>';
					$str .= '<div id="widget-testimonial-2-next" class="widget-scroll-next '.$position.'"><i class="fa fa-chevron-right"></i></div>';
				$str .= '</div>';
			}
			/*
			else {
					$str .= '</div>';
				$str .= '</div>';	
			}*/	

		return $str;
	}


//////////////////////////////////////////////////////////////////
// Testimonial
//////////////////////////////////////////////////////////////////
add_shortcode('testimonial', 'shortcode_testimonial');
	function shortcode_testimonial($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'author' => '',
			'company' => '',
			'link' => '',
			'align' => ''
		), $atts));
		
		$str .= '<div class="testimonial-item">';		
		
			$str .= '<div class="testi-content '.$align.'">';
				$str .= '<span class="'.$align.'"></span>';
				$str .= do_shortcode($content);
			$str .= '</div>';
			
			if($link) :
				$str .= '<div class="testi-author '.$align.'">'.$author.'<span><a href="'.$link.'">'.$company.'</a></span></div>';
			else :			
				$str .= '<div class="testi-author '.$align.'">'.$author.'<span>'.$company.'</span></div>';
			endif;
		$str .= '</div>';

		return $str;
	}

//////////////////////////////////////////////////////////////////
// Tooltip
//////////////////////////////////////////////////////////////////
add_shortcode('tooltip', 'shortcode_tooltip');
function shortcode_tooltip($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'title' => '',
		'position' => 'left',
		'link' => '',
	), $atts));
	$class = null;
	
	switch($position){
		case 'left':
			$class = 'wtip';
			break;
		case 'right':
			$class = 'etip';
			break;	
		case 'top':
			$class = 'ntip';
			break;	
		case 'bottom':
			$class = 'stip';
			break;	
		default : 
			$class = 'ntip';
	}
	if($link) {
		$href = 'href='.$link;
	}
	$html = '<a '.$href.' class="'.$class.'" original-title="'.$title.'">';
		$html .= do_shortcode($content);
	$html .= '</a>';

	return $html;
}

	
//////////////////////////////////////////////////////////////////
// Progess Bar
//////////////////////////////////////////////////////////////////
add_shortcode('bar', 'shortcode_progress');
function shortcode_progress($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'percentage' => '50%',
		'background_color' => '',
		'style' => '1',
	), $atts));
	
	$html = '';
	if($style == 2) {
		$extra_class = 'progress-striped';
	}
	elseif($style == 3) {
		$extra_class = 'progress-striped active';
	}
	else{
		$extra_class = '';
	}
	$html .= '<div class="progress '.$extra_class.'">';
		if ( $background_color) { $bg = 'background-color:'.$background_color; };
		$html .= '<div class="bar clearfix" style="width:'.$percentage.';' . $bg . '">';
			$html .= '<div class="describe">'.$content.'</div>';
			$html .= '<div class="percentage">'.$percentage.'</div>';
		$html .= '</div>';
	$html .= '</div>';	
	return $html;
}

//////////////////////////////////////////////////////////////////
// Employee
//////////////////////////////////////////////////////////////////
add_shortcode('employee', 'shortcode_employee');
function shortcode_employee($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'columns' => '4',
		'count' => '10',
		'color' => '',
		'employees' => '',
		'bio' => 'true',
		'profiles' => 'true',
		'css_animation' => '',
		'el_class' => ''

	), $atts));
	
	$css_animation = ($css_animation != '') ? 'wpb_animate_when_almost_visible wpb_'.$css_animation : '';
	
	$html = '';	
	
	$color = ($color != '') ? $color = 'style="color:'.$color.';"' : '' ;
	
	$args = array(
		'post_type' => 'employees',
		'showposts' => $count,
		//'nopaging' => true
	);
	
	if ( $employees ) {
		$args['post__in'] = explode( ',', $employees );
	}
	
	switch ($columns) {
		case 4:
			$columns = '3';
		break;
		case 3:
			$columns = '4';
		break;
		case 2:
			$columns = '6';
		break;
		case 1:
			$columns = '12';
		break;
	}
					
	$gallery = new WP_Query($args);
	$html .= '<div class="col_full employee_wrap nobottommargin clearfix">';
			
		while($gallery->have_posts()): $gallery->the_post();
		
			$html .= '<div class="vc_col-sm-'.$columns.' wpb_column column_container ' . $el_class . ' ' . $css_animation .'">';
			
				$html .= '<div class="team-member">';
				
				//if(has_post_thumbnail()):
				
					$full_picture = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
					
					if(get_post_meta(get_the_ID(), 'pyre_employee_position', true) != ''):
						$position = get_post_meta(get_the_ID(), 'pyre_employee_position', true);
					endif;
					
					$custom_url_begin = '';
					$custom_url_end = '';
					
					if(get_post_meta(get_the_ID(), 'pyre_employee_url', true) != ''):
						$custom_url_begin = '<a href="' . get_post_meta(get_the_ID(), 'pyre_employee_url', true) . '">';
						$custom_url_end = '</a>';
					endif;
				
					$html .= '<div class="team-image">';
						//$html .= '<a href="'. $full_picture[0].'">';
						if(has_post_thumbnail()):
							$html .= $custom_url_begin.'<img src="'.$full_picture[0].'" alt="'.get_the_title().' - '.$position.'" title="'.get_the_title().' - '.$position.'">'.$custom_url_end;
						endif;
						//$html .= '</a>';						
						
						if(get_post_meta(get_the_ID(), 'pyre_employee_position', true) != ''):
							$html .= '<span>'.$position.'</span>';
						endif;					
						
					$html .= '</div>';
					
					$html .= '<div class="team-desc">';
						$html .= $custom_url_begin.'<h4>'.get_the_title().'</h4>'.$custom_url_end;
						if($bio == 'true' && get_post_meta(get_the_ID(), 'pyre_employee_bio', true) != ''):
							$html .= '<p>'.get_post_meta(get_the_ID(), 'pyre_employee_bio', true).'</p>';
						endif;		
					$html .= '</div>';
					
					if($profiles == 'true'):
						$html .= '<ul class="team-skills">';
										
							if(get_post_meta(get_the_ID(), 'pyre_employee_facebook', true) != ''):
								$html .='<li><a href="'.get_post_meta(get_the_ID(), 'pyre_employee_facebook', true).'"  class="ntip" alt="Facebook" original-title="Facebook" '.$color.'><i class="fa fa-facebook"></i></a>';								
							endif;	
							
							if(get_post_meta(get_the_ID(), 'pyre_employee_twitter', true) != ''):
								$html .='<li><a href="'.get_post_meta(get_the_ID(), 'pyre_employee_twitter', true).'"  class="twitter ntip" alt="Twiter" original-title="Twitter" '.$color.'><i class="fa fa-twitter"></i></a>';
							endif;
							
							if(get_post_meta(get_the_ID(), 'pyre_employee_google', true) != ''):
								$html .='<li><a href="'.get_post_meta(get_the_ID(), 'pyre_employee_google', true).'"  class="gplus ntip" alt="Google" original-title="Google" '.$color.'><i class="fa fa-google-plus"></i></a>';
							endif;
							
							if(get_post_meta(get_the_ID(), 'pyre_employee_linkedin', true) != ''):
								$html .='<li><a href="'.get_post_meta(get_the_ID(), 'pyre_employee_linkedin', true).'"  class="linkedin ntip" alt="LinkedIn" original-title="LinkedIn" '.$color.'><i class="fa fa-linkedin"></i></a>';
							endif;
							
							if(get_post_meta(get_the_ID(), 'pyre_employee_vimeo', true) != ''):
								$html .='<li><a href="'.get_post_meta(get_the_ID(), 'pyre_employee_vimeo', true).'"  class="vimeo ntip" alt="Vimeo" original-title="Vimeo" '.$color.'><i class="fa fa-vimeo-square"></i></a>';
							endif;
							
							if(get_post_meta(get_the_ID(), 'pyre_employee_flickr', true) != ''):
								$html .='<li><a href="'.get_post_meta(get_the_ID(), 'pyre_employee_flickr', true).'"  class="flickr ntip" alt="Flickr" original-title="Flickr" '.$color.'><i class="fa fa-flickr"></i></a>';
							endif;
						
						$html .= '</ul>';
					endif;	
				
				//endif;
				
				
				
				$html .= '</div>';
			
			$html .= '</div>';
						
		endwhile;
		
		wp_reset_query();
		
	$html .= '</div>';	

	return $html;
}

//////////////////////////////////////////////////////////////////
// Person
//////////////////////////////////////////////////////////////////
add_shortcode('person', 'shortcode_person');
function shortcode_person($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'name' => 'Joe Doe',
		'picture' => '',
		'position' => 'Designer',
		'twitter'  => '',
		'gplus'  => '',
		'dribbble'  => '',
		'vimeo'  => '',
		'linkedin'  => '',
		'flickr'  => '',
		'css_animation' => '',
		'el_class' => ''
	), $atts));
	
	$css_animation = ($css_animation != '') ? 'wpb_animate_when_almost_visible wpb_'.$css_animation : '';
	
	$html = '';
	$html .= '<div class="team-member">';
		if($atts['picture']){
			$html .= '<div class="team-image"><img src="'.$picture.'" alt="'.$name.'"><span>'.$position.'</span></div>';
		}
		$html .= '<div class="team-desc">';
			$html .= '<h4>'.$name.'</h4>';
			$html .= '<p>'.$content.'</p>';
		$html .= '</div>';
		$html .= '<ul class="team-skills">';
			if($atts['facebook']){
				$html .='<li><span class="social-icons"><a href="'.$facebook.'"  class="facebook ntip" alt="Facebook" original-title="Facebook"></a></span>';
			}
			if($atts['twitter']){
				$html .='<li><span class="social-icons"><a href="'.$twitter.'" class="twitter ntip" alt="Twitter" original-title="Twitter"></a></span>';
			}
			if($atts['gplus']){
				$html .='<li><span class="social-icons"><a href="'.$gplus.'" class="gplus ntip" alt="Gplus" original-title="Gplus"></a></span>';
			}
			if($atts['dribble']){
				$html .='<li><span class="social-icons"><a href="'.$dribbble.'" class="dribbble ntip" alt="Dribbble" original-title="Dribble"></a></span>';
			}
			if($atts['vimeo']){
				$html .='<li><span class="social-icons"><a href="'.$vimeo.'" class="vimeo ntip" alt="Vimeo" original-title="Vimeo"></a></span>';
			}
			if($atts['linkedin']){
				$html .='<li><span class="social-icons"><a href="'.$linkedin.'" class="linkedin ntip" alt="LinkedIn" original-title="LinkedIn"></a></span>';
			}
			if($atts['flickr']){
				$html .='<li><span class="social-icons"><a href="'.$flickr.'" class="flickr ntip" alt="Flickr" original-title="Flickr"></a></span>';			
			}
		$html .= '</ul>';
	$html .= '</div>';

	return $html;
}

//////////////////////////////////////////////////////////////////
// Recent Posts
//////////////////////////////////////////////////////////////////
add_shortcode('recent_posts', 'shortcode_recent_posts');
function shortcode_recent_posts($atts, $content = null) {
	global $data;
	extract(shortcode_atts(array(
			'box_title' => '',
			'style' => 'style1',
			'columns' => '3',
			'items' => '6',
			'category_id' => '',
			'posts' => '',
			'thumbnail' => 'true',
			'show_date' => 'true',
			'show_excerpt' => 'true',
			'continue_reading' => 'true',
			'posts_title' => 'true',
			'css_animation' => '',
			'posts_order' => 'DESC',
			'el_class' => ''
		), $atts));
	
	$attachment = '';
	$add_style = '';
	$h5 = '';
	
	$css_animation = ($css_animation != '') ? 'wpb_animate_when_almost_visible wpb_'.$css_animation : '';
	
	$html = '';
	$html .= '<div class="col_full nobottommargin'.$el_class.'">';
	$count = 1;

$query = array(
	'showposts' => (int)$items,
	'post_type'=>'post',
);	

if ( $category_id ) {
	$query['cat'] = $category_id;
}

if ( $posts ) {
	$query['post__in'] = explode( ',', $posts );
}	


if ( $posts_order ) {
	$query['order'] = $posts_order;
}	

	if( $columns == 4){
		$i = 4;
		$class = 'fourth';
	}
	elseif( $columns == 5 ){
		$i = 5;
		$class = 'fifth';		
	}
	else{
		$i = 3;
		$class = 'third';
	}
	
	$recent_posts = new WP_Query($query);
	$hidden_link = '';
	
	if ( !empty( $box_title ) ) {
		$html .='<div class="title-outer"><h3>'.$box_title.'</h3></div>';
	}
//	$html .= '<div id="portfolio" class="scroll-portfolio clearfix">';
	while($recent_posts->have_posts()): $recent_posts->the_post();

		if($count == $i) { 
			$add = 'col_last'; 
			$count = 1;
			$add_break_row = '<div class="clearfix"></div>';
		}
		
		else{ $count++; $add=''; $add_break_row = ''; }	
		
		$post = new StdClass;
		$post->ID = get_the_ID();
		
		if(has_post_thumbnail()):
			
			$icon = 'fa fa-camera';
			$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
			$img_url = wp_get_attachment_url( get_post_thumbnail_id(),'full' );
			$image = aq_resize( $img_url, 470, 320, true );
			
			$link = $full_image[0];			
			
			if(get_post_meta(get_the_ID(), 'pyre_youtube', true)) {
				$icon = 'fa fa-film';
				$link = 'http://www.youtube.com/watch?v='.get_post_meta(get_the_ID(), 'pyre_youtube', true);
				
			}
			if(get_post_meta(get_the_ID(), 'pyre_vimeo', true)) {
				$icon = 'fa fa-film';
				$link = 'http://vimeo.com/'.get_post_meta(get_the_ID(), 'pyre_vimeo', true);
				
			}
			$ref = 'rel="prettyPhoto"';
			
			if($data['fi_post_link'] == 'Post Page') {
				$link = get_permalink($post->ID);
				$ref = '';
			}
			
		endif;
		
			if($style == 'style1'){
			
				$html .= '<div class="col_one_'.$class.' '.$add.' ' . $css_animation . '">';
					$html .= '<div class="ipost">';
						$html .= '<div class="col_full nobottommargin">';	
							if($thumbnail == 'true'){					
								$html .= '<div class="ipost-image">';
									
									if(has_post_thumbnail()) {
								
										$html .= '<img src="'.$image.'" alt="'.get_the_title().'" title="'.get_the_title().'" />';									
										$html .= '<div class="portfolio-overlay"><a href="'.$link.'" '.$ref.'><div class="portfolio-overlay-inside"><span class="'.$icon.'"></span></div></a>'.$hidden_link.'</div>';
									}
									elseif(get_post_meta(get_the_ID(), 'pyre_youtube', true)) {
										$html .= do_shortcode('[vc_video link="https://www.youtube.com/watch?v='.get_post_meta(get_the_ID(), 'pyre_youtube', true).'"]');
									}
									elseif(get_post_meta(get_the_ID(), 'pyre_vimeo', true)) {
										$html .= do_shortcode('[vc_video link="https://vimeo.com/'.get_post_meta(get_the_ID(), 'pyre_vimeo', true).'"]');
									}
									
								$html .= '</div>';
							}
							else{
								
							}
							if($show_date == 'true'){
								if($thumbnail == 'false'){
									$add_style = 'style="padding-left:50px;"';
									$h5 = 'style = "padding-top:0;"';
								}
								$html .= '<div class="entry_date_thin"><div class="day">'.get_the_date('j').'</div><div class="month">'.get_the_date('M').'</div></div>';
							}
							if($posts_title == 'true'){
								$html .= '<div class="ipost-title" '.$add_style.'><h5 '.$h5.'><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></h5></div>';
							}
							if($show_excerpt == 'true'){
								$html .= '<div class="ipost-content" '.$add_style.'>'.string_limit_words(get_the_excerpt(), 25).'...</div>';
							}
							if($continue_reading == 'true'){
								$html .= '<p class="nobottommargin" '.$add_style.'><a href="'.get_permalink($post->ID).'">'.__('Continue reading ', 'Nimva').' &rarr;</a></p>';
							}
						$html .= '</div>';
					$html .= '</div>';
				$html .= '</div>';
				$html .= $add_break_row;
				
			}
			
			else{
				
				$html .= '<div class="col_full '.$css_animation.'">';
					$html .= '<div class="small-posts">';
						$html .= '<div class="recent_posts_sh clearfix">';
							if($thumbnail == 'true'){

									if(has_post_thumbnail()) {
										$html .= '<div class="entry_image_sh">';
											$html .= '<img src="'.$image.'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
											$html .= '<div class="portfolio-overlay"><a href="'.$link.'" '.$ref.'><div class="portfolio-overlay-inside"><span class="'.$icon.'"></span></div></a>'.$hidden_link.'</div>';
										$html .= '</div>';
									}
									elseif(get_post_meta(get_the_ID(), 'pyre_youtube', true)) {
										$html .= '<div class="entry_image_sh">';
											$html .= do_shortcode('[vc_video link="https://www.youtube.com/watch?v='.get_post_meta(get_the_ID(), 'pyre_youtube', true).'"]');
										$html .= '</div>';
									}
									elseif(get_post_meta(get_the_ID(), 'pyre_vimeo', true)) {
										$html .= '<div class="entry_image_sh">';
											$html .= do_shortcode('[vc_video link="https://vimeo.com/'.get_post_meta(get_the_ID(), 'pyre_vimeo', true).'"]');
										$html .= '</div>';
									}
								
							}
							
							if($posts_title == 'true'){
								$html .= '<h5><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></h5>';
							}
							if($show_date == 'true'){
								$html .= '<div class="date_sh"><i class="fa fa-calendar"></i><strong>'.get_the_date().'</strong></div>';
							}
							if($show_excerpt == 'true'){
								$html .= '<p class="nobottommargin">'.string_limit_words(get_the_excerpt(), 13).'...</p>';
							}
							if($continue_reading == 'true'){
								$html .= '<p class="nobottommargin"><a href="'.get_permalink($post->ID).'">'.__('Continue reading ', 'Nimva').'&rarr;</a></p>';
							}
							
						$html .= '</div>';
					$html .= '</div>';
				$html .= '</div>';
				
			}

	
	endwhile;
	wp_reset_query();
	$html .= '</div>';
	return $html;
}
//////////////////////////////////////////////////////////////////
// FAQs shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('faqs', 'shortcode_faqs');
	function shortcode_faqs($atts, $content = null) {
		extract(shortcode_atts(array(
			'count' => '10'	,
			'faqs' => '',
			'filters' => 'true',
			'category' => '',
			//'faq_id' => '',
			'css_animation' => '',
			'el_class' => ''		
		), $atts));	
		
		$css_animation = ($css_animation != '') ? 'wpb_animate_when_almost_visible wpb_'.$css_animation : '';
		
		$categ_arr = array();
		$categ_arr = explode(',',$category);
		
		$faq_id = mt_rand( 99, 999 );	
				
		$html = '';
		
		$html = '<div class="col_full ' . $el_class . ' ' . $css_animation .' ">';
			$html .= '<div class="faqs_wrap" data-name="'.$faq_id.'">';
				if($filters == 'true') {
					
					$portfolio_category = get_terms('faq_category');
			
					if($portfolio_category && ( sizeof($categ_arr) > 1 || !$category )):
						$html .= '<ul id="faq-filter'.$faq_id.'" class="clearfix">';
							$html .= '<li class="activeFilter"><a data-filter="all'.$faq_id.'" href="#">'. __('All', 'Nimva').'</a></li>';						
								if($category && sizeof($categ_arr) > 1) {		
									foreach($categ_arr as $categ_id){
										$portfolio_cat = get_term( $categ_id, 'faq_category' );
										$html .= '<li><a data-filter=".faq-' . $portfolio_cat->slug . $faq_id.'" href="#">' . $portfolio_cat->name . '</a></li>';
									}
								}
								
								else{
									foreach($portfolio_category as $portfolio_cat){ 
										$html .= '<li><a data-filter=".faq-' . $portfolio_cat->slug . $faq_id.'" href="#">' . $portfolio_cat->name . '</a></li>';
									}
								}
								
						$html .= '</ul>';
					endif;
	
					
				}
				
				$html .= '<div id="faqs'.$faq_id.'" class="clearfix">';
					
					$args = array(
							'post_type' => 'faq',
							'nopaging' => true
					);
					if ( $faqs ) {
						$args['post__in'] = explode( ',', $faqs );
					}
					
					if($category){
						$args['tax_query'][] = array(
							'taxonomy' => 'faq_category',
							'field' => 'ID',
							'terms' => $categ_arr
						);
					}
					
					$gallery = new WP_Query($args);
					
					while($gallery->have_posts()): $gallery->the_post();
					$post = new StdClass();
					$post->ID = get_the_ID();
					
						$item_classes = '';
						$item_cats = get_the_terms($post->ID, 'faq_category');
						if($item_cats):
							foreach($item_cats as $item_cat) {
								$item_classes .= 'faq-'.$item_cat->slug .$faq_id.' ';
							}
						endif;	
						
						$icon = '';
						$add_class = '';
									
						if(get_post_meta(get_the_ID(), 'pyre_toggle_icon', true) != ''):
							$icon = '<i class="fa '.get_post_meta(get_the_ID(), 'pyre_toggle_icon', true).'"></i>';
							$add_class = 'faq';
						endif;				
						
						$html .= '<div class="toggle ' . $add_class . ' '.$item_classes.' clearfix">';                                
							$html .= '<div class="togglet">' . $icon . get_the_title() . '</div>';                                    
							$html .= '<div class="togglec clearfix" style="display:none;">';                                        
								$html .= get_the_content();                                                         
							$html .= '</div>';                                
						$html .= '</div>';
					
					endwhile;
					
					wp_reset_query();
									
				$html .= '</div>';
			$html .= '</div>';
		$html .= '</div>';
		
		return $html;
	}	
	
//////////////////////////////////////////////////////////////////
// Recent Works
//////////////////////////////////////////////////////////////////

add_shortcode('recent_works', 'shortcode_recent_works');
function shortcode_recent_works($atts, $content = null) {
	global $data;
	
	extract(shortcode_atts(array(
			'title' => '',
			'items' => '6',
			'category' => '',
			'posts' => '',
			'portfolio_details' => 'true',
			'portfolio_display' => 'carousel',
			'filter_pos' => 'left',
			'columns' => '4',
			'show_filters' => 'true',
			'css_animation' => '',
			'el_class' => ''
		), $atts));
		
	$css_animation = ($css_animation != '') ? 'wpb_animate_when_almost_visible wpb_'.$css_animation : '';	
	
	$html = '';
	$html .= '<div class="col_full '.$portfolio_display.' ' . $el_class . ' ' . $css_animation .'">';
	
	$args = array(
                  'post_type' => 'creativo_portfolio',
                  'paged' => 1,
                  'posts_per_page' => $items,
                  );
				  
	if ( $posts ) {
		$args['post__in'] = explode( ',', $posts );
	}
	$categ_arr = array();
	$categ_arr = explode(',',$category);
					  						
    if($category){
    	$args['tax_query'][] = array(
        	'taxonomy' => 'portfolio_category',
            'field' => 'ID',
            'terms' => $categ_arr
        );
    }
	$works = new WP_Query($args);
	
	$filter_class = 'left';
	
	if($filter_pos != 'left') {
		$filter_class = ($filter_pos == 'center') ? 'portfolio-center' : 'portfolio-right';
	}
	
	if( $portfolio_display == 'carousel' ) {
	
		if($title){
			$html .= '<div class="title-outer">';		
				$html .= '<h3>'.$title.'</h3>';
			$html .= '</div>';
		}
		else{
			$html .= '<div class="title-outer" style="min-height:30px;">';						
			$html .= '</div>';
		}	
		
		$html .= '<div class="portfolio-wrapper " data-effect="fade" data-pause="'.($data['rw_pause']*1000).'" data-speed="'.$data['rw_speed'].'" data-auto="'.$data['rw_auto'].'">';
			$html .= '<div id="portfolio-shortcode" class="scroll-portfolio clearfix" >';
			
				while($works->have_posts()): $works->the_post();
					$post = new StdClass();
					$post->ID = get_the_ID();					
					
					if(has_post_thumbnail()){
						$icon = 'fa fa-camera';
						$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
						$img_url = wp_get_attachment_url( get_post_thumbnail_id(),'full' );
						$image = aq_resize( $img_url, 470, 320, true );
						
						$link = $full_image[0];
						$rel = 'prettyPhoto['.$post->ID.']';
						$hidden_link='';
						
						$target = '';
						$title_link = get_permalink($post->ID);
						
						$i = 2;
						while($i <= $data['featured_images']):
							$attachment = new StdClass();
							$attachment->ID = kd_mfi_get_featured_image_id('featured-image-'.$i, 'creativo_portfolio');
							if($attachment->ID):
								$icon = 'fa fa-picture-o';	
								$full_image = wp_get_attachment_image_src($attachment->ID, 'full');
								$hidden_link .= '<a class="hidden" href="'.$full_image[0].'" rel="prettyPhoto['.$post->ID.']"></a>';									
							endif; 
							$i++; 
						endwhile;
						if(get_post_meta(get_the_ID(), 'pyre_youtube', true)) {
							$icon = 'fa fa-film';
							$link = 'http://www.youtube.com/watch?v='.get_post_meta(get_the_ID(), 'pyre_youtube', true);
							$rel = 'prettyPhoto[movie]';
						}
						if(get_post_meta(get_the_ID(), 'pyre_vimeo', true)) {
							$icon = 'fa fa-film';
							$link = 'http://vimeo.com/'.get_post_meta(get_the_ID(), 'pyre_vimeo', true);
							$rel = 'prettyPhoto[movie]';
						}
						
						if($data['portfolio_link']=='Portfolio Post'){
							$link = get_permalink($post->ID);
							$hidden_link = '';
							$rel = '';
						} 
						if(get_post_meta(get_the_ID(), 'pyre_custom_url', true) != '') {
							$hidden_link = '';
							$rel = '';
							$link = $title_link = get_post_meta(get_the_ID(), 'pyre_custom_url', true);
							$target = ( get_post_meta(get_the_ID(), 'pyre_custom_url_target', true) == 'yes' ) ? 'target="_blank"' : '';
						} 
	
						$html .= '<div class="portfolio-item">';
							$html .= '<div class="portfolio-image">';						
								$html .= '<img src="'.$image.'" alt="'.get_the_title().'" title="'.get_the_title().'" />';						
								$html .= '<div class="portfolio-overlay"><a href="'.$link.'" rel="'.$rel.'" '.$target.'><div class="portfolio-overlay-inside"><span class="'.$icon.'"></span></div></a>'.$hidden_link.'</div>';								
							$html .= '</div>';	
							
							if($portfolio_details == 'true'):				
	
								$html .= '<div class="portfolio-title">';
									$html .= '<h3><a href="'.$title_link.'" '.$target.'>'.get_the_title().'</a></h3>';
									$html .= '<div class="portfolio_tags">'.get_the_term_list($post->ID, 'portfolio_category', '', ' &middot; ', '').'</div>';
								$html .= '</div>';
	
							endif;
						
						$html .= '</div>';
					}
				endwhile;		
				
			$html .= '</div>';
			$html .= '<div id="home-portfolio-prev" class="widget-scroll-prev"><i class="fa fa-chevron-left"></i></div>';
			$html .= '<div id="home-portfolio-next" class="widget-scroll-next"><i class="fa fa-chevron-right"></i></div>';
			$html .= '</div>';
		
	
	}
	else{
		
		if($show_filters == 'true') {
		
			$portfolio_category = get_terms('portfolio_category');
		
			if($portfolio_category && ( sizeof($categ_arr) > 1 || !$category )):
				$html .= '<ul id="portfolio-filter" class="'.$filter_class.' clearfix">';
					$html .= '<li class="activeFilter"><a data-filter="*" href="#">'. __('All', 'Nimva').'</a></li>';
						
						if($category && sizeof($categ_arr) > 1) {		
							foreach($categ_arr as $categ_id){
								$portfolio_cat = get_term( $categ_id, 'portfolio_category' );
								$html .= '<li><a data-filter=".' . $portfolio_cat->slug . '" href="#">' . $portfolio_cat->name . '</a></li>';
							}
						}
						
						else{
							foreach($portfolio_category as $portfolio_cat){ 
								$html .= '<li><a data-filter=".' . $portfolio_cat->slug . '" href="#">' . $portfolio_cat->name . '</a></li>';
							}
						}
						
				$html .= '</ul>';
			endif;	
		
		}
		
		if($columns != 4) {
			$portfolio_col = '-'.$columns;
		}
		else{
			$portfolio_col = '';
		}
		
		$html .= '<div id="portfolio" class="portfolio' . $portfolio_col . ' ' . $el_class . ' ' . $css_animation . ' clearfix">';
			while($works->have_posts()): $works->the_post();
				
				$post = new StdClass();
				$post->ID = get_the_ID();
			
				if(has_post_thumbnail() || get_post_meta($post->ID, 'pyre_youtube', true) || get_post_meta($post->ID, 'pyre_vimeo', true)):
				
					$item_classes = '';
                    $item_cats = get_the_terms($post->ID, 'portfolio_category');
                    $portf_cat = wp_get_object_terms($post->ID, 'portfolio_category');
                    if($item_cats):
						foreach($item_cats as $item_cat) {
							$item_classes .= $item_cat->slug . ' ';
						}
                    endif;
                                    
                    $icon = 'fa fa-camera';
                    $full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                    $img_url = wp_get_attachment_url( get_post_thumbnail_id(),'full' );
					$image = aq_resize( $img_url, 470, 320, true );
									
                    $link = $full_image[0];
                    $rel = 'prettyPhoto['.$post->ID.']';
                    $hidden_link='';
					
					$target = '';
					$title_link = get_permalink($post->ID);
					
					$i = 2;
                    
					while($i <= $data['featured_images']):
                    	$attachment = new StdClass();
						$attachment->ID = kd_mfi_get_featured_image_id('featured-image-'.$i, 'creativo_portfolio');
                        
						if($attachment->ID):
                        	$icon = 'fa fa-picture-o';	
                            $full_image = wp_get_attachment_image_src($attachment->ID, 'full');
                            $hidden_link .= '<a class="hidden" href="'.$full_image[0].'" rel="prettyPhoto['.$post->ID.']"></a>';									
                        endif; 
                        
						$i++; 
                    endwhile;
                    
					if(get_post_meta(get_the_ID(), 'pyre_youtube', true)) {
                    	$icon = 'fa fa-film';
                        $link = 'http://www.youtube.com/watch?v='.get_post_meta(get_the_ID(), 'pyre_youtube', true);
                        $rel = 'prettyPhoto[movie]';
                    }
					
                    if(get_post_meta(get_the_ID(), 'pyre_vimeo', true)) {
                    	$icon = 'fa fa-film';
                        $link = 'http://vimeo.com/'.get_post_meta(get_the_ID(), 'pyre_vimeo', true);
                        $rel = 'prettyPhoto[movie]';
                    }
					
                    if($data['portfolio_link']=='Portfolio Post'){
						$link = get_permalink($post->ID);
						$hidden_link = '';
						$rel = '';
					}
					
					if(get_post_meta(get_the_ID(), 'pyre_custom_url', true) != '') {
						$hidden_link = '';
						$rel = '';
						$link = $title_link = get_post_meta(get_the_ID(), 'pyre_custom_url', true);
						$target = ( get_post_meta(get_the_ID(), 'pyre_custom_url_target', true) == 'yes' ) ? 'target="_blank"' : '';
					} 
					
					$html .= '<div class="portfolio-item  ' . $item_classes . '">';
                    	$html .= '<div class="portfolio-image">';
                        	$html .= '<img src="'. $image .'" alt="'. get_the_title().'" title="'. get_the_title().'" />';
                            $html .= '<div class="portfolio-overlay">';
                            	$html .= '<a href="'. $link.'" rel="'. $rel .'" '.$target.'>';
                                	$html .= '<div class="portfolio-overlay-inside">';
                                    	$html .= '<span class="'. $icon .'"></span>';
                                    $html .= '</div>';
                                $html .= '</a>'. $hidden_link;
                            $html .= '</div>';
                        $html .= '</div>';
                                        
						if( $portfolio_details == 'true' ) {
										
                        	$html .= '<div class="portfolio-title">';
                            	$html .= '<h3 title="'. get_the_title().'"><a href="'.$title_link.'" '.$target.'>'.get_the_title().'</a></h3>';
                                $html .= '<div class="portfolio_tags">'. get_the_term_list($post->ID, 'portfolio_category', '', ' &middot; ', '').'</div>';
                            $html .= '</div>';
                        }
                        
                    $html .='</div>';
				
				endif;
			
			endwhile;
		$html .= '</div>';
	}	
	
	wp_reset_query();
		
	$html .= '</div>';
	
	return $html;
}


//////////////////////////////////////////////////////////////////
// Alert Message
//////////////////////////////////////////////////////////////////
add_shortcode('vc_message', 'shortcode_vc_message');
function shortcode_vc_message($atts, $content = null) {
	
	extract(shortcode_atts(array(
			'color' => 'info',
			'title' => '',
			'dismiss' => 'true',
			'icon_type' => 'old_fontawesome',
			'icon_fontawesome' => 'fa fa-adjust',
			'icon_openiconic' => 'vc-oi vc-oi-dial',
			'icon_typicons' => 'typcn typcn-adjust-brightness',
			'icon_linecons' => 'vc_li vc_li-heart',
			'icon_entypo' => 'entypo-icon entypo-icon-note',
			'icon' => '',
			'css_animation' =>'',
			'el_class' =>''
	), $atts)); 

	$css_animation = ($css_animation != '') ? 'wpb_animate_when_almost_visible wpb_'.$css_animation : '';
	
	$html = $style = '';

	if($icon_type == 'old_fontawesome'){
		if($icon) { 
			$icon = '<span class="fa '.$icon.'"></span>';
			$style = 'style="padding-left:50px"';
		} 	
	}
	else {		
		if( function_exists('vc_icon_element_fonts_enqueue') ){
			vc_icon_element_fonts_enqueue( $icon_type );
		}	
		$icon_output = ( !empty(${"icon_" . $icon_type}) ) ? ${"icon_" . $icon_type} : '';
		if( !empty( $icon_output ) ) {			
			$icon = '<span class="'.$icon_output.'"></span>';
			$style = 'style="padding-left:50px"';
		}
	}
	
	
	
	$html .= '<div class="alert alert-'.$color.' ' . $el_class . ' ' . $css_animation.'" '.$style.'>';		
		$html .= $icon.'<strong>'.$title.'</strong>';
		if($dismiss=='true') {
			$html .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
		}
		$html .= '<p class="nobottommargin">'.do_shortcode($content).'</p>';
		$html .= '';
	$html .= '</div>';

	return $html;
}

//new shortcodes come here

//////////////////////////////////////////////////////////////////
// Info Box
//////////////////////////////////////////////////////////////////
add_shortcode('qbox', 'shortcode_qbox');
function shortcode_qbox($atts, $content = null) {
	
	extract(shortcode_atts(array(
			'align' => 'center',
			'title1' => '',
			'title2' => '',
			'big_size' => '31',
			'small_size' => '19',
			'big_color' => '',
			'small_color' => '',
			'en_buttons' => 'false',
			'b1_style' => 'minimal',
			'b1_title' => 'Text on the button 1',
			'b1_icon' => '',
			'b1_href' => '',
			'b1_color' => 'red',
			'b1_inverse' => 'false',
			'b1_size' => 'small',
			'b2_style' => 'minimal',
			'b2_title' => 'Text on the button 2',
			'b2_icon' => '',
			'b2_href' => '',
			'b2_color' => 'red',
			'b2_inverse' => 'false',
			'b2_size' => 'small',
			'css_animation' => '',
			'el_class' => ''
			
	), $atts));
	
	$css_animation = ($css_animation != '') ? 'wpb_animate_when_almost_visible wpb_'.$css_animation : '';
	
	$html = '';
	
	$big_size = ($big_size != '31') ? 'font-size: ' . $big_size . 'px; line-height: '.($big_size+20).'px;' : '';
	$big_color = (!empty($big_color)) ? 'color: ' . $big_color . ';' : '';
	
	$small_size = ($small_size != '19') ? 'font-size: '.$small_size.'px; line-height: '.($small_size+9).'px;' : '';
	$small_color = (!empty($small_color)) ? 'color: ' . $small_color . ';' : '';
	
	$html .= '<div class="col_full '.$align . ' ' . $el_class . '">';
		$html .= '<h2 class="info-box '.$css_animation.'" style="' . $big_size . $big_color . '">'.$title1.'</h2>';
		if (function_exists('wpb_js_remove_wpautop')){
			$html .= '<div class="featured-qbox '.$css_animation.'" style="' . $small_size . $small_color . '">'.wpb_js_remove_wpautop($title2,true).'</div>';
		}
		if($en_buttons == 'true'):
			$html .= '<div class="col_full '.$align . ' ' . $css_animation. '">';
				$html .= do_shortcode('[vc_button style="'.$b1_style.'" title="'.$b1_title.'" icon="'.$b1_icon.'" color="'.$b1_color.'" button_inverse="'.$b1_inverse.'" size="'.$b1_size.'" href="'.$b1_href.'"]');
				$html .= do_shortcode('[vc_button style="'.$b2_style.'" title="'.$b2_title.'" icon="'.$b2_icon.'" color="'.$b2_color.'" button_inverse="'.$b2_inverse.'" size="'.$b2_size.'" href="'.$b2_href.'"]');
			$html .= '</div>';
		endif;
		
	$html .= '</div>';

	return $html;
}

//////////////////////////////////////////////////////////////////
// Product Feature
//////////////////////////////////////////////////////////////////
add_shortcode('product_feature', 'shortcode_product_feature');
function shortcode_product_feature($atts, $content = null) {
	
	extract(shortcode_atts(array(
			'title' => '',
			'title_color' => '',
			'title_font_size' => '20',
			'font_weight' => '',
			'description_color' => '',
			'description_font_size' => '12',
			'style' => '1',
			'orientation' => 'toleft',
			'icon_type' => 'old_fontawesome',
			'icon_fontawesome' => 'fa fa-adjust',
			'icon_openiconic' => 'vc-oi vc-oi-dial',
			'icon_typicons' => 'typcn typcn-adjust-brightness',
			'icon_linecons' => 'vc_li vc_li-heart',
			'icon_entypo' => 'entypo-icon entypo-icon-note',
			'icon' => '',
			'icon_color' => '',
			'icon_bg_color' => '',
			'icon_size' => '20',			 
			'link' => '',
			'target' => '',
			'picture_icon_url' => '',
			'css_animation' => '',
			'el_class' => ''
		), $atts));
		
	$html = '';
	
	$css_animation = ($css_animation != '') ? ' wpb_animate_when_almost_visible wpb_'.$css_animation : '';
	
	//title style
	$title_color = (!empty($title_color)) ? 'color: '.$title_color.'; ' : '' ;
	$title_font_size = (!empty($title_font_size)) ? 'font-size: '.$title_font_size.'px; line-height:normal;' : '' ;
	$font_weight = ($font_weight=='bold') ? 'font-weight: bold;' : '';
	
	//description style
	$description_color = (!empty($description_color)) ? 'color: '.$description_color.'; ' : '' ;
	$description_font_size = (!empty($description_font_size)) ? 'font-size: '.$description_font_size.'px; line-height:1.7;' : '' ;
	
	//icon style
	$style_outer = '';
	if ($icon_size > 20 && $style == 1 && empty($picture_icon_url)):
		$padding_left = 50 + ($icon_size-20);	
		if($orientation == 'toright') {
			$style_outer = 'style="padding-right: '.$padding_left.'px;"';
		}
		else{
			$style_outer = 'style="padding-left: '.$padding_left.'px;"';					
		}
	endif;
	$width_height = 10 + $icon_size; 
	$width = 'width:'.$width_height.'px;';
	$height = 'height:'.$width_height.'px;';
	
	$extra = ($style == 2) ? $extra = ' style2 ' : $extra= '';
	
	$icon_color = (!empty($icon_color)) ? 'color: '.$icon_color.'; ' : '' ;
	$icon_bg_color = (!empty($icon_bg_color) && ($icon_bg_color!= '#fff' || $icon_bg_color!= '#ffffff')) ? 'background-color: '.$icon_bg_color.'; line-height:'.$icon_size.'px;' : '' ;
	$icon_size_css = (!empty($icon_size)) ? 'font-size: '.$icon_size.'px; ' : '' ;
	$icon_pos = ($style == 2) ? 'position: relative; margin-left: auto; margin-right: auto; line-height:'.($icon_size+10).'px;' : 'line-height:'.($icon_size+10).'px;';	

	if($icon_type == 'old_fontawesome'){
		//if($text_icon) : $icon_class = '<i class="fa '.$icon.'" style="' . $color . $title_border . $icon_pos . $icon_size . '"></i>'; endif;
		$icon = ( !empty($icon) && $icon != '') ? 'fa '.$icon.'' : '';
	}

	else {
		
		if( function_exists('vc_icon_element_fonts_enqueue') ){
			vc_icon_element_fonts_enqueue( $icon_type );
		}	

		$icon_output = ( !empty(${"icon_" . $icon_type}) ) ? ${"icon_" . $icon_type} : '';

		if( !empty( $icon_output ) ) {			
			$icon = $icon_output;
		}

	}
	
	
	$html .= '<div class="product-feature'.$extra.' ' . $orientation . ' '. $css_animation .'" '.$style_outer.'>';
		
		if($icon && !$picture_icon_url):

			$html .= '<span class="'.$icon.'" style="'.$icon_color.$icon_bg_color.$icon_size_css.$width.$height.$icon_pos.'"></span>';
		
		elseif(!empty($picture_icon_url)):
			$picture_icon_url = !empty($picture_icon_url) ? wp_get_attachment_image_src( $picture_icon_url ) : '' ;
			$html .= '<div class="pf-image"><img src="'.$picture_icon_url[0].'"></div>';
			
		endif;
			
		if($title) :
		
			if($link) :
				$html .= '<h3 class="featured" style="' . $title_color . $title_font_size . $font_weight . '"><a href="'.$link.'" target="'.$target.'">'.$title.'</a></h3>';			
			else:
				$html .= '<h3 class="featured" style="' . $title_color . $title_font_size . $font_weight . '">'.$title.'</h3>';
			endif;
				
		endif;	
		
		$html .= '<div style="' . $description_color . $description_font_size . '">'.do_shortcode($content).'</div>';
		
	$html .= '</div>';

	return $html;
}

//////////////////////////////////////////////////////////////////
// Featured Services
//////////////////////////////////////////////////////////////////
add_shortcode('vc_service_box', 'shortcode_vc_service_box');
function shortcode_vc_service_box($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'title' => 'Design',
			'title_color' => '',			
			'href' => '',
			'target' => '',
			//'full_link' => '',
			'style' => '',
			'icon_type' => 'old_fontawesome',
			'icon_fontawesome' => 'fa fa-adjust',
			'icon_openiconic' => 'vc-oi vc-oi-dial',
			'icon_typicons' => 'typcn typcn-adjust-brightness',
			'icon_linecons' => 'vc_li vc_li-heart',
			'icon_entypo' => 'entypo-icon entypo-icon-note',
			'icon' => '',
			'icon_color' => '',			
			'text_icon' => '',
			'text_color' => '',
			'bg_color' => '',
			'bg_opacity' => '100',
			'css_animation' => '',
			'el_class' => ''
		), $atts));		
		
		if ( !empty($icon) ) {
			$details =  wp_prepare_attachment_for_js ($icon);
			$icon = wp_get_attachment_image_src( $icon,'full' );
		}

		if($icon_type == 'old_fontawesome'){
			//if($text_icon) : $icon_class = '<i class="fa '.$icon.'" style="' . $color . $title_border . $icon_pos . $icon_size . '"></i>'; endif;
			$text_icon = ( !empty($text_icon) && $text_icon != '') ? '<i class="fa '.$text_icon.'"></i>' : '';
		}

		else {
			
			if( function_exists('vc_icon_element_fonts_enqueue') ){
				vc_icon_element_fonts_enqueue( $icon_type );
			}	

			$icon_output = ( !empty(${"icon_" . $icon_type}) ) ? ${"icon_" . $icon_type} : '';

			if( !empty( $icon_output ) ) {			
				$text_icon = '<i class="'.$icon_output.'"></i>';
			}

		}
		
		$icon_color = ($icon_color) ? 'style="color: '.$icon_color.';"' : '';
		
		$title_color = ($title_color) ? 'style="color: ' . $title_color . ';"' : '';
		
		$text_color = ($text_color) ? 'style="color: ' . $text_color . ';"' : '';
		
		if($bg_color && ($bg_opacity == 100)) { 
			$bg_color = 'style="background-color: ' . $bg_color . ';"'; 
		}
		elseif($bg_color && ($bg_opacity != 100)) {
			$bg_color_hex = hex2rgba($bg_color);
			$bg_opacity = $bg_opacity/100;
			$bg_color = 'style="background: rgba('.$bg_color_hex[0] .' , ' . $bg_color_hex[1] .' , '. $bg_color_hex[2] .',' . $bg_opacity.') ";';
		}
		
		$add_begin = $add_end = '';
		/*
		if($full_link == 'true' && $href) {
			$add_begin = '<a href="' . $href . '" target="' . $target . '">';
			$add_end = '</a>';
		}
		*/
		$css_animation = ($css_animation != '') ? 'wpb_animate_when_almost_visible wpb_'.$css_animation : '';
	
		$str = '';
		//$str .= $add_begin;
		$str .= '<div class="inner ' . $el_class . ' ' . $css_animation . '" '.$bg_color.'>';
			if($href) :
				$str .= '<a href="'.$href.'" target="' . $target . '">';
			endif;	
					if( $text_icon && empty($icon) ):				
						$str .= '<span class="ca-icon" '.$icon_color.'>'.$text_icon.'</span>';
					elseif( !empty($icon) ):
						$str .= '<span class="ca-icon paddingtop"><img src="'.$icon[0].'" alt="'.$details['alt'].'" title="'.$details['title'].'"></span>';
					endif;
						$str .= '<span class="ca-main" '.$title_color.'>' .$title. '</span>';
							
						
					$str .= '<span class="ca-sub" '.$text_color.'>' .do_shortcode($content).'</span>'; 
					$str .= '';  
			if($href) :
				$str .='</a>';
			endif;	                           
		$str .= '</div>';
		//$str .= $add_end;
	return $str;
}

//////////////////////////////////////////////////////////////////
// Custom Widgets from Visual Composer add-on
//////////////////////////////////////////////////////////////////

/* Flickr */

add_shortcode( 'vc_wp_flickr_widget', 'vc_wp_flickr_widget_func' );
function vc_wp_flickr_widget_func( $atts, $content = null ) {
	/* Flickr Widget */
	$output = $category = $orderby = $options = $el_class = '';
	extract( shortcode_atts( array(
	    'title' => '',
	    'screen_name' => '62118446@N03',
	    'number' => '3',
	    'el_class' => ''
	), $atts ) );	

	$output = '<div class="vc_widget '.$el_class.' clearfix">';
	$type = 'Flickr_Widget';
	$args = array( 'before_title'=>'<div class="title-outer"><h3>', 'after_title'=>'</h3></div>');

	ob_start();
	the_widget( $type, $atts, $args );
	$output .= ob_get_clean();

	$output .= '</div>';

	return $output;
}

/* Contact Us */

add_shortcode( 'vc_wp_contact_us', 'vc_wp_contact_us_func' );
function vc_wp_contact_us_func( $atts, $content = null ) {
	$output = $category = $orderby = $options = $el_class = '';
	extract( shortcode_atts( array(
	    'title' => '',
	    'address' => '',
		'phone' => '',
		'fax' => '',
		'email' => '',
		'web' => '',
	    'el_class' => ''
	), $atts ) );

	$output = '<div class="vc_widget '.$el_class.' clearfix">';
	$type = 'Contact_Info_Widget_NV';
	$args = array( 'before_title'=>'<div class="title-outer"><h3>', 'after_title'=>'</h3></div>');

	ob_start();
	the_widget( $type, $atts, $args );
	$output .= ob_get_clean();

	$output .= '</div>';

	return $output;
}

/* Popular/Recent/Comments Posts Tab */

add_shortcode( 'vc_wp_rec_pop_tabs', 'vc_wp_rec_pop_tabs_func' );
function vc_wp_rec_pop_tabs_func( $atts, $content = null ) {
	$output = $title = $show_popular_posts = $posts = $show_recent_posts = $comments = $show_comments = $tags = $el_class = '';

	$atts['show_popular_posts'] = isset($atts['show_popular_posts']) ? $atts['show_popular_posts'] : 'true';
	$atts['show_recent_posts'] = isset($atts['show_recent_posts']) ? $atts['show_recent_posts'] : 'true';
	$atts['show_comments'] = isset($atts['show_comments']) ? $atts['show_comments'] : 'true';
	$atts['posts'] = isset($atts['posts']) ? $atts['posts'] : '1';
	$atts['comments'] = isset($atts['comments']) ? $atts['comments'] : '1';
	$atts['tags'] = isset($atts['tags']) ? $atts['tags'] : '1';	

	$output = '<div class="vc_widget '.$el_class.' clearfix">';
	$type = 'Pyre_Tabs_Widget';
	$args = array( 'before_title'=>'<div class="title-outer"><h3>', 'after_title'=>'</h3></div>');

	ob_start();
	the_widget( $type, $atts, $args );
	$output .= ob_get_clean();

	$output .= '</div>';	

	return $output;	
}

/* Custom Recent Posts */

add_shortcode( 'vc_wp_custom_posts', 'vc_wp_custom_posts_func' );
function vc_wp_custom_posts_func( $atts, $content = null ) {
	$output = $category = $orderby = $options = $el_class = '';
	extract( shortcode_atts( array(
	    'title' => '',
	    'number' => '3',
	    'el_class' => ''
	), $atts ) );	

	$output = '<div class="vc_widget '.$el_class.' clearfix">';
	$type = 'Recent_Posts_Widget';
	$args = array( 'before_title'=>'<div class="title-outer"><h3>', 'after_title'=>'</h3></div>');

	ob_start();
	the_widget( $type, $atts, $args );
	$output .= ob_get_clean();

	$output .= '</div>';

	return $output;
}

/* Custom Recent Portfolio */

add_shortcode( 'vc_wp_custom_portf', 'vc_wp_custom_portf_func' );
function vc_wp_custom_portf_func( $atts, $content = null ) {
	$output = $category = $orderby = $options = $el_class = '';
	extract( shortcode_atts( array(
	    'title' => 'Latest Portfolio',
	    'number' => '3',
		'desc' => '',
	    'el_class' => ''
	), $atts ) );	

	$output = '<div class="vc_widget '.$el_class.' clearfix">';
	$type = 'TZ_Recent_Portfolios_Widget';
	$args = array( 'before_title'=>'<div class="title-outer"><h3>', 'after_title'=>'</h3></div>');

	ob_start();
	the_widget( $type, $atts, $args );
	$output .= ob_get_clean();

	$output .= '</div>';

	return $output;
}

/* Social Links */

add_shortcode( 'vc_wp_social_links', 'vc_wp_social_links_func' );
function vc_wp_social_links_func( $atts, $content = null ) {
	$output = $category = $orderby = $options = $el_class = '';
	extract( shortcode_atts( array(
	    'title' => '',
	    'fb_link' => '',
		'twitter_link' => '',
		'linkedin_link' => '',
		'tumblr_link' => '',
		'reddit_link' => '',
		'google_link' => '',
	    'el_class' => ''
	), $atts ) );	

	$output = '<div class="vc_widget '.$el_class.' clearfix">';
	$type = 'Social_Links_Widget';
	$args = array( 'before_title'=>'<div class="title-outer"><h3>', 'after_title'=>'</h3></div>');

	ob_start();
	the_widget( $type, $atts, $args );
	$output .= ob_get_clean();

	$output .= '</div>';

	return $output;
}

/* Twitter Feed */

add_shortcode( 'vc_wp_twitter_feed', 'vc_wp_twitter_feed_func' );
function vc_wp_twitter_feed_func( $atts, $content = null ) {
	$output = $category = $orderby = $options = $el_class = '';
	extract( shortcode_atts( array(
	    'title' => '',
	    'consumer_key' => '',
		'consumer_secret' => '',
		'access_token' => '',
		'access_token_secret' => '',
		'twitter_id' => '',
		'count' => '',
	    'el_class' => ''
	), $atts ) );	

	$output = '<div class="vc_widget '.$el_class.' clearfix">';
	$type = 'Tweets_Widget';
	$args = array( 'before_title'=>'<div class="title-outer"><h3>', 'after_title'=>'</h3></div>');

	ob_start();
	the_widget( $type, $atts, $args );
	$output .= ob_get_clean();

	$output .= '</div>';

	return $output;
}

//////////////////////////////////////////////////////////////////
// Add buttons to tinyMCE
//////////////////////////////////////////////////////////////////
add_action('init', 'add_button');

function add_button() {
	if(strstr($_SERVER['REQUEST_URI'], 'wp-admin/post-new.php') || strstr($_SERVER['REQUEST_URI'], 'wp-admin/post.php')|| strstr($_SERVER['REQUEST_URI'], 'wp-admin/edit.php')) {
		if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
		{  
			add_filter('mce_external_plugins', 'add_plugin');  
			add_filter('mce_buttons', 'register_button');  
		}
	}
}    

function register_button($buttons) {
   array_push($buttons, "tfbutton");  
   return $buttons;
}  

function add_plugin($plugin_array) {  
   $plugin_array['tfbutton'] = get_template_directory_uri().'/tinymce/customcodes.js';

   return $plugin_array;  
}