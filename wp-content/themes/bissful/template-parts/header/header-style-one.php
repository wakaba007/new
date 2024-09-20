<?php
$id        = is_home() ? get_option( 'page_for_posts' ) : get_the_ID();
$page_meta = get_post_meta( $id, 'teconce_page_options', true );

if ( ! empty( $page_meta ) && $page_meta['global_page_meta'] == 'enabled' && ! empty( $page_meta['main-logo']['url'] ) ) {
	$main_logo = $page_meta['main-logo'];
} else {
	$main_logo = cs_get_option( 'main-logo' );
}

$mobile_logo                  = cs_get_option( 'mobile-logo' );
$header_phone_number_fieldset = cs_get_option( 'header_phone_number_fieldset' );
$header_phone_svg_switcher    = cs_get_option( 'header_phone_svg_switcher' );
$header_phone_text            = cs_get_option( 'header_phone_text' );
$header_button_fieldset       = cs_get_option( 'header_button_fieldset' );
$header_social_repeater       = cs_get_option( 'header_social_repeater' );


?>
<!-- Header Start -->
<header id="sw-header-area" class="sw__header-three sw__main-header-wrap is-sticky sw--Bg-color-white">
    <div class="sw__main-header sw__main-headerv3">
        <div class="row align-items-center">
            <div class="col-7 col-sm-4 col-lg-2">
                <div class="sw__logo">
					<?php if ( is_array( $main_logo ) && ! empty( $main_logo['url'] ) ) { ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php echo esc_url( $main_logo['url'] ); ?>" alt="logo">
                        </a>
					<?php } else { ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-black.svg" alt="logo" class="img-fluid">
                        </a>
					<?php } ?>
                </div>
            </div>
            <div class="col-5 col-sm-8 col-lg-10 d-flex align-items-center justify-content-xl-between justify-content-end sw__main-header-button-menue">
                <nav class="sw__navmenu sw__navmenuv3 text-center ul-li d-none d-xl-block">
					<?php
					$replace_menu_class = str_replace( 'menu-item-has-children', 'has-submenu', wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'echo'           => false,
								'container'      => '',
							)
						)
					);
					$replace_menu_class = str_replace( 'sub-menu', 'submenu-wrapper', $replace_menu_class );

					if(has_nav_menu('main-menu')) {
                        printf("%s", $replace_menu_class);
                    } else {
                        echo '<ul>';
                        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" >' . esc_attr( 'Add a menu', 'crete' ) . '</a></li>';
                        echo '</ul>';
                    }

					?>
                </nav>
                <div class="header-rightv3 align-items-center gap-4">
                    <div class="header-social-icon">
                        <?php
                        if (is_array($header_social_repeater)){
                            foreach ($header_social_repeater as $social_item){
                                ?>
                                <a href="<?php echo esc_url($social_item['social_link']['url']); ?>">
                                    <i class="<?php echo esc_attr($social_item['social_icon']); ?>"></i>
                                </a>
                        <?php
                            }
                        }
                        ?>
                    </div>
					<?php if ( is_array( $header_button_fieldset ) && ! empty( $header_button_fieldset['header_button_text'] ) ) { ?>
                        <div class="sw__button sw__button-header-v3">
                            <a href="<?php echo esc_url( $header_button_fieldset['header_button_link']['url'] ); ?>">
								<?php _e( $header_button_fieldset['header_button_text'], 'bissful' ); ?>
                            </a>
                        </div>
					<?php } ?>
                </div>
                <button type="button" class="header-toggle mobile-menu-toggle d-xl-none">
                    <span class="offcanvas_border_one"></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->

<!--mobile menu start-->
<div class="mobile-menu ul-li">
    <a href="javascript:void(0)" class="close">
        <i class="isax icon-close-circle1"></i>
    </a>
	<?php if ( $mobile_logo['url']) { ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
            <img src="<?php echo esc_url( $mobile_logo['url'] ); ?>" alt="logo" class="img-fluid">
        </a>
	<?php } else { ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-black.svg" alt="logo"
                 class="img-fluid">
        </a>
	<?php } ?>
	<?php
	$replace_menu_class = str_replace( 'menu-item-has-children', 'has-submenu', wp_nav_menu(
			array(
				'theme_location' => 'mobile-menu',
				'echo'           => false,
				'container'      => '',
				'menu_class'     => 'mobile-nav-menu'
			)
		)
	);
	$replace_menu_class = str_replace( 'sub-menu', 'submenu-wrapper', $replace_menu_class );
	printf("%s", $replace_menu_class);
	?>
</div>
<!--mobile menu end-->