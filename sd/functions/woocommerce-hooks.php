<?php
/**
 * Add Brand Taxonomy Link to Product Page
 */
function add_product_brand_link() {
    global $product;
    
    // Get the brand terms for the current product
    $brand_terms = get_the_terms($product->get_id(), 'product_brand');
    
    if ($brand_terms && !is_wp_error($brand_terms)) {
        echo '<div class="product-brand-info">';
        
        foreach ($brand_terms as $brand) {
            // Get the brand page URL
            $brand_link = get_term_link($brand, 'product_brand');
            
            if (!is_wp_error($brand_link)) {
                echo sprintf(
                    '<a href="%s" class="product-brand-link" title="View all products from %s">%s</a>',
                    esc_url($brand_link),
                    esc_attr($brand->name),
                    esc_html($brand->name)
                );
            }
        }
        
        echo '</div>';
    }
}

// Hook the function to display on the product page
add_action('woocommerce_single_product_summary', 'add_product_brand_link', 25);

// Optional: If you want to add to product archives as well
add_action('woocommerce_after_shop_loop_item_title', 'add_product_brand_link', 5);

/**************************************************/

/**
 * Add YITH Wishlist button to both single product and shop/category pages
 */
function add_wishlist_to_product_displays() {
    // For single product page
    add_action('woocommerce_before_single_product_summary', function() {
        echo '<div class="wishlist-icon-container single-product">';
        do_action('yith_wcwl_table_after_product_name');
        echo '</div>';
    }, 15);

    // For shop/category/archive pages
    add_action('woocommerce_before_shop_loop_item', function() {
        echo '<div class="wishlist-icon-container shop-loop">';
        do_action('yith_wcwl_table_after_product_name');
        echo '</div>';
    }, 5);
}
add_action('init', 'add_wishlist_to_product_displays');

/**************************************************/

function register_shipment_arrival_order_status() {
   register_post_status( 'wc-shipped', array(
       'label'                     => 'Shipped',
       'public'                    => true,
       'show_in_admin_status_list' => true,
       'show_in_admin_all_list'    => true,
       'exclude_from_search'       => false,
       'label_count'               => _n_noop( 'Shipped <span class="count">(%s)</span>', 'Shipped <span class="count">(%s)</span>' )
   ) );
}
add_action( 'init', 'register_shipment_arrival_order_status' );


function add_awaiting_shipment_to_order_statuses( $order_statuses ) {
   $new_order_statuses = array();
   foreach ( $order_statuses as $key => $status ) {
       $new_order_statuses[ $key ] = $status;
       if ( 'wc-processing' === $key ) {
           $new_order_statuses['wc-shipped'] = 'Shipped';
       }
   }
   return $new_order_statuses;
}
add_filter( 'wc_order_statuses', 'add_awaiting_shipment_to_order_statuses' );

/*
 * Dymamic suffix to price WC
 */
add_filter('woocommerce_get_price_html', 'add_dynamic_suffix_to_price', 10, 2);

function add_dynamic_suffix_to_price($price, $product) {
    $suffix = get_post_meta($product->get_id(), 'prod_priceSuffix', true);
    if ($suffix) {
        $price .= '<span class="price-suffix">/ ' . $suffix .'</span>';
    }
    return $price;
}

/**
* Add Continue Shopping Button on Cart Page
* Add to theme functions.php file or Code Snippets plugin
*/

add_action( 'woocommerce_before_cart_table', 'woo_add_continue_shopping_button_to_cart' );

function woo_add_continue_shopping_button_to_cart() {
 $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
 
 echo '<div class="woocommerce-message">';
 echo ' <a href="'.$shop_page_url.'" class="button">Continue Shopping →</a> Would you like some more goods?';
 echo '</div>';
}

add_action( 'woocommerce_before_checkout_form', 'njengah_add_continue_shopping_button_to_cart' );
 
function njengah_add_continue_shopping_button_to_cart() {
 
 $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
 
 echo '<div class="woocommerce-message">';
 
 echo ' <a href="'.$shop_page_url.'" class="button">Continue Shopping</a> → Would you like some more goods?';
 
 echo '</div>';
 }


/**
 * Check if WooCommerce is activated
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}


// Enable Gutenberg editor for WooCommerce
function sd_activate_gutenberg_product( $can_edit, $post_type ) {
 if ( $post_type == 'product' ) {
        $can_edit = true;
    }
    return $can_edit;
}
add_filter( 'use_block_editor_for_post_type', 'sd_activate_gutenberg_product', 10, 2 );

// enable taxonomy fields for woocommerce with gutenberg on
function j0e_enable_taxonomy_rest( $args ) {
    $args['show_in_rest'] = true;
    return $args;
}
add_filter( 'woocommerce_taxonomy_args_product_cat', 'j0e_enable_taxonomy_rest' );
add_filter( 'woocommerce_taxonomy_args_product_tag', 'j0e_enable_taxonomy_rest' );

/**
 * @snippet       Add next/prev buttons @ WooCommerce Single Product Page
 * @how-to        Get CustomizeWoo.com FREE
 * @sourcecode    https://businessbloomer.com/?p=20567
					https://www.businessbloomer.com/woocommerce-add-nextprevious-single-product-page/
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 2.5.5
 */
 
