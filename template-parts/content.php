<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astound
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
	if ( !is_single() && has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) { ?>
		<div class="entry-img">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-way-common'); ?></a>
       </div>
       <?php
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

		<div class="entry-content">
			<?php
				$post_content = get_theme_mod('format','post-excerpt');

				if( is_single() || 'full-post' === $post_content ){

					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'blog-way' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blog-way' ),
						'after'  => '</div>',
					) );

				} else{

					the_excerpt(); ?>

					<a href="<?php the_permalink(); ?>" class="btn-continue"><?php echo esc_html__( 'Continue Reading', 'blog-way' ); ?><span class="arrow-continue">&rarr;</span></a>

					<?php
				}
				
			?>
		</div><!-- .entry-content -->
	</div>

</article><!-- #post-## -->
