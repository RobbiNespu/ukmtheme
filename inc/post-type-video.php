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
 * Post Type: Video
 */

function ut_video() {

  $labels = array(
    'name'                => _x( 'Video', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Video', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Video', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Video:', 'ukmtheme' ),
    'all_items'           => __( 'All Video', 'ukmtheme' ),
    'view_item'           => __( 'View Video', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Video', 'ukmtheme' ),
    'add_new'             => __( 'New Video', 'ukmtheme' ),
    'edit_item'           => __( 'Edit Video', 'ukmtheme' ),
    'update_item'         => __( 'Update Video', 'ukmtheme' ),
    'search_items'        => __( 'Search Video', 'ukmtheme' ),
    'not_found'           => __( 'No Video found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No Video found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'Video', 'ukmtheme' ),
    'description'         => __( 'Video manager for UKM', 'ukmtheme' ),
    'labels'              => $labels,
    'supports'            => array( 'title', ),
    //'taxonomies'          => array( 'category', 'post_tag' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    //'menu_position'       => 20,
    'menu_icon'           => get_template_directory_uri() . '/assets/images/admin/icon-video.svg?ver=6.3',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'video', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ut_video', 0 );

// Hook into the 'init' action
add_action( 'init', 'ut_video', 0 );

// Register Custom Taxonomy
function ut_video_category()  {

  $labels = array(
    'name'                       => _x( 'Video Categories', 'Taxonomy General Name', 'ukmtheme' ),
    'singular_name'              => _x( 'Video Category', 'Taxonomy Singular Name', 'ukmtheme' ),
    'menu_name'                  => __( 'Video Category', 'ukmtheme' ),
    'all_items'                  => __( 'All Categories', 'ukmtheme' ),
    'parent_item'                => __( 'Parent Category', 'ukmtheme' ),
    'parent_item_colon'          => __( 'Parent Category:', 'ukmtheme' ),
    'new_item_name'              => __( 'New Category Name', 'ukmtheme' ),
    'add_new_item'               => __( 'Add New Category', 'ukmtheme' ),
    'edit_item'                  => __( 'Edit Category', 'ukmtheme' ),
    'update_item'                => __( 'Update Category', 'ukmtheme' ),
    'separate_items_with_commas' => __( 'Separate Categories with commas', 'ukmtheme' ),
    'search_items'               => __( 'Search Categories', 'ukmtheme' ),
    'add_or_remove_items'        => __( 'Add or remove Categories', 'ukmtheme' ),
    'choose_from_most_used'      => __( 'Choose from the most used Categories', 'ukmtheme' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'vidcat', 'video', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ut_video_category', 0 );

// Custom Column Adjustment
// @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column

add_action('manage_video_posts_custom_column', 'ut_video_custom_columns');
add_filter('manage_edit-video_columns', 'ut_add_new_video_columns');

function ut_add_new_video_columns( $columns ){
  $columns = array(
    'cb'                          => '<input type="checkbox">',
    'title'                       => __( 'Title', 'ukmtheme' ),
    'vidcat'                      => __( 'Category', 'ukmtheme' ),
  );
  return $columns;
}

function ut_video_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'vidcat' : echo get_the_term_list( $post->ID, 'vidcat', '', ', ',''); break;
  }
}
?>