//add_action( 'woocommerce_before_single_product', 'sd_prev_next_product' );
 
// and if you also want them at the bottom...
add_action( 'woocommerce_after_single_product_summary', 'sd_prev_next_product' );
 
function sd_prev_next_product(){
	echo '<div class="prev_next_buttons"><div class="btn-wrapper">';
		// 'product_cat' will make sure to return next/prev from current category
		$previous = next_post_link('%link', '&larr; previous', TRUE, ' ', 'product_cat');
		$next = previous_post_link('%link', 'next &rarr;', TRUE, ' ', 'product_cat');
		echo $previous;
		echo $next;
	echo '</div></div>';
         
}


/* SEO: Set single product image ALT tag to Prod Title  */
function wpso_customize_single_product_image( $details ) {
    global $product;
    $details['alt'] = $details['title'] = get_the_title( $product->get_id() );
    return $details;
}
add_filter( 'woocommerce_gallery_image_html_attachment_image_params','wpso_customize_single_product_image' );

//Hide count in sub-cat of WC
add_filter( 'woocommerce_subcategory_count_html', 'imte_hide_category_count' );
function imte_hide_category_count() {
// No count
}



/** https://www.businessbloomer.com/woocommerce-add-prefix-suffix-product-prices/
 * @snippet       Adds suffix to WooCommerce prices
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.8
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 /* 
add_filter( 'woocommerce_get_price_suffix', 'bbloomer_add_price_suffix', 99, 4 );
  
function bbloomer_add_price_suffix( $html, $product, $price, $qty ){
    $html .= ' suffix here';
    return $html;
}
*/
/**
 * @snippet       Adds prefix to WooCommerce prices
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.8
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
/*   
add_filter( 'woocommerce_get_price_html', 'bbloomer_add_price_prefix', 99, 2 );
  
function bbloomer_add_price_prefix( $price, $product ){
    $price = 'Prefix here ' . $price;
    return $price;
}
*/

// display an 'Out of Stock' label on archive pages
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_stock', 10 );
function woocommerce_template_loop_stock() {
    global $product;
    if ( ! $product->managing_stock() && ! $product->is_in_stock() )
        echo '<p class="stock out-of-stock">Out of Stock</p>';
}


/*
 *  WooCommerce Hooks
 *  https://docs.woocommerce.com/document/woocommerce-theme-developer-handbook/
 */
 
/*
 * WooCommerce Images Sizes
 */
 /*
add_action('init', function(){
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
    add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
});

if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
    function woocommerce_template_loop_product_thumbnail() {
        echo woocommerce_get_product_thumbnail();
    } 
}

if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {   
	
    function woocommerce_get_product_thumbnail( $size = 'large' ) {
        global $post, $woocommerce;
        //$output = '<div class="feat-image">';

        if ( has_post_thumbnail() ) {               
            
			$altFeatImage = rwmb_meta('prod_imgFeat', $post->ID);
			foreach ($altFeatImage as $image ) {
				/*
				echo '<pre>';
				var_dump($image['alt']);
				echo '</pre>';
				*/
				/*
				$altImgUrl = $image['full_url'];
				$altImgAlt = $image['alt'];
			}
			$output = get_the_post_thumbnail( $post->ID, $size );
			/*
			if(!empty($altImgUrl)){
				$output .= '<img src="' . $altImgUrl . '" alt="' . $altImgAlt . '" />';
			} else {
				$output .= get_the_post_thumbnail( $post->ID, $size );
			}
			*/
			/*
        } else {
             $output .= wc_placeholder_img( $size );
             // Or alternatively setting yours width and height shop_catalog dimensions.
             // $output .= '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" width="300px" height="300px" />';
        }                       
        //$output .= '</div>';
        return $output;
    }
}
*/
 

//*https://stackoverflow.com/questions/50773845/customizing-loop-product-image-via-a-hook-in-woocommerce */

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'custom_loop_product_thumbnail', 10 );
function custom_loop_product_thumbnail() {
    global $product;
    $size = 'woocommerce_thumbnail';

    $image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );

    echo $product ? $product->get_image( $image_size ) : '';
}




