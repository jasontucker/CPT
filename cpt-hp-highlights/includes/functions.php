<?php
/*
|--------------------------------------------------------------------------
| Add Custom Icon (32px)
|--------------------------------------------------------------------------
*/
function wpt_highlights_icons() {
    ?>
    <style type="text/css" media="screen">
    	#icon-edit.icon32-posts-hp_highlights {background: url(<?php echo GF_HIGHLIGHT_PLUGIN_URL; ?>/images/highlights-32x32.png) no-repeat;}
    </style>
<?php }

add_action( 'admin_head', 'wpt_highlights_icons' );

/*
|--------------------------------------------------------------------------
| Check for templates
|--------------------------------------------------------------------------
*/
add_filter( 'template_include', 'highlights_template_include', 1 );

function highlights_template_include( $template_path ){
	
	if ( get_post_type() == 'faqs' ) {
		if ( is_single() ) {
			// checks if the file exists in the theme first,
			// otherwise serve the file from the plugin
			if ( $theme_file = locate_template( array( 'single-hp_highlights.php' ) ) ) {
				$template_path = $theme_file;
			} else {
				$template_path = GF_HIGHLIGHT_PLUGIN_DIR . '/templates/single-hp_highlights.php';
			}
		} elseif ( is_archive() ) {
			if ( $theme_file = locate_template( array( 'archive-hp_highlights.php' ) ) ) {
				$template_path = $theme_file;
			} else {
				$template_path = GF_HIGHLIGHT_PLUGIN_DIR . '/templates/archive-hp_highlights.php';
			}
		}
	}	
	
	return $template_path;
}

/*
|--------------------------------------------------------------------------
| Add image size for highlights
|--------------------------------------------------------------------------
*/
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'highlight-thumb', 32, 32, true ); //(cropped)
}
?>