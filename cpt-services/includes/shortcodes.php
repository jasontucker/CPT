<?php
/*
|--------------------------------------------------------------------------
| Shortcode
|--------------------------------------------------------------------------
*/
function services_shortcode(){

	global $post;
	$args = array(
	'post_type'=>'services',
	'numberposts' => -1,
	'order' => 'ASC'
	);
	$services_posts = get_posts($args);
	
	// Tabs
	$output = '<ul id="service-tabs">';
	$count=0;foreach($services_posts as $post) : setup_postdata($post); $count++;
    $output .= '<li><a href="#tab-' .$count. '>" title="' .get_the_title(). '">' .get_the_title(). '</a></li>';
    
    endforeach;

	$output .= '</ul>';
	
	// Tab Content
	$output .= '<div id="service-content" class="entry">';
	$count=0;foreach($services_posts as $post) : setup_postdata($post);$count++;
	$output .= '<div id="tab-' .$count. '" class="service-tab-content">';
	$output .= '<div class="wrap"><h2 class="creative-header"><span class="header-highlight">' .get_the_title(). '</span></h2>';
    $output .= get_the_content(). '<br style="clear:both"></div><!-- WRAP --></div>';
		
    endforeach;
		
	$output .= '<div class="clear"></div></div><!-- SERVICE CONTENT -->';

	return $output;
}

add_shortcode( 'services', 'services_shortcode' );
?>