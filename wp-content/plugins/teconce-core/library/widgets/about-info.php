<?php if ( ! defined( 'ABSPATH' ) ) {
	die;
}

CSF::createWidget( 'teconce_about_info', array(
	'title'       => 'Teconce About Info',
	'classname'   => 'teconce-about-info',
	'description' => 'Teconce about info on Footer.',
	'fields'      => array(
		array(
			'id'    => 'footer_logo',
			'type'  => 'media',
			'title' => 'Footer Logo',
		),
		array(
			'id'    => 'footer_about_info',
			'type'  => 'textarea',
			'title' => 'About Info',
			'default' => 'Lorem Ipsum is simply is dumiomy is text Lorem Ipsum is simply.'
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
if ( ! function_exists( 'teconce_about_info' ) ) {
	function teconce_about_info( $args, $instance ) {

		$footer_logo       = !empty($instance['footer_logo']['url']) ? $instance['footer_logo']['url'] : "";
		$footer_about_info = !empty($instance ['footer_about_info']) ? $instance ['footer_about_info'] : "";

		echo $args['before_widget'];
		?>

        <div class="sw__footer-widget-item">
			<?php if ( ! empty( $footer_logo ) ) { ?>
                <div class="sw__footer-logo mb-30">
                    <a href="<?php echo home_url( '/' ); ?>">
                        <img src="<?php echo esc_url( $footer_logo ); ?>" alt="">
                    </a>
                </div>
			<?php } ?>
			<?php if ( ! empty( $footer_about_info ) ) { ?>
                <div class="sw__footer-about-info sw--color-black-900 sw--fs-16 mb-40">
					<?php _e( $footer_about_info, 'teconce-core' ); ?>
                </div>
			<?php } ?>
            <div class="sw__footer-social-list">
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
        </div>
		<?php
		echo $args['after_widget'];
	}
}


