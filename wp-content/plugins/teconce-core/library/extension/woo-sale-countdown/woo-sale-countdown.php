<?php

use Faker\Provider\ka_GE\DateTime;


if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('XPSC_Woo_Sale_Countdown') && class_exists('woocommerce')) :

    define('XPSC_VERSION', '1.0.0');
    define('XPSC_PREFIX', 'XPSC');
    define('XPSC_BASE_URL', plugin_dir_url(__FILE__));
    define('XPSC_ASSETS_URL', plugin_dir_url(__FILE__) . 'assets');
    define('XPSC_PATH', plugin_dir_path(__FILE__));
    define('XPSC_DOMAIN', 'teconce-core');

    /**
     * Woo Sale CountDown Main Class.
     *
     */
    class XPSC_Woo_Sale_Countdown
    {

        /**
         * Class Instance.
         */
        private static $instance;

        /**
         * Plugin Settings Object.
         *
         * @var Object
         */
        private $settings;

        /**
         * Is valid Sale.
         *
         * @var boolean
         */
        protected $is_sale_valid;

        /**
         * Single Product ID.
         *
         * @var int
         */
        protected $single_product_id;

        /**
         * Single Instance Class Initialization.
         *
         * @return Object
         */
        public static function init()
        {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Class Constrcutor.
         */
        public function __construct()
        {
            $this->setup_actions();
        }

        /**
         * Plugin Activated Hook.
         *
         * @return void
         */
        public static function plugin_activated()
        {
            if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
                die('<h3> WooCommerce plugin must be active </h3>');
            }
        }

        /**
         * Get Product Sale
         *
         * @return DATETIME
         */
        public function get_product_sale_time($which = 'to', $side = 'back')
        {
            global $post;
            if (('product' !== get_post_type($post->ID)) || ('to' !== $which && 'from' !== $which)) {
                return;
            }
            $product = wc_get_product($post->ID);
            $product_due_date_obj = call_user_func(array($product, 'get_date_on_sale_' . $which));

            if (empty($product_due_date_obj)) {
                return;
            }

            $sale_date = $product_due_date_obj->date_i18n('Y-m-d H:i:s');
            if ('back' === $side) {
                $sale_date = date('Y-m-d H:i:s', strtotime($sale_date));
            }

            return $sale_date;
        }

        /**
         * Frontend Assets.
         *
         * @return void
         */
        public function frontend_enqueue_global()
        {

            wp_enqueue_style(XPSC_PREFIX . '_frontend-styles', XPSC_ASSETS_URL . '/css/flipclock.css', array(), XPSC_VERSION, false);

            if (!wp_script_is('jquery')) {
                wp_enqueue_script('jquery');
            }

            wp_enqueue_script(XPSC_PREFIX . '_countdown_timer', XPSC_ASSETS_URL . '/js/flipclock.min.js', array('jquery'), XPSC_VERSION, true);

            wp_register_script(XPSC_PREFIX . '_actions', XPSC_ASSETS_URL . '/js/actions.js', array('jquery', XPSC_PREFIX . '_countdown_timer'), XPSC_VERSION, true);

            $this->is_sale_valid = $this->is_valid_sale();

            wp_localize_script(
                XPSC_PREFIX . '_actions',
                XPSC_PREFIX . '_ajax_data',
                array(
                    'stillValid' => $this->is_sale_valid,
                    'ajaxUrl' => admin_url('admin-ajax.php'),
                    'nonce' => wp_create_nonce(XPSC_PREFIX . '_nonce'),
                    'currentDate' => current_time('timestamp', false),
                    'endDate' => $this->is_sale_valid ? strtotime($this->get_product_sale_time('to', 'front'), current_time('timestamp', false)) : null,
                )
            );

            wp_enqueue_script(XPSC_PREFIX . '_actions');
        }

        /**
         * Setup Plugin Actions.
         *
         * @return void
         */
        public function setup_actions()
        {
            add_action('wp_enqueue_scripts', array($this, 'frontend_enqueue_global'));

            // Sale Countdown Filter Hook.
            add_action('woocommerce_single_product_summary', array($this, 'sale_countdown'), 15);
            add_action('woocommerce_single_product_style_two_sale_countdown', array($this, 'sale_countdown'));

            add_action('woocommerce_product_stock_progress_bar', array($this, 'nick_store_product_stock_progress_bar'));

            add_action('xpc_counter_product_woo', array($this, 'sale_countdown_alt'));

            // Product Save Hook.
            add_action('woocommerce_admin_process_product_object', array($this, 'adjust_product_sale_dates'), 1000, 1);

            add_action('woocommerce_before_single_product', array($this, 'update_product_price_on_sale_end'), 100);
        }

        /**
         * Filter is on sale product function.
         *
         * @return void
         */
        public function filter_is_on_sale($on_sale, $product_obj)
        {
            if (is_null($this->single_product_id)) {
                return $on_sale;
            }
            if ($product_obj->get_id() === $this->single_product_id) {
                return $this->is_sale_valid;
            }
            return $on_sale;
        }

        /**
         * Modify the Sale Dates before saving it.
         *
         * @param Object $product The Product Object.
         * @return void
         */
        public function adjust_product_sale_dates($product)
        {
            $date_on_sale_from = '';
            $date_on_sale_to = '';

            // Force date from to beginning of day.
            if (isset($_POST['_sale_price_dates_from'])) {
                $date_on_sale_from = wc_clean(wp_unslash($_POST['_sale_price_dates_from']));
                $date_on_sale_from = str_replace('T', ' ', $date_on_sale_from);
                if (!empty($date_on_sale_from)) {
                    $date_on_sale_from = date('Y-m-d H:i:s', strtotime($date_on_sale_from));
                }
            }

            // Force date to to the end of the day.
            if (isset($_POST['_sale_price_dates_to'])) {
                $date_on_sale_to = wc_clean(wp_unslash($_POST['_sale_price_dates_to']));
                $date_on_sale_to = str_replace('T', ' ', $date_on_sale_to);
                if (!empty($date_on_sale_to)) {
                    $date_on_sale_to = date('Y-m-d H:i:s', strtotime($date_on_sale_to));
                }
            }

            $product->set_date_on_sale_to($date_on_sale_to);
            $product->set_date_on_sale_from($date_on_sale_from);

            // hook to product meta actions to trigger sale status meta.
            add_action('woocommerce_process_product_meta_' . $product->get_type(), array($this, 'mark_product_sale_status_update'), 1000, 1);
        }

        /**
         * Update the product meta that sale status has been updated.
         *
         * @param String $product_type The product Type.
         * @param int $post_id The product ID.
         * @return void
         */
        function mark_product_sale_status_update($post_id)
        {
            update_post_meta($post_id, XPSC_PREFIX . '_sale_status_updated', 1);
        }

        /**
         * Check the product sale end date and update price accordingly.
         *
         * @return void
         */
        function update_product_price_on_sale_end()
        {
            global $product;

            if (!is_object($product)) {
                return;
            }
            $this->single_product_id = $product->get_id();
            // Check if sale to is bigger than current time.
            if (!empty($product->get_date_on_sale_to())) {
                if (strtotime($product->get_date_on_sale_to()->format('Y-m-d H:i:s'), current_time('timestamp', false)) <= current_time('timestamp', false)) {
                    update_post_meta($product->get_id(), '_price', $product->get_regular_price('edit'));
                    $regular_price = $product->get_regular_price();
                    $product->set_price($regular_price);
                    $product->set_sale_price('');
                    $product->set_date_on_sale_to('');
                    $product->set_date_on_sale_from('');
                    $product->save();
                } elseif (strtotime($product->get_date_on_sale_to()->format('Y-m-d H:i:s'), current_time('timestamp', false)) > current_time('timestamp', false)) {
                    add_filter('woocommerce_product_is_on_sale', array($this, 'filter_is_on_sale'), 1000, 2);

                    $sale_status = get_post_meta($product->get_id(), XPSC_PREFIX . '_sale_status_updated', true);
                    if (1 == $sale_status) {
                        update_post_meta($product->get_id(), XPSC_PREFIX . '_sale_status_updated', 0);
                        update_post_meta($product->get_id(), '_price', $product->get_sale_price('edit'));
                        $product->set_price($product->get_sale_price('edit'));
                        $product->save();
                    }

                }
            }
        }

        /**
         * Check if product has valid sale to date.
         * returns false / remaining time otherwise.
         *
         * @return Boolean
         */
        public function is_valid_sale($product = '')
        {
            if (is_object($product) && ($product->get_id() !== get_the_ID())) {
                return;
            }
            $product = wc_get_product(get_the_ID());
            $is_sale = false;
            $context = 'edit';
            if (!is_object($product)) {
                return $is_sale;
            }

            if ('' !== (string)$product->get_sale_price($context) && $product->get_regular_price($context) > $product->get_sale_price($context)) {
                $is_sale = true;

                if ($product->get_date_on_sale_from($context) && strtotime($product->get_date_on_sale_from($context)->format('Y-m-d H:i:s'), current_time('timestamp', false)) > current_time('timestamp', false)) {
                    $is_sale = false;
                }

                if ($product->get_date_on_sale_to($context) && strtotime($product->get_date_on_sale_to($context)->format('Y-m-d H:i:s'), current_time('timestamp', false)) < current_time('timestamp', false)) {
                    $is_sale = false;
                }
            } else {
                $is_sale = false;
            }

            return $is_sale;
        }

        /**
         * Display Sale Countdown Single Product.
         *
         * @return void
         */
        public function sale_countdown()
        {
            $stock_bar_status = cs_get_option('stockbar_progress');

            // Styles CSS.

            global $post;
            $sales_price_to = get_post_meta($post->ID, '_sale_price_dates_to', true);
            if ($sales_price_to) {
                ?>
                <div class="xpsc-product-coutdown-wrapper">
                    <?php
                    if ($this->is_sale_valid) :
                        ?>
                        <h5 class="teconce-sale-countdown-title"><?php echo esc_html(cs_get_option('countdown_ttl')); ?></h5>
                        <?php
                        // Count Down Timer HTML.
                        $this->countdown_html();
                    endif;

                    if ($stock_bar_status) :
                        // Stock Line HTML.
                       // $this->product_stock_progress_bar();

                    endif;
                    ?>
                </div>
                <?php
            }
        }


        public function sale_countdown_alt()
        {


            ?>
            <div class="xpsc-product-coutdown-wrapper-alt">

                <?php
                // Count Down Timer HTML.
                $this->countdown_html();

                ?>
            </div>
            <?php
        }

        /**
         * Count Down HTML.
         *
         * @return void
         */
        private function countdown_html()
        {
            ob_start();
            global $product, $post;
            $date_format = "Y-m-d";
            $sales_price_to = get_post_meta($post->ID, '_sale_price_dates_to', true);
            if ($sales_price_to) {
                $sale_from_date = date_i18n($date_format, $product->get_date_on_sale_from()->getTimestamp());
                $sale_to_date = date_i18n($date_format, $product->get_date_on_sale_to()->getTimestamp());
            }


            ?>


            <div class="teconce-timer-for-countdown teconce-timer-<?php echo cs_get_option('count_style'); ?> <?php echo cs_get_option('sdw_enable'); ?>">
                <div id="teconcetimer"><?php echo $sale_to_date; ?></div>
            </div>

            <?php
            $html = ob_get_clean();
            echo $html;
        }


        /**
         * Stock Progress Bar.
         *
         * @return String
         */
        private function product_stock_progress_bar()
        {
            global $post;

            $product = wc_get_product($post->ID);
            if (!$product) {
                return false;
            }

            if ((!$product->get_manage_stock()) || (0 == $product->get_stock_quantity())) {
                return '';
            }

            add_filter(
                'woocommerce_get_stock_html',
                function ($html) {
                    return '';
                }
            );
            $total_sales = $product->get_total_sales();
            $stock_left = $product->get_stock_quantity();
            $cs_stock_label = cs_get_option('stockbar_progress_text');

            $percent = (($stock_left / ($total_sales + $stock_left)) * 100) . '%';

            if (false !== strpos($cs_stock_label, '{{quantity}}')) :

                $stock_label = '<h5>' . __(str_replace('{{quantity}}', '<span class="xpsc-stock-number" > ' . $stock_left . ' </span> ', esc_html($cs_stock_label)), XPSC_DOMAIN) . '</h5>';

            else :

                $stock_label = '<h5>' . __('Only<span class="xpsc-stock-number" > ' . $stock_left . ' </span>Items Left in stock!', XPSC_DOMAIN) . '</h5>';

            endif;
            ob_start();
            ?>
            <div class="product-stock-wrapper">
                <?php echo $stock_label; ?>
                <div class="product-stock">
                    <div class="percent" style="width:<?php echo $percent; ?>"></div>
                </div>
            </div>
            <?php
            $html = ob_get_clean();
            echo $html;
        }



        public function nick_store_product_stock_progress_bar(){
            $stock_bar_status = cs_get_option('stockbar_progress');
            if ($stock_bar_status) :
                // Stock Line HTML.
                $this->product_stock_progress_bar();

            endif;
        }

    }


    add_action('plugins_loaded', array('XPSC_Woo_Sale_Countdown', 'init'), 10);
    register_activation_hook(__FILE__, array('XPSC_Woo_Sale_Countdown', 'plugin_activated'));

endif;
