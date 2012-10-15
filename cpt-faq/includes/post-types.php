<?php
/**
 * Setup FAQs Post Type
 *
 * Registers the FAQs CPT.
 *
 * @access      private
 * @since       1.0 
 * @return      void
*/

function gf_faq_cpt() {

register_post_type( 'faqs',
    array(
      'labels' => array(
        'name' => __( 'FAQs'),
        'singular_name' => __( 'FAQ'),		
		'add_new' => _x( 'Add New', 'FAQ'),
		'add_new_item' => __( 'Add New FAQ'),
		'edit_item' => __( 'Edit FAQ'),
		'new_item' => __( 'New FAQ'),
		'view_item' => __( 'View FAQs'),
		'search_items' => __( 'Search FAQs'),
		'not_found' =>  __( 'No FAQs found'),
		'not_found_in_trash' => __( 'No FAQs found in Trash'),
		'parent_item_colon' => ''
		
      ),
      'public' => true,
	  'supports' => array('title', 'editor'),
	  'menu_icon' => GF_FAQ_PLUGIN_URL .'assets/images/icon-faqs.png',
	  'query_var' => true,
	  'rewrite' => array( 'slug' => 'faqs' ),
    )
  );
}
add_action('init', 'gf_faq_cpt', 100);