<?php
// Register Custom Post Type Teconce Header
function teconceheader_cpt() {

    $labels = array(
        'name' => _x('Teconce Headers', 'Post Type General Name', 'teconce'),
        'singular_name' => _x('Teconce Header', 'Post Type Singular Name', 'teconce'),
        'menu_name' => _x('Teconce Headers', 'Admin Menu text', 'teconce'),
        'name_admin_bar' => _x('Teconce Header', 'Add New on Toolbar', 'teconce'),
        'archives' => __('Teconce Header Archives', 'teconce'),
        'attributes' => __('Teconce Header Attributes', 'teconce'),
        'parent_item_colon' => __('Parent Teconce Header:', 'teconce'),
        'all_items' => __('Header Blocks', 'teconce'),
        'add_new_item' => __('Add New Teconce Header', 'teconce'),
        'add_new' => __('Add New Header', 'teconce'),
        'new_item' => __('New Teconce Header', 'teconce'),
        'edit_item' => __('Edit Teconce Header', 'teconce'),
        'update_item' => __('Update Teconce Header', 'teconce'),
        'view_item' => __('View Teconce Header', 'teconce'),
        'view_items' => __('View Teconce Headers', 'teconce'),
        'search_items' => __('Search Teconce Header', 'teconce'),
        'not_found' => __('Not found', 'teconce'),
        'not_found_in_trash' => __('Not found in Trash', 'teconce'),
        'featured_image' => __('Featured Image', 'teconce'),
        'set_featured_image' => __('Set featured image', 'teconce'),
        'remove_featured_image' => __('Remove featured image', 'teconce'),
        'use_featured_image' => __('Use as featured image', 'teconce'),
        'insert_into_item' => __('Insert into Teconce Header', 'teconce'),
        'uploaded_to_this_item' => __('Uploaded to this Teconce Header', 'teconce'),
        'items_list' => __('Teconce Headers list', 'teconce'),
        'items_list_navigation' => __('Teconce Headers list navigation', 'teconce'),
        'filter_items_list' => __('Filter Teconce Headers list', 'teconce'),
    );

    $args = array(
        'label' => __('Teconce Header', 'teconce'),
        'description' => __('', 'teconce'),
        'labels' => $labels,
        'menu_icon' => '',
        'supports' => array('title', 'editor'),
        'taxonomies' => array(),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => 'teconce-admin-menu',
        'menu_position' => 3,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => false,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => false,
    );
    register_post_type('teconce_header', $args);

}

add_action('init', 'teconceheader_cpt', 0);

function teconcefooter_cpt() {

    $labels = array(
        'name' => _x('Teconce Footers', 'Post Type General Name', 'teconce'),
        'singular_name' => _x('Teconce Footer', 'Post Type Singular Name', 'teconce'),
        'menu_name' => _x('Teconce Footers', 'Admin Menu text', 'teconce'),
        'name_admin_bar' => _x('Teconce Footer', 'Add New on Toolbar', 'teconce'),
        'archives' => __('Teconce Footer Archives', 'teconce'),
        'attributes' => __('Teconce Footer Attributes', 'teconce'),
        'parent_item_colon' => __('Parent Teconce Footer:', 'teconce'),
        'all_items' => __('Footer Blocks', 'teconce'),
        'add_new_item' => __('Add New Teconce Footer', 'teconce'),
        'add_new' => __('Add New', 'teconce'),
        'new_item' => __('New Teconce Footer', 'teconce'),
        'edit_item' => __('Edit Teconce Footer', 'teconce'),
        'update_item' => __('Update Teconce Footer', 'teconce'),
        'view_item' => __('View Teconce Footer', 'teconce'),
        'view_items' => __('View Teconce Footers', 'teconce'),
        'search_items' => __('Search Teconce Footer', 'teconce'),
        'not_found' => __('Not found', 'teconce'),
        'not_found_in_trash' => __('Not found in Trash', 'teconce'),
        'featured_image' => __('Featured Image', 'teconce'),
        'set_featured_image' => __('Set featured image', 'teconce'),
        'remove_featured_image' => __('Remove featured image', 'teconce'),
        'use_featured_image' => __('Use as featured image', 'teconce'),
        'insert_into_item' => __('Insert into Teconce Footer', 'teconce'),
        'uploaded_to_this_item' => __('Uploaded to this Teconce Footer', 'teconce'),
        'items_list' => __('Teconce Footers list', 'teconce'),
        'items_list_navigation' => __('Teconce Footers list navigation', 'teconce'),
        'filter_items_list' => __('Filter Teconce Footers list', 'teconce'),
    );

    $args = array(
        'label' => __('Teconce Footer', 'teconce'),
        'description' => __('', 'teconce'),
        'labels' => $labels,
        'menu_icon' => '',
        'supports' => array('title', 'editor'),
        'taxonomies' => array(),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => 'teconce-admin-menu',
        'menu_position' => 4,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => false,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => false,
    );
    register_post_type('teconce_footer', $args);

}

add_action('init', 'teconcefooter_cpt', 0);


