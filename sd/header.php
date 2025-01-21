<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="maincontentcontainer">
 *
 * @package Quark
 * @since Quark 1.0
 */
?><!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="cleartype" content="on">
	<link rel="dns-prefetch" href="//fonts.googleapis.com">
	<link rel="dns-prefetch" href="//ajax.googleapis.com">
	<link rel="dns-prefetch" href="//www.google-analytics.com">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="shortcut icon" href="<?php bloginfo('template_url')?>/images/favicon.png" type="image/png" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
	<script async src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-85467936-1', 'auto');
  ga('send', 'pageview');

</script>
	<!-- Facebook Pixel Code -->
<script>
 !function(f,b,e,v,n,t,s)
 {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
 n.callMethod.apply(n,arguments):n.queue.push(arguments)};
 if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
 n.queue=[];t=b.createElement(e);t.async=!0;
 t.src=v;s=b.getElementsByTagName(e)[0];
 s.parentNode.insertBefore(t,s)}(window, document,'script',
 'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '3121781071172019');
 fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
 src="https://www.facebook.com/tr?id=3121781071172019&ev=PageView&noscript=1(44 B)
https://www.facebook.com/tr?id=3121781071172019&ev=PageView&noscript=1
"
/></noscript>
</head>

<?php
if(!is_front_page()){
	$bClass = "inner-page";
}
?>

<body <?php body_class($bClass); ?>>
<div id="wptime-plugin-preloader"></div>
<div id="wrapper" class="hfeed site">
	<div id="headercontainer">
		<?php get_template_part('template-parts/header','nav'); ?>
		<?php get_template_part('template-parts/homepage','slider'); ?>
	</div>

	<div id="maincontentcontainer">
		<?php	do_action( 'quark_before_woocommerce' ); ?>
		