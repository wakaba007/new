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

class teconce_gallery extends Widget_Base {

	public function get_name() {
		return 'teconce_gallery';
	}

	public function get_title() {
		return __( 'Teconce Gallery', 'teconce' );
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
				'default'     => esc_html__( 'Latest gallery', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your subtitle here', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label'       => esc_html__( 'Section Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'In love we trust you together grow', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_description',
			[
				'label'       => esc_html__( 'Section Description', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => esc_html__( "majority have suffered alteration in some form, by injected humour or ism randomised words which don't look even slightly believable", 'textdomain' ),
				'placeholder' => esc_html__( 'Type your Description here', 'textdomain' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'gallery_img',
			[
				'label'   => esc_html__( 'Gallery Image', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'list',
			[
				'label'       => esc_html__( 'Gallery List', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
				        [],[],[]
				],
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
					'{{WRAPPER}} .sw__gallery' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'Section-Description-style',
			[
				'label' => esc_html__( 'Section Description Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Section-Description-color',
			[
				'label'     => esc_html__( 'Section Description Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__section-description' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Section-Description-typography',
				'label'    => esc_html__( 'Section Description Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__section-description',
			]
		);
		$this->end_controls_section();

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- Gallery start -->
        <section class="sw__gallery pb-120 overflow-hidden">
            <div class="container">
				<?php if ( $settings['section_subtitle'] ) { ?>
                    <div class="sw__section-subtitle sw--color-brown sw--fs-12  mb-10 wow fadeInLeft">
						<?php echo $settings['section_subtitle']; ?>
                    </div>
				<?php } ?>
                <div class="sw__gallery-section-items d-flex flex-wrap flex-lg-nowrap gap-3 gap-lg-5 justify-content-between align-items-center mb-60">
					<?php if ( $settings['section_title'] ) { ?>
                        <div class="sw__section-title sw--fs-50 sw--color-black-900  wow fadeInLeft" data-wow-delay="0.3s">
	                        <?php echo $settings['section_title']; ?>
                        </div>
					<?php } ?>
					<?php if ( $settings['section_description'] ) { ?>
                        <div class="sw__section-description sw--color-black-800 sw--fs-16 wow fadeInRight" data-wow-delay="0.3s">
							<?php echo $settings['section_description']; ?>
                        </div>
					<?php } ?>
                </div>
                <div class="row g-30 mt-none-30 sw__gallery-images align-items-center">
                    <?php
                        $i = 0;
                        $d = 0.3;
                        foreach ($settings['list'] as $item){
                            $i++;
                            if ($i == 1 || $i == 6){
                                $class = "col-lg-6 col-md-12";
                            }else{
	                            $class = "col-lg-3 col-md-6";
                            }
                    ?>
                    <div class="<?php echo $class; ?> text-center sw__shine_animation position-relative overflow-hidden wow fadeInLeft" data-wow-delay="<?php echo $d; ?>s">
                        <img data-lity src="<?php echo $item['gallery_img']['url']; ?>" alt="">
                    </div>
                    <?php
                            $d += 0.2;
                        }
                        ?>

                </div>
            </div>
        </section>
        <!-- Gallery end -->
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_gallery );



