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
    'hierarchical' => true,
    'rewrite' => array('slug' => 'staff', 'with_front' => true),
    'query_var' => true,
    'supports' => array( 'title' ),
    'menu_icon' => get_template_directory_uri() . '/assets/images/admin/icon-staff.svg?ver=6.1.1',
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
array( 'hierarchical' => true,
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

/**
 * Filter by Category
 * - Department
 * - Position
 */

add_action('restrict_manage_posts','restrict_listings_by_department');
function restrict_listings_by_department() {
    global $typenow;
    global $wp_query;
    if ($typenow=='staff') {
    $taxonomy = 'department';
    $term = isset($wp_query->query['department']) ? $wp_query->query['department'] :'';
    $department_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' =>  __( 'All Department', 'ukmtheme' ),
            'taxonomy'        =>  $taxonomy,
            'name'            =>  'department',
            'orderby'         =>  'name',
            'selected'        =>  $term,
            'hierarchical'    =>  true,
            'depth'           =>  3,
            'show_count'      =>  true, // Show # listings in parens
            'hide_empty'      =>  true, // Don't show departmentes w/o listings
        ));
    }
}
add_filter('parse_query','convert_department_id_to_taxonomy_term_in_query');
function convert_department_id_to_taxonomy_term_in_query($query) {
    global $pagenow;
    $qv = &$query->query_vars;
    if ($pagenow=='edit.php' && isset($qv['department']) && is_numeric($qv['department'])) {
        $term = get_term_by('id',$qv['department'],'department');
        $qv['department'] = ($term ? $term->slug : '');
    }
}

add_action('restrict_manage_posts','restrict_listings_by_position');
function restrict_listings_by_position() {
    global $typenow;
    global $wp_query;
    if ($typenow=='staff') {
    $taxonomy = 'position';
    $term = isset($wp_query->query['position']) ? $wp_query->query['position'] :'';
    $position_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' =>  __( 'All Position', 'ukmtheme' ),
            'taxonomy'        =>  $taxonomy,
            'name'            =>  'position',
            'orderby'         =>  'name',
            'selected'        =>  $term,
            'hierarchical'    =>  true,
            'depth'           =>  3,
            'show_count'      =>  true, // Show # listings in parens
            'hide_empty'      =>  true, // Don't show positiones w/o listings
        ));
    }
}
add_filter('parse_query','convert_position_id_to_taxonomy_term_in_query');
function convert_position_id_to_taxonomy_term_in_query($query) {
    global $pagenow;
    $qv = &$query->query_vars;
    if ($pagenow=='edit.php' && isset($qv['position']) && is_numeric($qv['position'])) {
        $term = get_term_by('id',$qv['position'],'position');
        $qv['position'] = ($term ? $term->slug : '');
    }
}

// Custom Column Adjustment
// @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column

add_action('manage_staff_posts_custom_column', 'ut_staff_custom_columns');
add_filter('manage_edit-staff_columns', 'ut_add_new_staff_columns');

function ut_add_new_staff_columns( $columns ){
  $columns = array(
    'cb'                  => '<input type="checkbox">',
    'ut_staff_photo'      => __( 'Photo', 'ukmtheme' ),
    'title'               => __( 'Name', 'ukmtheme' ),
    'ut_staff_position'   => __( 'Position', 'ukmtheme' ),
    'ut_staff_department' => __( 'Department', 'ukmtheme' )   
  );
  return $columns;
}

function ut_staff_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'ut_staff_photo' : $saved_data = get_post_meta($post->ID,'ut_staff_photo',true); echo '<img src="'.$saved_data['url'].'" width="60">';break;
    case 'ut_staff_position' : echo get_the_term_list( $post->ID, 'position', '', ', ',''); break;
    case 'ut_staff_department' : echo get_the_term_list( $post->ID, 'department', '', ', ',''); break;
  }
}

?>