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
 * Post Type: Expertise
 */
function ut_expertise() {

  $labels = array(
    'name'                => _x( 'Expertise', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Expertise', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Expertise', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Expertise:', 'ukmtheme' ),
    'all_items'           => __( 'All Expertise', 'ukmtheme' ),
    'view_item'           => __( 'View Expertise', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Expertise', 'ukmtheme' ),
    'add_new'             => __( 'New Expertise', 'ukmtheme' ),
    'edit_item'           => __( 'Edit Expertise', 'ukmtheme' ),
    'update_item'         => __( 'Update Expertise', 'ukmtheme' ),
    'search_items'        => __( 'Search Expertise', 'ukmtheme' ),
    'not_found'           => __( 'No Expertise found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No Expertise found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'expertise', 'ukmtheme' ),
    'description'         => __( 'Expertise manager for UKM', 'ukmtheme' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'revisions', ),
    //'taxonomies'          => array( 'category', 'post_tag' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    //'menu_position'       => 20,
    'menu_icon'           => get_template_directory_uri() . '/assets/images/admin/icon-expertise.svg?ver=6.1.5',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'expertise', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ut_expertise', 0 );

?>