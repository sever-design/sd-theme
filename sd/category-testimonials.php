<?php
/**
 * The template for displaying an archive page for Categories.
 *
 * @package Quark
 * @since Quark 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content" role="main">
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<?php if ( have_posts() ) : ?>
						
						
						<?php while ( have_posts() ) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header class="entry-header">
									<h3 class="entry-title testicat-title">
										<?php the_title(); ?>
									</h3>
								</header> <!-- /.entry-header -->
								<div class="entry-content">
									<?php the_content( wp_kses( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'quark' ), array( 'span' => array( 
										'class' => array() ) ) )
										); ?>
								</div>
							</article> <!-- /#post -->
						<?php endwhile; ?>

						<?php quark_content_nav( 'nav-below' ); ?>

					<?php else : ?>

						<?php get_template_part( 'no-results' ); // Include the template that displays a message that posts cannot be found ?>

					<?php endif; // end have_posts() check ?>

				</div> 
				
			</div>
		</div>
	</div> <!-- /#primary.site-content.row -->

<?php get_footer(); ?>
