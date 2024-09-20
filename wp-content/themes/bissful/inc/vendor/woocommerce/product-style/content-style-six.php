 <div class="pivoo-product-item-box">
        <div class="pivoo-product-wrapper">
            <div class="pivoo-content-product-imagin"></div>
        <div class="pivoo-product-thumbnail relative">
            <a href="<?php the_permalink();?>" class="bissful-hover-thumb-woo"> 
                                 <?php
                    						/**
                    						 *
                    						 * @hooked woocommerce_get_alt_product_thumbnail - 11
                    						 * @hooked woocommerce_template_loop_product_thumbnail - 10
                    						 */
                    						do_action( 'bissful_woocommerce_shop_loop_images' );
                    					?>
                                </a>
            <div class="pivoo-product-sale-tag absolute flex items-start">
                <?php
                $postdate = get_the_time('Y-m-d'); // Post date
                $postdatestamp = strtotime($postdate);

                $riboontext = get_theme_mod('recent_ribbon_text', 'New'); // Newness in days

                $newness = get_theme_mod('recent_ribbon_time', '30'); // Newness in days
                if ((time() - (60 * 60 * 24 * $newness)) < $postdatestamp) { // If the product was published within the newness time frame display the new badge
                    echo '<span class="pivoo-new-tag">NEW</span>';
                }

                ?>

                 <?php woocommerce_show_product_loop_sale_flash();?>

            </div>
            
            <?php bissful_out_of_stock();?>
            
            <!---<div class="pivoo-sing-product-cart">
              <?php woocommerce_template_loop_add_to_cart();?>
            </div>-->
        </div>
   
        <div class="pivoo-product-details">
          
                 <a href="<?php the_permalink();?>"> <h2 class="woocommerce-loop-product__title"><?php the_title();?></h2></a>
    
                <?php woocommerce_template_loop_price();?>
    



        </div>
        
        <div class="">
	<?php


	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */



	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */


	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	 


	?>

	</div>
    </div>

    </div>