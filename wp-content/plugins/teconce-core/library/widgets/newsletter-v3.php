<?php if ( ! defined( 'ABSPATH' ) ) {
	die;
}

CSF::createWidget( 'teconce_newsletter_v3', array(
	'title'       => 'Teconce Newsletter V3',
	'classname'   => 'teconce-newsletter-v3',
	'description' => 'Teconce Newsletter on Footer.',
	'fields'      => array(
		array(
			'id'    => 'title',
			'type'  => 'text',
			'title' => 'Title',
		),
        array(
			'id'    => 'info',
			'type'  => 'textarea',
			'title' => 'Info',
		),
        array(
			'id'    => 'form-shortcut',
			'type'  => 'textarea',
			'title' => 'Form Shortcut',
		),
        array(
			'id'     => 'footer_social_icon',
			'type'   => 'repeater',
			'title'  => 'Social Icon',
			'fields' => array(
				array(
					'id'    => 'social_icon',
					'type'  => 'icon',
					'title' => 'Social Icon',
				),
				array(
					'id'    => 'social_link',
					'type'  => 'text',
					'title' => 'Social Link',
				),
			),
		),
	)
) );

//
// Front-end display of widget example 1
// Attention: This function named considering above widget base id.
//
if ( ! function_exists( 'teconce_newsletter_v3' ) ) {
	function teconce_newsletter_v3( $args, $instance ) {


		echo $args['before_widget'];
		?>
        <div class="sw__footer-widget-item wow fadeInUp" data-wow-delay="0.4s">
            <div class="sw__footer-widget-title sw--color-white sw--fs-27 mb-35 sw__footer_newsletter-title-v3">
	            <?php
	            if ( ! empty( $instance['title'] ) ) {
		            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
	            }
	            ?>
            </div>
		<?php if(!empty($instance['info'])) { ?>
            <div class="sw__footer-subscribe-info sw--color-white sw--fs-16 mb-20">
	            <?php echo $instance['info']; ?>
            </div>
		<?php } ?>
        </div>
		<?php echo do_shortcode($instance['form-shortcut']); ?>
        <div class="sw__footer-social-list sw__footer-social-listv3 wow fadeInUp" data-wow-delay="0.4s">
	        <?php

	        if (is_array($instance['footer_social_icon'])){
		        foreach ( $instance['footer_social_icon'] as $item ) {
			        ?>
                    <a href="<?php echo esc_url( $item['social_link'] ); ?>">
                        <i class="<?php echo esc_attr( $item['social_icon'] ); ?>"></i>
                    </a>
			        <?php
		        };
	        }
	        ?>
        </div>
		<?php
		echo $args['after_widget'];
	}
}


