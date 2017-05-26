<?php
/**
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Astound
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses Astound_header_style()
 */
function Astound_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'Astound_custom_header_args', array(
		'default-image'          => '',
		'width'                  => 1920,
		'height'                 => 410,
		'flex-height'            => true,
		'header-text'   		 => false,
	) ) );
}
add_action( 'after_setup_theme', 'Astound_custom_header_setup' );