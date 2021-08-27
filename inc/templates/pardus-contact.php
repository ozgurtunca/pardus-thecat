<h1>Pardus Contact Form Options</h1>
<?php settings_errors(); ?>
<?php 
  // $firstName = esc_attr( get_option( ' first_name' ) );
?>

<form method="POST" action="options.php" class="pardus-general-form">
  <?php settings_fields( 'pardus-contact-options' );?>
  <?php do_settings_sections( 'pardus_theme_contact' ); ?>
  <?php submit_button();  ?>
</form>