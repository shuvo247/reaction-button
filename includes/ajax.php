<?php

namespace Exam\Reaction\Button;

/**
 * Main Ajax handler class
 */
class Ajax {

    /**
     * Class constructor
     */
    function __construct() {
        add_action( 'wp_ajax_exam_reaction_button_add', [ $this, 'submit_reaction'] );
        add_action( 'wp_ajax_nopriv_exam_reaction_button_add', [ $this, 'submit_reaction'] );
    }

    /**
     * Handle Reaction Submission
     *
     * @return void
     */
    public function submit_reaction() {

        if ( ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'exam-reaction-nonce' ) ) {
            wp_send_json_error( [
                'message' => __( 'Nonce verification failed!', 'exam-reaction-button' )
            ] );
        }

        $args = [
            'post_id'   => sanitize_text_field( $_REQUEST['post_id'] ),
            'react_id'  => sanitize_text_field( $_REQUEST['react_id'] ),
        ];

        $insert_reaction = exam_reaction_button_insert_reaction( $args );

        if( isset( $insert_reaction ) ) {
            wp_send_json_success([
                'message' => __( 'Reaction has been sent successfully!', 'exam-reaction-button' )
            ]);
        }

    }

}
