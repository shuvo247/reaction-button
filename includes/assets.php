<?php

namespace Exam\Reaction\Button;

/**
 * Main Assets handlers class
 */
class Assets {

    /**
     * The Class constructor
     */
    function __construct() {
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
            'exam-reaction-button-script' => [
                'src'     => EXAM_REACTION_BUTTON_ASSETS . '/js/frontend.js',
                'version' => filemtime( EXAM_REACTION_BUTTON_PATH . '/assets/js/frontend.js' ),
                'deps'    => [ 'jquery' ]
            ]
        ];
    }

    /**
     * All available styles
     *
     * @return array
     */
    public function get_styles() {
        return [
            'exam-reaction-button-style' => [
                'src'     => EXAM_REACTION_BUTTON_ASSETS . '/css/frontend.css',
                'version' => filemtime( EXAM_REACTION_BUTTON_PATH . '/assets/css/frontend.css' )
            ]
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

            wp_enqueue_script( $handle, $script['src'], $deps, $script['version'], true );
        }

        // Enqueue styles
        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            wp_enqueue_style( $handle, $style['src'], $deps, $style['version'] );
        }

    }
}
