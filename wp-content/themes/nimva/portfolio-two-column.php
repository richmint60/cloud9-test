<?php // Template Name: Portfolio Two Column ?>
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
						if(get_post_meta($post->ID, 'pyre_sidebar_pos', true) == 'left' && $data['sidebar_position'] != 'Left') {
							$content_css = 'style="margin-right: 0; float: right; margin-left: 30px;"';
							$sidebar_css = 'style="float: left; clear: left;"';
						}
						elseif(get_post_meta($post->ID, 'pyre_sidebar_pos', true) == 'right' && $data['sidebar_position'] != 'Right') {
							$content_css = 'style="margin-left: 0; float: left; margin-right: 30px;"';
							$sidebar_css = 'style="float: right; clear: right;"';
						}                    
                    ?>
                	<div class="postcontent columns nobottommargin clearfix" <?php echo $content_css; ?>>
                    <?php
					}
					?> 
                    	<!-- ============================================
                            Page Content Start
                        ============================================= -->
                        <?php while(have_posts()): the_post(); ?>                	          	
                        	<?php the_content(); ?>
                        <?php endwhile; ?> 
                                        
                        <!-- ============================================
                            Page Content End
                        ============================================= -->
						<?php
						$p_id = $post->ID;
                        if(!get_post_meta(get_the_ID(), 'pyre_portfolio_category', true)):
                        $portfolio_category = get_terms('portfolio_category');
                        if($portfolio_category):
                        ?>                    
                        <ul id="portfolio-filter" class="clearfix">
                            <li class="activeFilter"><a data-filter="*" href="#"><?php _e('All', 'Nimva'); ?></a></li>
                            <?php foreach($portfolio_category as $portfolio_cat): ?>
                            <li><a data-filter=".<?php echo $portfolio_cat->slug; ?>" href="#"><?php echo $portfolio_cat->name; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                        <?php endif; ?>
                        <div id="portfolio" class="portfolio-2 clearfix">
                            <?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = array(
                                'post_type' => 'creativo_portfolio',
                                'paged' => $paged,
                                'posts_per_page' => $data['port_items'],
                            );
                            if(get_post_meta(get_the_ID(), 'pyre_portfolio_category', true)){
                                $args['tax_query'][] = array(
                                    'taxonomy' => 'portfolio_category',
                                    'field' => 'ID',
                                    'terms' => get_post_meta(get_the_ID(), 'pyre_portfolio_category', true)
                                );
                            }
                            $gallery = new WP_Query($args);
                            
                            while($gallery->have_posts()): $gallery->the_post();
                                if(has_post_thumbnail() || get_post_meta($post->ID, 'pyre_youtube', true) || get_post_meta($post->ID, 'pyre_vimeo', true)):
                                    ?>
                                    <?php
                                    $item_classes = '';
                                    $item_cats = get_the_terms($post->ID, 'portfolio_category');
                                    $portf_cat = wp_get_object_terms($post->ID, 'portfolio_category');
                                    if($item_cats):
                                    foreach($item_cats as $item_cat) {
                                        $item_classes .= $item_cat->slug . ' ';
                                    }
                                    endif;
                                    
                                    $icon = 'fa fa-camera';
                                    $full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                                    $img_url = wp_get_attachment_url( get_post_thumbnail_id(),'full' );
									$image = aq_resize( $img_url, 470, 320, true );
									
                                    $link = $full_image[0];
                                    $rel = 'prettyPhoto['.$post->ID.']';
                                    $hidden_link='';
									
									$target = '';
									$title_link = get_permalink($post->ID);
                                    
                                    $i = 2;
                                    while($i <= $data['featured_images']):
										$attachment = new StdClass();
                                        $attachment->ID = kd_mfi_get_featured_image_id('featured-image-'.$i, 'creativo_portfolio');
                                        if($attachment->ID):
                                            $icon = 'fa fa-picture-o';	
                                            $full_image = wp_get_attachment_image_src($attachment->ID, 'full');
                                            $hidden_link .= '<a class="hidden" href="'.$full_image[0].'" rel="prettyPhoto['.$post->ID.']"></a>';									
                                        endif; 
                                        $i++; 
                                    endwhile;
                                    if(get_post_meta(get_the_ID(), 'pyre_youtube', true)) {
                                        $icon = 'fa fa-film';
                                        $link = 'http://www.youtube.com/watch?v='.get_post_meta(get_the_ID(), 'pyre_youtube', true);
                                        $rel = 'prettyPhoto[movie]';
                                    }
                                    if(get_post_meta(get_the_ID(), 'pyre_vimeo', true)) {
                                        $icon = 'fa fa-film';
                                        $link = 'http://vimeo.com/'.get_post_meta(get_the_ID(), 'pyre_vimeo', true);
                                        $rel = 'prettyPhoto[movie]';
                                    }
                                    if($data['portfolio_link']=='Portfolio Post'){
										$link = get_permalink($post->ID);
										$hidden_link = '';
										$rel = '';
									}
									
									if(get_post_meta(get_the_ID(), 'pyre_custom_url', true) != '') {
										$hidden_link = '';
										$rel = '';
										$link = $title_link = get_post_meta(get_the_ID(), 'pyre_custom_url', true);
										$target = ( get_post_meta(get_the_ID(), 'pyre_custom_url_target', true) == 'yes' ) ? 'target="_blank"' : '';
									}
									                   
                                    ?>
                                    <div class="portfolio-item  <?php echo $item_classes; ?>">	 
                                        <div class="portfolio-image">
                                            <img src="<?php echo $image ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                            <div class="portfolio-overlay">
                                                <a href="<?php echo $link; ?>" rel="<?php echo $rel; ?>" <?php echo $target; ?>>
                                                    <div class="portfolio-overlay-inside">
                                                        <span class="<?php echo $icon; ?>"></span>
                                                    </div>
                                                </a><?php echo $hidden_link; ?>
                                            </div>
                                        </div>
                                        <?php
										
										if ( ( $data['portfolio_details'] && (get_post_meta($p_id, 'pyre_portfolio_details', true)!='no') ) || (!$data['portfolio_details'] && (get_post_meta($p_id, 'pyre_portfolio_details', true)=='yes')) ) {
										?>
                                            <div class="portfolio-title">
                                                <h3 title="<?php echo get_the_title(); ?>"><a href="<?php echo $title_link; ?>" <?php echo $target; ?>><?php echo get_the_title(); ?></a></h3>
                                                <div class="portfolio_tags"><?php echo get_the_term_list($post->ID, 'portfolio_category', '', ' &middot; ', '');?></div>
                                            </div>    								
                                        <?php
                                        }
                                        ?>    								
                                    </div>	
                                <?php 
                                endif; 
                            endwhile; 
                            ?>
                        </div>
                        <?php nv_pagination($gallery->max_num_pages, $range = 2); ?>
                	<?php
					wp_reset_query();
                    if(get_post_meta($post->ID, 'pyre_en_sidebar', true) == 'yes'){ 				
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
<?php get_footer(); ?>