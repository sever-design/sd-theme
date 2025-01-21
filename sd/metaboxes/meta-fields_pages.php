<?php 
add_filter( 'rwmb_meta_boxes', 'page_register_meta_boxes' );
function page_register_meta_boxes( $meta_boxes ) {
	$prefix = 'hs_';
	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'page_options',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => 'Page Options',
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		//'post_types' => array( 'post', 'page' ),
		'post_types' => array( 'page' ),
		
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		'autosave'   => false,
		// List of meta fields
		'fields'     => array(
			

			
			// HEADING
			array(
				'type' => 'heading',
				'name' => 'Alt Page Heading (h1)',
				'desc' => 'If you want use alt title instead of page title - change it here',
			),

			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => 'Text',
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}altTitle",
				// Field description (optional)
				'desc'  => __( 'Alt Title - optional - to replace native page title from WP', 'fld_mikerosen' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => '',
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
			),
			
		),//end fields
	);

	return $meta_boxes;
}
?>