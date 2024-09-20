<?php
// Create a top-tab
CSF::createSection($prefix, array(
    'id' => 'global_style', // Set a unique slug-like ID
    'title' => 'Global Style',
    'icon' => 'fa fa-magic',
));


// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'global_style', // The slug id of the parent section
    'title' => 'Global Color',
    'fields' => array(

        array(
            'id' => 'color-set',
            'type' => 'tabbed',
            'title' => 'Site Colors',
            'tabs' => array(
                array(
                    'title' => 'Body Color',
                    'icon' => 'fa fa-paint-brush',
                    'fields' => array(
                        array(
                            'id' => 'site-bg-color-main',
                            'type' => 'teconce_color',
                            'title' => 'Site Background Color',
                            'output' => 'body',
                            'output_mode' => 'background'
                        ),

                        array(
                            'id' => 'main_text_colot',
                            'type' => 'teconce_color',
                            'title' => 'Text Color',
                            'help' => 'This is the text color of Whole Website',
                            'output' => 'body,p,.pivoo-ingredients-items li, li',
                            'output_mode' => 'color',
                        ),
                    )),
                array(
                    'title' => 'Primary Color',
                    'icon' => 'fa fa-paint-brush',
                    'fields' => array(
                        array(
                            'id' => 'primary_color',
                            'type' => 'teconce_color',
                            'title' => 'Primary Color',
                            'help' => 'This is the primary color for whole website.If you change it whole site main color will be changed.',
                            'default' => '#BC7B77',
                            'output' => '.pivoo-section-title.title-style-one h3:before,.pivoo-post.style-one .pivoo-category-list a,
          .pivoo-nutritional-information h5,
          span.pivoo-new-tag,.plyr__control--overlaid,.pivoo-author-follow a
          ',
                            'output_mode' => 'background',

                        ),

                        array(
                            'id' => 'primary-text-color',
                            'type' => 'teconce_color',
                            'title' => 'Primary Text Color',
                            'help' => 'This is the text color of primary color',
                            'output' => '.pivoo-section-title.title-style-one h3:before,.pivoo-post.style-one .pivoo-category-list a,
          .pivoo-nutritional-information h5,
          span.pivoo-new-tag,.plyr__control--overlaid,.pivoo-author-follow a',
                            'output_mode' => 'color',
                            'output_important' => true,
                            'default' => '#ffffff',
                        ),
                    )),

                array(
                    'title' => 'Secondary Color',
                    'icon' => 'fa fa-paint-brush',
                    'fields' => array(
                        array(
                            'id' => 'secondary-color',
                            'type' => 'teconce_color',
                            'title' => 'Secondary Color',
                            'help' => 'This is the secondary color for whole website.If you change it whole site main color will be changed.',
                            'output' => '.pivoo-product-sale-tag span.onsale,.plyr--video .plyr__control.plyr__tab-focus, .plyr--video .plyr__control:hover, .plyr--video .plyr__control[aria-expanded=true]',
                            'output_mode' => 'background',

                        ),

                        array(
                            'id' => 'secondary-text-color',
                            'type' => 'teconce_color',
                            'title' => 'Secondary Text Color',
                            'output' => '.pivoo-product-sale-tag span.onsale,.plyr--video .plyr__control.plyr__tab-focus, .plyr--video .plyr__control:hover, .plyr--video .plyr__control[aria-expanded=true]',
                            'output_mode' => 'color',
                            'help' => 'This is the text color of secondary color',
                        ),

                    )),

                array(
                    'title' => 'Input Field Color',
                    'icon' => 'fa fa-paint-brush',
                    'fields' => array(

                        array(
                            'id' => 'global_input_bg',
                            'type' => 'teconce_color',
                            'title' => 'Input Field Background Color',
                            'help' => 'This is the input field background color for whole website',
                            'output' => 'input[type="text"], input[type="email"], input[type="url"], 
              input[type="password"], input[type="search"],
              input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], 
              input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], 
              input[type="color"], select, textarea,
              .select2-container--default .select2-selection--single,.dokan-form-control',
                            'output_mode' => 'background-color',

                        ),

                        array(
                            'id' => 'global_input_border',
                            'type' => 'teconce_color',
                            'title' => 'Input Field Border Color',
                            'help' => 'This is the input field border color for whole website',
                            'output' => 'input[type="text"], input[type="email"], input[type="url"], 
              input[type="password"], input[type="search"],
              input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], 
              input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], 
              input[type="color"], select, textarea,
              .select2-container--default .select2-selection--single,.dokan-form-control',
                            'output_mode' => 'border-color',

                        ),

                        array(
                            'id' => 'global_input_text',
                            'type' => 'teconce_color',
                            'title' => 'Input Field Text Color',
                            'help' => 'This is the input field Text color for whole website',
                            'output' => 'input[type="text"], input[type="email"], input[type="url"], 
              input[type="password"], input[type="search"],
              input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], 
              input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], 
              input[type="color"], select, textarea,
              .select2-container--default .select2-selection--single,.dokan-form-control',
                            'output_mode' => 'color',

                        ),


                    )),


            )),


        array(
            'id' => 'btn_color',
            'type' => 'tabbed',
            'title' => 'Site Buttons Colors',
            'tabs' => array(
                array(
                    'title' => 'Button Normal State',
                    'icon' => 'fa fa-paint-brush',
                    'fields' => array(
                        array(
                            'id' => 'global_btn_bg',
                            'type' => 'teconce_gradient',
                            'title' => 'Button Background',
                            'help' => 'Site common button background color',
                            'output' => 'button, input[type="button"], input[type="submit"], [type=button], [type=submit],
                      .comment-content .comment-reply-link,.piv-lrn-button',
                            'output_mode' => 'background',

                        ),

                        array(
                            'id' => 'global_btn_border',
                            'type' => 'teconce_color',
                            'title' => 'Button Border',
                            'help' => 'Site common button border color',
                            'output' => 'button, input[type="button"], input[type="submit"], [type=button], [type=submit],
                      .comment-content .comment-reply-link,.piv-lrn-button',
                            'output_mode' => 'border-color',

                        ),

                        array(
                            'id' => 'global_btn_text',
                            'type' => 'teconce_color',
                            'title' => 'Button Text',
                            'help' => 'Site common button text color',
                            'output' => 'button, input[type="button"], input[type="submit"], [type=button], [type=submit],
                      .comment-content .comment-reply-link,.piv-lrn-button',
                            'output_mode' => 'color',


                        ),
                    )),

                array(
                    'title' => 'Button Hover State',
                    'icon' => 'fa fa-paint-brush',
                    'fields' => array(

                        array(
                            'id' => 'global_btn_bg_hvr',
                            'type' => 'teconce_gradient',
                            'title' => 'Button Background',
                            'help' => 'Site common button background color',
                            'output' => 'button:hover, input[type="button"]:hover, input[type="submit"]:hover, [type=button]:hover, [type=submit]:hover,
                      .comment-content .comment-reply-link:hover,.piv-lrn-button:hover',
                            'output_mode' => 'background',

                        ),

                        array(
                            'id' => 'global_btn_border_hvr',
                            'type' => 'teconce_color',
                            'title' => 'Button Border',
                            'help' => 'Site common button border color',
                            'output' => 'button:hover, input[type="button"]:hover, input[type="submit"]:hover, [type=button]:hover, [type=submit]:hover,
                      .comment-content .comment-reply-link:hover,.piv-lrn-button:hover',
                            'output_mode' => 'border-color',

                        ),

                        array(
                            'id' => 'global_btn_text_hvr',
                            'type' => 'teconce_color',
                            'title' => 'Button Text',
                            'help' => 'Site common button text color',
                            'output' => 'button:hover, input[type="button"]:hover, input[type="submit"]:hover, [type=button]:hover, [type=submit]:hover,
                      .comment-content .comment-reply-link:hover,.piv-lrn-button:hover',
                            'output_mode' => 'color',


                        ),

                    )),

            )),


        array(
            'id' => 'link_color',
            'type' => 'teconce_link',
            'title' => 'Link Color',
            'output' => 'a',
            'visited' => false,
        ),

        array(
            'id' => 'alter_text_color',
            'type' => 'teconce_color',
            'title' => 'Alter Text Color',
            'help' => 'This is the alternative text color',
        ),

        array(
            'id' => 'light_color',
            'type' => 'teconce_color',
            'title' => 'White Color',
            'default' => '#ffffff',
            'help' => 'This is the white color',
        ),
        
        array(
            'id' => 'light_100_color',
            'type' => 'teconce_color',
            'title' => 'White 100 Color',
            'default' => '#FCF8F8',
            'help' => 'This is the white 100 color',
        ),
        
        array(
            'id' => 'brown_200_color',
            'type' => 'teconce_color',
            'title' => 'Brown 200 Color',
            'default' => '#E5DACF',
            'help' => 'This is the brown 200 color',
        ),
        
         array(
            'id' => 'black_900_color',
            'type' => 'teconce_color',
            'title' => 'Black 900 Color',
            'default' => '#0D0D0D',
            'help' => 'This is the black 900 color',
        ),
        
        array(
            'id' => 'black_800_color',
            'type' => 'teconce_color',
            'title' => 'Black 800 Color',
            'default' => '#262626',
            'help' => 'This is the black 800 color',
        ),
        
         array(
            'id' => 'black_700_color',
            'type' => 'teconce_color',
            'title' => 'Black 700 Color',
            'default' => '#252525',
            'help' => 'This is the black 700 color',
        ),
    )

));


// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'global_style', // The slug id of the parent section
    'title' => 'Global Options',
    'fields' => array(
        array(
            'id' => 'gloabal_width_1400',
            'type' => 'slider',
            'title' => 'Global Container Width (From 1400px)',
            'min' => 600,
            'max' => 1600,
            'step' => 100,
            'unit' => 'px',
            'default' => 1320,
        ),

        array(
            'id' => 'gloabal_width_1200',
            'type' => 'slider',
            'title' => 'Global Container Width (From 1200px)',
            'min' => 600,
            'max' => 1400,
            'step' => 100,
            'unit' => 'px',
            'default' => 1140,
        ),

        array(
            'id' => 'elementor-width-overwrite',
            'type' => 'switcher',
            'title' => 'Elementor Container Width Overwrite',
        ),

        array(
            'id' => 'overwrite-elem-width',
            'type' => 'slider',
            'title' => 'Elementor Container Width',
            'min' => 600,
            'max' => 1400,
            'step' => 100,
            'unit' => 'px',
            'default' => 1140,

            'dependency' => array('elementor-width-overwrite', '==', 'true'),
        ),

    )

));

