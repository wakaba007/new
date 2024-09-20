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

class teconce_day_count extends Widget_Base {

	public function get_name() {
		return 'teconce_day_count';
	}

	public function get_title() {
		return __( 'Teconce Day Count', 'teconce' );
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
			'section_title',
			[
				'label'       => esc_html__( 'Section Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Messing days to Our Wedding', 'textdomain' ),
			]
		);
		$this->add_control(
			'counter_flower_shape',
			[
				'label' => esc_html__( 'Counter Shape Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'Date-Counter',
			[
				'label'     => esc_html__( 'Date Counter', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'month',
			[
				'label'   => esc_html__( 'Month', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 1,
				'max'     => 12,
				'step'    => 1,
				'default' => 10,
			]
		);
		$this->add_control(
			'day',
			[
				'label'   => esc_html__( 'Day', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 1,
				'max'     => 31,
				'step'    => 1,
				'default' => 21,
			]
		);
		$this->add_control(
			'year',
			[
				'label'   => esc_html__( 'Year', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 2023,
				'max'     => 2200,
				'step'    => 1,
				'default' => 2025,
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
		$this->add_control(
			'Section-Padding',
			[
				'label'      => esc_html__( 'Section Padding', 'textdomain' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .sw__ageeddingCounter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .sw__ageeddingCounter-v3-section-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Title-typography',
				'label'    => esc_html__( 'Section Title Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__ageeddingCounter-v3-section-title',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Countdown-style',
			[
				'label' => esc_html__( 'Countdown Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Countdown-color',
			[
				'label'     => esc_html__( 'Countdown Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw_day-count-number' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Countdown-typography',
				'label'    => esc_html__( 'Countdown Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw_day-count-number',
			]
		);
		$this->add_control(
			'Countdown-Section-BG-color',
			[
				'label'     => esc_html__( 'Countdown Section BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__ageeddingCounter-container-wrrap' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'Countdown-Box-BG-color',
			[
				'label'     => esc_html__( 'Countdown Box BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__ageeddingCounter-wrrape' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Countdown-Label-style',
			[
				'label' => esc_html__( 'Countdown Label Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Countdown-Label-color',
			[
				'label'     => esc_html__( 'Countdown Label Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__day-count-label' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Countdown-Label-typography',
				'label'    => esc_html__( 'Countdown Label Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__day-count-label',
			]
		);
		$this->end_controls_section();

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

        $day_count_data = array(
                'month' => $settings['month'],
                'day' => $settings['day'],
                'year' => $settings['year'],
        );


		?>
        <!-- Are getting Counter Start -->
        <section class="sw__ageeddingCounter pb-120 sw--Bg-color-white">
            <div class="sw__ageeddingCounter-wrapper position-relative">
                <?php if($settings['section_title']) { ?>
                <h2 class="sw__ageeddingCounter-v3-title sw__ageeddingCounter-v3-section-title sw--fs-50 sw--color-brown text-center  pb-45 wow fadeInUp" data-wow-delay="0.3s"><?php echo $settings['section_title']; ?></h2>
                <?php } ?>
                <div class="container container-1290">
                    <div class="sw__ageeddingCounter-container-wrrap count-box countdown">

                        <div class="sw__ageeddingCounter-main d-flex justify-content-center wow fadeInUp" data-wow-delay="0.3s">
                            <div class="sw__ageeddingCounter-wrrape position-relative  wow fadeInUp" data-wow-delay="0.3s">
                                <img src="<?php echo $settings['counter_flower_shape']['url']; ?>" alt="" class="position-absolute sw__ageeddingCounter-main-lp">
                                <img src="<?php echo $settings['counter_flower_shape']['url']; ?>" alt="" class="position-absolute sw__ageeddingCounter-main-rp">
                                <h2 class="sw_day-count-number days sw__ageeddingCounter-v3-title d-block sw--fs-105 sw--color-black-900 text-center  wow fadeInUp " data-wow-delay="0.3s" data-day="<?php echo $settings['day']; ?>" data-month="<?php echo $settings['month']; ?>" data-year="<?php echo $settings['year']; ?>">0</h2>
                                <p class="sw__day-count-label sw__ageeddingCounter-v3-title sw--fs-16 sw--color-black-900 text-center  wow fadeInUp" data-wow-delay="0.3s"><?php _e('Days', 'teconce-core'); ?></p>
                            </div>
                        </div>

                        <div class="sw__ageeddingCounter-main d-flex justify-content-center wow fadeInUp" data-wow-delay="0.3s">
                            <div class="sw__ageeddingCounter-wrrape position-relative  wow fadeInUp" data-wow-delay="0.3s">
                                <img src="<?php echo $settings['counter_flower_shape']['url']; ?>" alt="" class="position-absolute sw__ageeddingCounter-main-rp">
                                <img src="<?php echo $settings['counter_flower_shape']['url']; ?>" alt="" class="position-absolute sw__ageeddingCounter-main-lp">
                                <h2 class="sw_day-count-number hours sw__ageeddingCounter-v3-title d-block sw--fs-105 sw--color-black-900 text-center  wow fadeInUp " data-wow-delay="0.3s" >0</h2>
                                <p class="sw__day-count-label sw__ageeddingCounter-v3-title sw--fs-16 sw--color-black-900 text-center  wow fadeInUp" data-wow-delay="0.3s"><?php _e('hours', 'teconce-core'); ?></p>
                            </div>
                        </div>

                        <div class="sw__ageeddingCounter-main d-flex justify-content-center wow fadeInUp" data-wow-delay="0.3s">
                            <div class="sw__ageeddingCounter-wrrape position-relative  wow fadeInUp" data-wow-delay="0.3s">
                                <img src="<?php echo $settings['counter_flower_shape']['url']; ?>" alt="" class="position-absolute sw__ageeddingCounter-main-rp">
                                <img src="<?php echo $settings['counter_flower_shape']['url']; ?>" alt="" class="position-absolute sw__ageeddingCounter-main-lp">
                                <h2 class="sw_day-count-number minutes sw__ageeddingCounter-v3-title d-block sw--fs-105 sw--color-black-900 text-center  wow fadeInUp " data-wow-delay="0.3s">0</h2>
                                <p class="sw__day-count-label sw__ageeddingCounter-v3-title sw--fs-16 sw--color-black-900 text-center  wow fadeInUp" data-wow-delay="0.3s"><?php _e('minutes', 'teconce-core'); ?></p>
                            </div>
                        </div>

                        <div class="sw__ageeddingCounter-main d-flex justify-content-center wow fadeInUp" data-wow-delay="0.3s">
                            <div class="sw__ageeddingCounter-wrrape position-relative  wow fadeInUp" data-wow-delay="0.3s">
                                <img src="<?php echo $settings['counter_flower_shape']['url']; ?>" alt="" class="position-absolute sw__ageeddingCounter-main-rp">
                                <img src="<?php echo $settings['counter_flower_shape']['url']; ?>" alt="" class="position-absolute sw__ageeddingCounter-main-lp">
                                <h2 class="sw_day-count-number seconds sw__ageeddingCounter-v3-title d-block sw--fs-105 sw--color-black-900 text-center  wow fadeInUp " data-wow-delay="0.3s">0</h2>
                                <p class="sw__day-count-label sw__ageeddingCounter-v3-title sw--fs-16 sw--color-black-900 text-center  wow fadeInUp" data-wow-delay="0.3s"><?php _e('seconds', 'teconce-core'); ?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- Are getting Counter End -->
		<?php

	}


	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_day_count );



