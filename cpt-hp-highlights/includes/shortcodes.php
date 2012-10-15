<?php
/*
|--------------------------------------------------------------------------
| Shortcode
|--------------------------------------------------------------------------
*/
function hp_highlights_shortcode() {

global $post;
$args = array(
	'post_type' =>'hp_highlights',
	'numberposts' => '-1'
);


$hp_highlight_posts = get_posts($args);

	if($hp_highlight_posts) { 

		$output = '<div id="home-highlights" class="clearfix">';
	
	if(!empty($data['home_highlights_title'])) {

		$output .= '<div class="heading">';

	if(!empty($data['home_highlights_title_url'])) {
                
		$output .= '<h2><a href="' .$data['home_highlights_title_url']. '" title="Highlights"><span>Highlights</span></a></h2>';
	} else { 
		$output .= '<h2><span>Highlights</span></h2>';
	}
     	$output .= '</div><!-- /heading -->';
}
    
	$third_count=0;
	$fifth_count=0;
	foreach($hp_highlight_posts as $post) : setup_postdata($post);
	$third_count++;
	$fifth_count++;
	
	//get featured image ==> full size
	$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'highlight-thumb');
	
	//set padding for heading with image
	$heading_padding = $featured_image[2] + 15;
	$heading_height = $featured_image[1];
	
	//meta
	$hp_highlights_url = get_post_meta($post->ID, 'office_hp_highlights_url', TRUE);
	$hp_highlights_url_target = 'self';
	$hp_highlights_url_target = get_post_meta($post->ID, 'office_hp_highlights_url_target', TRUE);
	
	$output .= '<div class="hp-highlight">';
	if(!empty($featured_image)) { 
    $output .= '<img src="' .$featured_image[0]. '" title="'. get_the_title(). '" class="hp-highlight-img" /><h3>';
     }
	if(!empty($hp_highlights_url)) {
	$output .= '<a href="' .$hp_highlights_url. '" title="' .get_the_title(). '" target="' .$hp_highlights_url_target. '">' .get_the_title(). '</a>';
	 } else { 
	 get_the_title(); 
	 } 
	 $output .= '</h3>' .get_the_content(). '</div><!-- /hp-highlight -->';
	if($third_count=='3') { $third_count=1; } if($fifth_count=='5') { $fifth_count=1; } 
	endforeach;

	$output .= '</div><!-- END #home-highlights --> ';  
	
	return $output;  
	
} 
wp_reset_postdata(); 

}
add_shortcode( 'highlights', 'hp_highlights_shortcode' );
?>