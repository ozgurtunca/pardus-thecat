<?php 
/**
*       @package pardusthecat
*
*====================================================================
*             CUSTOMIZE PARDUS WITH KIRKI PLUGIN
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

class Pardus_Customize {
 /**
 * Customize settings
 *
 * @var array
 */
 
  protected $config = array();
 
 /**
 * The class constructor
 *
 * @param array $config
 */
 public function __construct( $config ) {
  $this->config = $config;
  if ( ! class_exists( 'Kirki' ) ) {
   return;
  }
  $this->register();
 } // End function __construct()

 /**
 * Register settings
 */
 public function register() {
  /**
  * Add the theme configuration
  */
  if ( ! empty( $this->config['theme'] ) ) {
   Kirki::add_config(
    $this->config['theme'], array(
     'capability'  => 'edit_theme_options',
     'option_type' => 'theme_mod',
    )
   );
  }  
  /**
  * Add panels
  */
  if ( ! empty( $this->config['panels'] ) ) {
   foreach ( $this->config['panels'] as $panel => $settings ) {
    Kirki::add_panel( $panel, $settings );
   }
  } // End Add panels
  /**
  * Add sections
  */
  if ( ! empty( $this->config['sections'] ) ) {
   foreach ( $this->config['sections'] as $section => $settings ) {
    Kirki::add_section( $section, $settings );
   }
  } // End Add sections
  /**
  * Add fields
  */
  if ( ! empty( $this->config['theme'] ) && ! empty( $this->config['fields'] ) ) {
   foreach ( $this->config['fields'] as $name => $settings ) {
    if ( ! isset( $settings['settings'] ) ) {
     $settings['settings'] = $name;
    }

    Kirki::add_field( $this->config['theme'], $settings );
   }
  } // End Add fields
 } // End function register
 
} // End Class Pardus_Customize
/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function pardus_get_option( $name ) {

  global $pardus_customize;

  $value = false;

  if ( class_exists( 'Kirki' ) ) {
    $value = Kirki::get_option( 'pardusthecat', $name );
  } elseif ( ! empty( $pardus_customize ) ) {
    $value = $pardus_customize->get_option( $name );
  }
  return apply_filters( 'pardus_get_option', $value, $name );
} // End function pardus_get_option

function pardus_customize_modify( $wp_customize ) {
 $wp_customize->get_section( 'title_tagline' )->panel     = 'general';
 $wp_customize->get_section( 'static_front_page' )->panel = 'general';
	Kirki::remove_section( 'background_image');
	Kirki::remove_section( 'header_image');
	Kirki::remove_section( 'colors');
}
if ( class_exists( 'Kirki' ) ) {
	add_action( 'customize_register', 'pardus_customize_modify' );  
}


