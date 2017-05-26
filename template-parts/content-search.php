<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astound
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
	if ( !is_single() && has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) {  
	// check if the post has a Post Thumbnail assigned to it. 
        echo '<div class="entry-img">';
            the_post_thumbnail('blog-way-common');
        echo '</div>';
    } 
	?>
	<div class="detail-wrap">
		<header class="entry-header">
			<?php
			if ( 'post' === get_post_type() ) {
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'blog-way' ) );
				if ( $categories_list && Astound_categorized_blog() ) {
					printf( '<span class="cat-links">%s</span>', $categories_list ); // WPCS: XSS OK.
				}
			}

			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	</div>
</article><!-- #post-## -->
