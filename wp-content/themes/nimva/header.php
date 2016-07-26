<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title><?php bloginfo('name'); ?> <?php wp_title(' - ', true, 'left'); ?></title>
<!--[if lte IE 8]>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/html5shiv.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<?php global $data, $woocommerce; ?>
<?php if($data['favicon']): ?>
	<link rel="shortcut icon" href="<?php echo $data['favicon']; ?>" type="image/x-icon" />
<?php endif; ?>
   
	<?php 
	if($data['responsive']){ 
		$responsive = 'true';
	?>      
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        
	<?php 
	} 
	else{
		$responsive = 'false';
	}
	?>
<?php wp_head(); ?> 

<style type="text/css">  
	<?php
		ob_start();
		include_once get_template_directory() . '/css/additional_styles.php';
		$dynamic_css = ob_get_contents();
		ob_get_clean();
		echo less_css($dynamic_css);
	?>

</style>

<?php /* if(is_page_template('page-contact.php') && $data['gmap_address']) { 
}
*/
?>

<?php echo $data['head_code']; ?>

<?php echo $data['tracking_code']; ?>
 <style type="text/css" id="ss">
</style>	
<link rel="stylesheet" type="text/css" id="skins">
</head>

<body <?php body_class($bclass); ?> data-responsive="<?php echo $responsive; ?>" data-layout="<?php echo strtolower($data['site_layout']); ?>" data-layout-width="<?php echo $data['layout_width']; ?>">
	<?php if($data['video_bg_en'] && ( get_post_meta ( $post->ID, 'pyre_en_video_bg', true ) != 'yes' ) ) { ?>
		

            <div id="P2" class="player video-container" data-property="{videoURL:'<?php echo $data['ytb_id']; ?>',containment:'body',autoPlay:true, showControls:false, mute:true, startAt:0, opacity: <?php echo ($data['video_opacity']/100); ?>, quality:'<?php echo $data['video_quality']; ?>'}"></div>
            <!-- End Video -->
            
			<?php 
			if(($data['video_overlay'] !='') || ($data['video_overlay_bg'] != $none_img)) { ?>
			
            	<div class="video_overlay video_bg"></div>    
                	
            <?php 
			} 
			?>
            
    <?php } ?>  
    
    <?php
	if(get_post_meta ( $post->ID, 'pyre_en_video_bg', true ) == 'yes' && get_post_meta ( $post->ID, 'pyre_youtube_id', true ) != '') {
		$video_id = get_post_meta ( $post->ID, 'pyre_youtube_id', true );
		$video_opacity = (get_post_meta ( $post->ID, 'pyre_video_opacity', true ) !='') ? get_post_meta ( $post->ID, 'pyre_video_opacity', true ) : 100 ;
	?>
    
    	<div id="P2" class="player video-container" data-property="{videoURL:'<?php echo $video_id; ?>',containment:'body',autoPlay:true, showControls:false, mute:true, startAt:0, opacity: <?php echo ($video_opacity/100); ?>, quality:'default'}"></div>
    
    <?php
		if(get_post_meta ( $post->ID, 'pyre_video_bg_overlay', true )!='0' || get_post_meta ( $post->ID, 'pyre_video_bg_overlay_color', true ) != '') {
			$video_overlay_bg = (get_post_meta ( $post->ID, 'pyre_video_bg_overlay', true )!='0' ) ? 'background-image: url('. get_template_directory_uri().'/images/overlay/'.get_post_meta ( $post->ID, 'pyre_video_bg_overlay', true).');'  : '';
			$video_overlay_op = (get_post_meta ( $post->ID, 'pyre_video_overlay_opacity', true ) != '') ? get_post_meta ( $post->ID, 'pyre_video_overlay_opacity', true ) : 100;
			$video_overlay_color = (get_post_meta ( $post->ID, 'pyre_video_bg_overlay_color', true ) != '') ? 'background-color: '.get_post_meta ( $post->ID, 'pyre_video_bg_overlay_color', true ).';' : '';
		?>
         	<div class="video_overlay video_bg" style=" <?php echo $video_overlay_bg . $video_overlay_color; ?> opacity: <?php echo ( $video_overlay_op/100 ); ?>; filter: alpha(opacity=<?php echo ($video_overlay_op/100); ?>);"></div> 
        <?php
		}
	}
	?>
      
    <div id="wrapper" class="clearfix">
    	
    <?php if(!is_page_template('page-blank.php')): ?>
    <!-- ============================================
            Top Bar
        ============================================= -->
        <?php if ( (( $data['header_left_content'] !='Leave Empty' ) ||  ( $data['header_right_content'] != 'Leave Empty' )) && ( get_post_meta($post->ID, 'pyre_top_bar', true) != 'no' ) ){ ?>
        <div id="top-bar">
            
            <div class="container clearfix">            	
        
                <?php
				if($data['header_left_content'] !='Leave Empty'){
				?>
                    <div class="leftalign">
                        <?php	 
                        if($data['header_left_content'] =='Contact Info') { 
                            get_template_part('functions/template/contact-info');
                        } 
                        elseif ($data['header_left_content'] =='Social Links') {
                            get_template_part('functions/template/social-links');
                        }
						elseif ($data['header_left_content'] =='Top Menu') {
                            get_template_part('functions/template/top-menu');
                        }
                        ?>
                    </div>    
                <?php    
				}
				?>           
                
                <?php if ( $data['header_right_content'] != 'Leave Empty' ) { ?>
                	<div class="rightalign">
                        <?php	 
                        if($data['header_right_content'] =='Contact Info') { 
                            get_template_part('functions/template/contact-info');
                        } 
                        elseif ($data['header_right_content'] =='Social Links') {
                            get_template_part('functions/template/social-links');
                        }
						elseif ($data['header_right_content'] =='Top Menu') {
                            get_template_part('functions/template/top-menu');
                        }
                        ?>
                    </div>
                <?php } ?>
            
            </div>
        
        </div>  
        
        <?php
		
		}
		
		?>
        
        <!-- ============================================
            Header
        ============================================= -->
        	
        
        <div id="header" <?php if($data['shadow_header']) echo 'class="shadow";'; ?>>

            <?php 
			$header_layout = (get_post_meta($post->ID, 'pyre_header_version', true) != NULL) ? get_post_meta($post->ID, 'pyre_header_version', true) : $data['header_layout'] ;
			if( $header_layout == 'default' ) $header_layout = $data['header_layout'];
			
			
			if($header_layout=='v1') { 
				get_template_part('functions/template/header-v1');		
			}
			elseif($header_layout=='v2') {
				get_template_part('functions/template/header-v2');
			}
			else{
				get_template_part('functions/template/header-v3');
			}
			
			
			?> 
             
        </div>
       
        <?php
		if($data['floating_header']):
		?>
            <header id="header" class="sticky-header <?php echo $data['header_layout']; if($data['floating_header']) echo ' shadow'; ?>" style="display:none;" header-version="<?php echo $data['header_layout']; ?>">
                <?php 
                if($header_layout=='v1') { 
                    get_template_part('functions/template/header-v1');		
                }
                elseif($header_layout=='v2') {
                    get_template_part('functions/template/header-v2');
                }
                else{
                    get_template_part('functions/template/header-v3');
                }
                ?>
            </header>
        <?php
		endif;
		?>
        <?php $mob_menu_extra_class = (is_page_template ( 'page-one-full.php') ) ? 'class="one-page-template"' : ''; ?>
        <div id="mobile-menu" <?php echo $mob_menu_extra_class; ?>>
	
            <div class="container">
                <ul>
                    <?php
					
					if ( is_page_template ( 'page-one-full.php' ) ) {
						wp_nav_menu(array('walker' => new MenuWalker, 'theme_location' => 'one-page-nav', 'container' => false, 'items_wrap' => '%3$s', 'menu_class' => 'sf-menu', 'fallback_cb' =>'MenuWalker::fallback', 'walker' => new MenuWalker() ) );
					}
					else{
                        if(has_nav_menu('primary-menu')) {
                            
                            wp_nav_menu( array('theme_location' => 'primary-menu', 'menu' => 'Top Navigation Menu', 'container' => '', 'items_wrap' => '%3$s' ) ); 
                            
                        }
                        else {
                            echo '<li><a href="">No menu assigned!</a></li>';
                        }
						if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
							if($data['woocommerce_item']) {
								?>
                                <li>
                                	<?php if(!$woocommerce->cart->cart_contents_count): ?>
                                        <a class="shopping-cart" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i></a>
                                    <?php else: ?>
                                        <a class="shopping-cart actives" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i></a>
                                        <ul>
                                        	<li></li>
                                        </ul>
                                    <?php endif; ?>    
                                </li>
                                <?php
							}
							
						}
					}
                    ?>		
                </ul>
            </div>
            
        </div>
        
        <div id="content">
        
        
		<?php 
		if($data['en_title_breadcrumb']){	
			
			if( is_page() && !is_front_page() && !is_singular('creativo_portfolio') && get_post_meta($post->ID, 'pyre_page_title', true)!='hide'): ?>
            
            <div id="page-title">
            
                <div class="page_title_inner">
                
                    <div class="container clearfix">
                    
                        <h1><?php the_title(); ?></h1>
                        
                        <?php 
						if($data['en_breadcrumb']){
							nimva_breadcrumb();               						
						}
						?>
                        
                        <?php if ($data['title_breadcrumb_right_side'] != 'Leave Empty'): ?>
							<div class="searchtop-meta">								
								<?php 
								if($data['title_breadcrumb_right_side'] == 'Social Links') get_template_part('functions/template/social-links'); 
								elseif($data['title_breadcrumb_right_side'] == 'Search Box') get_search_form();
								else get_template_part('functions/template/contact-info'); 								
								?>								
							</div>
                        <?php endif; ?>    
                        
                    </div>
                    
                </div>  
                  
            </div>
            
            <?php endif; 
			
			$spb = false;		
			if(class_exists('Woocommerce') && is_product() ) $spb = true;
			
			if ( (is_single() || is_singular('creativo_portfolio') ) && get_post_meta($post->ID, 'pyre_page_title', true)!='hide' && !$spb ) :				
				?>
            	<div id="page-title">            
                    <div class="page_title_inner">                    
                        <div class="container clearfix">                        
                            <h1><?php the_title(); ?></h1>                            
                            <?php 
							if($data['en_breadcrumb']){
								nimva_breadcrumb();               						
							}
							?>                            
                            <?php if($data['blog_pn_nav']) { ?>
								<div id="portfolio-navigation" class="clearfix">
                                    <div class="port-nav-next">                        	
                                        <?php next_post_link('%link', '<i class="fa fa-angle-left"></i>'); ?>
                                    </div>
                                    <div class="port-nav-prev">    
                                        <?php previous_post_link('%link', '<i class="fa fa-angle-right"></i>'); ?>
                                    </div>    
                                </div>							 
                            <?php } ?>
                        </div>                        
                    </div>                        
                </div>				
            <?php				
			endif;
			
			if( ( class_exists( 'Woocommerce' ) && is_woocommerce()  ) || ( is_tax( 'product_cat' ) ||  is_tax( 'product_tag' ) ) ) {
			?>
            	<div id="page-title">
            
                	<div class="page_title_inner">
                    
                        <div class="container clearfix">
                        
                            <h1>
								<?php 
								if(!is_product()) woocommerce_page_title(true);
								else the_title();
								?>
                            </h1>
							<?php
                            woocommerce_breadcrumb(array(
                                'wrap_before' => '<ul class="breadcrumbs">',
                                'wrap_after' => '</ul>',
                                'before' => '<li>',
                                'after' => '</li>',
                                'delimiter' => '',
                                'home'        => _x( '<i class="fa fa-home"></i>', 'breadcrumb', 'woocommerce' ),
                            ));
							?>
                            
                            <?php if ($data['title_breadcrumb_right_side'] != 'Leave Empty'): ?>
                            	<?php if( !is_product() ): ?>        
                                    <div class="searchtop-meta">								
                                        <?php 
                                        if($data['title_breadcrumb_right_side'] == 'Social Links') get_template_part('functions/template/social-links'); 
                                        elseif($data['title_breadcrumb_right_side'] == 'Search Box') get_product_search_form();
                                        else get_template_part('functions/template/contact-info'); 								
                                        ?>								
                                    </div>
                                 <?php else: ?>
                                 	<div id="portfolio-navigation" class="clearfix">
                                        <div class="port-nav-next">                        	
                                            <?php next_post_link('%link', '<i class="fa fa-angle-left"></i>'); ?>
                                        </div>
                                        <div class="port-nav-prev">    
                                            <?php previous_post_link('%link', '<i class="fa fa-angle-right"></i>'); ?>
                                        </div>    
                                    </div> 	   
                            	 <?php endif; ?>        
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>            
            <?php
			}
			
			if(is_archive() && ( class_exists( 'Woocommerce' ) && !is_woocommerce() ) &&  !get_query_var('portfolio_category') && !get_query_var('faq_category')) {

			?>
                <div id="page-title">
                    <div class="page_title_inner">
                        <div class="container clearfix">
                            <h1>
                            	<?php if ( is_day() ) : ?>
									<?php printf( __( 'Daily Archives: %s', 'twentyeleven' ), '<span>' . get_the_date() . '</span>' ); ?>
                                <?php elseif ( is_month() ) : ?>
                                    <?php printf( __( 'Monthly Archives: %s', 'twentyeleven' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyeleven' ) ) . '</span>' ); ?>
                                <?php elseif ( is_year() ) : ?>
                                    <?php printf( __( 'Yearly Archives: %s', 'twentyeleven' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentyeleven' ) ) . '</span>' ); ?>
                                <?php elseif ( is_author() ) : ?> 
                                	<?php
                                    if(have_posts() ) {									
                                    	the_post();
                                    	?>                
                                    	<?php _e('Posts by: ','Nimva'); echo get_the_author(); ?>
                                        <?php
                                        rewind_posts();
                                	}
									?>  
                                <?php elseif ( is_tag() ) : ?> 
                                		<?php _e('Tags: ', 'Nimva'); single_cat_title(); ?>     
                                <?php else : ?>
                                    <?php _e('Category: ', 'Nimva'); single_cat_title(); ?>
                                <?php endif; ?>
                            </h1> 
                            <?php 
							if($data['en_breadcrumb']){
								nimva_breadcrumb();                						
							}
							?>                                                      
                            
                            <?php if ($data['title_breadcrumb_right_side'] != 'Leave Empty'): ?>
                                <div class="searchtop-meta">								
                                    <?php 
                                    if($data['title_breadcrumb_right_side'] == 'Social Links') get_template_part('functions/template/social-links'); 
                                    elseif($data['title_breadcrumb_right_side'] == 'Search Box') get_search_form();
                                    else get_template_part('functions/template/contact-info'); 								
                                    ?>								
                                </div>
                            <?php endif; ?>
                            
                        </div>
                    </div>    
                </div>
            <?php			
			}
			
			if ( is_search() && ( class_exists( 'Woocommerce' ) && !is_woocommerce() ) ) {
			?>
            	<div id="page-title">
                    <div class="page_title_inner">
                        <div class="container clearfix">
                            <h1><?php echo _e('Search results for:', 'Nimva'); ?> <?php echo get_search_query(); ?></h1>
                            <?php 
							if($data['en_breadcrumb']){
								nimva_breadcrumb();                						
							}
							?> 
                            
                            <?php if ($data['title_breadcrumb_right_side'] != 'Leave Empty'): ?>
                                <div class="searchtop-meta">								
                                    <?php 
                                    if($data['title_breadcrumb_right_side'] == 'Social Links') get_template_part('functions/template/social-links'); 
                                    elseif($data['title_breadcrumb_right_side'] == 'Search Box') get_search_form();
                                    else get_template_part('functions/template/contact-info'); 								
                                    ?>								
                                </div>
                            <?php endif; ?>
                            
                        </div>
                    </div>    
                </div>
                            
            <?php
			}
			
			if(get_query_var('portfolio_category') || get_query_var('faq_category')){
			?>
                <div id="page-title">
                    <div class="page_title_inner">
                        <div class="container clearfix">
                            <h1><?php single_cat_title(); ?></h1>
                            <?php 
							if($data['en_breadcrumb']){
								nimva_breadcrumb();                						
							}
							?>
                            <?php if ($data['title_breadcrumb_right_side'] != 'Leave Empty'): ?>
                                <div class="searchtop-meta">								
                                    <?php 
                                    if($data['title_breadcrumb_right_side'] == 'Social Links') get_template_part('functions/template/social-links'); 
                                    elseif($data['title_breadcrumb_right_side'] == 'Search Box') get_search_form();
                                    else get_template_part('functions/template/contact-info'); 								
                                    ?>								
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>    
                </div>    
            <?php
			}	
			
		}		            
     endif;   
	 ?>