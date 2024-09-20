<?php

if( ! defined( 'ABSPATH' ) ) exit(); // Exit if accessed directly

if ( !class_exists( 'Teconce_Elementor_Addons_Assests' ) ) {

    class Teconce_Elementor_Addons_Assests{

        /**
         * [$_instance]
         * @var null
         */
        private static $_instance = null;

        /**
         * [instance] Initializes a singleton instance
         * @return [Teconce_Elementor_Addons_Assests]
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        /**
         * [__construct] Class construcotr
         */
        public function __construct(){

            // Register Scripts
            add_action( 'wp_enqueue_scripts', [ $this, 'register_assets' ] );
            add_action( 'admin_enqueue_scripts', [ $this, 'register_assets' ] );


            add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

        }

        /**
         * All available styles
         *
         * @return array
         */
        public function get_styles() {

            $style_list = [

                'teconce-main-css' => [
                    'src'     => TECONCE_PL_ASSETS . 'css/teconce-elementor.css',
                    'version' => 1.1
                ],
                
            ];
            return $style_list;

        }

        /**
         * All available scripts
         *
         * @return array
         */
        public function get_scripts(){


            $script_list = [

                'teconce-main-js' => [
                    'src'     => TECONCE_PL_ASSETS . 'js/teconce-elementor.js',
                    'version' => 1.1,
                    'deps'    => [ 'jquery' ]
                ],
                
                'teconce-flickcity-js' => [
                    'src'     => TECONCE_PL_ASSETS . 'js/teconce-editor-flickcity.js',
                    'version' => 1.1,
                    'deps'    => [ 'jquery' ]
                ],
                
                  'teconce-parallax-js' => [
                    'src'     => TECONCE_PL_ASSETS . 'js/teconce-parallax.js',
                    'version' => 1.1,
                    'deps'    => [ 'jquery' ]
                ],
                

            ];

        

            return $script_list;

        }

        /**
         * Register scripts and styles
         *
         * @return void
         */
        public function register_assets() {
            $scripts = $this->get_scripts();
            $styles  = $this->get_styles();

            // Register Scripts
            foreach ( $scripts as $handle => $script ) {
                $deps = ( isset( $script['deps'] ) ? $script['deps'] : false );
                wp_register_script( $handle, $script['src'], $deps, $script['version'], false );
            }

            // Register Styles
            foreach ( $styles as $handle => $style ) {
                $deps = ( isset( $style['deps'] ) ? $style['deps'] : false );
                wp_register_style( $handle, $style['src'], $deps, $style['version'] );
            }

            
            
        }


       

        /**
         * [enqueue_scripts]
         * @return [void] Frontend Scripts
         */
        public function enqueue_scripts(){

            // CSS
            wp_enqueue_style( 'teconce-main-css' );
            

            // JS
            wp_enqueue_script( 'teconce-main-js' );
            
            
              wp_enqueue_script( 'teconce-flickcity-js' );
              
               wp_enqueue_script( 'teconce-parallax-js' );
            
          

        }

    }

    Teconce_Elementor_Addons_Assests::instance();

}