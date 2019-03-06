<?php
/**
 * Core plugin file 
 * 
 * This file consists of processes such as 
 * load_dependencies, set_locale, define_admin_hooks, define_public_hooks,
 * library_default_plugin_values, get_plugin_name, get_loader, get_version
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 *
 * @link       https://jsadang.wordpress.com
 * @since      1.0.0
 * @package    Sadang_Library_Management
 * @subpackage Sadang_Library_Management/includes
 * @author     Jack Henry Sadang <jackhenrysadang22@gmail.com>
 * 
 */

class Library_Core {

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      Library_Loader    $loader    Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $plugin_name    The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $version    The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct() {
        if (defined('PLUGIN_NAME_VERSION')) {
            $this->version = PLUGIN_NAME_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'sadang-library-management';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Library_Loader. Orchestrates the hooks of the plugin.
     * - Library_i18n. Defines internationalization functionality.
     * - Library_Admin. Defines all hooks for the admin area.
     * - Library_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies() {

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/Library-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/Library-i18n.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/Library-admin.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/Library-public.php';

        $this->loader = new Library_Loader();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Library_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function set_locale() {

        $plugin_i18n = new Library_i18n();

        $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_admin_hooks() {

        $plugin_admin = new Library_Admin($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'library_enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'library_enqueue_scripts');
        $this->loader->add_action('admin_menu', $plugin_admin, 'library_admin_menus');
        $this->loader->add_action('admin_notices', $plugin_admin, 'library_free_version_rules');
        $this->loader->add_action('wp_ajax_lib_handler', $plugin_admin, 'library_ajax_handler');
        $this->loader->add_filter("plugin_action_links_" . PLUGIN_BASEPATH, $plugin_admin, 'library_settings_link');
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_public_hooks() {

        $plugin_public = new Library_Public($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run() {
        $this->loader->run();
        self::library_default_plugin_values();
    }

    /*
     * plugin custom settings
     */

    public function library_default_plugin_values() {
        $country_code = get_option('lib_country_setup');
        if (empty($country_code)) {
            update_option("lib_country_setup", 173); // default for Philippines
        }
        $late_fine = get_option('lib_book_late_fine'); 
        if (empty($late_fine)) {
            update_option("lib_book_late_fine", 10); // default late fine
        }
        $currency_code = get_option('lib_currency_code');
        if (empty($currency_code)) {
            update_option("lib_currency_code", "PH"); // default currency code
        }
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     1.0.0
     * @return    string    The name of the plugin.
     */
    public function get_plugin_name() {
        return $this->plugin_name;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since     1.0.0
     * @return    Library_Loader    Orchestrates the hooks of the plugin.
     */
    public function get_loader() {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     1.0.0
     * @return    string    The version number of the plugin.
     */
    public function get_version() {
        return $this->version;
    }

}
