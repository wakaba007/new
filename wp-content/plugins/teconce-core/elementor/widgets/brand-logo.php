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

class teconce_brand_logo extends Widget_Base {

	public function get_name() {
		return 'teconce_brand_logo';
	}

	public function get_title() {
		return __( 'Teconce Brand Logo', 'teconce' );
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
			'gallery',
			[
				'label' => esc_html__( 'Brand Logo', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'show_label' => false,
				'default' => [],
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

		$this->end_controls_section();

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- Start brand logo -->
        <div class="sw__brand-logo">
            <div class="">
                <div class="swiper sw__brand-logo-items">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['gallery'] as $image ){ ?>
                        <div class="swiper-slide text-center">
                            <img src="<?php echo $image['url']; ?>" alt="">
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_brand_logo );



