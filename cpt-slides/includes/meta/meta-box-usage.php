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

$slides_meta_boxes = array();

// meta box ===> Image Slides
$slides_meta_boxes[] = array(
	'id' => 'slides_meta',
	'title' => __('Image Slide Options','office'),
	'pages' => array('slides'),

	'fields' => array(
		array(
            'name' => __('Enable/Disable Caption Title','office'),
            'desc' => __('Select to enable or disable your slide caption.','office'),
            'id' => $prefix . 'enable_caption',
			'type' => 'select',
			'options' => array( 'disable' => 'disable', 'enable' => 'enable', ),
			'multiple' => false,
			'std' => 'default'
        ),
		array(
            'name' => __('Description','office'),
            'desc' => __('Enter a description for your slide.','office'),
            'id' => $prefix . 'slides_description',
            'type' => 'textarea',
            'std' => ''
        ),
		array(
            'name' => __('Slide Link URL','office'),
            'desc' => __('Enter a URL to link this slide to - perfect for linking slides to pages on your site or other sites. Do not forget the http:// in the url. (Optional)','office'),
            'id' => $prefix . 'slides_url',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => __('Link Target','office'),
            'desc' => __('Select the target for the slide link.','office'),
            'id' => $prefix . 'slides_url_target',
			'type' => 'select',
			'options' => array( 'disable' => 'self', 'enable' => 'blank', ),
			'multiple' => false,
			'std' => 'default'
        ),
	)
);

foreach ($slides_meta_boxes as $meta_box) {
	new slides_meta_box($meta_box);
}
?>