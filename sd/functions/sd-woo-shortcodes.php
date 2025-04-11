<?php
/*
 * display brand images with links to the corresponding taxonomy pages (i.e., links to the archive page for each brand in the product_brand taxonomy
 * usage
 * [brands_with_images hide_empty="false"]
 */
function display_brands_with_images($atts) {
    // Set default attributes for the shortcode
    $atts = shortcode_atts( array(
        'hide_empty' => 'true', // Default value is 'true' to hide empty brands
    ), $atts, 'brands_with_images' );

    // Convert hide_empty to boolean
    $hide_empty = ($atts['hide_empty'] === 'true') ? true : false;

    // Fetch all terms from the product_brand taxonomy
    $terms = get_terms( array(
        'taxonomy'   => 'product_brand', // Use the 'product_brand' taxonomy
        'hide_empty' => $hide_empty,      // Apply hide_empty based on the attribute
		'orderby' => 'menu_order',     // Sort by menu order
		'order' => 'ASC'               // Ascending order (low to high)
    ));

    // Check if there are any terms
    if ( !empty($terms) && !is_wp_error($terms)) {
        $output = '<div class="brands-list">'; // Start of the container

        foreach ($terms as $term) {
            // Get the brand image (if any) associated with the term
            $brand_image = get_term_meta($term->term_id, 'thumbnail_id', true);
            $image_url = wp_get_attachment_url($brand_image); // Get the URL of the image

            // Create the HTML output
            $output .= '<div class="brand-item">';

            // If the image exists, display it
            if ($image_url) {
                // Create a link to the taxonomy archive page
                $output .= '<a rel="category" href="' . get_term_link($term) . '" title="Browse '. esc_attr($term->name) .' Products" itemscope itemtype="https://schema.org/Brand">';
                $output .= '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($term->name) . '" itemprop="logo" />';
				$output .= '<meta itemprop="name" content="' . esc_attr($term->name) . '" />';
                $output .= '</a>';
            } else {
				// Optionally display the brand name as text
				$output .= '<p><a href="' . get_term_link($term) . '">' . esc_html($term->name) . '</a></p>';
			}
            $output .= '</div>'; // End brand item
        }

        $output .= '</div>'; // End the container
    } else {
        $output = '<p>No brands available.</p>';
    }

    return $output; // Return the generated HTML
}

// Register the shortcode
add_shortcode('brands_with_images', 'display_brands_with_images');


function wc_my_account_menu_shortcode() {
    if (!is_user_logged_in()) {
        return '<p>Please <a href="' . esc_url(wp_login_url()) . '">log in</a> to access your account.</p>';
    }

    ob_start();
    ?>
    <nav class="woocommerce-my-account-menu">
        <ul>
            <?php
            foreach (wc_get_account_menu_items() as $endpoint => $label) {
                echo '<li class="' . wc_get_account_menu_item_classes($endpoint) . '">';
                echo '<a href="' . esc_url(wc_get_account_endpoint_url($endpoint)) . '">' . esc_html($label) . '</a>';
                echo '</li>';
            }
            ?>
        </ul>
    </nav>
    <?php
    return ob_get_clean();
}
add_shortcode('wc_my_account_menu', 'wc_my_account_menu_shortcode');


/**
 * New Arival Shortcode
	[new_arrivals category="your-category-slug" orderby="date" order="DESC" limit="10"]
	[new_arrivals orderby="date" order="DESC" limit="10"]
 */
function get_new_arrivals_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'category' => '',
            'orderby'  => 'date',
            'order'    => 'DESC',
            'limit'    => 10,
        ),
        $atts,
        'new_arrivals'
    );

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => intval($atts['limit']),
        'orderby'        => sanitize_text_field($atts['orderby']),
        'order'          => sanitize_text_field($atts['order']),
        'post_status'    => 'publish', // Ensure only published products are retrieved
    );

    // Add category filter if specified
    if (!empty($atts['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => sanitize_text_field($atts['category']),
            ),
        );
    }

    $query = new WP_Query($args);
    ob_start();

    if ($query->have_posts()) {
        echo '<div class="slider-container"><ul class="new-arrivals slider">';
        while ($query->have_posts()) {
            $query->the_post();
            // Custom HTML wrapper for each product
            //echo '<li class="new-arrival-item">';
            
            // Use the WooCommerce template parts for the product
            wc_get_template_part('content', 'product'); // This will load the default product template part
            
            //echo '</li>'; // Close new-arrival-item
        }
        echo '</ul></div>';
        wp_reset_postdata();
    } else {
        echo '<p>No products found.</p>';
    }

    return ob_get_clean();
}

