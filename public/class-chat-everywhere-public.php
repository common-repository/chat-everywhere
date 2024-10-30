<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://codingfix.com
 * @since      1.0.0
 *
 * @package    Chat_Everywhere
 * @subpackage Chat_Everywhere/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Chat_Everywhere
 * @subpackage Chat_Everywhere/public
 * @author     Marco Gasi -  Codingfix <codingfix@codingfix.com>
 */
class Chat_Everywhere_Public
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Chat_Everywhere_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Chat_Everywhere_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/chat-everywhere-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Chat_Everywhere_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Chat_Everywhere_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script('chat_everywhere_public_js', plugin_dir_url(__FILE__) . 'js/chat-everywhere-public.js', array('jquery'), $this->version, false);

		$options = get_option('cfxchat_options');
		$whatsapp_class_name = isset($options['whatsapp_class_name']) ? $options['whatsapp_class_name'] : 'whatsapp_everywhere';
		$telegram_class_name = isset($options['telegram_class_name']) ? $options['telegram_class_name'] : 'telegram_everywhere';
		$telegram_user_name = isset($options['telegram_user_name']) ? $options['telegram_user_name'] : '';
		$phone_number = $options['phone_number'];
		$message_text = $options['message_text'];
		wp_localize_script(
			'chat_everywhere_public_js',
			'ajax_object',
			array('ajax_url' => admin_url('admin-ajax.php'), 'whatsapp_class_name' => $whatsapp_class_name,  'telegram_class_name' => $telegram_class_name, 'telegram_user_name' => $telegram_user_name, 'phone_number' => $phone_number, 'message_text' => $message_text)
		);
	}
}
