<?php
/*
|--------------------------------------------------------------------------
| Shortcode
|--------------------------------------------------------------------------
*/
function staff_shortcode(){

	//get terms
	$terms = get_terms('staff_departments','orderby=custom_sort&hide_empty=1&child_of='.$staff_filter_parent.'');
	foreach($terms as $term) {
	
	$output  = '<div class="heading"><h2><a href="' .get_term_link($term->slug, 'staff_departments'). '" class="all-port-cat-items"><span>' .$term->name. '</span></a></h2></div><!-- /heading -->';
	$output .= '<div class="staff-category clearfix">';

	//tax query
	$tax_query = array(
		array(
			'taxonomy' => 'staff_departments',
			'terms' => $term->slug,
			'field' => 'slug'
			)
		);
		
		//get posts ==> staff
		$term_post_args = array(
			'post_type' => 'staff',
			'numberposts' => '-1',
			'tax_query' => $tax_query
		);
		$term_posts = get_posts($term_post_args);
		
		//start loop
		$count=0;
		foreach ($term_posts as $post) : setup_postdata($post);
		$count++;
		
		//get images
		$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'staff-thumb');
		
		//get meta
		$staff_position = get_post_meta($post->ID, 'office_staff_position', TRUE);
		
	if($featured_image) {
	
	$output .= '<div class="staff-member clearfix"><div class="staff-img"><a href="' .get_the_permalink(). '"><img src="' .$featured_image[0]. '" alt="' .get_the_title(). '" width="' .$featured_image[1]. '" height="' .$featured_image[2]. '" /></a></div><!-- /staff-img -->';
	$output .= '<div class="staff-meta"><h3>' .get_the_title(). '</h3>';
	
	if($staff_position) { $staff_position }
	
	$output .= '</div><!-- /staff-meta --></div><!-- /staff-member -->';
	}
	endforeach;
	
	$output .= '</div><!-- /staff-category -->';
	} wp_reset_query();
	$output .= '</div><!-- /staff-by-category-wrap -->';
}

add_shortcode( 'staff', 'staff_shortcode' );
?>
