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
include_once($tmplPath . '/functions/custom-post-types-creator.php');
include_once($tmplPath . '/functions/custom-tax-creator.php');

/* WooCommerce Useful Hooks */
include_once($tmplPath . '/functions/woocommerce-hooks.php');

/* Reviews Block Support */
include_once($tmplPath . '/functions/reviews-block.php');
