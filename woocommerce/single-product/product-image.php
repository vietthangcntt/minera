<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.2
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;
// print "<pre>";
// var_dump($product);

$attachment_ids = $product->get_gallery_image_ids();
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . ( has_post_thumbnail() ? 'with-images' : 'without-images' ),
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );
	
	// print_r($attachment_ids);
?>
 <div class="woocommerce-product-gallery images">
 	<div class="slider-for">
 		<?php
 			$gallery_thumbnail = wc_get_image_size('gallery_thumbnail');
 			$thumbnail_size    = apply_filters('woocommerce_gallery_thumbnail_size' , array ( $gallery_thumbnail['width'] , $gallery_thumbnail['height'] ));
 			$image_size        = apply_filters( 'woocommerce_gallery_thumnail_size' , array (370,370) );
			// var_dump($gallery_thumbnail);
 			if ( $attachment_ids && has_post_thumbnail() ) {

 				foreach ( $attachment_ids as $key => $attachment_id ) {
 					$image_src     = wp_get_attachment_image_src( $attachment_id , $image_size);
 					$thumbnail_src = wp_get_attachment_image_src ( $attachment_id , $image_size);
 					// var_dump($image_src);
				?>
					<div class="image-up">
						<div class="image-item">
							<img src="<?php echo $image_src[0] ?>" alt="images product" class="complete">
						</div>
					</div>
				<?php
		}
 			}
 		?>
 	</div>
 	<div class="slider-nav">
 		<?php
 			if ( $attachment_ids && has_post_thumbnail() ) {
 				foreach ( $attachment_ids as $key => $attachment_id ) {
 					$image_src = wp_get_attachment_image_src( $attachment_id );
 					$thumbnail_src = wp_get_attachment_image_src ( $attachment_id , $thumbnail_size);

 					?>
 						<div class="pro-thumb">
 							<div class="thumb-up">
 								<div class="thumb-item">
 									<img src="<?php echo $thumbnail_src[0] ?>" alt="images product">
 								</div>
 							</div>
 						</div>

 					<?php
 				}
 			}
 		 ?>
 	</div>
 </div>