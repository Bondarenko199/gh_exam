<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gh_exam
 */

?>
<li class="col-md-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
			<?php

			if ( has_post_thumbnail() ) :
				the_post_thumbnail( 'post-thumbnail', array(
					'class' => 'img-responsive',
				) );
			endif;
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>


        </header><!-- .entry-header -->

        <div class="entry-content">
			<?php
			the_excerpt( sprintf(
			/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'gh_exam' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gh_exam' ),
				'after'  => '</div>',
			) );
			?>

			<?php if ( ! is_single() ) : ?>
                <a href="<?php the_permalink() ?>" class="main-button dark-text fa fa-arrow-right fa-2x"><?php echo get_theme_mod( 'post_button_text' ) ?></a>
			<?php endif; ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
	        <?php if ( 'post' === get_post_type() ) : ?>
                <div class="entry-meta">
			        <?php gh_exam_posted_on(); ?>
                </div><!-- .entry-meta -->
		        <?php
	        endif; ?>
        </footer><!-- .entry-footer -->
    </article><!-- #post-## -->
</li>
