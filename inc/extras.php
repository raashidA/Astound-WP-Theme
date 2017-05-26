<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Astound
 */

//=============================================================
// Function to change default excerpt
//=============================================================
if ( ! function_exists( 'Astound_excerpt' ) ) :

	function Astound_excerpt( $more ) {

		if( is_admin() ){

			return $more;

		}

	    return '&hellip;';

	}

endif;
add_filter( 'excerpt_more', 'Astound_excerpt' );

//=============================================================
// Function to change length of excerpt
//=============================================================
if ( ! function_exists( 'Astound_excerpt_length' ) ) :

	function Astound_excerpt_length( $length ) {

		if( is_admin() ){

			return $length;
			
		}

		$excerpt = get_theme_mod('excerpt_length');

		$excerpt_length = (!empty( $excerpt )) ? $excerpt : 60;

	    return absint($excerpt_length);
	}

endif;

add_filter( 'excerpt_length', 'Astound_excerpt_length', 999 );

//=============================================================
// Menu Fallback function
//=============================================================

if ( !function_exists('Astound_menu_fallback') ) :

function Astound_menu_fallback(){

	echo '<ul id="menu-main-menu" class="menu">';
		echo '<li class="menu-item"><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'Astound' ). '</a></li>';
		wp_list_pages( array(
			'title_li' => '',
			'depth'    => 1,
			'number'   => 5,
		) );
		echo '</ul>';
	
}

endif;

//=============================================================
// Alter body class function
//=============================================================

function Astound_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	$sticky = Astound_get_option( 'sticky' ); 

	if( 1 != $sticky ){
		$classes[] = 'sticky-top';
	}
   	
	return $classes;
}

add_filter( 'body_class', 'Astound_body_classes' );

//=============================================================
// Pingback function
//=============================================================
function Astound_pingback_header() {

	if ( is_singular() && pings_open() ) {

		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';

	}
	
}

add_action( 'wp_head', 'Astound_pingback_header' );

if ( ! function_exists( 'Astound_footer_goto_top' ) ) :

	/**
	 * Add Go to top.
	 *
	 * @since 1.0.0
	 */
	function Astound_footer_goto_top() {

		$enable_scrollup = Astound_get_option( 'enable_scrollup' ); 

		if( 1 != $enable_scrollup ){

			echo '<a href="#page" class="scrollup" id="btn-scrollup"><i class="fa fa-angle-up"></i></a>';

		}
	}
endif;
add_action( 'wp_footer', 'Astound_footer_goto_top' );

//=============================================================
// Sidebar assigning hook of the theme
//=============================================================
if ( ! function_exists( 'Astound_sidebar_action' ) ) :

	/**
	 * Add sidebar.
	 *
	 * @since 1.0.0
	 */
	function Astound_sidebar_action() {

		$global_layout = Astound_get_option( 'global_layout' );
		$global_layout = apply_filters( 'Astound_filter_theme_global_layout', $global_layout );

		// Include sidebar.
		if ( 'no-sidebar' !== $global_layout ) {
			get_sidebar();
		}

	}
endif;

add_action( 'Astound_sidebar', 'Astound_sidebar_action' );
