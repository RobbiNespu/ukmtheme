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
 * Post Type: Press Release
 */

function ut_press() {

  $labels = array(
    'name'                => _x( 'Press Release', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Press Release', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Press Release', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Press Release:', 'ukmtheme' ),
    'all_items'           => __( 'All Press Release', 'ukmtheme' ),
    'view_item'           => __( 'View Press Release', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Press Release', 'ukmtheme' ),
    'add_new'             => __( 'New Press Release', 'ukmtheme' ),
    'edit_item'           => __( 'Edit Press Release', 'ukmtheme' ),
    'update_item'         => __( 'Update Press Release', 'ukmtheme' ),
    'search_items'        => __( 'Search Press Release', 'ukmtheme' ),
    'not_found'           => __( 'No Press Release found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No Press Release found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'Press Release', 'ukmtheme' ),
    'description'         => __( 'Press Release manager for UKM', 'ukmtheme' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'revisions', ),
    //'taxonomies'          => array( '' ),
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    //'menu_position'       => 20,
    'menu_icon'           => get_template_directory_uri() . '/assets/images/admin/icon-press.svg',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'press', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ut_press', 0 );

add_action('manage_press_posts_custom_column', 'ut_press_custom_columns');
add_filter('manage_edit-press_columns', 'ut_add_new_press_columns');

function ut_add_new_press_columns( $columns ){
  $columns = array(
    'cb'                  => '<input type="checkbox">',
    'ut_press_date'       => __( 'Date', 'ukmtheme' ),
    'title'               => __( 'Title', 'ukmtheme' ),
  );
  return $columns;
}

function ut_press_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'ut_press_date' : echo get_post_meta($post->ID,'ut_press_date',true); break;
  }
}

?>