<?php
/**
 * The template for displaying an archive page for Categories.
 */

/****
 * SIDEBAR
 ****/
//Wheather to show sidebar On/Off
$sidebar 		= false;
//if On - Which sidebar to show
$sidebarContent = 'sidebar-single-post'; 


/****
 * TOP BANNER
 ****/
//Wheather to show top image On/Off - DO NOT USE WITH TITLE together
$topImage 		= true;

/* What to use - Image or Slider
 * $useBannerTmpl = 'slider' | 'image'
 */
$bannerTmplInUse = 'image';


/****
 * TOP TITLE - FYI: Title is also presented in TO BANNER SECTION
 ****/
// Use heading title for Category
$useTitle = false;

get_header();

if( $topImage ) {
	get_template_part('/template-parts/top', $bannerTmplInUse);
}

if ($sidebar) {
	$classContent = 'col-lg-9';
	$classSidebar = 'sidebar col-lg-3';
	$showSideBar = true;
} else {
	$classContent = 'col-lg-12';
	$classSidebar = 'sidebar__hidden';
	$showSideBar = false;
}

?>

	<section id="primary" class="site-content-inner category-section" role="main" itemscope itemtype="https://schema.org/CollectionPage">
				
	<?php if( $useTitle ) {?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
				<?php get_template_part('/template-parts/section', 'title'); ?>
				</div>
			</div>
		</div>
	<?php } ?>		
				
	<?php
	$term = get_queried_object();

	$children = get_terms( $term->taxonomy, array(
		'parent'    => $term->term_id,
		'hide_empty' => false
	) );
	// print_r($children); // uncomment to examine for debugging
	if($children) { // get_terms will return false if tax does not exist or term wasn't found.
		// term has children
		?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3">
				<?php 
				foreach($children as $subcat) {
					?>
					<a href="<?php echo get_category_link($subcat->term_id);?>" class="subcat-link">
						<?php
						echo do_shortcode(sprintf('[wp_custom_image_category term_id="%s"]', $subcat->term_id));
						?>
						<h3><?php echo $subcat->name; ?></h3>
					</a>							
					<?php
				}
				?>
				</div>
			</div>
		</div>
		<?php
	}
	?>
			
		
		<div class="container-fluid">
			<div class="row">
					
					<?php get_template_part( 'loop' ); ?>
			
				
				<?php if($showSideBar): ?>
				<div class="<?php echo $classSidebar; ?>">
					<?php
					if( !empty($sidebarContent) ) {
						dynamic_sidebar($sidebarContent);
					} else {
						echo '<span class="_dev_alert">category.php: str 9 - define sidebar ID to be visible on single post page</strong>';
					}
					?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php
// Advanced JSON-LD Schema Markup for Category Pages
function generate_category_page_schema_markup() {
    if (is_category()) {
        $category = get_queried_object();
        
        $schema = array(
            "@context" => "https://schema.org",
            "@type" => "CollectionPage",
            "name" => $category->name,
            "url" => get_category_link($category->term_id),
            "description" => $category->description ?: 'Collection of posts in the ' . $category->name . ' category',
            "mainEntity" => array(
                "@type" => "ItemList",
                "itemListElement" => array()
            )
        );

        // Get recent posts in this category
        $recent_posts = get_posts(array(
            'category' => $category->term_id,
            'numberposts' => 10
        ));

        foreach ($recent_posts as $index => $post) {
            $schema['mainEntity']['itemListElement'][] = array(
                "@type" => "ListItem",
                "position" => $index + 1,
                "url" => get_permalink($post->ID),
                "name" => $post->post_title
            );
        }

        // Add subcategories if they exist
        $children = get_terms(array(
            'taxonomy' => $category->taxonomy,
            'parent' => $category->term_id,
            'hide_empty' => false
        ));

        if (!empty($children)) {
            $schema['subCollection'] = array();
            foreach ($children as $child) {
                $schema['subCollection'][] = array(
                    "@type" => "CollectionPage",
                    "name" => $child->name,
                    "url" => get_category_link($child->term_id)
                );
            }
        }

        echo '<script type="application/ld+json">' . 
             json_encode($schema, JSON_PRETTY_PRINT) . 
             '</script>';
    }
}
add_action('wp_head', 'generate_category_page_schema_markup');

get_footer(); ?>