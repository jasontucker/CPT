<?php

/**
 * Setup Services Post Type
 *
 * Registers the Services CPT.
 *
 * @access      private
 * @since       1.0 
 * @return      void
*/

function gf_services_cpt() {

register_post_type( 'services',
    array(
      'labels' => array(
        'name' => __( 'Services' ),
        'singular_name' => __( 'Service' ),		
		'add_new' => _x( 'Add New', 'Service' ),
		'add_new_item' => __( 'Add New Service' ),
		'edit_item' => __( 'Edit Service' ),
		'new_item' => __( 'New Service' ),
		'view_item' => __( 'View Services' ),
		'search_items' => __( 'Search Services' ),
		'not_found' =>  __( 'No Services found' ),
		'not_found_in_trash' => __( 'No Services found in Trash' ),
		'parent_item_colon' => ''
		
      ),
      'public' => true,
	  'supports' => array('title','editor','revisions','thumbnail'),
	  'menu_icon' => GF_SERVICES_PLUGIN_URL .'assets/images/icon-services.png',
	  'query_var' => true,
	  'rewrite' => array( 'slug' => 'services' ),
    )
  );
}
add_action('init', 'gf_services_cpt', 100);