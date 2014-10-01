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
 * Post Type: Gallery
 */

function ut_gallery() {

  $labels = array(
    'name'                => _x( 'Gallery', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Gallery', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Gallery', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Gallery:', 'ukmtheme' ),
    'all_items'           => __( 'All Gallery', 'ukmtheme' ),
    'view_item'           => __( 'View Gallery', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Gallery', 'ukmtheme' ),
    'add_new'             => __( 'New Gallery', 'ukmtheme' ),
    'edit_item'           => __( 'Edit Gallery', 'ukmtheme' ),
    'update_item'         => __( 'Update Gallery', 'ukmtheme' ),
    'search_items'        => __( 'Search Gallery', 'ukmtheme' ),
    'not_found'           => __( 'No Gallery found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No Gallery found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'Gallery', 'ukmtheme' ),
    'description'         => __( 'Gallery manager for UKM', 'ukmtheme' ),
    'labels'              => $labels,
    'supports'            => array( 'title' ),
    //'taxonomies'          => array( 'category', 'post_tag' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    //'menu_position'       => 20,
    'menu_icon'           => get_template_directory_uri() . '/assets/images/admin/icon-gallery.svg?ver=6.3',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'gallery', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ut_gallery', 0 );
?>