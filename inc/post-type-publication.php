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

function ut_publication() {

  $labels = array(
    'name'                => _x( 'Publications', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Publication', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Publication', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Publication:', 'ukmtheme' ),
    'all_items'           => __( 'All Publications', 'ukmtheme' ),
    'view_item'           => __( 'View Publication', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Publication', 'ukmtheme' ),
    'add_new'             => __( 'New Publication', 'ukmtheme' ),
    'edit_item'           => __( 'Edit Publication', 'ukmtheme' ),
    'update_item'         => __( 'Update Publication', 'ukmtheme' ),
    'search_items'        => __( 'Search Publications', 'ukmtheme' ),
    'not_found'           => __( 'No Publications found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No Publications found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'publication', 'ukmtheme' ),
    'description'         => __( 'Publication information pages', 'ukmtheme' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', ),
    'taxonomies'          => array( 'pubcat' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    //'menu_position'       => 20,
    'menu_icon'           => get_template_directory_uri() . '/assets/images/admin/icon-publication.svg?ver=6.3',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'publication', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ut_publication', 0 );

// Register Custom Taxonomy
function ut_publication_category()  {

  $labels = array(
    'name'                       => _x( 'Pub. Categories', 'Taxonomy General Name', 'ukmtheme' ),
    'singular_name'              => _x( 'Pub. Category', 'Taxonomy Singular Name', 'ukmtheme' ),
    'menu_name'                  => __( 'Pub. Category', 'ukmtheme' ),
    'all_items'                  => __( 'All Categories', 'ukmtheme' ),
    'parent_item'                => __( 'Parent Category', 'ukmtheme' ),
    'parent_item_colon'          => __( 'Parent Category:', 'ukmtheme' ),
    'new_item_name'              => __( 'New Category Name', 'ukmtheme' ),
    'add_new_item'               => __( 'Add New Category', 'ukmtheme' ),
    'edit_item'                  => __( 'Edit Category', 'ukmtheme' ),
    'update_item'                => __( 'Update Category', 'ukmtheme' ),
    'separate_items_with_commas' => __( 'Separate Categories with commas', 'ukmtheme' ),
    'search_items'               => __( 'Search Categories', 'ukmtheme' ),
    'add_or_remove_items'        => __( 'Add or remove Categories', 'ukmtheme' ),
    'choose_from_most_used'      => __( 'Choose from the most used Categories', 'ukmtheme' ),
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
  register_taxonomy( 'pubcat', 'publication', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ut_publication_category', 0 );

// Custom Column Adjustment
// @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column

add_action('manage_publication_posts_custom_column', 'ut_publication_custom_columns');
add_filter('manage_edit-publication_columns', 'ut_add_new_publication_columns');

function ut_add_new_publication_columns( $columns ){
  $columns = array(
    'cb'                          => '<input type="checkbox">',
    'ut_publication_cover'        => __( 'Cover', 'ukmtheme' ),
    'title'                       => __( 'Title', 'ukmtheme' ),
    'pubcat'                      => __( 'Category', 'ukmtheme' ),
    'ut_publication_author'       => __( 'Author', 'ukmtheme' ),
    'ut_publication_publisher'    => __( 'Publisher', 'ukmtheme' ),
    'ut_publication_year'         => __( 'Year', 'ukmtheme' )
  );
  return $columns;
}

function ut_publication_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'ut_publication_cover' : $publicationCover = get_post_meta($post->ID,'ut_publication_cover',true); echo '<img src="'.$publicationCover.'" width="60">';break;
    case 'pubcat' : echo get_the_term_list( $post->ID, 'pubcat', '', ', ',''); break;
    case 'ut_publication_author' : echo get_post_meta($post->ID,'ut_publication_author',true); break;
    case 'ut_publication_publisher' : echo get_post_meta($post->ID,'ut_publication_publisher',true); break;
    case 'ut_publication_year' : echo get_post_meta($post->ID,'ut_publication_year',true); 
  }
}
?>