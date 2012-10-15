<?php

/**
 * Setup HP Highlights Post Type
 *
 * Registers the HP Highlights CPT.
 *
 * @access      private
 * @since       1.0 
 * @return      void
*/

function gf_highlight_cpt() {

register_post_type( 'hp_highlights',
    array(
      'labels' => array(
        'name' => __( 'HP Highlights' ),
        'singular_name' => __( 'Highlight' ),		
		'add_new' => _x( 'Add New', 'Highlight' ),
		'add_new_item' => __( 'Add New Highlight' ),
		'edit_item' => __( 'Edit Highlight' ),
		'new_item' => __( 'New Highlight' ),
		'view_item' => __( 'View Highlights' ),
		'search_items' => __( 'Search Highlights' ),
		'not_found' =>  __( 'No Highlights found' ),
		'not_found_in_trash' => __( 'No Highlights found in Trash' ),
		'parent_item_colon' => ''
		
      ),
      'public' => true,
	  'supports' => array('title','editor','thumbnail'),
	  'menu_icon' => GF_HIGHLIGHT_PLUGIN_URL .'assets/images/icon-hp-highlights.png',
	  'query_var' => true,
	  'rewrite' => array( 'slug' => 'hp-highlights' ),
    )
  );
}
add_action('init', 'gf_highlight_cpt', 100);