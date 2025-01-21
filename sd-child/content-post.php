<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package Quark
 * @since Quark 1.0
 */

//Wheather show featured image in Single Post On/Off
$showFeaturedImage = true;
//Wheather to show Excerpt on Single Post On/Off
$showExcerpt = true;
//Wheather to show Post Publishing Date On/off
$showPostDate = false;
//Wheather to show Post Edit
$showAdminEditLink = true;
//default image size if shown
$thumbSize = 'large';
/****
 * TOP TITLE - FYI: Title is also presented in TO BANNER SECTION
 ****/
// Use heading title for Category
$useTitle = true;
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header post-header">
			<?php
			if( $useTitle ) {
				get_template_part('/template-parts/section', 'title');
			}
			?>
			
			<?php if ( has_post_thumbnail() && $showFeaturedImage ) { ?>
				<div class="feat-image-link">
					<?php the_post_thumbnail( $thumbSize ); ?>
				</div>
			<?php } ?>
		</header> <?php /* single post header */ ?>

		<?php if ( $showExcerpt ): ?>
		<div class="entry-summary post-summary">
			
			<?php apply_filters( 'the_content', get_the_excerpt() ); ?>
			
			<?php if($showPostDate): ?>
			<div class="post-meta">
				<?php sd_posted_on(); ?>
			</div>
			<?php endif; ?>
		</div>
		<?php endif; //end showExcerpt ?>
		
		<main class="entry-content post-content">
			<?php the_content( wp_kses( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'quark' ), array( 'span' => array('class' => array() ) ) )); ?>
		</main>

		<footer class="entry-footer post-footer">
		
			<?php if( $showAdminEditLink ){ ?>
				<div class="__admin-edit-post-link">
				<?php edit_post_link( esc_html__( 'Edit', 'quark' ) . ' <i class="fa fa-angle-right"></i>', '<div class="edit-link">', '</div>' ); ?>
				</div>
			<?php } ?>
			
		</footer> <!-- /.entry-meta -->
	</article> <!-- /#post -->
