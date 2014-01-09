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

// Custom Column Adjustment
// @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column

add_action('manage_publication_posts_custom_column', 'ut_publication_custom_columns');
add_filter('manage_edit-publication_columns', 'ut_add_new_publication_columns');

function ut_add_new_publication_columns( $columns ){
  $columns = array(
    'cb'                  => '<input type="checkbox">',
    'ut_publication_cover'      => __( 'Cover', 'ukmtheme' ),
    'publication_category'      => __( 'Category', 'ukmtheme' ),
    'title'               => __( 'Title', 'ukmtheme' ),
    'ut_publication_author'   => __( 'Author', 'ukmtheme' ),
    'ut_publication_publisher' => __( 'Publisher', 'ukmtheme' ),
    'ut_publication_year' => __( 'Year', 'ukmtheme' )
  );
  return $columns;
}

function ut_publication_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'ut_publication_cover' : $saved_data = get_post_meta($post->ID,'ut_publication_cover',true); echo '<img src="'.$saved_data['url'].'" width="60">';break;
    case 'publication_category' : echo get_the_term_list( $post->ID, 'publication_category', '', ', ',''); break;
    case 'ut_publication_author' : $saved_data = get_post_meta($post->ID,'ut_publication_author',true); break;
    case 'ut_publication_publisher' : $saved_data = get_post_meta($post->ID,'ut_publication_publisher',true); break;
    case 'ut_publication_year' : $saved_data = get_post_meta($post->ID,'ut_publication_year',true); 
  }
}
?>