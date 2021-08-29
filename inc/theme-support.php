<?php 
/**
*     @package pardusthecat
*
*     ====================================================================
*             THEME SUPPORT
*     ====================================================================
*
*/
$options = get_option( 'post_formats' );
$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'chat' );
foreach ($formats as $format) {
  $output[] = ( @$options[$format] == 1 ? $format : '' );
}
if ( !empty( $options ) ) {
    add_theme_support( 'post-formats', $output );
} 

$header = get_option( 'custom_header' );
if( @$header == 1 ) {
  add_theme_support( 'custom-header' );
}
$background = get_option( 'custom_background' );
if( @$background == 1 ) {
  add_theme_support( 'custom-background' );
}

function pardus_features() {
  add_theme_support( 'editor-styles' );
  add_theme_support('title_tag');
}

add_action('after_setup_theme', 'pardus_features');

/*  Activate Menu Option */
function pardus_register_nav_menu(){
  register_nav_menu( 'primary', __( 'Main Header Mavigation on Header Image', 'pardus-thecat' ) );
  register_nav_menu( 'secondary', __( 'Secondary Header Mavigation on Header Bar', 'pardus-thecat'  ) );
  register_nav_menu( 'footer', __( 'Main Footer Menu', 'pardus-thecat'  ) );
}
add_action( 'after_setup_theme', 'pardus_register_nav_menu' );
