<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract(shortcode_atts(array(
	'row_id' => '',
	'layout' => 'normal',
	'margintop' => '',
	'marginbottom' => '',
	'paddingtop' => '',
	'paddingbottom' => '',
	'bg_color' => '',
	'border_color' => '',
	'border_width' => '',
	'bg_image' => '',
	'bg_patterns' => '',
	'bg_attachment' => 'scroll',
	'bg_repeat' => 'repeat',
	'bg_stretch' => 'false',
	'bg_parallax' => 'false',
	'video_bg' =>'false',
	'ytb_video_id' => '',
	'vid_opacity' => '70',
	'video_overlay' => '',
	'video_overlay_col' =>  '',
	'video_overlay_opac' => '',
	'row_font_color' => '',
	'video_quality' => '',
    'el_class' => '',
), $atts));

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $equal_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $parallax_speed_bg
 * @var $parallax_speed_video
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $layout = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $video_overlay_render = '';
$disable_element = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$wrapper_attributes = array();

$outshort = $css;

$el_id = $row_id;

/* Old Theme Styling */
if( !strpos($outshort, 'background-repeat') && !strpos($outshort, 'background-size') ) {
	$bg_stretch = ($bg_stretch == 'true') ? 'background-size: cover; background-position:center;' : '';
	//$print = 'visual composer style';
}

$bg_patterns = ( !empty($bg_patterns) && !strpos($outshort, 'background')) ? 'background: url(' . get_template_directory_uri() . '/images/patterns/' . $bg_patterns . ') repeat;' : '';
//$print = 'visual composer style';

$style = $this->buildStyle( $bg_image, $bg_color, $paddingtop, $paddingbottom, $marginbottom, $margintop, $bg_attachment, $bg_stretch, $bg_patterns, $row_font_color);

if($video_bg) {
	if( !empty($video_bg_url) ){
		$video_bg_url = strpos( $video_bg_url, 'youtube' ) ? $video_bg_url : 'https://www.youtube.com/watch?v=' . $video_bg_url;
	}
	/* Video has opacity */
	$wrapper_attributes[] = 'data-video-opacity="' . ( $vid_opacity / 100 ) .'"';
}

if ( $video_bg && ( $video_overlay_opac > 0 )  ) {
	$video_overlay_opacity = 1 - (100 - $video_overlay_opac)/100;
	$video_overlay = ( !empty ( $video_overlay ) ) ? 'background: url(' . get_template_directory_uri() . '/images/overlay/' . $video_overlay .') repeat;' : '';
	$video_overlay_render = '<div class="video_overlay" style="opacity: ' . $video_overlay_opacity . '; filter: alpha(opacity=' . $video_overlay_opacity . '); background-color:' . $video_overlay_col . ';'. $video_overlay . '"></div>';
}

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class );

$css_classes = array(
	'vc_row',
	'wpb_row', //deprecated
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);

if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if ( !empty( $layout ) && empty( $full_width ) ) {
	$full_width = $layout;
}

if (vc_shortcode_custom_css_has_property( $css, array('border', 'background') ) || $video_bg || $parallax) {
	$css_classes[]='vc_row-has-fill';
}

if (!empty($atts['gap'])) {
	$css_classes[] = 'vc_column-gap-'.$atts['gap'];
}

// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
if ( ! empty( $full_width ) ) {
	$wrapper_attributes[] = 'data-vc-full-width="true"';
	$wrapper_attributes[] = 'data-vc-full-width-init="false"';
	if ( 'stretch_row_content' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
	} elseif ( 'stretch_row_content_no_spaces' === $full_width || 'wide' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
		$css_classes[] = 'vc_row-no-padding';
	}
	$after_output .= '<div class="vc_row-full-width"></div>';
}



if ( ! empty( $full_height ) ) {
	$css_classes[] = ' vc_row-o-full-height';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$css_classes[] = ' vc_row-o-columns-' . $columns_placement;
	}
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = ' vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = ' vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = ' vc_row-flex';
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = ' vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}
/*
if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}
*/
if( $bg_parallax == 'true' ) {
	$css_classes[] = ' parallax_section';
}
/*
if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
*/
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}

$video_placeholder = ($video_placeholder !='') ? wp_get_attachment_image_src($video_placeholder,'full') : '';

if( $video_bg == 'yes' ) {
	
	if( !empty( $mp4 ) && !empty( $webm ) && empty( $video_bg_url ) ) {
		$video_bg_render = '<div class="video-bg self_video">';
			$video_bg_render .= '<video poster="'.$video_placeholder[0].'" preload="auto" loop autoplay muted style="opacity:' . ( $vid_opacity / 100 ) . '">';
				$video_bg_render .= '<source src="'.$mp4.'" type="video/mp4" />';
				$video_bg_render .= '<source src="'.$webm.'" type="video/webm" />';
			$video_bg_render .= '</video>';
			$video_bg_render .= $video_overlay_render;
			$video_bg_render .= '<div class="video-placeholder" style="background-image: url('.$video_placeholder[0].')"></div>';
		$video_bg_render .= '</div>';
	}
	elseif( empty( $mp4 ) && empty( $webm ) && !empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) ) {
		$video_bg_render = '<div class="video-bg ">';			
			$video_bg_render .= $video_overlay_render;
			$video_bg_render .= '<div class="video-placeholder" style="background-image: url('.$video_placeholder[0].')"></div>';
		$video_bg_render .= '</div>';			
	}
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . $style .'>';
$output .= $video_bg_render;
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= $after_output;

echo $output;
