<?php
function gf_services_enqueue_scripts() {

	wp_enqueue_script('serviceinit', GF_SERVICES_PLUGIN_URL . 'assets/js/jquery.services.init.js', array('jquery'), '1.0', true);

	wp_enqueue_style('services', GF_SERVICES_PLUGIN_URL . 'assets/css/services.css');
}
add_action('wp_enqueue_scripts', 'gf_services_enqueue_scripts');
?>