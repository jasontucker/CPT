<?php

/**
 * Setup Services Taxonomies
 *
 * Registers the custom taxonomies.
 *
 * @access      private
 * @since       1.0 
 * @return      void
*/

function gf_setup_services_taxonomies() {

	$service_cat_labels = array(
		'name' => __( 'Service Categories', 'office' ),
		'singular_name' => __( 'Service Categories', 'office' ),
		'search_items' =>  __( 'Search Service Categories', 'office' ),
		'all_items' => __( 'All Service Categories', 'office' ),
		'parent_item' => __( 'Parent Service Categories', 'office' ),
		'parent_item_colon' => __( 'Parent Service Categories:', 'office' ),
		'edit_item' => __( 'Edit Service Categories', 'office' ),
		'update_item' => __( 'Update Service Categories', 'office' ),
		'add_new_item' => __( 'Add New Service Categories', 'office' ),
		'new_item_name' => __( 'New Service Categories', 'office' ),
		'choose_from_most_used'	=> __( 'Choose from the most used Service Categories', 'office' )
	); 	

	register_taxonomy('service_cats','services',array(
		'hierarchical' => true,
		'labels' => $service_cat_labels,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'service-category' ),
	)
);

}
add_action('init', 'gf_setup_services_taxonomies', 10);