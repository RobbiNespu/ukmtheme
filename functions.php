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
 
// Google jQuery Library

if (!is_admin()) add_action("wp_enqueue_scripts", "ukmtheme_jquery_enqueue", 11);
function ukmtheme_jquery_enqueue() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js", false, null);
    wp_enqueue_script('jquery');
}

// Theme Setup

function ukmtheme_setup() {

	add_theme_support( 'html5', array( 'search-form' ) );
	
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery', ) );
	
	add_theme_support( 'post-thumbnails' );
	
	add_theme_support( 'automatic-feed-links' );
	
	load_theme_textdomain( 'ukmtheme', get_template_directory() . '/languages' );
	
	locate_template( 'inc/part-menu.php', 'ukmtheme' );
	
	locate_template( 'lib/hc-text-widget/hc-text-widget.php', 'ukmtheme' );
	
	register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'ukmtheme' ),
	'secondary' => __( 'Secondary Navigation', 'ukmtheme' ),
	'tertiary' => __( 'Tertiary Navigation', 'ukmtheme' )
	) );
	
	$logo = array(
	'width'         => 480,
	'height'        => 100,
	'default-image' => get_template_directory_uri() . '/images/logo.png',
	'uploads'       => true,
	'header-text'   => false,
	);
	add_theme_support( 'custom-header', $logo );
	
	add_theme_support( 'custom-background', array(
	'default-color' => 'ffffff',
	) );
	
	add_filter('show_admin_bar', '__return_false');

}
add_action( 'after_setup_theme', 'ukmtheme_setup' );

// Javascript and Stylesheet

function ukmtheme_scripts() {
	// Nivo Slider JS
	// wp_enqueue_script( 'uikit-js', get_template_directory_uri() . '/lib/nivo-slider/jquery.nivo.slider.pack.js', array(), '3.2', true );
    
    // carouFredSel JS
	wp_enqueue_script( 'carouFredSel', get_template_directory_uri() . '/lib/carouFredSel/jquery.carouFredSel-6.2.1-packed.js', array(), '6.2.1', true );
	
	// UIKit Javascript
	wp_enqueue_script( 'uikit', get_template_directory_uri() . '/js/uikit.min.js', array(), '1.2.1', true );
	
	// UIKit Stylesheet
	wp_enqueue_style( 'uikit', get_template_directory_uri() . '/css/uikit.almost-flat.min.css' );
	
	// WordPress Core Stylesheet
	wp_enqueue_style( 'menu', get_template_directory_uri() . '/css/menu.css' );
	
	// Custom Grid Stylesheet
	wp_enqueue_style( 'grid', get_template_directory_uri() . '/css/grid.css' );
    
    // WordPress Core Stylesheet
	wp_enqueue_style( 'core', get_template_directory_uri() . '/css/wordpress.core.css' );
      
    // WordPress Core Stylesheet
	wp_enqueue_style( 'carouFredSel', get_template_directory_uri() . '/css/carouFredSel.css' );
    
    // webfontkit-20131207-061259
	wp_enqueue_style( 'webfontkit-20131207-061259', get_template_directory_uri() . '/fonts/webfontkit-20131207-061259/stylesheet.css' );
    
    // webfontkit-20131207-063159
	wp_enqueue_style( 'webfontkit-20131207-063159', get_template_directory_uri() . '/fonts/webfontkit-20131207-063159/stylesheet.css' );
    
    // Nivo Slider
	// wp_enqueue_style( 'nivo-slider', get_template_directory_uri() . '/lib/nivo-slider/nivo-slider.css' );
	
	// Nivo Slider Theme
	// wp_enqueue_style( 'nivo-slider-theme', get_template_directory_uri() . '/lib/nivo-slider/themes/default/default.css' );
	
	// Main Stylesheet
	wp_enqueue_style( 'main', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'ukmtheme_scripts' );


// Custom Post Type: Slideshow

add_action( 'init', 'ukmtheme_slideshow' );
function ukmtheme_slideshow() {
	register_post_type( 'ukmtheme_slideshow',
		array(
			'labels' => array(
				'name' => __( 'Slideshows' ),
				'singular_name' => __( 'Slideshow' )
			),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => get_template_directory_uri() . '/images/icon.png',
		'supports' => array( 'thumbnail', 'title', ),
		)
	);
}

function ukmtheme_screen_layout_columns( $columns ) {
    $columns['ukmtheme_slideshow'] = 1;
    return $columns;
}
add_filter( 'screen_layout_columns', 'ukmtheme_screen_layout_columns' );

function ukmtheme_screen_layout_ukmtheme_slideshow() {
    return 1;
}
add_filter( 'get_user_option_screen_layout_ukmtheme_slideshow', 'ukmtheme_screen_layout_ukmtheme_slideshow' );

// Custom Post Type: News

add_action( 'init', 'ukmtheme_news' );
function ukmtheme_news() {
	register_post_type( 'ukmtheme_news',
		array(
			'labels' => array(
				'name' => __( 'UKM News' ),
				'singular_name' => __( 'UKM News' )
			),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => get_template_directory_uri() . '/images/icon.png',
		'supports' => array( 'editor', 'excerpt', 'thumbnail', 'title', ),
		)
	);
}


// Custom Post Type: 3 Kotak

add_action( 'init', 'ukmtheme_threeBox' );
function ukmtheme_threeBox() {
	register_post_type( 'ukmtheme_threeBox',
		array(
			'labels' => array(
				'name' => __( 'Boxes: 3' ),
				'singular_name' => __( 'Box: 3' )
			),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => get_template_directory_uri() . '/images/icon.png',
		'supports' => array( 'editor', 'excerpt', 'thumbnail', 'title', ),
		)
	);
}


// Custom Post Type: 4 Kotak

add_action( 'init', 'ukmtheme_fourBox' );
function ukmtheme_fourBox() {
	register_post_type( 'ukmtheme_fourBox',
		array(
			'labels' => array(
				'name' => __( 'Boxes: 4' ),
				'singular_name' => __( 'Box: 4' )
			),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => get_template_directory_uri() . '/images/icon.png',
		'supports' => array( 'editor', 'excerpt', 'thumbnail', 'title', ),
		)
	);
}


/**
 * Widget
 * @since UKM Theme 1.0
 */
function ukmtheme_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'ukmtheme' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on Front Page template, which has its own widgets', 'ukmtheme' ),
		'before_widget' => '<aside class="widgets-wrap widgets uk-panel uk-panel-box">',
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
}
add_action( 'widgets_init', 'ukmtheme_widgets_init' );