<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package s_bootstrap
 */

?>

<article  class="card mb-4" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header card-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					s_bootstrap_posted_on();
					//s_bootstrap_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header card-header -->

		<div class="card-body">
			<?php s_bootstrap_post_thumbnail(); ?>
			<div class="entry-content">
				<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 's_bootstrap' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 's_bootstrap' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->
		</div><!-- .card-body -->

		<footer class="entry-footer card-footer">
			<?php s_bootstrap_entry_footer(); ?>
		</footer><!-- .entry-footer card-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
