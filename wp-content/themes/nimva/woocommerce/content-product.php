<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce;




// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}



if ( ! $product->is_in_stock() ) {

	$mk_add_to_cart = '<a href="'. apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( $product->id ) ).'" class="add_to_cart_button"><i class="mk-moon-search-3"></i>'. apply_filters( 'out_of_stock_add_to_cart_text', __( '<i class="fa fa-minus-circle"></i>Out of Stock', 'woocommerce' ) ).'</a>';
	
}
else { ?>

	<?php

	switch ( $product->product_type ) {
	case "variable" :
		$link  = apply_filters( 'variable_add_to_cart_url', get_permalink( $product->id ) );
		$label  = apply_filters( 'variable_add_to_cart_text', __( 'Select options', 'woocommerce' ) );
		$icon_class = 'fa fa-cog';
		break;
	case "grouped" :
		$link  = apply_filters( 'grouped_add_to_cart_url', get_permalink( $product->id ) );
		$label  = apply_filters( 'grouped_add_to_cart_text', __( 'View options', 'woocommerce' ) );
		$icon_class = 'fa fa-plus';
		break;
	case "external" :
		$link  = apply_filters( 'external_add_to_cart_url', get_permalink( $product->id ) );
		$label  = apply_filters( 'external_add_to_cart_text', __( 'Read More', 'woocommerce' ) );
		$icon_class = 'fa fa-sign-in';
		break;
	default :
		$link  = apply_filters( 'add_to_cart_url', esc_url( $product->add_to_cart_url() ) );
		$label  = apply_filters( 'add_to_cart_text', __( 'Add to cart', 'woocommerce' ) );
		$icon_class = 'fa fa-shopping-cart';
		break;
	}

	if ( $product->product_type != 'external' ) {
		$mk_add_to_cart = '<a href="'. $link .'" rel="nofollow" data-product_id="'.$product->id.'" class="add_to_cart_button product_type_'.$product->product_type.'"><i class="'.$icon_class.'"></i>'. $label.'</a>';
	}
	else {
		$mk_add_to_cart = '';
	}
}

	$items_in_cart = array();

	if($woocommerce->cart->get_cart() && is_array($woocommerce->cart->get_cart())) {
		foreach($woocommerce->cart->get_cart() as $cart) {
			$items_in_cart[] = $cart['product_id'];
		}
	}

	$id = get_the_ID();
	$in_cart = in_array($id, $items_in_cart);	
	
?>
<li <?php post_class( $classes ); ?>>
    <div class="product_holder">
    	<?php
		if ( has_post_thumbnail() ) {
			?>
            <div class="product-loop-thumb">
				<?php
				
				if (nv_is_out_of_stock()) {
				
					echo '<span class="out-of-stock-badge">' . __( 'Out of Stock', 'Nimva' ) . '</span>';
			
				} else if ($product->is_on_sale()) {
					
					echo apply_filters('woocommerce_sale_flash', '<span class="onsale">'.__( 'Sale!', 'Nimva' ).'</span>', $post, $product);				
				} else if (!$product->get_price()) {
					
					echo '<span class="free-badge">' . __( 'Free', 'Nimva' ) . '</span>';
					
				} 
								
                $img_url = wp_get_attachment_url( get_post_thumbnail_id(),'full' );
                $image = aq_resize( $img_url, 210, 297, true );
                
                echo '<a href="'. get_permalink().'" class="product-images"><img src="'.$image.'" class="product-loop-image" alt="'.get_the_title().'" title="'.get_the_title().'">';
                
                $product_gallery = get_post_meta( $post->ID, '_product_image_gallery', true );
    
                if ( !empty( $product_gallery ) ) {
                    $gallery = explode( ',', $product_gallery );
                    $image_id  = $gallery[0];
            
                    $image_src_hover_array = wp_get_attachment_image_src( $image_id, 'full', true );
                    $image_hover = aq_resize( $image_src_hover_array[0], 210, 297, true ); 
            
                    echo '<img src="'.$image_hover.'" alt="'.get_the_title().'" class="product-hover-image" title="'.get_the_title().'">';
                }
				if($in_cart) {
					echo '<span class="cart-loading"><i class="fa fa-check"></i></span>';
				} else {
					echo '<span class="cart-loading"><i class="fa fa-refresh"></i></span>';
				}
                echo '</a>';				

                ?>
                <div class="product_buttons_wrap clearfix">
                
					<div class="product_buttons_wrap_inside">
                    
						<?php echo $mk_add_to_cart; ?>
            
                        <a href="<?php the_permalink(); ?>" class="show_details_button"><?php _e('<i class="fa fa-caret-right nopadding"></i>View more', 'Nimva'); ?></a>
        			
                    </div>
                
                </div>
                
            </div>
            <?php
				
		}
		?>
        <div class="product_details">
        
        	<h3><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></h3>
    
        	<?php //do_action( 'woocommerce_before_shop_loop_item' ); ?>
            
            <div class="product_price">

				<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>

            </div>         
    
    
       		<?php //do_action( 'woocommerce_after_shop_loop_item' ); ?>
            
        </div>
    
        
            
    </div>
</li>