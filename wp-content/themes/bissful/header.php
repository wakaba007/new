<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bissful
 */

$default_fav_icon = get_template_directory_uri() . "/assets/images/favicon.png";
$fav_icon                 = cs_get_option( 'teconce-favicon' );
$enable_disable_preloader = cs_get_option( 'enable_disable_preloader' );
$preloader_image          = cs_get_option( 'preloader_image' );


?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="
    <?php
    if ( is_array( $fav_icon ) && !empty($fav_icon['url']) ) {
		echo esc_url( $fav_icon['url'] );
	}else{
        echo esc_url($default_fav_icon);
    } ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>
<?php if ( $enable_disable_preloader == 'enabled' ) { ?>
    <div class="preloader" id="preloader">
        <svg viewBox="0 0 1920 1080" preserveAspectRatio="none" version="1.1">
            <path d="M0,0 C305.333333,0 625.333333,0 960,0 C1294.66667,0 1614.66667,0 1920,0 L1920,1080 C1614.66667,1080 1294.66667,1080 960,1080 C625.333333,1080 305.333333,1080 0,1080 L0,0 Z"></path>
        </svg>
        <div class="inner">
            <canvas class="progress-bar" id="progress-bar" width="200" height="200"></canvas>
            <figure>
				<?php if ( is_array( $preloader_image ) && ! empty( $preloader_image['url'] ) ) { ?>
                    <img src="<?php echo esc_url( $preloader_image['url'] ); ?>" alt="Image">
					<?php
				} else {
					?>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/preloader.svg" alt="Image">
					<?php
				}
				?>

            </figure>
            <small>Loading</small></div>
    </div>
<?php } ?>
<!-- end preloader -->

<!--BACK TO TOP BUTTON Start-->
<!-- css includes in theme-default.css and js includes in global.js -->
<div class="m-backtotop" aria-hidden="true">
    <div class="arrow">
        <i class="fa fa-arrow-up"></i>
    </div>
    <div class="text">
		<?php _e( 'Back to top', 'bissful' ); ?>
    </div>
</div>
<!--BACK TO TOP BUTTON End-->


<div class="section-wrapper" data-scroll-section>
	<?php teconce_header_builder(); ?>
