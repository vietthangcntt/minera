jQuery( document ).ready( function() {
    jQuery( '.skin-bar' ).inViewport( function() {
        var per = jQuery( this ).attr( 'data-per' ) + '%';
        jQuery( this ).animate( {
            width: per
        }, 1200 );
    } );
} );