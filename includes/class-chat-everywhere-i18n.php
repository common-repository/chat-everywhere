<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://codingfix.com
 * @since      1.0.0
 *
 * @package    Chat_Everywhere
 * @subpackage Chat_Everywhere/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Chat_Everywhere
 * @subpackage Chat_Everywhere/includes
 * @author     Marco Gasi -  Codingfix <codingfix@codingfix.com>
 */
class Chat_Everywhere_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'chat-everywhere',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
