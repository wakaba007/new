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

class teconce_testimonial_v3 extends Widget_Base {

	public function get_name() {
		return 'teconce_testimonial_v3';
	}

	public function get_title() {
		return __( 'Teconce Testimonial V3', 'teconce' );
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
				'default'     => esc_html__( 'Family REVIEWS', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your subtitle here', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label'       => esc_html__( 'Section Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => __( 'Love sealed with a kiss <br> forever in bliss', 'textdomain' ),
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
			'inner_shape',
			[
				'label' => esc_html__( 'Inner Shape Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_control(
			'author_img',
			[
				'label' => esc_html__( 'Author Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_control(
			'quote_icon',
			[
				'label'   => esc_html__( 'Quote Icon', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value'   => 'sw-icon sw-icon-quotation-buttom',
					'library' => 'sw-icon',
				],
			]
		);
		$repeater->add_control(
			'comment',
			[
				'label'       => esc_html__( 'Comment', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => __( 'There are many variations of passages of Lorem Ipsum thei available, but the majority have suffered alteration in some form.There are many variations of passages of Lorem There are many variations of passages of Lorem Ipsum thei available, but the majority have suffered alteration in some form.There are many variations of passages of Lorem There are many variations of passages of Lorem Ipsum thei available, but the majority have suffere', 'textdomain' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'ratting',
			[
				'label'   => esc_html__( 'Ratting', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 1,
				'max'     => 5,
				'step'    => 1,
				'default' => 5,
			]
		);
		$repeater->add_control(
			'name',
			[
				'label'       => esc_html__( 'Name', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Brooklyn Simmons', 'textdomain' ),
			]
		);
		$repeater->add_control(
			'designation',
			[
				'label'       => esc_html__( 'Designation', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Parents', 'textdomain' ),
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
						'name' => esc_html__( 'Brooklyn Simmons', 'textdomain' ),
					],
					[
						'name' => esc_html__( 'Jacquelyn Christian', 'textdomain' ),
					],
					[
						'name' => esc_html__( 'Brooklyn Simmons', 'textdomain' ),
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
					'{{WRAPPER}} .sw__reviewv3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .sw_testimonial_slide_item_title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Name-typography',
				'label'    => esc_html__( 'Name Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw_testimonial_slide_item_title',
			]
		);
		$this->add_control(
			'Designation-color',
			[
				'label'     => esc_html__( 'Designation Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw_testimonial_slide_item_subtitle' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Designation-typography',
				'label'    => esc_html__( 'Designation Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw_testimonial_slide_item_subtitle',
			]
		);
		$this->add_control(
			'Quote-Icon-color',
			[
				'label'     => esc_html__( 'Quote-Icon Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw_testimonial_slide_item_iconev3' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'Comment-color',
			[
				'label'     => esc_html__( 'Comment Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw_testimonial_slide_dc_item' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Comment-typography',
				'label'    => esc_html__( 'Comment Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw_testimonial_slide_dc_item',
			]
		);
		$this->add_control(
			'Pagination-Circle-color',
			[
				'label'     => esc_html__( 'Pagination Circle-Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-button-prev::before' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- Tastimoinal Start-->
        <section class="sw__reviewv3 pt-120 overflow-hidden">
            <div class="sw__gallery-wrapper position-relative">
                <div class="container container-1290 position-relative">
					<?php if ( $settings['section_subtitle'] ) { ?>
                        <h6 class="sw__section-subtitle sw__pricing-sub-title sw--fs-14 sw--color-brown  text-center wow fadeInUp mb-10" data-wow-delay="0.3s">
							<?php echo $settings['section_subtitle']; ?>
                        </h6>
					<?php } ?>

					<?php if ( $settings['section_title'] ) { ?>
                        <h2 class="sw__section-title sw__service-title sw__pricing-title sw--fs-50 sw--color-black-900  text-center wow fadeInUp" data-wow-delay="0.4s">
							<?php echo $settings['section_title']; ?>
                        </h2>
					<?php } ?>
                    <div class="swiper sw_testimonial_slide sw_testimonial_slidev3 overflow-hidden mt-35">
                        <div class="sw-testimonial-pagination sw-testimonial-reviewv3">
                            <div class="swiper-button-next wow fadeInUp" data-wow-delay="0.3s"></div>
                            <div class="swiper-button-prev wow fadeInUp" data-wow-delay="0.3s"></div>
                        </div>
                        <div class="swiper-wrapper">
							<?php foreach ( $settings['list'] as $item ) { ?>
                                <div class="swiper-slide">
                                    <div class="sw_testimonial_slide_itemv3 wow fadeInUp" data-wow-delay="0.3s">
										<?php if ( ! empty( $item['inner_shape']['url'] ) ) { ?>
                                            <img src="<?php echo $item['inner_shape']['url']; ?>" alt="" class="sw_testimonial_slide_img-shep">
										<?php } ?>
                                        <div class="sw_testimonial_slide_item_top">
                                            <div class="sw_testimonial_slide_item_top_img text-center d-flex">
                                                <div class="sw_testimonial_slide_item_iconev3 position-relative">
													<?php \Elementor\Icons_Manager::render_icon( $item['quote_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                </div>
                                            </div>
                                            <div class="sw_testimonial_slide_item_contentv3 pt-10 pb-85 text-start">
												<?php if ( $item['comment'] ) { ?>
                                                    <p class=" sw_testimonial_slide_dc_item sw--fs-16 sw--color-black-900 pt-30 pb-30"><?php echo $item['comment']; ?></p>
												<?php } ?>
                                                <div class="sw_testimonial_slide_item_review">
                                                    <div class="nl-review">
														<?php if ( $item['ratting'] == 5 ) { ?>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
														<?php } elseif ( $item['ratting'] == 4 ) { ?>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-regular fa-star"></i></span>
														<?php } elseif ( $item['ratting'] == 3 ) { ?>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-regular fa-star"></i></span>
                                                            <span><i class="fa-regular fa-star"></i></span>
														<?php } elseif ( $item['ratting'] == 2 ) { ?>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-regular fa-star"></i></span>
                                                            <span><i class="fa-regular fa-star"></i></span>
                                                            <span><i class="fa-regular fa-star"></i></span>
														<?php } else { ?>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-regular fa-star"></i></span>
                                                            <span><i class="fa-regular fa-star"></i></span>
                                                            <span><i class="fa-regular fa-star"></i></span>
                                                            <span><i class="fa-regular fa-star"></i></span>
														<?php } ?>
                                                    </div>
                                                </div>
												<?php if ( $item['designation'] ) { ?>
                                                    <h6 class="sw_testimonial_slide_item_subtitle sw--fs-16 sw--color-black-900 pt-10"> <?php echo $item['designation']; ?></h6>
												<?php } ?>
												<?php if ( $item['name'] ) { ?>
                                                    <h2 class="sw_testimonial_slide_item_title sw--fs-27 sw--color-black-900 pt-10 "> <?php echo $item['name']; ?> </h2>
												<?php } ?>
                                            </div>
                                            <div class="sw_testimonial_slide_item_top_img text-center d-flex">
                                                <div class="sw_testimonial_slide_item_imgv3">
													<?php if ( ! empty( $item['author_img']['url'] ) ) { ?>
                                                        <img src="<?php echo $item['author_img']['url']; ?>" alt=""/>
													<?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							<?php } ?>
                        </div>
                    </div>
                    <!-- Start brand logo -->
                </div>
            </div>
        </section>
        <!-- Tastimoinal End-->

		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_testimonial_v3 );



