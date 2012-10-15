<?php

/**
 * Setup Portfolio Taxonomies
 *
 * Registers the custom taxonomies.
 *
 * @access      private
 * @since       1.0 
 * @return      void
*/

function gf_setup_portfolio_taxonomies() {

	$portfolio_cat_labels = array(
		'name' => __( 'Portfolio Categories', 'office' ),
		'singular_name' => __( 'Portfolio Categories', 'office' ),
		'search_items' =>  __( 'Search Portfolio Categories', 'office' ),
		'all_items' => __( 'All Portfolio Categories', 'office' ),
		'parent_item' => __( 'Parent Portfolio Categories', 'office' ),
		'parent_item_colon' => __( 'Parent Portfolio Categories:', 'office' ),
		'edit_item' => __( 'Edit Portfolio Categories', 'office' ),
		'update_item' => __( 'Update Portfolio Categories', 'office' ),
		'add_new_item' => __( 'Add New Portfolio Categories', 'office' ),
		'new_item_name' => __( 'New Portfolio Categories', 'office' ),
		'choose_from_most_used'	=> __( 'Choose from the most used Portfolio Categories', 'office' )
	); 	

	register_taxonomy('portfolio_cats','portfolio',array(
		'hierarchical' => true,
		'labels' => $portfolio_cat_labels,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'portfolio-category' ),
	)
);

}
add_action('init', 'gf_setup_portfolio_taxonomies', 10);