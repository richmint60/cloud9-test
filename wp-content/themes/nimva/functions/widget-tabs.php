<?php
add_action('widgets_init', 'pyre_tabs_load_widgets');

function pyre_tabs_load_widgets()
{
	register_widget('Pyre_Tabs_Widget');
}

class Pyre_Tabs_Widget extends WP_Widget {
	
	function __construct()
	{
		$widget_ops = array('classname' => 'pyre_tabs', 'description' => __('Popular posts and recent posts.','Nimva'));

		$control_ops = array('id_base' => 'pyre_tabs-widget');

		//$this->WP_Widget('pyre_tabs-widget', __('Popular / Recent Posts Tabs','Nimva'), $widget_ops, $control_ops);
		parent::__construct( 'pyre_tabs-widget', __('Popular / Recent Posts Tabs', 'Nimva'), $widget_ops, $control_ops );
	}
	
	function widget($args, $instance)
	{
		global $post;
		
		extract($args);
		
		$posts = $instance['posts'];
		$comments = $instance['comments'];
		$tags_count = $instance['tags'];
		
		$show_popular_posts = ( !empty( $instance['show_popular_posts']) && ($instance['show_popular_posts'] !='false') ) ? 'true' : 'false';
		$show_recent_posts = ( !empty($instance['show_recent_posts']) && ($instance['show_recent_posts'] != 'false') ) ? 'true' : 'false';
		$show_comments = ( !empty($instance['show_comments']) && ($instance['show_comments'] != 'false') ) ? 'true' : 'false';		
						
		echo $before_widget;
		
		?>
		
			<div class="tab_widget nobottommargin">
				<ul class="tabs">
					<?php if($show_popular_posts == 'true'): ?>
					<li><a href="#tab-1" data-href="#tab-1"><?php _e('Popular', 'Nimva'); ?></a></li>
					<?php endif; ?>
					<?php if($show_recent_posts == 'true'): ?>
					<li><a href="#tab-2" data-href="#tab-2"><?php _e('Recent', 'Nimva'); ?></a></li>
					<?php endif; ?>
                    <?php if($show_comments == 'true'): ?>
					<li><a href="#tab-3" data-href="#tab-3"><i class="fa fa-comments"></i></a></li>
					<?php endif; ?>
				</ul>
				<div class="tab_container">
					<?php if($show_popular_posts == 'true'): ?>
					<div id="tab-1" class="tab_content clearfix">
						<?php
						$popular_posts = new WP_Query('showposts='.$posts.'&orderby=comment_count&order=DESC');
						if($popular_posts->have_posts()): ?>
							<ul class="sposts-list clearfix">
							<?php while($popular_posts->have_posts()): $popular_posts->the_post(); ?>                             
								 
									<?php 
                                     if ( has_post_thumbnail() ) { 
									 	$img_url = wp_get_attachment_url( get_post_thumbnail_id(),'thumbnail' );
										$image = aq_resize( $img_url, 60, 60, true );
									 ?>
                                        <li class="clearfix">
                                        	<div class="spost-image">
                                            	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
													<img src="<?php echo $image; ?>" />	
                                                </a>
                                            </div>
                                            <div class="spost-content clearfix">
                                            	<div class="spost-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                                <div class="spost-meta clearfix">
                                                	<ul>
                                                    	<li><i class="fa fa-comments"></i> <?php comments_popup_link('0', '1', '%'); ?> Comments</li>
                                                    </ul>
                                                </div>
                                            </div>                                            
                                        </li>                          
                                     <?php 
                                    } 
									else {
									?>
                                        <li class="clearfix">
                                        	<div class="spost-image"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/no-image.jpg" /></a></div>
                                            <div class="spost-content clearfix">
                                            	<div class="spost-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                                <div class="spost-meta clearfix">
                                                	<ul>
                                                    	<li><i class="fa fa-comments"></i> <?php comments_popup_link('0', '1', '%'); ?> <?php echo __('Comments', 'Nimva'); ?></li>
                                                    </ul>
                                                </div>
                                            </div>                                            
                                        </li>
                                    <?php
									}
                                	?>
                                                 
							<?php endwhile; ?>
                        	</ul>
						<?php endif; wp_reset_query();?>
					</div>
					<?php endif; ?>
					<?php if($show_recent_posts == 'true'): ?>
					<div id="tab-2" class="tab_content clearfix">
						<?php
						$recent_posts = new WP_Query('showposts='.$tags_count);
						if($recent_posts->have_posts()):
						?>
							<ul class="sposts-list clearfix">
							<?php while($recent_posts->have_posts()): $recent_posts->the_post(); ?>									
                                    <?php 
                                     if ( has_post_thumbnail() ) { 
									 	$img_url = wp_get_attachment_url( get_post_thumbnail_id(),'thumbnail' );
										$image = aq_resize( $img_url, 60, 60, true ); 
									?>
                                        <li class="clearfix">
                                        	<div class="spost-image">
                                            	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            		<img src="<?php echo $image; ?>" />
                                                </a>
                                            </div>
                                            <div class="spost-content clearfix">
                                            	<div class="spost-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                                <div class="spost-meta clearfix">
                                                	<ul>
                                                    	<li><i class="fa fa-calendar"></i> <?php the_time( get_option('date_format') ); ?></li>
                                                    </ul>
                                                </div>
                                            </div>                                            
                                        </li>                          
                                     <?php 
                                    } 
									else {
									?>
                                        <li class="clearfix">
                                        	<div class="spost-image"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/no-image.jpg" /></a></div>
                                            <div class="spost-content clearfix">
                                            	<div class="spost-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                                <div class="spost-meta clearfix">
                                                	<ul>
                                                    	<li><i class="fa fa-calendar"></i>  <?php the_time( get_option('date_format') ); ?></li>
                                                    </ul>
                                                </div>
                                            </div>                                            
                                        </li>
                                    <?php
									}
                                    ?>                              
							<?php endwhile; ?>
						</ul>
						<?php endif; wp_reset_query();?>
					</div>
					<?php endif; ?>
                    <?php if($show_comments == 'true'): ?>
                    <div id="tab-3" class="tab_content clearfix">                	
							<?php
							
							$number = $instance['comments'];
							
							global $wpdb;
							
							$recent_comments = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved, comment_type, comment_author_url, SUBSTRING(comment_content,1,110) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT $number";
							
							$the_comments = $wpdb->get_results($recent_comments);
							?>
                            <ul class="sposts-list clearfix">
								<?php
                                foreach($the_comments as $comment) { ?>
                                <li class="clearfix">
                                			<div class="spost-image"><a href="<?php echo get_permalink($comment->ID); ?>#comment-<?php echo $comment->comment_ID; ?>"><?php echo get_avatar($comment, '64'); ?></a></div>
                                            <div class="spost-content clearfix">
                                            	<strong><?php echo strip_tags($comment->comment_author); ?>:</strong> <?php echo string_limit_words(strip_tags($comment->com_excerpt), 32); ?>...</strong>
                                            </div>
                                </li>
                                    
                                <?php                                 
                                }
								?>
                            </ul>
                    	
                    </div>
                    <?php endif; wp_reset_query();?>

				</div>
			</div>
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['posts'] = $new_instance['posts'];
		$instance['comments'] = $new_instance['comments'];
		$instance['tags'] = $new_instance['tags'];	
		
		$instance['show_popular_posts'] = $new_instance['show_popular_posts'];
		$instance['show_recent_posts'] = $new_instance['show_recent_posts'];
		$instance['show_comments'] = $new_instance['show_comments'];
		$instance['show_tags'] = $new_instance['show_tags'];
		
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('posts' => 3, 'comments' => 3, 'tags' => 3, 'show_popular_posts' => 'on', 'show_recent_posts' => 'on', 'show_comments' => 'on', 'show_tags' =>  'on');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e('Number of popular posts:','Nimva');?></label>
			<input type="text" class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo $instance['posts']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('tags'); ?>"><?php _e('Number of recent posts:','Nimva');?></label>
			<input type="text" class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('tags'); ?>" name="<?php echo $this->get_field_name('tags'); ?>" value="<?php echo $instance['tags']; ?>" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id('comments'); ?>"><?php _e('Number of comments:','Nimva');?></label>
			<input type="text" class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('comments'); ?>" name="<?php echo $this->get_field_name('comments'); ?>" value="<?php echo $instance['comments']; ?>" />
		</p>
        
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_popular_posts'], 'on'); ?> id="<?php echo $this->get_field_id('show_popular_posts'); ?>" name="<?php echo $this->get_field_name('show_popular_posts'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_popular_posts'); ?>"><?php _e('Show popular posts','Nimva');?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_recent_posts'], 'on'); ?> id="<?php echo $this->get_field_id('show_recent_posts'); ?>" name="<?php echo $this->get_field_name('show_recent_posts'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_recent_posts'); ?>"><?php _e('Show recent posts','Nimva');?></label>
		</p>
        <p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_comments'], 'on'); ?> id="<?php echo $this->get_field_id('show_comments'); ?>" name="<?php echo $this->get_field_name('show_comments'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_comments'); ?>"><?php _e('Show comments','Nimva');?></label>
		</p>
	<?php }
}
?>