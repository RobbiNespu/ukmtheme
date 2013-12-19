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

add_action('init', 'cptui_register_my_cpt_staff');
function cptui_register_my_cpt_staff() {
  register_post_type('staff', array(
    'label' => 'Staffs',
    'description' => 'Staff directory for our department.',
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'capability_type' => 'post',
    'map_meta_cap' => true,
    'hierarchical' => false,
    'rewrite' => array('slug' => 'staff', 'with_front' => true),
    'query_var' => true,
    'supports' => array('title'),
    'menu_icon' => get_template_directory_uri() . '/assets/images/admin/icon-staff.svg?ver:6.1.1',
    'labels' => array (
        'name' => 'Staffs',
        'singular_name' => 'Staff',
        'menu_name' => 'Staff Directory',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Staff',
        'edit' => 'Edit',
        'edit_item' => 'Edit Staff',
        'new_item' => 'New Staff',
        'view' => 'View Staff',
        'view_item' => 'View Staff',
        'search_items' => 'Search Staff',
        'not_found' => 'No Staff Found',
        'not_found_in_trash' => 'No Staff found in Trash',
        'parent' => 'Parent Staff',
    )
) ); }

add_action('init', 'cptui_register_my_taxes_department');
function cptui_register_my_taxes_department() {
register_taxonomy( 'department',array (
  0 => 'staff',
),
array( 'hierarchical' => false,
  'label' => 'Departments',
  'show_ui' => true,
  'query_var' => true,
  'rewrite' => array( 'slug' => 'department' ),
  'show_admin_column' => true,
  'labels' => array (
      'search_items' => 'Department',
      'popular_items' => 'Popular Departments',
      'all_items' => 'All Department',
      'parent_item' => 'Parent Department',
      'parent_item_colon' => 'Parent Department:',
      'edit_item' => 'Edit Department',
      'update_item' => 'Update Department',
      'add_new_item' => 'Add New Department',
      'new_item_name' => 'New Department Name',
      'separate_items_with_commas' => 'Separate departments with commas',
      'add_or_remove_items' => 'Add or remove departments',
      'choose_from_most_used' => 'Choose from the most used departments',
    )
) ); }

add_action('init', 'cptui_register_my_taxes_position');
function cptui_register_my_taxes_position() {
register_taxonomy( 'position',array (
  0 => 'staff',
),
array( 'hierarchical' => false,
  'label' => 'Positions',
  'show_ui' => true,
  'query_var' => true,
  'rewrite' => array( 'slug' => 'position' ),
  'show_admin_column' => false,
  'labels' => array (
      'search_items' => 'Position',
      'popular_items' => 'Popular Positions',
      'all_items' => 'All Positions',
      'parent_item' => 'Parent Position',
      'parent_item_colon' => 'Parent Position:',
      'edit_item' => 'Edit Position',
      'update_item' => 'Update Position',
      'add_new_item' => 'Add New Position',
      'new_item_name' => 'New Position Name',
      'separate_items_with_commas' => 'Separate positions with commas',
      'add_or_remove_items' => 'Add or remove positions',
      'choose_from_most_used' => 'Choose from the most used positionss',
    )
) ); }

// Filter by Category

add_action('restrict_manage_posts','restrict_listings_by_department');
function restrict_listings_by_department() {
    global $typenow;
    global $wp_query;
    if ($typenow=='staff') {
        $taxonomy = 'department';
        $department_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' =>  __("Show All {$department_taxonomy->label}"),
            'taxonomy'        =>  $taxonomy,
            'name'            =>  'department',
            'orderby'         =>  'name',
            'selected'        =>  $wp_query->query['term'],
            'hierarchical'    =>  true,
            'depth'           =>  3,
            'show_count'      =>  true, // Show # listings in parens
            'hide_empty'      =>  true, // Don't show businesses w/o listings
        ));
    }
}

add_action('restrict_manage_posts','restrict_listings_by_position');
function restrict_listings_by_position() {
    global $typenow;
    global $wp_query;
    if ($typenow=='staff') {
        $taxonomy = 'position';
        $position_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' =>  __("Show All {$position_taxonomy->label}"),
            'taxonomy'        =>  $taxonomy,
            'name'            =>  'position',
            'orderby'         =>  'name',
            'selected'        =>  $wp_query->query['term'],
            'hierarchical'    =>  true,
            'depth'           =>  3,
            'show_count'      =>  true, // Show # listings in parens
            'hide_empty'      =>  true, // Don't show businesses w/o listings
        ));
    }
}

?>