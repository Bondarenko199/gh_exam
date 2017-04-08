<?php
/**
 * gh_exam functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gh_exam
 */

if ( ! function_exists( 'gh_exam_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gh_exam_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on gh_exam, use a find and replace
		 * to change 'gh_exam' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'gh_exam', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-header' => esc_html__( 'Primary', 'gh_exam' ),
			'menu-footer' => esc_html__( 'Footer', 'gh_exam' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'gh_exam_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'gh_exam_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gh_exam_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gh_exam_content_width', 640 );
}

add_action( 'after_setup_theme', 'gh_exam_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gh_exam_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gh_exam' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gh_exam' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'gh_exam_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gh_exam_scripts() {

	wp_enqueue_style( 'gh_exam-style', get_stylesheet_uri() );

	wp_enqueue_script( 'gh_exam-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'jquery');

	wp_enqueue_script( 'tether', get_template_directory_uri() . '/js/tether.min.js', array(), false, true );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), false, true );

	wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), false, true );

	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), false, true );

	wp_enqueue_script( 'gh_exam-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'gh_exam_scripts' );

//custom logo

add_theme_support( 'custom-logo' );


function register_my_post_types() {
	$labels = array(
		'name'               => _x( 'Slides', 'post type general name', 'gratia_theme' ),
		'singular_name'      => _x( 'Slide', 'post type singular name', 'gratia_theme' ),
		'menu_name'          => _x( 'Slides', 'admin menu', 'gratia_theme' ),
		'name_admin_bar'     => _x( 'Slide', 'add new on admin bar', 'gratia_theme' ),
		'add_new'            => _x( 'Add New', 'slide', 'gratia_theme' ),
		'add_new_item'       => __( 'Add New Slide', 'gratia_theme' ),
		'new_item'           => __( 'New Slide', 'gratia_theme' ),
		'edit_item'          => __( 'Edit Slide', 'gratia_theme' ),
		'view_item'          => __( 'View Slide', 'gratia_theme' ),
		'all_items'          => __( 'All Slides', 'gratia_theme' ),
		'search_items'       => __( 'Search Slides', 'gratia_theme' ),
		'parent_item_colon'  => __( 'Parent Slides:', 'gratia_theme' ),
		'not_found'          => __( 'No slides found.', 'gratia_theme' ),
		'not_found_in_trash' => __( 'No slides found in Trash.', 'gratia_theme' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'gratia_theme' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'slide' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'taxonomies'         => array( 'category' ),
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'slide', $args );
}

add_action( 'init', 'register_my_post_types' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';