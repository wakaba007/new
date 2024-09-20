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

class teconce_about_v3 extends Widget_Base {

	public function get_name() {
		return 'teconce_about_v3';
	}

	public function get_title() {
		return __( 'Teconce About V3', 'teconce' );
	}

	public function get_categories() {
		return [ 'teconce-ele-widgets-cat' ];
	}

	public function get_icon() {
		return 'teconce-custom-icon';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'Section-Left-Content',
			[
				'label' => __( 'Section Left Content', 'teconce' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'about_main_img',
			[
				'label' => esc_html__( 'About Main Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'shape_img',
			[
				'label' => esc_html__( 'Shape Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'video_bg_img',
			[
				'label' => esc_html__( 'Video BG Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'video_link',
			[
				'label'       => esc_html__( 'Video Link', 'textdomain' ),
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
		$this->end_controls_section();
		$this->start_controls_section(
			'Right-Content',
			[
				'label' => esc_html__( 'Right Content', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'section_subtitle',
			[
				'label'       => esc_html__( 'Section Subtitle', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'ABOUT OUR COMPANY', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label'       => esc_html__( 'Section Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Weeding Wonders of Where', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_description',
			[
				'label'       => esc_html__( 'Section Description', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'rows'        => 5,
				'default'     => esc_html__( 'A joyous celebration of love and commitment, a wedding marks the desig beginning of a new chapter in life. It brings together two souls asio aionn surrounded by family and friends, to witness', 'textdomain' ),
			]
		);
		$this->add_control(
			'button_text',
			[
				'label'       => esc_html__( 'Button Text', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'See More', 'textdomain' ),
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
					'{{WRAPPER}} .sw__about-companyv3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'Section-BG-color',
			[
				'label'     => esc_html__( 'Section BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__about-companyv3' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .sw__section-description' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Description-typography',
				'label'    => esc_html__( 'Section Description Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__section-description',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Play-Button-style',
			[
				'label' => esc_html__( 'Play Button Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Play-Button-color',
			[
				'label'     => esc_html__( 'Play Button Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__video_bannerv3 i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'Play-Button-BG-color',
			[
				'label'     => esc_html__( 'Play Button BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__video-banner-icon' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'Play-Button-Wave-color',
			[
				'label'     => esc_html__( 'Play Button Wave Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .waves' => 'background-color: {{VALUE}}',
				],
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
				'name'     => 'button-border',
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
					'{{WRAPPER}} .sw__button:after'  => 'background: {{VALUE}}',
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

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- ABOUT OUR COMPANY START-->
        <div class="sw__about-companyv3 pb-160 sw--Bg-color-white">
            <div class="sw__about-companyv3-wrapper">
                <div class="container container-1290 position-relative">
                    <div class="row align-items-center g-30 position-relative">
                        <div class="col-lg-4">
                            <div class="sw__about-companyv3-image position-relative">
                                <div class="sw__about-companyv3-image-main sw__program-img sw__shine_animation">
									<?php if ( $settings['about_main_img']['url'] ) { ?>
                                        <img class="sw--border-radius wow fadeInUp" src="<?php echo $settings['about_main_img']['url']; ?>" alt="" data-wow-delay="0.3s">
									<?php } ?>
                                </div>
                            </div>
							<?php if ( $settings['shape_img']['url'] ) { ?>
                                <img class="sw__about-companyv3-shep wow fadeInUp d-none d-xl-block" data-wow-delay="0.3s" src="<?php echo $settings['shape_img']['url']; ?>" alt="">
							<?php } ?>
                        </div>
                        <div class="col-lg-2">
                            <div class="sw__about-companyv3-image-videos position-relative d-flex align-items-center justify-content-center">
                                <div class="sw__video_bannerv3 wow fadeInUp " data-wow-delay="0.4s">
                                    <a href="<?php echo $settings['video_link']['url']; ?>" class="sw__video-banner-icon" data-lity>
                                        <i class="sw-icon sw-icon-play"></i>
                                        <div class="waves wave-1"></div>
                                        <div class="waves wave-2"></div>
                                        <div class="waves wave-3"></div>
                                    </a>
                                </div>
								<?php if ( $settings['video_bg_img']['url'] ) { ?>
                                    <img class="sw--border-radius wow fadeInUp" src="<?php echo $settings['video_bg_img']['url']; ?>" alt="" data-wow-delay="0.3s">
								<?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <div class="sw__about-company-content">
								<?php if ( $settings['section_subtitle'] ) { ?>
                                    <div class="sw__section-subtitle sw--color-brown sw--fs-14  mb-10 wow fadeInLeft">
										<?php echo $settings['section_subtitle']; ?>
                                    </div>
								<?php } ?>
								<?php if ( $settings['section_title'] ) { ?>
                                    <div class="sw__section-title sw--fs-50 sw--color-black-900  wow fadeInLeft mb-20" data-wow-delay="0.3s">
										<?php echo $settings['section_title']; ?>
                                    </div>
								<?php } ?>
								<?php if ( $settings['section_description'] ) { ?>
                                    <div class="sw__section-description sw--color-black-800 sw--fs-16 wow fadeInLeft" data-wow-delay="0.6s">
										<?php echo $settings['section_description']; ?>
                                    </div>
								<?php } ?>
                            </div>
							<?php if ( $settings['button_text'] ) { ?>
                                <div class="sw__button mt-40">
                                    <a href="<?php echo $settings['button_link']['url']; ?>" class="wow fadeInUp" data-wow-delay="0.5s">
										<?php echo $settings['button_text']; ?>
                                    </a>
                                </div>
							<?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ABOUT OUR COMPANY END -->
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_about_v3 );



