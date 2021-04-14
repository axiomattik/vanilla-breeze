<?php
/**
 * Template part for post excerpts.
 *
 * @package Vanilla_Breeze
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				vnbt_posted_on();
				vnbt_posted_by();
				vnbt_category_tags()
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php vnbt_post_thumbnail(); ?>

	<div class="entry-excerpt">
		<?php
		if ( is_singular() ) {
			the_content();
		} else {
			the_excerpt();
		}
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vanilla-breeze' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-excerpt-->

	<footer class="entry-footer">
		<?php vnbt_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
