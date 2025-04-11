<?php
/*
 * Add a new column to the WooCommerce category list table
 */
add_filter('manage_edit-product_cat_columns', function ($columns) {
    $columns['category_id'] = __('ID', 'your-textdomain');
    return $columns;
});

// Populate the new column with category ID
add_filter('manage_product_cat_custom_column', function ($content, $column_name, $term_id) {
    if ($column_name === 'category_id') {
        $content = $term_id;
    }
    return $content;
}, 10, 3);

// Adjust column order (optional)
add_filter('manage_edit-product_cat_sortable_columns', function ($sortable_columns) {
    $sortable_columns['category_id'] = 'category_id';
    return $sortable_columns;
});
/* ********************************** */

// Add custom columns to display slider_group and shortcode
function add_slider_columns($columns) {
    $columns['slider_group'] = __('Slider Group', 'text-domain');
    $columns['slider_shortcode'] = __('Shortcode', 'text-domain');
    return $columns;
}
add_filter('manage_slides_posts_columns', 'add_slider_columns');

// Populate the slider_group and shortcode columns
function display_slider_columns($column, $post_id) {
    if ($column === 'slider_group') {
        // Display the slider_group taxonomy terms
        $terms = get_the_terms($post_id, 'slider_group');
        if (!empty($terms) && !is_wp_error($terms)) {
            $term_links = array_map(function ($term) {
                return sprintf(
                    '<a href="%s">%s</a>',
                    esc_url(add_query_arg(array('slider_group' => $term->slug), admin_url('edit.php?post_type=slides'))),
                    esc_html($term->name)
                );
            }, $terms);
            echo implode(', ', $term_links);
        } else {
            echo __('No Slider Group', 'text-domain');
        }
    }

    if ($column === 'slider_shortcode') {
        // Display the shortcode for the first slider_group
        $terms = get_the_terms($post_id, 'slider_group');
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                printf(
                    '<code>[sd_cpt_slider group="%s"]</code><br>',
                    esc_attr($term->name)
                );
            }
        } else {
            echo __('No Shortcode Available', 'text-domain');
        }
    }
}
add_action('manage_slides_posts_custom_column', 'display_slider_columns', 10, 2);

// Make the slider_group column sortable
function make_slider_columns_sortable($columns) {
    $columns['slider_group'] = 'slider_group';
    return $columns;
}
add_filter('manage_edit-slides_sortable_columns', 'make_slider_columns_sortable');

// Modify the query for sorting by slider_group
function sort_by_slider_columns($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->get('orderby') === 'slider_group') {
        $query->set('meta_query', array(
            array(
                'key' => 'slider_group',
                'compare' => 'EXISTS',
            ),
        ));
        $query->set('orderby', 'meta_value');
    }
}
add_action('pre_get_posts', 'sort_by_slider_columns');


// Add a filter dropdown to the admin list of Slides
function add_slider_group_filter_to_admin() {
    global $typenow;

    // Check if we are on the 'slides' post type page
    if ($typenow == 'slides') {
        // Get the slider groups (taxonomy terms)
        $terms = get_terms(array(
            'taxonomy' => 'slider_group',
            'orderby'  => 'name',
            'hide_empty' => false, // Show all terms even if they are not used
        ));

        if ($terms) {
            // Add the dropdown filter
            echo '<select name="slider_group_filter" id="slider_group_filter" class="postform">';
            echo '<option value="">Filter by Slider Group</option>';
            foreach ($terms as $term) {
                $selected = (isset($_GET['slider_group_filter']) && $_GET['slider_group_filter'] == $term->term_id) ? ' selected="selected"' : '';
                echo '<option value="' . $term->term_id . '" ' . $selected . '>' . $term->name . '</option>';
            }
            echo '</select>';
        }
    }
}
add_action('restrict_manage_posts', 'add_slider_group_filter_to_admin');

// Modify the query to filter slides by selected slider group
function filter_slides_by_slider_group($query) {
    global $pagenow, $typenow;

    // Check if we are on the 'slides' post type page in the admin
    if ($typenow == 'slides' && is_admin() && $pagenow == 'edit.php') {
        if (isset($_GET['slider_group_filter']) && !empty($_GET['slider_group_filter'])) {
            // Get the selected slider group
            $slider_group_id = $_GET['slider_group_filter'];

            // Modify the query to filter by the selected slider group
            $query->set('tax_query', array(
                array(
                    'taxonomy' => 'slider_group',
                    'field'    => 'term_id', // Filter by term ID
                    'terms'    => $slider_group_id,
                    'operator' => 'IN',
                ),
            ));
        }
    }
}
add_action('pre_get_posts', 'filter_slides_by_slider_group');


/*
 * Add Feat Image Preview column for posts, pages
 * 
 */

