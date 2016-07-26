<?php // Template Name: FAQs ?>
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
                	<div class="faqs_wrap" data-name="17">
                    <!-- ============================================
                        Page Content Start
                    ============================================= -->
                        <?php while(have_posts()): the_post(); ?>                	          	
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                        
                        <?php
						if(!get_post_meta(get_the_ID(), 'pyre_faq_category', true)):
							$portfolio_category = get_terms('faq_category');
							if($portfolio_category):
							?> 
								<ul id="faq-filter17" class="clearfix">
									
									<li class="activeFilter">
										<a data-filter="all17" href="#"><?php echo __('All', 'Nimva'); ?></a>
									</li>
									
									<?php foreach($portfolio_category as $portfolio_cat): ?>
									<li>
										<a href="#" data-filter=".faq-<?php echo $portfolio_cat->slug; ?>" ><?php echo $portfolio_cat->name; ?></a>
									</li>
									<?php endforeach; ?>
									
								</ul>
						<?php 
							endif; 
						endif;
						?>
                        
                        <div id="faqs17" class="clearfix">
                        
                        	<?php
							$args = array(
								'post_type' => 'faq',
								'nopaging' => true
							);
							if(get_post_meta(get_the_ID(), 'pyre_faq_category', true)){
                                $args['tax_query'][] = array(
                                    'taxonomy' => 'faq_category',
                                    'field' => 'ID',
                                    'terms' => get_post_meta(get_the_ID(), 'pyre_faq_category', true)
                                );
                            }
							$gallery = new WP_Query($args);
							while($gallery->have_posts()): $gallery->the_post();
							?>
                            
								<?php
                                $item_classes = '';
                                $item_cats = get_the_terms($post->ID, 'faq_category');
								
                                if($item_cats):
									foreach($item_cats as $item_cat) {
										$item_classes .= 'faq-'.$item_cat->slug . ' ';
									}
                                endif;
                                ?>
                                
                                <?php
                                $icon = '';
                                $add_class = '';
                                
                                if(get_post_meta($post->ID, 'pyre_toggle_icon', true) != ''):
                                    $icon = '<i class="fa '.get_post_meta($post->ID, 'pyre_toggle_icon', true).'"></i>';
                                    $add_class = 'faq';
                                endif;
                                ?>
                            
                                <div class="toggle <?php echo $add_class; ?> <?php echo $item_classes; ?> clearfix">
                                
                                    <div class="togglet"><?php echo $icon; ?><?php the_title(); ?></div>
                                    
                                    <div class="togglec clearfix">
                                        
                                        <?php the_content(); ?>                      
                                    
                                    </div>
                                
                                </div>
                            
                            <?php endwhile; ?>
                        
                        </div>
                        
                                    
                    <!-- ============================================
                        Page Content End
                    ============================================= -->
                	</div>
                    </div>
                    
                    <?php
					if($sidebar){
					?>
                        <div class="sidebar col_last nobottommargin clearfix">
    
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