<?php
/**
 * Plugin Name:       Poll Plugin
 * Description:       The block enables you to make a poll.
 * Version:           0.1.0
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Author:            @cgarza1992
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       poll-plugin
 *
 * @package           poll-plugin
 */

 namespace PollPlugin;

// Include the main plugin class.
require_once plugin_dir_path( __FILE__ ) . 'includes/class-poll-setup.php';

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function poll_plugin_block_init() {
	register_block_type( __DIR__ . '/build' );
}

// Register the autoloader function.
spl_autoload_register( function( $class_name ) {
    // Check if the class belongs to the plugin's namespace.
    if ( 0 !== strpos( $class_name, __NAMESPACE__ ) ) {
        return;
    }

    // Convert the class name to a file path.
    $file_path = str_replace( '\\', DIRECTORY_SEPARATOR, $class_name );
    $file_path = str_replace( __NAMESPACE__ . DIRECTORY_SEPARATOR, '', $file_path );

    // Define the full file path.
    $file_path = plugin_dir_path( __FILE__ ) . 'includes/' . $file_path . '.php';

    // Include the file if it exists.
    if ( file_exists( $file_path ) ) {
        require_once $file_path;
    }
} );

// Register the block.
add_action( 'init', 'PollPlugin\poll_plugin_block_init' );

// Initialize the plugin.
add_action( 'plugins_loaded', function() {
    if ( class_exists( 'PollPlugin\Poll_Setup' ) ) {
        new Poll_Setup;
		return;
    }
} );
