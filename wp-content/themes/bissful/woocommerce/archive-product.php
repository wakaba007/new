<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 10.11.0
 */

defined( 'ABSPATH' ) || exit;
$page_meta = get_post_meta( get_the_ID(), 'pivoo_page_options', true );

if (class_exists( 'Nestbyte_Core' )) {
if (is_tax( 'product_cat' )){
$catmeta = get_term_meta( get_queried_object_id(), 'bissful_woo_cat_options', true );

;


}
}
$hide_breadcrumb = ( ! empty( $page_meta['page_breadcrumb'] ) ) ? $page_meta['page_breadcrumb'] : '';
$page_width = ( ! empty( $page_meta['page_width'] ) ) ? $page_meta['page_width'] : 'container';
$page_b_style= ( ! empty( $page_meta['page_breadcrumb_style'] ) ) ? $page_meta['page_breadcrumb_style'] : '';
if ($page_b_style == 'custom-style'){
    $global_page_icon = ( ! empty( $page_meta['custom_page_icon'] ) ) ? $page_meta['custom_page_icon'] : '';
} else {
    $global_page_icon = cs_get_option('global_page_icon');
}
$desktopcol = cs_get_option('bissful-archive-col');
$mobcol = cs_get_option('bissful-archive-col-mob');
$filterpanel = cs_get_option('bissful-ach-filter-type');
$filtertext = cs_get_option('bissful-filter-shortcode');

$archivelayout = cs_get_option('bissful-archive-type');
$sidebarposition = cs_get_option('archive-sidebar-position');

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



get_header( 'shop' );


/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20 (Removed)
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

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
                                       <?php woocommerce_page_title(); ?>        
                                    </h1>
                                      <p> <?php
        /**
         * Hook: woocommerce_archive_description.
         *
         * @hooked woocommerce_taxonomy_archive_description - 10
         * @hooked woocommerce_product_archive_description - 10
         */
        do_action( 'woocommerce_archive_description' );
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




<section class="bissful-woo-archive-main">
    <div class="container">



        <?php if($archivelayout=="sidebar"){ ?>
        <div class="row gx-6">
            <?php } else { ?>
            <div class="without-sidebar">
                <?php } ?>
                <?php if($archivelayout=="sidebar" && $sidebarposition=="left"){ ?>
                    <div class="d-none d-md-block col-12 col-md-3 bissful-product-archive-sidebar">
                        <?php dynamic_sidebar( 'bissful-woo-sidebar' ); ?>
                    </div>
                <?php } ?>

                <?php if($archivelayout=='sidebar'){ ?>
                <div class="col-12 col-md-9">
                    <?php } else { ?>
                    <div class="w-100">
                        <?php } ?>
                        
                   



                        <div class="row align-items-center bissful-woo-archive-bar">
                            <div class="col-12 col-md-4 pivoo-total-product-count">
                                <?php woocommerce_result_count();?>
                            </div>

                            <div class="col-4 col-md-4 bissful-product-filter-b">
                                
                                <?php if($archivelayout=="sidebar"){ ?>
                                    <div class="d-md-none bissful-mobile-filter-sidebar">
                                        <button class="bissful-m-filter-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#bissfulCatCanvas" aria-controls="bissfulCatCanvas">
                                            <i class="ri-equalizer-line"></i>
                                        </button>
                        
                                        <div class="offcanvas offcanvas-start" tabindex="-1" id="bissfulCatCanvas" aria-labelledby="bissfulCatCanvasLabel">
                                           
                                            <div class="offcanvas-body">
                                                <?php dynamic_sidebar( 'bissful-woo-sidebar' ); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                
                                <?php if($filterpanel=="droppanel"){?>
                                    <a href="javascript:void(0);" class="bissful-product-toogle-btn"><i class="ri-equalizer-line"></i> <span><?php esc_html_e('Filter','bissful');?></span></a>
                                <?php } elseif($filterpanel=="off-canvas"){ ?>
                                    <button class="bissful-filter-offcanvas-btn" data-bs-toggle="offcanvas" data-bs-target="#bissfulproductfilter" aria-controls="bissfulproductfilter">
                                        <i class="ri-equalizer-line"></i> <span><?php esc_html_e('Filter','bissful');?></span>
                                    </button>
                                <?php } ?>
                            </div>
                            <div class="col-8 col-md-4 pivoo-product-filter text-md-end">
                                <?php woocommerce_catalog_ordering();?>
                            </div>
                        </div>
                        <?php if($filterpanel=="droppanel"){?>
                            <div class="bissful-filter-toogle-box">
                                <?php echo do_shortcode('[yith_wcan_filters slug="'.$filtertext.'"]');?>
                            </div>
                        <?php } elseif($filterpanel=="off-canvas"){ ?>
                            <div class="bissful-filter-canvas offcanvas offcanvas-start" tabindex="-1" id="bissfulproductfilter" aria-labelledby="bissfulproductfilterLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="bissfulproductfilterLabel">Filter</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <?php echo do_shortcode('[yith_wcan_filters slug="'.$filtertext.'"]');?>

                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($desktopcol){ ?>
                        <div class="pivoo-shop-product-grid row row-<?php echo esc_html($mobcol);?> row-cols-<?php echo esc_html($desktopcol);?>">
                        <?php } else { ?>
                        <div class="pivoo-shop-product-grid row row-cols-1 row-cols-md-3">
                        <?php } ?>
                        

                            <?php if ( wc_get_loop_prop( 'total' ) ) {
                                while ( have_posts() ) {
                                    the_post();

                                    /**
                                     * Hook: woocommerce_shop_loop.
                                     */
                                    do_action( 'woocommerce_shop_loop' );

                                    wc_get_template_part( 'content', 'product' );
                                }
                            }


                            ?>
                        </div>
                        <?php
                        /**
                         * Hook: woocommerce_after_shop_loop.
                         *
                         * @hooked woocommerce_pagination - 10
                         */
                        do_action( 'woocommerce_after_shop_loop' );

                        ?>
                        

                    <?php if($archivelayout=="sidebar" && $sidebarposition=="right"){ ?>
                        <div class="col-12 d-none d-md-block col-md-3 bissful-product-archive-sidebar">
                            <?php dynamic_sidebar( 'bissful-woo-sidebar' ); ?>
                        </div>
                    <?php } ?>
                                        </div>
                </div>
        
</section>

<?php
                        /**
                         * Hook: woocommerce_after_main_content.
                         *
                         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                         */
                        do_action( 'woocommerce_after_main_content' );

                        ?>
<?php

get_footer( 'shop' );

?>
