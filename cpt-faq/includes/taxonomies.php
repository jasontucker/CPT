<?php

/**
 * Setup FAQ Taxonomies
 *
 * Registers the custom taxonomies.
 *
 * @access      private
 * @since       1.0 
 * @return      void
*/

function gf_setup_faqs_taxonomies() {

	$faq_cat_labels = array(
		'name' => __( 'FAQ Categories'),
		'singular_name' => __( 'FAQ Category'),
		'search_items' =>  __( 'Search FAQ Category'),
		'all_items' => __( 'All FAQ Category'),
		'parent_item' => __( 'Parent FAQ Category'),
		'parent_item_colon' => __( 'Parent FAQ Category:'),
		'edit_item' => __( 'Edit FAQ Category'),
		'update_item' => __( 'Update FAQ Category'),
		'add_new_item' => __( 'Add New FAQ Category'),
		'new_item_name' => __( 'New FAQ Category Name'),
		'choose_from_most_used'	=> __( 'Choose from the most used FAQ Category')
	); 	

	register_taxonomy('faqs_cats','faqs',array(
		'hierarchical' => true,
		'labels' => $faq_cat_labels,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'faq-category' ),
	)
);

}
add_action('init', 'gf_setup_faqs_taxonomies', 10);