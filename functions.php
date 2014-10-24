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

// FLUSH THEME

add_action( 'after_switch_theme', 'ukmtheme_flush_rewrite_rules' );

  function ukmtheme_flush_rewrite_rules() {
    flush_rewrite_rules();
  }

// FAVICON FOR ADMIN PAGE

function add_favicon() {
  $favicon_url = get_stylesheet_directory_uri() . '/favicon.ico';
  echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}

add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');

// ADMIN STYLESHEET AND JAVASCRIPTS

add_action( 'admin_enqueue_scripts', 'ut_wp_admin_scripts' );
  function ut_wp_admin_scripts() {
    // Javascript
    wp_enqueue_script( 'thickbox' );
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-option', get_template_directory_uri() . '/assets/js/options.js', array('wp-color-picker'), '6.3', true );
    // Stylesheet
    wp_enqueue_style( 'thickbox' );
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( 'admin', get_template_directory_uri() . '/assets/css/admin.css', false, '6.3' );
    
  }

// FRONTEND STYLESHEET AND JAVASCRIPT

if (!is_admin()) add_action('wp_enqueue_scripts', 'ukmtheme_scripts', 11);
if (!function_exists('ukmtheme_scripts')) {
  function ukmtheme_scripts() {
    // Javascript
    wp_deregister_script('jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-1.11.0.min.js', array(), '1.11.0', false );
    wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/lib/fancybox/source/jquery.fancybox.pack.js', array(), '2.1.5', true );
    wp_enqueue_script( 'jcarousel', get_template_directory_uri() . '/lib/jcarousel/jquery.jcarousel.min.js', array(), '0.3.1', true );
    wp_enqueue_script( 'responsiveTab', get_template_directory_uri() . '/lib/responsive-tab/js/jquery.responsiveTabs.min.js', array(), '1.3.6', true );
    wp_enqueue_script( 'default', get_template_directory_uri() . '/assets/js/script.min.js', array(), '6.3', true );
    // Stylesheet
    wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/lib/fancybox/source/jquery.fancybox.css', false, '2.1.5' );
    wp_enqueue_style( 'responsiveTab', get_template_directory_uri() . '/lib/responsive-tab/css/responsive-tabs.css', false, '1.3.6' );
    wp_enqueue_style( 'default', get_stylesheet_uri(), false, '6.3' );
  }
}

// THEME UPDATE CHECKER

require( 'inc/theme-update-checker.php' );
$ukmtheme_update_checker = new ThemeUpdateChecker(
  'ukmtheme-master',
  'http://raw.github.com/jrajalu/ukmtheme/master/version.json'
);

// THEME SETUP FEATURES

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
      'default-image' => get_template_directory_uri() . '/assets/images/public/logo.png?ver=6.3',
      'uploads'       => true,
      'header-text'   => false,
      )
    );
    
    add_filter('show_admin_bar', '__return_false');
    
  }

// LOAD EXTRA PLUGINS AND POST TYPE

add_action( 'after_setup_theme', 'ukmtheme_module' );
  if (!function_exists('ukmtheme_module')) {
    function ukmtheme_module() {
      require( get_template_directory() . '/inc/nav-secondary-menu.php' );
      require( get_template_directory() . '/inc/theme-options.php' );
      require( get_template_directory() . '/inc/theme-docs.php' );
      require( get_template_directory() . '/inc/theme-login.php' );
      require( get_template_directory() . '/inc/theme-plugins.php' );
      require( get_template_directory() . '/inc/post-type-appreciation.php' );
      require( get_template_directory() . '/inc/post-type-event.php' );
      require( get_template_directory() . '/inc/post-type-expertise.php' );
      require( get_template_directory() . '/inc/post-type-faq.php');
      require( get_template_directory() . '/inc/post-type-gallery.php');
      require( get_template_directory() . '/inc/post-type-news.php');
      require( get_template_directory() . '/inc/post-type-news-portal.php');
      require( get_template_directory() . '/inc/post-type-news-scroller.php');
      require( get_template_directory() . '/inc/post-type-press.php' );
      require( get_template_directory() . '/inc/post-type-publication.php' );
      require( get_template_directory() . '/inc/post-type-staff.php');
      require( get_template_directory() . '/inc/post-type-slideshow.php');
      require( get_template_directory() . '/inc/post-type-tab.php');
      require( get_template_directory() . '/inc/post-type-video.php');
      require( get_template_directory() . '/inc/theme-archive-links.php' );
      require( get_template_directory() . '/inc/theme-include-archive.php' );
      require( get_template_directory() . '/inc/theme-include-single.php' );
      require( get_template_directory() . '/inc/theme-include-taxonomy.php' );
      require( get_template_directory() . '/inc/metabox-setup.php' );
      require( get_template_directory() . '/inc/widget-appreciation.php' );
      require( get_template_directory() . '/inc/widget-event.php' );
      require( get_template_directory() . '/inc/widget-news.php' );
      require( get_template_directory() . '/inc/widget-news-thumbnail.php' );
      require( get_template_directory() . '/inc/widget-youtube.php' );
      require( get_template_directory() . '/templates/page-sitemap.php' );
    }
  }


/**
 * READMORE LINK TWEAK
 * Replaces the excerpt "more" text by a link
 * @link http://codex.wordpress.org/Function_Reference/the_excerpt
 */

add_filter( 'excerpt_more', 'ukmtheme_excerpt_more' );
  function ukmtheme_excerpt_more($more) {
    global $post;
      return '<a class="tukm-readmore" href="'. get_permalink($post->ID) . '">'. __( 'Read More','ukmtheme' ) . '</a>';
  }

// EDIT THIS link Tweak
//Add class to edit button

function ukmtheme_custom_edit_post_link($output) {
  $output = str_replace('class="post-edit-link"', 'class="post-edit-link uk-button uk-button-mini uk-button-primary"', $output);
    return $output;
}
add_filter('edit_post_link', 'ukmtheme_custom_edit_post_link');

// ADJUST EXCERPT LENGHT

add_filter( 'excerpt_length', 'ukmtheme_excerpt_length', 999 );
  function ukmtheme_excerpt_length( $length ) {
    return 20;
  }

// ADD EXTRA MIMETYPE

add_filter('upload_mimes','add_custom_mime_types');
  function add_custom_mime_types($mimes){
    return array_merge($mimes,array (
      'ac3' => 'audio/ac3',
      'mpa' => 'audio/MPA',
      'flv' => 'video/x-flv',
      'svg' => 'image/svg+xml'
    ));
  }

// SIDEBAR WIDGET

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

// WP TITLE

function ukmtheme_wp_title( $title, $sep ) {
  global $paged, $page;

  if ( is_feed() )
    return $title;

  // Add the site name.
  $title .= get_bloginfo( 'name', 'display' );

  // Add the site description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    $title = "$title $sep $site_description";

  // Add a page number if necessary.
  if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
    $title = "$title $sep " . sprintf( __( 'Page %s', 'ukmtheme' ), max( $paged, $page ) );

  return $title;
}
add_filter( 'wp_title', 'ukmtheme_wp_title', 10, 2 );