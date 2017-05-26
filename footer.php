<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astound
 */

	/**
	 * Hook - Astound_after_content.
	 *
	 * @hooked Astound_after_content_action - 10
	 */
	do_action( 'Astound_after_content' );

?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php 

		/**
		* Hook - Astound_footer_widgets.
		*
		* @hooked Astound_footer_widgets_action - 10
		*/
		do_action( 'Astound_footer_widgets' );

		/**
		* Hook - Astound_social_menu.
		*
		* @hooked Astound_social_menu_action - 10
		*/
		do_action( 'Astound_social_menu' );
		
		/**
		* Hook - Astound_before_footer_info.
		*
		* @hooked Astound_before_footer_info_action - 10
		*/
		do_action( 'Astound_before_footer_info' );

		/**
		* Hook - Astound_copyright.
		*
		* @hooked Astound_copyright_action - 10
		*/
		do_action( 'Astound_copyright' );

		/**
		* Hook - Astound_credit.
		*
		* @hooked Astound_credit_action - 10
		*/
		do_action( 'Astound_credit' );

		/**
		* Hook - Astound_after_footer_info.
		*
		* @hooked Astound_after_footer_info_action - 10
		*/
		do_action( 'Astound_after_footer_info' );
		?>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>