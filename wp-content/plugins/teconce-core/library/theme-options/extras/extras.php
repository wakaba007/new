<?php
// Create a top-tab
  CSF::createSection( $prefix, array(
    'id'    => 'extras', // Set a unique slug-like ID
    'title' => 'Extras',
    'icon'     => 'fa fa-tasks',
  ) );
 // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'extras', // The slug id of the parent section
    'title'  => 'Custom Sidebar',
    'fields' => array(
        
          // start fields
          array(
            'id'              => 'custom_sidebar',
            'title'           => 'Sidebars',
            'desc'            => 'Go to Appearance -> Widgets after create sidebars',
            'type'            => 'group',
            'fields'          => array(
              array(
                'id'          => 'sidebar_name',
                'type'        => 'text',
                'title'       => 'Sidebar Name'
              ),
              array(
                'id'          => 'sidebar_desc',
                'type'        => 'text',
                'title'       => 'Custom Description',
              )
            ),
            'accordion'       => true,
            'button_title'    => 'Add New Sidebar',
            'accordion_title' =>'New Sidebar', 
          ),
          
                
          
        )
        
        ));
        
        
           CSF::createSection( $prefix, array(
    'parent' => 'extras', // The slug id of the parent section
    'title'  => 'Backup',
    'fields' => array(
        array(
  'type' => 'backup',
),
        )
        ));