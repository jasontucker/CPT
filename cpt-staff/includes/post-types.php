<?php

/**
 * Setup Staff Post Type
 *
 * Registers the Staff CPT.
 *
 * @access      private
 * @since       1.0 
 * @return      void
*/

function gf_staff_cpt() {

register_post_type( 'Staff',
    array(
      'labels' => array(
        'name' => __( 'Staff' ),
        'singular_name' => __( 'Staff Member' ),		
		'add_new' => _x( 'Add New', 'Staff Member' ),
		'add_new_item' => __( 'Add New Staff Member' ),
		'edit_item' => __( 'Edit Staff Member' ),
		'new_item' => __( 'New Staff Member' ),
		'view_item' => __( 'View Staff Members' ),
		'search_items' => __( 'Search Staff Members' ),
		'not_found' =>  __( 'No Staff Members found' ),
		'not_found_in_trash' => __( 'No Staff Members found in Trash' ),
		'parent_item_colon' => ''
		
      ),
      'public' => true,
	  'supports' => array('title', 'editor', 'thumbnail'),
	  'menu_icon' => GF_STAFF_PLUGIN_URL .'assets/images/icon-staff.png',
	  'query_var' => true,
	  'rewrite' => array( 'slug' => 'staff' ),
    )
  );
}
add_action('init', 'gf_staff_cpt', 100);