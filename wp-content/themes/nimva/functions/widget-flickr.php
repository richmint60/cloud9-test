<?php
add_action('widgets_init', 'flickr_load_widgets');

function flickr_load_widgets()
{
	register_widget('Flickr_Widget');
}

class Flickr_Widget extends WP_Widget {
	
	function __construct()
	{
		$widget_ops = array('classname' => 'flickr-widget', 'description' => __('The most recent photos from flickr.','Nimva'));

		$control_ops = array('id_base' => 'flickr-widget');

		//$this->WP_Widget('flickr-widget', __('Nimva Flickr','Nimva'), $widget_ops, $control_ops);
		parent::__construct( 'flickr-widget', __('Nimva Flickr', 'Nimva'), $widget_ops, $control_ops );
	}
	
	function widget($args, $instance)
	{
		extract($args);

		$title = apply_filters('widget_title', $instance['title']);
		$screen_name = $instance['screen_name'];
		$number = $instance['number'];
		
		echo $before_widget;

		if($title) {
			echo $before_title.$title.$after_title;
		}
		
		?>
        
        <div class="flickrfeed" data-id="<?php echo $screen_name; ?>" data-count="<?php echo $number; ?>"></div>
        
		<?php
		
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['screen_name'] = $new_instance['screen_name'];
		$instance['number'] = $new_instance['number'];
		
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'My Photostream', 'screen_name' => '62118446@N03', 'number' => 6);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','Nimva');?></label>
			<input type="text" class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('screen_name'); ?>"><?php _e('Flickr ID:','Nimva');?></label>
			<input type="text" class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('screen_name'); ?>" name="<?php echo $this->get_field_name('screen_name'); ?>" value="<?php echo $instance['screen_name']; ?>" />
		</p>


		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of photos to show:','Nimva');?></label>
			<input type="text" class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $instance['number']; ?>" />
		</p>
		
	<?php
	}
}
?>