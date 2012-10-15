<?php
/*
|--------------------------------------------------------------------------
| Shortcode
|--------------------------------------------------------------------------
*/
function testimonials_shortcode(){

        global $post;
        $args = array(
            'post_type' =>'testimonials',
            'numberposts' => '-1',
        );
        $testimonials = get_posts($args);

        $count=0;
        foreach($testimonials as $post) : setup_postdata($post);
        $count++;

        $output = '<div class="testimonial-item one-third';
        	if($count == '3') { echo 'column-last'; } 
        $output .= '"><div class="testimonial">' .get_the_content(). '</div><!-- /testimonial -->';
        $output .= '<div class="testimonial-author">' .get_the_title(). '</div></div><!-- /testimonial-item -->';
        if($count == '3') { 
        	$output .= '<div class="clear"></div>'; 
        $count=0; 
        } 
        endforeach; 
        wp_reset_postdata();

        return $output;
        }

add_shortcode( 'testimonials', 'testimonials_shortcode' );
?>
    

    
