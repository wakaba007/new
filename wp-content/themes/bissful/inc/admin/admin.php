<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
function bissful_welcome_page() {
    require_once 'bissful-welcome.php';
}

function bissful_admin_menu() {
    if (current_user_can('edit_theme_options')) {
        add_menu_page('Bissful', 'Bissful', 'administrator', 'bissful-admin-menu', 'bissful_welcome_page', BISSFUL_URL . '/assets/images/icon.svg', 4);
        add_submenu_page('bissful-admin-menu', 'bissful', esc_html__('Welcome', 'bissful'), 'administrator', 'bissful-admin-menu', 'bissful_welcome_page', 0);
         if (class_exists('Teconce_Core')) {
        add_submenu_page('bissful-admin-menu', esc_html__('Demo Import', 'bissful'), esc_html__('Demo Import', 'bissful'), 'administrator', 'demo_install', 'bissful_demo_install_function');
         }
    }
}

add_action('admin_menu', 'bissful_admin_menu');


function bissful_demo_install_function() {
    $url = admin_url() . 'admin.php?page=bissful-wizard&step=content';
    ?>
    <script>location.href = '<?php echo esc_html($url);?>//'.replace(/\&amp\;/gi, "&");</script>
    <?php
}