function pardus_customize_settings() {
 /**
 * Customizer configuration
 */
 $settings = array(
  'theme' => 'pardusthecat',
 );

 $panels = array(
		'general'    => array(
			'priority' => 10,
			'title'    => esc_html__( 'General', 'pardusthecat' ),
		),
		'header'     => array(
			'priority' => 40,
			'title'    => esc_html__( 'Header', 'pardusthecat' ),
		),
	); // End array $panels
 $sections = array(
		// Header
    // Header top bar
		'header_top_bar'                   => array(
			'title'       => esc_html__( 'Header Top Bar', 'pardusthecat' ),
			'description' => '',
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'panel'       => 'header',
		),
    // Header Layout
    'header_layout'                   => array(
			'title'       => esc_html__( 'Header Layout', 'pardusthecat' ),
			'description' => '',
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'panel'       => 'header',
		),
    // Header Navigation
    'header_navigation'                   => array(
			'title'       => esc_html__( 'Header Navigation', 'pardusthecat' ),
			'description' => '',
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'panel'       => 'header',
		),
 ); // End array $sections 
  
  // Fields
 $fields = array(
		// Top Bar
    'topbar'        => array(
      'type'        => 'toggle',
      'settings'    => 'topbar_toogle',
      'label'       => esc_html__( 'Enable Top Bar', 'pardusthecat' ),
      'default'     => '0',
      'section'     => 'header_top_bar',
      'priority'    => 10,
      'description' => esc_html__( 'Enable fixed top bar in header section.', 'pardusthecat' ),
      'transport'   => 'auto',
    ),
    'topbar_custom_styling'    => array(
      'type'                    => 'toggle',
      'settings'                => 'topbar_custom_styling',
      'label'                   => esc_html__( 'Custom Top Bar Styling', 'pardusthecat' ),
      'default'                 => '0',
      'section'                 => 'header_top_bar',
      'priority'                => 20,
      'description'             => esc_html__( 'Enable custom top bar height.', 'pardusthecat' ),
      'transport'               => 'auto',
      ),
		'topbar_bg_color'                      => array(
      'type'            => 'color',
      'label'           => esc_html__( 'Background Color', 'pardusthecat' ),
      'default'         => '#0062d0',
      'section'         => 'header_top_bar',
      'priority'        => 30,
      'active_callback' => array(
        array(
          'setting'  => 'topbar_custom_styling',
          'operator' => '==',
          'value'    => '1',
        ),
      ),
			'transport'    => 'auto',
			'output'       => array(
				array(
					'element'  => '#topbar',
					'property' => 'background-color',
				),
			),
    ),
    'topbar_txt_color'    => array(
      'type'              => 'color',
      'label'             => esc_html__( 'Text Color', 'pardusthecat' ),
      'default'           => '#ffffff',
      'section'           => 'header_top_bar',
      'priority'          => 30,
      'active_callback'   => array(
        array(
          'setting'       => 'topbar_custom_styling',
          'operator'      => '==',
          'value'         => '1',
        ),
      ),
      'transport'    => 'auto',
      'output'       => array(
        array(
          'element'  => '#topbar a',
          'property' => 'color',
        ),
        array(
          'element'  => '.topbar a',
          'property' => 'color',
        ),
        array(
          'element'  => '.topbar',
          'property' => 'color',
        ),
      ),
    ),
    'topbar_hover_color'  => array(
      'type'              => 'color',
      'label'             => esc_html__( 'Hover Color', 'pardusthecat' ),
      'default'           => '#f1f1d6',
      'section'           => 'header_top_bar',
      'priority'          => 30,
      'active_callback'   => array(
        array(
          'setting'       => 'topbar_custom_styling',
          'operator'      => '==',
          'value'         => '1',
        ),
      ),
      'transport'    => 'auto',
      'output'       => array(
        array(
          'element'  => '#topbar a:hover',
          'property' => 'color',
        ),
      ),
    ),
   'topbar_divider_color'     => array(
      'type'                  => 'color',
      'label'                 => esc_html__( 'Divider Color', 'pardusthecat' ),
      'default'               => '#ffffff',
      'section'               => 'header_top_bar',
      'priority'              => 30,
      'active_callback'       => array(
        array(
          'setting'  => 'topbar_custom_styling',
          'operator' => '==',
          'value'    => '1',
        ),
      ),
      'transport'    => 'auto',
      'output'       => array(
        array(
          'element'  => '.widget::after',
          'property' => 'background-color',
        ),
      ),
    ),
    'topbar_height'     => array(
      'type'            => 'dimensions',
      'settings'        => 'topbar_height',
      'label'           => esc_html__( 'Top Bar Height', 'pardusthecat' ),
      'description'     => esc_html__( 'Set custom header topbar height.', 'pardusthecat' ),
      'section'         => 'header_top_bar',
      'priority'        => 30,
      'default'         => array(
        'height'        => '', 
      ),
      'active_callback' => array(
        array(
          'setting'     => 'topbar_custom_styling',
          'operator'    => '==',
          'value'       => '1',
        )
      ),
			'transport'       => 'auto',
			'output'          => array(
				array(
					'element'     => '#topbar',
				)
      ),
    ),  
    'topbar_padding'     => array(
      'type'            => 'dimensions',
      'settings'        => 'topbar_padding',
      'label'           => esc_html__( 'Top Bar Padding', 'pardusthecat' ),
      'description'     => esc_html__( 'Set custom header topbar padding.', 'pardusthecat' ),
      'section'         => 'header_top_bar',
      'priority'        => 30,
      'default'         => array(
        'padding-top'    => '',
        'padding-bottom' => '',
        'padding-left'   => '',
        'padding-right'  => '',
      ),
      'active_callback' => array(
        array(
          'setting'     => 'topbar_custom_styling',
          'operator'    => '==',
          'value'       => '1',
        )
      ),
			'transport'       => 'auto',
			'output'          => array(
				array(
					'element'     => '#topbar',
				)
      ),
    ),
    'topbar_margin'     => array(
      'type'            => 'dimensions',
      'settings'        => 'topbar_margin',
      'label'           => esc_html__( 'Top Bar Margin', 'pardusthecat' ),
      'description'     => esc_html__( 'Set custom header topbar margin.', 'pardusthecat' ),
      'section'         => 'header_top_bar',
      'priority'        => 30,
      'default'         => array(
        'margin-top'    => '',
        'margin-bottom' => '',
        'margin-left'   => '',
        'margin-right'  => '',
      ),
      'active_callback' => array(
        array(
          'setting'     => 'topbar_custom_styling',
          'operator'    => '==',
          'value'       => '1',
        )
      ),
			'transport'       => 'auto',
			'output'          => array(
				array(
					'element'     => '#topbar',
				)
      ),
    ),    
    // Header 
    
    // Header Layout
    'header_layout'   => array(
      'type'          => 'select',
      'settings'      => 'header_layout',
      'label'         => esc_html__( 'Header Layout', 'pardusthecat' ),
      'section'       => 'header_layout',
      'default'       => '1',
      'priority'      => 20,
      'choices'       => array(
        '1' => esc_html__( 'Header 1', 'pardusthecat' ),
        '2' => esc_html__( 'Header 2', 'pardusthecat' ),
        '3' => esc_html__( 'Header 3', 'pardusthecat' ),
      ),
    ),
		// Top Bar - Navigation
    'header_nav'       => array(
    'type'            => 'color',
    'label'           => esc_html__( 'Background Color', 'pardusthecat' ),
    'default'         => '',
    'section'         => 'header_navigation',
    'priority'        => 20,
    'transport'       => 'auto',
      'output'       => array(
        array(
          'element'  => '.header-nav',
          'property' => 'background-color',
        ),
      ),
    ),
	);
 $settings['panels']   = apply_filters( 'pardusthecat_customize_panels', $panels );
	$settings['sections'] = apply_filters( 'pardusthecat_customize_sections', $sections );
	$settings['fields']   = apply_filters( 'pardusthecat_customize_fields', $fields );

	return $settings;  
} // End pardus_customize_settings

$pardus_customize = new Pardus_Customize( pardus_customize_settings() );


