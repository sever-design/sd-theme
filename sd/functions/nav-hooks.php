<?php
/*
 * Add class to main menu .column-image-submenu to get image and sublinks
 */

// Custom Walker Class for Submenu with Featured Image
class Column_Image_Submenu_Walker extends Walker_Nav_Menu {

    // Start each element (menu item).
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        // Get the existing classes and join them into a string
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . $class_names  . '"' : '';

        // Add ID attribute for the menu item
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . $id . '"' : '';

        // Start the `<li>` element with default WordPress classes and ID
        $output .= '<li' . $id . $class_names . '>';

        // Check if the item is a top-level item with the `column-image-submenu` class
        if ( in_array( 'column-image-submenu', $classes ) && $depth === 0 ) {
            // Get the featured image for the parent page
            $featured_image = get_the_post_thumbnail( $item->object_id, 'medium_large', array( 'class' => 'menu-featured-image' ) );

            // Wrap the featured image in a link to the parent page
            $featured_image_link = '<a href="' . $item->url  . '">' . $featured_image . '</a>';

            // Add link and start submenu container
            $output .= '<a href="' .  $item->url  . '"><span class="menu-name">' . $item->title  . '</a></span><span class="sub-menu-toggler"></span>';
            $output .= '<div class="submenu-container sub-menu">';
            $output .= '<div class="submenu-columns">';
            $output .= '<div class="submenu-left-column">';
        } elseif ( $depth === 1 ) {
            // Handle first-level child items in the left column
            $output .= '<a href="' .  $item->url . '">' . $item->title  . '</a></span><span class="sub-menu-toggler"></span>';
        } else {
            // Default behavior for other items
            $output .= '<a href="' . $item->url . '">' .  $item->title  . '</a></span><span class="sub-menu-toggler"></span>';
        }
    }

    // End each element (menu item).
    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        if ( in_array( 'column-image-submenu', $item->classes ) && $depth === 0 ) {
            // Close left column, add right column with the linked featured image, and close the submenu container
            $featured_image = get_the_post_thumbnail( $item->object_id, 'medium_large', array( 'class' => 'menu-featured-image' ) );
            $featured_image_link = '<a href="' .  $item->url  . '">' . $featured_image . '</a>';

            $output .= '</div>'; // Close left column
            $output .= '<div class="submenu-right-column">';
            $output .= $featured_image_link; // Add linked featured image
            $output .= '</div>'; // Close right column
            $output .= '</div>'; // Close submenu container
        }

        // Close the `<li>` element
        $output .= '</li>';
    }
}



// Register Custom Walker for Menu
function register_column_image_menu( $args ) {
    // Apply the custom walker only to menus that contain 'column-image-submenu' in their class
    if ( isset( $args->menu_class ) && strpos( $args->menu_class, 'column-image-submenu' ) !== false ) {
        $args['walker'] = new Column_Image_Submenu_Walker();
    }
    return $args;
}
add_filter( 'wp_nav_menu_args', 'register_column_image_menu' );



/* add images to nav menu - feat img as thumb
add_filter('wp_nav_menu_objects', 'ad_filter_menu', 10, 2);

function ad_filter_menu($sorted_menu_objects, $args) {

    // check for the right menu to filter
    // here we check for the menu with name 'Posts Menu'
    // given that you call it in you theme with:
    //   wp_nav_menu( array( 'menu' => 'Posts Menu' ) );
    // if you call the menu using theme_location, eg:
    //   wp_nav_menu( array( 'theme_location' => 'top_manu' ) );
    // check for:
    //   if ($args->theme_location != 'main_menu')
    if ($args->theme_location == 'main_menu')
        return $sorted_menu_objects;

    // edit the menu objects
    foreach ($sorted_menu_objects as $menu_object) {
        // searching for menu items linking to posts or pages
        // can add as many post types to the array
        if ( in_array($menu_object->object, array('page','post')) ) {
						
            // set the title to the post_thumbnail if available
			//var_dump($menu_object->object_id);
			$featImg = get_the_post_thumbnail_url($menu_object->object_id, 'thumbnail');
			//var_dump($featImg);			
			if($featImg != false) {
				$menu_object->title = '<img src="'.$featImg. '" alt="'. $menu_object->title .'" /><span>' . $menu_object->title . '</span>';
			} else {
				$menu_object->title;
			}
			
            
            $menu_object->title = get_field('header_image', $menu_object->object_id)
				? '<img src="'.get_field('header_image', $menu_object->object_id) . '" alt="'. $menu_object->title .'" /><span>' . $menu_object->title . '</span>'
				: $menu_object->title;
				
				
        }
    }

    return $sorted_menu_objects;
}

*/

