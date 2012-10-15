<?php
function gf_highlight_enqueue_scripts() {

wp_enqueue_style('highlights', GF_HIGHLIGHT_PLUGIN_URL . 'assets/css/hp_highlights.css');
}
add_action('wp_enqueue_scripts', 'gf_highlight_enqueue_scripts');
?>