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
'menu_icon' => get_template_directory_uri() . '/assets/images/admin/icon-slideshow.svg?ver:6.1.1',
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

?>