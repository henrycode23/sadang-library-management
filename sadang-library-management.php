<?php

/**
 * Bootstrap plugin file 
 *  - the first piece of code that runs when a plugin starts, and is responsible for loading the rest of the plugin files
 * 
 * This file consists of define constants, activate function, deactivate function,
 * other dependencies and classes that are being called and accessed in this file.
 *
 * @package           Sadang_Library_Management
 * @link              https://jsadang.wordpress.com/
 * @since             1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       Sadang Library Management System
 * Plugin URI:        https://jsadang.wordpress.com
 * Description:       Manages library books, book categorization, borrow or return book and students or staffs recording.
 * Author:            Jack Henry Sadang
 * Author URI:        https://jsadang.wordpress.com/
 * Version:           1.0.0
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sadang-library-management
 * Domain Path:       /languages
 */


if (!defined('ABSPATH')) {
    die;
}

// require plugin_dir_path(__FILE__) . 'config.php';
define('PLUGIN_VERSION', '1.0.0');
define('PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLUGIN_PREFIX', "wp-sadang");
define('PLUGIN_BASEPATH', plugin_basename(__FILE__));
define('PLUGIN_BOOK_LATE_FINE', get_option("late_fine"));
define('PLUGIN_BOOK_CURRENCY', get_option("currency_code"));


// Runs when plugin activates.
function activate_library() {
    require_once plugin_dir_path(__FILE__) . 'includes/Library-activator.php';
    $table_activator = new Library_Activator();
    $table_activator->library_tables_activate();
}

// Runs when plugin deactivates.
function deactivate_library() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-library-deactivator.php';
    $table_deactivator = new Library_Deactivator();
    $table_deactivator->deactivate();
}

// Calling functions
register_activation_hook(__FILE__, 'activate_library');
register_deactivation_hook(__FILE__, 'deactivate_library');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-library-management-system.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */

function run_library_management_system() {

    $plugin = new Library_Management_System();
    $plugin->run();
}

run_library_management_system();

