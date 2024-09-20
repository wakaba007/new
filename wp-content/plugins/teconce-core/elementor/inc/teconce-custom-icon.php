<?php

namespace Elementor;

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

/*--------------------------
*   Class Iconic Icon Manager
* -------------------------*/

class teconce_custom_icon_Manager
{

    private static $instance = null;

    public static function instance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    function __construct() {
        $this->init();
    }

    public function init() {

        // Custom icon filter
        add_filter('elementor/icons_manager/additional_tabs', [$this, 'teconce_custom_icon']);

    }

    public function teconce_custom_icon($custom_icons_args = array()) {

        // Append new icons
        $custom_icons = array(

            'icon-user-1',
            'icon-heart-1',
            'icon-shopping-basket-1',
            'icon-search-one',
            'icon-shopping-bag-2',
            'icon-heart-2',
            'icon-menus-1',
            'icon-world-grid',
            'icon-location',
            'icon-email',
            'icon-call-1',
            'icon-down-arrow',
            'icon-heart-3',
            'icon-user-2',
            'icon-shopping-basket-2',
            'icon-twitter',
            'icon-facebook',
            'icon-youtube',
            'icon-playstore',
            'icon-phone-call',
            'icon-eye',
            'icon-data-transfer',
            'icon-box',
            'icon-headphones',
            'icon-gift-box',
            'icon-delivery',
            'icon-return',
            'icon-reload',
            'icon-send',
            'icon-shopping-bag-3',
            'icon-headset',
            'icon-truck',
            'icon-ladies-shirt',
            'icon-makeup',
            'icon-watch',
            'icon-t-shirt',
            'icon-bear',
            'icon-technology',
            'icon-tv',
            'icon-web-camera',
            'icon-groceries',
            'icon-house',
            'icon-volleyball',
            'icon-motorcycle',
            'icon-setting-2',
            'icon-earphones',
            'icon-fur-coat',
            'icon-vaccine',
            'icon-balance',
            'icon-heart',
            'icon-profile-circle',
            'icon-bag-2',
            'icon-cross',
            'icon-search-normal',
            'icon-duck',
            'icon-necklace',
            'icon-quote',
            'icon-star',
            'icon-arrow-right-3',
            'icon-arrow-right-2',
            'icon-message',
            'icon-straight-quotes',
            'icon-arrow-right',
            'icon-arrow-right-4',
            'icon-globe',
            'icon-package',
            'icon-refresh-cw',
            'icon-neck-piece',
            'icon-earrings',
            'icon-diamond',
            'icon-bracelet',
            'icon-gem',
            'icon-arrow-corner',
            'icon-play-btn',
            'icon-pinterest',
            'icon-instagram',
            'icon-linkedin',
            'icon-twitter-solid',
            'icon-paypal',
            'icon-credit-card',
            'icon-edit',
            'icon-send-solid',
            'icon-truck-1',
            'icon-shop-1',
            'icon-archive',
            'icon-share',
            'icon-compare',
            'icon-verified',
            'icon-question',
            'icon-compare-2',
            'icon-function',
            'icon-calendar',
            'icon-clock',
            'icon-directbox-default',
            'icon-call-calling',
            'icon-bag-line',
            'icon-flash-1',
            'icon-discount',


        );

        $custom_icons_args['teconce_custom_icon_box'] = array(
            'name' => 'teconce_custom_icon_box',
            'label' => esc_html__('Teconce Icons', 'teconce-core'),
            'labelIcon' => 'teconceo-semi-solid cs-orange',
            'prefix' => 'teconce-',
            'displayPrefix' => '',
            'url' => TECONCE_PL_ASSETS . 'css/teconce-icon.css',
            'icons' => $custom_icons,
            'ver' => 1,
        );

        return $custom_icons_args;
    }


}

teconce_custom_icon_Manager::instance();