<?php

namespace Exam\Reaction\Button;

/**
 * Gutenberg class
 */
class Gutenberg {
    /**
     * The Class constructor
     */
    public function __construct() {
        add_action( 'init', [ $this, 'exam_reaction_button_register_block' ] );
    }

    public function exam_reaction_button_register_block() {
        wp_register_script(
            'exam-reaction-button',
            EXAM_REACTION_BUTTON_ASSETS . '/js/reaction-button.js',
            array('wp-blocks', 'wp-components', 'wp-element')
        );
        register_block_type('exam-reaction-button/rection-button', array(
            'editor_script' => 'exam-reaction-button',
        ));
    }
}
