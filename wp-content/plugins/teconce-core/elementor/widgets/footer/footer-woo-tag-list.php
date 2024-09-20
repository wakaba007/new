<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class teconce_footer_woo_tag_list extends Widget_Base
{
    public function get_name() {
        return 'teconce_footer_woo_tag_list';
    }

    public function get_title() {
        return __('Footer WooCommerce Tag List', 'teconce');
    }

    public function get_categories() {
        return ['teconce-footer-elements'];
    }

    public function get_icon() {
        return 'teconce-custom-icon';
    }

    protected function register_controls() {

        $this->start_controls_section(
            'teconce_footer_common_section_control',
            [
                'label' => __('Teconce Footer Element', 'elementor'),
            ]
        );


        $this->add_control(
            'footer-title',
            [
                'label' => __('Footer Widget Title', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Popular Tags', 'plugin-domain'),
                'placeholder' => __('Type your title here', 'plugin-domain'),
            ]
        );
        $this->add_control(
            'Number-Of-Tags-Show',
            [
                'label' => esc_html__('Number Of Tags Show', 'textdomain'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 100,
                'step' => 1,
                'default' => 10,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'my-account_style',
            [
                'label' => __('Footer Widget Style', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'title_bottom_gap',
            [
                'label' => esc_html__('Title Bottom Gap', 'elementor'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .footer-widget-title' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#101010',
                'selectors' => [
                    '{{WRAPPER}} .footer-widget-title,
					{{WRAPPER}} .teconce-footer-widget-box .footer-widget-title button.footer-collapse-bar-ems' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typograph',
                'label' => __('Title Typography', 'plugin-domain'),
                'selector' => '{{WRAPPER}} .footer-widget-title,
				{{WRAPPER}} .teconce-footer-widget-box .footer-widget-title button.footer-collapse-bar-ems',
            ]
        );
        $this->add_control(
            'list_color',
            [
                'label' => __('Menu List Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teconce-footer-widget-menu-items,
					{{WRAPPER}} .teconce-footer-widget-menu-items li,
					{{WRAPPER}} .teconce-footer-widget-menu-items li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'list_color_hvr',
            [
                'label' => __('Menu List Hover Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teconce-footer-widget-menu-items li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'list_hover_BG_color',
            [
                'label' => __('Menu List Hover BG Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teconce-footer-widget-menu-items li a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'menu_typograph',
                'label' => __('List Menu Typography', 'plugin-domain'),
                'selector' => '{{WRAPPER}} .teconce-footer-widget-menu-items li a',

                'condition' => [
                    'footer_content_type' => 'list'
                ],
            ]
        );

        $this->add_responsive_control(
            'menu_list_gap',
            [
                'label' => esc_html__('Menu Items Gap', 'elementor'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 1,
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 30,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .teconce-footer-widget-menu-items li' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],

                'condition' => [
                    'footer_content_type' => 'list'
                ],
            ]
        );


        $this->add_control(
            'mobile_ttl_border_color',
            [
                'label' => __('Mobile Collapse Bar Border Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#DEDEDE',
                'selectors' => [
                    '{{WRAPPER}} .footer-collapse-bar-ems' => 'border-color: {{VALUE}}',
                ],


            ]
        );

        $this->add_control(
            'mobile_ttl_icon_color',
            [
                'label' => __('Mobile Collapse Bar Icon Color', 'teconce'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#717171',
                'selectors' => [
                    '{{WRAPPER}} .footer-collapse-bar-ems i' => 'color: {{VALUE}}',
                ],


            ]
        );

        $this->end_controls_section();


    }


    protected function render() {
        $settings = $this->get_settings_for_display();
        $title = $settings['footer-title'];
        $popular_tags = get_popular_wocommerce_tags($settings['Number-Of-Tags-Show']);
        ?>
        <div class="teconce-footer-widget-box">
            <div class="d-none d-md-block">
                <h4 class="footer-widget-title mb-3"><?php echo esc_attr($title); ?></h4>
                <div class="teconce-footer-widget-box-details">
                    <ul class="teconce-footer-widget-menu-items footer-woo-tag-list d-flex gap-3 flex-wrap">
                        <?php
                        foreach ($popular_tags as $key => $tag) {
                            echo '<li class="' . $tag . '"><a href="' . get_term_link($key) . '"> ' . $tag . ' </a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <div class="d-block d-md-none">
                <h4 class="footer-widget-title footer-widget-title-collapse  mb-3">
                    <button class="footer-collapse-bar-ems" type="button" data-bs-toggle="collapse" data-bs-target="#footer_woo-tag-list-mobile" aria-expanded="false" aria-controls="footer_woo-tag-list-mobile"><?php echo esc_attr($title); ?> <i class="ri-arrow-down-s-line"></i></button>
                </h4>

                <div class="collapse teconce-footercmn-widget-collapse" id="footer_woo-tag-list-mobile">

                    <ul class="teconce-footer-widget-menu-items footer-woo-tag-list d-flex gap-3 flex-wrap">
                        <?php
                        foreach ($popular_tags as $key => $tag) {
                            echo '<li class="' . $tag . '"><a href="' . get_term_link($key) . '"> ' . $tag . ' </a></li>';
                        }
                        ?>
                    </ul>

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

Plugin::instance()->widgets_manager->register(new teconce_footer_woo_tag_list);
?>