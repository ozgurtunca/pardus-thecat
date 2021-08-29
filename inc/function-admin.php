<?php 
/**
*     @package pardusthecat
*
*     ====================================================================
*             ADMIN PAGE
*     ====================================================================
*/
function pardus_add_admin_page() {
  // Generate menu 
  add_menu_page( 'Pardus Theme Options', 'Pardus-TheCat', 'manage_options', 'pardus_thecat', 'pardus_theme_sidebar_page', get_template_directory_uri() . '/img/pardus-admin.png', 110 );

  // Generate sub-menu
  // add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function = '')
  add_submenu_page( 'pardus_thecat', 'Pardus Theme Sidebar Options', 'Sidebar Options', 'manage_options',  'pardus_thecat', 'pardus_theme_sidebar_page');
  add_submenu_page( 'pardus_thecat', "Pardus Theme Options", 'Theme Options', 'manage_options',  'pardus_theme', 'pardus_theme_support_page');
  add_submenu_page( 'pardus_thecat', "Pardus Contact Form", 'Contact Form', 'manage_options',  'pardus_theme_contact', 'pardus_theme_contact_page');
  add_submenu_page( 'pardus_thecat', "Pardus Portfolio", 'Portfolio', 'manage_options',  'pardus_portfolio_activation', 'pardus_portfolio_page');
  add_submenu_page( 'pardus_thecat', "Pardus Custom CSS", 'Custom CSS', 'manage_options',  'pardus_custom_css_slug', 'pardus_custom_css_page');
  //Activate custom settings
  add_action( 'admin_init' , 'pardus_custom_settings');
}
// Add action 
  add_action('admin_menu', 'pardus_add_admin_page');

function pardus_custom_settings() {
  // Register settings
  // Sidebar
  register_setting( 'pardus-settings-group', 'profile_image');
  register_setting( 'pardus-settings-group', 'first_name');
  register_setting( 'pardus-settings-group', 'last_name');
  register_setting( 'pardus-settings-group', 'user_description');
  register_setting( 'pardus-settings-group', 'twitter_handler', 'pardus_sanitize_twitter_handler');
  register_setting( 'pardus-settings-group', 'facebook_handler' );
  register_setting( 'pardus-settings-group', 'instagram_handler');
  // Theme options
  register_setting( 'pardus-theme-support', 'post_formats');
  register_setting( 'pardus-theme-support', 'custom_header');
  register_setting( 'pardus-theme-support', 'custom_background');
  // Contact Form options
  register_setting( 'pardus-contact-options', 'activate_contact_form');
  // Portfolio options
  register_setting( 'pardus-portfolio-activate', 'activate_portfolio');
  //Custom CSS options
  register_setting( 'pardus-custom-css', 'pardus_css', 'custom_css_sanitize');

  // Settings sections
  // add_settings_section ($id, $title, $call_back, $page)
  // Sidebar 
  add_settings_section( 'pardus-sidebar-profile-options', __( 'Sidebar Profile Options', 'pardus-thecat' ), 'pardus_sidebar_profile_options', 'pardus_thecat');
  // Theme options
  add_settings_section( 'pardus-theme-options', __( 'Theme Options', 'pardus-thecat' ), 'pardus_theme_options', 'pardus_theme');
  // Contact Form
  add_settings_section( 'pardus-contact-section', __( 'Contact Form', 'pardus-thecat' ), 'pardus_contact_section', 'pardus_theme_contact');
  // Contact Form
  add_settings_section( 'pardus-portfolio-section', __( 'Portfolio', 'pardus-thecat' ), 'pardus_portfolio_section', 'pardus_portfolio_activation');
  // Custom CSS
  add_settings_section( 'pardus-custom-css-section', __( 'Custom CSS', 'pardus-thecat' ), 'pardus_custom_css_section', 'pardus_custom_css_slug');

  // Settngs fields
  // add_settings_field( $id, $title, $callback, $page, $section = 'default', array $args = array() )
  // Sidebar
  add_settings_field( 'sidebar-profile-image', __( 'Profile Image', 'pardus-thecat' ), 'pardus_sidebar_profile_image', 'pardus_thecat', 'pardus-sidebar-profile-options' );
  add_settings_field( 'sidebar-name', __( 'Full Name', 'pardus-thecat' ), 'pardus_sidebar_name', 'pardus_thecat', 'pardus-sidebar-profile-options' );
  add_settings_field( 'sidebar-description', __( 'Description', 'pardus-thecat' ), 'pardus_sidebar_description', 'pardus_thecat', 'pardus-sidebar-profile-options' );
  add_settings_field( 'sidebar-twitter', __( 'Twitter', 'pardus-thecat' ), 'pardus_sidebar_twitter', 'pardus_thecat', 'pardus-sidebar-profile-options' );
  add_settings_field( 'sidebar-facebook', __( 'Facebook', 'pardus-thecat' ), 'pardus_sidebar_facebook', 'pardus_thecat', 'pardus-sidebar-profile-options' );
  add_settings_field( 'sidebar-instagram', __( 'Instagram', 'pardus-thecat' ), 'pardus_sidebar_instagram', 'pardus_thecat', 'pardus-sidebar-profile-options' );
  // Theme options
  add_settings_field( 'post-formats', __( 'Post Formats', 'pardus-thecat' ), 'pardus_post_formats', 'pardus_theme', 'pardus-theme-options' );
  add_settings_field( 'custom-header', __( 'Custom Header', 'pardus-thecat' ), 'pardus_custom_header', 'pardus_theme', 'pardus-theme-options' );
  add_settings_field( 'custom-background', __( 'Custom Background Image', 'pardus-thecat' ), 'pardus_custom_background', 'pardus_theme', 'pardus-theme-options' );
  // Contact form options
  add_settings_field( 'activate-form', __( 'Activate Control Form', 'pardus-thecat' ), 'pardus_activate_contact', 'pardus_theme_contact', 'pardus-contact-section' );
  add_settings_field( 'activate-portfolio', __( 'Activate Portfolio Post Type', 'pardus-thecat' ), 'pardus_theme_portfolio', 'pardus_portfolio_activation', 'pardus-portfolio-section' );
  // Custom CSS
  add_settings_field( 'thecat-custom-css', __( 'Insert Custom CSS', 'pardus-thecat' ), 'pardus_custom_css_callback', 'pardus_custom_css_slug', 'pardus-custom-css-section' );
} 

