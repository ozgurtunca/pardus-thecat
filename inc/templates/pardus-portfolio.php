<h1>Pardus Portfolio Post Type Options</h1>
<?php settings_errors(); ?>
<?php 
  // $firstName = esc_attr( get_option( ' first_name' ) );
?>

<form method="POST" action="options.php" class="pardus-general-form">
  <?php settings_fields( 'pardus-portfolio-activate' );?>
  <?php do_settings_sections( 'pardus_portfolio_activation' ); ?>
  <?php submit_button();  ?>
</form>