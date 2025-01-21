<div class="h-h">
<header id="masthead" role="banner" class="hs-style" style="display:none">
	<div class="container-fluid">
		<div class="row">
			<div class="col align-self-center header-logo">
				<div class="main-nav-wrapper">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo-link" rel="home">
						<img src="<?php bloginfo('template_url')?>/images/logo.png" alt=""/>
					</a>
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<div class="menu-holder">
							<h3 class="menu-toggle"><span></span></h3>
							<div class="menu-logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<img src="<?php bloginfo('template_url')?>/images/logo.png" alt=""/>
								</a>
							</div>
							<?php
								wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'nav-menu', 'link_before' => '<span class="menu-name">','link_after'=>'</span></a><span class="sub-menu-toggler"></span>' ) );
							?>
							<div class="mob-header-social">
							<?php echo do_shortcode('[do_widget id=nav_menu-5 title=false]'); ?>
							</div>
						</div>
						<div class="menu-close-toggler"></div>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>
</div>