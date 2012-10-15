<?php

/**
 * Setup Slides Post Type
 *
 * Registers the Slides CPT.
 *
 * @access      private
 * @since       1.0 
 * @return      void
*/

function gf_slides_cpt() {

register_post_type( 'Slides',
    array(
      'labels' => array(
        'name' => __( 'Slides' ),
        'singular_name' => __( 'Slide' ),		
		'add_new' => _x( 'Add New', 'Slide' ),
		'add_new_item' => __( 'Add New Slide' ),
		'edit_item' => __( 'Edit Slide' ),
		'new_item' => __( 'New Slide' ),
		'view_item' => __( 'View Slides' ),
		'search_items' => __( 'Search Slides' ),
		'not_found' =>  __( 'No Slides found' ),
		'not_found_in_trash' => __( 'No Slides found in Trash' ),
		'parent_item_colon' => ''
		
      ),
      'public' => true,
	  'supports' => array('title', 'thumbnail'),
	  'menu_icon' => GF_SLIDES_PLUGIN_URL .'/assets/images/icon-slides.png',
	  'query_var' => true,
	  'rewrite' => array( 'slug' => 'slides' ),
    )
  );
}
add_action('init', 'gf_slides_cpt', 100);