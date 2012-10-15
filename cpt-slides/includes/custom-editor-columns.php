<?php
/* custom slides columns */

add_image_size( 'small-thumb', 50, 50, true );

add_filter("manage_edit-slides_columns", "edit_slides_columns" );
add_action("manage_posts_custom_column", "custom_slides_columns");

function edit_slides_columns($slides_columns)
{
        $slides_columns = array(
                "cb" => "<input type ='checkbox' />",
                "title" => "Title",
				"slides_url" => "URL",
				"slides_image" => "Featured Image"
        );
        return $slides_columns;
}

function custom_slides_columns($slides_column)
{
        global $post;
        switch ($slides_column)
        {
			case "slides_url":
					if(get_post_meta($post->ID, 'office_slides_url', true) !='') {
						echo get_post_meta($post->ID, 'office_slides_url', true);
					} else { echo '-'; }
			break;
			case "slides_image":
					if(has_post_thumbnail()) {
						the_post_thumbnail( 'small-thumb' );
					} else { echo '-'; }
			break;
        }

}
?>