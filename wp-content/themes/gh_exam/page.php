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
                <h1 class="section-header-headline margin light-text page-headline"><?php single_post_title() ?></h1>
            </div>
        </div>
    </section>
    <section class="posts">
        <div class="container">
            <div class="row justify-content-center" role="main">
                <ul class="col-md-8 row">
                    <p class="text-uppercase dark-text no-content"><?php _e('No content', 'gh_exam') ?></p>
                </ul>
                <div class="col-md-4 widgets-container">
					<?php get_sidebar() ?>
                </div>
            </div><!-- #main -->
        </div><!-- #primary -->
    </section>

<?php
get_sidebar();
get_footer();
