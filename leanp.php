<?php namespace NolteResourceCenterPlugin;
/**
 * Plugin Name: Nolte Resource Center Plugin
 * Description: Plugin for Resource Center
 * Version: 0.1.0
 * Author: Nolte
 * Author URI: http://getmoxied.net
 * Text Domain: nolte-resource-center
 */

// General constants.
define( 'NOLTERESOURCECENTERPLUGIN_PLUGIN_NAME', 'NolteResourceCenterPlugin Plugin' );
define( 'NOLTERESOURCECENTERPLUGIN_PLUGIN_VERSION', '0.1.0' );
define( 'NOLTERESOURCECENTERPLUGIN_MINIMUM_WP_VERSION', '4.3.1' );
define( 'NOLTERESOURCECENTERPLUGIN_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'NOLTERESOURCECENTERPLUGIN_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'NOLTERESOURCECENTERPLUGIN_TEXT_DOMAIN', 'nolteresourcecenterplugin' );

// Load Composer autoloader.
require_once NOLTERESOURCECENTERPLUGIN_PLUGIN_DIR . 'vendor/autoload.php';

// Run the plugin setup.
require_once NOLTERESOURCECENTERPLUGIN_PLUGIN_DIR . 'PluginSetup.php';
$class_name = __NAMESPACE__ . '\\PluginSetup';
register_activation_hook( __FILE__, array( $class_name, 'maybe_deactivate' ) );
register_deactivation_hook( __FILE__, array( $class_name, 'flush_rewrite_rules' ) );
add_action( 'init', array( $class_name, 'check_dependencies' ) );
$class_name::init();
