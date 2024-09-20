<?php
$copyright_btn_switcher = cs_get_option( 'footer_copyright_enable' );
$copyright_text         = cs_get_option( 'copyright_text' );
$footer_item_list       = cs_get_option( 'footer_item_list' );
$copyright_switch       = cs_get_option( 'footer_copyright_enable' );
$footer_bg_shapes       = cs_get_option( 'footer_bg_shapes_style_two' );


?>
<!-- Footer start -->
<footer class="sw__footerv2 sw--Bg-color-black-900 position-relative overflow-hidden">
    <div class="sw__footerv2-shep d-flex justify-content-center position-absolute">
		<?php
		if ( ! empty( $footer_bg_shapes ) ) {
			?>
            <img src="<?php echo esc_url( $footer_bg_shapes['url'] ); ?>" alt="">
			<?php
		}
		?>
    </div>

    <div class="container container-1290 pt-80 pb-80">
        <div class="row g-30 mt-none-30">
			<?php if ( is_active_sidebar( 'footer_two_about' ) ) { ?>
                <div class="col-lg-3 col-md-6">
					<?php
					dynamic_sidebar( 'footer_two_about' );
					?>
                </div>
			<?php } ?>
            <div class="col-lg-1 col-md-6"></div>
			<?php if ( is_active_sidebar( 'footer_two_useful_link' ) ) { ?>
                <div class="col-lg-2 col-md-6">
					<?php
					dynamic_sidebar( 'footer_two_useful_link' );
					?>
                </div>
			<?php } ?>
			<?php if ( is_active_sidebar( 'footer_two_contact' ) ) { ?>
                <div class="col-lg-3 col-md-6">
					<?php
					dynamic_sidebar( 'footer_two_contact' );
					?>
                </div>
			<?php } ?>
			<?php if ( is_active_sidebar( 'footer_two_newsletter' ) ) { ?>
                <div class="col-lg-3 col-md-6">
					<?php
					dynamic_sidebar( 'footer_two_newsletter' );
					?>
                </div>
			<?php } ?>
        </div>
    </div>
	<?php if ( $copyright_switch ) { ?>
        <div class="container container-1290">
            <div class="swv2_footer_bottom d-flex flex-column flex-md-row align-items-center justify-content-md-between pt-25 pb-25 sw-dw sw-cr">
                <p class="sw--fs-16"> <?php printf( __( '%s', 'bissful' ), cs_get_option( 'copyright_text' ) ); ?> </p>
                <div class="swv2_footer_bottom_link d-flex justify-content-between gap-3 sw-dw sw-ac">

					<?php
					$copyright_item_list = cs_get_option( 'footer_item_list' );
					if ( is_array( $copyright_item_list ) ) {
						foreach ( cs_get_option( 'footer_item_list' ) as $item ) {
							?>
                            <a href="<?php echo esc_url( $item['footer_list_link']['url'] ); ?>" class="sw_animation_text_link sw--fs-16">
                                <span class="sw_animation_text_linksp"><?php printf(__("%s", 'bissful' ),  $item['footer_list_text']); ?></span>
                            </a>
							<?php
						}
					}
					?>

                </div>
            </div>
        </div>
	<?php } ?>
</footer>
<!-- Footer end -->