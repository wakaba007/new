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

class teconce_blog_v2 extends Widget_Base {

	public function get_name() {
		return 'teconce_blog_v2';
	}

	public function get_title() {
		return __( 'Teconce Blog V2', 'teconce' );
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
				'default'     => __( 'Latest Blog and news', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your subtitle here', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label'       => esc_html__( 'Section Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => __( 'Weeding Made Easy Made <br> Extraordinary', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
			]
		);
		$this->add_control(
			'query_type',
			[
				'label'   => __( 'Query type', 'textdomain' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'category',
				'options' => [
					'category'   => __( 'Category', 'textdomain' ),
					'individual' => __( 'Individual', 'textdomain' ),
				],
			]
		);
		$this->add_control(
			'category',
			array(
				'label'       => esc_html__( 'Select Category', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::SELECT2,
				'multiple'    => true,
				'options'     => array_flip( teconce_get_categories( 'category', array(
					'sort_order' => 'ASC',
					'taxonomy'   => 'category',
					'hide_empty' => false,
				) ) ),
				'label_block' => true,
				'condition'   => [
					'query_type' => 'category',
				],
			)
		);
		$this->add_control(
			'id_query',
			[
				'label'       => __( 'Posts', 'textdomain' ),
				'type'        => Controls_Manager::SELECT2,
				'options'     => teconce_get_all_post( 'post' ),
				'multiple'    => true,
				'label_block' => true,
				'condition'   => [
					'query_type' => 'individual',
				],
			]
		);
		$this->add_control(
			'post_per_page',
			[
				'label'   => esc_html__( 'Number of Post to Show', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
				'default' => 3,
			]
		);
		$this->add_control(
			'read_more_btn_text',
			[
				'label'       => esc_html__( 'Read More Button Text', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Read More', 'textdomain' ),
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
					'{{WRAPPER}} .sw__blog' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'Blog-style',
			[
				'label' => esc_html__( 'Blog Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'Blog-Title-color',
			[
				'label'     => esc_html__( 'Blog Title Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__blog-title a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'Blog-Title-Hover-color',
			[
				'label'     => esc_html__( 'Blog Title Hover Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__blog-title a:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Blog-Title-typography',
				'label'    => esc_html__( 'Blog Title Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__blog-title a',
			]
		);
		$this->add_control(
			'Blog-Meta-color',
			[
				'label'     => esc_html__( 'Blog Meta Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__blog-meta-item a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Blog-Meta-typography',
				'label'    => esc_html__( 'Blog Meta Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__blog-meta-item a',
			]
		);
		$this->add_control(
			'Blog-Meta-Icon-color',
			[
				'label'     => esc_html__( 'Blog Meta Icon Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__blog-meta-item path' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'Blog-Date-color',
			[
				'label'     => esc_html__( 'Blog Date Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__blog-date' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Blog-Date-typography',
				'label'    => esc_html__( 'Blog Date Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__blog-date',
			]
		);
		$this->add_control(
			'Blog-Date-BG-color',
			[
				'label'     => esc_html__( 'Blog Date BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__blog-date' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Button-style',
			[
				'label' => esc_html__( 'Button Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'style-tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'textdomain' ),
			]
		);
		$this->add_control(
			'Button-Text-color',
			[
				'label'     => esc_html__( 'Button Text Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__button a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Button-Text-typography',
				'label'    => esc_html__( 'Button Text Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw__button a',
			]
		);
		$this->add_control(
			'Button-BG-color',
			[
				'label'     => esc_html__( 'Button BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__button a' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'button-border',
				'selector' => '{{WRAPPER}} .sw__button a',
			]
		);
		$this->end_controls_tab();
		/*END STYLE NORMAL TAB*/
		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'textdomain' ),
			]
		);
		$this->add_control(
			'Button-Hover-color',
			[
				'label'     => esc_html__( 'Button Hover Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__button:hover a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'Button-Hover-BG-color',
			[
				'label'     => esc_html__( 'Button Hover BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__button:before' => 'background: {{VALUE}}',
					'{{WRAPPER}} .sw__button:after'  => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'Button-Hover-Border-color',
			[
				'label'     => esc_html__( 'Button Hover Border Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw__button:hover a' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();
		/*END STYLE HOVER TAB*/
		$this->end_controls_tabs();
		$this->end_controls_section();

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		$category      = $settings['category'];
		$post_per_page = $settings['post_per_page'];
		$id            = $settings['id_query'];


		if ( $settings['query_type'] == 'individual' ) {
			$post_args = array(
				'post_type'      => 'post',
				'posts_per_page' => $post_per_page,
				'post__in'       => $id,
				'orderby'        => 'post__in'
			);
		} elseif ( $settings['query_type'] == 'category' && ! empty( $category ) ) {
			$post_args = array(
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'posts_per_page' => $post_per_page,
				'tax_query'      => array(
					array(
						'taxonomy' => 'category',
						'terms'    => $category,
					),
				)
			);
		} else {
			$post_args = array(
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'posts_per_page' => $post_per_page,
			);
		}


		$the_query = new \WP_Query( $post_args );

		?>
        <!-- Blog Start-->
        <section class="sw__blogv2 position-relative">
            <div class="sw__blogv2-wrapper position-relative">
                <div class="container container-1290 position-relative pt-120 pb-120">
					<?php if ( $settings['section_subtitle'] ) { ?>
                        <h6 class="sw__pricing-sub-title sw--fs-14 sw--color-brown  text-center">
							<?php echo $settings['section_subtitle']; ?>
                        </h6>
					<?php } ?>
					<?php if ( $settings['section_title'] ) { ?>
                        <h2 class="sw__service-title sw__pricing-title sw--fs-50 sw--color-black-900  text-center">
							<?php echo $settings['section_title']; ?>
                        </h2>
					<?php } ?>
                    <div class="row pt-60 g-30">
						<?php
						if ( $the_query->have_posts() ) {
							$i = 0.3;
							while ( $the_query->have_posts() ) {
								$the_query->the_post();
								?>
                                <div class="col-lg-4">
                                    <div class="sw__blogv2-card wow fadeInUp overflow-hidden" data-wow-delay="0.3s">
                                        <div class="sw__blogv2-card-img position-relative sw__shine_animation">
	                                        <?php
	                                        if ( has_post_thumbnail() ) {
		                                        the_post_thumbnail( 'full' );
	                                        }
	                                        ?>
                                            <div class="sw__blogv2-card-date wow fadeInUp" data-wow-delay="0.5s">
                                                <p class="sw__blogv2-card-date-day sw--fs-27 sw--color-black-900 pt-15 pb-10 pl-25 pr-25 sw--Bg-color-white"> <?php echo get_the_date('d'); ?> </p>
                                                <p class="sw__blogv2-card-date-year sw--fs-16 sw--color-white sw--Bg-color-brown"> <?php echo get_the_date('M'); ?> </p>
                                            </div>
                                        </div>
                                        <div class="sw__blogv2-card-content wow fadeInUp" data-wow-delay="0.6s">
                                            <h6 class="sw__blogv2-sub-title sw--fs-27 sw--color-black-900  mt-60">
                                                <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                                </a>
                                            </h6>
                                            <div class="sw__button mt-40">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php echo $settings['read_more_btn_text']; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<?php
							}
							wp_reset_postdata();
						}
						?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog End-->
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_blog_v2 );



