<?php
/**
 * Template Name: Product Page Tmpl
 *
 * Description: Displays a full-width page, with no sidebar. This template is great for pages
 * containing large amounts of content.
 *
 * @package Quark
 * @since Quark 1.0
 */

get_header(); ?>
<?php // get_template_part('top','image'); ?>
	<?php
	
	include( STYLESHEETPATH . '/template-parts/section-title-product-page.php' );
	?>
	<div id="primary" class="site-content-inner" role="main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<?php the_content(); ?>
						</div>
					</article>
				</div>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>
