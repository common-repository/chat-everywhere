<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://codingfix.com
 * @since             1.0.0
 * @package           Chat_Everywhere
 *
 * @wordpress-plugin
 * Plugin Name:       Chat Everywhere
 * Plugin URI:        https://codingfix.com/chat-everywhere
 * Description:       Open a new chat using every html element you wish: standard buttons, textual links, images, divs and so on just adding them a css class.
 * Version:           1.2.3
 * Author:            Marco Gasi -  Codingfix
 * Author URI:        https://codingfix.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       chat-everywhere
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CHAT_EVERYWHERE_VERSION', '1.2.3' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-chat-everywhere-activator.php
 */
function activate_chat_everywhere() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-chat-everywhere-activator.php';
	Chat_Everywhere_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-chat-everywhere-deactivator.php
 */
function deactivate_chat_everywhere() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-chat-everywhere-deactivator.php';
	Chat_Everywhere_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_chat_everywhere' );
register_deactivation_hook( __FILE__, 'deactivate_chat_everywhere' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-chat-everywhere.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_chat_everywhere() {

	$plugin = new Chat_Everywhere();
	$plugin->run();

}
run_chat_everywhere();
