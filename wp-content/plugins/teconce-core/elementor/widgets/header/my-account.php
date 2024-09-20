<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class teconce_myaccount extends Widget_Base {
     public function get_name() {
        return 'teconce_myaccount_mini';
    }

    public function get_title() {
        return __( 'My Account Menu', 'teconce' );
    }
    public function get_categories() {
        return [ 'teconce-header-elements' ];
    }
    public function get_icon() {
        return 'teconce-custom-icon';
    }
    
 
    
      protected function register_controls() {
          
          $this->start_controls_section(
            'teconce_myaccount_section_control',
            [
                'label' => __( 'Teconce My Account', 'elementor' ),
            ]
        );
        
        
        
		
		$this->add_control(
			'acc_icon',
			[
				'label' => __( 'Icon', 'text-domain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'ri-user-line',
					
				],
			]
		);
		
		$this->add_control(
			'logout_text',
			[
				'label' => __( 'Logged Out Text', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Login / Register', 'plugin-domain' ),
				'placeholder' => __( 'Type your title here', 'plugin-domain' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Logout Text Typography', 'textdomain' ),
				'name' => 'bottom_content_typography',
				'selector' => '{{WRAPPER}} .main-text-account .after-text',
				'condition' => [
                   'show_un' => 'yes',
                ],
			]
		);
		$this->add_control(
			'logot_text_color',
			[
				'label' => esc_html__( 'Logou Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .main-text-account .after-text' => 'color: {{VALUE}}',
				],
				'condition' => [
                   'show_bottom_texts' => 'yes',
                ],
			]
		);
		$this->add_control(
			'top_text',
			[
				'label' => __( 'Top Text', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Login / Register', 'plugin-domain' ),
				'placeholder' => __( 'Type your title here', 'plugin-domain' ),
			]
		);
		$this->add_control(
			'login_prv_text',
			[
				'label' => __( 'Text Before Display Name', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Hello! ', 'plugin-domain' ),
				'placeholder' => __( 'Type your title here', 'plugin-domain' ),
			]
		);


    $this->add_control(
			'show_un',
			[
				'label' => esc_html__( 'Show Username', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_responsive_control(
                'align_my_account_icon',
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
                                '{{WRAPPER}} .teconce-my-account-icon' => 'text-align: {{VALUE}} !important',
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
				// 'default' => [
				// 	'unit' => 'px',
				// 	'size' => 16,
				// ],
				'selectors' => [
					'{{WRAPPER}} .teconce-login-popup-mini i,
					{{WRAPPER}} .teconce-account-dropdown-mini i' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .teconce-login-popup-mini' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		

        $this->end_controls_section();
        
        $this->start_controls_section(
			'my-account_style',
			[
				'label' => __( 'My Account Style', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
			'my_account_icon_color',
			[
				'label' => __( 'Icon Color', 'teconce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .teconce-login-popup-mini i,
					{{WRAPPER}} .teconce-account-dropdown-mini i' => 'color: {{VALUE}}',
				],
			]
		);
		
		 $this->add_control(
			'my_account_icon_hvr_color',
			[
				'label' => __( 'Cart Icon Hover Color', 'teconce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#e2e0f5',
				'selectors' => [
					'{{WRAPPER}} .teconce-login-popup-mini i:hover,
					{{WRAPPER}} .teconce-account-dropdown-mini i:hover' => 'color: {{VALUE}}',
				],
			]
		);
		
		
		 $this->add_control(
			'my-account_counter_txt_color',
			[
				'label' => __( 'Text Color', 'teconce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .teconce-account-dropdown-mini,
					{{WRAPPER}} .teconce-login-popup-mini' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'my-account_dp_bg_color',
			[
				'label' => __( 'Dropdown Background Color', 'teconce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#222',
				'selectors' => [
					'{{WRAPPER}} .dropdown-menu.my-account-list' => 'background: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'my-account_dp_txt_color',
			[
				'label' => __( 'Dropdown Text Color', 'teconce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .dropdown-menu.my-account-list,
					{{WRAPPER}} .dropdown-menu.my-account-list a,
					{{WRAPPER}} .dropdown-menu.my-account-list .user-display-name-acc' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typo',
				'label' => __( 'Menu Typography', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .teconce-account-dropdown-mini,
				{{WRAPPER}} .teconce-login-popup-mini',
			]
		);
		
		$this->add_control(
			'my-login_title_bg',
			[
				'label' => __( 'Login Title Background', 'teconce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#fa6c2d',
				'selectors' => [
					'{{WRAPPER}} .xpc-login-pop-title' => 'background: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'my-login_title_color',
			[
				'label' => __( 'Login Title Color', 'teconce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .xpc-login-pop-title' => 'color: {{VALUE}}',
				],
			]
		);
      
   
            $this->end_controls_section();
            
           

       $this->start_controls_section(
   			'Icone_style',
   			[
   				'label' => __( 'Icon Style', 'plugin-name' ),
   				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
   			]
   		);
			$this->add_control(
			'icone_padding',
			[
				'label' => esc_html__( 'Icon Padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .my-account-menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .my-account-menu',
			]
		);
		 $this->add_control(
			'cart_icon_border_redious_size',
			[
				'label' => __( 'Account Icon Border Radius', 'plugin-domain' ),
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
					'{{WRAPPER}} .my-account-menu ' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .my-account-menu ',
			]
		);
		  $this->end_controls_section();
      }
      
      
          protected function render() {
           $settings = $this->get_settings_for_display();
              global $current_user;
              $show_un = $settings['show_un'];
              ?>
    
           <div class="teconce-my-account-icon">
            
         <?php if ( is_user_logged_in() ) { ?>
              
                
                <ul id="account-button" class="teconce-option-menu">
   
		<li class="dropdown cart_widget cart-style-one menu-item my-account-menu ">
   <a class="teconce-account-dropdown-mini teconce-account-text-style-<?php echo esc_attr($show_un);?>" href="#">
                 <?php \Elementor\Icons_Manager::render_icon( $settings['acc_icon'], [ 'aria-hidden' => 'true' ] ); ?>
<div class="main-text-account">
<?php if ( 'yes' === $settings['show_un'] ) {
					?>
					<span class="befor-text">Account</span>
					<?php
				 }?>

<span class="after-text"><?php if ( 'yes' === $settings['show_un'] ) { ?>
                <?php echo $settings['login_prv_text'];?> <?php echo esc_html($current_user->display_name ); ?>
                <?php } ?></span>

</div>
               
                </a>
    
   
    <div class="dropdown-menu my-account-list">
        
         
     <div class="mayosis-account-user-information">
        <span><?php echo get_avatar(get_the_author_meta('email'), '40'); ?></span>
     
       <span class="user-display-name-acc"><?php echo esc_html($current_user->display_name ); ?></span>
</div>
        <?php get_template_part('inc/account-menu');?>
     
    <div class="mayosis-logout-information">
       <a href="<?php echo wp_logout_url(home_url('/'));?> " class="mayosis-logout-link"><i class="ri-logout-box-r-line"></i> 
	   <?php esc_html_e('Logout','teconce');?>
	
	</a>
</div>
  </div>
</li>

</ul>
             
             <?php } else { ?>
               
                <a class="teconce-login-popup-mini teconce-account-text-style-<?php echo esc_attr($show_un);?>" href="#teconce-login-popup" data-lity>
                  <?php \Elementor\Icons_Manager::render_icon( $settings['acc_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				  <div class="main-text-account">
<?php if ( 'yes' === $settings['show_un'] ) {
					?>
					<span class="befor-text"><?php echo $settings['top_text']; ?></span>
					<?php
				 }?>

<span class="after-text"><?php if ( 'yes' === $settings['show_un'] ) { 
 echo $settings['logout_text']; ?> </span><?php
}
                
?>
</div>
                    
                
               
                </a>
                      
                                 
               <div class="teconce-login-popup lity-hide" id="teconce-login-popup">
                   <h3 class="xpc-login-pop-title"><i class="ri-login-box-line"></i> Login</h3>
                   <div class="xpc-login-content-p-conx">
                       <?php echo do_shortcode('[teconce_woo_login]');?>
                   </div>
                   
               </div>
                <?php } ?>
                    
               
           </div>
           
         
           <?php 
       }
       
       protected function content_template() {
        ?>

        <?php
    }

    public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register( new teconce_myaccount );
?>