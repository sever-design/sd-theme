<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Quark
 * @since Quark 1.0
 */
 
/****
 * TOP TITLE - FYI: Title is also presented in TO BANNER SECTION
 ****/
// Use heading title for Category
$useTitle = true;
?>

<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if( $useTitle ) {
		get_template_part('/template-parts/section', 'title');
	}
	?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'quark' ),
			'after' => '</div>',
			'link_before' => '<span class="page-numbers">',
			'link_after' => '</span>'
		) ); ?>
	</div>
</article>
