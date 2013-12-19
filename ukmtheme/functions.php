<?php
/**
 * @link http://www.ukm.my/template
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */
 
/**
 * Load jQuery from google
 * Code reference @link http://css-tricks#Load jquery right way
 */

if (!is_admin()) add_action("wp_enqueue_scripts", "ukmtheme_jquery_enqueue", 11);
function ukmtheme_jquery_enqueue() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js", false, null);
    wp_enqueue_script('jquery');
}
/**
 * UKM Theme Setup
 * Load Templates and Libraries
 * Add Theme Support: Post format, Language, Links etc.
 * Last update 20131214
 *
 */
add_action( 'after_setup_theme', 'ukmtheme_setup' );
function ukmtheme_setup() {

	add_theme_support( 'html5', array( 'search-form' ) );	
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery', ) );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );

	load_theme_textdomain( 'ukmtheme', get_template_directory() . '/languages' );

	locate_template( 'libraries/nav-secondary-menu.php', 'ukmtheme' );
	locate_template( 'libraries/nav-mobile-menu.php', 'ukmtheme' );
	locate_template( 'libraries/theme-options.php', 'ukmtheme' );
	locate_template( 'libraries/theme-login.php', 'ukmtheme' );
	locate_template( 'libraries/cpt-news.php', 'ukmtheme' );
	locate_template( 'libraries/cpt-staff.php', 'ukmtheme' );
	locate_template( 'libraries/cpt-slideshow.php', 'ukmtheme' );
	locate_template( 'libraries/cpt-faq.php', 'ukmtheme' );
	locate_template( 'libraries/cpt-event.php', 'ukmtheme' );
	locate_template( 'libraries/mbc-config.php', 'ukmtheme' );
	locate_template( 'plugins/hc-text-widget/hc-text-widget.php', 'ukmtheme' );
	locate_template( 'templates/page-sitemap.php', 'ukmtheme' );
		
	register_nav_menus( array(
        'primary' => __( 'Primary Navigation', 'ukmtheme' ),
        'secondary' => __( 'Secondary Navigation', 'ukmtheme' ),
        'tertiary' => __( 'Tertiary Navigation', 'ukmtheme' ),
        'mobile' => __( 'Mobile Navigation', 'ukmtheme' )
	) );

	add_theme_support( 'custom-header', array(
        'width'         => 480,
        'height'        => 100,
        'default-image' => get_template_directory_uri() . '/assets/images/public/logo.svg?ver:6.1.1',
        'uploads'       => true,
        'header-text'   => false,
        )
	);
	
	add_theme_support( 'custom-background', array(
	'default-color' => 'ffffff',
	) );
	
	add_filter('show_admin_bar', '__return_false');

}

// Replaces the excerpt "more" text by a link
// @link http://codex.wordpress.org/Function_Reference/the_excerpt

add_filter( 'excerpt_more', 'ukmtheme_excerpt_more' );
function ukmtheme_excerpt_more($more) {
    global $post;
	    return '<a class="moretag" href="'. get_permalink($post->ID) . '">'. __( 'Read More','ukmtheme' ) .'</a>';
}

function ukmtheme_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'ukmtheme_excerpt_length', 999 );

// Javascript and Stylesheet
add_action( 'wp_enqueue_scripts', 'ukmtheme_scripts' );
if (!is_admin()) add_action("wp_enqueue_scripts", "ukmtheme_scripts", 11);
function ukmtheme_scripts() {
	
	wp_enqueue_script( 'default', get_template_directory_uri() . '/assets/js/script.min.js', array(), '6.1.1', true );

	wp_enqueue_style( 'museo_slab', get_template_directory_uri() . '/assets/fonts/museo_slab/museo_slab.min.css' );

	wp_enqueue_style( 'bxslider', get_template_directory_uri() . '/plugins/bxslider/jquery.bxslider.css', 'array()', '4.1.1' );

	wp_enqueue_style( 'nivo-slider', get_template_directory_uri() . '/plugins/nivo-slider/nivo-slider.css' );
	
	wp_enqueue_style( 'nivo-slider-theme', get_template_directory_uri() . '/plugins/nivo-slider/themes/default/default.css' );
    
	wp_enqueue_style( 'default', get_template_directory_uri() . '/assets/css/default.min.css', 'array()', '6.1.1' );
}

add_action( 'widgets_init', 'ukmtheme_widgets_init' );
function ukmtheme_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'ukmtheme' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on Front Page template, which has its own widgets', 'ukmtheme' ),
		'before_widget' => '<aside class="uk-panel widgets widgets-1">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Page Sidebar', 'ukmtheme' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'ukmtheme' ),
		'before_widget' => '<aside class="widgets">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Post Sidebar', 'ukmtheme' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'ukmtheme' ),
		'before_widget' => '<aside class="widgets">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
		register_sidebar( array(
		'name' => __( 'Frontpage Three Boxes', 'ukmtheme' ),
		'id' => 'sidebar-4',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'ukmtheme' ),
		'before_widget' => '<aside class="col-1-3"><div class="uk-panel uk-panel-box uk-panel-box-secondary widgets-wrap">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Frontpage Four Boxes', 'ukmtheme' ),
		'id' => 'sidebar-5',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'ukmtheme' ),
		'before_widget' => '<aside class="col-1-4"><div class="uk-panel uk-panel-box widgets-wrap">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}