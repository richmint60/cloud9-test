<?php global $data, $woocommerce; ?>
<div class="container clearfix">
    <!-- ============================================
        Logo
    ============================================= -->
    <div id="logo">
                        
		<?php                    
        if( $data['logo'] || $data['logo_retina'] ){                    
        ?>
        	<?php 
			if($data['logo']) {
			?>                        
			<a href="<?php bloginfo('url'); ?>" class="standard_logo"><img src="<?php echo $data['logo'] ?>" alt="<?php echo get_bloginfo('name'); ?>" title="<?php echo get_bloginfo('name'); ?>" /></a>  
            <?php 
			}
			if($data['logo_retina']) {
			?>
            <a href="<?php bloginfo('url'); ?>" class="retina_logo"><img src="<?php echo $data['logo_retina'] ?>" alt="<?php echo get_bloginfo('name'); ?>" title="<?php echo get_bloginfo('name'); ?>" /></a>                  
            <?php        
			}
        }
		                    
        else{
					
		?>
            
            <a href="<?php bloginfo('url'); ?>" class="standard_logo_text"><?php echo get_bloginfo('name'); ?></a>	
                        
            <?php
			if($data['show_tagline']) {
			?>
				<div class="tagline"><?php echo $data['tagline_text'] ?></div>
			<?php
			}
			?>	    
                    
        <?php
					
		}
                    
        ?>                       
                        
    </div>  
                        
</div>                        
    <!-- 
    ============================================
    Menu
    ============================================= -->
<div class="container clearfix realwidth">
	
    <div id="menu-wrapper">
    
    	<div class="menu-wrapper-inside">
        
        	<?php
			$mob_menu = ( isset ( $data['mob_menu_text'] ) && ( $data['mob_menu_text'] != '' ) ) ? $data['mob_menu_text'] : 'MENU';
			?>                        
            <a href="#" id="toggle-nav"><i class="fa fa-bars"></i><span><?php echo $mob_menu; ?></span></a>
            
            <?php $menu_extra_class = (is_page_template ( 'page-one-full.php') ) ? 'class="one-page-template"' : ''; ?>
            
            <nav id="nav" <?php echo $menu_extra_class; ?>>
                <ul class="sf-menu clearfix">	
                    <?php 
					if ( is_page_template ( 'page-one-full.php' ) ) {
						wp_nav_menu(array('walker' => new MenuWalker, 'theme_location' => 'one-page-nav', 'container' => false, 'items_wrap' => '%3$s', 'menu_class' => 'sf-menu', 'fallback_cb' =>'MenuWalker::fallback', 'walker' => new MenuWalker() ) );
					}
					else{
						if(has_nav_menu('primary-menu')) {
							wp_nav_menu(array('walker' => new MenuWalker, 'theme_location' => 'primary-menu', 'container' => false, 'items_wrap' => '%3$s', 'menu_class' => 'sf-menu', 'fallback_cb' =>'MenuWalker::fallback', 'walker' => new MenuWalker() ) ); 
						}
						else {
							echo '<li><a href="">No menu assigned!</a></li>';
						}						
					}
					if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
						if($data['woocommerce_item']) {
						?> 
							<li class="cart">
								<?php if(!$woocommerce->cart->cart_contents_count): ?>
									<a class="shopping-cart" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i></a>
								<?php else: ?>
									<a class="shopping-cart active" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i></a>
									<div class="cart-contents">
										<?php foreach($woocommerce->cart->cart_contents as $cart_item): //var_dump($cart_item); ?>
										<div class="cart-content">
											
											<?php $thumbnail_id = ($cart_item['variation_id']) ? $cart_item['variation_id'] : $cart_item['product_id']; ?>
											<?php echo get_the_post_thumbnail($thumbnail_id, 'recent-works-thumbnail'); ?>
											<div class="cart-desc">
												<span class="cart-title"><a href="<?php echo get_permalink($cart_item['product_id']); ?>"><?php echo $cart_item['data']->post->post_title; ?></a></span>
												<span class="product-quantity"><?php echo $cart_item['quantity']; ?> x <?php echo $woocommerce->cart->get_product_subtotal($cart_item['data'], 1); ?></span>
											</div>                                
											</a>
										</div>
										<?php endforeach; ?>
										<div class="cart-total">
											<?php _e('Subtotal: ', 'Nimva'); ?>
											<?php echo $woocommerce->cart->get_cart_subtotal(); ?>
										</div>
										<div class="cart-checkout">
											<div class="cart-link"><a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"><?php _e('View Cart', 'Nimva'); ?></a></div>
											<div class="checkout-link"><a href="<?php echo get_permalink(get_option('woocommerce_checkout_page_id')); ?>"><?php _e('Checkout', 'Nimva'); ?></a></div>
										</div>
									</div>
									
								<?php endif; ?>                	
							</li> 
						<?php
						}
					}
					?>                               
                </ul>
            </nav>               
        
        </div>
        
	</div>        
 
</div>