<?php
/**
 * WP Store functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Store
 */

if ( ! function_exists( 'wp_store_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wp_store_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WP Store, use a find and replace
	 * to change 'wp-store' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wp-store', get_template_directory() . '/languages' );

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

	add_image_size('wp-store-medium-image',540,300,true);
	add_image_size('wp-store-large-image',800,500,true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'wp-store' ),
		'wp_footer' => esc_html__('Footer','wp-store'),
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
	add_theme_support( 'custom-background', apply_filters( 'wp_store_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_theme_support( 'custom-logo' , array(
	 	'header-text' => array( 'site-title', 'site-description' ),
	 	));

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'wp_store_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_store_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_store_content_width', 640 );
}
add_action( 'after_setup_theme', 'wp_store_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_store_widgets_init() {	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wp-store' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to show in Sidebar.', 'wp-store' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'wp-store' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Add widgets here to show in Right Sidebar.', 'wp-store' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Shop Sidebar', 'wp-store' ),
		'id'            => 'shop-sidebar',
		'description'   => 'Widgets added are only shown in Wocommerce Archive product page.',
		'before_widget' => '<div id="%1$s" class="%2$s '.wp_store_count_widgets( 'shop-sidebar' ).'">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</h2></span>',
		) );
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'wp-store' ),
		'id'            => 'left-sidebar',
		'description'   => esc_html__( 'Add widgets here to show in Left Sidebar.', 'wp-store' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Widget Area One', 'wp-store' ),
		'id'            => 'widget-area-one',
		'description'   => esc_html__( 'Add widgets here to show in Widget Area One.', 'wp-store' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Product Widget Area', 'wp-store' ),
		'id'            => 'product-area',
		'description'   => esc_html__( 'Add widgets here to show in Product Widget Area.', 'wp-store' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Widget Area Two', 'wp-store' ),
		'id'            => 'widget-area-two',
		'description'   => esc_html__( 'Add widgets here to show in Widget Area Two.', 'wp-store' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Widget Area Three', 'wp-store' ),
		'id'            => 'widget-area-three',
		'description'   => esc_html__( 'Add widgets here to show in Widget Area Three.', 'wp-store' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Widget Icon Area', 'wp-store' ),
		'id'            => 'widget-icon',
		'description'   => esc_html__( 'Add widgets here to show in Widget Icon Area.', 'wp-store' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer One', 'wp-store' ),
		'id'            => 'footer-one',
		'description'   => 'Add widgets here to show in Footer One.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
    register_sidebar( array(
		'name'          => __( 'Footer Two', 'wp-store' ),
		'id'            => 'footer-two',
		'description'   => 'Add widgets here to show in Footer Two',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
    register_sidebar( array(
		'name'          => __( 'Footer Three', 'wp-store' ),
		'id'            => 'footer-three',
		'description'   => 'Add widgets here to show in Footer Three',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
    register_sidebar( array(
		'name'          => __( 'Footer Four', 'wp-store' ),
		'id'            => 'footer-four',
		'description'   => 'Add widgets here to show in Footer Four.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );


}
add_action( 'widgets_init', 'wp_store_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wp_store_scripts() {

	$font_args = array(
		'family' => 'Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|Satisfy|Droid+Serif:400,400italic,700italic,700',
		);
	wp_enqueue_style('wp-store-google-fonts', add_query_arg($font_args, "//fonts.googleapis.com/css"));
	
	wp_enqueue_style('wp-store-font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
	
	wp_enqueue_style('wp-store-slick-css', get_template_directory_uri() . '/css/slick.css' );
	
	wp_enqueue_style('wp-store-fancybox-css', get_template_directory_uri() . '/css/fancybox.css' );
	
	wp_enqueue_style('wp-store-owl-css', get_template_directory_uri() . '/css/owl.carousel.css' );
	
	wp_enqueue_style('wp-store-owl-theme-css', get_template_directory_uri() . '/css/owl.theme.css' );
	
	wp_enqueue_style('wp-store-owl-transition-css', get_template_directory_uri() . '/css/owl.transitions.css' );

	wp_enqueue_style( 'wp-store-customscroll', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css');
	
	wp_enqueue_style( 'wp-store-style', get_stylesheet_uri() );
	
	if(get_theme_mod('wp_store_basic_setting_responsive_option',1) == 1){

		wp_enqueue_style('wp-store-responsive', get_template_directory_uri() . '/css/responsive.css' );	
	}
	
	wp_enqueue_script( 'wp-store-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'wp-store-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'wp-store-owl-js', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '1.3.3', true );

	wp_enqueue_script( 'wp-store-slick-js', get_template_directory_uri() . '/js/slick.js', array('jquery'), '1.5.0', true );

	wp_enqueue_script( 'wp-store-fancybox-js', get_template_directory_uri() . '/js/jquery.fancybox-1.3.4.js', array('jquery'), '1.3.4', true );

	wp_enqueue_script( 'wp-store-cscrollbar-concat', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.concat.min.js', array(), '20120206', true );

	wp_enqueue_script( 'wp-store-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20160604', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_store_scripts' );

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

/**
 * Load WP Store Customizer file.
 */
require get_template_directory() . '/inc/wp-store-customizer.php';

/**
 * Load WP Store function file.
 */
require get_template_directory() . '/inc/wp-store-functions.php';

/**
* Load Custom Switch Controls
*/
require get_template_directory() . '/inc/admin-panel/controls/wp-store-custom-switch.php';
/**
* Load Custom Switch Controls
*/
require get_template_directory() . '/inc/widgets/wp-store-widgets.php';
/**
* Load Sidebar metabox
*/
require get_template_directory() . '/inc/wp-store-metabox.php';
/**
* Load Theme Setup Page
*/
require get_template_directory() . '/inc/wp-store-about.php';