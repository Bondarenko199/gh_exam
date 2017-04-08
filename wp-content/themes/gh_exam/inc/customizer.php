<?php
/**
 * gh_exam Theme Customizer
 *
 * @package gh_exam
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gh_exam_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	/*--------------------------------------PANELS--------------------------------------*/

	$wp_customize->add_panel( 'home_page_options', array(
		'title'    => __( 'Home page options', 'blog' ),
		'priority' => 10
	) );

	$wp_customize->add_panel( 'footer_options', array(
		'title'    => __( 'Footer options', 'blog' ),
		'priority' => 10
	) );

	$wp_customize->add_panel( 'blog_page_options', array(
		'title'    => __( 'Blog page options', 'blog' ),
		'priority' => 20
	) );

	$wp_customize->add_panel( 'single_post_page_options', array(
		'title'    => __( 'Single post page options', 'blog' ),
		'priority' => 30
	) );

	/*-------------------------------Home Section 1-------------------------------*/

	$wp_customize->add_section( 'section_1', array(
		'title'    => __( 'Section 1', 'gh_exam' ),
		'panel'    => 'home_page_options',
		'priority' => 10
	) );


	$wp_customize->add_setting( 'section_1_image', array(
		'default'   => 'Headline',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'section_1_image', array(
		'label'    => __( 'Section headline', 'gh_exam' ),
		'section'  => 'section_1',
		'settings' => 'section_1_image'
	) ) );


	$wp_customize->add_setting( 'section_1_header_headline', array(
		'default'   => 'Headline',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_1_header_headline', array(
		'label'    => __( 'Section headline', 'gh_exam' ),
		'section'  => 'section_1',
		'settings' => 'section_1_header_headline'
	) ) );


	$wp_customize->add_setting( 'section_1_header_headline_2', array(
		'default'   => 'Headline',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_1_header_headline_2', array(
		'label'    => __( 'Section headline', 'gh_exam' ),
		'section'  => 'section_1',
		'settings' => 'section_1_header_headline_2'
	) ) );


	$wp_customize->add_setting( 'section_1_header_headline_3', array(
		'default'   => 'Headline',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_1_header_headline_3', array(
		'label'    => __( 'Section headline', 'gh_exam' ),
		'section'  => 'section_1',
		'settings' => 'section_1_header_headline_3'
	) ) );


	$wp_customize->add_setting( 'section_1_header_text', array(
		'default'   => 'Text',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_1_header_text', array(
		'label'    => __( 'Section header text', 'gh_exam' ),
		'section'  => 'section_1',
		'settings' => 'section_1_header_text'
	) ) );

	/*-------------------------------Home Section 2 Header-------------------------------*/

	$wp_customize->add_section( 'section_2', array(
		'title'    => __( 'Section 2', 'gh_exam' ),
		'panel'    => 'home_page_options',
		'priority' => 10
	) );


	$wp_customize->add_setting( 'section_2_image', array(
		'default'   => 'Headline',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'section_2_image', array(
		'label'    => __( 'Section headline', 'gh_exam' ),
		'section'  => 'section_2',
		'settings' => 'section_2_image'
	) ) );


	$wp_customize->add_setting( 'section_2_header_headline', array(
		'default'   => 'Headline',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_2_header_headline', array(
		'label'    => __( 'Section headline', 'gh_exam' ),
		'section'  => 'section_2',
		'settings' => 'section_2_header_headline'
	) ) );


	$wp_customize->add_setting( 'section_2_header_text', array(
		'default'   => 'Text',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_2_header_text', array(
		'label'    => __( 'Section header text', 'gh_exam' ),
		'section'  => 'section_2',
		'settings' => 'section_2_header_text'
	) ) );

	/*----------------------------------Section-2-buttons----------------------------------*/

	$wp_customize->add_setting( 'section_2_button_link', array(
		'default'   => '',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_2_button_link', array(
		'label'    => __( 'Button link', 'gh_exam' ),
		'section'  => 'section_2',
		'settings' => 'section_2_button_link',
		'type'     => 'dropdown-pages'
	) ) );
	$wp_customize->add_setting( 'section_2_custom_button_link', array(
		'default'   => '',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_2_custom_button_link', array(
		'label'    => __( 'Custom link', 'gh_exam' ),
		'section'  => 'section_2',
		'settings' => 'section_2_custom_button_link'
	) ) );
	$wp_customize->add_setting( 'section_2_button_text', array(
		'default'   => '',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_2_button_text', array(
		'label'    => __( 'Button text', 'gh_exam' ),
		'section'  => 'section_2',
		'settings' => 'section_2_button_text'
	) ) );

	/*-------------------------------Home Section 3 Header-------------------------------*/

	$wp_customize->add_section( 'section_3', array(
		'title'    => __( 'Section 3', 'gh_exam' ),
		'panel'    => 'home_page_options',
		'priority' => 20
	) );


	$wp_customize->add_setting( 'section_3_header_headline', array(
		'default'   => 'Headline',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_3_header_headline', array(
		'label'    => __( 'Section headline', 'gh_exam' ),
		'section'  => 'section_3',
		'settings' => 'section_3_header_headline'
	) ) );


	$wp_customize->add_setting( 'section_3_header_text', array(
		'default'   => 'Text',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_3_header_text', array(
		'label'    => __( 'Section header text', 'gh_exam' ),
		'section'  => 'section_3',
		'settings' => 'section_3_header_text'
	) ) );

	/*-------------------------------Home Section 4 Header-------------------------------*/

	$wp_customize->add_section( 'section_4', array(
		'title'    => __( 'Section 4', 'gh_exam' ),
		'panel'    => 'home_page_options',
		'priority' => 30
	) );


	$wp_customize->add_setting( 'section_4_header_headline', array(
		'default'   => 'Headline',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_4_header_headline', array(
		'label'    => __( 'Section headline', 'gh_exam' ),
		'section'  => 'section_4',
		'settings' => 'section_4_header_headline'
	) ) );


	$wp_customize->add_setting( 'section_4_header_text', array(
		'default'   => 'Text',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_4_header_text', array(
		'label'    => __( 'Section header text', 'gh_exam' ),
		'section'  => 'section_4',
		'settings' => 'section_4_header_text'
	) ) );

	/*-------------------------------Home Section 5 Header-------------------------------*/

	$wp_customize->add_section( 'section_5', array(
		'title'    => __( 'Section 5', 'gh_exam' ),
		'panel'    => 'home_page_options',
		'priority' => 40
	) );


	$wp_customize->add_setting( 'section_5_header_headline', array(
		'default'   => 'Headline',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_5_header_headline', array(
		'label'    => __( 'Section headline', 'gh_exam' ),
		'section'  => 'section_5',
		'settings' => 'section_5_header_headline'
	) ) );


	$wp_customize->add_setting( 'section_5_header_text', array(
		'default'   => 'Text',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_5_header_text', array(
		'label'    => __( 'Section header text', 'gh_exam' ),
		'section'  => 'section_5',
		'settings' => 'section_5_header_text'
	) ) );

	/*-------------------------------Home Section 6 Header-------------------------------*/

	$wp_customize->add_section( 'section_6', array(
		'title'    => __( 'Section 6', 'gh_exam' ),
		'panel'    => 'home_page_options',
		'priority' => 40
	) );


	$wp_customize->add_setting( 'section_6_header_headline', array(
		'default'   => 'Headline',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_6_header_headline', array(
		'label'    => __( 'Section headline', 'gh_exam' ),
		'section'  => 'section_6',
		'settings' => 'section_6_header_headline'
	) ) );


	$wp_customize->add_setting( 'section_6_header_text', array(
		'default'   => 'Text',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'section_6_header_text', array(
		'label'    => __( 'Section header text', 'gh_exam' ),
		'section'  => 'section_6',
		'settings' => 'section_6_header_text'
	) ) );

	/*-------------------------------Footer-------------------------------*/

	$wp_customize->add_section( 'footer', array(
		'title'    => __( 'Header', 'gh_exam' ),
		'panel'    => 'footer_options',
		'priority' => 10
	) );

	$wp_customize->add_setting( 'footer_contacts_headline', array(
		'default'   => 'Contacts headline',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_contacts_headline', array(
		'label'    => __( 'Footer contacts headline', 'gh_exam' ),
		'section'  => 'footer',
		'settings' => 'footer_contacts_headline'
	) ) );

	$wp_customize->add_setting( 'footer_contacts_header_text', array(
		'default'   => 'Contacts text',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_contacts_header_text', array(
		'label'    => __( 'Footer contacts header text', 'gh_exam' ),
		'section'  => 'footer',
		'settings' => 'footer_contacts_header_text'
	) ) );

	$wp_customize->add_setting( 'footer_phone_number', array(
		'default'   => 'Number',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_phone_number', array(
		'label'    => __( 'Phone number', 'gh_exam' ),
		'section'  => 'footer',
		'settings' => 'footer_phone_number'
	) ) );


	$wp_customize->add_setting( 'footer_address', array(
		'default'   => 'Address',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_address', array(
		'label'    => __( 'Address', 'gh_exam' ),
		'section'  => 'footer',
		'settings' => 'footer_address'
	) ) );

	/*-------------------------------blog Page-------------------------------*/

	$wp_customize->add_section( 'blog_header', array(
		'title'    => __( 'Blog header', 'gh_exam' ),
		'panel'    => 'blog_page_options',
		'priority' => 10
	) );


	$wp_customize->add_setting( 'blog_page_header', array(
		'default'   => 'Headline',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blog_page_header', array(
		'label'    => __( 'Page headline', 'gh_exam' ),
		'section'  => 'blog_header',
		'settings' => 'blog_page_header'
	) ) );


	/*-------------------------------Single Post Page-------------------------------*/

	$wp_customize->add_section( 'single_post_header', array(
		'title'    => __( 'Blog header', 'gh_exam' ),
		'panel'    => 'single_post_page_options',
		'priority' => 10
	) );


	$wp_customize->add_setting( 'single_post_page_header', array(
		'default'   => 'Headline',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'single_post_page_header', array(
		'label'    => __( 'Page headline', 'gh_exam' ),
		'section'  => 'single_post_header',
		'settings' => 'single_post_page_header'
	) ) );


	/*----------------------------------Social-links-----------------------------------*/

	$wp_customize->add_section( 'footer', array(
		'title'    => __( 'Footer', 'businessplus' ),
		'panel'    => 'home_page_options',
		'priority' => 50
	) );

	$wp_customize->add_setting( 'social_1', array(
		'default'   => '',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_1', array(
		'label'    => __( 'First social network name', 'gh_exam' ),
		'section'  => 'footer',
		'settings' => 'social_1'
	) ) );


	$wp_customize->add_setting( 'social_1_link', array(
		'default'   => '',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_1_link', array(
		'label'    => __( 'Link', 'gh_exam' ),
		'section'  => 'footer',
		'settings' => 'social_1_link'
	) ) );


	$wp_customize->add_setting( 'social_2', array(
		'default'   => '',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_2', array(
		'label'    => __( 'Second social network name', 'gh_exam' ),
		'section'  => 'footer',
		'settings' => 'social_2'
	) ) );


	$wp_customize->add_setting( 'social_2_link', array(
		'default'   => '',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_2_link', array(
		'label'    => __( 'Link', 'gh_exam' ),
		'section'  => 'footer',
		'settings' => 'social_2_link'
	) ) );


	$wp_customize->add_setting( 'social_3', array(
		'default'   => '',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_3', array(
		'label'    => __( 'Third social network name', 'gh_exam' ),
		'section'  => 'footer',
		'settings' => 'social_3'
	) ) );


	$wp_customize->add_setting( 'social_3_link', array(
		'default'   => '',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_3_link', array(
		'label'    => __( 'Link', 'gh_exam' ),
		'section'  => 'footer',
		'settings' => 'social_3_link'
	) ) );


	$wp_customize->add_setting( 'social_4', array(
		'default'   => '',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_4', array(
		'label'    => __( 'Fourth social network name', 'gh_exam' ),
		'section'  => 'footer',
		'settings' => 'social_4'
	) ) );


	$wp_customize->add_setting( 'social_4_link', array(
		'default'   => '',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_4_link', array(
		'label'    => __( 'Link', 'gh_exam' ),
		'section'  => 'footer',
		'settings' => 'social_4_link'
	) ) );


}

add_action( 'customize_register', 'gh_exam_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function gh_exam_customize_preview_js() {
	wp_enqueue_script( 'gh_exam_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}

add_action( 'customize_preview_init', 'gh_exam_customize_preview_js' );
