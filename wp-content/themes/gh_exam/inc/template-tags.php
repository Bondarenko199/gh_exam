<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package gh_exam
 */

if ( ! function_exists( 'gh_exam_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function gh_exam_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		$posted_on = sprintf(
			esc_html_x( '%s', 'post date', 'gh_exam' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			esc_html_x( 'by %s', 'post author', 'gh_exam' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"></span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'gh_exam_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function gh_exam_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'gh_exam' ) );
			if ( $categories_list && gh_exam_categorized_blog() ) {
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'gh_exam' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'gh_exam' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'gh_exam' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			/* translators: %s: post title */
			comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'gh_exam' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
			echo '</span>';
		}

		edit_post_link(
			sprintf(
			/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'gh_exam' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function gh_exam_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'gh_exam_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'gh_exam_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so gh_exam_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so gh_exam_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in gh_exam_categorized_blog.
 */
function gh_exam_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'gh_exam_categories' );
}

add_action( 'edit_category', 'gh_exam_category_transient_flusher' );
add_action( 'save_post', 'gh_exam_category_transient_flusher' );


/**
 * Custom buttons for sections
 **/
if ( ! function_exists( 'custom_button' ) ) :

	function custom_button( $links = array( 'custom_link', 'dropdown_link', 'button_text' ) ) {

		$custom_link   = get_theme_mod( $links['custom_link'] );
		$dropdown_link = get_page_link( intval( get_theme_mod( $links['dropdown_link'] ) ) );
		$button_text   = get_theme_mod( $links['button_text'] );

		if ( $custom_link ) :
			printf( '<a href="' . $custom_link . '" class="main-button">' . $button_text . '</a>' );
		else :
			printf( '<a href="' . $dropdown_link . '" class="main-button">' . $button_text . '</a>' );
		endif;
	}

endif;


/**
 * Social links
 **/
if ( ! function_exists( 'custom_social' ) ) :

	function custom_social( $socials = array() ) {

		foreach ( $socials as $key => $social ) :

			$key    += 1;
			$social = array(
				'name' => sanitize_title_with_dashes( $social ),
				'link' => 'social_' . $key . '_link',
			);
			$name   = $social['name'];
			$link   = get_theme_mod( $social['link'] );
			printf(
				'<li class="' . $name . '-container">
                    <a href="' . $link . '" class="fa fa-' . $name . ' mid-tone-text color-text_hover social-button margin" aria-hidden="true"></a>
                </li>'
			);

		endforeach;
	}

endif;