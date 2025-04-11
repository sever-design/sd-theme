<?php
/**
 * The template for displaying a Post
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

get_header();

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
		<?php if( $topImage ) {
			get_template_part('/template-parts/top', $bannerTmplInUse);
		}
		?>
	<section id="primary" class="site-content-inner post-section" role="main" itemscope itemtype="https://schema.org/BlogPosting">
		<meta itemprop="name" content="<?php echo get_the_title(); ?>">
		<meta itemprop="datePublished" content="<?php echo get_the_date('c'); ?>">
		<meta itemprop="dateModified" content="<?php echo get_the_modified_date('c'); ?>">
		<div class="container">
			<div class="row">

				<div class="<?php echo $classContent; ?>">
					<?php get_template_part( 'loop' ); ?>
				</div>
				
				<?php if($showSideBar): ?>
				<div class="<?php echo $classSidebar; ?>">
					<?php
					if( !empty($sidebarContent) ) {
						dynamic_sidebar($sidebarContent);
					} else {
						echo '<span class="_dev_alert">post.php: str 9 - define sidebar ID to be visible on single post page</strong>';
					}
					?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php
// Advanced JSON-LD Schema Markup for Single Posts
function generate_single_post_schema_markup() {
    if (is_single()) {
        global $post;
        
        // Get featured image
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
        
        // Get author information
        $author_id = $post->post_author;
        $author_name = get_the_author_meta('display_name', $author_id);
        $author_url = get_author_posts_url($author_id);
        
        // Get post categories
        $categories = get_the_category($post->ID);
        $category_names = wp_list_pluck($categories, 'name');
        
        $schema = array(
            "@context" => "https://schema.org",
            "@type" => "BlogPosting",
            "headline" => get_the_title($post->ID),
            "name" => get_the_title($post->ID),
            "description" => get_the_excerpt($post->ID) ?: wp_trim_words(strip_tags($post->post_content), 30),
            "url" => get_permalink($post->ID),
            "datePublished" => get_the_date('c', $post->ID),
            "dateModified" => get_the_modified_date('c', $post->ID),
            "author" => array(
                "@type" => "Person",
                "name" => $author_name,
                "url" => $author_url
            ),
            "publisher" => array(
                "@type" => "Organization",
                "name" => get_bloginfo('name'),
                "logo" => array(
                    "@type" => "ImageObject",
                    "url" => get_site_icon_url()
                )
            ),
            "keywords" => implode(', ', $category_names)
        );
        
        // Add featured image if available
        if ($image) {
            $schema["image"] = array(
                "@type" => "ImageObject",
                "url" => $image[0],
                "width" => $image[1],
                "height" => $image[2]
            );
        }
        
        echo '<script type="application/ld+json">' . 
             json_encode($schema, JSON_PRETTY_PRINT) . 
             '</script>';
    }
}
add_action('wp_head', 'generate_single_post_schema_markup');

get_footer(); ?>