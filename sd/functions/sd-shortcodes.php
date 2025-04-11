<?php
/*
 * My CPT Slider from Slides post
 * use layout from sd-child theme in /template-parts/cpt-slider-tmpl
 * usage [slider group="homepage"]
 *
*/
function display_slider( $atts ) {
    // Extract the group name from shortcode attributes
    $atts = shortcode_atts( array(
        'group' => '', // Default empty group
		'use_link' => 'false', // Default to not showing link
    ), $atts, 'sd_cpt_slider' );

    // WP_Query arguments
    $args = array(
        'post_type' => 'slides',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'slider_group',
                'field' => 'name', // Match by term name
                'terms' => $atts['group'], // Use the group name from shortcode
            ),
        ),
    );

    $query = new WP_Query( $args );
    ob_start();
	echo '<div class="slider-wrapper">';
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
			$slide_link = rwmb_meta( 'hs_LinkToPost', '', get_the_ID() );
			if(!empty( $slide_link )) {
				get_template_part( 'template-parts/cpt-slider-tmpl', null, array( 'slide_link' => $slide_link, 'use_link' => $atts['use_link'] ) );
			} else {
				get_template_part( 'template-parts/cpt-slider-tmpl' );
			}
        }
		echo '</div>';
        wp_reset_postdata();
    } else {
        echo '<p class="_error">No slides found for group: ' . esc_html( $atts['group'] ) . '</p>';
    }

    return ob_get_clean();
}
add_shortcode( 'sd_cpt_slider', 'display_slider' );

/* END My CPT Slider from Slides post */




// Register the [get_page_intro] shortcode
// Register the [get_page_intro] shortcode
// Usage: [get_page_intro page_id="42" read_more="Learn More" alt_title="Other than page title" alt_excerpt="Custom excerpt text"]
global $page_intro_counter;
$page_intro_counter = 0;

function get_page_intro_shortcode($atts) {
    global $page_intro_counter;
    $page_intro_counter++; // Increment counter for each use

    $atts = shortcode_atts(
        array(
            'page_id'     => '',
            'read_more'   => 'Read More',
            'alt_title'   => '', // Alternative title
            'alt_excerpt' => '', // Alternative excerpt
        ),
        $atts,
        'get_page_intro'
    );

    $page_id = intval($atts['page_id']);
    if (!$page_id) {
        return 'Invalid page ID';
    }

    $page = get_post($page_id);
    if (!$page) {
        return 'Page not found';
    }

    // Use alt_title if provided, otherwise use the real page title
    $title = !empty($atts['alt_title']) ? esc_html($atts['alt_title']) : get_the_title($page_id);

    // Use alt_excerpt if provided, otherwise use the actual page excerpt
    $excerpt = !empty($atts['alt_excerpt']) ? esc_html($atts['alt_excerpt']) : apply_filters('the_content', get_the_excerpt($page_id));

    $read_more_text = esc_html($atts['read_more']);
    $read_more_link = get_permalink($page_id);

    ob_start(); ?>
    <div class="page-intro-accordion page-intro-accordion-<?php echo $page_intro_counter; ?>">
        <div class="accordion-item">
            <div class="accordion-header">
                <span class="accordion-title"><?php echo esc_html($title); ?></span>
                <span class="accordion-toggle-icon closed"></span> <!-- Default closed (up arrow) -->
            </div>
            <div class="accordion-content" style="display: none;">
                <?php echo $excerpt; ?>
                <p class="linkme">
                    <a href="<?php echo esc_url($read_more_link); ?>" class="read-more"><?php echo $read_more_text; ?></a>
                </p>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('get_page_intro', 'get_page_intro_shortcode');


// Enqueue jQuery for the accordion
function enqueue_page_intro_scripts() {
    wp_enqueue_script('jquery');
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.accordion-header').click(function() {
                var $icon = $(this).find('.accordion-toggle-icon');
                var $content = $(this).next('.accordion-content');

                // Toggle visibility of the content
                $content.slideToggle();

                // Toggle class 'closed' on the icon
                $icon.toggleClass('closed');
            });
        });
    </script>
    <?php
}
add_action('wp_footer', 'enqueue_page_intro_scripts');




function custom_format_to_html($content) {
    // Convert [strong]...[/strong] to <strong>...</strong>
    $content = preg_replace('/\[strong\](.*?)\[\/strong\]/', '<strong>$1</strong>', $content);

    // Convert [br] to <br>
    $content = str_replace('[br]', '<br>', $content);

    return $content;
}
function custom_shortcode_formatter($atts, $content = null) {
    if ($content) {
        return custom_format_to_html($content);
    }
    return '';
}
add_shortcode('custom_formatter', 'custom_shortcode_formatter');

