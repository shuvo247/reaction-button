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
        'user_id'       => $args['user_id'],
        'post_id'       => $args['post_id'],
        'react_id'      => $args['react_id'],
        'reacted_time'  => current_time( 'mysql' ),
    ];

    $data = wp_parse_args( $args, $defaults );

    $data_exists = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM `{$wpdb->prefix}exam_reaction_button` WHERE user_id = %d AND post_id = %d", $args['user_id'], $args['post_id'] ) );

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

/**
 * Delete old reaction
 *
 * @param  array  $args
 *
 * @return int|WP_Error
 */
function exam_reaction_button_delete_reaction( $args = [] ) {

    global $wpdb;

    $data_exists = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM `{$wpdb->prefix}exam_reaction_button` WHERE user_id = %d AND post_id = %d", $args['user_id'], $args['post_id'] ) );
    
    return $wpdb->delete(
        $wpdb->prefix . 'exam_reaction_button',
        [ 'id' => $data_exists ],
        [ '%d' ]
    );
    
}

/**
 * Get reaction count by post_id and react_id
 *
 * @param $post_id $react_id 
 *
 * @return integer
 */
function exam_reaction_button_count_by_post_and_react_id( $post_id, $react_id ) {
    global $wpdb;

    return $wpdb->get_var("SELECT COUNT(*) FROM `{$wpdb->prefix}exam_reaction_button` WHERE post_id = $post_id AND react_id = $react_id");

}

/**
 * Get current user react id
 *
 * @return integer
 */
function exam_reaction_button_cur() {
    global $wpdb;

    $args = [
        'user_id' => get_current_user_id(),
        'post_id' => get_the_ID(),
    ];

    return $wpdb->get_var( $wpdb->prepare( "SELECT react_id FROM `{$wpdb->prefix}exam_reaction_button` WHERE user_id = %d AND post_id = %d", $args['user_id'], $args['post_id'] ) );

}

/**
 * Get all react count with react_id as key and count as value
 *
 * @param $post_id
 * 
 * @return array
 */

function exam_reaction_button_count_react( $post_id ) {
    global $wpdb;

    // get all react
    $all_react = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}exam_reaction_button` WHERE post_id = $post_id");

    $count = array(
        '1'     => 0,
        '2'     => 0,
        '3'     => 0,
    );
    
    foreach ($all_react as $react) {
        if ($react->react_id == 1) {
            $count['1']++;
        } elseif ($react->react_id == 2) {
            $count['2']++;
        }elseif ($react->react_id == 3) {
            $count['3']++;
        }
    }
    
    return $count;
}