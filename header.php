<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astound
 */

?>
<?php
	/**
	 * Hook - Astound_doctype.
	 *
	 * @hooked Astound_doctype_action - 10
	 */
	do_action( 'Astound_doctype' );
?>
<head>
<?php
	/**
	 * Hook - Astound_head.
	 *
	 * @hooked Astound_head_action - 10
	 */
	do_action( 'Astound_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<?php
		/**
		* Hook - Astound_before_header.
		*
		* @hooked Astound_before_header_action - 10
		*/
		do_action( 'Astound_before_header' );

		/**
		* Hook - Astound_header.
		*
		* @hooked Astound_header_action - 10
		*/
		do_action( 'Astound_header' );

		/**
		* Hook - Astound_after_header.
		*
		* @hooked Astound_after_header_action - 10
		*/
		do_action( 'Astound_after_header' );

		/**
		* Hook - Astound_site_branding.
		*
		* @hooked Astound_site_branding_action - 10
		*/
		do_action( 'Astound_site_branding' );

		/**
		* Hook - Astound_before_content.
		*
		* @hooked Astound_before_content_action - 10
		*/
		do_action( 'Astound_before_content' );