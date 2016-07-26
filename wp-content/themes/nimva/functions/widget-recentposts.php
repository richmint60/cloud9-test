<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Custom Recent Posts Widget

-----------------------------------------------------------------------------------*/


// Add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'recent_posts_widget' );


// Register widget.
function recent_posts_widget() {
	register_widget( 'Recent_Posts_Widget' );
}

// Widget class.
class recent_posts_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
	function __construct() {
	
		/* Widget settings. */
		$widget_ops = array( 
		    'classname' => 'portfolio-widget', 
		    'description' => __('A widget that displays your recent posts.', 'Nimva') 
		);

		/* Widget control settings. */
		$control_ops = array( 
		    'width' => 300, 
		    'height' => 350, 
		    'id_base' => 'recent_posts_widget' 
		);

		/* Create the widget. */
		//$this->WP_Widget( 'recent_posts_widget', __('Custom Recent Posts Widget', 'Nimva'), $widget_ops, $control_ops );
		parent::__construct( 'recent_posts_widget', __('Custom Recent Posts Widget', 'Nimva'), $widget_ops, $control_ops );
	}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		extract( $args );
		
		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$number = ( isset($instance['number']) ) ? $instance['number'] : 0;

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title ) { echo $before_title . $title . $after_title; }
?>
		<?php //if( !empty($desc) ) { echo "<p>$desc</p>"; } ?>
                
			<?php 
			    $args = array(
                    'posts_per_page' => $number,
                    'post_type' => 'post',
                    'order' => 'DESC',
                    'orderby' => 'date'
                );
			
                $port_query = new WP_Query( $args );
                ?>
			<div class="custom_recent_posts">   
                <div class="portfolio-widget-scroll video-sidebar" data-prev="#widget-portfolio-prev" data-next="#widget-portfolio-next">
                <?php
                if( $port_query->have_posts() ) : while( $port_query->have_posts() ) : $port_query->the_post(); ?>                	
                	
                    	<div class="portfolio-item">
                        	<div class="portfolio-image">
								<?php 
								$img_url = wp_get_attachment_url( get_post_thumbnail_id(),'full' );
								$image = aq_resize( $img_url, 470, 320, true ); 
								if($img_url) {
								?>
                                    <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                    <div class="portfolio-overlay">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="portfolio-overlay-inside">
                                                <span class="fa fa-link"></span>
                                            </div>
                                        </a>
                                    </div>
                                <?php }
								elseif(get_post_meta(get_the_ID(), 'pyre_youtube', true)) {
									$video_w = 500;
									$video_h = $video_w/1.61; //1.61 golden ratio
								echo do_shortcode('[vc_video link="http://www.youtube.com/watch?v='.get_post_meta(get_the_ID(), 'pyre_youtube', true).'"][embed width="500" height="'.$video_h.'"]http://www.youtube.com/watch?v='.get_post_meta(get_the_ID(), 'pyre_youtube', true).'[/embed]');	
								}
								elseif(get_post_meta(get_the_ID(), 'pyre_vimeo', true)) {
									$video_w = 500;
									$video_h = $video_w/1.61; //1.61 golden ratio
								echo do_shortcode('[vc_video link="http://www.vimeo.com/'.get_post_meta(get_the_ID(), 'pyre_vimeo', true).'"][embed width="500" height="'.$video_h.'"]http://www.vimeo.com/'.get_post_meta(get_the_ID(), 'pyre_vimeo', true).'[/embed]');	
								}
								 ?>      
                            </div>
                            <div class="portfolio-title">
                            	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            	<div class="portfolio_tags"><?php the_time( get_option('date_format') ); ?></div>
                            </div>    
                        </div>
                    	
                    
                	
                    	
                <?php endwhile; endif; wp_reset_postdata(); ?>
				</div>
				<div id="widget-portfolio-prev" class="widget-scroll-prev"><i class="fa fa-chevron-left"></i></div>
                <div id="widget-portfolio-next" class="widget-scroll-next"><i class="fa fa-chevron-right"></i></div>
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
		$instance['number'] = strip_tags( $new_instance['number'] );

		/* No need to strip tags for.. */

		return $instance;
	}
	

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings
/*-----------------------------------------------------------------------------------*/
	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'title' => 'Recent Posts',
		'number' => 4
		
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
        <!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'Nimva') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
        
		<!-- Number Input: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Amount to show:', 'Nimva') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" />
		</p>

	
	<?php
	}
}
?>