//https://wpbeaches.com/add-woocommerce-cart-icon-to-menu-with-cart-item-count/
if( is_woocommerce_activated() ) {
	add_shortcode ('woo_cart_but', 'woo_cart_but' );
}
/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */

function woo_cart_but() {
	ob_start();
	$cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
	$cart_url = wc_get_cart_url();  // Set Cart URL

	?>
	<div><a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="My Basket">
	<?php
	if ( $cart_count > 0 ) {
   ?>
		<span class="cart-contents-count"><i class="fa fa-shopping-cart"></i><span><?php echo $cart_count; ?></span></span>
	<?php
	}
	?>
	</a></div>
	<?php
	return ob_get_clean();
}

/**
 * Add AJAX Shortcode when cart contents update
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );
function woo_cart_but_count( $fragments ) {
 
    ob_start();
    
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();
    
    ?>
    <a class="cart-contents menu-item" href="<?php echo $cart_url; ?>" title="<?php _e( 'View your shopping cart' ); ?>">
	<?php
    if ( $cart_count > 0 ) {
        ?>
        <span class="cart-contents-count"><i class="fa fa-shopping-cart"></i><span><?php echo $cart_count; ?></span></span>
        <?php            
    }
        ?></a>
    <?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}

// Enable support for WooCommerce
function sd_add_woocommerce_support() {
	add_theme_support( 'woocommerce',
		array(
			'thumbnail_image_width' => 490,
			'single_image_width'    => 480,
		    'product_grid'          => array(
		            'default_rows'    => 4,
		            'min_rows'        => 2,
		            'max_rows'        => 8,
		            'default_columns' => 4,
		            'min_columns'     => 2,
		            'max_columns'     => 4,
		        ),
		)
	);
}
add_action( 'after_setup_theme', 'sd_add_woocommerce_support' );


add_filter( 'woocommerce_output_related_products_args', 'sd_related_products_args', 999 );
  function sd_related_products_args( $args ) {
	$args['posts_per_page'] = 6; // X related products
	$args['columns'] = 3; // arranged in Y columns
	return $args;
}

//default sorting of prods
add_filter('woocommerce_get_catalog_ordering_args', 'custom_default_sort_by_id', 10, 1);

function custom_default_sort_by_id($args) {
    // Check if no specific sorting is selected
    if (!isset($_GET['orderby']) || $_GET['orderby'] === 'menu_order') {
        $args['orderby'] = 'ID';  // Sort by product ID
        $args['order'] = 'ASC'; // Change to 'ASC' for ascending order
    }
    return $args;
}

// Set the default sorting dropdown to "Sort by ID" if needed
add_filter('woocommerce_default_catalog_orderby_options', 'add_id_sorting_option');
add_filter('woocommerce_catalog_orderby', 'add_id_sorting_option');

function add_id_sorting_option($options) {
    $options['id'] = 'Sort by ID'; // Add "Sort by ID" option to the dropdown
    return $options;
}

// Change the Number of WooCommerce Products Displayed Per Page
add_filter( 'loop_shop_per_page', 'lw_loop_shop_per_page', 30 );

function lw_loop_shop_per_page( $products ) {
 $products = 12;
 return $products;
}

/* WC Product Gallery */

//Enabling product gallery features (zoom, swipe, lightbox)
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

//disabing - if needed

// remove_theme_support( 'wc-product-gallery-zoom' );
// remove_theme_support( 'wc-product-gallery-lightbox' );
// remove_theme_support( 'wc-product-gallery-slider' );


/**
 * WC products per row to N
 */

if (!function_exists('sd_loop_columns')) {
	function sd_loop_columns() {
		$cols = 3; // assign cols to N here
		return $cols;
	}
}
add_filter('loop_shop_columns', 'sd_loop_columns', 999);



/**
* Hook: woocommerce_single_product_summary.
*
* @hooked woocommerce_template_single_title - 5
* @hooked woocommerce_template_single_rating - 10
* @hooked woocommerce_template_single_price - 10
* @hooked woocommerce_template_single_excerpt - 20
* @hooked woocommerce_template_single_add_to_cart - 30
* @hooked woocommerce_template_single_meta - 40
* @hooked woocommerce_template_single_sharing - 50
* @hooked WC_Structured_Data::generate_product_data() - 60
*/

//Reordering single products fields on frontend
//from
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

//to
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 15 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 80 );



/**
 * Add the product's short description (excerpt) to the WooCommerce shop/category pages. The description displays after the product's name, but before the product's price.
 *
 * Ref: https://gist.github.com/om4james/9883140
 *
 * Put this snippet into a child theme's functions.php file
 */
function woocommerce_after_shop_loop_item_title_short_description() {
	global $product;
	if ( ! $product->post->post_excerpt ) return;
	?>
	<div itemprop="description">
		<?php echo apply_filters( 'woocommerce_short_description', $product->post->post_excerpt ) ?>
	</div>
	<?php
}
add_action('woocommerce_after_shop_loop_item', 'woocommerce_after_shop_loop_item_title_short_description', 5);


