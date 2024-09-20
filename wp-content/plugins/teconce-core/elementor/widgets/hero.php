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

class teconce_hero extends Widget_Base {

	public function get_name() {
		return 'teconce_hero';
	}

	public function get_title() {
		return __( 'Teconce Hero', 'teconce' );
	}

	public function get_categories() {
		return [ 'teconce-ele-widgets-cat' ];
	}

	public function get_icon() {
		return 'teconce-custom-icon';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'Hero-Content',
			[
				'label' => __( 'Hero Content', 'teconce' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'section_subtitle',
			[
				'label'       => esc_html__( 'Section Subtitle', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Save the date For the wedding of ', 'textdomain' ),
			]
		);
		$this->add_control(
			'date',
			[
				'label'       => esc_html__( 'Section Date', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::WYSIWYG,
				'default'     => __( 'november <span> 10,2024</span>', 'textdomain' ),
			]
		);
		$this->add_control(
			'name_1',
			[
				'label'       => esc_html__( 'Name 1', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'jessiaca', 'textdomain' ),
			]
		);
		$this->add_control(
			'name_2',
			[
				'label'       => esc_html__( 'Name 2', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Romanao', 'textdomain' ),
			]
		);
		$this->add_control(
			'icon',
			[
				'label'   => esc_html__( 'Icon', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value'   => 'far fa-heart',
					'library' => 'fa-solid',
				],
			]
		);
		$this->add_control(
			'section_description',
			[
				'label'       => esc_html__( 'Section Description', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'rows'        => 10,
				'default'     => esc_html__( 'There are many variations of passages Loremos Ipsum their a
                                available, but the majority', 'textdomain' ),
			]
		);
		$this->add_control(
			'Hero-Image-Content',
			[
				'label'     => esc_html__( '<--- Hero Image Content --->', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'hero_img_shape',
			[
				'label' => esc_html__( 'Hero Image Shape', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'hero_img',
			[
				'label' => esc_html__( 'Hero Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section-Shapes',
			[
				'label' => esc_html__( 'Section Shapes', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'section_bg_shape',
			[
				'label' => esc_html__( 'Section Bg Shape Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'section_bottom_shape',
			[
				'label' => esc_html__( 'Section Bottom Shape Image', 'textdomain' ),
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
					'{{WRAPPER}} .sw__hero-v3' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .sw__hero-v3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .sw__hero-v3-content-sub' => 'color: {{VALUE}} !important',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Subtitle-typography',
				'label'    => esc_html__( 'Section Subtitle Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__hero-v3-content-sub',
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
					'{{WRAPPER}} .sw__hero-v3-content-date' => 'color: {{VALUE}} !important',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Date-typography',
				'label'    => esc_html__( 'Section Date Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__hero-v3-content-date',
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
					'{{WRAPPER}} .sw__hero-v3-content-title' => 'color: {{VALUE}} !important',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Name-typography',
				'label'    => esc_html__( 'Name Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__hero-v3-content-title',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Section-Description-style',
			[
				'label' => esc_html__( 'Section Description Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Section-Description-color',
			[
				'label'     => esc_html__( 'Section Description Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__hero-v3-content-decription' => 'color: {{VALUE}} !important',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Description-typography',
				'label'    => esc_html__( 'Section Description Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__hero-v3-content-decription',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Section-Icon-style',
			[
				'label' => esc_html__( 'Section Icon Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Icon-color',
			[
				'label'     => esc_html__( 'Icon Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__hero-v3-content-middol svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .sw__hero-v3-content-middol i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'Icon-Size',
			[
				'label'      => esc_html__( 'Icon Size', 'textdomain' ),
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
				'default' => [
					'unit' => 'px',
					'size' => 78,
				],
				'selectors'  => [
					'{{WRAPPER}} .sw__hero-v3-content-middol i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .sw__hero-v3-content-middol svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();


	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- Hero Section Start -->
        <div class="sw__hero-v3 sw--Bg-color-white-100 position-relative overflow-hidden">
            <?php if($settings['section_bg_shape']['url']) { ?>
            <img class="sw__hero-v3-main-img position-absolute bottom-0 z-1 wow fadeInUp"
                 src="<?php echo $settings['section_bg_shape']['url']; ?>" alt="" data-wow-delay="0.3s">
            <?php } ?>
            <?php if(!empty($settings['section_bottom_shape']['url'])) { ?>
            <img class="sw__hero-v3-main-sheap2 position-absolute bottom-0 z-0" src="<?php echo $settings['section_bottom_shape']['url']; ?>"
                 alt="">
            <?php } ?>
            <div class="sw__hero-v2-wrapper ">
                <div class="container container-1290 position-relative">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="sw__hero-v3-content z-3 position-relative">
								<?php if ( $settings['section_subtitle'] ) { ?>
                                    <h6 class="sw__hero-v3-content-sub sw--fs-21 sw--color-black-900 text-center  wow fadeInUp"
                                        data-wow-delay="0.3s"><?php echo $settings['section_subtitle']; ?> </h6>
								<?php } ?>
								<?php if ( $settings['date'] ) { ?>
                                    <h6 class="sw__hero-v3-content-date sw--fs-21 sw--color-black-900 text-center  wow fadeInUp mt-15"
                                        data-wow-delay="0.7s"><?php echo $settings['date']; ?></h6>
								<?php } ?>
								<?php if ( $settings['name_1'] ) { ?>
                                    <h2 class="sw__hero-v3-content-title sw--fs-105 sw--color-black-900 text-center  pt-40 wow fadeInUp"
                                        data-wow-delay="0.4s"><?php echo $settings['name_1']; ?></h2>
								<?php } ?>
								<?php if ( $settings['icon']['value'] ) { ?>
                                    <div class="sw__hero-v3-content-middol sw--fs-34 sw--color-black-900 text-center  pt-30 pb-30 wow fadeInUp"
                                         data-wow-delay="0.5s">
										<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </div>
								<?php } ?>
								<?php if ( $settings['name_2'] ) { ?>
                                    <h2 class="sw__hero-v3-content-title sw--fs-105 sw--color-black-900 text-center  pb-40 wow fadeInUp"
                                        data-wow-delay="0.6s"><?php echo $settings['name_2']; ?></h2>
								<?php } ?>
								<?php if ( $settings['section_description'] ) { ?>
                                    <p class="sw__hero-v3-content-decription sw--fs-16 sw--color-black-700 text-center wow fadeInUp w-75 m-auto"
                                       data-wow-delay="0.7s">
										<?php echo $settings['section_description']; ?>
                                    </p>
								<?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-7"></div>
                    </div>
                </div>
            </div>
            <div class="sw__hero-v2-right overflow-hidden z-2 d-none d-lg-block">
				<?php if ( $settings['hero_img_shape']['url'] ) { ?>
                    <img class="sw__hero-v3-main-img-shep z-2" src="<?php echo $settings['hero_img_shape']['url']; ?>" alt=""
                         data-wow-delay="0.3s">
				<?php } ?>
				<?php if ( $settings['hero_img']['url'] ) { ?>
                    <span class="sw__program-img">
                        <img class="sw__hero-v3-main-img-right z-1" src="<?php echo $settings['hero_img']['url']; ?>" alt="" data-wow-delay="0.3s">
                    </span>
				<?php } ?>
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

Plugin::instance()->widgets_manager->register( new teconce_hero );