function add_data_cont_to_menu_items($items, $args) {
    foreach ($items as $item) {
        // Check if the item has the required class
        if (isset($item->title)) {
            // Add the `data-cont` attribute to the menu item title
            $item->title = sprintf(
                '<span class="menu__title-txt" data-cont="%s">%s</span>',
                esc_attr($item->title), // This is the value for `data-cont`
                esc_html($item->title)  // This is the actual visible title
            );
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'add_data_cont_to_menu_items', 10, 2);

/**
* Add the images to the special submenu -> the submenu items with the parent with 'swd-special-dropdown' class.
*
*/

function add_images_to_special_submenu( $items ) {
	$special_menu_parent_ids = array();

	foreach ( $items as $item ) {
		if ( in_array( 'swd-special-dropdown', $item->classes, true ) && isset( $item->ID ) ) {
			$special_menu_parent_ids[] = $item->ID;
		}

		if ( in_array( $item->menu_item_parent, $special_menu_parent_ids ) && has_post_thumbnail( $item->object_id ) ) {
			$item->title = sprintf(
				'<span class="menu__image">%1$s</span> <span class="menu__title" data-cont="%2$s">%2$s</span>',
				get_the_post_thumbnail( $item->object_id, 'thumbnail', array( 'alt' => esc_attr( $item->title ) ) ),
				$item->title
			);
		} else {
			$item->title = sprintf(
				'<span class="menu__title">%1$s</span>',
				$item->title
			);			
		}
	}

	return $items;
}

add_filter( 'wp_nav_menu_objects', 'add_images_to_special_submenu' );


/**
* Add the Category images to the special submenu -> the submenu items with the parent with 'swd-special-dropdown' class.
*
*/
function add_category_images_to_special_cat_submenu( $items ) {
	// Iterate through each menu item
	foreach ( $items as $item ) {
		// Check if the item has the 'swd-special-dropdown-cat' class and is a category
		if ( in_array( 'swd-special-dropdown', $item->classes, true ) && 'category' === $item->object ) {
			// Get the category ID
			$cat_id = $item->object_id;

			// Retrieve the category image from the options table
			$attachment_id = get_option( 'categoryimage_' . $cat_id );

			// Check if an image exists for this category
			if ( $attachment_id ) {
				// Get the category image
				$category_image = wp_get_attachment_image( $attachment_id, 'thumbnail', false, array( 'alt' => esc_attr( $item->title ) ) );

				// Make sure $category_image is not empty before modifying the title
				if ( $category_image ) {
					// Modify the menu item title to include the category image and title
					$item->title = sprintf(
						'<span class="menu__image">%1$s</span><span class="menu__title" data-cont="%2$s">%2$s</span>',
						$category_image,
						$item->title // Ensuring that the title is escaped safely
					);
				}
			} else {
				// If no image is found, just display the title
				$item->title = sprintf(
					'<span class="menu__title" data-cont="%1$s">%1$s</span>',
					esc_html( $item->title )
				);
			}
		}
	}

	// Return the modified menu items
	return $items;
}

// Hook the function to the wp_nav_menu_objects filter
add_filter( 'wp_nav_menu_objects', 'add_category_images_to_special_cat_submenu' );

/*
 * Register main menu locations
 * 
 */
function sd_nav_menus() {
	register_nav_menus( array(
		'header-menu' => esc_html__( 'Header Menu', 'quark' ),
		//'header-menu-web' => esc_html__( 'Header Menu Web Services', 'quark' )
	) );
}
add_action( 'after_setup_theme', 'sd_nav_menus' );

/*
 * Navigation Hooks
 * -- Description to nav menu item
 * Exec shortcode if needed
 */

function sd_add_nav_description( $item_output, $item, $depth, $args ) {
	if ( !empty( $item->description ) ) {
		$item_output = str_replace( $args->link_after . '</a>',
			$args->link_after . '</a><div class="menu-item-description"><div class="menu-description-inner">' . do_shortcode($item->description) . '</div></div>',
			$item_output
		);
	}
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'sd_add_nav_description', 10, 4 );


/**
 * Add a filter for wp_nav_menu to add an extra class for menu items that have children (ie. sub menus)
 * @param Menu items
 * @return array An extra css class is on menu items with children
 */
function sd_add_menu_parent_class( $items ) {

	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}

	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'menu-parent-item';
		}
	}

	return $items;
}
add_filter( 'wp_nav_menu_objects', 'sd_add_menu_parent_class' );





/*
 * Displays navigation to next/previous pages when applicable.
 *
 */
if ( ! function_exists( 'sd_content_nav' ) ) {
	function sd_content_nav( $nav_id ) {
		global $wp_query;
		$big = 999999999; // need an unlikely integer

		$nav_class = 'site-navigation paging-navigation';
		if ( is_single() ) {
			
			if(has_category(5)  || has_category(1)  ){
				//team cat 
				$nav_class = 'site-navigation post-navigation nav-single flex-reverse';
			} else {
				$nav_class = 'site-navigation post-navigation nav-single';
			}
		}
		
		if( is_category() ){
			$nav_class = 'site-navigation post-navigation nav-category col-md-12';
		}
		
		if(!is_page()){
		?>
		<nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
			<?php
			/* <h3 class="assistive-text"><?php esc_html_e( 'Post navigation', 'sd' ); ?></h3> */
			//var_dump($wp_query->max_num_pages);
			?>

			<?php
			if ( is_single() ) { // navigation links for single posts 

					//if team category || news
					next_post_link( '<div class="nav-next">%link</div>',
						'<span class="meta-nav">' . _x( '%title <i class="fa fa-angle-right" aria-hidden="true"></i>',
						'Next post link',
						'sd' ) . '</span>',true
					);
					previous_post_link( '<div class="nav-previous">%link</div>',
						'<span class="meta-nav">' . _x( '<i class="fa fa-angle-left" aria-hidden="true"></i> %title',
						'Previous post link', 'sd' ) . '</span>',true
					);
				

			}
			elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() || is_tax() ) ) {
				echo paginate_links(
					array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var( 'paged' ) ),
						'total' => $wp_query->max_num_pages,
						'type' => 'list',
						'prev_text' => wp_kses(
							__( '<i class="fa fa-angle-left" aria-hidden="true"></i> Previous', 'sd' ),
							array(
								'i' => array(
									'class' => array(),
									'aria-hidden' => array()
								)
							)
						),
						'next_text' => wp_kses(
							__( 'Next <i class="fa fa-angle-right" aria-hidden="true"></i>', 'sd' ),
							array(
								'i' => array(
									'class' => array(),
									'aria-hidden' => array()
								)
							)
						)
					)
				);
			}
			?>
		</nav>
		<?php
		}
	}
}
