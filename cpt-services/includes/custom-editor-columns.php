<?php
/* Services columns */

add_image_size( 'small-thumb', 50, 50, true );

add_filter("manage_edit-services_columns", "edit_services_columns" );
add_action("manage_posts_custom_column", "custom_services_columns");

function edit_services_columns($services_columns)
{
        $services_columns = array(
                "cb" => "<input type ='checkbox' />",
                "title" => "Title",
				"services_category" => "Category",
				"services_image" => "Featured Icon"
        );
        return $services_columns;
}

function custom_services_columns($services_column)
{
        global $post;
        switch ($services_column)
        {
			case "services_category":
					echo get_the_term_list( get_the_ID(), 'service_cats', ' ', ' , ', ' ');
			break;
			case "services_image":
					if(has_post_thumbnail()) {
						the_post_thumbnail( 'small-thumb' );
					} else { echo '-'; }
			break;
        }

}
?>