/* show children categories links of a given parent
usage: 
 echo do_shortcode('[child_categories_menu parent_id="1"]');
*/
function wp_child_categories_menu($atts) {
    // Extract attributes from shortcode
    $atts = shortcode_atts(
        array(
            'parent_id' => 0, // Default parent category ID is 0 (top-level)
        ),
        $atts,
        'child_categories_menu'
    );

    // Get the parent category ID
    $parent_id = intval($atts['parent_id']);

    // Check if we are on a category archive page
    if (!is_category()) {
        return ''; // Not a category archive, return nothing
    }

    // Get the current category ID
    $current_category_id = get_queried_object_id();

    // Check if the current category is the root category or a nested category
    $current_category_ancestors = get_ancestors($current_category_id, 'category');
    if ($current_category_id !== $parent_id && !in_array($parent_id, $current_category_ancestors)) {
        return ''; // Current category is not part of the specified hierarchy, return nothing
    }

    // Fetch child categories for the given parent ID
    $child_categories = get_categories(array(
        'child_of' => $parent_id,
        'hide_empty' => true, // Only show categories with posts
    ));

    // Get the root parent category object
    $parent_category = get_category($parent_id);

    // Check if there are child categories
    if (empty($child_categories) && !$parent_category) {
        return '<p>No child categories found.</p>';
    }

    // Build the menu output
    $output = '<ul class="child-categories-menu">';

    // Add the root parent category as the first menu item
    $active_class = ($current_category_id == $parent_id) ? 'active' : '';
    $output .= '<li class="child-category ' . esc_attr($active_class) . '">';
    $output .= '<a href="' . esc_url(get_category_link($parent_id)) . '">' . esc_html($parent_category->name) . '</a>';
    $output .= '</li>';

    // Add child categories to the menu
    foreach ($child_categories as $category) {
        // Determine if the current category is active
        $active_class = ($current_category_id == $category->term_id) ? 'active' : '';

        // Create menu items for each child category
        $output .= '<li class="child-category ' . esc_attr($active_class) . '">';
        $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
        $output .= '</li>';
    }

    $output .= '</ul>';

    return $output;
}

// Register shortcode to use this functionality
add_shortcode('child_categories_menu', 'wp_child_categories_menu');



