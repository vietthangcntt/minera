jQuery( document ).ready(function() {


    if ( undefined !== window.elementorFrontend && undefined !== window.elementorFrontend.hooks ) {
        window.elementorFrontend.hooks.addAction( 'frontend/element_ready/global', function() {
             jQuery( '.skin-bar' ).inViewport( function() {
		        var per = jQuery( this ).attr( 'data-per' ) + '%';
		        jQuery( this ).animate( {
		            width: per
		        }, 1200 );
		    } );
        } );
    }
} );