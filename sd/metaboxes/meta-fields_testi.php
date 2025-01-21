<?php 
add_filter( 'rwmb_meta_boxes', 'testi_register_meta_boxes' );
function testi_register_meta_boxes( $meta_boxes ) {
	$prefix = 'hs_';
	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'testi_options',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => 'Testimonial Details',
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		//'post_types' => array( 'post', 'page' ),
		'post_types' => array( 'testimonial' ),
		
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		'autosave'   => false,
		// List of meta fields
		'fields'     => array(
			

			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => 'Link to Website',
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}testiLink",
				// Field description (optional)
				'desc'  => 'Link to website',
				'type'  => 'text',
				// Default value (optional)
				'std'   => 'http://',
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
			),
			
		),//end fields
	);

	return $meta_boxes;
}
?>