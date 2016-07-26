<?php
add_action('widgets_init', 'social_links_load_widgets');

function social_links_load_widgets()
{
	register_widget('Social_Links_Widget');
}

class Social_Links_Widget extends WP_Widget {
	
	function __construct()
	{
		$widget_ops = array('classname' => 'social_links', 'description' => __('Add your social links ','Nimva'));

		$control_ops = array('id_base' => 'social_links-widget');

		//$this->WP_Widget('social_links-widget', __('Social Links','Nimva'), $widget_ops, $control_ops);
		parent::__construct( 'social_links-widget', __('Social Links', 'Nimva'), $widget_ops, $control_ops );
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;

		if($title) {
			echo $before_title.$title.$after_title;
		}
		?>
		<ul class="team-skills changed">
			
			<?php if($instance['fb_link']): ?>
				<li>

                	<a href="<?php echo $instance['fb_link']; ?>" class="ntip" original-title="<?php _e('Follow on Facebook','Nimva');?>"><i class="fa fa-facebook"></i></a>
                       
                </li>		
			<?php endif; ?>
            
			<?php if($instance['twitter_link']): ?>
            	<li>
                	
                	<a href="<?php echo $instance['twitter_link']; ?>" class="ntip" original-title="<?php _e('Follow on Twitter','Nimva');?>"><i class="fa fa-twitter"></i></a>
                       
                </li>
            	
			<?php endif; ?>	
            
            <?php if($instance['google_link']): ?>
            	<li>
                	
                	<a href="<?php echo $instance['google_link']; ?>" class="ntip" original-title="<?php _e('Follow on Google+','Nimva');?>"><i class="fa fa-google-plus"></i></a>
                       
                </li>

			<?php endif; ?>	
            
            <?php if($instance['instagram_link']): ?>
            	<li>
                	
                	<a href="<?php echo $instance['instagram_link']; ?>" class="ntip" original-title="<?php _e('Follow on Instagram','Nimva');?>"><i class="fa fa-instagram"></i></a>
                       
                </li>

			<?php endif; ?>
            
             <?php if($instance['linkedin_link']): ?>
            	<li>
                	
                	<a href="<?php echo $instance['linkedin_link']; ?>" class="ntip" original-title="<?php _e('Follow on LinkedIn','Nimva');?>"><i class="fa fa-linkedin"></i></a>
                        
                </li>
				
			<?php endif; ?>	
			
			<?php if($instance['dribbble_link']): ?>
            	<li>
                	
                	<a href="<?php echo $instance['dribbble_link']; ?>" class="ntip" original-title="<?php _e('Follow on Dribbble','Nimva');?>"><i class="fa fa-dribbble"></i></a>
                       
                </li>
				
			<?php endif; ?>
            
            <?php if($instance['pinterest_link']): ?>
            	<li>
                	
                	<a href="<?php echo $instance['pinterest_link']; ?>" class="ntip" original-title="<?php _e('Follow on Pinterest','Nimva');?>"><i class="fa fa-pinterest"></i></a>
                    
                </li>
				
			<?php endif; ?>
            <?php if($instance['flickr_link']): ?>
            	<li>
                	
                	<a href="<?php echo $instance['flickr_link']; ?>" class="ntip" original-title="<?php _e('Follow on Flickr','Nimva');?>"><i class="fa fa-flickr"></i></a>
                     
                </li>
				
			<?php endif; ?>
           
			
			<?php if($instance['tumblr_link']): ?>
            	<li>
                	
                	<a href="<?php echo $instance['tumblr_link']; ?>" class="ntip" original-title="<?php _e('Follow on Tumblr','Nimva');?>"><i class="fa fa-tumblr"></i></a>
                       
                </li>
				
			<?php endif; ?>
            
			<?php if($instance['behance_link']): ?>
            	<li>
                	
                	<a href="<?php echo $instance['behance_link']; ?>" class="ntip" original-title="<?php _e('Follow on Behance','Nimva');?>"><i class="fa fa-behance"></i></a>
                      
                </li>
				
			<?php endif; ?>
            
            <?php if($instance['skype_link']): ?>
            	<li>
                	
                	<a href="<?php echo $instance['skype_link']; ?>" class="ntip" original-title="<?php _e('Follow on Skype','Nimva');?>"><i class="fa fa-skype"></i></a>
                        
                </li>
				
			<?php endif; ?>
            
            <?php if($instance['vimeo_link']): ?>
            	<li>
                	
                	<a href="<?php echo $instance['vimeo_link']; ?>" class="ntip" original-title="<?php _e('Follow on Vimeo','Nimva');?>"><i class="fa fa-vimeo-square"></i></a>
                       
                </li>
				
			<?php endif; ?>
            
            <?php if($instance['youtube_link']): ?>
            	<li>
                	
                	<a href="<?php echo $instance['youtube_link']; ?>" class="ntip" original-title="<?php _e('Follow on Youtube','Nimva');?>"><i class="fa fa-youtube"></i></a>
                        
                </li>
				
			<?php endif; ?>			
            
		</ul>
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
		$instance['fb_link'] = $new_instance['fb_link'];
		$instance['twitter_link'] = $new_instance['twitter_link'];
		$instance['google_link'] = $new_instance['google_link'];
		$instance['instagram_link'] = $new_instance['instagram_link'];
		$instance['linkedin_link'] = $new_instance['linkedin_link'];
		$instance['tumblr_link'] = $new_instance['tumblr_link'];
		
		$instance['dribbble_link'] = $new_instance['dribbble_link'];
		$instance['pinterest_link'] = $new_instance['pinterest_link'];
		$instance['flickr_link'] = $new_instance['flickr_link'];
		$instance['behance_link'] = $new_instance['behance_link'];
		$instance['skype_link'] = $new_instance['skype_link'];
		$instance['vimeo_link'] = $new_instance['vimeo_link'];
		$instance['youtube_link'] = $new_instance['youtube_link'];
		

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Social Links');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','Nimva');?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('fb_link'); ?>"><?php _e('Facebook Link:','Nimva');?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('fb_link'); ?>" name="<?php echo $this->get_field_name('fb_link'); ?>" value="<?php echo $instance['fb_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('twitter_link'); ?>"><?php _e('Twitter Link:','Nimva');?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('twitter_link'); ?>" name="<?php echo $this->get_field_name('twitter_link'); ?>" value="<?php echo $instance['twitter_link']; ?>" />
		</p>        
        <p>
			<label for="<?php echo $this->get_field_id('google_link'); ?>"><?php _e('Google+ Link:','Nimva');?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('google_link'); ?>" name="<?php echo $this->get_field_name('google_link'); ?>" value="<?php echo $instance['google_link']; ?>" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id('instagram_link'); ?>"><?php _e('Instagram Link:','Nimva');?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('instagram_link'); ?>" name="<?php echo $this->get_field_name('instagram_link'); ?>" value="<?php echo $instance['instagram_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('linkedin_link'); ?>"><?php _e('LinkedIn Link:','Nimva');?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('linkedin_link'); ?>" name="<?php echo $this->get_field_name('linkedin_link'); ?>" value="<?php echo $instance['linkedin_link']; ?>" />
		</p>        
        <p>
			<label for="<?php echo $this->get_field_id('dribbble_link'); ?>"><?php _e('Dribbble Link:','Nimva');?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('dribbble_link'); ?>" name="<?php echo $this->get_field_name('dribbble_link'); ?>" value="<?php echo $instance['dribbble_link']; ?>" />
		</p>        
        <p>
			<label for="<?php echo $this->get_field_id('pinterest_link'); ?>"><?php _e('Pinterest Link:','Nimva');?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('pinterest_link'); ?>" name="<?php echo $this->get_field_name('pinterest_link'); ?>" value="<?php echo $instance['pinterest_link']; ?>" />
		</p>        
        <p>
			<label for="<?php echo $this->get_field_id('flickr_link'); ?>"><?php _e('Flickr Link:','Nimva');?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('flickr_link'); ?>" name="<?php echo $this->get_field_name('flickr_link'); ?>" value="<?php echo $instance['flickr_link']; ?>" />
		</p>        
        <p>
			<label for="<?php echo $this->get_field_id('tumblr_link'); ?>"><?php _e('Tumblr Link:','Nimva');?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('tumblr_link'); ?>" name="<?php echo $this->get_field_name('tumblr_link'); ?>" value="<?php echo $instance['tumblr_link']; ?>" />
		</p>        
        <p>
			<label for="<?php echo $this->get_field_id('behance_link'); ?>"><?php _e('Behance Link:','Nimva');?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('behance_link'); ?>" name="<?php echo $this->get_field_name('behance_link'); ?>" value="<?php echo $instance['behance_link']; ?>" />
		</p>        
        <p>
			<label for="<?php echo $this->get_field_id('skype_link'); ?>"><?php _e('Skype Link:','Nimva');?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('skype_link'); ?>" name="<?php echo $this->get_field_name('skype_link'); ?>" value="<?php echo $instance['skype_link']; ?>" />
		</p>        
        <p>
			<label for="<?php echo $this->get_field_id('vimeo_link'); ?>"><?php _e('Vimeo Link:','Nimva');?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('vimeo_link'); ?>" name="<?php echo $this->get_field_name('vimeo_link'); ?>" value="<?php echo $instance['vimeo_link']; ?>" />
		</p>        
        <p>
			<label for="<?php echo $this->get_field_id('youtube_link'); ?>"><?php _e('Youtube Link:','Nimva');?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('youtube_link'); ?>" name="<?php echo $this->get_field_name('youtube_link'); ?>" value="<?php echo $instance['youtube_link']; ?>" />
		</p>
		
        
        
	<?php
	}
}
?>