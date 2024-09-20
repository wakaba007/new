<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class teconce_footer_common extends Widget_Base {
    public function get_name() {
        return 'teconce_footer_common_mini';
    }

    public function get_title() {
        return __( 'Footer Common Element', 'teconce' );
    }
    public function get_categories() {
        return [ 'teconce-footer-elements' ];
    }
    public function get_icon() {
        return 'teconce-custom-icon';
    }
    protected function register_controls() {

        $this->start_controls_section(
            'teconce_footer_common_section_control',
            [
                'label' => __( 'Teconce Footer Element', 'elementor' ),
            ]
        );




        $this->add_control(
            'footer-title',
            [
                'label' => __( 'Footer Widget Title', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '', 'plugin-domain' ),
                'placeholder' => __( 'Type your title here', 'plugin-domain' ),
            ]
        );

        $this->add_control(
            'footer_content_type',
            [
                'label' => esc_html__( 'Content Type', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'list',
                'options' => [
                    'default'  => esc_html__( 'Text Area', 'plugin-name' ),
                    'list' => esc_html__( 'List Menu', 'plugin-name' ),
                    
                ],
            ]
        );
        $this->add_control(
            'footer_content_block_type',
            [
                'label' => esc_html__( 'List Style', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'one',
                'options' => [
                    'one'  => esc_html__( 'Flex Menu', 'plugin-name' ),
                    'two' => esc_html__( 'List Menu', 'plugin-name' ),
                    
                ],
            ]
        );
        $this->add_control(
            'footer_content_desc',
            [
                'label' => esc_html__( 'Description', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__( 'Default description', 'plugin-name' ),
                'placeholder' => esc_html__( 'Type your description here', 'plugin-name' ),

                'condition' => [
                    'footer_content_type' => 'default'
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'menu_title', [
                'label' => esc_html__( 'Menu Title', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'List Title' , 'plugin-name' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'menu_link',
            [
                'label' => esc_html__( 'Menu Link', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'plugin-name' ),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        
        $repeater->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				
			]
		);

        $this->add_control(
            'menu',
            [
                'label' => esc_html__( 'List Menu Items', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'menu_title' => esc_html__( 'About Us', 'plugin-name' ),
                        'menu_link' => esc_html__( '#', 'plugin-name' ),
                    ],

                ],

                'condition' => [
                    'footer_content_type' => 'list'
                ],
                'title_field' => '{{{ menu_title }}}',
            ]
        );
        
        
         $this->add_control(
            'unique-id',
            [
                'label' => __( 'Unique ID For Collapse Footer Bar', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'widget-one', 'plugin-domain' ),
                'placeholder' => __( 'Type your id here', 'plugin-domain' ),
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'my-account_style',
            [
                'label' => __( 'Footer Widget Style', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'title_bottom_gap',
            [
                'label' => esc_html__( 'Title Bottom Gap', 'elementor' ),
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
                    '{{WRAPPER}} .footer-widget-title' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'teconce' ),
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
                'label' => __( 'Title Typography', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .footer-widget-title,
				{{WRAPPER}} .teconce-footer-widget-box .footer-widget-title button.footer-collapse-bar-ems',
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => __( 'Content Color', 'teconce' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#717171',
                'selectors' => [
                    '{{WRAPPER}} .teconce-footer-widget-box-details,
					{{WRAPPER}} .teconce-footer-widget-box-details p,
					{{WRAPPER}} .teconce-footercmn-widget-collapse,
					{{WRAPPER}} .teconce-footercmn-widget-collapse p' => 'color: {{VALUE}}',
                ],

                'condition' => [
                    'footer_content_type' => 'default'
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typograph',
                'label' => __( 'Content Typography', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .teconce-footer-widget-box-details,
					{{WRAPPER}} .teconce-footer-widget-box-details p,
					{{WRAPPER}} .teconce-footercmn-widget-collapse,
						{{WRAPPER}} .teconce-footercmn-widget-collapse p',

                'condition' => [
                    'footer_content_type' => 'default'
                ],
            ]

        );

        $this->add_control(
            'list_color',
            [
                'label' => __( 'Menu List Color', 'teconce' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .teconce-footer-widget-menu-items,
					{{WRAPPER}} .teconce-footer-widget-menu-items li,
					{{WRAPPER}} .teconce-footer-widget-menu-items li a' => 'color: {{VALUE}}',
                ],

                'condition' => [
                    'footer_content_type' => 'list'
                ],
            ]
        );
        $this->add_control(
            'list_color_hvr',
            [
                'label' => __( 'Menu List Hover Color', 'teconce' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#717171',
                'selectors' => [
                    '{{WRAPPER}} .teconce-footer-widget-menu-items li a:hover' => 'color: {{VALUE}}',
                ],

                'condition' => [
                    'footer_content_type' => 'list'
                ],
            ]
        );
        $this->add_control(
            'list_hover_BG_color',
            [
                'label' => __( 'Menu List Hover BG Color', 'teconce' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .teconce-footer-widget-menu-items li a:hover' => 'background-color: {{VALUE}}',
                ],

                'condition' => [
                    'footer_content_type' => 'list'
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'menu_typograph',
                'label' => __( 'List Menu Typography', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .teconce-footer-widget-menu-items li a',

                'condition' => [
                    'footer_content_type' => 'list'
                ],
            ]
        );

        $this->add_responsive_control(
            'menu_list_gap',
            [
                'label' => esc_html__( 'Menu Items Gap', 'elementor' ),
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
                'label' => __( 'Mobile Collapse Bar Border Color', 'teconce' ),
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
                'label' => __( 'Mobile Collapse Bar Icon Color', 'teconce' ),
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


     $this->add_responsive_control(
            'menu_icon_gap',
            [
                'label' => esc_html__( 'Menu Icon Gap', 'elementor' ),
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
                    '{{WRAPPER}} .teconce-footer-widget-menu-items li a i' => 'margin-right: {{SIZE}}{{UNIT}}',
                ],

                'condition' => [
                    'footer_content_type' => 'list'
                ],
            ]
        );





        $this->end_controls_section();



    }


    protected function render() {
        $settings = $this->get_settings_for_display();
        $title = $settings['footer-title'];
        $contenttype = $settings['footer_content_type'];
        $content = $settings['footer_content_desc'];
        $unique_id = $settings['unique-id'];
        $footer_content_block_type = $settings['footer_content_block_type'];
        ?>
        <div class="teconce-footer-widget-box">
            <div class="d-none d-md-block">
                <h4 class="footer-widget-title"><?php echo esc_attr($title);?></h4>
                <div class="teconce-footer-widget-box-details teconce-footer-widget-list-<?php echo esc_attr($footer_content_block_type);?>">
                    

                      
                    <?php if ($contenttype=='default'){?>

                         <?php echo do_shortcode( wpautop( $content ) ); ?>

                    <?php } else { ?>

                        <?php
                        if ( $settings['menu'] ) {
                            echo '<ul class="teconce-footer-widget-menu-items">';
                            foreach (  $settings['menu'] as $index => $item ) {

                                $link_key = 'link_' . $index;
                                $this->add_link_attributes( $link_key , $item['menu_link'] );
                                ?>

                                <li class="elementor-repeater-item-<?php echo esc_attr( $item['_id']); ?> "> <a <?php $this->print_render_attribute_string( $link_key ); ?>> <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?> <?php echo esc_attr($item['menu_title']);?> </a></li>

                                <?php
                            }
                            echo '</ul>';
                        }

                        ?>
                    <?php } ?>
                     
                </div>
            </div>

            <div class="d-block d-md-none">
                <h4 class="footer-widget-title footer-widget-title-collapse">  <button class="footer-collapse-bar-ems" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($unique_id);?>" aria-expanded="false" aria-controls="<?php echo esc_attr($unique_id);?>"><?php echo esc_attr($title);?> <i class="ri-arrow-down-s-line"></i></button></h4>

                <div class="collapse teconce-footercmn-widget-collapse teconce-footer-widget-list-<?php echo esc_attr($footer_content_block_type);?>" id="<?php echo esc_attr($unique_id);?>">

                    <?php if ($contenttype=='default'){?>

                        <?php echo do_shortcode( wpautop( $content ) ); ?>

                    <?php } else { ?>

                        <?php
                        if ( $settings['menu'] ) {
                            echo '<ul class="teconce-footer-widget-menu-items">';
                            foreach (  $settings['menu'] as $index => $item ) {

                                $link_key = 'link_' . $index;
                                $this->add_link_attributes( $link_key , $item['menu_link'] );
                                ?>


                                <li class="elementor-repeater-item-<?php echo esc_attr( $item['_id']); ?> "> <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?> <a <?php $this->print_render_attribute_string( $link_key ); ?>> <?php echo esc_attr($item['menu_title']);?> </a></li>

                                <?php


                            }
                            echo '</ul>';
                        }

                        ?>
                    <?php } ?>

                </div>


            </div>
        </div>


        <?php
    }

    protected function content_template() {
        ?>

        <?php
    }

    public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register( new teconce_footer_common );
?>