<?php 
/**
*       @package pardusthecat
*
*====================================================================
*             ENQUEUE FONTS CHOSEN FROM THEME CUSOMIZER
*====================================================================
*
*       The Kirki Plugin must be install. 
*       This file uses classes/functions of Kirki PLugin
*/

// Exit if accessed suspiciously

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Kirki' ) ) {
 return;
}

class Pardus_Enqueue_Fonts {

 $kirki_google_fonts = get_theme_mod( 'googlefont_kirki' );

function google_fonts() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,800&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'google_fonts' );


}

