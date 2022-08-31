<?php
/**
 * Plugin Name:       Lutron Form
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      5.6
 * Author:            Huras Alexandre e Jean Carlos
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       lutron-form-plugin
 * Domain Path:       /lfp
 */


if ( ! defined( 'ABSPATH' ) ) {
    die;
}

class LutronFormPlugin
{
    function __construct(){
        add_action('admin_menu', array( $this, 'add_menu_button' ) );
    }

    function add_menu_button(){
        add_menu_page( "Front End Form", "Front End Form", "manage_options", "lutron-end-form-plugin", array( $this, "render_front_end_form" ) );
    }

    function render_front_end_form(){
        wp_enqueue_script('select2', plugins_url('includes/js/select2.min.js', __FILE__), ['jquery']);
        wp_enqueue_script('jquery-mask', plugins_url('includes/js/jquery.mask.js', __FILE__), ['jquery']);
        wp_enqueue_script('tabela-fipe', plugins_url('includes/js/tabela-fipe.js', __FILE__), ['jquery']);
        wp_enqueue_script('bootstrap1', "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js", ['jquery']);
        wp_enqueue_script('bootstrap12', "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js", ['jquery']);
        wp_enqueue_script('front-end-form', plugins_url('includes/js/front-end-form.js', __FILE__), ['jquery']);
        wp_enqueue_script('front-form', plugins_url('includes/js/lutorn-form.js', __FILE__), ['jquery']);

        wp_localize_script('front-end-form', 'php_vars', [
            'estados_cidades_file_path' => plugins_url('includes/json/estados_cidades.json', __FILE__)
        ]);
        
        // wp_enqueue_script('estados_cidades', );

        wp_enqueue_style('lutron-lfp', plugins_url('includes/css/lutron.css', __FILE__));
        wp_enqueue_style('select2', plugins_url('includes/css/select2.min.css', __FILE__));

        ob_start();

        include_once plugin_dir_path(__FILE__).'views/front_end_form.php';

        $template = ob_get_contents();

        ob_end_clean();

        echo $template;
    }

    function list_table_fn2(){
    }

    function activate(){
        // generate taxonomy
        // $this->anime_game_character_tags();
        // generate CPT
        // $this->register_anime_game_character();
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

}

if ( class_exists( 'LutronFormPlugin' ) ) {
    $lutronPlugin = new LutronFormPlugin();
}

// activation
register_activation_hook( __FILE__, array( $lutronPlugin, 'activate' ) );

// deactivation
register_deactivation_hook( __FILE__, array( $lutronPlugin, 'deactivate' ) );

// uninstall
// register_uninstall_hook( __FILE__, array( $lutronPlugin, 'uninstall' ) );
