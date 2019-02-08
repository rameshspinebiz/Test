/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title ' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title , .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title , .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title , .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	//footer text area
	wp.customize('wp_store_footer_setting_footer_copyright_text',function(value){
		value.bind(function(to){
			$('.footer-copyright .copyright-text').text(to);			
		});
	});

	//ticker
	wp.customize('wp_store_header_setting_ticker_title',function(value){
		value.bind(function(to){
			$('.ticker-title').text(to);			
		});
	});

	wp.customize( 'wp_store_header_setting_search_placeholder', function( value ) {
		value.bind( function( to ) {
			$('.search-field').attr('placeholder',to);
		} );
	} );


	//cta title
	wp.customize('wp_store_homepage_setting_cta_title',function(value){
		value.bind(function(to){
			$('.cta-content h2').text(to);			
		});
	});

	//cta description
	wp.customize('wp_store_homepage_setting_cta_desc',function(value){
		value.bind(function(to){
			$('.cta-content p').text(to);			
		});
	});

	//cta subtitle
	wp.customize('wp_store_homepage_setting_cta_readmore',function(value){
		value.bind(function(to){
			$('.cta-content a').text(to);			
		});
	});

	//blog title
	wp.customize('wp_store_homepage_setting_blog_title',function(value){
		value.bind(function(to){
			$('#blog-section h3 span').text(to);			
		});
	});

	//blog title
	wp.customize('wp_store_homepage_setting_brand_title',function(value){
		value.bind(function(to){
			$('#brand-section h3 span').text(to);			
		});
	});

} )( jQuery );
