jQuery(document).ready(function () {
	function progressBar() {
		jQuery('.skin-bar').inViewport(function () {
			var per = jQuery(this).attr('data-per') + '%';
			jQuery(this).animate({
				width: per
			}, 1200);
		});
	}

	function carousel() {
		jQuery('.carousel-widget').slick();
	}

	if (undefined !== window.elementorFrontend && undefined !== window.elementorFrontend.hooks) {
		window.elementorFrontend.hooks.addAction('frontend/element_ready/global', function () {

			progressBar();

			carousel();
		});
	}
});
