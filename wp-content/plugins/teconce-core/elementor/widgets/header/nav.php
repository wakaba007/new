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

class pivoo_nav extends Widget_Base {
     public function get_name() {
        return 'pivoo_main_nav';
    }

    public function get_title() {
        return __( 'Pivoo Navigation', 'pivoo' );
    }
    public function get_categories() {
        return [ 'pivoo-header-elements' ];
    }
    public function get_icon() {
        return 'fab fa-product-hunt';
    }
    
    protected $pivoo_menu_index = 1;

    protected function get_pivoo_menu_index() {
        return $this->pivoo_menu_index++;
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
            'pivoo_nav_section_control',
            [
                'label' => __( 'PIVOO:: Navigation', 'elementor' ),
            ]
        );


        $menus = $this->get_available_menus();

        if ( ! empty( $menus ) ) {
            $this->add_control(
                'menu',
                [
                    'label' => __( 'Menu', 'pivoo' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => $menus,
                    'default' => array_keys( $menus )[0],
                    'save_default' => true,
                    'separator' => 'after',
                    'description' => sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'pivoo' ), admin_url( 'nav-menus.php' ) ),
                ]
            );
        } else {
            $this->add_control(
                'menu',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => '<strong>' . __( 'There are no menus in your site.', 'pivoo' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'pivoo' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
                    'separator' => 'after',
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
                ]
            );
        }
         $this->end_controls_section();
         
         $this->start_controls_section(
            'section_style_main-menu',
            [
                'label' => __( '<span class="pivoo-badge-el">PIVOO</span>:: Menu Style', 'pivoo' ),
                'tab' => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'menu_typography',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} #pivoo-menu a',
            ]
        );
        
        $this->add_control(
			'menu_color',
			[
				'label' => __( 'Menu Text Color', 'pivoo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} #pivoo-menu ul a' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'sub_menu_color',
			[
				'label' => __( 'Sub Menu Text Color', 'pivoo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_3,
				],
				'selectors' => [
					'{{WRAPPER}} #pivoo-menu ul ul a' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'sub_menu_bg_color',
			[
				'label' => __( 'Sub Menu Background Color', 'pivoo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_3,
				],
				'selectors' => [
				   
					'{{WRAPPER}} #pivoo-menu ul ul' => 'background: {{VALUE}}',
					'{{WRAPPER}}  #pivoo-menu ul ul:before' => 'border-bottom-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
            'align_items',
            [
                'label' => __( 'Align', 'pivoo' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'pivoo' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'pivoo' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'pivoo' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' =>'left',
                'selectors' => [
				   
					'{{WRAPPER}} #pivoo-menu' => 'text-align: {{VALUE}}',
				
				],
            
            ]
        );

         $this->end_controls_section();
         
         $this->start_controls_section(
            'section_style_mega-menu',
            [
                'label' => __( '<span class="pivoo-badge-el">PIVOO</span>:: Mega Menu Style', 'pivoo' ),
                'tab' => Controls_Manager::TAB_STYLE,

            ]
        );
        
         $this->end_controls_section();
         
         $this->start_controls_section(
            'section_style_mobile-menu',
            [
                'label' => __( '<span class="pivoo-badge-el">PIVOO</span>:: Mobile Menu Style', 'pivoo' ),
                'tab' => Controls_Manager::TAB_STYLE,

            ]
        );
        
        $this->add_control(
            'align_mobile_items',
            [
                'label' => __( 'Align Mobile Burger', 'pivoo' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'pivoo' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'pivoo' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'pivoo' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' =>'right',
                'selectors' => [
				   
					'{{WRAPPER}} .mobile-nav' => 'text-align: {{VALUE}}',
				
				],
            
            ]
        );
        
        
        $this->add_control(
			'mobile_menu_burger_color',
			[
				'label' => __( 'Mobile Menu Burger Color', 'pivoo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_3,
				],
				'default' =>'#000000',
				'selectors' => [
				   
					'{{WRAPPER}} .burger span, .burger span::before,{{WRAPPER}} .burger span::after,{{WRAPPER}} .burger.clicked span:before,{{WRAPPER}} .burger.clicked span:after' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		 $this->add_control(
			'mobile_menu_text_color',
			[
				'label' => __( 'Mobile Menu Text Color', 'pivoo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_3,
				],
				'default' =>'#ffffff',
				'selectors' => [
				   
					'{{WRAPPER}} .pivoo-accordion ul li a' => 'color: {{VALUE}}',
				],
			]
		);
		
		 $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'mobile_menu_typography',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .pivoo-accordion ul li a',
            ]
        );
            $this->end_controls_section();

      }
      
      
       protected function render() {
           $available_menus = $this->get_available_menus();

        if ( ! $available_menus ) {
            return;
        }

        $settings = $this->get_active_settings();

        $args = [
            'echo' => false,
            'menu' => $settings['menu'],
            'menu_class' => 'pivoo-navigation-menu',
            'menu_id' => 'menu-' . $this->get_pivoo_menu_index() . '-' . $this->get_id(),
            'fallback_cb' => '__return_empty_string',
            'container' => '',
        ];
        
        
        // General Menu.
        $menu_html = wp_nav_menu( $args );
         
           if ( empty( $menu_html ) ) {
            return;
        } ?>
        
            <div class="pivoo-desktop-menu sm:hidden lg:block pivoo-hidden-phone">
          <nav id="pivoo-menu"><?php echo $menu_html; ?></nav>
          </div>
          
           <div class="pivoo-mobile-menu sm:block lg:hidden">
               
               <nav  class="mobile--nav-menu pivoo-accordion">
       
            	<?php echo $menu_html; ?>
       
            </nav>
    
               <div class="overlaymobile"></div>
                 <div  class="mobile-nav">
                 <span class="burger"><span></span></span>
                 </div >
            </div>
           <?php 
       }
       
       protected function _content_template() {
        ?>

        <?php
    }

    public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register( new pivoo_nav );
?>