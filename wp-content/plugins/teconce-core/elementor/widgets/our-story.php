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

class teconce_our_story extends Widget_Base {

	public function get_name() {
		return 'teconce_our_story';
	}

	public function get_title() {
		return __( 'Teconce Our Story', 'teconce' );
	}

	public function get_categories() {
		return [ 'teconce-ele-widgets-cat' ];
	}

	public function get_icon() {
		return 'teconce-custom-icon';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'Section-Content',
			[
				'label' => __( 'Section Content', 'teconce' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'section_subtitle',
			[
				'label'       => esc_html__( 'Section Subtitle', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'our Story', 'textdomain' ),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label'       => esc_html__( 'Section Title', 'textdomain' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Clearing the Way to a Beautiful Garden', 'textdomain' ),
			]
		);
		$this->add_control(
			'shape_img',
			[
				'label'   => esc_html__( 'Shape Image', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'Story-Content',
			[
				'label' => esc_html__( 'Story Content', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'story_img',
			[
				'label'   => esc_html__( 'Story Image', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
			]
		);
        $repeater->add_control(
			'story_shape_1',
			[
				'label'   => esc_html__( 'Story Shape Image 1', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
			]
		);
        $repeater->add_control(
			'story_shape_2',
			[
				'label'   => esc_html__( 'Story Shape Image 2', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_control(
			'story_title',
			[
				'label'       => esc_html__( 'Story Title', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'He proposed, i said yes', 'textdomain' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'story_info',
			[
				'label'       => esc_html__( 'Story Info', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'A joyous celebration of love and commitment, a wedding marks the an beginning of a new chapter in life. It brings together two souls, a the a surrounded by family and friends, to witness A joyous celebration of a love and commitment, a wedding marks', 'textdomain' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'list',
			[
				'label'       => esc_html__( 'Story List', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'story_title' => esc_html__( 'How we Meet', 'textdomain' ),
					],
					[
						'story_title' => esc_html__( 'He proposed, i said yes', 'textdomain' ),
					],
				],
				'title_field' => '{{{ story_title }}}',
			]
		);
		$this->end_controls_section();

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <!-- ABOUT STORY START-->
        <section class="sw__story pb-120 sw--Bg-color-white overflow-hidden">
            <div class="sw__story-wrapper position-relative">
                <div class="container container-1290 position-relative z-1">

                    <div class="d-flex flex-column align-items-center">
						<?php if ( $settings['section_subtitle'] ) { ?>
                            <div class="sw__section-subtitle sw--color-brown sw--fs-14  mb-10 wow fadeInLeft text-center">
								<?php echo $settings['section_subtitle']; ?>
                            </div>
						<?php } ?>
						<?php if ( $settings['section_title'] ) { ?>
                            <div class="sw__section-title sw__story-section-title sw--fs-50 sw--color-black-900  wow fadeInLeft text-center " data-wow-delay="0.3s">
								<?php echo $settings['section_title']; ?>
                            </div>
						<?php } ?>
                    </div>

					<?php if ( $settings['shape_img']['url'] ) { ?>
                        <img class="sw__story-shep-3" src="<?php echo $settings['shape_img']['url']; ?>" alt="">
					<?php } ?>

					<?php
                    $i = 0;
					foreach ( $settings['list'] as $item ) {
                        $i++;
                        if ($i % 2 == 0){
                            $column_reverse = 'flex-row-reverse';
	                        $padding_right = "pr-60";
                        }else{
	                        $column_reverse = '';
	                        $padding_right = "pr-30";
                        }
						?>
                        <div class="sw__story-book  sw--Bg-color-white mt-60 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="sw__story-book-shep-main">
                                <div class="sw__story-book-shep">
                                    <svg width="36" height="7" viewBox="0 0 36 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.333333 3.37891C0.333333 4.85167 1.52724 6.04557 3 6.04557C4.47276 6.04557 5.66667 4.85167 5.66667 3.37891C5.66667 1.90615 4.47276 0.71224 3 0.71224C1.52724 0.71224 0.333333 1.90615 0.333333 3.37891ZM30.3333 3.37891C30.3333 4.85167 31.5272 6.04557 33 6.04557C34.4728 6.04557 35.6667 4.85167 35.6667 3.37891C35.6667 1.90615 34.4728 0.71224 33 0.71224C31.5272 0.71224 30.3333 1.90615 30.3333 3.37891ZM3 3.87891H33V2.87891H3V3.87891Z" fill="#E5DACF"/>
                                    </svg>
                                </div>
                                <div class="sw__story-book-shep">
                                    <svg width="36" height="7" viewBox="0 0 36 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.333333 3.37891C0.333333 4.85167 1.52724 6.04557 3 6.04557C4.47276 6.04557 5.66667 4.85167 5.66667 3.37891C5.66667 1.90615 4.47276 0.71224 3 0.71224C1.52724 0.71224 0.333333 1.90615 0.333333 3.37891ZM30.3333 3.37891C30.3333 4.85167 31.5272 6.04557 33 6.04557C34.4728 6.04557 35.6667 4.85167 35.6667 3.37891C35.6667 1.90615 34.4728 0.71224 33 0.71224C31.5272 0.71224 30.3333 1.90615 30.3333 3.37891ZM3 3.87891H33V2.87891H3V3.87891Z" fill="#E5DACF"/>
                                    </svg>
                                </div>
                                <div class="sw__story-book-shep">
                                    <svg width="36" height="7" viewBox="0 0 36 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.333333 3.37891C0.333333 4.85167 1.52724 6.04557 3 6.04557C4.47276 6.04557 5.66667 4.85167 5.66667 3.37891C5.66667 1.90615 4.47276 0.71224 3 0.71224C1.52724 0.71224 0.333333 1.90615 0.333333 3.37891ZM30.3333 3.37891C30.3333 4.85167 31.5272 6.04557 33 6.04557C34.4728 6.04557 35.6667 4.85167 35.6667 3.37891C35.6667 1.90615 34.4728 0.71224 33 0.71224C31.5272 0.71224 30.3333 1.90615 30.3333 3.37891ZM3 3.87891H33V2.87891H3V3.87891Z" fill="#E5DACF"/>
                                    </svg>
                                </div>
                                <div class="sw__story-book-shep">
                                    <svg width="36" height="7" viewBox="0 0 36 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.333333 3.37891C0.333333 4.85167 1.52724 6.04557 3 6.04557C4.47276 6.04557 5.66667 4.85167 5.66667 3.37891C5.66667 1.90615 4.47276 0.71224 3 0.71224C1.52724 0.71224 0.333333 1.90615 0.333333 3.37891ZM30.3333 3.37891C30.3333 4.85167 31.5272 6.04557 33 6.04557C34.4728 6.04557 35.6667 4.85167 35.6667 3.37891C35.6667 1.90615 34.4728 0.71224 33 0.71224C31.5272 0.71224 30.3333 1.90615 30.3333 3.37891ZM3 3.87891H33V2.87891H3V3.87891Z" fill="#E5DACF"/>
                                    </svg>
                                </div>
                                <div class="sw__story-book-shep">
                                    <svg width="36" height="7" viewBox="0 0 36 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.333333 3.37891C0.333333 4.85167 1.52724 6.04557 3 6.04557C4.47276 6.04557 5.66667 4.85167 5.66667 3.37891C5.66667 1.90615 4.47276 0.71224 3 0.71224C1.52724 0.71224 0.333333 1.90615 0.333333 3.37891ZM30.3333 3.37891C30.3333 4.85167 31.5272 6.04557 33 6.04557C34.4728 6.04557 35.6667 4.85167 35.6667 3.37891C35.6667 1.90615 34.4728 0.71224 33 0.71224C31.5272 0.71224 30.3333 1.90615 30.3333 3.37891ZM3 3.87891H33V2.87891H3V3.87891Z" fill="#E5DACF"/>
                                    </svg>
                                </div>
                                <div class="sw__story-book-shep">
                                    <svg width="36" height="7" viewBox="0 0 36 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.333333 3.37891C0.333333 4.85167 1.52724 6.04557 3 6.04557C4.47276 6.04557 5.66667 4.85167 5.66667 3.37891C5.66667 1.90615 4.47276 0.71224 3 0.71224C1.52724 0.71224 0.333333 1.90615 0.333333 3.37891ZM30.3333 3.37891C30.3333 4.85167 31.5272 6.04557 33 6.04557C34.4728 6.04557 35.6667 4.85167 35.6667 3.37891C35.6667 1.90615 34.4728 0.71224 33 0.71224C31.5272 0.71224 30.3333 1.90615 30.3333 3.37891ZM3 3.87891H33V2.87891H3V3.87891Z" fill="#E5DACF"/>
                                    </svg>
                                </div>
                                <div class="sw__story-book-shep">
                                    <svg width="36" height="7" viewBox="0 0 36 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.333333 3.37891C0.333333 4.85167 1.52724 6.04557 3 6.04557C4.47276 6.04557 5.66667 4.85167 5.66667 3.37891C5.66667 1.90615 4.47276 0.71224 3 0.71224C1.52724 0.71224 0.333333 1.90615 0.333333 3.37891ZM30.3333 3.37891C30.3333 4.85167 31.5272 6.04557 33 6.04557C34.4728 6.04557 35.6667 4.85167 35.6667 3.37891C35.6667 1.90615 34.4728 0.71224 33 0.71224C31.5272 0.71224 30.3333 1.90615 30.3333 3.37891ZM3 3.87891H33V2.87891H3V3.87891Z" fill="#E5DACF"/>
                                    </svg>
                                </div>
                                <div class="sw__story-book-shep">
                                    <svg width="36" height="7" viewBox="0 0 36 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.333333 3.37891C0.333333 4.85167 1.52724 6.04557 3 6.04557C4.47276 6.04557 5.66667 4.85167 5.66667 3.37891C5.66667 1.90615 4.47276 0.71224 3 0.71224C1.52724 0.71224 0.333333 1.90615 0.333333 3.37891ZM30.3333 3.37891C30.3333 4.85167 31.5272 6.04557 33 6.04557C34.4728 6.04557 35.6667 4.85167 35.6667 3.37891C35.6667 1.90615 34.4728 0.71224 33 0.71224C31.5272 0.71224 30.3333 1.90615 30.3333 3.37891ZM3 3.87891H33V2.87891H3V3.87891Z" fill="#E5DACF"/>
                                    </svg>
                                </div>
                                <div class="sw__story-book-shep">
                                    <svg width="36" height="7" viewBox="0 0 36 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.333333 3.37891C0.333333 4.85167 1.52724 6.04557 3 6.04557C4.47276 6.04557 5.66667 4.85167 5.66667 3.37891C5.66667 1.90615 4.47276 0.71224 3 0.71224C1.52724 0.71224 0.333333 1.90615 0.333333 3.37891ZM30.3333 3.37891C30.3333 4.85167 31.5272 6.04557 33 6.04557C34.4728 6.04557 35.6667 4.85167 35.6667 3.37891C35.6667 1.90615 34.4728 0.71224 33 0.71224C31.5272 0.71224 30.3333 1.90615 30.3333 3.37891ZM3 3.87891H33V2.87891H3V3.87891Z" fill="#E5DACF"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="row g-0 align-items-center g-md-5 g-sm-5 <?php echo $column_reverse; ?>">
                                <div class="col-md-6 sw__story-book-border-right position-relative">
                                    <div class="sw__story-book-img text-center pt-70 pb-70 <?php echo $padding_right; ?> pl-60 sw__program-img sw__shine_animation">
                                        <img src="<?php echo $item['story_img']['url']; ?>" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6 sw__story-book-border-left">
                                    <div class="sw__story-book-content position-relative pl-55 pr-45">
                                        <img class="sw__story-shep-1" data-wow-delay="0.2s" src="<?php echo $item['story_shape_1']['url']; ?>" alt="">
                                        <img class="sw__story-shep-2" data-wow-delay="0.2s" src="<?php echo $item['story_shape_2']['url']; ?>" alt="">
                                        <h4 class="sw__story-title sw--fs-34 sw--color-black-900  d-inline-block mb-30"><?php echo $item['story_title']; ?></h4>
                                        <p class="sw__story-decription sw--fs-16 sw--color-black-800">
                                            <?php echo $item['story_info']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php } ?>
                </div>
            </div>
        </section>
        <!-- ABOUT STORY END -->
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_our_story );



