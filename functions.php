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

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

function add_additional_class_on_li($classes, $item, $args) {
 if(isset($args->add_li_class)) {
     $classes[] = $args->add_li_class;
 }
 return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);