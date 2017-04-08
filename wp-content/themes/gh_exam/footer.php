<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gh_exam
 */
?>

<footer class="main-footer">
    <section class="clients color-bg">
        <div class="container">
            <div class="section-header margin">
                <h2 class="section-header-headline light-text margin"><?php echo get_theme_mod( 'section_5_header_headline' ) ?></h2>
            </div>
            <div class="owl-carousel owl-theme color-bg" id="owl-2">
				<?php
				$args = array(
					'post_type' => 'slide'
				);

				$the_query = new WP_Query( $args );

				if ( $the_query->have_posts() ) :?>
					<?php while ( $the_query->have_posts() ) : ?>
                        <div>
							<?php $the_query->the_post(); ?>
                            <a href="<?php the_permalink() ?>" class="d-flex align-items-center">
                                <div class="clients-slide-container">
									<?php if ( has_post_thumbnail() ):
										the_post_thumbnail( 'post-thumbnail' );

									endif ?>
                                </div>
                            </a>
                        </div>
					<?php endwhile; ?>
				<?php endif;
				wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <section class="contact-form tone">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-header footer-header margin text-left">
                        <h3 class="section-header-headline margin light-text"><?php echo get_theme_mod( 'footer_contacts_headline' ) ?></h3>
                        <span class="d-block section-header-text margin light-text"><?php echo get_theme_mod( 'footer_contacts_header_text' ) ?></span>

                        <span class="d-block light-text fa fa-phone footer-phone"><?php echo get_theme_mod( 'footer_phone_number' ) ?></span>
                        <span class="d-block light-text fa fa-map-marker footer-address"><?php echo get_theme_mod( 'footer_address' ) ?></span>
                        <div class="map-container">
                            <?php echo do_shortcode('[wpgmza id="1"]') ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
					<?php echo do_shortcode( '[contact-form-7 id="88" title="Untitled"]' ) ?>
                </div>
            </div>
        </div>
    </section>
    <section class="logo-footer text-center dark-bg">
        <div class="logo-footer-container d-inline-block">
			<?php the_custom_logo() ?>
        </div>
    </section>
    <section class="rights text-center color-bg">
        <span class="light-text"><?php _e( ' &copy 2015  All Rights Reserved.', 'gh_exam' ) ?></span>
    </section>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
