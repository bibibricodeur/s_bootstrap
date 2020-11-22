<?php
/**
 * s_bootstrap functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package s_bootstrap
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 's_bootstrap_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function s_bootstrap_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on s_bootstrap, use a find and replace
		 * to change 's_bootstrap' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 's_bootstrap', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'primary-menu' => esc_html__( 'Primary', 's_bootstrap' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				's_bootstrap_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 's_bootstrap_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function s_bootstrap_content_width() {
	$GLOBALS['content_width'] = apply_filters( 's_bootstrap_content_width', 640 );
}
add_action( 'after_setup_theme', 's_bootstrap_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function s_bootstrap_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 's_bootstrap' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 's_bootstrap' ),
			'before_widget' => '<div class="card my-4"><section id="%1$s" class="widget %2$s"><div class="card-header">',
			'after_widget'  => '</div></section></div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2></div><div class="card-body">',
		)
	);
}
add_action( 'widgets_init', 's_bootstrap_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function s_bootstrap_scripts() {
	/**
	 * Ajouter par bibi.
	 */
	wp_register_style( 'bootstrapCss', get_template_directory_uri() . '/vendor//bootstrap/css/bootstrap.min.css' );
	wp_register_script( 'bootstrapJs', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.bundle.min.js', ['jquery'], false, true );
	wp_register_style( 'highlightCss', get_template_directory_uri() . '/vendor/highlight/styles/rainbow.css' );
	wp_register_script( 'highlightJs', get_template_directory_uri() . '/vendor/highlight/highlight.pack.js', [], false, true );
	wp_enqueue_style( 'bootstrapCss' );
	wp_enqueue_script( 'bootstrapJs' );
	wp_enqueue_style( 'highlightCss' );
	wp_enqueue_script( 'highlightJs' );

	wp_enqueue_style( 's_bootstrap-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 's_bootstrap-style', 'rtl', 'replace' );

	wp_enqueue_script( 's_bootstrap-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 's_bootstrap_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Ajouter par bibi
 */

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

/**
 * Ajouter favicon
 */
function s_bootstrap_favicon() {
    echo '<link rel="shortcut icon" type="image/png" href="' . get_template_directory_uri() . '/w-logo-blue.png" />';
}
 
add_action('wp_head', 's_bootstrap_favicon');

/**
 * https://www.youtube.com/watch?v=0q7oxrq1isI
 * Ajouter pagination
 */
function s_bootstrap_pagination() {
	$pages = paginate_links(['type' => 'array']);
	if ( $pages === null ) {
		return;
	};
	echo '<nav aria-label="Pagination" class="my-4">';
	echo '<ul class="pagination">';
	foreach ( $pages as $page )  {
		$active = strpos($page, 'current') !== false;
		$class = 'page-item';
		if ($active) {
			$class .= ' active';
		};
		echo '<li class="' . $class . '">';
		echo str_replace('page-numbers', 'page-link', $page);
		echo '</li>';
	};
	#var_dump( $pages );
	echo '</ul>';
	echo '</nav>';
};

/**
 * https://www.wpbeginner.com/wp-tutorials/25-extremely-useful-tricks-for-the-wordpress-functions-file/
 * Cacher version de WordPress
 */
function wpb_remove_version() {
  return '';
}
add_filter('the_generator', 'wpb_remove_version');

/**
 * https://www.youtube.com/watch?v=r1pZElaM9cc
 * "Bootstraper" formulaire commentaires
 */
/*
add_filter('comment_form_fields', function($fields) {
	var_dump($fields);
	return($fields);
});
*/

add_filter('comment_form_default_fields', function($fields) {

	$fields['author'] = '<div class="form-group"><label for="author">Auteur</label><input type="text" class="form-control" name="author"></div>';

	$fields['email'] = '<div class="form-group"><label for="email">Email</label><input type="email" class="form-control" name="email"></div>';

	$fields['url'] = '<div class="form-group"><label for="url">Site Web</label><input type="url" class="form-control" name="url"></div>';

	return($fields);

});

# Fin
