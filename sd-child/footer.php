<?php
/**
 * The template for displaying the footer.
 */
$copyrightURL = 'https://homeshowoff.com';
$copyrightTXT = 'Homeshowoff';

$logoFileName = 'logo.svg';
$fileLogo = get_theme_file_path( '/images/'.$logoFileName );
$fileLogoW = '374';
$fileLogoH = '48';
?>

		<img src="https://maps.googleapis.com/maps/api/staticmap?center=200-7404 King George Blvd, Surrey, BC V3W 1N6&zoom=14&size=600x400&markers=size:mid%7Ccolor:0xEA4335%7C200-7404,King,George,Blvd,Surrey,BC,V3W1N6&key=AIzaSyBBYpTz5HIUrKizzvNX7R631JBtFVVEWeQ"/>
		<img src="https://maps.googleapis.com/maps/api/staticmap?center=1750-1188 West Georgia St, Vancouver, BC, Canada, V6E 4A2&zoom=15&size=275x211&markers=size:mid%7Ccolor:0xEA4335%7C1750-1188,West,Georgia St,Vancouver,BC,Canada,V6E4A2&key=AIzaSyBeoZfXBz7Qqtnwc1CjWMoJhEy_UpqpcOM"/>

		<?php	do_action( 'quark_after_woocommerce' ); ?>
	</main> <!-- /main#maincontentcontainer -->

	<footer class="site__footer" role="contentinfo">
		<section id="footercontainer" class="footer" style="">
			<div class="footer__logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer__logo__link" rel="home">
					<?php if ( file_exists( $fileLogo ) ) { ?>
						<img src="<?php echo get_stylesheet_directory_uri();?>/images/<?php echo $logoFileName; ?>" alt="<?php bloginfo('name'); ?>" width="<?php echo $fileLogoW; ?>" height="<?php echo $fileLogoH; ?>"/>
					<?php } else { ?>
						<span class="no-logo-found">logo file doesnt exist</span>
					<?php } ?>
				</a>
			</div>
		</section> <!-- /.footercontainer -->
	</footer>
	
	<div id="copy" class="site__copyrights">
		<div class="site__copyrights__wrapper">
			<p>
			<span class="site__copyrights__siteifo">
				<?php echo bloginfo('name'); ?> &copy; <?php echo date("Y"); ?>
			</span>
			<span>
				Website by <a href="<?php echo $copyrightURL; ?>" target="_blank"><?php echo $copyrightTXT; ?></a>
			</span>
			</p>
		</div>
	</div>

</div>
<?php wp_footer(); ?>

<!--
 |\__/,|   (`\
 |_ _  |.--.) )
 ( T   )     • theme framework by timofey.ca
(((^_(((/(((_/ 
 ~~~~~~~~~~~~~~~~~~-->
<script>
wow = new WOW(
    {
      boxClass:     'wow',      // default
      animateClass: 'animated', // default
      offset:       0,          // default
      mobile:       true,       
      live:         true        // default
    }
  )
wow.init();

document.addEventListener( 'wpcf7mailsent', function( event ) {
  location = '/thank-you/';
}, false );
</script>
	<script>
	//sessionStorage.fontsLoaded&&document.documentElement.classList.add("wf-active");

	
	jQuery.event.special.touchstart = {
		setup: function( _, ns, handle ) {
			this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
		}
	};
	jQuery.event.special.touchmove = {
		setup: function( _, ns, handle ) {
			this.addEventListener("touchmove", handle, { passive: !ns.includes("noPreventDefault") });
		}
	};
	jQuery.event.special.wheel = {
		setup: function( _, ns, handle ){
			this.addEventListener("wheel", handle, { passive: true });
		}
	};
	jQuery.event.special.mousewheel = {
		setup: function( _, ns, handle ){
			this.addEventListener("mousewheel", handle, { passive: true });
		}
	};
	</script>
</body>
</html>