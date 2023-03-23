<?php

/**
 * Insert a new reaction
 *
 * @param  array  $args
 *
 * @return int|WP_Error
 */
function exam_reaction_button_insert_reaction( $args = [] ) {
    global $wpdb;

    $defaults = [
        'user_id'       => get_current_user_id(),
        'post_id'       => $args['post_id'],
        'react_id'      => $args['react_id'],
        'reacted_time'  => current_time( 'mysql' ),
    ];

    $data = wp_parse_args( $args, $defaults );

    $data_exists = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM `{$wpdb->prefix}exam_reaction_button` WHERE user_id = %d AND post_id = %d", get_current_user_id(), $args['post_id'] ) );

    if (  $data_exists ) {

        $updated = $wpdb->update(
            $wpdb->prefix . 'exam_reaction_button',
            $data,
            [ 'id' => $data_exists ],
            [
                '%s',
                '%s',
                '%s',
                '%s'
            ],
        );

        return $updated;

    } else {

        $inserted = $wpdb->insert(
            $wpdb->prefix . 'exam_reaction_button',
            $data,
            [
                '%s',
                '%s',
                '%s',
                '%s'
            ]
        );

        if ( ! $inserted ) {
            return new \WP_Error( 'failed-to-insert', __( 'Failed to insert data', 'exam-reaction-button' ) );
        }

        return $wpdb->insert_id;
    }
}