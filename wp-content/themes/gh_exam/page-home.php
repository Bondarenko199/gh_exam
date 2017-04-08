<?php

/* Template Name: Home */

get_header(); ?>

<section class="intro color-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo get_theme_mod( 'section_1_image' ) ?>">
            </div>
            <div class="col-md-6">
                <h2 class="section-header-headline margin light-text"><?php echo get_theme_mod( 'section_2_header_headline' ) ?></h2>
                <p class="section-header-text margin light-text"><?php echo get_theme_mod( 'section_2_header_text' ) ?></p>
            </div>
        </div>
    </div>
</section>
<section class="welcome">
    <div class="container">
        <div class="row">
            <div class="col-md-6 welcome-section-img">
                <img src="<?php echo get_theme_mod( 'section_2_image' ) ?>">
            </div>
            <div class="col-md-6 section-header margin text-left welcome-container">
                <h2 class="section-header-headline margin mid-dark-text welcome-headline"><?php echo get_theme_mod( 'section_2_header_headline' ) ?></h2>
                <p class="section-header-text margin mid-dark-text welcome-text"><?php echo get_theme_mod( 'section_2_header_text' ) ?></p>
            </div>
        </div>
    </div>
</section>
<section class="we-are-offering dark-bg">
    <div class="container">
        <div class="section-header offer-header margin">
            <h2 class="section-header-headline margin light-text"><?php echo get_theme_mod( 'section_3_header_headline' ) ?></h2>
            <span class="section-header-text margin light-text"><?php echo get_theme_mod( 'section_3_header_text' ) ?></span>
        </div>
        <ul class="offers-list row">
			<?php
			$args = array(
				'post_type' => 'offer'
			);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : ?>
                    <li class="col-md-4 text-center">
						<?php $the_query->the_post(); ?>
						<?php if ( has_post_thumbnail() ): ?>
                            <div class="offer-img-container">
								<?php the_post_thumbnail( 'thumbnail' ); ?>
                            </div>

						<?php endif; ?>
                        <h3 class="offer-headline light-text"><?php the_title(); ?></h3>
                        <div class="offer-text"><?php the_excerpt(); ?></div>
                    </li>

				<?php endwhile; ?>
			<?php endif;
			wp_reset_postdata(); ?>
        </ul>
    </div>
</section>
<section class="">
    <div class="container">
        <div class="section-header margin">
            <h2 class="section-header-headline margin"><?php echo get_theme_mod( 'section_4_header_headline' ) ?></h2>
            <span class="section-header-text margin"><?php echo get_theme_mod( 'section_4_header_text' ) ?></span>
        </div>
        <div class="isotope-container">
			<?php
			$args = array(
				'post_type' => 'work'
			);

			$the_query = new WP_Query( $args ); ?>

            <div class="grid row justify-content-center">
				<?php
				if ( $the_query->have_posts() ) : ?>
					<?php while ( $the_query->have_posts() ) : ?>
                        <div class="grid-item col-md-4">
							<?php $the_query->the_post(); ?>
							<?php if ( has_post_thumbnail() ):
								the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) );
							endif; ?>
                            <h3 class="light-text"><?php the_title(); ?></h3>
                            <div class="offer-text"><?php the_excerpt(); ?></div>
                        </div>

					<?php endwhile; ?>
				<?php endif;
				wp_reset_postdata(); ?>
            </div>
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
