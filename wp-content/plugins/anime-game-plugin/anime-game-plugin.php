<?php
/**
 * Plugin Name:       Anime Game Plugin
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      5.6
 * Author:            Huras Alexandre
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       anime-game-plugin
 * Domain Path:       /lfp
 */


if ( ! defined( 'ABSPATH' ) ) {
    die;
}

class AnimeGameWorld
{
    function __construct(){
        add_action('admin_menu', array( $this, 'list_table_menu' ) );
        add_action( 'init', array( $this, 'anime_game_character_tags' ) );
        add_action('init', array( $this, 'register_anime_game_character' ) );
    }

    function list_table_menu(){
        // add_menu_page( "Lutron Plugin", "Lutron Plugin", "manage_options", "lutron-plugin", array( $this, "list_table_fn" ) );
        //add_menu_page( "Lutron Plugin 2", "Lutron Plugin 2", "manage_options", "lutron-plugin-2", array( $this, "list_table_fn2" ) );
    }

    function list_table_fn(){
        ob_start();

        include_once plugin_dir_path(__FILE__).'views/anime-game-plugin-table-list.php';

        $template = ob_get_contents();

        ob_end_clean();

        echo $template;
    }

    function list_table_fn2(){
    }

    function activate(){
        // generate taxonomy
        $this->anime_game_character_tags();
        // generate CPT
        $this->register_anime_game_character();
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
    function register_anime_game_character(){
        $labels = array(
            'name'                  => _x( 'Character Girls', 'Character Girl General Name', 'anime-game-plugin' ),
            'singular_name'         => _x( 'Character Girl', 'Character Girl Singular Name', 'anime-game-plugin' ),
            'menu_name'             => __( 'Character Girls', 'anime-game-plugin' ),
            'name_admin_bar'        => __( 'Character Girl', 'anime-game-plugin' ),
            'archives'              => __( 'Character Girl Archives', 'anime-game-plugin' ),
            'attributes'            => __( 'Character Girl Attributes', 'anime-game-plugin' ),
            'parent_item_colon'     => __( 'Parent Character Girl:', 'anime-game-plugin' ),
            'all_items'             => __( 'All Character Girls', 'anime-game-plugin' ),
            'add_new_item'          => __( 'Add New Character Girl', 'anime-game-plugin' ),
            'add_new'               => __( 'Add New', 'anime-game-plugin' ),
            'new_item'              => __( 'New Character Girl', 'anime-game-plugin' ),
            'edit_item'             => __( 'Edit Character Girl', 'anime-game-plugin' ),
            'update_item'           => __( 'Update Character Girl', 'anime-game-plugin' ),
            'view_item'             => __( 'View Character Girl', 'anime-game-plugin' ),
            'view_items'            => __( 'View Character Girls', 'anime-game-plugin' ),
            'search_items'          => __( 'Search Character Girl', 'anime-game-plugin' ),
            'not_found'             => __( 'Not found', 'anime-game-plugin' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'anime-game-plugin' ),
            'featured_image'        => __( 'Featured Image', 'anime-game-plugin' ),
            'set_featured_image'    => __( 'Set featured image', 'anime-game-plugin' ),
            'remove_featured_image' => __( 'Remove featured image', 'anime-game-plugin' ),
            'use_featured_image'    => __( 'Use as featured image', 'anime-game-plugin' ),
            'insert_into_item'      => __( 'Insert into item', 'anime-game-plugin' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'anime-game-plugin' ),
            'items_list'            => __( 'Character Girls list', 'anime-game-plugin' ),
            'items_list_navigation' => __( 'Character Girls list navigation', 'anime-game-plugin' ),
            'filter_items_list'     => __( 'Filter items list', 'anime-game-plugin' ),
        );
        $args = array(
            'label'                 => __( 'Character Girl', 'anime-game-plugin' ),
            'description'           => __( 'Character Girl Description', 'anime-game-plugin' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'author', 'thumbnail' ),
            'taxonomies'            => array( 'anime_game_character_tags' ),
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
        register_post_type( 'anime_game_character', $args );
    }

    // Register Custom Character Tag
    function anime_game_character_tags() {

        $labels = array(
            'name'                       => _x( 'Character Tags', 'Character Tag General Name', 'anime-game-plugin' ),
            'singular_name'              => _x( 'Character Tag', 'Character Tag Singular Name', 'anime-game-plugin' ),
            'menu_name'                  => __( 'Character Tag', 'anime-game-plugin' ),
            'all_items'                  => __( 'All Character Tags', 'anime-game-plugin' ),
            'parent_item'                => __( 'Parent Character Tag', 'anime-game-plugin' ),
            'parent_item_colon'          => __( 'Parent Character Tag:', 'anime-game-plugin' ),
            'new_item_name'              => __( 'New Character Tag Name', 'anime-game-plugin' ),
            'add_new_item'               => __( 'Add New Character Tag', 'anime-game-plugin' ),
            'edit_item'                  => __( 'Edit Character Tag', 'anime-game-plugin' ),
            'update_item'                => __( 'Update Character Tag', 'anime-game-plugin' ),
            'view_item'                  => __( 'View Character Tag', 'anime-game-plugin' ),
            'separate_items_with_commas' => __( 'Separate items with commas', 'anime-game-plugin' ),
            'add_or_remove_items'        => __( 'Add or remove items', 'anime-game-plugin' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'anime-game-plugin' ),
            'popular_items'              => __( 'Popular Character Tags', 'anime-game-plugin' ),
            'search_items'               => __( 'Search Character Tags', 'anime-game-plugin' ),
            'not_found'                  => __( 'Not Found', 'anime-game-plugin' ),
            'no_terms'                   => __( 'No items', 'anime-game-plugin' ),
            'items_list'                 => __( 'Character Tags list', 'anime-game-plugin' ),
            'items_list_navigation'      => __( 'Character Tags list navigation', 'anime-game-plugin' ),
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
        register_taxonomy( 'anime_game_character_tags', array( 'post' ), $args );
    }

}

if ( class_exists( 'AnimeGameWorld' ) ) {
    $lutronPlugin = new AnimeGameWorld();
}

// activation
register_activation_hook( __FILE__, array( $lutronPlugin, 'activate' ) );

// deactivation
register_deactivation_hook( __FILE__, array( $lutronPlugin, 'deactivate' ) );

// uninstall
// register_uninstall_hook( __FILE__, array( $lutronPlugin, 'uninstall' ) );
