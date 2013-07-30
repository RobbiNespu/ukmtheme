<?php
/**
 * @package WordPress
 * @subpackage UKM_Theme
 * @since UKM Theme 1.0
 */

// JQuery from Google API

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

// Tetapan theme

function ukmtheme_setup() {

	load_theme_textdomain( 'ukmtheme', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	register_nav_menu( 'primary', __( 'Primary Menu', 'ukmtheme' ) );

	register_nav_menu( 'secondary', __( 'Secondary Menu', 'ukmtheme' ) );

	register_nav_menu( 'social', __( 'Social Menu', 'ukmtheme' ) );

	require_once locate_template( 'menu.php' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	add_theme_support( 'post-thumbnails' );

	add_filter('show_admin_bar', '__return_false');

	$logo_utama = array(
		'width'         => 940,
		'height'        => 100,
		'default-image' => get_template_directory_uri() . '/images/header.png',
		'uploads'       => true,
		'header-text'	=> false,
	);
	add_theme_support( 'custom-header', $logo_utama );
}
add_action( 'after_setup_theme', 'ukmtheme_setup' );

// Javascript dan CSS

function ukmtheme_scripts_styles() {
	global $wp_styles;

	wp_enqueue_style( 'ukmtheme-style', get_stylesheet_uri() );

	wp_enqueue_style( 'ukmtheme-style-ie', get_template_directory_uri() . '/css/ie.css', array( 'ukmtheme-style' ), '4.0' );
	$wp_styles->add_data( 'ukmtheme-style-ie', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array( 'jquery'), '2.6', true );
}
add_action( 'wp_enqueue_scripts', 'ukmtheme_scripts_styles' );
/**
 * Widget
 * @since UKM Theme 1.0
 */
function ukmtheme_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'ukmtheme' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'ukmtheme' ),
		'before_widget' => '<aside class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'ukmtheme' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'ukmtheme' ),
		'before_widget' => '<aside class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'ukmtheme' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'ukmtheme' ),
		'before_widget' => '<aside class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'ukmtheme_widgets_init' );
?>