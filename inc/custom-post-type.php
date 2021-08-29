<?php 
/**
*     @package pardusthecat
*
*     ====================================================================
*             CUSTOM POST TYPES
*     ====================================================================
*/
$contact_form = get_option( 'activate_contact_form' );
if( @$contact_form == 1 ) {
  add_action( 'init', 'pardus_contactform_post_type' );
  add_filter( 'manage_pardus-contact-form_posts_columns', 'pardus_set_form_columns' );
  add_action( 'manage_pardus-contact-form_posts_custom_column', 'pardus_set_custom_column', 10 , 2);
  add_action( 'add_meta_boxes', 'pardus_contactform_add_meta_box' );
  add_action( 'save_post', 'pardus_save_email_data' );
}
$portfolio = get_option( 'activate_portfolio' );
if( @$portfolio == 1 ) {
  add_action( 'init', 'pardus_portfolio_post_type' );
  add_filter( 'manage_pardus-artwork-post_posts_columns', 'pardus_set_portfolio_columns' );
  add_theme_support( 'post-thumbnails' );
// add_action( 'manage_pardus-artwork-post_posts_custom_column', 'pardus_set_portfolio_custom_column', 10 , 2);
// add_action( 'add_meta_boxes', 'pardus_contactform_add_meta_box' );
// add_action( 'save_post', 'pardus_save_email_data' );
}

// Register Custom Post Types
// Portfolio CPT
function pardus_portfolio_post_type() {
  $labels = array(
    'name'            => __( 'Portfolio', 'pardus-thecat' ),
    'singular_name'   => __( 'Artwork', 'pardus-thecat'  ),
    'menu_name'       => __( 'Portfolio', 'pardus-thecat'  ),
    'name_admin_bar'  => __( 'Artwork', 'pardus-thecat'  ),
    'add_new'         => __( 'New Artwork', 'pardus-thecat'  ),
    'add_new_item'    => __( 'Add New Artwork', 'pardus-thecat'  ),
  );
  $args = array (
    'labels'          => $labels,
    'show_ui'         => true,
    'public'           => true,
    'show_in_menu'    => true,
    'show_in_rest'    => true,
    'capability'      => 'post',
    'has_archive'     => true,
    'slug'            => 'portfolio',
    'hierarchical'    => false,
    'menu_position'   => 6,
    'menu_icon'       => 'dashicons-portfolio',
    'supports'        => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'comments')
  );
  register_post_type( 'portfolio', $args);
}

// CONTACT CPT
function pardus_contactform_post_type() {
  $labels = array(
    'name'            => __( 'Messages', 'pardus-thecat' ),
    'singular_name'   => __( 'Message', 'pardus-thecat' ),
    'menu_name'       => __( 'Messages', 'pardus-thecat' ),
    'name_admin_bar'  => __( 'Messages', 'pardus-thecat' ),
    'add_new'         => __( 'New Message', 'pardus-thecat'  ),
    'add_new_item'    => __( 'Add New Message', 'pardus-thecat'  ),
  );
  $args = array (
    'labels'          => $labels,
    'show_ui'         => true,
    'show_in_menu'    => true,
    'capability'      => 'post',
    'hierarchical'    => false,
    'menu_position'   => 26,
    'menu_icon'       => 'dashicons-buddicons-pm',
    'supports'        => array( 'title', 'editor', 'author' )
  );
  register_post_type( 'pardus-contact-form', $args);
}

// CONTACT FORM POST TYPE COLUMNS
function pardus_set_form_columns( $columns ){
  $newColumns = array();
  $newColumns['title'] = __( 'Full Name', 'pardus-thecat' );
  $newColumns['date'] = __( 'Date', 'pardus-thecat' );
  return $newColumns;
}

function pardus_set_custom_column( $column, $post_id){
  switch ( $column ) {
    case 'message' :
      echo get_the_excerpt();
    break;
    
    case 'email':
      $email = get_post_meta( $post_id, '_contact_email_value_key', true );
      echo '<a href="mailto:'.$email.'">'.$email.'</a>'; 
    break;
 
  }
}

// PORTFOLIO POST TYPE COLUMNS
function pardus_set_portfolio_columns( $columns ){
  $newColumns = array();
  $newColumns['title'] = __( 'Artwork Title', 'pardus-thecat' );
  $newColumns['riv_post_thumbs'] = __( 'Thumbnail', 'pardus-thecat' );
  $newColumns['price'] = __( 'Price', 'pardus-thecat' );
  $newColumns['sale_price'] = __( 'Sale Price', 'pardus-thecat' );
  $newColumns['soldon'] = __( 'Sold on', 'pardus-thecat' );
  $newColumns['link'] = __( 'Link', 'pardus-thecat' );
  $newColumns['date'] = __( 'Post Date', 'pardus-thecat' );
}


// CONTACT FORM META BOXES 
// Add metaboxes
function pardus_contactform_add_meta_box(){
    add_meta_box( 'contact_email', 'User E-mail', 'pardus_contact_email_callback', 'pardus-contact-form', 'side' );
}
// Contact form callback
function pardus_contact_email_callback( $post ){
  wp_nonce_field( 'pardus_save_email_data', 'pardus_contactform_email_meta_nonce' );
  $value = get_post_meta( $post->ID, '_contact_email_value_key', true );

  echo '<label for="pardus_contact_email_field" class="meta-box">E-mail Address</label>';
  echo '<input type="email" id="pardus_contact_email_field" name="pardus_contact_email_field" value="' . esc_attr($value) .'" size="25" />';
}
// Contact form function from callback
function pardus_save_email_data( $post_id ){
  $theNonce = $_POST['pardus_contactform_email_meta_nonce'];
  // Security check
  if ( !isset( $theNonce ) ) { return; }
  if ( !wp_verify_nonce( $theNonce, 'pardus_save_email_data')) { return; }
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) { return; }
  if ( !current_user_can( 'edit_post', $post_id )) { return; }
  if ( !isset($_POST['pardus_contact_email_field'])) { return; }
  // Retrive data
  $myData = sanitize_text_field($_POST['pardus_contact_email_field']);
  update_post_meta( $post_id, '_contact_email_value_key', $myData );
}
