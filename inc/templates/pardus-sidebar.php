<h1>Pardus Sidebar Options</h1>
<?php settings_errors(); ?>
<?php 
  $firstName = esc_attr( get_option( ' first_name' ) );
  $lastName = esc_attr( get_option( ' last_name' ) );
  $fullname = $firstName .  " " . $lastName;
  $image = esc_attr( get_option( 'profile_image' ) );
  $description = esc_attr( get_option( ' user_description' ) );
?>
<div class="pardus-sidebar-preview">
  <div class="pardus-sidebar">
    <div class="image-container">
      <div id="profile-image-preview" class="profile-image" style="background-image:url(<?php print $image; ?>)">
      </div>
    </div>
    <h1 class="pardus-username"><?php print $fullname; ?></h1>
    <h2 class="pardus-description"><?php print  $description; ?></h2>
    <div class="icons-wrapper">

    </div>
  </div>
</div>
<form method="POST" action="options.php" class="pardus-general-form">
  <?php settings_fields( 'pardus-settings-group' ); ?>
  <?php do_settings_sections( 'pardus_thecat' ); ?>
  <?php submit_button();  ?>
</form>