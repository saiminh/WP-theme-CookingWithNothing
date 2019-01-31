<!DOCTYPE html>
<html lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<?php wp_head(); ?>
</head>
<body>
	<div id="wrapper" class="hfeed">
		<header id="header" role="banner">
			<section id="branding">
				<div id="site-title">
					<?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; } ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home">
						<?php get_template_part( 'theme_assets/inline', 'CWN_logo.svg' );
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
		<div id="container" <?php body_class("barba-container"); ?>>