<?php

namespace Exam\Reaction\Button;

/**
 * Installer class
 */
class Installer {

    /**
     * Run the activation actions
     *
     * @return void
     */
    public function activate() {
        $this->add_version();
        $this->create_tables();
    }

    /**
     * Run the deactivation actions
     *
     * @return void
     */
    public function deactivate() {
        $this->drop_tables();
    }

    /**
     * Add time and version on DB
     */
    public function add_version() {
        $installed = get_option( 'exam_reaction_button_installed' );

        if ( ! $installed ) {
            update_option( 'exam_reaction_button_installed', time() );
        }

        update_option( 'exam_reaction_button_version', EXAM_REACTION_BUTTON_VERSION );
    }

    /**
     * Create necessary database tables
     *
     * @return void
     */
    public function create_tables() {
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        $schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}exam_reaction_button` (
            `id` mediumint(9) NOT NULL AUTO_INCREMENT,
            `post_id` varchar(100)  NOT NULL,
            `react_id` varchar(30) NOT NULL COMMENT '1 = smile, 2 = straight, 3 = sad',
            `reacted_time` datetime NOT NULL,
            `user_id` bigint(20) unsigned NOT NULL,
            PRIMARY KEY (`id`)
          ) $charset_collate";
        if ( ! function_exists( 'dbDelta' ) ) {
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        }

        dbDelta( $schema );
    }

    /**
     * Drop database tables
     *
     * @return void
     */
    public function drop_tables() {
        
        global $wpdb;

        $wpdb->query("DROP TABLE IF EXISTS `{$wpdb->prefix}exam_reaction_button`");
        
    }

    
}