/**
 * Remove Product Tabs
 * on single product page
 */
function sd_remove_tabs( $tabs ) {
	//unset( $tabs['description'] );
	//unset( $tabs['additional_information'] );
	unset( $tabs['reviews'] );
	return $tabs;
 
}
add_filter( 'woocommerce_product_tabs', 'sd_remove_tabs' );

/**
 * Rename product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

	$tabs['description']['title'] = __( 'Video' );		// Rename the description tab
	//$tabs['reviews']['title'] = __( 'Ratings' );				// Rename the reviews tab
	//$tabs['additional_information']['title'] = __( 'Product Data' );	// Rename the additional information tab

	return $tabs;
}

/**
 * Reorder product data tabs
 */
//add_filter( 'woocommerce_product_tabs', 'woo_reorder_tabs', 98 );
function woo_reorder_tabs( $tabs ) {

	$tabs['reviews']['priority'] = 5;			// Reviews first
	$tabs['description']['priority'] = 10;			// Description second
	$tabs['additional_information']['priority'] = 15;	// Additional information third
	return $tabs;
}

/*
 * Change a limit of search result for the product
 */
function sd_searchfilter($query) {
    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('product'));
        $query->set('posts_per_page', 15);
    }

return $query;
}
add_filter('pre_get_posts','sd_searchfilter');

/*
 * Add Cistom Fields to WC Checkout
 */
/**
 * Add the field to the checkout page
 */
 /*
add_action('woocommerce_after_order_notes', 'customise_checkout_field');
function customise_checkout_field($checkout){
	echo '<div id="ship_my_acc_section"><h3>' . __('Ship on my account') . '</h3><p>Please include your shipping account details if you chose to ship on your account</p>';
	woocommerce_form_field('ship_to_my_acc_checkbox', array(
		'type' => 'checkbox',
		'class' => array(
			'ship-to-my-acc-checkbox form-row-wide'
		),
		'label' => __('Ship on my account') ,
		'placeholder' => __('') ,
		'required' => false,
	),
	$checkout->get_value('ship_to_my_acc_checkbox'));
	
	woocommerce_form_field('ship_to_my_acc_number', array(
		'type' => 'text',
		'class' => array(
			'ship-to-my-acc-number form-row-wide'
		),
		'label' => __('Account number') ,
		'placeholder' => __('Enter your account number') ,
		'required' => false,
	),
	$checkout->get_value('ship_to_my_acc_number'));
?>
	<script>
	jQuery(document).ready(function($){
		$('#ship_my_acc_section .ship-to-my-acc-checkbox input[type=checkbox]').on('click', function(){
			if ( $(this).is(":checked") ) {
				$('#ship_my_acc_section p.ship-to-my-acc-number').show();
			} else {
				$('#ship_my_acc_section p.ship-to-my-acc-number').hide();
			}
		});
	});
	</script>
<?php	
  echo '</div>';
}


/**
 * Checkout Process
 */
 /*
add_action('woocommerce_checkout_process', 'customise_checkout_field_process');
function customise_checkout_field_process()
{
  // if the field is set, if not then show an error message.
  if (!$_POST['ship_to_my_acc_number']) wc_add_notice(__('Please enter value.') , 'error');
}
*/


/**
 * Update value of field
 */
 /*
add_action('woocommerce_checkout_update_order_meta', 'customise_checkout_field_update_order_meta');
function customise_checkout_field_update_order_meta($order_id)
{
  if (!empty($_POST['ship_to_my_acc_number'])) {
    update_post_meta($order_id, '_account_no', sanitize_text_field($_POST['ship_to_my_acc_number']));
  }
}

add_action( 'woocommerce_admin_order_data_after_billing_address', 'bbloomer_show_new_checkout_field_order', 10, 1 );
function bbloomer_show_new_checkout_field_order( $order ) {    
   $order_id = $order->get_id();
   if ( get_post_meta( $order_id, '_account_no', true ) ) echo '<p><strong>Ship on my account:</strong><br/>' . get_post_meta( $order_id, '_account_no', true ) . '</p>';
}
 
add_action( 'woocommerce_email_after_order_table', 'bbloomer_show_new_checkout_field_emails', 20, 4 );
  
function bbloomer_show_new_checkout_field_emails( $order, $sent_to_admin, $plain_text, $email ) {
    if ( get_post_meta( $order->get_id(), '_account_no', true ) ) echo '<p><strong>Shop to my acc:</strong> ' . get_post_meta( $order->get_id(), '_account_no', true ) . '</p>';
}
*/