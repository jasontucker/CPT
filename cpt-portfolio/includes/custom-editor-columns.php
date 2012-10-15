<?php
/* custom portfolio columns */

add_image_size( 'small-thumb', 50, 50, true );

add_filter("manage_edit-portfolio_columns", "edit_portfolio_columns" );
add_action("manage_posts_custom_column", "custom_portfolio_columns");

function edit_portfolio_columns($portfolio_columns)
{
        $portfolio_columns = array(
                "cb" => "<input type ='checkbox' />",
                "title" => "Title",
				"portfolio_category" => "Category",
                "portfolio_image" => "Featured Image"
        );
        return $portfolio_columns;
}

function custom_portfolio_columns($portfolio_column)
{
        global $post;
        switch ($portfolio_column)
        {
				case "portfolio_category":
					echo get_the_term_list( get_the_ID(), 'portfolio_cats', ' ', ' , ', ' ');
				break;
				
                case "portfolio_image":
						if(has_post_thumbnail()) {
                        	the_post_thumbnail( 'small-thumb' );
						} else { echo '-'; }
				break;
        }

}
?>