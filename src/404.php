<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @packageVanilla_Breeze
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Sorry! We can\'t find that page.', 'vanilla-breeze' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p>
					<a href="<?php echo get_home_url(); ?>"><?php esc_html_e( 'Return home', 'vanilla-breeze' ); ?></a>, 
					<?php 
						/* translators: this string follows 'Return home'. */
						esc_html_e( 'try one of the links below or search.', 'vanilla-breeze' );
					?>
				</p>

				<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

				<?php get_search_form(); ?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
