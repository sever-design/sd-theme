<?php

// Create "My Coupons" for user
function add_my_coupons_to_my_account_menu($menu_links) {
    $menu_links['my-coupons'] = 'My Coupons';
    return $menu_links;
}
add_filter('woocommerce_account_menu_items', 'add_my_coupons_to_my_account_menu');

// Add endpoint for "My Coupons" page
function my_coupons_add_endpoint() {
    add_rewrite_endpoint('my-coupons', EP_PAGES);
}
add_action('init', 'my_coupons_add_endpoint');

/// Display "My Coupons" content
function my_coupons_content() {
    $user_id = get_current_user_id();
    
    // Get the coupons assigned to the logged-in user
    $assigned_coupons = get_user_meta($user_id, '_user_assigned_coupons', true);

    if (!empty($assigned_coupons)) {
        echo '<h2>Your Assigned Coupons</h2>';
        echo '<p>Here are your available coupons:</p>';
        echo '<ul>';
        
        foreach ($assigned_coupons as $coupon_code) {
            $coupon = new WC_Coupon($coupon_code);
            
            // Check if the coupon exists
            if ($coupon->get_id()) {
                // Get the coupon usage limit and usage count
                $usage_limit = $coupon->get_usage_limit();
                $usage_count = $coupon->get_usage_count();
                
                // Check if the coupon has been used up (if usage count is >= usage limit)
                if ($usage_limit > 0 && $usage_count >= $usage_limit) {
                    continue; // Skip this coupon if it's been fully used
                }

                // Get the discount details
                $discount_amount = $coupon->get_amount();
                $discount_type = $coupon->get_discount_type();
                $discount_display = '';

                // Determine how to display the discount value
                if ($discount_type === 'percent') {
                    $discount_display = $discount_amount . '%';  // For percentage discount
                } elseif ($discount_type === 'fixed_cart' || $discount_type === 'fixed_product') {
                    $discount_display = wc_price($discount_amount);  // For fixed amount discount
                } else {
                    $discount_display = $discount_amount;  // Fallback (though it should be fixed or percent)
                }

                // Calculate how many uses are left
                $uses_left = $usage_limit - $usage_count;
                
                // Display coupon with usage info
                echo "<li><strong>$coupon_code</strong> - Discount: $discount_display - ";
                echo "<small>Used: $usage_count / $usage_limit times</small> * ";
                echo "<small>Times Left: $uses_left</small></li>";
            }
        }
        
        echo '</ul>';
    } else {
        echo '<p>You have no assigned coupons.</p>';
    }
}
add_action('woocommerce_account_my-coupons_endpoint', 'my_coupons_content');





// Reorder "My Coupons" to be after "Orders" tab
function reorder_my_account_menu($menu_links) {
    // Insert "My Coupons" after the "Orders" tab
    $menu_links = array_slice($menu_links, 0, 1, true) +
                  ['my-coupons' => __('My Coupons', 'woocommerce')] +
                  array_slice($menu_links, 1, null, true);

    return $menu_links;
}
add_filter('woocommerce_account_menu_items', 'reorder_my_account_menu', 99);

// Add the "My Coupons" endpoint content
function my_coupons_endpoint_content() {
    echo '<h2>My Coupons</h2>';
    echo '<p>Here you can view your available coupons.</p>';
}
//add_action('woocommerce_account_my-coupons_endpoint', 'my_coupons_endpoint_content');

