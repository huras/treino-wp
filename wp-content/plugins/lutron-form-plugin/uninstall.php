<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}

$characters = get_posts( array( 'post_type' => 'anime_game_character', 'numberposts' => -1) );

foreach( $characters as $character ){
    wp_delete_post( $character->ID, true );
}
