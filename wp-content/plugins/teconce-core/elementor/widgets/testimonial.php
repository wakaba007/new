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

class teconce_testimonial extends Widget_Base {

	public function get_name() {
		return 'teconce_testimonial';
	}

	public function get_title() {
		return __( 'Teconce Testimonial', 'teconce' );
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
				'default'     => esc_html__( 'clients Testimonial', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your subtitle here', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label'       => esc_html__( 'Section Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => __( 'Weeding Made Easy as <br> Results Made', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Testimonial-Content',
			[
				'label' => esc_html__( 'Testimonial Content', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'testimonial_img',
			[
				'label'   => esc_html__( 'Testimonial Image', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
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
				'default'     => esc_html__( 'UI/UX Design', 'textdomain' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'icon',
			[
				'label'       => esc_html__( 'Icon', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::ICONS,
				'default'     => [
					'value'   => 'fas fa-quote-right',
					'library' => 'fa-solid',
				],
			]
		);
		$repeater->add_control(
			'comment',
			[
				'label'       => esc_html__( 'Comment', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'rows'        => 10,
				'default'     => esc_html__( 'There are many variations of passages of Loremos Ipsum their a available, but the majority have manum suffered alteration in of as some form, by injecteven design 1070 There are many variations of passages of Loremos Ipsum their a available, but the majority have manum suffered alteration in of as some form, by injecteven design 1070 designed by man who leave in mirpur', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your description here', 'textdomain' ),
			]
		);
		$this->add_control(
			'list',
			[
				'label'       => esc_html__( 'Testimonial List', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'name' => esc_html__( 'Kathryn Murphy', 'textdomain' ),
					],
					[
						'name' => esc_html__( 'Kathryn Murphy', 'textdomain' ),
					],
					[
						'name' => esc_html__( 'Kathryn Murphy', 'textdomain' ),
					],
				],
				'title_field' => '{{{ name }}}',
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
					'{{WRAPPER}} .sw__testimonial' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'Section-BG-color',
			[
				'label'     => esc_html__( 'Section BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__testimonial' => 'background-color: {{VALUE}}',
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
			'Testimonial-style',
			[
				'label' => esc_html__( 'Testimonial Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Name-color',
			[
				'label'     => esc_html__( 'Name Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__testimonial-author-name' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Name-typography',
				'label'    => esc_html__( 'Name Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__testimonial-author-name',
			]
		);
		$this->add_control(
			'Designation-color',
			[
				'label'     => esc_html__( 'Designation Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__testimonial-author-desig' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Designation-typography',
				'label'    => esc_html__( 'Designation Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__testimonial-author-desig',
			]
		);
		$this->add_control(
			'Quote-Icon-color',
			[
				'label'     => esc_html__( 'Quote-Icon Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__testimonial-quote path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .sw__testimonial-quote i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'Comment-color',
			[
				'label'     => esc_html__( 'Comment Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__testimonial-comment' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Comment-typography',
				'label'    => esc_html__( 'Comment Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__testimonial-comment',
			]
		);
		$this->add_control(
			'Testimonial-Box-BG-color',
			[
				'label'     => esc_html__( 'Testimonial Box BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__testimonial-item' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'label'    => esc_html__( 'Testimonial Box Border', 'textdomain' ),
				'name'     => 'Testimonial-Box-border',
				'selector' => '{{WRAPPER}} .sw__testimonial-item',
			]
		);
		$this->add_control(
			'Progress-Nav-color',
			[
				'label'     => esc_html__( 'Progress Nav Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__testimonial-swiper-init .swiper-scrollbar-drag' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- Testimonial start -->
        <section class="sw__testimonial sw--Bg-color-white-100 pt-120 pb-120">
            <div class="container">
				<?php if ( $settings['section_subtitle'] ) { ?>
                    <div class="sw__section-subtitle sw--color-brown sw--fs-12  mb-10 text-center wow fadeInUp">
						<?php echo $settings['section_subtitle']; ?>
                    </div>
				<?php } ?>
				<?php if ( $settings['section_title'] ) { ?>
                    <div class="sw__section-title sw--fs-50 sw--color-black-900  mb-60 text-center wow fadeInUp" data-wow-delay="0.3s">
						<?php echo $settings['section_title']; ?>
                    </div>
				<?php } ?>

                <!-- Testimonials -->
                <div class="swiper sw__testimonial-swiper-init wow fadeInUp" data-wow-delay="0.6s">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['list'] as $item){ ?>
                        <div class="swiper-slide">
                            <div class="sw__testimonial-item">
                                <?php if(!empty($item['testimonial_img']['url'])) { ?>
                                <div class="sw__testimonial-img">
                                    <img src="<?php echo $item['testimonial_img']['url']; ?>" alt="">
                                </div>
                                <?php } ?>
                                <div class="sw__testimonial-content">
                                    <div class="d-flex justify-content-between mb-10">
                                        <div class="sw__testimonial-author-info">
                                            <?php if($item['name']) { ?>
                                            <h3 class="sw__testimonial-author-name sw--color-black-900 sw--fs-27 mb-10">
                                                <?php echo $item['name']; ?>
                                            </h3>
                                            <?php } ?>
                                            <h5 class="sw__testimonial-author-desig sw--color-black-800 sw--fs-16">
                                                <?php echo $item['designation']; ?>
                                            </h5>
                                        </div>
                                        <div class="sw__testimonial-quote">
	                                        <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                        </div>
                                    </div>
                                    <div class="sw__testimonial-comment sw--color-black-800 sw--fs-16">
                                        <?php echo $item['comment']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
        </section>
        <!-- Testimonial end -->

		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_testimonial );



