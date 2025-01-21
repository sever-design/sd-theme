<?php
/**
 * Template Name: Contact Template
 *
 * Description: Displays a full-width page, with no sidebar. This template is great for pages
 * containing large amounts of content.
 *
 * @package Quark
 * @since Quark 1.0
 */
/****
 * TOP BANNER
 ****/
//Wheather to show top image On/Off - DO NOT USE WITH TITLE together
$topImage 		= false;

$bannerTmplInUse = 'image';

get_header();?>


		<?php
		if( $topImage ) {
			get_template_part('/template-parts/top', $bannerTmplInUse);
		}
		?>
	<section id="primary" class="site-content-inner page-section" role="main">
		<div class="contact-page-wrapper">
			<div class="contact-page-container">
				<?php get_template_part( 'loop' ); ?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>
