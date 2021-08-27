<h1>Pardus Theme Support</h1>
<?php settings_errors(); ?>
<?php 
  // $firstName = esc_attr( get_option( ' first_name' ) );
?>

<form method="POST" action="options.php" class="pardus-general-form">
  <?php settings_fields( 'pardus-theme-support' );?>
  <?php do_settings_sections( 'pardus_theme' ); ?>
  <?php submit_button();  ?>
</form>