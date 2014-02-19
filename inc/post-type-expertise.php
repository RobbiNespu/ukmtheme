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
 * Post Type: Expertise
 */
function ut_expertise() {

  $labels = array(
    'name'                => _x( 'Expertise', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Expertise', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Expertise', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Expertise:', 'ukmtheme' ),
    'all_items'           => __( 'All Expertise', 'ukmtheme' ),
    'view_item'           => __( 'View Expertise', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Expertise', 'ukmtheme' ),
    'add_new'             => __( 'New Expertise', 'ukmtheme' ),
    'edit_item'           => __( 'Edit Expertise', 'ukmtheme' ),
    'update_item'         => __( 'Update Expertise', 'ukmtheme' ),
    'search_items'        => __( 'Search Expertise', 'ukmtheme' ),
    'not_found'           => __( 'No Expertise found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No Expertise found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'expertise', 'ukmtheme' ),
    'description'         => __( 'Expertise manager for UKM', 'ukmtheme' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'revisions', ),
    //'taxonomies'          => array( 'category', 'post_tag' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    //'menu_position'       => 20,
    'menu_icon'           => get_template_directory_uri() . '/assets/images/admin/icon-expertise.svg?ver=6.1.5',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'expertise', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ut_expertise', 0 );

// Custom Column Adjustment
// @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column

add_action('manage_expertise_posts_custom_column', 'ut_expertise_custom_columns');
add_filter('manage_edit-expertise_columns', 'ut_add_new_expertise_columns');

function ut_add_new_expertise_columns( $columns ){
  $columns = array(
    'cb'                          => '<input type="checkbox">',
    'ut_expertise_photo'        => __( 'Photo', 'ukmtheme' ),
    'title'                       => __( 'Name', 'ukmtheme' ),
    'ut_expertise_position'       => __( 'Current Position', 'ukmtheme' ),
    'ut_expertise_email'    => __( 'Email', 'ukmtheme' ),
    'ut_expertise_contact'         => __( 'Contact', 'ukmtheme' )
  );
  return $columns;
}

function ut_expertise_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'ut_expertise_photo' : $expertPhoto = get_post_meta($post->ID,'ut_expertise_photo',true); echo '<img src="'.$expertPhoto.'" width="60">';break;
    case 'ut_expertise_position' : echo get_post_meta($post->ID,'ut_expertise_position',true); break;
    case 'ut_expertise_email' : echo get_post_meta($post->ID,'ut_expertise_email',true); break;
    case 'ut_expertise_contact' : echo get_post_meta($post->ID,'ut_expertise_contact',true); 
  }
}

?>