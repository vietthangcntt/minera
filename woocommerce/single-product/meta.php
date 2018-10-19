<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<p class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></p>

	<?php endif; ?>

	<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<p class="posted_in">' . _n( 'Category:', '<span class="Category">Categories: </span>', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</p>' ); ?>

	<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<p class="tagged_as">' . _n( 'Tag:', '<span class="tags"> Tags: </span>', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</p>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>
	<ul class="social-share">
		<span>Share</span>
		<li><a href="#"> <i class="fa fa-facebook" aria-hidden="true"></i> </a></li>
		<li><a href="#"> <i class="fa fa-twitter" aria-hidden="true"></i> </a></li>
		<li><a href="#"> <i class="fa fa-pinterest" aria-hidden="true"></i> </a></li>

	</ul>
</div>
