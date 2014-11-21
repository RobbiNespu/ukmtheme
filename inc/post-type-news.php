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

// Register Custom Post Type
function ukmtheme_latest_news() {

  $labels = array(
    'name'                => _x( 'News', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'News', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'News', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent News:', 'ukmtheme' ),
    'all_items'           => __( 'All News', 'ukmtheme' ),
    'view_item'           => __( 'View News', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New News', 'ukmtheme' ),
    'add_new'             => __( 'Add New', 'ukmtheme' ),
    'edit_item'           => __( 'Edit News', 'ukmtheme' ),
    'update_item'         => __( 'Update News', 'ukmtheme' ),
    'search_items'        => __( 'Search News', 'ukmtheme' ),
    'not_found'           => __( 'Not found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'ukmtheme' ),
  );
  $rewrite = array(
    'slug'                => 'Latest_News',
    'with_front'          => true,
    'pages'               => true,
    'feeds'               => true,
  );
  $args = array(
    'label'               => __( 'ukmnews', 'ukmtheme' ),
    'description'         => __( 'Latest News', 'ukmtheme' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    //'menu_position'       => 20,
    'menu_icon'           => get_template_directory_uri() . '/assets/images/admin/icon-news.svg',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'query_var'           => 'news',
    'rewrite'             => $rewrite,
    'capability_type'     => 'post',
  );
  register_post_type( 'news', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ukmtheme_latest_news', 0 );

/**
 * Custom Taxonomy: News Category
 */

function ukmtheme_news_category_taxonomy() {

  $labels = array(
    'name'                       => _x( 'News Categories', 'Taxonomy General Name', 'ukmtheme' ),
    'singular_name'              => _x( 'News Category', 'Taxonomy Singular Name', 'ukmtheme' ),
    'menu_name'                  => __( 'News Category', 'ukmtheme' ),
    'all_items'                  => __( 'All Items', 'ukmtheme' ),
    'parent_item'                => __( 'Parent News Category', 'ukmtheme' ),
    'parent_item_colon'          => __( 'Parent News Category:', 'ukmtheme' ),
    'new_item_name'              => __( 'New News Category Name', 'ukmtheme' ),
    'add_new_item'               => __( 'Add New News Category', 'ukmtheme' ),
    'edit_item'                  => __( 'Edit News Category', 'ukmtheme' ),
    'update_item'                => __( 'Update News Category', 'ukmtheme' ),
    'separate_items_with_commas' => __( 'Separate News Categories with commas', 'ukmtheme' ),
    'search_items'               => __( 'Search News Categories', 'ukmtheme' ),
    'add_or_remove_items'        => __( 'Add or remove News Categories', 'ukmtheme' ),
    'choose_from_most_used'      => __( 'Choose from the most used News Categories', 'ukmtheme' ),
    'not_found'                  => __( 'Not Found', 'ukmtheme' ),
  );
  $rewrite = array(
    'slug'                       => 'News_Category',
    'with_front'                 => true,
    'hierarchical'               => false,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => false,
    'query_var'                  => 'newscat',
    'rewrite'                    => $rewrite,
  );
  register_taxonomy( 'newscat', array( 'news' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'ukmtheme_news_category_taxonomy', 0 );