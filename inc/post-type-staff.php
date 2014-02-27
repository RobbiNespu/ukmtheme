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
 * Post Type: Staff Directory
 * 20140121
 */

function ut_staff_directory() {

  $labels = array(
    'name'                => _x( 'Staffs', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Staff', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Staff', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Staff:', 'ukmtheme' ),
    'all_items'           => __( 'All Staffs', 'ukmtheme' ),
    'view_item'           => __( 'View Staff', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Staff', 'ukmtheme' ),
    'add_new'             => __( 'New Staff', 'ukmtheme' ),
    'edit_item'           => __( 'Edit Staff', 'ukmtheme' ),
    'update_item'         => __( 'Update Staff', 'ukmtheme' ),
    'search_items'        => __( 'Search Staffs', 'ukmtheme' ),
    'not_found'           => __( 'No Staffs found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No Staffs found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'staff', 'ukmtheme' ),
    'description'         => __( 'Staff information pages', 'ukmtheme' ),
    'labels'              => $labels,
    'supports'            => array( 'title', ),
    'taxonomies'          => array( 'department', 'position' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    //'menu_position'       => 20,
    'menu_icon'           => get_template_directory_uri() . '/assets/images/admin/icon-staff.svg?ver=6.1',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'staff', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ut_staff_directory', 0 );


// Register Custom Taxonomy
function ut_staff_directory_department()  {

  $labels = array(
    'name'                       => _x( 'Departments', 'Taxonomy General Name', 'ukmtheme' ),
    'singular_name'              => _x( 'Department', 'Taxonomy Singular Name', 'ukmtheme' ),
    'menu_name'                  => __( 'Department', 'ukmtheme' ),
    'all_items'                  => __( 'All Departments', 'ukmtheme' ),
    'parent_item'                => __( 'Parent Department', 'ukmtheme' ),
    'parent_item_colon'          => __( 'Parent Department:', 'ukmtheme' ),
    'new_item_name'              => __( 'New Department Name', 'ukmtheme' ),
    'add_new_item'               => __( 'Add New Department', 'ukmtheme' ),
    'edit_item'                  => __( 'Edit Department', 'ukmtheme' ),
    'update_item'                => __( 'Update Department', 'ukmtheme' ),
    'separate_items_with_commas' => __( 'Separate Departments with commas', 'ukmtheme' ),
    'search_items'               => __( 'Search Departments', 'ukmtheme' ),
    'add_or_remove_items'        => __( 'Add or remove Departments', 'ukmtheme' ),
    'choose_from_most_used'      => __( 'Choose from the most used Departments', 'ukmtheme' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'department', 'staff', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ut_staff_directory_department', 0 );

// Register Custom Taxonomy
function ut_staff_directory_position()  {

  $labels = array(
    'name'                       => _x( 'Positions', 'Taxonomy General Name', 'ukmtheme' ),
    'singular_name'              => _x( 'Position', 'Taxonomy Singular Name', 'ukmtheme' ),
    'menu_name'                  => __( 'Position', 'ukmtheme' ),
    'all_items'                  => __( 'All Positions', 'ukmtheme' ),
    'parent_item'                => __( 'Parent Position', 'ukmtheme' ),
    'parent_item_colon'          => __( 'Parent Position:', 'ukmtheme' ),
    'new_item_name'              => __( 'New Position Name', 'ukmtheme' ),
    'add_new_item'               => __( 'Add New Position', 'ukmtheme' ),
    'edit_item'                  => __( 'Edit Position', 'ukmtheme' ),
    'update_item'                => __( 'Update Position', 'ukmtheme' ),
    'separate_items_with_commas' => __( 'Separate Positions with commas', 'ukmtheme' ),
    'search_items'               => __( 'Search Positions', 'ukmtheme' ),
    'add_or_remove_items'        => __( 'Add or remove Positions', 'ukmtheme' ),
    'choose_from_most_used'      => __( 'Choose from the most used Positions', 'ukmtheme' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'position', 'staff', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ut_staff_directory_position', 0 );

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
    case 'ut_staff_photo' : $staffPhoto = get_post_meta($post->ID,'ut_staff_photo',true); echo '<img src="'.$staffPhoto.'" width="60">';break;
    case 'ut_staff_position' : echo get_the_term_list( $post->ID, 'position', '', ', ',''); break;
    case 'ut_staff_department' : echo get_the_term_list( $post->ID, 'department', '', ', ',''); break;
  }
}

?>