/*
 * Helper function to return the theme option value within shortcode. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 */
 if (!function_exists('sd_theme_option')) {
    function sd_theme_option($atts) {
        $default = false;
        $a = shortcode_atts(array(
            'option_name' => '',
            'custom_text' => '',
            'use_icon' => false,
            'icon_id' => '',
            'icon_w' => '16px',
            'icon_h' => '16px',
            'hide_prefix' => false, // New option to control prefix visibility
			'hide_phone' => false, // New option to control phone visibility
			'raw' => false, // NEW: Added raw optio
        ), $atts);

        // Get theme options
        $optionsframework_settings = get_option('optionsframework');
        $option_name = $optionsframework_settings['id'];
        $options = get_option($option_name) ?: array();

        if (!isset($options[$a['option_name']])) {
            return $default;
        }
		
        // Return raw value if 'raw' is set to true
        if ($a['raw'] && $a['option_name'] === 'site_contact_phone') {
            return preg_replace('/[^0-9]/', '', $options[$a['option_name']]); // Clean phone number
        }

        // Define field configurations
        $field_configs = array(
            'site_contact_booking' => array(
                'default_text' => 'Book Now',
                'default_icon' => 'fa-calendar-check-o',
                'wrapper_class' => 'site_contact_booking',
                'is_link' => true,
                'link_type' => 'direct',
                'text_only_wrap' => true, // Only wrap the text in text-wrap, no prefix
            ),
            'site_contact_hrs' => array(
                'default_icon' => 'fa-clock-o',
                'wrapper_class' => 'site_contact_hrs',
                'is_link' => false,
            ),
            'site_contact_phone' => array(
                'default_icon' => 'fa-phone',
                'wrapper_class' => 'site_contact_phone',
                'is_link' => true,
                'link_type' => 'tel',
                'link_process' => 'clean_phone',
            ),
            'site_contact_fax' => array(
                'default_icon' => 'fa-fax',
                'wrapper_class' => 'site_contact_fax',
                'is_link' => false,
            ),
            'site_contact_email' => array(
                'default_icon' => 'fa-envelope',
                'wrapper_class' => 'site_contact_email',
                'is_link' => true,
                'link_type' => 'mailto',
            ),
            'site_contact_address' => array(
                'default_icon' => 'fa-map-marker',
                'wrapper_class' => 'site_contact_address',
                'is_link' => true,
                'link_type' => 'map',
                'link_option' => 'site_contact_address_link',
                'numbered_class' => 'site_contact_address1',
            ),
        );

        // Handle numbered variations
        foreach (['phone', 'fax', 'email', 'address'] as $base_type) {
            for ($i = 2; $i <= 3; $i++) {
                $key = "site_contact_{$base_type}{$i}";
                $base_config = $field_configs["site_contact_{$base_type}"];
                $field_configs[$key] = array_merge(
                    $base_config,
                    array(
                        'wrapper_class' => "{$base_config['wrapper_class']} site_contact_{$base_type}{$i}",
                        'numbered_class' => "site_contact_{$base_type}{$i}",
                    )
                );
            }
        }

        return generate_field_output($a, $options, $field_configs);
    }

    function generate_field_output($atts, $options, $field_configs) {
        $field_type = $atts['option_name'];
        if (!isset($field_configs[$field_type])) {
            return $options[$field_type];
        }

        $config = $field_configs[$field_type];
        $value = $options[$field_type];
        
        // Generate icon
        $icon = generate_icon($atts, $config['default_icon'] ?? '');
        
        // Generate text
        $text = generate_text($atts, $value, $config);
        
        // Process link if needed
        if ($config['is_link']) {
            $value = generate_link($value, $config, $options, $icon . $text);
        } else {
            $value = '<span>' . $icon . do_shortcode($text) . '</span>';
        }

        // Add wrapper class
        $wrapper_class = $config['wrapper_class'];
        if (!empty($config['numbered_class'])) {
            $wrapper_class .= " {$config['numbered_class']}";
        }

        return sprintf(
            '<span class="%s">%s</span>',
            $wrapper_class,
            $value
        );
    }

    function generate_icon($atts, $default_icon) {
        if (!$atts['use_icon']) {
            return '';
        }

        if (!empty($atts['icon_id'])) {
            return do_shortcode(sprintf(
                '[svg i="%s" w="%s" h="%s"]',
                $atts['icon_id'],
                $atts['icon_w'],
                $atts['icon_h']
            ));
        }

        return sprintf('<i class="fa %s"></i>', $default_icon);
    }

    function generate_text($atts, $value, $config) {
        // Handle text-only wrap case (like booking)
        if (!empty($config['text_only_wrap'])) {
            return sprintf(
                '<span class="text-wrap">%s</span>',
                !empty($atts['custom_text']) ? $atts['custom_text'] : ($config['default_text'] ?? $value)
            );
        }

        // Regular text with optional prefix
        $text_parts = array();
        
        // Add prefix if not hidden and custom text exists
        if (!$atts['hide_prefix'] && !empty($atts['custom_text'])) {
            $text_parts[] = sprintf('<span class="_prefix">%s</span>', $atts['custom_text']);
        } else {
			$text_parts[] = sprintf('<span class="_prefix hidden">%s</span>', $atts['custom_text']);
		}
        
        if (!$atts['hide_phone']) {
			// Add main text
			$text_parts[] = sprintf('<span class="text-wrap">%s</span>', $value);
        } else {
			$text_parts[] = sprintf('<span class="text-wrap hidden">%s</span>', $value);
		}
        
        return implode(' ', $text_parts);
    }

    function generate_link($value, $config, $options, $content) {
        $href = '';
        $target = '';
        
        switch ($config['link_type']) {
            case 'tel':
                $href = 'tel:' . preg_replace('/[^0-9]/', '', $value);
                break;
            case 'mailto':
                $href = 'mailto:' . $value;
                break;
            case 'map':
                if (!empty($options[$config['link_option']])) {
                    $href = $options[$config['link_option']];
                    $target = ' target="_blank"';
                } else {
                    return '<span>' . $content . '</span>';
                }
                break;
            case 'direct':
                $href = $value;
                break;
        }

        return sprintf('<a href="%s"%s><span>%s</span></a>', $href, $target, $content);
    }
}

add_shortcode('get_theme_option', 'sd_theme_option');


/**
 * Return a list of linked social media icons, based on the urls provided in the Theme Options
What This Does
Supports raw=true for extracting only links.

Supports link=social_xxx to get a specific platform's link.

Keeps the original formatted version when raw is not set.
 [get_social_media raw="true"]
 https://facebook.com/yourpage
https://twitter.com/yourpage
https://instagram.com/yourpage

[get_social_media raw="true" link="social_facebook"]
https://facebook.com/yourpage
 */
