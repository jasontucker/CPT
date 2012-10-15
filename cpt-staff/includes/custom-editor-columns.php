<?php
/* Staff columns */
add_filter("manage_edit-staff_columns", "edit_staff_columns" );
add_action("manage_posts_custom_column", "custom_staff_columns");

function edit_staff_columns($staff_columns)
{
        $staff_columns = array(
                "cb" => "<input type ='checkbox' />",
                "title" => "Title",
				"staff_position" => "Position",
				"staff_department" => "Department",
				"staff_image" => "Profile Picture"
        );
        return $staff_columns;
}

function custom_staff_columns($staff_column)
{
        global $post;
        switch ($staff_column)
        {
			case "staff_position":
					if(get_post_meta($post->ID, 'office_staff_position', true) !='') {
						echo get_post_meta($post->ID, 'office_staff_position', true);
					} else { echo '-'; }
			break;
			case "staff_department":
					echo get_the_term_list( get_the_ID(), 'staff_departments', ' ', ' , ', ' ');
			break;
			case "staff_image":
					if(has_post_thumbnail()) {
						the_post_thumbnail( 'small-thumb' );
					} else { echo '-'; }
			break;
        }

}
?>