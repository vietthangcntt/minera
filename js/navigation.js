/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function( $ ) {




	var pull = $( '.menu-toggle' );
	var menu = $( '#primary-menu' );
	$(pull).on( 'click' , function(){
		menu.slideToggle();
		$('li.menu-item-has-children>a').on('click',function(event){

			event.preventDefault()

			$(this).parent().find('ul').first().toggle();
			$(this).parent().find('ul').first().addClass('style');
			// $(this).parent().find('ul').first().css({ "postion": "static", "width": "100%", "box-shadow": "none" });


			$(this).parent().siblings().find('ul').hide();

		//Hide menu when clicked outside
			$(this).parent().find('ul').mouseleave(function(){  
				var thisUI = $(this);
				$('html').click(function(){
					thisUI.hide();
					$('html').unbind('click');
				});
			});
		} );

		var w = $(window).width();
		$(window).resize( function() {
			if (w>990 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		} );

	});

		var w = $(window).width();
		$(window).resize( function() {
			if (w>990 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		} );
} )(jQuery);