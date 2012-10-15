<?php
/*
|--------------------------------------------------------------------------
| Add Custom Icon (32px)
|--------------------------------------------------------------------------
*/
function wpt_slides_icons() {
    ?>
    <style type="text/css" media="screen">
    	#icon-edit.icon32-posts-slides {background: url(<?php echo GF_SLIDES_PLUGIN_URL; ?>assets/images/slides-32x32.png) no-repeat;}
    </style>
<?php 
}
add_action( 'admin_head', 'wpt_slides_icons' );

/*
|--------------------------------------------------------------------------
| Move Featured Image under title
|--------------------------------------------------------------------------
*/

function customposttype_image_box() {

	remove_meta_box( 'postimagediv', 'slides', 'side' );
	add_meta_box('postimagediv', __('Custom Image'), 'post_thumbnail_meta_box', 'slides', 'normal', 'high');
}
add_action('do_meta_boxes', 'customposttype_image_box');

/*
|--------------------------------------------------------------------------
| Check for templates
|--------------------------------------------------------------------------
*/
function slides_template_include( $template_path ){
	
	if ( get_post_type() == 'slides' ) {
		if ( is_single() ) {
			// checks if the file exists in the theme first,
			// otherwise serve the file from the plugin
			if ( $theme_file = locate_template( array( 'single-slides.php' ) ) ) {
				$template_path = $theme_file;
			} else {
				$template_path = GF_SLIDES_PLUGIN_DIR . '/templates/single-slides.php';
			}
		} elseif ( is_archive() ) {
			if ( $theme_file = locate_template( array( 'archive-slides.php' ) ) ) {
				$template_path = $theme_file;
			} else {
				$template_path = GF_SLIDES_PLUGIN_DIR . '/templates/archive-slides.php';
			}
		}
	}	
	
	return $template_path;
}
add_filter( 'template_include', 'slides_template_include', 1 );
?>