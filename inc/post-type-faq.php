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
 * Post Type: Frequently Asked Questions
 */

function ut_faq() {

  $labels = array(
    'name'                => _x( 'FAQs', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'FAQ', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'FAQ', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent FAQ:', 'ukmtheme' ),
    'all_items'           => __( 'All FAQs', 'ukmtheme' ),
    'view_item'           => __( 'View FAQ', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New FAQ', 'ukmtheme' ),
    'add_new'             => __( 'New FAQ', 'ukmtheme' ),
    'edit_item'           => __( 'Edit FAQ', 'ukmtheme' ),
    'update_item'         => __( 'Update FAQ', 'ukmtheme' ),
    'search_items'        => __( 'Search FAQs', 'ukmtheme' ),
    'not_found'           => __( 'No FAQs found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No FAQs found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'faq', 'ukmtheme' ),
    'description'         => __( 'FAQ manager for UKM', 'ukmtheme' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'revisions', ),
    //'taxonomies'          => array( 'category', 'post_tag' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    //'menu_position'       => 20,
    'menu_icon'           => get_template_directory_uri() . '/assets/images/admin/icon-faq.svg?ver=6.1',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'faq', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ut_faq', 0 );

// Custom Column Adjustment
// @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column

add_filter('manage_edit-faq_columns', 'ut_add_new_faq_columns');

function ut_add_new_faq_columns( $columns ){
  $columns = array(
    'cb'                  => '<input type="checkbox">',
    'title'               => __( 'Question', 'ukmtheme' ), 
  );
  return $columns;
}

?>