add_shortcode('new_arrivals', 'get_new_arrivals_shortcode');

/*
 * Custom Shortcode for WooCommerce Categories with Slider Layout
 * usage [category_slider ids="12,15,18"]
 */
function custom_woocommerce_category_slider($atts) {
    $atts = shortcode_atts(
        array(
            'ids' => '', // Category IDs, comma-separated
        ), 
        $atts, 
        'category_slider'
    );

    $ids = explode(',', $atts['ids']); // Convert ID string to array
    $args = array(
        'taxonomy'   => 'product_cat',
        'include'    => $ids,
        'hide_empty' => false,
    );

    $categories = get_terms($args);
    if (empty($categories)) return '';

    ob_start(); ?>

    <div class="slider-container">
        <ul class="new-arrivals slider">
            <?php foreach ($categories as $category) :
                $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                $image_url = ($thumbnail_id) ? wp_get_attachment_url($thumbnail_id) : wc_placeholder_img_src();
                $category_link = get_term_link($category); 
            ?>
                <li class="slide">
                    <a href="<?php echo esc_url($category_link); ?>" class="thumb-link">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category->name); ?>">
                        <h3 class="category-title"><span><?php echo esc_html($category->name); ?></span></h3>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <?php return ob_get_clean();
}
add_shortcode('category_slider', 'custom_woocommerce_category_slider');

/*
 * Featured Prods
 * usage [featured_products_slider limit="6"]
 */
function custom_woocommerce_featured_products_slider($atts) {
    $atts = shortcode_atts(
        array(
            'limit' => 10, // Number of products to display
        ), 
        $atts, 
        'featured_products_slider'
    );
    
    // Query for featured products
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => $atts['limit'],
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured',
                'operator' => 'IN',
            ),
        ),
        'status'         => 'publish',
    );
    
    $products = new WP_Query($args);
    
    if (!$products->have_posts()) return '';
    
    ob_start(); ?>
    <div class="slider-container">
        <ul class="featured-products slider">
            <?php while ($products->have_posts()) : $products->the_post();
            
                wc_get_template_part('content', 'product'); // This will load the default product template part
				
            endwhile; wp_reset_postdata(); ?>
        </ul>
    </div>
    <?php return ob_get_clean();
}
add_shortcode('featured_products_slider', 'custom_woocommerce_featured_products_slider');



/**
 * Add custom button before shop loop on category pages
 */
function add_custom_button_before_shop_loop() {
    // Check if we're on a product category page
    if (is_product_category() || is_tax() || is_shop() ) {
        // Get current category
        $current_category = get_queried_object();
        
        // Output your custom button
        ?>
		<div id="filters-panel" class="custom-category-button buttonme">
			<a id="filter-toggler" href="#" class="filter-btn"><i class="fa fa-tasks"></i> Filter</a>
			<a id="view-toggler-list" href="#" class="filter-btn active"><i class="fa fa-list"></i></a>
			<a id="view-toggler-grid" href="#" class="filter-btn"><i class="fa fa-table"></i></a>
        </div>
		<div id="filters-menu">
			<div id="filters-container">
				<button class="wc-block-components-button wp-element-button wc-block-components-drawer__close contained" aria-label="Close" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true" focusable="false"><path d="M13 11.8l6.1-6.3-1-1-6.1 6.2-6.1-6.2-1 1 6.1 6.3-6.5 6.7 1 1 6.5-6.6 6.5 6.6 1-1z"></path></svg></button>
				<?php dynamic_sidebar('sidebar-main'); ?>
			</div>
		</div>
		<div id="active-filters">
			<?php echo do_shortcode('[do_widget id=woocommerce_layered_nav_filters-2]'); ?>
			<?php echo do_shortcode('[do_widget id=yith-woo-ajax-reset-navigation-2 title=false]'); ?>
			<script>
			(function($) {
				$(document).on('yith-wcan-ajax-filtered', function() {
					// Function to refresh the active filters section
					refreshActiveFilters();
				});

				function refreshActiveFilters() {
					// Perform an AJAX call to retrieve the updated active filters
					$.ajax({
						url: window.location.href, // Current page URL
						method: 'GET',
						dataType: 'html',
						success: function(response) {
							// Parse the response to extract the active filters section
							var updatedFilters = $(response).find('.widget_layered_nav_filters').html();
							$('.widget_layered_nav_filters').html(updatedFilters);
						},
						error: function() {
							console.error('Failed to refresh active filters.');
						}
					});
				}
			})(jQuery);
			</script>
		</div>
		<?php
    }
}
// Hook it with priority 30 (after the default WooCommerce elements)
add_action('woocommerce_before_shop_loop', 'add_custom_button_before_shop_loop', 30);




