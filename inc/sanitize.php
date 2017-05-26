<?php
/**
 * Sanitization functions.
 *
 * @package Astound
 */

//=============================================================
// Select/radio santitization
//=============================================================
if ( ! function_exists( 'Astound_sanitize_select' ) ) :

	function Astound_sanitize_select( $input, $setting ) {
	  
		// Ensure input is clean.
		$input = sanitize_text_field( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

endif;

//=============================================================
// Checkbox santitization
//=============================================================
if ( ! function_exists( 'Astound_sanitize_checkbox' ) ) :

	function Astound_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true === $checked ) ? true : false );
	}

endif;

//=============================================================
// Positive santitization
//=============================================================
if ( ! function_exists( 'Astound_sanitize_positive_integer' ) ) :

	/**
	 * Sanitize positive integer.
	 *
	 * @since 1.0.0
	 *
	 * @param int                  $input Number to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return int Sanitized number; otherwise, the setting default.
	 */
	function Astound_sanitize_positive_integer( $input, $setting ) {

		$input = absint( $input );

		// If the input is an absolute integer, return it.
		// otherwise, return the default.
		return ( $input ? $input : $setting->default );

	}

endif;