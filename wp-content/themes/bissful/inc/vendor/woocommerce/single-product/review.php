<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

	<div id="comment-<?php comment_ID(); ?>" class="comment_container">
	    <div class="pivoo-woo-rat-container d-block">
            <div class="pivoo-woo-rat-top d-flex justify-content-between">
                <div class="pivoo-woo-image-part d-flex align-items-center">
                    <div class="pivoo-woo-rat-main-image">
                    <?php
                		/**
                		 * The woocommerce_review_before hook
                		 *
                		 * @hooked woocommerce_review_display_gravatar - 10
                		 */
                		woocommerce_review_display_gravatar($comment);
                		?>
                		</div>
                		
                		<div class="pivoo-woo-rat-desc">
                		    <?php
                		    	/**
                    			 * The woocommerce_review_meta hook.
                    			 *
                    			 * @hooked woocommerce_review_display_meta - 10
                    			 * @hooked WC_Structured_Data::generate_review_data() - 20
                    			 */
                    			do_action( 'woocommerce_review_meta', $comment );
                    
                    			do_action( 'woocommerce_review_before_comment_text', $comment );
                		    ?>
                		</div>
                </div>
                
                <div class="pivoo-woo-rat-rating">
                    <?php
                    
                    	/**
    			 * The woocommerce_review_before_comment_meta hook.
    			 *
    			 * @hooked woocommerce_review_display_rating - 10
    			 */
    			do_action( 'woocommerce_review_before_comment_meta', $comment );
    			
    			?>
                </div>
                
            </div>
		</div>

		<div class="comment-text mt-3 md:mt-0">

			<?php

			/**
			 * The woocommerce_review_comment_text hook
			 *
			 * @hooked woocommerce_review_display_comment_text - 10
			 */
			do_action( 'woocommerce_review_comment_text', $comment );

			do_action( 'woocommerce_review_after_comment_text', $comment ); ?>

		</div>
	</div>
