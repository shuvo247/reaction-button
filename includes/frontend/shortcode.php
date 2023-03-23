<?php

namespace Exam\Reaction\Button\Frontend;

/**
 * Shortcode handler class
 */
class Shortcode {

    /**
     * Initializes the consturctor class
     */
    function __construct() {
        add_shortcode( 'reaction-button', [ $this, 'render_shortcode' ] );
    }

    /**
     * Shortcode handler class
     *
     * @return void
     */
    public function render_shortcode() {
        ob_start();
        if( is_user_logged_in() ) {
            include EXAM_REACTION_BUTTON_PATH_FRONTEND . '/views/reaction-view.php';
        }else{
            echo esc_html__('Please loggin first','exam-reaction-button');
        }
        return ob_get_clean();
    }
}
