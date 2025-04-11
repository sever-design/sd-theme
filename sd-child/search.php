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
$topImage 		= false;

/* What to use - Image or Slider
 * $useBannerTmpl = 'slider' | 'image'
 */
$bannerTmplInUse = 'image';


/****
 * TOP TITLE - FYI: Title is also presented in TO BANNER SECTION
 ****/
// Use heading title for Category
$useTitle = true;

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

	<section id="primary" class="site-content-inner post-section" role="main">

	<?php
	if( $useTitle ) {
		get_template_part('/template-parts/section', 'title');
	}
	?>
		<div class="container">
			<div class="row">

				<div class="<?php echo $classContent; ?>">
					<?php 
					if ( have_posts() ) {
						get_template_part( 'loop' );
					} else {
						echo '<p style="text-align: center;">nothing found</p>';
					}
					?>
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
<?php get_footer(); ?>