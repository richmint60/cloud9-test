<?php get_header(); ?>		
	<div class="content-wrap">
    	<div class="container clearfix">
        	<div class="postcontent nobottommargin clearfix">
            	<div id="posts">
                	<?php if (have_posts()) : ?>
					<?php while(have_posts()): the_post(); ?> 
					<?php
						$more = 0;
						
						$attachments = get_posts($args);
							
							$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
							$icon = 'fa fa-camera';

							?>
                            
							<div class="entry clearfix">
                            
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
												if(has_post_thumbnail() || get_post_meta(get_the_ID(), 'pyre_youtube', true) || get_post_meta(get_the_ID(), 'pyre_vimeo', true)){ 	
                                                ?>
                                                <div class="slide">
                                                	<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('blog-medium');?><div class="portfolio-overlay"></div></a>
                                                </div>    
                                                <?php
												}
                                                    $i = 2;
                                                    while($i <= $data['featured_images']):
													$attachment = new StdClass();
                                                    $attachment->ID = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
                                                    if($attachment->ID):
                                                        $icon='fa fa-picture-o';
														?>
														<?php $attachment_image = wp_get_attachment_image_src($attachment->ID, 'blog-medium'); ?>
														<?php $full_image = wp_get_attachment_image_src($attachment->ID, 'full'); ?>
														<?php $attachment_data = wp_get_attachment_metadata($attachment->ID); ?>
                                                    	 <div class="slide">	
                                                         	<a href="<?php the_permalink(); ?>">
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
								</div>
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
									<div class="post-icon <?php if(!$data['post_archive_date']) echo 'post-icon-solo'; ?>" ><i class="<?php echo $icon; ?>"></i></div>                                	
									<?php
									endif;
									?>
								</div>
                                <?php
								endif;
								?>
								<div class="entry_c">
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
					
					endwhile;
					
					else:
					?>
                    	<?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'Nimva' ); ?>
                    <?php					
					endif;
					?>
                    <?php nv_pagination($pages = '', $range = 2); ?>
                </div>
            </div>
            <div class="sidebar col_last nobottommargin clearfix">
            	<div class="sidebar-widgets-wrap clearfix">
					<?php
                    if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Blog Sidebar')): 
                    endif;
                    ?> 
                </div>
            </div>
        </div>
    </div>
</div>
 
<?php get_footer(); ?>