if (!function_exists('sd_get_social_media')) {
    function sd_get_social_media($atts) {
        $a = shortcode_atts(array(
            'raw' => false, // NEW: Return links only
            'link' => '',   // NEW: Return specific social media link
        ), $atts);

        $icons = array(
            'social_facebook'  => array('icon' => 'fa-facebook', 'title' => 'Facebook'),
            'social_twitter'   => array('icon' => 'fa-twitter', 'title' => 'Twitter'),
            'social_homestars' => array('icon' => 'fa-homestars', 'title' => 'Homestars'),
            'social_tiktok'    => array('icon' => 'fa-tiktok', 'title' => 'TikTok'),
            'social_linkedin'  => array('icon' => 'fa-linkedin', 'title' => 'LinkedIn'),
            'social_houzz'     => array('icon' => 'fa-houzz', 'title' => 'Houzz'),
            'social_youtube'   => array('icon' => 'fa-youtube', 'title' => 'YouTube'),
            'social_instagram' => array('icon' => 'fa-instagram', 'title' => 'Instagram'),
            'social_vimeo'     => array('icon' => 'fa-vimeo', 'title' => 'Vimeo'),
            'social_pinterest' => array('icon' => 'fa-pinterest', 'title' => 'Pinterest'),
            'social_yelp'      => array('icon' => 'fa-yelp', 'title' => 'Yelp'),
            'social_gmaps'     => array('icon' => 'fa-map-marker', 'title' => 'GMap'),
        );

        // If a specific link is requested, return only that link
        if (!empty($a['link']) && isset($icons[$a['link']])) {
            $url = of_get_option($a['link'], '');
            return (!empty($url) && $a['raw']) ? esc_url($url) : '';
        }

        $output = '';
        foreach ($icons as $key => $data) {
            $value = of_get_option($key, '');

            if (!empty($value)) {
                // If raw is true, return only links
                if ($a['raw']) {
                    $output .= esc_url($value) . "\n";
                } else {
                    // Default formatted output
                    $output .= sprintf(
                        '<li><a href="%1$s" title="%2$s"%3$s><span><i class="fa fab %4$s"></i></span></a></li>',
                        esc_url($value),
                        esc_html__($data['title'], 'sd'),
                        (!of_get_option('social_newtab', '0') ? '' : ' target="_blank"'),
                        $data['icon']
                    );
                }
            }
        }

        if ($a['raw']) {
            return trim($output); // Just return raw links, one per line
        }

        return !empty($output) ? '<ul class="social-list">' . $output . '</ul>' : '';
    }
}
add_shortcode('get_social_media', 'sd_get_social_media');

// shortcode for specific category.  Use on homepage (or wherever) to display a list of categories of posts
function show_posts( $atts ) {
    extract( shortcode_atts( array(
        'id' => 2,	// Add the *default category id
		'num' => 5 // Add the *default posts amount
    ), $atts ) );

    $posts = get_posts( array(
        'posts_per_page' => $num,
        'post_status'    => 'publish',
        'cat'       => $id,
    ) );

return $posts;
}
add_shortcode( 'get_posts_from_cat', 'show_posts' );  
// place in page: [get_posts_from_cat]   Simple & clean for clients
// OR
/* [get_posts_from_cat id="x" num="y"]
 * (x = id of category/categories other than *default category id.
 */



/*
 * Shortcode for our tricky slider
 *
 * * */
function show_slider($post_type, $post_cat) {
	
	$post_type = strtolower($post_type);
	$post_cat = strtolower($post_cat);
	
	$args = array(
		'post_type'	     => $post_type,
		'order'		     => 'ASC',
		'orderby'	     => 'menu_order',
		'posts_per_page' => -1,
		//'meta_key' 		 => '_is_ns_featured_post',
		//'meta_value' 	 => 'yes',
		/*
		'tax_query' => array(
			array (
				'taxonomy' => 'slide-category',
				'field' => 'slug',
				'terms' => $post_cat,
			)
		),
		*/
	);
	//$query = new WP_Query( array( 'meta_key' => '_is_ns_featured_post', 'meta_value' => 'yes' ) );
	$query = new WP_Query( $args ); 
	
	if ($query -> have_posts()):
	?>

	<div class="slider-wrapper">
		<div class="carousel">
			<div class="sub-owl">
				<ul class="sub-slider">
				<?php while($query -> have_posts()): $query->the_post(); ?>
					<li class="nested-bg">
						<div class="slider-content">
							<?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
							
							<?php
							//var_dump(rwmb_meta('hs_showContent')); 
							if( rwmb_meta('hs_showContent') == 0): ?>
							
							<div class="slide-content">
								<div class="container">
									<div class="row">
										<div class="col-lg-8">
											<div class="content-wrapper">
												<?php
												$title_words = explode(" ", get_the_title());
												?>
												<h3 class="slider-post-title">
												<?php
													$c = 0;
													echo '<span>';
													foreach($title_words as $word ) {
														$c++;
														echo $word . ' ';
														if($c == 4) {
															echo '</span><span>'; 
														}
													}
													echo '</span> ';
												?></h3>
												<div class="text-container">
													<div class="text">
														<?php echo wp_trim_words( apply_filters( 'the_content', wp_strip_all_tags(get_the_content()) ), 55, ' ...'); ?>
													</div>
													<div class="text-btn">
														<a href="<?php echo get_the_permalink( rwmb_meta('hs_LinkToPost') ); ?>"><span><?php echo rwmb_meta('hs_BtnText'); ?></span></a>
													</div>
												</div>
												<div class="excerpt">
													<?php echo apply_filters( 'the_content', wp_strip_all_tags(get_the_excerpt()) ); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php endif; ?>
						</div>
					</li>
				<?php endwhile; wp_reset_query(); ?>
				</ul>
			</div>
		</div>
	</div>


	<?php
	endif;
} //end function

