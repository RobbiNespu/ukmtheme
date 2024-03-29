<?php
/**
 *
 * @link http://www.ukm.my/template
 * @package ukmtheme
 * @version 6.x.x
 * @author Jamaludin Rajalu
 *
 */

/**
 * favicon.ico for all pages
 * wp-login, dashboard, frontpage
 */

function add_favicon() {
  $favicon_url = get_stylesheet_directory_uri() . '/favicon.ico';
  echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}

add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');

/**
 * Load admin scripts
 * Theme option for color picker
 */

add_action( 'admin_enqueue_scripts', 'ukmtheme_wp_admin_scripts' );
  function ukmtheme_wp_admin_scripts() {
    // Javascript
    wp_enqueue_script( 'thickbox' );
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-option', get_template_directory_uri() . '/js/admin.min.js', array('wp-color-picker'), '6.7', true );
    // Stylesheet
    wp_enqueue_style( 'thickbox' );
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( 'admin', get_template_directory_uri() . '/css/admin.min.css', false, '6.7' );

  }

/**
 * @link http://pexetothemes.com/support/knowledgebase/quick-gallery-not-displaying-image-attachment-titles-in-wordpress-3-7/
 */


function ukmtheme_add_title_to_attachment( $markup, $id ){
  $att = get_post( $id );
  return str_replace( '<a ', '<a title="'.$att->post_title.'" ', $markup );
}
add_filter( 'wp_get_attachment_link', 'ukmtheme_add_title_to_attachment', 10, 5 );

/**
 * skrip untuk antaramuka web
 * menjalankan javascript dan stylesheet
 * gunakan cdn untuk capaian pantas
 * @link cdnjs.com
 */

add_action( 'wp_enqueue_scripts', 'ukmtheme_scripts' );
  function ukmtheme_scripts() {
    // javascripts
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '2.13', false );
    wp_enqueue_script( 'library', get_template_directory_uri() . '/js/library.all.min.js', array(), '6.7', true );
    wp_enqueue_script( 'default', get_template_directory_uri() . '/js/scripts.min.js', array(), '6.7', true );
    // stylesheet
    wp_enqueue_style( 'style', get_stylesheet_uri(), false, '6.7' );
  }

/**
 * Semakan versi theme terkini secara automatik
 * jangan tukar nama folder theme "ukmtheme-master"
 */

require( 'inc/theme-update-checker.php' );
  new ThemeUpdateChecker(
    'ukmtheme-master',
    'https://raw.githubusercontent.com/jrajalu/ukmtheme/master/version.json'
);

/**
 * Tetapan pada theme
 * html5 support, post format, post thumbnail, automatic-feed-links, css, javascript
 * paparan admin bar pada muka hadapan disorokkan
 * saiz logo mengikut saiz lebar theme sekarang ialah 960x100 piksel
 */

add_action( 'after_setup_theme', 'ukmtheme_setup' );
  function ukmtheme_setup() {

    add_theme_support( 'html5', array( 'search-form' ) );
    add_theme_support( 'post-thumbnails' );

    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );

    load_theme_textdomain( 'ukmtheme', get_template_directory() . '/lang' );

    register_nav_menus( array(
      'top'       => __( 'Top Navigation', 'ukmtheme' ),
      'main'      => __( 'Main Navigation', 'ukmtheme' ),
      'footer'    => __( 'Footer Navigation', 'ukmtheme' ),
    ) );

    add_theme_support( 'custom-header', array(
      'width'         => 960,
      'height'        => 100,
      'default-image' => get_template_directory_uri() . '/img/logo.png',
      'uploads'       => true,
      'header-text'   => false,
      )
    );

    add_filter( 'show_admin_bar', '__return_false' );

  }

/**
 * Fuction luaran dari folder /inc/
 * Post type, metabox, widgets dll.
 * Comment pautan yang tidak diperlukan sekiranya tidak perlu
 */

add_action( 'after_setup_theme', 'ukmtheme_module' );
  if (!function_exists('ukmtheme_module')) {
    function ukmtheme_module() {

      /** Post Type */
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

      /**
       *
       * Theme configuration
       *
       * Appearance > Theme Options
       * Appearance > The Docs
       *
       */
      require( get_template_directory() . '/inc/theme-archive-links.php' );
      require( get_template_directory() . '/inc/theme-include-archive.php' );
      require( get_template_directory() . '/inc/theme-include-single.php' );
      require( get_template_directory() . '/inc/theme-include-taxonomy.php' );
      require( get_template_directory() . '/inc/theme-metabox.php' );
      require( get_template_directory() . '/inc/theme-walker-menu.php' );
      require( get_template_directory() . '/inc/theme-options.php' );
      require( get_template_directory() . '/inc/theme-docs.php' );
      require( get_template_directory() . '/inc/theme-login.php' );
      require( get_template_directory() . '/inc/theme-plugins.php' );
      require( get_template_directory() . '/inc/theme-sitemap.php' );

      /**
       * Widget items
       * Appearance > Widgets
       */
      require( get_template_directory() . '/inc/widget-appreciation.php' );
      require( get_template_directory() . '/inc/widget-event.php' );
      require( get_template_directory() . '/inc/widget-news-list.php' );
      require( get_template_directory() . '/inc/widget-news-thumbnail.php' );
      require( get_template_directory() . '/inc/widget-youtube.php' );
    }
  }

