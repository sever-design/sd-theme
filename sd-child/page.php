<?php
/**
 * The template for displaying a Page
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

if(is_cart()) {
		$topImage 		= false;
}

/* What to use - Image or Slider
 * $useBannerTmpl = 'slider' | 'image'
 */
$bannerTmplInUse = 'image';

/* Show or hide children pages
 */
$showChildren = false;


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
		<?php
		if( $topImage ) {
			get_template_part('/template-parts/top', $bannerTmplInUse);
		}
		?>
	<section id="primary" class="site-content-inner page-section" role="main" itemscope itemtype="https://schema.org/WebPage">
		<meta itemprop="name" content="<?php echo get_the_title(); ?>">
		<div class="container">
			<div class="row">
				<?php if($showChildren) : ?>
				<div class="col-md-12">
					$ancestors = get_post_ancestors(get_the_ID());
				</div>
				<?php endif; ?>

				<div class="<?php echo $classContent; ?>">
					<?php get_template_part( 'loop' ); ?>
				</div>
				
				<?php if($showSideBar): ?>
				<div class="<?php echo $classSidebar; ?>">
					<?php
					if( !empty($sidebarContent) ) {
						dynamic_sidebar($sidebarContent);
					} else {
						echo '<span class="_dev_alert">page.php: str 9 - define sidebar ID to be visible on single post page</strong>';
					}
					?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php
// Add JSON-LD Schema Markup
function add_page_schema_markup() {
    if (is_page()) {
        $page = get_queried_object();
        $schema = array(
            "@context" => "https://schema.org",
            "@type" => "WebPage",
            "name" => get_the_title($page->ID),
            "url" => get_permalink($page->ID),
            "description" => get_the_excerpt($page->ID) ?: wp_trim_words(strip_tags($page->post_content), 30),
            "mainEntity" => array(
                "@type" => "Thing",
                "name" => get_the_title($page->ID)
            )
        );

        // Add author if applicable
        $author = get_the_author_meta('display_name', $page->post_author);
        if ($author) {
            $schema['author'] = array(
                "@type" => "Person",
                "name" => $author
            );
        }

        echo '<script type="application/ld+json">' . 
             json_encode($schema, JSON_PRETTY_PRINT) . 
             '</script>';
    }
}
add_action('wp_head', 'add_page_schema_markup');

get_footer(); ?>