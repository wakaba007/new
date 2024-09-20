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

class teconce_project extends Widget_Base {

	public function get_name() {
		return 'teconce_project';
	}

	public function get_title() {
		return __( 'Teconce Project', 'teconce' );
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
				'default'     => esc_html__( 'Weeded Garden', 'textdomain' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'project_single_link',
			[
				'label'       => esc_html__( 'Gallery Link', 'textdomain' ),
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
				'label'       => esc_html__( 'Repeater List', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'gallery_title' => esc_html__( 'Weeded Garden', 'textdomain' ),
					],
					[
						'gallery_title' => esc_html__( 'Weeded Garden', 'textdomain' ),
					],
					[
						'gallery_title' => esc_html__( 'Weeded Garden', 'textdomain' ),
					],
					[
						'gallery_title' => esc_html__( 'Weeded Garden', 'textdomain' ),
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
		$this->add_responsive_control(
			'Section-Padding',
			[
				'label'      => esc_html__( 'Section Padding', 'textdomain' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .sw__gallery' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .sw__service-sub-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Subtitle-typography',
				'label'    => esc_html__( 'Section Subtitle Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__service-sub-title',
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
					'{{WRAPPER}} .sw__service-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Title-typography',
				'label'    => esc_html__( 'Section Title Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__service-title',
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
					'{{WRAPPER}} .sw__service-title' => 'width: {{SIZE}}{{UNIT}};',
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
		$this->add_control(
			'Icon-color',
			[
				'label'     => esc_html__( 'Icon Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__gallery-box-wrapp i,{{WRAPPER}} .sw__gallery-box-wrapp svg' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- Gallery -->
        <section class="sw__gallery pt-130 pb-60 wd__project-gallery">
            <div class="sw__gallery-wrapper position-relative">
                <div class="container container-1290">
					<?php if ( $settings['section_subtitle'] ) { ?>
                        <h6 class="sw__service-sub-title sw--fs-14 sw--color-brown  text-center wow fadeInUp" data-wow-delay="0.3s">
							<?php echo $settings['section_subtitle']; ?>
                        </h6>
					<?php } ?>
					<?php if ( $settings['section_title'] ) { ?>
                        <h2 class="sw__service-title sw__project-title sw--fs-50 sw--color-black-900  text-center wow fadeInUp" data-wow-delay="0.4s">
							<?php echo $settings['section_title']; ?>
                        </h2>
					<?php } ?>
                    <div class="sw__gallery-main pl-20 pr-20 pt-70">
                        <div class="row g-30">
                            <div class="col-lg-8">
                                <div class="row g-30">
									<?php
									$i = 0;
									foreach ( $settings['list'] as $item ) {
										$i ++;
										if ( $i > 2 ) {
											break;
										}
										?>
                                        <div class="col-lg-6">
                                            <div class="sw__gallery-main-left sw__gallery-main-project position-relative overflow-hidden">
                                                <img src="<?php echo $item['gallery_img']['url']; ?>" alt="" class="sw--border-radius wow fadeInUp" data-wow-delay="0.3s">
                                                <div class="sw__gallery-box-main d-flex justify-content-center">
                                                    <div class="sw__gallery-box-wrapp sw__gallery-box-wrapp-project sw--border-radius">
                                                        <div class="sw__gallery-box-sher01">
                                                            <i class="sw-icon sw-icon-box-style"></i>
                                                        </div>
                                                        <div class="sw__gallery-box-sher07">
                                                            <i class="sw-icon sw-icon-box-style wow fadeInUp" data-wow-delay="0.3s"></i>
                                                        </div>
                                                        <h6 class="sw__gallery-sub-title sw--fs-16 sw--color-white text-center"><?php echo $item['gallery_subtitle']; ?></h6>
                                                        <h2 class="sw__gallery-title sw--fs-27 sw--color-white  text-center">
                                                            <a href="<?php echo $item['project_single_link']['url']; ?>">
                                                            <?php echo $item['gallery_title']; ?>
                                                            </a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									<?php } ?>

									<?php
									$i = 0;
									foreach ( $settings['list'] as $item ) {
										$i ++;
										if ( $i > 3 ) {
											break;
										}
										if ( $i == 3 ) {
											?>
                                            <div class="col-lg-12">
                                                <div class="sw__gallery-main-left sw__gallery-main-project position-relative overflow-hidden">
                                                    <img src="<?php echo $item['gallery_img']['url']; ?>" alt="" class="sw--border-radius wow fadeInUp" data-wow-delay="0.3s">
                                                    <div class="sw__gallery-box-main d-flex justify-content-center">
                                                        <div class="sw__gallery-box-wrapp sw--border-radius sw__gallery-box-wrapp-project">
                                                            <div class="sw__gallery-box-sher01">
                                                                <i class="sw-icon sw-icon-box-style"></i>
                                                            </div>
                                                            <div class="sw__gallery-box-sher02">
                                                                <i class="sw-icon sw-icon-box-style"></i>
                                                            </div>
                                                            <h6 class="sw__gallery-sub-title sw--fs-16 sw--color-white text-center"><?php echo $item['gallery_subtitle']; ?></h6>
                                                            <h2 class="sw__gallery-title sw--fs-27 sw--color-white  text-center">
                                                                <a href="<?php echo $item['project_single_link']['url']; ?>">
		                                                            <?php echo $item['gallery_title']; ?>
                                                                </a>
                                                            </h2>
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
                            <div class="col-lg-4">
								<?php
								$i = 0;
								foreach ( $settings['list'] as $item ) {
									$i ++;
									if ( $i > 4 ) {
										break;
									}
									if ( $i == 4 ) {
										?>
                                        <div class="sw__gallery-middol-left sw__gallery-project-right position-relative overflow-hidden">
                                            <img src="<?php echo $item['gallery_img']['url']; ?>" alt="" class="sw--border-radius wow fadeInUp" data-wow-delay="0.5s">
                                            <div class="sw__gallery-box-main d-flex justify-content-center">
                                                <div class="sw__gallery-box-wrapp sw--border-radius sw__gallery-box-wrapp-project">
                                                    <div class="sw__gallery-box-sher01">
                                                        <i class="sw-icon sw-icon-box-style"></i>
                                                    </div>
                                                    <div class="sw__gallery-box-sher02">
                                                        <i class="sw-icon sw-icon-box-style"></i>
                                                    </div>
                                                    <h6 class="sw__gallery-sub-title sw--fs-16 sw--color-white text-center"><?php echo $item['gallery_subtitle']; ?></h6>
                                                    <h2 class="sw__gallery-title sw--fs-27 sw--color-white  text-center">.
                                                        <a href="<?php echo $item['project_single_link']['url']; ?>">
		                                                    <?php echo $item['gallery_title']; ?>
                                                        </a>
                                                    </h2>
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
        </section>
        <!-- Gallery -->
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_project );



