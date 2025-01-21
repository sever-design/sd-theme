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
	<section id="primary" class="site-content-inner page-section" role="main">
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
<?php get_footer(); ?>