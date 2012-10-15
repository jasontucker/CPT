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

$hp_highlight_meta_boxes = array();

// meta box ===> HP Highlights
$hp_highlight_meta_boxes[] = array(
	'id' => 'hp_highlights_meta',
	'title' => __('Options','office'),
	'pages' => array('hp_highlights'),

	'fields' => array(
		array(
            'name' => __('Link URL','office'),
            'desc' => __('Enter a URL to link the title of this highlight to. Optional.','office'),
            'id' => $prefix . 'hp_highlights_url',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => __('Link Target','office'),
            'desc' => __('Select the target for the highlight link. Do not forget the http:// in the url. (Optional)','office'),
            'id' => $prefix . 'hp_highlights_url_target',
			'type' => 'select',
			'options' => array( 'disable' => 'self', 'enable' => 'blank', ),
			'multiple' => false,
			'std' => 'default'
        ),
	)
);

foreach ($hp_highlight_meta_boxes as $meta_box) {
	new hp_highlight_meta_box($meta_box);
}
?>