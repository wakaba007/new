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

class teconce_single_project_banner extends Widget_Base {

	public function get_name() {
		return 'teconce_single_project_banner';
	}

	public function get_title() {
		return __( 'Teconce Single Project Banner', 'teconce' );
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
			'banner_img',
			[
				'label' => esc_html__( 'Banner Image', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'item_title',
			[
				'label'       => esc_html__( 'Title', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'CUSTOMER', 'textdomain' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'item_info',
			[
				'label'       => esc_html__( 'Info', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'HS ROBIN', 'textdomain' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'list',
			[
				'label'       => esc_html__( 'Item List', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'item_title' => esc_html__( 'CUSTOMER', 'textdomain' ),
						'item_info' => esc_html__( 'HS ROBIN', 'textdomain' ),
					],
					[
						'item_title' => esc_html__( 'CATEGORY', 'textdomain' ),
						'item_info' => esc_html__( 'HOME MAKING', 'textdomain' ),
					],
					[
						'item_title' => esc_html__( 'VALUE', 'textdomain' ),
						'item_info' => esc_html__( '150000  USD', 'textdomain' ),
					],
					[
						'item_title' => esc_html__( 'DATE', 'textdomain' ),
						'item_info' => esc_html__( 'NOV 19, 2024', 'textdomain' ),
					],
				],
				'title_field' => '{{{ item_title }}}',
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
			'Item-Title-color',
			[
				'label'     => esc_html__( 'Item Title Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw_project-banner-img-contain h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Item-Title-typography',
				'label'    => esc_html__( 'Item Title Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw_project-banner-img-contain h4',
			]
		);
		$this->add_control(
			'Item-Info-color',
			[
				'label'     => esc_html__( 'Item Info Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw_project-banner-img-contain p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'Item-Info-typography',
				'label'    => esc_html__( 'Item Info Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .sw_project-banner-img-contain p',
			]
		);
		$this->add_control(
			'Item-Box-BG-color',
			[
				'label'     => esc_html__( 'Item Box BG Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw_project-banner-img-contain' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'Item-Box-Border-color',
			[
				'label'     => esc_html__( 'Item Box Border Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sw_project-banner-img-contain' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

	}


	protected function render( $instance = [] ) {

		$settings = $this->get_settings_for_display();

		?>
        <div class="position-relative sw_project-banner-img wow fadeInUp" data-wow-delay="0.5s">
            <?php if($settings['banner_img']['url']) { ?>
            <img src="<?php echo $settings['banner_img']['url']; ?>" alt="Project-details-banner.png">
            <?php } ?>

            <div class="sw_project-banner-img-contain">
                <?php foreach ($settings['list'] as $item){ ?>
                <div class="sw_project-banner-img-contain-item-width">
                    <h4 class="sw--fs-21 sw--color-black-900">
                        <?php echo $item['item_title']; ?>
                    </h4>

                    <p class="sw--fs-14 sw--color-black-800">
                        <?php echo $item['item_info']; ?>
                    </p>
                </div>
                <?php } ?>
            </div>
        </div>
		<?php

	}

	protected function content_template() {
	}

	public function render_plain_content( $instance = [] ) {
	}

}

Plugin::instance()->widgets_manager->register( new teconce_single_project_banner );



