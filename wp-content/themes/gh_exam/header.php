<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gh_exam
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header id="masthead" class="site-header dark-bg" role="banner">
    <nav id="site-navigation" class="navbar navbar-toggleable-md navbar-inverse main-nav" role="navigation">
        <div class="container wrap">
            <div class="navbar-brand left">
				<?php the_custom_logo(); ?>
            </div>
            <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                    aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

			<?php wp_nav_menu( array(
				'menu_class'      => 'navbar-nav light-text',
				'theme_location'  => 'menu-header',
				'menu_id'         => 'primary-menu',
				'container_class' => 'navbar-collapse collapse justify-content-end',
				'container_id'    => 'navbarsExampleDefault'
			) ); ?>

        </div>
    </nav>
</header>
