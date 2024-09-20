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

class teconce_about_v2 extends Widget_Base {

	public function get_name() {
		return 'teconce_about_v2';
	}

	public function get_title() {
		return __( 'Teconce About V2', 'teconce' );
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
			'main_img',
			[
				'label' => esc_html__( 'Main Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'card_img',
			[
				'label' => esc_html__( 'Card Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'card_title',
			[
				'label'       => esc_html__( 'Card Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Daily Activity', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your card title here', 'textdomain' ),
			]
		);
		$this->add_control(
			'card_subtitle',
			[
				'label'       => esc_html__( 'Card Subtitle', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Weeding Excellence', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your card title here', 'textdomain' ),
			]
		);
		$this->add_control(
			'card_shape_img',
			[
				'label' => esc_html__( 'Card Shape Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section-Right-Content',
			[
				'label' => esc_html__( 'Section Right Content', 'textdomain' ),
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
				'placeholder' => esc_html__( 'Type your subtitle here', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label'       => esc_html__( 'Section Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'Weeding Wonders of  Where Gardens', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
			]
		);
		$this->add_control(
			'info',
			[
				'label'       => esc_html__( 'Info', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => esc_html__( "here are many variations of passages of Lorem Ipsum available but the majority havemi suffered alteration in some form, by injected humour or randomised", 'textdomain' ),
				'placeholder' => esc_html__( 'Type your Info here', 'textdomain' ),
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'icon',
			[
				'label'       => esc_html__( 'Icon', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::ICONS,
				'default'     => [
					'value'   => 'far fa-check-circle',
					'library' => 'fa-solid',
				],
			]
		);

		$repeater->add_control(
			'item_title',
			[
				'label'       => esc_html__( 'Item Title', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Weeding Wonders, Where Gardens', 'textdomain' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'list',
			[
				'label'       => esc_html__( 'Item List', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'item_title' => esc_html__( 'Weeding Wonders, Where Gardens', 'textdomain' ),
					],
					[
						'item_title' => esc_html__( 'Clearing the Way to a Beautiful', 'textdomain' ),
					],
					[
						'item_title' => esc_html__( 'Unearth the Beauty of Your Garden', 'textdomain' ),
					],
				],
				'title_field' => '{{{ item_title }}}',
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
				'default'     => esc_html__( 'Read More', 'textdomain' ),
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
					'{{WRAPPER}} .sw__about-company' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'Section-BG-color',
			[
				'label'     => esc_html__( 'Section BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__about-company' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Card-style',
			[
				'label' => esc_html__( 'Card Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Card-Title-color',
			[
				'label'     => esc_html__( 'Card Title Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__about-company-image-card h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Card-Title-typography',
				'label'    => esc_html__( 'Card Title Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__about-company-image-card h4',
			]
		);
		$this->add_control(
			'Card-Subtitle-color',
			[
				'label'     => esc_html__( 'Card Subtitle Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__about-company-image-card p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Card-Subtitle-typography',
				'label'    => esc_html__( 'Card Subtitle Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__about-company-image-card p',
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
					'{{WRAPPER}} .sw__about-company-content-sub-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Subtitle-typography',
				'label'    => esc_html__( 'Section Subtitle Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__about-company-content-sub-title',
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
					'{{WRAPPER}} .sw__about-company-content-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Title-typography',
				'label'    => esc_html__( 'Section Title Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__about-company-content-title',
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
					'{{WRAPPER}} .sw__about-company-content-text' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Info-typography',
				'label'    => esc_html__( 'Section Info Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__about-company-content-text',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'List-item-style',
			[
				'label' => esc_html__( 'List item Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'List-item-color',
			[
				'label'     => esc_html__( 'List item Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__about-company-content-list li' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'List-item-typography',
				'label'    => esc_html__( 'List item Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__about-company-content-list li',
			]
		);
		$this->add_control(
			'List-icon-color',
			[
				'label'     => esc_html__( 'List icon Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__about-company-content-list li i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'List-icon-Circle-color',
			[
				'label'     => esc_html__( 'List icon Circle Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__about-company-content-list li i' => 'border-color: {{VALUE}}',
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

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- ABOUT OUR COMPANY START-->
        <div class="sw__about-company pt-100 pb-70 sw--Bg-color-Gray80">
            <div class="sw__about-company-wrapper">
                <div class="container container-1290">
                    <div class="row align-items-center g-30">
                        <div class="col-lg-6">
                            <div class="sw__about-company-image position-relative">
                                <div class="sw__about-company-image-main">
                                    <img class="sw--border-radius" src="<?php echo $settings['main_img']['url']; ?>" alt="">
                                </div>
                                <div class="sw__about-company-image-card pt-30 pl-55 pr-55 pb-40 sw--Bg-color-white text-center sw--border-radius">
                                    <img src="<?php echo $settings['card_img']['url']; ?>" alt="">
                                    <h4 class="sw--fs-21 sw--color-black-900  pt-15"><?php echo $settings['card_title']; ?></h4>
                                    <p class="sw--fs-16 sw--color-black-900 "><?php echo $settings['card_subtitle']; ?></p>
                                </div>
                                <?php if(!empty($settings['card_shape_img']['url'])) { ?>
                                <div class="sw__about-company-shape d-none d-xl-block">
                                    <img src="<?php echo $settings['card_shape_img']['url']; ?>" alt="">
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="sw__about-company-content">
                                <h6 class="sw__about-company-content-sub-title sw--fs-12 sw--color-brown  mb-10"><?php echo $settings['section_subtitle']; ?></h6>
                                <h2 class="sw__about-company-content-title sw--fs-50 sw--color-black-900  mb-20"><?php echo $settings['section_title']; ?></h2>
                                <p class="sw__about-company-content-text sw--fs-16 sw--color-black-800"><?php echo $settings['info']; ?></p>
                                <div class="sw__about-company-content-list pt-30">
                                    <ul>
										<?php foreach ( $settings['list'] as $item ) { ?>
                                            <li class="sw--fs-21 sw--color-black-900  d-flex align-items-center gap-3">
												<?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
												<?php echo $item['item_title']; ?>
                                            </li>
										<?php } ?>
                                    </ul>
                                </div>
								<?php if ( $settings['button_text'] ) { ?>
                                    <div class="sw__button sw__about-company-btn mt-30">
                                        <a href="<?php echo $settings['button_link']['url']; ?>">
											<?php echo $settings['button_text']; ?>
                                        </a>
                                    </div>
								<?php } ?>
                            </div>
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

Plugin::instance()->widgets_manager->register( new teconce_about_v2 );



