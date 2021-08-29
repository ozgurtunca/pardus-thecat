<?php 
// Require what is required
require get_template_directory() . '/inc/cleaner.php';
require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/custom-post-type.php';
require get_template_directory() . '/inc/custom-fields.php';

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/tgm_activation.php';

if ( file_exists( dirname( __FILE__ ) . '/inc/kirki/kirki.php' ) ) { 
  require get_template_directory() . '/inc/pardus-customize.php';
  include_once( dirname( __FILE__ ) . '/inc/kirki/kirki.php' ); 
}; 

