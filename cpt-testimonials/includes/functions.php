<?php
/*
|--------------------------------------------------------------------------
| Change "Enter Title Here"
|--------------------------------------------------------------------------
*/
function gf_filter_testimonials_title_text($title)
{
    $scr = get_current_screen();
    if ('testimonials' == $scr->post_type)
        $title = 'Enter Name Here';
    return ($title);
}
add_filter('enter_title_here', 'gf_filter_testimonials_title_text');

/*
|--------------------------------------------------------------------------
| Add Custom Icon (32px)
|--------------------------------------------------------------------------
*/
add_action( 'admin_head', 'wpt_testimonials_icons' );
function wpt_testimonials_icons() {
    ?>
    <style type="text/css" media="screen">
    	#icon-edit.icon32-posts-testimonials {background: url(<?php echo GF_TESTIMONIALS_PLUGIN_URL; ?>/assets/images/testimonials-32x32.png) no-repeat;}
    </style>
<?php }

/*
|--------------------------------------------------------------------------
| Check for templates
|--------------------------------------------------------------------------
*/
add_filter( 'template_include', 'testimonials_template_include', 1 );

function testimonials_template_include( $template_path ){
	
	if ( get_post_type() == 'testimonials' ) {
		if ( is_single() ) {
			// checks if the file exists in the theme first,
			// otherwise serve the file from the plugin
			if ( $theme_file = locate_template( array( 'single-testimonials.php' ) ) ) {
				$template_path = $theme_file;
			} else {
				$template_path = GF_TESTIMONIALS_PLUGIN_DIR . '/templates/single-testimonials.php';
			}
		} elseif ( is_archive() ) {
			if ( $theme_file = locate_template( array( 'archive-testimonials.php' ) ) ) {
				$template_path = $theme_file;
			} else {
				$template_path = GF_TESTIMONIALS_PLUGIN_DIR . '/templates/archive-testimonials.php';
			}
		}
	}	
	
	return $template_path;
}
?>