<div class="container-fluid sticky-top" style="background: rgba(0,0,0,0.7);">
    <div class="pardus-container">
        <div class="row">
        <?php if ( intval(pardus_get_option( 'header_promo' ) ) ) : ?>
            <div class="col-xs-12 col-sm-12 col-md-5 hidden-xs hidden-sm text-center promo-text">
                <h1 class="school-logo-text float-left">
                    <a href="<?php  echo site_url(); ?>"><strong>Pardus</strong> The Cat</a>
                </h1>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
