<?php
/*
 Template Name: my-account
 */
 ?>
 <?php get_header(); ?>
 	<div class="my-account">
 		<div class="container">
			<div class="login">
				<h2 class="title-login"><?php echo esc_html('Login' , 'minera' ); ?> </h2>
				<div class="descrip">
					<p class="descrip-login"><?php echo esc_html('Log in to your account to explore all our products and shop more convenient.' , 'minera'); ?> </p>
					<?php echo do_shortcode( '[contact-form-7 id="46" title="login"]' ); ?> 
				</div>
			</div>
			<div class="register">
				<h2 class="title-restiger"><?php echo esc_html('Register' , 'minera'); ?> </h2>
				<p class="descrip-restiger"><?php echo esc_html('If you don’t have an account. Register now!' , 'minera'); ?> </p>
				<?php echo do_shortcode( '[contact-form-7 id="47" title="register"]' ); ?> 
			</div>
 		</div>
	</div>
 <?php get_footer(); ?>