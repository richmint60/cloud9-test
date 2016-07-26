<?php get_header(); ?>
<?php
$option = 0;
switch ($option){
	case 2:
		$class = 'portfolio-2';
		$item = 'portfolio-two';
		break;
	case 3:
		$class = 'portfolio-3';
		$item = 'portfolio-three';
		break;		
	default:
		$class = 'portfolio-4';
		$item = 'portfolio-four';	
		
}
?>
			<div class="content-wrap"> 
                <div class="container clearfix">                    
                    <div id="portfolio" class="<?php echo $class; ?> clearfix">
                        <?php
						while(have_posts()): the_post();
							if(has_post_thumbnail()):
						?>
								<?php
                                $item_classes = '';
                                $item_cats = get_the_terms($post->ID, 'portfolio_category');
                                if($item_cats):
									foreach($item_cats as $item_cat) {
										$item_classes .= $item_cat->slug . ' ';
									}
                                endif;
								$icon = 'fa fa-camera';
								$full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
								$link = $full_image[0];
								$rel = 'prettyPhoto['.$post->ID.']';
								$hidden_link='';
								
								$target = '';
								$title_link = get_permalink($post->ID);
								
								$i = 2;
								while($i <= 5):
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
                                    	<?php echo get_the_post_thumbnail($post->ID, $item);?>
                                        <div class="portfolio-overlay">
                                        	<a href="<?php echo $link; ?>" rel="<?php echo $rel; ?>">
                                            	<div class="portfolio-overlay-inside">
                                                	<span class="<?php echo $icon; ?>"></span>
                                                </div>
                                            </a><?php echo $hidden_link; ?>
                                        </div>
                                    </div>
                                    <div class="portfolio-title">
                                    	<h3 title="<?php echo get_the_title(); ?>"><a href="<?php echo $title_link; ?>"><?php echo get_the_title(); ?></a></h3>
                                        <div class="portfolio_tags"><?php echo get_the_term_list($post->ID, 'portfolio_category', '', ' &middot; ', '');?></div>
                                    </div>    								
								</div>
						<?php 
							endif; 
						endwhile; 
						?>						
                    </div>
                    <?php nv_pagination($pages = '', $range = 2); ?>
                </div>
 			</div>
<?php get_footer(); ?>