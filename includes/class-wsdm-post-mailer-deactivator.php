<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://shaqeeb.com
 * @since      1.0.0
 *
 * @package    Wsdm_Post_Mailer
 * @subpackage Wsdm_Post_Mailer/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Wsdm_Post_Mailer
 * @subpackage Wsdm_Post_Mailer/includes
 * @author     Shaqeeb Akhtar <shaqeeb.akhtar@wisdmlabs.com>
 */
class Wsdm_Post_Mailer_Deactivator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate()
	{
		$timestamp = wp_next_scheduled('wsdm_daily_post_email_cron');
		if ($timestamp) {
			wp_unschedule_event($timestamp, 'wsdm_daily_post_email_cron');
		}
	}
}
