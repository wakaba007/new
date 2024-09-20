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

class teconce_wedding extends Widget_Base {

	public function get_name() {
		return 'teconce_wedding';
	}

	public function get_title() {
		return __( 'Teconce Wedding', 'teconce' );
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
			'shape_1',
			[
				'label' => esc_html__( 'Shape 1', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'shape_2',
			[
				'label' => esc_html__( 'Shape 2', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'section_subtitle',
			[
				'label'       => esc_html__( 'Section Subtitle', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'the wedding of', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your subtitle here', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label'       => esc_html__( 'Section Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'natilia & Habibia', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section-Date-Content',
			[
				'label' => esc_html__( 'Section Date Content', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'show-Date-Section',
			[
				'label'        => esc_html__( 'Show Date-Section', 'textdomain' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'textdomain' ),
				'label_off'    => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);
		$this->add_control(
			'wedding_date_title',
			[
				'label'       => esc_html__( 'Date Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'rows'        => 10,
				'default'     => esc_html__( 'ten o’clock in the afternoon', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your date title here', 'textdomain' ),
				'condition' => [
					'show-Date-Section' => 'yes',
				],
			]
		);
		$this->add_control(
			'wedding_month',
			[
				'label'       => esc_html__( 'Month', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'dec', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your month here', 'textdomain' ),
				'condition' => [
					'show-Date-Section' => 'yes',
				],
			]
		);
		$this->add_control(
			'date',
			[
				'label'       => esc_html__( 'Date', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'sun 03', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your date here', 'textdomain' ),
				'condition' => [
					'show-Date-Section' => 'yes',
				],
			]
		);
		$this->add_control(
			'year',
			[
				'label'       => esc_html__( 'Year', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( '2024', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your year here', 'textdomain' ),
                'condition' => [
					'show-Date-Section' => 'yes',
				],
			]
		);
		$this->add_control(
			'wedding_location',
			[
				'label'       => esc_html__( 'Wedding Location', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'rows'        => 10,
				'default'     => esc_html__( 'intercontinental chicago', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your wedding location here', 'textdomain' ),
                'condition' => [
					'show-Date-Section' => 'yes',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Couple-Content',
			[
				'label' => esc_html__( 'Couple Content', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'label'    => esc_html__( 'Couple Image Bg Shape', 'textdomain' ),
				'name'     => 'couple-image-bg-background',
				'types'    => [ 'classic' ],
				'exclude' => ['color'],
				'selector' => '{{WRAPPER}} .sw__wedding-cupole-shep::before',
				'fields_options' => [
					'background' => [
						'label' => esc_html__('Couple Image Bg Shape', 'textdomain'),
					],
				],
			]
		);
		$this->add_control(
			'arrow_icon_1',
			[
				'label'   => esc_html__( 'Arrow Icon 1', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value'   => 'sw-icon sw-icon-arrow-unick-up',
					'library' => 'sw-icon',
				],
			]
		);
		$this->add_control(
			'arrow_icon_2',
			[
				'label'   => esc_html__( 'Arrow Icon 2', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value'   => 'sw-icon sw-icon-arrow-unick-down',
					'library' => 'sw-icon',
				],
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'client_img',
			[
				'label' => esc_html__( 'Client Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Bride', 'textdomain' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'name',
			[
				'label'       => esc_html__( 'Name', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Kathryn Murphy', 'textdomain' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'designation',
			[
				'label'       => esc_html__( 'Designation', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'There are many variations of passages of Loremos Ipsum their a available, but the majority have manum suffered is alteration in of as some injecteven design', 'textdomain' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'list',
			[
				'label'       => esc_html__( 'Client List', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'title' => esc_html__( 'Bride', 'textdomain' ),
						'name' => esc_html__( 'Kathryn Murphy', 'textdomain' ),
					],
					[
						'title' => esc_html__( 'Groom', 'textdomain' ),
						'name' => esc_html__( 'Faria prima', 'textdomain' ),
					],
				],
				'title_field' => '{{{ title }}}',
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
					'{{WRAPPER}} .sw__wedding' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'Section-BG-color',
			[
				'label'     => esc_html__( 'Section BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__wedding' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .sw__wedding-sub-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Subtitle-typography',
				'label'    => esc_html__( 'Section Subtitle Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__wedding-sub-title',
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
					'{{WRAPPER}} .sw-section--title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Title-typography',
				'label'    => esc_html__( 'Section Title Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw-section--title',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Date-Section-style',
			[
				'label' => esc_html__( 'Date Section Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Date-info-color',
			[
				'label'     => esc_html__( 'Date info Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__wedding-date-title h2, {{WRAPPER}} .sw__wedding-date-main-month, {{WRAPPER}} .sw__wedding-date-main-year' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Date-info-typography',
				'label'    => esc_html__( 'Date info Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__wedding-title, {{WRAPPER}} .sw__wedding-date-main-month, {{WRAPPER}} .sw__wedding-date-main-year',
			]
		);
		$this->add_control(
			'Date-color',
			[
				'label'     => esc_html__( 'Date Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__wedding-date-main-day' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Date-typography',
				'label'    => esc_html__( 'Date Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__wedding-date-main-day',
			]
		);
		$this->add_control(
			'Date-Border-color',
			[
				'label'     => esc_html__( 'Border Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__wedding-date, {{WRAPPER}} .sw__wedding-date-main-month, {{WRAPPER}} .sw__wedding-date-main-day, {{WRAPPER}} .sw__wedding-date-main-year' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Couple-section-style',
			[
				'label' => esc_html__( 'Couple Section Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Couple-Title-color',
			[
				'label'     => esc_html__( 'Couple Title Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__wedding-cupole-content h6' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Couple-Title-typography',
				'label'    => esc_html__( 'Couple Title Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__wedding-cupole-content h6',
			]
		);
		$this->add_control(
			'Couple-Name-color',
			[
				'label'     => esc_html__( 'Couple Name Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__wedding-cupole-content h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Couple-Name-typography',
				'label'    => esc_html__( 'Couple Name Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__wedding-cupole-content h2',
			]
		);
		$this->add_control(
			'Couple-Designation-color',
			[
				'label'     => esc_html__( 'Couple Designation Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__wedding-cupole-content p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Couple-Designation-typography',
				'label'    => esc_html__( 'Couple Designation Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__wedding-cupole-content p',
			]
		);
		$this->add_control(
			'Arrow-Icon-color',
			[
				'label'     => esc_html__( 'Arrow Icon Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__wedding-cupole i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .sw__wedding-cupole path' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'Arrow-Icon-Size',
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
					'{{WRAPPER}} .sw__wedding-cupole i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .sw__wedding-cupole svg' => 'height: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();



	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- Wedding START-->
        <section class="sw__wedding pt-120 pb-120 sw--Bg-color-Gray80">
            <div class="sw__wedding-wrapper position-relative">
                <img class="Wedding-vactor01 d-none d-md-block" data-parallax='{"y": "50", "x" : "0"}' src="<?php echo $settings['shape_1']['url']; ?>" alt="">
                <img class="Wedding-vactor02 d-none d-md-block" data-parallax='{"y": "50", "x" : "0"}' src="<?php echo $settings['shape_2']['url']; ?>" alt="">
                <div class="container container-1290">
					<?php if ( $settings['section_subtitle'] ) { ?>
                        <h6 class="sw__wedding-sub-title sw--fs-12 sw--color-brown  text-center"><?php echo $settings['section_subtitle']; ?></h6>
					<?php } ?>
					<?php if ( $settings['section_title'] ) { ?>
                        <h2 class="sw__wedding-title sw-section--title sw--fs-50 sw--color-black-900  text-center"><?php echo $settings['section_title']; ?></h2>
					<?php } ?>
                    <?php if($settings['show-Date-Section'] == 'yes') { ?>
                        <div class="sw__wedding-date pt-25 pb-20 mt-55">
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <div class="sw__wedding-date-title">
									<?php if ( $settings['wedding_date_title'] ) { ?>
                                        <h2 class="sw__wedding-title sw--fs-27 sw--color-black-900  text-center"><?php echo $settings['wedding_date_title']; ?></h2>
									<?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="sw__wedding-date-main">
                                    <div class="row align-items-center">
                                        <div class="col-4">
											<?php if ( $settings['wedding_month'] ) { ?>
                                                <h6 class="sw__wedding-date-main-month sw--fs-27 sw--color-black-900  text-center"><?php echo $settings['wedding_month']; ?></h6>
											<?php } ?>
                                        </div>
                                        <div class="col-4 pl-15 pr-15">
											<?php if ( $settings['date'] ) { ?>
                                                <h6 class="sw__wedding-date-main-day sw--fs-34 sw--color-black-900  text-center"><?php echo $settings['date']; ?></h6>
											<?php } ?>
                                        </div>
                                        <div class="col-4">
											<?php if ( $settings['year'] ) { ?>
                                                <h6 class="sw__wedding-date-main-year sw--fs-27 sw--color-black-900  text-center"><?php echo $settings['year']; ?></h6>
											<?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="sw__wedding-date-title">
                                    <?php if($settings['wedding_location']) { ?>
                                    <h2 class="sw__wedding-title sw--fs-27 sw--color-black-900  text-center"><?php echo $settings['wedding_location']; ?></h2>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="sw__wedding-cupole pt-120 position-relative">
	                    <?php \Elementor\Icons_Manager::render_icon( $settings['arrow_icon_2'], [ 'aria-hidden' => 'true', 'class' => 'sw__wedding-cupole-icon02' ] ); ?>
	                    <?php \Elementor\Icons_Manager::render_icon( $settings['arrow_icon_1'], [ 'aria-hidden' => 'true', 'class' => 'sw__wedding-cupole-icon01' ] ); ?>
                        <div class="row align-items-center">
                            <?php foreach ($settings['list'] as $item){ ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="sw__wedding-cupole-box text-center">
                                    <div class="sw__wedding-cupole-shep position-relative text-center pt-50 pb-50">
                                        <?php if(!empty($item['client_img']['url'])) { ?>
                                        <img src="<?php echo $item['client_img']['url']; ?>" alt="">
                                        <?php } ?>
                                    </div>
                                    <div class="sw__wedding-cupole-content pt-30 ">
                                        <h6 class="sw--fs-16 sw--color-black-800"><?php echo $item['title']; ?></h6>
                                        <h2 class="sw--fs-27 sw--color-black-900 pb-15"><?php echo $item['name']; ?></h2>
                                        <p class="sw--fs-16 sw--color-black-800"><?php echo $item['designation']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Wedding END -->
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_wedding );



