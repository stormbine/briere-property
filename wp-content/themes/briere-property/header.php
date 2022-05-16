<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?php wp_title('|', true, 'right'); ?></title>

		<link rel="icon" href="<?php echo site_url(); ?>/favicon.ico" type="image/x-icon" />

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">

		<?php wp_head(); ?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	</head>
	<body>
		<div id="page_wrap">
			<header>
				<div class="top-bar">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<ul>
									<li><a href="#" target="_blank">Tenant Login</a></li>
									<li><a href="#" target="_blank">Owner Login</a></li>
									<li><a href="#" v-on:click.prevent="showSiteModal('maintenance');">Maintenance Request</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="nav-wrap">
					<div class="container">
						<div class="row">
							<div class="col-12 col-md-4">
								<a href="<?php echo site_url(); ?>" class="main-logo"><img src="<?php print IMAGES; ?>/briere-logo.png" class="img-fluid" /></a>
							</div>
							<div class="col-12 col-md-8">
								<nav class="navbar navbar-expand-md">
									<?php
									wp_nav_menu( array(
										'theme_location'	=> 'header-menu',
										'depth'				=> 2,
										'container'			=> 'div',
										'container_class'	=> 'navbar-collapse collapse w-100',
										'container_id'		=> 'menu-wrap',
										'menu_class'		=> 'navbar-nav',
										'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
										'walker'			=> new WP_Bootstrap_Navwalker())
									);
									?>
								</nav>
							</div>
						</div>
					</div>
				</div>
				<div id="menu-launcher" class="navbtn" @click="toggleNav()" v-bind:class="[ navOpen === 1 ? 'open' : '' ]">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</header>
			
			<div id="popup-menu" class="mobile-nav" v-bind:class="[ navOpen === 1 ? 'open' : '' ]">
				<div id="menu-launcher" class="navbtn" @click="toggleNav()" v-bind:class="[ navOpen === 1 ? 'open' : '' ]">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<div class="inside">
					<div class="container">
						<div class="row">
							<div class="col-12 col-lg-2">
								<?php
								wp_nav_menu( array(
									'theme_location'	=> 'header-menu',
									'depth'				=> 2,
									'container'			=> 'div',
									'container_class'	=> '',
									'container_id'		=> 'menu-wrap',
									'menu_class'		=> 'navbar-nav',
									'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
									'walker'			=> new WP_Bootstrap_Navwalker())
								);
								?>
								<ul class="topmenu-items">
									<li><a href="#" target="_blank">Tenant Login</a></li>
									<li><a href="#" target="_blank">Owner Login</a></li>
									<li><a href="#" v-on:click.prevent="showSiteModal('maintenance');">Maintenance Request</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="fixed-navbar" v-bind:class="[ showNavbar === 1 ? 'active' : '' ]">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-4">
							<a href="<?php echo site_url(); ?>" class="main-logo"><img src="<?php print IMAGES; ?>/briere-logo.png" class="img-fluid" /></a>
						</div>
						<div class="col-12 col-md-8">
							<nav class="navbar navbar-expand-md">
								<?php
								wp_nav_menu( array(
									'theme_location'	=> 'header-menu',
									'depth'				=> 2,
									'container'			=> 'div',
									'container_class'	=> 'navbar-collapse collapse w-100',
									'container_id'		=> 'menu-wrap',
									'menu_class'		=> 'navbar-nav',
									'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
									'walker'			=> new WP_Bootstrap_Navwalker())
								);
								?>
							</nav>
						</div>
					</div>
				</div>

				<div id="menu-launcher" class="navbtn large" @click="toggleNav()" v-bind:class="[ navOpen === 1 ? 'open' : '' ]">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>

		