<?php get_header(); ?>

  <div class="pardus-container">
    <div class="row">
      <div class="corow-xs-12">
      <?php if ( true == get_theme_mod( 'topbar_toogle', true ) ) : ?>
      <p>Toggle is enabled</p>
    <?php else : ?>
      <p>Toggle is disabled</p>
    <?php endif; ?>
      </div>
    </div>
  </div>

<?php get_footer(); ?>