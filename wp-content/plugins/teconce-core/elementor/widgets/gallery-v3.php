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

class teconce_gallery_v3 extends Widget_Base {

	public function get_name() {
		return 'teconce_gallery_v3';
	}

	public function get_title() {
		return __( 'Teconce Gallery V3', 'teconce' );
	}

	public function get_categories() {
		return [ 'teconce-ele-widgets-cat' ];
	}

	public function get_icon() {
		return 'teconce-custom-icon';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'Section-Content',
			[
				'label' => __( 'Section Content', 'teconce' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'section_subtitle',
			[
				'label'       => esc_html__( 'Section Subtitle', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Latest service', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your subtitle here', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label'       => esc_html__( 'Section Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => esc_html__( "Let Your Garden Breathe We'll Weeding", 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Gallery-Content',
			[
				'label' => esc_html__( 'Gallery Content', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'gallery_img',
			[
				'label' => esc_html__( 'Gallery Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_control(
			'gallery_subtitle',
			[
				'label'       => esc_html__( 'Gallery subtitle', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Corporate', 'textdomain' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'gallery_title',
			[
				'label'       => esc_html__( 'Gallery Title', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Weeded Garden A weed Happy', 'textdomain' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'list',
			[
				'label'       => esc_html__( 'Repeater List', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'gallery_title' => esc_html__( 'Weeded Garden A weed Happy', 'textdomain' ),
					],
					[
						'gallery_title' => esc_html__( 'Weeded Garden A weed Happy', 'textdomain' ),
					],
					[
						'gallery_title' => esc_html__( 'Weeded Garden A weed Happy', 'textdomain' ),
					],
					[
						'gallery_title' => esc_html__( 'Weeded Garden A weed Happy', 'textdomain' ),
					],
					[
						'gallery_title' => esc_html__( 'Weeded Garden A weed Happy', 'textdomain' ),
					],
					[
						'gallery_title' => esc_html__( 'Weeded Garden A weed Happy', 'textdomain' ),
					],
				],
				'title_field' => '{{{ gallery_title }}}',
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
		$this->add_responsive_control(
			'Title-width',
			[
				'label'      => esc_html__( 'Title Width', 'textdomain' ),
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
				'default'    => [
					'unit' => '%',
					'size' => 52,
				],
				'selectors'  => [
					'{{WRAPPER}} .sw__section-title' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Gallery-Box-style',
			[
				'label' => esc_html__( 'Gallery Box Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Box-BG-color',
			[
				'label'     => esc_html__( 'Box BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__gallery-box-wrapp' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'Box-Subtitle-color',
			[
				'label'     => esc_html__( 'Box Subtitle Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__gallery-sub-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Box-Subtitle-typography',
				'label'    => esc_html__( 'Box Subtitle Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__gallery-sub-title',
			]
		);
		$this->add_control(
			'Box-Title-color',
			[
				'label'     => esc_html__( 'Box Title Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__gallery-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Box-Title-typography',
				'label'    => esc_html__( 'Box Title Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__gallery-title',
			]
		);
		$this->end_controls_section();

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- Gallery -->
        <section class="sw__gallery overflow-hidden">
            <div class="sw__gallery-wrapper position-relative">
                <div class="container container-1290">
                    <div class="row">
                        <div class="col-12 d-flex flex-column align-items-center">
							<?php if ( $settings['section_subtitle'] ) { ?>
                                <div class="sw__section-subtitle sw--color-brown sw--fs-14  mb-10 wow fadeInLeft">
									<?php echo $settings['section_subtitle']; ?>
                                </div>
							<?php } ?>
							<?php if ( $settings['section_title'] ) { ?>
                                <div class="sw__section-title sw__gallery-section-title sw--fs-50 sw--color-black-900  wow fadeInLeft text-center" data-wow-delay="0.3s">
									<?php echo $settings['section_title']; ?>
                                </div>
							<?php } ?>
                        </div>
                    </div>
                    <div class="sw_gallery_slide pt-60">
                        <div class="sw-gallery-item">
                            <div class="sw__gallery-main">
                                <div class="row g-30">
									<?php
									$i = 0;
									foreach ( $settings['list'] as $item ) {
										$i ++;
										if ( $i > 1 ) {
											break;
										}
										?>
                                        <div class="col-lg-6">
                                            <div class="sw__gallery-main-left sw__gallery-main-v2 position-relative overflow-hidden sw__program-img sw__shine_animation">
                                                <img src="<?php echo $item['gallery_img']['url']; ?>" alt="" class="sw--border-radius wow fadeInUp" data-wow-delay="0.3s">
                                                <div class="sw__gallery-box-main d-flex justify-content-center ">
                                                    <div class="sw__gallery-box-wrapp sw__gallery-box-wrappv3 sw--border-radius">
                                                        <h6 class="sw__gallery-sub-title sw--fs-16 sw--color-black-900 text-center"><?php echo $item['gallery_subtitle']; ?></h6>
                                                        <h2 class="sw__gallery-title sw--fs-27 sw--color-black-900  text-center"><?php echo $item['gallery_title']; ?></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									<?php } ?>
                                    <div class="col-lg-6">
                                        <div class="row g-30">
											<?php
											$i = 0;
											foreach ( $settings['list'] as $item ) {
												$i ++;
												if ( $i > 2 ) {
													break;
												}
												if ( $i == 2 ) {
													?>
                                                    <div class="col-lg-6">
                                                        <div class="sw__gallery-main-left sw__gallery-main-v2 position-relative overflow-hidden sw__program-img sw__shine_animation">
                                                            <img src="<?php echo $item['gallery_img']['url']; ?>" alt="" class="sw--border-radius wow fadeInUp" data-wow-delay="0.3s">
                                                            <div class="sw__gallery-box-main d-flex justify-content-center">
                                                                <div class="sw__gallery-box-wrapp sw__gallery-box-wrappv3 sw--border-radius">
                                                                    <h6 class="sw__gallery-sub-title sw--fs-16 sw--color-black-900 text-center"><?php echo $item['gallery_subtitle']; ?></h6>
                                                                    <h2 class="sw__gallery-title sw--fs-27 sw--color-black-900  text-center"><?php echo $item['gallery_title']; ?></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
													<?php
												}
											}
											?>
											<?php
											$i = 0;
											foreach ( $settings['list'] as $item ) {
												$i ++;
												if ( $i > 3 ) {
													break;
												}
												if ( $i == 3 ) {
													?>
                                                    <div class="col-lg-6">
                                                        <div class="sw__gallery-main-left sw__gallery-main-v2 position-relative overflow-hidden sw__program-img sw__shine_animation">
                                                            <img src="<?php echo $item['gallery_img']['url']; ?>" alt="" class="sw--border-radius wow fadeInUp" data-wow-delay="0.3s">
                                                            <div class="sw__gallery-box-main d-flex justify-content-center">
                                                                <div class="sw__gallery-box-wrapp sw__gallery-box-wrappv3 sw--border-radius">
                                                                    <h6 class="sw__gallery-sub-title sw--fs-16 sw--color-black-900 text-center"><?php echo $item['gallery_subtitle']; ?></h6>
                                                                    <h2 class="sw__gallery-title sw--fs-27 sw--color-black-900  text-center"><?php echo $item['gallery_title']; ?></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
													<?php
												}
											}
											?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sw__gallery-main mt-30">
                                <div class="row g-30">
                                    <div class="col-lg-6">
                                        <div class="row g-30">
											<?php
											$i = 0;
											foreach ( $settings['list'] as $item ) {
												$i ++;
												if ( $i > 4 ) {
													break;
												}
												if ( $i == 4 ) {
													?>
                                                    <div class="col-lg-6">
                                                        <div class="sw__gallery-main-left sw__gallery-main-v2 position-relative overflow-hidden sw__program-img sw__shine_animation">
                                                            <img src="<?php echo $item['gallery_img']['url']; ?>" alt="" class="sw--border-radius wow fadeInUp" data-wow-delay="0.3s">
                                                            <div class="sw__gallery-box-main d-flex justify-content-center">
                                                                <div class="sw__gallery-box-wrapp sw__gallery-box-wrappv3 sw--border-radius">
                                                                    <h6 class="sw__gallery-sub-title sw--fs-16 sw--color-black-900 text-center"><?php echo $item['gallery_subtitle']; ?></h6>
                                                                    <h2 class="sw__gallery-title sw--fs-27 sw--color-black-900  text-center"><?php echo $item['gallery_title']; ?></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
													<?php
												}
											}
											?>
											<?php
											$i = 0;
											foreach ( $settings['list'] as $item ) {
												$i ++;
												if ( $i > 5 ) {
													break;
												}
												if ( $i == 5 ) {
													?>
                                                    <div class="col-lg-6">
                                                        <div class="sw__gallery-main-left sw__gallery-main-v2 position-relative overflow-hidden sw__program-img sw__shine_animation">
                                                            <img src="<?php echo $item['gallery_img']['url']; ?>" alt="" class="sw--border-radius wow fadeInUp" data-wow-delay="0.3s">
                                                            <div class="sw__gallery-box-main d-flex justify-content-center">
                                                                <div class="sw__gallery-box-wrapp sw__gallery-box-wrappv3 sw--border-radius">
                                                                    <h6 class="sw__gallery-sub-title sw--fs-16 sw--color-black-900 text-center"><?php echo $item['gallery_subtitle']; ?></h6>
                                                                    <h2 class="sw__gallery-title sw--fs-27 sw--color-black-900  text-center"><?php echo $item['gallery_title']; ?></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
													<?php
												}
											}
											?>
                                        </div>
                                    </div>
									<?php
									$i = 0;
									foreach ( $settings['list'] as $item ) {
										$i ++;
										if ( $i > 6 ) {
											break;
										}
										if ( $i == 6 ) {
											?>
                                            <div class="col-lg-6">
                                                <div class="sw__gallery-main-left sw__gallery-main-v2 position-relative overflow-hidden sw__program-img sw__shine_animation">
                                                    <img src="<?php echo $item['gallery_img']['url']; ?>" alt="" class="sw--border-radius wow fadeInUp" data-wow-delay="0.3s">
                                                    <div class="sw__gallery-box-main d-flex justify-content-center ">
                                                        <div class="sw__gallery-box-wrapp sw__gallery-box-wrappv3 sw--border-radius">
                                                            <h6 class="sw__gallery-sub-title sw--fs-16 sw--color-black-900 text-center"><?php echo $item['gallery_subtitle']; ?></h6>
                                                            <h2 class="sw__gallery-title sw--fs-27 sw--color-black-900  text-center"><?php echo $item['gallery_title']; ?></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											<?php
										}
									}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Gallery -->
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_gallery_v3 );



