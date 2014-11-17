<?php
/**
 * @link http://www.ukm.my/template
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 *
 * Post Type: News Scroller
 */
function ut_news_scroller() {

  $labels = array(
    'name'                => _x( 'News Scrollers', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'News Scroller', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'News Scroller', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent News Scroller:', 'ukmtheme' ),
    'all_items'           => __( 'All News Scrollers', 'ukmtheme' ),
    'view_item'           => __( 'View News Scroller', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New News Scroller', 'ukmtheme' ),
    'add_new'             => __( 'New News Scroller', 'ukmtheme' ),
    'edit_item'           => __( 'Edit News Scroller', 'ukmtheme' ),
    'update_item'         => __( 'Update News Scroller', 'ukmtheme' ),
    'search_items'        => __( 'Search News Scrollers', 'ukmtheme' ),
    'not_found'           => __( 'No News Scrollers found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No News Scrollers found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'news_scroller', 'ukmtheme' ),
    'description'         => __( 'News Scroller manager for UKM', 'ukmtheme' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'revisions', ),
    //'taxonomies'          => array( 'category', 'post_tag' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    //'menu_position'       => 20,
    'menu_icon'           => get_template_directory_uri() . '/assets/images/admin/icon-news-scroller.svg?ver=6.3',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'news_scroller', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ut_news_scroller', 0 );

?>