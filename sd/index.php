<?php
/** 
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Quark
 * @since Quark 1.0
 */

get_header();
?>
<?php
if(!is_home()){
?>
	<section class="latest-projects">
		<?php echo do_shortcode('[do_widget id=custom_html-18]'); ?>
	</section>	
<?php } else {
	get_template_part('top','image');	
?>

<div id="pages">
	<div id="primary" class="site-content-inner home-section inview" role="main">

		<div class="container">
			<div class="row">
			
				<div class="col-lg-12">
					<h1 class="cat-title sectional-title inview"><?php single_cat_title(); ?></h1>
				</div>
			
				<?php if ( have_posts() ) : ?>
				<div class="col-lg-4 col-md-12">
				<?php get_sidebar(); ?>
				</div>	
				<div class="col-lg-8 col-md-12">
					<?php get_template_part( 'loop' ); ?>
				</div>

				<?php else : ?>
					<div class="col-md-8">
						<?php get_template_part( 'no-results' ); // Include the template that displays a message that posts cannot be found ?>
					</div>
				<?php endif; // end have_posts() check ?>
				
			</div>
		</div>
	</div> <!-- /#primary.site-content.row -->
</div>
<?php } ?>
<?php get_footer(); ?>
