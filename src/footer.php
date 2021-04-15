<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Vanilla_Breeze
 */

?>

	</div><!-- .site-body -->
	<footer id="colophon" class="site-footer">

		<div class="site-footer-top">
			<div></div>
			<div></div>
			<div></div>
		</div>

		<div class="site-info site-footer-bottom">

			<div>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'vanilla-breeze' ), 'vanilla-breeze', '<a href="https://pocketgecko.co.uk/axiomattik">axiomattik</a>' );
				?>
			</div>

			<div>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'vanilla-breeze' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'vanilla-breeze' ), 'WordPress' );
					?>
				</a>
			</div>

			<div>
				<?php
				printf( esc_html( 'Copyright © %1$s %2$s', 'vanilla-breeze' ), date("Y"), get_bloginfo( 'name' ) );
				?>
			</div>

		</div><!-- .site-info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
