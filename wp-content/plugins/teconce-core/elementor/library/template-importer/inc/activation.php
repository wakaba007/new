<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class TECONCE_Lib_Activation {

  function __construct() {

    register_activation_hook( TECONCE_ROOT_FILE__,  [ $this, 'init' ] );
  }

  function init(){
    $remote = TECONCE_Lib_Library::$plugin_data["remote_site"];
    $end_point = TECONCE_Lib_Library::$plugin_data["all_endpoint"];
    $library_data = json_decode(wp_remote_retrieve_body(wp_remote_get($remote.'wp-json/wp/v2/'.$end_point)), true);
    update_option( 'teconce_lib_library', $library_data);
  }
}

new TECONCE_Lib_Activation();





