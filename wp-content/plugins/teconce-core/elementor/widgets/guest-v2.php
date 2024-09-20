<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class teconce_guest_v2 extends Widget_Base {

	public function get_name() {
		return 'teconce_guest_v2';
	}

	public function get_title() {
		return __( 'Teconce Guest V2', 'teconce' );
	}

	public function get_categories() {
		return [ 'teconce-ele-widgets-cat' ];
	}

	public function get_icon() {
		return 'teconce-custom-icon';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section-Content',
			[
				'label' => esc_html__( 'Section Content', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'section_subtitle',
			[
				'label'       => esc_html__( 'Section Subtitle', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Spacial Guest', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your subtitle here', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label'       => esc_html__( 'Section Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => __( 'The adventure begins <br> with I do', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'guest_img',
			[
				'label' => esc_html__( 'Guest Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_control(
			'guest_name',
			[
				'label'       => esc_html__( 'Guest Name', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Albert Floew', 'textdomain' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'guest_designation',
			[
				'label'       => esc_html__( 'Guest Designation', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Chif Guest', 'textdomain' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'list',
			[
				'label'       => esc_html__( 'Guest List', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'guest_name' => esc_html__( 'Albert Floew', 'textdomain' ),
					],
					[
						'guest_name' => esc_html__( 'SAKIB AK', 'textdomain' ),
					],
					[
						'guest_name' => esc_html__( 'Marl David', 'textdomain' ),
					],
				],
				'title_field' => '{{{ guest_name }}}',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section-style',
			[
				'label' => esc_html__( 'Section Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'Container-width',
			[
				'label'      => esc_html__( 'Container Width', 'textdomain' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 3000,
						'step' => 1,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .container' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'Section-Padding',
			[
				'label'      => esc_html__( 'Section Padding', 'textdomain' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .sw__guest-v3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'shape_img',
			[
				'label' => esc_html__( 'Shape Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Section-Subtitle-style',
			[
				'label' => esc_html__( 'Section Subtitle Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Section-Subtitle-color',
			[
				'label'     => esc_html__( 'Section Subtitle Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__section-subtitle' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Subtitle-typography',
				'label'    => esc_html__( 'Section Subtitle Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__section-subtitle',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Section-Title-style',
			[
				'label' => esc_html__( 'Section Title Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Section-Title-color',
			[
				'label'     => esc_html__( 'Section Title Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__section-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Title-typography',
				'label'    => esc_html__( 'Section Title Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__section-title',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Guest-style',
			[
				'label' => esc_html__( 'Guest Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Guest-name-color',
			[
				'label'     => esc_html__( 'Guest name Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw_guest-main-card-img-content h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Guest-name-typography',
				'label'    => esc_html__( 'Guest name Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw_guest-main-card-img-content h4',
			]
		);
		$this->add_control(
			'Guest-Designation-color',
			[
				'label'     => esc_html__( 'Guest Designation Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw_guest-main-card-img-content p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Guest-Designation-typography',
				'label'    => esc_html__( 'Guest Designation Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw_guest-main-card-img-content p',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'label'    => esc_html__( 'Guest image Background', 'textdomain' ),
				'name'     => 'background',
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .sw_guest-main-card-img::before',
			]
		);
		$this->end_controls_section();

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- Guest Start-->
        <section class="sw__guest-v3 sw--Bg-color-white-100 pt-120 mt-120 position-relative">
			<?php if ( $settings['shape_img']['url'] ) { ?>
                <div class="sw__guest-shape d-none d-md-block" data-parallax='{"y" :  "100"}'>
                    <img src="<?php echo $settings['shape_img']['url']; ?>" alt="">
                </div>
			<?php } ?>
            <div class="sw__guest-wrapper position-relative">
                <div class="container container-1290">
                    <div class="sw__guest-section-content d-flex flex-column align-items-center">
						<?php if ( $settings['section_subtitle'] ) { ?>
                            <div class="sw__section-subtitle sw--color-brown sw--fs-14  mb-20 wow fadeInLeft">
								<?php echo $settings['section_subtitle']; ?>
                            </div>
						<?php } ?>
						<?php if ( $settings['section_title'] ) { ?>
                            <div class="sw__section-title sw__guest-section-title sw--fs-50 sw--color-black-900  wow fadeInLeft mb-75 text-center" data-wow-delay="0.3s">
								<?php echo $settings['section_title']; ?>
                            </div>
						<?php } ?>
                    </div>
                    <div class="sw_guest-main">
                        <div class="row g-30 justify-content-center">
							<?php
							$i = 0.3;
							foreach ( $settings['list'] as $item ) {
								?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="sw_guest-main-card text-center  wow fadeInUp" data-wow-delay="0.<?php echo $i; ?>s">
                                        <div class="sw_guest-main-card-img position-relative sw__shine_animation overflow-hidden">
                                            <img src="<?php echo $item['guest_img']['url']; ?>" alt="">
                                        </div>
                                        <div class="sw_guest-main-card-img-content">
                                            <h4 class="sw--fs-27 sw--color-black-900  pt-25 pb-10"><?php echo $item['guest_name']; ?></h4>
                                            <p class="sw--fs-16 sw--color-black-800"><?php echo $item['guest_designation']; ?></p>
                                        </div>
                                    </div>
                                </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Guest End-->
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_guest_v2 );



