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
 * Post Type: News
 */

function ut_news_portal() {

  $labels = array(
    'name'                => _x( 'News Portal', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'News', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'News Portal', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent News:', 'ukmtheme' ),
    'all_items'           => __( 'All News', 'ukmtheme' ),
    'view_item'           => __( 'View News', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New News', 'ukmtheme' ),
    'add_new'             => __( 'New News', 'ukmtheme' ),
    'edit_item'           => __( 'Edit News', 'ukmtheme' ),
    'update_item'         => __( 'Update News', 'ukmtheme' ),
    'search_items'        => __( 'Search News', 'ukmtheme' ),
    'not_found'           => __( 'No News found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No News found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'News', 'ukmtheme' ),
    'description'         => __( 'News manager for UKM', 'ukmtheme' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'revisions', ),
    //'taxonomies'          => array( 'category', 'post_tag' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    //'menu_position'       => 20,
    'menu_icon'           => get_template_directory_uri() . '/img/icon-news-portal.svg',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'news_portal', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ut_news_portal', 0 );
?>