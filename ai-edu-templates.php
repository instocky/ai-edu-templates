<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://site.com/author
 * @since             1.0.0
 * @package           Ai_Edu_Templates
 *
 * @wordpress-plugin
 * Plugin Name:       AI Edu Templates
 * Plugin URI:        https://site.com
 * Description:       This is a description of the plugin.
 * Version:           1.0.0
 * Author:            Ai Dev
 * Author URI:        https://site.com/author/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ai-edu-templates
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'AI_EDU_TEMPLATES_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ai-edu-templates-activator.php
 */
function activate_ai_edu_templates() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ai-edu-templates-activator.php';
	Ai_Edu_Templates_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ai-edu-templates-deactivator.php
 */
function deactivate_ai_edu_templates() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ai-edu-templates-deactivator.php';
	Ai_Edu_Templates_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ai_edu_templates' );
register_deactivation_hook( __FILE__, 'deactivate_ai_edu_templates' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ai-edu-templates.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ai_edu_templates() {

	$plugin = new Ai_Edu_Templates();
	$plugin->run();

}
run_ai_edu_templates();
