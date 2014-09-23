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
 * Post Type: Appreciation
 */

function ut_appreciation() {

  $labels = array(
    'name'                => _x( 'Appreciation', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Appreciation', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Appreciation', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Appreciation:', 'ukmtheme' ),
    'all_items'           => __( 'All Appreciation', 'ukmtheme' ),
    'view_item'           => __( 'View Appreciation', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Appreciation', 'ukmtheme' ),
    'add_new'             => __( 'New Appreciation', 'ukmtheme' ),
    'edit_item'           => __( 'Edit Appreciation', 'ukmtheme' ),
    'update_item'         => __( 'Update Appreciation', 'ukmtheme' ),
    'search_items'        => __( 'Search Appreciation', 'ukmtheme' ),
    'not_found'           => __( 'No Appreciation found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No Appreciation found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'Appreciation', 'ukmtheme' ),
    'description'         => __( 'Appreciation manager for UKM', 'ukmtheme' ),
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
    'menu_icon'           => get_template_directory_uri() . '/assets/images/admin/icon-appreciation.svg?ver=6.3',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'appreciation', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ut_appreciation', 0 );

// Custom Column Adjustment
// @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column
add_action('manage_appreciation_posts_custom_column', 'ut_appreciation_custom_columns');
add_filter('manage_edit-appreciation_columns', 'ut_add_new_appreciation_columns');

function ut_add_new_appreciation_columns( $columns ){
  $columns = array(
    'cb'                    => '<input type="checkbox">',
    'title'                 => __( 'Greeting', 'ukmtheme' ),
    'ut_appreciation_by'    => __( 'By','ukmtheme' ),
    'ut_appreciation_ptj'   => __( 'PTJ','ukmtheme' ),
    'ut_appreciation_date'  => __( 'Date','ukmtheme' )
  );
  return $columns;
}

function ut_appreciation_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'ut_appreciation_by' : echo get_post_meta($post->ID,'ut_appreciation_by',true); break;
    case 'ut_appreciation_ptj' : echo get_post_meta($post->ID,'ut_appreciation_ptj',true); break;
    case 'ut_appreciation_date' : echo get_post_meta($post->ID,'ut_appreciation_date',true); break;
  }
}

?>