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
  <?php do_action( 'pardus_before_header' ); ?>

  <div id="content" class="site-content">
