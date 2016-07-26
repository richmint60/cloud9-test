<?php // Template Name: Portfolio Rounded Column ?>
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
                    <div id="portfolio" class="clearfix">
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
								
								$target = '';
								$title_link = get_permalink($post->ID);		
								
								$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
								$img_url = wp_get_attachment_url( get_post_thumbnail_id(),'full' );
								$image = aq_resize( $img_url, 230, 230, true );
								
								if(get_post_meta(get_the_ID(), 'pyre_custom_url', true) != '') {									
									$link = $title_link = get_post_meta(get_the_ID(), 'pyre_custom_url', true);
									$target = ( get_post_meta(get_the_ID(), 'pyre_custom_url_target', true) == 'yes' ) ? 'target="_blank"' : '';
								}
													
								?>
                                <div class="portfolio-item keep-size <?php echo $item_classes; ?>">	 
                                	<div class="portfolio-image-round">
                                    	<img src="<?php echo $image ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />                                        
                                        <div class="portfolio-overlay-round">                                            
                                            <div>
                                             	<h3><?php echo get_the_title(); ?></h3>
                                                <h4><?php echo get_the_term_list($post->ID, 'portfolio_category', '', ' &middot; ', '');?></h4>
                                                <p><?php echo string_limit_words(get_the_excerpt(), 10).'...'; ?></p>
                                                <a href="<?php echo $full_image[0]; ?>" rel="prettyPhoto" class="linkage"><i class="fa fa-search"></i></a>
                                                <a href="<?php echo $title_link; ?>" class="linkage" <?php echo $target; ?>><i class="fa fa-link"></i></a>
                                        	</div>                                  
                                        </div>
                                    </div>   								
								</div>	
                        	<?php 
							endif; 
						endwhile; 
						?>
                    </div>
                    <?php nv_pagination($gallery->max_num_pages, $range = 2); ?>
                </div>
                
 			</div>
<?php get_footer(); ?>