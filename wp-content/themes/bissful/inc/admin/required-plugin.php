<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.5.2
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once BISSFUL_PATH . '/inc/admin/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'bissful_register_required_plugins');

function bissful_register_required_plugins()
{

    $plugins = array(
        
         array(
            'name' => esc_html__('Elementor', 'bissful'),
            'slug' => 'elementor',
            'required' => true,
        ),
        // This is an example of how to include a plugin bundled with a theme.
        array(
            'name' => 'Teconce Core', // The plugin name.
            'slug' => 'teconce-core', // The plugin slug (typically the folder name).
            'source' => 'https://plugins-hosted.nyc3.cdn.digitaloceanspaces.com/bissful/teconce-core.zip', // The plugin source.
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
            'version' => '1.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
        ),
        array(
            'name'      => esc_html__('Custom Field Pro', 'bissful'),
            'slug'      => 'advanced-custom-fields-pro',
             'source'    => 'https://plugins-hosted.nyc3.cdn.digitaloceanspaces.com/advanced-custom-fields-pro.zip',
            'required'  => false,
             'version'   => '5.11.4',
		),
        array(
            'name' => esc_html__('Contact Form 7', 'bissful'),
            'slug' => 'contact-form-7',
            'required' => true,
        ),

    );
    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id' => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu' => 'bissful-required-plugins',            // Menu slug.
        'parent_slug' => 'admin.php',            // Parent menu slug.
        'capability' => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices' => true,                    // Show admin notices or not.
        'dismissable' => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message' => '',                      // Message to output right before the plugins table.
    );

    tgmpa($plugins, $config);
}

function bissful_plugins_menu_args($args)
{
    $args['parent_slug'] = 'bissful-admin-menu';
    return $args;
}

add_filter('tgmpa_admin_menu_args', 'bissful_plugins_menu_args');