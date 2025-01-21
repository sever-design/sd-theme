<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Quark
 * @since Quark 1.0
 */

get_header();

if( is_404() ) {
	//echo '404 tmpl laoded';
}

?>
	<section id="primary" class="site-content-inner" role="main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<article id="post-0" class="post error404 no-results not-found">
						<header class="entry-header">
							<h1 class="entry-title"><i class="fa fa-frown-o fa-lg"></i> <?php esc_html_e( 'Uh Oh! This is somewhat embarrassing!', 'quark' ); ?></h1>
						</header>
						<div class="entry-content">
							<p style="text-align:center;"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'quark' ); ?></p>
						</div><!-- /.entry-content -->
					</article><!-- /#post -->
				</div>
			</div>
		</div>

	</section> <!-- /#primary.site-content.row -->

<?php get_footer(); ?>
