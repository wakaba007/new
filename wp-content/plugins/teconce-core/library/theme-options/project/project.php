<?php
// Create a top-tab
CSF::createSection($prefix, array(
    'id' => 'project', // Set a unique slug-like ID
    'title' => 'Project',
    'icon' => 'fa fa-project-diagram',
));
// Create a sub-tab
CSF::createSection($prefix, array(
    'parent' => 'project', // The slug id of the parent section
    'title' => 'Project Option',
    'fields' => array(
        array(
            'id'    => 'prelated_project_on_off',
            'type'  => 'switcher',
            'title' => 'Related Project On/Off',
            'default' => true
        ),
    )
));

