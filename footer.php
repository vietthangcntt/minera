<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package minera
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row">
				<div class="footer-top">
					<div class="footer-bonus col-md-5">
						<?php echo get_theme_mod( 'coupon' ) ?>
					</div><!-- .site-info -->
					<div class="footer-subrice col-md-7">
						<?php echo do_shortcode( get_theme_mod( 'subcribe' ) ); ?>
					</div>
				</div>

				<div class="footer-bottom">
					<div class="footer-logo col-md-4">
						<?php minera_logo(); ?>
					</div>
					<div class="footer-menu col-md-4">
						<?php echo get_theme_mod( 'menu_footer' ); ?>
					</div>
					<div class="footer-social col-md-4">
						<?php echo get_theme_mod( 'contact' ); ?>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
