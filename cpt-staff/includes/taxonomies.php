<?php

/**
 * Setup Staff Taxonomies
 *
 * Registers the custom taxonomies.
 *
 * @access      private
 * @since       1.0 
 * @return      void
*/

function gf_setup_staff_taxonomies() {

	$staff_cat_labels = array(
		'name' => __( 'Staff Departments', 'office' ),
		'singular_name' => __( 'Staff Department', 'office' ),
		'search_items' =>  __( 'Search Staff Departments', 'office' ),
		'all_items' => __( 'All Staff Departments', 'office' ),
		'parent_item' => __( 'Parent Staff Department', 'office' ),
		'parent_item_colon' => __( 'Parent Staff Department:', 'office' ),
		'edit_item' => __( 'Edit Staff Department', 'office' ),
		'update_item' => __( 'Update Staff Department', 'office' ),
		'add_new_item' => __( 'Add New Staff Department', 'office' ),
		'new_item_name' => __( 'New Staff Department Name', 'office' ),
		'choose_from_most_used'	=> __( 'Choose from the most used staff departments', 'office' )
	); 	

	register_taxonomy('staff_departments','staff',array(
		'hierarchical' => true,
		'labels' => $staff_cat_labels,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'department' ),
	)
  );

}
add_action('init', 'gf_setup_staff_taxonomies', 10);