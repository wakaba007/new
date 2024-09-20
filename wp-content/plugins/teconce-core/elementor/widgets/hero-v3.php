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

class teconce_hero_v3 extends Widget_Base {

	public function get_name() {
		return 'teconce_hero_v3';
	}

	public function get_title() {
		return __( 'Teconce Hero V3', 'teconce' );
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
			'name',
			[
				'label'       => esc_html__( 'Name', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( 'Luca & mica', 'textdomain' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Two hearts one love one destiny', 'textdomain' ),
			]
		);
		$this->add_control(
			'date',
			[
				'label'       => esc_html__( 'Date', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::WYSIWYG,
				'rows'        => 5,
				'default'     => __( 'Save the date <br>
                                        november <span>10,2024</span>', 'textdomain' ),
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Hero-Images',
			[
				'label' => esc_html__( 'Hero Images', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'hero_main_img',
			[
				'label' => esc_html__( 'Hero Main Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'banner_shape_1',
			[
				'label' => esc_html__( 'Hero Shape 1', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'banner_shape_2',
			[
				'label' => esc_html__( 'Hero Shape 2', 'textdomain' ),
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
		$this->add_responsive_control(
			'Section-Padding',
			[
				'label'      => esc_html__( 'Section Padding', 'textdomain' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .sw__hero' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'Section-BG-Color',
			[
				'label'     => esc_html__( 'Section BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__hero' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'label'          => esc_html__( 'Section Background Image', 'textdomain' ),
				'name'           => 'section-background-image',
				'types'          => [ 'classic' ],
				'exclude' => ['color'],
				'selector'       => '{{WRAPPER}} .sw__hero::before',
				'fields_options' => [
					'background' => [
						'label' => esc_html__( 'Section Background Image', 'textdomain' ),
					],
				],
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
					'{{WRAPPER}} .sw__hero-subtitle' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Name-typography',
				'label'    => esc_html__( 'Name Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__hero-subtitle',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Title-style',
			[
				'label' => esc_html__( 'Title Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Title-color',
			[
				'label'     => esc_html__( 'Title Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__hero-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Title-typography',
				'label'    => esc_html__( 'Title Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__hero-title',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Date-style',
			[
				'label' => esc_html__( 'Date Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Date-color',
			[
				'label'     => esc_html__( 'Date Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__hero-date' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Date-typography',
				'label'    => esc_html__( 'Date Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__hero-date',
			]
		);
		$this->end_controls_section();


	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- Hero banner start -->
        <section class="sw__hero">
            <div class="container">
                <div class="row gx-30">
                    <div class="col-md-6">
                        <div class="sw__hero-left-content">
							<?php if ( $settings['name'] ) { ?>
                                <h4 class="sw__hero-subtitle sw--fs-27  text-black mb-20 wow fadeInUp">
									<?php echo $settings['name']; ?>
                                </h4>
							<?php } ?>
							<?php if ( $settings['title'] ) { ?>
                                <h1 class="sw__hero-title sw--color-black-900 sw--fs-105  mb-30 wow fadeInUp" data-wow-delay="0.3s">
									<?php echo $settings['title']; ?>
                                </h1>
							<?php } ?>
							<?php if ( $settings['date'] ) { ?>
                                <span class="sw__hero-date sw--color-black-900 sw--fs-21  wow fadeInUp" data-wow-delay="0.6s">
                                    <?php echo $settings['date']; ?>
                                </span>
							<?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="sw__hero-right-content d-flex justify-content-end">
                            <div class="sw__hero-main-img wow fadeInUp">
                                <?php if(!empty($settings['hero_main_img']['url'])) { ?>
                                    <img src="<?php echo $settings['hero_main_img']['url']; ?>" alt="">
                                <?php } ?>
                                <?php if(!empty($settings['banner_shape_1']['url'])) { ?>
                                <div class="sw__hero-main-img-bg-shape-1">
                                    <img src="<?php echo $settings['banner_shape_1']['url']; ?>" alt="">
                                </div>
                                <?php } ?>
                                <?php if($settings['banner_shape_2']['url']) { ?>
                                <div class="sw__hero-main-img-bg-shape-2">
                                    <img src="<?php echo $settings['banner_shape_2']['url']; ?>" alt="">
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero banner end -->
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_hero_v3 );



