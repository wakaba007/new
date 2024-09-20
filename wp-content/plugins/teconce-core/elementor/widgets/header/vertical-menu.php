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

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class teconce_vertial_nav extends Widget_Base {
     public function get_name() {
        return 'teconce_vertial_nav_box';
    }

    public function get_title() {
        return __( 'Teconce Vertical Navigation', 'teconce' );
    }
    public function get_categories() {
        return [ 'teconce-header-elements' ];
    }
    public function get_icon() {
        return 'teconce-custom-icon';
    }
    
    protected $teconce_menu_index = 1;

    protected function get_teconce_menu_index() {
        return $this->teconce_menu_index++;
    }

    private function get_available_menus() {
        $menus = wp_get_nav_menus();

        $options = [];

        foreach ( $menus as $menu ) {
            $options[ $menu->slug ] = $menu->name;
        }

        return $options;
    }
    
      protected function register_controls() {
          
          $this->start_controls_section(
            'teconce_vertial_nav_section_control',
            [
                'label' => __( 'Navigation', 'elementor' ),
            ]
        );
        
        $this->add_control(
			'main-information',
			[
				'label' => __( 'Please Select Vertical menu from Appearance> Menu. You can customize style from style tab', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'menu_box_title',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Bar Title', 'plugin-name' ),
				'default' =>'All Categories',
				'placeholder' => esc_html__( 'Enter your title', 'plugin-name' ),
			]
		);
		
			$this->add_control(
			'bar_icon',
			[
				'label' => __( 'Bar Icon', 'text-domain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'ri-bar-chart-horizontal-line',
					
				],
			]
		);
		$this->add_control(
			'right_icon_show',
			[
				'label' => esc_html__( 'Right Icon On/Off', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'bar_type',
			[
				'label' => esc_html__( 'Bar Mode', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'emccollapsed',
				'options' => [
					'emccollapsed'  => esc_html__( 'Collapsed', 'plugin-name' ),
					'drop-active' => esc_html__( 'Expanded', 'plugin-name' ),
					
				],
			]
		);

         $this->end_controls_section();
         
         $this->start_controls_section(
            'section_style_main-menu',
            [
                'label' => __( '<span class="teconce-badge-el">Teconce</span> Menu Bar Style', 'teconce' ),
                'tab' => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'bar_typography',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .etc-ver-cat-toggle',
            ]
        );
        
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'bar_background',
				'label' => esc_html__( 'Bar Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .etc-ver-cat-toggle',
			]
		);
        
        $this->add_control(
			'bar_text_color',
			[
				'label' => __( 'Bar Text Color', 'teconce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} #emrc_vertial_nav_box .etc-ver-cat-toggle' => 'color: {{VALUE}}',
				],
			]
		);
		
        $this->add_control(
			'bar_padding',
			[
				'label' => __( 'Padding', 'plugin-domain' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} #emrc_vertial_nav_box .etc-ver-cat-toggle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		
		
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'menu_box_background',
				'label' => esc_html__( 'Menu Box Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .teconce-vertical-nav-dropdown',
			]
		);
		

		
		$this->add_control(
			'bar_text_color_hvr',
			[
				'label' => __( 'Bar Text Color Hover', 'teconce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} #emrc_vertial_nav_box .etc-ver-cat-toggle:hover' => 'color: {{VALUE}}',
				],
			]
		);

		
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'menu_text_typography',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} #emrc_vertial_nav_box .teconce-vertical-nav-dropdown .xpc-nav-link ',
            ]
        );
        
        
        $this->add_control(
			'menu_bar_padding',
			[
				'label' => __( 'Side Main Menu Padding', 'plugin-domain' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .teconce-vertical-nav-dropdown .nav-style-megamenu > li.nav-item .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);



          $this->add_responsive_control(
              'Dropdown-Category-Width',
              [
                  'label' => esc_html__( 'Dropdown Category Width', 'textdomain' ),
                  'type' => \Elementor\Controls_Manager::SLIDER,
                  'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                  'range' => [
                      'px' => [
                          'min' => 0,
                          'max' => 1000,
                          'step' => 1,
                      ],
                      '%' => [
                          'min' => 0,
                          'max' => 100,
                          'max' => 100,
                      ],
                  ],
                  'selectors' => [
                      '{{WRAPPER}} #emrc_vertial_nav_box .teconce-vertical-nav-dropdown' => 'width: {{SIZE}}{{UNIT}};',
                  ],
              ]
          );
          $this->add_control(
              'Dropdown-Category-Bg-Border-Radius',
              [
                  'label' => esc_html__( 'Category Bg Border Radius', 'textdomain' ),
                  'type' => \Elementor\Controls_Manager::DIMENSIONS,
                  'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                  'selectors' => [
                      '{{WRAPPER}} #emrc_vertial_nav_box .teconce-vertical-nav-dropdown' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                  ],
              ]
          );

          $this->add_control(
              'exapnaded-bar-margin',
              [
                  'label' => esc_html__( 'Expanded Bar Margin', 'textdomain' ),
                  'type' => \Elementor\Controls_Manager::DIMENSIONS,
                  'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                  'selectors' => [
                      '{{WRAPPER}} .teconce-elementor-nav.teconce-vertical-nav-dropdown' => 'margin-top: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                  ],
              ]
          );

         $this->end_controls_section();
         
            $this->start_controls_section(
            'section_style_mega-menu',
            [
                'label' => __( '<span class="teconce-badge-el">Teconce</span> Mega Menu Style', 'teconce' ),
                'tab' => Controls_Manager::TAB_STYLE,

            ]
        );
        
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'xpc-mega-bg',
				'label' => __( 'Mega Sub Menu Background', 'plugin-domain' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .teconce-vertical-nav-dropdown .teconce-m-menu .nav-style-megamenu > li.nav-item .dropdown-menu .submenu-box',
			]
		);

          $this->add_control(
              'men_text_color',
              [
                  'label' => __( 'Menu Text Color', 'teconce' ),
                  'type' => \Elementor\Controls_Manager::COLOR,
                  'scheme' => [
                      'type' => \Elementor\Core\Schemes\Color::get_type(),
                      'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                  ],
                  'selectors' => [
                      '{{WRAPPER}} #emrc_vertial_nav_box .teconce-vertical-nav-dropdown .xpc-nav-link' => 'color: {{VALUE}}',
                  ],
              ]
          );



          $this->add_control(
              'men_text_color_hvr',
              [
                  'label' => __( 'Menu Text Color Hover', 'teconce' ),
                  'type' => \Elementor\Controls_Manager::COLOR,
                  'scheme' => [
                      'type' => \Elementor\Core\Schemes\Color::get_type(),
                      'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                  ],
                  'selectors' => [
                      '{{WRAPPER}} #emrc_vertial_nav_box li:hover > a' => 'color: {{VALUE}} !important',
                  ],
              ]
          );
	      $this->add_control(
		      'men_hvr_without_hver_bg',
		      [
			      'label' => __( 'Menu Bg Color', 'teconce' ),
			      'type' => \Elementor\Controls_Manager::COLOR,
			      'scheme' => [
				      'type' => \Elementor\Core\Schemes\Color::get_type(),
				      'value' => \Elementor\Core\Schemes\Color::COLOR_1,
			      ],
			      'selectors' => [
				      '{{WRAPPER}} #emrc_vertial_nav_box li' => 'background: {{VALUE}}',
			      ],
		      ]
	      );

          $this->add_control(
              'men_border-Color',
              [
                  'label' => __( 'Menu Border Color', 'teconce' ),
                  'type' => \Elementor\Controls_Manager::COLOR,
                  'scheme' => [
                      'type' => \Elementor\Core\Schemes\Color::get_type(),
                      'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                  ],
                  'selectors' => [


                      '{{WRAPPER}} #emrc_vertial_nav_box .teconce-vertical-nav-dropdown .xpc-nav-link' => 'border-color: {{VALUE}}',
                  ],
              ]
          );
          $this->add_control(
              'men_hvr_bg',
              [
                  'label' => __( 'Menu Hover Bg Color', 'teconce' ),
                  'type' => \Elementor\Controls_Manager::COLOR,
                  'scheme' => [
                      'type' => \Elementor\Core\Schemes\Color::get_type(),
                      'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                  ],
                  'selectors' => [
                      '{{WRAPPER}} #emrc_vertial_nav_box li:hover' => 'background: {{VALUE}}',
                  ],
              ]
          );

          $this->add_control(
              'men_hvr_border',
              [
                  'label' => __( 'Menu Hover Border Color', 'teconce' ),
                  'type' => \Elementor\Controls_Manager::COLOR,
                  'scheme' => [
                      'type' => \Elementor\Core\Schemes\Color::get_type(),
                      'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                  ],
                  'selectors' => [
                      '{{WRAPPER}} #emrc_vertial_nav_box li:hover a' => 'border-color: {{VALUE}} !important',
                  ],
              ]
          );


          $this->add_control(
			'xpc-mega-sub-menu-1',
			[
				'label' => __( 'Sub Menu Title Color', 'teconce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_3,
				],
				// 'default' =>'#28170E',
				'selectors' => [
				   
					'{{WRAPPER}} .nav-style-megamenu > li.nav-item .dropdown-menu .teconce-mg-col-title,
                {{WRAPPER}} .nav-style-megamenu > li.nav-item .dropdown-menu a.teconce-mg-col-title,
                {{WRAPPER}} .nav-style-megamenu > li.nav-item .dropdown-menu .xpc-p-box a.teconce-mg-col-title' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'xpc-mega-sub-menu-1-hvr',
			[
				'label' => __( 'Sub Menu Title Hover Color', 'teconce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				// 'default' =>'#28170E',
				'selectors' => [
				   
					'{{WRAPPER}} .nav-style-megamenu > li.nav-item .dropdown-menu .teconce-mg-col-title:hover,
                {{WRAPPER}} .nav-style-megamenu > li.nav-item .dropdown-menu a.teconce-mg-col-title:hover,
                {{WRAPPER}} .nav-style-megamenu > li.nav-item .dropdown-menu .xpc-p-box a.teconce-mg-col-title:hover' => 'color: {{VALUE}}',
				],
			]
		);
		
		 $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'xpc-mega-sub-menu-typo1',
                'label' => __( 'Sub Menu Title Typography', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .nav-style-megamenu > li.nav-item .dropdown-menu .teconce-mg-col-title,
                {{WRAPPER}} .nav-style-megamenu > li.nav-item .dropdown-menu a.teconce-mg-col-title,
                {{WRAPPER}} .nav-style-megamenu > li.nav-item .dropdown-menu .xpc-p-box a.teconce-mg-col-title' ,
            ]
        );
		
		 
		
		$this->add_control(
			'xpc-mega-sub-menu-2',
			[
				'label' => __( 'Sub Menu Text Color', 'teconce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				// 'default' =>'#28170E',
				'selectors' => [
				   
					'{{WRAPPER}} #emrc_vertial_nav_box .teconce-vertical-nav-dropdown .xpc-nav-link.dropdown-item
					' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'xpc-mega-sub-menu-2hvr',
			[
				'label' => __( 'Sub Menu Text Hover Color', 'teconce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				// 'default' =>'#28170E',
				'selectors' => [
				   
					'{{WRAPPER}} #emrc_vertial_nav_box .teconce-vertical-nav-dropdown .xpc-nav-link.dropdown-item:hover' => 'color: {{VALUE}}',
				],
			]
		);
		
			$this->add_control(
			'xpc-mega-sub-menu-2hvr_bg',
			[
				'label' => __( 'Sub Menu Background Hover Color', 'teconce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_3,
				],
				// 'default' =>'#ffffff',
				'selectors' => [
				   
					'{{WRAPPER}} #emrc_vertial_nav_box .teconce-vertical-nav-dropdown .xpc-nav-link.dropdown-item' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'xpc-mega-sub-menu-typo2',
                'label' => __( 'Sub Menu Text Typography', 'plugin-domain' ),
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} #emrc_vertial_nav_box .teconce-vertical-nav-dropdown .xpc-nav-link.dropdown-item',
            ]
        );

          $this->add_responsive_control(
              'sub_menu_bar_padding',
              [
                  'label' => __( 'Side Sub Menu Padding', 'plugin-domain' ),
                  'type' => Controls_Manager::DIMENSIONS,
                  'size_units' => [ 'px', '%', 'em' ],
                  'selectors' => [
                      '{{WRAPPER}} #emrc_vertial_nav_box .teconce-vertical-nav-dropdown .xpc-nav-link.dropdown-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                  ],
              ]
          );
        
	
		
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'xpc_box_shadow',
				'label' => __( 'Box Shadow', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .nav-style-megamenu>li.nav-item .dropdown-menu .submenu-box:after',
			]
		);
		
		
        
         $this->end_controls_section();
  

      }
      
      
       protected function render() { 
           
             $settings = $this->get_settings_for_display();
             $title = $settings['menu_box_title'];
             $bar_type = $settings['bar_type'];
			
       
       ?>
       
       <div class="teconce-vertical-nav ">
           
           <div class="position-relative teconce-vertical-nav-box" id="emrc_vertial_nav_box">
                <a href="#" class="etc-ver-cat-toggle"> <span><?php \Elementor\Icons_Manager::render_icon( $settings['bar_icon'], [ 'aria-hidden' => 'true' ] ); ?></span> <?php echo esc_html($title);?> 
				<?php
				if($settings['right_icon_show'] == 'yes'){
					?>
					<i class="ri-arrow-down-s-line"></i>
					<?php
				}
				?>
				</a>
                
            <nav class="teconce-elementor-nav teconce-vertical-nav-dropdown <?php echo esc_html($bar_type);?>">
             <?php get_template_part('template-parts/header/header-vertical-nav');?>
            </nav>

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
Plugin::instance()->widgets_manager->register( new teconce_vertial_nav );
?>