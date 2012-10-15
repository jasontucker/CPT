<?php

/**
 * Setup Testimonials Post Type
 *
 * Registers the Testimonials CPT.
 *
 * @access      private
 * @since       1.0 
 * @return      void
*/

function gf_testimonials_cpt() {

register_post_type( 'testimonials',
    array(
      'labels' => array(
        'name' => __( 'Testimonials' ),
        'singular_name' => __( 'Testimonial' ),		
		'add_new' => _x( 'Add New', 'Testimonial' ),
		'add_new_item' => __( 'Add New Testimonial' ),
		'edit_item' => __( 'Edit Testimonial' ),
		'new_item' => __( 'New Testimonial' ),
		'view_item' => __( 'View Testimonials' ),
		'search_items' => __( 'Search Testimonials' ),
		'not_found' =>  __( 'No Testimonials found' ),
		'not_found_in_trash' => __( 'Testimonials found in Trash' ),
		'parent_item_colon' => ''
		
      ),
      'public' => true,
	  'supports' => array('title', 'editor', 'thumbnail'),
	  'menu_icon' => GF_TESTIMONIALS_PLUGIN_URL .'assets/images/icon-testimonials.png',
	  'query_var' => true,
	  'rewrite' => array( 'slug' => 'testimonials' ),
    )
  );
}
add_action('init', 'gf_testimonials_cpt', 100);