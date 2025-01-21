<?php
/* ====================================
 * Plugin Name: RA Functions
 * Description: Substitute of functions.php. Attention! Never disactivate it because all the extended features will be lost! In this plugin I make all customization functions for site.
 * Author: <a href="http://rusadesign.com/en/">Ruslan Abdilkhamidov</a>
 * Version: 1.0
 * ==================================== */

define( 'RAF_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'RAF_PLUGIN_URL', plugin_dir_url(__FILE__) );

// Define Child Theme URL
$child_theme_uri = dirname( get_bloginfo('stylesheet_url'));

if(!defined('CHILD_THEME_URL')){
	define( 'CHILD_THEME_URL', dirname( get_bloginfo('stylesheet_url')) );
}

// needed for check is_plugin_active()
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// needed for carbon fileds
// include_once( get_stylesheet_directory() . '/carbon-fields/carbon-fields-plugin.php' );


function sd_theme_add_image_sizes() {
	
		//New Way of Widgets - include this 
		//wp_enqueue_script('jquery-ui-widget'); 
		
		//Use OLD way of widgets - preferable
		remove_theme_support( 'widgets-block-editor' );		

}
add_action( 'after_setup_theme', 'sd_theme_add_image_sizes' );

// activate carbon fields
// add_action( 'after_setup_theme', 'crb_load' );
// function crb_load() {
// 	require_once( get_stylesheet_directory().'/carbon-fields/vendor/autoload.php' );
// 	\Carbon_Fields\Carbon_Fields::boot();
// }

add_action('plugins_loaded', 'ra_functionsphp_init');
function ra_functionsphp_init(){
	/*
	 * Root shop page
	 * To remove "Showing all ... results"
	 */
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

	// Remove rss feeds application/rss+xml
	remove_action('wp_head','feed_links_extra', 3);
	add_filter( 'feed_links_show_posts_feed', false );
	add_filter( 'feed_links_show_comments_feed', false );
}

// activate the plugin
function functionsphp_head_info(){
 echo "\n<!-- Plugin RA Functions активен -->\n";
}
add_action('wp_head', 'functionsphp_head_info');


/*
* Include my css and scripts for impreza-child theme
*
*/
add_action( 'wp_enqueue_scripts', 'enqueue_assets', 20 );
if ( ! function_exists( 'enqueue_assets' ) ) :
function enqueue_assets() {
	// my styles for impreza-child
	wp_enqueue_style( 'ra-function', RAF_PLUGIN_URL . 'assets/dist/css/style.min.css', array(), '3.4', 'all' );

	// my scripts for impreza-child
	wp_enqueue_script( 'ra-function', RAF_PLUGIN_URL . 'assets/js/script.js', array( 'jquery' ), "1.1", TRUE );

	// Ie fix for Object.assign is not a function in IE
	// It's for show price on product page
	wp_enqueue_script( 'ie-js-assignfix', CHILD_THEME_URL . '/js/ieassignfix.js', array( 'jquery' ), "1.0", TRUE );
}
endif;



// place code in head after description tag
if( is_plugin_active( 'wordpress-seo-premium/wp-seo-premium.php') ){
	add_action('wpseo_head', function(){
		get_template_part( 'framework/templates/head', 'meta-google-site-verification' );
		get_template_part( 'framework/templates/head', 'google-analytics' );
	}, 7);
}


// place my code in footer before </body>
// add_action('wp_footer', function(){
// 	// code here...
// }, 100);


// remove id in wp_enqueue_style
// add_filter( 'style_loader_tag', function ( $tag, $handle ) {
//     return str_replace( " id='$handle-css'", '', $tag );
// }, 10, 2 );


// Disalow indexing of media attachment pages
function wph_noindex_for_attachment() {
	if(get_post_mime_type()!= false) {
		echo '<meta name="robots" content="noindex, nofollow" />'.PHP_EOL;
	}
}
add_action('wp_head', 'wph_noindex_for_attachment');


/**
 * Remove WP metas
 */
function wp_remove_version() {
	return '';
}
add_filter('the_generator', 'wp_remove_version');

/*
 * Remove Emojii
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'disable_wp_emojis_in_tinymce' );
function disable_wp_emojis_in_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}


/* Remove Date Meta Tags Output by Yoast SEO
 * Credit: Yoast development team
 * Last Tested: Mar 01 2017 using Yoast SEO 4.4 on WordPress 4.7.2
 */
if ( is_plugin_active( 'wordpress-seo-premium/wp-seo-premium.php' ) ) {
	add_action('wpseo_dc_'.'DC.date.issued', '__return_false'); // Premium only
	add_filter( 'wpseo_og_article_published_time', '__return_false' );
	add_filter( 'wpseo_og_article_modified_time', '__return_false' );
	add_filter( 'wpseo_og_og_updated_time', '__return_false' );

	//Remove Yoast HTML Comments "This site is optimized with the Yoast WordPress SEO plugin"
	add_action('wp_head', function() { ob_start(function($o) {
		return preg_replace('/^\n?<!--.*?[Y]oast.*?-->\n?$/mi','',$o);
	}); },~PHP_INT_MAX);
}

/*
 * Remove the-events-calendar info
 *
 */
if ( is_plugin_active( 'the-events-calendar/the-events-calendar.php' ) ) {
	add_filter( 'tribe_html_credit', function(){
		return '';
	} );
}


remove_action( 'wp_footer', 'rankie_linkinfooter' );


/*
 * To remove scripts
 *
 * To remove Slider Revolution scripts on page with slider in footer
 * jquery.themepunch.revolution.min.js ('revmin') & jquery.themepunch.tools.min.js ('tp-tools')
 *
 * They  are already loads in slider html section.
 */
add_action( 'wp_enqueue_scripts', 'remove_some_scripts', 20 );
function remove_some_scripts(){
	// global $wp_scripts;
	// fppr($wp_scripts, __FILE__.' $wp_scripts');
	wp_dequeue_script( 'tp-tools' );
	wp_dequeue_script( 'revmin' );
}



/*
 * To make primary category of product
 *
 */
if ( is_plugin_active( 'woocommerce/woocommerce.php' )
	&&  is_plugin_active( 'wordpress-seo-premium/wp-seo-premium.php' )
	&&  is_plugin_active( 'woocommerce-perfect-seo-url/perfect-seo-url.php' ))
{
	add_filter( 'psu_post_type_link_replace_term', function($first_term, $terms){
		global $post;

		if($post){

			$primary_cat_id = get_post_meta( $post->ID, '_yoast_wpseo_primary_product_cat', true );

			// If there is a primary and it's not currently chosen as primary
			if ( $primary_cat_id && $first_term->term_id != $primary_cat_id ) {

				// Find the primary term in the term list
				foreach ( $terms as $term ) {

					if ( $term->term_id == $primary_cat_id ) {
						// Return this as the primary term
						$first_term = $term;
						break;
				  }
				}
			}
		}

		return $first_term;
	}, 10, 2 );
}


// for heartbeat API
// to admin-ajax.php loading optimize
function optimize_heartbeat_settings( $settings ) {
	$settings['autostart'] = false;
	$settings['interval'] = 60;
	return $settings;
}
add_filter( 'heartbeat_settings', 'optimize_heartbeat_settings' );
function disable_heartbeat_unless_post_edit_screen() {
	global $pagenow;
	if ( $pagenow != 'post.php' && $pagenow != 'post-new.php' )
		wp_deregister_script('heartbeat');
}
add_action( 'init', 'disable_heartbeat_unless_post_edit_screen', 1 );




if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {

	/*
	 * PRODUCT MARKUP FOR schema.org. Works on product page only
	 *
	 * Redefine WooCommerce variable product markup for http://schema.org
	 * Generate application/ld+json data
	 * Disabled default WooCommerce's 'output_structured_data and
	 * added mine
	 *
	 */
	add_filter( 'woocommerce_structured_data_product', function($markup, $product){

		// fppr($product, __FILE__.' $product');
		// fppr($markup, __FILE__.' $markup');
		//
		$markup = array(
			"@context" => "http://schema.org",
			'@type' => 'Product',
			'@id'   => get_permalink( $product->get_id() ),
			'name'  => $product->get_name(),
			'image' => wp_get_attachment_url( $product->get_image_id() ),
			'description' => wpautop( do_shortcode( $product->get_short_description() ? $product->get_short_description() : $product->get_description() ) ),
			'sku' => $product->get_sku(),
			'brand' => array(
				"@type" => "Thing",
				"name" => "La Bella Umbrella"
			),
			"aggregateRating" => array(
				"@type" => "AggregateRating",
				"ratingValue" => "5",
				"reviewCount" => "5"
			),

			"review" => array(
				array(
					"@type" => "Review",
					//"author" => "Violetta Z",
					"author" => array(
					  "@type" => "Person",
					  "name"=> "Violetta Z"
					),
					// "datePublished" => "2011-04-01",
					//"description" => "Love these umbrellas. Very pretty. Great gift idea!",
					
					"name" => "Love these umbrellas",
					"reviewRating" => array(
						"@type" => "Rating",
						"bestRating" => "5",
						"ratingValue" => "5",
						"worstRating" => "3"
					)
				)
			),
			"mpn" => $product->get_sku(),
			// "gtin" => ""
		);

		$arParams = array(
			'type' => $product->get_type(),
			'url' => get_permalink( $product->get_id() ),
			'seller' => array(
				'@type' => 'Organization',
				'name' => get_bloginfo( 'name' ),
				'url' => home_url(),
			),
			'attributes' => $product->get_variation_attributes(),
			'priceCurrency' => get_woocommerce_currency(),
			'minPrice' => $product->get_variation_price('min'),
			'maxPrice' => $product->get_variation_price('max'),
			'variations' => $product->get_available_variations(),
		);
		// fppr($arParams, __FILE__.' arParams');

		if($arParams['type'] == 'variable'){
			$markup_offers = array(
				"@type" => "AggregateOffer",
				"url" => $arParams['url'],
				"highPrice" => $arParams['maxPrice'],
				"lowPrice" => $arParams['minPrice'],
				"offerCount" => count($arParams['variations']),
				"priceCurrency" => $arParams['priceCurrency'],
			);

			if($markup_offers["offerCount"]){
				$markup_arOffers = array();
				foreach ($arParams['variations'] as $variation) {
					$availability = ( $variation['is_in_stock'] ) ? "http://schema.org/InStock" : "";
					$markup_arOffers[] = array(
						"@type" => "Offer",
						'name' => $variation['attributes']['attribute_pa_model'],
						'sku' => $variation['sku'],
						'image' => $variation['jck_additional_images'][0]['large'][0],
						'availability' => $availability,
						"priceCurrency" => $arParams['priceCurrency'],
						"price" => $variation['display_price'],
						'seller' =>  $arParams['seller'],
						"mpn" => $variation["sku"],
					);
				}
			}

			$markup_offers['offers'] = $markup_arOffers;
			$markup['offers'] = $markup_offers;

			$json_markup = json_encode($markup);
			// fppr($json_markup, __FILE__.' $json_markup');

			// Disabled default WooCommerce's 'output_structured_data'
			remove_action( 'wp_footer', array( wc()->structured_data, 'output_structured_data' ), 10 );
			//
			$GLOBALS['json_markup'] = $json_markup;
			// Added my structured schema.org data
			add_action( 'wp_footer', function(){
				global $json_markup;
				// fppr($json_markup, __FILE__.' $json_markup');
				echo '<script type="application/ld+json" id="ra-defined">' . $json_markup . '</script>';
			}, 20 );
			//
		}

		return false;
	}, 10, 2 );


	/*
	 * To remove 'Product' from scheme.org markup on product sections
	 *
	 */
	add_action( 'woocommerce_init', function(){
		remove_action( 'woocommerce_shop_loop', array( wc()->structured_data, 'generate_product_data' ), 10 );
	});



	/*
	 * To get HTML description with BBcode of Square payment method
	 * (credit cards gateway)
	 *
	 */
	if ( is_plugin_active( 'woocommerce-square/woocommerce-square.php' ) ) {
		add_filter( 'woocommerce_square_description', function($description){
			return str_replace(array("[", "]"), array("<", ">"), $description);
		}, 10, 2);
	}


	/*
	 * To get HTML description with BBcode of Stripe payment method
	 * (credit cards gateway)
	 *
	 */
	if ( is_plugin_active( 'woocommerce-gateway-stripe/woocommerce-gateway-stripe.php' ) ) {
		add_filter( 'wc_stripe_description', function($description){
			return str_replace(array("[", "]"), array("<", ">"), $description);
		}, 10, 2);
	}


	/*
	 * Print secure mess on checkout page
	 *
	 */
	// add_action( 'woocommerce_before_checkout_form', function($checkout){
	// 	$html = '<div class="pre-payment-message"><span>This website is secure. Your personal data are safe.</span></div>';
	// 	echo $html;
	// 	return;
	// }, 10, 2);


	/*
	 * Allways show variation price
	 * to always fill price_html in class-wc-product-variable.php: 345
	 * Then this setting used in
	 * \plugins\wc-variations-radio-buttons\assets\js\frontend\add-to-cart-variation.js
	 * to change price if variation button is clicked on detail page
	 *
	 */
	add_filter( 'woocommerce_show_variation_price', function($param1, $param2, $param3 ){
			return true;
		}, 10, 3);



	/*
	 * Add polylang metabox to asign language to Woocommerce Tabs Posts (post_type=wc_product_tab)
	 * filter here - \wp-content\plugins\woocommerce-tab-manager\admin\post-types\writepanels\writepanels-init.php:139
	 */
	add_filter( 'wc_tab_manager_allowed_meta_box_ids', function($allowed_meta_box_ids){
			$allowed_meta_box_ids[] = 'ml_box'; // Polylang meta box id (Language panel in post edit)
			return $allowed_meta_box_ids;
		}, 10, 2);


	/*
	 * Checkout page: to shipping fields stay clear
	 */
	add_filter( 'woocommerce_shipping_fields', function($fields){

		foreach ($fields as $input => &$field) {
			$field["autocomplete"] = "off";
			$field["default"] = "";

			add_filter( "default_checkout_{$input}", function($value, $input){
				return null;
			}, 10, 2);
		}

		return $fields;

	}, 10, 1);


	/*
	 *  Checkout page: GDPR messages
	 *
	 */
	add_filter( 'woocommerce_get_terms_and_conditions_checkbox_text', function($html){
		$privacy_policy_text = wc_get_privacy_policy_text("checkout");

		$terms_page_id   = wc_terms_and_conditions_page_id();
		$terms_link      = $terms_page_id ? '<a href="' . esc_url( get_permalink( $terms_page_id ) ) . '" class="ra-woocommerce-terms-and-conditions-link">' . __( 'terms and conditions', 'woocommerce' ) . '</a>' : __( 'terms and conditions', 'woocommerce' );
		$terms_conditions_text = str_replace( array("[terms]"), array($terms_link), $html );

		$privacy_page_id = wc_privacy_policy_page_id();
		$privacy_link    = $privacy_page_id ? '<a href="' . esc_url( get_permalink( $privacy_page_id ) ) . '" class="woocommerce-privacy-policy-link">' . __( 'privacy policy', 'woocommerce' ) . '</a>' : __( 'privacy policy', 'woocommerce' );

		$html = $terms_conditions_text.", and ".$privacy_link;
		return $html;

	}, 10, 2);




	/*
	 * Thankyou page (страница успешной оплаты): размещение модуля опроса
	 */
	add_action( 'woocommerce_thankyou', function($order_id){

		$order = wc_get_order($order_id);


			if(is_a($order, "WC_Order")){

				$params = array(
					"order_id" => $order_id,
					"email" => $order->get_billing_email(),
				);

				if($order->has_shipping_address()){
					$params["delivery_country"] = $order->get_billing_country();
				}else{
					$params["delivery_country"] = $order->get_shipping_country();
				}

				$wp_paid_date = $order->date_created;

				if(is_a($wp_paid_date, "WC_DateTime")){

					// Release delivery rules wrote on checkout page:
					// "All orders from Canada and USA are received within 2 weeks Xpresspost orders - within one week"

					$params["paid_date"] = $wp_paid_date->date_i18n();
					if( in_array($params["delivery_country"], array('CA', 'US')) ){
						if($order->get_shipping_method() == "Xpresspost"){
							$params["estimated_delivery_date"] = date( 'Y-m-d', strtotime("+1 week", $wp_paid_date->getTimestamp()) );
						}else{
							$params["estimated_delivery_date"] = date( 'Y-m-d', strtotime("+2 week", $wp_paid_date->getTimestamp()) );
						}
					}else{
						$params["estimated_delivery_date"] = false;
					}

					set_query_var('params', $params);
					get_template_part( 'framework/templates/thankyou-google-reviews', 'module' );
				}
			}

		return;
	}, 30, 1);












	/*
	 *  Product page:
	 *  to print models with order setted in Product - Attributes
	 *  /wp-admin/edit-tags.php?taxonomy=pa_model&post_type=product
	 */

	add_filter( 'woocommerce_attribute_orderby', function($orderby, $name){
		$orderby = 'menu_order';
		return $orderby;
	}, 10, 2);


	/**
	 * Add slash to the home link URL
	 */
	add_filter( 'woocommerce_breadcrumb_home_url', function() {
		return get_site_url()."/";
	} );


}


/*
 * Single Post: fix akismet link to privacy policy after reply form
 */
add_filter( 'akismet_comment_form_privacy_notice_markup', function($html){
	$html = '<p class="akismet_comment_form_privacy_notice">' . sprintf(
				__( 'This site uses Akismet to reduce spam. <a rel="nofollow, noopener" href="%s" target="_blank">Learn how your comment data is processed</a>.', 'akismet' ),
				'https://automattic.com/privacy-notice/'
			);
	return $html;
}, 10, 1);



/*
 * убрать страницы вложений-attachment
 */
add_action( 'template_redirect', function(){
	// Перенаправление на главную
	if (is_attachment()) {
		wp_redirect(site_url());
		exit;
	}
}, 10);



/*
 * McAfee secure code
 */
add_action( 'wp_footer', function(){
	$html = '
		<div class="msafee-fixed">
			<a target="_blank" href="https://www.trustedsite.com/verify?host=labella-umbrella.com" style="border: 0 none !important;"><img class="mfes-trustmark" border="0" src="/wp-content/uploads/msafee/msafee-full.png" height="32" style="vertical-align: middle; height: 32px;" title="McAfee SECURE" alt="McAfee SECURE"></a>
		</div>
	';
	echo $html;
}, 10);


/**
 * +RA 2020-06-05
 * @return string raw content of WP Baker Page Builder row with id = 'title-row'
 */
function get_vc_title_row($raw_content){
	$dom_id = "title-row";
	$raw_content = str_replace(array("\r\n"), "", $raw_content);
	preg_match_all('/\[vc_row/', $raw_content, $matches);
	if(count($matches[0])){
		if(count($matches[0]) > 1){
			preg_match('/\[vc_row (.*) el_id=.*[ "]+' . $dom_id . '[ "]+.*\].*\[\/vc_row\](\[vc_row)+/', $raw_content, $matches);
			// str_replace('[vc_row', $matches[0]);
			$matches[0] = preg_replace('/\[vc_row$/', "", $matches[0]);
		}else{
			preg_match('/\[vc_row (.*) el_id=.*[ "]+' . $dom_id . '[ "]+.*\].*\[\/vc_row\]/', $raw_content, $matches);
		}
		return isset($matches[0]) ? $matches[0] : false;
	}else{
		return false;
	}
}

/**
 * +RA 2020-06-05
 * to remove WP Baker Page Builder row with id = 'title-row' from post content
 */
add_filter('the_content', function($content){
	$content = str_replace(array("\r\n"), "", $content);
	$title_row_content = get_vc_title_row($content);
	if($title_row_content){
		$content = str_replace(array($title_row_content, "<p></p>"), "", $content);
	}
	return $content;
}, 5, 1);





/*
***
*
my helpers functions
*/
function ppr($_arr, $_ar_name){
	echo "<pre>$_ar_name<br>";
	print_r($_arr);
	echo "</pre>";
}
function fppr($_arr, $_ar_name, $_log_name=false, $append=FILE_APPEND){
	$_log_name = ($_log_name) ? $_log_name : "rlog";
	$str = date("d.m.y H:m:s") . "\r\n" . $_ar_name . "\r\n" . print_r($_arr, true) . "\r\n-------------------\r\n";
	file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/wp-content/'.$_log_name.'.log', $str, $append);
}
