<?php
add_action('widgets_init', 'contact_info_load_widgets');

function contact_info_load_widgets()
{
	register_widget('Contact_Info_Widget_NV');
}

class Contact_Info_Widget_NV extends WP_Widget {
	
	function __construct()
	{
		$widget_ops = array('classname' => 'contact_info', 'description' => __('Easily add yout contact info', 'Nimva'));

		$control_ops = array('id_base' => 'contact_info-widget');

		//$this->WP_Widget('contact_info-widget', __('Contact us widget', 'Nimva'), $widget_ops, $control_ops);
		parent::__construct( 'contact_info-widget', __('Contact us widget', 'Nimva'), $widget_ops, $control_ops );
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;

		if($title) {
			echo $before_title.$title.$after_title;
		}
		if($instance['intro']):
		?>
        <p>
        	<?php echo $instance['intro']; ?>
        </p>
        <?php
		endif;
		?>
        <div>
        	<ul>
            	<?php
				if($instance['address']):
				?>
            		<li class="fa fa-map-marker"><?php echo $instance['address']; ?></li>
                <?php
				endif;
				if($instance['phone']):
                ?>
                <li class="fa fa-phone"><?php echo $instance['phone']; ?></li>
                 <?php
				endif;
				if($instance['email']):
                ?>
                <li class="fa fa-envelope"><?php echo $instance['email']; ?></li>
                <?php
				endif;
				?>
            </ul>
        </div>
        <?php
        if($instance['end']):
		?>
        <p>
        	<?php echo $instance['end']; ?>
        </p>
        <?php
		endif;
		?>
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
		$instance['intro'] = $new_instance['intro'];
		$instance['end'] = $new_instance['end'];		
		$instance['address'] = $new_instance['address'];
		$instance['phone'] = $new_instance['phone'];
		$instance['email'] = $new_instance['email'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Contact Info');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'Nimva');?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id('intro'); ?>"><?php _e('Intro Text:', 'Nimva');?></label><br />
            <textarea rows="5" style="width:100%;" name="<?php echo $this->get_field_name('intro'); ?>" id="<?php echo $this->get_field_id('intro'); ?>"><?php echo $instance['intro']; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address:', 'Nimva');?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" value="<?php echo $instance['address']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone:', 'Nimva');?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" value="<?php echo $instance['phone']; ?>" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:', 'Nimva');?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" value="<?php echo $instance['email']; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id('end'); ?>"><?php _e('Ending Text:', 'Nimva');?></label><br />
            <textarea rows="5" style="width:100%;" name="<?php echo $this->get_field_name('end'); ?>" id="<?php echo $this->get_field_id('end'); ?>"><?php echo $instance['end']; ?></textarea>
		</p>
        
	<?php
	}
}
?>