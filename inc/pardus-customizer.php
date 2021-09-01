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

// Exit if accessed directly
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

function pardus_customize_modify( $wp_customize ) {
 $wp_customize->get_section( 'title_tagline' )->panel     = 'general';
 $wp_customize->get_section( 'static_front_page' )->panel = 'general';
}
add_action( 'customize_register', 'pardus_customize_modify' );  

function pardus_customize_settings() {
 /**
 * Customizer configuration
 */
 $settings = array(
  'theme' => 'pardusthecat',
 );

 $panels = array(
		'general'      => array(
			'priority' => 10,
			'title'    => esc_html__( 'General', 'martfury' ),
		),
		'typography'   => array(
			'priority' => 20,
			'title'    => esc_html__( 'Typography', 'martfury' ),
		),
		// Styling
		'styling'      => array(
			'title'    => esc_html__( 'Styling', 'martfury' ),
			'priority' => 30,
		),
		'header'       => array(
			'priority' => 50,
			'title'    => esc_html__( 'Header', 'martfury' ),
		),
  /*
		'woocommerce'  => array(
			'priority' => 60,
			'title'    => esc_html__( 'Woocommerce', 'martfury' ),
		),
		'catalog'      => array(
			'priority' => 60,
			'title'    => esc_html__( 'Catalog', 'martfury' ),
		),
		'product_page' => array(
			'priority' => 60,
			'title'    => esc_html__( 'Product Page', 'martfury' ),
		),
		'vendors'      => array(
			'priority' => 60,
			'title'    => esc_html__( 'Vendors', 'martfury' ),
		),
  */
		'blog'         => array(
			'title'    => esc_html__( 'Blog', 'martfury' ),
			'priority' => 70,
		),
		'pages'        => array(
			'title'    => esc_html__( 'Pages', 'martfury' ),
			'priority' => 80,
		),
		'footer'       => array(
			'title'    => esc_html__( 'Footer', 'martfury' ),
			'priority' => 90,
		),
	); // End array $panels
 $sections = array(
		// Styling
		'styling_general'             => array(
			'title'       => esc_html__( 'General', 'martfury' ),
			'description' => '',
			'priority'    => 210,
			'capability'  => 'edit_theme_options',
			'panel'       => 'styling',
		),
		'color_scheme'                => array(
			'title'       => esc_html__( 'Color Scheme', 'martfury' ),
			'description' => '',
			'priority'    => 210,
			'capability'  => 'edit_theme_options',
			'panel'       => 'styling',
		),
		'newsletter'                  => array(
			'title'       => esc_html__( 'NewsLetter', 'martfury' ),
			'description' => '',
			'priority'    => 210,
			'capability'  => 'edit_theme_options',
			'panel'       => 'general',
		),
		'font_families_typo'          => array(
			'title'       => esc_html__( 'Fonts Families', 'martfury' ),
			'description' => '',
			'priority'    => 210,
			'capability'  => 'edit_theme_options',
			'panel'       => 'typography',
		),
		'body_typo'                   => array(
			'title'       => esc_html__( 'Body', 'martfury' ),
			'description' => '',
			'priority'    => 210,
			'capability'  => 'edit_theme_options',
			'panel'       => 'typography',
		),
		'heading_typo'                => array(
			'title'       => esc_html__( 'Heading', 'martfury' ),
			'description' => '',
			'priority'    => 210,
			'capability'  => 'edit_theme_options',
			'panel'       => 'typography',
		),
		'header_typo'                 => array(
			'title'       => esc_html__( 'Header', 'martfury' ),
			'description' => '',
			'priority'    => 210,
			'capability'  => 'edit_theme_options',
			'panel'       => 'typography',
		),
		'page_header_typo'            => array(
			'title'       => esc_html__( 'Page Header', 'martfury' ),
			'description' => '',
			'priority'    => 210,
			'capability'  => 'edit_theme_options',
			'panel'       => 'typography',
		),
		'footer_typo'                 => array(
			'title'       => esc_html__( 'Footer', 'martfury' ),
			'description' => '',
			'priority'    => 210,
			'capability'  => 'edit_theme_options',
			'panel'       => 'typography',
		),
		// Header
		'promotion'                   => array(
			'title'       => esc_html__( 'Promotion', 'martfury' ),
			'description' => '',
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'panel'       => 'header',
		),
		'logo'                        => array(
			'title'       => esc_html__( 'Logo', 'martfury' ),
			'description' => '',
			'priority'    => 15,
			'capability'  => 'edit_theme_options',
			'panel'       => 'header',
		),
		'header'                      => array(
			'title'       => esc_html__( 'Header Layout', 'martfury' ),
			'description' => '',
			'priority'    => 20,
			'capability'  => 'edit_theme_options',
			'panel'       => 'header',
		),
		'header_sticky'               => array(
			'title'       => esc_html__( 'Sticky Header', 'martfury' ),
			'description' => '',
			'priority'    => 20,
			'capability'  => 'edit_theme_options',
			'panel'       => 'header',
		),
		'header_search_content'       => array(
			'title'       => esc_html__( 'Search', 'martfury' ),
			'description' => '',
			'priority'    => 20,
			'capability'  => 'edit_theme_options',
			'panel'       => 'header',
		),
		'header_department'           => array(
			'title'       => esc_html__( 'Department', 'martfury' ),
			'description' => '',
			'priority'    => 20,
			'capability'  => 'edit_theme_options',
			'panel'       => 'header',
		),
		'header_hotline'              => array(
			'title'       => esc_html__( 'Hotline', 'martfury' ),
			'description' => '',
			'priority'    => 20,
			'capability'  => 'edit_theme_options',
			'panel'       => 'header',
		),
		'header_cart'                 => array(
			'title'       => esc_html__( 'Cart', 'martfury' ),
			'description' => '',
			'priority'    => 20,
			'capability'  => 'edit_theme_options',
			'panel'       => 'header',
		),
		'header_account'              => array(
			'title'       => esc_html__( 'Account', 'martfury' ),
			'description' => '',
			'priority'    => 20,
			'capability'  => 'edit_theme_options',
			'panel'       => 'header',
		),
		'header_recently_viewed'      => array(
			'title'       => esc_html__( 'Recently Viewed', 'martfury' ),
			'description' => '',
			'priority'    => 20,
			'capability'  => 'edit_theme_options',
			'panel'       => 'header',
		),
		'header_skin'                 => array(
			'title'       => esc_html__( 'Header Skin', 'martfury' ),
			'description' => '',
			'priority'    => 20,
			'capability'  => 'edit_theme_options',
			'panel'       => 'header',
		), 
  // Blog
  'page_header_blog'            => array(
			'title'       => esc_html__( 'Blog Page Header', 'martfury' ),
			'description' => '',
			'priority'    => 40,
			'capability'  => 'edit_theme_options',
			'panel'       => 'blog',
		),
		'blog'                        => array(
			'title'       => esc_html__( 'General', 'martfury' ),
			'description' => '',
			'priority'    => 40,
			'panel'       => 'blog',
			'capability'  => 'edit_theme_options',
		),
		'single_post'                 => array(
			'title'       => esc_html__( 'Single Post', 'martfury' ),
			'description' => '',
			'priority'    => 50,
			'panel'       => 'blog',
			'capability'  => 'edit_theme_options',
		),
  // Pages
		'page_header_page'            => array(
			'title'       => esc_html__( 'Page Header', 'martfury' ),
			'description' => '',
			'priority'    => 40,
			'capability'  => 'edit_theme_options',
			'panel'       => 'pages',
		),
		'single_page'                 => array(
			'title'       => esc_html__( 'Page Layout', 'martfury' ),
			'description' => '',
			'priority'    => 40,
			'capability'  => 'edit_theme_options',
			'panel'       => 'pages',
		),
		// 404
		'not_found'                   => array(
			'title'       => esc_html__( '404 Page', 'martfury' ),
			'description' => '',
			'priority'    => 60,
			'panel'       => 'pages',
			'capability'  => 'edit_theme_options',
		),
		// Coming Soon
		'coming_soon'                 => array(
			'title'       => esc_html__( 'Coming Soon Page', 'martfury' ),
			'description' => '',
			'priority'    => 60,
			'panel'       => 'pages',
			'capability'  => 'edit_theme_options',
		),
  // Footer
		'footer'                      => array(
			'title'       => esc_html__( 'Footer Layout', 'martfury' ),
			'description' => '',
			'priority'    => 60,
			'panel'       => 'footer',
			'capability'  => 'edit_theme_options',
		),
		'footer_newsletter'           => array(
			'title'       => esc_html__( 'Footer Newsletter', 'martfury' ),
			'description' => '',
			'priority'    => 60,
			'panel'       => 'footer',
			'capability'  => 'edit_theme_options',
		),
		'footer_info'                 => array(
			'title'       => esc_html__( 'Footer Info', 'martfury' ),
			'description' => '',
			'priority'    => 60,
			'panel'       => 'footer',
			'capability'  => 'edit_theme_options',
		),
		'footer_widgets'              => array(
			'title'       => esc_html__( 'Footer Widgets', 'martfury' ),
			'description' => '',
			'priority'    => 60,
			'panel'       => 'footer',
			'capability'  => 'edit_theme_options',
		),
		'footer_links'                => array(
			'title'       => esc_html__( 'Footer Links', 'martfury' ),
			'description' => '',
			'priority'    => 60,
			'panel'       => 'footer',
			'capability'  => 'edit_theme_options',
		),
		'footer_recently_viewed'      => array(
			'title'       => esc_html__( 'Recently Viewed Products', 'martfury' ),
			'description' => '',
			'priority'    => 60,
			'panel'       => 'footer',
			'capability'  => 'edit_theme_options',
		),
 ); // End array $sections 
  
  // Fields
 $fields = array(
  // NewsLetter
  'newsletter_popup'                        => array(
   'type'        => 'toggle',
   'label'       => esc_html__( 'Enable NewsLetter Popup', 'martfury' ),
   'default'     => 0,
   'section'     => 'newsletter',
   'priority'    => 10,
   'description' => esc_html__( 'Check this option to show newsletter popup.', 'martfury' ),
  ),
  'newsletter_home_popup'                   => array(
   'type'        => 'toggle',
   'label'       => esc_html__( "Show in Homepage", 'martfury' ),
   'default'     => 1,
   'section'     => 'newsletter',
   'priority'    => 10,
   'description' => esc_html__( 'Check this option to enable newsletter popup in the homepage.', 'martfury' ),
  ),
  'newsletter_bg_image'                     => array(
   'type'     => 'image',
   'label'    => esc_html__( 'Background Image', 'martfury' ),
   'default'  => '',
   'section'  => 'newsletter',
   'priority' => 20,
  ),
  'newsletter_content'                      => array(
   'type'     => 'textarea',
   'label'    => esc_html__( 'Content', 'martfury' ),
   'default'  => '',
   'section'  => 'newsletter',
   'priority' => 20,
  ),
  'newsletter_form'                         => array(
   'type'        => 'textarea',
   'label'       => esc_html__( 'NewsLetter Form', 'martfury' ),
   'default'     => '',
   'description' => sprintf( wp_kses_post( 'Enter the shortcode of MailChimp form . You can edit your sign - up form in the <a href= "%s" > MailChimp for WordPress form settings </a>.', 'martfury' ), admin_url( 'admin.php?page=mailchimp-for-wp-forms' ) ),
   'section'     => 'newsletter',
   'priority'    => 20,
  ),
  'newsletter_reappear'                     => array(
   'type'        => 'number',
   'label'       => esc_html__( 'Reappear', 'martfury' ),
   'default'     => '1',
   'section'     => 'newsletter',
   'priority'    => 20,
   'description' => esc_html__( 'Reappear after how many day(s) using Cookie', 'martfury' ),
  ),
  'newsletter_visible'                      => array(
   'type'     => 'select',
   'label'    => esc_html__( 'Visible', 'martfury' ),
   'default'  => '1',
   'section'  => 'newsletter',
   'priority' => 20,
   'choices'  => array(
    '1' => esc_html__( 'After page loaded', 'martfury' ),
    '2' => esc_html__( 'After how many seconds', 'martfury' ),
   ),
  ),
  'newsletter_seconds'                      => array(
   'type'            => 'number',
   'label'           => esc_html__( 'Seconds', 'martfury' ),
   'default'         => '10',
   'section'         => 'newsletter',
   'priority'        => 20,
   'active_callback' => array(
    array(
     'setting'  => 'newsletter_visible',
     'operator' => '==',
     'value'    => '2',
    ),
   ),
  ),
  'lazyload'                                => array(
   'type'        => 'toggle',
   'label'       => esc_html__( 'Enable Lazy Load', 'martfury' ),
   'default'     => 0,
   'section'     => 'styling_general',
   'priority'    => 10,
   'description' => esc_html__( 'Check this to delay loading of images.', 'martfury' ),
  ),
  'back_to_top'                             => array(
   'type'        => 'toggle',
   'label'       => esc_html__( 'Back To Top', 'martfury' ),
   'default'     => 0,
   'section'     => 'styling_general',
   'priority'    => 10,
   'description' => esc_html__( 'Check this to show back to top.', 'martfury' ),
  ),
  'custom_preloader'                        => array(
   'type'     => 'custom',
   'section'  => 'styling_general',
   'default'  => '<hr>',
   'priority' => 10,
  ),
  'preloader'                               => array(
   'type'        => 'toggle',
   'label'       => esc_html__( 'Preloader', 'martfury' ),
   'default'     => 0,
   'section'     => 'styling_general',
   'priority'    => 10,
   'description' => esc_html__( 'Display a preloader when page is loading.', 'martfury' ),
  ),
  'custom_preloader_progress'               => array(
   'type'     => 'color',
   'label'    => esc_html__( 'Progress Bar Background Color', 'martfury' ),
   'default'  => '',
   'section'  => 'styling_general',
   'priority' => 10,
   'choices'  => array(
    'alpha' => true,
   ),
  ),
  // Color Scheme
  'color_scheme'                            => array(
   'type'     => 'palette',
   'label'    => esc_html__( 'Base Color Scheme', 'martfury' ),
   'default'  => '',
   'section'  => 'color_scheme',
   'priority' => 10,
   'choices'  => array(
    ''       => array( '#fcb800' ),
    'red'    => array( '#dd2400' ),
    'orange' => array( '#fb7c00' ),
    'blue'   => array( '#0071df' ),
    'green'  => array( '#5fa30f' ),
    'black'  => array( '#000000' ),
   ),
  ),
  'color_skin'                              => array(
   'type'     => 'select',
   'label'    => esc_html__( 'Skin', 'martfury' ),
   'section'  => 'color_scheme',
   'default'  => '',
   'priority' => 10,
   'choices'  => array(
    ''      => esc_html__( 'Dark', 'martfury' ),
    'light' => esc_html__( 'Light', 'martfury' ),
   ),
  ),
  'custom_color_scheme'                     => array(
   'type'     => 'toggle',
   'label'    => esc_html__( 'Custom Color Scheme', 'martfury' ),
   'default'  => 0,
   'section'  => 'color_scheme',
   'priority' => 10,
  ),
  'custom_color'                            => array(
   'type'            => 'color',
   'label'           => esc_html__( 'Color', 'martfury' ),
   'default'         => '',
   'section'         => 'color_scheme',
   'priority'        => 10,
   'choices'         => array(
    'alpha' => true,
   ),
   'active_callback' => array(
    array(
     'setting'  => 'custom_color_scheme',
     'operator' => '==',
     'value'    => 1,
    ),
   ),
  ),

  // Typography
  'font_families_typo'                      => array(
   'type'     => 'multicheck',
   'label'    => esc_html__( 'Font Families Default', 'martfury' ),
   'section'  => 'font_families_typo',
   'default'  => array( 'worksans', 'libre_baskerville' ),
   'priority' => 20,
   'choices'  => array(
    'worksans'          => esc_html__( 'Work Sans', 'martfury' ),
    'libre_baskerville' => esc_html__( 'Libre Baskerville', 'martfury' ),
   ),
  ),
  'googlefont_kirki'                        => array(
   'type'        => 'toggle',
   'label'       => esc_html__( 'Google Fonts in Kirki', 'martfury' ),
   'section'     => 'font_families_typo',
   'default'     => 1,
   'priority'    => 20,
   'description' => esc_html__( 'Uncheck this option to disable load the google fonts from Kirki plugin', 'martfury' ),
  ),
  'body_typo'                               => array(
   'type'     => 'typography',
   'label'    => esc_html__( 'Body', 'martfury' ),
   'section'  => 'body_typo',
   'priority' => 10,
   'default'  => array(
    'font-family'    => 'Work Sans',
    'variant'        => 'regular',
    'font-size'      => '14px',
    'line-height'    => '1.6',
    'subsets'        => array( 'latin-ext' ),
    'color'          => '#666',
    'text-transform' => 'none',
   ),
  ),
  'heading1_typo'                           => array(
   'type'     => 'typography',
   'label'    => esc_html__( 'Heading 1', 'martfury' ),
   'section'  => 'heading_typo',
   'priority' => 10,
   'default'  => array(
    'font-family'    => 'Work Sans',
    'variant'        => '700',
    'font-size'      => '36px',
    'line-height'    => '1.2',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'color'          => '#000',
    'text-transform' => 'none',
   ),
  ),
  'heading2_typo'                           => array(
   'type'     => 'typography',
   'label'    => esc_html__( 'Heading 2', 'martfury' ),
   'section'  => 'heading_typo',
   'priority' => 10,
   'default'  => array(
    'font-family'    => 'Work Sans',
    'variant'        => '700',
    'font-size'      => '30px',
    'line-height'    => '1.2',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'color'          => '#000',
    'text-transform' => 'none',
   ),
  ),
  'heading3_typo'                           => array(
   'type'     => 'typography',
   'label'    => esc_html__( 'Heading 3', 'martfury' ),
   'section'  => 'heading_typo',
   'priority' => 10,
   'default'  => array(
    'font-family'    => 'Work Sans',
    'variant'        => '700',
    'font-size'      => '24px',
    'line-height'    => '1.2',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'color'          => '#000',
    'text-transform' => 'none',
   ),
  ),
  'heading4_typo'                           => array(
   'type'     => 'typography',
   'label'    => esc_html__( 'Heading 4', 'martfury' ),
   'section'  => 'heading_typo',
   'priority' => 10,
   'default'  => array(
    'font-family'    => 'Work Sans',
    'variant'        => '700',
    'font-size'      => '18px',
    'line-height'    => '1.2',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'color'          => '#000',
    'text-transform' => 'none',
   ),
  ),
  'heading5_typo'                           => array(
   'type'     => 'typography',
   'label'    => esc_html__( 'Heading 5', 'martfury' ),
   'section'  => 'heading_typo',
   'priority' => 10,
   'default'  => array(
    'font-family'    => 'Work Sans',
    'variant'        => '700',
    'font-size'      => '16px',
    'line-height'    => '1.2',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'color'          => '#000',
    'text-transform' => 'none',
   ),
  ),
  'heading6_typo'                           => array(
   'type'     => 'typography',
   'label'    => esc_html__( 'Heading 6', 'martfury' ),
   'section'  => 'heading_typo',
   'priority' => 10,
   'default'  => array(
    'font-family'    => 'Work Sans',
    'variant'        => '700',
    'font-size'      => '12px',
    'line-height'    => '1.2',
    'letter-spacing' => '0',
    'subsets'        => array( 'latin-ext' ),
    'color'          => '#000',
    'text-transform' => 'none',
   ),
  ),
  'menu_typo'                               => array(
   'type'     => 'typography',
   'label'    => esc_html__( 'Menu', 'martfury' ),
   'section'  => 'header_typo',
   'priority' => 10,
   'default'  => array(
    'font-family'    => 'Work Sans',
    'subsets'        => array( 'latin-ext' ),
    'font-size'      => '16px',
    'text-transform' => 'none',
   ),
  ),
  'mega_menu_typo'                          => array(
   'type'     => 'typography',
   'label'    => esc_html__( 'Mega Menu Heading', 'martfury' ),
   'section'  => 'header_typo',
   'priority' => 10,
   'default'  => array(
    'font-family'    => 'Work Sans',
    'variant'        => '600',
    'subsets'        => array( 'latin-ext' ),
    'font-size'      => '16px',
    'color'          => '#000',
    'text-transform' => 'none',
   ),
  ),
  'sub_menu_typo'                           => array(
   'type'     => 'typography',
   'label'    => esc_html__( 'Sub Menu', 'martfury' ),
   'section'  => 'header_typo',
   'priority' => 10,
   'default'  => array(
    'font-family'    => 'Work Sans',
    'variant'        => '400',
    'subsets'        => array( 'latin-ext' ),
    'font-size'      => '14px',
    'color'          => '#000',
    'text-transform' => 'none',
   ),
  ),
  'footer_typo'                             => array(
   'type'     => 'typography',
   'label'    => esc_html__( 'Footer', 'martfury' ),
   'section'  => 'footer_typo',
   'priority' => 10,
   'default'  => array(
    'font-family' => 'Work Sans',
    'variant'     => '400',
    'subsets'     => array( 'latin-ext' ),
    'font-size'   => '14px',
    'color'       => '#666',
   ),
  ),
  'footer_widget_typo'                      => array(
   'type'     => 'typography',
   'label'    => esc_html__( 'Widget Title', 'martfury' ),
   'section'  => 'footer_typo',
   'priority' => 10,
   'default'  => array(
    'font-family' => 'Work Sans',
    'variant'     => '600',
    'subsets'     => array( 'latin-ext' ),
    'font-size'   => '16px',
    'color'       => '#000',
   ),
  ),
  // 404
  'not_found_img'                           => array(
   'type'     => 'image',
   'label'    => esc_html__( 'Image', 'martfury' ),
   'section'  => 'not_found',
   'default'  => '',
   'priority' => 10,
  ),
  'not_found_bg'                            => array(
   'type'     => 'color',
   'label'    => esc_html__( 'Background Color', 'martfury' ),
   'default'  => '#efeef0',
   'section'  => 'not_found',
   'priority' => 10,
  ),

  // Coming Soon
  'show_coming_soon_logo'                   => array(
   'type'     => 'toggle',
   'label'    => esc_html__( 'Show Logo', 'martfury' ),
   'section'  => 'coming_soon',
   'default'  => 1,
   'priority' => 10,
  ),
  'coming_soon_logo'                        => array(
   'type'            => 'image',
   'label'           => esc_html__( 'Logo', 'martfury' ),
   'section'         => 'coming_soon',
   'default'         => '',
   'priority'        => 10,
   'active_callback' => array(
    array(
     'setting'  => 'show_coming_soon_logo',
     'operator' => '==',
     'value'    => 1,
    ),
   ),
  ),
  'show_coming_soon_socials'                => array(
   'type'        => 'toggle',
   'label'       => esc_html__( 'Show Socials', 'martfury' ),
   'section'     => 'coming_soon',
   'default'     => 1,
   'description' => esc_html__( 'Display social sharing icons on Coming Soon Page', 'martfury' ),
   'priority'    => 20,
  ),
  'coming_soon_socials'                     => array(
   'type'            => 'repeater',
   'label'           => esc_html__( 'Socials', 'martfury' ),
   'section'         => 'coming_soon',
   'priority'        => 60,
   'default'         => array(
    array(
     'link_url' => 'https://instagram.com/',
    ),
    array(
     'link_url' => 'https://facebook.com/',
    ),
    array(
     'link_url' => 'https://twitter.com/',
    ),
    array(
     'link_url' => 'https://youtube.com/',
    ),
   ),
   'fields'          => array(
    'link_url' => array(
     'type'        => 'text',
     'label'       => esc_html__( 'Social URL', 'martfury' ),
     'description' => esc_html__( 'Enter the URL for this social', 'martfury' ),
     'default'     => '',
    ),
   ),
   'active_callback' => array(
    array(
     'setting'  => 'show_coming_soon_socials',
     'operator' => '==',
     'value'    => 1,
    ),
   ),
  ),
  // Promotion
  'promotion'                               => array(
   'type'     => 'toggle',
   'label'    => esc_html__( 'Promotion', 'martfury' ),
   'section'  => 'promotion',
   'default'  => 0,
   'priority' => 10,
  ),
  'promotion_home_only'                     => array(
   'type'            => 'toggle',
   'label'           => esc_html__( 'Display On Homepage Only', 'martfury' ),
   'section'         => 'promotion',
   'default'         => 0,
   'priority'        => 10,
   'active_callback' => array(
    array(
     'setting'  => 'promotion',
     'operator' => '==',
     'value'    => '1',
    ),
   ),
  ),
  'promotion_close'                         => array(
   'type'            => 'toggle',
   'label'           => esc_html__( 'Show Close button', 'martfury' ),
   'default'         => '0',
   'section'         => 'promotion',
   'priority'        => 10,
   'active_callback' => array(
    array(
     'setting'  => 'promotion',
     'operator' => '==',
     'value'    => '1',
    ),
   ),
  ),
  'promotion_bg_color'                      => array(
   'type'            => 'color',
   'label'           => esc_html__( 'Background Color', 'martfury' ),
   'default'         => '',
   'section'         => 'promotion',
   'priority'        => 10,
   'active_callback' => array(
    array(
     'setting'  => 'promotion',
     'operator' => '==',
     'value'    => '1',
    ),
   ),
  ),
  'promotion_bg_image'                      => array(
   'type'            => 'image',
   'label'           => esc_html__( 'Background Image', 'martfury' ),
   'default'         => '',
   'section'         => 'promotion',
   'priority'        => 10,
   'active_callback' => array(
    array(
     'setting'  => 'promotion',
     'operator' => '==',
     'value'    => '1',
    ),
   ),
  ),
  'promotion_bg_horizontal'                 => array(
   'type'            => 'select',
   'label'           => esc_html__( 'Background Horizontal', 'martfury' ),
   'default'         => 'left',
   'section'         => 'promotion',
   'priority'        => 10,
   'choices'         => array(
    'left'   => esc_html__( 'Left', 'martfury' ),
    'right'  => esc_html__( 'Right', 'martfury' ),
    'center' => esc_html__( 'Center', 'martfury' ),
   ),
   'active_callback' => array(
    array(
     'setting'  => 'promotion',
     'operator' => '==',
     'value'    => '1',
    ),
   ),
  ),
  'promotion_bg_vertical'                   => array(
   'type'            => 'select',
   'label'           => esc_html__( 'Background Vertical', 'martfury' ),
   'default'         => 'top',
   'section'         => 'promotion',
   'priority'        => 10,
   'choices'         => array(
    'top'    => esc_html__( 'Top', 'martfury' ),
    'center' => esc_html__( 'Center', 'martfury' ),
    'bottom' => esc_html__( 'Bottom', 'martfury' ),
   ),
   'active_callback' => array(
    array(
     'setting'  => 'promotion',
     'operator' => '==',
     'value'    => '1',
    ),
   ),
  ),
  'promotion_bg_repeats'                    => array(
   'type'            => 'select',
   'label'           => esc_html__( 'Background Repeat', 'martfury' ),
   'default'         => 'repeat',
   'section'         => 'promotion',
   'priority'        => 10,
   'choices'         => array(
    'repeat'    => esc_html__( 'Repeat', 'martfury' ),
    'repeat-x'  => esc_html__( 'Repeat Horizontally', 'martfury' ),
    'repeat-y'  => esc_html__( 'Repeat Vertically', 'martfury' ),
    'no-repeat' => esc_html__( 'No Repeat', 'martfury' ),
   ),
   'active_callback' => array(
    array(
     'setting'  => 'promotion',
     'operator' => '==',
     'value'    => '1',
    ),
   ),
  ),
  'promotion_bg_attachments'                => array(
   'type'            => 'select',
   'label'           => esc_html__( 'Background Attachment', 'martfury' ),
   'default'         => 'scroll',
   'section'         => 'promotion',
   'priority'        => 10,
   'choices'         => array(
    'scroll' => esc_html__( 'Scroll', 'martfury' ),
    'fixed'  => esc_html__( 'Fixed', 'martfury' ),
   ),
   'active_callback' => array(
    array(
     'setting'  => 'promotion',
     'operator' => '==',
     'value'    => '1',
    ),
   ),
  ),
  'promotion_bg_size'                       => array(
   'type'            => 'select',
   'label'           => esc_html__( 'Background Size', 'martfury' ),
   'default'         => 'auto',
   'section'         => 'promotion',
   'priority'        => 10,
   'choices'         => array(
    'auto'    => esc_html__( 'Auto', 'martfury' ),
    'contain' => esc_html__( 'Contain', 'martfury' ),
    'cover'   => esc_html__( 'Cover', 'martfury' ),
   ),
   'active_callback' => array(
    array(
     'setting'  => 'promotion',
     'operator' => '==',
     'value'    => '1',
    ),
   ),
  ),
  'promotion_style'                         => array(
   'type'            => 'select',
   'label'           => esc_html__( 'Style', 'martfury' ),
   'default'         => '1',
   'section'         => 'promotion',
   'priority'        => 10,
   'choices'         => array(
    '1' => esc_html__( 'Style 1', 'martfury' ),
    '2' => esc_html__( 'Style 2', 'martfury' ),
   ),
   'active_callback' => array(
    array(
     'setting'  => 'promotion',
     'operator' => '==',
     'value'    => '1',
    ),
   ),
  ),
  'promotion_content'                       => array(
   'type'            => 'textarea',
   'label'           => esc_html__( 'Content', 'martfury' ),
   'section'         => 'promotion',
   'default'         => '',
   'priority'        => 10,
   'active_callback' => array(
    array(
     'setting'  => 'promotion',
     'operator' => '==',
     'value'    => '1',
    ),
   ),
  ),
  'promotion_button_text'                   => array(
   'type'            => 'text',
   'label'           => esc_html__( 'Button Text', 'martfury' ),
   'section'         => 'promotion',
   'default'         => '',
   'priority'        => 10,
   'active_callback' => array(
    array(
     'setting'  => 'promotion',
     'operator' => '==',
     'value'    => '1',
    ),
   ),
  ),
  'promotion_button_link'                   => array(
   'type'            => 'text',
   'label'           => esc_html__( 'Button Link', 'martfury' ),
   'section'         => 'promotion',
   'default'         => '',
   'priority'        => 10,
   'active_callback' => array(
    array(
     'setting'  => 'promotion',
     'operator' => '==',
     'value'    => '1',
    ),
   ),
  ),
  // Logo
  'logo'                                    => array(
   'type'        => 'image',
   'label'       => esc_html__( 'Logo', 'martfury' ),
   'description' => esc_html__( 'This logo is used for all site.', 'martfury' ),
   'section'     => 'logo',
   'default'     => '',
   'priority'    => 20,
  ),
  'logo_width'                              => array(
   'type'     => 'text',
   'label'    => esc_html__( 'Logo Width(px)', 'martfury' ),
   'section'  => 'logo',
   'priority' => 20,
   array(
    'setting'  => 'logo',
    'operator' => '!=',
    'value'    => '',
   ),
  ),
  'logo_height'                             => array(
   'type'     => 'text',
   'label'    => esc_html__( 'Logo Height(px)', 'martfury' ),
   'section'  => 'logo',
   'priority' => 20,
   array(
    'setting'  => 'logo',
    'operator' => '!=',
    'value'    => '',
   ),
  ),
  'logo_margins'                            => array(
   'type'     => 'spacing',
   'label'    => esc_html__( 'Logo Margin', 'martfury' ),
   'section'  => 'logo',
   'priority' => 20,
   'default'  => array(
    'top'    => '0',
    'bottom' => '0',
    'left'   => '0',
    'right'  => '0',
   ),
   array(
    'setting'  => 'logo',
    'operator' => '!=',
    'value'    => '',
   ),
  ),
  'sticky_header'                           => array(
   'type'     => 'toggle',
   'label'    => esc_html__( 'Sticky Header', 'martfury' ),
   'default'  => '0',
   'section'  => 'header_sticky',
   'priority' => 20,
  ),
  'sticky_header_logo'                      => array(
   'type'        => 'toggle',
   'label'       => esc_html__( 'Sticky Header Logo', 'martfury' ),
   'default'     => '0',
   'section'     => 'header_sticky',
   'priority'    => 20,
   'description' => esc_html__( 'Check this option to enable the header logo in the sticky header instead of the department.', 'martfury' ),
  ),
  'logo_sticky'                             => array(
   'type'            => 'image',
   'label'           => esc_html__( 'Logo', 'martfury' ),
   'description'     => esc_html__( 'This logo is used for the sticky header.', 'martfury' ),
   'section'         => 'header_sticky',
   'default'         => '',
   'priority'        => 20,
   'active_callback' => array(
    array(
     'setting'  => 'sticky_header_logo',
     'operator' => '==',
     'value'    => 1,
    ),
   ),
  ),
  // Header layout
  'header_full_width'                       => array(
   'type'            => 'toggle',
   'label'           => esc_html__( 'Header Full Width', 'martfury' ),
   'default'         => '0',
   'section'         => 'header',
   'priority'        => 20,
   'active_callback' => array(
    array(
     'setting'  => 'header_layout',
     'operator' => '!==',
     'value'    => '8',
    ),
   ),
  ),
  'header_layout'                           => array(
   'type'     => 'select',
   'label'    => esc_html__( 'Header Layout', 'martfury' ),
   'section'  => 'header',
   'default'  => '1',
   'priority' => 10,
   'choices'  => array(
    '1' => esc_html__( 'Header 1', 'martfury' ),
    '2' => esc_html__( 'Header 2', 'martfury' ),
    '3' => esc_html__( 'Header 3', 'martfury' ),
    '4' => esc_html__( 'Header 4', 'martfury' ),
    '5' => esc_html__( 'Header 5', 'martfury' ),
    '6' => esc_html__( 'Header 6', 'martfury' ),
    '7' => esc_html__( 'Header 7', 'martfury' ),
   ),
  ),
  'topbar'                                  => array(
   'type'        => 'toggle',
   'label'       => esc_html__( 'Enable Top Bar', 'martfury' ),
   'default'     => '0',
   'section'     => 'header',
   'priority'    => 20,
   'description' => esc_html__( 'Go to Appearance > Widgets > Topbar Left and Topbar Right to add widgets content.', 'martfury' ),
  ),
  'menu_extras'                             => array(
   'type'            => 'multicheck',
   'label'           => esc_html__( 'Elements', 'martfury' ),
   'section'         => 'header',
   'default'         => array( 'search', 'wishlist', 'cart', 'account', 'custom_text', 'department' ),
   'priority'        => 20,
   'choices'         => array(
    'search'     => esc_html__( 'Search', 'martfury' ),
    'compare'    => esc_html__( 'Compare', 'martfury' ),
    'wishlist'   => esc_html__( 'WishList', 'martfury' ),
    'cart'       => esc_html__( 'Cart', 'martfury' ),
    'account'    => esc_html__( 'Account', 'martfury' ),
    'department' => esc_html__( 'Department Menu', 'martfury' ),
    'hotline'    => esc_html__( 'Hotline', 'martfury' ),
   ),
   'active_callback' => array(
    array(
     'setting'  => 'header_layout',
     'operator' => 'in',
     'value'    => array( '1', '2', '3', '4', '5', '6', '7', '9' ),
    ),
   ),
  ),
  'menu_extras_8'                           => array(
   'type'            => 'multicheck',
   'label'           => esc_html__( 'Elements', 'martfury' ),
   'section'         => 'header',
   'default'         => array( 'search', 'wishlist', 'cart', 'account', 'menu', 'language' ),
   'priority'        => 20,
   'choices'         => array(
    'search'   => esc_html__( 'Search', 'martfury' ),
    'menu'     => esc_html__( 'Menu', 'martfury' ),
    'wishlist' => esc_html__( 'WishList', 'martfury' ),
    'cart'     => esc_html__( 'Cart', 'martfury' ),
    'account'  => esc_html__( 'Account', 'martfury' ),
    'language' => esc_html__( 'Language', 'martfury' ),
   ),
   'active_callback' => array(
    array(
     'setting'  => 'header_layout',
     'operator' => 'in',
     'value'    => array( '8' ),
    ),
   ),
  ),
  'user_logged_type'                        => array(
   'type'     => 'select',
   'label'    => esc_html__( 'User Logged In Type', 'martfury' ),
   'section'  => 'header_account',
   'default'  => 'icon',
   'priority' => 90,
   'choices'  => array(
    'icon'   => esc_html__( 'Icon', 'martfury' ),
    'avatar' => esc_html__( 'Avatar', 'martfury' ),
   ),
  ),
  'custom_menu_right'                       => array(
			'type'            => 'custom',
			'section'         => 'header',
			'default'         => '<hr>',
			'priority'        => 90,
			'active_callback' => array(
				array(
					'setting'  => 'header_layout',
					'operator' => 'in',
					'value'    => array( '1', '3', '6', '7' ),
				),
			),
		),
		'header_bar'                              => array(
			'type'            => 'toggle',
			'label'           => esc_html__( 'Enable Header Bar', 'martfury' ),
			'section'         => 'header',
			'default'         => 1,
			'priority'        => 90,
			'description'     => esc_html__( 'Go to Appearance > Widgets > Header Bar to add widgets content.', 'martfury' ),
			'active_callback' => array(
				array(
					'setting'  => 'header_layout',
					'operator' => 'in',
					'value'    => array( '1', '3', '6', '7' ),
				),
			),
		),
		'custom_department_text'                  => array(
			'type'     => 'text',
			'label'    => esc_html__( 'Department Text', 'martfury' ),
			'section'  => 'header_department',
			'default'  => esc_html__( 'Shop By Department', 'martfury' ),
			'priority' => 90,
		),
		'custom_department_link'                  => array(
			'type'     => 'text',
			'label'    => esc_html__( 'Department Link', 'martfury' ),
			'section'  => 'header_department',
			'priority' => 90,
		),
		'department_open_homepage'                => array(
			'type'     => 'select',
			'label'    => esc_html__( 'Department Menu on Homepage', 'martfury' ),
			'section'  => 'header_department',
			'default'  => 'open',
			'priority' => 90,
			'choices'  => array(
				'open'  => esc_html__( 'Open', 'martfury' ),
				'close' => esc_html__( 'Close', 'martfury' ),
			),
		),
		'department_space_homepage'               => array(
			'type'            => 'text',
			'label'           => esc_html__( 'Department Space on Homepage', 'martfury' ),
			'section'         => 'header_department',
			'default'         => '30px',
			'active_callback' => array(
				array(
					'setting'  => 'header_layout',
					'operator' => 'in',
					'value'    => array( '2', '3' ),
				),
			),

			'priority'    => 90,
			'description' => esc_html__( 'Enter space between the title and the menu content of department on homepage. Example 30px', 'martfury' ),
		),
		'department_space_2_homepage'             => array(
			'type'            => 'text',
			'label'           => esc_html__( 'Department Space on Homepage', 'martfury' ),
			'section'         => 'header_department',
			'default'         => '',
			'active_callback' => array(
				array(
					'setting'  => 'header_layout',
					'operator' => 'in',
					'value'    => array( '1', '4', '5', '6', '7', '9' ),
				),
			),

			'priority'    => 90,
			'description' => esc_html__( 'Enter space(px) between the title and the menu content of department on homepage. Example 30px', 'martfury' ),
		),
		'custom_hotline_text'                     => array(
			'type'     => 'text',
			'label'    => esc_html__( 'Hotline Text', 'martfury' ),
			'section'  => 'header_hotline',
			'default'  => esc_html__( 'Hotline', 'martfury' ),
			'priority' => 90,
		),
		'custom_hotline_number'                   => array(
			'type'     => 'text',
			'label'    => esc_html__( 'Hotline Number', 'martfury' ),
			'section'  => 'header_hotline',
			'priority' => 90,
			'default'  => '1-800-234-5678',
		),
		'search_form_type'                        => array(
			'type'     => 'select',
			'label'    => esc_html__( 'Search Form Type', 'martfury' ),
			'section'  => 'header_search_content',
			'default'  => 'default',
			'priority' => 90,
			'choices'  => array(
				'default'   => esc_html__( 'Default', 'martfury' ),
				'shortcode' => esc_html__( 'Use Shortcode', 'martfury' ),
			),
		),
		'search_form_shortcode'                   => array(
			'type'            => 'textarea',
			'label'           => esc_html__( 'Search Form', 'martfury' ),
			'section'         => 'header_search_content',
			'default'         => '',
			'description'     => esc_html__( 'Add search form using shortcode such as [aws_search_form id="1"]', 'martfury' ),
			'priority'        => 90,
			'active_callback' => array(
				array(
					'setting'  => 'search_form_type',
					'operator' => '==',
					'value'    => 'shortcode',
				),
			),
		),
		'search_content_type'                     => array(
			'type'            => 'select',
			'label'           => esc_html__( 'Search For', 'martfury' ),
			'section'         => 'header_search_content',
			'default'         => 'product',
			'priority'        => 90,
			'choices'         => array(
				'all'     => esc_html__( 'Everything', 'martfury' ),
				'product' => esc_html__( 'Only Products', 'martfury' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'search_form_type',
					'operator' => '==',
					'value'    => 'default',
				),
			),
		),
		'custom_search_categories'                => array(
			'type'            => 'custom',
			'label'           => '<hr>',
			'section'         => 'header_search_content',
			'default'         => '<h3>' . esc_html__( 'Product Categories', 'martfury' ) . '</h3>',
			'priority'        => 90,
			'active_callback' => array(
				array(
					'setting'  => 'search_form_type',
					'operator' => '==',
					'value'    => 'default',
				),
				array(
					'setting'  => 'search_content_type',
					'operator' => '==',
					'value'    => 'product',
				),
			),
		),
		'search_product_categories'               => array(
			'type'            => 'toggle',
			'label'           => esc_html__( 'Enable Categories', 'martfury' ),
			'section'         => 'header_search_content',
			'default'         => 1,
			'priority'        => 90,
			'active_callback' => array(
				array(
					'setting'  => 'search_form_type',
					'operator' => '==',
					'value'    => 'default',
				),
				array(
					'setting'  => 'search_content_type',
					'operator' => '==',
					'value'    => 'product',
				),
			),
		),
		'custom_categories_text'                  => array(
			'type'            => 'text',
			'label'           => esc_html__( 'Categories Text', 'martfury' ),
			'section'         => 'header_search_content',
			'default'         => esc_html__( 'All', 'martfury' ),
			'priority'        => 90,
			'active_callback' => array(
				array(
					'setting'  => 'search_form_type',
					'operator' => '==',
					'value'    => 'default',
				),
				array(
					'setting'  => 'search_content_type',
					'operator' => '==',
					'value'    => 'product',
				),
			),
		),
		'custom_categories_depth'                 => array(
			'type'            => 'number',
			'label'           => esc_html__( 'Categories Depth', 'martfury' ),
			'section'         => 'header_search_content',
			'default'         => 0,
			'priority'        => 90,
			'active_callback' => array(
				array(
					'setting'  => 'search_form_type',
					'operator' => '==',
					'value'    => 'default',
				),
				array(
					'setting'  => 'search_content_type',
					'operator' => '==',
					'value'    => 'product',
				),
			),
		),
		'custom_categories_include'               => array(
			'type'            => 'textarea',
			'label'           => esc_html__( 'Categories Include', 'martfury' ),
			'section'         => 'header_search_content',
			'default'         => '',
			'description'     => esc_html__( 'Enter Category IDs to include. Divide every category by comma(,)', 'martfury' ),
			'priority'        => 90,
			'active_callback' => array(
				array(
					'setting'  => 'search_form_type',
					'operator' => '==',
					'value'    => 'default',
				),
				array(
					'setting'  => 'search_content_type',
					'operator' => '==',
					'value'    => 'product',
				),
			),
		),
		'custom_categories_exclude'               => array(
			'type'            => 'textarea',
			'label'           => esc_html__( 'Categories Exclude', 'martfury' ),
			'section'         => 'header_search_content',
			'default'         => '',
			'description'     => esc_html__( 'Enter Category IDs to exclude. Divide every category by comma(,)', 'martfury' ),
			'priority'        => 90,
			'active_callback' => array(
				array(
					'setting'  => 'search_form_type',
					'operator' => '==',
					'value'    => 'default',
				),
				array(
					'setting'  => 'search_content_type',
					'operator' => '==',
					'value'    => 'product',
				),
			),
		),
		'custom_search_content'                   => array(
			'type'            => 'custom',
			'label'           => '<hr>',
			'section'         => 'header_search_content',
			'default'         => '<h3>' . esc_html__( 'Search Content', 'martfury' ) . '</h3>',
			'priority'        => 90,
			'active_callback' => array(
				array(
					'setting'  => 'search_form_type',
					'operator' => '==',
					'value'    => 'default',
				),
			),
		),
		'custom_search_text'                      => array(
			'type'            => 'text',
			'label'           => esc_html__( 'Search Text', 'martfury' ),
			'section'         => 'header_search_content',
			'default'         => esc_html__( "I'm shopping for...", 'martfury' ),
			'priority'        => 90,
			'active_callback' => array(
				array(
					'setting'  => 'search_form_type',
					'operator' => '==',
					'value'    => 'default',
				),
			),
		),
		'custom_search_button'                    => array(
			'type'            => 'textarea',
			'label'           => esc_html__( 'Button Text', 'martfury' ),
			'section'         => 'header_search_content',
			'default'         => esc_html__( 'Search', 'martfury' ),
			'priority'        => 90,
			'active_callback' => array(
				array(
					'setting'  => 'search_form_type',
					'operator' => '==',
					'value'    => 'default',
				),
			),
		),
		'custom_search_ajax'                      => array(
			'type'            => 'custom',
			'label'           => '<hr>',
			'section'         => 'header_search_content',
			'default'         => '<h3>' . esc_html__( 'Search AJAX', 'martfury' ) . '</h3>',
			'priority'        => 90,
			'active_callback' => array(
				array(
					'setting'  => 'search_form_type',
					'operator' => '==',
					'value'    => 'default',
				),
			),
		),
		'header_ajax_search'                      => array(
			'type'            => 'toggle',
			'label'           => esc_html__( 'AJAX Search', 'martfury' ),
			'section'         => 'header_search_content',
			'default'         => 1,
			'priority'        => 90,
			'description'     => esc_html__( 'Check this option to enable AJAX search in the header', 'martfury' ),
			'active_callback' => array(
				array(
					'setting'  => 'search_form_type',
					'operator' => '==',
					'value'    => 'default',
				),
			),
		),
		'header_ajax_search_results_number'       => array(
			'type'            => 'number',
			'label'           => esc_html__( 'AJAX Search Results Number', 'martfury' ),
			'section'         => 'header_search_content',
			'default'         => 7,
			'priority'        => 90,
			'description'     => esc_html__( 'The number of maximum results in the search box', 'martfury' ),
			'active_callback' => array(
				array(
					'setting'  => 'search_form_type',
					'operator' => '==',
					'value'    => 'default',
				),
			),
		),
		'header_hot_words_custom_'                => array(
			'type'            => 'custom',
			'label'           => '<hr>',
			'default'         => '<h3>' . esc_html__( 'Hot Words', 'martfury' ) . '</h3>',
			'section'         => 'header_search_content',
			'priority'        => 90,
			'active_callback' => array(
				array(
					'setting'  => 'header_layout',
					'operator' => '!==',
					'value'    => '8',
				),
			),
		),
		'header_hot_words_enable'                 => array(
			'type'            => 'toggle',
			'label'           => esc_html__( 'Enable Hot Words', 'martfury' ),
			'section'         => 'header_search_content',
			'default'         => 0,
			'priority'        => 90,
			'description'     => esc_html__( 'Check this option to enable hot words below search box in the header', 'martfury' ),
			'active_callback' => array(
				array(
					'setting'  => 'header_layout',
					'operator' => '!==',
					'value'    => '8',
				),
			),
		),
		'header_hot_words'                        => array(
			'type'            => 'repeater',
			'label'           => esc_html__( 'Hot Words', 'martfury' ),
			'section'         => 'header_search_content',
			'priority'        => 90,
			'default'         => array(),
			'row_label'       => array(
				'type'  => 'text',
				'value' => esc_html__( 'Word', 'martfury' ),
			),
			'fields'          => array(
				'text' => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Text', 'martfury' ),
					'default' => '',
				),
				'link' => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Link', 'martfury' ),
					'default' => '',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'header_layout',
					'operator' => '!==',
					'value'    => '8',
				),
			),
		),
		'header_recently_viewed'                  => array(
			'type'            => 'toggle',
			'section'         => 'header_recently_viewed',
			'label'           => esc_html__( 'Show Recently Viewed', 'martfury' ),
			'default'         => 1,
			'priority'        => 90,
			'active_callback' => array(
				array(
					'setting'  => 'header_layout',
					'operator' => 'in',
					'value'    => array( '3' ),
				),
			),
		),
		'header_recently_viewed_ajax'             => array(
			'type'            => 'toggle',
			'label'           => esc_html__( 'Loading with AJAX', 'martfury' ),
			'section'         => 'header_recently_viewed',
			'default'         => 1,
			'priority'        => 90,
			'description'     => esc_html__( 'Check this option to load the recently viewed products with AJAX.', 'martfury' ),
			'active_callback' => array(
				array(
					'setting'  => 'header_layout',
					'operator' => 'in',
					'value'    => array( '3' ),
				),
			),
		),
		'header_recently_viewed_title'            => array(
			'type'            => 'text',
			'label'           => esc_html__( 'Recently Viewed Title', 'martfury' ),
			'section'         => 'header_recently_viewed',
			'default'         => esc_html__( 'Your Recently Viewed', 'martfury' ),
			'priority'        => 90,
			'active_callback' => array(
				array(
					'setting'  => 'header_layout',
					'operator' => 'in',
					'value'    => array( '3' ),
				),
			),
		),
		'header_recently_viewed_link_text'        => array(
			'type'            => 'text',
			'label'           => esc_html__( 'View All Text', 'martfury' ),
			'section'         => 'header_recently_viewed',
			'default'         => '',
			'priority'        => 90,
			'active_callback' => array(
				array(
					'setting'  => 'header_layout',
					'operator' => 'in',
					'value'    => array( '3' ),
				),
			),
		),
		'header_recently_viewed_link_url'         => array(
			'type'            => 'text',
			'label'           => esc_html__( 'View All Link', 'martfury' ),
			'section'         => 'header_recently_viewed',
			'default'         => '',
			'priority'        => 90,
			'active_callback' => array(
				array(
					'setting'  => 'header_layout',
					'operator' => 'in',
					'value'    => array( '3' ),
				),
			),
		),
		'header_recently_viewed_number'           => array(
			'type'            => 'number',
			'label'           => esc_html__( 'Products Number', 'martfury' ),
			'section'         => 'header_recently_viewed',
			'default'         => 12,
			'priority'        => 90,
			'active_callback' => array(
				array(
					'setting'  => 'header_layout',
					'operator' => 'in',
					'value'    => array( '3' ),
				),
			),
		),
		// Header Skin
		'custom_header_skin'                      => array(
			'type'     => 'toggle',
			'label'    => esc_html__( 'Custom Header Skin', 'martfury' ),
			'section'  => 'header_skin',
			'default'  => '1',
			'priority' => 20,
		),
		'topbar_bg_color'                         => array(
			'type'            => 'color',
			'label'           => esc_html__( 'Top Bar Background Color', 'martfury' ),
			'default'         => '',
			'section'         => 'header_skin',
			'priority'        => 20,
			'choices'         => array(
				'alpha' => true,
			),
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '#topbar',
					'property' => 'background-color',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'custom_header_skin',
					'operator' => '==',
					'value'    => '1',
				),
			),
		),
		'topbar_text_color'                       => array(
			'type'            => 'color',
			'label'           => esc_html__( 'Top Bar Text Color', 'martfury' ),
			'default'         => '',
			'section'         => 'header_skin',
			'priority'        => 20,
			'choices'         => array(
				'alpha' => true,
			),
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '#topbar, #topbar a, #topbar #lang_sel > ul > li > a, #topbar .mf-currency-widget .current:after, #topbar  .lang_sel > ul > li > a:after, #topbar  #lang_sel > ul > li > a:after',
					'property' => 'color',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'custom_header_skin',
					'operator' => '==',
					'value'    => '1',
				),
			),
		),
		'topbar_hover_color'                      => array(
			'type'            => 'color',
			'label'           => esc_html__( 'Top Bar Hover Color', 'martfury' ),
			'default'         => '',
			'section'         => 'header_skin',
			'priority'        => 20,
			'choices'         => array(
				'alpha' => true,
			),
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '#topbar a:hover, #topbar .mf-currency-widget .current:hover, #topbar #lang_sel > ul > li > a:hover',
					'property' => 'color',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'custom_header_skin',
					'operator' => '==',
					'value'    => '1',
				),
			),
		),
		'topbar_border_color'                     => array(
			'type'            => 'color',
			'label'           => esc_html__( 'Top Bar Border Color', 'martfury' ),
			'default'         => '',
			'section'         => 'header_skin',
			'priority'        => 20,
			'choices'         => array(
				'alpha' => true,
			),
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '#topbar .widget:after',
					'property' => 'background-color',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'custom_header_skin',
					'operator' => '==',
					'value'    => '1',
				),
			),
		),
		'topbar_custom_1'                         => array(
			'type'            => 'custom',
			'default'         => '<hr/>',
			'section'         => 'header_skin',
			'priority'        => 20,
			'active_callback' => array(
				array(
					'setting'  => 'custom_header_skin',
					'operator' => '==',
					'value'    => '1',
				),
			),
		),
		'header_bg_color'                         => array(
			'type'            => 'color',
			'label'           => esc_html__( 'Search Bar Background Color', 'martfury' ),
			'default'         => '',
			'section'         => 'header_skin',
			'priority'        => 20,
			'choices'         => array(
				'alpha' => true,
			),
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '#site-header, #site-header .header-main',
					'property' => 'background-color',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'custom_header_skin',
					'operator' => '==',
					'value'    => '1',
				),
			),
		),
		'header_text_color'                       => array(
			'type'            => 'color',
			'label'           => esc_html__( 'Search Bar Text Color', 'martfury' ),
			'default'         => '',
			'section'         => 'header_skin',
			'priority'        => 20,
			'choices'         => array(
				'alpha' => true,
			),
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '#site-header .extras-menu > li > a, #site-header .product-extra-search .hot-words li a, #site-header .menu-item-hotline .hotline-content,#site-header .extras-menu .menu-item-hotline .extra-icon, #site-header .extras-menu .menu-item-hotline .hotline-content label',
					'property' => 'color',
				),
				array(
					'element'  => '#site-header .header-logo .products-cats-menu .cats-menu-title,#site-header .header-logo .products-cats-menu .cats-menu-title .text, #site-header .mobile-menu-row .mf-toggle-menu',
					'property' => 'color',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'custom_header_skin',
					'operator' => '==',
					'value'    => '1',
				),
			),
		),
		'header_hover_color'                      => array(
			'type'            => 'color',
			'label'           => esc_html__( 'Search Bar Hover Color', 'martfury' ),
			'default'         => '',
			'section'         => 'header_skin',
			'priority'        => 20,
			'choices'         => array(
				'alpha' => true,
			),
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '#site-header:not(.minimized) .product-extra-search .hot-words li a:hover',
					'property' => 'color',
				),
				array(
					'element'  => '#site-header .header-bar a:hover,#site-header .primary-nav > ul > li > a:hover, #site-header .header-bar a:hover',
					'property' => 'color',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'custom_header_skin',
					'operator' => '==',
					'value'    => '1',
				),
			),
		),
		'search_button_bg_color'                  => array(
			'type'            => 'color',
			'label'           => esc_html__( 'Button & Counter Background Color', 'martfury' ),
			'default'         => '',
			'section'         => 'header_skin',
			'priority'        => 20,
			'choices'         => array(
				'alpha' => true,
			),
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '#site-header .product-extra-search .search-submit, #site-header .extras-menu > li > a .mini-item-counter',
					'property' => 'background-color',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'custom_header_skin',
					'operator' => '==',
					'value'    => '1',
				),
			),
		),
		'search_button_text_color'                => array(
			'type'            => 'color',
			'label'           => esc_html__( 'Button & Counter Text Color', 'martfury' ),
			'default'         => '',
			'section'         => 'header_skin',
			'priority'        => 20,
			'choices'         => array(
				'alpha' => true,
			),
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '#site-header .product-extra-search .search-submit, #site-header .extras-menu > li > a .mini-item-counter',
					'property' => 'color',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'custom_header_skin',
					'operator' => '==',
					'value'    => '1',
				),
			),
		),
		'menu_bar_custom_1'                       => array(
			'type'            => 'custom',
			'default'         => '<hr/>',
			'section'         => 'header_skin',
			'priority'        => 20,
			'active_callback' => array(
				array(
					'setting'  => 'custom_header_skin',
					'operator' => '==',
					'value'    => '1',
				),
			),
		),
		'shop_department_border_color'            => array(
			'type'            => 'color',
			'label'           => esc_html__( 'Shop By Department Border Color', 'martfury' ),
			'default'         => '',
			'section'         => 'header_skin',
			'priority'        => 20,
			'choices'         => array(
				'alpha' => true,
			),
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '.header-layout-3 #site-header .products-cats-menu:before, .header-layout-1 #site-header .products-cats-menu:before',
					'property' => 'background-color',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'custom_header_skin',
					'operator' => '==',
					'value'    => '1',
				),
				array(
					'setting'  => 'header_layout',
					'operator' => 'in',
					'value'    => array( '1', '3', '7' ),
				),
			),
		),
		'menu_bar_bg_color'                       => array(
			'type'            => 'color',
			'label'           => esc_html__( 'Menu Bar Background Color', 'martfury' ),
			'default'         => '',
			'section'         => 'header_skin',
			'priority'        => 20,
			'choices'         => array(
				'alpha' => true,
			),
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '#site-header .main-menu',
					'property' => 'background-color',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'custom_header_skin',
					'operator' => '==',
					'value'    => '1',
				),
			),
		),
		'menu_bar_text_color'                     => array(
			'type'            => 'color',
			'label'           => esc_html__( 'Menu Bar Text Color', 'martfury' ),
			'default'         => '',
			'section'         => 'header_skin',
			'priority'        => 20,
			'choices'         => array(
				'alpha' => true,
			),
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '#site-header .header-bar a, #site-header .recently-viewed .recently-title,#site-header:not(.minimized) .main-menu .products-cats-menu .cats-menu-title .text, #site-header:not(.minimized) .main-menu .products-cats-menu .cats-menu-title, #site-header .main-menu .primary-nav > ul > li > a, #site-header .main-menu .header-bar',
					'property' => 'color',
				),
				array(
					'element'  => '#site-header .header-bar #lang_sel > ul > li > a, #site-header .header-bar .lang_sel > ul > li > a, #site-header .header-bar #lang_sel > ul > li > a:after, #site-header .header-bar .lang_sel > ul > li > a:after, #site-header .header-bar .mf-currency-widget .current:after',
					'property' => 'color',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'custom_header_skin',
					'operator' => '==',
					'value'    => '1',
				),
			),
		),
		'menu_bar_hover_color'                    => array(
			'type'            => 'color',
			'label'           => esc_html__( 'Menu Bar Hover Color', 'martfury' ),
			'default'         => '',
			'section'         => 'header_skin',
			'priority'        => 20,
			'choices'         => array(
				'alpha' => true,
			),
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '#site-header .header-bar a:hover,#site-header .primary-nav > ul > li:hover > a, #site-header .header-bar #lang_sel  > ul > li > a:hover, #site-header .header-bar .lang_sel > ul > li > a:hover, #site-header .header-bar #lang_sel > ul > li > a:hover:after, #site-header .header-bar .lang_sel > ul > li > a:hover:after, #site-header .header-bar .mf-currency-widget .current:hover,#site-header .header-bar .mf-currency-widget .current:hover:after',
					'property' => 'color',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'custom_header_skin',
					'operator' => '==',
					'value'    => '1',
				),
			),
		),
		'menu_bar_active_color'                   => array(
			'type'            => 'color',
			'label'           => esc_html__( 'Menu Bar Active Color', 'martfury' ),
			'default'         => '',
			'section'         => 'header_skin',
			'priority'        => 20,
			'choices'         => array(
				'alpha' => true,
			),
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '#site-header .primary-nav > ul > li.current-menu-parent > a, #site-header .primary-nav > ul > li.current-menu-item > a, #site-header .primary-nav > ul > li.current-menu-ancestor > a',
					'property' => 'color',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'custom_header_skin',
					'operator' => '==',
					'value'    => '1',
				),
			),
		),
		'menu_bar_border_color'                   => array(
			'type'            => 'color',
			'label'           => esc_html__( 'Menu Bar Border Color', 'martfury' ),
			'default'         => '',
			'section'         => 'header_skin',
			'priority'        => 20,
			'choices'         => array(
				'alpha' => true,
			),
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '#site-header .main-menu',
					'property' => 'border-color',
				),
				array(
					'element'  => '#site-header .header-bar .widget:after',
					'property' => 'background-color',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'custom_header_skin',
					'operator' => '==',
					'value'    => '1',
				),
			),
		),
		'header_bottom_custom_1'                  => array(
			'type'            => 'custom',
			'default'         => '<hr/>',
			'section'         => 'header_skin',
			'priority'        => 20,
			'active_callback' => array(
				array(
					'setting'  => 'custom_header_skin',
					'operator' => '==',
					'value'    => '1',
				),
			),
		),
		'header_bottom_bg'                        => array(
			'type'            => 'image',
			'label'           => esc_html__( 'Header Bottom Background', 'martfury' ),
			'section'         => 'header_skin',
			'default'         => '',
			'priority'        => 20,
			'active_callback' => array(
				array(
					'setting'  => 'custom_header_skin',
					'operator' => '==',
					'value'    => '1',
				),
			),

		),
		'header_bottom_height'                    => array(
			'type'            => 'number',
			'label'           => esc_html__( 'Header Bottom Height', 'martfury' ),
			'section'         => 'header_skin',
			'default'         => 9,
			'priority'        => 20,
			'choices'         => [
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			],
			'active_callback' => array(
				array(
					'setting'  => 'custom_header_skin',
					'operator' => '==',
					'value'    => '1',
				),
			),

		),
  // Footer
		'footer_skin'                        => array(
			'type'     => 'select',
			'label'    => esc_html__( 'Footer Skin', 'martfury' ),
			'section'  => 'footer',
			'default'  => 'light',
			'priority' => 20,
			'choices'  => array(
				'light'  => esc_html__( 'Light', 'martfury' ),
				'gray'   => esc_html__( 'Gray', 'martfury' ),
				'custom' => esc_html__( 'Custom', 'martfury' ),
			),
		),
		'footer_bg_color'                    => array(
			'type'            => 'color',
			'label'           => esc_html__( 'Custom Footer Skin', 'martfury' ),
			'default'         => '',
			'section'         => 'footer',
			'priority'        => 20,
			'choices'         => array(
				'alpha' => true,
			),
			'active_callback' => array(
				array(
					'setting'  => 'footer_skin',
					'operator' => '==',
					'value'    => 'custom',
				),
			),
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '.site-footer .footer-layout',
					'property' => 'background-color',
				),
			)
		),
		'footer_heading_color'               => array(
			'type'            => 'color',
			'label'           => esc_html__( 'Footer Heading Color', 'martfury' ),
			'default'         => '',
			'section'         => 'footer',
			'priority'        => 20,
			'choices'         => array(
				'alpha' => true,
			),
			'active_callback' => array(
				array(
					'setting'  => 'footer_skin',
					'operator' => '==',
					'value'    => 'custom',
				),
			),
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '.site-footer h1, .site-footer h2, .site-footer h3, .site-footer h4, .site-footer h5, .site-footer h6, .site-footer .widget .widget-title',
					'property' => 'color',
				),
			)
		),
		'footer_text_color'                  => array(
			'type'            => 'color',
			'label'           => esc_html__( 'Footer Text Color', 'martfury' ),
			'default'         => '',
			'section'         => 'footer',
			'priority'        => 20,
			'choices'         => array(
				'alpha' => true,
			),
			'active_callback' => array(
				array(
					'setting'  => 'footer_skin',
					'operator' => '==',
					'value'    => 'custom',
				),
			),
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '.site-footer, .site-footer .footer-widgets .widget ul li a, .site-footer .footer-copyright, .site-footer .footer-links .widget_nav_menu ul li a, .site-footer .footer-payments .text',
					'property' => 'color',
				),
			)
		),
		'footer_hover_color'                 => array(
			'type'            => 'color',
			'label'           => esc_html__( 'Footer Hover Color', 'martfury' ),
			'default'         => '',
			'section'         => 'footer',
			'priority'        => 20,
			'choices'         => array(
				'alpha' => true,
			),
			'active_callback' => array(
				array(
					'setting'  => 'footer_skin',
					'operator' => '==',
					'value'    => 'custom',
				),
			),
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '.site-footer .footer-widgets .widget ul li a:hover,.site-footer .footer-links .widget_nav_menu ul li a:hover',
					'property' => 'color',
				),
				array(
					'element'  => '.site-footer .footer-widgets .widget ul li a:before, .site-footer .footer-links .widget_nav_menu ul li a:before',
					'property' => 'background-color',
				),
			)
		),
		'footer_border_color'                => array(
			'type'            => 'color',
			'label'           => esc_html__( 'Footer Border Color', 'martfury' ),
			'default'         => '',
			'section'         => 'footer',
			'priority'        => 20,
			'choices'         => array(
				'alpha' => true,
			),
			'active_callback' => array(
				array(
					'setting'  => 'footer_skin',
					'operator' => '==',
					'value'    => 'custom',
				),
			),
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '.site-footer .footer-newsletter, .site-footer .footer-info, .site-footer .footer-widgets, .site-footer .footer-links',
					'property' => 'border-color',
				),
				array(
					'element'  => '.site-footer .footer-info .info-item-sep:after',
					'property' => 'background-color',
				),
			)
		),
		'footer_full_width'                  => array(
			'type'     => 'toggle',
			'label'    => esc_html__( 'Footer Full Width', 'martfury' ),
			'default'  => '0',
			'section'  => 'footer',
			'priority' => 20,
		),
		'footer_newsletter'                  => array(
			'type'        => 'toggle',
			'label'       => esc_html__( 'Show Footer Newsletter', 'martfury' ),
			'section'     => 'footer_newsletter',
			'default'     => 0,
			'description' => esc_html__( 'Check this option to the newsletter in the footer.', 'martfury' ),
			'priority'    => 20,
		),
		'footer_newsletter_text'             => array(
			'type'     => 'textarea',
			'label'    => esc_html__( 'Newsletter Text', 'martfury' ),
			'section'  => 'footer_newsletter',
			'default'  => '',
			'priority' => 20,
		),
		'footer_newsletter_form'             => array(
			'type'        => 'textarea',
			'label'       => esc_html__( 'Newsletter Form', 'martfury' ),
			'description' => esc_html__( 'Enter the shortcode of MailChimp form', 'martfury' ),
			'section'     => 'footer_newsletter',
			'default'     => '',
			'priority'    => 20,
		),
		'custom_newsletter_form_2'           => array(
			'type'     => 'custom',
			'section'  => 'footer_newsletter',
			'default'  => sprintf( '<a href="%s">%s</a>', admin_url( 'admin.php?page=mailchimp-for-wp-forms' ), esc_html__( 'Go to MailChimp form', 'martfury' ) ),
			'priority' => 20,
		),
		'footer_info'                        => array(
			'type'        => 'toggle',
			'label'       => esc_html__( 'Show Footer Info', 'martfury' ),
			'section'     => 'footer_info',
			'default'     => 0,
			'description' => esc_html__( 'Check this option to the info in the footer.', 'martfury' ),
			'priority'    => 20,
		),
		'footer_info_list'                   => array(
			'type'      => 'repeater',
			'label'     => esc_html__( 'Footer Info', 'martfury' ),
			'section'   => 'footer_info',
			'priority'  => 20,
			'row_label' => array(
				'type'  => 'text',
				'value' => esc_html__( 'Icon Box', 'martfury' ),
			),
			'fields'    => array(
				'icon'  => array(
					'type'    => 'textarea',
					'label'   => esc_html__( 'Icon', 'martfury' ),
					'default' => '',
				),
				'title' => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Title', 'martfury' ),
					'default' => '',
				),
				'desc'  => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Description', 'martfury' ),
					'default' => '',
				),
			),
		),
		'footer_widgets'                     => array(
			'type'     => 'toggle',
			'label'    => esc_html__( 'Show Footer Widgets', 'martfury' ),
			'section'  => 'footer_widgets',
			'default'  => 1,
			'priority' => 20,
		),
		'footer_widget_columns'              => array(
			'type'        => 'select',
			'label'       => esc_html__( 'Footer Columns', 'martfury' ),
			'section'     => 'footer_widgets',
			'default'     => '4',
			'description' => esc_html__( 'Go to Appearance - Widgets - Footer 1, 2, 3, 4, 5, 6 to add widgets content.', 'martfury' ),
			'priority'    => 20,
			'choices'     => array(
				'4' => esc_html__( '4 Columns', 'martfury' ),
				'3' => esc_html__( '3 Columns', 'martfury' ),
				'5' => esc_html__( '5 Columns', 'martfury' ),
				'6' => esc_html__( '6 Columns', 'martfury' ),
			),

		),
		'footer_links'                       => array(
			'type'        => 'toggle',
			'label'       => esc_html__( 'Show Footer Links', 'martfury' ),
			'section'     => 'footer_links',
			'default'     => 1,
			'description' => esc_html__( 'Go to Appearance > Widgets > Footer Links to add widgets content.', 'martfury' ),
			'priority'    => 20,
		),
		'custom_footer_copyright'            => array(
			'type'     => 'custom',
			'section'  => 'footer',
			'default'  => '<hr>',
			'priority' => 20,
		),
		'footer_copyright'                   => array(
			'type'        => 'textarea',
			'label'       => esc_html__( 'Footer Copyright', 'martfury' ),
			'description' => esc_html__( 'Shortcodes are allowed', 'martfury' ),
			'section'     => 'footer',
			'default'     => esc_html__( 'Copyright &copy; 2018', 'martfury' ),
			'priority'    => 20,
		),
		'footer_payment_text'                => array(
			'type'     => 'text',
			'label'    => esc_html__( 'Footer Payment Text', 'martfury' ),
			'section'  => 'footer',
			'priority' => 20,
		),
		'footer_payment_images'              => array(
			'type'      => 'repeater',
			'label'     => esc_html__( 'Footer Images', 'martfury' ),
			'section'   => 'footer',
			'priority'  => 40,
			'row_label' => array(
				'type'  => 'text',
				'value' => esc_html__( 'Image', 'martfury' ),
			),
			'fields'    => array(
				'image' => array(
					'type'    => 'image',
					'label'   => esc_html__( 'Image', 'martfury' ),
					'default' => '',
				),
			),
		),
	);
 $settings['panels']   = apply_filters( 'martfury_customize_panels', $panels );
	$settings['sections'] = apply_filters( 'martfury_customize_sections', $sections );
	$settings['fields']   = apply_filters( 'martfury_customize_fields', $fields );

	return $settings;  
} // End pardus_customize_settings

$pardus_customize = new Pardus_Customize( pardus_customize_settings() );


