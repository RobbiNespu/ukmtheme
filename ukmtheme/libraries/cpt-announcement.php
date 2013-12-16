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

add_action('init', 'cptui_register_my_cpt_announcement');
function cptui_register_my_cpt_announcement() {
register_post_type('announcement', array(
'label' => 'Annc. & News',
'description' => 'Announcements or news',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'announcement', 'with_front' => true),
'query_var' => true,
'supports' => array('title','editor','excerpt','thumbnail'),
'menu_icon' => get_template_directory_uri() . '/assets/images/admin-menu-icon/icon-announcement.png',
'labels' => array (
    'name' => 'Annc. & News',
    'singular_name' => 'Annc. & News',
    'menu_name' => 'Annc. or News',
    'add_new' => 'Add New',
    'add_new_item' => 'Annc. & News',
    'edit' => 'Edit',
    'edit_item' => 'Edit Annc. & News',
    'new_item' => 'New Annc. & News',
    'view' => 'View Annc. & News',
    'view_item' => 'View Annc. & News',
    'search_items' => 'Search Annc. & News',
    'not_found' => 'No Annc. & News Found',
    'not_found_in_trash' => 'No Annc. & News found in Trash',
    'parent' => 'Parent Annc. & News',
    )
) ); }
?>