// Sidebar admin (first) page template
function pardus_theme_sidebar_page() {
  require_once( get_template_directory() . '/inc/templates/pardus-sidebar.php' );
}
// Theme support page template
function pardus_theme_support_page() {
  require_once( get_template_directory() . '/inc/templates/pardus-theme-options.php' );
}
// Contact from page template
function pardus_theme_contact_page() {
  require_once( get_template_directory() . '/inc/templates/pardus-contact.php' );
}
function pardus_portfolio_page(){
  require_once( get_template_directory() . '/inc/templates/pardus-portfolio.php' );
}
function pardus_custom_css_page(){
  require_once( get_template_directory() . '/inc/templates/pardus-customcss.php' );
}

// Sidebar section functions description
function pardus_sidebar_profile_options() {
  echo __( 'Customize Sidebar Profile Options', 'pardus-thecat' );
}
// Theme supoort page description
function pardus_theme_options(){
  echo 
  __( 'Activate and Deavtivate Specific Theme Support Options', 'pardus-thecat' );
}
// Contact form page description
function pardus_contact_section(){
  echo 
  __( 'Activate and Deactivate Built-in Contact Form', 'pardus-thecat' );
}
// Portfolio post type description
function pardus_portfolio_section(){
   echo 
   __( 'Activate and Deactivate Portfolio Post Type', 'pardus-thecat' );
}
// Custom Css description
function pardus_custom_css_section(){
  echo 
  __( 'MessaInsert Your Custom CSSges', 'pardus-thecat' );
}

// =================================
//    SIDE BAR 
// =================================