function show_slider_shortcode($atts) {
    $a = shortcode_atts( array(
        'post_type' => 'slides',
		'post_cat' => 'any',
    ), $atts );
    $post_type = $a['post_type'];
	$post_cat = $a['post_cat'];
    ob_start();
    show_slider($post_type, $post_cat);
    $show_slider = ob_get_clean();
    return $show_slider;
}
add_shortcode( 'show_slider', 'show_slider_shortcode' );



/**
 * Shortcode to pickup WC category data
 *
 */
function show_woocategory_by_id($cat_id, $posts_num, $show_cat_link, $prod_brand, $cols) {
	
	$woo_categories = get_term_by( 'id', absint($cat_id), 'product_cat' );

	$woo_category_link = get_term_link( $woo_categories->term_id, 'product_cat' ); 
	
	$thumbnail_id = get_term_meta( $woo_categories->term_id, 'thumbnail_id', true );
	$image = wp_get_attachment_url( $thumbnail_id );

//var_dump(wc_get_featured_product_ids());
	
	$args = array(
		'post_type' => 'product',
		'posts_per_page' => $posts_num,
		'post__in'            => wc_get_featured_product_ids(),
		'tax_query' => array(
		
			array(
				'taxonomy' => 'product_cat',
				'field'    => 'term_id',
				'terms'     =>  $cat_id,
				'operator'  => 'IN'
			),
		
			array(
				'taxonomy' => 'yith_product_brand',
				'field' => 'slug',
				'terms' => $prod_brand
			)
			  
		)
	);
		
	$loop = new WP_Query( $args );
	
	echo '<div class="woocommerce columns-'.$cols.' custom-shortcode-func">';
	echo '<ul class="products columns-'.$cols.'">';
	
	while ( $loop->have_posts() ) : $loop->the_post();
		global $product;
		wc_get_template_part( 'content', 'product' );
	endwhile;
	wp_reset_query();
	
	//var_dump($show_cat_link);
	
	if($show_cat_link != 'false'){
		echo '<li class="product category-link last"><a href="'.$woo_category_link.'">';
		if ( $image ) {
			echo '<img src="' . $image . '" alt="' . $woo_categories->name . '" />';
		} else {
			echo '<img src="' . wc_placeholder_img_src( 'large' ) . '" alt="' . $woo_categories->name . '" />';
		}
		echo '<a href="'.$woo_category_link.'" class="button">View All</a>';
		echo '</a></li>';
	}
	
	echo '</ul>';
	echo '</div>';
}
function show_woocat($atts) {
    $a = shortcode_atts( array(
		'id' => '',
		'posts_num' => 4,
		'show_cat_link' => false,
		'prod_brand' => '',
		'cols' => 4,
    ), $atts );
	$cat_id = $a['id'];	
	$posts_num = $a['posts_num'];
	$show_cat_link = $a['show_cat_link'];
	$prod_brand = $a['prod_brand'];
	$cols = $a['cols'];
    ob_start();
    show_woocategory_by_id($cat_id, $posts_num, $show_cat_link, $prod_brand, $cols);
    $show_latest_projects = ob_get_clean();
    return $show_latest_projects;
}
add_shortcode( 'show_woocategory', 'show_woocat' );
/*
usage echo do_shortcode('[show_woocategory id="69" posts_num="4" show_cat_link=false prod_brand="modern-flames" cols="4"]');
*/



/*
 * Shortcode for latest projects
 *
 * * */

