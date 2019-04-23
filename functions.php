<?php
/**
 * gulp-wordpress functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gulp-wordpress
 */

if ( ! function_exists( 'gulp_wordpress_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gulp_wordpress_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on gulp-wordpress, use a find and replace
	 * to change 'gulp-wordpress' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'gulp-wordpress', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'gulp-wordpress' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'gulp_wordpress_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'gulp_wordpress_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gulp_wordpress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gulp_wordpress_content_width', 640 );
}
add_action( 'after_setup_theme', 'gulp_wordpress_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gulp_wordpress_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gulp-wordpress' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gulp-wordpress' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

/**
 * Enqueue scripts and styles.
 */
function gulp_wordpress_scripts() {
	wp_enqueue_style( 'gulp-wordpress-style', get_stylesheet_uri() );
	// Import custom JS files
	wp_enqueue_script( 'slickSlider-js', get_template_directory_uri() . '/js/vendor/slick.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'plugins-js', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gulp_wordpress_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';


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
 * Link Feature Post Image to Single-post
 */
function wpb_autolink_featured_images( $html, $post_id, $post_image_id ) {
	If (! is_singular()) {
		$html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_the_title( $post_id ) ) . '">' . $html . '</a>';
		return $html;
	}
	else {
		return $html;
	}
}
add_filter( 'post_thumbnail_html', 'wpb_autolink_featured_images', 10, 3 );

/**
 * Clean up header
 */
add_filter( 'emoji_svg_url', '__return_false' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action( 'wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

// Disable Gutenberg editor for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// Disable Gutenberg editor for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

/**
 * WP Admin
 */
add_action( 'widgets_init', 'gulp_wordpress_widgets_init' );
function remove_footer_admin () {
	echo 'Za dodatne izmene posalji <a href="mailto:ciricx@gmail.com">E-mail</a> | Creative Studio: <a href="http://www.idizajner.com" target="_blank">iDizajner</a></p>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

// Custom support widget

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
function my_custom_dashboard_widgets() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget('custom_help_widget', 'Podrška', 'custom_dashboard_help');
}
function custom_dashboard_help() {
	echo '<p>Hvala vam što koristite naše usluge. Ukoliko vam je potrebna pomoć, možete nas kontaktirati <a href="mailto:ciricx@gmail.com">ovde</a>. Za novi projekat možete posetiti naš <a href="http://www.idizajner.com" target="_blank">kreativni studio</a> i podneti zahtev.</p>';
}

/** ========================================
 * Rewrite permalninks for blog/post
 * ======================================== */
/**
 * Add new rewrite rule
 */
function create_new_url_querystring() {
    add_rewrite_rule(
        'blog/([^/]*)$',
        'index.php?name=$matches[1]',
        'top'
    );
    add_rewrite_tag('%blog%','([^/]*)');
}
add_action('init', 'create_new_url_querystring', 999 );

/**
 * Modify post link
 * This will print /blog/post-name instead of /post-name
 */
function append_query_string( $url, $post, $leavename ) {
    if ( $post->post_type != 'post' )
            return $url;


    if ( false !== strpos( $url, '%postname%' ) ) {
            $slug = '%postname%';
    }
    elseif ( $post->post_name ) {
            $slug = $post->post_name;
    }
    else {
        $slug = sanitize_title( $post->post_title );
    }

    $url = home_url( user_trailingslashit( 'blog/'. $slug ) );
    return $url;
}
add_filter( 'post_link', 'append_query_string', 10, 3 );
/**
 * Redirect all posts to new url
 * If you get error 'Too many redirects' or 'Redirect loop', then delete everything below
 */
function redirect_old_urls() {
    if ( is_singular('post') ) {
        global $post;
        if ( strpos( $_SERVER['REQUEST_URI'], '/blog/') === false) {
           wp_redirect( home_url( user_trailingslashit( "blog/$post->post_name" ) ), 301 );
           exit();
        }
    }
}
add_filter( 'template_redirect', 'redirect_old_urls' );

/**
 * Create Custom Global Template Settings for Header, Footer etc. in WP Admin sidebar
 */
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

}

/**
 * Homepage CTA button, default value.
 */

function acf_load_filed($urlField) {
	$default_url = get_field('button_text', 'PRIJAVI SE ZA KURS');
	$urlField['default_value'] = $default_url;
	return $urlField;
}
add_filter('acf/load_field/hero_content', 'acf_load_field');

