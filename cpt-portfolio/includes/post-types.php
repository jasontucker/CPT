<?php

/**
 * Setup Portfolio Post Type
 *
 * Registers the Portfolio CPT.
 *
 * @access      private
 * @since       1.0 
 * @return      void
*/

function gf_portfolio_cpt() {

register_post_type( 'Portfolio',
    array(
      'labels' => array(
        'name' => __( 'Portfolio' ),
        'singular_name' => __( 'Portfolio' ),		
		'add_new' => _x( 'Add New', 'Portfolio' ),
		'add_new_item' => __( 'Add New Portfolio' ),
		'edit_item' => __( 'Edit Portfolio' ),
		'new_item' => __( 'New Portfolio' ),
		'view_item' => __( 'View Portfolios' ),
		'search_items' => __( 'Search Portfolios' ),
		'not_found' =>  __( 'No Portfolios found' ),
		'not_found_in_trash' => __( 'No Portfolios found in Trash' ),
		'parent_item_colon' => ''
		
      ),
      'public' => true,
	  'supports' => array('title', 'editor', 'thumbnail'),
	  'menu_icon' => GF_PORTFOLIO_PLUGIN_URL .'assets/images/icon-portfolio.png',
	  'query_var' => true,
	  'rewrite' => array( 'slug' => 'portfolio' ),
    )
  );
}
add_action('init', 'gf_portfolio_cpt', 100);