<?php
$id = is_home() ? get_option('page_for_posts') : get_the_ID();
$page_meta = get_post_meta($id, 'teconce_page_options', true);

if (!empty($page_meta) && $page_meta['global_page_meta'] == 'enabled' && !empty($page_meta['main-logo']['url'])) {
    $main_logo = $page_meta['main-logo'];
} else {
    $main_logo = cs_get_option('main-logo');
}

$mobile_logo = cs_get_option('mobile-logo');
$header_phone_number_fieldset = cs_get_option('header_phone_number_fieldset');
$header_phone_svg_switcher = cs_get_option('header_phone_svg_switcher');
$header_phone_text = cs_get_option('header_phone_text');
$header_button_fieldset = cs_get_option('header_button_fieldset');


?>
<!-- Header Start -->
<header id="sw-header-area" class="sw__header-one sw__main-header-wrap is-sticky">
    <div class="sw__main-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-lg-3">
                    <div class="sw__logo">
	                    <?php if (is_array($main_logo) && !empty($main_logo['url'])) { ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo esc_url($main_logo['url']); ?>" alt="logo">
                            </a>
	                    <?php } else { ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-black.svg" alt="logo" class="img-fluid">
                            </a>
	                    <?php } ?>
                    </div>
                </div>
                <div class="col-6 col-lg-9 d-flex align-items-center justify-content-end justify-content-md-between">
                    <nav class="sw__navmenu text-center ps-xl-5 ul-li d-none d-lg-block sw__navmenu-color-white">
	                    <?php
	                    $replace_menu_class = str_replace('menu-item-has-children', 'has-submenu', wp_nav_menu(
			                    array(
				                    'theme_location' => 'main-menu',
				                    'echo' => false,
				                    'container' => '',
			                    )
		                    )
	                    );
	                    $replace_menu_class = str_replace('sub-menu', 'submenu-wrapper', $replace_menu_class);

                        if(has_nav_menu('main-menu')) {
                            printf("%s", $replace_menu_class);
                        } else {
                            echo '<ul>';
                            echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" >' . esc_attr( 'Add a menu', 'crete' ) . '</a></li>';
                            echo '</ul>';
                        }
	                    ?>
                    </nav>

                    <?php if(is_array($header_button_fieldset) && !empty($header_button_fieldset['header_button_text'])) { ?>
                    <div class="sw__button sw__header-v1-btn wow fadeInLeft d-none d-md-flex" data-wow-delay="0.3s">
                        <a href="<?php echo esc_url($header_button_fieldset['header_button_link']['url']); ?>">
                            <span><?php _e($header_button_fieldset['header_button_text'], 'bissful'); ?></span>
                        </a>
                    </div>
                    <?php } ?>
                    <button type="button" class="header-toggle mobile-menu-toggle d-lg-none">
                        <span class="offcanvas_border_one"></span>
                        <span></span>
                    </button>
                </div>
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
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
            <img src="<?php echo esc_url($mobile_logo['url']); ?>" alt="logo" class="img-fluid">
        </a>
	<?php } else { ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-black.svg" alt="logo"
                 class="img-fluid">
        </a>
	<?php } ?>
	<?php
	$replace_menu_class = str_replace('menu-item-has-children', 'has-submenu', wp_nav_menu(
			array(
				'theme_location' => 'mobile-menu',
				'echo' => false,
				'container' => '',
				'menu_class' => 'mobile-nav-menu'
			)
		)
	);
	$replace_menu_class = str_replace('sub-menu', 'submenu-wrapper', $replace_menu_class);
	printf("%s", $replace_menu_class);
	?>
</div>
<!--mobile menu end-->