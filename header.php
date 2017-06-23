<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class('loading'); ?>>
	<div id="wrapper" class="hfeed">
		<header id="header" role="banner">
			<section id="branding">
				<div id="site-title">
					<?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; } ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home">
						<?php 
							$theme_uri = get_template_directory_uri();
							echo file_get_contents( $theme_uri. "/theme_assets/CWN_logo.svg"); 
						?>
					</a>
					<?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } ?></div>
				<div id="site-description"><?php bloginfo( 'description' ); ?></div>
			</section>
			<div class="mobile-nav-toggle">
				<div class="navTrigger">
				  <i></i><i></i><i></i>
				</div>
			</div>	
			<nav id="menu" role="navigation">							
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
				<div id="search">
					<?php get_search_form(); ?>
				</div>
			</nav>
		</header>
		<div id="container">