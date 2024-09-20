<?php
$id = is_home() ? get_option('page_for_posts') : get_the_ID();
$page_meta = get_post_meta($id, 'teconce_page_options', true);

if (!empty($page_meta) && $page_meta['global_page_meta'] == 'enabled' && !empty($page_meta['main-logo']['url'])) {
    $main_logo = $page_meta['main-logo'];
} else {
    $main_logo = cs_get_option('main-logo');
}

$mobile_logo = cs_get_option('mobile-logo');
$offcanvas_switcher = cs_get_option('offcanvas_switcher');
$offcanvas_description = cs_get_option('offcanvas_description');
$offcanvas_gallery_img = cs_get_option('offcanvas_gallery_img');
$offcanvas_gallery_img_id = explode( ',', $offcanvas_gallery_img );
$offcanvas_newsletter_title = cs_get_option('offcanvas_newsletter_title');
$offcanvas_newsletter_shortcode = cs_get_option('offcanvas_newsletter_shortcode');

?>
<!-- Header Start -->
<header id="sw-header-area" class="sw__header-two sw__main-header-wrap is-sticky">
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
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-white.svg"
                                     alt="logo" class="img-fluid">
                            </a>
	                    <?php } ?>
                    </div>
                </div>
                <div class="col-6 col-lg-9 d-flex align-items-center justify-content-end sw__main-header-button-menue">
                    <nav class="sw__navmenu text-center ps-xl-5 ul-li d-none d-xl-block">
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
                    <?php if ($offcanvas_switcher){ ?>
                    <button type="button" class="header-toggle offcanvus-toggle d-xl-inline-flex d-none">
                        <span class="offcanvas_border_one"></span>
                        <span></span>
                    </button>
                    <?php } ?>
                    <button type="button" class="header-toggle mobile-menu-toggle d-xl-none">
                        <span class="offcanvas_border_one"></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
<?php if($offcanvas_switcher) { ?>
<!--offcanvus start-->
<div class="offcanvus-box position-fixed sw--Bg-color-black-900">
    <a href="javascript:void(0)" class="offcanvus-close">
        <i class="isax icon-close-circle1"></i>
    </a>
    <div class="content-top">
	    <?php if (is_array($main_logo) && !empty($main_logo['url'])) { ?>
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo esc_url($main_logo['url']); ?>" alt="logo">
            </a>
	    <?php } else { ?>
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-white.svg"
                     alt="logo" class="img-fluid">
            </a>
	    <?php } ?>
        <?php if(!empty($offcanvas_description)) { ?>
        <p class="mb-0 mt-30 sw--color-white"> <?php printf(__('%s', 'bissful'),$offcanvas_description); ?> </p>
        <?php } ?>
    </div>
    <div class="offcanvus-gallery d-flex align-items-center flex-wrap">
        <?php
        if(!empty($offcanvas_gallery_img_id)) {
            foreach ($offcanvas_gallery_img_id as $item_id){
                echo wp_get_attachment_image($item_id);
            }
        }
        ?>
    </div>

    <div class="offcanvus-newswetter mt-20 pl-20 pr-20">
        <?php if(!empty($offcanvas_newsletter_title)) { ?>
        <h6 class="mb-4 text-center sw--fs-27 sw--color-white"><?php printf(__('%s', 'bissful'),$offcanvas_newsletter_title); ?></h6>
        <?php } ?>
        <?php echo do_shortcode($offcanvas_newsletter_shortcode); ?>

    </div>

</div>
<!--offcanvus end-->
<?php } ?>

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
