<?php

/* Template Name: Home */

get_header(); ?>

<section class="intro">
    <div class="container">
        <div class="owl-carousel owl-theme" id="owl">
			<?php
			$args = array(
				'post_type' => 'slide'
			);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) :?>
				<?php while ( $the_query->have_posts() ) : ?>
                    <div>
						<?php $the_query->the_post(); ?>
                        <div class="row d-flex flex-column">
                            <h2 class="light-text col-md-6 slider-header margin"><?php the_title(); ?></h2>
                            <div class="light-text col-md-6 slider-text margin"><?php the_excerpt(); ?></div>
                        </div>
                        <a href="<?php the_permalink() ?>" class="main-button">Read more</a>
                    </div>
				<?php endwhile; ?>
			<?php endif;
			wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<section class="welcome">
    <div class="container">
        <div class="welcome-section-img">
            <?php echo get_theme_mod('section_2_image' ) ?>
        </div>
        <div class="col-md-6 section-header margin">
            <h2 class="section-header-headline margin"><?php echo get_theme_mod( 'section_2_header_headline' ) ?></h2>
            <span class="section-header-text margin"><?php echo get_theme_mod( 'section_2_header_text' ) ?></span>
        </div>
    </div>
</section>
<section class="">
    <div class="container">
        <div class="section-header margin">
            <h2 class="section-header-headline margin"><?php echo get_theme_mod( 'section_3_header_headline' ) ?></h2>
            <span class="section-header-text margin"><?php echo get_theme_mod( 'section_3_header_text' ) ?></span>
        </div>
    </div>
</section>
<section class="">
    <div class="container">
        <div class="section-header margin">
            <h2 class="section-header-headline margin"><?php echo get_theme_mod( 'section_4_header_headline' ) ?></h2>
            <span class="section-header-text margin"><?php echo get_theme_mod( 'section_4_header_text' ) ?></span>
        </div>
    </div>
</section>


<ul class="d-flex social-list">
	<?php custom_social( array(
		get_theme_mod( 'social_1' ),
		get_theme_mod( 'social_2' ),
		get_theme_mod( 'social_3' ),
		get_theme_mod( 'social_4' ),
	) ) ?>
</ul>


<?php get_footer() ?>
