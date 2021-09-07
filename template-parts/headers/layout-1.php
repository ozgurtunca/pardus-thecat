<div id="topbar" class="topbar header-container">
    <div class="pardus-container">
      <div class="row topbar-row">
    <?php if ( intval(pardus_get_option( 'header_promo' ) ) ) : ?>
        <div class="topbar-left topbar-sidebar col-xs-12 col-sm-12 col-md-5 hidden-xs hidden-sm">
            <h1 class="pardus-logo-text float-left">
                <a href="<?php  echo site_url(); ?>"><strong>Pardus</strong> The Cat</a>
            </h1>
        </div>
        <div class="topbar-right topbar-sidebar col-xs-12 col-sm-12 col-md-7 hidden-xs hidden-sm">
            <h1 class="pardus-logo-text float-left">
                <a href="<?php  echo site_url(); ?>"><strong>Pardus</strong> The Cat</a>
            </h1>
        </div>  
    <?php endif; ?>
    </div>
    </div>
</div>
