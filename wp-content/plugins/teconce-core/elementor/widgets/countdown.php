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

class teconce_countdown extends Widget_Base {

	public function get_name() {
		return 'teconce_countdown';
	}

	public function get_title() {
		return __( 'Teconce Countdown', 'teconce' );
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
			'shape_img',
			[
				'label' => esc_html__( 'Shape Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'counter_number',
			[
				'label'   => esc_html__( 'Number', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 0,
				'step'    => 1,
				'default' => 200,
			]
		);
		$repeater->add_control(
			'counter_suffix',
			[
				'label'       => esc_html__( 'Counter Suffix', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( '+', 'textdomain' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'counter_title',
			[
				'label'       => esc_html__( 'Counter Title', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( 'Team Member', 'textdomain' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'list',
			[
				'label'   => esc_html__( 'Counter List', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [
					[
					],
					[
					],
					[
					],
					[
					],
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Content-style',
			[
				'label' => esc_html__( 'Content Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Number-color',
			[
				'label'     => esc_html__( 'Number Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__countdown-number' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Number-typography',
				'label'    => esc_html__( 'Number Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__countdown-number, 
				{{WRAPPER}} .sw__countdown-number .odometer.odometer-auto-theme',
			]
		);
		$this->add_control(
			'Counter-Title-color',
			[
				'label'     => esc_html__( 'Counter Title Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__countdown-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Counter-Title-typography',
				'label'    => esc_html__( 'Counter Title Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__countdown-title'
			]
		);
		$this->add_control(
			'Border-color',
			[
				'label'     => esc_html__( 'Border Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__countdown-item:after'  => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .sw__countdown_wrap:before' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .sw__countdown_wrap:after'  => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- Countdown -->
        <div class="sw__countdown_wrap">
			<?php
			$i = 0;
			foreach ( $settings['list'] as $item ) {
				?>
                <div class="sw__countdown-item wow fadeInUp" data-wow-delay="<?php echo $i; ?>s">
                    <div class="sw__countdown-number sw--color-black-900 sw--fs-50 sw-mb-5 d-flex align-items-center">
                        <span class="odometer" data-count="<?php echo $item['counter_number']; ?>">00</span>
						<?php if ( $item['counter_suffix'] ) { ?>
                            <span><?php echo $item['counter_suffix']; ?></span>
						<?php } ?>
                    </div>
					<?php if ( $item['counter_title'] ) { ?>
                        <div class="sw__countdown-title sw--color-black-800 sw--fs-16"><?php echo $item['counter_title']; ?></div>
					<?php } ?>
                </div>
				<?php
				$i += 0.3;
			}
			?>
        </div>
		<?php if ( $settings['shape_img']['url'] ) { ?>
            <div class="sw__testimonial-shape">
                <img data-parallax='{"y": "0", "x" : "-120"}' src="<?php echo $settings['shape_img']['url']; ?>" class="sw__testimonial-shape" alt="">
            </div>
		<?php } ?>
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_countdown );



