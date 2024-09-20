<?php
// Register Taxonomy Brand
function create_brand_tax() {

    $labels = array(
        'name'              => _x( 'Brands', 'taxonomy general name', 'teconce' ),
        'singular_name'     => _x( 'Brand', 'taxonomy singular name', 'teconce' ),
        'search_items'      => __( 'Search Brands', 'teconce' ),
        'all_items'         => __( 'All Brands', 'teconce' ),
        'parent_item'       => __( 'Parent Brand', 'teconce' ),
        'parent_item_colon' => __( 'Parent Brand:', 'teconce' ),
        'edit_item'         => __( 'Edit Brand', 'teconce' ),
        'update_item'       => __( 'Update Brand', 'teconce' ),
        'add_new_item'      => __( 'Add New Brand', 'teconce' ),
        'new_item_name'     => __( 'New Brand Name', 'teconce' ),
        'menu_name'         => __( 'Brand', 'teconce' ),
    );
    $args = array(
        'labels' => $labels,
        'description' => __( '', 'teconce' ),
        'hierarchical' => true,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_in_quick_edit' => true,
        'show_admin_column' => false,
        'show_in_rest' => true,
    );
    register_taxonomy( 'brand', array('product'), $args );

}
add_action( 'init', 'create_brand_tax' );