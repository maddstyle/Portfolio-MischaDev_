<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MischaDev_Underscores
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- <?php wp_body_open(); ?> -->

	<div class="header-section full">
		<div class="wrap">
			<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'mischadev-underscores'); ?></a>

			<header id="masthead" class="site-header inner">
				<div class="site-branding">
					<?php
					the_custom_logo();
					if (is_front_page() && is_home()) :
					?>
						<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
					<?php
					else :
					?>
						<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
					<?php
					endif;
					$mischadev_underscores_description = get_bloginfo('description', 'display');
					if ($mischadev_underscores_description || is_customize_preview()) :
					?>
						<p class="site-description"><?php echo $mischadev_underscores_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
																				?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'mischadev-underscores'); ?></button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</header><!-- #masthead -->
			<?php
			if (is_front_page()) : ?>
				<div class="hero">
					<h1 class="hero-heading">Conversion Based<br>Digital Strategy</h1>
					<p class="hero-paragraph">for small businesses</p>
					<a class="button" href="#">Learn More</a>
					<div></div>
				</div>
			<?php else : ?>
			<?php endif ?>
		</div>
	</div>

	<div class="main-content-section full">
		<div class="wrap">
			<div id="content" class="site-content inner">