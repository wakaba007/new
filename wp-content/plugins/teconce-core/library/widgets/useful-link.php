<?php if ( ! defined( 'ABSPATH' ) ) {
	die;
}

CSF::createWidget( 'teconce_useful_link', array(
	'title'       => 'Teconce Useful Link',
	'classname'   => 'teconce-useful-link',
	'description' => 'Teconce useful link on Footer.',
	'fields'      => array(
		array(
			'id'    => 'title',
			'type'  => 'text',
			'title' => 'Title',
		),
		array(
			'id'     => 'footer_useful_link',
			'type'   => 'repeater',
			'title'  => 'Useful Link',
			'fields' => array(
				array(
					'id'    => 'link_title',
					'type'  => 'text',
					'title' => 'Link Title',
				),
				array(
					'id'    => 'link',
					'type'  => 'text',
					'title' => 'Link',
				),
			),
		),

	)
) );

//
// Front-end display of widget example 1
// Attention: This function named considering above widget base id.
//
if ( ! function_exists( 'teconce_useful_link' ) ) {
	function teconce_useful_link( $args, $instance ) {


		echo $args['before_widget'];
		?>

        <div class="sw__footer-widget-item ml-none-15">
            <div class="sw__footer-widget-title sw--color-black-900 sw--fs-27 mb-35 sw__useful-link-title">
				<?php
				if ( ! empty( $instance['title'] ) ) {
					echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
				}
				?>
            </div>
            <div class="sw__footer-useful-list">
				<?php
				if ( is_array( $instance['footer_useful_link'] ) ) {
					foreach ( $instance['footer_useful_link'] as $item ) {
						?>
                        <a href="<?php echo $item['link']; ?>"><?php echo $item['link_title']; ?></a>
						<?php
					}
				}
				?>

            </div>
        </div>
		<?php
		echo $args['after_widget'];
	}
}


