<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Quark
 * @since Quark 1.0
 */

get_header(); ?>
<?php //gt_set_post_view(); ?>
<?php get_template_part('top','image'); ?>
	<div id="primary" class="site-content-inner" role="main">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<?php get_template_part( 'loop' ); ?>
					<?php
					include( TEMPLATEPATH . '/template-parts/related-tags.php' );
					?>
				</div>
			</div>
		</div>
	

<?php
/* show homebuilder menu for posts wchich from cats for homebuilders and not for web services  */
$postcat = get_the_category( $query->post->ID );

if ( !empty( $postcat ) ) {
	if( $postcat[0]->cat_ID == 123 || $postcat[0]->cat_ID == 124 || $postcat[0]->cat_ID == 125 ) {
	?>
	<?php
		include( TEMPLATEPATH . '/template-parts/related-posts.php' );
		include( TEMPLATEPATH . '/template-parts/all-tags.php' );
	?>
	</div> <!-- /#primary.site-content.row -->
	<?php
	}
} else {

?>

	<div class="link-section black" style="background-image:url('https://homeshowoff.com/wp-content/uploads/2019/04/cta-bg-home.jpg');">
		<div class="overlay">
    		<div class="container">
    			<div class="row">
    				<div class="col-lg-4 offset-lg-4">
                    <?php echo do_shortcode('[do_widget id=custom_html-20]') ?>
                    </div>
                </div>
            </div>
		</div>
	</div>

<?php
}
get_footer(); ?>

