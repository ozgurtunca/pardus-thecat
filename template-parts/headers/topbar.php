<div id="topbar" class="topbar topbar-dark">
    <div class="pardus-container">
      <div class="row topbar-row">
      <?php if ( intval(pardus_get_option( 'topbar_toogle' ) ) ) : ?>
        <div class="topbar-sidebar col-xs-12 col-sm-12 col-md-5 hidden-xs hidden-sm">
          <?php if ( is_active_sidebar( 'topbar-left' ) ) {
						dynamic_sidebar( 'topbar-left' );
					} ?>
        </div>
        <div class="topbar-sidebar col-xs-12 col-sm-12 col-md-7 hidden-xs hidden-sm">
        <?php if ( is_active_sidebar( 'topbar-right' ) ) {
						dynamic_sidebar( 'topbar-right' );
					} ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>