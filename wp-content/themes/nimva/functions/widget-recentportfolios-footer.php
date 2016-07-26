<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Custom Recent Portfolio/Work Widget

-----------------------------------------------------------------------------------*/


// Add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'tz_recent_portfolios_footer_widget' );


// Register widget.
function tz_recent_portfolios_footer_widget() {
	register_widget( 'TZ_Recent_Portfolios_Footer_Widget' );
}

// Widget class.
class tz_recent_portfolios_footer_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
	function __construct() {
	
		/* Widget settings. */
		$widget_ops = array( 
		    'classname' => 'portfolio-widget', 
		    'description' => __('A widget that displays your recent portfolios. Use for footer area.', 'Nimva') 
		);

		/* Widget control settings. */
		$control_ops = array( 
		    'width' => 300, 
		    'height' => 350, 
		    'id_base' => 'tz_recent_portfolios_footer_widget' 
		);

		/* Create the widget. */
		//$this->WP_Widget( 'tz_recent_portfolios_footer_widget', __('Custom Recent Footer Portfolios', 'Nimva'), $widget_ops, $control_ops );
		parent::__construct( 'tz_recent_portfolios_footer_widget', __('Custom Recent Footer Portfolios', 'Nimva'), $widget_ops, $control_ops );
	}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		extract( $args );
		
		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$number = ( isset($instance['number']) ) ? $instance['number'] : 0;
		$desc = $instance['desc'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title ) { echo $before_title . $title . $after_title; }
?>
		<?php //if( !empty($desc) ) { echo "<p>$desc</p>"; } ?>
                
			<?php 
			    $args = array(
                    'posts_per_page' => $number,
                    'post_type' => 'creativo_portfolio',
                    'order' => 'DESC',
                    'orderby' => 'date'
                );
			
                $port_query = new WP_Query( $args );
                ?>
                <div id="widget-portfolio-footer" class="portfolio-widget-scroll" data-prev="#widget-portfolio-prev-footer" data-next="#widget-portfolio-next-footer">
                <?php
                if( $port_query->have_posts() ) : while( $port_query->have_posts() ) : $port_query->the_post(); ?>
                	<?php
					$item_classes = '';
					$item_cats = get_the_terms($post->ID, 'portfolio_category');
					$portf_cat = wp_get_object_terms($post->ID, 'portfolio_category');
					if($item_cats):
						foreach($item_cats as $item_cat) {
							$item_classes .= $item_cat->slug . ' ';
						}
					endif;
					?>
                	
                    	<div class="portfolio-item">
                        	<div class="portfolio-image">
								<?php 
								$img_url = wp_get_attachment_url( get_post_thumbnail_id(),'full' );
								$image = aq_resize( $img_url, 470, 320, true ); 
								?>
                                <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                <div class="portfolio-overlay">
                                	<a href="<?php the_permalink(); ?>">
                                        <div class="portfolio-overlay-inside">
                                            <span class="fa fa-link"></span>
                                        </div>
									</a>
                                </div>
                            </div>
                            <div class="portfolio-title">
                            	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            	<div class="portfolio_tags"><?php echo get_the_term_list($post->ID, 'portfolio_category', '', ' &middot; ', '');?></div>
                            </div>    
                        </div>
                    	
                    
                	
                    	
                <?php endwhile; endif; wp_reset_postdata(); ?>
				</div>
				<div id="widget-portfolio-prev-footer" class="widget-scroll-prev"><i class="fa fa-chevron-left"></i></div>
                <div id="widget-portfolio-next-footer" class="widget-scroll-next"><i class="fa fa-chevron-right"></i></div>
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
		$instance['desc'] = strip_tags( $new_instance['desc'] );
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
		'title' => 'Recent Work',
		'desc' => 'This is my latest work, pretty cool huh?',
		'number' => 4
		
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
        <!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'Nimva') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<!-- Description: Text Input -->
    	<p>
    		<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e('Short Description:', 'Nimva') ?></label>
    		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['desc'] ), ENT_QUOTES)); ?>" />
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