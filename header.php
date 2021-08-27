<?php 
/* 
This is the template for header
@package pardusthecat
*/
?>
<html <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if(is_singular() && pings_open( get_queried_object() )) : ?>
    <link rel="pingback"  href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif ?>
    <?php wp_head(); ?>
  </head>
  
  <body <?php body_class(); ?>>
    <div class="container">

      <div class="row">

        <div class="corow-xs-12">
          <div id="header" class="header-container background-image text-center" style="background-image:url(<?php header_image(); ?>);">
            <div class="header-content">
              <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
            </div><!-- .header-content -->
            <div class="nav-container">
              <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div><!-- .nav-container -->
          </div><!-- .header-container -->
        </div><!-- .col-xs-12 -->

      </div><!-- .col-xs-12 -->

    </div><!-- .container-fluid -->
