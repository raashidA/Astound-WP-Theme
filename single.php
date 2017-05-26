<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astound
 */

get_header(); 

	/**
	 * Hook - Astound_before_primary.
	 *
	 * @hooked Astound_before_primary_action - 10
	 */
	do_action( 'Astound_before_primary' );
?>

	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', get_post_format() );

		the_post_navigation();

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; ?>

<?php
	/**
	 * Hook - Astound_after_primary.
	 *
	 * @hooked Astound_after_primary_action - 10
	 */
	do_action( 'Astound_after_primary' );

	/**
	 * Hook - Astound_sidebar.
	 *
	 * @hooked Astound_sidebar_action - 10
	 */
	do_action( 'Astound_sidebar' );

get_footer();