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

class teconce_about extends Widget_Base {

	public function get_name() {
		return 'teconce_about';
	}

	public function get_title() {
		return __( 'Teconce About', 'teconce' );
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
				'default'     => esc_html__( 'Best wishes', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your subtitle here', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label'       => esc_html__( 'Section Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'Weeding Wonders of  Where Gardens the a Flourish', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
			]
		);
		$this->add_control(
			'info',
			[
				'label'       => esc_html__( 'Info', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => esc_html__( "majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem is Ipsum, you need to be a good weed design", 'textdomain' ),
				'placeholder' => esc_html__( 'Type your Info here', 'textdomain' ),
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Button-Content',
			[
				'label' => esc_html__( 'Button Content', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'button_text',
			[
				'label'       => esc_html__( 'Button Text', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Explore More', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your button title here', 'textdomain' ),
			]
		);
		$this->add_control(
			'button_link',
			[
				'label'       => esc_html__( 'Button Link', 'textdomain' ),
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
		$this->end_controls_section();
		$this->start_controls_section(
			'Video-Content',
			[
				'label' => esc_html__( 'Video Content', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-play',
					'library' => 'fa-solid',
				],
			]
		);
		$this->add_control(
			'video_button_link',
			[
				'label'       => esc_html__( 'Video Button Link', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
				'options'     => [ 'url', 'is_external', 'nofollow' ],
				'default'     => [
					'url'         => 'https://www.youtube.com/watch?v=P9iKATG9BW4&autoplay=0',
					'is_external' => true,
					'nofollow'    => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'label'    => esc_html__( 'Video Button Background', 'textdomain' ),
				'name'     => 'video_button_background',
				'types'    => [ 'classic' ],
				'exclude' => ['color'],
				'selector' => '{{WRAPPER}} .sw__about-video',
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
					'{{WRAPPER}} .sw__about' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$this->end_controls_section();
		$this->start_controls_section(
			'Section-Info-style',
			[
				'label' => esc_html__( 'Section Info Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Section-Info-color',
			[
				'label'     => esc_html__( 'Section Info Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__section-description' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Info-typography',
				'label'    => esc_html__( 'Section Info Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__section-description',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Button-style',
			[
				'label' => esc_html__( 'Button Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'style-tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'textdomain' ),
			]
		);
		$this->add_control(
			'Button-Text-color',
			[
				'label'     => esc_html__( 'Button Text Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__button a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Button-Text-typography',
				'label'    => esc_html__( 'Button Text Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__button a',
			]
		);
		$this->add_control(
			'Button-BG-color',
			[
				'label'     => esc_html__( 'Button BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__button a' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'button-border',
				'selector' => '{{WRAPPER}} .sw__button a',
			]
		);
		$this->end_controls_tab();
		/*END STYLE NORMAL TAB*/
		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'textdomain' ),
			]
		);
		$this->add_control(
			'Button-Hover-color',
			[
				'label'     => esc_html__( 'Button Hover Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__button:hover a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'Button-Hover-BG-color',
			[
				'label'     => esc_html__( 'Button Hover BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__button:before' => 'background: {{VALUE}}',
					'{{WRAPPER}} .sw__button:after' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'Button-Hover-Border-color',
			[
				'label'     => esc_html__( 'Button Hover Border Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__button:hover a' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();
		/*END STYLE HOVER TAB*/
		$this->end_controls_tabs();
		$this->end_controls_section();
		$this->start_controls_section(
			'Video-Icon-style',
			[
				'label' => esc_html__( 'Video Icon Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Video-Icon-color',
			[
				'label'     => esc_html__( 'Video Icon Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__about-video i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .sw__about-video path' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'Video-Icon-BG-color',
			[
				'label'     => esc_html__( 'Video Icon BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__about-video-icon' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- About us start -->
        <section class="sw__about pb-100">
            <div class="container">
                <div class="row gx-30">
                    <div class="col-lg-6">
                        <div class="sw__about-content pt-65">
							<?php if ( $settings['section_subtitle'] ) { ?>
                                <div class="sw__section-subtitle sw--color-brown sw--fs-12  mb-10 wow fadeInLeft">
									<?php echo $settings['section_subtitle']; ?>
                                </div>
							<?php } ?>
							<?php if ( $settings['section_title'] ) { ?>
                                <div class="sw__section-title sw--fs-50 sw--color-black-900  mb-20 wow fadeInLeft" data-wow-delay="0.3s">
									<?php echo $settings['section_title']; ?>
                                </div>
							<?php } ?>
							<?php if ( $settings['info'] ) { ?>
                                <div class="sw__section-description sw--color-black-800 sw--fs-16 mb-40 wow fadeInLeft" data-wow-delay="0.6s">
									<?php echo $settings['info']; ?>
                                </div>
							<?php } ?>
                            <?php if($settings['button_text']) { ?>
                                <div class="sw__button wow fadeInLeft" data-wow-delay="0.8s">
                                    <a href="<?php echo $settings['button_link']['url']; ?>">
                                        <?php echo $settings['button_text']; ?>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-lg-end justify-content-center">
                        <div class="sw__about-video wow fadeInRight" data-wow-delay="0.6s">
                            <?php if($settings['video_button_link']['url']) { ?>
                                <a href="<?php echo $settings['video_button_link']['url']; ?>" class="sw__about-video-icon" data-lity>
                                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About us end -->
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_about );



