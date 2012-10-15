<?php
/*
Plugin Name: CPT Testimonials - R
Version: 1.0
Description: Creates a Custom Post Type for Testimonial's including shortcode [testimonial]
Author: Gregg Franklin
Author URI: http://www.greggfranklin.com
*/

/*
|--------------------------------------------------------------------------
| CONSTANTS
|--------------------------------------------------------------------------
*/

// plugin folder url
if(!defined('GF_TESTIMONIALS_PLUGIN_URL')) {
	define('GF_TESTIMONIALS_PLUGIN_URL', plugin_dir_url( __FILE__ ));
}
// plugin folder path
if(!defined('GF_TESTIMONIALS_PLUGIN_DIR')) {
	define('GF_TESTIMONIALS_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
}
// plugin root file
if(!defined('GF_TESTIMONIALS_PLUGIN_FILE')) {
	define('GF_TESTIMONIALS_PLUGIN_FILE', __FILE__);
}
if(!defined('GF_TESTIMONIALS_PLUGIN_VERSION')) {
	define('GF_TESTIMONIALS_PLUGIN_VERSION', '1.0');
}

/*
|--------------------------------------------------------------------------
| File Includes
|--------------------------------------------------------------------------
*/
if ( defined( 'WP_ADMIN' ) && WP_ADMIN ) {
	//Custom columns
	include_once( GF_TESTIMONIALS_PLUGIN_DIR . 'includes/custom-editor-columns.php');
}

include_once( GF_TESTIMONIALS_PLUGIN_DIR . '/includes/scripts.php');
include_once( GF_TESTIMONIALS_PLUGIN_DIR . '/includes/post-types.php');
include_once( GF_TESTIMONIALS_PLUGIN_DIR . '/includes/functions.php');
include_once( GF_TESTIMONIALS_PLUGIN_DIR . '/includes/shortcodes.php');
?>