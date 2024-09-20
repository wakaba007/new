<?php if ( ! defined( 'ABSPATH' ) ) {
	die;
}

CSF::createWidget( 'teconce_contact_info', array(
	'title'       => 'Teconce Contact Info',
	'classname'   => 'teconce-contact-info',
	'description' => 'Teconce contact info on Footer.',
	'fields'      => array(
		array(
			'id'    => 'title',
			'type'  => 'text',
			'title' => 'Title',
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
                    'desc' => 'use mailto: or tel: to Contact link'
				),
			),
		),

	)
) );

//
// Front-end display of widget example 1
// Attention: This function named considering above widget base id.
//
if ( ! function_exists( 'teconce_contact_info' ) ) {
	function teconce_contact_info( $args, $instance ) {



		echo $args['before_widget'];
		?>
        <div class="sw__footer-widget-item">
            <div class="sw__footer-widget-title sw--color-black-900 sw--fs-27 mb-35 sw__contact-info-title">
				<?php
				if ( ! empty( $instance['title'] ) ) {
					echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
				}
				?>
            </div>
			<?php
			if ( is_array( $instance['footer_contact_info'] ) ) {
				foreach ( $instance['footer_contact_info'] as $item ) {
					?>
                    <div class="sw__footer-contact-info">
                        <?php if(!empty($item['contact_icon'])) { ?>
                        <div class="sw__footer-contact-icon">
                            <i class="<?php echo $item['contact_icon']; ?>"></i>
                        </div>
                        <?php } ?>
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


