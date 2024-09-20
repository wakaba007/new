<?php

global $post, $woocommerce, $product;
$attachment_ids = $product->get_gallery_image_ids();
$productthumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'teconce-quick-view-slider');
$product_unit_meta = get_post_meta(get_the_ID(), 'product_unit_txt', true);
?>
<!-- close modal markup -->
<div class="modal-close">
	<a href="#" class="quick-view-close">
      <i class="ri-close-line"></i>
	</a>
</div>
<!-- close modal markup -->

<!-- product wrapper -->
<div <?php post_class('product product-wrapper'); ?>>
<div class="row">
  <div class="col-12 col-md-6 teconce-quick-v-thumb">
      <?php if($attachment_ids){?>
      <div class="swiper nik-qv-thumb-preview-slider">
          <div class="swiper-wrapper">
              <div class="swiper-slide"><img src="<?php echo $productthumbnail[0]; ?>" alt="product"></div>
              <?php
              foreach ($attachment_ids as $attachment_id) {
                  $image = wp_get_attachment_image_src($attachment_id, apply_filters('woocommerce_gallery_thumbnail_size', 'teconce-quick-view-slider'));

                  ?>
                  <div class="swiper-slide"><img src="<?php echo $image[0]; ?>" alt="product"></div>
              <?php } ?>


          </div>
          <div class="nik-qc-swiper-button-next"><i class="teconce-icon-arrow-right-3"></i></div>
          <div class="nik-qc-swiper-button-prev"><i class="teconce-icon-arrow-right-2"></i></div>
      </div>
      <?php } else { ?>
          <img src="<?php echo $productthumbnail[0]; ?>" alt="product">
      <?php } ?>

  </div>
  
   <div class="col-12 col-md-6 teconce-quickv-product-details-main">
     <div class="teconce-quickv-product-details">
          
                 <a href="<?php the_permalink();?>"> <h2 class="woocommerce-loop-product__title"><?php the_title();?></h2></a>
            
                    
              <?php do_action( 'woocommerce_single_product_quickview_summary' ); ?>


        </div>
  </div>
  </div>
	
	
</div>
<!-- product wrapper -->

<div class="clear quick-view-nav-wrapper">
	<?php if ( !empty( $prev_id ) ): ?>
		<a href="#" class="button <?php echo $prev_class; ?>">Prev</a>
	<?php endif; ?>
	<?php if ( !empty( $next_id ) ): ?>
		<a href="#" class="button <?php echo $next_class; ?>">Next</a>
	<?php endif; ?>
</div>