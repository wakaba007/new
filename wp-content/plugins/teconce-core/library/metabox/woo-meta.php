<?php

// Control core classes for avoid errors
if (class_exists('CSF')) {

    //
    // Set a unique slug-like ID
    $prefix = 'teconce_woo_options';

    //
    // Create a metabox
    CSF::createMetabox($prefix, array(
        'title' => 'Teconce Woo Options',
        'post_type' => 'product',
        'data_type' => 'unserialize',
        'context' => 'advanced',
        'priority' => 'default',
        'exclude_post_types' => array(),
        'page_templates' => '',
        'post_formats' => '',
        'show_restore' => false,
        'enqueue_webfont' => true,
        'async_webfont' => false,
        'output_css' => true,
        'theme' => 'dark',
        'class' => '',
    ));

    //
    // Create a section
    CSF::createSection($prefix, array(
        'title' => 'Breadcrumb Options',
        'fields' => array(

            array(
                'id' => 'woo_breadcrumb',
                'type' => 'switcher',
                'title' => 'Disable Global Option',
                'default' => false
            ),
            array(
                'id' => 'metas_woo_breadcumb_padding',
                'type' => 'spacing',
                'title' => 'Breradcrumb Padding',
                'output' => '.teconce-single-woo-breadcrumbs.teconce-woo-breadcumb',
                'output_mode' => 'padding', // or margin, relative
                'dependency' => array('woo_breadcrumb', '==', 'true'),
                'default' => array(
                    'top' => '65',
                    'right' => '15',
                    'bottom' => '58',
                    'left' => '15',
                    'unit' => 'px',
                ),
            ),

            array(
                'id' => 'metas_bd_woo_bg_color',
                'type' => 'teconce_gradient',
                'title' => 'Breadcrumb Background Color',
                'output' => '.teconce-single-woo-breadcrumbs.teconce-woo-breadcumb',
                'dependency' => array('woo_breadcrumb', '==', 'true'),
                'output_mode' => 'background' // Supports css properties like ( border-color, color, background-color etc )
            ),

            array(
                'id' => 'metas_bd_woo_txt_color',
                'type' => 'teconce_gradient',
                'title' => 'Breadcrumb Text Color',
                'output' => '.teconce-single-woo-breadcrumbs.teconce-woo-breadcumb,
          .teconce-single-woo-breadcrumbs.teconce-woo-breadcumb h1, 
          .teconce-single-woo-breadcrumbs.teconce-woo-breadcumb .teconce-breadcrumb a, 
          .teconce-single-woo-breadcrumbs.teconce-woo-breadcumb .teconce-breadcrumb, 
          .teconce-single-woo-breadcrumbs.teconce-woo-breadcumb .woocommerce-breadcrumb a, 
          .teconce-single-woo-breadcrumbs.teconce-woo-breadcumb .woocommerce-breadcrumb',
                'dependency' => array('woo_breadcrumb', '==', 'true'),
                'output_mode' => 'color' // Supports css properties like ( border-color, color, background-color etc )
            ),


            array(
                'id' => 'metas_title_hide_woo',
                'type' => 'switcher',
                'title' => 'Product Title Hide from Breadcrumb',
                'text_on' => 'Show',
                'text_off' => 'Hide',
                'dependency' => array('woo_breadcrumb', '==', 'true'),
                'text_width' => 120
            ),


        )
    ));

    //
    // Create a section
    CSF::createSection($prefix, array(
        'title' => 'Product Options',
        'fields' => array(

            array(
                'id' => 'woo_Gallery_option_global',
                'type' => 'switcher',
                'title' => 'Disable Global Option',
                'default' => false
            ),

            array(
                'id' => 'meta_s_woo_layout',
                'type' => 'select',
                'title' => 'Product Layout Style',
                'placeholder' => 'Select an option',
                'options' => array(
                    'style_one' => 'Style One',
                    'style_two' => 'Style Two',
                    'style_three' => 'Style Three',
                    'style_four' => 'Style Four',

                ),
                'default' => 'style_one',
                'dependency' => array('woo_Gallery_option_global', '==', 'true'),
            ),

            array(
                'id' => 'm_pr_layout_system',
                'type' => 'select',
                'title' => 'Product Left Side State',
                'placeholder' => 'Select an option',
                'options' => array(
                    'normal' => 'Normal',
                    'sticky' => 'Sticky',

                ),
                'default' => 'normal'
            ),

            array(
                'id' => 'meta_woo_thumb_style',
                'type' => 'button_set',
                'title' => 'Gallery Thumbnail Style',
                'multiple' => false,
                'options' => array(
                    'lside' => 'Left Side',
                    'bottom' => 'Bottom',
                    'rside' => 'Right Side',
                    'grid' => 'Grid V1',
                    'grid2' => 'Grid V2',
                    'single' => 'Single',

                ),
                'default' => 'bottom',

                'dependency' => array('woo_Gallery_option_global', '==', 'true'),
            ),

            array(
                'id' => 'meta_tab_style_woo',
                'type' => 'button_set',
                'title' => 'Description Style',
                'multiple' => false,
                'options' => array(
                    'accordion' => 'Accordion',
                    'vtab' => 'Vertical Tab',
                    'tab' => 'Tab',

                ),
                'default' => 'vtab',
                'dependency' => array('woo_Gallery_option_global', '==', 'true'),
            ),
        )
    ));

    // Create a section
    CSF::createSection($prefix, array(
        'title' => 'Return Policy',
        'fields' => array(

            array(
                'id' => 'woo_return_poligy_global',
                'type' => 'switcher',
                'title' => 'Disable Global Return Policy Option',
                'default' => false
            ),
            array(
                'id'    => 'return_policy_editor',
                'type'  => 'wp_editor',
                'title' => 'Return Policy',
                'dependency' => array('woo_return_poligy_global', '==', 'true'),
            ),
        )
    ));

    // Create a section
    CSF::createSection($prefix, array(
        'title' => 'FAQ',
        'fields' => array(

            array(
                'id' => 'woo_FAQ_global',
                'type' => 'switcher',
                'title' => 'Disable Global FAQ Option',
                'default' => false
            ),
            array(
                'id' => 'enable_list_style_faq',
                'type' => 'switcher',
                'title' => 'Enable List Style Faq',
                'default' => false,
                'dependency' => array(
                    array('woo_FAQ_global', '==', 'true' ),
                ),
            ),

            array(
                'id'        => 'woo_product_faqs',
                'type'      => 'group',
                'title'     => 'Product FAQ',
                'fields'    => array(
                    array(
                        'id'      => 'faq_title',
                        'type'    => 'text',
                        'title'   => 'Faq Title',
                        'default' => 'FAQ Title'
                    ),
                    array(
                        'id'    => 'faq_content',
                        'type'  => 'wp_editor',
                        'title' => 'FAQ Content',
                    ),
                ),
                'dependency' => array(
                    array('woo_FAQ_global', '==', 'true' ),
                    array('enable_list_style_faq', '==', 'false' )
                ),

            ),


//            Start newfaq from here
            array(
                'id'     => 'faq_repeater_list_items',
                'type'   => 'repeater',
                'title'  => 'FAQ List Items',
                'fields' => array(
                    array(
                        'id'      => 'faq_tab_title',
                        'type'    => 'text',
                        'title'   => 'Faq Tab Title',
                        'default' => 'FAQ Tab Title'
                    ),
                    array(
                        'id'        => 'woo_product_faqs',
                        'type'      => 'group',
                        'title'     => 'FAQ Content',
                        'fields'    => array(
                            array(
                                'id'      => 'faq_title',
                                'type'    => 'text',
                                'title'   => 'Faq Title',
                                'default' => 'FAQ Title'
                            ),
                            array(
                                'id'    => 'faq_content',
                                'type'  => 'wp_editor',
                                'title' => 'FAQ Content',
                            ),
                        ),
                    ),


                ),

                'dependency' => array(
                    array('woo_FAQ_global', '==', 'true' ),
                    array('enable_list_style_faq', '==', 'true' )
                ),
            ),

        ),

    ));

//    Additional Meta
    CSF::createSection($prefix, array(
        'title' => 'Additionial Meta',
        'fields' => array(
            array(
                'id' => 'woo_single_additional_meta',
                'type' => 'switcher',
                'title' => 'Disable Product Additional Meta',
                'default' => false
            ),
            array(
                'id'     => 'product_additionl_meta',
                'type'   => 'repeater',
                'title'  => 'Product Additonal Meta',
                'fields' => array(
                    array(
                        'id'    => 'meta_label',
                        'type'  => 'text',
                        'title' => 'Label'
                    ),
                    array(
                        'id'    => 'meta_info',
                        'type'  => 'text',
                        'title' => 'Info'
                    ),
                ),
                'dependency' => array('woo_single_additional_meta', '==', 'true'),
            ),
        ),
    ));

    //    Product Labels
    CSF::createSection($prefix, array(
        'title' => 'Product Labels',
        'fields' => array(
            array(
                'id'    => 'product_label',
                'type'  => 'text',
                'title' => 'Product Label'
            ),
            array(
                'id'     => 'product_label_color',
                'type'   => 'color',
                'title'  => 'Product Label Color',
                'output' => '.teconce__product-label'
            ),
            array(
                'id'          => 'product_label_background',
                'type'        => 'color',
                'title'       => 'Product Label Background',
                'output'      => '.teconce__product-label',
                'output_mode' => 'background-color'
            ),
        ),
    ));

}


// Control core classes for avoid errors
if (class_exists('CSF')) {

    //
    // Set a unique slug-like ID
    $prefix = 'teconce_woo_cat_options';

    //
    // Create taxonomy options
    CSF::createTaxonomyOptions($prefix, array(
        'taxonomy' => 'product_cat',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ));

    //
    // Create a section
    CSF::createSection($prefix, array(
        'fields' => array(

            array(
                'id' => 'xpc-woo-cat-bg',
                'type' => 'teconce_gradient',
                'title' => 'Background Color',
            ),
            array(
                'id' => 'xpc-woo-cat-bg-hover-color',
                'type' => 'teconce_gradient',
                'title' => 'Background Hover Color',
            ),

            array(
                'id' => 'category_gallery_em',
                'type' => 'gallery',
                'title' => 'Category Slider',
            ),
            array(
                'id' => 'xpc_woo_cat_icon',
                'type' => 'upload',
                'title' => 'Cat Icon/Image',
            ),

        )
    ));

}