// Create a field in the user profile page to assign coupons using a dropdown
function add_user_coupon_field($user) {
    // Ensure WooCommerce is active
    if (class_exists('WooCommerce')) {
        // Get existing assigned coupons
        $assigned_coupons = get_user_meta($user->ID, '_user_assigned_coupons', true);
        if (!$assigned_coupons) {
            $assigned_coupons = array();
        }

        // Use WP_Query to get all available coupons (shop_coupon post type)
        $coupon_query = new WP_Query([
            'post_type' => 'shop_coupon',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC'
        ]);

        if ($coupon_query->have_posts()) {
            ?>
            <h3><?php _e('Assigned Coupons', 'woocommerce'); ?></h3>
            <table class="form-table">
                <tr>
                    <th><label for="user_assigned_coupons"><?php _e('Assign Coupons to User', 'woocommerce'); ?></label></th>
                    <td>
                        <select name="user_assigned_coupons[]" id="user_assigned_coupons" multiple="multiple" style="width: 300px;">
                            <?php
                            while ($coupon_query->have_posts()) {
                                $coupon_query->the_post();
                                $coupon_code = get_the_title();
                                
                                // Get discount amount and type
                                $discount_amount = get_post_meta(get_the_ID(), 'coupon_amount', true);
                                $discount_type = get_post_meta(get_the_ID(), 'discount_type', true);
                                $discount_display = '';

                                // Determine how to display the discount value
                                if ($discount_type === 'percent') {
                                    $discount_display = $discount_amount . '%';  // For percentage discount
                                } elseif ($discount_type === 'fixed_cart' || $discount_type === 'fixed_product') {
                                    $discount_display = wc_price($discount_amount);  // For fixed amount discount
                                } else {
                                    $discount_display = $discount_amount;  // Fallback (though it should be fixed or percent)
                                }

                                ?>
                                <option value="<?php echo esc_attr($coupon_code); ?>"
                                    <?php echo in_array($coupon_code, $assigned_coupons) ? 'selected="selected"' : ''; ?>>
                                    <?php echo esc_html($coupon_code); ?> 
                                    (<?php echo esc_html($discount_display); ?>)
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                        <p class="description"><?php _e('Select coupons to assign to the user.', 'woocommerce'); ?></p>
                    </td>
                </tr>
            </table>
            <?php
        } else {
            echo '<p>No coupons available.</p>';
        }

        // Reset post data
        wp_reset_postdata();
    }
}
add_action('show_user_profile', 'add_user_coupon_field');
add_action('edit_user_profile', 'add_user_coupon_field');



// Save the coupon codes when the user profile is saved
function save_user_coupon_field($user_id) {
    if (isset($_POST['user_assigned_coupons'])) {
        // Save selected coupons
        update_user_meta($user_id, '_user_assigned_coupons', $_POST['user_assigned_coupons']);
    }
}
add_action('personal_options_update', 'save_user_coupon_field');
add_action('edit_user_profile_update', 'save_user_coupon_field');

// Create and assign a coupon to a user programmatically (if not already created)
function create_and_assign_coupon($user_id) {
    $coupon_codes = get_user_meta($user_id, '_user_assigned_coupons', true);
    
    if ($coupon_codes) {
        foreach ($coupon_codes as $coupon_code) {
            // Check if the coupon already exists
            $coupon = new WC_Coupon($coupon_code);
            if (!$coupon->get_id()) {
                // Create the coupon if it doesn't exist
                $coupon = new WC_Coupon();
                $coupon->set_code($coupon_code); // Set coupon code
                $coupon->set_discount_type('fixed_cart'); // You can change this to 'percent' if needed
                $coupon->set_amount('10'); // Amount or percentage (adjust as needed)
                $coupon->set_usage_limit(1); // Limit to 1 use per user
                $coupon->set_individual_use(true); // Ensure it can't be combined with other coupons
                $coupon->save();
            }
        }
    }
}
add_action('user_register', 'create_and_assign_coupon', 10, 1);
add_action('personal_options_update', 'create_and_assign_coupon', 10, 1);
add_action('edit_user_profile_update', 'create_and_assign_coupon', 10, 1);

// Restrict coupon usage to specific user
function restrict_coupon_to_user($valid, $coupon, $user_id) {
    // Get the list of assigned coupons for the user
    $assigned_coupons = get_user_meta($user_id, '_user_assigned_coupons', true);
    
    // If the coupon is not in the list of assigned coupons, invalidate it
    if (!in_array($coupon->get_code(), (array) $assigned_coupons)) {
        return false;
    }

    return $valid;
}
add_filter('woocommerce_coupon_is_valid_for_user', 'restrict_coupon_to_user', 10, 3);

// Display the assigned coupons on the "My Account" page
function show_user_assigned_coupons() {
    $user_id = get_current_user_id();
    $assigned_coupons = get_user_meta($user_id, '_user_assigned_coupons', true);

    if ($assigned_coupons) {
        echo '<h2>Your Assigned Coupons</h2>';
        echo '<ul>';
        foreach ($assigned_coupons as $coupon) {
            echo '<li>' . $coupon . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>You have no assigned coupons.</p>';
    }
}
add_action('woocommerce_account_dashboard', 'show_user_assigned_coupons');
