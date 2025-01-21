<?php 
add_filter( 'rwmb_meta_boxes', 'slide_register_meta_boxes' );
function slide_register_meta_boxes( $meta_boxes ) {
	$prefix = 'hs_';
	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'slide_options',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => 'Slide Additional Info',
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		//'post_types' => array( 'post', 'page' ),
		'post_types' => array( 'slides' ),
		
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		'autosave'   => false,
		// List of meta fields
		'fields'     => array(
		
			// CHECKBOX
			array(
				'name' => 'Hide Slide Content',
				'id'   => "{$prefix}showContent", 
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 0,
			),

			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => 'Button Text',
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}BtnText",
				// Field description (optional)
				'desc'  => 'Button text',
				'type'  => 'text',
				// Default value (optional)
				'std'   => 'Get It Now!',
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
			),

			// POST
			array(
				'name'        => 'Link to Post/Page',
				'id'          => "{$prefix}LinkToPost",
				'type'        => 'post',
				// Post type
				'post_type'   => array('product', 'page'),
				// Field type, either 'select' or 'select_advanced' (default)
				'field_type'  => 'select_advanced',
				'placeholder' => 'Select Product/Page',
				'desc' => 'Where to send visitor by clicking the button',
				// Query arguments (optional). No settings means get all published posts
				'query_args'  => array(
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
				),
			),

			
		),//end fields
	);

	return $meta_boxes;
}
?>