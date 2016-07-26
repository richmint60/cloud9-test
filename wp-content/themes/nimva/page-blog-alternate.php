<?php // Template Name: Blog Alternate ?>
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
            if(get_post_meta($post->ID, 'pyre_en_sidebar', true) == 'yes'){
                $class = 'postcontent clearfix';
                
                if(get_post_meta($post->ID, 'pyre_sidebar_pos', true) == 'left' && $data['sidebar_position'] != 'Left') {
                    $content_css = 'style="margin-right: 0; float: right; margin-left: 30px;"';
                    $sidebar_css = 'style="float: left; clear: left;"';
                }
                elseif(get_post_meta($post->ID, 'pyre_sidebar_pos', true) == 'right' && $data['sidebar_position'] != 'Right') {
                    $content_css = 'style="margin-left: 0; float: left; margin-right: 30px;"';
                    $sidebar_css = 'style="float: right; clear: right;"';
                }
				$sidebar = true;
            }
            else{
                $class = 'col_full';
				$sidebar = false;
            }
            ?>  
        
        	<div class="<?php echo $class; ?> nobottommargin" <?php echo $content_css; ?>>
            	<div id="posts">
                	<?php
					
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$blog = new WP_Query('showposts='.$data['archive_posts'].'&paged='.$paged);
					
					while($blog->have_posts()): $blog->the_post(); 

						$more = 0;
						
							$img_url = wp_get_attachment_url( get_post_thumbnail_id(),'full' );
							$full_picture = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');							
							/*if($sidebar) {								
								$image = aq_resize( $img_url, 720, 320, true );
								if(!$image) {									
									$image = $full_picture[0];
								}
							}
							else{								
								$image = aq_resize( $img_url, 960, 360, true );
								if(!$image) {									
									$image = $full_picture[0];
								}
							}*/
							
							$icon = 'fa fa-camera';
							
							$i = 2;
                            while($i <= $data['featured_images']):
								$attachment = new StdClass;
                            	$attachment->ID = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
                                if($attachment->ID):
                                	$icon='fa fa-picture-o';									
                                	
									$img_url2 = wp_get_attachment_url( $attachment->ID, 'full' );
									$full_picture2 = wp_get_attachment_image_src( $attachment->ID, 'full' );							
									/*if($sidebar) {								
										$image2 = aq_resize( $img_url2, 720, 320, true );
										if(!$image2) {									
											$image2 = $full_picture2[0];
										}
									}
									else{								
										$image2 = aq_resize( $img_url2, 960, 360, true );
										if(!$image2) {									
											$image2 = $full_picture2[0];
										}
									}
                                     */
									 
									$slides .='<div class="slide"><a href="'.get_permalink().'"><img src="'.$full_picture2[0].'" alt="'.$attachment->post_title .'" /><div class="portfolio-overlay"></div></a></div>';
									?>                                                        
                                    <?php 
                                endif; 
                                $i++; 
                           endwhile; 
						   if(get_post_meta(get_the_ID(), 'pyre_youtube', true) || get_post_meta(get_the_ID(), 'pyre_vimeo', true)) {
							    $icon = 'fa fa-film';
                           }

							?>
                            
							<div class="entry clearfix">
                            	<?php
                                if($data['post_archive_date'] || $data['post_meta_icon']):
                                ?>
                            	<div class="entry_date">
                                	
									<?php
                                    if($data['post_archive_date']):
                                    ?>
                                        <div class="month"><?php echo get_the_date('M'); ?></div>
                                        <div class="day"><?php echo get_the_date('d'); ?></div>
                                        <div class="year"><?php echo get_the_date('Y'); ?></div>
                                    <?php
									endif;
									
									if($data['post_meta_icon']):
									?>    
										<div class="post-icon <?php if(!$data['post_archive_date']) echo 'post-icon-solo-alt'; ?>"><i class="<?php echo $icon; ?>"></i></div>  
                                    <?php
									endif;
									?>
                                                                      
								</div>
								<?php
								endif;
								?>
								
								<div class="entry_c <?php if(!$data['post_archive_date'] && !$data['post_meta_icon']) echo 'entry_c_solo'; ?>">
                                	<div class="entry_image">
                                        <div class="fslider" data-animate="<?php echo $data['bp_anim']; ?>" <?php if($data['bp_anim_auto']) echo 'data-slideshow="true"'; if($data['bp_anim_control']) echo 'data-direction-nav="true"'; ?> data-speed="<?php echo $data['bp_anim_speed']; ?>" data-pause="<?php echo ($data['bp_anim_pause_time']*1000); ?>" <?php if($data['bp_anim_pause']) echo 'data-pause-hover="true"'; ?>>
                                            <div class="flexslider">
                                                <div class="slider-wrap">
                                                    <?php 
                                                    if(get_post_meta(get_the_ID(), 'pyre_youtube', true)) {
                                                        echo '<div class="slide">'.do_shortcode('[youtube id='.get_post_meta(get_the_ID(), 'pyre_youtube', true).']').'</div>';
                                                    }
                                                    if(get_post_meta(get_the_ID(), 'pyre_vimeo', true)) {
                                                        echo '<div class="slide">'.do_shortcode('[vimeo id='.get_post_meta(get_the_ID(), 'pyre_vimeo', true).']').'</div>';
                                                    }                                                
                                                    if(has_post_thumbnail()){	
                                                    ?>
                                                    <div class="slide">
                                                        <a href="<?php the_permalink(); ?>" ><img src="<?php echo $full_picture[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /><div class="portfolio-overlay"></div></a>
                                                    </div>    
                                                    <?php
                                                    }
													echo $slides;
                                                    ?>
                                                </div>        
                                            </div>            
                                        </div>        
                                    </div>
									<div class="entry_title"><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></div>
									<ul class="entry_meta clearfix">  
                                    	<?php
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
										<li><i class="fa fa-comment"></i><?php comments_popup_link('0', '1', '%'); ?></li>    
                                        <?php
										endif;
										?>
									</ul>                                
									<div class="entry_content">
                                    	<?php
										if($data['archive_excerpt_full']=='Post Excerpt') {
                                        	$stripped_content = nv_content( $data['excerpt_length_blog'], $data['strip_html_excerpt'] );
											echo $stripped_content;
										}
										else{
											the_content();
										}
										?>
                                    </div>
                                    <?php
									if($data['post_meta_read']):
									?>
										<p class="nobottommargin" style="margin-top:10px;"><a href="<?php the_permalink(); ?>"><?php _e('Continue reading', 'Nimva'); ?> &rarr;</a></p>
                                    <?php
									endif;
									?>    
								</div>
							</div>
							<?php
						//endif;
						$slides ='';
					endwhile;
					
					?>
                    <?php nv_pagination($blog->max_num_pages, $range = 2); ?>
                </div>
            </div>
            <?php
			if($sidebar){
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
</div>
<?php get_footer(); ?>