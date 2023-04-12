<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://shaqeeb.com
 * @since      1.0.0
 *
 * @package    Wsdm_Post_Mailer
 * @subpackage Wsdm_Post_Mailer/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wsdm_Post_Mailer
 * @subpackage Wsdm_Post_Mailer/includes
 * @author     Shaqeeb Akhtar <shaqeeb.akhtar@wisdmlabs.com>
 */
class Wsdm_Post_Mailer_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wsdm-post-mailer',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
