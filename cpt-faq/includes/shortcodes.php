<?php
/*
|--------------------------------------------------------------------------
| Shortcode
|--------------------------------------------------------------------------
*/
function faqs_shortcode(){

	$cats_args = array(
		'hide_empty' => '1',
		'child_of' => $faqs_filter_parent
	);
	$cats = get_terms('faqs_cats', $cats_args);
	
	//show filter if categories exist
	if($cats) {
    $args = array(
        'taxonomy' => 'faqs_cats',
        'orderby' => 'name',
        'show_count' => 0,
        'pad_counts' => 0,
        'hierarchical' => 0,
        'title_li' => ''
    );

    $output = '<ul id="faqs-cats" class="clearfix"><li><a class="active" href="#all" rel="all" title="All FAQs">All FAQs</a></li>';
    
        foreach ($cats as $cat ) : 
        
        $output .= '<li><a href="#'.$cat->slug. '" rel="' .$cat->slug. '>"><span>' .$cat->name. '</span></a></li>';
        
    	endforeach;
    	
    	$output .= '</ul><!-- /faqs-cats -->';
    }

    	$output .= '<div id="faqs-wrap clearfix"><ul class="faqs-content">';

		//tax query
		if($faqs_filter_parent) {
			$tax_query = array(
				array(
					  'taxonomy' => 'faqs_cats',
					  'field' => 'id',
					  'terms' => $faqs_filter_parent
					  )
				);
		} else { $tax_query = NULL; }
		
		//start main loop
        global $post;
        $args = array(
            'post_type' =>'faqs',
            'numberposts' => '-1',
            'order' => 'ASC',
			'tax_query' => $tax_query
        );
        $faqs = get_posts($args);

		$count=0;
        foreach($faqs as $post) : setup_postdata($post);
		$count++;
		
		//get terms
		$terms = get_the_terms( get_the_ID(), 'faqs_cats' );

        $output .= '<li data-id="id-' .$count. '" data-type="';
        
         if($terms) { foreach ($terms as $term) { $term->slug .' '; } } else { 'none'; }
         
        $output .= '" class="faqs-container">';       
        $output .= '<div class="faq-item"><h2 class="faq-title"><span>' .get_the_title(). '</span></h2>';
        $output .= '<div class="faq-content entry">' .get_the_content(). '</div><!-- /faq --></div><!-- /faq-item --></li><!-- /faqs-container -->';
        
        	endforeach; wp_reset_postdata();
        
        $output .= '</ul><!-- /faqs-content --></div><!-- /faqs-wrap -->';
        
        return $output;
        }

add_shortcode( 'faq', 'faqs_shortcode' );
?>