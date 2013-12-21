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

add_action('init', 'cptui_register_my_cpt_event');
function cptui_register_my_cpt_event() {
register_post_type('event', array(
'label' => 'Events',
'description' => 'Depatment events management',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'event', 'with_front' => true),
'query_var' => true,
'has_archive' => true,
'menu_position' => '5',
'menu_icon' => get_template_directory_uri() . '/assets/images/admin/icon-event.svg?ver:6.1.1',
'supports' => array('title'),
'labels' => array (
  'name' => 'Events',
  'singular_name' => 'Event',
  'menu_name' => 'Events',
  'add_new' => 'Add New',
  'add_new_item' => 'Add New Event',
  'edit' => 'Edit',
  'edit_item' => 'Edit Event',
  'new_item' => 'New Event',
  'view' => 'View Event',
  'view_item' => 'View Event',
  'search_items' => 'Search Events',
  'not_found' => 'No Events Found',
  'not_found_in_trash' => 'No Events found in Trash',
  'parent' => 'Parent Event',
)
) ); }

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