<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
$out_of_stock = ! $product->is_in_stock();
?>
<div class="pivoo-price-full-block">
<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) );?>"><?php echo maybe_unserialize($product->get_price_html()); ?></p>
<span class="pivoo-single-price-disocunt">
<?php pivoo_woo_sale_hook();?>
</span>
<?php pivoo_woo_inventory_hook();?>
<?php if ( $out_of_stock ) { ?><span class="bissful-out-of-stock"><?php _e( 'Out of stock', 'bissful' ); ?></span><?php } ?>
</div>