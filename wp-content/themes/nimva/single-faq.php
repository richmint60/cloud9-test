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

<div id="content">        
        
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
                
                    <!-- ============================================
                        Page Content Start
                    ============================================= -->
                        <?php while(have_posts()): the_post(); ?>  
                        	
                            <h2>
								<?php if(get_post_meta($post->ID, 'pyre_toggle_icon', true)): ?>
                                	<i class="fa <?php echo get_post_meta($post->ID, 'pyre_toggle_icon', true); ?>"></i> 
								<?php endif; ?>
								<?php the_title(); ?>
                            </h2>              	          	
                            
                            <?php the_content(); ?>
                            
                        <?php endwhile; ?> 
                                    
                    <!-- ============================================
                        Page Content End
                    ============================================= -->
                	
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