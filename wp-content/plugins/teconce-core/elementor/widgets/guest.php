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

class teconce_guest extends Widget_Base {

	public function get_name() {
		return 'teconce_guest';
	}

	public function get_title() {
		return __( 'Teconce Guest', 'teconce' );
	}

	public function get_categories() {
		return [ 'teconce-ele-widgets-cat' ];
	}

	public function get_icon() {
		return 'teconce-custom-icon';
	}

	protected function register_controls() {

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
				'default'     => esc_html__( 'Spacial Guest', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your subtitle here', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label'       => esc_html__( 'Section Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => __( 'The adventure begins <br> with I do', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'guest_img',
			[
				'label'   => esc_html__( 'Guest Image', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_control(
			'guest_name',
			[
				'label'       => esc_html__( 'Guest Name', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Albert Floew', 'textdomain' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'guest_designation',
			[
				'label'       => esc_html__( 'Guest Designation', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Chif Guest', 'textdomain' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'list',
			[
				'label'       => esc_html__( 'Guest List', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'guest_name' => esc_html__( 'Albert Floew', 'textdomain' ),
					],
					[
						'guest_name' => esc_html__( 'SAKIB AK', 'textdomain' ),
					],
					[
						'guest_name' => esc_html__( 'Marl David', 'textdomain' ),
					],
					[
						'guest_name' => esc_html__( 'Fahad Hossain', 'textdomain' ),
					],
				],
				'title_field' => '{{{ guest_name }}}',
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
					'{{WRAPPER}} .sw__guest' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'Guest-style',
			[
				'label' => esc_html__( 'Guest Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Guest-name-color',
			[
				'label'     => esc_html__( 'Guest name Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__guest-name' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Guest-name-typography',
				'label'    => esc_html__( 'Guest name Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__guest-name',
			]
		);
		$this->add_control(
			'Guest-Designation-color',
			[
				'label'     => esc_html__( 'Guest Designation Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__guest-designation' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Guest-Designation-typography',
				'label'    => esc_html__( 'Guest Designation Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__guest-designation',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'label'    => esc_html__( 'Guest image Background', 'textdomain' ),
				'name'     => 'background',
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .sw__guest-img:before',
			]
		);
		$this->end_controls_section();

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- Guest start -->
        <section class="sw__guest pt-120 pb-120 overflow-hidden">
            <div class="container">
				<?php if ( $settings['section_subtitle'] ) { ?>
                    <div class="sw__section-subtitle sw--color-black-900 sw--fs-12  mb-20 text-center wow fadeInUp">
						<?php echo $settings['section_subtitle']; ?>
                    </div>
				<?php } ?>
				<?php if ( $settings['section_title'] ) { ?>
                    <div class="sw__section-title sw--fs-50 sw--color-black-900  mb-60 text-center wow fadeInUp" data-wow-delay="0.3s">
						<?php echo $settings['section_title']; ?>
                    </div>
				<?php } ?>
                <div class="row g-30">
                    <?php
                    $i = 0.3;
                    foreach ($settings['list'] as $item){

                        ?>
                    <div class="col-xl-3 col-md-6 sw__guest-item wow fadeInUp pt-20 overflow-hidden" data-wow-delay="<?php echo $i; ?>s">
                        <div class="sw__guest-info">
                            <div class="sw__guest-img sw__shine_animation">
                                <img src="<?php echo $item['guest_img']['url']; ?>" alt="">
                            </div>
                            <h3 class="sw__guest-name sw--color-black-900 sw--fs-27  mb-10 text-center">
                                <?php echo $item['guest_name']; ?>
                            </h3>
                            <h4 class="sw__guest-designation sw--color-black-800 sw--fs-16 text-center">
                                <?php echo $item['guest_designation']; ?>
                            </h4>
                        </div>
                    </div>
                    <?php
                        $i = $i + 0.3;
                    }
                    ?>
                </div>
            </div>
        </section>
        <!-- Guest end -->
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_guest );



