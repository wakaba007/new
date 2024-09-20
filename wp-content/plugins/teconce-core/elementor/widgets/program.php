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

class teconce_program extends Widget_Base {

	public function get_name() {
		return 'teconce_program';
	}

	public function get_title() {
		return __( 'Teconce Program', 'teconce' );
	}

	public function get_categories() {
		return [ 'teconce-ele-widgets-cat' ];
	}

	public function get_icon() {
		return 'teconce-custom-icon';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'Section-Shapes',
			[
				'label' => esc_html__( 'Section Shapes', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'shape_img',
			[
				'label' => esc_html__( 'Shape Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_responsive_control(
			'shape_top',
			[
				'label'      => esc_html__( 'Shape Top', 'textdomain' ),
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
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$repeater->add_responsive_control(
			'shape_Left',
			[
				'label'      => esc_html__( 'Shape Left', 'textdomain' ),
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
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$repeater->add_responsive_control(
			'shape_Y_offset',
			[
				'label'      => esc_html__( 'Parallax-Y Offset', 'textdomain' ),
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
			]
		);
		$repeater->add_responsive_control(
			'shape_X_offset',
			[
				'label'      => esc_html__( 'Parallax-X Offset', 'textdomain' ),
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
			]
		);
		$this->add_control(
			'shape_list',
			[
				'label'   => esc_html__( 'Shape Image List', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [
					[
					],
				],
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
			'section_subtitle',
			[
				'label'       => esc_html__( 'Section Subtitle', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'OUR PROGRAM', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your subtitle here', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label'       => esc_html__( 'Section Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => __( 'Clearing the Way to a <br> Beautiful Garden', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Program-Content',
			[
				'label' => esc_html__( 'Program Content', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$program_list = new \Elementor\Repeater();

		$program_list->add_control(
			'program_title',
			[
				'label'       => esc_html__( 'Program Title', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'The Reception', 'textdomain' ),
				'label_block' => true,
			]
		);
		$program_list->add_control(
			'program_link',
			[
				'label'       => esc_html__( 'Program Link', 'textdomain' ),
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
		$program_list->add_control(
			'program_country',
			[
				'label'       => esc_html__( 'Program Country', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Pipeline', 'textdomain' ),
				'label_block' => true,
			]
		);
		$program_list->add_control(
			'program_img',
			[
				'label' => esc_html__( 'Program Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'list',
			[
				'label'       => esc_html__( 'Program List', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $program_list->get_controls(),
				'default'     => [
					[
						'program_title' => esc_html__( 'the reception', 'textdomain' ),
					],
					[
						'program_title' => esc_html__( 'wedding ceremony', 'textdomain' ),
					],
					[
						'program_title' => esc_html__( 'the party', 'textdomain' ),
					],
				],
				'title_field' => '{{{ program_title }}}',
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
					'{{WRAPPER}} .sw__program' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'Section-BG-color',
			[
				'label'     => esc_html__( 'Section BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__program' => 'background: {{VALUE}}',
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
			'Program-style',
			[
				'label' => esc_html__( 'Program Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Program-Title-color',
			[
				'label'     => esc_html__( 'Program Title Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__program-details a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Program-Title-typography',
				'label'    => esc_html__( 'Program Title Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__program-details a',
			]
		);
		$this->add_control(
			'Program-Location-color',
			[
				'label'     => esc_html__( 'Program Location Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__program-details h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Program-Location-typography',
				'label'    => esc_html__( 'Program Location Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__program-details h4',
			]
		);
		$this->add_control(
			'Program-Box-BG-color',
			[
				'label'     => esc_html__( 'Program Box BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__program-details' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'label'    => esc_html__( 'Program Box Border', 'textdomain' ),
				'name'     => 'Program-Box-border',
				'selector' => '{{WRAPPER}} .sw__program-details',
			]
		);
		$this->end_controls_section();

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- Program start -->
        <section class="sw__program">
            <div class="container">
                <div class="sw__program-shapes">
					<?php
					foreach ( $settings['shape_list'] as $item ) {
						?>
                        <img data-parallax='{"y": "<?php echo $item['shape_Y_offset']['size']; ?>", "x" : "<?php echo $item['shape_X_offset']['size']; ?>"}' src="<?php echo $item['shape_img']['url']; ?>" class="sw__program-shape-1 elementor-repeater-item-<?php echo $item['_id']; ?>" alt="">
						<?php
					}
					?>
                </div>
				<?php if ( $settings['section_subtitle'] ) { ?>
                    <div class="sw__section-subtitle sw--color-brown sw--fs-12  mb-10 text-center wow fadeInUp">
						<?php echo $settings['section_subtitle']; ?>
                    </div>
				<?php } ?>
				<?php if ( $settings['section_title'] ) { ?>
                    <div class="sw__section-title sw--fs-50 sw--color-black-900  mb-20 text-center wow fadeInUp" data-wow-delay="0.3s">
						<?php echo $settings['section_title']; ?>
                    </div>
				<?php } ?>
                <div class="row g-30 mt-30 justify-content-center">
					<?php
					$i = 5;
					foreach ( $settings['list'] as $item ) {
						?>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.<?php echo $i; ?>s">
                            <div class="sw__program-details">
								<?php if ( $item['program_title'] ) { ?>
                                    <a href="<?php echo $item['program_link']['url']; ?>" class="sw--color-black-900 sw--fs-27  mb-15 text-center"><?php echo $item['program_title']; ?></a>
								<?php } ?>
								<?php if ( $item['program_country'] ) { ?>
                                    <h4 class="sw--color-black-800 sw--fs-16 mb-30"><?php echo $item['program_country']; ?></h4>
								<?php } ?>
								<?php if ( $item['program_img']['url'] ) { ?>
                                    <span class="sw__program-img sw__shine_animation">
                                <img src="<?php echo $item['program_img']['url']; ?>" alt="">
                            </span>
								<?php } ?>
                            </div>
                        </div>
						<?php
						$i += 2;
					}
					?>
                </div>
            </div>
        </section>
        <!-- Program end -->
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_program );



