<?php

// Add function to widgets_init that'll load our widget
add_action( 'widgets_init', 'video_widgets' );

// Register widget
function video_widgets() {
	register_widget( 'video_Widget' );
}

// Widget class
class video_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
function __construct() {

	// Widget settings
	$widget_ops = array(
		'classname' => 'video_widget',
		'description' => __('A widget that displays your favorite YouTube/Vimeo Video.', 'Nimva')
	);

	// Widget control settings
	$control_ops = array(
		'width' => 300,
		'height' => 350,
		'id_base' => 'video_widget'
	);

	/* Create the widget. */
	//$this->WP_Widget( 'video_widget', __('Custom Video Widget', 'Nimva'), $widget_ops, $control_ops );
	parent::__construct( 'video_widget', __('Custom Video Widget', 'Nimva'), $widget_ops, $control_ops );
	
}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
function widget( $args, $instance ) {
	extract( $args );

	// Our variables from the widget settings
	$title = apply_filters('widget_title', $instance['title'] );
	$link = $instance['link'];
	
	$video_w = 500;
	$video_h = $video_w/1.61; //1.61 golden ratio

	// Before widget (defined by theme functions file)
	echo $before_widget;

	// Display the widget title if one was input
	if ( $title )
		echo $before_title . $title . $after_title;

	// Display video widget
	?>
	
		<?php echo do_shortcode('[vc_video link="'.$link.'" size="210"][embed width="500" height="'.$video_h.'"]'.$link.'[/embed]'); ?>
		
	<?php

	// After widget (defined by theme functions file)
	echo $after_widget;
	
}


/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	// Strip tags to remove HTML (important for text inputs)
	$instance['title'] = strip_tags( $new_instance['title'] );
	
	// Stripslashes for html inputs
	$instance['link'] = stripslashes( $new_instance['link']);


	// No need to strip tags

	return $instance;
}


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
	 
function form( $instance ) {

	// Set up some default widget settings
	$defaults = array(
		'title' => 'Video Embed Widget',
		'link' => 'http://vimeo.com/23237102'
	);
	
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<!-- Widget Title: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'Nimva') ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>

	<!-- video ID: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e('Video Link:', 'Nimva') ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo $instance['link']; ?>" />
		Link to the video. More about supported formats at <a href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F" target="_blank">WordPress codex page</a>.
	</p>
		
	<?php
	}
}
?>