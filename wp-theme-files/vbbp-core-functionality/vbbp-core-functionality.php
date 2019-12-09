<?php
/**
 * Plugin Name: VBBP Core Functionality
 * Description: This contains all your site's core functionality so that it is theme independent. <strong>It should always be activated.</strong>
 * Author: The Childress Agency
 * Author URI: https://childressagency.com
 * Version: 1.0
 * Text Domain: vbbp
 */
if(!defined('ABSPATH')){ exit; }

define('VBBP_PLUGIN_DIR', dirname(__FILE__));
define('VBBP_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Load ACF if not already loaded
 */
if(!class_exists('acf')){
  require_once VBBP_PLUGIN_DIR . '/vendors/advanced-custom-fields-pro/acf.php';
  add_filter('acf/settings/path', 'vbbp_acf_settings_path');
  add_filter('acf/settings/dir', 'vbbp_acf_settings_dir');
}

function vbbp_acf_settings_path($path){
  $path = plugin_dir_path(__FILE__) . 'vendors/advanced-custom-fields-pro/';
  return $path;
}

function vbbp_acf_settings_dir($dir){
  $dir = plugin_dir_url(__FILE__) . 'vendors/advanced-custom-fields-pro/';
  return $dir;
}

add_action('plugins_loaded', 'vbbp_load_textdomain');
function vbbp_load_textdomain(){
  load_plugin_textdomain('vbbp', false, basename(VBBP_PLUGIN_DIR) . '/languages');
}
