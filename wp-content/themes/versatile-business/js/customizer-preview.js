/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		});
	});
	
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		});
	});

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				});
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				});
				$( '.site-title a, .site-description' ).css( {
					'color': to
				});
			}
		});
	});

	// Site Layout.
	wp.customize( 'versatile_business_layout_type', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).removeClass( 'boxed-layout fluid-layout' );

			$( 'body' ).addClass( to + '-layout' );
		});
	});
	
})( jQuery );
