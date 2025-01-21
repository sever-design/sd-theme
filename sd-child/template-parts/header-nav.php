<?php 
/*
 * Header nav
 */
?>
<div class="main-header__menu">
	<div class="menu">
		<?php
		/*
		 * Use <button> for mobile menu toggles bcz of issues on iOS stupid browsers.
		 */
		?>
		<button id="mobile-menu-toggler" class="menu__toggle mt-style"><span><span></span></span></button>				
		<nav id="site-navigation" class="menu__main-navigation" role="navigation" itemtype="https://schema.org/SiteNavigationElement" itemscope="" aria-label="Main Menu"><?php
			wp_nav_menu( array(
				//'container'      	=> 'menu',
				'items_wrap'    	=> '<menu id="%1$s" class="%2$s">%3$s</menu>',
				'theme_location' 	=> 'header-menu',
				'menu_class' 		=> 'nav-menu',
				/* this Walker one for dropdown layout change */ 
				'walker'         	=> new Column_Image_Submenu_Walker(),
				'depth'          	=> 0, // Limit to top-level + first-level children
				/* end Walker */
				'link_before' 		=> '<span class="menu-name">',
				'link_after'		=> '</span></a><span class="sub-menu-toggler"></span>' ) ); ?>
		</nav>
		<div class="menu-close-toggler"></div>
	</div>
</div>