<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://teconce.com
 * @since             1.0
 * @package           Teconce_Core
 *
 * @wordpress-plugin
 * Plugin Name:       Teconce Core
 * Plugin URI:        https://teconce.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.2
 * Author:            Teconce
 * Author URI:        https://teconce.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       teconce-core
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
include_once ABSPATH . 'wp-admin/includes/plugin.php';
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TECONCE_CORE_VERSION', '1.2' );


if ( ! defined( 'TECONCE_ADDONS_DIR' ) ) {
	define( 'TECONCE_ADDONS_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'TECONCE_ADDONS_URL' ) ) {
	define( 'TECONCE_ADDONS_URL', plugin_dir_url( __FILE__ ) );
}

if (!defined('TECONCE_PLUGIN_DIR')){
	define('TECONCE_PLUGIN_DIR', plugin_dir_path( __DIR__ ));
}

require_once TECONCE_ADDONS_DIR . 'assets/like-it-function.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-teconce-core-activator.php
 */
function activate_teconce_core() {
	require_once TECONCE_ADDONS_DIR . 'includes/class-teconce-core-activator.php';
	Teconce_Core_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-teconce-core-deactivator.php
 */
function deactivate_teconce_core() {
	require_once TECONCE_ADDONS_DIR . 'includes/class-teconce-core-deactivator.php';
	Teconce_Core_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_teconce_core' );
register_deactivation_hook( __FILE__, 'deactivate_teconce_core' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require TECONCE_ADDONS_DIR . 'includes/class-teconce-core.php';
require TECONCE_ADDONS_DIR . 'elementor/class-elementor-main.php';
require TECONCE_ADDONS_DIR . 'library/codestar/codestar-framework.php';
require TECONCE_ADDONS_DIR . 'library/theme-options/theme-options.php';
require TECONCE_ADDONS_DIR . 'library/theme-options/theme-panels.php';
require TECONCE_ADDONS_DIR . 'library/social-share.php';
require TECONCE_ADDONS_DIR . 'library/teconce-cpt.php';
require TECONCE_ADDONS_DIR . 'library/teconce-helper.php';
require TECONCE_ADDONS_DIR . 'library/theme-options/extends/custom-color-options.php';
require TECONCE_ADDONS_DIR . 'library/theme-options/extends/custom-gradient-options.php';
require TECONCE_ADDONS_DIR . 'library/theme-options/extends/custom-color-group.php';


require TECONCE_ADDONS_DIR . 'library/metabox/page-meta.php';
require TECONCE_ADDONS_DIR . 'library/metabox/user-meta.php';
require TECONCE_ADDONS_DIR . 'library/metabox/service-meta.php';
require TECONCE_ADDONS_DIR . 'library/teconce-nav-options.php';
require TECONCE_ADDONS_DIR . 'library/teconce-custom-css.php';
require TECONCE_ADDONS_DIR . 'library/teconce-custom-widget.php';
require TECONCE_ADDONS_DIR . 'library/metabox/team-meta.php';

require TECONCE_ADDONS_DIR . 'library/widgets/about-info.php';
require TECONCE_ADDONS_DIR . 'library/widgets/about-info-v3.php';
require TECONCE_ADDONS_DIR . 'library/widgets/contact-info.php';
require TECONCE_ADDONS_DIR . 'library/widgets/useful-link.php';
require TECONCE_ADDONS_DIR . 'library/widgets/newsletter.php';
require TECONCE_ADDONS_DIR . 'library/widgets/newsletter-v3.php';


require TECONCE_ADDONS_DIR . 'library/license/TeconceLicense.php';
require TECONCE_ADDONS_DIR . 'library/extension/ttc-ajax-filter/ttc-ajax-filter.php';
//custom taxonomy
require TECONCE_ADDONS_DIR . 'taxonomy/brands.php';


if ( !class_exists( 'WooCommerce' ) ) {
    //require TECONCE_ADDONS_DIR . 'library/metabox/woo-meta.php';
    //require TECONCE_ADDONS_DIR . 'library/extension/woo-swatches/index.php';
    //require TECONCE_ADDONS_DIR . 'library/extension/teconce-live-search/product-search.php';
    //require TECONCE_ADDONS_DIR . 'library/extension/woo-sale-countdown/woo-sale-countdown.php';
    //require TECONCE_ADDONS_DIR . 'library/extension/woo-stuffs/login.php';
    //require TECONCE_ADDONS_DIR . 'library/extension/woo-stuffs/register.php';
    //require TECONCE_ADDONS_DIR . 'library/extension/woo-stuffs/custom-taxonomy-options.php';
    //require TECONCE_ADDONS_DIR . 'library/extension/woo-stuffs/wishlist.php';
    //require TECONCE_ADDONS_DIR . 'library/extension/woo-quick-view/init.php';
    
    
}

add_filter( 'woocommerce_product_tabs', 'dokan_remove_seller_info_tab', 50 );
function dokan_remove_seller_info_tab( $array ) {
    unset( $array['seller'] );
    unset( $array['more_seller_product'] );
    return $array;
}






/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_teconce_core() {

	$plugin = new Teconce_Core();
	$plugin->run();

}
run_teconce_core();


