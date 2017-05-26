<?php
/**
 * Core functions.
 *
 * @package Astound
 */

if ( ! function_exists( 'Astound_get_option' ) ) :

	/**
	 * Get theme option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function Astound_get_option( $key ) {

		if ( empty( $key ) ) {
			return;
		}

		$value = '';

		$default = Astound_get_default_theme_options();

		$default_value = null;

		if ( is_array( $default ) && isset( $default[ $key ] ) ) {
			$default_value = $default[ $key ];
		}

		if ( null !== $default_value ) {
			$value = get_theme_mod( $key, $default_value );
		}
		else {
			$value = get_theme_mod( $key );
		}

		return $value;

	}

endif;

if ( ! function_exists( 'Astound_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function Astound_get_default_theme_options() {

		$defaults = array();

		//Header
		$defaults['sticky'] 				= 0;

		// colors
		$defaults['body_color'] 			= '#404040';
		$defaults['site_title_color'] 		= '#222222';
		$defaults['site_description_color'] = '#818181';
		$defaults['button_color']			= '#202020';
		$defaults['scrollup_color']			= '#ea9920';
		$defaults['header_bg_color'] 		= '#202020';
		$defaults['menu_color'] 			= '#ffffff';
		$defaults['menu_hover_color'] 		= '#afafaf';
		$defaults['headings_color'] 		= '#404040';
		$defaults['meta_color'] 		    = '#ea9920';
		$defaults['anchor_color'] 		    = '#ea9920';
		$defaults['footer_bg_color'] 		= '#202020';
		$defaults['footer_text_color'] 	    = '#787878';

		$defaults['reset_colors']           = false;

		// Blog
		$defaults['global_layout']  		= 'right-sidebar';
		$defaults['excerpt_length'] 		= 60;

		// Footer.
		$defaults['copyright'] 				= esc_html__( 'Copyright &copy; All rights reserved.', 'Astound' );

		//Scroll Up
		$defaults['enable_scrollup'] 		= 0;

		return $defaults;
	}

endif;

//=============================================================
// Get all options in array
//=============================================================
if ( ! function_exists( 'Astound_get_options' ) ) :

    /**
     * Get all theme options in array.
     *
     * @since 1.0.0
     *
     * @return array Theme options.
     */
    function Astound_get_options() {

        $value = array();

        $value = get_theme_mods();

        return $value;

    }

endif;

//=============================================================
// Get only color options in array
//=============================================================
if ( ! function_exists( 'Astound_get_default_color_options' ) ) :

    /**
     * Get default color options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function Astound_get_default_color_options() {

        $defaults = array();

        $defaults['background_color']       = 'ffffff';
        $defaults['body_color'] 			= '#404040';
		$defaults['site_title_color'] 		= '#222222';
		$defaults['site_description_color'] = '#818181';
		$defaults['button_color']			= '#202020';
		$defaults['scrollup_color']			= '#ea9920';
		$defaults['header_bg_color'] 		= '#202020';
		$defaults['menu_color'] 			= '#ffffff';
		$defaults['menu_hover_color'] 		= '#afafaf';
		$defaults['headings_color'] 		= '#404040';
		$defaults['meta_color'] 		    = '#ea9920';
		$defaults['anchor_color'] 		    = '#ea9920';
		$defaults['footer_bg_color'] 		= '#202020';
		$defaults['footer_text_color'] 	    = '#787878';

        $defaults['reset_colors']           = false;

        return $defaults;
    }

endif;

//=============================================================
// Color reset
//=============================================================
if ( ! function_exists( 'Astound_reset_colors' ) ) :

    function Astound_reset_colors( $data ) {

            $reset_colors = Astound_get_option( 'reset_colors' );

            if ( true == $reset_colors ) {

                $options = Astound_get_options();

                $options['reset_colors'] 		= false;

                $color_settings = Astound_get_default_color_options();

                if ( ! empty( $color_settings ) ) {

                    foreach ( $color_settings as $key => $val ) {

                        $options[ $key ] = $val;

                    }
                }

                update_option( 'theme_mods_Astound', $options );

            }

    }

endif;

add_action( 'customize_save_after', 'Astound_reset_colors' );
