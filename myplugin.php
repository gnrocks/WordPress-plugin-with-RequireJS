<?php
/*
Plugin Name: Sample Wordpress Plugin with RequireJS
Plugin URI: https://github.com/chrisjhoughton/WordPress-plugin-with-RequireJS
Description: A useful template for creating a Wordpress plugin with RequireJS
Version: 1.0
Author: Chris Houghton
Author URI: https://github.com/chrisjhoughton
License: GPL
*/

// Set constants
define( 'MY_PLUGIN_NAME', 'FB Social Reader Beta');
define( 'MY_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define( 'MY_PLUGIN_VERSION', '1.0' );
define( 'MY_PLUGIN_PATH', plugin_dir_path(__FILE__ ));


// Include the controllers
include_once ('controller.php');


// Create the controller - this is what runs everything else
$fbOgAction = new My_Plugin_Controller;

// Activation hooks (can't go in the model construct for some reason - I think they run before the model is created)
register_activation_hook( __FILE__, array('My_Plugin_Model', 'install'));
register_activation_hook( __FILE__, array('My_Plugin_Model', 'activate'));
register_deactivation_hook( __FILE__, array('My_Plugin_Model', 'deactivate'));
register_uninstall_hook( __FILE__, array('My_Plugin_Model', 'uninstall'));	




?>