// Sidebar Profile Image options
function pardus_sidebar_profile_image() {
  $image = esc_attr( get_option( 'profile_image' ) );
  if ( empty($image) ) {
    echo '
    <input type="button" name="profile_image" value="Upload profile image" id="upload-button" class="button button-secondary">
    <p class="description">
      <b><label id="image-file"></label></b>
    </p>
    <input type="hidden" name="profile_image" value="' . $image . '" id="profile-image">
  ';
  } else {
    echo '
    <input type="button" name="profile_image" value="Replace profile image" id="upload-button" class="button button-secondary">
    <input type="button" value="Remove" id="remove-picture" class="button button-secondary">
    <p class="description">
      <b><label id="image-file"></label></b>
    </p>
    <input type="hidden" name="profile_image" value="'.$image .'" id="profile-image">
    ';
  }
}
// Sidebar Full Name
function pardus_sidebar_name() {

  $firstName = esc_attr( get_option( ' first_name' ) );
  $lastName = esc_attr( get_option( ' last_name' ) );
  echo '
  <input type="text" name="first_name" placeholder="' . __( 'First Name', 'pardus-thecat' ) . '" value="' . $firstName . '">
  <input type="text" name="last_name" placeholder="'.  __( 'Last Name', 'pardus-thecat' ) .'" value="' . $lastName . '">
  ';
}
// Sidebar Profile description (About me)
function pardus_sidebar_description() {
  $description = esc_attr( get_option( ' user_description' ) );
  echo '
  <input type="text" name="user_description" placeholder="'.  __( 'Briefly about yourself', 'pardus-thecat' ) .'" value="' . $description . '">
  ';
}
// Social media information - Twitter
function pardus_sidebar_twitter(){
  $twitter = esc_attr( get_option( ' twitter_handler' ) );
  echo '
    <input type="text" name="twitter_handler" placeholder="'.  __( 'Twitter handler', 'pardus-thecat' ) .'" value="' . $twitter . '">
    <p class="description">'.  __( 'Input your twitter username without the @ character.', 'pardus-thecat' ) .'</p>
  ';
}
// Social media information - Facebook
function pardus_sidebar_facebook(){
  $facebook = esc_attr( get_option( ' facebook_handler' ) );
  echo '
    <input type="text" name="facebook_handler" placeholder="'.  __( 'Facebook handler', 'pardus-thecat' ) .'" value="' . $facebook . '">
  ';
}
// Social media information - Instagram
function pardus_sidebar_instagram(){
  $twitter = esc_attr( get_option( ' instagram_handler' ) );
  echo '
    <input type="text" name="instagram_handler" placeholder="'.  __( 'Instagram handler', 'pardus-thecat' ) .'" value="' . $twitter . '">
    <p class="description">'.  __( 'Input your twitter username without the @ character.', 'pardus-thecat' ) .'</p>
  ';
}
// ====== END SIDEBAR ======

// =================================
//    THEME SUPPORT
// =================================

function pardus_post_formats()  {
  $options = get_option( 'post_formats' );
  $formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'chat' );
  $output = '';
  foreach ($formats as $format) {
    $checked = ( @$options[$format] == 1 ? 'checked' : '' );
    $output .= '<Label><input type="checkbox" id='.$format.' name="post_formats['.$format.']" value="1" '.$checked.'>'.$format.'</Label><br />';
  }
  echo $output;
}

function pardus_custom_header() {
  $options = get_option( 'custom_header' );
  $checked = ( @$options == 1 ? 'checked' : '' );
  $output = '<Label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.'>Activate Custom Header</Label><br />';
  echo $output;
}

function pardus_custom_background() {
  $options = get_option( 'custom_background' );
  $checked = ( @$options == 1 ? 'checked' : '' );
  $output = '<Label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.'>Activate Custom Background Image</Label><br />';
  echo $output;
}

// Sanitize things
function pardus_sanitize_twitter_handler( $input ) {
  $output = sanitize_text_field( $input );
  $output = str_replace( '@', '' , $output);
  $output = str_replace( '"', '' , $output);
  
  return $output;
}
function custom_css_sanitize( $input ) {
  $output = esc_textarea( $input );
  return $output;
}
// ====== END THEME SUPPORT ======

// =================================
//    CONTACT FORM
// =================================

function pardus_activate_contact(){
  $active = get_option( 'activate_contact_form' );
  $checked = ( @$active == 1 ? 'checked' : '' );
  $output = '<Label><input type="checkbox" id="activate_contact_form" name="activate_contact_form" value="1" '.$checked.'></Label><br />';
  echo $output;
}
function pardus_theme_portfolio(){
  $active = get_option( 'activate_portfolio' );
  $checked = ( @$active == 1 ? 'checked' : '' );
  $output = '<Label><input type="checkbox" id="activate_portfolio" name="activate_portfolio" value="1" '.$checked.'></Label><br />';
  echo $output;
}
function pardus_custom_css_callback(){
  $css = get_option( 'pardus_css' );
  $css = ( empty($css) ? '/* Sunset THeme Custom CSS */' : $css );
  echo '<div id="customCss">'.$css.'</div><textarea id="pardus_css_text" name="pardus_css" style="display:none;vidibility:hidden">'.$css.'</textarea>';
  //echo '<textarea placeholder="Sunset Custom CSS">'.$css.'</textarea>';
}
