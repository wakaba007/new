<?php
// Create a top-tab
CSF::createSection($prefix, array(
	'id' => 'service', // Set a unique slug-like ID
	'title' => 'Archive Service',
	'icon' => 'fas fa-archive',
));
// Create a sub-tab
CSF::createSection($prefix, array(
	'parent' => 'service',
	'title' => 'Archive Service Options',
	'fields' => array(
		array(
			'id'      => 'archive_service_subtitle',
			'type'    => 'text',
			'title'   => 'Archive Service Subtitle',
			'default' => 'LATEST SERVICE'
		),
		array(
			'id'      => 'archive_service_title',
			'type'    => 'text',
			'title'   => 'Archive Service Title',
			'default' => 'CLEARING THE WAY TO A BEAUTIFUL GARDEN'
		),
		array(
			'id'    => 'archive_service_shape_img',
			'type'  => 'media',
			'title' => 'Archive Service Shape Image',
		),
	)
));

