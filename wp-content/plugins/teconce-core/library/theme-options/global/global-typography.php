<?php

 // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'global_style', // The slug id of the parent section
    'title'  => 'Global Typography',
    'fields' => array(
        array(
              'id'      => 'heading-one',
              'type'    => 'typography',
              'title'   => 'Heading One Typography',
              'unit' => 'rem',
              'text_align' => false,
              'output'  => 'h1,.h1',
            ),
            
            
            array(
              'id'      => 'heading-two',
              'type'    => 'typography',
              'title'   => 'Heading Two Typography',
              'unit' => 'rem',
              'text_align' => false,
              'output'  => 'h2,.h2',
            ),
            
            array(
              'id'      => 'heading-three',
              'type'    => 'typography',
              'title'   => 'Heading Three Typography',
              'unit' => 'rem',
              'text_align' => false,
              'output'  => 'h3,.h3',
            ),
            
             array(
              'id'      => 'heading-four',
              'type'    => 'typography',
              'title'   => 'Heading Four Typography',
              'unit' => 'rem',
              'text_align' => false,
              'output'  => 'h4,.h4',
            ),
            
             array(
              'id'      => 'heading-five',
              'type'    => 'typography',
              'title'   => 'Heading Five Typography',
              'unit' => 'rem',
              'text_align' => false,
              'output'  => 'h5,.h5',
            ),
            
             array(
              'id'      => 'heading-six',
              'type'    => 'typography',
              'title'   => 'Heading Six Typography',
              'unit' => 'rem',
              'text_align' => false,
              'output'  => 'h6,.h6',
            ),
            
             array(
              'id'      => 'paragraph_typo',
              'type'    => 'typography',
              'title'   => 'Body Typography',
              'unit' => 'rem',
              'text_align' => false,
              'color' => false,
              'output'  => 'body,p',
            ),
            
            array(
              'id'      => 'alt_typo',
              'type'    => 'typography',
              'title'   => 'Alter Typography',
              'compact' => true,
            ),
            
        )
        ));