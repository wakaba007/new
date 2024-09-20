<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */

namespace Elementor;

use Elementor\Controls_Manager;
use Elementor\Core\Schemes;
use Elementor\Core\Responsive\Responsive;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class teconce_search extends Widget_Base
{
    public function get_name()
    {
        return 'teconce_main_search';
    }

    public function get_title()
    {
        return __('Search', 'teconce');
    }

    public function get_categories()
    {
        return ['teconce-header-elements'];
    }

    public function get_icon()
    {
        return 'teconce-custom-icon';
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'teconce_search_section_control',
            [
                'label' => __('Search', 'elementor'),
            ]
        );

        $this->add_control(
            'search_type',
            [
                'label' => __('Search Type', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'normal',
                'options' => [
                    'normal' => __('Normal', 'plugin-domain'),
                    'popup' => __('Popup', 'plugin-domain'),
                    'off-canvas' => __('Off Canvas', 'plugin-domain'),
                ],
            ]
        );
        $this->add_control(
            'search_icon_title',
            [
                'label' => esc_html__('Show/Hide Search Icon With Text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'textdomain'),
                'label_off' => esc_html__('Hide', 'textdomain'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'search_catagories_option',
            [
                'label' => esc_html__(' Search With Catagoirs Show/Hide', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'textdomain'),
                'label_off' => esc_html__('Hide', 'textdomain'),
                'return_value1' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_responsive_control(
            'popup_icon_align',
            [
                'label' => __('Icon Alignment', 'mayosis'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'mayosis'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'mayosis'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'mayosis'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'prefix_class' => 'elementor-align-%s',
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .elementor-widget-container' => 'text-align: {{VALUE}} !important',
                ],
            ]
        );
        // 	$this->add_control(
        // 	'all_catagories_icon',
        // 	[
        // 		'label' => esc_html__( 'Show Title', 'textdomain' ),
        // 		'type' => \Elementor\Controls_Manager::SWITCHER,
        // 		'label_on' => esc_html__( 'Show', 'textdomain' ),
        // 		'label_off' => esc_html__( 'Hide', 'textdomain' ),
        // 		'return_value' => 'yes',
        // 		'default' => 'yes',
        // 		'selector' => '{{WRAPPER}} .teconce-ajax-search-bar .nice-select:before',
        // 		'conditions' => [
        //     'terms' => [
        //         [
        //             'name' => 'search_type',
        //             'operator' => '==',
        //             'value' => 'normal'
        //         ]
        //     ]
        // ]
        // 	]
        // );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'normal_border',
                'label' => __('All Catagories Border', 'teconce'),
                'selector' => '{{WRAPPER}} .nice-select',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'search_type',
                            'operator' => '==',
                            'value' => 'normal'
                        ]
                    ]
                ]
            ]
        );
        $this->add_control(
            'all_catagories_icone_space',
            [
                'label' => __('All Catagories Right Icone Spance', 'plugin-domain'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px '],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 1000,
                        'step' => 1,
                    ],

                ],

                'selectors' => [
                    '{{WRAPPER}}  .nice-select' => 'padding-right: {{SIZE}}{{UNIT}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'search_type',
                            'operator' => '==',
                            'value' => 'normal'
                        ]
                    ]
                ]
            ]
        );
        $this->add_control(
            'poup_title',
            [
                'label' => __('Popup / Off Canvas Search Title', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('WHAT ARE YOU LOOKING FOR?', 'plugin-domain'),
                'placeholder' => __('Type your title here', 'plugin-domain'),
                'label_block' => true,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'search_type',
                            'operator' => '!=',
                            'value' => 'normal'
                        ]
                    ]
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'search_style',
            [
                'label' => __('Style', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'input_box_size',
            [
                'label' => __('Search Box Height', 'plugin-domain'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 1000,
                        'step' => 1,
                    ],

                ],

                'selectors' => [
                    '{{WRAPPER}} .search-wrapper input[type="text"],
					{{WRAPPER}} .teconce-ajax-search-btn
					' => 'height: {{SIZE}}{{UNIT}};',
                ],

                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'search_type',
                            'operator' => '==',
                            'value' => 'normal'
                        ]
                    ]
                ]
            ]
        );
        $this->add_control(
            'popup_icon_size',
            [
                'label' => __('Popup / Offcanvas Icon Size', 'plugin-domain'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 30,
                        'step' => 1,
                    ],

                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
                'selectors' => [
                    '{{WRAPPER}} .teconce-offcanvas-s-icon i, 
					{{WRAPPER}} .teconce-popup-s-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],

                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'search_type',
                            'operator' => '==',
                            'value' => 'normal'
                        ]
                    ]
                ]
            ]
        );
        $this->add_control(
            'popup_border_radius',
            [
                'label' => __('Icon Border Radius ', 'plugin-domain'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 30,
                        'step' => 1,
                    ],

                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
                'selectors' => [
                    '{{WRAPPER}} .teconce-ajax-search-btn, {{WRAPPER}} .teconce-popup-s-icon' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],

            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'searce_right_typography',
                'label' => 'Search Button Typograpy',
                'selector' => '{{WRAPPER}} .teconce-ajax-search-btn span',
            ]
        );
        $this->add_control(
            'searce_bg_color_main',
            [
                'label' => __('Search Background Color', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .search-wrapper .search' => 'background-color: {{VALUE}};',
                ],


            ]
        );
	    $this->add_control(
		    'searce_right_text_color_main',
		    [
			    'label' => __('Search Wright Text Color', 'plugin-domain'),
			    'type' => \Elementor\Controls_Manager::COLOR,
			    'selectors' => [
				    '{{WRAPPER}} input::placeholder' => 'color: {{VALUE}};',
			    ],
		    ]
	    );
        $this->add_control(
            'searce_text_color_main',
            [
                'label' => __('Search Text Color', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} input' => 'color: {{VALUE}};',
                ],


            ]
        );
        $this->add_control(
            'searce_Icon_bg_color_main',
            [
                'label' => __('Search Icon Background Color', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teconce-ajax-search-btn' => 'background-color: {{VALUE}};',
                ],


            ]
        );
        $this->add_control(
            'searce_Icon_hver_bg_color_main',
            [
                'label' => __('Search Icon Hover Background Color', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teconce-ajax-search-btn-element:hover' => 'background-color: {{VALUE}};',
                ],


            ]
        );
        $this->add_control(
            'all_catagories_bg_color',
            [
                'label' => __(' All Catagories Bg Color', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nice-select ' => 'background-color: {{VALUE}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'search_type',
                            'operator' => '==',
                            'value' => 'normal'
                        ]
                    ]
                ]

            ]
        );
	    $this->add_control(
		    'top_all_catagories_color',
		    [
			    'label' => __(' Top All Catagories Color', 'plugin-domain'),
			    'type' => \Elementor\Controls_Manager::COLOR,
			    'selectors' => [
				    '{{WRAPPER}} .nice-select' => 'color: {{VALUE}};',
				    '{{WRAPPER}} .nice-select:after' => 'border-color: {{VALUE}};',

			    ],
			    'conditions' => [
				    'terms' => [
					    [
						    'name' => 'search_type',
						    'operator' => '==',
						    'value' => 'normal'
					    ]
				    ]
			    ]

		    ]
	    );
        $this->add_control(
            'all_catagories_color',
            [
                'label' => __(' All Catagories Color', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nice-select ul li' => 'color: {{VALUE}};',

                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'search_type',
                            'operator' => '==',
                            'value' => 'normal'
                        ]
                    ]
                ]

            ]
        );
	    $this->add_control(
		    'all_catagories_hvr_color',
		    [
			    'label' => __(' All Catagories Hover Color', 'plugin-domain'),
			    'type' => \Elementor\Controls_Manager::COLOR,
			    'selectors' => [
				    '{{WRAPPER}} .nice-select ul li:hover' => 'color: {{VALUE}};',

			    ],
			    'conditions' => [
				    'terms' => [
					    [
						    'name' => 'search_type',
						    'operator' => '==',
						    'value' => 'normal'
					    ]
				    ]
			    ]

		    ]
	    );
        $this->add_control(
            'popup_icon_bg_popup_color',
            [
                'label' => __('Popup / Offcanvas / All Catagories Background Color', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teconce-popup-s-icon i ,
					{{WRAPPER}} .nice-select .list' => 'background-color: {{VALUE}};',
                    // '{{WRAPPER}} .nice-select .option:hover, .nice-select .option.focus, .nice-select .option.selected.focus' => 'background-color: {{VALUE}};',
                ],
                'terms' => [
                    [
                        'name' => 'search_type',
                        'operator' => '!=',
                        'value' => 'normal'
                    ]
                ]

            ]
        );
        $this->add_control(
            'popup_icon_color',
            [
                'label' => __(' Icon Color', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teconce-offcanvas-s-icon i, 
					{{WRAPPER}} .teconce-popup-s-icon i ,
					{{WRAPPER}} .teconce-search-style-one .teconce-ajax-search-btn-element i' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'search_icon_height',
            [
                'label' => __('Search Icon Background Height', 'plugin-domain'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 1000,
                        'step' => 1,
                    ],

                ],

                'selectors' => [
                    '{{WRAPPER}} .teconce-ajax-search-btn
					' => 'height: {{SIZE}}{{UNIT}};',
                ],

                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'search_type',
                            'operator' => '==',
                            'value' => 'normal'
                        ]
                    ]
                ]
            ]
        );
        $this->add_control(
            'searce_icon_margin',
            [
                'label' => esc_html__('Search Icon Margin  ', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .teconce-ajax-search-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'searce_icon_paddin',
            [
                'label' => esc_html__('Search Icon Padding  ', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .teconce-ajax-search-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} .teconce-popup-s-icon ,
				{{WRAPPER}} .teconce-popup-s-icon ,
				{{WRAPPER}} .teconce-filter-available .search-wrapper input',
            ]
        );
        $this->add_responsive_control(
            'popup_icon_padding',
            [
                'label' => esc_html__('Icon Padding  ', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .teconce-popup-s-icon' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'input_field_border_raidus',
            [
                'label' => esc_html__('Input Field Border Radius  ', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .teconce-filter-available .search-wrapper input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'input_btns_border_raidus',
            [
                'label' => esc_html__('Button Border Radius  ', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .teconce-ajax-search-btn.teconce-ajax-search-btn-element' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'popup_icon_color_hvr',
            [
                'label' => __('Popup / Offcanvas Icon Hover Color', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teconce-offcanvas-s-icon i:hover, 
					{{WRAPPER}} .teconce-popup-s-icon i:hover' => 'color: {{VALUE}};',
                ],

                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'search_type',
                            'operator' => '!=',
                            'value' => 'normal'
                        ]
                    ]
                ]
            ]
        );

        $this->end_controls_section();

   }


    protected function render($instance = [])
    {
        $settings = $this->get_settings();
        $search_type = $settings['search_type'];
        $poup_title = $settings['poup_title'];
        ?>

        <?php if ($search_type == "popup") { ?>
        <a class="teconce-popup-s-icon" href="#teconce-search-box-popup" data-lity><i class="teconce teconce-icon-search-one"></i></a>
        <div id="teconce-search-box-popup" class="lity-hide">
            <h5 class="teconce-ajax-search-title"><?php echo esc_html($poup_title); ?></h5>
            <div class="teconce-search-box">

                <?php teconce_live_search(); ?>
            </div>
        </div>
    <?php } elseif ($search_type == "off-canvas") { ?>

        <button class="teconce-offcanvas-s-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#teconcesearchoffcanvas" aria-controls="teconcesearchoffcanvas">
            <i class="teconce teconce-icon-search-one"></i>
        </button>

        <div class="teconce-ajax-s-offcanvas offcanvas offcanvas-top" tabindex="-1" id="teconcesearchoffcanvas" data-bs-scroll="true">

            <div class="offcanvas-body">

                <div class="teconce-dfcanvas-body">
                    <div class="teconce-title-s-box d-flex">
                        <h5 class="teconce-ajax-search-title"><?php echo esc_html($poup_title); ?></h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"><i class="ri-close-line"></i></button>

                    </div>

                    <div class="teconce-search-box">

                        <?php teconce_live_search(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="teconce-search-box">
            <?php

            wp_enqueue_script('teconce-ajax-search');
            $catfilter = cs_get_option('search_category_ds');
            $search_style_ds = cs_get_option('search_style_ds');
            if ($catfilter == "show") {
                $catfilcls = "teconce-filter-available";
            } else {
                $catfilcls = "teconce-filter-not-available";
            }

            ?>

            <div class="product-search <?php echo esc_html($catfilcls); ?> teconce-search-style-<?php echo esc_html($search_style_ds); ?>">
                <form name="product-search" method="get" class="teconce-search-box" action="<?php echo esc_url(home_url('/')); ?>">
                    <?php if ($catfilter == "show") { ?>
                        <?php $categories = get_product_categories_hierarchy(); ?>
                        <?php if ($categories): ?>
                            <?php
                            if ($settings['search_catagories_option'] == 'yes') {
                                ?>
                                <div class="teconce-ajax-search-bar category-wrapper">
                                    <select name="category" class="category">
                                        <option class="default" value=""><?php echo esc_html__('All Categories', 'teconce'); ?></option>
                                        <?php list_taxonomy_hierarchy_no_instance($categories); ?>
                                    </select>
                                </div>
                                <?php
                            }
                            ?>

                        <?php endif ?>
                    <?php } ?>
                    <div class="search-wrapper">
                        <input type="text" name="s" class="search" placeholder="<?php echo esc_html__('Search for Product...', 'teconce'); ?>" value="<?php the_search_query(); ?>">

                        <button type="submit" value="Search" class="teconce-ajax-search-btn teconce-ajax-search-btn-element">
                            <i class="teconce-icon-search-normal"></i>
                            <?php
                            if ($settings['search_icon_title'] == 'yes') {
                                ?>
                                <span>Search</span>
                                <?php
                            }
                            ?>

                            <input type="hidden" name="post_type" value="product"/>
                        </button>
                        <?php echo file_get_contents(plugins_url('images/loading.svg', __FILE__)); ?>
                    </div>
                </form>
                <div class="search-results teconce-search-result"></div>
            </div>


        </div>

    <?php } ?>
        <?php
    }

    protected function content_template()
    {
        ?>

        <?php
    }

    public function render_plain_content($instance = [])
    {
    }
}

Plugin::instance()->widgets_manager->register(new teconce_search);
?>