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

class teconce_blog extends Widget_Base {

	public function get_name() {
		return 'teconce_blog';
	}

	public function get_title() {
		return __( 'Teconce Blog', 'teconce' );
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
				'label' => __('Query type', 'textdomain'),
				'type' => Controls_Manager::SELECT,
				'default' => 'category',
				'options' => [
					'category' => __('Category', 'textdomain'),
					'individual' => __('Individual', 'textdomain'),
				],
			]
		);
		$this->add_control(
			'category',
			array(
				'label'       => esc_html__('Select Category', 'textdomain'),
				'type'        => \Elementor\Controls_Manager::SELECT2,
				'multiple'    => true,
				'options'     => array_flip(teconce_get_categories('category', array(
					'sort_order'  => 'ASC',
					'taxonomy'    => 'category',
					'hide_empty'  => false,
				))),
				'label_block' => true,
				'condition' => [
					'query_type' => 'category',
				],
			)
		);
		$this->add_control(
			'id_query',
			[
				'label' => __('Posts', 'textdomain'),
				'type' => Controls_Manager::SELECT2,
				'options' => teconce_get_all_post('post'),
				'multiple' => true,
				'label_block' => true,
				'condition' => [
					'query_type' => 'individual',
				],
			]
		);
		$this->add_control(
			'post_per_page',
			[
				'label' => esc_html__('Number of Post to Show', 'textdomain'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
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
				'name' => 'button-border',
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
					'{{WRAPPER}} .sw__button:after' => 'background: {{VALUE}}',
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
		$id = $settings['id_query'];
		
		
		if ($settings['query_type'] == 'individual'){
			$post_args = array(
				'post_type' => 'post',
				'posts_per_page' => $post_per_page,
				'post__in' => $id,
				'orderby' => 'post__in'
			);
        }elseif ($settings['query_type'] == 'category' && !empty($category)){
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
        }else{
			$post_args = array(
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'posts_per_page' => $post_per_page,
			);
        }


		$the_query = new \WP_Query( $post_args );

		?>
        <!-- Blog start -->
        <section class="sw__blog pt-120 pb-120 overflow-hidden">
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
                <div class="row g-30 mt-none-30 justify-content-center">
					<?php
					if ( $the_query->have_posts() ) {
					    $i = 0.3;
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							$author_id = get_the_author_meta('ID');
							?>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="<?php echo $i; ?>s">
                                <div class="sw__blog-content-wrap">
                                    <div class="sw__blog-img">
										<?php
										if ( has_post_thumbnail() ) {
											the_post_thumbnail( 'full' );
										}
										?>
                                        <div class="sw__blog-date sw--fs-27 "><span><?php echo get_the_date('d M'); ?></span></div>
                                    </div>
                                    <div class="sw__blog-info">
                                        <div class="sw__blog-meta">
                                            <div class="sw__blog-meta-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none">
                                                    <path d="M13.4062 5.85156L11.1562 10.3516C11.0391 10.6094 10.7812 10.75 10.4766 10.75H1.5C0.65625 10.75 0 10.0938 0 9.25V1.75C0 0.929688 0.65625 0.25 1.5 0.25H4.24219C4.64062 0.25 5.01562 0.414062 5.29688 0.695312L6.44531 1.75H9.75C10.5703 1.75 11.25 2.42969 11.25 3.25V4H10.125V3.25C10.125 3.0625 9.9375 2.875 9.75 2.875H6L4.5 1.49219C4.42969 1.42188 4.33594 1.375 4.24219 1.375H1.5C1.28906 1.375 1.125 1.5625 1.125 1.75V8.5L2.78906 5.17188C2.90625 4.91406 3.16406 4.75 3.44531 4.75H12.75C13.2891 4.75 13.6641 5.33594 13.4062 5.85156Z" fill="#BC7B77"/>
                                                </svg>
                                                <?php
                                                if(get_the_category_list()) {
	                                                teconce_get_first_category();
                                                }
                                                ?>
                                            </div>
                                            <div class="sw__blog-meta-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="13" viewBox="0 0 11 13" fill="none">
                                                    <path d="M6.375 7.625C8.64844 7.625 10.5 9.47656 10.5 11.75C10.5 12.1719 10.1484 12.5 9.75 12.5H0.75C0.328125 12.5 0 12.1719 0 11.75C0 9.47656 1.82812 7.625 4.125 7.625H6.375ZM1.125 11.375H9.35156C9.16406 9.89844 7.89844 8.75 6.375 8.75H4.125C2.57812 8.75 1.3125 9.89844 1.125 11.375ZM5.25 6.5C3.58594 6.5 2.25 5.16406 2.25 3.5C2.25 1.85938 3.58594 0.5 5.25 0.5C6.89062 0.5 8.25 1.85938 8.25 3.5C8.25 5.16406 6.89062 6.5 5.25 6.5ZM5.25 1.625C4.19531 1.625 3.375 2.46875 3.375 3.5C3.375 4.55469 4.19531 5.375 5.25 5.375C6.28125 5.375 7.125 4.55469 7.125 3.5C7.125 2.46875 6.28125 1.625 5.25 1.625Z" fill="#BC7B77"/>
                                                </svg>
                                                <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>"><?php _e('By', 'teconce'); ?> <?php echo get_the_author_meta('display_name') ?></a>
                                            </div>
                                        </div>
                                        <div class="sw__blog-title sw--color-black-900 sw--fs-27 ">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </div>
                                        <div class="sw__button">
                                            <a href="<?php the_permalink(); ?>">
	                                            <?php echo $settings['read_more_btn_text']; ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php
                            $i += 0.3;
						}
						wp_reset_postdata();
					}
					?>
                </div>
            </div>
        </section>
        <!-- Blog end -->
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_blog );