// Get block id by ID or slug.
function teconce_get_block_id($post_id) {
    global $wpdb;

    if (empty ($post_id)) {
        return null;
    }

    // Get post ID if using post_name as id attribute.
    if (!is_numeric($post_id)) {
        $post_id = $wpdb->get_var(
            $wpdb->prepare(
                "SELECT ID FROM $wpdb->posts WHERE post_type = 'teconce_block' AND post_name = %s",
                $post_id
            )
        );
    }

    // Polylang support.
    if (function_exists('pll_get_post')) {
        if ($lang_id = pll_get_post($post_id)) {
            $post_id = $lang_id;
        }
    }

    // WPML Support.
    if (function_exists('icl_object_id')) {
        if ($lang_id = icl_object_id($post_id, 'teconce_block', false, ICL_LANGUAGE_CODE)) {
            $post_id = $lang_id;
        }
    }

    return $post_id;
}

// Register Custom Post Type teconce_block
function teconce_create_block_cpt() {

    $labels = array(
        'name' => _x('Teconce Blocks', 'Post Type General Name', 'textdomain'),
        'singular_name' => _x('Teconce Block', 'Post Type Singular Name', 'textdomain'),
        'menu_name' => _x('Teconce Block', 'Admin Menu text', 'textdomain'),
        'name_admin_bar' => _x('Teconce Block', 'Add New on Toolbar', 'textdomain'),
        'archives' => __('Block Archives', 'textdomain'),
        'attributes' => __('Block Attributes', 'textdomain'),
        'parent_item_colon' => __('Parent teconce_block:', 'textdomain'),
        'all_items' => __('Teconce Blocks', 'textdomain'),
        'add_new_item' => __('Add New Block', 'textdomain'),
        'add_new' => __('Add New Block', 'textdomain'),
        'new_item' => __('New Block', 'textdomain'),
        'edit_item' => __('Edit Block', 'textdomain'),
        'update_item' => __('Update Block', 'textdomain'),
        'view_item' => __('View Block', 'textdomain'),
        'view_items' => __('View Block', 'textdomain'),
        'search_items' => __('Search Block', 'textdomain'),
        'not_found' => __('Not found', 'textdomain'),
        'not_found_in_trash' => __('Not found in Trash', 'textdomain'),
        'featured_image' => __('Featured Image', 'textdomain'),
        'set_featured_image' => __('Set featured image', 'textdomain'),
        'remove_featured_image' => __('Remove featured image', 'textdomain'),
        'use_featured_image' => __('Use as featured image', 'textdomain'),
        'insert_into_item' => __('Insert into Block', 'textdomain'),
        'uploaded_to_this_item' => __('Uploaded to this Block', 'textdomain'),
        'items_list' => __('Block list', 'textdomain'),
        'items_list_navigation' => __('Block list navigation', 'textdomain'),
        'filter_items_list' => __('Filter Block list', 'textdomain'),
    );
    $args = array(
        'label' => __('Block', 'textdomain'),
        'description' => __('', 'textdomain'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-editor-ul',
        'supports' => array('title', 'editor', 'thumbnail'),
        'taxonomies' => array(),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => 'teconce-admin-menu',
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => false,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'exclude_from_search' => true,
        'show_in_rest' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type('teconce_block', $args);

}

add_action('init', 'teconce_create_block_cpt', 0);
function my_edit_teconce_block_columns() {
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => __('Title', 'teconce'),
        'shortcode' => __('Shortcode', 'teconce'),
        'date' => __('Date', 'teconce'),
    );

    return $columns;
}

add_filter('manage_edit-teconce_block_columns', 'my_edit_teconce_block_columns');

function my_manage_teconce_block_columns($column, $post_id) {
    $post_data = get_post($post_id, ARRAY_A);
    $slug = $post_data['post_name'];
    add_thickbox();
    switch ($column) {
        case 'shortcode':
            echo '<textarea style="min-width: 60%;
    max-height: 27px;
    background: #FBEEE6;
    border-color: #FBEEE6;
    color: #28170E;
    font-size: 14px;
    margin-top: 5px;
">[teconce_block id="' . $slug . '"]</textarea>';
            break;
    }
}

add_action('manage_teconce_block_posts_custom_column', 'my_manage_teconce_block_columns', 10, 2);


/**
 * Disable gutenberg support for now.
 *
 * @param bool $use_teconce_block_editor Whether the post type can be edited or not. Default true.
 * @param string $post_type The post type being checked.
 *
 * @return bool
 */
function teconce_block_disable_gutenberg($use_teconce_block_editor, $post_type) {
    return $post_type === 'teconce_block' ? false : $use_teconce_block_editor;
}

add_filter('use_teconce_block_editor_for_post_type', 'teconce_block_disable_gutenberg', 10, 2);
add_filter('gutenberg_can_edit_post_type', 'teconce_block_disable_gutenberg', 10, 2);


/**
 * Update teconce_block preview URL
 */
function setec_teconce_block_scripts() {
    global $typenow;
    if ('teconce_block' == $typenow && isset($_GET["post"])) {
        ?>
        <script>
            jQuery(document).ready(function ($) {
                var teconce_block_id = $('input#post_name').val()
                $('#submitdiv').after('<div class="postbox"><h2 class="hndle">Shortcode</h2><div class="inside"><p><textarea style="width:100%; max-height:30px;">[teconce_block id="' + teconce_block_id +
                    '"]</textarea></p></div></div>')
            })
        </script>
        <?php
    }
}

add_action('admin_head', 'setec_teconce_block_scripts');

function setec_teconce_block_frontend() {
    if (isset($_GET["teconce_block"])) {
        ?>
        <script>
            jQuery(document).ready(function ($) {
                $.scrollTo('#<?php echo esc_attr($_GET["teconce_block"]);?>', 300, {offset: -200})
            })
        </script>
        <?php
    }
}

add_action('wp_footer', 'setec_teconce_block_frontend');

function teconce_block_shortcode($atts, $content = null) {
    global $post;

    extract(shortcode_atts(array(
            'id' => '',
        ),
            $atts
        )
    );

    // Abort if ID is empty.
    if (empty ($id)) {
        return '<p><mark>No teconce_block ID is set</mark></p>';
    }


    if (is_home()) $post = get_post(get_option('page_for_posts'));

    $post_id = teconce_get_block_id($id);
    $the_post = $post_id ? get_post($post_id, OBJECT, 'display') : null;

    if ($the_post) {
        if (did_action('elementor/loaded')) {
            $html = \Elementor\Plugin::$instance->frontend->get_builder_content(intval($post_id));
        } else {
            $html = $the_post->post_content;
        }

        if (empty($html)) {
            $html = '<p class="lead shortcode-error">Open this in Elementor to add and edit content</p>';
        }

        // Add edit link for admins.
        if (isset($post) && current_user_can('edit_pages')
            && !is_customize_preview()
            && function_exists('setec_builder_is_active')
            && !setec_builder_is_active()) {
            $edit_link = setec_builder_edit_url($post->ID, $post_id);
            $edit_link_backend = admin_url('post.php?post=' . $post_id . '&action=edit');
            $html = '<div class="teconce_block-edit-link" data-title="Edit Block: ' . get_the_title($post_id) . '"   data-backend="' . esc_url($edit_link_backend)
                . '" data-link="' . esc_url($edit_link) . '"></div>' . $html . '';
        }
    } else {
        $html = '<p class="text-center"><mark>Block <b>"' . esc_html($id) . '"</b> not found</mark></p>';
    }

    return do_shortcode($html);
}

add_shortcode('teconce_block', 'teconce_block_shortcode');


if (!function_exists('teconce_block_categories')) {
    /**
     * Add teconce_block categories support
     */
    function teconce_block_categories() {
        $args = array(
            'hierarchical' => true,
            'public' => false,
            'show_ui' => true,
            'show_in_nav_menus' => true,
        );
        register_taxonomy('teconce_block_categories', array('teconce_block'), $args);

    }

    // Hook into the 'init' action
    add_action('init', 'teconce_block_categories', 0);
}


// Register Custom Post Type Service
function create_service_cpt() {

	$labels = array(
		'name' => _x( 'Service', 'Post Type General Name', 'teconce' ),
		'singular_name' => _x( 'Service', 'Post Type Singular Name', 'teconce' ),
		'menu_name' => _x( 'Services', 'Admin Menu text', 'teconce' ),
		'name_admin_bar' => _x( 'Service', 'Add New on Toolbar', 'teconce' ),
		'archives' => __( 'Service Archives', 'teconce' ),
		'attributes' => __( 'Service Attributes', 'teconce' ),
		'parent_item_colon' => __( 'Parent Service:', 'teconce' ),
		'all_items' => __( 'All service', 'teconce' ),
		'add_new_item' => __( 'Add New Service', 'teconce' ),
		'add_new' => __( 'Add New', 'teconce' ),
		'new_item' => __( 'New Service', 'teconce' ),
		'edit_item' => __( 'Edit Service', 'teconce' ),
		'update_item' => __( 'Update Service', 'teconce' ),
		'view_item' => __( 'View Service', 'teconce' ),
		'view_items' => __( 'View service', 'teconce' ),
		'search_items' => __( 'Search Service', 'teconce' ),
		'not_found' => __( 'Not found', 'teconce' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'teconce' ),
		'featured_image' => __( 'Featured Image', 'teconce' ),
		'set_featured_image' => __( 'Set featured image', 'teconce' ),
		'remove_featured_image' => __( 'Remove featured image', 'teconce' ),
		'use_featured_image' => __( 'Use as featured image', 'teconce' ),
		'insert_into_item' => __( 'Insert into Service', 'teconce' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Service', 'teconce' ),
		'items_list' => __( 'service list', 'teconce' ),
		'items_list_navigation' => __( 'service list navigation', 'teconce' ),
		'filter_items_list' => __( 'Filter service list', 'teconce' ),
	);
	$args = array(
		'label' => __( 'Service', 'teconce' ),
		'description' => __( '', 'teconce' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-awards',
		'supports' => array('title', 'editor', 'excerpt'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'service', $args );

}
add_action( 'init', 'create_service_cpt', 0 );