<?php

if ( !function_exists( 'xpcqv_get_template_part' ) ) {
	function xpcqv_get_template_part( $template_name, $params = array() ) {
		global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;

		/*template name*/
		$template = $template_name . '.php';

		/*check if a custom template exists in the theme folder, if not, load the plugin template file*/
		if ( $theme_file = locate_template( 'woocommerce/' . $template ) ) {
			$file = $theme_file;
		} else {
			$file = TEMPLATE_PATH . $template;
		}

		if ( is_array( $wp_query->query_vars ) ) {
			extract( $wp_query->query_vars, EXTR_SKIP );
		}
		extract($params, EXTR_SKIP);

		// load the template
		require( $file );
	}
}

if ( !function_exists( 'xpcqv_button' ) ) {
	function xpcqv_button() {
		global $post;
		$params = array(
			'button_class' => 'xpc-quick-view',
			'image_class'  => 'wc-loading-button-open'
		);
		xpcqv_get_template_part( 'xpcqv-button', $params );
	}
}

/*add quick view button*/
add_action('teconce_add_quick_view_action', 'xpcqv_button', 15);