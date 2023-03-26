<?php

namespace Exam\Reaction\Button\Admin;

/**
 * Shortcode handler class
 */
class Admin_Column {

    /**
     * Initializes the consturctor class
     */
    function __construct() {

        // Add 'Reaction' column
        add_filter('manage_posts_columns', [ $this, 'reaction_column_add' ]);
        add_filter('manage_pages_columns', [ $this, 'reaction_column_add' ]);

        // Update 'Reaction' column data 
        add_action( 'manage_posts_custom_column', [ $this, 'reaction_column_content' ],10, 2 );
        add_action( 'manage_pages_custom_column', [ $this, 'reaction_column_content' ],10, 2 );
    }
    
    /**
     * Add 'Reaction' column to post & page listing page 
     *
     * @param $columns
     *
     * @return void
     */
    public function reaction_column_add( $columns ) {
        $new_columns = array();
        foreach ( $columns as $key => $value ) {
            if ( $key == 'date' ) {
                $new_columns['custom_column'] = __( 'Reaction', 'exam-reaction-button' );
            }
            $new_columns[ $key ] = $value;
        }
        return $new_columns;
    }
    
    /**
     * Add Reaction data to the column
     *
     * @param $column_name 
     * @param $post_id
     *
     * @return void
     */

    public function reaction_column_content($column_name, $post_id) {
        if ($column_name == 'custom_column') {
            if( count( exam_reaction_button_all_react_by_post_id( $post_id ) ) > 0 ) {
                include EXAM_REACTION_BUTTON_PATH_ADMIN . '/views/admin-view.php';
            }else{
                echo wp_kses_post( __('<span class="reaction-not-added">No reaction found!!','exam-reaction-button') );
            }
        }
    }

    

}
