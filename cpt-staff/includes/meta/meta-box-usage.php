<?php
/**
 * Registering meta boxes
 *
 * In this file, I'll show you how to extend the class to add more field type (in this case, the 'taxonomy' type)
 * All the definitions of meta boxes are listed below with comments, please read them carefully.
 * Note that each validation method of the Validation Class MUST return value instead of boolean as before
 *
 * You also should read the changelog to know what has been changed
 *
 * For more information, please visit: http://www.deluxeblogtips.com/2010/04/how-to-create-meta-box-wordpress-post.html
 *
 */	

/********************* BEGIN META BOXES ***********************/
$prefix = 'office_';

$staff_meta_boxes = array();

// meta box ===> Staff
$staff_meta_boxes[] = array(
	'id' => 'staff_options',
	'title' => __('Options','office'),
	'pages' => array('staff'),

	'fields' => array(
		array(
            'name' => __('Position','office'),
            'desc' => __(' Enter a position for your staff member.','office'),
            'id' => $prefix . 'staff_position',
            'type' => 'text',
            'std' => ''
        ),
	)
);

foreach ($staff_meta_boxes as $meta_box) {
	new staff_meta_box($meta_box);
}
?>