<?php
$copyright_btn_switcher = cs_get_option( 'footer_copyright_enable' );
$copyright_text         = cs_get_option( 'copyright_text' );
$footer_item_list       = cs_get_option( 'footer_item_list' );
$copyright_switch = cs_get_option( 'footer_copyright_enable' );
?>
<!-- Footer start -->
<footer class="sw__footer">
	<?php if ( is_active_sidebar( 'footer_widget' ) ) { ?>
        <div class="sw__footer-content pt-80 pb-80">
            <div class="container">
                <div class="row g-30 mt-none-30">
					<?php
					dynamic_sidebar( 'footer_widget' );
					?>
                </div>
            </div>
        </div>
	<?php } ?>

	<?php if ( $copyright_switch ) { ?>
        <div class="sw__copyright-section">
            <div class="container">
                <div class="sw__copyright-content">
                    <div class="sw__copyright-text">
						<?php printf( __( '%s', 'bissful' ), cs_get_option( 'copyright_text' ) ); ?>
                    </div>
                    <div class="sw__copyright-nav">
                        <ul>
							<?php
							$copyright_item_list = cs_get_option( 'footer_item_list' );
							if ( is_array( $copyright_item_list ) ) {
								foreach ( cs_get_option( 'footer_item_list' ) as $item ) {
									?>
                                    <li>
                                        <a href="<?php echo esc_url( $item['footer_list_link']['url'] ); ?>"><?php printf(__("%s", 'bissful' ),  $item['footer_list_text']); ?></a>
                                    </li>
									<?php
								}
							}
							?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
	<?php } ?>
</footer>

<!-- Footer end -->
