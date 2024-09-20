<?php if ( ! defined( 'ABSPATH' ) ) {
	die;
}

CSF::createWidget( 'teconce_about_info_v3', array(
	'title'       => 'Teconce About Info V3',
	'classname'   => 'teconce-about-info-v3',
	'description' => 'Teconce about info on Footer V3',
	'fields'      => array(
		array(
			'id'    => 'footer_logo',
			'type'  => 'media',
			'title' => 'Footer Logo',
		),
		array(
			'id'      => 'footer_about_info',
			'type'    => 'textarea',
			'title'   => 'About Info',
			'default' => 'Lorem Ipsum is simply is dumiomy is text Lorem Ipsum is simply.'
		),
		array(
			'id'     => 'footer_contact_info',
			'type'   => 'repeater',
			'title'  => 'Contact Info',
			'fields' => array(
				array(
					'id'    => 'contact_icon',
					'type'  => 'icon',
					'title' => 'Contact Icon',
				),
				array(
					'id'    => 'contact_heading',
					'type'  => 'text',
					'title' => 'Contact Heading',
				),
				array(
					'id'    => 'contact_details',
					'type'  => 'text',
					'title' => 'Contact Details',
				),
				array(
					'id'    => 'contact_link',
					'type'  => 'text',
					'title' => 'Contact link',
					'desc'  => 'use mailto: or tel: to Contact link'
				),
			),
		),


	)
) );

//
// Front-end display of widget example 1
// Attention: This function named considering above widget base id.
//
if ( ! function_exists( 'teconce_about_info_v3' ) ) {
	function teconce_about_info_v3( $args, $instance ) {

		$footer_logo       = ! empty( $instance['footer_logo']['url'] ) ? $instance['footer_logo']['url'] : "";
		$footer_about_info = ! empty( $instance ['footer_about_info'] ) ? $instance ['footer_about_info'] : "";

		echo $args['before_widget'];
		?>
        <div class="sw__footer-widget-item wow fadeInUp" data-wow-delay="0.4s">
			<?php if ( ! empty( $footer_logo ) ) { ?>
                <div class="sw__footer-logo mb-30">
                    <a href="<?php echo home_url( '/' ); ?>">
                        <img src="<?php echo esc_url( $footer_logo ); ?>" alt="">
                    </a>
                </div>
			<?php } ?>
			<?php if ( ! empty( $footer_about_info ) ) { ?>
                <div class="sw__footer-about-info sw--color-white sw--fs-16 mb-40">
					<?php _e( $footer_about_info, 'teconce-core' ); ?>
                </div>
			<?php } ?>

			<?php
			if ( is_array( $instance['footer_contact_info'] ) ) {
				foreach ( $instance['footer_contact_info'] as $item ) {
					?>
                    <div class="sw__footer-contact-info">
                        <div class="sw__footer-contact-icon">
                            <i class="<?php echo $item['contact_icon']; ?>"></i>
                        </div>
                        <div class="sw__footer-contact-deatils">
                            <h4 class="sw--color-black-900 sw--fs-21"><?php echo $item['contact_heading']; ?></h4>
                            <a href="<?php echo esc_html( $item['contact_link'] ); ?>" class="sw--color-black-900 sw--fs-16"><?php echo $item['contact_details']; ?></a>
                        </div>
                    </div>
					<?php
				}
			}
			?>
        </div>
		<?php
		echo $args['after_widget'];
	}
}


