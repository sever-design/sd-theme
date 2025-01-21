<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id #maincontentcontainer div and all content after.
 * There are also four footer widgets displayed. These will be displayed from
 * one to four columns, depending on how many widgets are active.
 *
 * @package Quark
 * @since Quark 1.0
 */
?>

		
		<?php	do_action( 'quark_after_woocommerce' ); ?>
	</div> <!-- /#maincontentcontainer -->
	
	
	<section id="footercontainer" class="main-footer" style="display:none">

		<footer class="site-footer" role="contentinfo">
			
		<div class="container-fluid">
			<div class="row">
				<div class="footer-block footer-logo col">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo-link" rel="home">
						<img src="<?php bloginfo('template_url')?>/images/logo.png" alt=""/>
					</a>
				</div>
				<div class="footer-block footer-menu-1 col">
					<div class="menu-footer">
						<?php echo do_shortcode('[do_widget id=nav_menu-10]'); ?>
					</div>
				</div>
				<div class="footer-block footer-menu-2 col">
					<div class="menu-footer-social">
						<?php echo do_shortcode('[do_widget id=nav_menu-11]'); ?>
					</div>
				</div>
				<div class="footer-block footer-menu-3 col">
					<?php echo do_shortcode('[do_widget id=nav_menu-12]'); ?>
				</div>
			</div>
		</div>
		<div id="copy">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p><a href="<?php echo get_the_permalink(3); ?>"><?php echo get_the_title(3); ?></a> | <?php echo bloginfo('name'); ?> &copy; 2016 &ndash; <?php echo date("Y"); ?>.  ALL RIGHTS RESERVED</p>
					</div>
				</div>
			</div>
		</div>
		</footer>
	</section> <!-- /.footercontainer -->

</div> <!-- /.#wrapper.hfeed.site -->

<?php wp_footer(); ?>

</body>
</html>