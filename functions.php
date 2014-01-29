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

add_action('admin_head', 'ut_custom_css');
	function ut_custom_css() {
	  echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/assets/css/20140122-admin.min.css?ver=6.1.7" type="text/css" media="all" />';
	}

// Theme Update Checker

require( 'inc/theme-update-checker.php' );
$ukmtheme_update_checker = new ThemeUpdateChecker(
  'ukmtheme',
  'https://raw.github.com/jrajalu/ukmtheme/master/version.json'
);

// Theme Setup

add_action( 'after_setup_theme', 'ukmtheme_setup' );
	function ukmtheme_setup() {

		add_theme_support( 'html5', array( 'search-form' ) );	
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery', ) );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );

		load_theme_textdomain( 'ukmtheme', get_template_directory() . '/lang' );

		require( 'inc/nav-secondary-menu.php' );
		require( 'inc/nav-mobile-menu.php' );
		require( 'inc/theme-docs.php' );
		require( 'inc/theme-options.php' );
		require( 'inc/theme-login.php' );
		require( 'inc/theme-plugins.php' );
		require( 'inc/post-type-event.php' );
		require( 'inc/post-type-expertise.php' );
		require( 'inc/post-type-faq.php');
		require( 'inc/post-type-news.php');
		require( 'inc/post-type-news-scroller.php');
		require( 'inc/post-type-publication.php' );
		require( 'inc/post-type-staff.php');
		require( 'inc/post-type-slideshow.php');
		require( 'inc/theme-archive-links.php' );
		require( 'inc/metabox-setup.php' );
		require( 'inc/widget-event.php' );
		require( 'lib/hc-text-widget/hc-text-widget.php' );
		require( 'lib/hc-custom-wp-admin-url/hc-custom-wp-admin-url.php' );
		require( 'templates/page-sitemap.php' );
			
		register_nav_menus( array(
	    'primary' => __( 'Primary Navigation', 'ukmtheme' ),
	    'secondary' => __( 'Secondary Navigation', 'ukmtheme' ),
	    //'mobile' => __( 'Mobile Navigation', 'ukmtheme' )
		) );

		add_theme_support( 'custom-header', array(
	    'width'         => 960,
	    'height'        => 100,
	    'default-image' => get_template_directory_uri() . '/assets/images/public/logo.svg?ver=6.1.7',
	    'uploads'       => true,
	    'header-text'   => false,
	    )
		);
		
		add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
		) );
		
		add_filter('show_admin_bar', '__return_false');
		
	}

// Add Home Item in Apperance > Menus

add_filter( 'wp_page_menu_args', 'home_page_menu_args' );
	function home_page_menu_args( $args ) {
	    $args['show_home'] = true;
	    return $args;
	}

// Replaces the excerpt "more" text by a link
// @link http://codex.wordpress.org/Function_Reference/the_excerpt

add_filter( 'excerpt_more', 'ukmtheme_excerpt_more' );
	function ukmtheme_excerpt_more($more) {
	    global $post;
		    return '<a class="moretag clearfix" href="'. get_permalink($post->ID) . '"><button class="uk-button uk-button-mini uk-button-primary uk-navbar-flip">'. __( 'Read More','ukmtheme' ) .'</button></a>';
	}

add_filter( 'excerpt_length', 'ukmtheme_excerpt_length', 999 );
	function ukmtheme_excerpt_length( $length ) {
		return 20;
	}

add_filter('upload_mimes','add_custom_mime_types');
	function add_custom_mime_types($mimes){
		return array_merge($mimes,array (
			'ac3' => 'audio/ac3',
			'mpa' => 'audio/MPA',
			'flv' => 'video/x-flv',
			'svg' => 'image/svg+xml'
		));
	}

// Scripts and Style Enqueue

if (!is_admin()) add_action('wp_enqueue_scripts', 'ukmtheme_scripts', 11);
function ukmtheme_scripts() {
	wp_deregister_script('jquery' );
	wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array(), '1.10.2', false );
	wp_enqueue_script( 'default', get_template_directory_uri() . '/assets/js/20140122-script.min.js', array(), '6.1.7', true );
	wp_enqueue_style( 'default', get_template_directory_uri() . '/assets/css/20140122-stylesheet.min.css', false, '6.1.7' );
}

// Widget Init

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
		'description' => __( 'Appears when using the optional page', 'ukmtheme' ),
		'before_widget' => '<aside class="widgets">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Post Sidebar', 'ukmtheme' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional post', 'ukmtheme' ),
		'before_widget' => '<aside class="widgets">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
		register_sidebar( array(
		'name' => __( 'Frontpage Three Boxes', 'ukmtheme' ),
		'id' => 'sidebar-4',
		'description' => __( 'Appears when using the optional Front Page', 'ukmtheme' ),
		'before_widget' => '<aside class="col-1-3"><div class="uk-panel widgets-wrap">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Frontpage Four Boxes', 'ukmtheme' ),
		'id' => 'sidebar-5',
		'description' => __( 'Appears when using the optional Front Page', 'ukmtheme' ),
		'before_widget' => '<aside class="col-1-4"><div class="uk-panel widgets-wrap">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
