<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


global $post, $woocommerce, $product, $data;

?>
<div class="images">

<?php if ( $product->is_on_sale() ) : ?>

	<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . __( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>

<?php endif; ?>

	<!-- Place somewhere in the <body> of your page -->
	<div class="fslider" data-animate="<?php echo $data['bp_anim']; ?>" <?php if($data['bp_anim_auto']) echo 'data-slideshow="true"'; if($data['bp_anim_control']) echo 'data-direction-nav="true"'; ?> data-speed="<?php echo $data['bp_anim_speed']; ?>" data-pause="<?php echo ($data['bp_anim_pause_time']*1000); ?>" <?php if($data['bp_anim_pause']) echo 'data-pause-hover="true"'; ?>>
		<div class="flexslider">
        	<div class="slider-wrap">
			<?php
				if ( has_post_thumbnail() ) {

					$image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
					$image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
					$image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
						'title' => $image_title
						) );
					$attachment_count   = count( $product->get_gallery_attachment_ids() );

					if ( $attachment_count > 0 ) {
						$gallery = '[product-gallery]';
					} else {
						$gallery = '';
					}

					echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<div class="slide"><a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a></div>', $image_link, $image_title, $image ), $post->ID );

					/**
					 * From product-thumbnails.php
					 */
					$attachment_ids = $product->get_gallery_attachment_ids();

					$loop = 0;

					foreach ( $attachment_ids as $attachment_id ) {

						$classes[] = 'image-'.$attachment_id;

						$image_link = wp_get_attachment_url( $attachment_id );

						if ( ! $image_link )
							continue;

						
						// modified image size to shop_single from thumbnail
						$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_single' ) );
						$image_class = esc_attr( implode( ' ', $classes ) );
						$image_title = esc_attr( get_the_title( $attachment_id ) );

						
						echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<div class="slide"><a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a></div>', $image_link, $image_title, $image ), $attachment_id, $post->ID, $image_class );
						
						$loop++;
					}

				} 
			?>
            </div>
		</div>
	</div>
    
    

    
	<?php
		if ( has_post_thumbnail() ) {

			$image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
			$image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
			$attachment_count   = count( $product->get_gallery_attachment_ids() );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}

			//echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s"  rel="prettyPhoto' . $gallery . '">%s</a>', $image_link, $image_title, $image ), $post->ID );

		}
		$attachment_ids = $product->get_gallery_attachment_ids();
		if ( has_post_thumbnail() ) {
		}
	?>

	<?php do_action( 'woocommerce_product_thumbnails' ); ?>

</div>
