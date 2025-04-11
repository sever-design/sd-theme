<?php
/*
 * SD Functions theme main file
 * usefull collection of functions for SD theme
 * by Timon
 */
 /*
define('TEMPLATEPATH', get_template_directory());
define('STYLESHEETPATH', get_stylesheet_directory());
*/

$tmplPath = get_template_directory();
$styleSheetPath = get_stylesheet_directory();

/* SD Themes Libs */

include_once($tmplPath . '/functions/font-hooks.php');
include_once($tmplPath . '/functions/sd-theme-libs.php');

/* Adding WPAdmin columns */
include_once($tmplPath . '/functions/admin-columns.php');

/* WooCommerce Useful Hooks */
include_once($tmplPath . '/functions/woocommerce-hooks.php');

/* WP Posts & Pages Hooks */
include_once($tmplPath . '/functions/posts-pages-hooks.php');

/* WP Taxonomy Hooks */
include_once($tmplPath . '/functions/taxonomy-hooks.php');

/* Nav Hooks */
include_once($tmplPath . '/functions/nav-hooks.php');

/* Add Widgets */
include_once($tmplPath . '/functions/sd-widgets.php');

/* Widget Hooks */
include_once($tmplPath . '/functions/widgets-hooks.php');

/* Theme Shortcodes */
include_once($tmplPath . '/functions/sd-shortcodes.php');

/* User Add-ons */
include_once($tmplPath . '/functions/user-hooks.php');

/* Metaboxes */
include_once($tmplPath . '/functions/metaboxes.php');

/* WP Useful Hooks */
include_once($tmplPath . '/functions/wordpress-hooks.php');

/* WP CPT */
//include_once($tmplPath . '/functions/custom-post-types-creator.php');
//include_once($tmplPath . '/functions/custom-tax-creator.php');


if ( in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) ) {
	/* WooCommerce Useful Hooks */
	//include_once($tmplPath . '/functions/woocommerce-hooks.php');

	/* Security Hooks */
	//include_once($tmplPath . '/functions/sd-security.php');

	/* Post & Cats Disabler */
	//include_once($tmplPath . '/functions/sd-post-cats-disabler.php');

	/* Feature: adding auto discount upon registration with preset of 20% */
	//include_once($tmplPath . '/functions/woocommerce-new-user-coupons-autosend.php');

	/* my SD woo shortcodes */
	//include_once($tmplPath . '/functions/sd-woo-shortcodes.php');

	/* my SD woo coupons */
	//include_once($tmplPath . '/functions/sd-woo-coupons.php');	
}

/* Login Screen Customizer */
include_once($tmplPath . '/functions/sd-login-customizer.php');

