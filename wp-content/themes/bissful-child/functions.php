<?php
/**
 * Theme functions and definitions.
 */
function bissful_child_enqueue_styles() {
    if ( SCRIPT_DEBUG ) {
        wp_enqueue_style( 'bissful-style' , get_template_directory_uri() . '/style.css' );
    } else {
        wp_enqueue_style( 'bissful-minified-style' , get_template_directory_uri() . '/style.min.css' );
    }
    wp_enqueue_style( 'bissful-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'bissful-style' ),
        wp_get_theme()->get('Version')
    );
}
add_action(  'wp_enqueue_scripts', 'bissful_child_enqueue_styles' );