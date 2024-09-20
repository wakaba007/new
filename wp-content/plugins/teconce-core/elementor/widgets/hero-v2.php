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

class teconce_hero_v2 extends Widget_Base {

	public function get_name() {
		return 'teconce_hero_v2';
	}

	public function get_title() {
		return __( 'Teconce Hero V2', 'teconce' );
	}

	public function get_categories() {
		return [ 'teconce-ele-widgets-cat' ];
	}

	public function get_icon() {
		return 'teconce-custom-icon';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'Hero-Shapes',
			[
				'label' => __( 'Hero Shapes', 'teconce' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'left_bottom_shape',
			[
				'label' => esc_html__( 'Left Bottom Shape', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'hero-Shapes-options',
			[
				'label'     => esc_html__( '<--- Hero Shapes --->', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'shape_img',
			[
				'label' => esc_html__( 'Shapes Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_responsive_control(
			'shape-top',
			[
				'label'      => esc_html__( 'Top', 'textdomain' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$repeater->add_responsive_control(
			'shape-left',
			[
				'label'      => esc_html__( 'Left', 'textdomain' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'list',
			[
				'label'       => esc_html__( 'Shapes List', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();
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
				'default'     => esc_html__( 'Save the date For the wedding of', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label'       => esc_html__( 'Section Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Lucasio', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_middle_text',
			[
				'label'       => esc_html__( 'Section Middle Text', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'And', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_2nd_title',
			[
				'label'       => esc_html__( 'Section 2nd Text', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'micalio', 'textdomain' ),
			]
		);
		$this->add_control(
			'date',
			[
				'label'       => esc_html__( 'Date', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'november 10,2024', 'textdomain' ),
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Hero-Main-Image-Content',
			[
				'label' => esc_html__( 'Hero Main Image Content', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'hero_main_image',
			[
				'label' => esc_html__( 'Hero Main Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'hero_main_image_shape',
			[
				'label' => esc_html__( 'Hero Main Image Shape', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
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
		$this->add_control(
			'Section-BG-color',
			[
				'label'     => esc_html__( 'Section BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__hero-v2' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .sw__hero-v2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
					'{{WRAPPER}} .sw__hero-v2-content-sub' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Subtitle-typography',
				'label'    => esc_html__( 'Section Subtitle Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__hero-v2-content-sub',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Name-style',
			[
				'label' => esc_html__( 'Name Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Name-color',
			[
				'label'     => esc_html__( 'Name Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__hero-v2-content-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Name-typography',
				'label'    => esc_html__( 'Name Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__hero-v2-content-title',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Middle-Text-style',
			[
				'label' => esc_html__( 'Middle Text Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Middle-Text-color',
			[
				'label'     => esc_html__( 'Middle Text Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__hero-v2-content-middol' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Middle-Text-typography',
				'label'    => esc_html__( 'Middle Text Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__hero-v2-content-middol',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Section-Date-style',
			[
				'label' => esc_html__( 'Section Date Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Section-Date-color',
			[
				'label'     => esc_html__( 'Section Date Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__hero-v2-content-date' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Date-typography',
				'label'    => esc_html__( 'Section Date Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__hero-v2-content-date',
			]
		);
		$this->end_controls_section();


	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- Hero Section Start -->
        <div class="sw__hero-v2 sw--Bg-color-black-900 position-relative overflow-hidden">
			<?php if ( ! empty( $settings['left_bottom_shape']['url'] ) ) { ?>
                <img class="sw__hero-v2-main-sheap3 d-none d-xl-block position-absolute bottom-0 z-0 " src="<?php echo $settings['left_bottom_shape']['url']; ?>" alt="" data-wow-delay="0.6s"/>
			<?php } ?>
            <div class="sw__hero-v2-wrapper">
                <div class="container container-1290 position-relative">
					<?php
					$i = 2;
					$j = 0;
					foreach ( $settings['list'] as $item ) {
						$i ++;
						$j++;

						?>
                        <img class="sw__hero-v2-small-sheap<?php echo $j; ?> position-absolute z-0 elementor-repeater-item-<?php echo $item['_id']; ?>" src="<?php echo $item['shape_img']['url']; ?>" alt="" data-wow-delay="0.<?php echo $i; ?>s"/>
					<?php } ?>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="sw__hero-v2-content z-3 position-relative">
								<?php if ( $settings['section_subtitle'] ) { ?>
                                    <h6 class="sw__hero-v2-content-sub sw--fs-21 sw--color-white text-center  wow fadeInUp" data-wow-delay="0.3s"> <?php echo $settings['section_subtitle']; ?> </h6>
								<?php } ?>
								<?php if ( $settings['section_title'] ) { ?>
                                    <h2 class="sw__hero-v2-content-title sw--fs-105 sw--color-white text-center  pt-50 wow fadeInUp" data-wow-delay="0.4s"> <?php echo $settings['section_title']; ?> </h2>
								<?php } ?>
								<?php if ( $settings['section_middle_text'] ) { ?>
                                    <div class="sw__hero-v2-content-middol sw--fs-34 sw--color-white text-center  pt-40 pb-50 wow fadeInUp" data-wow-delay="0.5s"> <?php echo $settings['section_middle_text']; ?> </div>
								<?php } ?>
								<?php if ( $settings['section_2nd_title'] ) { ?>
                                    <h2 class="sw__hero-v2-content-title sw--fs-105 sw--color-white text-center  pb-55 wow fadeInUp" data-wow-delay="0.6s"> <?php echo $settings['section_2nd_title']; ?> </h2>
								<?php } ?>
								<?php if ( $settings['date'] ) { ?>
                                    <h6 class="sw__hero-v2-content-date sw--fs-21 sw--color-white text-center  wow fadeInUp" data-wow-delay="0.7s"> <?php echo $settings['date']; ?> </h6>
								<?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-7 offset-lg-1 position-relative">
                            <div class="sw__v2-hero-shapes d-none d-md-block">
								<?php if ( $settings['hero_main_image']['url'] ) { ?>
                                    <img class="sw__hero-v2-main-img position-absolute z-1" src="<?php echo $settings['hero_main_image']['url']; ?>" alt=""/>
								<?php } ?>
								<?php if ( $settings['hero_main_image_shape']['url'] ) { ?>
                                    <img class="sw__hero-v2-main-sheap2 position-absolute z-3" src="<?php echo $settings['hero_main_image_shape']['url']; ?>" alt=""/>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Section End -->
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_hero_v2 );



