<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package minera
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'minera' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header-inner">
			<div class="main-header <?php echo is_shop() ? "container-fluid" : "container" ?>">
				<div class="site-branding">
					<?php minera_logo(); ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</nav><!-- #site-navigation -->
				<?php minera_shop_header(); ?>
			</div>
		</div>
		<div class="bread container">
			<?php minera_home(); ?>
		</div>
		<?php echo minera_product(); ?>
	</header><!-- #masthead -->

	<div id="form-search-product" class="form-search-fw">
		<span class="close-btn" id="close-btn"><i class="fa fa-close"></i></span>
		<div class="search-content">
			<form action="<?php echo esc_url( home_url() ); ?>">
				<input type="search" name="s" value="" class="search-product" placeholder="Hit enter to search or ESC to close">
				<input type="hidden" value="product" name="post-type">
			</form>
		</div>

	</div>

	<div id="content" class="site-content">