/* 
 * Add WooCommerce Category Selection to Widgets in Sidebar
 */
function custom_widget_category_control($widget, $return, $instance) {
    // Only run in admin and only for widgets in sidebar-main
    if (!is_admin()) {
        return;
    }
    
    // Get the current widget's sidebar ID
    $sidebars = wp_get_sidebars_widgets();
    $current_sidebar = null;
    
    foreach ($sidebars as $sidebar_id => $widgets) {
        if (is_array($widgets) && in_array($widget->id, $widgets)) {
            $current_sidebar = $sidebar_id;
            break;
        }
    }
    
    // Only proceed if this widget is in sidebar-main
    if ($current_sidebar !== 'sidebar-main') {
        return;
    }
    
    // Initialize the categories array if not set
    if (!isset($instance['wc_categories'])) {
        $instance['wc_categories'] = [];
    }
    
    // Generate a unique ID for this widget instance
    $search_id = 'cat-search-' . $widget->id;
    
    // Display the category selection UI with search
    $product_categories = get_terms(['taxonomy' => 'product_cat', 'hide_empty' => false]);
    
    // Add search field
    echo '<p><strong>Show on WooCommerce Categories:</strong></p>';
    echo '<p><input type="text" id="' . esc_attr($search_id) . '" class="widefat" placeholder="Search categories..." style="margin-bottom: 8px;"></p>';
    
    // Categories list with data attributes for searching
    echo '<ul id="cat-list-' . esc_attr($widget->id) . '" style="max-height: 150px; overflow-y: auto; border: 1px solid #ddd; padding: 5px;">';
    foreach ($product_categories as $category) {
        $checked = in_array($category->term_id, (array) $instance['wc_categories']) ? 'checked' : '';
        $label = sprintf('%s <small style="color:#6d6d6d;">(ID: %d, Slug: %s)</small>', $category->name, $category->term_id, $category->slug);
        $search_data = strtolower($category->name . ' ' . $category->slug . ' ' . $category->term_id);
        echo '<li data-search="' . esc_attr($search_data) . '"><label><input type="checkbox" name="widget-' . $widget->id_base . '[' . $widget->number . '][wc_categories][]" value="' . esc_attr($category->term_id) . '" ' . $checked . '> ' . $label . '</label></li>';
    }
    echo '</ul>';
    
    // Add inline JavaScript for search functionality
    ?>
    <script>
    (function($) {
        // Wait for DOM to be ready
        $(document).ready(function() {
            // Set up search filter
            $('#<?php echo $search_id; ?>').on('keyup', function() {
                var searchText = $(this).val().toLowerCase();
                $('#cat-list-<?php echo $widget->id; ?> li').each(function() {
                    var itemText = $(this).data('search');
                    if (itemText.indexOf(searchText) !== -1) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    })(jQuery);
    </script>
    <?php
}

function custom_widget_category_update($instance, $new_instance) {
    // Process the wc_categories field
    $instance['wc_categories'] = isset($_POST['widget-' . $_POST['widget-id'] . '-wc_categories']) ? 
        array_map('intval', $_POST['widget-' . $_POST['widget-id'] . '-wc_categories']) : [];
    
    return $instance;
}

function custom_widget_category_display($sidebar_params) {
    // Only apply filtering on the frontend for product category pages
    if (!is_admin() && is_product_category()) {
        $current_category = get_queried_object_id();
        
        foreach ($sidebar_params as $index => $params) {
            if (isset($params['id'], $params['widget_id']) && $params['id'] === 'sidebar-main') {
                // Extract the widget base ID and number
                preg_match('/^(.+)-(\d+)$/', $params['widget_id'], $matches);
                if (count($matches) === 3) {
                    $widget_base = $matches[1];
                    $widget_num = $matches[2];
                    
                    // Get widget settings
                    $widget_settings = get_option('widget_' . $widget_base);
                    
                    // Check if this widget should be displayed for current category
                    if (isset($widget_settings[$widget_num]['wc_categories']) && 
                        !empty($widget_settings[$widget_num]['wc_categories']) && 
                        !in_array($current_category, (array)$widget_settings[$widget_num]['wc_categories'])) {
                        unset($sidebar_params[$index]);
                    }
                }
            }
        }
    }
    
    return $sidebar_params;
}

add_filter('dynamic_sidebar_params', 'custom_widget_category_display');
add_filter('widget_update_callback', 'custom_widget_category_update', 10, 2);
add_action('in_widget_form', 'custom_widget_category_control', 10, 3);