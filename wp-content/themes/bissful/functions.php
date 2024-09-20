<?php
/**
 * Bissful functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bissful
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.3');
}
#-----------------------------------------------------------------#
# Defined Constants
#-----------------------------------------------------------------#/
if (!defined('BISSFUL_PATH')) define('BISSFUL_PATH', get_template_directory());
if (!defined('BISSFUL_URL')) define('BISSFUL_URL', get_template_directory_uri());
define('BISSFUL_THEME_DIR', wp_normalize_path(BISSFUL_PATH . '/'));
define('BISSFUL_THEME_URI', preg_replace('/^http(s)?:/', '', BISSFUL_URL) . '/');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bissful_setup()
{
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on Bissful, use a find and replace
        * to change 'bissful' to the name of your theme in all the template files.
        */
    load_theme_textdomain('bissful', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support('title-tag');

    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'main-menu' => esc_html__('Main menu', 'bissful'),
            'mobile-menu' => esc_html__('Mobile menu', 'bissful'),
        )
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'bissful_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );

    add_image_size( 'bissful_post_archive_feature_img', 850, 575, true );
    add_image_size( 'bissful_elementor_gallery_widget_size_one', 560, 623, true );
    add_image_size( 'bissful_elementor_gallery_widget_size_two', 560, 300, true );
    add_image_size( 'bissful_elementor_property_listing_thumbnail', 410, 270, true );
    add_image_size( 'bissful_elementor_property_listing_thumbnail_home', 541, 550, true );
    add_image_size( 'bissful_projects_grid_630_x_552', 630, 552, true );
    add_image_size( 'bissful_projects_grid_410_x_552', 410, 552, true );
	update_option( 'elementor_unfiltered_files_upload', '1' );
}

add_action('after_setup_theme', 'bissful_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bissful_content_width()
{
    $GLOBALS['content_width'] = apply_filters('bissful_content_width', 640);
}

add_action('after_setup_theme', 'bissful_content_width', 0);



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bissful_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Bissful Sidebar', 'bissful'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'bissful'),
            'before_widget' => '<section id="%1$s" class="widget %2$s nl-widget has_fade_anim">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title nl-font-heading nl-fs-22 nl-lh-26 nl-color-black pb-15">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Bissful Footer Widget One', 'bissful'),
            'id' => 'footer_widget',
            'description' => esc_html__('Add Footer One widgets here.', 'bissful'),
            'before_widget' => '<div id="%1$s" class="%2$s ">',
            'after_widget' => '</div>',
            'before_title' => '',
            'after_title' => '',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Footer Two About', 'bissful'),
            'id' => 'footer_two_about',
            'description' => esc_html__('Footer Style Two About Content', 'bissful'),
            'before_widget' => '<div id="%1$s" class="%2$s sw__footer-two-about">',
            'after_widget' => '</div>',
            'before_title' => '',
            'after_title' => '',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Footer Two Useful link', 'bissful'),
            'id' => 'footer_two_useful_link',
            'description' => esc_html__('Footer Style Two Useful link', 'bissful'),
            'before_widget' => '<div id="%1$s" class="%2$s sw__footer-two-useful_link">',
            'after_widget' => '</div>',
            'before_title' => '',
            'after_title' => '',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Footer Two Contact', 'bissful'),
            'id' => 'footer_two_contact',
            'description' => esc_html__('Footer Style Two Contact', 'bissful'),
            'before_widget' => '<div id="%1$s" class="%2$s sw__footer-two-contact">',
            'after_widget' => '</div>',
            'before_title' => '',
            'after_title' => '',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Footer Two Newsletter', 'bissful'),
            'id' => 'footer_two_newsletter',
            'description' => esc_html__('Footer Style Two Newsletter', 'bissful'),
            'before_widget' => '<div id="%1$s" class="%2$s sw__footer-two-newsletter">',
            'after_widget' => '</div>',
            'before_title' => '',
            'after_title' => '',
        )
    );
	register_sidebar(
		array(
			'name' => esc_html__('Footer Three About', 'bissful'),
			'id' => 'footer_three_about',
			'description' => esc_html__('Footer Style Three About Content', 'bissful'),
			'before_widget' => '<div id="%1$s" class="%2$s sw__footer-three-about">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__('Footer Three Useful link', 'bissful'),
			'id' => 'footer_three_useful_link',
			'description' => esc_html__('Footer Style Three Useful link', 'bissful'),
			'before_widget' => '<div id="%1$s" class="%2$s sw__footer-three-useful_link">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__('Footer Three Newsletter', 'bissful'),
			'id' => 'footer_three_newsletter',
			'description' => esc_html__('Footer Style Three Newsletter', 'bissful'),
			'before_widget' => '<div id="%1$s" class="%2$s sw__footer-three-newsletter">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
		)
	);

}

