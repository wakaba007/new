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

class teconce_bride_and_groom extends Widget_Base {

	public function get_name() {
		return 'teconce_bride_and_groom';
	}

	public function get_title() {
		return __( 'Teconce Bride And Groom', 'teconce' );
	}

	public function get_categories() {
		return [ 'teconce-ele-widgets-cat' ];
	}

	public function get_icon() {
		return 'teconce-custom-icon';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'Bride-Content',
			[
				'label' => __( 'Bride Content', 'teconce' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'bride_img',
			[
				'label' => esc_html__( 'Bride image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'bride_title',
			[
				'label'       => esc_html__( 'Bride Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Bride', 'textdomain' ),
			]
		);
		$this->add_control(
			'bride_name',
			[
				'label'       => esc_html__( 'Bride Name', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'MOHAMOD SAMIR', 'textdomain' ),
			]
		);
		$this->add_control(
			'bride_info',
			[
				'label'       => esc_html__( 'Bride Info', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'There are many variations of passages Loremos Ipsum their a available, but the majority have manum suffered is alteration ', 'textdomain' ),
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
			'section_title',
			[
				'label'       => esc_html__( 'Section Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Are getting married', 'textdomain' ),
			]
		);
		$this->add_control(
			'marriage_date',
			[
				'label'       => esc_html__( 'Marriage Date', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'on 14 February, 20224 Bali, Indonesia', 'textdomain' ),
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'social_icon',
			[
				'label'   => esc_html__( 'Social Icon', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value'   => 'sw-icon sw-icon-instragam',
					'library' => 'sw-icon',
				],
			]
		);
		$repeater->add_control(
			'social_link',
			[
				'label'       => esc_html__( 'Social Link', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
				'options'     => [ 'url', 'is_external', 'nofollow' ],
				'default'     => [
					'url'         => '#',
					'is_external' => true,
					'nofollow'    => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'list',
			[
				'label'       => esc_html__( 'Social Icon List', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'social_icon' => esc_html__( 'sw-icon sw-icon-instragam', 'textdomain' ),
					],
					[
						'social_icon' => esc_html__( 'sw-icon sw-icon-twitter', 'textdomain' ),
					],
					[
						'social_icon' => esc_html__( 'sw-icon sw-icon-pinterest', 'textdomain' ),
					],
					[
						'social_icon' => esc_html__( 'sw-icon sw-icon-linkedin', 'textdomain' ),
					],
				],
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => esc_html__( 'Subtitle', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'First Time WE MEET', 'textdomain' ),
			]
		);
		$this->add_control(
			'description',
			[
				'label'       => esc_html__( 'Ddescription', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'There are many variations of passages Loremos Ipsum their a available, but the majority have manum suffered is alteration ', 'textdomain' ),
			]
		);
		$this->add_control(
			'arrow_icon_1',
			[
				'label'   => esc_html__( 'Arrow Icon One', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value'   => 'teconce teconce-icon-arrow-right',
					'library' => 'teconce',
				],
			]
		);
		$this->add_control(
			'arrow_icon_2',
			[
				'label'   => esc_html__( 'Arrow Icon Two', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value'   => 'teconce teconce-icon-arrow-right-4',
					'library' => 'teconce',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Groom-Content',
			[
				'label' => __( 'Groom Content', 'teconce' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'groom_img',
			[
				'label' => esc_html__( 'Groom image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'groom_title',
			[
				'label'       => esc_html__( 'Groom Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Groom', 'textdomain' ),
			]
		);
		$this->add_control(
			'groom_name',
			[
				'label'       => esc_html__( 'Groom Name', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'FARIA PRIMA', 'textdomain' ),
			]
		);
		$this->add_control(
			'groom_info',
			[
				'label'       => esc_html__( 'Groom Info', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'There are many variations of passages Loremos Ipsum their a available, but the majority have manum suffered is alteration ', 'textdomain' ),
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
					'{{WRAPPER}} .sw__agewedding' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
					'{{WRAPPER}} .sw__agewedding-v3-main' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Title-typography',
				'label'    => esc_html__( 'Section Title Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__agewedding-v3-main',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'marriage-Date-style',
			[
				'label' => esc_html__( 'Marriage Date Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'marriage-Date-color',
			[
				'label'     => esc_html__( 'Marriage Date Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__agewedding-v3-main-date' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'marriage-Date-typography',
				'label'    => esc_html__( 'Marriage Date Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__agewedding-v3-main-date',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Social-Icon-style',
			[
				'label' => esc_html__( 'Social Icon Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Social-icon-color',
			[
				'label'     => esc_html__( 'Social icon Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__agewedding-content-social i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'Social-Icon-Size',
			[
				'label'      => esc_html__( 'Social Icon Size', 'textdomain' ),
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
					'{{WRAPPER}} .sw__agewedding-content-social a i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .sw__agewedding-content-social a svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'Icon-BG-color',
			[
				'label'     => esc_html__( 'Icon BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__agewedding-content-social' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .sw__agewedding-v3-sub' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Subtitle-typography',
				'label'    => esc_html__( 'Section Subtitle Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__agewedding-v3-sub',
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
					'{{WRAPPER}} .sw__agewedding-v3-decription' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Description-typography',
				'label'    => esc_html__( 'Section Description Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__agewedding-v3-decription',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Arrow-Icon-style',
			[
				'label' => esc_html__( 'Arrow Icon Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Arrow-Icon-color',
			[
				'label'     => esc_html__( 'Arrow Icon Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__agewedding-content-shep i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .sw__agewedding-content-shep svg path' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'Arrow-icon-Size',
			[
				'label'      => esc_html__( 'Arrow Icon Size', 'textdomain' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 5,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .sw__agewedding-content-shep i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .sw__agewedding-content-shep svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Couple-Style',
			[
				'label' => esc_html__( 'Couple Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Couple-Title-color',
			[
				'label'     => esc_html__( 'Couple Title Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__agewedding-card-content-subtitle' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Couple-Title-typography',
				'label'    => esc_html__( 'Couple Title Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__agewedding-card-content-subtitle',
			]
		);
		$this->add_control(
			'Couple-Name-color',
			[
				'label'     => esc_html__( 'Couple Name Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__agewedding-card-content-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Couple-Name-typography',
				'label'    => esc_html__( 'Couple Name Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__agewedding-card-content-title',
			]
		);
		$this->add_control(
			'Couple-Info-color',
			[
				'label'     => esc_html__( 'Couple Info Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__agewedding-card-content-decription' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Couple-Info-typography',
				'label'    => esc_html__( 'Couple Info Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__agewedding-card-content-decription',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'label'    => esc_html__( 'Border', 'textdomain' ),
				'name'     => 'border',
				'selector' => '{{WRAPPER}} .sw__agewedding-card',
			]
		);
		$this->end_controls_section();



	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- Are getting Section Start -->
        <section class="sw__agewedding pt-110 pb-120 overflow-hidden">
            <div class="sw__agewedding-wrapper position-relative">
                <div class="container container-1290">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-4">
                            <div class="sw__agewedding-card sw__agewedding-card-left  pb-50 wow fadeInUp" data-wow-delay="0.3s">
								<?php if ( $settings['bride_img']['url'] ) { ?>
                                    <div class="sw__agewedding-card-img-left sw__program-img sw__shine_animation">
                                        <img src="<?php echo $settings['bride_img']['url']; ?>" alt="">
                                    </div>
								<?php } ?>
                                <div class="sw__agewedding-card-content pl-30 pr-30">
									<?php if ( $settings['bride_title'] ) { ?>
                                        <h6 class="sw__agewedding-card-content-subtitle sw--fs-16 sw--color-black-700 mt-30"><?php echo $settings['bride_title']; ?></h6>
									<?php } ?>
									<?php if ( $settings['bride_name'] ) { ?>
                                        <h2 class="sw__agewedding-card-content-title sw--fs-34 sw--color-black-900  sw-pt-5 pb-10"><?php echo $settings['bride_name']; ?></h2>
									<?php } ?>
									<?php if ( $settings['bride_info'] ) { ?>
                                        <p class="sw__agewedding-card-content-decription sw--fs-16 sw--color-black-700 "><?php echo $settings['bride_info']; ?> </p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sw__agewedding-content wow fadeInUp" data-wow-delay="0.4s">
								<?php if ( $settings['section_title'] ) { ?>
                                    <h2 class="sw__agewedding-v3-main sw--fs-34 sw--color-brown  text-center"><?php echo $settings['section_title']; ?></h2>
								<?php } ?>
								<?php if ( $settings['marriage_date'] ) { ?>
                                    <h6 class="sw__agewedding-v3-main-date sw--fs-21 sw--color-black-700  text-center pt-30 pb-40"><?php echo $settings['marriage_date']; ?></h6>
								<?php } ?>
                                <div class="sw__agewedding-content-social-main d-flex justify-content-center">
                                    <div class="sw__agewedding-content-social">
										<?php foreach ( $settings['list'] as $item ) { ?>
                                            <a href="<?php echo $item['social_link']; ?>">
												<?php \Elementor\Icons_Manager::render_icon( $item['social_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                            </a>
										<?php } ?>
                                    </div>
                                </div>
								<?php if ( $settings['subtitle'] ) { ?>
                                    <h6 class="sw__agewedding-v3-sub sw--fs-21 sw--color-black-700  text-center pt-30 pb-20"><?php echo $settings['subtitle']; ?></h6>
								<?php } ?>
								<?php if ( $settings['description'] ) { ?>
                                    <p class="sw__agewedding-v3-decription sw--fs-16 sw--color-black-900 text-center">
										<?php echo $settings['description']; ?>
                                    </p>
								<?php } ?>
                                <div class="sw__agewedding-content-shep">
									<?php \Elementor\Icons_Manager::render_icon( $settings['arrow_icon_1'], [ 'aria-hidden' => 'true' ] ); ?>
									<?php \Elementor\Icons_Manager::render_icon( $settings['arrow_icon_2'], [ 'aria-hidden' => 'true' ] ); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sw__agewedding-card sw__agewedding-card-right pb-50 wow fadeInUp" data-wow-delay="0.5s">
								<?php if ( $settings['groom_img']['url'] ) { ?>
                                    <div class="sw__agewedding-card-img-right sw__program-img sw__shine_animation">
                                        <img src="<?php echo $settings['groom_img']['url']; ?>" alt="">
                                    </div>
								<?php } ?>
                                <div class="sw__agewedding-card-content pl-30 pr-30 d-flex align-items-lg-end align-items-start flex-column">
									<?php if ( $settings['groom_title'] ) { ?>
                                        <h6 class="sw__agewedding-card-content-subtitle sw--fs-16 sw--color-black-700 mt-30"><?php echo $settings['groom_title']; ?></h6>
									<?php } ?>
									<?php if ( $settings['groom_name'] ) { ?>
                                        <h2 class="sw__agewedding-card-content-title sw--fs-34 sw--color-black-900  pt-10 pb-25"><?php echo $settings['groom_name']; ?></h2>
									<?php } ?>
									<?php if ( $settings['groom_info'] ) { ?>
                                        <p class="sw__agewedding-card-content-decription sw--fs-16 sw--color-black-700 text-lg-end text-start"><?php echo $settings['groom_info']; ?></p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Are getting Section End -->
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_bride_and_groom );



