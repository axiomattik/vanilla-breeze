<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @packageVanilla_Breeze
 */

if ( ! function_exists( 'vnbt_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function vnbt_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$svg_url = get_template_directory_uri() . "/assets/calendar.svg";
		?>
		<div>
			<img class="meta-icon" src="<?php echo $svg_url; ?>">
			<span class="posted-on">
				<a href="<?php echo esc_url( get_permalink() ); ?>">
					<?php echo $time_string; ?>
				</a>
			</span>
		</div>
		<?php
	}
endif;

if ( ! function_exists( 'vnbt_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function vnbt_posted_by() {
		$svg_url = get_template_directory_uri() . "/assets/user.svg";
		$author = esc_html( get_the_author() );
		$author_url = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
		?>
		<div>
			<img class="meta-icon" src="<?php echo $svg_url; ?>">
			<span class="posted-by">
				<a href="<?php echo $author_url ?>">
					<?php echo $author; ?>
				</a>
			</span>
		</div>
		<?php
	}
endif;


if ( ! function_exists( 'vnbt_category_tags' ) ) {

	function vnbt_category_tags() {

		// Hide category and tag text for pages.
		if ( 'post' !== get_post_type() ) {
			return;
		}
		/* translators: used between list items, space before and after separator*/
		$categories_list = get_the_category_list( esc_html__( ' • ', 'vanilla-breeze' ) );
		if ( $categories_list ) {
			$categories_icon_url = get_template_directory_uri() . '/assets/folder.svg';
			?>
			<div>
				<img class="meta-icon" src="<?php echo $categories_icon_url; ?>">
				<span class="cat-links"><?php echo $categories_list; ?></span>
			</div>
			<?php
		}


		/* translators: used between list items, space before and after separator*/
		$tags_list = get_the_tag_list( '', esc_html_x( ' • ', 'list item separator', 'vanilla-breeze' ) );
		if ( $tags_list ) {
			$tags_icon_url = get_template_directory_uri() . '/assets/tag.svg';
			?>
			<div class="break"></div>
			<div>
				<img class="meta-icon" src="<?php echo $tags_icon_url; ?>">
				<span class="tags-links"><?php echo $tags_list; ?></span>
			</div>
			<?php
		}

	}
}

if ( ! function_exists( 'vnbt_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function vnbt_entry_footer() {

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			$comment_icon_url = get_template_directory_uri() . '/assets/comment.svg';
			?>
			<div>
				<img class="meta-icon" src="<?php echo $comment_icon_url; ?>">
				<span class="comments-link">
					<?php comments_popup_link(
						__( 'Leave a Comment', 'vanilla-breeze' ),
						__( '1 Comment', 'vanilla-breeze' ),
						__( 'Read Comments', 'vanilla-breeze' ) );
					?>
				</span>
			</div>

			<?php
		}

		if ( current_user_can( 'edit_posts' ) ) {
			$edit_icon_url = get_template_directory_uri() . '/assets/edit.svg';
			?>
			<div class="break"></div>
			<div>
				<img class="meta-icon" src="<?php echo $edit_icon_url; ?>">
				<span class="edit-link">
					<?php edit_post_link( __( 'Edit', 'vanilla-breeze' ) ); ?>
				</span>
			</div>
			<?php
		}
	}
endif;

if ( ! function_exists( 'vnbt_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function vnbt_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
