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

class teconce_countdown_v2 extends Widget_Base {

	public function get_name() {
		return 'teconce_countdown_v2';
	}

	public function get_title() {
		return __( 'Teconce Countdown V2', 'teconce' );
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
		$repeater->add_control(
			'icon',
			[
				'label'   => esc_html__( 'Icon', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value'   => 'sw-icon sw-icon-award',
					'library' => 'sw-icon',
				],
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
					'{{WRAPPER}} .sw__service_counter-box-content h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Number-typography',
				'label'    => esc_html__( 'Number Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__countdown-number, 
				{{WRAPPER}} .sw__service_counter-box-content h2',
			]
		);
		$this->add_control(
			'Counter-Title-color',
			[
				'label'     => esc_html__( 'Counter Title Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__service_counter-box-content h3' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Counter-Title-typography',
				'label'    => esc_html__( 'Counter Title Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__service_counter-box-content h3'
			]
		);
		$this->add_control(
			'Icon-color',
			[
				'label'     => esc_html__( 'Icon Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__service_counter-box-icon' => 'color: {{VALUE}}',
					'{{WRAPPER}} .sw__service_counter-box-icon path' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <section class="sw__service_counter">
            <div class="sw__service_counter-wrapper position-relative">
                <div class="container">
                    <div class="row gy-4">
						<?php
						foreach ( $settings['list'] as $item ) {
							?>
                            <div class="col-lg-3 col-md-6 col-6">
                                <div class="sw__service_counter-box d-flex justify-content-around align-items-center">
                                    <div class="sw__service_counter-box-content">
                                        <h2 class="sw--fs-50 sw--color-black-900 ">
                                            <span class="odometer" data-count="<?php echo $item['counter_number']; ?>">00</span>
											<?php if ( $item['counter_suffix'] ) { ?>
                                                <span class="suffix"><?php echo $item['counter_suffix']; ?></span>
											<?php } ?>
                                        </h2>
										<?php if ( $item['counter_title'] ) { ?>
                                            <h3 class="sw--fs-16 sw--color-black-800"><?php echo $item['counter_title']; ?></h3>
										<?php } ?>
                                    </div>
									<?php if ( $item['icon']['value'] ) { ?>
                                        <div class="sw__service_counter-box-icon">
											<?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                        </div>
									<?php } ?>
                                </div>
                            </div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </section>
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_countdown_v2 );



