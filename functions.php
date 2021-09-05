<?php 
/**
 * DrFuri Core functions and definitions
 *
 * @package pardusthecat
 */
// Require what is required
// Remove strings from JS and CSS in head meta tags
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
// Functions for header
require get_template_directory() . '/inc/functions/header.php';

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

/**
 * Register our sidebars and widgetized areas.
 *
 */

function pardus_register_sidebars() {
	// Register primary sidebars
	$sidebars = array(
  'header-bar'      => esc_html__( 'Header Bar', 'pardusthecat' ),
		'topbar-left'     => esc_html__( 'Topbar Left', 'pardusthecat' ),
		'topbar-right'    => esc_html__( 'Topbar Right', 'pardusthecat' ),
		'topbar-mobile'   => esc_html__( 'Topbar on Mobile', 'pardusthecat' ),
		'blog-sidebar'    => esc_html__( 'Blog Sidebar', 'pardusthecat' ),
		'post-sidebar'    => esc_html__( 'Single Post Sidebar', 'pardusthecat' ),
		'page-sidebar'    => esc_html__( 'Page Sidebar', 'pardusthecat' ),
		'catalog-sidebar' => esc_html__( 'Catalog Sidebar', 'pardusthecat' ),
		'product-sidebar' => esc_html__( 'Single Product Sidebar', 'pardusthecat' ),
		'footer-links'    => esc_html__( 'Footer Links', 'pardusthecat' ),
	);

	if ( class_exists( 'WC_Vendors' ) || class_exists( 'WCMp' ) ) {
		$sidebars['vendor_sidebar'] = esc_html( 'Vendor Sidebar', 'pardusthecat' );
	}

	// Register 6 footer sidebars
	for ( $i = 1; $i <= 6; $i ++ ) {
		$sidebars["footer-sidebar-$i"] = esc_html__( 'Footer', 'pardusthecat' ) . " $i";
	}

	// Register sidebars
	foreach ( $sidebars as $id => $name ) {
		register_sidebar(
			array(
				'name'          => $name,
				'id'            => $id,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			)
		);
	}

}
add_action( 'widgets_init', 'pardus_register_sidebars' );