<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
define( 'TECONCE_ELEMENTOR_URL', plugins_url( '/', __FILE__ ) );
define( 'TECONCE_ELEMENTOR_PATH', plugin_dir_path( __FILE__ ) );
define( 'TECONCE_ELEMENTOR_ROOT_URL', plugins_url( __FILE__ ) );
define( 'TECONCE_ELEMENTOR_PL_ROOT_URL', plugin_dir_url(  __FILE__ ) );
define( 'TECONCE_ELEMENTOR_MODULES_PATH', TECONCE_ELEMENTOR_PATH . 'modules/' );
define( 'TECONCE_PL_ASSETS', trailingslashit( TECONCE_ELEMENTOR_PL_ROOT_URL . 'assets' ) );
define( 'TECONCE_STICKY_ASSETS_URL', TECONCE_ELEMENTOR_URL . 'assets/' );
define( 'TECONCE_HEADER_MODULES_URL', TECONCE_ELEMENTOR_URL . 'modules/' );
define( 'TECONCE_ELEMENTOR_STICKY_TPL', TECONCE_ELEMENTOR_PATH . 'library/sticky-header/' );

define( 'TECONCE_TEMPLATES_FOR_ELEMENTOR_VERSION', '2.9' );
 define( 'TECONCE_ROOT_FILE__', __FILE__ );

require_once TECONCE_ELEMENTOR_PATH.'inc/teconce-element-cat.php';
require_once TECONCE_ELEMENTOR_PATH.'inc/teconce-elementor-assets.php';
require_once TECONCE_ELEMENTOR_PATH.'inc/teconce-custom-icon.php';
require_once TECONCE_ELEMENTOR_PATH.'inc/teconce-elementor-functions.php';
require_once TECONCE_ELEMENTOR_PATH.'library/template-importer/index.php';
//require_once TECONCE_ELEMENTOR_PATH.'library/sticky-header/xpsc-elementor.php';



/*
 * Custom Category Register
 * */
function teconce_elementor_widget_category( $elements_manager ) {

	$categories = [];
	$categories['teconce-ele-widgets-cat'] = [
		'title' => __( 'Teconce Elements', 'teconce-core' ),
		'icon' => 'eicon-plug',
	];

	$categories['teconce-header-elements'] = [
		'title' => __( 'Teconce Header', 'teconce-core' ),
		'icon' => 'eicon-plug',
	];

	$categories['teconce-footer-elements'] = [
		'title' => __( 'Teconce Footer', 'teconce-core' ),
		'icon' => 'eicon-plug',
	];

	$old_categories = $elements_manager->get_categories();

	$categories = array_merge($categories, $old_categories);

	$set_categories = function ( $categories ) {
		$this->categories = $categories;
	};
	$set_categories->call( $elements_manager, $categories );

}
add_action( 'elementor/elements/categories_registered', 'teconce_elementor_widget_category' );

/*
 * Add Custom Widget icon
 * */
add_action('elementor/editor/after_enqueue_styles', 'teconce_widget_icon_style');
function teconce_widget_icon_style(){
	$cs_icon = plugins_url( 'assets/images/teconce_logo.svg', __FILE__ );
	wp_add_inline_style( 'elementor-editor', '.elementor-element .icon .teconce-custom-icon{content: url( '.$cs_icon.');width: 28px;}' );
}

/*
 * Register Elementor Widget
 * */
function teconce_elementor_elements(){
	require_once TECONCE_ELEMENTOR_PATH.'widgets/header/logo.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/header/main-nav.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/header/search.php';
	//require_once TECONCE_ELEMENTOR_PATH.'widgets/header/my-account.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/header/vertical-menu.php';
    require_once TECONCE_ELEMENTOR_PATH.'widgets/header/icon-lists.php';

	require_once TECONCE_ELEMENTOR_PATH.'widgets/footer/footer-common-widget.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/footer/footer-woo-tag-list.php';

    require_once TECONCE_ELEMENTOR_PATH.'widgets/hero.php';
    require_once TECONCE_ELEMENTOR_PATH.'widgets/wishes-quote.php';
    require_once TECONCE_ELEMENTOR_PATH.'widgets/about.php';
    require_once TECONCE_ELEMENTOR_PATH.'widgets/program.php';
    require_once TECONCE_ELEMENTOR_PATH.'widgets/brand-logo.php';
    require_once TECONCE_ELEMENTOR_PATH.'widgets/guest.php';
    require_once TECONCE_ELEMENTOR_PATH.'widgets/gallery.php';
    require_once TECONCE_ELEMENTOR_PATH.'widgets/testimonial.php';
    require_once TECONCE_ELEMENTOR_PATH.'widgets/countdown.php';
    require_once TECONCE_ELEMENTOR_PATH.'widgets/video-popup.php';
    require_once TECONCE_ELEMENTOR_PATH.'widgets/blog.php';
    require_once TECONCE_ELEMENTOR_PATH.'widgets/newsletter.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/hero-v2.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/about-v2.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/wedding.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/service.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/countdown-v2.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/gallery-v2.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/pricing.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/contact.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/testimonial-v2.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/newsletter-v2.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/blog-v2.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/hero-v3.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/bride-and-groom.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/day-count.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/about-v3.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/our-story.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/gallery-v3.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/guest-v2.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/testimonial-v3.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/contact-v2.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/blog-v3.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/newsletter-v3.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/project.php';
	require_once TECONCE_ELEMENTOR_PATH.'widgets/single-project-banner.php';


}
add_action('elementor/widgets/register','teconce_elementor_elements');


/*
 * Elementor editor style enqueue
 * */

add_action('elementor/editor/before_enqueue_scripts', function() {
    wp_enqueue_style('teconce-elpreview-style',TECONCE_PL_ASSETS . 'css/teconce-editor-style.css',[],'1.0');
});

//Elementor Custom controls added
//Added control in Elementor image gallery
function inject_heading_controls_galary( $element, $args ) {

    $element->start_controls_section(
        'custom_Style',
        [
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'label' => esc_html__( 'Custom Style', 'textdomain' ),
        ]
    );

    $element->add_responsive_control(
        'Gap',
        [
            'label' => esc_html__( 'Gap', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'em' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .gallery' => 'grid-gap: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $element->add_responsive_control(
        'Image_margin',
        [
            'label' => esc_html__( 'Image Margin', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
            'selectors' => [
                '{{WRAPPER}} .elementor-image-gallery .gallery-item img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $element->add_responsive_control(
        'wrap',
        [
            'label' => esc_html__( 'Wrap', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'nowrap' => [
                    'icon' => 'eicon-flex eicon-nowrap',
                ],
                'wrap' => [
                    'icon' => 'eicon-flex eicon-wrap',
                ],
            ],
            'toggle' => true,
            'selectors' => [
                '{{WRAPPER}} .gallery' => 'flex-wrap: {{VALUE}};',
            ],
        ]
    );
    $element->add_control(
        'Image-width',
        [
            'label' => esc_html__( 'Image Width', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .elementor-image-gallery .gallery-item img' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $element->end_controls_section();

}
add_action( 'elementor/element/image-gallery/section_gallery/after_section_end', 'inject_heading_controls_galary', 10, 2 );