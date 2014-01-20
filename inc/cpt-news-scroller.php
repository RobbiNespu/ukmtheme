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

add_action('init', 'cptui_register_my_cpt_news_scroller');
function cptui_register_my_cpt_news_scroller() {
register_post_type('news_scroller', array(
'label' => 'News Scrollers',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'news_scroller', 'with_front' => true),
'query_var' => true,
'menu_icon' => get_template_directory_uri() . '/assets/images/admin/icon-news-scroller.svg?ver:6.1.1',
'has_archive' => true,
'supports' => array('title','editor',),
'labels' => array (
  'name' => 'News Scrollers',
  'singular_name' => 'News Scroller',
  'menu_name' => 'News Scrollers',
  'add_new' => 'Add News Scroller',
  'add_new_item' => 'Add New News Scroller',
  'edit' => 'Edit',
  'edit_item' => 'Edit News Scroller',
  'new_item' => 'New News Scroller',
  'view' => 'View News Scroller',
  'view_item' => 'View News Scroller',
  'search_items' => 'Search News Scrollers',
  'not_found' => 'No News Scrollers Found',
  'not_found_in_trash' => 'No News Scrollers Found in Trash',
  'parent' => 'Parent News Scroller',
)
) ); }
?>