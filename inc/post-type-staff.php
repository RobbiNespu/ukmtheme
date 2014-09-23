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

// Register Custom Post Type
function ukmtheme_staff_directory() {

  $labels = array(
    'name'                => _x( 'Staffs', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Staff', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Staff Directory', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Staff:', 'ukmtheme' ),
    'all_items'           => __( 'All Staffs', 'ukmtheme' ),
    'view_item'           => __( 'View Staff', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Staff', 'ukmtheme' ),
    'add_new'             => __( 'Add New', 'ukmtheme' ),
    'edit_item'           => __( 'Edit Staff', 'ukmtheme' ),
    'update_item'         => __( 'Update Staff', 'ukmtheme' ),
    'search_items'        => __( 'Search Staffs', 'ukmtheme' ),
    'not_found'           => __( 'Not found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'ukmtheme' ),
  );
  $rewrite = array(
    'slug'                => 'Staff_Directory',
    'with_front'          => true,
    'pages'               => true,
    'feeds'               => true,
  );
  $args = array(
    'label'               => __( 'staff', 'ukmtheme' ),
    'description'         => __( 'Latest Staffs', 'ukmtheme' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'revisions', ),
    'taxonomies'          => array( 'department', 'position' ),
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    //'menu_position'       => 20,
    'menu_icon'           => get_template_directory_uri() . '/assets/images/admin/icon-staff.svg?ver=6.3',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'query_var'           => 'staff',
    'rewrite'             => $rewrite,
    'capability_type'     => 'post',
  );
  register_post_type( 'staff', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ukmtheme_staff_directory', 0 );

// Register Custom Taxonomy
function ukmtheme_staff_department_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Departments', 'Taxonomy General Name', 'ukmtheme' ),
    'singular_name'              => _x( 'Department', 'Taxonomy Singular Name', 'ukmtheme' ),
    'menu_name'                  => __( 'Department', 'ukmtheme' ),
    'all_items'                  => __( 'All Items', 'ukmtheme' ),
    'parent_item'                => __( 'Parent Department', 'ukmtheme' ),
    'parent_item_colon'          => __( 'Parent Department:', 'ukmtheme' ),
    'new_item_name'              => __( 'New Department Name', 'ukmtheme' ),
    'add_new_item'               => __( 'Add New Department', 'ukmtheme' ),
    'edit_item'                  => __( 'Edit Department', 'ukmtheme' ),
    'update_item'                => __( 'Update Department', 'ukmtheme' ),
    'separate_items_with_commas' => __( 'Separate departments with commas', 'ukmtheme' ),
    'search_items'               => __( 'Search Departments', 'ukmtheme' ),
    'add_or_remove_items'        => __( 'Add or remove departments', 'ukmtheme' ),
    'choose_from_most_used'      => __( 'Choose from the most used departments', 'ukmtheme' ),
    'not_found'                  => __( 'Not Found', 'ukmtheme' ),
  );
  $rewrite = array(
    'slug'                       => 'Staff_Department',
    'with_front'                 => true,
    'hierarchical'               => false,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => false,
    'query_var'                  => 'department',
    'rewrite'                    => $rewrite,
  );
  register_taxonomy( 'department', array( 'staff' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'ukmtheme_staff_department_taxonomy', 0 );

// Register Custom Taxonomy
function ukmtheme_staff_position_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Positions', 'Taxonomy General Name', 'ukmtheme' ),
    'singular_name'              => _x( 'Position', 'Taxonomy Singular Name', 'ukmtheme' ),
    'menu_name'                  => __( 'Position', 'ukmtheme' ),
    'all_items'                  => __( 'All Items', 'ukmtheme' ),
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
    'not_found'                  => __( 'Not Found', 'ukmtheme' ),
  );
  $rewrite = array(
    'slug'                       => 'Staff_Position',
    'with_front'                 => true,
    'hierarchical'               => false,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => false,
    'query_var'                  => 'Position',
    'rewrite'                    => $rewrite,
  );
  register_taxonomy( 'position', array( 'staff' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'ukmtheme_staff_Position_taxonomy', 0 );

// Hook into the 'init' action
add_action( 'init', 'ut_staff_directory_position', 0 );

// FILTER BY CATEGORY: POSITION/DEPARTMENT

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

/**
 * Custom Column Adjustment
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/manage_edit-post_type_columns
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_$post_type_posts_custom_column
 */


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