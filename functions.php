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

// Admin Scripts and Style Enqueue

add_action( 'admin_enqueue_scripts', 'ut_wp_admin_scripts' );
  function ut_wp_admin_scripts() {
    // Javascript
    wp_enqueue_script( 'thickbox' );
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-option', get_template_directory_uri() . '/assets/js/options.js', array('wp-color-picker'), '6.2', true );
    // Stylesheet
    wp_enqueue_style( 'thickbox' );
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( 'admin', get_template_directory_uri() . '/assets/css/admin.min.css', false, '6.2' );
    
  }

// Public Scripts and Style Enqueue

if (!is_admin()) add_action('wp_enqueue_scripts', 'ukmtheme_scripts', 11);
if (!function_exists('ukmtheme_scripts')) {
  function ukmtheme_scripts() {
    // Javascript
    wp_deregister_script('jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-1.11.0.min.js', array(), '1.11.0', false );
    wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/lib/fancybox/source/jquery.fancybox.pack.js', array(), '2.1.5', true );
    wp_enqueue_script( 'caroufredsel', '//cdnjs.cloudflare.com/ajax/libs/jquery.caroufredsel/6.2.1/jquery.carouFredSel.packed.js', array(), '6.2.1', true );
    wp_enqueue_script( 'default', get_template_directory_uri() . '/assets/js/script.min.js', array(), '6.2', true );
    // Stylesheet
    wp_enqueue_style('fancybox', get_template_directory_uri() . '/lib/fancybox/source/jquery.fancybox.css', false, '2.1.5' );
    wp_enqueue_style( 'default', get_template_directory_uri() . '/assets/css/style.min.css', false, '6.2' );
  }
}

// Theme Update Checker

require( 'inc/theme-update-checker.php' );
$ukmtheme_update_checker = new ThemeUpdateChecker(
  'ukmtheme-master',
  'http://raw.github.com/jrajalu/ukmtheme/master/version.json'
);

// Theme Setup

add_action( 'after_setup_theme', 'ukmtheme_setup' );
  function ukmtheme_setup() {

    add_theme_support( 'html5', array( 'search-form' ) ); 
    add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery', ) );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );

    load_theme_textdomain( 'ukmtheme', get_template_directory() . '/lang' );
      
    register_nav_menus( array(
      'top'       => __( 'Top Navigation', 'ukmtheme' ),
      'main'      => __( 'Main Navigation', 'ukmtheme' ),
      'footer'    => __( 'Footer Navigation', 'ukmtheme' ),
    ) );

    add_theme_support( 'custom-header', array(
      'width'         => 960,
      'height'        => 100,
      'default-image' => get_template_directory_uri() . '/assets/images/public/logo.png?ver=6.2',
      'uploads'       => true,
      'header-text'   => false,
      )
    );
    
    add_filter('show_admin_bar', '__return_false');

    add_post_type_support( 'staff', 'page-attributes' );
    
  }

// Load Post Type

add_action( 'after_setup_theme', 'ukmtheme_module' );
  if (!function_exists('ukmtheme_module')) {
    function ukmtheme_module() {
      require( 'inc/nav-secondary-menu.php' ); // Menu Utama
      require( 'inc/theme-options.php' ); // Theme Options
      require( 'inc/theme-login.php' ); // Custon Login Page
      require( 'inc/theme-plugins.php' ); // Require Plugin
      require( 'inc/post-type-appreciation.php' );
      require( 'inc/post-type-event.php' );
      require( 'inc/post-type-expertise.php' );
      require( 'inc/post-type-faq.php');
      require( 'inc/post-type-gallery.php');
      require( 'inc/post-type-news.php');
      require( 'inc/post-type-news-portal.php');
      require( 'inc/post-type-news-scroller.php');
      require( 'inc/post-type-press.php' );
      require( 'inc/post-type-publication.php' );
      require( 'inc/post-type-staff.php');
      require( 'inc/post-type-slideshow.php');
      require( 'inc/post-type-tab.php');
      require( 'inc/post-type-video.php');
      require( 'inc/theme-archive-links.php' );
      require( 'inc/metabox-setup.php' );
      require( 'inc/widget-appreciation.php' );
      require( 'inc/widget-event.php' );
      require( 'inc/widget-news.php' );
      require( 'inc/widget-news-portal.php' );
      require( 'inc/widget-news-thumbnail.php' );
      require( 'inc/widget-youtube.php' );
      require( 'inc/widget-excellent-staff.php' );
      require( 'lib/hc-custom-wp-admin-url/hc-custom-wp-admin-url.php' );
      require( 'templates/page-sitemap.php' );
    }
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

// Widget Init

add_action( 'widgets_init', 'ukmtheme_widgets_init' );
if (!function_exists('ukmtheme_widgets_init')) {
  function ukmtheme_widgets_init() {
    register_sidebar( array(
      'name'            => __( 'Main Sidebar', 'ukmtheme' ),
      'id'              => 'sidebar-1',
      'description'     => __( 'Appears on Front Page template, which has its own widgets', 'ukmtheme' ),
      'before_widget'   => '<aside class="uk-panel widgets widgets-1">',
      'after_widget'    => '</aside>',
      'before_title'    => '<h3 class="widget-title">',
      'after_title'     => '</h3>',
    ) );

    register_sidebar( array(
      'name'            => __( 'Page Sidebar', 'ukmtheme' ),
      'id'              => 'sidebar-2',
      'description'     => __( 'Appears when using the optional page', 'ukmtheme' ),
      'before_widget'   => '<aside class="widgets">',
      'after_widget'    => '</aside>',
      'before_title'    => '<h3 class="widget-title">',
      'after_title'     => '</h3>',
    ) );
    
    register_sidebar( array(
      'name'            => __( 'Frontpage Three Boxes', 'ukmtheme' ),
      'id'              => 'sidebar-3',
      'description'     => __( 'Appears when using the optional Front Page', 'ukmtheme' ),
      'before_widget'   => '<aside class="col-1-3"><div class="uk-panel widgets-wrap">',
      'after_widget'    => '</div></aside>',
      'before_title'    => '<h3 class="widget-title">',
      'after_title'     => '</h3>',
    ) );

    register_sidebar( array(
      'name'            => __( 'Frontpage Four Boxes', 'ukmtheme' ),
      'id'              => 'sidebar-4',
      'description'     => __( 'Appears when using the optional Front Page', 'ukmtheme' ),
      'before_widget'   => '<aside class="col-1-4"><div class="uk-panel widgets-wrap">',
      'after_widget'    => '</div></aside>',
      'before_title'    => '<h3 class="widget-title">',
      'after_title'     => '</h3>',
    ) );

    register_sidebar( array(
      'name'            => __( 'Frontpage Custom Box', 'ukmtheme' ),
      'id'              => 'sidebar-5',
      'description'     => __( 'Appears when using the optional Front Page', 'ukmtheme' ),
      'before_widget'   => '<aside class="col-1-1">',
      'after_widget'    => '</aside>',
      'before_title'    => '<h3 class="widget-title">',
      'after_title'     => '</h3>',
    ) );
    register_sidebar( array(
      'name'            => __( 'Footer Content', 'ukmtheme' ),
      'id'              => 'sidebar-6',
      'description'     => __( 'Appears in footer', 'ukmtheme' ),
      'before_widget'   => '<span>',
      'after_widget'    => '</span>',
      'before_title'    => '<h3 class="widget-title uk-hidden">',
      'after_title'     => '</h3>',
    ) );
  }
}
