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
add_action('init', 'cptui_register_my_cpt_faq');
function cptui_register_my_cpt_faq() {
register_post_type('faq', array(
'label' => 'FAQs',
'description' => 'Frequently asked question. a list of questions and answers relating to a particular subject.',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'faq', 'with_front' => true),
'query_var' => true,
'supports' => array('title','editor'),
'menu_icon' => get_template_directory_uri() . '/assets/images/admin/icon-faq.svg?ver:6.1.1',
'labels' => array (
    'name' => 'FAQs',
    'singular_name' => 'FAQ',
    'menu_name' => 'FAQs',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New FAQ',
    'edit' => 'Edit',
    'edit_item' => 'Edit FAQ',
    'new_item' => 'New FAQ',
    'view' => 'View FAQ',
    'view_item' => 'View FAQ',
    'search_items' => 'Search FAQ',
    'not_found' => 'No FAQ Found',
    'not_found_in_trash' => 'No FAQ found in Trash',
    'parent' => 'Parent FAQ',
)
) ); }
?>