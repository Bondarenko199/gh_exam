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

    <section class="posts">
        <div class="container">
            <div class="section-header margin">
                <h1 class="section-header-headline margin"><?php echo get_theme_mod( 'posts_section_header_headline' ) ?></h1>
            </div>
            <div class="row" role="main">
                <div class="col-md-8 row">

					<?php
					if ( have_posts() ) :

//				if ( is_home() && ! is_front_page() ) :
						?>
                        <!--                    <header>-->
                        <!--                        <h1 class="page-title screen-reader-text">--><?php //single_post_title();
						?><!--</h1>-->
                        <!--                    </header>-->
                        <!---->
                        <!--					--><?php
//				endif;

						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'single' );

						endwhile;

//				the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
                </div>
                <div class="col-md-4">
					<?php get_sidebar() ?>
                </div>
                <div class="col-12">
					<?php echo posts_nav_link() ?>
                </div>
            </div><!-- #main -->
        </div><!-- #primary -->
    </section>

<?php
get_sidebar();
get_footer();