<?php
// homepage highlights
add_image_size( 'small-thumb', 50, 50, true );

add_filter("manage_edit-hp_highlights_columns", "edit_hp_highlights_columns" );
add_action("manage_posts_custom_column", "custom_hp_highlights_columns");

function edit_hp_highlights_columns($slides_columns)
{
        $hp_highlight_columns = array(
                "cb" => "<input type ='checkbox' />",
                "title" => "Title",
				"hp_highlight_url" => "URL",
				"hp_highlight_image" => "Featured Image"
        );
        return $hp_highlight_columns;
}

function custom_hp_highlights_columns($hp_highlight_column)
{
        global $post;
        switch ($hp_highlight_column)
        {
			case "hp_highlight_url":
					if(get_post_meta($post->ID, 'office_hp_highlights_url', true) !='') {
						echo get_post_meta($post->ID, 'office_hp_highlights_url', true);
					} else { echo '-'; }
			break;
			case "hp_highlight_image":
					if(has_post_thumbnail()) {
						the_post_thumbnail( 'small-thumb' );
					} else { echo '-'; }
			break;
        }

}
?>