function show_service_posts($post_ids) {
	
	$ids_arr = explode(',',$post_ids);
	
	$args = array(
		'post_type'	     => 'service',
		'post__in'		 => $ids_arr,
		//'order'		     => 'ASC',
		'orderby'	     => 'post__in',
		'posts_per_page' => 5,
	);
	
	$query = new WP_Query( $args ); 
	if ($query -> have_posts()):
	$count = $query->post_count;
	?>
	<div class="services">
	<?php
	$i = 0;
	while($query -> have_posts()): $query->the_post();
		$i++;

		if($i == 1) {
			$bg = get_field('banner');

			if(empty($bg)) {
				$bg = get_the_post_thumbnail_url(get_the_ID(),'large');
			}
		?>
		<div class="back-image" style="background-image:url('<?php echo $bg; ?>');"></div>
			<div class="wrapper">
	<?php }
		if($i == 2) { ?>
			<div class="sub-services">
			<?php } ?>
				<div class="item item-<?php echo $i; ?> service-id-<?php the_ID(); ?>">
					<div class="item-content">
						<div class="item-frame">
							<div class="item-description">
								<div class="featured-image">
								<?php
								if ( has_post_thumbnail() && $i != 1 ) { ?>
									<a href="<?php the_permalink(); ?>" class="feat-img-link">
									<?php echo the_post_thumbnail(get_the_ID(), 'medium' ); ?>
									</a>
								<?php
								} ?>
								</div>
								<h3 class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="item-excerpt">
									<?php echo apply_filters('the_content', get_the_excerpt() ); ?>
								</div>
								<div class="read-more-link">
									<a href="<?php the_permalink(); ?>">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			
			if($i == $count) { ?>
			</div>
			</div>
		<?php } ?>			
	<?php endwhile; wp_reset_query(); ?>
	</div>
	<?php
	endif;
} //end function

function show_serv_shortcode($atts) {
    $a = shortcode_atts( array(
		'post_ids' => '',
    ), $atts );
	$post_ids = $a['post_ids'];
    ob_start();
    show_service_posts($post_ids);
    $show_latest_projects = ob_get_clean();
    return $show_latest_projects;
}
add_shortcode( 'show_service_posts', 'show_serv_shortcode' );



/*
 * Shortcode for latest projects
 *
 * * */
function show_latest_projects($page_ids) {
	
	$ids_arr = explode(',', $page_ids);
	
	//$ids_arr = array(12);
	
	$args = array(
		'post_type'	     => 'any',
		'post__in'		 => $ids_arr,
		'order'		     => 'ASC',
		'orderby'	     => $ids_arr,
		'posts_per_page' => -1,
	);
	
	$query = new WP_Query( $args ); 
	//var_dump($ids_arr);
	if ($query -> have_posts()):
	$c = 0;
	$count = $query->post_count;
	
	
	?>
	<script type="text/javascript">
		<!--//--><![CDATA[//><!--
			var images = new Array()
			function preload() {
				for (i = 0; i < preload.arguments.length; i++) {
					images[i] = new Image()
					images[i].src = preload.arguments[i]
				}
			}
			preload(
		<?php while($query->have_posts()): $query->the_post(); ?>
			<?php echo '"' . get_the_post_thumbnail_url(get_the_ID(), 'full') . '"'; ?>,
		<?php endwhile; wp_reset_query(); wp_reset_postdata();?>
			)
		//--><!]]>
	</script>
	<div class="project-wrapper">
	<?php
	
	while($query->have_posts()): $query->the_post();
		$c++;
		$projectHoverImage = get_the_post_thumbnail_url(get_the_ID(),'full');
	?>
			
		<div class="project-item item-<?php echo $c; ?>" data-bgcolor="#e2e2e2" data-feat="<?php if ( !empty($projectHoverImage) ) { echo $projectHoverImage; }?>">
			
				<div class="project-frame">
					<h3 class="proj-title">
						<a href="<?php the_permalink(); ?>"><?php  the_title(); ?></a>
					</h3>
					<div class="proj-excerpt"><?php
					$my_post = get_post($query->ID());
					if($my_post->post_excerpt != '') {
						echo apply_filters('the_content', $my_post->post_excerpt);
					}
					?>
						<div class="more-link">
							<a href="<?php the_permalink(); ?>" class="buttonme"><span>READ MORE</span></a>
						</div>
					</div>
				</div>
			
		</div>
	<?php endwhile; wp_reset_query(); wp_reset_postdata();?>
		<div class="project-wrapper-bg"></div>
	</div>
	<?php
	endif;
} //end function

function show_latest_projects_shortcode($atts) {
    $a = shortcode_atts( array(
		'page_ids' => 4,
    ), $atts );
	$page_ids = $a['page_ids'];
    ob_start();
    show_latest_projects($page_ids);
    $show_latest_projects = ob_get_clean();
    return $show_latest_projects;
}
add_shortcode( 'show_service_pages', 'show_latest_projects_shortcode' );

