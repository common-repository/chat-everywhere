<?php

/**
 * Fired during plugin activation
 *
 * @link       https://codingfix.com
 * @since      1.0.0
 *
 * @package    Chat_Everywhere
 * @subpackage Chat_Everywhere/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Chat_Everywhere
 * @subpackage Chat_Everywhere/includes
 * @author     Marco Gasi -  Codingfix <codingfix@codingfix.com>
 */
class Chat_Everywhere_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$defaults = array(
			'phone_number' => "",
			'whatsapp_class_name' => "whatsapp_everywhere",
			'telegram_class_name' => "telegram_everywhere",
			'telegram_user_name' => "",
			'message_text' => "Hello. I'd like to get some more information, thank you.",
			'version' => "1.0.0",
		);
		$options = get_option('cfxchat_options', array());
		$options_to_store = array_merge($defaults, $options);
		update_option('cfxchat_options', $options_to_store);

	}

}
