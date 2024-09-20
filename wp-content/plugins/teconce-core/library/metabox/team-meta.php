<?php

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'teconce_team_meta';

    //
    // Create a metabox
    CSF::createMetabox( $prefix, array(
        'title'              => 'Team Meta',
        'post_type'          => 'team',
        'data_type'          => 'unserialize',
        'theme'              => 'dark',
    ) );

    //
    // Create a section
    CSF::createSection( $prefix, array(
        'title'  => 'Team Meta Info',
        'fields' => array(
            array(
                'id'     => 'social_info_repeater',
                'type'   => 'repeater',
                'title'  => 'Social Info',
                'fields' => array(
                    array(
                        'id'    => 'team_member_social_icon',
                        'type'  => 'icon',
                        'title' => 'Social Icon',
                    ),
                    array(
                        'id'    => 'team_member_social_link',
                        'type'  => 'link',
                        'title' => 'Social Link',
                    ),
                ),
            ),
        )
    ) );


}

