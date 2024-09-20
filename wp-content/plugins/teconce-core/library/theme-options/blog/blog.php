<?php
// Create a top-tab
CSF::createSection( $prefix, array(
	'id'    => 'blog', // Set a unique slug-like ID
	'title' => 'Blog',
	'icon'  => 'fa fa-book',
) );
// Create a sub-tab
CSF::createSection( $prefix, array(
	'parent' => 'blog', // The slug id of the parent section
	'title'  => 'Single Blog Options',
	'fields' => array(
		array(
			'id'         => 'blog_title_style',
			'type'       => 'typography',
			'title'      => 'Title Typography',
			'unit'       => 'rem',
			'text_align' => false,
			'output'     => '.sw__single-blog-title',

		),
		array(
			'id'         => 'blog__meta',
			'type'       => 'typography',
			'title'      => 'Meta Typography',
			'unit'       => 'rem',
			'text_align' => false,
			'output'     => [ '.sw_blog-business-button-ul li', '.sw_blog-business-button-ul li p' ],

		),
		array(
			'id'         => 'blog_tag_meta',
			'type'       => 'typography',
			'title'      => 'Tag Typography',
			'unit'       => 'rem',
			'text_align' => false,
			'output'     => '.sw_blog-tags a',
		),
		array(
			'id'          => 'blog_tag_background',
			'type'        => 'color',
			'title'       => 'Tag BG Color',
			'output_mode' => 'background-color',
			'output'      => '.sw_blog-tags a',
		),
	)
) );

// Create a sub-tab
CSF::createSection( $prefix, array(
	'parent' => 'blog', // The slug id of the parent section
	'title'  => 'Archive Options',
	'fields' => array(
		array(
			'id'       => 'teconce_blog_grid_style',
			'type'     => 'button_set',
			'title'    => 'Grid Style',
			'multiple' => false,
			'options'  => array(
				'gridstyleone' => 'Grid One',
				'gridstyletwo' => 'Grid Two',
			),
		),
		array(
			'id'         => 'arcive_meta_style',
			'type'       => 'typography',
			'title'      => 'Meta Typography',
			'unit'       => 'px',
			'text_align' => false,
			'output'     => '.nbv2_blog_single_content .nb-f18 , .nbv2_blog_single_content .nb-f14 ',

		),
		array(
			'id'         => 'arcive_title_style',
			'type'       => 'typography',
			'title'      => 'Post Title Typography',
			'unit'       => 'px',
			'text_align' => false,
			'output'     => '.nbv2_blog_single_content .nb-f32',

		),
		array(
			'id'         => 'arcive_content_style',
			'type'       => 'typography',
			'title'      => 'Post Content Typography',
			'unit'       => 'px',
			'text_align' => false,
			'output'     => '.nbv2_blog_single_content .nb-f16',
		),
		array(
			'id'     => 'arcive_content_style_btn_color',
			'type'   => 'link_color',
			'title'  => 'Icon Color',
			'output' => '.nbv2_blog_single_button a',
		),
		array(
			'id'     => 'opt-background-output-1',
			'type'   => 'background',
			'title'  => 'Hover Background',
			'output' => '.nbv2_blog_single  .nb_btn_hover_all:before',
		),
	)

) );
        
        
