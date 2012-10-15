<?php
/*
|--------------------------------------------------------------------------
| Add Custom Icon (32px)
|--------------------------------------------------------------------------
*/
function wpt_services_icons() {
    ?>
    <style type="text/css" media="screen">
    	#icon-edit.icon32-posts-services {background: url(<?php echo GF_SERVICES_PLUGIN_URL; ?>assets//images/services-32x32.png) no-repeat;}
    </style>
<?php 
}
add_action( 'admin_head', 'wpt_services_icons' );

/*
|--------------------------------------------------------------------------
| Check for templates
|--------------------------------------------------------------------------
*/
add_filter( 'template_include', 'services_template_include', 1 );

function services_template_include( $template_path ){
	
	if ( get_post_type() == 'services' ) {
		if ( is_single() ) {
			// checks if the file exists in the theme first,
			// otherwise serve the file from the plugin
			if ( $theme_file = locate_template( array( 'single-services.php' ) ) ) {
				$template_path = $theme_file;
			} else {
				$template_path = GF_SERVICES_PLUGIN_DIR . '/templates/single-services.php';
			}
		} elseif ( is_archive() ) {
			if ( $theme_file = locate_template( array( 'archive-services.php' ) ) ) {
				$template_path = $theme_file;
			} else {
				$template_path = GF_SERVICES_PLUGIN_DIR . '/templates/archive-services.php';
			}
		}
	}	
	
	return $template_path;
}
?>