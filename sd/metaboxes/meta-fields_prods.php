<?php 
add_filter( 'rwmb_meta_boxes', 'prods_register_meta_boxes' );
function prods_register_meta_boxes( $meta_boxes ) {
	$prefix = 'prod_';
	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'post_options_main',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => 'Extended Options',
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		//'post_types' => array( 'post', 'page' ),
		'post_types' => array( 'product' ),
		
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'side',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'default',
		// Auto save: true, false (default). Optional.
		'autosave'   => false,
		// List of meta fields
		'fields'     => array(

			// HEADING
			array(
				'type' => 'heading',
				'name' => 'Product Attributes',
				'desc' => 'Percentage values',
			),

			// NUMBER
			array(
				'name' => 'Relaxed',
				'id'   => "{$prefix}Relaxed",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
			),
			// NUMBER
			array(
				'name' => 'Sleepy',
				'id'   => "{$prefix}Sleepy",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
			),
			
			// NUMBER
			array(
				'name' => 'Happy',
				'id'   => "{$prefix}Happy",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
			),
			
			// NUMBER
			array(
				'name' => 'Tingly',
				'id'   => "{$prefix}Tingly",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
			),
			
			// NUMBER
			array(
				'name' => 'Euphoric',
				'id'   => "{$prefix}Euphoric",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
			),
			
		),//end fields
	);

	return $meta_boxes;
}
?>