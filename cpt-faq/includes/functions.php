<?php
/*
|--------------------------------------------------------------------------
| Change "Enter Title Here"
|--------------------------------------------------------------------------
*/
function gf_filter_faq_title_text($title)
{
    $scr = get_current_screen();
    if ('faqs' == $scr->post_type)
        $title = 'Enter Question Here';
    return ($title);
}
add_filter('enter_title_here', 'gf_filter_faq_title_text');

/*
|--------------------------------------------------------------------------
| Add Custom Icon (32px)
|--------------------------------------------------------------------------
*/
add_action( 'admin_head', 'wpt_faq_icons' );
function wpt_faq_icons() {
    ?>
    <style type="text/css" media="screen">
    	#icon-edit.icon32-posts-faqs {background: url(<?php echo GF_FAQ_PLUGIN_URL; ?>assets/images/faqs-32x32.png) no-repeat;}
    </style>
<?php }

/*
|--------------------------------------------------------------------------
| Check for templates
|--------------------------------------------------------------------------
*/
add_filter( 'template_include', 'faq_template_include', 1 );

function faq_template_include( $template_path ){
	
	if ( get_post_type() == 'faqs' ) {
		if ( is_single() ) {
			// checks if the file exists in the theme first,
			// otherwise serve the file from the plugin
			if ( $theme_file = locate_template( array( 'single-faqs.php' ) ) ) {
				$template_path = $theme_file;
			} else {
				$template_path = GF_FAQ_PLUGIN_DIR . '/templates/single-faqs.php';
			}
		} elseif ( is_archive() ) {
			if ( $theme_file = locate_template( array( 'archive-faqs.php' ) ) ) {
				$template_path = $theme_file;
			} else {
				$template_path = GF_FAQ_PLUGIN_DIR . '/templates/archive-faqs.php';
			}
		}
	}	
	
	return $template_path;
}
?>