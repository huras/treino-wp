<?php
/**
 * Plugin Name:       Lutron Form Plugin
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      5.6
 * Author:            Huras Alexandre
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

class LutronPlugin
{
    function __construct(){
    }


    function activate(){

    }

    function deactivate(){

    }

    static function uninstall(){

    }
}

if ( class_exists( 'LutronPlugin' ) ) {
    $lutronPlugin = new LutronPlugin();
}

// activation
register_activation_hook( __FILE__, array( $lutronPlugin, 'activate' ) );

// deactivation
register_deactivation_hook( __FILE__, array( $lutronPlugin, 'deactivate' ) );

// uninstall
// register_uninstall_hook( __FILE__, array( $lutronPlugin, 'uninstall' ) );
