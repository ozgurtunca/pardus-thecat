<?php 
/**
*     @package pardusthecat
*
*     ====================================================================
*             CUSTOMIZE PARDUS WITH KIRKI PLUGIN
*     ====================================================================
*
*       The Kirki Plugin must be install. 
*       This file uses classes/functions of Kirki PLugin
*
*
*
*/
 //=============================================================
 // Remove header image and widgets option from theme customizer
 //=============================================================
 
function mytheme_kirki_sections( $wp_customize ) {

    	
 //=============================================================
 // Remove Default Sections   
 //=============================================================
    $wp_customize->remove_section("colors");
    $wp_customize->remove_section("title_tagline");
    $wp_customize->remove_section("background_image");
    $wp_customize->remove_section("static_front_page");
    $wp_customize->remove_control("header_image");
    $wp_customize->remove_panel("widgets");

// Add panels

	$wp_customize->add_panel( 'fl-general', array(
		'priority'    => 10,
		'title'       => esc_html__( 'General', 'kirki' ),
	) );
    $wp_customize->add_panel( 'typography', array(
		'priority'    => 20,
		'title'       => esc_html__( 'Typography', 'kirki' ),
	) );
    $wp_customize->add_panel( 'styling', array(
		'priority'    => 20,
		'title'       => esc_html__( 'Styling', 'kirki' ),
	) );
    $wp_customize->add_panel( 'header', array(
		'priority'    => 20,
		'title'       => esc_html__( 'Header', 'kirki' ),
	) );
    $wp_customize->add_panel( 'woocommerce', array(
		'priority'    => 20,
		'title'       => esc_html__( 'Woocommerce', 'kirki' ),
	) );
    $wp_customize->add_panel( 'catalog', array(
		'priority'    => 20,
		'title'       => esc_html__( 'Catalog', 'kirki' ),
	) );

/// Add sections

     $wp_customize->add_section( 'title_tagline', array(
 		'title'       => esc_html__( 'Site Identity', 'kirki' ),
 		'priority'    => 10,
 		'panel'       => 'fl-general',
 	) );
     $wp_customize->add_section( 'static_front_page', array(
        'title'       => esc_html__( 'Home Page Settings', 'kirki' ),
        'priority'    => 10,
        'panel'       => 'fl-general',
    ) ); 

    $wp_customize->add_section( 'typography', array(
 		'title'       => esc_html__( 'Font Families', 'kirki' ),
 		'priority'    => 20,
        'panel'       => 'typography',
 	) );

    $wp_customize->add_section( 'body', array(
    'title'       => esc_html__( 'Body', 'kirki' ),
    'priority'    => 20,
    'panel'       => 'typography',
    ) );
}
add_action( 'customize_register', 'mytheme_kirki_sections' );

/*
function mytheme_kirki_configuration() {
  return array( 'url_path'     => get_stylesheet_directory_uri() . '/inc/kirki/' );
}
add_filter( 'kirki/config', 'mytheme_kirki_configuration' );

function mytheme_kirki_fields( $fields ) {

  $fields[] = array(
      'type'        => 'background',
      'settings'    => 'header_background',
      'label'       => esc_html__( 'Choose your header background', 'kirki' ),
      'description' => __( 'The header background you specify here will apply to the header area, including your menus and your branding.', 'kirki' ),
      'section'     => 'header_background',
      'default'     => array(
          'color'    => 'rgba(25,170,141,0.7)',
          'image'    => '',
          'repeat'   => 'no-repeat',
          'size'     => 'cover',
          'attach'   => 'fixed',
          'position' => 'left-top',
      ),
      'priority'    => 10,
      'output'      => array(
		'element'  => '.header',
		'property' => 'background-color',
	),
  ); 

  $fields[] = array(
      'type'        => 'background',
      'settings'    => 'body_background',
      'label'       => esc_html__( 'Choose the background for the main area', 'kirki' ),
      'description' => __( 'The header background you specify here will apply to the main area of your site.', 'kirki' ),
      'section'     => 'main_background',
      'default'     => array(
          'color'    => 'rgba(255,255,255,1)',
          'image'    => '',
          'repeat'   => 'no-repeat',
          'size'     => 'cover',
          'attach'   => 'fixed',
          'position' => 'left-top',
      ),
      'priority'    => 10,
      'output'      => '#content'
  );

  $fields[] = array(
      'type'        => 'background',
      'settings'    => 'footer_background',
      'label'       => esc_html__( 'Choose the background for your footer', 'kirki' ),
      'description' => __( 'If you choose to use an image then please use a blurry image so that it does not distract users from the widgets you have on your footer..', 'kirki' ),
      'section'     => 'footer_background',
      'default'     => array(
          'color'    => 'rgba(255,255,255,1)',
          'image'    => '',
          'attach'   => 'fixed',
      ),
      'priority'    => 10,
      'output'      => '#content'
  );

  $fields[] = array(
      'type'        => 'select',
      'setting'     => 'font_family',
      'label'       => esc_html__( 'Font Families', 'kirki' ),
      'description' => __( 'Please choose a font for your site. This font-family will be applied to all elements on your page, including headers and body.', 'kirki' ),
      'section'     => 'typography',
      'default'     => 'Roboto',
      'priority'    => 10,
      'choices'     => Kirki_Fonts::get_font_choices(),
      'output'      => array(
          array(
              'element'  => 'body, h1, h2, h3, h4, h5, h6',
              'property' => 'font-family',
          ),
      ),
      'transport'   => 'postMessage',
      'js_vars'     => array(
          array(
              'element'  => 'body, h1, h2, h3, h4, h5, h6',
              'function' => 'css',
              'property' => 'font-family',
          ),
      ),
  );

  $fields[] = array(
      'type'        => 'slider',
      'setting'     => 'font_size',
      'label'       => esc_html__( 'Font-Size', 'kirki' ),
      'description' => __( 'Please choose a font-size for your body.', 'kirki' ),
      'section'     => 'body',
      'default'     => 1,
      'priority'    => 21,
      'choices'     => array(
          'min'  => .7,
          'max'  => 2,
          'step' => .01
      ),
      'output'        => array(
          array(
              'element'  => 'body',
              'property' => 'font-size',
              'units'    => 'em',
          ),
      ),
      'transport'   => 'postMessage',
      'js_vars'     => array(
          array(
              'element'  => 'body',
              'function' => 'css',
              'property' => 'font-size',
          ),
      ),
  );



  $fields[] = array(
    'type'        => 'color',
    'settings'    => 'color_setting_hex',
    'label'       => esc_html__( 'Choose your header font color', 'kirki' ),
    'description' => __( 'The header font color you specify here will apply to the header area, including your menus and your branding.', 'kirki' ),
    'section'     => 'typography',
    'default'     => '#000000',
    'priority'    => 10,
    'output'      => array(
        
      'element'  => '.nav-link',
      'property' => 'color',
  ),
);


  return $fields;

}
add_filter( 'kirki/fields', 'mytheme_kirki_fields' );


*/