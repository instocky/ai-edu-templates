<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://site.com/author
 * @since      1.0.0
 *
 * @package    Ai_Edu_Templates
 * @subpackage Ai_Edu_Templates/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ai_Edu_Templates
 * @subpackage Ai_Edu_Templates/includes
 * @author     Ai Dev <aidev@site.com>
 */
class Ai_Edu_Templates_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ai-edu-templates',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
