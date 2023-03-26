<?php

namespace Exam\Reaction\Button;

/**
 * Main Assets handlers class
 */
class Assets {

    /**
     * The Class constructor
     */
    public function __construct() {
        add_action( 'wp_enqueue_scripts', [ $this, 'register_assets' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'register_assets' ] );
    }

    /**
     * All available scripts
     *
     * @return array
     */
    public function get_scripts() {
        return [
            'sweetalert2' => [
                'src'     => EXAM_REACTION_BUTTON_ASSETS . '/js/sweetalert2.js',
                'version' => filemtime( EXAM_REACTION_BUTTON_PATH . '/assets/js/sweetalert2.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'exam-reaction-button-script' => [
                'src'     => EXAM_REACTION_BUTTON_ASSETS . '/js/scripts.js',
                'version' => filemtime( EXAM_REACTION_BUTTON_PATH . '/assets/js/scripts.js' ),
                'deps'    => [ 'jquery' ]
            ],
        ];
    }

    /**
     * All available styles
     *
     * @return array
     */
    public function get_styles() {
        return [
            'sweetalert2' => [
                'src'     => EXAM_REACTION_BUTTON_ASSETS . '/css/sweetalert2.css',
                'version' => filemtime( EXAM_REACTION_BUTTON_PATH . '/assets/css/sweetalert2.css' )
            ],
            'exam-reaction-button-style' => [
                'src'     => EXAM_REACTION_BUTTON_ASSETS . '/css/styles.css',
                'version' => filemtime( EXAM_REACTION_BUTTON_PATH . '/assets/css/styles.css' )
            ],

        ];
    }

    /**
     * Register scripts and styles
     *
     * @return void
     */
    public function register_assets() {

        $scripts = $this->get_scripts();
        $styles  = $this->get_styles();

        // Enqueue scripts
        foreach ( $scripts as $handle => $script ) {
            $deps = isset( $script['deps'] ) ? $script['deps'] : false;

            wp_enqueue_script( $handle, esc_url( $script['src'] ), $deps, $script['version'], true );
        }

        // Enqueue styles
        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            wp_enqueue_style( $handle, esc_url( $style['src'] ), $deps, $style['version'] );
        }

        // localize scripts
        wp_localize_script( 'exam-reaction-button-script', 'examReactionButton', [
            'ajaxurl'   => admin_url( 'admin-ajax.php' ),
            'user_id'   => get_current_user_id(),
            'post_id'   => get_the_ID(),
            'nonce'     => wp_create_nonce( 'exam-reaction-button-nonce' ),
        ] );
    }
}
