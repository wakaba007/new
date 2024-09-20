<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'teconce_profile_options';

  //
  // Create profile options
  CSF::createProfileOptions( $prefix, array(
    'data_type' => 'unserialize', // The type of the database save options. `serialize` or `unserialize`
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'fields' => array(

      array(
        'id'    => 'user_facebook',
        'type'  => 'text',
        'title' => 'Facebook URL',
      ),

   array(
        'id'    => 'user_twitter',
        'type'  => 'text',
        'title' => 'Twitter URL',
      ),
      
      array(
        'id'    => 'user_linkedin',
        'type'  => 'text',
        'title' => 'Linked In URL',
      ),
      
      array(
        'id'    => 'user_youtube',
        'type'  => 'text',
        'title' => 'Youtube URL',
      ),
      
      array(
        'id'    => 'user_instagram',
        'type'  => 'text',
        'title' => 'Instagram URL',
      ),
      array(
        'id'    => 'user_pinterest',
        'type'  => 'text',
        'title' => 'Pinterest URL',
      ),

    

    )
  ) );

}