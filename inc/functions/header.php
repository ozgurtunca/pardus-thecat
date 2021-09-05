<?php 
/**
 * Actions Hooks and custom functions for header
 *
 * @package pardusthecat
 */
// Topbar display hook
if ( ! function_exists( 'pardus_show_topbar' ) ) {
	function pardus_show_topbar() {
		$topbar        = apply_filters( 'pardus_get_topbar', pardus_get_option( 'topbar' ) );
	//	$topbar_mobile = apply_filters( 'pardus_get_topbar', pardusthecat_get_option( 'topbar_mobile' ) );
		if ( ! intval( $topbar ) ) {
			return;
		}
		get_template_part( 'template-parts/headers/topbar' );
	}
}
add_action( 'pardus_before_header', 'pardus_show_topbar', 10 );

// Show header actions hook
function pardus_show_header() {
	if ( is_page_template( 'template-under-construction.php' ) ) {
		if ( intval( pardusthecat_get_option( 'under_construction_logo' ) ) ) {
			get_template_part( 'template-parts/logo' );
		}
	} else {
		$header_layout = pardus_get_option( 'header_layout' );
		$header_layout = $header_layout ? $header_layout : 1;
		get_template_part( 'template-parts/headers/layout', $header_layout );
	}
}
add_action( 'pardus_header', 'pardus_show_header' );