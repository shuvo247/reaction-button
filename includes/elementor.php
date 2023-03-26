<?php

namespace Exam\Reaction\Button;

/**
 * Elementor class
 */
class Elementor {
    /**
     * The Class constructor
     */
    public function __construct() {
        add_action( 'elementor/widgets/register', [ $this, 'register_reaction_button_widget' ] );
    }
    
    /**
     * Register elementor widgets
     *
     * @param $widgets_manager
     *
     * @return void
     */
    public function register_reaction_button_widget( $widgets_manager )  {
        require_once( __DIR__ . '/widgets/reaction-button.php' );
    
        $widgets_manager->register( new \Elementor_Reaction_Button_Widget() );
    }
    
}
