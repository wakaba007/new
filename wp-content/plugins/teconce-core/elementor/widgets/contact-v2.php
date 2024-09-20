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

class teconce_contact_v2 extends Widget_Base {

	public function get_name() {
		return 'teconce_contact_v2';
	}

	public function get_title() {
		return __( 'Teconce Contact V2', 'teconce' );
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
				'default'     => esc_html__( 'Contact us', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your subtitle here', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label'       => esc_html__( 'Section Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'Eradicating Weeds a of Elevating', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_description',
			[
				'label'       => esc_html__( 'Section Description', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'A joyous celebration of love and commitment, a wedding marks the an beginning of a new chapter in life. It brings together two souls', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your description here', 'textdomain' ),
			]
		);
		$this->add_control(
			'button_text',
			[
				'label'       => esc_html__( 'Button Text', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Get In Touch', 'textdomain' ),
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
		$this->add_control(
			'form_subheading',
			[
				'label'       => esc_html__( 'Form Subheading', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Contact Us', 'textdomain' ),
			]
		);
		$this->add_control(
			'form_heading',
			[
				'label'       => esc_html__( 'Form Heading', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Make An inquiry', 'textdomain' ),
			]
		);
		$this->add_control(
			'form_shortcode',
			[
				'label'       => esc_html__( 'Form Shortcode', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
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
					'{{WRAPPER}} .container-1290' => 'max-width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .sw__contact-v3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'label'    => esc_html__( 'Section Background', 'textdomain' ),
				'name'     => 'background',
				'types'    => [ 'classic' ],
				'exclude'  => [ 'color' ],
				'selector' => '{{WRAPPER}} .sw__contact-v3',
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
					'{{WRAPPER}} .sw__contact-sub-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Subtitle-typography',
				'label'    => esc_html__( 'Section Subtitle Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__contact-sub-title',
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
					'{{WRAPPER}} .sw__contact-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Title-typography',
				'label'    => esc_html__( 'Section Title Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__contact-title',
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
		$this->start_controls_section(
			'Form-Box-style',
			[
				'label' => esc_html__( 'Form Box Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Form-Subheading-color',
			[
				'label'     => esc_html__( 'Form Subheading Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__contact-form p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Form-Subheading-typography',
				'label'    => esc_html__( 'Form Subheading Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__contact-form p',
			]
		);
		$this->add_control(
			'Form-Heading-color',
			[
				'label'     => esc_html__( 'Form Heading Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__contact-form h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Form-Heading-typography',
				'label'    => esc_html__( 'Form Heading Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__contact-form h2',
			]
		);
		$this->add_control(
			'Box-BG-color',
			[
				'label'     => esc_html__( 'Box BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__contact-form' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'popover-toggle-box-shadow',
			[
				'label'        => esc_html__( 'Box Shadow', 'textdomain' ),
				'type'         => \Elementor\Controls_Manager::POPOVER_TOGGLE,
				'label_off'    => esc_html__( 'Default', 'textdomain' ),
				'label_on'     => esc_html__( 'Custom', 'textdomain' ),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);
		$this->start_popover();
		$this->add_control(
			'custom_box_shadow',
			[
				'label'     => esc_html__( 'Box Shadow', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::BOX_SHADOW,
				'selectors' => [
					'{{WRAPPER}} .sw__contact-form' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}};',
				],
				'condition' => [
					'popover-toggle-box-shadow' => 'yes',
				],
			]
		);
		$this->end_popover();
		$this->end_controls_section();

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- Contact Start-->
        <section class="sw__contact-v3 position-relative pt-130 pb-130">
            <div class="sw__contact-wrapper position-relative">
                <div class="container container-1290">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="sw__contact-content">
								<?php if ( $settings['section_subtitle'] ) { ?>
                                    <h6 class="sw__contact-sub-title sw--fs-14 sw--color-white  wow fadeInUp" data-wow-delay="0.3s">
										<?php echo $settings['section_subtitle']; ?>
                                    </h6>
								<?php } ?>
								<?php if ( $settings['section_title'] ) { ?>
                                    <h2 class="sw__contact-title sw__pricing-title sw--fs-50 sw--color-white  wow fadeInUp" data-wow-delay="0.4s">
										<?php echo $settings['section_title']; ?>
                                    </h2>
								<?php } ?>
								<?php if ( $settings['section_description'] ) { ?>
                                    <p class="sw--fs-16 sw--color-white pt-35 pb-15 wow fadeInUp" data-wow-delay="0.4s">
										<?php echo $settings['section_description']; ?>
                                    </p>
								<?php } ?>
								<?php if ( $settings['button_text'] ) { ?>
                                    <div class="sw__button sw__contact-btn mt-30 wow fadeInUp" data-wow-delay="0.5s">
                                        <a href="<?php echo $settings['button_link']['url']; ?>"><?php echo $settings['button_text']; ?> </a>
                                    </div>
								<?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="sw__contact-form sw__contact-form-v3 sw__contact-form-v2 wow fadeInUp" data-wow-delay="0.2s">
								<?php if ( $settings['form_subheading'] ) { ?>
                                    <p class="sw--fs-14 sw--color-white  text-center wow fadeInUp" data-wow-delay="0.3s">
										<?php echo $settings['form_subheading']; ?>
                                    </p>
								<?php } ?>
								<?php if ( $settings['form_heading'] ) { ?>
                                    <h2 class="sw--fs-50 sw--color-white  text-center wow fadeInUp" data-wow-delay="0.4s">
										<?php echo $settings['form_heading']; ?>
                                    </h2>
								<?php } ?>
								<?php echo do_shortcode( $settings['form_shortcode'] ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Start-->
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_contact_v2 );



