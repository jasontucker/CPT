<?php
/* Testimonials columns */
add_filter("manage_edit-testimonials_columns", "edit_testimonials_columns" );
add_action("manage_posts_custom_column", "custom_testimonials_columns");

function edit_testimonials_columns($testimonials_columns)
{
        $testimonials_columns = array(
                "cb" => "<input type ='checkbox' />",
                "title" => "Name",
				"testimonial" => "Testimonial",
				"photo" => "Photo",
        );
        return $testimonials_columns;
}

function custom_testimonials_columns($testimonials_column)
{
        global $post;
        switch ($testimonials_column)
        {
        	case "testimonial":
        		echo $post->post_content;
			break;
			case "photo":
					if(has_post_thumbnail()) {
						the_post_thumbnail( 'small-thumb' );
					} else { echo '-'; }
			break;
        }

}
?>