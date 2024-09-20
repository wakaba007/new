<?php

if ( ! function_exists( 'teconce_custom_widget_init' ) ) {
	function teconce_custom_widget_init() {
	    $teconce_options = get_option( 'teconce_options' );
	    $teconce_custom_sidebars = $teconce_options['custom_sidebar'];
			if ($teconce_custom_sidebars) {
				foreach($teconce_custom_sidebars as $teconce_custom_sidebar) :
				$heading = $teconce_custom_sidebar['sidebar_name'];
				$own_id = preg_replace('/[^a-z]/', "-", strtolower($heading));
				$desc = $teconce_custom_sidebar['sidebar_desc'];

				register_sidebar( array(
					'name' => esc_html($heading),
					'id' => $own_id,
					'description' => esc_html($desc),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h3 class="nb-fw7 nb-wcl nb-ffh nb-f24 position-relative nb-wlcolorp pl-10 mt-30">',
					'after_title' => '</h3>',
				) );
				endforeach;
			}
		}
	add_action( 'widgets_init', 'teconce_custom_widget_init' );
}