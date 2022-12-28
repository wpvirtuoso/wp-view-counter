<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://profiles.wordpress.org/wpvirtuoso/
 * @since             1.0.0
 * @package           Wp_View_Counter
 *
 * @wordpress-plugin
 * Plugin Name:       View Counter
 * Plugin URI:        https://profiles.wordpress.org/wpvirtuoso/
 * Description:       View counter plugin is used to see the views for a specific page or post
 * Version:           1.0.0
 * Author:            Wp Virtuoso
 * Author URI:        https://profiles.wordpress.org/wpvirtuoso/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-view-counter
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
define( 'WP_VIEW_COUNTER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-view-counter-activator.php
 */
function activate_wp_view_counter() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-view-counter-activator.php';
	Wp_View_Counter_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-view-counter-deactivator.php
 */
function deactivate_wp_view_counter() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-view-counter-deactivator.php';
	Wp_View_Counter_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_view_counter' );
register_deactivation_hook( __FILE__, 'deactivate_wp_view_counter' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-view-counter.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_view_counter() {

	$plugin = new Wp_View_Counter();
	$plugin->run();

}
run_wp_view_counter();
