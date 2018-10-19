<?php get_header(); ?>
	<div class="<?php echo ! is_shop() ? 'container' : 'container-fluid'; ?>">
		<div id="main">
			<div id="content" class="woocommerce-content">
				<?php woocommerce_content(); ?>
			</div>
		</div>
	</div>
<?php 
	get_footer();
?>