add_action('widgets_init', 'bissful_widgets_init');

/*
 * This filter for add different class for footer widget
 * */

function custom_footer_widget_classes($params) {
	// Define the ID of your footer widget area
	$footer_widget_id = 'footer_widget';


	// Check if the current sidebar being processed is the footer widget area
	if ($params[0]['id'] == $footer_widget_id) {
		global $wp_registered_widgets;

		$widget_id = $params[0]['widget_id'];
		$widget_obj = $wp_registered_widgets[$widget_id];

		// Get the widgets currently active in the footer widget area
		$active_widgets = wp_get_sidebars_widgets();

		// Get the index of the current widget among the active widgets in the footer widget area
		$widget_index = array_search($widget_id, $active_widgets[$footer_widget_id]);

		// Define the class based on the widget's position
		$class = '';
		if ($widget_index === 0) {
			// First widget
			$class = 'col-xl-3 col-md-6 wow fadeInUp';
		} elseif ($widget_index == 1) {
			// Odd-indexed widgets
			$class = 'col-xl-3 offset-xl-1 col-md-6 wow fadeInUp';
		} elseif ($widget_index == 2) {
			// Odd-indexed widgets
			$class = 'col-xl-2 col-md-6 wow fadeInUp';
		} else {
			// Even-indexed widgets
			$class = 'col-xl-3 col-md-6 wow fadeInUp';
		}

		// Modify the before_widget parameter to include the custom class
		$params[0]['before_widget'] = preg_replace('/class="/', 'class="' . $class . ' ', $params[0]['before_widget'], 1);
	}

	return $params;
}
add_filter('dynamic_sidebar_params', 'custom_footer_widget_classes');



/**
 * Enqueue scripts and styles.
 */
