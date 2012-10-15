<?php
/*
|--------------------------------------------------------------------------
| Change "Enter Title Here"
|--------------------------------------------------------------------------
*/
function gf_filter_staff_title_text($title)
{
    $scr = get_current_screen();
    if ('staff' == $scr->post_type)
        $title = 'Enter Name Here';
    return ($title);
}
add_filter('enter_title_here', 'gf_filter_staff_title_text');

/*
|--------------------------------------------------------------------------
| Add Custom Icon (32px)
|--------------------------------------------------------------------------
*/
function wpt_staff_icons() {
    ?>
    <style type="text/css" media="screen">
    	#icon-edit.icon32-posts-staff {background: url(<?php echo GF_STAFF_PLUGIN_URL; ?>assets/images/staff-32x32.png) no-repeat;}
    </style>
<?php 
}
add_action( 'admin_head', 'wpt_staff_icons' );

/*
|--------------------------------------------------------------------------
| Check for templates
|--------------------------------------------------------------------------
*/
add_filter( 'template_include', 'staff_template_include', 1 );

function staff_template_include( $template_path ){
	
	if ( get_post_type() == 'staff' ) {
		if ( is_single() ) {
			// checks if the file exists in the theme first,
			// otherwise serve the file from the plugin
			if ( $theme_file = locate_template( array( 'single-staff.php' ) ) ) {
				$template_path = $theme_file;
			} else {
				$template_path = GF_STAFF_PLUGIN_DIR . '/templates/single-staff.php';
			}
		} elseif ( is_archive() ) {
			if ( $theme_file = locate_template( array( 'archive-staff.php' ) ) ) {
				$template_path = $theme_file;
			} else {
				$template_path = GF_STAFF_PLUGIN_DIR . '/templates/archive-staff.php';
			}
		}
	}	
	
	return $template_path;
}
?>