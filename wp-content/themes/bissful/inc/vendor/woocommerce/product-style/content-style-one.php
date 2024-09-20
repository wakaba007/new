<?php
 global $product;
$product_id = get_the_ID();
 ?>
 
 <div class="trending-products-st1 bissful-archive-p-style-one">
    <div class="trending-product-st1-img" >
        <a href="<?php the_permalink();?>" class="bissful-hover-thumb-woo"> 
                <?php
                    /**
                     *
                     * @hooked bissful_woo_thumbnail - 11
                     */
                    do_action( 'bissful_woocommerce_shop_loop_images' );
                    ?>
    
        </a>
        <div class="trending-cart-st1-btn">
            <?php woocommerce_template_loop_add_to_cart();?>
        </div>
    </div>
    <div class="onesale">
        <?php pivoo_woo_sale_hook();?>
    </div>
    <?php bissful_out_of_stock();?>
    <div class="producticons">
        <?php bissful_add_quick_view_card();?>
        <?php bissful_wishlist_icon_in_product_grid(); ?>
        <?php bissful_compare_icon_in_product_card();?>
    </div>
    <div class="product-content">
        <div class="pro-review">
            <?php woocommerce_template_loop_rating();?>
        </div>
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <div class="sell-pro-price">
            <?php echo maybe_unserialize($product->get_price_html()); ?>
        </div>
    </div>
</div>