function sd_feat_img_column($columns) {
    $columns['img'] = 'Featured Image';
    return $columns;
}

function sd_manage_feat_img_column($column_name, $post_id) {
    if( $column_name == 'img' ) {
	/*
	 * size of the preview thumb:
	 * thumbnail | menium | large .. etc
	 */
	$img_size = array(60,60);
        echo get_the_post_thumbnail($post_id, $img_size);
    }
    return $column_name;
}
// For Posts
add_filter('manage_posts_columns', 'sd_feat_img_column');
add_filter('manage_posts_custom_column', 'sd_manage_feat_img_column', 10, 2);

// For pages
add_filter('manage_pages_columns', 'sd_feat_img_column');
add_filter('manage_pages_custom_column', 'sd_manage_feat_img_column', 10, 2);


/*
 * Add ID column for media gallery
 * 
 */

add_filter('manage_media_columns', 'posts_columns_attachment_id', 1);
add_action('manage_media_custom_column', 'posts_custom_columns_attachment_id', 1, 2);
function posts_columns_attachment_id($defaults){
    $defaults['wps_post_attachments_id'] = __('ID');
    return $defaults;
}
function posts_custom_columns_attachment_id($column_name, $id){
    if($column_name === 'wps_post_attachments_id'){
    echo $id;
    }
}
/****************************************************************************************/
// Add a custom column to display the mls_alt_title custom field
function add_mls_alt_title_column($columns) {
    // Add a new column after the title column
    $columns['hs_altTitle'] = 'Alternative Title';
    return $columns;
}
add_filter('manage_pages_columns', 'add_mls_alt_title_column');

// Populate the custom column with the mls_alt_title value
function display_mls_alt_title_column($column, $post_id) {
    if ($column === 'hs_altTitle') {
        // Get the value of the custom field mls_alt_title
        $alt_title = get_post_meta($post_id, 'hs_altTitle', true);
        // Display the value, or a placeholder if it's empty
        if (!empty($alt_title)) {
            echo '<strong>'.esc_html($alt_title).'</strong>';
        } else {
            echo '<em>No Alternative Title</em>';
        }
    }
}
add_action('manage_pages_custom_column', 'display_mls_alt_title_column', 10, 2);

/*
 * Add ID column for posts and pages
 * 
 */
 
function sd_posts_columns_id($defaults){
    $defaults['wps_post_id'] = __('ID');
    return $defaults;
}

function sd_posts_custom_id_columns($column_name, $id){
    if($column_name === 'wps_post_id'){
            echo $id;
    }
}
/* Adding column to posts */
add_filter('manage_posts_columns', 'sd_posts_columns_id', 1);
add_action('manage_posts_custom_column', 'sd_posts_custom_id_columns', 5, 2);

/* Adding column to pages */
add_filter('manage_pages_columns', 'sd_posts_columns_id', 1);
add_action('manage_pages_custom_column', 'sd_posts_custom_id_columns', 5, 2);

/* Adding column to products */
add_filter('manage_product_columns', 'sd_posts_columns_id', 1);
add_action('manage_product_custom_column', 'sd_posts_custom_id_columns', 5, 2);

/* Adding column to CPT if needed below */


/*
 * Add ID column for CATEGORIES
 * 
 */
 
add_filter( 'manage_edit-category_columns', 'wpse_77532_cat_edit_columns' );
add_filter( 'manage_category_custom_column', 'wpse_77532_cat_custom_columns', 10, 3 );
add_action( 'admin_head-edit-tags.php', 'wpse_77532_column_width' );

/**
 * Register the ID column
 */
function wpse_77532_cat_edit_columns( $columns )
{
    $in = array( "cat_id" => "ID" );
    $columns = wpse_77532_array_push_after( $columns, $in, 0 );
    return $columns;
}   

/**
 * Print the ID column
 */
function wpse_77532_cat_custom_columns( $value, $name, $cat_id )
{
    if( 'cat_id' == $name ) 
        echo $cat_id;
}

/**
 * CSS to reduce the column width
 */
function wpse_77532_column_width()
{
    // Tags page, exit earlier
    if( 'category' != $_GET['taxonomy'] )
        return;

    echo '<style>.column-cat_id {width:3%}</style>';
}

/**
 * Insert an element at the beggining of the array
 */
function wpse_77532_array_push_after( $src, $in, $pos )
{
    if ( is_int( $pos ) )
        $R = array_merge( array_slice( $src, 0, $pos + 1 ), $in, array_slice( $src, $pos + 1 ) );
    else
    {
        foreach ( $src as $k => $v )
        {
            $R[$k] = $v;
            if ( $k == $pos )
                $R       = array_merge( $R, $in );
        }
    }
    return $R;
}