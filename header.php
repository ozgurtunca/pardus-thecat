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
<div id="page">
  <div id="topbar" class="topbar topbar-dark">
    <div class="pardus-container">
      <div class="row topbar-row">
        <div class="topbar-left topbar-sidebar col-xs-12 col-sm-12 col-md-5 hidden-xs hidden-sm">
        <?php if ( is_active_sidebar( 'topbar-left' ) ) {
						dynamic_sidebar( 'topbar-left' );
					} ?>
        </div>
        <div class="topbar-right topbar-sidebar col-xs-12 col-sm-12 col-md-7 hidden-xs hidden-sm">
        This is TopBar Right
        </div>
      </div>
    </div>
  </div>
</div>