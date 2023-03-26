<?php 
/**
 * Plugin Name: Reaction Button
 * Description: Reaction button is a lightweight plugin that adds customizable reaction button to your WordPress posts and pages. Users can quickly and easily react to your content with their favorite emojis, adding a fun and engaging way to interact with your site.
 * Plugin URI: https://reaction-button.com
 * Author: MD Shakibul Islam
 * Author URI: https://github.com/shuvo247/
 * Version: 1.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Require autoload files
require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */
final class EXAM_Reaction_Button {

    /**
     * Plugin version
     *
     * @var string
     */
    const version = '1.0';

    /**
     * The class constructor
     */
    private function __construct() {
        $this->define_constants();

        register_activation_hook( __FILE__, [ $this, 'activate' ] );

        register_deactivation_hook( __FILE__, [ $this, 'deactive' ] );

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );

    }

    /**
     * Initializes a singleton instance
     *
     * @return \EXAM_Reaction_Button
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants() {
        define( 'EXAM_REACTION_BUTTON_VERSION', self::version );
        define( 'EXAM_REACTION_BUTTON_FILE', __FILE__ );
        define( 'EXAM_REACTION_BUTTON_PATH', __DIR__ );
        define( 'EXAM_REACTION_BUTTON_URL', plugins_url( '', EXAM_REACTION_BUTTON_FILE ) );
        define( 'EXAM_REACTION_BUTTON_ASSETS', EXAM_REACTION_BUTTON_URL . '/assets' );
        define( 'EXAM_REACTION_BUTTON_PATH_INCLUDES', EXAM_REACTION_BUTTON_PATH . '/includes' );
        define( 'EXAM_REACTION_BUTTON_PATH_FRONTEND', EXAM_REACTION_BUTTON_PATH_INCLUDES . '/frontend' );
        define( 'EXAM_REACTION_BUTTON_PATH_ADMIN', EXAM_REACTION_BUTTON_PATH_INCLUDES . '/admin' );
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin() {

        new Exam\Reaction\Button\Assets();

        new Exam\Reaction\Button\Frontend();

        if( is_admin() ) {
            new Exam\Reaction\Button\Admin();
        }

        if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
            new Exam\Reaction\Button\Ajax();
        }
    }

    /**
     * Do something while activating plugin
     *
     * @return void
     */
    public function activate() {
        $installer = new Exam\Reaction\Button\Installer();
        $installer->activate();
    }

    /**
     * Do something while deactivating plugin
     *
     * @return void
     */
    public function deactive() {
        $installer = new Exam\Reaction\Button\Installer();
        $installer->deactivate();
    }

}

/**
 * Initializes the main plugin
 *
 * @return \EXAM_Reaction_Button
 */
function exam_reaction_button() {
    return EXAM_Reaction_Button::init();
}

// kick-off the plugin
exam_reaction_button();
