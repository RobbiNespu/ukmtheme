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

// DRAG AND DROP ORDER

add_action( 'admin_menu', 'ut_register_staff_menu' );

function ut_register_staff_menu() {
  add_submenu_page(
    'edit.php?post_type=staff',
    'Order Slides',
    'Order',
    'edit_pages', 'staff-order',
    'ut_staff_order_page'
  );
}


function ut_staff_order_page() {
?>
  <div class="wrap">
    <h2>Sort Staff</h2>
    <p>Simply drag the staff up or down and they will be saved in that order.</p>
  <?php $staff = new WP_Query( array( 'post_type' => 'staff', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order' ) ); ?>
  <?php if( $staff->have_posts() ) : ?>

    <table class="wp-list-table widefat fixed posts" id="sortable-table">
      <thead>
        <tr>
          <th class="column-order">Order</th>
          <th class="column-title">Name</th>
        </tr>
      </thead>
      <tbody data-post-type="staff">
      <?php while( $staff->have_posts() ) : $staff->the_post(); ?>
        <tr id="post-<?php the_ID(); ?>">
          <td class="column-order"><img alt="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNy4wLjIsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCIgWw0KCTwhRU5USVRZIHN0MCAiZmlsbDojMUExQTFBOyI+DQpdPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDE2IDE2IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAxNiAxNjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPHBhdGggc3R5bGU9IiZzdDA7IiBkPSJNOS4wNDksOGwyLjMyNiwyLjMyNmwwLjk0My0wLjk0M2MwLjExOC0wLjEyNSwwLjMwMi0wLjE1OSwwLjQ1OC0wLjA5MmMwLjE1MSwwLjA2NSwwLjI1NiwwLjIxNiwwLjI1NiwwLjM4Ng0KCQl2Mi45MzVjMCwwLjIyOS0wLjE5LDAuNDE5LTAuNDE5LDAuNDE5SDkuNjc3Yy0wLjE3LDAtMC4zMjEtMC4xMDUtMC4zODctMC4yNjJjLTAuMDY1LTAuMTUxLTAuMDMyLTAuMzM0LDAuMDkyLTAuNDUzbDAuOTQ0LTAuOTQ0DQoJCUw4LDkuMDQ5bC0yLjMyNiwyLjMyNWwwLjk0NCwwLjk0NGMwLjEyNCwwLjExOCwwLjE1NywwLjMwMiwwLjA5MiwwLjQ1M2MtMC4wNjYsMC4xNTctMC4yMTcsMC4yNjItMC4zODcsMC4yNjJIMy4zODgNCgkJYy0wLjIyOSwwLTAuNDE5LTAuMTktMC40MTktMC40MTlWOS42NzdjMC0wLjE3LDAuMTA1LTAuMzIxLDAuMjYyLTAuMzg2YzAuMTUtMC4wNjcsMC4zMzQtMC4wMzMsMC40NTIsMC4wOTJsMC45NDQsMC45NDNMNi45NTEsOA0KCQlMNC42MjYsNS42NzRMMy42ODMsNi42MThDMy42MDQsNi42OTYsMy40OTksNi43NDIsMy4zODgsNi43NDJjLTAuMDUzLDAtMC4xMTEtMC4wMTMtMC4xNTctMC4wMzMNCgkJQzMuMDc0LDYuNjQ0LDIuOTY5LDYuNDkzLDIuOTY5LDYuMzIzVjMuMzg4YzAtMC4yMjksMC4xOS0wLjQxOSwwLjQxOS0wLjQxOWgyLjkzNWMwLjE3LDAsMC4zMjEsMC4xMDUsMC4zODcsMC4yNjINCgkJYzAuMDY1LDAuMTUsMC4wMzIsMC4zMzQtMC4wOTIsMC40NTJMNS42NzQsNC42MjZMOCw2Ljk1MmwyLjMyNi0yLjMyNkw5LjM4MiwzLjY4M0M5LjI1OCwzLjU2NSw5LjIyNSwzLjM4MSw5LjI5LDMuMjMxDQoJCWMwLjA2Ni0wLjE1NywwLjIxNy0wLjI2MiwwLjM4Ny0wLjI2MmgyLjkzNWMwLjIyOSwwLDAuNDE5LDAuMTksMC40MTksMC40MTl2Mi45MzVjMCwwLjE3LTAuMTA1LDAuMzIxLTAuMjU2LDAuMzg2DQoJCWMtMC4wNTIsMC4wMi0wLjExMSwwLjAzMy0wLjE2MywwLjAzM2MtMC4xMTIsMC0wLjIxNi0wLjA0Ni0wLjI5NS0wLjEyNWwtMC45NDMtMC45NDNMOS4wNDksOHoiLz4NCjwvZz4NCjwvc3ZnPg0K" /></td>
          <td class="column-title"><strong><?php the_title(); ?></strong></td>
        </tr>
      <?php endwhile; ?>
      </tbody>
      <tfoot>
        <tr>
          <th class="column-order">Order</th>
          <th class="column-title">Name</th>
        </tr>
      </tfoot>

    </table>

  <?php else: ?>

    <p>No staffs found, why not <a href="post-new.php?post_type=staff">create one?</a></p>

  <?php endif; ?>
  <?php wp_reset_postdata(); // Don't forget to reset again! ?>

  <style>
    /* Dodgy CSS ^_^ */
    #sortable-table td { background: white; }
    #sortable-table .column-order { padding: 3px 10px; width: 50px; }
      #sortable-table .column-order img { cursor: move; }
    #sortable-table td.column-order { vertical-align: middle; text-align: center; }
    #sortable-table .column-thumbnail { width: 160px; }
  </style>

  </div><!-- .wrap -->

<?php

} 

// SCRIPT

add_action( 'admin_enqueue_scripts', 'staff_enqueue_scripts' );

function staff_enqueue_scripts() {
  wp_enqueue_script( 'jquery-ui-sortable' );
  wp_enqueue_script( 'staff', get_template_directory_uri() . '/assets/js/staff.js' );
}

// AJAX CALLBACK FUNCTION 

add_action( 'wp_ajax_ut_update_post_order', 'ut_update_post_order' );

function ut_update_post_order() {
  global $wpdb;

  $post_type     = $_POST['postType'];
  $order        = $_POST['order'];

  /**
  *    Expect: $sorted = array(
  *                menu_order => post-XX
  *            );
  */
  foreach( $order as $menu_order => $post_id )
  {
    $post_id         = intval( str_ireplace( 'post-', '', $post_id ) );
    $menu_order     = intval($menu_order);
    wp_update_post( array( 'ID' => $post_id, 'menu_order' => $menu_order ) );
  }

  die( '1' );
}

?>

