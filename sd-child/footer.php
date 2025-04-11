<?php
/**
 * The template for displaying the footer.
 */
$copyrightURL = 'https://timofey.ca';
$copyrightTXT = 'Online Store by Timofey.ca';

$logoFileName = 'logo.svg';
$fileLogo = get_theme_file_path( '/images/'.$logoFileName );
$fileLogoW = '374';
$fileLogoH = '48';
?>


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
				<a href="<?php echo $copyrightURL; ?>" target="_blank"><?php echo $copyrightTXT; ?></a>
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
/*
wow = new WOW(
    {
      boxClass:     'wow',      // default
      animateClass: 'animated', // default
      offset:       0,          // default
      mobile:       false,       
      live:         true        // default
    }
  )
wow.init();
*/
document.addEventListener('wpcf7mailsent', function(event) {
    switch(event.detail.contactFormId) {
        case 164: // download form
            location = '/thank-you-for-download/';
            break;
        default:
            location = '/thank-you/'; // Default redirect if form ID doesn't match
    }
}, false);
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
<script type="application/ld+json">{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "<?php echo bloginfo('name') ?>",
  "image": "<?php echo get_stylesheet_directory_uri();?>/images/logo-copateam.svg",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "258 Esther Drive",
    "addressLocality": "Barrie",
    "addressRegion": "Ontario",
    "postalCode": "L4N 0G4",
    "addressCountry": "CA"
  },
  "telephone": "<?php echo do_shortcode('[get_theme_option option_name="site_contact_phone" raw="true"]') ?>",
  "openingHours": "24/7",
  "url": "<?php echo bloginfo('url') ?>"
}

{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "<?php echo bloginfo('name') ?>",
  "url": "<?php echo bloginfo('url') ?>",
  "logo": "<?php echo get_stylesheet_directory_uri();?>/images/logo-copateam.svg",
  "sameAs": [
    "<?php echo do_shortcode('[get_social_media raw="true" link="social_facebook"]'); ?>",
    "<?php echo do_shortcode('[get_social_media raw="true" link="social_instagram"]'); ?>"
  ],
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "<?php echo do_shortcode('[get_theme_option option_name="site_contact_phone" raw="true"]') ?>",
    "contactType": "Customer Support",
    "areaServed": "CA",
    "availableLanguage": "English"
  }
}</script>
<div id="sd-overlay"></div>
</body>
</html>