<?php


/*
 * Blog Like function start
*/

add_action( 'wp_enqueue_scripts', 'pt_like_it_scripts' );
function pt_like_it_scripts() {
	if( is_single() ) {
		wp_enqueue_style( 'like-it', trailingslashit( plugin_dir_url( __FILE__ ) ).'css/like-it.css' );

		wp_enqueue_script( 'like-it', trailingslashit( plugin_dir_url( __FILE__ ) ).'js/like-it.js', array('jquery'), '1.0', true );

		wp_localize_script( 'like-it', 'likeit', array(
			'ajax_url' => admin_url( 'admin-ajax.php' )
		));
	}
}

add_action( 'wp_ajax_nopriv_pt_like_it', 'pt_like_it' );
add_action( 'wp_ajax_pt_like_it', 'pt_like_it' );
function pt_like_it() {

	if ( ! wp_verify_nonce( $_REQUEST['nonce'], 'pt_like_it_nonce' ) || ! isset( $_REQUEST['nonce'] ) ) {
		exit( "No naughty business please" );
	}

	$likes = get_post_meta( $_REQUEST['post_id'], '_pt_likes', true );
	$likes = ( empty( $likes ) ) ? 0 : $likes;
	$new_likes = $likes + 1;

	update_post_meta( $_REQUEST['post_id'], '_pt_likes', $new_likes );

	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		echo $new_likes . " Likes";
		die();
	}
	else {
		wp_redirect( get_permalink( $_REQUEST['post_id'] ) );
		exit();
	}
}
/*
 * Blog Like function end
*/
