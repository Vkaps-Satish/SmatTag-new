<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       geeksperhour.com
 * @since      1.0.0
 *
 * @package    Twillo_api_int
 * @subpackage Twillo_api_int/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Twillo_api_int
 * @subpackage Twillo_api_int/admin
 * @author     geeksperhour <gaurav@vkaps.com>
 */

// require_once( '/var/www/html/idtag.com/wp-content/plugins/twillo_api_int/twilio/twillo-php-master/src/Twillo/autoload.php');
// echo __DIR__ . '../twilio/twillo-php-master/vendor/autoload.php'; die();
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/twillo_api_int/lib/twilio-php-master/src/Twilio/autoload.php');

use Twilio\Rest\Client;

class Twillo_api_int_Admin {

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
		 * defined in Twillo_api_int_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Twillo_api_int_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/twillo_api_int-admin.css', array(), $this->version, 'all' );

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
		 * defined in Twillo_api_int_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Twillo_api_int_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/twillo_api_int-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 *  Register the administration menu for this plugin into the WordPress Dashboard
	 * @since    1.0.0
	 */

	public function add_twillo_admin_setting() {

	    /*
	     * Add a settings page for this plugin to the Settings menu.
	     *
	     * Administration Menus: http://codex.wordpress.org/Administration_Menus
	     *
	     */
	    add_options_page( 'Twillo SMS page', 'Twillo', 'manage_options', $this->plugin_name, array($this, 'display_twillo_settings_page')
	    );
	}

	/**
	 * Render the settings page for this plugin.( The html file )
	 *
	 * @since    1.0.0
	 */

	public function display_twillo_settings_page() {
	    include_once( 'partials/twillo_api_int-admin-display.php' );
	}


	/**
	 * Registers and Defines the necessary fields we need.
	 *
	 */
	public function twillo_admin_settings_save(){

	    register_setting( $this->plugin_name, $this->plugin_name, array($this, 'plugin_options_validate') );

	    add_settings_section('twillo_main', 'Main Settings', array($this, 'twillo_section_text'), 'twillo-settings-page');

	    add_settings_field('sender_id', 'From Sender Id', array($this, 'twillo_setting_senderMobileNumber'), 'twillo-settings-page', 'twillo_main');

	    add_settings_field('api_sid', 'API SID', array($this, 'twillo_setting_sid'), 'twillo-settings-page', 'twillo_main');

	    add_settings_field('api_auth_token', 'API AUTH TOKEN', array($this, 'twillo_setting_token'), 'twillo-settings-page', 'twillo_main');
	}

	/**
	 * Displays the settings sub header
	 *
	 */
	public function twillo_section_text() {
	    echo '<h3>Edit api details</h3>';
	} 

	/**
	 * Renders the Sender Mobile Number input field
	 *
	 */
	public function twillo_setting_senderMobileNumber() {

	   $options = get_option($this->plugin_name);
	   echo "<input id='plugin_text_string' name='$this->plugin_name[sender_id]' size='40' type='text' value='{$options['sender_id']}' />";
	}   
	
	/**
	 * Renders the sid input field
	 *
	 */
	public function twillo_setting_sid() {

	   $options = get_option($this->plugin_name);
	   echo "<input id='plugin_text_string' name='$this->plugin_name[api_sid]' size='40' type='text' value='{$options['api_sid']}' />";
	}   

	/**
	 * Renders the auth_token input field
	 *
	 */
	public function twillo_setting_token() {
	   $options = get_option($this->plugin_name);
	   echo "<input id='plugin_text_string' name='$this->plugin_name[api_auth_token]' size='40' type='text' value='{$options['api_auth_token']}' />";
	}

	/**
	 * Sanitises all input fields.
	 *
	 */
	public function plugin_options_validate($input) {
	    $newinput['sender_id'] = trim($input['sender_id']);
	    $newinput['api_sid'] = trim($input['api_sid']);
	    $newinput['api_auth_token'] = trim($input['api_auth_token']);

	    return $newinput;
	}

	/**
	* Register the sms page for the admin area.
	*
	* @since    1.0.0
	*/
	public function register_twillo_sms_page() {
	  // Create our settings page as a submenu page.
	    add_submenu_page(
            'tools.php',                                         // parent slug
            __( 'Twillo SMS PAGE', $this->plugin_name.'-sms' ), // page title
            __( 'Twillo', $this->plugin_name.'-sms' ),         // menu title
            'manage_options',                                 // capability
            $this->plugin_name.'-sms',                       // menu_slug
            array( $this, 'display_twillo_sms_page' )       // callable function
	    );
	}

	/**
	* Display the sms page - The page we are going to be sending message from.
	*
	* @since    1.0.0
	*/

	public function display_twillo_sms_page() {
	   include_once( 'partials/twillo_api_int-admin-sms.php' );
	}


	public function send_message(){

		if( !isset($_POST['send_sms_message']) ){ return; }

		$to        = (isset($_POST['numbers']) ) ? $_POST['numbers'] : '';
		$sender_id = (isset($_POST['sender']) )  ? $_POST['sender']  : '';
		$message   = (isset($_POST['message']) ) ? $_POST['message'] : '';

		//gets our api details from the database.
		$api_details = get_option($this->plugin_name); #sendex is what we use to identify our option, it can be anything
		

        if(is_array($api_details) && count($api_details) != 0) {
            $TWILIO_SID = $api_details['api_sid'];
            $TWILIO_TOKEN = $api_details['api_auth_token'];
        }

        if (empty($sender_id) && is_array($api_details) && count($api_details) != 0) {
        	$sender_id = $api_details['sender_id'];
        }

        try{
        	$to = explode(',', $to);
        	$client = new Client($TWILIO_SID, $TWILIO_TOKEN);
        	$response = $client->messages->create(
                $to ,
                array(
                  'from' => $sender_id,
                 'body' => $message
                )
            );
            self::DisplaySuccess();
        } catch (Exception $e) {
        	self::DisplayError( $e->getMessage() );
        }           
    }

    /**
	 * Designs for displaying Notices
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var $message - String - The message we are displaying
	 * @var $status   - Boolean - its either true or false
	 */
	public static function admin_notice($message, $status = true) {
	    $class =  ($status) ? 'notice notice-success' : 'notice notice-error';
	    $message = __( $message, 'sample-text-domain' );

	     printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
	}

	/**
	 * Displays Error Notices
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	public static function DisplayError($message = "Aww!, there was an error.") {
	    add_action( 'admin_notices', function() use($message) {
	    self::admin_notice($message, false);
	    } );
	}

	/**
	 * Displays Success Notices
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	public static function DisplaySuccess($message = "Successful!") {
	    add_action( 'admin_notices', function() use($message) {
	    self::admin_notice($message, true);
	    } );
	}
}