/*
 * print current year
 */
function sd_print_current_year($atts) {
    ob_start();
    echo date('Y');
    $show_latest_projects = ob_get_clean();
    return $show_latest_projects;
}
add_shortcode( 'print_year', 'sd_print_current_year' );



function hs_section($atts, $content = null) {
	$atts = shortcode_atts(array(
        'class' => ''
    ), $atts); 
    $output = '<div class="hs_section '.$atts['class'].'"><div class="in_section">';
    $output .= do_shortcode($content);
    $output .= '</div></div><!-- .hs_section (end) -->';

    return $output;
}
add_shortcode('hs_section', 'hs_section');


function shocat($parentCatID){
	$term_id = $parentCatID;
	$taxonomy_name = 'category';
	$termchildren = get_term_children( $term_id, $taxonomy_name );
	 
	echo '<ul class="sub-categories">';
	foreach ( $termchildren as $child ) {
		$term = get_term_by( 'id', $child, $taxonomy_name );

		echo '<li>'
		. '<a class="link-img" href="' . get_term_link( $child, $taxonomy_name ) . '">' . do_shortcode(sprintf('[wp_custom_image_category term_id="%s"]', $child))  . '</a>'
		. '<h3 class="cat-title"><a class="link-title" href="' . get_term_link( $child, $taxonomy_name ) . '"><span>' . $term->name . '</span></a></h3>'
		. '</li>';
	}
	echo '</ul>';
}

function shocat_init($atts) {
    $a = shortcode_atts( array(
		'cat_id' => '',
    ), $atts );
	$cat_id = $a['cat_id'];
    ob_start();
    shocat($cat_id);
    $show_sub_cats = ob_get_clean();
    return $show_sub_cats;
}
add_shortcode( 'display_child_cats', 'shocat_init' );

/*
 * SVG Shortcode
 */
function sd_customsvg_shortcode( $attrs ): string {
	$attrs    = shortcode_atts(
		array(
			'i' => '',
			'w' => '1em',
			'h' => '1em',
		),
		$attrs
	);
	$iSlug    = $attrs['i'] ?? '';
	$width    = $attrs['w'] ?? '1em';
	$height   = $attrs['h'] ?? '1em';
	$themeUri = get_stylesheet_directory_uri();
	return "<i class='svg-icon icon-{$iSlug}'><svg class='vector-icon' width='{$width}' height='{$height}'><use xlink:href='{$themeUri}/images/theme-icons.svg#{$iSlug}'></use></svg></i>";
}
add_shortcode( 'svg', 'sd_customsvg_shortcode' );


/*
 * use [ytvideo video_id="YOUR_VIDEO_ID" video_alt="Your video description" autoplay="true" loop="true" custom_splash="imgurl"]
 */
function sd_yt_vidos($youtubeID, $custom_img, $video_alt, $autoplay = 'false', $loop = 'false') {
    if(empty($video_alt)) {
        $video_alt = 'Video';
    }
    
    // Convert autoplay and loop parameters to integer values (0 or 1) for the YouTube URL
    $autoplay_value = ($autoplay === 'true') ? 1 : 0;
    $loop_value = ($loop === 'true') ? 1 : 0;
	
	if($autoplay) {
		$autoplayUrlParam = '&muted=1';
	}

    // Build loop parameter for YouTube video (needs playlist parameter for loop to work)
    $loop_param = ($loop_value) ? '&loop=1&playlist=' . $youtubeID : '';

	if(!empty($custom_img)) {
		// Embed the YouTube video with autoplay and loop based on parameters
		echo '<div class="yt-video-wrapper auto-play-'. $autoplay_value .'">'
			. '<div class="img-splash" style="background: url('.$custom_img.') no-repeat center; background-size:cover;"></div>'
			. '<a href="#" class="play" style="background: url('.$custom_img.') no-repeat center; background-size:cover;"><i class="fa fa-youtube-play"></i></a>'
			. '<iframe width="100%" height="315" data-src="https://www.youtube.com/embed/'.$youtubeID.'?autoplay=0&rel=0&controls=0&modestbranding=1&iv_load_policy=3&fs=0&showinfo=0'.$loop_param.$autoplayUrlParam.'" src="" title="'.$video_alt.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'
		. '</div>';
	} else {
		// Embed the YouTube video with autoplay and loop based on parameters
		echo '<div class="yt-video-wrapper auto-play-'. $autoplay_value .'">'
			. '<div class="img-splash" style="background: url(https://img.youtube.com/vi/'.$youtubeID.'/maxresdefault.jpg) no-repeat center; background-size:cover;"></div>'
			. '<a href="#" class="play" style="background: url(https://img.youtube.com/vi/'.$youtubeID.'/maxresdefault.jpg) no-repeat center; background-size:cover;"><i class="fa fa-youtube-play"></i></a>'
			. '<iframe width="100%" height="315" data-src="https://www.youtube.com/embed/'.$youtubeID.'?autoplay=0&rel=0&controls=0&modestbranding=1&iv_load_policy=3&fs=0&showinfo=0'.$loop_param.$autoplayUrlParam.'" src="" title="'.$video_alt.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'
		. '</div>';		
	}


}

