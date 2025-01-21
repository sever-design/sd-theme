<?php
/**
 * The main WooCommerce template file.
 */

/****
 * TOP BANNER
 ****/
//Wheather to show top image On/Off - DO NOT USE WITH TITLE together
$topImage 		= true;

/****
 * TOP TITLE - FYI: Title is also presented in TO BANNER SECTION
 ****/
// Use heading title for Category
$useTitle = true;

get_header();

?>
<?php
/*
add_action( 'woocommerce_before_shop_loop', 'before_main_content' );

function before_main_content() {
	echo '<div class="filter-breadcrumbs"><div class="filter-wrapper"><a id="woof-filter-toggler" href="#">Filter</a></div>';
	if ( function_exists('woocommerce_breadcrumb') ) { ?>
		<div class="breadcrumbs-wrapper">
			<?php  woocommerce_breadcrumb(); ?>
		</div>
	<?php }
	echo '</div>';
}
*/

if(!is_product() && $topImage ) {
	get_template_part('/template-parts/top', $bannerTmplInUse);
}
?>
	<?php
	if( $useTitle ) {
		get_template_part('/template-parts/section', 'title');
	}
	?>
	<section id="primary" class="site-content-inner woocommerce-section" role="main">
	
		<div class="container">
			<div class="row">
				
			<?php // woocommerce_content();
			if ( is_singular( 'product' ) ) { ?>
				<div class="col-lg-12">
				<?php while ( have_posts() ) :
					the_post();
					wc_get_template_part( 'content', 'single-product' );
				endwhile; ?>
				</div>
			<?php } else { ?>
				<div class="col-lg-9">
				<?php if ( apply_filters( 'woocommerce_show_page_title', false ) ) : ?>

					<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

				<?php endif; ?>

				<?php do_action( 'woocommerce_archive_description' ); ?>

				<?php if ( woocommerce_product_loop() ) : ?>
					<div id="woocommerce_before_shop_loop">
						<?php do_action( 'woocommerce_before_shop_loop' ); ?>
					</div>

					<?php woocommerce_product_loop_start(); ?>

					<?php if ( wc_get_loop_prop( 'total' ) ) : ?>
						<?php while ( have_posts() ) : ?>
							<?php the_post(); ?>
							<?php wc_get_template_part( 'content', 'product' ); ?>
						<?php endwhile; ?>
					<?php endif; ?>

					<?php woocommerce_product_loop_end(); ?>

					<?php do_action( 'woocommerce_after_shop_loop' ); ?>
				</div>
				<div class="col-lg-3">
					<div class="sidebar-shop-cat">
						<?php /* Promotions/Featured Prods */ echo do_shortcode('[do_widget id=custom_html-10 class="cat-sidebar-prods"]'); ?>
						<?php /* Top Sellers */ echo do_shortcode('[do_widget id=custom_html-9 class="cat-sidebar-prods"]'); ?>
						<?php /* Related Prods */ echo do_shortcode('[do_widget id=custom_html-11 class="cat-sidebar-prods"]'); ?>
					</div>
				</div>
					<?php
				else :
					do_action( 'woocommerce_no_products_found' );
				endif;
			} ?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>