<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

// Plugin directory
if ( !function_exists( 'XPC_Product_Quick_View_Path' ) ) {
	function XPC_Product_Quick_View_Path() {
		return untrailingslashit( plugin_dir_url( __FILE__ ) );
	}
}

define( 'PATH', XPC_Product_Quick_View_Path() );
define( 'TEMPLATE_PATH', plugin_dir_path( __FILE__ ) . 'templates/' );

if ( !function_exists( 'XPC_Product_Quick_View_Constructor' ) ) {
	function XPC_Product_Quick_View_Constructor() {
		if ( !class_exists( 'WooCommerce' ) ) {
			return;
		}

		require_once 'functions.php';
		require_once 'class.xpc-quick-view.php';
	}
}
add_action( 'plugins_loaded', 'XPC_Product_Quick_View_Constructor' );
