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

class teconce_testimonial_v2 extends Widget_Base {

	public function get_name() {
		return 'teconce_testimonial_v2';
	}

	public function get_title() {
		return __( 'Teconce Testimonial V2', 'teconce' );
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

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- Tastimoinal Start-->
        <section class="sw__review pb-130 overflow-hidden position-relative">
            <?php if($settings['shape_img']['url']) { ?>
            <div class="sw__testimonial-section-shape" data-parallax='{"y" : "100"}'>
                <img src="<?php echo $settings['shape_img']['url']; ?>" alt="" />
            </div>
            <?php } ?>
            <div class="sw__gallery-wrapper position-relative">
                <div class="container container-1290 position-relative">
                    <?php if($settings['section_subtitle']) { ?>
                    <h6 class="sw__section-subtitle sw__pricing-sub-title sw--fs-14 sw--color-brown  text-center wow fadeInUp" data-wow-delay="0.3s">
                        <?php echo $settings['section_subtitle']; ?>
                    </h6>
                    <?php } ?>
                    <?php if($settings['section_title']) { ?>
                    <h2 class="sw__section-title sw--fs-50 sw--color-black-900  text-center wow fadeInUp" data-wow-delay="0.4s">
                        <?php echo $settings['section_title']; ?>
                    </h2>
                    <?php } ?>
                    <div class="sw-testimonial-pagination d-none d-xxl-block">
                        <div class="swiper-button-next wow fadeInUp" data-wow-delay="0.3s"></div>
                        <div class="swiper-button-prev wow fadeInUp" data-wow-delay="0.3s"></div>
                    </div>
                    <div class="swiper sw_testimonial_slide overflow-hidden">
                        <div class="swiper-wrapper">
                            <?php foreach ($settings['list'] as $item){ ?>
                            <div class="swiper-slide">
                                <div class="sw_testimonial_slide_item wow fadeInUp position-relative" data-wow-delay="0.3s">
                                    <?php if(!empty($item['inner_shape']['url'])) { ?>
                                    <div class="sw__testimonial-inner-shape">
                                        <img src="<?php echo $item['inner_shape']['url']; ?>" alt="">
                                    </div>
                                    <?php } ?>
                                    <div class="sw_testimonial_slide_item_top">
                                        <div class="sw_testimonial_slide_item_top_img text-center d-flex justify-content-center">
                                            <div class="sw_testimonial_slide_item_img position-relative">
                                                <?php if(!empty($item['author_img']['url'])) { ?>
                                                    <img src="<?php echo $item['author_img']['url']; ?>" alt="" />
                                                <?php } ?>
	                                            <?php \Elementor\Icons_Manager::render_icon( $item['quote_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                            </div>
                                        </div>
                                        <div class="sw_testimonial_slide_item_content text-center">
                                            <?php if($item['comment']) { ?>
                                            <p class="sw_testimonial_slide_dc_item sw--fs-16 sw--color-black-900 pt-30 pb-30">
	                                            <?php echo $item['comment']; ?>
                                            </p>
                                            <?php } ?>
                                            <div class="sw_testimonial_slide_item_review">
                                                <div class="nl-review">
	                                                <?php if ($item['ratting'] == 5) { ?>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
	                                                <?php } elseif ($item['ratting'] == 4) { ?>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-regular fa-star"></i></span>
	                                                <?php } elseif ($item['ratting'] == 3) { ?>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-regular fa-star"></i></span>
                                                        <span><i class="fa-regular fa-star"></i></span>
	                                                <?php } elseif ($item['ratting'] == 2) { ?>
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
                                            <?php if($item['name']) { ?>
                                            <h2 class="sw_testimonial_slide_item_title sw--fs-27 sw--color-black-900 pt-10 "> <?php echo $item['name']; ?> </h2>
                                            <?php } ?>
                                            <?php if($item['designation']) { ?>
                                            <h6 class="sw_testimonial_slide_item_subtitle sw--fs-16 sw--color-black-900 pt-10"> <?php echo $item['designation']; ?> </h6>
                                            <?php } ?>
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

Plugin::instance()->widgets_manager->register( new teconce_testimonial_v2 );



