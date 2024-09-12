<?php

defined( 'ABSPATH' ) || exit;

class Replace_Variable_Price_With_Active_Variation_Price {

    /**
     * The main plugin file.
     *
     * This property holds the path to the main plugin file. It is used to define
     * plugin constants and for registering activation and deactivation hooks.
     *
     * @var string
     */
    public string $file;

    /**
     * The version of the plugin.
     *
     * This property holds the version number of the plugin. It is used to define
     * the plugin version constant and can be used for version-specific logic within
     * the plugin.
     *
     * @var string
     */
    public string $version;
    /**
     * Constructor for the Replace_Variable_Price_With_Active_Variation_Price class.
     *
     * Initializes the plugin by setting file and version properties, defining constants,
     * and initializing hooks. It also registers activation and deactivation hooks for
     * the plugin.
     *
     * @param string $file The main plugin file.
     * @param string $version The version of the plugin (default is "1.0.0").
     *
     * @since 1.0.0
     */
    public function __construct($file, $version = "1.0.0") {
        $this->file = $file;
        $this->version = $version;
        $this->define_constants();
        $this->init_hooks();

        register_activation_hook( $this->file, array( $this, 'activation_hook' ) );
        register_deactivation_hook( $this->file, array( $this, 'deactivation_hook' ) );
    }
    /**
     * Defines constants used by the plugin.
     *
     * Sets up constants for version, file path, plugin directory, URL, and basename
     * for easier reference throughout the plugin.
     *
     * @since 1.0.0
     */
    public function define_constants() {
        define( 'RVPWAVP_VERSION', $this->version );
        define( 'RVPWAVP_FILE', $this->file );
        define( 'RVPWAVP_PLUGIN_DIR', plugin_dir_path( $this->file ) );
        define( 'RVPWAVP_PLUGIN_URL', plugin_dir_url( $this->file ) );
        define( 'RVPWAVP_PLUGIN_BASENAME', plugin_basename( $this->file ) );
    }
    /**
     * Initializes the plugin by creating an instance of the admin class.
     *
     * Sets up the admin interface for the plugin.
     *
     * @since 1.0.0
     */
    public function init() {
        new Replace_Variation_Price_With_Active_Variation_Price_Admin();
    }
    /**
     * Activation hook for the plugin.
     *
     * This method is called when the plugin is activated. It can be used to
     * perform tasks such as creating database tables or setting up options.
     *
     * @since 1.0.0
     */
    public function activation_hook() {

    }
    /**
     * Deactivation hook for the plugin.
     *
     * This method is called when the plugin is deactivated. It can be used to
     * perform cleanup tasks such as removing options or flushing rewrite rules.
     *
     * @since 1.0.0
     */
    public function deactivation_hook() {

    }
    /**
     * Initializes hooks for the plugin.
     *
     * Adds actions for loading plugin textdomain and initializing the plugin.
     *
     * @since 1.0.0
     */
    public function init_hooks() {
        add_action('plugins_loaded', array($this, 'load_plugin_textdomain'));
        add_action('init', array($this, 'init'));
    }

    /**
     * Loads the plugin textdomain for translations.
     *
     * This method loads the language files for the plugin, making it available
     * for translation and localization.
     *
     * @since 1.0.0
     */

    public function load_plugin_textdomain() {
        load_plugin_textdomain('replace-variable-price-with-active-variation', false, basename(dirname(__FILE__)) . '/languages/');
    }
}
