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

class teconce_newsletter extends Widget_Base {

	public function get_name() {
		return 'teconce_newsletter';
	}

	public function get_title() {
		return __( 'Teconce Newsletter', 'teconce' );
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
				'default'     => esc_html__( 'Form Fill-up', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your subtitle here', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label'       => esc_html__( 'Section Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'Unearth the Beauty of Your Garden.', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
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
				'default'     => esc_html__( 'Send Message', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your button title here', 'textdomain' ),
			]
		);
		
		$this->add_control(
			'popup_title',
			[
				'label' => esc_html__( 'Pop up Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Send an Email', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
			]
		);
		
	$this->add_control(
			'popup_content',
			[
				'label' => esc_html__( 'Popup Content', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 5,
				'placeholder' => esc_html__( 'Add Contact Form Here', 'textdomain' ),
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Shape-Content',
			[
				'label' => esc_html__( 'Shape Content', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'shape_img',
			[
				'label'   => esc_html__( 'Shape Image', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_responsive_control(
			'right',
			[
				'label'      => esc_html__( 'Right', 'textdomain' ),
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
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$repeater->add_responsive_control(
			'top',
			[
				'label'      => esc_html__( 'Top', 'textdomain' ),
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
			'data-Y-axis',
			[
				'label'      => esc_html__( 'Data Y Axis', 'textdomain' ),
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
			'data-X-axis',
			[
				'label'      => esc_html__( 'Data X Axis', 'textdomain' ),
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
			'list',
			[
				'label'       => esc_html__( 'Shape List', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
					],
				],
			]
		);

		$this->end_controls_section();

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- Newsletter start -->
        <section class="sw__newsletter">
            <div class="container position-relative">
            <span class="sw__newsletter-shapes">
		<?php
		$i = 0;
		foreach ( $settings['list'] as $item ) {
			$i ++;
			?>
            <img data-parallax='{"y": "<?php echo $item['data-Y-axis']['size']; ?>", "x" : "<?php echo $item['data-X-axis']['size']; ?>"}' src="<?php echo $item['shape_img']['url']; ?>" class="sw__newsletter-shape-<?php echo $i; ?> elementor-repeater-item-<?php echo $item['_id']; ?>" alt="">
		<?php } ?>
            </span>
                <div class="sw__newsletter-content">
                    <div class="sw__newsletter-left">
						<?php if ( $settings['section_subtitle'] ) { ?>
                            <div class="sw__section-subtitle sw--color-brown sw--fs-12  mb-10 wow fadeInLeft">
								<?php echo $settings['section_subtitle']; ?>
                            </div>
						<?php } ?>
						<?php if ( $settings['section_title'] ) { ?>
                            <div class="sw__section-title sw--fs-50 sw--color-black-900  wow fadeInLeft" data-wow-delay="0.3s">
								<?php echo $settings['section_title']; ?>
                            </div>
						<?php } ?>
                    </div>
					<?php if ( $settings['button_text'] ) { ?>
                        <div class="se__newsletter-right wow fadeInRight" data-wow-delay="0.3s">
                            <div class="sw__button">
                                <a href="#sw_cotact_form" data-lity>
									<?php echo $settings['button_text']; ?>
                                </a>
                            </div>
                        </div>
                        
                        <div id="sw_cotact_form" style="background:#fff" class="lity-hide">
                            <h4><?php echo $settings['popup_title']; ?></h4>
                            <?php echo $settings['popup_content']; ?>
                            </div>
					<?php } ?>
                </div>
            </div>
        </section>
        <!-- Newsletter end -->
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_newsletter );



