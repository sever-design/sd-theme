<?php 
/*
 * Header logo
 */


$fileLogo = '';
$fileLogoW = '';
$fileLogoH = '';

?>
<div class="main-header__logo">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="main-header__logo__link" rel="home">
		<?php if ( !empty( $fileLogo ) ) { ?>
			<div style="width:<?php echo $fileLogoW; ?>px; height:<?php echo $fileLogoH; ?>px;"><?php echo $fileLogo; ?></div>
		<?php } else { ?>
			<span class="no-logo-found">logo file doesnt exist</span>
		<?php } ?>
	</a>
</div>