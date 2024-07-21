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
 * Version:           0.7.21.19
 * Author:            Ai Dev
 * Author URI:        https://site.com/author/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ai-edu-templates
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 0.7.21.19 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('AI_EDU_TEMPLATES_VERSION', '0.7.21.19');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ai-edu-templates-activator.php
 */
function activate_ai_edu_templates()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-ai-edu-templates-activator.php';
	Ai_Edu_Templates_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ai-edu-templates-deactivator.php
 */
function deactivate_ai_edu_templates()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-ai-edu-templates-deactivator.php';
	Ai_Edu_Templates_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_ai_edu_templates');
register_deactivation_hook(__FILE__, 'deactivate_ai_edu_templates');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-ai-edu-templates.php';

add_action('admin_menu', 'ai_edu_templates_menu');

/**
 * Adds a menu item for AI Education Templates in the WordPress admin panel.
 *
 * This function creates a new top-level menu item in the WordPress admin panel
 * for managing AI Education Templates settings.
 *
 * @since    0.7.21.19
 */
function ai_edu_templates_menu()
{
	// $title = 'Настройки AI Education Templates'; // Текст всплывающей подсказки
	add_menu_page(
		'Настройки AI Education Templates', // Заголовок страницы
		'AI Edu Templates', // Название в меню
		'manage_options', // Способности пользователя
		'ai-edu-templates-settings', // Слаг страницы
		'ai_edu_templates_settings_page', // Функция для отображения содержимого
		'dashicons-book', // Иконка меню
		77 // Позиция в меню
	);
}

add_action('admin_footer', 'ai_edu_templates_menu_title_script');

/**
 * Adds a tooltip to the AI Education Templates menu item.
 *
 * This function injects a small JavaScript snippet into the admin footer
 * to add a custom tooltip to the AI Education Templates menu item.
 *
 * @since    0.7.21.19
 */
function ai_edu_templates_menu_title_script()
{
?>
	<script type="text/javascript">
		document.addEventListener('DOMContentLoaded', function() {
			var menuItem = document.querySelector('#toplevel_page_ai-edu-templates-settings');
			if (menuItem) {
				var link = menuItem.querySelector('a.menu-top');
				if (link) {
					link.setAttribute('title', 'Настройки AI Education Templates+');
				}
			}
		});
	</script>
<?php
}

/**
 * Renders the settings page for AI Education Templates.
 *
 * This function is responsible for displaying the content of the
 * AI Education Templates settings page in the WordPress admin panel.
 *
 * @since    0.7.21.19
 */
function ai_edu_templates_settings_page()
{
?>
	<div class="wrap">
		<h1>Настройки AI Education Templates</h1>
		<form method="post" action="options.php">
			<?php
			settings_fields('ai_edu_templates_settings_group');
			do_settings_sections('ai-edu-templates-settings');
			submit_button();
			?>
		</form>
	</div>
<?php
}

add_action('admin_init', 'ai_edu_templates_settings');

/**
 * Initializes the settings for AI Education Templates.
 *
 * This function registers the settings, sections, and fields
 * for the AI Education Templates plugin options.
 *
 * @since    0.7.21.19
 */
function ai_edu_templates_settings()
{
	register_setting('ai_edu_templates_settings_group', 'ai_edu_templates_option');
	add_settings_section('ai_edu_templates_section', 'Основные настройки', null, 'ai-edu-templates-settings');
	add_settings_field('ai_edu_templates_field', 'Название поля', 'ai_edu_templates_field_callback', 'ai-edu-templates-settings', 'ai_edu_templates_section');
}

/**
 * Callback function for rendering the AI Education Templates setting field.
 *
 * This function outputs the HTML for the setting field in the
 * AI Education Templates settings page.
 *
 * @since    0.7.21.19
 */
function ai_edu_templates_field_callback()
{
	$value = get_option('ai_edu_templates_option');
	echo '<input type="text" name="ai_edu_templates_option" value="' . esc_attr($value) . '" />';
}


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.7.21.19
 */
function run_ai_edu_templates()
{

	$plugin = new Ai_Edu_Templates();
	$plugin->run();
}
run_ai_edu_templates();
