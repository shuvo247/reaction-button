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
        include EXAM_REACTION_BUTTON_PATH_FRONTEND . '/views/reaction-form.php';
        return ob_get_clean();
    }
}
