<?php
// Create a top-tab
CSF::createSection($prefix, array(
    'id' => 'header', // Set a unique slug-like ID
    'title' => 'Header',
    'icon' => 'fa fa-arrow-up',
));

// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'header', // The slug id of the parent section
    'title' => 'Logo',
    'fields' => array(
        array(
            'id' => 'main-logo',
            'type' => 'media',
            'title' => 'Logo',
        ),
        
         array(
            'id' => 'mobile-logo',
            'type' => 'media',
            'title' => 'Mobile Offcanvas Logo',
        ),

        array(
            'id' => 'teconce-favicon',
            'type' => 'media',
            'title' => 'Favicon',
        ),

        array(
            'id' => 'logo-width',
            'type' => 'slider',
            'title' => 'Logo Width',
            'min' => 10,
            'max' => 300,
            'step' => 1,
            'unit' => 'px',
            'output' => '.sw__logo img',
            'output_mode' => 'width',
        ),
    )


));

CSF::createSection($prefix, array(
    'parent' => 'header', // The slug id of the parent section
    'title' => 'Header Style',
    'fields' => array(
        array(
            'id' => 'teconce-header-style',
            'type' => 'image_select',
            'title' => 'Header Style',
            'options' => array(
	            'style-one' => get_template_directory_uri() . '/assets/images/header-1.jpg',
	            'style-two' => get_template_directory_uri() . '/assets/images/header-2.jpg',
	            'style-three' => get_template_directory_uri() . '/assets/images/header-3.jpg',
            ),
            'default' => 'style-three'
        ),
	    array(
		    'id' => 'header_button_fieldset',
		    'type' => 'fieldset',
		    'title' => 'Header Button',
		    'fields' => array(
			    array(
				    'id' => 'header_button_text',
				    'type' => 'text',
				    'default' => 'Get a quote +',
				    'title' => 'Header Button Text',
			    ),
			    array(
				    'id'    => 'header_button_link',
				    'type'  => 'link',
				    'title' => 'Header Button Link',
			    ),
		    ),
		    'dependency' => array('teconce-header-style', '!=', 'style-two'),
	    ),

        array(
            'id'     => 'header_social_repeater',
            'type'   => 'repeater',
            'title'  => 'Social Icon',
            'dependency' => array( 'teconce-header-style', '==', 'style-one' ),
            'fields' => array(
                array(
                    'id'    => 'social_icon',
                    'type'  => 'icon',
                    'title' => 'Icon',
                ),
                array(
                    'id'    => 'social_link',
                    'type'  => 'link',
                    'title' => 'Link',
                ),
            ),
        ),
	    array(
		    'type'    => 'heading',
		    'content' => 'Offcanvas Content',
	    ),
	    array(
		    'id'    => 'offcanvas_switcher',
		    'type'  => 'switcher',
		    'title' => 'Offcanvas Switcher',
		    'default' => true,
	    ),
	    array(
		    'id'      => 'offcanvas_description',
		    'type'    => 'textarea',
		    'title'   => 'Offcanvas Description',
		    'default' => 'Distrak Street 2SK Line, weddix@support.com (+125) 2156-2145',
	    ),
	    array(
		    'id'    => 'offcanvas_gallery_img',
		    'type'  => 'gallery',
		    'title' => 'Offcanvas Gallery',
	    ),
	    array(
		    'id'      => 'offcanvas_newsletter_title',
		    'type'    => 'text',
		    'title'   => 'Offcanvas Newsletter Title',
		    'default' => 'Newsletter',
	    ),
	    array(
		    'id'      => 'offcanvas_newsletter_shortcode',
		    'type'    => 'textarea',
		    'title'   => 'Offcanvas Newsletter Shortcode',
	    ),


	    array(
		    'type'    => 'heading',
		    'content' => 'Main Header Style',
	    ),
        array(
            'id' => 'main_header_color',
            'type' => 'teconce_gradient',
            'title' => 'Main Header Background',
            'output' => array('#sw-header-area'),
            'output_mode' => 'background',
        ),
	    array(
		    'type'    => 'heading',
		    'content' => 'Nav Style',
	    ),
        array(
            'id'    => 'nav-color',
            'type'  => 'color',
            'title' => 'Nav Color',
            'output' => array(
            	'.sw__navmenu.sw__navmenu-color-white > ul li a',
	            '.sw__navmenu.sw__navmenu-color-white > ul li.has-submenu::after'
            )
        ),
        array(
            'id'    => 'dropdown-nav-color',
            'type'  => 'color',
            'title' => 'Dropdown Nav Color',
            'output' => array('.sw__navmenu > ul li.has-submenu > .submenu-wrapper li a')
        ),
        array(
            'id'    => 'dropdown-nav-bg-color',
            'type'  => 'color',
            'title' => 'Dropdown Nav BG Color',
            'output' => array(
            	'.sw__navmenu > ul li.has-submenu > .submenu-wrapper',
            ),
            'output_mode' => 'background',
        ),
        array(
            'id'    => 'nav-Border-color',
            'type'  => 'color',
            'title' => 'Nav Border Color',
            'output' => array(
            	'.sw__navmenu > ul li.has-submenu > .submenu-wrapper li a::before',
	            '.sw__navmenu > ul > li > a:hover::before'
            ),
            'output_mode' => 'background',
        ),
        array(
            'id'    => 'nav-Hover-color',
            'type'  => 'color',
            'title' => 'Nav Hover Color',
            'output' => array(
            	'.sw__navmenu > ul li:hover > a',
	            '.sw__navmenu > ul li.has-submenu > .submenu-wrapper li:hover > a'
            )
        ),
	    array(
		    'type'    => 'heading',
		    'content' => 'Button Style',
	    ),
	    array(
		    'id'    => 'Button-color',
		    'type'  => 'color',
		    'title' => 'Button Color',
		    'output' => array(
			    '.sw__button a'
		    )
	    ),
	    array(
		    'id'    => 'Button-BG-color',
		    'type'  => 'color',
		    'title' => 'Button BG Color',
		    'output' => array(
			    '.sw__button a'
		    ),
		    'output_mode' => 'background',
	    ),
	    array(
		    'id'     => 'button_border',
		    'type'   => 'border',
		    'title'  => 'Button Border',
		    'output' => array('.sw__button.sw__button-header-v3 a', '.sw__button a')
	    ),
	    array(
		    'id'    => 'Button-Hover-color',
		    'type'  => 'color',
		    'title' => 'Button Hover Color',
		    'output' => array(
			    '.sw__button:hover a'
		    )
	    ),
	    array(
		    'id'    => 'Button-Hover-BG-color',
		    'type'  => 'color',
		    'title' => 'Button Hover BG Color',
		    'output' => array(
			    '.sw__button:before',
			    '.sw__button:after'
		    ),
		    'output_mode' => 'background',
	    ),
	    array(
		    'id'    => 'Button-Hover-Border-color',
		    'type'  => 'color',
		    'title' => 'Button Hover Border Color',
		    'output' => array(
			    '.sw__button a:hover'
		    ),
		    'output_mode' => 'border-color',
	    ),

	    array(
		    'type'    => 'heading',
		    'content' => 'Offvanvas Button Style',
	    ),
	    array(
		    'id'    => 'offcanvas_button_color',
		    'type'  => 'color',
		    'title' => 'Offcanvas Button Color',
		    'output' => array('.sw__header-two .header-toggle span'),
		    'output_mode' => 'background',
	    ),
	    array(
		    'id'    => 'offcanvas_button_BG_color',
		    'type'  => 'color',
		    'title' => 'Offcanvas Button BG Color',
		    'output' => array('.sw__header-two .header-toggle'),
		    'output_mode' => 'background',
	    ),
	    array(
		    'id'    => 'offcanvas_button_Hover_color',
		    'type'  => 'color',
		    'title' => 'Offcanvas Button Hover Color',
		    'output' => array('.sw__header-two .header-toggle:hover span'),
		    'output_mode' => 'background',
	    ),
	    array(
		    'id'    => 'offcanvas_button_Hover_BG_color',
		    'type'  => 'color',
		    'title' => 'Offcanvas Button Hover BG Color',
		    'output' => array(".sw__header-two .header-toggle::before"),
		    'output_mode' => 'background',
	    ),

	    array(
		    'type'    => 'heading',
		    'content' => 'Social Icon Style',
	    ),
	    array(
		    'id'    => 'Social-icon-Color',
		    'type'  => 'color',
		    'title' => 'Social icon Color',
		    'output' => array(".header-social-icon a"),
	    ),
	    array(
		    'id'    => 'Social-icon-Hover-Color',
		    'type'  => 'color',
		    'title' => 'Social icon Hover Color',
		    'output' => array(".header-social-icon a:hover"),
	    ),


    )

));


// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'header', // The slug id of the parent section
    'title' => 'Breadcrumb',
    'fields' => array(

	    array(
		    'id'      => 'breadcrumb_shape_image',
		    'type'    => 'media',
		    'title'   => 'Breadcrumb Shape Image',
		    'library' => 'image',
	    ),
	    array(
		    'id' => 'breadcrumb_bg_color',
		    'type' => 'teconce_gradient',
		    'title' => 'Background Color',
		    'output' => '.sw_bredcrumb',
		    'output_mode' => 'background-color',
	    ),
	    array(
		    'id' => 'breadcrumb_color',
		    'type' => 'teconce_gradient',
		    'title' => 'Breadcrumb Color',
		    'output' => ".breadcrumb li",
		    'output_mode' => 'color',

	    ),
	    array(
		    'id' => 'breadcrumb_margin',
		    'type' => 'spacing',
		    'title' => 'Margin',
		    'output' => '.sw_bredcrumb',
		    'output_mode' => 'margin',
	    ),

	    array(
		    'id' => 'breadcrumb_padding',
		    'type' => 'spacing',
		    'title' => 'Padding',
		    'output' => '.sw_bredcrumb_wrapper_container',
		    'output_mode' => 'padding',
	    ),

    )
));

// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'header', // The slug id of the parent section
    'title' => 'Preloader',
    'fields' => array(
        array(
            'id' => 'enable_disable_preloader',
            'type' => 'button_set',
            'title' => 'Loader Enable/Disable',
            'options' => array(
                'enabled' => 'Enabled',
                'disabled' => 'Disabled',
            ),
            'default' => 'disabled'
        ),
        array(
            'id' => 'preloader_bg',
            'type' => 'teconce_color',
            'title' => 'Background Color',
            'output' => '.preloader svg',
            'output_mode' => 'fill',

        ),
        array(
            'id' => 'preloader_color',
            'type' => 'teconce_color',
            'title' => 'Title Color',
            'output' => '.preloader .inner small ',
            'output_mode' => 'color',

        ),
        array(
            'id'    => 'preloader_image',
            'type'  => 'media',
            'title' => 'Preloader Image',
        ),
    )
));