<?php
/**
 * Dynamic Options hook.
 *
 * This file contains option values from customizer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astound
 */

if ( ! function_exists( 'Astound_dynamic_options' ) ) :

    function Astound_dynamic_options(){

    $body_color                 =  Astound_get_option( 'body_color' );
    $site_title_color           =  Astound_get_option( 'site_title_color' );
    $site_description_color     =  Astound_get_option( 'site_description_color' );
    $button_color               =  Astound_get_option( 'button_color' );
    $scrollup_color             =  Astound_get_option( 'scrollup_color' );
    $headings_color             =  Astound_get_option( 'headings_color' );
    $meta_color                 =  Astound_get_option( 'meta_color' );
    $anchor_color               =  Astound_get_option( 'anchor_color' );
    $header_bg_color            =  Astound_get_option( 'header_bg_color' );
    $menu_color                 =  Astound_get_option( 'menu_color' );
    $menu_hover_color           =  Astound_get_option( 'menu_hover_color' );
    $footer_bg_color            =  Astound_get_option( 'footer_bg_color' );
    $footer_text_color          =  Astound_get_option( 'footer_text_color' );


    $bg_color                   = get_background_color();
    ?>               
    <style>
        body{
            color: <?php echo esc_attr( $body_color ); ?>;
        }

        .site-title a{
            color: <?php echo esc_attr( $site_title_color ); ?>;
        }

        .site-description{
            color: <?php echo esc_attr( $site_description_color ); ?>;
        }

        h1,
        h2, 
        h3,
        h4, 
        h5,
        h6,
        .entry-header h2.entry-title a{
            color: <?php echo esc_attr( $headings_color ); ?>;
        }

        #primary .cat-links a{
            color: <?php echo esc_attr( $meta_color ); ?>;
        }

        .content-area a{
            color: <?php echo esc_attr( $anchor_color ); ?>;
        }

        header#masthead{
            background: <?php echo esc_attr( $header_bg_color ); ?>;
        }

        .main-navigation ul li a{
            color: <?php echo esc_attr( $menu_color ); ?>;
        }

        #masthead .main-navigation li.current-menu-item a,
        .main-navigation ul.menu li:hover a{
            color: <?php echo esc_attr( $menu_hover_color ); ?>;
        }
    
        .widget .widget-title{
            background: #<?php echo esc_attr( $bg_color ); ?>;
        }

        .site-footer,
        .footer-social .menu-social-menu-container #menu-social-menu{
            background: <?php echo esc_attr( $footer_bg_color ); ?>;
        }
        .site-info,
        .site-info a{
            color: <?php echo esc_attr( $footer_text_color ); ?>;
        }

        button, 
        input[type="button"], 
        input[type="reset"], 
        input[type="submit"], 
        .nav-links .nav-previous a, 
        .nav-links .nav-next a,
        .nav-links .page-numbers,
        .pagination .page-numbers.next, 
        .pagination .page-numbers.previous{
            border: 1px solid <?php echo esc_attr( $button_color ); ?>;
            background: <?php echo esc_attr( $button_color ); ?>;
        }

        .scrollup {
            background-color: <?php echo esc_attr( $scrollup_color ); ?>;
        }

    </style>

<?php }

endif;

add_action( 'wp_head', 'Astound_dynamic_options' );