<?php
/**
 * @link http://www.ukm.my/template
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */

// Register Custom Post Type
function ut_event() {

  $labels = array(
    'name'                => _x( 'Events', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Event', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Event:', 'ukmtheme' ),
    'all_items'           => __( 'All Events', 'ukmtheme' ),
    'view_item'           => __( 'View Event', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Event', 'ukmtheme' ),
    'add_new'             => __( 'New Event', 'ukmtheme' ),
    'edit_item'           => __( 'Edit Event', 'ukmtheme' ),
    'update_item'         => __( 'Update Event', 'ukmtheme' ),
    'search_items'        => __( 'Search Events', 'ukmtheme' ),
    'not_found'           => __( 'No Events found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No Events found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'event', 'ukmtheme' ),
    'description'         => __( 'Event manager for UKM', 'ukmtheme' ),
    'labels'              => $labels,
    'supports'            => array( 'title', ),
    //'taxonomies'          => array( 'category', 'post_tag' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 60,
    'menu_icon'           => get_template_directory_uri() . '/assets/images/admin/icon-event.svg?ver=6.1.5',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'event', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ut_event', 0 );

// Custom Column Adjustment
// @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column

add_action('manage_event_posts_custom_column', 'ut_event_custom_columns');
add_filter('manage_edit-event_columns', 'ut_add_new_event_columns');

function ut_add_new_event_columns( $columns ){
  $columns = array(
    'cb'                  => '<input type="checkbox">',
    'title'               => __( 'Event', 'ukmtheme' ),
    'ut_event_date'       => __( 'Date', 'ukmtheme' ),
    'ut_event_start_time' => __( 'Start', 'ukmtheme' ),
    'ut_event_end_time'   => __( 'End', 'ukmtheme' ),
    'ut_event_venue'      => __( 'Venue', 'ukmtheme' )   
  );
  return $columns;
}

function ut_event_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'ut_event_date' : echo get_post_meta($post->ID,'ut_event_date',true); break;
    case 'ut_event_start_time' : echo get_post_meta($post->ID,'ut_event_start_time',true); break;
    case 'ut_event_end_time' : echo get_post_meta($post->ID,'ut_event_end_time',true); break;
    case 'ut_event_venue' : echo get_post_meta($post->ID,'ut_event_venue',true); break;
  }
}
?>