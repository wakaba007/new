<?php

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'teconce_service_meta';

    //
    // Create a metabox
    CSF::createMetabox( $prefix, array(
        'title'              => 'Service Meta',
        'post_type'          => 'service',
        'data_type'          => 'unserialize',
        'theme'              => 'dark',
    ) );

    //
    // Create a section
    CSF::createSection( $prefix, array(
        'title'  => 'Service Meta Info',
        'fields' => array(
            array(
                'id'    => 'service_meta_icon',
                'type'  => 'icon',
                'title' => 'Icon',
            ),
	        array(
		        'id'      => 'service_meta_button_text',
		        'type'    => 'text',
		        'title'   => 'Service Button Text',
		        'default' => 'See More'
	        ),
        )
    ) );


}

