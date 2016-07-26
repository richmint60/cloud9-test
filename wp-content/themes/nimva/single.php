<?php get_header(); ?>  

<?php 
if(get_post_meta($post->ID, 'pyre_slider_layer', true) != 0) { 
?>  
    <div id="slider-output">
    	<?php echo do_shortcode('[layerslider id="'.get_post_meta($post->ID, 'pyre_slider_layer', true).'"]'); ?>
    </div>
<?php 
}
?>

<div class="content-wrap">

	<div class="container clearfix">

	<?php
	if(get_post_meta($post->ID, 'pyre_en_sidebar', true) != 'no'){
		$class = 'postcontent single_post clearfix';
		
		if(get_post_meta($post->ID, 'pyre_sidebar_pos', true) == 'left' && $data['sidebar_position'] != 'Left') {
			$content_css = 'style="margin-right: 0; float: right; margin-left: 30px;"';
			$sidebar_css = 'style="float: left; clear: left;"';
		}
		elseif(get_post_meta($post->ID, 'pyre_sidebar_pos', true) == 'right' && $data['sidebar_position'] != 'Right') {
			$content_css = 'style="margin-left: 0; float: left; margin-right: 30px;"';
			$sidebar_css = 'style="float: right; clear: right;"';
		}
	}
	else{
		$class = 'col_full';
	}
	?>    
    
    	<div class="<?php echo $class; ?> nobottommargin" <?php echo $content_css; ?>>
         
        <?php				
		if(have_posts()): the_post();
			global $data;	
		?>
			<div id="post-<?php the_ID(); ?>" class="entry post-single clearfix">
				
                <?php if($data['featured_images_single']): ?>
                	<?php if(has_post_thumbnail() || get_post_meta(get_the_ID(), 'pyre_youtube', true) || get_post_meta(get_the_ID(), 'pyre_vimeo', true)){ ?>
                    <div class="entry_image">                    
                        <div class="fslider" data-animate="<?php echo $data['bp_anim']; ?>" <?php if($data['bp_anim_auto']) echo 'data-slideshow="true"'; if($data['bp_anim_control']) echo 'data-direction-nav="true"'; ?> data-speed="<?php echo $data['bp_anim_speed']; ?>" data-pause="<?php echo ($data['bp_anim_pause_time']*1000); ?>" <?php if($data['bp_anim_pause']) echo 'data-pause-hover="true"'; ?>>
                        
                            <div class="flexslider">
                            
                                <div class="slider-wrap">
                                
                                    <?php 
                                    if(get_post_meta(get_the_ID(), 'pyre_youtube', true)) {
                                        echo '<div class="slide">'.do_shortcode('[youtube id='.get_post_meta(get_the_ID(), 'pyre_youtube', true).']').'</div>';
                                        $icon = 'fa fa-film';
                                    }
                                    if(get_post_meta(get_the_ID(), 'pyre_vimeo', true)) {
                                         echo '<div class="slide">'.do_shortcode('[vimeo id='.get_post_meta(get_the_ID(), 'pyre_vimeo', true).']').'</div>';
                                         $icon = 'fa fa-film';
                                    }                                                
                                    if(has_post_thumbnail() && get_post_meta($post->ID, 'pyre_skip_first', true) != 'yes'){	
                                    ?>
                                   
										<?php									
                                        $full_picture = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');				
                                        ?>
                                        
                                        <div class="slide">
                                            <a href="<?php echo $full_picture[0]; ?>" rel="prettyPhoto[gallery]">
                                                <img src="<?php echo $full_picture[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                                <div class="portfolio-overlay"></div>
                                            </a>                                    
                                        </div>
                                        
                                    <?php
                                    }
                                    
                                    $i = 2;
                                    while($i <= $data['featured_images']):
										$attachment = new StdClass;
                                        $attachment->ID = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
                                        if($attachment->ID):
                                        $icon='fa fa-picture-o';
                                            ?>
                                            
                                            <?php 											
											$full_picture = wp_get_attachment_image_src( $attachment->ID, 'full' );						
											
											?>
                                            
                                            <div class="slide">	
                                                <a href="<?php echo $full_picture[0] ?>" rel="prettyPhoto[gallery]">
                                                	<img src="<?php echo $full_picture[0]; ?>" alt="<?php echo $attachment->post_title; ?>" />
                                                    <div class="portfolio-overlay"></div>
                                                </a>
                                                
                                            </div>                                                        
                                            <?php 
                                        endif; 
                                        $i++; 
                                    endwhile; ?>
                                                                
                                </div>
                            
                            </div>
                        
                        </div>
                    
                    </div>
				<?php
					}
				endif;
				 
				if($data['blog_post_title']):
					if(get_post_meta($post->ID, 'pyre_show_title', true) == 'yes'):
				?>
                   		<div class="entry_title"><h2><?php the_title(); ?></h2></div>   
                <?php 
					endif;
				endif;
					
				if($data['post_meta_date'] || $data['post_meta_author'] || $data['post_meta_cats'] || $data['post_meta_comments']):
					?>             
                    <ul class="entry_meta clearfix">
                    	<?php
						if($data['post_meta_date']):
						?> 
                    		<li><i class="fa fa-calendar"></i><?php the_time( get_option('date_format') ); ?><span>|</span></li>                 
                        <?php
						endif;
						if($data['post_meta_author']):
						?>    
                        	<li><i class="fa fa-user"></i><?php the_author_posts_link(); ?><span>|</span></li>
                        <?php						
						endif;
						if($data['post_meta_cats']):
						?> 
                        	<li><i class="fa fa-bookmark"></i><?php the_category(', '); ?><span>|</span></li>
                        <?php
						endif;
						if($data['post_meta_comments']):
						?> 
                        	<li><i class="fa fa-comment"></i><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></li> 
                        <?php
						endif;
						?>                    
                    </ul>
                 <?php
				endif;
				?>
                    
                <div class="entry_content">
                	<?php the_content(); ?>
                        
					<?php
					if($data['post_meta_tags']):
					?>
                    	<div class="tagcloud clearfix">
                        	<?php the_tags('',''); ?>                       
                        </div>
                    <?php
					endif;
					?>
                        
                    <?php
					if($data['social_sharing_box']):
					
						if($data['social_icons_shape']=='Round'){
							$shape = 'round';
						}
						else{
							$shape = 'square';
						}
					?>
                    	<div class="entry_share clearfix">
                                    
                                <span><?php echo __('SHARE IT:','Nimva'); ?></span>
                                                
                                <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>" class="ntip" title="Share on Facebook"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/social/post/facebook-<?php echo $shape; ?>.png" alt="<?php __('Facebook','Nimva'); ?>" /></a>
                                
                                <a href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>" class="ntip" title="Tweet on Twitter"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/social/post/twitter-<?php echo $shape; ?>.png" alt="<?php __('Twitter','Nimva'); ?>" /></a>
                                
                                <?php $full_image_share = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
                                <a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&amp;description=<?php echo urlencode($post->post_title); ?>&amp;media=<?php echo urlencode($full_image_share[0]); ?>" class="ntip" title="Pin on Pinterest"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/social/post/pinterest-<?php echo $shape; ?>.png" alt="<?php __('Pinterest','Nimva'); ?>" /></a>
                                
                                <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="ntip" title="Share on Google Plus"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/social/post/googleplus-<?php echo $shape; ?>.png" alt="<?php __('Google Plus','Nimva'); ?>" /></a>
  
                                <a href="http://www.stumbleupon.com/badge/?url=<?php the_permalink(); ?>" class="ntip" title="Share on StumbleUpon"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/social/post/stumbleupon-<?php echo $shape; ?>.png" alt="<?php __('StumbleUpon','Nimva'); ?>" /></a>
                                
                                <a href="http://reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" class="ntip" title="Share on Reddit"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/social/post/reddit-<?php echo $shape; ?>.png" alt="<?php __('Reddit','Nimva'); ?>" /></a>
                                
                                <a href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>" class="ntip" title="Email this Post"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/social/post/email-<?php echo $shape; ?>.png" alt="<?php __('Email','Nimva'); ?>" /></a>
                                            
                            </div>
                    <?php
					endif;
					?>
                       
                    </div>

                
                
                
            </div>
            
            <div class="clear"></div>
            
            <?php
			if($data['related_posts']):
			?>   
            <div style="position: relative;">
               
            	<div class="title-outer"><h3><?php echo __('Related Posts','Nimva'); ?></h3></div>
                
                <?php $relate = get_related_posts($post->ID,$data['related_posts_number']); ?>

                <?php if($relate->have_posts()): ?>
                
                    <ul id="<?php if(get_post_meta($post->ID, 'pyre_en_sidebar', true) == 'yes') echo 'related-posts-scroller' ; else echo 'related-posts-scroller-wide' ; ?>" class="related-posts clearfix">
                        <?php
                        while($relate->have_posts()): $relate->the_post();
								$icon = 'fa fa-camera';
							 
                                if(get_post_meta(get_the_ID(), 'pyre_youtube', true)) {
									$icon = 'fa fa-film';
                                }
                                if(get_post_meta(get_the_ID(), 'pyre_vimeo', true)) {
									 $icon = 'fa fa-film';
                                }
								$i = 2;
                                while($i <= 5):
									$attachment = new StdClass();
                                	$attachment->ID = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
                                	if($attachment->ID):
                                	$icon='fa fa-picture-o';										
									endif; 
									$i++; 
								endwhile;
									
                            if(has_post_thumbnail()){
								$img_url = wp_get_attachment_url( get_post_thumbnail_id(),'full' );
								$image = aq_resize( $img_url, 470, 320, true );
                                ?>
                                <li>
                                    <div class="rpost-image">
                                    	<a href="<?php the_permalink(); ?>" >
											<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                            <div class="post-overlay <?php echo $icon; ?>"></div>
                                            <div class="portfolio-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="rpost-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                </li>
                                <?php	
                            }
                        endwhile;
                        ?>
                    </ul>
                
                <?php endif; wp_reset_query(); ?>
                <div class="widget-scroll-prev" id="relatedposts_prev"><i class="fa fa-chevron-left"></i></div>
                <div class="widget-scroll-next" id="relatedposts_next"><i class="fa fa-chevron-right"></i></div>

            </div> 
            <?php
			endif;
			?>     		
            
			                        
            <div class="clear"></div>  
            
            <?php
			if($data['blog_comments']):
			?>
                <div id="comments" class="clearfix">
                    <?php comments_template('', true); ?>
                </div>
            <?php
			endif;
			?>
        <?php
		endif;
		?>    
        	  
        </div>
        <?php
		if(get_post_meta($post->ID, 'pyre_en_sidebar', true) != 'no'){
		?>
        	<div class="sidebar col_last nobottommargin clearfix" <?php echo $sidebar_css; ?>>
            	<div class="sidebar-widgets-wrap clearfix">
					<?php
                    if ( !function_exists( 'generated_dynamic_sidebar' ) || !generated_dynamic_sidebar() ): 
                    endif;
					?> 
                </div>
            </div>
        <?php
		}
		?>
    </div>

</div>
	
	
<?php get_footer(); ?>