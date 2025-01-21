<?php
/**
 * The Header for our theme.
 */
function sanitize_output($buffer)
{
    $search = array(
        '/\>[^\S ]+/s',  // strip whitespaces after tags, except space
        '/[^\S ]+\</s',  // strip whitespaces before tags, except space
        '/(\s)+/s'       // shorten multiple whitespace sequences
        );
    $replace = array(
        '>',
        '<',
        '\\1'
        );
    $buffer = preg_replace($search, $replace, $buffer);
    return $buffer;
}
//ob_start("sanitize_output");
?><!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta name="theme-color" content="#3b230e" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="cleartype" content="on">
	<link rel="dns-prefetch" href="//fonts.googleapis.com">
	<link rel="preconnect" href="//fonts.googleapis.com" crossorigin>
	<link rel="dns-prefetch" href="//ajax.googleapis.com">
	<link rel="preconnect" href="//ajax.googleapis.com" crossorigin>
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link rel="preconnect" href="//fonts.gstatic.com" crossorigin>
	<link rel="dns-prefetch" href="//www.google-analytics.com">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=2.0, user-scalable=yes">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/images/favicon.png" type="image/png" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php /* !!! GOOGLE TRACKING CODE BELOW THIS LINE !!! */ ?>
	<?php /* ---> GOOGLE TRACKING INSTEAD OF THIS LINE ONLY <--- */ ?>
	<?php /* !!! GOOGLE TRACKING CODE ABOVE THIS LINE !!! */ ?>
	<style>
		.grecaptcha-badge {display:none !important;}
	</style>
	<?php if( !wp_is_mobile() ){ ?>
		<link rel="preload" as="style" href="<?php echo get_stylesheet_directory_uri();?>/css/csscritical-dsktop.css" type="text/css" media="screen" onload = "this.onload = null; this.rel = 'stylesheet'; "/>
	<?php } else { ?>
		<link rel="preload" as="style" href="<?php echo get_stylesheet_directory_uri();?>/css/csscritical-mobile.css" type="text/css" media="screen" onload = "this.onload = null; this.rel = 'stylesheet'; " />
	<?php }?>
	<?php wp_head(); ?>
	
	<script>
		var images = [];
		function preload() {
			for (var i = 0; i < arguments.length; i++) {
				images[i] = new Image();
				images[i].src = preload.arguments[i];
			}
		}
		<?php
		// Set the directory path where images are stored
		$image_dir = get_stylesheet_directory() . '/images/';

		// Get all image files from the directory
		$images = glob($image_dir . '*.{jpg,jpeg,png,gif,svg}', GLOB_BRACE);

		// Start the preload function output
		echo "preload(\n";

		// Loop through each image and generate the preload string
		foreach ($images as $image) {
			// Get the relative URI of the image
			$image_uri = str_replace(get_stylesheet_directory(), get_stylesheet_directory_uri(), $image);
			
			// Output the image URI in the preload format
			echo "\t\"$image_uri\",\n";
		}

		// End the preload function output
		echo ");\n";
		?>
	</script>

	 
	<script>
	//https://stackoverflow.com/questions/58982072/recaptcha-v3-assets-cause-pagespeed-issues-how-to-defer
	/*
	    var fired = false;
	window.addEventListener('scroll', function () {
	  let scroll = window.scrollY;
	  if (scroll > 0 && fired === false) {
	    var recaptchaScript = document.createElement('script');
	    recaptchaScript.src = 'https://www.google.com/recaptcha/api.js?render=6LekXNAZAAAAADjfVbTFxXlwzFdqWO1PvmG9-9Zg';
	    recaptchaScript.defer = true;
	    document.body.appendChild(recaptchaScript);
	    fired = true;
	   
	    // console.log('On scroll fired');
	  }
	}, true);
	*/
	</script>
</head>

<?php
if(!is_front_page()){
	$bClass = "inner-page";
} else {
	$bClass = 'homepage';
}
?>

<body <?php body_class($bClass); ?>>

<div id="wrapper" class="hfeed site">
	<header id="headercontainer" class="site__header">
		<?php get_template_part('template-parts/header','main'); ?>
	</header>

	<main id="maincontentcontainer" class="site__content">
		<?php	do_action( 'quark_before_woocommerce' ); ?>
		