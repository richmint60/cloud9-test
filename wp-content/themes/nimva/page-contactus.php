<?php // Template Name: Contact Us ?>
<?php get_header(); global $data;  ?>

                	
        <div id="content">
        
        	<div id="slider">            	
            	              
                	<div class="googlemaps gmap" data-id="google_map_element_contact" data-zoom="<?php echo $data['map_zoom_level'] ?>" address="<?php echo $data['gmap_address'] ?>" data-map="<?php echo $data['gmap_type'] ?>" data-title="<?php echo $data['gmap_title'] ?>" data-message="<?php echo $data['gmap_desc'] ?>" data-email="<?php echo $data['gmap_email']; ?>" data-phone="<?php echo $data['gmap_phone']; ?>" data-popup="true" data-scrollwheel="<?php $scroll = ($data['map_scrollwheel'] == 1) ? 'false' : 'true'; echo $scroll; ?>" data-pan="<?php $pan = ($data['map_zoomcontrol'] == 1) ? 'false' : 'true'; echo $pan; ?>" data-zoom_control="<?php $zoom = ($data['map_zoomcontrol'] == 1) ? 'false' : 'true'; echo $zoom; ?>" data-type_control="<?php $map_type = ($data['map_type_control'] == 1) ? 'false' : 'true'; echo $map_type ; ?>" data-streetview="<?php $street = ($data['map_street'] == 1) ? 'false' : 'true'; echo $street; ?>">
                        <div id="google_map_element_contact" class="google_map_render contact_map">
                        </div>
                    </div>

                
            </div>	
        
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
                
                    <!-- ============================================
                        Page Content Start
                    ============================================= -->
                    
                    <div class="<?php echo $class; ?> nobottommargin" <?php echo $content_css; ?>>
                    
						<?php while(have_posts()): the_post(); ?>                                                                               	                	          	
                                <?php the_content(); ?>                                                
                        <?php endwhile; ?>    
                    
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