function sd_ytube_lazy_embedd($atts) {
    $a = shortcode_atts( array(
        'video_id'   => '',
        'video_alt'  => '',
        'autoplay'   => 'false', // Default autoplay is false
        'loop'       => 'false',  // Default loop is false
		'custom_splash' => ''
    ), $atts );

    $video_id = $a['video_id'];
    $video_alt = $a['video_alt'];
    $autoplay = $a['autoplay'];
    $loop = $a['loop'];
	$custom_img = $a['custom_splash'];

    ob_start();
    sd_yt_vidos($video_id, $video_alt, $autoplay, $loop, $custom_img);
    $vidos = ob_get_clean();
    return $vidos;
}
add_shortcode( 'ytvideo', 'sd_ytube_lazy_embedd' );

/*
to test YT 2
*/
/*
 * Shortcode: [ytvideo2 video_id="YOUR_VIDEO_ID" video_alt="Your video description" autoplay="true" loop="true"]
*/ 
function sd_yt_videos($youtubeID, $custom_img, $video_alt = 'Video', $autoplay = 'false', $loop = 'false') {
    // Validate inputs
    if (empty($youtubeID)) {
        return '<p>Error: No video ID provided.</p>';
    }
    
    // Default fallback for alt text
    $video_alt = $video_alt ?: 'Video';

    // Convert autoplay and loop to integers (0 or 1)
    $autoplay_value = ($autoplay === 'true') ? 1 : 0;
    $loop_value = ($loop === 'true') ? 1 : 0;

    // Construct the loop parameter
    $loop_param = $loop_value ? '&loop=1&playlist=' . $youtubeID : '';

    // Construct lazy-loaded iframe
    $iframe_src = "https://www.youtube.com/embed/{$youtubeID}?autoplay=0&rel=0&controls=1&modestbranding=1&iv_load_policy=3&fs=1&showinfo=0{$loop_param}";

    // Embed HTML
	
	if(!empty($custom_img)) {
    ob_start();
    ?>
    <div class="yt-video-wrapper auto-play-<?php echo $autoplay_value; ?>">
        <!-- Video Thumbnail -->
        <div class="img-splash" style="background: url('<?php echo $custom_img; ?>') no-repeat center; background-size: cover;">
            <a href="#" class="play-button" data-src="<?php echo $iframe_src; ?>">
                <i class="fa fa-youtube-play"></i>
            </a>
        </div>
        <!-- Lazy-loaded iframe -->
        <iframe width="100%" height="315" data-src="<?php echo $iframe_src; ?>" src="" title="<?php echo esc_attr($video_alt); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    </div>
    <?php
    return ob_get_clean();
	} else {
    ob_start();
    ?>
    <div class="yt-video-wrapper auto-play-<?php echo $autoplay_value; ?>">
        <!-- Video Thumbnail -->
        <div class="img-splash" style="background: url('https://img.youtube.com/vi/<?php echo $youtubeID; ?>/maxresdefault.jpg') no-repeat center; background-size: cover;">
            <a href="#" class="play-button" data-src="<?php echo $iframe_src; ?>">
                <i class="fa fa-youtube-play"></i>
            </a>
        </div>
        <!-- Lazy-loaded iframe -->
        <iframe width="100%" height="315" data-src="<?php echo $iframe_src; ?>" src="" title="<?php echo esc_attr($video_alt); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    </div>
    <?php
    return ob_get_clean();
	}
}	

function sd_ytube_lazy_embed_shortcode($atts) {
    $atts = shortcode_atts([
        'video_id'   => '',
        'video_alt'  => '',
        'autoplay'   => 'false',
        'loop'       => 'false',
		'custom_splash' => ''
    ], $atts);

    return sd_yt_videos($atts['video_id'], $atts['video_alt'], $atts['autoplay'], $atts['loop'], $atts['custom_splash']);
}

add_shortcode('ytvideo2', 'sd_ytube_lazy_embed_shortcode');

