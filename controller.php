<?php
/*
* The controller file. Used to interface between front-end and the back-end
*
*/


class My_Plugin_Controller {


  
  // Kick things off with a bang
  function __construct() {

    // Enqueue RequireJS
    add_action('wp_enqueue_scripts', array($this, 'add_myplugin_scripts'));
    add_filter( 'clean_url', array($this, 'fix_requirejs_script'), 11, 1 );

    // Create admin menu
    add_action( 'admin_menu', array($this, 'admin_create_menu'));

  }
  
  // Enqueue scripts front-end
  function add_myplugin_scripts() {
    wp_enqueue_script('require', MY_PLUGIN_URL . 'js/lib/require.js', false, MY_PLUGIN_VERSION);
    wp_localize_script( 'require', '_sr_ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
  }

  /*
    Add on 'data-main' to load the main file asynchronously
      - If ?rq_debug is in the url, then load the app file (requires in scripts dynamically)
      - If ?rq_debug not in url, then load minified plugin
  */
  function fix_requirejs_script( $url ) {
      if ( strpos ($url, 'js/lib/require.js') ) { 
        if (isset($_GET['rq_debug'])) {
          return "$url' data-main='".MY_PLUGIN_URL."js/app";
        } else {
          return "$url' data-main='".MY_PLUGIN_URL."js/myplugin.min";
        }          
      } else {
        return $url;
      }
  }

  
  // Admin: Create menu
  function admin_create_menu() {
    add_menu_page("", "RequireJS", 'administrator', 'myplugin-require-settings', array($this, 'admin_settings')); 
  }
  
  // Admin: the settings page\
  function admin_settings() {
    include(MY_PLUGIN_PATH.'/admin-settings.php');
  }
  
  
  

  
}

?>