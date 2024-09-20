<?php if ( ! defined( 'ABSPATH' ) ) {
	die;
}

CSF::createWidget( 'teconce_newsletter', array(
	'title'       => 'Teconce Newsletter',
	'classname'   => 'teconce-newsletter',
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
	)
) );

//
// Front-end display of widget example 1
// Attention: This function named considering above widget base id.
//
if ( ! function_exists( 'teconce_newsletter' ) ) {
	function teconce_newsletter( $args, $instance ) {


		echo $args['before_widget'];
		?>
        <div class="sw__footer-widget-item">
            <div class="sw__footer-widget-title sw--color-black-900 sw--fs-27 mb-35 sw__footer_newsletter-title">
	            <?php
	            if ( ! empty( $instance['title'] ) ) {
		            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
	            }
	            ?>
            </div>
            <?php if(!empty($instance['info'])) { ?>
            <div class="sw__footer-subscribe-info sw--color-black-900 sw--fs-16 mb-20">
                <?php echo $instance['info']; ?>
            </div>
            <?php } ?>
        </div>
        <?php echo do_shortcode($instance['form-shortcut']); ?>
		<?php
		echo $args['after_widget'];
	}
}


