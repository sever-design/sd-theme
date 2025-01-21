<?php
function hs_register_slide_taxonomy() {
    $args = array(
        'labels' => array(
            'name' => esc_html__( 'Slider Groups', 'text-domain' ),
            'singular_name' => esc_html__( 'Slider Group', 'text-domain' ),
            'search_items' => esc_html__( 'Search Slider Groups', 'text-domain' ),
            'all_items' => esc_html__( 'All Slider Groups', 'text-domain' ),
            'edit_item' => esc_html__( 'Edit Slider Group', 'text-domain' ),
            'update_item' => esc_html__( 'Update Slider Group', 'text-domain' ),
            'add_new_item' => esc_html__( 'Add New Slider Group', 'text-domain' ),
            'new_item_name' => esc_html__( 'New Slider Group Name', 'text-domain' ),
            'menu_name' => esc_html__( 'Slider Groups', 'text-domain' ),
        ),
        'public' => true,
        'hierarchical' => true, // Set to true for category-like behavior
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true, // Enable for the Block Editor
    );

    register_taxonomy( 'slider_group', 'slides', $args );
}
add_action( 'init', 'hs_register_slide_taxonomy' );
