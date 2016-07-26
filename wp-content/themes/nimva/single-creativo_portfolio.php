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

	<?php while(have_posts()): the_post(); ?>  
        <div class="content-wrap">
            <div class="container clearfix">
            <?php				
				
				//if the full width column has been selected
				if(get_post_meta($post->ID, 'pyre_width', true) != 'half') {						
								
					//if we dont have sidebar enabled, we need to add extra css
					if(get_post_meta($post->ID, 'pyre_sidebar', true) != 'yes'){
	
						if(get_post_meta($post->ID, 'pyre_portfolio_details_position', true) == 'right') {
							$add_extra_class = 'class="portfolio-single-full portfolio-single-full-left"';
						}
						else{
							$add_extra_class = 'class="portfolio-single-full"';
						}
							
					}
					else{						
						
						if(get_post_meta($post->ID, 'pyre_sidebar_pos', true) == 'left' && $data['sidebar_position'] != 'Left') {
							$content_css = 'style="margin-right: 0; float: right; margin-left: 30px;"';
							$sidebar_css = 'style="float: left; clear: left;"';
						}
						elseif(get_post_meta($post->ID, 'pyre_sidebar_pos', true) == 'right' && $data['sidebar_position'] != 'Right') {
							$content_css = 'style="margin-left: 0; float: left; margin-right: 30px;"';
							$sidebar_css = 'style="float: right; clear: right;"';
						}
						$sidebar = true;
						
						// add extra class for portfolio details position
						if(get_post_meta($post->ID, 'pyre_portfolio_details_position', true) == 'right') {
							$add_extra_class = 'class="portfolio-single-left"';
						}
					?>
						<div class="postcontent clearfix nobottommargin" <?php echo $content_css; ?>>  	
					<?php
					}
					?>
					<div id="portfolio-single-wrap" <?php echo $add_extra_class; ?> >
						<div id="slider" class="fslider" data-animate="<?php echo $data['bp_anim']; ?>" <?php if($data['bp_anim_auto']) echo 'data-slideshow="true"'; if($data['bp_anim_control']) echo 'data-direction-nav="true"'; ?> data-speed="<?php echo $data['bp_anim_speed']; ?>" data-pause="<?php echo ($data['bp_anim_pause_time']*1000); ?>" <?php if($data['bp_anim_pause']) echo 'data-pause-hover="true"'; ?>>
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
									?>
									<?php if(has_post_thumbnail() && ( get_post_meta(get_the_ID(), 'pyre_skip_first', true) !='yes' ) ) : ?>
                                    	
										<?php $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
										<?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
										<?php $attachment_data = wp_get_attachment_metadata(get_post_thumbnail_id()); ?>
                                        <?php $details =  wp_prepare_attachment_for_js (get_post_thumbnail_id());?>
										<div class="slide">
											<a href="<?php echo $full_image[0]; ?>" rel="prettyPhoto[gallery]"> 
												<img src="<?php echo $attachment_image[0]; ?>" alt="<?php echo $details['alt']; ?>" title="<?php echo $details['title'];?>" />
												<div class="portfolio-overlay"></div>
											</a>
										</div>    
									<?php
									endif;
									$i = 2;
									while($i <= $data['featured_images']):
										$attachment = new StdClass();
										$attachment->ID = kd_mfi_get_featured_image_id('featured-image-'.$i, 'creativo_portfolio');
										if($attachment->ID):                                                        
										?>
											<?php $attachment_image = wp_get_attachment_image_src($attachment->ID, 'full'); ?>
											<?php $full_image = wp_get_attachment_image_src($attachment->ID, 'full'); ?>
											<?php $attachment_data = wp_get_attachment_metadata($attachment->ID); ?>
                                            <?php $details =  wp_prepare_attachment_for_js ($attachment->ID);?>
											<div class="slide">	
												<a href="<?php echo $full_image[0]; ?>" rel="prettyPhoto[gallery]">
													<img src="<?php echo $attachment_image[0]; ?>" alt="<?php echo $details['alt']; ?>" title="<?php echo $details['title'];?>" />
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
						<div id="portfolio-details-wrap" class="clearfix">
                        	
							<?php
							if($data['port_details']):
							?>
                                <div class="port-details">
                                    <?php if($data['project_details_text']) { ?><div class="title-outer"><h3><?php echo $data['project_details_text']; ?></h3></div><?php } ?>
                                    <?php if($data['port_date']): ?>
										<div class="port-terms">
											<h5><?php _e("Date", "Nimva");?></h5>
											<span><?php the_date(); ?></span>    
										</div>
                                    <?php endif; ?>    
                                    <!--
                                    <div class="port-terms">
                                        <h5>Categories</h5>
                                        <span><?php echo get_the_term_list($post->ID, 'portfolio_category', '', ', ', ''); ?></span>    
                                    </div>
                                    -->
                                    <?php
                                    if($data['port_client'] && get_post_meta($post->ID, 'pyre_client_name', true)){
                                    ?>
                                    <div class="port-terms">
                                        <h5><?php echo $data['project_client_text'];?></h5>
                                        <span><?php echo get_post_meta($post->ID, 'pyre_client_name', true); ?></span>    
                                    </div>
                                    <?php
                                    }
                                    if($data['port_skills'] && get_post_meta($post->ID, 'pyre_skills', true)){
                                    ?>
                                    <div class="port-terms">
                                        <h5><?php echo $data['project_skills_text'];?></h5>
                                        <span><?php echo get_post_meta($post->ID, 'pyre_skills', true); ?></span>    
                                    </div>
                                    <?php
                                    }
                                    if($data['port_website'] && get_post_meta($post->ID, 'pyre_website_text', true)){
                                    ?>
                                        <div class="port-terms">
                                            <h5><?php echo $data['project_website_text'];?></h5>
                                            <?php 
											if(get_post_meta($post->ID, 'pyre_website_url', true)): ?>
                                            	<span><a href="<?php echo get_post_meta($post->ID, 'pyre_website_url', true); ?>" target="_blank"><?php echo get_post_meta($post->ID, 'pyre_website_text', true); ?></a></span>
                                            <?php 
											else:
											?>
                                            	<span><?php echo get_post_meta($post->ID, 'pyre_website_text', true); ?></span>
                                            <?php
											endif; ?>                                                    
                                        </div>
                                        <?php
                                        if($data['port_button'] && get_post_meta($post->ID, 'pyre_website_url', true)):
                                        ?>
                                        	
                                        <?php
                                        endif;
                                    }
                                    ?>
                                </div>
                            <?php
							endif;
							?>    
                            
							<div class="port-desc <?php if(!$data['port_details']) echo 'port-full'; ?> clearfix">
								<?php if($data['project_description_text']) { ?><div class="title-outer"><h3><?php echo $data['project_description_text']; ?></h3></div><?php } ?>
								<?php the_content(); ?>
							</div>
						</div>
					</div>                    
				<?php
				}
				else{
					if(get_post_meta($post->ID, 'pyre_portfolio_details_position', true) == 'left') {
						$proj_details_pos = 'class="portfolio-single-left"';
					}
					if(!$data['port_details']) {
						$proj_details_pos = 'class="portfolio-single-full-slider"';
					}
				?>
					<div id="portfolio-single-wrap" <?php echo $proj_details_pos; ?>>
                    	<div id="slider" class="fslider" data-animate="<?php echo $data['bp_anim']; ?>" <?php if($data['bp_anim_auto']) echo 'data-slideshow="true"'; if($data['bp_anim_control']) echo 'data-direction-nav="true"'; ?> data-speed="<?php echo $data['bp_anim_speed']; ?>" data-pause="<?php echo ($data['bp_anim_pause_time']*1000); ?>" <?php if($data['bp_anim_pause']) echo 'data-pause-hover="true"'; ?>>
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
									?>
									<?php if(has_post_thumbnail() && ( get_post_meta(get_the_ID(), 'pyre_skip_first', true) !='yes' ) ) : ?>
										<?php $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
										<?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
										<?php $attachment_data = wp_get_attachment_metadata(get_post_thumbnail_id()); ?>
										<div class="slide">
											<a href="<?php echo $full_image[0]; ?>" rel="prettyPhoto[gallery]"> 
												<img src="<?php echo $attachment_image[0]; ?>" alt="<?php echo $attachment->post_title; ?>" />
												<div class="portfolio-overlay"></div>
											</a>
										</div>    
									<?php
									endif;
									$i = 2;
									while($i <= 5):
										$attachment = new StdClass();
										$attachment->ID = kd_mfi_get_featured_image_id('featured-image-'.$i, 'creativo_portfolio');
										if($attachment->ID):                                                        
										?>
											<?php $attachment_image = wp_get_attachment_image_src($attachment->ID, 'full'); ?>
											<?php $full_image = wp_get_attachment_image_src($attachment->ID, 'full'); ?>
											<?php $attachment_data = wp_get_attachment_metadata($attachment->ID); ?>
											<div class="slide">	
												<a href="<?php echo $full_image[0]; ?>" rel="prettyPhoto[gallery]">
													<img src="<?php echo $attachment_image[0]; ?>" alt="<?php echo $attachment->post_title; ?>" />
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
                    	<?php
						if($data['port_details']):
						?>
                            <div id="portfolio-details-wrap">
                            	<div class="port-details  clearfix">
                                    <?php if($data['project_details_text']) { ?><div class="title-outer"><h3><?php echo $data['project_details_text']; ?></h3></div><?php } ?>
                                    <?php if($data['port_date']): ?>
										<div class="port-terms">
											<h5><?php _e("Date", "Nimva");?></h5>
											<span><?php the_date(); ?></span>    
										</div>
                                    <?php endif; ?>                                     
                                    <?php
                                    if($data['port_client'] && get_post_meta($post->ID, 'pyre_client_name', true)){
                                    ?>
                                    <div class="port-terms">
                                        <h5><?php echo $data['project_client_text'];?></h5>
                                        <span><?php echo get_post_meta($post->ID, 'pyre_client_name', true); ?></span>    
                                    </div>
                                    <?php
                                    }
                                    if($data['port_skills'] && get_post_meta($post->ID, 'pyre_skills', true)){
                                    ?>
                                    <div class="port-terms">
                                        <h5><?php echo $data['project_skills_text'];?></h5>
                                        <span><?php echo get_post_meta($post->ID, 'pyre_skills', true); ?></span>    
                                    </div>
                                    <?php
                                    }
                                    if($data['port_website'] && get_post_meta($post->ID, 'pyre_website_text', true)){
                                    ?>
                                        <div class="port-terms">
                                            <h5><?php echo $data['project_website_text'];?></h5>
                                            <?php 
											if(get_post_meta($post->ID, 'pyre_website_url', true)): ?>
                                            	<span><a href="<?php echo get_post_meta($post->ID, 'pyre_website_url', true); ?>" target="_blank"><?php echo get_post_meta($post->ID, 'pyre_website_text', true); ?></a></span>
                                            <?php 
											else:
											?>
                                            	<span><?php echo get_post_meta($post->ID, 'pyre_website_text', true); ?></span>
                                            <?php
											endif; ?>                                                    
                                        </div>
                                        <?php
                                        if($data['port_button'] && get_post_meta($post->ID, 'pyre_website_url', true)):
                                        ?>
                                        	
                                        <?php
                                        endif;
                                    }
                                    ?>
                                </div>    
                            </div>
                            	
						<?php
						endif;
						?>
						
						<div class="clear"></div>
						<div class="port-desc topmargin3 clearfix">
							<?php if($data['project_description_text']) { ?><div class="title-outer"><h3><?php echo $data['project_description_text']; ?></h3></div><?php } ?>
							<?php the_content(); ?>
						</div>
					</div>
					
				<?php
				}
				?>
					<div class="double-line"></div>
                    <?php
					if($data['related_portfolio']) {
					?>
					<div id="portfolio-related">
						<?php if($data['project_related_text']) { ?><div class="title-outer"><h3><?php echo $data['project_related_text']; ?></h3></div><?php } ?>
						<?php $relate = get_related_projects($post->ID,$items); ?>    
						<?php if($relate->have_posts()): ?>                        
							<ul id="portfolio-related-items">
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
										$attachment->ID = kd_mfi_get_featured_image_id('featured-image-'.$i, 'creativo_portfolio');
										if($attachment->ID):
											$icon='fa fa-picture-o';										
										endif; 
										$i++; 
									endwhile;
												
									if(has_post_thumbnail()){										
										$img_url = wp_get_attachment_url( get_post_thumbnail_id(),'full' );
										$image = aq_resize( $img_url, 188, 146, true );
									?>
										<li>
											<img src="<?php echo $image; ?>" />
											<div class="portfolio-overlay"><a href="<?php the_permalink(); ?>"><div class="portfolio-overlay-inside"><span class="<?php echo $icon; ?>"></span></div></a></div>
										</li>
									<?php	
									}
								endwhile;
									?>
							</ul>
							<div id="related-portfolio-prev" class="widget-scroll-prev"><i class="fa fa-chevron-left"></i></div>
							<div id="related-portfolio-next" class="widget-scroll-next"><i class="fa fa-chevron-right"></i></div>
                            
						<?php endif; wp_reset_query(); ?>   
					</div> 
                    <?php
					}
					if((get_post_meta($post->ID, 'pyre_sidebar', true) == 'yes') && (get_post_meta($post->ID, 'pyre_width', true) != 'half')){
					?>
					</div>
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
    <?php endwhile; ?>
<?php get_footer(); ?>