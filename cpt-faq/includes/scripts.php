<?php
function gf_faq_enqueue_scripts() {

	wp_enqueue_script('faqsinit', GF_FAQ_PLUGIN_URL . 'assets/js/jquery.faqs.init.js', array('jquery'), '1.0', true);
	wp_enqueue_script('quicksand', GF_FAQ_PLUGIN_URL . '/assets/js/jquery.quicksand.js', array('jquery'), '1.2.2', true);
	wp_enqueue_script('quicksandinit', GF_FAQ_PLUGIN_URL . '/assets/js/jquery.quicksandinit.faqs.js', array('jquery','quicksand'), '1.0', true);
	
	wp_enqueue_style('faqs', GF_FAQ_PLUGIN_URL . 'assets/css/faq.css');
}
add_action('wp_enqueue_scripts', 'gf_faq_enqueue_scripts');
?>