<?php get_header(); ?>

		<div id="content">        
        
            <div class="content-wrap">            
            
                <div class="container clearfix">
                	
                    <div class="postcontent clearfix nobottommargin">
                
                    <!-- ============================================
                        Page Content Start
                    ============================================= -->                        
						
                        
                        <div id="faqs" class="clearfix">                        
                        
							<?php
                            while(have_posts()): the_post();                                
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
                            
                            	<?php															 
							endwhile; 
							?>
                        
                        </div>
                        
                                    
                    <!-- ============================================
                        Page Content End
                    ============================================= -->
                	
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