<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bissful
 */

$id = is_home() ? get_option('page_for_posts') : get_the_ID();
$page_meta = get_post_meta($id, 'teconce_page_options', true);

$footer_brand_logo_switcher = '';
$footer_newsletter_switcher = '';
if ( !empty($page_meta) && $page_meta['global_page_meta'] == 'enabled'){
	$footer_brand_logo_switcher = !empty($page_meta['footer_brand_logo_switcher_meta']) ? $page_meta['footer_brand_logo_switcher_meta'] : '';
	$footer_newsletter_switcher = !empty($page_meta['footer_newsletter_switcher']) ? $page_meta['footer_newsletter_switcher'] : '';
}else{
	$footer_brand_logo_switcher = cs_get_option('footer_brand_logo_switcher') ? cs_get_option('footer_brand_logo_switcher') : "";
	$footer_newsletter_switcher = cs_get_option('footer_newsletter_switcher') ? cs_get_option('footer_newsletter_switcher') : "";
}

$footer_brand_logo_images = cs_get_option('footer_brand_logo_images') ? cs_get_option('footer_brand_logo_images') : "";
$gallery_ids = explode( ',', $footer_brand_logo_images );

$footer_newsletter_shape_images = cs_get_option('footer_newsletter_shape_images') ? cs_get_option('footer_newsletter_shape_images') : "";
$newsletter_shape_ids = explode(',', $footer_newsletter_shape_images);

$footer_newsletter_title = cs_get_option('footer_newsletter_title') ? cs_get_option('footer_newsletter_title') : "";
$footer_newsletter_shortcode = cs_get_option('footer_newsletter_shortcode') ? cs_get_option('footer_newsletter_shortcode') : "";
$footer_newsletter_section_outside_shape = cs_get_option('footer_newsletter_section_outside_shape') ? cs_get_option('footer_newsletter_section_outside_shape') : "";
?>

<?php if(!empty($footer_brand_logo_switcher)) { ?>
<!-- Logo -->
<div class="sw__service_logo pb-120">
    <div class="container container-1290">
        <div class="sw__brand-logo">
            <div class="container container-1650">
                <div class="swiper sw__brand-logo-items wow fadeInUp" data-wow-delay="0.3s">
                    <div class="swiper-wrapper">
                        <?php
                        if(!empty($gallery_ids)) {
                            foreach ($gallery_ids as $item){
                            ?>
                        <div class="swiper-slide text-center">
                            <img src="<?php echo esc_url(wp_get_attachment_url($item)); ?>" alt="">
                        </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Logo -->
<?php } ?>

<?php if(!empty($footer_newsletter_switcher)) { ?>
<!-- NewsLeatter Start-->
<section class="sw__newsletterv2 position-relative overflow-hidden">
    <div class="sw__newsletterv2-wrapper position-relative">
	    <?php if(!empty($footer_newsletter_section_outside_shape)) { ?>
        <img src="<?php echo esc_url($footer_newsletter_section_outside_shape['url']); ?>" alt="" class="nl-sheap-6 position-absolute d-none d-xl-block" />
	    <?php } ?>
        <div class="container container-1290 position-relative pt-160 pb-160">
            <?php
                if (!empty($newsletter_shape_ids)){
                    $i = 0;
                    foreach ($newsletter_shape_ids as $item){
                        $i++;

            ?>
            <img src="<?php echo esc_url(wp_get_attachment_url($item)); ?>" alt="" class="nl-sheap-<?php echo esc_attr($i); ?> position-absolute" />
            <?php
                    }
                }
            ?>

            <div class="sw__newsletterv2-main">
                <?php if(!empty($footer_newsletter_title)) { ?>
                <h2 class="wd__footer-newsletter sw__pricing-title sw--fs-50 sw--color-black-900  text-center wow fadeInUp" data-wow-delay="0.3s"> <?php echo esc_html($footer_newsletter_title); ?> </h2>
                <?php } ?>
                <?php echo do_shortcode($footer_newsletter_shortcode); ?>
            </div>
        </div>
    </div>
</section>
<!-- NewsLeatter End-->
<?php } ?>

<?php teconce_footer_builder(); ?>
</div>
<?php wp_footer() ?>
</body>
</html>