function bissful_scripts()
{
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css2?family=Arimo:ital@0;1&family=Bona+Nova:ital@0;1&display=swap', array(), _S_VERSION);
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), _S_VERSION);
    wp_enqueue_style('fontawesome-all-min', get_template_directory_uri() . '/assets/css/all.min.css', array(), _S_VERSION);
    wp_enqueue_style('iconsax', get_template_directory_uri() . '/assets/css/iconsax-style.css', array(), _S_VERSION);
    wp_enqueue_style('iconly', get_template_directory_uri() . '/assets/css/iconly.css', array(), _S_VERSION);
    wp_enqueue_style('lity', get_template_directory_uri() . '/assets/css/lity.min.css', array(), _S_VERSION);
    wp_enqueue_style('swiper-bundle', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), _S_VERSION);
    wp_enqueue_style('odometer', get_template_directory_uri() . '/assets/css/odometer-theme-default.css', array(), _S_VERSION);
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', array(), _S_VERSION);
	wp_enqueue_style('theme-default-style', get_template_directory_uri() . '/assets/css/theme-default.css', array(), _S_VERSION);
	wp_enqueue_style('bissful-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_enqueue_style('custom-font', '//fonts.googleapis.com/css2?family=Arimo:ital@0;1&family=Bona+Nova:ital@0;1&display=swap', array(), _S_VERSION);
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css', array(), _S_VERSION);
    wp_enqueue_style('responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array(), _S_VERSION);
    wp_style_add_data('bissful-style', 'rtl', 'replace');


    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('lity', get_template_directory_uri() . '/assets/js/lity.min.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('swiper-bundle', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('appear', get_template_directory_uri() . '/assets/js/appear.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('odometer', get_template_directory_uri() . '/assets/js/odometer.min.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('parallax-scroll', get_template_directory_uri() . '/assets/js/parallax-scroll.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('wow-min', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('global-script', get_template_directory_uri() . '/js/global.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('ThemeAnim', get_template_directory_uri() . '/assets/js/ThemeAnim.js', array('jquery'), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'bissful_scripts');

/**
 * Enqueue scripts and styles in admin panel.
 */
function bissful_register_admin_styles()
{
    wp_enqueue_style('bissful-admin-css', get_template_directory_uri() . '/assets/css/admin.css', array(), _S_VERSION);
    wp_enqueue_style('iconly', get_template_directory_uri() . '/assets/css/iconly.css', array(), _S_VERSION);
}

add_action('admin_enqueue_scripts', 'bissful_register_admin_styles');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Functions For Widget post
 */
require get_template_directory() . '/inc/template-post.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}
/**
 * Breadcrumb.
 */
require get_template_directory() . '/inc/breadcrumb.php';
/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
    require get_template_directory() . '/inc/vendor/woo-single-product-structure.php';
}
/**
 * Bissful Comments
 */
require get_template_directory() . '/inc/bissful_comment.php';

/**
 * Admin Page
 */
require get_template_directory() . '/inc/admin/admin.php';
require get_template_directory() . '/inc/admin/admin-init.php';

/**
 * Merlin Enqueue
 */
if (!is_customize_preview() && is_admin()) {

    require_once(get_template_directory() . '/inc/admin/merlin/vendor/autoload.php');
    require_once(get_template_directory() . '/inc/admin/merlin/class-merlin.php');
    require_once(get_template_directory() . '/inc/admin/merlin/merlin-config.php');
    require_once(get_template_directory() . '/inc/admin/merlin/merlin-filters.php');
}

/**
 * Remove contact form 7 auto p
 */
add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * Disable widget block editor
 */
add_filter( 'use_widgets_block_editor', '__return_false' );


/*
 * Modify WP default category widget and
 * add post count number in anchor " <a> " tag
 */
function custom_category_link($output, $category = '', $category_base = '') {
    $pattern = '/<\/a> \((\d+)\)/'; // Match the closing </a> tag and post count
    $replacement = ' <span>($1)</span></a>'; // Add the post count inside the link
    $output = preg_replace($pattern, $replacement, $output);
    return $output;
}
add_filter('wp_list_categories', 'custom_category_link', 10, 3);






/*------------------
* Comment Form Modification Start
---------------------*/
function bissful_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;?>

    <li <?php comment_class();?> id="comment-<?php comment_ID()?>">
        <div class="article d-flex gap-4">
            <?php if ( get_avatar( $comment ) ) {?>
                <div class="author-pic">
                    <?php echo get_avatar( $comment, 104, '', '', ['class'=> 'rounded-circle'] ); ?>
                </div>
            <?php }?>
            <div class="details">
                <div class="author-meta">
                    <div class="name">
                        <h4><?php comment_author(); ?></h4>
                    </div>
                    <div class="date">
                        <span><?php echo date(get_option('date_format')); ?></span>
                    </div>
                    <div class="comment-content">
                        <?php comment_text();?>
                    </div>
                    <div class="reply">
                        <?php comment_reply_link( array_merge( $args, array( 'reply_text'=>wp_kses('Reply', true), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );?>
                    </div>
                </div>

                <?php if ( $comment->comment_approved == '0' ): ?>
                    <p><em><?php esc_html_e( 'Your comment is awaiting moderation.', 'bissful' );?></em></p>
                <?php endif;?>
            </div>
        </div>
    </li>


    <?php
}


// comment Move Field
function bissful_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['author'];
    $comment_field = $fields['email'];
    $comment_field = $fields['comment'];
    $comment_field = $fields['cookies'];

    unset($fields['author']);
    unset($fields['email']);
    unset($fields['url']);
    unset($fields['comment']);
    unset($fields['cookies']);


    $fields['author'] = '<div class="col-6 col-md-6"><p class="comment-form-author"><input type="text" id="author" name="author" require="required" placeholder="Name"></p></div>';
    $fields['email'] = '<div class="col-6 col-md-6"><p class="comment-form-email"><input type="text" id="email" name="email" require="required" placeholder="Email"></p></div>';
    $fields['comment'] = '<div class="col-12 col-md-12"><p class="comment-form-comment"><textarea id="comment" name="comment" required="required" placeholder="Comment"></textarea></p></div>';


    return $fields;
}
add_filter( 'comment_form_fields', 'bissful_move_comment_field_to_bottom' );

/**
 * Comment Message Box
 */
function bissful_comment_reform( $arg ) {

    $arg['title_reply']   = esc_html__( 'Leave a comment', 'bissful' );
    return $arg;

}
add_filter( 'comment_form_defaults', 'bissful_comment_reform' );

/*------------------
* Comment Form Modification End
---------------------*/
