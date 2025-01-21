<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://metabox.io/docs/registering-meta-boxes/
 */
add_filter( 'rwmb_meta_boxes', 'your_prefix_register_meta_boxes' );
/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function your_prefix_register_meta_boxes( $meta_boxes )
{
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'fld_mikerosen';
	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'standard',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'Standard Fields', 'fld_mikerosen' ),
		// Register this meta box for posts matched below conditions
		'include' => array(
			// With all conditions below, use this logical operator to combine them. Default is 'OR'. Case insensitive. Optional.
			'relation'        => 'OR',
			// List of post IDs. Can be array or comma separated. Optional.
			'ID'              => array(),
			// List of post parent IDs. Can be array or comma separated. Optional.
			'parent'          => array(),
			// List of post slugs. Can be array or comma separated. Optional.
			'slug'            => array(),
			// List of page templates. Can be array or comma separated. Optional.
			'template'        => array( 'page-home.php' ),
			// List of categories IDs or names or slugs. Can be array or comma separated. Optional.
			'category'        => array(),
			// List of tag IDs or names or slugs. Can be array or comma separated. Optional.
			'tag'             => array(),
			// Custom taxonomy. Optional.
			// Format: 'taxonomy' => list of term IDs or names or slugs (can be array or comma separated)
			'location'        => array(),
			'os'              => array(),
			// List of parent categories IDs or names or slugs. Can be array or comma separated. Optional.
			'parent_category' => 'Parent',
			// List of parent tag IDs or names or slugs. Can be array or comma separated. Optional.
			'parent_tag'      => 'Parent',
			// Parent custom taxonomy. Optional.
			// Format: 'parent_taxonomy' => list of term IDs or names or slugs (can be array or comma separated)
			'parent_location' => array(),
			// Check if current post/page is a child page
			'is_child'        => true,
			// List of user roles. Can be array or comma separated. Optional.
			'user_role'       => 'administrator',
			// List of user IDs. Can be array or comma separated. Optional.
			'user_id'         => array(),
			// Custom condition. Optional.
			// Format: 'custom' => 'callback_function'
			// The function will take 1 parameter which is the meta box itself
			'custom'          => 'manual_include',
		),	
		
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		//'post_types' => array( 'post', 'page' ),
		'post_types' => array( 'page' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		// List of meta fields
		'fields'     => array(
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Text', 'fld_mikerosen' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}text",
				// Field description (optional)
				'desc'  => __( 'Text description', 'fld_mikerosen' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( 'Default text value', 'fld_mikerosen' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => true,
			),
			// CHECKBOX
			array(
				'name' => __( 'Checkbox', 'fld_mikerosen' ),
				'id'   => "{$prefix}checkbox",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 1,
			),
			// RADIO BUTTONS
			array(
				'name'    => __( 'Radio', 'fld_mikerosen' ),
				'id'      => "{$prefix}radio",
				'type'    => 'radio',
				// Array of 'value' => 'Label' pairs for radio options.
				// Note: the 'value' is stored in meta field, not the 'Label'
				'options' => array(
					'value1' => __( 'Label1', 'fld_mikerosen' ),
					'value2' => __( 'Label2', 'fld_mikerosen' ),
				),
			),
			// SELECT BOX
			array(
				'name'        => __( 'Select', 'fld_mikerosen' ),
				'id'          => "{$prefix}select",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'value1' => __( 'Label1', 'fld_mikerosen' ),
					'value2' => __( 'Label2', 'fld_mikerosen' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => 'value2',
				'placeholder' => __( 'Select an Item', 'fld_mikerosen' ),
			),
			// HIDDEN
			array(
				'id'   => "{$prefix}hidden",
				'type' => 'hidden',
				// Hidden field must have predefined value
				'std'  => __( 'Hidden value', 'fld_mikerosen' ),
			),
			// PASSWORD
			array(
				'name' => __( 'Password', 'fld_mikerosen' ),
				'id'   => "{$prefix}password",
				'type' => 'password',
			),
			// TEXTAREA
			array(
				'name' => __( 'Textarea', 'fld_mikerosen' ),
				'desc' => __( 'Textarea description', 'fld_mikerosen' ),
				'id'   => "{$prefix}textarea",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
			),
		),
		'validation' => array(
			'rules'    => array(
				"{$prefix}password" => array(
					'required'  => true,
					'minlength' => 7,
				),
			),
			// optional override of default jquery.validate messages
			'messages' => array(
				"{$prefix}password" => array(
					'required'  => __( 'Password is required', 'fld_mikerosen' ),
					'minlength' => __( 'Password must be at least 7 characters', 'fld_mikerosen' ),
				),
			),
		),
	);
	// 2nd meta box
	$meta_boxes[] = array(
		'title' => __( 'Advanced Fields', 'fld_mikerosen' ),
		'fields' => array(
			// HEADING
			array(
				'type' => 'heading',
				'name' => __( 'Heading', 'fld_mikerosen' ),
				'desc' => __( 'Optional description for this heading', 'fld_mikerosen' ),
			),
			// SLIDER
			array(
				'name'       => __( 'Slider', 'fld_mikerosen' ),
				'id'         => "{$prefix}slider",
				'type'       => 'slider',
				// Text labels displayed before and after value
				'prefix'     => __( '$', 'fld_mikerosen' ),
				'suffix'     => __( ' USD', 'fld_mikerosen' ),
				// jQuery UI slider options. See here http://api.jqueryui.com/slider/
				'js_options' => array(
					'min'  => 10,
					'max'  => 255,
					'step' => 5,
				),
			),
			// NUMBER
			array(
				'name' => __( 'Number', 'fld_mikerosen' ),
				'id'   => "{$prefix}number",
				'type' => 'number',
				'min'  => 0,
				'step' => 5,
			),
			// DATE
			array(
				'name'       => __( 'Date picker', 'fld_mikerosen' ),
				'id'         => "{$prefix}date",
				'type'       => 'date',
				// jQuery date picker options. See here http://api.jqueryui.com/datepicker
				'js_options' => array(
					'appendText'      => __( '(yyyy-mm-dd)', 'fld_mikerosen' ),
					'dateFormat'      => __( 'yy-mm-dd', 'fld_mikerosen' ),
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				),
			),
			// DATETIME
			array(
				'name'       => __( 'Datetime picker', 'fld_mikerosen' ),
				'id'         => $prefix . 'datetime',
				'type'       => 'datetime',
				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute'     => 15,
					'showTimepicker' => true,
				),
			),
			// TIME
			array(
				'name'       => __( 'Time picker', 'fld_mikerosen' ),
				'id'         => $prefix . 'time',
				'type'       => 'time',
				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute' => 5,
					'showSecond' => true,
					'stepSecond' => 10,
				),
			),
			// COLOR
			array(
				'name' => __( 'Color picker', 'fld_mikerosen' ),
				'id'   => "{$prefix}color",
				'type' => 'color',
			),
			// CHECKBOX LIST
			array(
				'name'    => __( 'Checkbox list', 'fld_mikerosen' ),
				'id'      => "{$prefix}checkbox_list",
				'type'    => 'checkbox_list',
				// Options of checkboxes, in format 'value' => 'Label'
				'options' => array(
					'value1' => __( 'Label1', 'fld_mikerosen' ),
					'value2' => __( 'Label2', 'fld_mikerosen' ),
				),
			),
			// AUTOCOMPLETE
			array(
				'name'    => __( 'Autocomplete', 'fld_mikerosen' ),
				'id'      => "{$prefix}autocomplete",
				'type'    => 'autocomplete',
				// Options of autocomplete, in format 'value' => 'Label'
				'options' => array(
					'value1' => __( 'Label1', 'fld_mikerosen' ),
					'value2' => __( 'Label2', 'fld_mikerosen' ),
				),
				// Input size
				'size'    => 30,
				// Clone?
				'clone'   => false,
			),
			// EMAIL
			array(
				'name' => __( 'Email', 'fld_mikerosen' ),
				'id'   => "{$prefix}email",
				'desc' => __( 'Email description', 'fld_mikerosen' ),
				'type' => 'email',
				'std'  => 'name@email.com',
			),
			// RANGE
			array(
				'name' => __( 'Range', 'fld_mikerosen' ),
				'id'   => "{$prefix}range",
				'desc' => __( 'Range description', 'fld_mikerosen' ),
				'type' => 'range',
				'min'  => 0,
				'max'  => 100,
				'step' => 5,
				'std'  => 0,
			),
			// URL
			array(
				'name' => __( 'URL', 'fld_mikerosen' ),
				'id'   => "{$prefix}url",
				'desc' => __( 'URL description', 'fld_mikerosen' ),
				'type' => 'url',
				'std'  => 'http://google.com',
			),
			// OEMBED
			array(
				'name' => __( 'oEmbed', 'fld_mikerosen' ),
				'id'   => "{$prefix}oembed",
				'desc' => __( 'oEmbed description', 'fld_mikerosen' ),
				'type' => 'oembed',
			),
			// SELECT ADVANCED BOX
			array(
				'name'        => __( 'Select', 'fld_mikerosen' ),
				'id'          => "{$prefix}select_advanced",
				'type'        => 'select_advanced',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'value1' => __( 'Label1', 'fld_mikerosen' ),
					'value2' => __( 'Label2', 'fld_mikerosen' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				// 'std'         => 'value2', // Default value, optional
				'placeholder' => __( 'Select an Item', 'fld_mikerosen' ),
			),
			// TAXONOMY
			array(
				'name'       => __( 'Taxonomy', 'fld_mikerosen' ),
				'id'         => "{$prefix}taxonomy",
				'type'       => 'taxonomy',
				// Taxonomy name
				'taxonomy'   => 'category',
				// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
				'field_type' => 'checkbox_list',
				// Additional arguments for get_terms() function. Optional
				'query_args' => array(),
			),
			// POST
			array(
				'name'        => __( 'Posts (Pages)', 'fld_mikerosen' ),
				'id'          => "{$prefix}pages",
				'type'        => 'post',
				// Post type
				'post_type'   => 'page',
				// Field type, either 'select' or 'select_advanced' (default)
				'field_type'  => 'select_advanced',
				'placeholder' => __( 'Select an Item', 'fld_mikerosen' ),
				// Query arguments (optional). No settings means get all published posts
				'query_args'  => array(
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
				),
			),
			// WYSIWYG/RICH TEXT EDITOR
			array(
				'name'    => __( 'WYSIWYG / Rich Text Editor', 'fld_mikerosen' ),
				'id'      => "{$prefix}wysiwyg",
				'type'    => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw'     => false,
				'std'     => __( 'WYSIWYG default value', 'fld_mikerosen' ),
				// Editor settings, see wp_editor() function: look4wp.com/wp_editor
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
					'media_buttons' => false,
				),
			),
			// DIVIDER
			array(
				'type' => 'divider',
			),
			// FILE UPLOAD
			array(
				'name' => __( 'File Upload', 'fld_mikerosen' ),
				'id'   => "{$prefix}file",
				'type' => 'file',
			),
			// FILE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'File Advanced Upload', 'fld_mikerosen' ),
				'id'               => "{$prefix}file_advanced",
				'type'             => 'file_advanced',
				'max_file_uploads' => 4,
				'mime_type'        => 'application,audio,video', // Leave blank for all file types
			),
			// IMAGE UPLOAD
			array(
				'name' => __( 'Image Upload', 'fld_mikerosen' ),
				'id'   => "{$prefix}image",
				'type' => 'image',
			),
			// THICKBOX IMAGE UPLOAD (WP 3.3+)
			array(
				'name' => __( 'Thickbox Image Upload', 'fld_mikerosen' ),
				'id'   => "{$prefix}thickbox",
				'type' => 'thickbox_image',
			),
			// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
			array(
				'name'             => __( 'Plupload Image Upload', 'fld_mikerosen' ),
				'id'               => "{$prefix}plupload",
				'type'             => 'plupload_image',
				'max_file_uploads' => 4,
			),
			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'Image Advanced Upload', 'fld_mikerosen' ),
				'id'               => "{$prefix}imgadv",
				'type'             => 'image_advanced',
				'max_file_uploads' => 4,
			),
			// BUTTON
			array(
				'id'   => "{$prefix}button",
				'type' => 'button',
				'name' => ' ', // Empty name will "align" the button to all field inputs
			),
		),
	);
	return $meta_boxes;
}