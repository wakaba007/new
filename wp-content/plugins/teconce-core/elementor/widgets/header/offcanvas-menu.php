<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class pivoo_offcanvas extends Widget_Base {

   public function get_name() {
      return 'pivoo_offcanvas_menu';
   }

   public function get_title() {
      return __( 'Pivoo Offcanvas Nav', 'pivoo' );
   }
public function get_categories() {
		return [ 'pivoo-header-elements' ];
	}
   public function get_icon() { 
        return 'fab fa-product-hunt';
   }

   protected function register_controls() {
       
      $this->start_controls_section(
			'pivoo_offcanvas_section_control',
			[
				'label' => __( 'Pivoo Offcanvas', 'elementor' ),
			]
		);
		$this->add_control(
			'icon_style',
			[
				'label' => __( 'Icon Style', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default'  => __( 'Default Burger', 'plugin-domain' ),
					'left' => __( 'Left Aligned Icon', 'plugin-domain' ),
					'right' => __( 'Right Aligned Icon', 'plugin-domain' ),
				
				],
			]
		);
		
		$this->add_control(
			'slide_style',
			[
				'label' => __( 'Slide Direction', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  => __( 'Left', 'plugin-domain' ),
					'right' => __( 'Right', 'plugin-domain' ),
				
				],
			]
		);
		
		$this->add_control(
			'slide_width',
			[
				'label' => __( 'Slidebar Width', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 340,
				],
				'selectors' => [
					'{{WRAPPER}} .offcanvas--nav-menu' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
     $this->add_control(
			'icon_align',
			[
				'label' => __( 'Alignment', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'plugin-domain' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'plugin-domain' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'plugin-domain' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
			]
		);
      $this->add_control(
			'burger_cion_color',
			[
				'label' => __( 'Burger Icon Color', 'pivoo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#e2e0f5',
				'selectors' => [
					'{{WRAPPER}} .offcanvasburger span,{{WRAPPER}} .offcanvasburger span::before,{{WRAPPER}} .offcanvasburger span::after,
					{{WRAPPER}} .offcanvasburger.clicked span:before, {{WRAPPER}} .offcanvasburger.clicked span:after' => 'background-color: {{VALUE}}',
					
					'{{WRAPPER}} .offcanvasburger i' => 'color: {{VALUE}}',
				],
			]
		);
		
		   $this->add_control(
			'offcanvas_bg',
			[
				'label' => __( 'Offcanvas Background Color', 'pivoo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .offcanvas--nav-menu' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		 $this->add_control(
			'overlay_bg',
			[
				'label' => __( 'Overlay Color', 'pivoo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .overlayoffcanvas' => 'background-color: {{VALUE}}',
				],
			]
		);
	
	$this->add_control(
			'logo',
			[
				'label' => __( 'Logo', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->add_responsive_control(
			'padding',
			[
				'label' => __( 'Padding', 'plugin-domain' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .offcanvas--nav-menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

$this->end_controls_section();
      
      
   }

   protected function render() {
		$settings = $this->get_settings();
	    $icon_style = $settings ['icon_style'];
	    $slide_style = $settings ['slide_style'];
	    $icon_align = $settings ['icon_align'];
	    
	
		    $logo1x= cs_get_option('main-logo','url');
		      $logo2x= cs_get_option('main-logo-retina','url');
       
		
      
?>
      


    	<div class="pivoo-offcanvas">
              
                       
                       <div  class="offcanvas--nav-menu <?php echo $slide_style;?>-visible">
                           
                           <div class="offcanvas_content">
                    <?php if($settings['logo']['url']){ ?>
                      <div class="offcanvas--nav-logo">
                          <img src="<?php echo $settings['logo']['url']; ?>" alt="logo">
                      </div>
               <?php } ?>
               
               
               <?php if ( is_active_sidebar( 'offcanvas-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'offcanvas-sidebar' ); ?>
<?php endif; ?>
               
               </div>
                    </div>
            
                       <div class="overlayoffcanvas"></div>
                         <div  class="piv-overlay-nav" style="text-align:<?php echo $icon_align;?>">
                             <?php if ($icon_style=="left"){?>
                             <span class="offcanvasburger"><i class="fas fa-align-left"></i></span>
                             <?php } elseif ($icon_style=="right"){?>
                             <span class="offcanvasburger"><i class="fas fa-align-right"></i></span>
                             <?php } else { ?>
                         <span class="offcanvasburger"><span></span></span>
                         <?php  } ?>
                         </div >
                   
            </div>


      <?php

   }


   protected function content_template() {
		?>
		
		<?php
	}

   public function render_plain_content( $instance = [] ) {}
   
 

}
Plugin::instance()->widgets_manager->register( new pivoo_offcanvas );
?>