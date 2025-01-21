<?php
/**
 * The template for displaying an archive page for Tags.
 *
 * @package Quark
 * @since Quark 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content-inner inview" role="main">
	<?php
	include( TEMPLATEPATH . '/template-parts/section-title.php' );
	?>
		<div class="container">
			<div class="row">

				<?php if ( have_posts() ) : ?>

					<?php get_template_part( 'loop'); ?>

					<?php sd_content_nav( 'nav-below' ); ?>

				<?php else : ?>
					<div class="col-md-8 offset-md-2">
						<?php get_template_part( 'no-results' ); // Include the template that displays a message that posts cannot be found ?>
					</div>
				<?php endif; // end have_posts() check ?>
			</div>
		</div>
	</div> <!-- /#primary.site-content.row -->
	<?php
	include( TEMPLATEPATH . '/template-parts/all-tags.php' );
	?>
<?php get_footer(); ?>
