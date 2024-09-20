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

class teconce_newsletter_v2 extends Widget_Base {

	public function get_name() {
		return 'teconce_newsletter_v2';
	}

	public function get_title() {
		return __( 'Teconce Newsletter V2', 'teconce' );
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
				'default'     => esc_html__( 'Sign Up For news & Get All Updates', 'textdomain' ),
			]
		);
		$this->add_control(
			'newsletter_form_shortcode',
			[
				'label'       => esc_html__( 'Form Shortcode', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'rows'        => 5,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section-Shapes',
			[
				'label' => esc_html__( 'Section Shapes', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'outside_shape_img',
			[
				'label' => esc_html__( 'Outside Shape Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
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
			'Left',
			[
				'label'      => esc_html__( 'Left', 'textdomain' ),
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
		$this->add_control(
			'list',
			[
				'label'       => esc_html__( 'Shape List', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),

			]
		);
		$this->end_controls_section();

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- NewsLeatter Start-->
        <section class="sw__newsletterv2 position-relative overflow-hidden">
            <div class="sw__newsletterv2-wrapper position-relative">
                <?php if(!empty($settings['outside_shape_img']['url'])) { ?>
                <img src="<?php echo $settings['outside_shape_img']['url']; ?>" alt="" class="nl-sheap-6 position-absolute d-none d-xl-block" />
                <?php } ?>
                <div class="container container-1290 position-relative pt-160 pb-160">
                    <?php
                    $i = 0;
                        foreach ($settings['list'] as $item){
                            $i++;
                    ?>
                    <img src="<?php echo $item['shape_img']['url']; ?>" alt="" class="nl-sheap-<?php echo $i; ?> position-absolute elementor-repeater-item-<?php echo $item['_id']; ?>" />
                    <?php } ?>

                    <div class="sw__newsletterv2-main">
                        <h2 class="sw__service-title sw__pricing-title sw--fs-50 sw--color-black-900  text-center wow fadeInUp" data-wow-delay="0.3s">
                            <?php echo $settings['section_title']; ?>
                        </h2>
                        <?php echo do_shortcode($settings['newsletter_form_shortcode']); ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- NewsLeatter End-->
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_newsletter_v2 );



