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
 * Post Type: Tabber
 */

function ut_tab() {

  $labels = array(
    'name'                => _x( 'Tab', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Tab', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Tabber', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Tab:', 'ukmtheme' ),
    'all_items'           => __( 'All Tab', 'ukmtheme' ),
    'view_item'           => __( 'View Tab', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Tab', 'ukmtheme' ),
    'add_new'             => __( 'New Tab', 'ukmtheme' ),
    'edit_item'           => __( 'Edit Tab', 'ukmtheme' ),
    'update_item'         => __( 'Update Tab', 'ukmtheme' ),
    'search_items'        => __( 'Search Tab', 'ukmtheme' ),
    'not_found'           => __( 'No Tab found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No Tab found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'Tab', 'ukmtheme' ),
    'description'         => __( 'Tab manager for UKM', 'ukmtheme' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
    //'taxonomies'          => array( 'category', 'post_tag' ),
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    //'menu_position'       => 20,
    'menu_icon'           => get_template_directory_uri() . '/assets/images/admin/icon-tab.svg?ver=6.2',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'tab', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ut_tab', 0 );
?>