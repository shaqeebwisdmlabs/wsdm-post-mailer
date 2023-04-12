<?php

/**
 * Fired during plugin activation
 *
 * @link       https://shaqeeb.com
 * @since      1.0.0
 *
 * @package    Wsdm_Post_Mailer
 * @subpackage Wsdm_Post_Mailer/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wsdm_Post_Mailer
 * @subpackage Wsdm_Post_Mailer/includes
 * @author     Shaqeeb Akhtar <shaqeeb.akhtar@wisdmlabs.com>
 */
class Wsdm_Post_Mailer_Activator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate()
	{
		// if (!wp_next_scheduled('wsdm_daily_post_email_cron')) {
		// 	wp_schedule_event(time(), 'daily', 'wsdm_daily_post_email_cron');
		// }
	}
}
