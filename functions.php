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

function ukmtheme_setup() {

	load_theme_textdomain( 'ukmtheme', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	register_nav_menu( 'primary', __( 'Primary Menu', 'ukmtheme' ) );
	register_nav_menu( 'secondary', __( 'Secondary Menu', 'ukmtheme' ) );

	require_once locate_template( 'menu.php' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	add_theme_support( 'post-thumbnails' );
	//set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop

	add_filter('show_admin_bar', '__return_false');
}
add_action( 'after_setup_theme', 'ukmtheme_setup' );


function ukmtheme_scripts_styles() {
	global $wp_styles;

	wp_enqueue_style( 'ukmtheme-style', get_stylesheet_uri() );

	wp_enqueue_style( 'ukmtheme-style-ie', get_template_directory_uri() . '/assets/css/ie.css', array( 'ukmtheme-style' ), '20121010' );
	$wp_styles->add_data( 'ukmtheme-style-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'ukmtheme_scripts_styles' );
?>