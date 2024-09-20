<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

defined('ABSPATH') || exit;

global $product;

?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
    <div class="pivoo-single-product-box">
        <div class="bissful-product-container">


            <?php

            /**
             * Hook: woocommerce_before_single_product.
             *
             * @hooked wc_print_notices - 10
             */

            if (post_password_required()) {
                echo get_the_password_form(); // WPCS: XSS ok.
                return;
            }
            $pbredcmglobal = get_post_meta(get_the_ID(), 'woo_breadcrumb', true);

            if ($pbredcmglobal == true) {
                $title_hide_box = get_post_meta(get_the_ID(), 'metas_title_hide_woo', true);
                $singmetaclss = "bissful-single-woo-breadcrumbs";

            } else {
                $title_hide_box = cs_get_option('bd_title_hide_woo');
                $singmetaclss = "";
            }


            $title_hide_wd = cs_get_option('x_bd_width_set');
            $productglobalmeta = get_post_meta(get_the_ID(), 'woo_Gallery_option_global', true);

            if ($productglobalmeta == true) {
                $cs_style_layout = get_post_meta(get_the_ID(), 'meta_s_woo_layout', true);

            } else {
                $cs_style_layout = cs_get_option('main_s_woo_layout');
            }

            if ($title_hide_wd == true) {
                $containerxpc = 'container bissful-extended-container';
            } else {
                $containerxpc = 'w-100';
            }


            $postId = is_home() ? get_option('page_for_posts') : get_the_ID();
            $page_meta = get_post_meta($postId, 'teconce_page_options', true);
            $breadcrumb_bg_image = cs_get_option('breadcrumb_shape_image');
            if (is_array($page_meta) && !empty($page_meta['breadcrumb_shape_image']['url'])) {
                $breadcrumb_img = $page_meta['breadcrumb_shape_image']['url'];
            } elseif (is_array($breadcrumb_bg_image) && !empty($breadcrumb_bg_image['url'])) {
                $breadcrumb_img = $breadcrumb_bg_image['url'];
            } else {
                $breadcrumb_img = '';
            }
            ?>
            <!-- Bredcrumb Start -->
            <section class="sw_bredcrumb nb-bg1 nb-mp sw--Bg-color-white-100">
                <div class="sw_bredcrumb_wrapper">
                    <div class="container">
                        <div class="sw_bredcrumb_wrapper_container row nb-dw justify-content-between">
                            <div class="sw_bredcrumb_shep wow fadeInUp d-none d-lg-block" data-wow-delay="0.5s">
                                <img src="<?php echo esc_url($breadcrumb_img); ?>" alt="">
                            </div>
                            <div class="sw_bredcrumb_left col-12 col-md-6">
                                <div class="sw-about-contain">
                                    <h1 class="sw--fs-27 sw--color-black-900 ">
                                        <?php the_title(); ?>
                                    </h1>
                                    <p> <?php
                                        /**
                                         * Hook: woocommerce_archive_description.
                                         *
                                         * @hooked woocommerce_taxonomy_archive_description - 10
                                         * @hooked woocommerce_product_archive_description - 10
                                         */
                                        do_action('woocommerce_archive_description');
                                        ?></p>
                                </div>
                            </div>
                            <div class="sw_bredcrumb_right col-12 col-md-6">
                                <div>
                                    <?php woocommerce_breadcrumb(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Bredcrumb End -->

            <?php if ($cs_style_layout == 'style_two') {
                wc_get_template_part('single-product/single-layout', 'two');
            } else {
                wc_get_template_part('single-product/single-layout', 'one');
            } ?>

        </div>
        <?php do_action('woocommerce_after_single_product'); ?>
    </div>
</div>
<div class="clearfix"></div>
