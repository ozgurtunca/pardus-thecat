<?php 
/*
    @package pardusthecat

    ========================================================
          CUSTOMIZE PARDUS WITH KIRKI PLUGIN
    ========================================================

    * The Kirki Plugin must be install. 
    This file uses classes/functions of Kirki PLugin

*/
function mytheme_kirki_sections( $wp_customize ) {
	/**
	 * Add panels
	 */
	$wp_customize->add_panel( 'backgrounds', array(
		'priority'    => 10,
		'title'       => __( 'Backgrounds', 'kirki' ),
	) );

	/**
	 * Add sections
	 */
     $wp_customize->add_section( 'header_background', array(
 		'title'       => __( 'Header Background', 'kirki' ),
 		'priority'    => 10,
 		'panel'       => 'backgrounds',
 	) );

     $wp_customize->add_section( 'main_background', array(
 		'title'       => __( 'Main Background', 'kirki' ),
 		'priority'    => 20,
 		'panel'       => 'backgrounds',
 	) );

     $wp_customize->add_section( 'footer_background', array(
 		'title'       => __( 'Footer Background', 'kirki' ),
 		'priority'    => 30,
 		'panel'       => 'backgrounds',
 	) );

     $wp_customize->add_section( 'typography', array(
 		'title'       => __( 'Typography', 'kirki' ),
 		'priority'    => 20,
 	) );

}
add_action( 'customize_register', 'mytheme_kirki_sections' );


function mytheme_kirki_configuration() {
  return array( 'url_path'     => get_stylesheet_directory_uri() . '/inc/kirki/' );
}
add_filter( 'kirki/config', 'mytheme_kirki_configuration' );

function mytheme_kirki_fields( $fields ) {

  $fields[] = array(
      'type'        => 'background',
      'settings'    => 'header_background',
      'label'       => __( 'Choose your header background', 'kirki' ),
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
      'output'      => '#header'
  );

  $fields[] = array(
      'type'        => 'background',
      'settings'    => 'body_background',
      'label'       => __( 'Choose the background for the main area', 'kirki' ),
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
      'label'       => __( 'Choose the background for your footer', 'kirki' ),
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
      'label'       => __( 'Font-Family', 'kirki' ),
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
      'label'       => __( 'Font-Size', 'kirki' ),
      'description' => __( 'Please choose a font-size for your body.', 'kirki' ),
      'section'     => 'typography',
      'default'     => 1,
      'priority'    => 20,
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

  return $fields;

}
add_filter( 'kirki/fields', 'mytheme_kirki_fields' );


