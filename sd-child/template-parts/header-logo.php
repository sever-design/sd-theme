<?php 
/*
 * Header logo
 */

$logoFileName = 'logo-copateam.svg';
$fileLogo = get_theme_file_path( '/images/'.$logoFileName );
$fileLogoW = '197';
$fileLogoH = '26';

?>
<div class="main-header__logo">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="main-header__logo__link" rel="home" itemscope itemtype="https://schema.org/Organization">
		<?php if ( file_exists( $fileLogo ) ) { ?>
			<img src="<?php echo get_stylesheet_directory_uri();?>/images/<?php echo $logoFileName; ?>" alt="<?php bloginfo('name'); ?>" width="<?php echo $fileLogoW; ?>" height="<?php echo $fileLogoH; ?>" itemprop="logo" />
		<?php } else { ?>
			<span class="no-logo-found">logo file doesnt exist</span>
		<?php } ?>
	</a>
</div>