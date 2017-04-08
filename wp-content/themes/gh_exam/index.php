<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gh_exam
 */

get_header(); ?>

    <section class="blog-header tone">
        <div class="container">
            <div class="section-header margin">
                <h1 class="section-header-headline margin light-text page-headline"><?php echo get_theme_mod( 'blog_page_header' ) ?></h1>
            </div>
        </div>
    </section>
    <section class="posts">
        <div class="container">
            <div class="row justify-content-center" role="main">
                <ul class="col-md-8 row">

					<?php
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile;

//				the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
                </ul>
                <div class="col-md-4 widgets-container">
					<?php get_sidebar() ?>
                </div>
                <div class="col-12 text-center">
					<?php the_posts_pagination(array(
						'prev_next'    => false,
						'screen_reader_text' => ' ',
                    )) ?>
                </div>
            </div><!-- #main -->
        </div><!-- #primary -->
    </section>

<?php
get_sidebar();
get_footer();
