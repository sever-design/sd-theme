<?php 
/*
 * Header nav
 */
?>
<div class="main-header__menu">
	<div class="menu">
		<?php // Use <button> for mobile menu toggles bcz of issues on iOS stupid browsers. ?>

		<button id="mobile-menu-toggler" class="menu__toggle mt-style" aria-label="Toggle Mobile Menu"><span><span></span></span></button>				
		<nav id="site-navigation" class="menu__main-navigation" role="navigation" itemtype="https://schema.org/SiteNavigationElement" itemscope="" aria-label="Main Menu"><?php
			wp_nav_menu( array(
				//'container'      	=> 'menu',
				'items_wrap'    	=> '<menu id="%1$s" class="%2$s">%3$s</menu>',
				'theme_location' 	=> 'header-menu',
				'menu_class' 		=> 'nav-menu',
				'link_before' 		=> '<span class="menu-name">',
				'link_after'		=> '</span></a><span class="sub-menu-toggler"></span>' ) ); ?>
		</nav>
		<div class="menu-close-toggler"></div>
	</div>
</div>

<?php /*
<div class="main-header__menu">
	<div class="menu">
		<?php // Use <button> for mobile menu toggles bcz of issues on iOS stupid browsers. ?>
		<button id="mobile-menu-toggler" class="menu__toggle mt-style"><span><span></span></span></button>				
		<div class="menu-tiers">
			<div class="main-menu-tier">
				<nav id="site-navigation" class="menu__main-navigation" role="navigation" itemtype="https://schema.org/SiteNavigationElement" itemscope="" aria-label="Main Menu"><?php
					wp_nav_menu( array(
						//'container'      	=> 'menu',
						'items_wrap'    	=> '<menu id="%1$s" class="%2$s">%3$s</menu>',
						'theme_location' 	=> 'header-menu',
						'menu_class' 		=> 'nav-menu',
						'link_before' 		=> '<span class="menu-name">',
						'link_after'		=> '</span></a><span class="sub-menu-toggler"></span>',
						)); ?>
				</nav>
				<?php get_template_part('template-parts/header','btns'); ?>
			</div>
			<div class="serv-menu-tier">
				<?php //echo do_shortcode('[do_widget id=nav_menu-2 title=false]');?>
				<nav id="site-navigation-2" class="menu__main-navigation services" role="navigation" itemtype="https://schema.org/SiteNavigationElement" itemscope="" aria-label="Main Menu"><?php
					wp_nav_menu( array(
						//'container'      	=> 'menu',
						'items_wrap'    	=> '<menu id="%1$s" class="%2$s">%3$s</menu>',
						'theme_location' 	=> 'header-menu-services',
						'menu_class' 		=> 'nav-menu',
						'link_before' 		=> '<span class="menu-name">',
						'link_after'		=> '</span></a><span class="sub-menu-toggler"></span>',
						//this Walker one for dropdown layout change
						'walker'         	=> new Column_Image_Submenu_Walker(),
						'depth'          	=> 0, // Limit to top-level + first-level children
						// end Walker
						)); ?>
				</nav>
			</div>
			<div class="main-header__buttons-wrapper mobile">
				<span class="buttonme white">
					<?php echo do_shortcode('[get_theme_option option_name=site_contact_phone use_icon=TRUE  icon_id=icon-phone icon_w=12px icon_h=12px]'); ?>
				</span>
				<span class="find-location-link">
					<a href="<?php
					// Location page ID
					echo get_the_permalink(138);?>"><span class="menu__title">Find a Location</span></a>
				</span>
			</div>
		</div>
		<div class="menu-close-toggler"></div>
	</div>
</div>
*/ ?>