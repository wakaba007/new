<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class teconce_wishlist extends Widget_Base {
     public function get_name() {
        return 'teconce_wishlist_mini';
    }

    public function get_title() {
        return __( 'Teconce Wishlist', 'teconce' );
    }
    public function get_categories() {
        return [ 'teconce-header-elements' ];
    }
    public function get_icon() {
        return 'teconce-custom-icon';
    }
    
 
    
      protected function register_controls() {
          
          $this->start_controls_section(
            'teconce_wishlist_section_control',
            [
                'label' => __( 'Teconce Wishlist', 'elementor' ),
            ]
        );
			$this->add_control(
			'show_bottom_texts',
			[
				'label' => esc_html__( 'Top Text Show', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				
			]
		);
		   $this->add_control(
			'login_top_text',
			[
				'label' => __( 'Top Text', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Wishlist ', 'plugin-domain' ),
				'placeholder' => __( 'Type your title here', 'plugin-domain' ),
				'condition' => [
                   'show_bottom_texts' => 'yes',
                ],
			]
		);
		$this->add_control(
			'wishlist_top_color',
			[
				'label' => esc_html__( 'Top Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .main-wishlist-text .top-content-option' => 'color: {{VALUE}}',
				],
				'condition' => [
                   'show_bottom_texts' => 'yes',
                ],
			]
		);
	$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Top Text Typography', 'textdomain' ),
				'name' => 'top_content_typography',
				'selector' => '{{WRAPPER}} .main-wishlist-text .top-content-option',
				'condition' => [
                   'show_bottom_texts' => 'yes',
                ],
			]
		);
        	 $this->add_control(
			'login_bottom_text',
			[
				'label' => __( 'Bottom Text', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Edit Wishlist', 'plugin-domain' ),
				'placeholder' => __( 'Type your title here', 'plugin-domain' ),
				'condition' => [
                   'show_bottom_texts' => 'yes',
                ],
			]
		);
		$this->add_control(
			'wishlist_bottom_color',
			[
				'label' => esc_html__( 'Bottom Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .main-wishlist-text .bottom-content-option' => 'color: {{VALUE}}',
				],
				'condition' => [
                   'show_bottom_texts' => 'yes',
                ],
			]
		);
    	$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Bottom Text Typography', 'textdomain' ),
				'name' => 'bottom_content_typography',
				'selector' => '{{WRAPPER}} .bottom-content-option',
				'condition' => [
                   'show_bottom_texts' => 'yes',
                ],
			]
		);
		 
	
		$this->add_responsive_control(
                'align_wishlist_icon',
                [
                    'label'        => __( 'Icon Alignment', 'mayosis' ),
                    'type'         => Controls_Manager::CHOOSE,
                    'options'      => [
                        'left'   => [
                            'title' => __( 'Left', 'mayosis' ),
                            'icon'  => 'eicon-h-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'mayosis' ),
                            'icon'  => 'eicon-h-align-center',
                        ],
                        'right'  => [
                            'title' => __( 'Right', 'mayosis' ),
                            'icon'  => 'eicon-h-align-right',
                        ],
                    ],
                    'prefix_class' => 'elementor-align-%s',
                    'default'      => 'left',
                    'selectors' => [
                                '{{WRAPPER}} .teconce-wishlist-icon' => 'text-align: {{VALUE}} !important',
                            ],
                ]
            );
		    
			$this->add_control(
			'icon_size',
			[
				'label' => __( 'Icon Size', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
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
					'{{WRAPPER}} .teconce-wishlist-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
			$this->add_control(
			'line_height',
			[
				'label' => __( 'Line Height', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .teconce-wishlist-icon .teconce-wishlist-header-bar' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
        $this->end_controls_section();
        
        $this->start_controls_section(
			'wishlist_style',
			[
				'label' => __( 'Wishlist Style', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
			'wishlist_icon_color',
			[
				'label' => __( 'Wishlist Icon Color', 'teconce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#e2e0f5',
				'selectors' => [
					'{{WRAPPER}} .teconce-wishlist-header-bar i' => 'color: {{VALUE}}',
				],
			]
		);
		
		 $this->add_control(
			'wishlist_icon_hvr_color',
			[
				'label' => __( 'Wishlist Icon Hover Color', 'teconce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#e2e0f5',
				'selectors' => [
					'{{WRAPPER}} .teconce-wishlist-header-bar i:hover' => 'color: {{VALUE}}',
				],
			]
		);
		
		
		 $this->add_control(
			'wishlist_counter_txt_color',
			[
				'label' => __( 'Wishlist Counter Text Color', 'teconce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .yith-wcwl-items-count' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'wishlist_counter_bg_color',
			[
				'label' => __( 'Wishlist Counter Background Color', 'teconce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#FF7246',
				'selectors' => [
					'{{WRAPPER}} .yith-wcwl-items-count' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => '-wishlist_background',
				'label' => __( 'Wishlist Background Color', 'teconce' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .teconce-wishlist-header-bar ',
			]
		);
			$this->add_control(
			'wishlist_icone_padding',
			[
				'label' => esc_html__( 'Padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .teconce-wishlist-header-bar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
    $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .teconce-wishlist-icon a',
			]
		);
		 
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border_icon',
				'selector' => '{{WRAPPER}} .teconce-wishlist-icon a',
			]
		);
		 $this->add_control(
			'wishlist_icon_border_redious_size',
			[
				'label' => __( 'wishlist Border Radius', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 30,
						'step' => 1,
					],
					
				],
				'default' => [
					'unit' => '%',
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .teconce-wishlist-icon a ' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				
			]
		);
		$this->add_control(
			'wishlist_icon_counter_redious',
			[
				'label' => __( 'wishlist Counter Border Radius', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 30,
						'step' => 1,
					],
					
				],
				'default' => [
					'unit' => '%',
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .teconce-wishlist-header-bar .yith-wcwl-items-count ' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				
			]
		);
            $this->end_controls_section();
            
            

      }
      
      
          protected function render() {
           $settings = $this->get_settings_for_display();
		 $show_bottom_texts = $settings['show_bottom_texts'];
              global $woocommerce;
             
              ?>
    
           <div class="teconce-wishlist-icon teconce-wishlist-icon-<?php echo esc_attr($show_bottom_texts);?>">
                   
    <?php if( Plugin::instance()->editor->is_edit_mode() ){
                     echo do_shortcode('[teconce_wcwl_items_count]');
if ( 'yes' == $settings['show_bottom_texts'] ){
	?>
		<div class="main-wishlist-text">
							<p class="top-content-option"><?php echo $settings['login_top_text'];  ?></p>
							<p  ><?php echo $settings['login_bottom_text'];  ?></p>
						</div>
	
	<?php
}

					 ?>
					 
					
					<?php
                    } else{ 
                       
                       echo do_shortcode('[teconce_wcwl_items_count]');
					   if ( 'yes' == $settings['show_bottom_texts'] ){
	?>
		<div class="main-wishlist-text">
							<p class="top-content-option"><?php echo $settings['login_top_text'];  ?></p>
							<p class="bottom-content-option"><?php echo $settings['login_bottom_text'];  ?></p>
						</div>
	
	<?php
}
                    } ?>
                    
       
               
           </div>
           
         
           <?php 
       }
       
       protected function content_template() {
        ?>

        <?php
    }

    public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register( new teconce_wishlist );
?>