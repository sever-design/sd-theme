<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

/*
 * Text & BG Color Vars
 * Same as in _VARS.scss file
 */


function optionsframework_option_name() {
	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'quark'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {
	
$_color_accent = '#74b2ff';
$_color_txt = '#a1a1a1';
$_color_txt_light = '#fff';

$_bg_dark = '#000';
$_bg_medium = '#171717';
$_bg_light = '#fbfbfb';

	// If using image radio buttons, define a directory path
	$imagepath =  trailingslashit( get_template_directory_uri() ) . 'images/';
	

	$options = array();

	/* ------------ TAB Social Links to Profile ---*/
	$options[] = array(
		'name' => 'Social Profiles',
		'type' => 'heading' );

	$options[] = array(
		'name' => esc_html__( 'Social Media Settings', 'sd' ),
		'desc' => esc_html__( 'Enter the URLs for your Social Media platforms. You can also optionally specify whether you want these links opened in a new browser tab/window.', 'sd' ),
		'type' => 'info' );

	$options[] = array(
		'name' => esc_html__('Open links in new Window/Tab', 'sd'),
		'desc' => esc_html__('Open the social media links in a new browser tab/window', 'sd'),
		'id' => 'social_newtab',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => esc_html__( 'Twitter', 'sd' ),
		'desc' => esc_html__( 'Enter your Twitter URL.', 'sd' ),
		'id' => 'social_twitter',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Facebook', 'sd' ),
		'desc' => esc_html__( 'Enter your Facebook URL.', 'sd' ),
		'id' => 'social_facebook',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Tik Tok', 'sd' ),
		'desc' => esc_html__( 'Enter your TikTok URL.', 'sd' ),
		'id' => 'social_tiktok',
		'std' => '',
		'type' => 'text' );


	$options[] = array(
		'name' => esc_html__( 'LinkedIn', 'sd' ),
		'desc' => esc_html__( 'Enter your LinkedIn URL.', 'sd' ),
		'id' => 'social_linkedin',
		'std' => '',
		'type' => 'text' );
		
	$options[] = array(
		'name' => esc_html__( 'Yelp', 'sd' ),
		'desc' => esc_html__( 'Enter your Yelp URL.', 'sd' ),
		'id' => 'social_yelp',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'HomeStars', 'sd' ),
		'desc' => esc_html__( 'Enter your Homestars URL.', 'sd' ),
		'id' => 'social_homestars',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Houzz', 'sd' ),
		'desc' => esc_html__( 'Enter your Houzz URL.', 'sd' ),
		'id' => 'social_houzz',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'YouTube', 'sd' ),
		'desc' => esc_html__( 'Enter your YouTube URL.', 'sd' ),
		'id' => 'social_youtube',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Vimeo', 'sd' ),
		'desc' => esc_html__( 'Enter your Vimeo URL.', 'sd' ),
		'id' => 'social_vimeo',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Instagram', 'sd' ),
		'desc' => esc_html__( 'Enter your Instagram URL.', 'sd' ),
		'id' => 'social_instagram',
		'std' => '',
		'type' => 'text' );
		
	$options[] = array(
		'name' => esc_html__( 'Pinterest', 'sd' ),
		'desc' => esc_html__( 'Enter your Pinterest URL.', 'sd' ),
		'id' => 'social_pinterest',
		'std' => '',
		'type' => 'text' );
		
	$options[] = array(
		'name' => esc_html__( 'Google Maps', 'sd' ),
		'desc' => esc_html__( 'Enter your Google Maps URL.', 'sd' ),
		'id' => 'social_gmaps',
		'std' => '',
		'type' => 'text' );
		
	/* ------------ TAB Contacts ---*/
		
	$options[] = array(
		'name' => esc_html__( 'Contact Details', 'sd' ),
		'type' => 'heading' );
		
	$options[] = array(
		'name' => esc_html__( 'Sitewide contact details', 'sd' ),
		'desc' => esc_html__( 'It allows you to edit your contact details in one place and not on every single post or page. To use this feature - just copy and paste shortcodes near each field to put it inside the text editor/widget. NOTE! It will be automatically switched to link with Phone / Email', 'sd' ),
		'type' => 'info' );

	/* ------------ 1st location ---*/

	$options[] = array(
		'name' => esc_html__( 'Contact details for 1st Location', 'sd' ),
		'desc' => esc_html__( '' ),
		'type' => 'info' );
	$options[] = array(
		'name' => esc_html__( 'Contact Phone', 'sd' ),
		'desc' => esc_html__( 'Enter your contact phone. To use in shortcode [get_theme_option option_name=site_contact_phone custom_text=YOUR_TEXT hide_prefix="true" use_icon=TRUE icon_id=iconID icon_w=Wpx icon_h=Hpx]  if theme_url/theme-icons.svg sprite in', 'sd' ),
		'id' => 'site_contact_phone',
		'std' => '',
		'type' => 'text' );
		
	$options[] = array(
		'name' => esc_html__( 'Contact Email', 'sd' ),
		'desc' => esc_html__( 'Enter your contact email. to use in shortcode [get_theme_option option_name=site_contact_email custom_text=YOUR_TEXT hide_prefix="true" use_icon=TRUE icon_id=iconID icon_w=Wpx icon_h=Hpx]  if theme_url/theme-icons.svg sprite in', 'sd' ),
		'id' => 'site_contact_email',
		'std' => '',
		'type' => 'text' );
	
	$options[] = array(
		'name' => esc_html__( 'Location Address', 'sd' ),
		'desc' => "Enter your physical address. To use in shortcode [get_theme_option option_name=site_contact_address use_icon=TRUE icon_id=iconID icon_w=Wpx icon_h=Hpx] if theme_url/theme-icons.svg sprite in",
		'id' => 'site_contact_address',
		'std' => '',
		'type' => 'text' );
		
	$options[] = array(
		'name' => esc_html__( 'Location Address Map Link', 'sd' ),
		'desc' => esc_html__( 'Put Link from "Send a Link" Google Map option / Or leave empty to use only text for address with no link. ( Ex: https://goo.gl/maps/dfRvkxUi8U9uLB77A )', 'sd' ),
		'id' => 'site_contact_address_link',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Working Hours', 'sd' ),
		'desc' => esc_html__( 'Enter your working hours. (Mon-Fri, 9am - 6pm) [get_theme_option option_name=site_contact_hrs custom_text="Business Hours" use_icon=TRUE  icon_id=iconID icon_w=Wpx icon_h=Hpx]', 'sd' ),
		'id' => 'site_contact_hrs',
		'std' => '',
		'type' => 'text' );
		
	$options[] = array(
		'name' => esc_html__( 'Booking Link for 3rd parties', 'sd' ),
		'desc' => esc_html__( 'Put link for booking system. [get_theme_option option_name=site_contact_booking custom_text="Book Now" use_icon=TRUE  icon_id=iconID icon_w=Wpx icon_h=Hpx]', 'sd' ),
		'id' => 'site_contact_booking',
		'std' => '',
		'type' => 'text' );

	/* ------------ 2nd location ---*/

	$options[] = array(
		'name' => esc_html__( 'Contact details for 2nd Location', 'sd' ),
		'desc' => esc_html__( '' ),
		'type' => 'info' );

	$options[] = array(
		'name' => esc_html__( 'Contact Phone', 'sd' ),
		'desc' => esc_html__( 'Enter your contact phone. To use in shortcode [get_theme_option option_name=site_contact_phone2 custom_text=YOUR_TEXT hide_prefix="true" use_icon=TRUE]', 'sd' ),
		'id' => 'site_contact_phone2',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Contact Fax', 'sd' ),
		'desc' => esc_html__( 'Enter your contact fax. To use in shortcode [get_theme_option option_name=site_contact_fax2 custom_text=YOUR_TEXT hide_prefix="true" use_icon=TRUE]', 'sd' ),
		'id' => 'site_contact_fax2',
		'std' => '',
		'type' => 'text' );
		
	$options[] = array(
		'name' => esc_html__( 'Contact Email', 'sd' ),
		'desc' => esc_html__( 'Enter your contact email. to use in shortcode [get_theme_option option_name=site_contact_email2 custom_text=YOUR_TEXT hide_prefix="true" use_icon=TRUE]', 'sd' ),
		'id' => 'site_contact_email2',
		'std' => '',
		'type' => 'text' );
	
	$options[] = array(
		'name' => esc_html__( 'Location Address', 'sd' ),
		'desc' => esc_html__( 'Enter your physical address. To use in shortcode [get_theme_option option_name=site_contact_address2 linkto="YOUR_LINK" custom_text="YOUR_TITLE" hide_prefix="true"]', 'sd' ),
		'id' => 'site_contact_address2',
		'std' => '',
		'type' => 'text' );
		
	$options[] = array(
		'name' => esc_html__( 'Location Address Map Link', 'sd' ),
		'desc' => esc_html__( 'Put Link from "Send a Link" Google Map option / Or leave empty to use only text for address with no link. ( Ex: https://goo.gl/maps/dfRvkxUi8U9uLB77A )', 'sd' ),
		'id' => 'site_contact_address_link2',
		'std' => '',
		'type' => 'text' );
		

	/* ------------ 3rd location ---*/

	$options[] = array(
		'name' => esc_html__( 'Contact details for 3nd Location', 'sd' ),
		'desc' => esc_html__( '' ),
		'type' => 'info' );

	$options[] = array(
		'name' => esc_html__( 'Contact Phone', 'sd' ),
		'desc' => esc_html__( 'Enter your contact phone. To use in shortcode [get_theme_option option_name=site_contact_phone3 custom_text=YOUR_TEXT use_icon=TRUE]', 'sd' ),
		'id' => 'site_contact_phone3',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Contact Fax', 'sd' ),
		'desc' => esc_html__( 'Enter your contact fax. To use in shortcode [get_theme_option option_name=site_contact_fax3 custom_text=YOUR_TEXT use_icon=TRUE]', 'sd' ),
		'id' => 'site_contact_fax3',
		'std' => '',
		'type' => 'text' );
		
	$options[] = array(
		'name' => esc_html__( 'Contact Email', 'sd' ),
		'desc' => esc_html__( 'Enter your contact email. to use in shortcode [get_theme_option option_name=site_contact_email3 custom_text=YOUR_TEXT use_icon=TRUE]', 'sd' ),
		'id' => 'site_contact_email3',
		'std' => '',
		'type' => 'text' );
	
	$options[] = array(
		'name' => esc_html__( 'Location Address', 'sd' ),
		'desc' => esc_html__( 'Enter your physical address. To use in shortcode [get_theme_option option_name=site_contact_address3 linkto="YOUR_LINK" custom_text="YOUR_TITLE"]', 'sd' ),
		'id' => 'site_contact_address3',
		'std' => '',
		'type' => 'text' );
		
	$options[] = array(
		'name' => esc_html__( 'Location Address Map Link', 'sd' ),
		'desc' => esc_html__( 'Put Link from "Send a Link" Google Map option / Or leave empty to use only text for address with no link. ( Ex: https://goo.gl/maps/dfRvkxUi8U9uLB77A )', 'sd' ),
		'id' => 'site_contact_address_link3',
		'std' => '',
		'type' => 'text' );
		
	/* ------------ TAB Colors ---*/
	$options[] = array(
		'name' => esc_html__( 'Colors', 'sd' ),
		'type' => 'heading' );
		
	$options[] = array(
		'name' => esc_html__( 'Colors for that theme', 'sd' ),
		'desc' => esc_html__( 'These are predefined defaults, but you can change them to any preferred. They will appear inside you block editor as a default gamma presets', 'sd' ),
		'type' => 'info' );
		
	$options[] = array(
		'name' => esc_html__( 'Accent Color', 'sd' ),
		'desc' => esc_html__( 'Enter your Accent Color', 'sd' ),
		'id' => 'site_color_accent',
		'std' => $_color_accent,
		'type' => 'color' );
		
	$options[] = array(
		'name' => esc_html__( 'Text Color', 'sd' ),
		'desc' => esc_html__( 'Main body Text Color', 'sd' ),
		'id' => 'site_color_text',
		'std' => $_color_txt,
		'type' => 'color' );
		
	$options[] = array(
		'name' => esc_html__( 'Text Light Color', 'sd' ),
		'desc' => esc_html__( 'Main body Light Text Color', 'sd' ),
		'id' => 'site_color_text_light',
		'std' => $_color_txt_light,
		'type' => 'color' );
		
	$options[] = array(
		'name' => esc_html__( 'Background Color', 'sd' ),
		'desc' => esc_html__( 'Main Background Color', 'sd' ),
		'id' => 'site_color_main_bg',
		'std' => $_bg_dark,
		'type' => 'color' );
		
	$options[] = array(
		'name' => esc_html__( 'Background Light Color', 'sd' ),
		'desc' => esc_html__( 'Light Background Color', 'sd' ),
		'id' => 'site_color_light_bg',
		'std' => $_bg_light,
		'type' => 'color' );
		
	$options[] = array(
		'name' => esc_html__( 'Background Medium Color', 'sd' ),
		'desc' => esc_html__( 'Medium Background Color', 'sd' ),
		'id' => 'site_color_medium_bg',
		'std' => $_bg_medium,
		'type' => 'color' );
		
	$options[] = array(
		'name' => esc_html__( 'Color 2', 'sd' ),
		'desc' => esc_html__( 'Color 2', 'sd' ),
		'id' => 'site_color_medium_bg_2',
		'std' => $_bg_medium,
		'type' => 'color' );
	
	$options[] = array(
		'name' => esc_html__( 'Color 3', 'sd' ),
		'desc' => esc_html__( 'Color 3', 'sd' ),
		'id' => 'site_color_medium_bg_3',
		'std' => $_bg_medium,
		'type' => 'color' );
	/* ------------ TAB Support ---*/
	$options[] = array(
		'name' => esc_html__( 'Support', 'sd' ),
		'type' => 'heading' );
		

	$options[] = array(
		'name' => esc_html__( 'Have questions?', 'sd' ),
		'desc' => sprintf( wp_kses( __( 'To Get Support please <a href="%1$s">Contact Us</a> any time.', 'sd' ),
			array(
				'a' => array(
					'href' => array(),
					'title' => array()
					)
				)
			), 'https://timofey.ca/'
			),
		'type' => 'info' );
		



	return $options;
}
