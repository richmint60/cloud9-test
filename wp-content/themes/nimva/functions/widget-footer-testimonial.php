<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Custom Recent Portfolio/Work Widget
	Description: A widget that allows the display of recent portfolios/work.

-----------------------------------------------------------------------------------*/


// Add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'footer_testimonial_widget' );


// Register widget.
function footer_testimonial_widget() {
	register_widget( 'Footer_Testimonial_Widget' );
}

// Widget class.
class footer_testimonial_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
	function __construct() {
	
		/* Widget settings. */
		$widget_ops = array( 
		    'classname' => 'footer-testimonal-widget', 
		    'description' => __('A widget that displays testimonials. Use in Footer Sidebars.', 'Nimva') 
		);

		/* Widget control settings. */
		$control_ops = array( 
		    'width' => 300, 
		    'height' => 350, 
		    'id_base' => 'footer_testimonial_widget' 
		);

		/* Create the widget. */
		//$this->WP_Widget( 'footer_testimonial_widget', __('Footer Testimonials Widget', 'Nimva'), $widget_ops, $control_ops );
		parent::__construct( 'footer_testimonial_widget', __('Footer Testimonials Widget', 'Nimva'), $widget_ops, $control_ops );
	}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		extract( $args );
		
		global $data; 
		
		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		//$number = ( isset($instance['number']) ) ? $instance['number'] : 0;
		$desc = $instance['textarea'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title ) { echo $before_title . $title . $after_title; }
?>
		       	
            <div class="testimonial-scroller" data-prev="#widget-testimonial-footer-prev" data-next="#widget-testimonial-footer-next" data-effect="<?php echo $data['testimonial_effect']; ?>" data-pause="<?php echo ($data['testimonial_pause']*1000); ?>" data-speed="<?php echo $data['testimonial_speed']; ?>" data-auto="<?php echo $data['testimonial_auto']; ?>" >
                <div class="testimonials" >
                    <?php echo do_shortcode($desc); ?>
                </div>
                <div id="widget-testimonial-footer-prev" class="widget-scroll-prev"><i class="fa fa-chevron-left"></i></div>
            	<div id="widget-testimonial-footer-next" class="widget-scroll-next"><i class="fa fa-chevron-right"></i></div>
            </div>    
            
        
                
			
	<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}


/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		/* Strip tags to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['textarea'] = strip_tags( $new_instance['textarea'] );
		//$instance['number'] = strip_tags( $new_instance['number'] );

		/* No need to strip tags for.. */

		return $instance;
	}
	

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings
/*-----------------------------------------------------------------------------------*/
	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'title' => 'Footer Testimonials',
		'textarea' => 'Enter here your testimonials shortcodes'
		//'number' => 4
		
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
        <!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'Nimva') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<!-- Description: Text Input -->        
        <p>
            <label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Textarea:', 'Nimva'); ?></label>            
            <textarea class="widefat" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>" rows="10"><?php echo $instance['textarea']; ?></textarea>
		</p>

        
		

	
	<?php
	}
}
?>