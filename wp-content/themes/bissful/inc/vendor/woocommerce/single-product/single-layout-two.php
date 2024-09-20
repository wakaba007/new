<div class="bissful-product-container-bx">
	<div class="container">
<?php woocommerce_output_all_notices();?>
<div class="row gx-5">
    <div class="pivoo-single-thumbs col-12 col-md-5">
        
   
	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
    	woocommerce_show_product_images();
	?>
	<div class="clearfix"></div>
    </div>
	<div class="col-12 col-md-7">
	    <div class="bissful-side-meta">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		if ( function_exists( 'bissful_single_social' ) ) {
		 bissful_single_social();
		}
		?>
		</div>
		<?php  woocommerce_output_product_data_tabs();?>
	</div>
</div>

<?php  woocommerce_upsell_display();?>
<?php  woocommerce_output_related_products();?>
    </div>
    </div>