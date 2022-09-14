<?php
/**
 * Plugin Name:       KDex Plugin
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      5.6
 * Author:            Huras Alexandre
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       kdex-plugin
 * Domain Path:       /kdex
 */


if ( ! defined( 'ABSPATH' ) ) {
    die;
}

class KdexManager
{
    function __construct(){
        add_action( 'init', array( $this, 'register_technology' ) );
        add_action('init', array( $this, 'register_knowledge' ) );
    }

    function activate(){
        // generate taxonomy
        $this->register_technology();
        // generate CPT
        $this->register_knowledge();
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivate(){
        // flush rewrite rules
        flush_rewrite_rules();
    }

    static function uninstall(){
        // delete CPT
        // delete all the plugin data from the DB
    }

    //Register Anime Game Character
    function register_knowledge(){
        $labels = array(
            'name'                  => _x( 'Kdowledges', 'Kdowledge General Name', 'kdex-plugin' ),
            'singular_name'         => _x( 'Kdowledge', 'Kdowledge Singular Name', 'kdex-plugin' ),
            'menu_name'             => __( 'Kdowledges', 'kdex-plugin' ),
            'name_admin_bar'        => __( 'Kdowledge', 'kdex-plugin' ),
            'archives'              => __( 'Kdowledge Archives', 'kdex-plugin' ),
            'attributes'            => __( 'Kdowledge Attributes', 'kdex-plugin' ),
            'parent_item_colon'     => __( 'Parent Kdowledge:', 'kdex-plugin' ),
            'all_items'             => __( 'All Kdowledges', 'kdex-plugin' ),
            'add_new_item'          => __( 'Add New Kdowledge', 'kdex-plugin' ),
            'add_new'               => __( 'Add New', 'kdex-plugin' ),
            'new_item'              => __( 'New Kdowledge', 'kdex-plugin' ),
            'edit_item'             => __( 'Edit Kdowledge', 'kdex-plugin' ),
            'update_item'           => __( 'Update Kdowledge', 'kdex-plugin' ),
            'view_item'             => __( 'View Kdowledge', 'kdex-plugin' ),
            'view_items'            => __( 'View Kdowledges', 'kdex-plugin' ),
            'search_items'          => __( 'Search Kdowledge', 'kdex-plugin' ),
            'not_found'             => __( 'Not found', 'kdex-plugin' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'kdex-plugin' ),
            'featured_image'        => __( 'Featured Image', 'kdex-plugin' ),
            'set_featured_image'    => __( 'Set featured image', 'kdex-plugin' ),
            'remove_featured_image' => __( 'Remove featured image', 'kdex-plugin' ),
            'use_featured_image'    => __( 'Use as featured image', 'kdex-plugin' ),
            'insert_into_item'      => __( 'Insert into item', 'kdex-plugin' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'kdex-plugin' ),
            'items_list'            => __( 'Kdowledges list', 'kdex-plugin' ),
            'items_list_navigation' => __( 'Kdowledges list navigation', 'kdex-plugin' ),
            'filter_items_list'     => __( 'Filter items list', 'kdex-plugin' ),
        );
        $args = array(
            'label'                 => __( 'Kdowledge', 'kdex-plugin' ),
            'description'           => __( 'Kdowledge Description', 'kdex-plugin' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'author', 'thumbnail' ),
            'taxonomies'            => array( 'technology' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            // 'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            // 'capability_type'       => 'page',
        );
        register_post_type( 'knowledge', $args );
    }

    // Register Custom Technology
    function register_technology() {

        $labels = array(
            'name'                       => _x( 'Technologies', 'Technology General Name', 'kdex-plugin' ),
            'singular_name'              => _x( 'Technology', 'Technology Singular Name', 'kdex-plugin' ),
            'menu_name'                  => __( 'Technology', 'kdex-plugin' ),
            'all_items'                  => __( 'All Technologies', 'kdex-plugin' ),
            'parent_item'                => __( 'Parent Technology', 'kdex-plugin' ),
            'parent_item_colon'          => __( 'Parent Technology:', 'kdex-plugin' ),
            'new_item_name'              => __( 'New Technology Name', 'kdex-plugin' ),
            'add_new_item'               => __( 'Add New Technology', 'kdex-plugin' ),
            'edit_item'                  => __( 'Edit Technology', 'kdex-plugin' ),
            'update_item'                => __( 'Update Technology', 'kdex-plugin' ),
            'view_item'                  => __( 'View Technology', 'kdex-plugin' ),
            'separate_items_with_commas' => __( 'Separate items with commas', 'kdex-plugin' ),
            'add_or_remove_items'        => __( 'Add or remove items', 'kdex-plugin' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'kdex-plugin' ),
            'popular_items'              => __( 'Popular Technologies', 'kdex-plugin' ),
            'search_items'               => __( 'Search Technologies', 'kdex-plugin' ),
            'not_found'                  => __( 'Not Found', 'kdex-plugin' ),
            'no_terms'                   => __( 'No items', 'kdex-plugin' ),
            'items_list'                 => __( 'Technologies list', 'kdex-plugin' ),
            'items_list_navigation'      => __( 'Technologies list navigation', 'kdex-plugin' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => false,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );
        register_taxonomy( 'technology', array( 'post' ), $args );
    }

}

if ( class_exists( 'KdexManager' ) ) {
    $kdexPlugin = new KdexManager();
}

// activation
register_activation_hook( __FILE__, array( $kdexPlugin, 'activate' ) );

// deactivation
register_deactivation_hook( __FILE__, array( $kdexPlugin, 'deactivate' ) );

// uninstall
// register_uninstall_hook( __FILE__, array( $kdexPlugin, 'uninstall' ) );
