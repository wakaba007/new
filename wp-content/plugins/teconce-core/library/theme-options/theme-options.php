<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

    //
    // Set a unique slug-like ID
    $prefix = 'teconce_options';

    //
    // Create options
    //
    CSF::createOptions($prefix, array(

        // framework title
        'framework_title' => 'Teconce Options <small>by Teconce</small>',
        'framework_class' => '',

        // menu settings
        'menu_title' => 'Teconce Options',
        'menu_slug' => 'teconce_options',
        'menu_type' => 'submenu',
        'menu_parent' => 'teconce-admin-menu',
        'menu_capability' => 'manage_options',
        'menu_icon' => null,
        'menu_position' => null,
        'menu_hidden' => false,

        // menu extras
        'show_bar_menu' => true,
        'show_sub_menu' => true,
        'show_in_network' => true,
        'show_in_customizer' => false,

        'show_search' => true,
        'show_reset_all' => true,
        'show_reset_section' => true,
        'show_footer' => true,
        'show_all_options' => true,
        'show_form_warning' => true,
        'sticky_header' => true,
        'save_defaults' => true,
        'ajax_save' => true,

        // admin bar menu settings
        'admin_bar_menu_icon' => 'teconce-icon icon-broccoli',
        'admin_bar_menu_priority' => 80,

        // footer
        'footer_text' => '',
        'footer_after' => '',
        'footer_credit' => '. Exclusive Options by Teconce Technology',

        // database model
        'database' => '', // options, transient, theme_mod, network
        'transient_time' => 0,

        // contextual help
        'contextual_help' => array(),
        'contextual_help_sidebar' => '',

        // typography options
        'enqueue_webfont' => true,
        'async_webfont' => false,

        // others
        'output_css' => true,

        // theme and wrapper classname
        'theme' => 'dark',
        'class' => '',

        // external default values
        'defaults' => array(),

    ));

}
