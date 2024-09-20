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
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */
defined( 'ABSPATH' ) || exit;

global $product;
// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$product_style = cs_get_option('bissful-archive-style');

?>
<div class="col mb-4">
    <?php
    /**
     * Hook: woocommerce_before_shop_loop_item.
     *
     * @hooked woocommerce_template_loop_product_link_open - 10
     */
    do_action( 'woocommerce_before_shop_loop_item');
    ?>
    
    <?php if ($product_style=="style-one") {?>
    
    	<?php get_template_part( 'inc/vendor/woocommerce/product-style/content-style-one' ); ?>
    	
    <?php } elseif($product_style=="style-two") { ?>
    
    <?php get_template_part( 'inc/vendor/woocommerce/product-style/content-style-two' ); ?>
    
     <?php } elseif($product_style=="style-three") { ?>
     
      <?php get_template_part( 'inc/vendor/woocommerce/product-style/content-style-three' ); ?>
      
       <?php } elseif($product_style=="style-four") { ?>
     
      <?php get_template_part( 'inc/vendor/woocommerce/product-style/content-style-four' ); ?>
      
       <?php } elseif($product_style=="style-five") { ?>
     
    <?php get_template_part( 'inc/vendor/woocommerce/product-style/content-style-five' ); ?>
    
    
    <?php } elseif($product_style=="style-seven") { ?>
     
    <?php get_template_part( 'inc/vendor/woocommerce/product-style/content-style-seven' ); ?>
    
    
    <?php } elseif($product_style=="style-eight") { ?>
     
    <?php get_template_part( 'inc/vendor/woocommerce/product-style/content-style-eight' ); ?>
    
    <?php } else { ?>
     <?php get_template_part( 'inc/vendor/woocommerce/product-style/content-style-six' ); ?>
    <?php } ?>
   
</div>