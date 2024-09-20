<?php

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'teconce_page_options';

  //
  // Create a metabox
  CSF::createMetabox( $prefix, array(
    'title'              => 'Page Options',
    'post_type'          => 'page',
    'data_type'          => 'serialize',
    'context'            => 'advanced',
    'priority'           => 'default',
    'exclude_post_types' => array(),
    'page_templates'     => '',
    'post_formats'       => '',
    'show_restore'       => false,
    'enqueue_webfont'    => true,
    'async_webfont'      => false,
    'output_css'         => true,
    'theme'              => 'dark',
    'class'              => '',
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Breadcrumb Options',
    'fields' => array(

      array(
          'id'      => 'page_breadcrumb',
          'type'    => 'switcher',
          'title'   => 'Page Breadcrumb',
          'default' => true
        ),
        array(
            'id'      => 'custom_breadcrumb_title',
            'type'    => 'text',
            'title'   => 'Custom Breadcrumb Title',
            'dependency' => array( 'page_breadcrumb', '==', 'true' ),
        ),
        array(
          'id'         => 'page_breadcrumb_style',
          'type'       => 'button_set',
          'title'      => 'Breadcrumb Style',
          'options'    => array(
            'global-style'  => 'Global',
            'custom-style' => 'Custom',
          ),
          'default'    => 'global-style'
        ),
	    array(
		    'id'      => 'breadcrumb_shape_image',
		    'type'    => 'media',
		    'title'   => 'Breadcrumb Shape Image',
		    'library' => 'image',
		    'dependency' => array( 'page_breadcrumb_style', '==', 'custom-style' ),
	    ),
	    array(
		    'id' => 'breadcrumb_bg_color',
		    'type' => 'teconce_gradient',
		    'title' => 'Background Color',
		    'output' => '.sw_bredcrumb',
		    'output_mode' => 'background-color',
		    'dependency' => array( 'page_breadcrumb_style', '==', 'custom-style' ),
	    ),
	    array(
		    'id' => 'breadcrumb_color',
		    'type' => 'teconce_gradient',
		    'title' => 'Breadcrumb Color',
		    'output' => ".breadcrumb li",
		    'output_mode' => 'color',
		    'dependency' => array( 'page_breadcrumb_style', '==', 'custom-style' ),

	    ),
	    array(
		    'id' => 'breadcrumb_margin',
		    'type' => 'spacing',
		    'title' => 'Margin',
		    'output' => '.sw_bredcrumb',
		    'output_mode' => 'margin',
		    'dependency' => array( 'page_breadcrumb_style', '==', 'custom-style' ),
	    ),

	    array(
		    'id' => 'breadcrumb_padding',
		    'type' => 'spacing',
		    'title' => 'Padding',
		    'output' => '.sw_bredcrumb_wrapper_container',
		    'output_mode' => 'padding',
		    'dependency' => array( 'page_breadcrumb_style', '==', 'custom-style' ),
	    ),

    )
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Page Options',
    'fields' => array(

       array(
          'id'         => 'page_width',
          'type'       => 'button_set',
          'title'      => 'Set page width',
          'options'    => array(
            'container'  => 'Boxed',
            'container-fluid' => 'Full Width',
          ),
          'default'    => 'container-fluid'
        ),
        array(
            'id'          => 'page_container_padding',
            'type'        => 'spacing',
            'title'       => 'Page Container Padding',
            'output'      => ['.site-main > .container', '.site-main > .container-fluid'],
            'output_mode' => 'padding', // or margin, relative
        ),

        array(
          'id'         => 'global_page_meta',
          'type'       => 'button_set',
          'title'      => 'Post Options Type',
          'options'    => array(
            'disabled' => 'Global',
            'enabled'  => 'Custom',

          ),
          'default'    => 'disabled'
        ),
        array(
            'id' => 'teconce-header-style',
            'type' => 'image_select',
            'title' => 'Header Style',
            'options' => array(
                'style-one' => get_template_directory_uri() . '/assets/images/header-1.jpg',
                'style-two' => get_template_directory_uri() . '/assets/images/header-2.jpg',
                'style-three' => get_template_directory_uri() . '/assets/images/header-3.jpg',
            ),
            'default' => 'style-one',
            'dependency' => array( 'global_page_meta', '==', 'enabled' ),
        ),
        array(
            'id' => 'main-logo',
            'type' => 'media',
            'title' => 'Logo',
            'dependency' => array( 'global_page_meta', '==', 'enabled' ),
        ),
        array(
            'id' => 'teconce-footer-style',
            'type' => 'image_select',
            'title' => 'Footer Style',
            'options' => array(
                'style-one' => get_template_directory_uri() . '/assets/images/footer-1.jpg',
                'style-two' => get_template_directory_uri() . '/assets/images/footer-2.jpg',
                'style-three' => get_template_directory_uri() . '/assets/images/footer-3.jpg',
            ),
            'default' => 'style-one',
            'dependency' => array( 'global_page_meta', '==', 'enabled' ),
        ),

        array(
          'id'          => 'select_header_blocks_meta',
          'type'        => 'select',
          'title'       => 'Select Custom Header',
          'placeholder' => 'Select a Header',
          'dependency' => array( 'global_page_meta', '==', 'enabled' ),
          'options'     => 'posts',
          'query_args'  => array(
            'post_type' => 'teconce_header',
          ),
        ),

         array(
          'id'          => 'select_footer_blocks_meta',
          'type'        => 'select',
          'title'       => 'Select Custom Footer',
          'placeholder' => 'Select a Footer',
          'dependency' => array( 'global_page_meta', '==', 'enabled' ),
          'options'     => 'posts',
          'query_args'  => array(
            'post_type' => 'teconce_footer',
          ),
        ),

    )
  ) );

    // Create Header Style
    CSF::createSection( $prefix, array(
        'title'  => 'Header Style',
        'fields' => array(
            array(
                'id' => 'top_header_bg_color_style_two',
                'type' => 'teconce_gradient',
                'title' => 'Top Header BG Color',
                'output' => '.nb__top-header',
                'output_mode' => 'background',
            ),
            array(
                'id'    => 'Top-Header-Content-color',
                'type'  => 'color',
                'title' => 'Top Header Content Color',
                'output' => array('.nb__info-items a', '.nb__info-items p', '.nb__info-items a', ),
            ),
            array(
                'id'    => 'Top-Header-icon-color',
                'type'  => 'color',
                'title' => 'Top Header Icon Color',
                'output' => '.nb__info-items a i, .nb__info-items a i, .nb__info-items i',
            ),
            array(
                'id'    => 'Top-Header-social-hover-color',
                'type'  => 'color',
                'title' => 'Top Header Social Icon Hover Color',
                'output' => '.nb__top-social-icon a:hover i',
            ),
            array(
                'id'    => 'Top-Header-border-color',
                'type'  => 'color',
                'title' => 'Top Header Border Color',
                'output' => '.nb__info-items::after',
                'output_mode' => 'background',
            ),
            array(
                'id' => 'main_header_color',
                'type' => 'teconce_gradient',
                'title' => 'Main Header Background',
                'output' => array('.nbv2_header.nb-bg2' , '.nb__main-header'),
                'output_mode' => 'background',
            ),
            array(
                'id'    => 'main-header-border-bottom-color',
                'type'  => 'color',
                'title' => 'Main Header Bottom Border Color',
                'output' => '.nb__main-header',
                'output_mode' => 'border-bottom-color',
            ),
            array(
                'id'    => 'nav-color',
                'type'  => 'color',
                'title' => 'Nav Color',
                'output' => array('.nbv2_header_wrraper_navbar ul li a', '.nbv2_header_wrraper_navbar .nb__navmenu > ul li.has-submenu::after', '.nb__navmenu > ul li a' , '.nb__navmenu > ul li.has-submenu::after' )
            ),
            array(
                'id'    => 'dropdown-nav-color',
                'type'  => 'color',
                'title' => 'Dropdown Nav Color',
                'output' => array('.nb__navmenu > ul li.has-submenu > .submenu-wrapper li a')
            ),
            array(
                'id'    => 'nav-Border-color',
                'type'  => 'color',
                'title' => 'Nav Border Color',
                'output' => array('.nb__navmenu > ul > li > a::before', '.nb__navmenu > ul li.has-submenu > .submenu-wrapper li a::before', '.nb__navmenu > ul li.has-submenu > .submenu-wrapper li a::before', '.nb__navmenu > ul > li > a::before' , '.nb__navmenu > ul li.has-submenu > .submenu-wrapper li a::before'),
                'output_mode' => 'background',
            ),
            array(
                'id'    => 'nav-Hover-color',
                'type'  => 'color',
                'title' => 'Nav Hover Color',
                'output' => array('.nb__navmenu > ul li:hover > a' , '.nb__navmenu > ul li.has-submenu > .submenu-wrapper li:hover > a' , '.nb__navmenu > ul li:hover > a', '.nb__navmenu > ul li.has-submenu > .submenu-wrapper li:hover > a')
            ),
            array(
                'id'    => 'Phone-Number-color',
                'type'  => 'color',
                'title' => 'Phone Number Color',
                'output' => '.nbv2_header_right.nb-ahbr',
            ),
            array(
                'id' => 'Phone-Number-hover-color',
                'type' => 'teconce_gradient',
                'title' => 'Phone Number Hover Color',
                'output' => '.nbv2_header_right.nb-ahbr',
                'output_mode' => 'background',
            ),
            array(
                'id'    => 'Search-Icon-color',
                'type'  => 'color',
                'title' => 'Search Icon Color',
                'output' => '.search__button i',
            ),
            array(
                'id'    => 'Search-Input-text-color',
                'type'  => 'color',
                'title' => 'Search Input Text Color',
                'output' => '.nd__search:focus-within input',
            ),
            array(
                'id'    => 'Offcanvas-Icon-color',
                'type'  => 'color',
                'title' => 'Offcanvas Icon Color',
                'output' => '.header-toggle span',
                'output_mode' => 'background-color',
            ),
            array(
                'id'    => 'Offcanvas-Icon-BG-color',
                'type'  => 'color',
                'title' => 'Offcanvas Icon BG Color',
                'output' => '.header-toggle',
                'output_mode' => 'background-color',
            ),
            array(
                'id'    => 'Offcanvas-Description-color',
                'type'  => 'color',
                'title' => 'Offcanvas Description Color',
                'output' => '.offcanvus-box .content-top p',
            ),
        )
    ) );

    // Create Footer Style
    CSF::createSection( $prefix, array(
        'title'  => 'Footer Style',
        'fields' => array(
	        array(
		        'id'    => 'footer_bg_shapes',
		        'type'  => 'media',
		        'title' => 'Footer BG Shapes',
		        'dependency' => array( 'teconce-footer-style', '!=', 'style-one' ),
	        ),
	        array(
		        'id'    => 'footer_bg_shapes_2',
		        'type'  => 'media',
		        'title' => 'Footer BG Shapes 2',
		        'dependency' => array( 'teconce-footer-style', '==', 'style-three' ),
	        ),
	        array(
		        'id'     => 'footer_bg_color',
		        'type'   => 'color',
		        'title'  => 'Footer BG Color',
		        'output' => array('.sw__footerv2', '.sw__footer', '.sw__footerv3'),
		        'output_mode' => 'background-color'
	        ),

	        array(
		        'id'     => 'footer_widget_title_color',
		        'type'   => 'color',
		        'title'  => 'Footer Widget Title Color',
		        'output' => array('.sw__footer-widget-title'),
	        ),

	        array(
		        'id'     => 'footer_widget_content_color',
		        'type'   => 'color',
		        'title'  => 'Footer Widget content Color',
		        'output' => array('.sw__footer-about-info', '.sw__footer-useful-list a', '.sw__footer-contact-deatils h4', '.sw__footer-contact-deatils a', '.sw__footer-subscribe-info' ),
	        ),

	        array(
		        'id'     => 'footer_widget_Content_icon_color',
		        'type'   => 'color',
		        'title'  => 'Footer Widget Content Icon Color',
		        'output' => array('.sw__footer-useful-list a:before', '.sw__footer-contact-icon i'),
	        ),
	        array(
		        'id'     => 'footer_widget_social_icon_color',
		        'type'   => 'color',
		        'title'  => 'Footer Widget Social Icon Color',
		        'output' => array('.sw__footer-social-list a'),
	        ),
	        array(
		        'id'     => 'footer_widget_social_icon_hover_color',
		        'type'   => 'color',
		        'title'  => 'Footer Widget Social Icon Hover Color',
		        'output' => array('.sw__footer-social-list a:hover'),
	        ),
	        array(
		        'id'     => 'footer_widget_social_icon_BG_color',
		        'type'   => 'color',
		        'title'  => 'Footer Widget Social Icon BG Color',
		        'output' => array('.sw__footer-social-list a'),
		        'output_mode' => 'background-color'
	        ),
	        array(
		        'id'     => 'footer_widget_social_icon_section_BG_color',
		        'type'   => 'color',
		        'title'  => 'Footer Widget Social Icon Section BG Color',
		        'output' => array('.sw__footer-social-list'),
		        'output_mode' => 'background-color'
	        ),
	        array(
		        'id'    => 'footer_widget_Social_icon_section_padding',
		        'type'  => 'spacing',
		        'title' => 'Social Icon Section Padding',
		        'output_mode' => 'padding',
		        'output'      => '.sw__footer-social-list',
	        ),
        )
    ) );

	// Create Footer Style
	CSF::createSection( $prefix, array(
		'title'  => 'Footer Brand Logo',
		'fields' => array(
			array(
				'id'      => 'footer_brand_logo_switcher_meta',
				'type'    => 'switcher',
				'title'   => 'Footer Brand Logo Switcher',
				'label'   => 'Before Enable/Disable Select The "Post Options Type" Custom From Page Option',
				'default' => false,
			),
		)
	) );

	// Create Footer Style
	CSF::createSection( $prefix, array(
		'title'  => 'Footer Newsletter',
		'fields' => array(
			array(
				'id'      => 'footer_newsletter_switcher',
				'type'    => 'switcher',
				'title'   => 'Footer Newsletter Switcher',
				'label'   => 'Before Enable/Disable Select The "Post Options Type" Custom From Page Option',
				'default' => false,
			),
		)
	) );



}
