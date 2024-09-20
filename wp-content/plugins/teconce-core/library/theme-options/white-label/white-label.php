<?php
// Create a top-tab
  CSF::createSection( $prefix, array(
    'id'    => 'white-label', // Set a unique slug-like ID
    'title' => 'White Label',
    'icon'     => 'fa fa-cogs',
  ) );
 // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'white-label', // The slug id of the parent section
    'title'  => 'Admin Login',
    'fields' => array(
        
         array(
          'id'    => 'admin_logo',
          'type'  => 'media',
          'title' => 'Logo',
        ),
        
          array(
          'id'          => 'admin_login_style',
          'type'        => 'select',
          'title'       => 'Login Style Type',
          'placeholder' => 'Select an option',
          'options'     => array(
            'style1'  => 'Style One',
            'style2'  => 'Style Two',
           
          ),
          'default'     => 'style1'
        ),
       
          array(
          'id'          => 'admin_login_bg_type',
          'type'        => 'select',
          'title'       => 'Login Background Type',
          'placeholder' => 'Select an option',
          'options'     => array(
            'color'  => 'Color/Gradient',
            'image'  => 'Image',
            'customcode'  => 'Custom Code',
          ),
          'default'     => 'color'
        ),
          
           array(
          'id'      => 'admin_login_bg_color',
          'type'    => 'teconce_gradient',
          'title'   => 'Admin Background Color',
           'dependency' => array( 'admin_login_bg_type', '==', 'color' ),
        ),      
        
         array(
          'id'    => 'admin_login_bg',
          'type'  => 'media',
          'title' => 'Admin Background Image',
          'dependency' => array( 'admin_login_bg_type', '==', 'image' ),
        ),
        
          array(
          'id'      => 'admin_overlay_color',
          'type'    => 'teconce_gradient',
          'title'   => 'Admin Background Overlay Color',
           'dependency' => array( 'admin_login_bg_type', '==', 'image' ),
        ),      
        
        array(
  'id'    => 'admin_login_custom_code_setting',
  'type'  => 'code_editor',
  'title' => 'Custom Code Background',
  'settings' => array(
    'theme'  => 'duotone-dark',
  ),
   'dependency' => array( 'admin_login_bg_type', '==', 'customcode' ),
),


 array(
          'id'      => 'admin_login_box_color',
          'type'    => 'teconce_gradient',
          'title'   => 'Admin Login Box Background Color',
        ),    
        
        array(
  'id'       => 'admin_login_box_radius',
  'type'     => 'spacing',
  'title'    => 'Login Box Border Radius',
  'default'  => array(
    'top'    => '4',
    'right'  => '4',
    'bottom' => '4',
    'left'   => '4',
    'unit'   => 'px',
  ),
),


  array(
  'id'       => 'admin_login_box_text_color',
  'type'     => 'teconce_color',
  'title'    => 'Login Box Text Color',
),

 array(
  'id'       => 'login_button_admin',
  'type'     => 'teconce_color',
  'title'    => 'Login Button Background',
),


 array(
  'id'       => 'login_button_admin_txt',
  'type'     => 'teconce_color',
  'title'    => 'Login Button Text Color',
),

 array(
  'id'       => 'login_button_admin_hvr',
  'type'     => 'teconce_color',
  'title'    => 'Login Button Background Hover',
),


 array(
  'id'       => 'login_button_admin_txt_hvr',
  'type'     => 'teconce_color',
  'title'    => 'Login Button Text Color Hover',
),

      array(
  'id'       => 'admin_login_button_radius',
  'type'     => 'spacing',
  'title'    => 'Login Box Button Radius',
  'default'  => array(
    'top'    => '4',
    'right'  => '4',
    'bottom' => '4',
    'left'   => '4',
    'unit'   => 'px',
  ),
),

 array(
  'id'       => 'admin_input_fields_color',
  'type'     => 'teconce_color',
  'title'    => 'Input Fields Color',
),


  array(
  'id'       => 'admin_input_field_radius',
  'type'     => 'spacing',
  'title'    => 'Input Fields Radius',
  'default'  => array(
    'top'    => '4',
    'right'  => '4',
    'bottom' => '4',
    'left'   => '4',
    'unit'   => 'px',
  ),
),



        )
        ));
        
        
