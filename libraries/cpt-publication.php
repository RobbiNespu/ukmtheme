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
 * Custom Post Type: Publication
 */

add_action('init', 'cptui_register_my_cpt_publication');
function cptui_register_my_cpt_publication() {
register_post_type('publication', array(
'label' => 'Publications',
'description' => 'publication_category publications e.g. Journals, Reports etc.',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'publication', 'with_front' => true),
'query_var' => true,
'has_archive' => true,
'supports' => array('title','editor',),
'menu_icon' => get_template_directory_uri() . '/assets/images/admin/icon-publication.svg?ver=6.1.1',
'labels' => array (
  'name' => 'Publications',
  'singular_name' => 'Publication',
  'menu_name' => 'Publications',
  'add_new' => 'Add New',
  'add_new_item' => 'Add New Publication',
  'edit' => 'Edit',
  'edit_item' => 'Edit Publication',
  'new_item' => 'New Publication',
  'view' => 'View Publication',
  'view_item' => 'View Publication',
  'search_items' => 'Search Publications',
  'not_found' => 'No Publications Found',
  'not_found_in_trash' => 'No Publications found in Trash',
  'parent' => 'Parent Publication',
)
) ); }

add_action('init', 'cptui_register_my_taxes_publication_category');
function cptui_register_my_taxes_publication_category() {
register_taxonomy( 'publication_category',array (
  0 => 'publication',
),
array( 'hierarchical' => true,
  'label' => 'Categories',
  'show_ui' => true,
  'query_var' => true,
  'show_admin_column' => false,
  'labels' => array (
  'search_items' => 'Category',
  'popular_items' => 'Popular Publication',
  'all_items' => 'All Publications',
  'parent_item' => 'Parent Publication',
  'parent_item_colon' => 'Parent Publication:',
  'edit_item' => 'Edit Publication',
  'update_item' => 'Update Publication',
  'add_new_item' => 'Add New Publication',
  'new_item_name' => 'New Publication Name',
  'separate_items_with_commas' => 'Separate publications with commas',
  'add_or_remove_items' => 'Add or Remove publications',
  'choose_from_most_used' => 'Choose from the most used publications',
)
) ); 
}

add_action('restrict_manage_posts','restrict_listings_by_publication_category');
function restrict_listings_by_publication_category() {
  global $typenow;
  global $wp_query;
  if ($typenow=='publication') {
  $taxonomy = 'publication_category';
  $term = isset($wp_query->query['publication_category']) ? $wp_query->query['publication_category'] :'';
  $publication_category_taxonomy = get_taxonomy($taxonomy);
    wp_dropdown_categories(array(
      'show_option_all' =>  __( 'All Publication', 'ukmtheme' ),
      'taxonomy'        =>  $taxonomy,
      'name'            =>  'Category',
      'orderby'         =>  'name',
      'selected'        =>  $term,
      'hierarchical'    =>  true,
      'depth'           =>  3,
      'show_count'      =>  true, // Show # listings in parens
      'hide_empty'      =>  true, // Don't show publication_categoryes w/o listings
    ));
  }
}
add_filter('parse_query','convert_publication_category_id_to_taxonomy_term_in_query');
function convert_publication_category_id_to_taxonomy_term_in_query($query) {
  global $pagenow;
  $qv = &$query->query_vars;
  if ($pagenow=='edit.php' && isset($qv['publication_category']) && is_numeric($qv['publication_category'])) {
    $term = get_term_by('id',$qv['publication_category'],'publication_category');
    $qv['publication_category'] = ($term ? $term->slug : '');
  }
}
?>