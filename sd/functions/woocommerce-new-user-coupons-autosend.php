<?php

function generate_welcome_coupon($user_id) {
    if (!$user_id) {
        return;
    }

    if (!session_id()) {
        session_start();
    }

    $user = get_userdata($user_id);
    $user_email = $user->user_email;

    // Generate a unique coupon code
    $coupon_code = 'WELCOME20-' . strtoupper(wp_generate_password(8, false));

    // Create a new WooCommerce coupon
    $coupon = array(
        'post_title'   => $coupon_code,
        'post_content' => 'Welcome discount coupon for new users.',
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_type'    => 'shop_coupon'
    );

    $new_coupon_id = wp_insert_post($coupon);

    // Set coupon meta details
    update_post_meta($new_coupon_id, 'discount_type', 'percent'); // Percentage discount
    update_post_meta($new_coupon_id, 'coupon_amount', '20'); // 20% discount
    update_post_meta($new_coupon_id, 'individual_use', 'yes'); // Cannot be combined with other coupons
    update_post_meta($new_coupon_id, 'usage_limit', 1); // One-time use
    update_post_meta($new_coupon_id, 'usage_limit_per_user', 1);
    update_post_meta($new_coupon_id, 'email_restrictions', array($user_email)); // Restrict to user's email

    // Store coupon code in session for frontend use
    $_SESSION['new_user_coupon'] = $coupon_code;

    // Get store name dynamically
    $store_name = get_bloginfo('name');

    // Email details for user
    $subject_user = "Welcome to {$store_name}! Your 20% Discount Coupon 🎉";

    $message_user = "
        <html>
        <head><title>Welcome to {$store_name}!</title></head>
        <body style='font-family: Arial, sans-serif; color: #333;'>
            <h2>Hi " . esc_html($user->first_name) . "!</h2>
            <p>Thank you for registering at <strong>{$store_name}</strong>. We’re excited to have you!</p>
            <p>Enjoy <strong>20% off</strong> your next purchase with this exclusive coupon:</p>
            <p style='font-size: 22px; font-weight: bold; color: #0073aa;'>" . esc_html($coupon_code) . "</p>
            <p>Use it at checkout and save!</p>
            <p>Best regards,<br> The {$store_name} Team</p>
        </body>
        </html>
    ";

    $headers = array('Content-Type: text/html; charset=UTF-8');
    
    // Send coupon email to user
    wp_mail($user_email, $subject_user, $message_user, $headers);

    // Get all admin users
    $admins = get_users(array('role' => 'administrator'));
    $admin_emails = array_map(function($admin) {
        return $admin->user_email;
    }, $admins);

    // Email details for admin
    $subject_admin = "New User Registered – Coupon Sent";

    $message_admin = "
        <html>
        <head><title>New User Registered – " . esc_html($user->user_email) . "</title></head>
        <body style='font-family: Arial, sans-serif; color: #333;'>
            <h2>New Registration at {$store_name}</h2>
            <p>A new user has registered on your website:</p>
            <p><strong>Name:</strong> " . esc_html($user->first_name) . " " . esc_html($user->last_name) . "</p>
            <p><strong>Email:</strong> " . esc_html($user->user_email) . "</p>
            <p><strong>Coupon Sent:</strong> <span style='font-size: 18px; font-weight: bold; color: #d9534f;'>" . esc_html($coupon_code) . "</span></p>
            <p>Check your WooCommerce reports for new sales!</p>
            <p>Best regards,<br>{$store_name} System</p>
        </body>
        </html>
    ";

    // Send confirmation email to all admins
    wp_mail($admin_emails, $subject_admin, $message_admin, $headers);
}
add_action('user_register', 'generate_welcome_coupon');

/* get coupon from session storage to show in popup */
function get_coupon_code_ajax() {
    if ( ! session_id() ) {
        session_start();
    }

    if ( isset( $_SESSION['new_user_coupon'] ) ) {
        echo json_encode( array( 'coupon' => $_SESSION['new_user_coupon'] ) );
        //unset( $_SESSION['new_user_coupon'] ); // Clear after use
    } else {
        echo json_encode( array( 'coupon' => '' ) );
    }

    wp_die();
}
add_action( 'wp_ajax_get_coupon', 'get_coupon_code_ajax' );
add_action( 'wp_ajax_nopriv_get_coupon', 'get_coupon_code_ajax' );

/* Get coupon from session storage to prefill in coupon form at checkout */
function auto_apply_coupon_code() {
    if ( ! session_id() ) {
        session_start();
    }
    if ( (is_checkout() || is_cart()) && isset($_SESSION['new_user_coupon'])) {
        ?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const params = new URLSearchParams(window.location.search);
    if (sessionStorage.getItem("coupon_shown") == "true") {
        fetch('/wp-admin/admin-ajax.php?action=get_coupon')
        .then(response => response.json())
        .then(data => {
            if (data.coupon) {
                // Add the popup-opened class to body
                document.body.classList.add('popup-opened');

                const popup = document.createElement("div");
                popup.style.position = "fixed";
                popup.style.top = "50%";
                popup.style.left = "50%";
                popup.style.transform = "translate(-50%, -50%)";
                popup.style.background = "#fff";
                popup.style.padding = "20px";
                popup.style.boxShadow = "0 0 10px rgba(0,0,0,0.3)";
                popup.style.zIndex = "1000";
                popup.style.textAlign = "center";
                popup.innerHTML = `
                    <h2>Want to use your coupon now?</h2>
                    <p>Your <strong>20% discount</strong> coupon has also been sent to your email.</p>
                    <p>Your Coupon: 
                        <strong style="font-size: 22px; color: #0073aa;" id="couponCode">${data.coupon}</strong>
                        <button id="copyCoupon" style="margin-left: 10px; cursor: pointer; background: none; border: none;">
                            <i class="fa fa-copy" style="font-size: 18px; color: #0073aa;"></i>
                        </button>
                    </p>
                    <p class="buttonme"><button id="closePopup">Close</button></p>
                `;
                document.body.appendChild(popup);
                
                document.getElementById("closePopup").addEventListener("click", function() {
                    popup.style.display = "none";
                    // Remove the popup-opened class when the popup is closed
                    document.body.classList.remove('popup-opened');
                });
				

                // Add event listener to copy the coupon code to clipboard
                document.getElementById("copyCoupon").addEventListener("click", function() {
                    const couponCode = document.getElementById("couponCode").textContent;
                    popup.style.display = "none";
                    // Remove the popup-opened class when the popup is closed
                    document.body.classList.remove('popup-opened');
                    // Use the clipboard API to copy the coupon code
                    navigator.clipboard.writeText(couponCode).then(function() {
                        alert("Coupon code copied to clipboard!");
                    }).catch(function(err) {
                        alert("Failed to copy coupon code: " + err);
                    });
                });
            }
        });
    }
});

</script>
        <?php
    }
}
add_action('wp_footer', 'auto_apply_coupon_code');

