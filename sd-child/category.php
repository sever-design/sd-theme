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

	<section id="primary" class="site-content-inner category-section" role="main">
				
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
<?php get_footer(); ?>