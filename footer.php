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
		<div class="site-info">
			<div class="footer-sup container">
				<?php 	
					if(is_active_sidebar('footer-sidebar')){
						dynamic_sidebar('footer-sidebar');
					}
					else{
						_e('No Sidebar');
					} 
				?>
			</div>
		</div><!-- .site-info -->
		<div class="site-inter">
			<div class="footer-sub container">
				<?php the_custom_logo(); ?>

				<?php 	
					if(is_active_sidebar('footer-sidebar-2')){
						dynamic_sidebar('footer-sidebar-2');
					}
					else{
						_e('No Sidebar');
					} 
				?>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
