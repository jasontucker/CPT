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

$portfolio_meta_boxes = array();

// meta box ===> Portfolio Options
$portfolio_meta_boxes[] = array(
	'id' => 'single_portfolio_options',
	'title' => __('Post Options','office'),
	'pages' => array('portfolio'),

	'fields' => array(
		array(
			'name' => __('Post Style', 'office'),
			'id' => $prefix . 'portfolio_style',
			'type' => 'select',
			'options' => array(
				'default' => 'default',
				'full' => 'full',
				'grid' => 'grid'
			),
			'std' => 'default',
			'desc' => __('Select your post style.', 'office')
		),
		array(
			'name' => __('Enable FullWidth Image Slider', 'office'),
			'id' => $prefix . 'page_slider',
			'type' => 'select',
			'options' => array(
				'disable' => 'disable',
				'enable' => 'enable'
			),
			'multiple' => false,
			'std' => array('disable'),
			'desc' => __('Choose to enable or disable the page slider based on image attachments (shows all images attached to the page). Can also be used to show 1 image banner at the top.', 'office')
		),
		array(
            'name' => __('Video Embed Code','office'),
            'desc' => __('Enter your video embeded code if you want a video instead. <strong>Max width of 510px</strong>.','office'),
            'id' => $prefix . 'portfolio_video',
            'type' => 'textarea',
            'std' => ''
        ),
		array(
            'name' => __('Cost','office'),
            'desc' => __('Enter your cost for the project details optional)','office'),
            'id' => $prefix . 'portfolio_cost',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => __('Client','office'),
            'desc' => __('Enter a client name the project details (optional)','office'),
            'id' => $prefix . 'portfolio_client',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => __('Link URL','office'),
            'desc' => __('Enter a URL for the project details (optional)','office'),
            'id' => $prefix . 'portfolio_url',
            'type' => 'text',
            'std' => ''
        ),
	)
);

foreach ($portfolio_meta_boxes as $meta_box) {
	new portfolio_meta_box($meta_box);
}
?>