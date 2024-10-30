<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://codingfix.com
 * @since      1.0.0
 *
 * @package    Chat_Everywhere
 * @subpackage Chat_Everywhere/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Chat_Everywhere
 * @subpackage Chat_Everywhere/admin
 * @author     Marco Gasi -  Codingfix <codingfix@codingfix.com>
 */
class Chat_Everywhere_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/chat-everywhere-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/chat-everywhere-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function cfxchat_admin_init()
	{

	}

	/**
	 * Register the Settings page.
	 *
	 * @since    1.0.0
	 */
	public function cfxchat_admin_menu()
	{
		add_options_page(__('Chat Everywhere Options', $this->plugin_name), __('Chat Everywhere Options', $this->plugin_name), 'manage_options', 'chat-everywhere-settings', array($this, 'display_plugin_admin_page'));
	}


	/**
	 * Callback function for the admin settings page.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_admin_page()
	{
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/chat-everywhere-admin-display.php';
	}

	public function process_cfxchat_options()
	{
	  $options = get_option('cfxchat_options');
	  if (!current_user_can('manage_options'))
		wp_die('Not allowed');
	  check_admin_referer('cfxchat');
  
	  if (isset($_POST['whatsapp_class_name'])) {
		$options['whatsapp_class_name'] = sanitize_text_field($_POST['whatsapp_class_name']);
	  }
  
	  if (isset($_POST['telegram_class_name'])) {
		$options['telegram_class_name'] = sanitize_text_field($_POST['telegram_class_name']);
	  }
  
	  if (isset($_POST['telegram_user_name'])) {
		$options['telegram_user_name'] = sanitize_text_field($_POST['telegram_user_name']);
	  }
  
	  if (isset($_POST['phone_number'])) {
		$options['phone_number'] = sanitize_text_field($_POST['phone_number']);
	  }
  
	  if (isset($_POST['message_text'])) {
		$options['message_text'] = sanitize_text_field($_POST['message_text']);
	  }
	  update_option('cfxchat_options', $options);
	  wp_redirect(add_query_arg(array('page' => 'chat-everywhere-settings', 'message' => '1'), admin_url('options-general.php')));
	  exit;
	}

	/**
	 * Add a links near Deactivate link in the plugin list 
	 */
	public function add_action_links( $links ) {
		/*
		*  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
		*/
	   $settings_link = array(
		'<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '-settings">' . __('Settings', $this->plugin_name) . '</a>',
	   );
	   return array_merge(  $settings_link, $links );
	
	}


}
