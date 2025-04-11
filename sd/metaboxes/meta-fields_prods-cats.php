<?php

add_filter( 'rwmb_meta_boxes', 'woocat_register_meta_boxes' );

function woocat_register_meta_boxes( $meta_boxes ) {
	$prefix = 'hs_';
    $meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'woocat_options',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => 'Product Category Options',
        'taxonomies' => 'product_cat', // Apply to WooCommerce product categories
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
		),
    );
    return $meta_boxes;
}