/**
 * Excerpt
 * Replaces the excerpt "more" text by a link
 * Adjust excerpt lenght
 * @link http://codex.wordpress.org/Function_Reference/the_excerpt
 */

add_filter( 'excerpt_more', 'ukmtheme_excerpt_more' );
  function ukmtheme_excerpt_more($more) {
    global $post;
      return '<a class="tukm-readmore" href="'. get_permalink($post->ID) . '">'. __( 'Read More','ukmtheme' ) . '</a>';
  }

add_filter( 'excerpt_length', 'ukmtheme_excerpt_length', 999 );
  function ukmtheme_excerpt_length( $length ) {
    return 20;
  }

/**
 * Add class to edit post link
 * @link http://codex.wordpress.org/Function_Reference/edit_post_link
 */

function ukmtheme_custom_edit_post_link($output) {
  $output = str_replace('class="post-edit-link"', 'class="post-edit-link"', $output);
    return $output;
}
add_filter('edit_post_link', 'ukmtheme_custom_edit_post_link');

/**
 * Add extra mimetype
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/upload_mimes
 */

add_filter('upload_mimes','add_custom_mime_types');
  function add_custom_mime_types($mimes){
    return array_merge($mimes,array (
      'ac3' => 'audio/ac3',
      'mpa' => 'audio/MPA',
      'flv' => 'video/x-flv',
      'svg' => 'image/svg+xml'
    ));
  }

/**
 * Register Sidebar
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */

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
      'name'            => __( 'Frontpage One Box', 'ukmtheme' ),
      'id'              => 'sidebar-7',
      'description'     => __( 'Appears when using the optional Front Page', 'ukmtheme' ),
      'before_widget'   => '<span>',
      'after_widget'    => '</span>',
      'before_title'    => '<h3 class="widget-title uk-hidden">',
      'after_title'     => '</h3>',
    ) );

    register_sidebar( array(
      'name'            => __( 'Frontpage Three Boxes', 'ukmtheme' ),
      'id'              => 'sidebar-3',
      'description'     => __( 'Appears when using the optional Front Page', 'ukmtheme' ),
      'before_widget'   => '<aside class="pure-u-1-3"><div class="uk-panel widgets-wrap">',
      'after_widget'    => '</div></aside>',
      'before_title'    => '<h3 class="widget-title">',
      'after_title'     => '</h3>',
    ) );

    register_sidebar( array(
      'name'            => __( 'Frontpage Four Boxes', 'ukmtheme' ),
      'id'              => 'sidebar-4',
      'description'     => __( 'Appears when using the optional Front Page', 'ukmtheme' ),
      'before_widget'   => '<aside class="pure-u-1-4"><div class="uk-panel widgets-wrap">',
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
      'description'     => __( 'Appears in left footer', 'ukmtheme' ),
      'before_widget'   => '<span>',
      'after_widget'    => '</span>',
      'before_title'    => '<h3 class="widget-title uk-hidden">',
      'after_title'     => '</h3>',
    ) );
  }
}

/**
 * wp_title
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/wp_title
 */

function ukmtheme_wp_title( $title, $sep ) {
  global $paged, $page;

  if ( is_feed() )
    return $title;

  $title .= get_bloginfo( 'name', 'display' );

  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    $title = "$title $sep $site_description";

  if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
    $title = "$title $sep " . sprintf( __( 'Page %s', 'ukmtheme' ), max( $paged, $page ) );

  return $title;
}
add_filter( 'wp_title', 'ukmtheme_wp_title', 10, 2 );

/**
 * Searchform HTML5
 * @link http://codex.wordpress.org/Function_Reference/get_search_form
 */

function ukmtheme_search_form( $form ) {
  $form = '<form role="search" method="get" class="uk-form" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
  <input type="search" class="search-field" placeholder="' . esc_attr__( 'Search...','ukmtheme' ) . '" value="' . get_search_query() . '" name="s" id="s" />
  <button class="search-submit uk-button uk-button-primary" id="searchsubmit">'. esc_attr__( 'Search' ) .'</button>
  </form>';

  return $form;
}

add_filter( 'get_search_form', 'ukmtheme_search_form' );

/**
 * Custom Post Type Feed
 * @link http://www.wpbeginner.com/wp-tutorials/how-to-add-custom-post-types-to-your-main-wordpress-rss-feed/
 */

function ukmtheme_feed_request($qv) {
  if (isset($qv['feed']) && !isset($qv['post_type']))
    $qv['post_type'] = array( 'news', 'event' );
  return $qv;
}
add_filter( 'request', 'ukmtheme_feed_request' );

/**
 * Contact form 7
 * Add class "form"
 */

add_filter( 'wpcf7_form_class_attr', 'ukmtheme_custom_form_class_attr' );

function ukmtheme_custom_form_class_attr( $class ) {
  $class .= ' uk-form';
  return $class;
}

/**
 * Enabling HTML in your category & taxonomy descriptions
 * @link http://docs.appthemes.com/tutorials/allow-html-in-wordpress-category-taxonomy-descriptions/
 */

remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'pre_link_description', 'wp_filter_kses' );
remove_filter( 'pre_link_notes', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );