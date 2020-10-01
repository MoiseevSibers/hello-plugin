<?php

/**
 * The plugin bootstrap file
 *
 * @since             1.0.0
 * @package           Hello_World
 *
 * @wordpress-plugin
 * Plugin Name:       Hello World Plugin Test
 * Description:       Displaying "hello world" in console
 * Version:           1.0.0
 * Text Domain:       hello-world
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
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-hello-world-activator.php
 */
function activate_hello_world() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hello-world-activator.php';
	Hello_World_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-hello-world-deactivator.php
 */
function deactivate_hello_world() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hello-world-deactivator.php';
	Hello_World_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_hello_world' );
register_deactivation_hook( __FILE__, 'deactivate_hello_world' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-hello-world.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_hello_world() {

	$plugin = new Hello_World();
	$plugin->run();

}
run_hello_world();
