<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class teconce_logo extends Widget_Base {

   public function get_name() {
      return 'teconce_main_logo';
   }

   public function get_title() {
      return __( 'Logo', 'teconce' );
   }
public function get_categories() {
		return [ 'teconce-header-elements' ];
	}
   public function get_icon() { 
        return 'teconce-custom-icon';
   }

   protected function register_controls() {
       
      $this->start_controls_section(
			'teconce_logo_section_control',
			[
				'label' => __( 'Teconce Logo', 'elementor' ),
			]
		);
		
      $this->add_control(
			'elementor-image',
			[
				'label' => __( 'Overwrite Theme Option Logo', 'elementor' ),
				'type' => Controls_Manager::MEDIA,
			
			]
		);
		
		$this->add_control(
			'elementor-image-2x',
			[
				'label' => __( 'Overwrite Theme Option Retina Logo', 'elementor' ),
				'type' => Controls_Manager::MEDIA,
	
			]
		);

	

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .teconce-logo' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		

$this->add_control(
			'logo-width',
			[
				'label' => __( 'Logo Width', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' =>10,
						'max' => 300,
						'step' => 5,
					],
					
				],
				'selectors' => [
					'{{WRAPPER}} .site-main-logo-elementor img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

$this->end_controls_section();
      
      
   }

   protected function render() {
		$settings = $this->get_settings();
		$logoelementor =  $settings['elementor-image']['url'];
		$logoelementor2x =  $settings['elementor-image-2x']['url'];
	
		if ($logoelementor){
		    $logo1x= $logoelementor;
		     $logo2x= $logoelementor2x;
		} else {
		    $logo1x= cs_get_option('main-logo','url');
		      $logo2x= cs_get_option('main-logo-retina','url');
        if ($logo2x){
            $logo2x= cs_get_option('main-logo-retina','url');
        } else {
             $logo2x= cs_get_option('main-logo','url');
        }
		}
		
      
?>
      


    	<div class="teconce-logo">
		<a class="site-main-logo-elementor" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if ($logo1x){ ?>
                        <img src="<?php echo esc_url($logo1x);?>" srcset="<?php echo esc_url($logo2x);?> " alt="logo" class="has-retina">
                    <?php } else {?>
                  <img src="<?php echo get_template_directory_uri();?>/image/teconce-logo-2x.svg" alt="logo">
                  <?php }?>
                  
                </a>
			</div>
	

		


      <?php

   }


   protected function content_template() {
		?>
		
		<?php
	}

   public function render_plain_content( $instance = [] ) {}
   
 

}
Plugin::instance()->widgets_manager->register( new teconce_logo );
?>