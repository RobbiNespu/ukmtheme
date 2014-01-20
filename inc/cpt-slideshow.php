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
add_action('init', 'cptui_register_my_cpt_slideshow');
function cptui_register_my_cpt_slideshow() {
register_post_type('slideshow', array(
'label' => 'Slideshows',
'description' => 'Frontpage slideshow',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'slideshow', 'with_front' => true),
'query_var' => true,
'supports' => array('title'),
'menu_icon' => get_template_directory_uri() . '/assets/images/admin/icon-slideshow.svg?ver=6.1.1',
'labels' => array (
    'name' => 'Slideshows',
    'singular_name' => 'Slideshow',
    'menu_name' => 'Slideshows',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Image',
    'edit' => 'Edit',
    'edit_item' => 'Edit Image',
    'new_item' => 'New Image',
    'view' => 'View Image',
    'view_item' => 'View Image',
    'search_items' => 'Search Images',
    'not_found' => 'No Images Found',
    'not_found_in_trash' => 'No Images found in Trash',
    'parent' => 'Parent Image',
)
) ); }

// Custom Column Adjustment
// @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column

add_action('manage_slideshow_posts_custom_column', 'ut_slideshow_custom_columns');
add_filter('manage_edit-slideshow_columns', 'ut_add_new_slideshow_columns');

function ut_add_new_slideshow_columns( $columns ){
  $columns = array(
    'cb'                    => '<input type="checkbox">',
    'ut_slideshow_image'    => __( 'Image', 'ukmtheme' ),
    'title'                 => __( 'Title', 'ukmtheme' ),
    'date'                  => __( 'Date', 'ukmtheme' )
  );
  return $columns;
}

function ut_slideshow_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'ut_slideshow_image' : $saved_data = get_post_meta($post->ID,'ut_slideshow_image',true); echo '<img src="'.$saved_data['url'].'" width="120">';break;
  }
}

?>