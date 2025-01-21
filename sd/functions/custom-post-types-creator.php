<?php
function hs_slides_register_post_type() {

	$args = array (
		'label' => esc_html__( 'Slides', 'text-domain' ),
		'labels' => array(
			'menu_name' => esc_html__( 'Slides', 'text-domain' ),
			'name_admin_bar' => esc_html__( 'Slides', 'text-domain' ),
			'add_new' => esc_html__( 'Add new', 'text-domain' ),
			'add_new_item' => esc_html__( 'Add new Slide', 'text-domain' ),
			'new_item' => esc_html__( 'New Slide', 'text-domain' ),
			'edit_item' => esc_html__( 'Edit Slide', 'text-domain' ),
			'view_item' => esc_html__( 'View Slide', 'text-domain' ),
			'update_item' => esc_html__( 'Update Slide', 'text-domain' ),
			'all_items' => esc_html__( 'All Slides', 'text-domain' ),
			'search_items' => esc_html__( 'Search Slides', 'text-domain' ),
			'parent_item_colon' => esc_html__( 'Parent Slide', 'text-domain' ),
			'not_found' => esc_html__( 'No Slides found', 'text-domain' ),
			'not_found_in_trash' => esc_html__( 'No Slides found in Trash', 'text-domain' ),
			'name' => esc_html__( 'Slides', 'text-domain' ),
			'singular_name' => esc_html__( 'Slides', 'text-domain' ),
		),
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => false,
		'exclude_from_search' => true, // Exclude from search results
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'show_in_rest' => true, // Enable REST API for the Block Editor
		'menu_position' => 20,
		'menu_icon' => 'dashicons-hammer',
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false, // No archive page
		'query_var' => true,
		'can_export' => true,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'custom-fields',
			//'page-attributes',
		),
		/*
		'rewrite' => array(
			'slug' => 'portfolio',
		),
		*/
		'rewrite' => true,
	);

	register_post_type( 'slides', $args );
}
add_action( 'init', 'hs_slides_register_post_type' );