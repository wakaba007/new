<?php


function teconce_display_rating_star($rating)
{
    for ($i = 0; $i < $rating; $i++) {
        $rst = '<i class="ri-star-fill"></i>';
        echo $rst;
    }
}
if (!function_exists('teconce_client_reviews_three')) {
    function teconce_client_reviews_one($rev_list)
    { ?>
        <div class="clearfix"></div>
        <div class="teconce-clreviews-three teconce-review-common-class">

            <div class="slide-bg-three-inner">
                <div class="teconce--marquee__rev__container_alt teconce-marquee-stl3" id="teconce-marquee-stl3">

                    <?php
                    $countl = 0;
                    $classl = '';
                    foreach ($rev_list as $rev_item) {
                        $countl++;
                        if ($countl == 1) {
                            $classl = 'active';
                        }else{
                            $classl = '';
                        }
                        ?>
                        <div class="marquee--item <?php echo esc_html($classl);?> patinets-single-review patinets-single-review-st03">
<!--                            --><?php //if($rev_item['rev_logo']['url']){?>
<!--                                <div class="review-cl-logo-wraper">-->
<!--                                    <img src="--><?php //echo $rev_item['rev_logo']['url'];?><!--" alt="rev logo">-->
<!--                                </div>-->
<!--                            --><?php //} ?>
<!--                            <p>--><?php //echo $rev_item['rev_description']; ?><!--</p>-->
                            <div class="marquee-info">
                                <div class="marquee-img">
                                    <img src="<?php echo $rev_item['rev_image']['url']; ?>" alt="">
                                </div>
                                <div class="rev-nem">
                                    <h5><?php echo $rev_item['rev_name']; ?></h5>
<!--                                    <p>--><?php //echo $rev_item['rev_desig']; ?><!--</p>-->
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php }
}
   function show_reviewer_image($reviewlist)
   { ?>
<div id="clientthumbmySwiper" class="swiper clientthumbmySwiper">
   <div class="swiper-wrapper">
      <?php foreach ($reviewlist as $review) { ?>
      <div class="swiper-slide">
          <img src="<?php echo esc_url($review['reviewer_image']['url']); ?>" alt="">
               <div class="name-title">
              <p class="client-name"><?php echo esc_html( $review['reviewer_name'] ); ?></p>
    <p class="client-name-dg"><?php echo esc_html( $review['reviewer_deg'] ); ?></p>
    </div>
      </div>


      <?php } ?>
   </div>
</div>
<?php  }

   if (!function_exists('teconce_product_featured_grid_one')) {
   
       function teconce_product_featured_grid_one($the_query, $settings)
       { ?>
<div class="top-selling-product-v6-area">
   <div class="row">
      <div class="col-lg-4 g-0 fetured-style-new">
         <?php
            if ($the_query) {
                for ($i = 0; $i < 4; $i++) {
                    $the_query->the_post();
                    global $product;
            ?>
         <div class="trending-products-sport">
            <div class="trending-product-sport-img">
               <a href="<?php the_permalink(); ?>" class="teconce-hover-thumb-woo">
               <?php
                  /**
                   *
                   * @hooked teconce_woo_thumbnail - 11
                   */
                  do_action('teconce_woocommerce_shop_loop_images');
                  ?>
               </a>
            </div>
            <div class="onesale">
            </div>
            <?php teconce_out_of_stock(); ?>
            <div class="producticons-sport psf-style-7">
               <?php
                  if (function_exists('woocommerce_template_loop_add_to_cart')) {
                      teconce_product_add_cart_cards(); 
                  }
                  ?>
               <?php teconce_add_quick_view_card(); ?>
               <?php teconce_wishlist_icon_in_product_grid(); ?>
               <?php teconce_compare_icon_in_product_card(); ?>
            </div>
            <div class="product-content">
               <div class="pivoo-product-sale-tag absolute flex items-start">
                  <?php
                     $postdate = get_the_time('Y-m-d'); // Post date
                     $postdatestamp = strtotime($postdate);
                     
                     $riboontext = get_theme_mod('recent_ribbon_text', 'Sale'); // Newness in days
                     
                     $newness = get_theme_mod('recent_ribbon_time', '30'); // Newness in days
                     if ((time() - (60 * 60 * 24 * $newness)) < $postdatestamp) { // If the product was published within the newness time frame display the new badge
                         echo '<span class="pivoo-new-tag">NEW</span>';
                     }
                     
                     ?>
                  <?php woocommerce_show_product_loop_sale_flash(); ?>
               </div>
               <div class="justify-content-between">
                  <div class="product-cateory">
                     <?php echo wc_get_product_category_list($product->get_id()); ?>
                  </div>
                  <div class="prodict-title">
                     <h4 class=" "><a href="<?php the_permalink(); ?>"><?php echo teconce_title_trim(20);?></a></h4>
                  </div>
                  <div class="pro-reviews ">
                     <?php teconce_get_star_rating(); ?>
                     <?php echo '(' . $product->get_review_count() . ')';?>
                  </div>
               </div>
               <div class="sell-pro-price ">
                  <?php echo maybe_unserialize($product->get_price_html()); ?>
               </div>
            </div>
         </div>
         <?php
            }
            } ?>
      </div>
      <div class="col-lg-4 g-0 fetured-style-middol">
         <?php $featured_grid_count = $the_query->post_count - 1;
            if ($the_query->have_posts() && $featured_grid_count > 0) {
            
                for ($i = 0; $i < 1; $i++) {
                    $the_query->the_post();
                    global $product;
            ?>
         <div class="v6-single-top-selling-product-offer">
            <div class="trending-products-sport">
               <div class="trending-product-sport-img">
                  <a href="<?php the_permalink(); ?>" class="teconce-hover-thumb-woo">
                  <?php
                     /**
                      *
                      * @hooked teconce_woo_thumbnail - 11
                      */
                     do_action('teconce_woocommerce_shop_loop_images');
                     ?>
                  </a>
                  <!-- <?php //if ($sales_price_from && $sales_price_to) { ?>
                     <div class="spe-pro-offer">
                         //<?php //do_action('xpc_counter_product_woo'); ?>
                     </div>
                     <?php //} ?> -->
               </div>
               <div class="onesale">
               </div>
               <?php teconce_out_of_stock(); ?>
               <div class="producticons-sport psf-style-7">
                  <?php
                     if (function_exists('woocommerce_template_loop_add_to_cart')) {
                         teconce_product_add_cart_cards(); 
                     }
                     ?>
                  <?php teconce_add_quick_view_card(); ?>
                  <?php teconce_wishlist_icon_in_product_grid(); ?>
                  <?php teconce_compare_icon_in_product_card(); ?>
               </div>
               <div class="product-content">
                  <div class="pivoo-product-sale-tag absolute flex items-start">
                     <?php
                        $postdate = get_the_time('Y-m-d'); // Post date
                        $postdatestamp = strtotime($postdate);
                        
                        $riboontext = get_theme_mod('recent_ribbon_text', 'Sale'); // Newness in days
                        
                        $newness = get_theme_mod('recent_ribbon_time', '30'); // Newness in days
                        if ((time() - (60 * 60 * 24 * $newness)) < $postdatestamp) { // If the product was published within the newness time frame display the new badge
                            echo '<span class="pivoo-new-tag">NEW</span>';
                        }
                        
                        ?>
                     <?php woocommerce_show_product_loop_sale_flash(); ?>
                  </div>
                  <div class="justify-content-between">
                     <div class="product-cateory">
                        <?php echo wc_get_product_category_list($product->get_id()); ?>
                     </div>
                     <div class="prodict-title">
                        <h4 class=" "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                     </div>
                     <div class="pro-reviews ">
                        <?php teconce_get_star_rating(); ?>
                        <?php echo '(' . $product->get_review_count() . ')';?>
                     </div>
                  </div>
                  <div class="sell-pro-price ">
                     <?php echo maybe_unserialize($product->get_price_html()); ?>
                  </div>
               </div>
            </div>
         </div>
         <?php }
            } ?>
      </div>
      <div class="col-lg-4 g-0 fetured-style-new">
         <?php
            $featured_grid_count = $the_query->post_count - 5;
            if ($the_query->have_posts() && $featured_grid_count > 0) {
            
                for ($i = 0; $i < $featured_grid_count; $i++) {
                    $the_query->the_post();
                    global $product;
            ?>
         <div class="trending-products-sport">
            <div class="trending-product-sport-img">
               <a href="<?php the_permalink(); ?>" class="teconce-hover-thumb-woo">
               <?php
                  /**
                   *
                   * @hooked teconce_woo_thumbnail - 11
                   */
                  do_action('teconce_woocommerce_shop_loop_images');
                  ?>
               </a>
               <!-- <?php //if ($sales_price_from && $sales_price_to) { ?>
                  <div class="spe-pro-offer">
                      //<?php //do_action('xpc_counter_product_woo'); ?>
                  </div>
                  <?php //} ?> -->
            </div>
            <div class="onesale">
            </div>
            <?php teconce_out_of_stock(); ?>
            <div class="producticons-sport psf-style-7">
               <?php
                  if (function_exists('woocommerce_template_loop_add_to_cart')) {
                      teconce_product_add_cart_cards(); 
                  }
                  ?>
               <?php teconce_add_quick_view_card(); ?>
               <?php teconce_wishlist_icon_in_product_grid(); ?>
               <?php teconce_compare_icon_in_product_card(); ?>
            </div>
            <div class="product-content">
               <div class="pivoo-product-sale-tag absolute flex items-start">
                  <?php
                     $postdate = get_the_time('Y-m-d'); // Post date
                     $postdatestamp = strtotime($postdate);
                     
                     $riboontext = get_theme_mod('recent_ribbon_text', 'Sale'); // Newness in days
                     
                     $newness = get_theme_mod('recent_ribbon_time', '30'); // Newness in days
                     if ((time() - (60 * 60 * 24 * $newness)) < $postdatestamp) { // If the product was published within the newness time frame display the new badge
                         echo '<span class="pivoo-new-tag">NEW</span>';
                     }
                     
                     ?>
                  <?php woocommerce_show_product_loop_sale_flash(); ?>
               </div>
               <div class="justify-content-between">
                  <div class="product-cateory">
                     <?php echo wc_get_product_category_list($product->get_id()); ?>
                  </div>
                  <div class="prodict-title">
                     <h4 class=" "><a href="<?php the_permalink(); ?>"><?php echo teconce_title_trim(20); ?></a></h4>
                  </div>
                  <div class="pro-reviews ">
                     <?php teconce_get_star_rating(); ?>
                     <?php echo '(' . $product->get_review_count() . ')';?>
                  </div>
               </div>
               <div class="sell-pro-price ">
                  <?php echo maybe_unserialize($product->get_price_html()); ?>
               </div>
            </div>
         </div>
         <?php }
            } ?>
      </div>
   </div>
</div>
<?php
   }
   }
   
   
   if (!function_exists('teconce_product_featured_grid_three')) {
   
   function teconce_product_featured_grid_three($the_query, $settings)
   { ?>
<section class="recommend-product-grid-v6" style="margin-bottom: 100px;">
<div class="row">
   <div class="col-lg-4 ">
      <?php
         if ($the_query) {
             for ($i = 0; $i < 3; $i++) {
                 $the_query->the_post();
                 global $product;
         ?>
      <div class="single-recommend-v6">
         <div class="recommend-v6-img">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('product-featured-grid'); ?></a>
         </div>
         <div class="recommend-v6-content">
            <?php  if (class_exists('WeDevs_Dokan')) { ?>
            <?php do_action('teconce_seller_information_main');?>
            <?php } else { ?>
            <?php echo wc_get_product_category_list($product->get_id()); ?>
            <?php } ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="price-cart">
               <div class="sell-pro-price">
                  <?php woocommerce_template_loop_price(); ?>
               </div>
            </div>
         </div>
         <div class="cart-icon-v6">
            <?php teconce_product_cart_card(); ?>
         </div>
      </div>
      <?php }
         } ?>
   </div>
   <div class="col-lg-4">
      <?php $featured_grid_count = $the_query->post_count - 3;
         if ($the_query->have_posts() && $featured_grid_count > 0) {
         
             for ($i = 0; $i < 3; $i++) {
                 $the_query->the_post();
                 global $product;
         ?>
      <div class="single-recommend-v6">
         <div class="recommend-v6-img">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('product-featured-grid'); ?></a>
         </div>
         <div class="recommend-v6-content">
            <?php  if (class_exists('WeDevs_Dokan')) { ?>
            <?php do_action('teconce_seller_information_main');?>
            <?php } else { ?>
            <?php echo wc_get_product_category_list($product->get_id()); ?>
            <?php } ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="price-cart">
               <div class="sell-pro-price">
                  <?php woocommerce_template_loop_price(); ?>
               </div>
            </div>
         </div>
         <div class="cart-icon-v6">
            <?php teconce_product_cart_card(); ?>
         </div>
      </div>
      <?php }
         } ?>
   </div>
   <div class="col-lg-4">
      <?php $featured_grid_count = $the_query->post_count - 6;
         if ($the_query->have_posts() && $featured_grid_count > 0) {
         
             for ($i = 0; $i < 1; $i++) {
                 $the_query->the_post();
                 global $product;
         ?>
      <div class="single-recommend-v6-offer">
         <div class="recommend-v6-offer-img">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('teconce-default-post-st-one'); ?></a>
            <span class="recommend-offer-text-v6"><?php echo $settings['extra_text_one']; ?></span>
            <div class="recommend-product-icons-v6">
               <?php teconce_product_cart_card(); ?>
               <?php teconce_add_quick_view_card(); ?>
               <?php teconce_wishlist_icon_in_product_grid(); ?>
            </div>
         </div>
         <div class="recommend-v6-offer-content">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="price-cart">
               <div class="sp-offer-pro-price">
                  <?php woocommerce_template_loop_price(); ?>
               </div>
            </div>
            <div class="recommend-hurryup-text"><?php echo $settings['extra_text_two']; ?></div>
            <div class="recommend-offer-countdown">
               <div class="days">
                  <h5>07</h5>
                  <p>Days</p>
               </div>
               <span> : </span>
               <div class="hours">
                  <h5>06</h5>
                  <p>Hrs</p>
               </div>
               <span> : </span>
               <div class="minutes">
                  <h5>12</h5>
                  <p>Mins</p>
               </div>
               <span> : </span>
               <div class="seconds">
                  <h5>19</h5>
                  <p>Secs</p>
               </div>
            </div>
         </div>
      </div>
      <?php } } ?>
   </div>
</div>
<?php
}
}
if (!function_exists('teconce_product_featured_grid_two')) {

	function teconce_product_featured_grid_two($the_query, $settings)
	{
	    ?>
<div class="recommend-product-grid-v6-feture">
    <div class="row recommend-product-grid-v6-feture-row">
        <div class="col-lg-6">
           <div class="row ">

        <?php
                    if ($the_query) {
                        for ($i = 0; $i < 2; $i++) {
                            $the_query->the_post();
                            global $product;
                    ?>

 <div class="col-6">
                            <div class="trending-products-sport">
    <div class="trending-product-sport-img">
        <a href="<?php the_permalink(); ?>" class="teconce-hover-thumb-woo">
			<?php
			/**
			 *
			 * @hooked teconce_woo_thumbnail - 11
			 */
			do_action( 'teconce_woocommerce_shop_loop_images' );
			?>

        </a>
    </div>
    <div class="onesale">

    </div>
	<?php teconce_out_of_stock(); ?>
    <div class="producticons-sport psf-style-7">
		<?php teconce_wishlist_icon_in_product_grid(); ?>
		<?php teconce_add_quick_view_card(); ?>
		<?php teconce_compare_icon_in_product_card(); ?>
    </div>
    <div class="product-content">
        <div class="justify-content-between">
            <div class="prodict-title">
                <h4 class=" "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            </div>
        </div>
        <div class="product-style-bottom">
            <div class="left-cat-style">
                <div class="sell-pro-price ">
		            <?php echo maybe_unserialize( $product->get_price_html() ); ?>
                </div>
                <div class="add-to-cart-option">
		            <?php
		            if ( function_exists( 'woocommerce_template_loop_add_to_cart' ) ) {
			            woocommerce_template_loop_add_to_cart();
		            }
		            ?>
                </div>
            </div>
            <div class="right-cat-style">
                <div class="pro-reviews ">
		            <?php teconce_get_star_rating(); ?>
		            <?php echo '(' . $product->get_review_count() . ')'; ?>
                </div>
            </div>
        </div>
    </div>
</div>

                        </div>
                                                     <?php
        }} ?>
                    </div>


        </div>
        <div class="col-lg-6">
        <div class="teconce-futere-style-two-banner">
        <h2><?php echo esc_html($top_title_main );?></h2>
        <h3>Hading Two</h3>
        <p>Lorem ipsum dolor sit consectetur adipiscing sed eiusmod.</p>
        <a href="#">Shop Now</a>
        </div>
        </div>
    </div>
</div>

<?php

    }}


function woocommerce_flash_list_product_style_three($settings){
    ?>

    <?php
global $product, $post;
$product_id = get_the_ID();
$sales_price_from = get_post_meta($post->ID, '_sale_price_dates_from', true);
$sales_price_to = get_post_meta($post->ID, '_sale_price_dates_to', true);
$alt_img = $settings['alter_image']['url'];
?>
<div class="trading-product-style-one teconce__flash_sell-style-two">
    <div class="trending-products-sport one-style-carosol-product tranding-style-product take-deal-oner-style">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="product-content product-content-carosol-one teconce__flash_sell-section-title">

                    <div class="teconce__flash_sell-section-title">
                        <div class="prodict-title">
                            <h4 class=""><?php echo esc_html($settings['section_subtitle']); ?></h4>
                        </div>
                        <h3><?php echo esc_html($settings['widget_title']); ?></h3>

                    </div>
                </div>
            </div>
            <div class="trending-product-sport-img">
                <a href="<?php the_permalink(); ?>" class="teconce-hover-thumb-woo">
                <?php if($alt_img){ ?>
                <img src="<?php echo esc_url($alt_img);?>" alt="product image">
                <?php }  else { ?>
                    <?php
                    /**
                     *
                     * @hooked teconce_woo_thumbnail - 11
                     */
                    do_action('teconce_woocommerce_shop_loop_images');
                    ?>
                    <?php } ?>

                </a>
            </div>


            <div class="product-content product-content-carosol-one">

                <div class="">
                    <h5>Hurry Up! Offer Ends in:</h5>
                    <?php

                    $p_stock = $product->get_manage_stock();
                    $p_sale = $product->get_total_sales();
                    if ($p_stock) {
                        $progress_cal = $p_stock * $p_sale / $p_stock;
                        $progress_pr = 100 - $progress_cal;
                    }
                    ?>
                    <?php if ($sales_price_from && $sales_price_to) { ?>
                        <div class="style-deal-style">
                            <?php do_action('xpc_counter_product_woo'); ?>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>

    </div>
</div>

<?php }