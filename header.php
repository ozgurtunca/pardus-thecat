<?php 
/** 
* @package pardusthecat
* This is the template for header
*
*
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
  <div class="header-main">
    <div class="header-container">
      <div class="row header-row">
  
<div class="container">
  <div class="row">
    <div class="corow-xs-12">
    <header class="header p-3">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <img src="<?php echo get_template_directory_uri() . '/img/logo.png'; ?>" width="50">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2">Home</a></li>
          <li><a href="#" class="nav-link px-2">Features</a></li>
          <li><a href="#" class="nav-link px-2">Pricing</a></li>
          <li><a href="#" class="nav-link px-2">FAQs</a></li>
          <li><a href="#" class="nav-link px-2">About</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2">Login</button>
          <button type="button" class="btn btn-warning">Sign-up</button>
        </div>
      </div>
    </div>
  </header>
    </div><!-- .corow-xs-12 -->
  </div><!-- .header-container -->
</div><!-- .col-xs-12 -->