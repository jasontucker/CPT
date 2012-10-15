<?php
/*
|--------------------------------------------------------------------------
| Add Custom Icon (32px)
|--------------------------------------------------------------------------
*/
function wpt_portfolio_icons() {
    ?>
    <style type="text/css" media="screen">
    	#icon-edit.icon32-posts-portfolio {background: url(<?php echo GF_PORTFOLIO_PLUGIN_URL; ?>assets/images/portfolio-32x32.png) no-repeat;}
    </style>
<?php 
}
add_action( 'admin_head', 'wpt_portfolio_icons' );

/*
|--------------------------------------------------------------------------
| Check for templates
|--------------------------------------------------------------------------
*/
add_filter( 'template_include', 'portfolio_template_include', 1 );

function portfolio_template_include( $template_path ){
	
	if ( get_post_type() == 'portfolio' ) {
		if ( is_single() ) {
			// checks if the file exists in the theme first,
			// otherwise serve the file from the plugin
			if ( $theme_file = locate_template( array( 'single-portfolio.php' ) ) ) {
				$template_path = $theme_file;
			} else {
				$template_path = GF_PORTFOLIO_PLUGIN_DIR . '/templates/single-portfolio.php';
			}
		} elseif ( is_archive() ) {
			if ( $theme_file = locate_template( array( 'archive-portfolio.php' ) ) ) {
				$template_path = $theme_file;
			} else {
				$template_path = GF_PORTFOLIO_PLUGIN_DIR . '/templates/archive-portfolio.php';
			}
		}
	}	
	
	return $template_path;
}
?>