<?php 
/* 
This is the template for header
@package pardusthecat
*/
?>
<html <?php language_attributes(); ?>> 

<head>
  <title><?php bloginfo('name'); wp_title(); ?></title>
  <meta name="description" content="<?php bloginfo('description'); ?>">
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

      <header id="header" class="header-container background-image text-center">
        <div class="header-content table">
          <div class="table-cell">
            <h1 class="site-title pardus-icon">
              <span class="pardus-logo"></span>
              <span class="d-none"><?php bloginfo( 'name' ); ?></span></h1>
            <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
          </div><!-- table-cell -->
        </div><!-- .header-content  table -->

        <div class="nav-container">
          <nav class="navbar navbar-inverse">
            <?php wp_nav_menu( array(
              'theme_location'        => 'primary',
              'containter'            => false,
              'menu_class'            =>'nav navbar-pardus'
            ) ); ?>
          </nav>  
        </div>

      </header><!-- .header  -->
    </div><!-- .corow-xs-12 -->
  </div><!-- .header-container -->
</div><!-- .col-xs-12 -->