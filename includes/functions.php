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

    if ( isset( $data['id'] ) ) {

        $id = $data['id'];
        unset( $data['id'] );

        $updated = $wpdb->update(
            $wpdb->prefix . 'exam_reaction_button',
            $data,
            [ 'id' => $id ],
            [
                '%s',
                '%s',
                '%s',
                '%s'
            ],
            [ '%d' ]
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