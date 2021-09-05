<?php 
/**
*     @package pardusthecat
*
*     ====================================================================
*             ADMIN ENQUEUE FUNCTIONS
*     ====================================================================
*/
function pardus_load_admin_scripts( $hook ){
    

    if ( 'toplevel_page_pardus_thecat' == $hook ) { 

        wp_register_style( 'pardus_admin' , get_template_directory_uri() . '/css/pardus.admin.css', array(), '1.0.0', 'all' );
        wp_enqueue_style( 'pardus_admin' )  ;

        wp_enqueue_media();

        wp_register_script( 'pardus-admin-script', get_template_directory_uri() . '/js/pardus.admin.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('pardus-admin-script');

    } elseif ('pardus-thecat_page_pardus_custom_css_slug' == $hook) {
    
       wp_enqueue_script( 'pardus-ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.4.12', true );
       wp_enqueue_script( 'pardus-custom-css-script', get_template_directory_uri() . '/js/pardus.custom_css.js', array('jquery'), '1.0.0', true );

       wp_enqueue_style( 'pardus-ace-style', get_template_directory_uri() . '/css/pardus.ace.css', array(), '1.0.0', 'all' );
    } else {
        return;
    }
}
    add_action( 'admin_enqueue_scripts', 'pardus_load_admin_scripts');

 /*   ========================================
          FRONT END ENQUEUE SCRIPTS STYLES
    ======================================== */
function pardus_load_scripts(){
    
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.1', 'all' );
    wp_enqueue_style( 'pardus', get_template_directory_uri() . '/css/pardus.css', array(), '1.0.0', 'all' );

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', false, '1.11.3', true );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '5.1', true );
}
add_action( 'wp_enqueue_scripts', 'pardus_load_scripts',);