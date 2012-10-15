<?php
function gf_testimonials_enqueue_scripts() {

	wp_enqueue_style('testimonials', GF_FAQ_PLUGIN_URL . 'assets/css/testimonials.css');
}
add_action('wp_enqueue_scripts', 'gf_testimonials_enqueue_scripts');
?>