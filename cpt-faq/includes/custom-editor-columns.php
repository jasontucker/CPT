<?php
/* FAQs columns */
add_filter("manage_edit-faqs_columns", "edit_faqs_columns" );
add_action("manage_posts_custom_column", "custom_faqs_columns");

function edit_faqs_columns($faqs_columns)
{
        $faqs_columns = array(
                "cb" => "<input type ='checkbox' />",
                "title" => "Question",
				"faqs_category" => "Category"
        );
        return $faqs_columns;
}

function custom_faqs_columns($faqs_column)
{
        global $post;
        switch ($faqs_column)
        {
			case "faqs_category":
					echo get_the_term_list( get_the_ID(), 'faqs_cats', ' ', ' , ', ' ');
			break;
        }

}
?>