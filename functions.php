<?php 
/**
 * DrFuri Core functions and definitions
 *
 * @package pardusthecat
 */
// Require what is required
//  Remove strings from JS and CSS in head meta tags
require get_template_directory() . '/inc/cleaner.php';
// Backend configurations
require get_template_directory() . '/inc/function-admin.php';
// Enqueue everything
require get_template_directory() . '/inc/enqueue.php';
// Theme support options
require get_template_directory() . '/inc/theme-support.php';
// Custom post types
require get_template_directory() . '/inc/custom-post-type.php';
// Custom meta tags, custom fields
require get_template_directory() . '/inc/custom-fields.php';
// Required plugins
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/tgm_activation.php';
// Kirki customizer
require get_template_directory() . '/inc/pardus-customizer.php';

