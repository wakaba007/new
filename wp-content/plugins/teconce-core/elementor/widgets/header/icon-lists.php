<?php

/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class teconce_icon_set extends Widget_Base
{
    public function get_name() {
        return 'teconce_icon_set_mini';
    }

    public function get_title() {
        return __('Teconce Header Icon Set', 'teconce');
    }

    public function get_categories() {
        return ['teconce-header-elements'];
    }

    public function get_icon() {
        return 'teconce-custom-icon';
    }


    protected function register_controls() {

        $this->start_controls_section(
            'teconce_icon_set_section_control',
            [
                'label' => __('Teconce Header Icon', 'elementor'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon_title', [
                'label' => esc_html__('Icon Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Title', 'textdomain'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'icon_type',
            [
                'label' => esc_html__('Icon Type', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'cart',
                'options' => [
                    'cart' => esc_html__('Cart', 'textdomain'),
                    'wishlist' => esc_html__('Wishlist', 'textdomain'),
                    'account' => esc_html__('Account', 'textdomain'),
                    'search' => esc_html__('Search', 'textdomain'),
                    'compare' => esc_html__('Compare', 'textdomain'),
                ],

            ]
        );
        $repeater->add_control(
            'icon_heading', [
                'label' => esc_html__('Icon Heading', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('', 'textdomain'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'icon_heading_color',
            [
                'label' => esc_html__('heading Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teconce-hicon-content p.teconce-hicon-label' => 'color: {{VALUE}}',
                ],
            ]
        );
        $repeater->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'icon_heading_typo_typography',
                'selector' => '{{WRAPPER}} .teconce-hicon-content p.teconce-hicon-label',
            ]
        );
        $repeater->add_control(
            'icon_sub_title', [
                'label' => esc_html__('Icon Sub Heading', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('', 'textdomain'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'compare_link', [
                'label' => esc_html__('Compare Page Link', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('', 'textdomain'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'list',
            [
                'label' => esc_html__('Repeater List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'icon_title' => 'Cart',
                        'icon_type' => 'cart',

                    ],

                    [
                        'icon_title' => 'Search',
                        'icon_type' => 'search',

                    ],

                ],
                'title_field' => '{{{ icon_title }}}',
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

            ]
        );


        $this->add_responsive_control(
            'icon_size',
            [
                'label' => __('Icon Size', 'plugin-domain'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
                'selectors' => [
                    '{{WRAPPER}} .teconce-header_icon_set_ul li i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_gap',
            [
                'label' => __('Icon Gap', 'plugin-domain'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 24,
                ],
                'selectors' => [
                    '{{WRAPPER}} .teconce-header_icon_set_ul' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_width',
            [
                'label' => __('Icon Width', 'plugin-domain'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .teconce-header_icon_set_ul li a,
                    {{WRAPPER}} .teconce-header_icon_set_ul li .teconce-header_icon_set-mini,
                    {{WRAPPER}} .teconce-header_icon_set_ul li button' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_height',
            [
                'label' => __('Icon Height', 'plugin-domain'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .teconce-header_icon_set_ul li a,
                    {{WRAPPER}} .teconce-header_icon_set_ul li .teconce-header_icon_set-mini,
                     {{WRAPPER}} .teconce-header_icon_set_ul li button' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'align_my_account_icon',
            [
                'label' => __('Icon Alignment', 'mayosis'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => __('Left', 'mayosis'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'mayosis'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'flex-end' => [
                        'title' => __('Right', 'mayosis'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'prefix_class' => 'elementor-align-%s',
                'default' => 'flex-end',
                'selectors' => [
                    '{{WRAPPER}} .teconce-header_icon_set_ul' => 'justify-content: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_responsive_control(
            'offcanvas-width',
            [
                'label' => __('Off Canvas Width', 'plugin-domain'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 500,
                ],
                'selectors' => [
                    '{{WRAPPER}} .teconce-header_cart-off-canvas' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'cart_icon',
            [
                'label' => esc_html__('Cart Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-shopping-cart',
                    'library' => 'fa-solid',
                ],

            ]
        );
        $this->add_control(
            'user_icon',
            [
                'label' => esc_html__('User Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-user',
                    'library' => 'fa-solid',
                ],

            ]
        );

        $this->add_control(
            'wishlist_icon',
            [
                'label' => esc_html__('Wishlist Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-heart',
                    'library' => 'fa-solid',
                ],

            ]
        );

        $this->add_control(
            'search_icon',
            [
                'label' => esc_html__('Search Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-search',
                    'library' => 'fa-solid',
                ],

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'cart_style',
            [
                'label' => __('Icon Style', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'cart_icon_color',
            [
                'label' => __('Icon Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#111111',
                'selectors' => [
                    '{{WRAPPER}} .teconce-header_icon_set_ul li i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cart_icon_hvr_color',
            [
                'label' => __('Icon Hover Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#e2e0f5',
                'selectors' => [
                    '{{WRAPPER}} .teconce-header_icon_set_ul li:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'cart_counter_txt_color',
            [
                'label' => __('Counter Text Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .teconce-count-tooltip,
                    {{WRAPPER}} .teconce-wishlist-header-bar .yith-wcwl-items-count' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'cart_counter_txt_count_color',
            [
                'label' => __('Icon Count Border Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} #mini-cart-count ,
                    {{WRAPPER}} .teconce-wishlist-header-bar .yith-wcwl-items-count ' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'cart_counter_bg_color',
            [
                'label' => __('Counter Background Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .teconce-count-tooltip,
                    {{WRAPPER}} .teconce-wishlist-header-bar .yith-wcwl-items-count' => 'background: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'cart_icon_bg_color',
            [
                'label' => __('Icon Bg Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .teconce-header_icon_set_ul li a,
                    {{WRAPPER}} .teconce-header_icon_set_ul li .teconce-header_icon_set-mini' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cart_icon_bg_hvr_color',
            [
                'label' => __('Icon Bg Hover Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .teconce-header_icon_set_ul li:hover a,
                    {{WRAPPER}} .teconce-header_icon_set_ul li:hover .teconce-header_icon_set-mini,
                    {{WRAPPER}} .teconce-header_icon_set_ul li:hover button' => 'background: {{VALUE}}',
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'xvc_label_typography',
                'label' => __('Label Typography', 'teconce'),
                'selector' => '{{WRAPPER}} .teconce-hicon-content p.teconce-hicon-label',
            ]
        );

        $this->add_control(
            'label_color_msv',
            [
                'label' => __('Label Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teconce-hicon-content p.teconce-hicon-label' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'label_color_msv_hvr',
            [
                'label' => __('Label Hover Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teconce-header_icon_set_ul li:hover p.teconce-hicon-label' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'ic_padding',
            [
                'label' => esc_html__('Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .teconce-header_icon_set_ul li a,
                    {{WRAPPER}} .teconce-header_icon_set_ul li .teconce-header_icon_set-mini' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'ic_bradius',
            [
                'label' => esc_html__('Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .teconce-header_icon_set_ul li a,
                    {{WRAPPER}} .teconce-header_icon_set_ul li .teconce-header_icon_set-mini,
                    {{WRAPPER}} .teconce-header_icon_set_ul li button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'Icon Border Style',
            [
                'label' => esc_html__('Icon Border Style', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'icon_border',
                'label' => esc_html__('Icon Border', 'textdomain'),
                'selector' => '{{WRAPPER}} .teconce-header_icon_set_ul li a,
                {{WRAPPER}} .teconce-header_icon_set_ul li button',
            ]
        );

        $this->add_responsive_control(
            'cart_tip_position',
            [
                'label' => esc_html__('Cart Amount Tip Position', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default' => [
                    'top' => '',
                    'right' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .teconce-header_icon_set_ul .teconce-header_icon_set-mini .teconce-count-tooltip' => 'top: {{TOP}}{{UNIT}}};',
                    '{{WRAPPER}} .teconce-header_icon_set_ul li .teconce-header_icon_set-mini .teconce-count-tooltip' => 'right: {{RIGHT}}{{UNIT}}};',

                ],
            ]
        );

        $this->add_control(
            'Wishlist-Tooltip-Icon-Position',
            [
                'label' => esc_html__('Wishlist Tooltip Icon Position', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'wishlist_top_position',
            [
                'label' => __('Wishlist Amount Top Position', 'plugin-domain'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'selectors' => [
                    '{{WRAPPER}} .teconce-wishlist-header-bar .yith-wcwl-items-count' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'wishlist_left_position',
            [
                'label' => __('Wishlist Amount Left Position', 'plugin-domain'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'selectors' => [
                    '{{WRAPPER}} .teconce-wishlist-header-bar .yith-wcwl-items-count' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'Cart-Tooltip-Icon-Position',
            [
                'label' => esc_html__('Cart Tooltip Icon Position', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'Cart_tooltip_top_position',
            [
                'label' => __('Cart Tooltip Top Position', 'plugin-domain'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'selectors' => [
                    '{{WRAPPER}} .teconce-count-tooltip' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'Cart_Tooltip_left_position',
            [
                'label' => __('Cart Tooltip Left Position', 'plugin-domain'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'selectors' => [
                    '{{WRAPPER}} .teconce-count-tooltip' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'Cart-Style',
            [
                'label' => __('Cart Style', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'cart_price_color',
            [
                'label' => esc_html__('Cart Price Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teconce-hicon-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'cart_price__typography',
                'label' => esc_html__('Cart Price Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .teconce-hicon-content p',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'cart_offcanvas_style',
            [
                'label' => __('Offcanvas Style', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'offcanvas_bg',
            [
                'label' => __('Offcanvas Background Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .teconce-header_cart-off-canvas' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'offcanvas_txt',
            [
                'label' => __('Offcanvas Text Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,

                'default' => '#222',
                'selectors' => [
                    '{{WRAPPER}} .teconce-header_cart-off-canvas,
					{{WRAPPER}} .teconce-min-cart-content h4,
					{{WRAPPER}} .teconce-header_cart-off-canvas .offcanvas-title,
					{{WRAPPER}} .teconce-header_cart-off-canvas p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'offcanvas_common',
            [
                'label' => __('Offcanvas Common Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#fa6d2d',
                'selectors' => [
                    '{{WRAPPER}} .min-cart-quantity .amount,
					{{WRAPPER}} .mini-cart-bottom-set p.total .amount' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .remove.remove_from_cart_button' => 'background: {{VALUE}}'
                ],
            ]
        );
        $this->add_control(
            'offcanvas_price_amount',
            [
                'label' => __('Offcanvas Price Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#fa6d2d',
                'selectors' => [
                    '{{WRAPPER}} .min-cart-quantity .amount,
					{{WRAPPER}} .mini-cart-bottom-set p.total .amount' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'offcanvas_common_alt',
            [
                'label' => __('Offcanvas Common Alter Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .remove.remove_from_cart_button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'offcanvas_broder_clr',
            [
                'label' => __('Offcanvas Border Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#ccc',
                'selectors' => [
                    '{{WRAPPER}} .mini-cart-bottom-set,
					{{WRAPPER}} .mini-cart-bottom-set p.total' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cartbtn_title',
            [
                'label' => __('Cart Button', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->start_controls_tabs(
            'cartbutton_style'
        );

        $this->start_controls_tab(
            'cart_btn_normal',
            [
                'label' => __('Normal', 'plugin-name'),
            ]
        );

        $this->add_control(
            'cart_btn_bg',
            [
                'label' => __('Background Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.wc-forward' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cart_btn_border',
            [
                'label' => __('Border Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.wc-forward' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cart_btn_txt',
            [
                'label' => __('Text Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#222',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.wc-forward' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'cart_btn_hover',
            [
                'label' => __('Hover', 'plugin-name'),
            ]
        );

        $this->add_control(
            'cart_btn_hvr_bg',
            [
                'label' => __('Background Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.wc-forward:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cart_btn_hvr_border',
            [
                'label' => __('Border Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.wc-forward:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'cart_btn_hvr_txt',
            [
                'label' => __('Text Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#222',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.wc-forward:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->add_control(
            'checkoutbtn_title',
            [
                'label' => __('Checkout Button', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->start_controls_tabs(
            'checkoutbutton_style'
        );

        $this->start_controls_tab(
            'checkout_btn_normal',
            [
                'label' => __('Normal', 'plugin-name'),
            ]
        );

        $this->add_control(
            'checkout_btn_bg',
            [
                'label' => __('Background Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#fa6d2d',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.checkout.wc-forward' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'checkout_btn_border',
            [
                'label' => __('Border Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#fa6d2d',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.checkout.wc-forward' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'checkout_btn_txt',
            [
                'label' => __('Text Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.checkout.wc-forward' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'checkout_btn_hover',
            [
                'label' => __('Hover', 'plugin-name'),
            ]
        );


        $this->add_control(
            'checkout_btn_hvr_bg',
            [
                'label' => __('Background Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#fa6d2d',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.checkout.wc-forward:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'checkout_btn_hvr_border',
            [
                'label' => __('Border Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#fa6d2d',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.checkout.wc-forward:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'checkout_btn_hvr_txt',
            [
                'label' => __('Text Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons.buttons .button.checkout.wc-forward:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->end_controls_section();
    }


    protected function render() {
        $settings = $this->get_settings_for_display();
        $poup_title = $settings['poup_title'];
        $offcanvasid = $this->get_id();
        global $current_user;
        wp_get_current_user();

        global $woocommerce;
        ?>

        <div class="teconce-header_icon_set">

            <ul class="teconce-header_icon_set_ul">

                <?php if ($settings['list']) { ?>
                    <?php foreach ($settings['list'] as $item) {
                        $icontype = $item['icon_type'];
                        $icon_title = $item['icon_heading'];
                        $icon_sub_title = $item['icon_sub_title'];

                        ?>

                        <?php
                        switch ($icontype) {
                            case "cart": ?>
                                <li>
                                    <button class="teconce-header_icon_set-mini" type="button"
                                            data-bs-toggle="offcanvas" data-bs-target="#teconce-cart-off-canvas-<?php echo esc_html($offcanvasid); ?>"
                                            aria-controls="teconce-cart-off-canvas-<?php echo esc_html($offcanvasid); ?>">

                                        <?php \Elementor\Icons_Manager::render_icon($settings['cart_icon'], ['aria-hidden' => 'true']); ?>

                                        <span class="teconce-count-tooltip" id="mini-cart-count">
                                            <?php if (Plugin::instance()->editor->is_edit_mode()) { ?>
                                                0
                                            <?php } else { ?>
                                                <?php echo WC()->cart->get_cart_contents_count(); ?>
                                            <?php } ?>
                                        </span>

                                    </button>
                                    <?php if ($icon_title) { ?>
                                        <span class="teconce-hicon-content" type="button"
                                              data-bs-toggle="offcanvas" data-bs-target="#teconce-cart-off-canvas-<?php echo esc_html($offcanvasid); ?>""
                                        aria-controls="teconce-cart-off-canvas-<?php echo esc_html($offcanvasid); ?>"">
                                        <p class="teconce-hicon-label"><?php echo esc_html($icon_title); ?></p>
                                        <?php if (Plugin::instance()->editor->is_edit_mode()) { ?>
                                            <p class="teconce-hicon-value">0.00 </p>
                                        <?php } else { ?>
                                            <p class="teconce-hicon-value"><?php echo WC()->cart->get_cart_subtotal(); ?>    </p>
                                        <?php } ?>

                                        </span>
                                    <?php } ?>


                                </li>
                                <?php break;
                            case "wishlist": ?>

                                <li>
                                    <?php echo teconce_yith_wcwl_get_items_count($settings, $item) ?>

                                </li>
                                <?php break;
                            case "search":
                                ?>

                                <li>
                                    <button class="teconce-header-offcanvas-s-icon" type="button"
                                            data-bs-toggle="offcanvas" data-bs-target="#teconcesearchoffcanvas_hdi"
                                            aria-controls="teconcesearchoffcanvas_hdi">

                                        <?php \Elementor\Icons_Manager::render_icon($settings['search_icon'], ['aria-hidden' => 'true']); ?>
                                    </button>
                                    <?php if ($icon_title) { ?>
                                        <span class="teconce-hicon-content">
                                        <p class="teconce-hicon-label"><?php echo esc_html($icon_title); ?></p>
                                    <p class="teconce-hicon-value"><?php echo esc_html($icon_sub_title); ?></p>
                                    </span>
                                    <?php } ?>
                                </li>

                                <?php
                                break;
                            case "compare": ?>
                                <li>
                                    <a class="eliteo-icon-compare-bx" href="<?php echo $item['compare_link']; ?>">
                                        <i class="ri-arrow-left-right-line"></i>

                                    </a>
                                    <?php if ($icon_title) { ?>
                                        <span class="teconce-hicon-content" href="<?php echo $item['compare_link']; ?>">
                                        <p class="teconce-hicon-label"><?php echo esc_html($icon_title); ?></p>
                                    <p class="teconce-hicon-value"><?php echo esc_html($icon_sub_title); ?></p>
                                    </span>
                                    <?php } ?>
                                </li>

                                <?php
                                break;
                            case "account": ?>

                                <?php if (is_user_logged_in()) { ?>
                                    <li class="teconce-account-nav-dropdown">

                                        <a class="teconce-login-dp-d-mini" href="#">


                                            <?php \Elementor\Icons_Manager::render_icon($settings['user_icon'], ['aria-hidden' => 'true']); ?>


                                        </a>
                                        <?php if ($icon_title) { ?>
                                            <span class="teconce-hicon-content" href="#login-signup" data-lity style="cursor: pointer;">
                                            <p class="teconce-hicon-label"><?php echo esc_html($icon_title); ?></p>
                                            
                                                <p class="teconce-hicon-value"><?php echo esc_html($current_user->display_name); ?></p>
                                         
                                    </span>
                                        <?php } ?>


                                        <ul class="drown-menu-ac-maind">
                                            <div class="mayosis-account-user-information">
                                                <span><?php echo get_avatar($current_user->ID, '40'); ?></span>

                                                <span class="user-display-name-acc"><?php echo esc_html($current_user->display_name); ?></span>
                                            </div>

                                            <?php wp_nav_menu(
                                                array(
                                                    'theme_location' => 'account-menu',
                                                    'container_class' => 'msv-acc-menu-itemwrap',
                                                    'menu_class' => 'msv-acc-menu-itembox',

                                                )
                                            ); ?>

                                            <div class="mayosis-logout-information">
                                                <a href="<?php echo wp_logout_url(home_url('/')); ?> " class="mayosis-logout-link"><i class="zil zi-sign-out"></i> <?php esc_html_e('Logout', 'mayosis'); ?></a>
                                            </div>
                                        </ul>

                                    </li>

                                <?php } else { ?>
                                    <li>

                                        <a class="teconce-login-popup-mini" href="#login-signup" data-lity>


                                            <?php \Elementor\Icons_Manager::render_icon($settings['user_icon'], ['aria-hidden' => 'true']); ?>


                                        </a>
                                        <?php if ($icon_title) { ?>
                                            <span class="teconce-hicon-content" href="#login-signup" data-lity style="cursor: pointer;">
                                            <p class="teconce-hicon-label"><?php echo esc_html($icon_title); ?></p>
                                            <?php if ($icon_sub_title) { ?>
                                                <p class="teconce-hicon-value"><?php echo esc_html($icon_sub_title); ?></p>
                                            <?php } ?>
                                    </span>
                                        <?php } ?>

                                    </li>
                                <?php } ?>

                                <?php break;

                        }


                        ?>


                    <?php } ?>

                <?php } ?>


            </ul>


            <div class="teconce-login-popup lity-hide " id="login-signup">
                <h3 class="xpc-login-pop-title">Hey, Welcome Back</h3>
                <p class="xpc-login-pop-subtitle">Enter your credentials to acces your account.</p>

                <div class="xpc-login-content-p-conx">


                    <div class="xpc-tab">

                        <ul class="xpc-tabs">
                            <li><a href="#">Sign In</a></li>
                            <li><a href="#">Sign Up</a></li>

                        </ul> <!-- / tabs -->

                        <div class="xpc-tab_content">

                            <div class="xpc-tabs_item">
                                <?php echo do_shortcode('[teconce_woo_login]'); ?>
                            </div> <!-- / tabs_item -->

                            <div class="xpc-tabs_item">
                                <?php echo do_shortcode('[teconce_woo_register]'); ?>
                            </div> <!-- / tabs_item -->


                        </div> <!-- / tab_content -->
                    </div> <!-- / tab -->


                </div>

            </div>


            <div class="teconce-ajax-s-offcanvas offcanvas offcanvas-top" tabindex="-1"
                 id="teconcesearchoffcanvas_hdi" data-bs-scroll="true">

                <div class="offcanvas-body">

                    <div class="teconce-dfcanvas-body">
                        <div class="teconce-title-s-box d-flex">
                            <h5 class="teconce-ajax-search-title"><?php echo esc_html($poup_title); ?></h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"><i class="ri-close-line"></i></button>

                        </div>

                        <div class="teconce-search-box">

                            <?php teconce_live_search(); ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="teconce-header_cart-off-canvas offcanvas offcanvas-end" tabindex="-1" id="teconce-cart-off-canvas-<?php echo esc_html($offcanvasid); ?>"
                 data-bs-scroll="true" aria-labelledby="teconce-header_cart-off-canvasLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="teconce-header_cart-off-canvasLabel">Your Cart (
                        <?php if (Plugin::instance()->editor->is_edit_mode()) { ?>
                            0
                        <?php } else { ?>
                            <span id="mini-cart-count-alt"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                        <?php } ?>
                        )</h5>
                    <span class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></span>
                </div>
                <div class="offcanvas-body">
                    <div class="shopping-cart-wrapper">
                        <?php if (Plugin::instance()->editor->is_edit_mode()) {
                        } else {

                            echo teconce_tiny_cart();
                        } ?>

                    </div>
                </div>
            </div>


        </div>


        <?php
    }

    protected function content_template() {
        ?>

        <?php
    }

    public function render_plain_content($instance = []) {
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new teconce_icon_set);
?>