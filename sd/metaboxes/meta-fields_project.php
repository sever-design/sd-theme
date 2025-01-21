<?php 
add_filter( 'rwmb_meta_boxes', 'project_register_meta_boxes' );
function project_register_meta_boxes( $meta_boxes ) {
	$prefix = 'hs_';
	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'project_options',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => 'Project Info',
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		//'post_types' => array( 'post', 'page' ),
		'post_types' => array( 'project' ),
		
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
				'name' => 'Featured Project',
				'id'   => "{$prefix}projFeat",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 0,
			),
			
			// DATE
			array(
				'name'       => 'Project Date',
				'id'         => "{$prefix}projDate",
				'type'       => 'date',
				// jQuery date picker options. See here http://api.jqueryui.com/datepicker
				'js_options' => array(
					'appendText'      => '', 
					'dateFormat'      => 'M-yy',
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				),
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => 'Client Name',
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}projOwnerName",
				// Field description (optional)
				'desc'  => 'Owner\'s name',
				'type'  => 'text',
				// Default value (optional)
				'std'   => '',
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
			),
			
			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => 'Desktop Version Images',
				'id'               => "{$prefix}projImagesDesktop",
				'desc'			   => 'Up to 5 images',
				'type'             => 'image_advanced',
				'max_file_uploads' => 5,
			),

			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => 'Mobile Version Images',
				'id'               => "{$prefix}projImagesMobile",
				'desc'			   => 'Up to 5 images',
				'type'             => 'image_advanced',
				'max_file_uploads' => 5,
			),
			
		),//end fields
	);

	return $meta_boxes;
}
?>