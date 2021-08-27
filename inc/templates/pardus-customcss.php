<h1>Pardus Theme Custom CSS</h1>
<?php settings_errors(); ?>
<?php 
  // $firstName = esc_attr( get_option( ' first_name' ) );
?>

<form id="save-custom-css-form" method="POST" action="options.php" class="pardus-general-form">
  <?php settings_fields( 'pardus-custom-css' );?>
  <?php do_settings_sections( 'pardus_custom_css_slug' ); ?>
  <?php submit_button();  ?>
</form>