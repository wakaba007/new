<?php
// Create a top-tab
CSF::createSection($prefix, array(
    'id' => 'footer', // Set a unique slug-like ID
    'title' => 'Footer',
    'icon' => 'fa fa-arrow-down',
));
// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'footer', // The slug id of the parent section
    'title' => 'Footer Blocks',
    'fields' => array(

        array(
            'id' => 'select_footer_blocks',
            'type' => 'select',
            'title' => 'Select Global Footer',
            'placeholder' => 'Select a Footer',
            'options' => 'posts',
            'query_args' => array(
                'post_type' => 'teconce_footer',
            ),
        ),

        array(
            'id' => 'back-top-top-enable',
            'type' => 'button_set',
            'title' => 'Back To Top Button',
            'options' => array(
                'enabled' => 'Enabled',
                'disabled' => 'Disabled',
            ),
            'default' => 'enabled'
        ),

        array(
            'id' => 'backto_top_bg',
            'type' => 'teconce_gradient',
            'title' => 'Back To Top Button Background Color',
            'output' => '.back-to-top',
            'output_mode' => 'background',
            'dependency' => array('back-top-top-enable', '==', 'enabled'),
        ),

        array(
            'id' => 'backto_top_txt',
            'type' => 'teconce_color',
            'title' => 'Back To Top Button Text Color',
            'output' => '.back-to-top',
            'output_mode' => 'color',
            'dependency' => array('back-top-top-enable', '==', 'enabled'),
        ),

        array(
            'id' => 'backto_top_bg_hvr',
            'type' => 'teconce_gradient',
            'title' => 'Back To Top Button Background Hover Color',
            'output' => '.back-to-top:hover',
            'output_mode' => 'background',
            'dependency' => array('back-top-top-enable', '==', 'enabled'),
        ),

        array(
            'id' => 'backto_top_txt_hvr',
            'type' => 'teconce_color',
            'title' => 'Back To Top Button Text Hover Color',
            'output' => '.back-to-top:hover',
            'output_mode' => 'color',
            'dependency' => array('back-top-top-enable', '==', 'enabled'),
        ),

    )
));


// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'footer', // The slug id of the parent section
    'title' => 'Footer Copyright',
    'fields' => array(
        array(
            'id' => 'footer_copyright_enable',
            'type' => 'switcher',
            'title' => 'Footer Copyright Enable/Disable',
            'default' => true,
        ),

        array(
            'id' => 'copyright_text',
            'type' => 'wp_editor',
            'title' => 'Copyright Text',
            'tinymce' => true,
            'default' => '©Yoursitename 2024 | All Rights Reserved',
            'dependency' => array('footer_copyright_enable', '==', 'true', 'all'),
        ),
        array(
            'id'     => 'footer_item_list',
            'type'   => 'repeater',
            'title'  => 'Footer Item List',
            'fields' => array(
                array(
                    'id'    => 'footer_list_text',
                    'type'  => 'text',
                    'title' => 'Text'
                ),
                array(
                    'id'    => 'footer_list_link',
                    'type'  => 'link',
                    'title' => 'Link',
                ),
            ),
        ),

        array(
            'id' => 'copyright_footer_text',
            'type' => 'teconce_color',
            'title' => 'Copyright Text Color',
            'output' => ['.sw__copyright-text', '.swv2_footer_bottom p'],
            'output_mode' => 'color',
        ),
        array(
            'id'     => 'footer_link_color',
            'type'   => 'color',
            'title'  => 'Footer List Color',
            'output' => ['.sw__copyright-nav ul li a', '.swv2_footer_bottom_link a']
        ),
        array(
            'id' => 'footer_link_hover_color',
            'type' => 'color',
            'title' => 'Copyright Link Hover Color',
            'output' =>  ['.sw__copyright-nav ul li a:hover', '.swv2_footer_bottom_link a:hover'],
        ),
    )

));


// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'footer', // The slug id of the parent section
    'title' => 'Footer Style',
    'fields' => array(
        array(
            'id' => 'teconce-footer-style',
            'type' => 'image_select',
            'title' => 'Footer Style',
            'options' => array(
                'style-one' => get_template_directory_uri() . '/assets/images/footer-1.jpg',
                'style-two' => get_template_directory_uri() . '/assets/images/footer-2.jpg',
                'style-three' => get_template_directory_uri() . '/assets/images/footer-3.jpg',
            ),
            'default' => 'style-one'
        ),
	    array(
		    'id'    => 'footer_bg_shapes_style_two',
		    'type'  => 'media',
		    'title' => 'Footer BG Shapes Style Two',
	    ),
	    array(
		    'id'    => 'footer_bg_image_style_three',
		    'type'  => 'media',
		    'title' => 'Footer BG Image Style Three',
	    ),
	    array(
		    'id'    => 'footer_bg_shapes_style_three',
		    'type'  => 'media',
		    'title' => 'Footer BG Shapes Style Three',
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
));

// Create a sub-tab
CSF::createSection($prefix, array(
	'parent' => 'footer', // The slug id of the parent section
	'title' => 'Footer Brand Logo',
	'fields' => array(
		array(
			'id'      => 'footer_brand_logo_switcher',
			'type'    => 'switcher',
			'title'   => 'Brand Logo Switcher',
			'label'   => 'Do you want activate it ?',
			'default' => true
		),
		array(
			'id'    => 'footer_brand_logo_images',
			'type'  => 'gallery',
			'title' => 'Select Brand Logo Image',
		),
	)

));


// Create a sub-tab
CSF::createSection($prefix, array(
	'parent' => 'footer', // The slug id of the parent section
	'title' => 'Footer Newsletter',
	'fields' => array(
		array(
			'id'      => 'footer_newsletter_switcher',
			'type'    => 'switcher',
			'title'   => 'Footer Newsletter Switcher',
			'label'   => 'Do you want activate it ?',
			'default' => true
		),
		array(
			'id'    => 'footer_newsletter_shape_images',
			'type'  => 'gallery',
			'title' => 'Select Shape Image',
		),
		array(
			'id'    => 'footer_newsletter_section_outside_shape',
			'type'  => 'media',
			'title' => 'Newsletter Section Outside Shape',
		),
		array(
			'id'      => 'footer_newsletter_title',
			'type'    => 'text',
			'title'   => 'Newsletter Title',
			'default' => 'SIGN UP FOR NEWS & GET ALL UPDATES'
		),
		array(
			'id'      => 'footer_newsletter_shortcode',
			'type'    => 'textarea',
			'title'   => 'Newsletter Shortcode',
		),
	)

));