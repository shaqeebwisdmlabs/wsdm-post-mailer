<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://shaqeeb.com
 * @since      1.0.0
 *
 * @package    Wsdm_Post_Mailer
 * @subpackage Wsdm_Post_Mailer/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wsdm_Post_Mailer
 * @subpackage Wsdm_Post_Mailer/admin
 * @author     Shaqeeb Akhtar <shaqeeb.akhtar@wisdmlabs.com>
 */
class Wsdm_Post_Mailer_Admin
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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wsdm_Post_Mailer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wsdm_Post_Mailer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wsdm-post-mailer-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wsdm_Post_Mailer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wsdm_Post_Mailer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/wsdm-post-mailer-admin.js', array('jquery'), $this->version, false);
	}

	public function wsdm_daily_post_email()
	{
		$headers = array(
			'From:  shaqeeb.akhtar@wisdmlabs.com',
			'Content-Type: text/html'
		);
		$admin_email = get_option('admin_email');
		$subject = 'All Posts Published Today';

		$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'date_query' => array(
				array(
					'after' => '1 day ago',
					'inclusive' => true,
				),
			),
		);
		$query = new WP_Query($args);

		$message = 'The following posts have been published in the last day:' . "\n";
		while ($query->have_posts()) {
			$query->the_post();
			$message .= '----------' . "\n";
			$message .= 'Title: ' . get_the_title() . "\n";
			$message .= 'URL: ' . get_permalink() . "\n";
			$message .= 'Meta Title: ' . get_post_meta(get_the_ID(), '_yoast_wpseo_title', true) . "\n";
			$message .= 'Meta Description: ' . get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true) . "\n";
			$message .= 'Meta Keywords: ' . get_post_meta(get_the_ID(), '_yoast_wpseo_focuskw', true) . "\n";
		}


		// send email
		$sent = wp_mail($admin_email, $subject, $message, $headers);
	}

	public function wsdm_page_speed_score($page_url)
	{
		$api_key = "416ca0ef-63e4-4caa-a047-ead672ecc874";
		$api_url = "http://www.webpagetest.org/runtest.php?url=" . $page_url . "&runs=1&f=xml&k=" . $api_key;

		// API request
		$response = wp_remote_get($api_url);

		if (is_wp_error($response)) {
			$error_message = $response->get_error_message();
		} else {
			$response_body = wp_remote_retrieve_body($response);
		}
	}
}
